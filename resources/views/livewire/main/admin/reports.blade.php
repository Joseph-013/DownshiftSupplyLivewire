
<x-app-layout>
    {{-- Showing ADMIN INVENTORY page. --}}
    <div class="w-screen h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col h-full">

            <div class="w-full flex flex-row items-center justify-between mt-3 mb-4">
                <h1 class="me-10 font-montserrat text-spacing font-semibold text-xl default-shadow text-orange-400 ">
                    Reports
                </h1>
            </div>

            {{-- Content --}}
            <div class="flex flex-1 w-full -mx-3 my-3">
                {{-- Left Panel --}}
                <div class="w-2/5 h-full px-3">
                    <div class="w-full h-full text-right flex">
                        <div class="w-full h-full flex flex-col">
                            <div class="w-full flex-row px-5">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-left text-sm font-medium my-2 w-100">Start Date</li>
                                </ul>
                                <div class="w-full text-left font-light px-3">
                                    <input type="date" class="calendar-icon">
                                </div>
                            </div>
                            <div class="w-full flex-row px-5 my-3">
                                <ul class="flex flex-row w-full">
                                    <li class="w-full text-left text-sm font-medium my-2">
                                        <label for="format" class="my-1">Format:</label><br>
                                        <input type="radio" id="daily" name="format" value="daily" class="my-1 mx-3">
                                        <label for="daily" class="my-1 px-1">Daily Report</label><br>
                                        <input type="radio" id="weekly" name="format" value="weekly" class="my-1 mx-3">
                                        <label for="weekly" class="my-1 px-1">Weekly Report</label><br>
                                        <input type="radio" id="monthly" name="format" value="monthly" class="my-1 mx-3">
                                        <label for="monthly" class="my-1 px-1">Monthly Report</label><br>
                                        <input type="radio" id="annual" name="format" value="annual" class="my-1 mx-3">
                                        <label for="annual" class="my-1 px-1">Annual Report</label><br>
                                    </li>
                                </ul>

                            </div>
                            <div class="m-3 w-full pl-3">
                            <button type="submit" class="h-10 w-35 px-10 mr-10 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing mb-5">
                                        Generate Report

                                    </button>
                            </div>
                            {{-- Products List  --}}
                        </div>

                        {{-- Products --}}
                    </div>

                </div>
                {{-- Right Panel border-2 border-black --}}
                <div class="w-3/5 h-full text-right flex">
                    <div class="w-full h-full flex flex-col">
                        <div class="flex flex-row w-full font-medium">Daily Report Preview</div>
                        <div class="w-full flex-row px-1 my-2 text-xs font-light">
        <table class="border w-full">
            <thead class="border">
                <tr class="border">
                    <th class="border p-2">Column 1</th>
                    <th class="border p-2">Column 2</th>
                    <th class="border p-2">Column 3</th>
                    <th class="border p-2">Column 4</th>
                    <th class="border p-2">Column 5</th>
                    <th class="border p-2">Column 6</th>
                    <th class="border p-2">Column 7</th>
                    <th class="border p-2">Column 8</th>
                    <th class="border p-2">Column 9</th>
                    <th class="border p-2">Column 10</th>
                </tr>
            </thead>
            <tbody>
                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->

                <!-- Repeat this block for each row -->
                <tr class="border">
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                    <td class="border p-2"></td>
                </tr>
                <!-- Repeat this block for each row -->
            </tbody>
        </table>
    </div>

                    </div>

                    {{-- Products --}}
                </div>

            </div>

        </div>
    </div>
</x-app-layout>