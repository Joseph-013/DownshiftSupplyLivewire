<x-responsive-nav-link :href="auth()->check() ? route('user.products') : route('guest.products')" :active="request()->routeIs('user.products')" wire:navigate>
    Products
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('user.orders')" :active="request()->routeIs('user.orders')" wire:navigate>
    Orders
</x-responsive-nav-link>
<x-responsive-nav-link :href="auth()->check() ? route('user.faqs') : route('guest.faqs')" :active="request()->routeIs('user.faqs')" wire:navigate>
    FAQs
</x-responsive-nav-link>
