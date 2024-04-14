<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout)
    {
        $logout();

        return redirect()->route('login');
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-b border-b-black">
        <div class="flex justify-between h-20">

            <div class="flex">
                <div class="flex items-center anchor-clean">
                    <a href="{{ auth()->check() ? (auth()->user()->usertype === 'admin' ? route('admin.inventory') : route('user.products')) : route('user.products') }}"
                        wire:navigate class="flex items-center no-underline text-black">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo"
                            class="block h-12 w-12 shadow-md mr-4 rounded-full">
                        <h1 class="block default-shadow text-sm text-spacing font-montserrat h-full">
                            DOWNSHIFT&nbsp;<br class="inline sm:hidden md:inline lg:hidden">SUPPLY
                        </h1>
                    </a>
                </div>
            </div>

            @if (auth()->check())
                @auth
                    @if (auth()->user()->usertype === 'admin')
                        @include('livewire.layout.adminnav')
                    @else
                        @include('livewire.layout.usernav')
                    @endif
                @endauth
            @else
                @include('livewire.layout.usernav')
            @endif

            <div class="h-full flex items-center">

                <div class="h-8 w-8 me-6">
                    @if (!auth()->check() || auth()->user()->usertype === 'user')
                        <a href="{{ route('user.cart') }}" class="h-full w-full">
                            <img class="" src="{{ asset('assets/cart.png') }}" alt="cart" />
                        </a>
                    @elseif (!auth()->check() || auth()->user()->usertype === 'admin')
                        <div class="h-full flex items-center italic text-sm font-bold text-orange-500">
                            ADMIN
                        </div>
                    @endif

                </div>

                <div class="hidden md:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex flex-col items-center px-2 lg:px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <img src="{{ asset('assets/profile.jpg') }}" alt="Logo" class="block h-5 w-5">
                                </div>
                                {{-- @guest
                                    <div class="text-xs -mb-2">Guest</div>
                                @endguest --}}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @auth
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            @endauth

                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    @if (auth()->guest())
                                        {{ __('Log In') }}
                                    @elseif (auth()->user())
                                        {{ __('Log Out') }}
                                    @endif
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="-me-2 flex items-center md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (auth()->check())
                @if (auth()->user()->usertype === 'admin')
                    @include('livewire.layout.adminnavresponsive')
                @else
                    @include('livewire.layout.usernavresponsive')
                @endif
            @else
                @include('livewire.layout.usernavresponsive')

            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 border border-b-2">
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
                @auth
                    <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @endauth

                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        @auth
                            {{ __('Log Out') }}
                        @endauth
                        @guest
                            {{ __('Log In') }}
                        @endguest
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
