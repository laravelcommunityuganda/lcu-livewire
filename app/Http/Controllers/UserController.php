<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'role', 'status']);

        $users = User::query()
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('username', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                });
            })
            ->when($filters['role'] ?? null, function ($query, $role) {
                $query->where('role', $role);
            })
            ->when($filters['status'] ?? null, function ($query, $status) {
                if ($status === 'active') {
                    $query->where('is_active', true)
                        ->where('is_banned', false);
                } elseif ($status === 'inactive') {
                    $query->where('is_active', false);
                } elseif ($status === 'banned') {
                    $query->where('is_banned', true);
                }
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return View::make('admin/users/index', [
            'users' => UserResource::collection($users),
            'filters' => $filters,
        ]);
    }

    public function create()
    {
        return View::make('admin/users/form', [
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'role' => 'required|in:admin,organizer,member,user',
            'password' => ['required', 'confirmed', Password::defaults()],
            'is_active' => 'boolean',
            'is_banned' => 'boolean',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active ?? true,
            'is_banned' => $request->is_banned ?? false,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return View::make('admin/users/show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return View::make('admin/users/form', [
            'user' => $user,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'role' => 'required|in:admin,organizer,member,user',
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'is_active' => 'boolean',
            'is_banned' => 'boolean',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role' => $request->role,
            'is_active' => $request->is_active ?? $user->is_active,
            'is_banned' => $request->is_banned ?? $user->is_banned,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
