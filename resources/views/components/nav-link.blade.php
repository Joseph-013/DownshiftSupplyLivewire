@props(['active'])

@php
    $classes = $active ?? false ? 'text-orange-500 inline-flex items-center px-1 pt-1 sm:text-xs lg:text-sm font-medium focus:outline-none border-b-4 border-orange-500 focus:border-orange-700 transition duration-150 ease-in-out ' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xs lg:text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-orange-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

    $classes .= ' font-montserrat text-spacing text-center no-underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="default-shadow">{{ $slot }}</span>
</a>
