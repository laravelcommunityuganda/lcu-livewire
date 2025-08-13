<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
  public string $activeTab = 'overview';

  public function switchTab($tab): void
  {
    $this->activeTab = $tab;
  }

  public function getStatsProperty(): array
  {
    return [
      'total_users' => User::count(),
      'active_users' => User::where('is_active', true)->count(),
      'total_posts' => Post::count(),
      'published_posts' => Post::where('is_published', true)->count(),
      'upcoming_events' => Event::where('start_date', '>', now())->count(),
      'total_donations' => Donation::count(),
      'donation_amount' => Donation::sum('amount'),
      'recent_users' => User::latest()->take(5)->get()->map(function ($user) {
        return [
          'id' => $user->id,
          'name' => $user->name,
          'email' => $user->email,
          'created_at' => $user->created_at->toDateTimeString(),
        ];
      }),
      'monthly_users' => $this->getMonthlyUserStats(),
      'post_types' => $this->getPostTypeStats(),
      'donation_stats' => $this->getDonationStatusStats(),
    ];
  }

  private function getMonthlyUserStats(): array
  {
    $startDate = now()->subMonths(11)->startOfMonth();
    $endDate = now()->endOfMonth();

    // Initialize all months with 0 count
    $months = collect();
    $current = clone $startDate;

    while ($current <= $endDate) {
      $months->push([
        'month' => $current->format('M Y'),
        'count' => 0
      ]);
      $current->addMonth();
    }

    // Get actual user counts
    $userCounts = User::selectRaw(
      "DATE_FORMAT(created_at, '%b %Y') as month,
            COUNT(*) as count"
    )
      ->whereBetween('created_at', [$startDate, $endDate])
      ->groupBy('month')
      ->orderBy('month')
      ->pluck('count', 'month');

    // Merge with initialized months
    return $months->map(function ($month) use ($userCounts) {
      return [
        'month' => $month['month'],
        'count' => $userCounts[$month['month']] ?? 0
      ];
    })->toArray();
  }

  private function getPostTypeStats(): array
  {
    return Post::selectRaw('type, COUNT(*) as count')
      ->groupBy('type')
      ->get()
      ->map(function ($item) {
        return [
          'type' => ucfirst(str_replace('_', ' ', $item->type)),
          'count' => $item->count
        ];
      })
      ->toArray();
  }

  private function getDonationStatusStats(): array
  {
    return Donation::selectRaw('status, COUNT(*) as count')
      ->groupBy('status')
      ->get()
      ->map(function ($item) {
        return [
          'status' => ucfirst($item->status),
          'count' => $item->count
        ];
      })
      ->toArray();
  }

  public function render()
  {
    return view('livewire.admin.dashboard.index', [
      'stats' => $this->stats,
    ]);
  }
}
