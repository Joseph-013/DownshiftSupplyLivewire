<div class="flex h-full space-x-2 lg:space-x-4">
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex gap-10">
        <x-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
            <svg fill="currentColor" width="30" height="30" viewBox="0 0 32 32" id="icon"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        .cls-1 {
                            fill: none;
                        }
                    </style>
                </defs>
                <title>dashboard</title>
                <rect x="24" y="21" width="2" height="5" />
                <rect x="20" y="16" width="2" height="10" />
                <path d="M11,26a5.0059,5.0059,0,0,1-5-5H8a3,3,0,1,0,3-3V16a5,5,0,0,1,0,10Z" />
                <path
                    d="M28,2H4A2.002,2.002,0,0,0,2,4V28a2.0023,2.0023,0,0,0,2,2H28a2.0027,2.0027,0,0,0,2-2V4A2.0023,2.0023,0,0,0,28,2Zm0,9H14V4H28ZM12,4v7H4V4ZM4,28V13H28.0007l.0013,15Z" />
                <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1"
                    width="32" height="32" />
            </svg>
        </x-nav-link>
    </div>
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex gap-10">
        <x-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
            Inventory
        </x-nav-link>
    </div>
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex">
        <x-nav-link :href="route('admin.onsitetransactions')" :active="request()->routeIs('admin.onsitetransactions')" wire:navigate>
            On-site<br />Transactions
        </x-nav-link>
    </div>
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex">
        <x-nav-link :href="route('admin.onlinetransactions')" :active="request()->routeIs('admin.onlinetransactions')" wire:navigate>
            {{-- Badge --}}
            <div class="absolute inset-0 flex justify-end right-2 -top-2">
                <div class="bg-red-600 text-white text-xs flex justify-center items-center h-fit rounded-full font-mono"
                    style="padding: 1px 4px 1px 6px;">
                    {{-- change me --}}
                    1
                </div>
            </div>

            Online<br />Transactions
        </x-nav-link>
    </div>
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex">
        <x-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
            FAQs
        </x-nav-link>
    </div>
    <div class="hidden sm:-my-px sm:ms-2 lg:ms-8 md:flex">
        <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
            Reports
        </x-nav-link>
    </div>

</div>
