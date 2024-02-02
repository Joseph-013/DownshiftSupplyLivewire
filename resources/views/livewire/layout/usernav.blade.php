<div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
    <x-nav-link :href="route('products')" :active="request()->routeIs('products')" wire:navigate>
        Products
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
    <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')" wire:navigate>
        Orders
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
    <x-nav-link :href="route('faqs')" :active="request()->routeIs('faqs')" wire:navigate>
        FAQs
    </x-nav-link>
</div>
