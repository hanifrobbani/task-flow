@extends('dashboard')
@section('title', 'Project Name')

@section('main')
    <div class="w-full bg-white rounded-lg shadow-md min-h-32">
        <div class="border-b">
            <div class="p-4">
                <h1 class="font-medium text-gray-600">Project Overview</h1>
            </div>
        </div>
        <div class="flex p-4">
            <div class=" flex gap-4 items-center w-full">
                <svg width="48" height="48" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" color="#4b5563">
                    <path
                        d="M3 7.4V3.6C3 3.26863 3.26863 3 3.6 3H9.4C9.73137 3 10 3.26863 10 3.6V7.4C10 7.73137 9.73137 8 9.4 8H3.6C3.26863 8 3 7.73137 3 7.4Z"
                        stroke="#4b5563" stroke-width="1.5"></path>
                    <path
                        d="M14 20.4V16.6C14 16.2686 14.2686 16 14.6 16H20.4C20.7314 16 21 16.2686 21 16.6V20.4C21 20.7314 20.7314 21 20.4 21H14.6C14.2686 21 14 20.7314 14 20.4Z"
                        stroke="#4b5563" stroke-width="1.5"></path>
                    <path
                        d="M14 12.4V3.6C14 3.26863 14.2686 3 14.6 3H20.4C20.7314 3 21 3.26863 21 3.6V12.4C21 12.7314 20.7314 13 20.4 13H14.6C14.2686 13 14 12.7314 14 12.4Z"
                        stroke="#4b5563" stroke-width="1.5"></path>
                    <path
                        d="M3 20.4V11.6C3 11.2686 3.26863 11 3.6 11H9.4C9.73137 11 10 11.2686 10 11.6V20.4C10 20.7314 9.73137 21 9.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z"
                        stroke="#4b5563" stroke-width="1.5"></path>
                </svg>
                <div>
                    <p class="font-semibold text-gray-600">180</p>
                    <p class="text-gray-600 text-sm">Total Task</p>
                </div>
            </div>
            <div class=" flex gap-4 items-center w-full">
                <svg width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                    xmlns="http://www.w3.org/2000/svg" color="#4b5563">
                    <path d="M8.5 4H6C4.89543 4 4 4.89543 4 6V20C4 21.1046 4.89543 22 6 22H12" stroke="#4b5563"
                        stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M15.5 4H18C19.1046 4 20 4.89543 20 6V15" stroke="#4b5563" stroke-width="1.5"
                        stroke-linecap="round"></path>
                    <path
                        d="M8 6.4V4.5C8 4.22386 8.22386 4 8.5 4C8.77614 4 9.00422 3.77604 9.05152 3.50398C9.19968 2.65171 9.77399 1 12 1C14.226 1 14.8003 2.65171 14.9485 3.50398C14.9958 3.77604 15.2239 4 15.5 4C15.7761 4 16 4.22386 16 4.5V6.4C16 6.73137 15.7314 7 15.4 7H8.6C8.26863 7 8 6.73137 8 6.4Z"
                        stroke="#4b5563" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M15.5 20.5L17.5 22.5L22.5 17.5" stroke="#4b5563" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
                <div>
                    <p class="font-semibold text-gray-600">200</p>
                    <p class="text-gray-600 text-sm">Total Task Completed</p>
                </div>
            </div>
            <div class=" flex gap-4 items-center w-full">
                <svg width="48" height="48" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="1.7"
                    fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                    <path d="M12 6L12 12L18 12" stroke="" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                    <path
                        d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16"
                        stroke="" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div>
                    <p class="font-semibold text-gray-600">200</p>
                    <p class="text-gray-600 text-sm">Total Hour Spent</p>
                </div>
            </div>
            <div class=" flex gap-4 items-center w-full">
                <svg class="fill-gray-600" width="48" height="48" viewBox="0 0 24 24" fill=""
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 4.25h-1.275a2.246 2.246 0 0 0-2.225-2h-9a2.246 2.246 0 0 0-2.225 2H4A1.752 1.752 0 0 0 2.25 6v1.65a4.024 4.024 0 0 0 3.568 4.05 6.765 6.765 0 0 0 5.432 4v1.6c-1.938.258-3 1.543-3 3.7v.75h7.5V21c0-2.153-1.062-3.438-3-3.7v-1.6a6.765 6.765 0 0 0 5.432-4 4.024 4.024 0 0 0 3.568-4.05V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h1.25V9a6.844 6.844 0 0 0 .085 1.019A2.448 2.448 0 0 1 3.75 7.65Zm10.437 12.6H9.813c.2-1.043.887-1.5 2.187-1.5s1.985.457 2.187 1.5Zm-2.187-6A5.256 5.256 0 0 1 6.75 9V4.5a.751.751 0 0 1 .75-.75h9a.751.751 0 0 1 .75.75V9A5.256 5.256 0 0 1 12 14.25Zm8.247-6.6a2.448 2.448 0 0 1-1.585 2.369A6.844 6.844 0 0 0 18.75 9V5.75H20a.25.25 0 0 1 .25.25Z">
                    </path>
                </svg>
                <div>
                    <p class="font-semibold text-gray-600">40%</p>
                    <p class="text-gray-600 text-sm">Progress</p>
                </div>
            </div>

        </div>
    </div>

    <div class="flex gap-5 mt-10">
        <div class="w-full bg-white rounded-lg shadow-md min-h-32 hover:bg-gray-50 transition-colors group">
            <div class="border-b">
                <div class="p-4 flex justify-between">
                    <h1 class="font-medium text-gray-600">About Project</h1>
                    <a href="" class="hidden group-hover:flex items-center text-gray-600 text-sm"><svg width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="#4b5563">
                            <path
                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>Edit</a>
                </div>
            </div>
            <div class="p-4">
                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet dolores
                    adipisci magni dolor nostrum natus provident blanditiis nulla perspiciatis laudantium eligendi
                    necessitatibus placeat asperiores sapiente, nisi maiores quo molestias vitae aliquid. Fuga sed dicta
                    maxime, similique voluptatibus accusamus assumenda et!<br><br>Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Totam maiores soluta voluptatem, commodi incidunt modi perferendis molestiae nulla
                    deleniti vero voluptate ipsa fugit culpa non, sed odit minima iste quo.</p>

                <div class="flex justify-between w-full mt-10">
                    <div class="">
                        <h1 class="text-gray-600">Start Date</h1>
                        <p class="text-gray-700 font-medium">17 May, 2020</p>
                    </div>
                    <div class="">
                        <h1 class="text-gray-600">Due Date</h1>
                        <p class="text-gray-700 font-medium">30 Oct, 2020</p>
                    </div>
                    <div class="">
                        <h1 class="text-gray-600">Owner</h1>
                        <p class="text-gray-700 font-medium">Hanif Ridwan</p>
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-gray-700 font-medium text-sm">Attached Files</h1>
                    <a href=""
                        class="font-medium text-blue-600 text-sm flex items-center hover:underline transition group">See All
                        Attached File

                        <svg class="group-hover:ml-2 transition-all" width="18" height="18" viewBox="0 0 24 24"
                            stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg" color="#2563eb">
                            <path d="M13 6L19 12L13 18" stroke="#2563eb" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M5 6L11 12L5 18" stroke="#2563eb" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-1/2 bg-white rounded-lg shadow-md min-h-32 max-h-screen hover:bg-gray-50 transition-colors group">
            <div class="border-b">
                <div class="p-4 flex justify-between">
                    <h1 class="font-medium text-gray-600">Team Member</h1>
                    <button class="hidden group-hover:flex items-center text-gray-600 text-sm"><svg width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="#4b5563">
                            <path
                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>Edit</button>
                </div>
            </div>
            <div class="w-full">
                <div class="flex px-4 py-2 gap-2 mb-2 border-b">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt=""
                        class="w-12 h-12 rounded-full object-cover object-center">
                    <div class="text-sm w-full flex justify-between items-center">
                        <div class="">
                            <h1 class="font-medium text-gray-700">James Bone</h1>
                            <p class="text-gray-600">bonejames@mail.com</p>
                        </div>
                        <div class="border">
                            <p class="inline-block py-1 px-2 text-xs font-medium bg-purple-300 text-purple-800 rounded-md">
                                PM</p>
                        </div>
                    </div>
                </div>
                <div class="flex px-4 py-2 gap-2 mb-2 border-b">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt=""
                        class="w-12 h-12 rounded-full object-cover object-center">
                    <div class="text-sm w-full flex justify-between items-center">
                        <div class="">
                            <h1 class="font-medium text-gray-700">James Bone</h1>
                            <p class="text-gray-600">bonejames@mail.com</p>
                        </div>
                        <div class="border">
                            <p class="inline-block py-1 px-2 text-xs font-medium bg-blue-300 text-blue-800 rounded-md">
                                Backend</p>
                        </div>
                    </div>
                </div>
                <div class="flex px-4 py-2 gap-2 mb-2 border-b">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt=""
                        class="w-12 h-12 rounded-full object-cover object-center">
                    <div class="text-sm w-full flex justify-between items-center">
                        <div class="">
                            <h1 class="font-medium text-gray-700">James Bone</h1>
                            <p class="text-gray-600">bonejames@mail.com</p>
                        </div>
                        <div class="border">
                            <p class="inline-block py-1 px-2 text-xs font-medium bg-green-300 text-green-800 rounded-md">
                                Frontend</p> <!-- max 12 kata -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection