<div class="w-full h-96 overflow-y-auto" id="questions-container">
    <div class="w-full block lg:hidden">
        @if ($selectedFaqId == null)
            <livewire:faq-details />
        @endif
    </div>

    <ul class="w-full flex flex-col items-center">
        @foreach ($faqs as $faq)
            <li wire:click="selectFaq({{ $faq->id }})" class="w-full flex justify-center select-none px-2">
                <input class="widenWhenSelected" hidden type="radio" id="faqId{{ $faq->id }}" name="productList">
                <label class="w-11/12 py-2 my-1 rounded-full border-2 border-gray shadow-sm text-sm flex items-center"
                    for="faqId{{ $faq->id }}">
                    <ul class="flex flex-row w-full">
                        <li class="w-full text-center text-sm">{{ $faq->question }}</li>
                    </ul>
                </label>
            </li>
        @endforeach
    </ul>
</div>
