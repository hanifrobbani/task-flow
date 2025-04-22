<div x-data="{ show: false, title: '', message: '', variant: '', buttonName: '' }" x-show="show" x-cloak x-transition
    x-on:open-modal.window="
        show = true;
        title = $event.detail.title;
        message = $event.detail.message;
        variant = $event.detail.variant;
        buttonName = $event.detail.buttonName;
    " x-on:keydown.escape.window="show = false" x-bind:variant="variant"
    x-effect="document.body.classList.toggle('overflow-hidden', show)"
    class="fixed inset-0 z-50 flex items-center justify-center">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black bg-opacity-50" @click="show = false"></div>

    <!-- Modal Box -->
    <div class="relative max-w-md bg-white rounded-lg shadow-md p-6 z-50" @click.stop>
        <div class="flex gap-2 items-center">
            <div>
                <div class="p-2 rounded-full bg-red-200" x-show="variant === 'danger'" id="danger">
                    <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#b91c1c">
                        <path
                            d="M20.0429 21H3.95705C2.41902 21 1.45658 19.3364 2.22324 18.0031L10.2662 4.01533C11.0352 2.67792 12.9648 2.67791 13.7338 4.01532L21.7768 18.0031C22.5434 19.3364 21.581 21 20.0429 21Z"
                            stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M12 9V13" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M12 17.01L12.01 16.9989" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="p-2 rounded-full bg-blue-200" x-show="variant === 'info'" id="info">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#1d4ed8">
                        <path d="M12 11.5V16.5" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M12 7.51L12.01 7.49889" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#1d4ed8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-lg font-semibold text-gray-800 mb-2" x-text="title"></h1>
        </div>
        <p class="text-sm text-gray-600" x-text="message"></p>
        <div class="flex justify-end gap-2 mt-4">
            <button @click="show = false"
                class="text-sm font-medium border border-gray-300 px-3 py-1 rounded-md hover:bg-gray-50 transition-colors">
                Cancel
            </button>
            <button x-text="buttonName"
                class="text-sm font-medium bg-red-600 text-white px-3 py-1 rounded-md hover:opacity-80 transition">
            </button>
        </div>
    </div>
</div>