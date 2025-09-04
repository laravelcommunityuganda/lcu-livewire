@props(['sponsors'])
<h2 class="text-2xl font-bold">Our Sponsors</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
  @foreach($sponsors as $sponsor)
    <div key="{{ $sponsor->id }}" class="text-center shadow-md transition-shadow rounded p-4">
    <div class="flex items-center justify-center h-24">
      <img class="max-h-full max-w-full {{ $sponsor->tier === 'gold' ? 'border-yellow-400 border-2 rounded-lg' : '' }}"
      src="{{ $sponsor->logo }}" alt="{{ $sponsor->name }}" />
    </div>
    <h3 class="mt-4 text-lg font-medium">{{ $sponsor->name }}</h3>
    <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
      {{ $sponsor->tier === 'gold' ? 'bg-yellow-100 text-yellow-800' :
    ($sponsor->tier === 'silver' ? 'bg-gray-100' : 'bg-amber-100 text-amber-800') }}">
      {{ $sponsor->tier }} sponsor
    </span>
    </div>
  @endforeach
</div>