@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'font-montserrat p-1 bg-red-500 text-sm text-white m-1 rounded-md']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
