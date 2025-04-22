<div x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    style="display: none" @keydown.escape.window="showModal = false">
    <div class="bg-white p-6 rounded shadow-lg max-w-lg w-full" @click.away="showModal = false">
        <div class="text-right">
            <button class="p-2 rounded-full hover:bg-gray-200 transition-colors" @click="showModal = false"><svg width="24"
                    height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    color="#4b5563">
                    <path
                        d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                        stroke="#4b5563" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>