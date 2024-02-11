<div class="flex justify-end ml-20 gap-10 pl-20"> <!-- Adjusted alignment -->
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="route('user.products')" :active="request()->routeIs('products')" wire:navigate>
            Products
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="route('user.orders')" :active="request()->routeIs('orders')" wire:navigate>
            Orders
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="route('user.faqs')" :active="request()->routeIs('faqs')" wire:navigate>
            FAQs
        </x-nav-link>
    </div>
</div>
