<div>
    @if ($showOverlay)
        <div id="overlay"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center z-20">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl mb-4 text-center">Order '{{ $transaction->id }}' was in transit</h2>
                <p class="text-sm text-gray-600 mb-4 text-center">Have you received order '{{ $transaction->id }}' yet?
                </p>
                <p class="text-sm text-gray-600 mb-4 text-center">Once you choose yes, the order is set to complete. This
                    is an irreversible action.</p>
                <div class="flex justify-center space-x-4">
                    <button wire:click="notYet()"
                        class="flex-none w-24 py-2 text-sm bg-red-600 text-white border border-red-300 rounded hover:bg-red-700">Not
                        yet</button>
                    <button wire:click="showMe()"
                        class="flex-none w-24 py-2 text-sm bg-gray-600 text-white border border-gray-300 rounded hover:bg-gray-700">Show
                        me</button>
                    <button wire:click="completeTransaction()"
                        class="flex-none w-24 py-2 text-sm bg-blue-600 text-white border border-blue-300 rounded hover:bg-blue-700">Yes</button>
                </div>

            </div>
        </div>
    @endif
</div>
