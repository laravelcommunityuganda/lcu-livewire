@props(['sponsors'])
<h2 class="text-2xl font-bold text-gray-900 mb-6 dark:text-gray-200">Our Sponsors</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($sponsors as $sponsor)
        <div key="{{ $sponsor->id }}" class="text-center">
            <div class="flex items-center justify-center h-24">
                <img class="max-h-full max-w-full {{ $sponsor->tier === 'gold' ? 'border-yellow-400 border-2 rounded-lg' : '' }}"
                    src="{{ $sponsor->logo }}" alt="{{ $sponsor->name }}" />
            </div>
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-200">{{ $sponsor->name }}</h3>
            <span
                class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        {{ $sponsor->tier === 'gold' ? 'bg-yellow-100 text-yellow-800' :
            ($sponsor->tier === 'silver' ? 'bg-gray-100 text-gray-800 dark:text-gray-100' : 'bg-amber-100 text-amber-800') }}">
                {{ $sponsor->tier }} sponsor
            </span>
        </div>
    @endforeach
    @props(['sponsors'])
</div>
