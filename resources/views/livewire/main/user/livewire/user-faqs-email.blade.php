<ul class="flex flex-row w-full my-2">
    <li class="w-1/4 text-left text-sm ">
        <span class="font-medium mt-1">Do you have further questions?</span> <br>
        Send email for additional inquiries <br><br><br><br>
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
                    class="w-full px-3 py-2 border rounded-md text-xs">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1">
                <input type="email" required name="email" wire:model="email" placeholder="Email"
                    class="w-full px-3 py-2 border rounded-md text-xs">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <textarea name="inquiry" required wire:model="inquiry" placeholder="Your inquiry"
                    class="w-full px-3 py-2 border rounded-md resize-none text-xs" rows="4"></textarea>
                @error('inquiry')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full mt-1 flex justify-end ">

                {{-- <div class="alert alert-success">
                    {{ session('test') }}
                </div> --}}

                <button type="submit"
                    class="h-8 w-35 px-20  flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                    Send Inquiry
                </button>

            </div>

        </form>
    </li>

</ul>
