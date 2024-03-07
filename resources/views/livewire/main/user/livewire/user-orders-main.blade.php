<div class="flex flex-1 w-full -mx-3">

    {{-- Left Panel --}}
    @if ($windowWidth >= 1024)
        <livewire:main.user.livewire.user-orders-detail />
    @endif

    {{-- Right Panel border-2 border-black --}}
    <livewire:main.user.livewire.user-orders-list />

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
