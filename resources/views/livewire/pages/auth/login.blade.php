<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(session('url.intended', RouteServiceProvider::HOME), navigate: true);
    }
}; ?>

<div class="h-full">
    <div class="h-full">
        <div class="hidden sm:block w-screen h-full">
            <div class="bg-white overflow-hidden flex flex-row h-full">
                {{-- Left Panel --}}
                <div class="max-w-full flex-1">

                    <img src="/assets/g567ah.jpg" class="relative object-cover h-full w-full z-10">

                    <div class="absolute z-20">
                        <img src="assets/logo.png" class="" alt="">
                        <h3 class="">Downshift Supply</h3>
                    </div>
                </div>
                {{-- Right Panel --}}
                <div class="bg-orange-400 flex-1 py-5">
                    <form class="p-4 w-full h-full flex flex-col items-center justify-between">
                        <div class="flex flex-col items-center">
                            <h1
                                class="font-montserrat italic text-white font-black text-4xl default-shadow mb-4 text-center">
                                Downshift
                                Supply
                            </h1>
                            <h3 class="font-montserrat text-white default-shadow text-lg">
                                Welcome! Let&#39;s get started!
                            </h3>
                        </div>
                        <div class="w-full flex flex-col items-center">
                            <input
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2"
                                type="email" placeholder="E-mail" autocomplete="email" autofocus>
                            <input
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3"
                                type="password" placeholder="Password">
                            <a class="font-montserrat text-white text-sm tracking-wider hover:underline"
                                href="#">Forgot&nbsp;Password?</a>
                        </div>
                        {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}
                        <x-auth-button class="sm-40 md:w-60">LOG IN</x-auth-button>
                        <a href="#"
                            class="no-underline tracking-wider text-white font-montserrat hover:underline">Not
                            signed up
                            yet?&nbsp;<span class="underline font-semibold">Sign
                                up</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
