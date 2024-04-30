<div x-data="{ show: false, message: '', type: '' }"
     x-init="
        window.addEventListener('show-toast', event => {
            this.message = event.detail.message;
            this.type = event.detail.type;
            this.show = true;
            setTimeout(() => { this.show = false; }, 2000);
        });
     "
     x-show="show"
     class="fixed top-4 right-4">
    <div
        :class="{'bg-green-500 border-green-700': type === 'success', 'bg-yellow-500 border-yellow-700': type === 'warning', 'bg-red-500 border-red-700': type === 'error'}"
        class="max-w-xs text-white rounded-lg px-4 py-2 cursor-pointer">
        <span x-text="message"></span>
    </div>
</div>
