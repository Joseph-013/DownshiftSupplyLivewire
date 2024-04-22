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
        {{--  --}}
    @endisset
</div>
