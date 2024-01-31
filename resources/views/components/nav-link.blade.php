@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 sm:text-xs lg:text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-orange-700 transition duration-150 ease-in-out text-orange-500' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xs lg:text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

    $classes .= ' font-montserrat text-spacing default-shadow text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
