<div>
    @if($count != 0)
    <div class="bg-red-600 text-white text-xs flex justify-center items-center h-fit rounded-full font-mono ml-3"
        style="padding: 1px 6px;">
        {{-- change me --}}
        {{ $count > 99 ? '99+' : $count }}
    </div>
    @endif
</div>