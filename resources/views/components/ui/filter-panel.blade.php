@props([
    'title' => 'Filters',
    'action' => '',
    'method' => 'GET',
    'class' => ''
])

<div class="mb-8 p-6 rounded-lg shadow {{ $class }}">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-medium">{{ $title }}</h3>
        <button type="button" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500" onclick="resetFilters()">
            Reset All
        </button>
    </div>
    
    <form method="{{ $method }}" action="{{ $action }}" class="space-y-4">
        {{ $slot }}
        
        <div class="flex justify-end pt-4 border-t">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-200">
                Apply Filters
            </button>
        </div>
    </form>
</div>

<script>
function resetFilters() {
    // Reset all form inputs
    const form = document.querySelector('form');
    if (form) {
        form.reset();
        // Submit the form to clear filters
        form.submit();
    }
}
</script>
