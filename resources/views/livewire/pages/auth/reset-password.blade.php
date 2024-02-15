<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
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
                    <div class="p-4 w-full h-full flex flex-col items-center justify-between">
                        <div class="flex flex-col items-center">
                            <h1 class="font-montserrat italic text-white font-black text-4xl default-shadow mb-4 text-center">
                                Downshift Supply
                            </h1>
                            <h3 class="font-montserrat text-white default-shadow text-lg">
                                Welcome! Let&#39;s get started!
                            </h3>
                        </div>
                        <div>
                            <form wire:submit="resetPassword" class="mt-[-25rem] w-full">
                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" class="font-semibold sm-40 md:w-80 "/>
                                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4 w-full">
                                    <x-input-label for="password" :value="__('Password')" class="block font-semibold" />
                                    <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                                    <x-input-error :messages="$errors->get('password')" class="block mt-2 w-full ml-[-0.045rem]" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4 w-full">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block w-full" />

                                    <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="block mt-2 w-full ml-[-0.045rem]" />
                                </div>


                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="w-full text-center justify-center py-2 h-10 font-montserrat">
                                        {{ __('Reset Password') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>