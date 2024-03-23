<div class="border-black border-1 w-full rounded-lg p-3">
    <table class="w-full text-left">
        <tr class="h-9">
            <th colspan="2" class="text-center font-semibold">Transaction Details</th>
        </tr>
        <tr class="h-9">
            <td class="w-6/12">Transaction ID:</td>
            <td class="w-6/12">{{ isset($selectedTransaction) ? $selectedTransaction->id : '--' }}</td>
        </tr>
        <tr class="h-9">
            <td>Full Name:</td>
            <td>{{ isset($selectedTransaction) ? $selectedTransaction->firstName . ' ' . $selectedTransaction->lastName : '--' }}</td>
        </tr>
        <tr class="h-9">
            <td>Contact Number:</td>
            <td>{{ isset($selectedTransaction) ? $selectedTransaction->contact : '--' }}</td>
        </tr>
    </table>
    @if($details)
    <hr class="my-3" />
    <table class="w-full text-xs text-center font-bold">
        <tr class="h-8">
            <td class="w-1/12">Image</td>
            <td class="w-4/12">Item Name</td>
            <td class="w-3/12">Price</td>
            <td class="w-1/12">Qty</td>
            <td class="w-3/12">Subtotal</td>
        </tr>
    </table>
    <div class="max-h-44 overflow-y-auto">
    <table class="w-full text-xs text-center">
        @foreach($details as $detail)
        <tr class="h-8">
            <td class="w-1/12"><img src="{{ filter_var($detail->products->image, FILTER_VALIDATE_URL) ? $detail->products->image : asset('storage/assets/' . $detail->products->image) }}"
                class="w-12 h-6 rounded"></td>
            <td class="w-4/12">{{ $detail->products->name }}</td>
            <td class="w-3/12">{{ number_format($detail->products->price, 2) }}</td>
            <td class="w-1/12">{{ $detail->quantity }}</td>
            <td class="w-3/12">{{ number_format($detail->subtotal, 2) }}</td>
        </tr>
        @endforeach
    </table>
    </div>  
    @endif
    @if($confirmDelete)
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
        <!-- Semi-transparent overlay -->
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Confirmation prompt -->
            <div class="bg-gray-100 p-6 rounded-lg relative z-10 border">
                <p class="text-xs text-gray-800 mb-4 font-medium">Are you sure you want to delete this
                    transaction?</p>
                <div class="flex justify-end">
                    <button type="button" wire:click="deleteTrans"
                        class="px-4 py-2 bg-red-600 text-white rounded-md mr-2">Yes</button>
                    <button type="button" wire:click="$set('confirmDelete', false)"
                        class="px-4 py-2 bg-gray-400 text-white rounded-md">No</button>
                </div>
            </div>
        </div>
    @endif
    @isset($selectedTransaction)
        <div class="columns-2 mt-6">
            <div class="flex justify-center">
                <button wire:click="deleteConfirm"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-red-600 mr-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Delete
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-center">
                <button wire:click="modifyTrans"
                    class="h-10 flex-1 items-center justify-center rounded-lg bg-sky-600 ml-3 border-1 border-black text-white text-sm font-semibold text-spacing flex flex-row">
                    Modify
                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-pencil" viewBox="0 0 16 16">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg>
                </button>
            </div>
        </div>
    @endisset
</div>