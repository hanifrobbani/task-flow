<div class="flex justify-end w-full items-center px-4">
    <div class="flex flex-row-reverse gap-4 relative items-center">
        <div class="relative">
            <button id="profileButton" class="flex items-center gap-3 justify-center focus:outline-none">
                <div class="text-right">
                    <h1 class="text-black text-sm font-medium">Thomas Wilson</h1>
                    <p class="text-gray-500 text-sm">Designer</p>
                </div>
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt=""
                    class="w-12 h-12 rounded-full object-cover object-center">
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu"
                class="absolute border right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible transition-all duration-300 transform scale-95 text-sm flex flex-col">
                <div class="p-2">
                    <a href="/user/profile"
                        class="flex gap-1 items-center px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-lg">
                        <svg class="stroke-gray-900" width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 20V19C5 15.134 8.13401 12 12 12V12C15.866 12 19 15.134 19 19V20"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Profile</a>
                    <a href="/user/setting"
                        class="flex gap-1 px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-lg">
                        <svg class="stroke-gray-900" width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                            <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M19.6224 10.3954L18.5247 7.7448L20 6L18 4L16.2647 5.48295L13.5578 4.36974L12.9353 2H10.981L10.3491 4.40113L7.70441 5.51596L6 4L4 6L5.45337 7.78885L4.3725 10.4463L2 11V13L4.40111 13.6555L5.51575 16.2997L4 18L6 20L7.79116 18.5403L10.397 19.6123L11 22H13L13.6045 19.6132L16.2551 18.5155C16.6969 18.8313 18 20 18 20L20 18L18.5159 16.2494L19.6139 13.598L21.9999 12.9772L22 11L19.6224 10.3954Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Settings</a>
                </div>
                <div class="border-t p-2" x-data>
                    <button @click="$dispatch('open-modal', { 
                        title: 'Logout', 
                        message: 'Are you sure want to logout from your account?',  variant: 'danger', buttonName: 'Logout'})" class="flex gap-1 w-full text-left px-4 py-2 text-sm text-gray-800 hover:bg-gray-100 rounded-lg">
                        <svg class="stroke-gray-900" width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                            <path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Logout</button>
                </div>
            </div>
        </div>

        <button class="rounded-full hover:bg-sky-100 transition-colors p-2 group bg-gray-100">
            <svg class="stroke-gray-500 group-hover:stroke-sky-500" width="22" height="22" stroke-width="1.5"
                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#6b7280">
                <path
                    d="M3 11.5066C3 16.7497 7.25034 21 12.4934 21C16.2209 21 19.4466 18.8518 21 15.7259C12.4934 15.7259 8.27411 11.5066 8.27411 3C5.14821 4.55344 3 7.77915 3 11.5066Z"
                    stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </button>

        <button class="rounded-full hover:bg-sky-100 transition-colors p-2 group bg-gray-100">
            <svg class="stroke-gray-500 fill-gray-500 group-hover:stroke-sky-500 group-hover:fill-sky-500" width="22"
                height="22" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 21.75a2.731 2.731 0 0 1-2.378-1.372.75.75 0 0 1 1.3-.756 1.287 1.287 0 0 0 2.164 0 .75.75 0 1 1 1.3.756A2.731 2.731 0 0 1 12 21.75Zm8.675-3.425a.751.751 0 0 0-.089-.793 9.219 9.219 0 0 1-1.841-5.032V8.995a6.745 6.745 0 0 0-13.49 0V12.5a9.219 9.219 0 0 1-1.841 5.032A.751.751 0 0 0 4 18.75h16a.75.75 0 0 0 .675-.425ZM6.755 12.5V8.995a5.245 5.245 0 0 1 10.49 0V12.5a9.908 9.908 0 0 0 1.368 4.75H5.387a9.908 9.908 0 0 0 1.368-4.75Z"
                    fill="" stroke="" stroke-width="0.5">
                </path>
            </svg>
        </button>
    </div>

</div>

<script>
    const profileButton = document.getElementById('profileButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    profileButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('opacity-0');
        dropdownMenu.classList.toggle('invisible');
        dropdownMenu.classList.toggle('scale-95');
    });

    document.addEventListener('click', (e) => {
        if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add('opacity-0', 'invisible', 'scale-95');
        }
    });
</script>