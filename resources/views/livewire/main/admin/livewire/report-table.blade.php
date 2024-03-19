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
                    @if (!$transactions->hasMorePages())
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
                    @if (!$transactions->hasMorePages())
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
        <div class="mt-3">

            {{ $transactions->links() }}

            {{-- <div class="max-w-80 text-center">
                <div class="flex justify-between items-center w-full h-full px-3">
                    <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->url(1) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-backward" viewBox="0 0 16 16">
                            <path
                                d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z" />
                        </svg>
                    </a>
                    <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->previousPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-start" viewBox="0 0 16 16">
                            <path
                                d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0zm7.5.633L5.696 8l5.804 3.367z" />
                        </svg>
                    </a>
                    <div
                        class="text-sm bg-slate-300 py-2 px-3 w-12 rounded-full flex justify-center cursor-default select-none">
                        {{ $transactions->currentPage() . '/' . $transactions->lastPage() }}
                    </div>
                    <a class="hover:bg-slate-300 py-1 px-2 rounded-full" href="{{ $transactions->nextPageUrl() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-end" viewBox="0 0 16 16">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                        </svg>
                    </a>
                    <a class="hover:bg-slate-300 py-1 px-2 rounded-full"
                        href="{{ $transactions->url($transactions->lastPage()) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-forward" viewBox="0 0 16 16">
                            <path
                                d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.752l-6.267 3.636c-.52.302-1.233-.043-1.233-.696v-2.94l-6.267 3.636C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696L7.5 7.248v-2.94c0-.653.713-.998 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5M1 4.633v6.734L6.804 8zm7.5 0v6.734L14.304 8z" />
                        </svg>
                    </a>
                </div>
            </div> --}}

        </div>
    @endif
</div>
