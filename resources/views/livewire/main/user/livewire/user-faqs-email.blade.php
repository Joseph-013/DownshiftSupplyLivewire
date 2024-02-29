<ul class="flex flex-col md:flex-row w-full my-2">
    <li class="w-1/4 text-left text-sm ">
        <span class="font-medium mt-1">Do you have further questions?</span> <br>
        Send email for additional inquiries <br class="hidden md:inline"><br class="hidden md:inline"><br
            class="hidden md:inline"><br class="hidden md:inline">
        <span class="text-xs">
            Emails will be sent to the customer
            service. <br>Expect a reply in 2-3 business days. We deeply appreciate your
            patience.
            Thank you.
        </span>
    </li>
    <li class="w-3/4 h-full px-3 overflow-y-auto border p-2" id="faqs-email-container">
        <form wire:submit.prevent="send">
            <div class="mb-1">
                <input type="text" required name="name" wire:model="name" placeholder="Name"
                    class="w-full px-3 py-2 border rounded-md text-xs" @guest disabled @endguest>
                <x-input-error :messages="$errors->get('name')" class="mt-2 w-fit" />
            </div>
            <div class="mb-1">
                <input type="email" required name="email" wire:model="email" placeholder="Email"
                    class="w-full px-3 py-2 border rounded-md text-xs" @guest disabled @endguest>
                <x-input-error :messages="$errors->get('email')" class="mt-2 w-fit" />
            </div>
            <div>
                <textarea name="inquiry" required wire:model="inquiry" placeholder="Your inquiry"
                    class="w-full px-3 py-2 border rounded-md resize-none text-xs" rows="4" @guest disabled @endguest></textarea>
                <x-input-error :messages="$errors->get('inquiry')" class="mt-2 w-fit" />
            </div>
            <div class="w-full mt-1 flex flex-row justify-end ">
                <div>{{ session('sendStatus') }}</div>
                <button type="submit"
                    class="h-8 w-35 px-20 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing"
                    @guest disabled @endguest>
                    Send Inquiry
                </button>

            </div>

        </form>
    </li>

</ul>
