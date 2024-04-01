<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border min-w-max">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>

    <div class="bg-gray-100 p-6 rounded-lg relative z-10 border" id="itemTemplate">
        <div class="w-full flex justify-end px-2 z-20 absolute -left-6">
            <button wire:click="dispatch('hideItemTemplate')">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="gray"
                    class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
            </button>
        </div>
        @if ($mode == 'read')
            <div class="w-full overflow-y-auto" style="max-height: 28rem;">
                <table class="border-separate border-spacing-2">
                    <tr>
                        <th colspan="3" class="text-center">
                            Transaction Details
                        </th>
                    </tr>
                    <tr>
                        <td>Id:</td>
                        <td class="text-left">{{ $id }}</td>
                        <th class="text-center hidden sm:table-cell">Proof of Payment</th>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td class="text-left">{{ $date }}</td>
                        <td rowspan="{{ $preferredService == 'Delivery' ? 10 : 6 }}"
                            class="border border-black w-52 hidden sm:table-cell">
                            <div class="w-full h-full flex justify-center items-center">
                                <img class="rounded-md object-cover w-full h-auto"
                                    src="{{ filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/assets/' . $image) }}"
                                    alt="proof of payment">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td class="text-left">
                            <div class="w-full max-w-52">
                                {{ $firstName }} {{ $lastName }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact #:</td>
                        <td class="text-left">{{ $contact }}</td>
                    </tr>
                    <tr>
                        <td>Payment Opt:</td>
                        <td class="text-left">{{ $paymentOption }}</td>
                    </tr>
                    <tr>
                        <td>Preferred Service:</td>
                        <td class="text-left">{{ $preferredService }}</td>
                    </tr>
                    @if ($preferredService == 'Delivery')
                        <tr>
                            <td>Address:</td>
                            <td class="text-left">
                                <div class="w-full max-w-52">
                                    {{ $shippingAddress }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Courier:</td>
                            <td class="text-left">{{ $courierUsed }}</td>
                        </tr>
                        <tr>
                            <td>Shipping Fee:</td>
                            <td class="text-left">{{ $shippingFee }}</td>
                        </tr>
                        <tr>
                            <td>Tracking #:</td>
                            <td class="text-left">{{ $trackingNumber }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Status:</td>
                        <td class="underline text-left">{{ $status }}</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td rowspan="9">Proof of<br />Payment:</td>
                        <td rowspan="9" class="border border-black w-52">
                            <div class="w-full h-full flex justify-center items-center">
                                PICTURE
                            </div>
                        </td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="table-row sm:hidden">
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <div class="w-full px-2 sm:px-10">
                    <table class="w-full border-separate border-spacing-y-3">
                        <tr>
                            <th colspan="3" class="text-center">Items Ordered:</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-left">
                                Item
                            </td>
                            <td class="text-center">
                                Qty
                            </td>
                        </tr>
                        @foreach ($details as $detail)
                            <tr>
                                <td class="w-2/12">
                                    <img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}"
                                        class="w-12 h-12 object-cover rounded" style="vertical-align: middle;">
                                </td>
                                <td class="w-9/12 text-left">
                                    <div class="w-full max-w-52">
                                        {{ $detail->products->name }}
                                    </div>
                                </td>
                                <td class="w-1/12">{{ $detail->quantity }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
            <div class="w-full flex justify-center mt-4">
                <button id="updateButton" wire:click="modifyTrans"
                    class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                    Modify
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg>
                </button>
            </div>
        @elseif ($mode == 'write')
            <form wire:submit.prevent="editTrans">
                <div class="w-full overflow-y-auto" style="max-height: 28rem;">
                    <table class="border-separate border-spacing-2">
                        <tr>
                            <th colspan="3" class="text-center">
                                Transaction Details
                            </th>
                        </tr>
                        <tr>
                            <td>Id:</td>
                            <td class="text-left">{{ $id }}</td>
                            <th class="text-center hidden sm:table-cell">Proof of Payment</th>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td class="text-left">{{ $date }}</td>
                            <td rowspan="{{ $preferredService == 'Delivery' ? 10 : 6 }}"
                                class="border border-black w-52 hidden sm:table-cell">
                                <div class="w-full h-full flex justify-center items-center">
                                    <img class="rounded-md object-cover w-full h-auto"
                                        src="{{ filter_var($image, FILTER_VALIDATE_URL) ? $image : asset('storage/assets/' . $image) }}"
                                        alt="proof of payment">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td class="text-left">
                                <div class="w-full max-w-52">
                                    {{ $firstName }} {{ $lastName }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Contact #:</td>
                            <td class="text-left">{{ $contact }}</td>
                        </tr>
                        <tr>
                            <td>Payment Opt:</td>
                            <td class="text-left">{{ $paymentOption }}</td>
                        </tr>
                        <tr>
                            <td>Preferred Service:</td>
                            <td class="text-left">{{ $preferredService }}</td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td class="underline text-left">
                                <select wire:model="status" class="rounded-lg h-10 w-full">
                                    @foreach ($statusOptions as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @if ($preferredService == 'Delivery')
                            <tr>
                                <td>Address:</td>
                                <td class="text-left">
                                    <div class="w-full max-w-52">
                                        {{-- <input id="autocomplete" wire:model="shippingAddress" type="text"
                                            class="rounded-lg h-9 w-full" required /> --}}
                                        <textarea rows="3" wire:model="shippingAddress" class="rounded-lg w-full"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Courier:</td>
                                <td class="text-left">
                                    <input id="autocomplete" wire:model="courierUsed" type="text"
                                        class="rounded-lg h-9 w-full" />
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping Fee:</td>
                                <td class="text-left">
                                    <input id="autocomplete" wire:model="shippingFee" type="number"
                                        class="rounded-lg h-9 w-full" min="0" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tracking #:</td>
                                <td class="text-left">
                                    <input id="autocomplete" wire:model="trackingNumber" type="text"
                                        class="rounded-lg h-9 w-full" />
                                </td>
                            </tr>
                        @endif
                        <tr class="table-row sm:hidden">
                            <td rowspan="9">Proof of<br />Payment:</td>
                            <td rowspan="9" class="border border-black w-52">
                                <div class="w-full h-full flex justify-center items-center">
                                    PICTURE
                                </div>
                            </td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="table-row sm:hidden">
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="w-full flex justify-center mt-4">
                    {{-- <button id="updateButton" wire:click="modifyTrans"
                        class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-blue-500 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                        Modify
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </button> --}}
                    <button type="submit"
                        class="h-9 px-5 flex flex-row items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing">
                        Save
                        <svg class="ml-2"xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                            <path d="M11 2H9v3h2z" />
                            <path
                                d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                        </svg>
                    </button>
                </div>
            </form>

            {{-- <form wire:submit.prevent="editTrans" class="h-full w-full flex flex-col">
                <table class="w-96">
                    <tr class="h-11">
                        <th colspan="2" class="text-center font-semibold">Transaction Details</th>
                    </tr>
                    @if ($transaction->preferredService === 'Delivery')
                        <tr class="h-11">
                            <td class="pe-3">Courier Used:</td>
                            <td><input wire:model="courierUsed" type="text" class="rounded-lg h-9 w-full" required>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Shipping Fee:</td>
                            <td><input wire:model="shippingFee" type="number" class="rounded-lg h-9 w-full" required>
                            </td>
                        </tr>
                        <tr class="h-11">
                            <td class="pe-3">Tracking Number:</td>
                            <td><input wire:model="trackingNumber" type="text" class="rounded-lg h-9 w-full"
                                    required>
                            </td>
                        </tr>
                    @endif
                    <tr class="h-11">
                        <td class="pe-3">Status:</td>
                        <td>
                            <select wire:model="status" class="rounded-lg h-10 w-full">
                                @foreach ($statusOptions as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <table class="mt-3">
                    <tr class="h-11">
                        <td colspan="1" class="text-center">Shipping Address:</td>
                    </tr>
                    <tr class="h-11">
                        <td>
                            <input id="autocomplete" wire:model="shippingAddress" type="text"
                                class="rounded-lg h-9 w-full" required></input>
                        </td>
                    </tr>
                </table>
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
            </form> --}}
        @endif
    </div>




</div>
{{-- @livewireScripts --}}
