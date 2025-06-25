<!-- Trigger buttons -->
<button x-data @click="$dispatch('open-modal', { id: '{{ $id }}' })" class="btn">{{ $slot }}</button>

<!-- Global Alpine listener to open modals -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modals', {
            open(id) {
                const modal = document.getElementById(id);
                if (modal) {
                    modal.__x.$data.isOpen = true;
                }
            }
        });

        Alpine.data('modalListener', () => ({
            init() {
                window.addEventListener('open-modal', (e) => {
                    Alpine.store('modals').open(e.detail.id);
                });
            }
        }));
    });
</script>
<div x-data="modalListener"></div>
