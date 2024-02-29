<div class="w-full h-96 overflow-y-auto" id="questions-container">
    <ul class="w-full flex flex-col items-center">
        @foreach ($faqs as $faq)
            {{-- Single Unit of Product --}}
            <li wire:click="selectFaq({{ $faq->id }})" class="w-full flex justify-center select-none px-2">
                {{-- Product Details --}}
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
