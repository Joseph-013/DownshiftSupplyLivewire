<div>   
    <div>
        <div class="p-2 flex flex-col h-full justify-center">
            <div class="text-sm h-min mb-1">
                Question:
            </div>
            <textarea wire:model="newQuestion" class="w-full h-30 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="4"></textarea>

            <div class="text-sm h-min mb-1">
                Answer:
            </div>
            <textarea wire:model="newAnswer" class="w-full h-30 p-2 mx-1 border rounded-md border-gray-300 focus:outline-none focus:border-blue-500" rows="4"></textarea>
        </div>
    </div>
    {{-- Bottom --}}
    <div class="w-full mt-3 flex justify-center">
        <button wire:click="createFaq" type="submit" class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
            Create FAQ
        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
        </svg>
        </button>
    </div>
</div>