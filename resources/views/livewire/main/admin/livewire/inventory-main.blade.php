<div class="flex flex-1 w-full -mx-3">
    {{-- Left Panel --}}
    @if ($windowWidth >= 1024)
        <div class="w-2/5 h-full px-3 hidden lg:block">
            <div class="w-full h-full">
                {{-- Left Main Container --}}
                <livewire:main.admin.livewire.product-details />
            </div>
        </div>
        <div class="flex lg:hidden flex-row items-center justify-center mt-10">
            <div>Please wait</div>
            <img src="{{ asset('assets/loading.gif') }}" class="h-5 w-5 ml-2" alt=" (Loading)">
        </div>
    @endif


    {{-- Right Panel --}}
    <div class="w-3/5 h-full px-3 text-right flex">
        <div class="w-full h-full px-4 flex flex-col">
            <div class="w-full flex-row">
                <ul class="flex flex-row w-full">
                    <li class="w-7/12 text-center text-sm">Item Name</li>
                    <li class="w-2/12 text-center text-sm">Remaining</li>
                    <li class="w-3/12 text-center text-sm">Price</li>
                </ul>
            </div>
            <hr class="my-1">
            {{-- Products List  --}}
            <livewire:main.admin.livewire.product-list />
        </div>
    </div>

</div>

@script
    <script>
        let resizeTimer;

        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                const newWidth = window.innerWidth;
                console.log("Window width changed to: " + newWidth);

                $wire.dispatch('windowWidthChange', {
                    width: newWidth
                });

            }, 2000);
        });

        $wire.on('initialRender', () => {
            const newWidth = window.innerWidth;
            console.log("Window width changed to: " + newWidth);

            $wire.dispatch('windowWidthChange', {
                width: newWidth
            });
        });
    </script>
@endscript
