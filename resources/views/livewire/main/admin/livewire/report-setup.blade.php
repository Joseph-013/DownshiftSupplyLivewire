<form wire:submit.prevent="submitSetup" class="flex w-full flex-col sm:flex-row md:flex-col">
    <div class="w-full flex-row md:pr-5 pl-5">
        <ul class="flex flex-row w-full">
            <li class="w-full text-left text-sm font-medium my-2 w-100">Start Date</li>
        </ul>
        <div class="w-full text-left font-light pl-3">
            <input type="date" class="calendar-icon rounded-xl default-shadow cursor-pointer" wire:model="date"
                required>
        </div>

    </div>
    <div class="w-full flex-row md:px-5 mt-2 md:mt-3 pl-5 sm:pl-0">
        <ul class="flex flex-col w-full max-w-64">
            <label for="format" class="w-full text-start">Format:</label>
            <li class="w-full text-left text-sm font-medium my-2 columns-2 md:columns-1 gap-0">
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <input type="radio" wire:model="format" id="daily" name="format" value="daily"
                            class="my-1 mx-2" required>
                        <label for="daily" class="my-1">Daily&nbsp;<span
                                class="hidden md:inline">Report</span></label>
                    </div>
                    <div class="flex flex-row mt-2">
                        <input type="radio" wire:model="format" id="weekly" name="format" value="weekly"
                            class="my-1 mx-2" required>
                        <label for="weekly" class="my-1">Weekly&nbsp;<span
                                class="hidden md:inline">Report</span></label>
                    </div>
                </div>
                <div class="flex flex-col md:mt-0 mt-2">
                    <div class="flex flex-row">
                        <input type="radio" wire:model="format" id="monthly" name="format" value="monthly"
                            class="my-1 mx-2" required>
                        <label for="monthly" class="my-1">Monthly&nbsp;<span
                                class="hidden md:inline">Report</span></label><br>
                    </div>
                    <div class="flex flex-row mt-2">
                        <input type="radio" wire:model="format" id="annual" name="format" value="annual"
                            class="my-1 mx-2" required>
                        <label for="annual" class="my-1">Annual&nbsp;<span
                                class="hidden md:inline">Report</span></label><br>
                    </div>


                </div>
            </li>
        </ul>
        <div class="mx-3 my-2 w-full pl-3">
            <button type="submit"
                class="h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing">
                Generate Report
            </button>
        </div>
    </div>
</form>
