<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b border-b-black">
        <div class="flex justify-between h-20">

            <!-- Logo and Navigation Links -->
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center anchor-clean">
                    <a href="{{ route('admin.inventory') }}" wire:navigate class="flex items-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo"
                            class="block h-12 w-12 shadow-md mr-4 rounded-full">
                        <h1 class="block default-shadow text-sm text-spacing font-montserrat">
                            DOWNSHIFT&nbsp;<br class="hidden md:inline lg:hidden">SUPPLY
                        </h1>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-5 lg:ms-8 md:flex">
                    <x-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
                        {{-- {{ __('Inventory') }} --}}
                        Inventory
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
                    <x-nav-link :href="route('admin.salestransactions')" :active="request()->routeIs('admin.salestransactions')" wire:navigate>
                        Sales<br />Transactions
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-3 lg:ms-8 md:flex">
                    <x-nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                        Orders
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
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <img src="{{ asset('assets/profile.jpg') }}" alt="Logo" class="block h-5 w-5">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.inventory')" :active="request()->routeIs('admin.inventory')" wire:navigate>
                Inventory
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.salestransactions')" :active="request()->routeIs('admin.salestransactions')" wire:navigate>
                Sales Transactions
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                Orders
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.faqs')" :active="request()->routeIs('admin.faqs')" wire:navigate>
                FAQs
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')" wire:navigate>
                Reports
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 mb-2">
                    <img src="{{ asset('assets/profile.jpg') }}" alt="Logo" class="block h-7 w-7 mr-4">
                </div>
                @if (auth()->guest())
                    <div class="font-medium text-sm text-gray-500">Guest</div>
                @else
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
