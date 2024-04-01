<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>

    <div class="bg-gray-100 p-3 rounded-lg relative z-10 border" id="itemTemplate">
        @if ($mode == 'read')
            <table class="w-full text-left">
                <tr class="h-9">
                    <th colspan="2" class="text-center font-semibold">Transaction Details</th>
                </tr>
                <tr class="h-9">
                    <td class="w-6/12">Transaction ID:</td>
                    <td class="w-6/12">{{ $id }}</td>
                </tr>
                <tr class="h-9">
                    <td>Full Name:</td>
                    <td>{{ $firstName . ' ' . $lastName }}
                    </td>
                </tr>
                <tr class="h-9">
                    <td>Contact Number:</td>
                    <td>{{ $contact }}</td>
                </tr>
            </table>
            @if ($details)
                <hr class="my-3" />
                <table class="w-full text-xs text-center font-bold">
                    <tr class="h-8">
                        <td class="w-2/12"></td>
                        <td class="w-3/12 text-left">Item Name</td>
                        <td class="w-3/12">Price</td>
                        <td class="w-1/12 text-left">Qty</td>
                        <td class="w-3/12 text-left">Subtotal</td>
                    </tr>
                </table>
                <div class="max-h-44 overflow-y-auto">
                    <table class="w-full text-xs text-center">
                        @foreach ($details as $detail)
                            <tr class="h-full">
                                <td class="w-2/12"><img
                                        src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}"
                                        class="w-14 h-14 rounded"></td>
                                <td class="w-3/12 text-left">{{ $detail->products->name }}</td>
                                <td class="w-3/12">{{ number_format($detail->products->price, 2) }}</td>
                                <td class="w-1/12">{{ $detail->quantity }}</td>
                                <td class="w-3/12">{{ number_format($detail->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            <div class="columns-2 mt-6 w-full">
                <div class="flex justify-center">
                    <button wire:click="deleteConfirm"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Delete
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center">
                    <button wire:click="modifyTrans"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Modify
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </button>
                </div>
            </div>
        @elseif ($mode == 'write')
            <div class="w-[37rem]">
                <form
                    @if ($transaction) wire:submit.prevent="editTrans"
                @else
                    wire:submit.prevent="createTrans" @endif>
                    <table class="text-left border-spacing-x-2">
                        <tr>
                            <th colspan="2">
                                Item Details
                            </th>
                        </tr>
                        <tr class="h-11">
                            <td>
                                <div class="flex flex-col sm:w-[18rem] w-full">
                                    <div class="">
                                        First Name:
                                    </div>
                                    <input wire:model="firstName" type="text" class="rounded">
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-col sm:w-[18rem] w-full">
                                    <div class="">
                                        Last Name:
                                    </div>
                                    <input wire:model="lastName" type="text" class="rounded">
                                </div>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td>
                                <div class="flex flex-col w-full">
                                    <div class="">
                                        Contact Number:
                                    </div>
                                    <input wire:model="contact" type="number" inputmode="numeric" class="rounded">
                                    <style>
                                        /* Hide spinner arrows for Chrome, Edge, and Safari */
                                        input[type=number]::-webkit-inner-spin-button,
                                        input[type=number]::-webkit-outer-spin-button {
                                            -webkit-appearance: none;
                                            margin: 0;
                                        }

                                        /* Hide spinner arrows for Firefox */
                                        input[type=number] {
                                            -moz-appearance: textfield;
                                        }
                                    </style>


                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <div class="flex flex-row">
                        <div class="flex flex-col text-left sm:w-1/2">
                            Item:
                            <div class="w-full">
                                <button wire:click="findItemTemplate" type="button"
                                    class="h-10 px-3 flex-1 items-center justify-center rounded-lg bg-sky-600 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                    Find Item
                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col text-left sm:w-1/2 ml-18">
                            Quantity:
                            <div class="w-full">
                                <input wire:model="quantity" type="number" name="quantity"
                                    class="rounded sm:w-[18rem] w-full" required>
                            </div>
                        </div>
                    </div>

                    <div class="columns-2 mt-2">
                        <div class="flex justify-center">
                            <button type="button" wire:click="cancel"
                                class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                Cancel
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                                Save
                                <svg class="ml-2"xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                    <path d="M11 2H9v3h2z" />
                                    <path
                                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                                </svg>
                            </button>
                        </div>
                    </div>
            </div>
            <div class="h-auto max-h-40 overflow-y-auto md:max-w-[38rem] ">
                <table class="w-full text-center ">
                    <tr>
                        <th class="w-2/12"></th>
                        <th class="w-5/12 text-left">Item Name</th>
                        <th class="w-2/12">Price</th>
                        <th class="w-1/12">Qty</th>
                        <th class="w-2/12">Subtotal</th>
                    </tr>
                    @if ($details)
                        @foreach ($details as $detail)
                            <tr>
                                <td>
                                    <img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}"
                                        class="w-14 h-14 rounded">
                                </td>
                                <td class="line-clamp-3 text-left">{{ $detail->products->name }}</td>
                                <td>{{ $detail->products->price }}</td>
                                <td><input class="w-11/12" type="number" value="{{ $detail->quantity }}" wire:model="quantities.{{ $detail->id }}" wire:change="updateExistingQuantity({{ $detail->id }}, $event.target.value)"></td>
                                <td>{{ $detail->subtotal }}</td>
                                <td>
                                    <button wire:click="removeDetail({{ $detail->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    @if ($tempDetails)
                        @foreach ($tempDetails as $index => $tempDetail)
                            <tr>
                                <td>
                                    <img src="{{ filter_var($tempDetail['image'], FILTER_VALIDATE_URL) ? $tempDetail['image'] : asset('storage/assets/' . $tempDetail['image']) }}"
                                        class="w-14 h-14 rounded">
                                </td>
                                <td class="text-left">{{ $tempDetail['name'] }}</td>
                                <td>{{ $tempDetail['price'] }}</td>
                                <td><input class="w-11/12" type="number" wire:model="tempDetails.{{ $index }}.quantity" wire:change="updateQuantity({{ $tempDetail['id'] }}, $event.target.value)"></td>
                                <td>{{ $tempDetail['subtotal'] }}</td>
                                <td>
                                    <button wire:click="removeItem({{ $tempDetail['id'] }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </table>
            </div>
        @endif
        </form>
    </div>


    {{-- Overlay List --}}
    @if ($findItemTemp)
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
            <div class="absolute inset-0 bg-black opacity-50 z-20" wire:click="hideItemFindList"></div>

            <div class="size-10 bg-white z-30 w-96 p-2 h-max rounded-lg">
                <div class="w-full text-center">Find Item:</div>
                <form id="searchForm" wire:submit.prevent="submitSearch" class="flex flex-row">
                    <div class="flex flex-row w-full my-1 mb-2">
                        <input wire:model="search" name="search" id="searchInput"
                            class="flex-1 focus:border-orange-500 outline-none rounded-s-lg border-gray-500 border-l-2 border-t-2 border-b-2 border-e-0 h-full"
                            type="text" />
                        <button type="button" wire:click.prevent="clearSearch"
                            class="rounded-e-lg border-gray-500 border-r-2 border-t-2 border-b-2  h-10 w-10 flex items-center justify-center">
                            <svg style="color: gray;" xmlns="http://www.w3.org/2000/svg" width="16"
                                fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                            </svg>
                        </button>
                        <button type="submit"
                            class="ml-1 rounded-lg border-gray-500 border-2 px-2 text-sm hover:bg-gray-200 flex items-center h-10">
                            <svg class="feather feather-search" fill="none" height="18" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" x2="16.65" y1="21" y2="16.65" />
                            </svg>
                        </button>
                    </div>

                </form>
                <div class="w-full h-80 overflow-y-auto text-sm">
                    <table class="w-full">
                        @foreach ($products as $product)
                            <tr class="border-black border-1">
                                <td class="mr-4 text-left pl-1">{{ $product->name }}</td>
                                <td class=""><button wire:click="addItem({{ $product->id }})"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                                        </svg></button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    @endif
</div>
