<x-responsive-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
    Inventory
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onsitetransactions')" :active="request()->routeIs('admin.onsitetransactions')" wire:navigate>
    Sales Transactions
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onlinetransactions')" :active="request()->routeIs('admin.onlinetransactions')" wire:navigate>
    Orders
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
    FAQs
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
    Reports
</x-responsive-nav-link>
