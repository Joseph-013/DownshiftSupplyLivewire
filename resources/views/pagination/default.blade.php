<div class="font-montserrat w-full select-none">
    @if ($paginator->hasPages())
        <nav class="flex flex-row items-center justify-between" role="navigation" aria-label="Pagination Navigation">

            {{-- Skip Left --}}
            <div>
                {{-- Disabled Button --}}
                @if ($paginator->onFirstPage())
                    <div class="cursor-not-allowed py-1 px-2 rounded-full" title="Already on first page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-backward" viewBox="0 0 16 16">
                            <path
                                d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z" />
                        </svg>
                    </div>
                @else
                    {{-- Functional Button --}}
                    <button class="hover:bg-slate-300 py-1 px-2 rounded-full"
                        wire:click="setPage({{ $paginator->currentPage() - 5 }})" wire:loading.attr="disabled"
                        rel="prev" title="Previous 5 pages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-backward" viewBox="0 0 16 16">
                            <path
                                d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5m7 1.133L1.696 8 7.5 11.367zm7.5 0L9.196 8 15 11.367z" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Previous --}}
            <div>
                {{-- Disabled Button --}}
                @if ($paginator->onFirstPage())
                    <div class="cursor-not-allowed py-1 px-2 rounded-full" title="Already on first page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-start" viewBox="0 0 16 16">
                            <path
                                d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0zm7.5.633L5.696 8l5.804 3.367z" />
                        </svg>
                    </div>
                @else
                    {{-- Functional Button --}}
                    <button class="hover:bg-slate-300 py-1 px-2 rounded-full" wire:click="previousPage"
                        wire:loading.attr="disabled" rel="prev" title="Previous page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-start" viewBox="0 0 16 16">
                            <path
                                d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L5 8.752V12a.5.5 0 0 1-1 0zm7.5.633L5.696 8l5.804 3.367z" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Page Location --}}
            <button
                onclick="document.getElementById('jumpInput').style.display='block';this.style.display = 'none';document.getElementById('jumpInput').focus();"
                {{-- class="flex flex-col justify-center items-center py-2 px-3 rounded-full bg-slate-300" id="pageStatus" title="Select page"> --}} class="flex flex-col border justify-center items-center py-2 px-3 rounded-full"
                id="pageStatus" title="Select page">
                {{-- <div class="-mb-1 text-xs text-gray-500">{{ $paginator->currentPage() }}/{{ $paginator->lastPage() }}
                </div> --}}
                <div class="">
                    {{ $paginator->currentPage() }}/{{ $paginator->lastPage() }}
                    {{-- {{ $paginator->currentPage() == $paginator->lastPage() && $paginator->currentPage() != 1 ? $paginator->lastItem() : $paginator->count() * $paginator->currentPage() }}/{{ $paginator->total() }} --}}
                </div>
            </button>

            <input id="jumpInput" class="hidden border-none py-2 px-3 rounded-full text-center bg-slate-300"
                style="width: 10ch;" placeholder="Jump to:"
                onchange="document.getElementById('pageStatus').style.display='block';this.style.display = 'none';"
                wire:change="setPage($event.target.value); $event.target.value=''"
                onblur="document.getElementById('pageStatus').style.display='block';this.style.display = 'none';">

            {{-- Next --}}
            <div>
                {{-- Disabled Button --}}
                @if ($paginator->onLastPage())
                    <div class="cursor-not-allowed py-1 px-2 rounded-full" title="Already on last page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-end" viewBox="0 0 16 16">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                        </svg>
                    </div>
                @else
                    {{-- Functional Button --}}
                    <button class="hover:bg-slate-300 py-1 px-2 rounded-full" wire:click="nextPage"
                        wire:loading.attr="disabled" rel="prev" title="Next page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-end" viewBox="0 0 16 16">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Skip Right --}}
            <div>
                {{-- Disabled Button --}}
                @if ($paginator->onLastPage())
                    <div class="cursor-not-allowed py-1 px-2 rounded-full" title="Already on last page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-end" viewBox="0 0 16 16">
                            <path
                                d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.713 3.31 4 3.655 4 4.308v7.384c0 .653.713.998 1.233.696L11.5 8.752V12a.5.5 0 0 0 1 0zM5 4.633 10.804 8 5 11.367z" />
                        </svg>
                    </div>
                @else
                    {{-- Functional Button --}}
                    <button class="hover:bg-slate-300 py-1 px-2 rounded-full"
                        wire:click="setPage({{ $paginator->currentPage() + 5 > $paginator->lastPage() ? $paginator->lastPage() : $paginator->currentPage() + 5 }})"
                        wire:loading.attr="disabled" rel="prev" title="Next 5 pages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-skip-forward" viewBox="0 0 16 16">
                            <path
                                d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.752l-6.267 3.636c-.52.302-1.233-.043-1.233-.696v-2.94l-6.267 3.636C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696L7.5 7.248v-2.94c0-.653.713-.998 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5M1 4.633v6.734L6.804 8zm7.5 0v6.734L14.304 8z" />
                        </svg>
                    </button>
                @endif
            </div>

        </nav>
    @endif
</div>
