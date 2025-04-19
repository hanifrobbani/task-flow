<div x-data="{ show: false, title: '', message: '' }" x-show="show" x-cloak x-transition x-on:open-modal.window="
        show = true;
        title = $event.detail.title;
        message = $event.detail.message;
    " x-on:keydown.escape.window="show = false" x-effect="document.body.classList.toggle('overflow-hidden', show)"
    class="fixed inset-0 z-50 flex items-center justify-center">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black bg-opacity-50" @click="show = false"></div>

    <!-- Modal Box -->
    <div class="relative max-w-md bg-white rounded-lg shadow-md p-6 z-50" @click.stop>
        <h1 class="text-lg font-semibold text-gray-800 mb-2" x-text="title"></h1>
        <p class="text-sm text-gray-600" x-text="message"></p>
        <div class="flex justify-end gap-2 mt-4">
            <button @click="show = false"
                class="text-sm font-medium border border-gray-300 px-3 py-1 rounded-md hover:bg-gray-50 transition-colors">
                Cancel
            </button>
            <button @click="window.location.href = '/logout'"
                class="text-sm font-medium bg-red-600 text-white px-3 py-1 rounded-md hover:opacity-80 transition">
                Logout
            </button>
        </div>
    </div>
</div>