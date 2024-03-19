<div class="absolute top-0 left-0 w-full h-full flex items-center justify-center border">
    <div class="absolute inset-0 bg-black opacity-50" wire:click="dispatch('hideItemTemplate')"></div>


    <div class="bg-gray-100 p-6 rounded-lg relative z-10 border" id="itemTemplate">
        <img src="https://via.placeholder.com/350x200.png/000000?text=..." class="rounded-md object-cover"
            style="max-height: 200px;" />
        {{-- @if (!isset($product)) --}}
        <form class="h-full w-full flex flex-col">
            <table class="w-full">
                <tr class="h-14">
                    <th colspan="2" class="text-center font-semibold">Item Details</th>
                </tr>
                <tr>
                    <td class="h-11 mt-3" colspan="2"><input type="file"></td>
                </tr>
                <tr class="h-11">
                    <td>Name:</td>
                    <td><input type="number" class="rounded-lg h-9"></td>
                </tr>
                <tr class="h-11">
                    <td>Price:</td>
                    <td><input type="number" class="rounded-lg h-9"></td>
                </tr>
                <tr class="h-11">
                    <td>Stocks:</td>
                    <td><input type="number" class="rounded-lg h-9"></td>
                </tr>
                <tr class="h-11">
                    <td>Critical Level:</td>
                    <td><input type="number" class="rounded-lg h-9"></td>
                </tr>
            </table>
        </form>
        {{-- @endif --}}

    </div>
</div>
