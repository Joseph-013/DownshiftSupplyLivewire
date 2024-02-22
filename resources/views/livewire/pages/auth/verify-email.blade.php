<?php

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirect(
                // logout then
                session('url.intended', RouteServiceProvider::HOME), //redirect to login
                navigate: true,
            );

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
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
                    <form class="p-4 w-full h-full flex flex-col items-center justify-between">
                        <div class="flex flex-col items-center">
                            <h1
                                class="font-montserrat italic text-white font-black text-4xl default-shadow mb-4 text-center">
                                Downshift Supply
                            </h1>
                            <h3 class="font-montserrat text-white default-shadow text-lg">
                                Welcome! Let&#39;s get started!
                            </h3>
                            <div>
                                <div
                                    class="mt-20 text-sm text-white font-medium font-montserrat px-4 mx-5 text-justify">
                                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                    <div
                                        class="mt-5 text-sm text-white font-medium font-montserrat px-4 mx-5 text-justify">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </div>
                                @endif

                                <div class="mt-4 flex items-center justify-between  ml-8">
                                    <button wire:click="sendVerification"
                                        class=" h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-white ml-3 border-1 border-black text-black text-xs font-semibold text-spacing mb-5">
                                        {{ __('RESEND VERIFICATION EMAIL') }}
                                    </button>

                                    <button wire:click="logout" type="submit"
                                        class="h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-red-500 ml-3 border-1 border-black text-white text-xs font-semibold text-spacing mb-5">
                                        {{ __('LOG OUT') }}
                                    </button>
                                </div>

                                <div class="my-4 flex items-center justify-between ml-7 ">

                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
