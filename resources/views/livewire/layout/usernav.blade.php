{{-- <div class="flex justify-end ml-10 md:ml-20 lg:ml-40 gap-10"> <!-- Adjusted alignment --> --}}
<div class="flex justify-end gap-10"> <!-- Adjusted alignment -->
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="auth()->check() ? route('user.products') : route('guest.products')" :active="request()->routeIs('user.products')" wire:navigate>
            Products
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="route('user.orders')" :active="request()->routeIs('user.orders')" wire:navigate>
            Orders
        </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
        <x-nav-link :href="auth()->check() ? route('user.faqs') : route('guest.faqs')" :active="request()->routeIs('user.faqs')" wire:navigate>
            FAQs
        </x-nav-link>
    </div>
</div>
