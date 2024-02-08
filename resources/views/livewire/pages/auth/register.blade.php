<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $email = '';
    public string $username = '';
    public string $fullname = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
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
                    <form wire:submit="register" class="p-4 w-full h-full flex flex-col items-center justify-between">
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
                            {{-- Email --}}
                            <input required wire:model="email" name="email"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2"
                                type="email" placeholder="E-mail" autocomplete="email" autofocus>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            {{-- Name --}}
                            <input required wire:model="username" name="username"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3"
                                type="text" placeholder="Username">
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />

                            {{-- Name --}}
                            <input required wire:model="fullname" name="fullname"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3"
                                type="text" placeholder="Full Name">
                            <x-input-error :messages="$errors->get('fullname')" class="mt-2" />

                            {{-- New Pass --}}
                            <input required wire:model="password" name="password"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3"
                                type="password" placeholder="Password" autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <div class="text-white text-sm mt-1 font-montserrat italic">• Minimum of 8 characters</div>

                            {{-- Confirm New Pass --}}
                            <input required wire:model="password_confirmation" name="password_confirmation"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-4 mb-3"
                                type="password" placeholder="Confirm Password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>
                        {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}
                        <x-auth-button class="sm-40 md:w-60" type="submit">SIGN UP</x-auth-button>
                        <a href="{{ route('login') }}"
                            class="no-underline tracking-wider text-white font-montserrat hover:underline">Already
                            signed up?&nbsp;<span class="underline font-semibold">Log in</span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
