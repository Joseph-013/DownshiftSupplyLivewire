<div class="w-full h-full text-start">
    <div class="w-full flex justify-between">
        <h4 class="text-lg font-bold font-montserrat">{{ $format ? ucfirst($format) . ' Report' : '' }}</h4>
        <div class="">
            Rows:
            <input type="number" min="10" max="1000" placeholder="Row Count" class="rounded-md max-w-36 ms-2"
                value="100" wire:model="rowCount" wire:change="updateRowCount($event.target.value)" />
        </div>
    </div>
    <table class="border w-full mt-2 text-xs">
        <thead class="border">
            <tr class="border font-bold">
                <th class="border-b-4 border-black p-2 w-1/12">Trans. Id</th>
                <th class="border-b-4 border-black p-2 w-4/12">Customer Name</th>
                <th class="border-b-4 border-black p-2 w-2/12">Type</th>
                <th class="border-b-4 border-black p-2 w-2/12">Grand Total</th>
                <th class="border-b-4 border-black p-2 w-3/12">Date</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($transactions))
                @if ($format !== 'weekly')
                    @php
                        $identifierSwitch = '';
                        foreach ($transactions as $transaction) {
                            if ($transaction->identifier !== $identifierSwitch) {
                                $identifierSwitch = $transaction->identifier;
                                echo "
                        <tr class='border-b-2 border-black mt-3'>
                            <td class='border p-2 text-center font-semibold italic' colspan='5'>
                                $identifierSwitch
                            </td>
                        </tr>
                        ";
                            }
                            echo "
                        <tr class='border font-light'>
                            <td class='border p-2'>$transaction->id</td>
                            <td class='border p-2'>$transaction->firstName&nbsp;$transaction->lastName</td>
                            <td class='border p-2'>
                                ";
                            echo $transaction->preferredService ? $transaction->preferredService : '(Onsite Purchase)';
                            echo "
                        </td>
                        <td class='border p-2'>$transaction->grandTotal</td>
                        <td class='border p-2'>" .
                                \Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y h:i A') .
                                "</td>
                        </tr>";
                        }
                    @endphp
                    @if (!$transactions->hasMorePages() && $transactions->count() != 0)
                        <tr>
                            <td colspan="5" class="text-center h-10 text-red-600">Last Row ...</td>
                        </tr>
                    @endif
                @else
                    @php
                        $identifierSwitch = '';
                        $day;
                        $weekSwitch = 0;
                        $weekNum = 1;
                        foreach ($transactions as $transaction) {
                            $day = (int) $transaction->created_at->format('d');
                            if ($transaction->identifier !== $identifierSwitch) {
                                $identifierSwitch = $transaction->identifier;
                            }
                            switch ($day) {
                                case $day <= 7:
                                    $weekNum = 1;
                                    break;
                                case $day <= 14:
                                    $weekNum = 2;
                                    break;
                                case $day <= 21:
                                    $weekNum = 3;
                                    break;
                                case $day <= 31:
                                    $weekNum = 4;
                                    break;
                            }

                            if ($weekNum != $weekSwitch) {
                                $weekSwitch = $weekNum;
                                $weekDefinition;
                                switch ($weekSwitch) {
                                    case 1:
                                        $weekDefinition = 'Days 1-7';
                                        break;
                                    case 2:
                                        $weekDefinition = 'Days 8-14';
                                        break;
                                    case 3:
                                        $weekDefinition = 'Days 15-21';
                                        break;
                                    case 4:
                                        $weekDefinition = 'Days 22-Last';
                                        break;
                                }
                                echo "
                                    <tr class='border-b-2 border-black mt-3'>
                                        <td class='border p-2 text-center font-semibold italic' colspan='5'>
                                            $identifierSwitch&nbsp;Week&nbsp;$weekNum&nbsp;($weekDefinition)
                                        </td>
                                    </tr>
                                    ";
                            }
                            echo "
                                <tr class='border font-light'>
                                    <td class='border p-2'>$transaction->id</td>
                                    <td class='border p-2'>$transaction->firstName&nbsp;$transaction->lastName</td>
                                    <td class='border p-2'>
                                        ";
                            echo $transaction->preferredService ? $transaction->preferredService : '(Onsite Purchase)';
                            echo "
                                    </td>
                                    <td class='border p-2'>$transaction->grandTotal</td>
                                    <td class='border p-2'>" .
                                \Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y h:i A') .
                                "</td>
                                </tr>";
                        }
                    @endphp
                    @if (!$transactions->hasMorePages() && $transactions->count() != 0)
                        <tr>
                            <td colspan="5" class="text-center h-10 text-red-600">Last Row ...</td>
                        </tr>
                    @endif
                @endif

            @endif
        </tbody>
    </table>
    @if (!$format)
        <div class="w-full mt-5 text-center">Waiting input...</div>
    @elseif(isset($transactions))
        @if ($transactions->count() == 0)
            <div class="w-full mt-5 text-center">No transactions found...</div>
        @endif
    @endif
    @if (isset($transactions) && $transactions)
        <div class="flex justify-center mt-3 w-full">
            <div class="w-96">{{ $transactions->links('pagination.default') }}</div>
        </div>
    @endif
</div>
