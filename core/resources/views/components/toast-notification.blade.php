<div
    x-data="{ show: {{ $show ? 'true' : 'false' }} }"
    x-show="show"
    x-init="setTimeout(() => show = false, {{ $duration }})"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed top-4 right-4 z-50 max-w-md p-4 bg-white shadow-lg rounded-lg text-sm"
>
    <div class="flex justify-between">
        <div class="flex items-center gap-2">
            
            <svg width="20" height="20" stroke-width="2.5" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg" color="#16a34a">
                <path d="M7 12.5L10 15.5L17 8.5" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round"></path>
                <path
                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                    stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <h1 class="text-gray-600 font-medium">{{ $title }}</h1>
        </div>
        <button @click="show = false" class="active:border-2 border-blue-600 rounded-lg p-1">
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
