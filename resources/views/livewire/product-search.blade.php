<div class=""> <!-- Adding margin to separate image and text -->
    <label class="w-full h-10 flex items-center font-semibold">Item ID/Name:</label>
    <input wire:model.live="search" class="w-4/6 h-10 flex items-center text-xs" type="text" id="searchInput">
    <ul id="searchResults" class="list-group absolute z-10">
        @foreach($results as $result)
            <li class="list-group-item w-28" onclick="fillInputAndHide('{{ $result->name }}')">{{ $result->name }}</li>
        @endforeach
    </ul>
</div>

<script>
    function fillInputAndHide(value) {
        document.getElementById('searchInput').value = value;
        document.getElementById('searchResults').style.display = 'none';
    }
</script>