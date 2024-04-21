<div class="absolute inset-0 flex justify-end right-2 -top-2">
    @if($countCompleted != 0)
    <div class="bg-green-600 text-white text-xs flex justify-center items-center h-fit rounded-full font-mono"
        style="padding: 1px 4px 1px 6px;">
        {{-- change me --}}
        {{ $countCompleted > 99 ? '99+' : $countCompleted }}
    </div>  
    @endif
    @if($countProcessing != 0)
    <div class="bg-red-600 text-white text-xs flex justify-center items-center h-fit rounded-full font-mono"
        style="padding: 1px 4px 1px 6px;">
        {{-- change me --}}
        {{ $countProcessing > 99 ? '99+' : $countProcessing }}
    </div>  
    @endif
</div>