@props([
    'placeholder' => 'Search...',
    'value' => '',
    'name' => 'search',
    'id' => 'search',
    'label'=>'',
    'class' => ''
])

<div class="">
    <div class="inset-y-0 left-0 pl-3 flex flex-col">    
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}
        </label>
    @endif
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md leading-5 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $class }}"
        {{ $attributes }}
    ></div>
</div>
