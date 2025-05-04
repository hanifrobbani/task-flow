<div x-data="{ show: {{ $show ? 'true' : 'false' }} }" x-show="show"
    x-init="setTimeout(() => show = false, {{ $duration }})" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed top-4 right-4 z-50 min-w-60 p-4 bg-white shadow-lg rounded-lg text-sm">
    <div class="flex justify-between">
        <div class="flex items-center gap-2">
            <div id="variant" data-type-variant="{{ $variant }}">
                <div class="hidden p-2 rounded-full bg-green-200" id="success">
                    <svg width="20" height="20" stroke-width="2.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#16a34a">
                        <path d="M7 12.5L10 15.5L17 8.5" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="hidden p-2 rounded-full bg-red-200" id="error">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#b91c1c">
                        <path
                            d="M20.0429 21H3.95705C2.41902 21 1.45658 19.3364 2.22324 18.0031L10.2662 4.01533C11.0352 2.67792 12.9648 2.67791 13.7338 4.01532L21.7768 18.0031C22.5434 19.3364 21.581 21 20.0429 21Z"
                            stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M12 9V13" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M12 17.01L12.01 16.9989" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div id="info" class="hidden p-2 rounded-full bg-blue-200">
                    <svg width="20" height="20" stroke-width="2" viewBox="0 0 24 24" fill="none"
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
            <h1 class="text-gray-600 font-medium">{{ $title }}</h1>
        </div>
        <button @click="show = false" class="active:border-2 border-gray-600 rounded-lg p-1">
            <svg width="20" height="20" stroke-width="2" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" color="#000000">
                <path
                    d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>
    <p class="text-gray-600 mt-2">{{ $message }}</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const logoError = document.getElementById('error')
        const logoInfo = document.getElementById('info')
        const logoSuccess = document.getElementById('success')

        const variant = document.getElementById("variant")
        const typeVariant = variant.dataset.typeVariant

        if (typeVariant === "error") {
            logoError?.classList.remove('hidden')
        } else if (typeVariant === "info") {
            logoInfo?.classList.remove('hidden')
        } else if (typeVariant === "success") {
            logoSuccess?.classList.remove('hidden')
        }
    })
</script>
