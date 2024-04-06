<div class="grid grid-cols-2 gap-4 text-xs mt-2 px-2">

    @if ($faqs)
        @foreach ($faqs as $faq)
            <div class="text-left">
                <span class="font-medium">{{ $faq->question }}</span>
                <br />
                <span class="font-light">{{ $faq->answer }}</span>
            </div>
        @endforeach
    @endif
    <livewire:main.user.livewire.order-notification />

</div>
