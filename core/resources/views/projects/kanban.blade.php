@extends('dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('/dist/jkanban.min.css') }}">
    <style>
        .my-board .kanban-title-board {
            color: #4b5563;
        }

        .kanban-drag,
        .my-board {
            background-color: #e5e7eb;
        }

        .kanban-board,
        .my-board,
        .kanban-drag {
            border-radius: 8px;
            /* border: 2px solid ; */
        }

        .kanban-board {
            max-height: 100vh;
            overflow-y: auto;
        }

        .kanban-board::-webkit-scrollbar {
            display: none;
        }

        .kanban-board {
            -ms-overflow-style: none;
            scrollbar-width: none;
            /* border: 2px solid black */
        }

        .kanban-item {
            border-radius: 8px;
            transition: .1s ease-in-out;
        }

        .kanban-item:hover {
            background-color: #f3f4f6;
            cursor: pointer;
        }
    </style>
@endsection

@section('main')
    <div class="flex px-2 gap-4">
        <button class="px-3 py-2 bg-blue-600 rounded-md text-white text-sm flex items-center hover:opacity-80 transition">
            <svg width="20" height="20" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                color="#ffffff">
                <path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            Add New Task</button>
        <button class="py-2 border-b-transparent hover:border-b-2 hover:border-gray-400 transition-all text-gray-600 font-medium text-sm flex items-center gap-1">
            <svg width="20" height="20" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                color="#4b5563">
                <path d="M3 5H21" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3 12H21" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M3 19H21" stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>

            Projects Details</button>
    </div>

    <div class="overflow-x-auto max-h-screen [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar]:h-2
                  [&::-webkit-scrollbar-track]:bg-gray-100
                  [&::-webkit-scrollbar-thumb]:bg-gray-300
                  [&::-webkit-scrollbar-thumb]:rounded-full pb-2 mt-4">
        <div id="myKanban" class="p-0 m-0"></div>
    </div>
    <!-- Still experiment -->
    <!-- <div class="max-w-72 border p-4 bg-white rounded-lg shadow-md mt-4 hover:bg-gray-100 transition-colors ">
            <p class="bg-blue-600 text-white py-1 px-2 inline-block rounded-md text-sm">Badge</p>
            <h1 class="font-medium text-gray-600 mt-2">Title task</h1>
            <div class="flex gap-2 mt-2">
                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-white text-xs">12 Mei</p>
                </div>
                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-white text-xs">12 Mei</p>
                </div>
            </div>
            <div class="flex mt-4 items-center gap-4">
                <div class="">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt=""
                        class="w-10 h-10 rounded-full object-cover object-center">
                </div>
                <div class="flex gap-4">
                    <div class="flex gap-1 items-center">
                        <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg"
                            stroke-width="2.5">
                            <path stroke-width="2.5"
                                d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z">
                            </path>
                        </svg>
                        <p class="text-gray-500 font-medium text-sm">12.5</p>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5"
                            fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                            <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16"
                                stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="text-gray-500 font-medium text-sm">12h 42m</p>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="w-full bg-gray-200 rounded-xl">
                    <div class="w-40 bg-green-600 h-4 rounded-xl">
                        <p class="text-center font-medium text-white text-xs">50%</p>
                    </div>
                </div>
            </div>
        </div> -->

@endsection

@section('js')
    <script src="{{ asset('/dist/jkanban.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var KanbanTest = new jKanban({
                element: "#myKanban",
                gutter: "10px",
                widthBoard: "320px",
                dragBoards: false,
                itemHandleOptions: {
                    enabled: false,
                },
                dropEl: function (el, target, source, sibling) {
                    console.log("Dropped!");
                },
                boards: [{
                    id: "_todo",
                    title: "To Do",
                    item: [{
                        id: "task1",
                        title: `<div">
                            <p class="bg-blue-600 text-white py-1 px-2 inline-block rounded-md text-sm">Badge</p>
                            <h1 class="font-medium text-gray-600 mt-2">Title task</h1>
                            <div class="flex gap-2 mt-2">
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                            </div>
                            <div class="flex mt-4 items-center gap-4">
                                <div class="">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex gap-1 items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                            <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12.5</p>
                                    </div>
                                    <div class="flex gap-1 items-center">
                                        <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                            <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12h 42m</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full bg-gray-200 rounded-xl">
                                    <div class="w-40 bg-green-600 h-4 rounded-xl">
                                        <p class="text-center font-medium text-white text-xs">50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    }],
                    class: "my-board"
                },
                {
                    id: "_working",
                    title: "In Progress",
                    item: [{
                        title: `<div">
                            <p class="bg-blue-600 text-white py-1 px-2 inline-block rounded-md text-sm">Badge</p>
                            <h1 class="font-medium text-gray-600 mt-2">Title task</h1>
                            <div class="flex gap-2 mt-2">
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                            </div>
                            <div class="flex mt-4 items-center gap-4">
                                <div class="">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex gap-1 items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                            <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12.5</p>
                                    </div>
                                    <div class="flex gap-1 items-center">
                                        <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                            <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12h 42m</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full bg-gray-200 rounded-xl">
                                    <div class="w-40 bg-green-600 h-4 rounded-xl">
                                        <p class="text-center font-medium text-white text-xs">50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    }],
                    class: "my-board"
                },
                {
                    id: "_done",
                    title: "Done",
                    item: [{
                        title: `<div">
                            <p class="bg-blue-600 text-white py-1 px-2 inline-block rounded-md text-sm">Badge</p>
                            <h1 class="font-medium text-gray-600 mt-2">Title task</h1>
                            <div class="flex gap-2 mt-2">
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                                <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                    <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                        <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-white text-xs">12 Mei</p>
                                </div>
                            </div>
                            <div class="flex mt-4 items-center gap-4">
                                <div class="">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex gap-1 items-center">
                                        <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                            <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12.5</p>
                                    </div>
                                    <div class="flex gap-1 items-center">
                                        <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                            <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium text-sm">12h 42m</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full bg-gray-200 rounded-xl">
                                    <div class="w-40 bg-green-600 h-4 rounded-xl">
                                        <p class="text-center font-medium text-white text-xs">50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    }],
                    class: "my-board"
                }
                ]
            });
        });
    </script>
@endsection