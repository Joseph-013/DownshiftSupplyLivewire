<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center px-4 py-2 bg-white border border-transparent default-shadow rounded-md text-xl font-bold text-orange-600 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
