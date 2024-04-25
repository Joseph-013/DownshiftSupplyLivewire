<x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate>
    Dashboard
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
    Inventory
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onsitetransactions')" :active="request()->routeIs('admin.onsitetransactions')" wire:navigate>
    On-site Transactions
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onlinetransactions')" :active="request()->routeIs('admin.onlinetransactions')" wire:navigate class="flex">
    Online Transactions
    <livewire:notification-badge-responsive />
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
    FAQs
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
    Reports
</x-responsive-nav-link>
