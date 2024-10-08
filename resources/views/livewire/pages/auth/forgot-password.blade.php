<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div class="h-full">
    <div class="h-full">
        <div class="hidden sm:block w-screen h-full">
            <div class="bg-white overflow-hidden flex flex-row h-full">
                {{-- Left Panel --}}
                <div class="max-w-full flex-1 relative">
                    <img src="/assets/g567ah.jpg" class="relative object-cover h-full w-full z-10">
                    {{-- Logo on top middle --}}
                    <div class="absolute top-1 left-1/2 transform -translate-x-1/2 z-20 mt-16">
                        <img src="assets/logo1.png" class="w-64" alt="">
                    </div>
                </div>

                {{-- Right Panel --}}
                <div class="bg-orange-400 flex-1 py-7">
                    <form wire:submit="sendPasswordResetLink"
                        class="p-4 w-full h-full flex flex-col items-center justify-between">
                        <div class="flex flex-col items-center">
                            <h1
                                class="font-montserrat italic text-white font-black text-4xl default-shadow mb-4 text-center">
                                Downshift Supply
                            </h1>
                            <h3 class="font-montserrat text-white default-shadow text-lg">
                                Welcome! Let&#39;s get started!
                            </h3>
                        </div>
                        <div class="w-full flex flex-col items-center">
                            {{-- Email --}}
                            <input required wire:model="email" name="email"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2"
                                type="email" placeholder="E-mail" autocomplete="email" autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="text-center w-2/5 text-white mt-[-6rem] text-sm">
                            Enter your email address associated with your account and we’ll send you a link to reset
                            your password.
                        </div>
                        {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}

                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <x-auth-button class="sm-40 md:w-60">
                            CONTINUE
                            <img wire:loading wire:target="sendPasswordResetLink"
                                src="{{ asset('assets/loading.gif') }}" alt="please wait..." class="h-5 w-5 ml-2" />
                        </x-auth-button>
                        <a href="{{ route('register') }}"
                            class="no-underline tracking-wider text-white font-montserrat hover:underline">Not
                            signed up
                            yet?&nbsp;<span class="underline font-semibold">Sign
                                up</span></a>
                    </form>
                </div>

            </div>
        </div>
        <div class="block sm:hidden">
            <div class="font-montserrat text-orange-400 text-4xl default-shadow mb-4 text-center mt-14">
                Downshift Supply
            </div>
            <div class="font-montserrat text-gray-700 text-lg default-shadow mb-4 text-center mt-5">
                Welcome! Let's get started.
            </div>
            <form wire:submit="sendPasswordResetLink">
                <div class="w-full flex flex-col items-center mt-20 px-10">
                    {{-- Email --}}
                    <input required wire:model="email" name="email"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2 w-full h-14"
                        type="email" placeholder="E-mail" autocomplete="email" autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="text-center text-sm px-10">
                        Enter your email address associated with your account and we’ll send you a link to reset your
                        password.
                    </div>
                    {{-- <button class="font-montserrat bg-orange-500" type="button">LOG IN</button> --}}
                    <button
                        class="sm-40 md:w-60 w-full text-white bg-orange-400 h-14 w-35 rounded text-2xl text-spacing font-bold mt-20">CONTINUE</button>
                    <a href="{{ route('register') }}"
                        class="no-underline tracking-wider font-montserrat hover:underline font-medium text-gray-700 flex justify-center mt-28">Not
                        signed up
                        yet?&nbsp;<span class="underline ">Sign
                            up</span></a>
                </div>

            </form>
        </div>
    </div>
</div>
