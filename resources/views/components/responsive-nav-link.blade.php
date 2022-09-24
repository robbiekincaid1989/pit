@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium dark:text-gray-200 text-indigo-700 dark:bg-gray-900 bg-indigo-50 focus:outline-none dark:focus:text-gray-900 focus:text-indigo-800 dark:focus:bg-gray-700 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium dark:text-gray-200 text-gray-600 dark:hover:text-gray-200 hover:text-gray-800 dark:hover:bg-gray-900 hover:bg-gray-50 hover:border-gray-300 focus:outline-none dark:focus:text-gray-200 focus:text-gray-800 dark:focus:bg-gray-900 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
