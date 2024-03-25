<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border min-w-max">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>
    <div class="bg-gray-100 p-6 rounded-lg relative z-10 border" id="itemTemplate">
        {{-- @if (!isset($product)) --}}
        <form wire:submit.prevent="editTrans" class="h-full w-full flex flex-col">
            <table class="w-96">
                <tr class="h-11">
                    <th colspan="2" class="text-center font-semibold">Transaction Details</th>
                </tr>
                @if($transaction->preferredService === "Delivery")
                <tr class="h-11">
                    <td class="pe-3">Courier Used:</td>
                    <td><input wire:model="courierUsed" type="text" class="rounded-lg h-9 w-full" required></td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Shipping Fee:</td>
                    <td><input wire:model="shippingFee" type="number" class="rounded-lg h-9 w-full" required></td>
                </tr>
                <tr class="h-11">
                    <td class="pe-3">Tracking Number:</td>
                    <td><input wire:model="trackingNumber" type="text" class="rounded-lg h-9 w-full" required>
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
                        <input id="autocomplete" wire:model="shippingAddress" type="text" class="rounded-lg h-9 w-full" required></input>
                    </td>
                </tr>
            </table>
            {{-- <div id="map" class="w-full h-52 my-2 p-2 border rounded-md border-black border-1"></div> --}}
            <div class="columns-2 mt-2">
                <div class="flex justify-center">
                    <button type="button" wire:click="cancel"
                        class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                        Cancel
                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708" />
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
        </form>
        {{-- @endif --}}

    </div>
</div>
@livewireScripts
<script>
</script>
