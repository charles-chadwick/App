import './bootstrap';
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
