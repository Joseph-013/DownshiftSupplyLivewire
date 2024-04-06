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
    public bool $accepted = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        if (!$this->accepted) {
            abort(403, 'ILLEGAL ACCESS');
        }
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'fullname' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]/'],
            'password' => ['required', 'string', 'confirmed', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9])[\w\W]{8,}$/'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user); // do not login user

        // $this->redirect(RouteServiceProvider::HOME, navigate: true); //check redirect to login
        $this->redirect(route('login'), navigate: true);
    }

    public function accept($value)
    {
        if ($value == false) {
            $this->accepted = false;
            Session::flash('tncDecline', 'Terms & Conditions and/or Data Privacy declined.');
            $this->redirectRoute('login', navigate: true);
        } else {
            $this->accepted = true;
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
                            <div class="text-white text-sm mt-1 font-montserrat italic">
                                Requirements:
                                <br />
                                • Must be a minimum of 8 characters
                                <br />
                                • Must include at least 1 number
                                <br />
                                • Must include at least 1 special character
                                <br />
                                • Must include at least 1 capital letter
                            </div>

                            {{-- Confirm New Pass --}}
                            <input required wire:model="password_confirmation" name="password_confirmation"
                                class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-4 mb-3"
                                type="password" placeholder="Confirm Password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>
                        {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}
                        <div class="w-full flex flex-row justify-center items-center">
                            <x-auth-button class="sm-40 md:w-60" type="submit">
                                SIGN UP
                                <img wire:loading wire:target="register" src="{{ asset('assets/loading.gif') }}"
                                    alt="please wait..." class="h-5 w-5 ml-2" />
                            </x-auth-button>
                            <div class="ml-4">

                            </div>
                        </div>

                        <a href="{{ route('login') }}"
                            class="no-underline tracking-wider text-white font-montserrat hover:underline">Already
                            signed up?&nbsp;<span class="underline font-semibold">Log in</span></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="sm:hidden">
            <div class="font-montserrat text-orange-400 text-4xl default-shadow mb-4 text-center mt-14">
                Downshift Supply
            </div>
            <div class="font-montserrat text-gray-700 text-lg default-shadow mb-4 text-center mt-5">
                Welcome! Let's get started.
            </div>
            <form wire:submit="register">
                <div class="w-full flex flex-col items-center">
                    {{-- Email --}}
                    <input required wire:model="email" name="email"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 my-2 w-full mt-8"
                        type="email" placeholder="E-mail" autocomplete="email" autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    {{-- Name --}}
                    <input required wire:model="username" name="username"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3 w-full"
                        type="text" placeholder="Username">
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />

                    {{-- Name --}}
                    <input required wire:model="fullname" name="fullname"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3 w-full"
                        type="text" placeholder="Full Name">
                    <x-input-error :messages="$errors->get('fullname')" class="mt-2" />

                    {{-- New Pass --}}
                    <input required wire:model="password" name="password"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-2 mb-3 w-full"
                        type="password" placeholder="Password" autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class=" text-sm mt-1 font-montserrat italic text-gray-600 ">
                        Requirements:
                        <br />
                        &nbsp;&nbsp;• Must be a minimum of 8 characters
                        <br />
                        &nbsp;&nbsp;• Must include at least 1 number
                        <br />
                        &nbsp;&nbsp;• Must include at least 1 special character
                        <br />
                        &nbsp;&nbsp;• Must include at least 1 capital letter
                    </div>

                    {{-- Confirm New Pass --}}
                    <input required wire:model="password_confirmation" name="password_confirmation"
                        class="font-montserrat default-shadow border-none rounded-md shadow-inner sm-40 md:w-80 mt-4 mb-3 w-full"
                        type="password" placeholder="Confirm Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                </div>
                {{-- <button class="font-montserrat" type="button">LOG IN</button> --}}
                <div class="w-full flex flex-row justify-center items-center">
                    <button
                        class="sm-40 md:w-60 w-full text-white bg-orange-400 h-14 w-35 rounded text-2xl text-spacing font-bold mt-10"
                        type="submit">
                        SIGN UP
                        <img wire:loading wire:target="register" src="{{ asset('assets/loading.gif') }}"
                            alt="please wait..." class="h-5 w-5 ml-2" />
                    </button>
                    <div class="ml-4">

                    </div>
                </div>

                <a href="{{ route('login') }}"
                    class="no-underline tracking-wider font-montserrat hover:underline font-medium text-gray-700 flex justify-center mt-16">Already
                    signed up?&nbsp;<span class="underline font-semibold">Log in</span></a>
            </form>
        </div>

    </div>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Tabs -->
            <div class="tabs flex justify-center px-10">
                <button class="font-semibold tablinks active w-1/2 rounded mx-5"
                    onclick="openTab(event, 'terms')">Terms
                    and Conditions</button>
                <button class="font-semibold tablinks w-1/2 rounded mx-5" onclick="openTab(event, 'privacy')">Data
                    Privacy Policy</button>
            </div>
            <!-- Tab content -->
            <div id="terms" class="tabcontent active">
                <div class="terms-and-conditions">
                    <span style="font-size: 30px; font-weight: bold; letter-spacing: 1.2px;">Terms and
                        Conditions</span>
                </div>


                <div class="last-updated mb-4">
                    <span style="color: #666;">Last updated November 11, 2023</span>
                </div>
                <div class="w-full h-96 overflow-y-auto flex-row px-2 pr-4 text-justify" id="terms-container">
                    <div class="my-2">
                        <span style="font-size: 18px; font-weight: bold;">Welcome to Downshift Supply!</span>
                    </div>

                    <div class="my-2 text-sm">
                        <span style="color: #666; ">These terms and conditions outline the rules and regulations for
                            the
                            use of Downshift Supply's Website, located at https://www.downshiftsupply.store <br> <br>

                            By accessing this website, we assume you accept these terms and conditions. Do not continue
                            to use Downshift Supply if you do not agree to take all of the terms and conditions stated
                            on this page.</span>
                    </div>

                    <div class="my-4">
                        <span style="color: #666; ">License</span>
                    </div>

                    <div class="my-3 text-sm">
                        <span style="color: #666; ">Unless otherwise stated, Downshift Supply and/or its licensors own
                            the intellectual property rights for all material on Downshift Supply. <br> <br>

                            You must not:</span>
                    </div>

                    <div class="my-3 text-sm pl-3">
                        <span style="color: #666; ">Republish material from Downshift Supply <br>
                            Sell, rent, or sub-license material from Downshift Supply <br>
                            Reproduce, duplicate, or copy material from Downshift Supply <br>
                            Redistribute content from Downshift Supply<br></span>


                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">This Agreement shall begin on the date hereof.</span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Cancellation Policy: <br>
                            <div class="pl-3 my-2">Once an order is placed and payment is transferred, it cannot be
                                canceled. We do not entertain cancellations after payment confirmation.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Google Maps API:<br>
                            <div class="pl-3 my-2">Users can interact with the Google Maps API to view the store
                                location and set the delivery address for orders. Users must accurately pin their
                                delivery address location.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Email API:<br>
                            <div class="pl-3 my-2">The Email API is utilized for user inquiries about products and
                                communication with the owner.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Data Usage and Privacy:<br>
                            <div class="pl-3 my-2">No user information will be shared with the Google Maps API and
                                Email
                                API providers.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Hyperlinking to our Content:<br>
                            <div class="pl-3 my-2">Approved organizations may hyperlink to our Website as follows:
                            </div>
                            <div class="pl-6 my-2">
                                By use of our corporate name; or <br>
                                By use of the uniform resource locator being linked to; or <br>
                                By use of any other description of our Website being linked to that makes sense within
                                the context and format of content on the linking party's site.
                            </div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">No use of Downshift Supply's logo or other artwork will be allowed
                            for linking absent a trademark license agreement.<br>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">iFrames:<br>
                            <div class="pl-3 my-2">Without prior approval and written permission, you may not create
                                frames around our Webpages that alter in any way the visual presentation or appearance
                                of our Website.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Content Liability:<br>
                            <div class="pl-3 my-2">We shall not be held responsible for any content that appears on
                                your Website. You agree to protect and defend us against all claims that are rising on
                                your Website. No link(s) should appear on any Website that may be interpreted as
                                libelous, obscene, or criminal, or which infringes, otherwise violates, or advocates the
                                infringement or other violation of, any third party rights.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Reservation of Rights:<br>
                            <div class="pl-3 my-2">We reserve the right to request that you remove all links or any
                                particular link to our Website. You approve to immediately remove all links to our
                                Website upon request. We also reserve the right to amend these terms and conditions and
                                its linking policy at any time. By continuously linking to our Website, you agree to be
                                bound to and follow these linking terms and conditions.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Removal of links from our website:<br>
                            <div class="pl-3 my-2">If you find any link on our Website that is offensive for any
                                reason, you are free to contact and inform us at any moment. We will consider requests
                                to remove links but we are not obligated to or so or to respond to you directly. <br>
                                <br>
                                We do not ensure that the information on this website is correct, we do not warrant its
                                completeness or accuracy; nor do we promise to ensure that the website remains available
                                or that the material on the website is kept up to date.
                            </div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Disclaimer:<br>
                            <div class="pl-3 my-2">To the maximum extent permitted by applicable law, we exclude all
                                representations, warranties, and conditions relating to our website and the use of this
                                website. Nothing in this disclaimer will:</div>
                            <div class="pl-6 my-2">
                                Limit or exclude our or your liability for death or personal injury; <br>
                                Limit or exclude our or your liability for fraud or fraudulent misrepresentation; <br>
                                Limit any of our or your liabilities in any way that is not permitted under applicable
                                law; or <br>
                                Exclude any of our or your liabilities that may not be excluded under applicable law.

                            </div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">The limitations and prohibitions of liability set in this Section
                            and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern
                            all liabilities arising under the disclaimer, including liabilities arising in contract, in
                            tort, and for breach of statutory duty.<br> <br> <br>
                            As long as the website and the information and services on the website are provided free of
                            charge, we will not be liable for any loss or damage of any nature.
                        </span>
                    </div>


                </div>

                <!-- More terms and conditions content here -->
            </div>


            <div id="privacy" class="tabcontent">
                <div class="terms-and-conditions">
                    <span style="font-size: 30px; font-weight: bold; letter-spacing: 1.2px;">Data Privacy Policy</span>
                </div>

                <div class="last-updated mb-4">
                    <span style="color: #666;">Last updated November 11, 2023</span>
                </div>

                <div class="w-full h-96 overflow-y-auto flex-row px-2 pr-4 text-justify" id="terms-container">
                    <div class="my-2">
                        <span style="font-size: 18px; font-weight: bold;">Introduction:</span>
                    </div>

                    <div class="my-2 text-sm">
                        <span style="color: #666; ">The purpose of collecting personal information on our ecommerce
                            website is for identification and communication.
                            <br> <br>
                            The collected data is used by our business through forms.
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Types of Data Collected:<br>
                            <div class="pl-3 my-2">We collect the following personal information from users: name,
                                address, contact number, payment information, and email. We do not collect sensitive
                                information such as credit card details or social security numbers.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Legal Basis for Data Processing:<br>
                            <div class="pl-3 my-2">The legal basis for processing personal data is consent.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Data Collection Methods:<br>
                            <div class="pl-3 my-2">User data is collected through website forms.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Cookies and Tracking:<br>
                            <div class="pl-3 my-2">We do not use cookies or other tracking technologies.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Purpose of Data Processing:<br>
                            <div class="pl-3 my-2">The collected data is used for order processing, identification,
                                account management, and customer support.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Data Sharing:<br>
                            <div class="pl-3 my-2">We do not share user data with third parties. Data is only stored on
                                databases from third-party services.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Data Security:<br>
                            <div class="pl-3 my-2">User data is not disclosed to the public and is kept private to the
                                owner. As a small business, there are currently no specific data breach countermeasures
                                in place.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Data Retention:<br>
                            <div class="pl-3 my-2">User data is retained indefinitely.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">User Rights:<br>
                            <div class="pl-3 my-2">Users have the right to view their input information. They can only
                                change their username and full name information. These features are included in the app.
                            </div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666; ">Updates to the Privacy Policy:<br>
                            <div class="pl-3 my-2">Users are notified of changes to the privacy policy during the data
                                privacy policy agreement process, which is redone before login. The privacy policy is
                                reviewed and updated seldomly, approximately once every two years.</div>
                        </span>
                    </div>

                    <div class="my-4 text-sm">
                        <span style="color: #666;">Contact Information:<br>
                            <div class="pl-3 my-2">You may only send us e-mail messages for privacy-related inquiries
                                or concerns if you agree to create the account and fill the embedded e-mail forms
                                afterwards.</div>
                        </span>
                    </div>


                </div>

            </div>
            <!-- Buttons -->
            <div class="buttons flex justify-center px-10">
                <button wire:click="accept(false)"
                    class="decline h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing mb-5">
                    Decline

                </button>
                <button wire:click="accept(true)"
                    class="accept h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing mb-5">
                    Accept

                </button>
            </div>
        </div>
    </div>

    <!-- Existing code -->
    <!-- <div class="h-full overflow-hidden">

    </div> -->

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the buttons
        var declineBtn = modal.querySelector(".decline");
        var acceptBtn = modal.querySelector(".accept");

        // Open the modal when the page is accessed
        window.onload = function() {
            modal.style.display = "block";
        }

        // When the user clicks on Decline button
        declineBtn.onclick = function() {
            // Handle decline action here
            modal.style.display = "none"; // Close the modal
        }

        // When the user clicks on Accept button
        acceptBtn.onclick = function() {
            // Handle accept action here
            modal.style.display = "none"; // Close the modal
        }

        // Function to open a specific tab
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>


</div>
