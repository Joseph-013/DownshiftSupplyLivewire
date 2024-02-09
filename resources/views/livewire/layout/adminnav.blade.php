<div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
    <x-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
        Inventory
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
    <x-nav-link :href="route('admin.salestransactions')" :active="request()->routeIs('admin.salestransactions')" wire:navigate>
        Onsite<br />Transactions
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
    <x-nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
        Online<br />Transactions
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
    <x-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
        FAQs
    </x-nav-link>
</div>
<div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
    <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
        Reports
    </x-nav-link>
</div>
