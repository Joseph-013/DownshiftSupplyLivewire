<div>
    <ul class="flex-row w-full hidden sm:flex">
        <li class="w-4/5"></li>
        <li class="w-1/5 text-center text-sm ml-22 mr-[-3rem]">
            Total:
        </li>
        <li class="w-2/5 text-center text-md font-semibold ml-[-10rem] mr-19">
            ₱&nbsp;{{ number_format($total, 2) }}
        </li>
    </ul>

    <ul class="flex flex-col w-full sm:hidden sm:mt-3">
        <li class="flex items-center justify-between w-full text-center text-md">
            <span class="w-1/5">
                Total:
            </span>
            <span class="w-2/5 font-semibold">
                ₱&nbsp;{{ number_format($total, 2) }}
            </span>
        </li>
    </ul>

</div>