<x-app-layout>

    <div class="flex flex-col">
        <div>Viewing Edit Transactions.</div>
        <br>
        <div>Transaction ID: {{ $transaction->id }}</div>
        <br>
        <div>Transaction Subtotal: {{ $transaction->subtotal }}</div>
    </div>

</x-app-layout>
