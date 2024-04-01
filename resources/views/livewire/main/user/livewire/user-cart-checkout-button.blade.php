<div class="w-full max-w-96 flex flex-col items-center justify-center">
    @if(!$this->cartEntries->isEmpty())
    <button wire:click="checkout" id="checkoutButton"
        class="sm:block h-10 md:w-72 flex flex-row items-center justify-center rounded-lg  bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
        Check out
    </button>
    @else
    <button disabled id="checkoutButton"
        class="h-10 w-35 px-20 mr-10 flex flex-row items-center justify-center rounded-lg bg-gray-300 ml-3 border-1 border-gray-400 text-gray-600 text-sm font-semibold text-spacing cursor-not-allowed">
        Check out
    </button>
    @endif
    Additional fees may be added upon checkout.
</div>
