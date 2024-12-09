@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 dark:border-blue-600 text-sm font-medium leading-5 text-black dark:text-blue-500 focus:outline-none focus:border-blue-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-black hover:text-blue-500 dark:hover:text-blue-500 hover:border-blue-500 dark:hover:border-blue-500 focus:outline-none focus:text-blue-700 dark:focus:text-blue-700 focus:border-gray-300 dark:focus:border-blue-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
