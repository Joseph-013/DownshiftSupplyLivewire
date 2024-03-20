<div class="font-montserrat">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation">
            <span>
                {{-- Disabled Button --}}
                @if ($paginator->onFirstPage())
                    <span>Previous</span>
                @else
                    {{-- Functional Button --}}
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev">Previous</button>
                @endif
            </span>

            <span>{{ $paginator->count() }}</span>

            <span>
                @if ($paginator->onLastPage())
                    <span>Next</span>
                @else
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next">Next</button>
                @endif
            </span>
        </nav>
    @endif
</div>
