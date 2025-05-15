<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('swal', ({ title, text, icon, confirmButtonText }) => {
            Swal.fire({
                title: title || 'Success',
                text: text || '',
                icon: icon || 'success',
                confirmButtonText: confirmButtonText || 'OK'
            });
        });

        Livewire.on('swal:confirm', (options) => {
            Swal.fire({
                title: options.title || 'Are you sure?',
                text: options.text || '',
                icon: options.icon || 'warning',
                showCancelButton: options.showCancelButton ?? true,
                confirmButtonText: options.confirmButtonText || 'Yes',
                cancelButtonText: options.cancelButtonText || 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch(options.eventToEmit, options.payload || {});
                }
            });
        });
    });
</script>