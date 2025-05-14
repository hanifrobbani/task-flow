<style>
    .dropdown-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }

    .dropdown-menu.active {
        max-height: 300px;
        opacity: 1;
    }

    .dropdown-container.active .arrow-icon {
        transform: rotate(90deg);
    }
</style>

<div class="w-full h-full bg-white">
    <div class="border-gray-200 border-r border-b flex justify-center items-center h-20">
        <img src="{{asset('assets/img/logo.png')}}" alt="" class="w-14 h-14">
        <div class="flex flex-col items-center justify-start">
            <h1 class="text-2xl font-bold leading-5"><span class="text-blue-600">Task</span>Flow</h1>
            <p class=" text-gray-400" style="font-size: 10px;">Management Apps</p>
        </div>
    </div>
    <div class="h-screen shadow-md">
        <div class="flex w-full justify-start flex-col h-full px-3 py-4 overflow-y-auto pb-24 scrollable">
            <div class="">
                <label for="Menu" class="text-sm text-gray-500 px-3 font-semibold">Menu</label>
                <a href="/dashboard"
                    class="flex mt-2 gap-2 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('dashboard*', '/') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24"
                        class="{{ Request::is('dashboard*', '/') ? 'fill-sky-500' : 'fill-gray-500' }} group-hover:fill-sky-500 fill-gray-500"
                        stroke-width="0.5" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                            d="M18 21.75h-4.25V16.5a1.75 1.75 0 0 0-3.5 0v5.25H6A3.383 3.383 0 0 1 2.25 18v-6.35c0-2.122.586-2.716 1.542-3.509l6.12-5.131a3.244 3.244 0 0 1 4.176 0l6.12 5.131c.956.793 1.542 1.387 1.542 3.509V18A3.383 3.383 0 0 1 18 21.75Zm-2.75-1.5H18c1.577 0 2.25-.673 2.25-2.25v-6.35c0-1.525-.252-1.734-1-2.355l-6.125-5.136a1.75 1.75 0 0 0-2.25 0L4.749 9.3c-.747.621-1 .83-1 2.355V18c0 1.577.673 2.25 2.25 2.25H8.75V16.5a3.25 3.25 0 0 1 6.5 0Z">
                        </path>
                    </svg>
                    <p>Dashboard</p>
                </a>
            </div>
            <div class=" mt-4">
                <label for="Apps" class="text-sm text-gray-500 px-3 font-semibold">Apps</label>
                <a href="/task/my-task"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('task/my-task*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('task/my-task*') ? 'fill-sky-500 stroke-sky-500' : 'fill-gray-500 stroke-gray-500' }}"
                        width="20" height="20" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                            d="m20.354 8.646-6-6A.5.5 0 0 0 14 2.5H8C5.71 2.5 4.5 3.71 4.5 6v12c0 2.29 1.21 3.5 3.5 3.5h9c2.29 0 3.5-1.21 3.5-3.5V9a.5.5 0 0 0-.146-.354ZM14.5 4.207 18.793 8.5H17c-1.729 0-2.5-.771-2.5-2.5ZM17 20.5H8c-1.729 0-2.5-.771-2.5-2.5V6c0-1.729.771-2.5 2.5-2.5h5.5V6c0 2.29 1.21 3.5 3.5 3.5h2.5V18c0 1.729-.771 2.5-2.5 2.5Zm-.5-8.5a.5.5 0 0 1-.5.5H9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 .5.5Zm-3 4a.5.5 0 0 1-.5.5H9a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5Z">
                        </path>
                    </svg>
                    <p>My Task</p>
                </a>
                <a href="/project"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('project*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('project*') ? 'fill-sky-500 stroke-sky-500' : 'fill-gray-500 stroke-gray-500' }}"
                        width="20" height="20" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                            d="M9.5 5.5A.5.5 0 0 1 10 5h11a.5.5 0 0 1 0 1H10a.5.5 0 0 1-.5-.5Zm11.5 6H10a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1Zm0 6.5H10a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1ZM6.5 5.5a2 2 0 1 1-2-2 2 2 0 0 1 2 2Zm-1 0a1 1 0 1 0-1 1 1 1 0 0 0 1-1Zm1 6.5a2 2 0 1 1-2-2 2 2 0 0 1 2 2Zm-1 0a1 1 0 1 0-1 1 1 1 0 0 0 1-1Zm1 6.5a2 2 0 1 1-2-2 2 2 0 0 1 2 2Zm-1 0a1 1 0 1 0-1 1 1 1 0 0 0 1-1Z">
                        </path>
                    </svg>
                    <p>Projects</p>
                </a>
                <a href="/file"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('file*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('file*') ? 'fill-sky-500 stroke-sky-500' : 'fill-gray-500 stroke-gray-500' }}"
                        width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="">
                        <path stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            d="M2 11V4.6C2 4.26863 2.26863 4 2.6 4H8.77805C8.92127 4 9.05977 4.05124 9.16852 4.14445L12.3315 6.85555C12.4402 6.94876 12.5787 7 12.722 7H21.4C21.7314 7 22 7.26863 22 7.6V11M2 11V19.4C2 19.7314 2.26863 20 2.6 20H21.4C21.7314 20 22 19.7314 22 19.4V11M2 11H22"
                            stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>File Storage</p>
                </a>
                <a href="/"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('calender*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg viewBox="0 0 24 24"
                        class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('calender*') ? 'fill-sky-500 stroke-sky-500' : 'fill-gray-500 stroke-gray-500' }}"
                        width="20" height="20" stroke-width="0.5" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                            d="M18 4h-1.5V3a.5.5 0 0 0-1 0v1h-7V3a.5.5 0 0 0-1 0v1H6C3.71 4 2.5 5.21 2.5 7.5V18c0 2.29 1.21 3.5 3.5 3.5h12c2.29 0 3.5-1.21 3.5-3.5V7.5C21.5 5.21 20.29 4 18 4ZM6 5h1.5v1a.5.5 0 0 0 1 0V5h7v1a.5.5 0 0 0 1 0V5H18c1.729 0 2.5.771 2.5 2.5v1h-17v-1C3.5 5.771 4.271 5 6 5Zm12 15.5H6c-1.729 0-2.5-.771-2.5-2.5V9.5h17V18c0 1.729-.771 2.5-2.5 2.5ZM8.75 13a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Zm-8 4a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Z">
                        </path>
                    </svg>
                    <p>Calender Team</p>
                </a>
                <a href="/company/my-company"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('company*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg width="20" height="20"
                        class="stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('company*') ? 'stroke-sky-500' : 'stroke-gray-500' }}"
                        stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                        <path d="M7 9.01L7.01 8.99889" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M11 9.01L11.01 8.99889" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7 13.01L7.01 12.9989" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M11 13.01L11.01 12.9989" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7 17.01L7.01 16.9989" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M11 17.01L11.01 16.9989" stroke="" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M15 21H3.6C3.26863 21 3 20.7314 3 20.4V5.6C3 5.26863 3.26863 5 3.6 5H9V3.6C9 3.26863 9.26863 3 9.6 3H14.4C14.7314 3 15 3.26863 15 3.6V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V9.6C21 9.26863 20.7314 9 20.4 9H15M15 21V17M15 9V13M15 13H17M15 13V17M15 17H17"
                            stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Company</p>
                </a>
            </div>
            <div class=" mt-4">
                <label for="Apps" class="text-sm text-gray-500 px-3 font-semibold">Personal</label>
                <div class="dropdown-container">
                    <div
                        class="dropdown-trigger group flex justify-between items-center gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors {{ Request::is('user*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                        <div class="w-full flex gap-2">
                            <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('user*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                                width="20" height="20" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                                    d="M22.5 12a10.5 10.5 0 1 0-16.859 8.336.431.431 0 0 0 .059.044 10.421 10.421 0 0 0 12.6 0 .431.431 0 0 0 .059-.044A10.479 10.479 0 0 0 22.5 12Zm-16 7.734a3.493 3.493 0 0 1 3.79-3.664h3.42a3.493 3.493 0 0 1 3.79 3.664 9.438 9.438 0 0 1-10.994 0Zm11.926-.76a4.405 4.405 0 0 0-4.719-3.9H10.29a4.405 4.405 0 0 0-4.719 3.9 9.5 9.5 0 1 1 12.858 0ZM12.008 6.5a3.5 3.5 0 1 0 3.5 3.5 3.5 3.5 0 0 0-3.5-3.5Zm0 6a2.5 2.5 0 1 1 2.5-2.5 2.5 2.5 0 0 1-2.5 2.5Z">
                                </path>
                            </svg>
                            <p>Account</p>
                        </div>
                        <div class="arrow-icon">
                            <svg class="group-hover:fill-sky-500 group-hover:stroke-sky-500 stroke-gray-500 fill-gray-500 transition-colors {{ Request::is('user*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                                width="18" height="18" stroke-width="1.5" viewBox="0 0 24 24" fill=""
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.354 12.354-7 7a.5.5 0 0 1-.708-.708L15.293 12 8.646 5.354a.5.5 0 0 1 .708-.708l7 7a.5.5 0 0 1 0 .708Z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="dropdown-menu bg-white rounded-md">
                        <ul class="py-2">
                            <a href="/user/profile">
                                <li class="pl-10 py-2 hover:bg-gray-100 cursor-pointer text-gray-500">Profile</li>
                            </a>
                            <a href="/user/setting">
                                <li class="pl-10 py-2 hover:bg-gray-100 cursor-pointer text-gray-500">Settings</li>
                            </a>
                        </ul>
                    </div>
                </div>

                <a href="/message"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('message*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                    <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors  {{ Request::is('message*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                        width="20" height="20" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                            d="M18 4.5H6C3.71 4.5 2.5 5.71 2.5 8v9c0 2.29 1.21 3.5 3.5 3.5h12c2.29 0 3.5-1.21 3.5-3.5V8c0-2.29-1.21-3.5-3.5-3.5ZM20.5 17c0 1.729-.771 2.5-2.5 2.5H6c-1.729 0-2.5-.771-2.5-2.5V8c0-1.729.771-2.5 2.5-2.5h12c1.729 0 2.5.771 2.5 2.5Zm-2.6-8.294a.5.5 0 0 1-.11.7l-4.912 3.573a1.495 1.495 0 0 1-1.764 0L6.206 9.4a.5.5 0 0 1 .588-.8l4.912 3.572a.5.5 0 0 0 .588 0L17.206 8.6a.5.5 0 0 1 .694.106Z">
                        </path>
                    </svg>
                    <p>Message</p>
                </a>
            </div>
            <div class=" mt-4">
                <label for="Apps" class="text-sm text-gray-500 px-3 font-semibold">Report</label>
                <div class="dropdown-container">
                    <div
                        class="dropdown-trigger group flex justify-between items-center gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors {{ Request::is('report*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">
                        <div class="w-full flex gap-2">
                            <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('report*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                                width="20" height="20" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 20a.75.75 0 0 1-.75.75H4.5a2.067 2.067 0 0 1-2.25-2.25V4a.75.75 0 0 1 1.5 0v14.5c0 .589.161.75.75.75H21a.75.75 0 0 1 .75.75ZM7 16.75a.75.75 0 0 0 .75-.75v-3a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 .75.75Zm4 0a.75.75 0 0 0 .75-.75V9a.75.75 0 0 0-1.5 0v7a.75.75 0 0 0 .75.75Zm4 0a.75.75 0 0 0 .75-.75v-5a.75.75 0 0 0-1.5 0v5a.75.75 0 0 0 .75.75Zm4 0a.75.75 0 0 0 .75-.75V5a.75.75 0 0 0-1.5 0v11a.75.75 0 0 0 .75.75Z">
                                </path>
                            </svg>
                            <p>Report</p>
                        </div>
                        <div class="arrow-icon">
                            <svg class="group-hover:fill-sky-500 group-hover:stroke-sky-500 stroke-gray-500 fill-gray-500 transition-colors {{ Request::is('report*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                                width="18" height="18" stroke-width="1.5" viewBox="0 0 24 24" fill=""
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.354 12.354-7 7a.5.5 0 0 1-.708-.708L15.293 12 8.646 5.354a.5.5 0 0 1 .708-.708l7 7a.5.5 0 0 1 0 .708Z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <div class="dropdown-menu bg-white rounded-md">
                        <ul class="py-2">
                            <a href="">
                                <li class="pl-10 py-2 hover:bg-gray-100 cursor-pointer text-gray-500">Daily Report</li>
                            </a>
                            <a href="">
                                <li class="pl-10 py-2 hover:bg-gray-100 cursor-pointer text-gray-500">Monthly Report
                                </li>
                            </a>
                            <a href="">
                                <li class="pl-10 py-2 hover:bg-gray-100 cursor-pointer text-gray-500">All report</li>
                            </a>
                        </ul>
                    </div>
                </div>

                <a href="/analytics"
                    class="flex gap-2 mt-2 text-gray-500 rounded-md py-2 px-3 cursor-pointer hover:bg-sky-50 hover:text-sky-500 transition-colors group {{ Request::is('analytics*') ? 'text-sky-500 bg-sky-50' : 'text-gray-500' }}">

                    <svg class="group-hover:fill-sky-500 fill-gray-500 stroke-gray-500 group-hover:stroke-sky-500 transition-colors {{ Request::is('analytics*') ? 'stroke-sky-500 fill-sky-500' : 'stroke-gray-500 fill-gray-500' }}"
                        width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        color="" stroke-width="1">
                        <rect x="16" y="3" width="5" height="18" rx="2" fill=""></rect>
                        <rect x="9.5" y="9" width="5" height="12" rx="2" fill=""></rect>
                        <rect x="3" y="16" width="5" height="5" rx="2" fill=""></rect>
                    </svg>
                    <p>Analytics</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownContainers = document.querySelectorAll('.dropdown-container');

        dropdownContainers.forEach((dropdownContainer) => {
            const dropdownTrigger = dropdownContainer.querySelector('.dropdown-trigger');
            const dropdownMenu = dropdownContainer.querySelector('.dropdown-menu');

            dropdownTrigger.addEventListener('click', () => {
                dropdownContainer.classList.toggle('active');
                dropdownMenu.classList.toggle('active');
            });
        });
    });
</script>