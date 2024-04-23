<div class="p-3 rounded-xl text-white shadow-md shadow-gray-400"
    style="background-color: {{ $colorMain }}; height: 506.8px;">
    <div class="flex flex-row justify-center items-center space-x-3 h-16">
        {!! $icon !!}
        <section class="flex flex-col">
            <div class="flex flex-col">
                <h3 class="text-base">{!! $title !!}</h3>
                <h6 class="text-xs -mt-1">
                    @isset($subTitle)
                        {!! $subTitle !!}
                    @endisset
                    &nbsp;
                </h6>
            </div>
        </section>
    </div>
    @isset($data)
        {{-- @dd($data) --}}

        {{-- temporary viewing --}}
        <div class="flex flex-row">
            <button wire:click='previousPage' class="size-5 border border-black flex justify-center items-center">
                &lt;</button>
            <table class="h-full w-full">
                <thead>
                    <tr>
                        <td>Format</td>
                        <td>Sales</td>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                        @foreach ($data as $group)
                            <tr>
                                <td>{{ $group->week_number }}</td>
                                <td>{{ $group->total_subtotal }}</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <button wire:click='previousPage'
                class="size-5 border border-black flex justify-center items-center">&gt;</button>
        </div>
    @endisset
</div>
