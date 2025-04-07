@extends('dashboard')
@section('main')
@section('title', 'Project List')
<div class="w-full">
    <!-- <button>Test</button> -->
    <div class="grid grid-cols-[repeat(auto-fill,minmax(19rem,1fr))] gap-5">
        <div class="bg-white shadow rounded px-5 py-2">
            <div class="flex justify-between items-center border-b py-2">
                <h1 class="font-medium">Label Project</h1>
                <p class="text-sm bg-green-600 py-1 px-3 text-white rounded-lg">Status</p>
            </div>
            <div class="flex flex-col border-b border-gray-400 py-2">
                <div>
                    <h1 class="font-semibold">Title Project</h1>
                    <p class="text-sm text-gray-600 mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, officiis quae excepturi molestias dolores veritatis?</p>
                </div>

                <div class="flex -space-x-3 mt-5">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <a class="flex items-center justify-center w-12 h-12 text-xs font-medium text-gray-800 bg-gray-300 border-2 border-white rounded-full" href="#">+99</a>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mt-4">
                <div class="flex gap-4 items-start w-full">
                    <div class="block text-center">
                        <svg viewBox="0 0 24 24" class="fill-gray-500 stroke-gray-500 font-semibold" width="24" height="24" stroke-width="0.5" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path
                                stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 4h-1.5V3a.5.5 0 0 0-1 0v1h-7V3a.5.5 0 0 0-1 0v1H6C3.71 4 2.5 5.21 2.5 7.5V18c0 2.29 1.21 3.5 3.5 3.5h12c2.29 0 3.5-1.21 3.5-3.5V7.5C21.5 5.21 20.29 4 18 4ZM6 5h1.5v1a.5.5 0 0 0 1 0V5h7v1a.5.5 0 0 0 1 0V5H18c1.729 0 2.5.771 2.5 2.5v1h-17v-1C3.5 5.771 4.271 5 6 5Zm12 15.5H6c-1.729 0-2.5-.771-2.5-2.5V9.5h17V18c0 1.729-.771 2.5-2.5 2.5ZM8.75 13a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Zm-8 4a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">Dec</p>
                    </div>
                    <div class="block text-center">
                        <svg class="stroke-gray-500 fill-gray-500" width="24" height="24" stroke-width="0.5" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" d="M2.25 6A.75.75 0 0 1 3 5.25h18a.75.75 0 0 1 0 1.5H3A.75.75 0 0 1 2.25 6ZM21 11.25H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Zm0 6H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">32</p>
                    </div>
                    <div class="block">
                        <svg class=" text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">14</p>
                    </div>
                </div>
                <div class="w-full flex gap-2 items-center">
                    <div class="bg-gray-300 w-full rounded-md h-2">
                        <div class="w-1/2 h-2 bg-yellow-500 rounded-md"></div>
                    </div>
                    <p class="text-sm text-gray-600">50%</p>
                </div>
            </div>

        </div>
        <div class="bg-white shadow rounded px-5 py-2">
            <div class="flex justify-between items-center border-b py-2">
                <h1 class="font-medium">Label Project</h1>
                <p class="text-sm bg-yellow-500 py-1 px-3 text-white rounded-lg">Status</p>
            </div>
            <div class="flex flex-col border-b border-gray-400 py-2">
                <div>
                    <h1 class="font-semibold">Title Project</h1>
                    <p class="text-sm text-gray-600 mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, officiis quae excepturi molestias dolores veritatis?</p>
                </div>

                <div class="flex -space-x-3 mt-5">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <a class="flex items-center justify-center w-12 h-12 text-xs font-medium text-gray-800 bg-gray-300 border-2 border-white rounded-full" href="#">+99</a>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mt-4">
                <div class="flex gap-4 items-start w-full">
                    <div class="block text-center">
                        <svg viewBox="0 0 24 24" class="fill-gray-500 stroke-gray-500 font-semibold" width="24" height="24" stroke-width="0.5" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path
                                stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 4h-1.5V3a.5.5 0 0 0-1 0v1h-7V3a.5.5 0 0 0-1 0v1H6C3.71 4 2.5 5.21 2.5 7.5V18c0 2.29 1.21 3.5 3.5 3.5h12c2.29 0 3.5-1.21 3.5-3.5V7.5C21.5 5.21 20.29 4 18 4ZM6 5h1.5v1a.5.5 0 0 0 1 0V5h7v1a.5.5 0 0 0 1 0V5H18c1.729 0 2.5.771 2.5 2.5v1h-17v-1C3.5 5.771 4.271 5 6 5Zm12 15.5H6c-1.729 0-2.5-.771-2.5-2.5V9.5h17V18c0 1.729-.771 2.5-2.5 2.5ZM8.75 13a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Zm-8 4a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">Dec</p>
                    </div>
                    <div class="block text-center">
                        <svg class="stroke-gray-500 fill-gray-500" width="24" height="24" stroke-width="0.5" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" d="M2.25 6A.75.75 0 0 1 3 5.25h18a.75.75 0 0 1 0 1.5H3A.75.75 0 0 1 2.25 6ZM21 11.25H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Zm0 6H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">32</p>
                    </div>
                    <div class="block">
                        <svg class=" text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">14</p>
                    </div>
                </div>
                <div class="w-full flex gap-2 items-center">
                    <div class="bg-gray-300 w-full rounded-md h-2">
                        <div class="w-1/2 h-2 bg-yellow-500 rounded-md"></div>
                    </div>
                    <p class="text-sm text-gray-600">50%</p>
                </div>
            </div>

        </div>
        <div class="bg-white shadow rounded px-5 py-2">
            <div class="flex justify-between items-center border-b py-2">
                <h1 class="font-medium">Label Project</h1>
                <p class="text-sm bg-red-600 py-1 px-3 text-white rounded-lg">Status</p>
            </div>
            <div class="flex flex-col border-b border-gray-400 py-2">
                <div>
                    <h1 class="font-semibold">Title Project</h1>
                    <p class="text-sm text-gray-600 mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, officiis quae excepturi molestias dolores veritatis?</p>
                </div>

                <div class="flex -space-x-3 mt-5">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <img class="w-12 h-12 border-2 border-white rounded-full dark:border-gray-800" src="https://coderthemes.com/konrix/layouts/assets/images/users/avatar-2.jpg" alt="">
                    <a class="flex items-center justify-center w-12 h-12 text-xs font-medium text-gray-800 bg-gray-300 border-2 border-white rounded-full" href="#">+99</a>
                </div>
            </div>
            <div class="w-full flex justify-between items-center mt-4">
                <div class="flex gap-4 items-start w-full">
                    <div class="block text-center">
                        <svg viewBox="0 0 24 24" class="fill-gray-500 stroke-gray-500 font-semibold" width="24" height="24" stroke-width="0.5" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path
                                stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M18 4h-1.5V3a.5.5 0 0 0-1 0v1h-7V3a.5.5 0 0 0-1 0v1H6C3.71 4 2.5 5.21 2.5 7.5V18c0 2.29 1.21 3.5 3.5 3.5h12c2.29 0 3.5-1.21 3.5-3.5V7.5C21.5 5.21 20.29 4 18 4ZM6 5h1.5v1a.5.5 0 0 0 1 0V5h7v1a.5.5 0 0 0 1 0V5H18c1.729 0 2.5.771 2.5 2.5v1h-17v-1C3.5 5.771 4.271 5 6 5Zm12 15.5H6c-1.729 0-2.5-.771-2.5-2.5V9.5h17V18c0 1.729-.771 2.5-2.5 2.5ZM8.75 13a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Zm-8 4a.75.75 0 1 1-.761-.75H8a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H12a.748.748 0 0 1 .75.75Zm4 0a.75.75 0 1 1-.761-.75H16a.748.748 0 0 1 .75.75Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">Dec</p>
                    </div>
                    <div class="block text-center">
                        <svg class="stroke-gray-500 fill-gray-500" width="24" height="24" stroke-width="0.5" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                            <path stroke=""
                                stroke-width="0.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" d="M2.25 6A.75.75 0 0 1 3 5.25h18a.75.75 0 0 1 0 1.5H3A.75.75 0 0 1 2.25 6ZM21 11.25H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Zm0 6H3a.75.75 0 0 0 0 1.5h18a.75.75 0 0 0 0-1.5Z"></path>
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">32</p>
                    </div>
                    <div class="block">
                        <svg class=" text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 mt-1">14</p>
                    </div>
                </div>
                <div class="w-full flex gap-2 items-center">
                    <div class="bg-gray-300 w-full rounded-md h-2">
                        <div class="w-1/2 h-2 bg-yellow-500 rounded-md"></div>
                    </div>
                    <p class="text-sm text-gray-600">50%</p>
                </div>
            </div>

        </div>

        <a href="/project/create" class="px-5 py-2 border-2 border-dashed border-gray-400 rounded-lg min-h-48 flex flex-col items-center justify-center gap-4 hover:bg-gray-200 cursor-pointer transition-colors">
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'>
                <g id="add_line" fill='none'>
                    <path d='M24 0v24H0V0zM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01z' />
                    <path fill='#4b5563' d='M11 20a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 1 0-2 0v7H4a1 1 0 1 0 0 2h7z' />
                </g>
            </svg>
            <h1 class="text-gray-600 font-semibold">Create New Project</h1>
        </a>
    </div>
</div>
@endsection