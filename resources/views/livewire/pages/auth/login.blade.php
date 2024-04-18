<?php

use App\Livewire\Forms\LoginForm;
use App\Pro1viders\RouteServiceProvider;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login()
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $redirectUrl = $this->getRedirectUrl();

        return redirect($redirectUrl, ['navigate' => true]);
    }

    private function getRedirectUrl(): string
    {
        $user = auth()->user();

        if ($user->usertype === 'admin') {
            // Redirect admin to admin dashboard
            return route('admin.inventory');
        } elseif ($user->usertype === 'user') {
            // Redirect user to user products page
            return route('user.products');
        } else {
            // Default redirect if usertype is not recognized
            abort(404, 'Unrecognized Action');
        }
    }
}; ?>



<div class="h-full">
    <div class="h-full">
        <div class="hidden sm:block w-screen h-full">
            <div class="bg-white overflow-hidden flex flex-row h-full">
                <div class="max-w-full flex-1 relative">
                    {{-- Left Panel --}}
                    <div class="relative h-full w-full">
                        <img src="/assets/g567ah.jpg" class="absolute inset-0 object-cover h-full w-full z-10 opacity-90" alt="Darkened Image">
                        <div class="absolute inset-0 bg-black opacity-40 z-20"></div>
                    </div>
                    <div class="absolute top-44 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30">
                        <img src="assets/logo1.png" class="w-64" alt="Logo">
                    </div>
                </div>

                {{-- Right Panel --}}
                <div class="bg-orange-400 flex-1 py-7">
                    <form wire:submit="login" class="p-4 w-full h-full flex flex-col items-center justify-between">
                        <div class="flex flex-col items-center">
                            <h1 class="font-montserrat italic text-white font-black text-4xl default-shadow mb-4 text-center">
                                Downshift Supply
                            </h1>
                            <h3 class="font-montserrat text-white default-shadow text-lg">
                                Welcome! Let&#39;s get started!
                            </h3>
                        </div>
                        <x-auth-session-status class="mb-4 bg-white p-1 px-2 rounded-md text-green-500" :status="session('status')" />
                        <x-auth-session-status class="mb-4 bg-red-500 p-1 px-2 rounded-md text-white" :status="session('tncDecline')" />

                        <div class="w-full flex flex-col items-center">
                            @if (session('message'))
                            <div class="mb-4 bg-green-500 p-1 px-2 rounded-md text-white">
                                {{ session('message') }}
                            </div>
                            @endif
                            <input wire:model="form.email" name="email" required class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2" type="email" placeholder="E-mail" autocomplete="email" autofocus>
                            <x-input-error :messages="$errors->get('email')" />
                            <input required wire:model="form.password" name="password" autocomplete="current-password" class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3" type="password" placeholder="Password">
                            <x-input-error :messages="$errors->get('password')" />

                            <label class="font-montserrat text-white text-sm my-2 justify-start text-left inline-flex items-center w-90" for="rememberMe">
                                <input wire:model="form.remember" type="checkbox" name="remember" class="mr-2 rounded" id="rememberMe">
                                Remember Me
                            </label>


                            @if (Route::has('password.request'))
                            <a class="mt-2 font-montserrat text-white text-sm tracking-wider hover:underline" href="{{ route('password.request') }}">Forgot&nbsp;Password?</a>
                            @endif
                        </div>
                        {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}
                        <x-auth-button class="sm-40 md:w-60">LOG IN</x-auth-button>
                        <a href="{{ route('register') }}" class="no-underline tracking-wider text-white font-montserrat hover:underline">Not
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
            <form wire:submit="login">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div class="w-full flex flex-col items-center mt-20">
                    <input wire:model="form.email" name="email" required class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2 w-full h-14" type="email" placeholder="E-mail" autocomplete="email" autofocus>
                    <x-input-error :messages="$errors->get('email')" />
                    <input required wire:model="form.password" name="password" autocomplete="current-password" class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3 w-full h-14" type="password" placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" />

                    <label class="font-montserrat text-black text-sm my-2 justify-start text-left inline-flex items-center w-90" for="rememberMe">
                        <input wire:model="form.remember" type="checkbox" name="remember" class="mr-2 rounded" id="rememberMe">
                        Remember Me
                    </label>


                    @if (Route::has('password.request'))
                    <a class="mt-2 font-montserrat text-sm tracking-wider hover:underline" href="{{ route('password.request') }}">Forgot&nbsp;Password?</a>
                    @endif
                </div>
                {{-- <button class="font-montserrat bg-orange-500" type="button">LOG IN</button> --}}
                <button class="sm-40 md:w-60 w-full text-white bg-orange-400 h-14 w-35 rounded text-2xl text-spacing font-bold mt-20">LOG
                    IN</button>
                <a href="{{ route('register') }}" class="no-underline tracking-wider font-montserrat hover:underline font-medium text-gray-700 flex justify-center mt-28">Not
                    signed up
                    yet?&nbsp;<span class="underline ">Sign
                        up</span></a>
            </form>
        </div>
    </div>
</div>