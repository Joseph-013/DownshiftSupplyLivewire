<form wire:submit.prevent="submitSetup" class="flex w-full flex-col sm:flex-row md:flex-col">
    <div class="w-full flex-row md:pr-5 pl-5">
        <ul class="flex flex-col w-full max-w-64">
            <label for="format" class="w-full text-start">Format:</label>
            <li class="w-full text-left text-sm font-medium my-2 columns-2 md:columns-1 gap-0">
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <input type="radio" wire:model="format" id="daily" name="format" value="daily"
                            class="my-1 mx-2" required wire:change="changeDateSelector('daily')">
                        <label for="daily" class="my-1">Daily&nbsp;<span
                                class="hidden md:inline">Report</span></label>
                    </div>
                    <div class="flex flex-row mt-2">
                        <input type="radio" wire:model="format" id="weekly" name="format" value="weekly"
                            class="my-1 mx-2" required wire:change="changeDateSelector('weekly')">
                        <label for="weekly" class="my-1">Weekly&nbsp;<span
                                class="hidden md:inline">Report</span></label>
                    </div>
                </div>
                <div class="flex flex-col md:mt-0 mt-2">
                    <div class="flex flex-row">
                        <input type="radio" wire:model="format" id="monthly" name="format" value="monthly"
                            class="my-1 mx-2" required wire:change="changeDateSelector('monthly')">
                        <label for="monthly" class="my-1">Monthly&nbsp;<span
                                class="hidden md:inline">Report</span></label><br>
                    </div>
                    <div class="flex flex-row mt-2">
                        <input type="radio" wire:model="format" id="annual" name="format" value="annual"
                            class="my-1 mx-2" required wire:change="changeDateSelector('annual')">
                        <label for="annual" class="my-1">Annual&nbsp;<span
                                class="hidden md:inline">Report</span></label><br>
                    </div>


                </div>
            </li>
        </ul>

    </div>
    <div class="w-full flex-row md:px-5 mt-2 md:mt-3 pl-5 sm:pl-0">
        @isset($format)
            <ul class="flex flex-row w-full">
                <li class="w-full text-left text-sm font-medium my-2 w-100">
                    @switch($format)
                        @case('daily')
                            {{ 'Start Date' }}
                        @break

                        @case('weekly')
                            {{ 'Start Week' }}
                        @break

                        @case('monthly')
                            {{ 'Start Month' }}
                        @break

                        @case('annual')
                            {{ 'Start Year' }}
                        @break

                        @default
                    @endswitch
                </li>
            </ul>
            <div class="w-full text-left font-light pl-3">
                {{-- try case type="" only --}}
                @switch($format)
                    @case('daily')
                        <input type="date" class="rounded-xl default-shadow cursor-pointer w-full max-w-44"
                            wire:model="startDate" required>
                    @break

                    @case('weekly')
                        <input type="week" class="rounded-xl default-shadow cursor-pointer w-full max-w-44"
                            wire:model="startDate" required>
                    @break

                    @case('monthly')
                        <input type="month" class="rounded-xl default-shadow cursor-pointer w-full max-w-44"
                            wire:model="startDate" required>
                    @break

                    @case('annual')
                        <input type="number" class="rounded-xl default-shadow cursor-pointer w-full max-w-44"
                            wire:model="startYear" value="2024" min="1000" max="9999" required>
                    @break

                    @default
                @endswitch
            </div>

            <x-auth-session-status class="mt-2 bg-red-500 p-1 px-2 rounded-md text-white text-center" :status="session('reportSetupError')" />

            <ul class="flex flex-row w-full">
                <li class="w-full text-left text-sm font-medium my-2 w-100">
                    @switch($format)
                        @case('daily')
                            {{ 'End Date' }}
                        @break

                        @case('weekly')
                            {{ 'End Week' }}
                        @break

                        @case('monthly')
                            {{ 'End Month' }}
                        @break

                        @case('annual')
                            {{ 'End Year' }}
                        @break

                        @default
                    @endswitch
                </li>
            </ul>
            <div class="w-full text-left font-light pl-3">
                @switch($format)
                    @case('daily')
                        <input type="date" class="rounded-xl default-shadow cursor-pointer w-full max-w-44" wire:model="endDate"
                            required>
                    @break

                    @case('weekly')
                        <input type="week" class="rounded-xl default-shadow cursor-pointer w-full max-w-44" wire:model="endDate"
                            required>
                    @break

                    @case('monthly')
                        <input type="month" class="rounded-xl default-shadow cursor-pointer w-full max-w-44" wire:model="endDate"
                            required>
                    @break

                    @case('annual')
                        <input type="number" class="rounded-xl default-shadow cursor-pointer w-full max-w-44" wire:model="endYear"
                            min="1000" max="9999" required>
                    @break

                    @default
                @endswitch
            </div>
        @endisset


        <div class="mx-3 my-2 w-full pl-3">
            <button type="submit"
                class="h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing">
                Generate Report
            </button>
        </div>
    </div>
</form>
