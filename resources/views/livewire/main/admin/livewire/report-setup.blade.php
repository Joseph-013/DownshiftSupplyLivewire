<form wire:submit.prevent="submitSetup">
    <div class="w-full flex-row px-5">
        <ul class="flex flex-row w-full">
            <li class="w-full text-left text-sm font-medium my-2 w-100">Start Date</li>
        </ul>
        <div class="w-full text-left font-light px-3">
            <input type="date" class="calendar-icon" wire:model="date" required>
        </div>
    </div>
    <div class="w-full flex-row px-5 my-3">
        <ul class="flex flex-row w-full">
            <li class="w-full text-left text-sm font-medium my-2">
                <label for="format" class="my-1">Format:</label><br>
                <input type="radio" wire:model="format" id="daily" name="format" value="daily" class="my-1 mx-3"
                    required>
                <label for="daily" class="my-1 px-1">Daily Report</label><br>
                <input type="radio" wire:model="format" id="weekly" name="format" value="weekly" class="my-1 mx-3"
                    required>
                <label for="weekly" class="my-1 px-1">Weekly Report</label><br>
                <input type="radio" wire:model="format" id="monthly" name="format" value="monthly"
                    class="my-1 mx-3" required>
                <label for="monthly" class="my-1 px-1">Monthly Report</label><br>
                <input type="radio" wire:model="format" id="annual" name="format" value="annual" class="my-1 mx-3"
                    required>
                <label for="annual" class="my-1 px-1">Annual Report</label><br>
            </li>
        </ul>

    </div>
    <div class="m-3 w-full pl-3">
        <button type="submit"
            class="h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing mb-5">
            Generate Report
        </button>
    </div>
</form>
