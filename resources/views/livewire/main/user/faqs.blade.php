<x-app-layout>
    {{-- Showing User ORDERS page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    FAQs
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full mx-3">
                {{-- Right Panel border-2 border-black --}}
                <div class="w-full h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="w-full flex-row">
                            <!-- QUESTIONS AND ANSWERS -->
                            <ul class="flex flex-row w-full my-1">
                                <li class="w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Have some questions?</span> <br>
                                    Find your answers here
                                </li>
                                <li class="w-3/4 h-full px-3 overflow-y-auto border" id="faqs-container">
                                    <div class="grid grid-cols-2 gap-4 text-xs mt-2 px-2">
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                        <div class="text-left">
                                            <span class="font-medium">Question 1</span> <br>
                                            <span class="font-light">Answer</span>
                                        </div>
                                    </div>


                                </li>
                            </ul>
                            <!-- MAP -->
                            <ul class="flex flex-row w-full my-2">
                                <li class="w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Where can you find us?</span> <br>
                                    Be directed using this map
                                </li>
                                <li class="w-3/4 h-full px-3 border" id="faqs-container">
                                    <!-- MAP API HERE -->
                                </li>
                            </ul>
                            <!-- EMAIL -->
                            <ul class="flex flex-row w-full my-2">
                                <li class="w-1/4 text-left text-sm ">
                                    <span class="font-medium mt-1">Do you have further questions?</span> <br>
                                    Send email for additional inquiries <br><br><br><br>
                                    <span class="text-xs">
                                        Emails will be sent to the customer
                                        service. <br>Expect a reply in 2-3 business days. We deeply appreciate your patience.
                                        Thank you.
                                    </span>
                                </li>
                                <li class="w-3/4 h-full px-3 overflow-y-auto border p-2" id="faqs-email-container">
                                    <form>
                                        <div class="mb-1">
                                            <input type="text" name="name" placeholder="Name" class="w-full px-3 py-2 border rounded-md text-xs">
                                        </div>
                                        <div class="mb-1">
                                            <input type="email" name="email" placeholder="Email" class="w-full px-3 py-2 border rounded-md text-xs">
                                        </div>
                                        <div>
                                            <textarea name="inquiry" placeholder="Your inquiry" class="w-full px-3 py-2 border rounded-md resize-none text-xs" rows="4"></textarea>
                                        </div>
                                        <div class="w-full mt-1 flex justify-end ">
                                            <button type="reset" class="h-8 w-35 px-20  flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                                                Send Inquiry
                                            </button>

                                        </div>

                                    </form>
                                </li>

                            </ul>


                        </div>



                    </div>

                </div>




            </div>

        </div>
</x-app-layout>