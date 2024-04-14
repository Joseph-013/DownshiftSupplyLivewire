<x-responsive-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
    Inventory
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onsitetransactions')" :active="request()->routeIs('admin.onsitetransactions')" wire:navigate>
    On-site Transactions
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.onlinetransactions')" :active="request()->routeIs('admin.onlinetransactions')" wire:navigate class="flex">
    Online Transactions
    <div class="bg-red-600 text-white text-xs flex justify-center items-center h-fit rounded-full font-mono ml-3"
        style="padding: 1px 6px;">
        {{-- change me --}}
        1
    </div>
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
    FAQs
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
    Reports
</x-responsive-nav-link>
