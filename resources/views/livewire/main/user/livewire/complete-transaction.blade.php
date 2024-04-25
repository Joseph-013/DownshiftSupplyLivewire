<div class="w-auto mt-3 flex px-5 ml-20 flex-row gap-10">
    <div class="w-2/5"></div> <!-- Added 'justify-end' class -->
    <div class="w-3/5 flex justify-end ml-20">
        <button type="submit" class="h-10 w-20 mr-[-1rem] px-20 flex flex-row items-center justify-center rounded-lg bg-orange-500 ml-3 border-1 border-black text-white text-xs font-medium text-spacing mb-3">
            Complete Transaction
        </button>
    </div>
</div>
<script>
    document.addEventListener('submit', (event) => {
        const formInputs = document.querySelectorAll('input[type="text"], input[type="number"], input[type="file"], select');
        let isEmpty = false;
        let isFileTooLarge = false;

        formInputs.forEach(input => {
            if (input.required && input.value.trim() === '') {
                isEmpty = true;
                return;
            }

            if (input.type === 'file' && input.files.length > 0) {
                const file = input.files[0];
                const fileSizeInBytes = file.size;
                const maxSizeInBytes = 5242880;

                if (fileSizeInBytes > maxSizeInBytes) {
                    isFileTooLarge = true;
                    return;
                }
            }
        });

        if (isEmpty) {
            event.preventDefault();
            alert('Please fill in all required fields.');
        } else {
            if (isFileTooLarge) {
                event.preventDefault();
                Livewire.dispatch('renderAlert');
            }
            else {
                Livewire.dispatch('checkout');
            }
        }
    });
</script>