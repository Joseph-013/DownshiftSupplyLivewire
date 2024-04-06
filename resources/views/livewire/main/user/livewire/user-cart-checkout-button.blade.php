<div class="w-full max-w-96 flex flex-col items-center justify-center">
    @if(!$emptyCart)
        <button wire:click="checkout"
                class="w-full sm:w-auto h-10 md:w-72 flex items-center justify-center rounded-lg bg-orange-500 border border-black text-white text-sm font-semibold text-spacing">
            Check out
        </button>
    @else
        <button disabled
                class="w-full sm:w-auto h-10 md:w-72 flex items-center justify-center rounded-lg bg-gray-300 border border-gray-400 text-gray-600 text-sm font-semibold text-spacing cursor-not-allowed">
            Check out
        </button>
    @endif
    <p class="text-xs text-gray-500 mt-1">Additional fees may be added upon checkout.</p>
</div>
