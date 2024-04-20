<div class="">
    <div class="w-full flex justify-between">
        <h4 class="text-lg font-bold font-montserrat">{{ $format ? ucfirst($format) . ' Report' : '' }}</h4>
        <div class="text-lg font-bold font-montserrat text-right">
            Downshift Supply
        </div>
    </div>

    {{-- <div class="">
        Test:<br />
        Format: {{ $format }}<br />
        Start date: {{ $startDate }}<br />
        End date: {{ $endDate }}
    </div> --}}

    <table id="report-table" class="border w-full mt-2 text-xs">
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
                    {{-- @if (!$transactions->hasMorePages() && $transactions->count() != 0)
                        <tr>
                            <td colspan="5" class="text-center h-10 text-red-600">Last Row ...</td>
                        </tr>
                    @endif --}}
                @else
                    {{-- For Weekly --}}
                    @php
                        $identifierSwitch = '';
                        $weekSwitch = 0;
                        foreach ($transactions as $transaction) {
                            $currentWeekNum = Carbon\Carbon::parse($transaction->created_at)->weekOfYear;
                            if ($transaction->identifier !== $identifierSwitch) {
                                $identifierSwitch = $transaction->identifier;
                            }
                            if ($currentWeekNum != $weekSwitch) {
                                $weekSwitch = $currentWeekNum;
                                $weekDefinition = 'Week ' . $currentWeekNum;
                                echo "
                        <tr class='border-b-2 border-black mt-3'>
                            <td class='border p-2 text-center font-semibold italic' colspan='5'>
                                $identifierSwitch $weekDefinition
                            </td>
                        </tr>
                        ";
                            }
                            echo "
                        <tr class='border font-light'>
                            <td class='border p-2'>$transaction->id</td>
                            <td class='border p-2'>$transaction->firstName $transaction->lastName</td>
                            <td class='border p-2'>
                                " .
                                ($transaction->preferredService
                                    ? $transaction->preferredService
                                    : '(Onsite Purchase)') .
                                "
                            </td>
                            <td class='border p-2'>$transaction->grandTotal</td>
                            <td class='border p-2'>" .
                                Carbon\Carbon::parse($transaction->created_at)->format('m-d-Y h:i A') .
                                "</td>
                        </tr>
                        ";
                        }
                    @endphp

                    {{-- @if (!$transactions->hasMorePages() && $transactions->count() != 0)
                        <tr>
                            <td colspan="5" class="text-center h-10 text-red-600">Last Row ...</td>
                        </tr>
                    @endif --}}
                @endif

            @endif
        </tbody>
    </table>
</div>
