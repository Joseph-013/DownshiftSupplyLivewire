<ul class="flex flex-col md:flex-row w-full my-2">
    <li class="w-full md:w-1/4 text-left text-sm">
        <span class="font-medium mt-1">Do you have further questions?</span> <br>
        Send email for additional inquiries <br /><br />
        <span class="text-xs text-red-500">
            Emails will be sent to the customer
            service. <br class="hidden md:block" />Expect a reply in 2-3 business days. For returns, customer service
            will include instructions <br class="hidden md:block" />for your return process. We deeply appreciate your
            patience.
            Thank you.
        </span>
    </li>

    {{-- faqs-email-container --}}
    <li class="w-full md:w-3/4 h-full px-3 overflow-y-auto border p-2" id="">
        <form wire:submit.prevent="send">
            <div class="mb-2 text-start text-sm">
                Name:&nbsp;&nbsp;@auth
                    {{ Auth::user()->fullname }}
                @endauth
                @guest
                    {{ '--' }}
                @endguest
            </div>
            <div class="mb-2 text-start text-sm">
                Email:&nbsp;&nbsp;@auth
                    {{ Auth::user()->email }}
                @endauth
                @guest
                    {{ '--' }}
                @endguest
            </div>
            <div class="mb-3 text-start text-sm">
                <span class="mr-2">Subject:</span>
                <select class="rounded-lg h-10 w-36" required wire:model='subject'
                    wire:change='updateSubject($event.target.value)'>
                    <option value="" disabled selected hidden> - select - </option>
                    {{-- Maybe pa add ng error handling sa placeholder --}}
                    <option value="inquiry">Inquiry</option>
                    <option value="return">Return</option>
                </select>
                @if ($subject == 'return')
                    <div class="ml-4 my-2 text-gray-500">
                        <span class="italic">Please make sure to follow the email format:<br />
                            Order Number/Id: [Order Id]<br />
                            Defective Product/s: [Defective Product/s]<br />
                            Details: [Details]
                        </span>
                        <br />
                        <br />
                    </div>
                @endif
                <x-input-error :messages="$errors->get('subject')" class="mt-2 w-fit" />
            </div>
            <div>
                <textarea name="inquiry" required wire:model="inquiry"
                    placeholder="{{ $subject == 'return' ? 'Your return inquiry' : 'Your inquiry' }} (Max: 500)"
                    class="w-full px-3 py-2 border rounded-md resize-none text-xs" rows="10" @guest disabled @endguest></textarea>
                <x-input-error :messages="$errors->get('inquiry')" class="mt-2 w-fit" />
            </div>
            <div class="w-full mt-1 flex flex-row justify-end ">
                <div>{{ session('sendStatus') }}</div>
                <button type="submit"
                    class="h-8 w-35 px-20 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing"
                    @guest disabled @endguest>
                    Send
                    <img wire:loading wire:target="send" src="{{ asset('assets/loading.gif') }}" alt="please wait..."
                        class="h-4 w-4 ml-2" />
                </button>

            </div>

        </form>
    </li>

</ul>
