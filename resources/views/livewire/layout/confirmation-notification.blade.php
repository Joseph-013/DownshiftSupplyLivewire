<div>
    @if ($showConfirmationOverlay)
        <div id="overlay"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-20">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                @isset($title)
                    <h2 class="text-xl mb-4 text-center">{{ $title }}</h2>
                @endisset
                @isset($message)
                    <p class="text-sm text-gray-600 mb-4 text-center">{{ $message }}</p>
                @endisset
                <div class="flex justify-center space-x-4">
                    @isset($negativeButtonName)
                        <button wire:click="negative()"
                            class="flex-none w-24 py-2 text-sm bg-red-600 text-white border border-red-300 rounded hover:bg-red-700">{{ $negativeButtonName }}</button>
                    @endisset
                    @isset($neutralButtonName)
                        <button wire:click="neutral()"
                            class="flex-none w-24 py-2 text-sm bg-gray-600 text-white border border-gray-300 rounded hover:bg-gray-700">{{ $neutralButtonName }}</button>
                    @endisset
                    @isset($positiveButtonName)
                        <button wire:click="positive()"
                            class="flex-none w-24 py-2 text-sm bg-blue-600 text-white border border-blue-300 rounded hover:bg-blue-700">{{ $positiveButtonName }}</button>
                    @endisset
                </div>
            </div>
        </div>
    @endif
</div>
