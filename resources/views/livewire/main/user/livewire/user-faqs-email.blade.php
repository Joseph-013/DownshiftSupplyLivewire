<ul class="flex flex-col md:flex-row w-full my-2">
    <li class="w-full md:w-1/4 text-left text-sm">
        <span class="font-medium mt-1">Do you have further questions?</span> <br>
        Send email for additional inquiries <br class="hidden md:inline"><br class="hidden md:inline"><br
            class="hidden md:inline"><br class="hidden md:inline">
        <span class="text-xs">
            Emails will be sent to the customer
            service. <br class="hidden md:block" />Expect a reply in 2-3 business days. We deeply appreciate your
            patience.
            Thank you.
        </span>
    </li>
    <li class="w-full md:w-3/4 h-full px-3 overflow-y-auto border p-2" id="faqs-email-container">
        <form wire:submit.prevent="send">
            <div class="mb-2 text-start text-sm">
                Name:&nbsp;&nbsp;@auth
                    {{ Auth::user()->fullname }}
                @endauth
                @guest
                    {{ '--' }}
                @endguest
            </div>
            {{-- <div class="mb-1">
                <input type="email" class="w-full px-3 py-2 border rounded-md text-xs text-gray-500" disabled
                    @auth
value="{{ Auth::user()->email }}" @endauth>
            </div> --}}
            <div class="mb-3 text-start text-sm">
                Email:&nbsp;&nbsp;@auth
                    {{ Auth::user()->email }}
                @endauth
                @guest
                    {{ '--' }}
                @endguest
            </div>
            <div>
                <textarea name="inquiry" required wire:model="inquiry" placeholder="Your inquiry (Max: 500)"
                    class="w-full px-3 py-2 border rounded-md resize-none text-xs" rows="4" @guest disabled @endguest></textarea>
                <x-input-error :messages="$errors->get('inquiry')" class="mt-2 w-fit" />
            </div>
            <div class="w-full mt-1 flex flex-row justify-end ">
                <div>{{ session('sendStatus') }}</div>
                <button type="submit"
                    class="h-8 w-35 px-20 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing"
                    @guest disabled @endguest>
                    Send Inquiry
                    <img wire:loading wire:target="send" src="{{ asset('assets/loading.gif') }}" alt="please wait..."
                        class="h-4 w-4 ml-2" />
                </button>

            </div>

        </form>
    </li>

</ul>
