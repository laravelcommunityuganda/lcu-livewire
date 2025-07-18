@props(['event', 'showDescription' => true, 'variant' => 'default'])

@php
    $eventTypeVariants = [
        'meetup' => 'info',
        'workshop' => 'success',
        'conference' => 'primary',
        'hackathon' => 'warning',
        'webinar' => 'default',
    ];
    
    $eventTypeBadge = $eventTypeVariants[$event->type] ?? 'default';
    $isUpcoming = $event->start_date > now();
    $isPast = $event->start_date < now();
@endphp

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
    <a href="{{ route('events.show', $event->id) }}" class="block">
        <!-- Event Image -->
        <div class="relative h-48 bg-gradient-to-br from-indigo-500 to-purple-600">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" 
                     alt="{{ $event->title }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center">
                    <svg class="h-16 w-16 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
            
            <!-- Event Type Badge -->
            <div class="absolute top-3 right-3">
                <x-ui.badge variant="{{ $eventTypeBadge }}" class="bg-white/90 text-gray-800 backdrop-blur-sm">
                    {{ ucfirst($event->type) }}
                </x-ui.badge>
            </div>
            
            <!-- Online Badge -->
            @if($event->is_online)
                <div class="absolute top-3 left-3">
                    <x-ui.badge variant="error" class="bg-white/90 text-red-800 backdrop-blur-sm">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6l2 2h6a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                        Online
                    </x-ui.badge>
                </div>
            @endif
            
            <!-- Status Badge -->
            @if($isPast)
                <div class="absolute bottom-3 left-3">
                    <x-ui.badge variant="default" class="bg-white/90 text-gray-800 backdrop-blur-sm">
                        Past Event
                    </x-ui.badge>
                </div>
            @endif
        </div>
        
        <!-- Event Content -->
        <div class="p-6">
            <!-- Event Title -->
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                {{ $event->title }}
            </h3>
            
            <!-- Event Description -->
            @if($showDescription && $event->description)
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                    {{ Str::limit($event->description, 120) }}
                </p>
            @endif
            
            <!-- Event Details -->
            <div class="space-y-3">
                <!-- Date & Time -->
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <svg class="flex-shrink-0 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->start_date)->isoFormat('ddd, MMM D, h:mm A') }}</span>
                </div>
                
                <!-- Location -->
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                    <svg class="flex-shrink-0 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="truncate">{{ $event->location }}</span>
                </div>
                
                <!-- Attendees count (if available) -->
                @if(isset($event->attendees_count) && $event->attendees_count > 0)
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="flex-shrink-0 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                        <span>{{ $event->attendees_count }} {{ Str::plural('person', $event->attendees_count) }} attending</span>
                    </div>
                @endif
            </div>
            
            <!-- Card Footer -->
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    @if($isUpcoming)
                        <span class="text-green-600 dark:text-green-400 font-medium">Upcoming</span>
                    @else
                        Created {{ $event->created_at->diffForHumans() }}
                    @endif
                </div>
                
                <!-- Learn More Button -->
                <span class="text-sm text-indigo-600 dark:text-indigo-400 font-medium group-hover:text-indigo-500">
                    Learn more →
                </span>
            </div>
        </div>
    </a>
</div>
