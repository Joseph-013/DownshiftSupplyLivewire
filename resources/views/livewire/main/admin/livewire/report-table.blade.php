<div class="w-full h-full text-start">
    <span class="text-lg font-bold font-montserrat">{{ $format ? ucfirst($format) . ' Report' : '' }}</span>
    <table class="border w-full mt-2 text-xs font-light">
        <thead class="border">
            <tr class="border">
                <th class="border-b-4 border-black p-2 w-1/12">Trans. Id</th>
                <th class="border-b-4 border-black p-2 w-4/12">Customer Name</th>
                <th class="border-b-4 border-black p-2 w-2/12">Type</th>
                <th class="border-b-4 border-black p-2 w-2/12">Grand Total</th>
                <th class="border-b-4 border-black p-2 w-3/12">Date</th>
            </tr>
        </thead>
        <tbody>

            @if ($transactions)
                @php
                    $identifierSwitch = '';
                    foreach ($transactions as $transaction) {
                        if ($transaction->identifier !== $identifierSwitch && $format !== 'daily') {
                            $identifierSwitch = $transaction->identifier;
                            echo "
                                <tr class='border-b-2 border-black'>
                                    <td class='border p-2 text-center font-bold' colspan='5'>
                                        -- $identifierSwitch --
                                    </td>
                                </tr>
                                ";
                        }
                        echo "
                            <tr class='border'>
                                <td class='border p-2'>$transaction->id</td>
                                <td class='border p-2'>$transaction->firstName&nbsp;$transaction->lastName</td>
                                <td class='border p-2'>
                                    ";
                        echo $transaction->preferredService ? $transaction->preferredService : '(Onsite Purchase)';
                        echo "
                                </td>
                                <td class='border p-2'>$transaction->grandTotal</td>
                                <td class='border p-2'>$transaction->created_at</td>
                            </tr>
                        ";
                    }
                @endphp
            @endif


        </tbody>
    </table>

</div>
