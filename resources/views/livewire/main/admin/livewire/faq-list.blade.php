<div>
    @isset($itemTemplateToggleRes)
        <div
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 block lg:hidden justify-center items-center z-50">
            @if ($itemTemplateToggleRes != false)
                <livewire:main.admin.livewire.faq-create :faq="$itemTemplateToggleRes" mode="{{ 'read' }}" />
            @endif
        </div>
    @endisset
    <div class="w-full h-96 overflow-y-auto" id="questions-container">
        <ul class="w-full flex flex-col items-center">
            @if ($faqs)
                @foreach ($faqs as $faq)
                    <li class="w-full flex justify-center select-none px-2">
                        <input wire:click="selectFaq({{ $faq->id }})" class="widenWhenSelected" hidden type="radio"
                            id="faqId{{ $faq->id }}" name="productList">
                        <label
                            class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                            for="faqId{{ $faq->id }}">
                            <ul class="flex flex-row w-full">
                                <li class="w-full text-center text-sm">{{ $faq->question }}</li>
                            </ul>
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="flex flex-col lg:flex-row items-center mt-4 w-full justify-center">
        <div class="w-96 text-center px-3">
            {{ $faqs->links('pagination.default') }}
        </div>
        <div class="mt-2 lg:mt-0">
            <button wire:click="itemTemplate(null)"
                class="h-10 px-4 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing mb-2">
                Create FAQ
                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path
                        d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                </svg>
            </button>
        </div>

    </div>


    @isset($itemTemplateToggle)
        <livewire:main.admin.livewire.faq-create :faq="$itemTemplateToggle" mode="{{ 'write' }}" />
    @endisset

    <!-- OVERLAY -->
    <!-- <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">

            <div class="absolute inset-0 bg-black opacity-50"></div>


            <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                create product component here
            </div>
        </div> -->
    <!-- END OF OVERLAY -->

</div>

</div>
