@extends('layouts.main')
@section('title', $data->title)

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
        .my-board {
            border-radius: 8px;
        }

        .kanban-board {
            max-height: 100vh;
            overflow-y: auto;
            border: 1px solid #cbd5e1;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .kanban-board::-webkit-scrollbar {
            display: none;
        }

        .kanban-drag {
            background-color: #F5F5F5;
        }

        .kanban-board-header {
            background-color: white;
        }

        .kanban-title-board {
            font-weight: 500 !important;
        }

        .kanban-item {
            border-radius: 8px;
            transition: .1s ease-in-out;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -2px rgba(0, 0, 0, 0.1);
        }

        .kanban-item:hover {
            background-color: #f3f4f6;
            cursor: pointer;
        }
    </style>
@endsection

@section('main')
    <div class="flex px-2 justify-between">
        @if (session()->has('errorTask'))
            <x-toast-notification :show="true" variant="error" title="Error!" message="{{ session('errorTask') }}"
                :duration="7000" />
        @endif
        @if (session()->has('successTask'))
            <x-toast-notification :show="true" variant="success" title="Success!" message="{{ session('successTask') }}"
                :duration="7000" />
        @endif
        <button type="button" onclick="modal_create_task.showModal()"
            class="px-3 py-2 bg-blue-600 rounded-md text-white text-sm flex items-center hover:opacity-80 transition">
            <svg width="20" height="20" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                color="#ffffff">
                <path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            Add New Task</button>
        <a href="/project/{{ $data->id }}"
            class="py-2 px-3 text-gray-600 font-medium text-sm flex items-center gap-1 hover:bg-gray-800 hover:text-white rounded-md transition-colors group">
            <svg class="group-hover:fill-white transition-colors" width="20" height="20" viewBox="0 0 24 24" fill="#25314C"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20.83 14.6a3 3 0 0 1 0-5.2.332.332 0 0 0 .12-.46l-1.67-2.88a.32.32 0 0 0-.28-.17.337.337 0 0 0-.17.05 3.018 3.018 0 0 1-3.02-.01 2.99 2.99 0 0 1-1.5-2.59.335.335 0 0 0-.33-.34h-3.96a.335.335 0 0 0-.33.34 2.99 2.99 0 0 1-1.5 2.59 3.018 3.018 0 0 1-3.02.01.319.319 0 0 0-.45.12L3.04 8.94A.317.317 0 0 0 3 9.1a.352.352 0 0 0 .17.3 2.99 2.99 0 0 1 1.5 2.59 3.022 3.022 0 0 1-1.49 2.61h-.01a.332.332 0 0 0-.12.46l1.67 2.88a.32.32 0 0 0 .28.17.337.337 0 0 0 .17-.05 3.042 3.042 0 0 1 3.02.01 3 3 0 0 1 1.49 2.59.337.337 0 0 0 .34.34h3.96a.335.335 0 0 0 .33-.34 2.99 2.99 0 0 1 1.5-2.59 3.018 3.018 0 0 1 3.02-.01.319.319 0 0 0 .45-.12l1.68-2.88a.317.317 0 0 0 .04-.16.352.352 0 0 0-.17-.3ZM12 15a3 3 0 1 1 3-3 3 3 0 0 1-3 3Z">
                </path>
            </svg>

            Detail</a>
    </div>

    <div class="overflow-x-auto max-h-screen pb-2 mt-4">
        <div id="myKanban" class="p-0 m-0"></div>
    </div>
    <!-- Modal create task -->
    <dialog id="modal_create_task" class="modal">
        <form action="{{ url('/task/create') }}" method="POST"
            class="relative max-w-xl bg-white rounded-lg shadow-md p-5 w-full">
            @csrf
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Add new task</h1>
                <button type="button" onclick="modal_create_task.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col max-h-96 overflow-y-auto scrollable px-2">
                <div class="w-full mt-2">
                    <label for="" class="text-sm text-gray-600 font-medium">Title</label>
                    <input type="text"
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                        name="title">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-4 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Start Date</label>
                        <input type="datetime-local"
                            class="w-full p-2 border border-gray-400 rounded-lg text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none bg-gray-50"
                            name="start_date">
                        @error('start_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Due Date</label>
                        <input type="datetime-local"
                            class="w-full p-2 border border-gray-400 rounded-lg  text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none bg-gray-50"
                            name="end_date">
                        @error('end_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="my-3 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Badge</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="badge_tasks_id">
                            <option selected disabled>Select Badge</option>
                            @foreach ($badge as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('badge_tasks_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Assign To</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="users_id">
                            <option selected disabled>Select User</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{ auth()->user()->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('users_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Description</label>
                    <textarea name="description"
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none min-h-40 text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"></textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-3 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Point</label>
                        <input type="number"
                            class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                            name="point">
                        @error('point')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Progress</label>
                        <div class="p-2 border border-gray-200 rounded-md shadow">
                            <div class="relative w-full">
                                <div class="tooltip tooltip-open absolute -top-1 left-1/2 -translate-x-1/2"
                                    id="sliderTooltip" data-tip="50"></div>
                                <input id="rangeInput" name="progress" type="range" min="0" max="100" value="50"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                            </div>
                        </div>

                        @error('progress')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="list_name" value="todo">
            <input type="hidden" name="projects_id" value="{{ $data->id }}">
            <input type="hidden" name="companies_id" value="{{ auth()->user()->companies_id }}">

            <button type="submit"
                class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>
    <!-- Modal update task -->
    <dialog id="modal_update_task" class="modal">
        <form method="POST" id="formUpdateTask" class="relative max-w-xl bg-white rounded-lg shadow-md p-5 w-full">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Update Task</h1>
                <button type="button" onclick="modal_update_task.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col max-h-96 overflow-y-auto scrollable px-2">
                <div class="w-full">
                    <label for="" class="text-sm text-gray-600 font-medium">Title</label>
                    <input type="text"
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                        name="title" id="title">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-4 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Start Date</label>
                        <input type="datetime-local"
                            class="w-full p-2 border border-gray-400 rounded-lg text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none bg-gray-50"
                            name="start_date" id="start_date">
                        @error('start_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm text-gray-600 font-medium">Due Date</label>
                        <input type="datetime-local"
                            class="w-full p-2 border border-gray-400 rounded-lg  text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none bg-gray-50"
                            name="end_date" id="end_date">
                        @error('end_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="my-3 flex items-center gap-5">
                    <div class="w-full">
                        <label for="badge_tasks_id" class="block mb-1 text-sm font-medium text-gray-600">Badge</label>
                        <select class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="badge_tasks_id" id="badge_tasks_id">
                            <option selected disabled>Select Badge</option>
                            @foreach ($badge as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('badge_tasks_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm text-gray-600 font-medium">Assign To</label>
                        <input type="text" value="{{ auth()->user()->name }}"
                            class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition hover:cursor-not-allowed bg-gray-50"
                            readonly disabled>
                        @error('users_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <label for="countries" class="block mb-1 text-sm text-gray-600 font-medium">Description</label>
                    <textarea id="description" name="description"
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none min-h-40 text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"></textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-3 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-600">Point</label>
                        <input type="number"
                            class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                            name="point" id="point">
                        @error('point')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm text-gray-600 font-medium">Progress</label>
                        <div class="p-2 border border-gray-200 rounded-md shadow">
                            <div class="relative w-full">
                                <div class="tooltip tooltip-open absolute -top-1 left-1/2 -translate-x-1/2"
                                    id="sliderTooltip" data-tip="50"></div>
                                <input id="rangeInput" name="progress" type="range" min="0" max="100"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                            </div>
                        </div>

                        @error('progress')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="list_name" id="list_name">
            <input type="hidden" name="projects_id" value="{{ $data->id }}">

            <button type="submit"
                class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>

@endsection

@section('js')
    <script src="{{ asset('/dist/jkanban.min.js') }}"></script>
    <script>

        const todoItems = [
            @foreach ($tasks->where('list_name', 'todo') as $task)
                        {
                    id: "{{ $task->id }}",
                    title: `<div onclick="openUpdateModal({{ $task->id }}, '{{ $task->title }}', '{{ $task->start_date }}', '{{ $task->end_date }}', {{ $task->badge_tasks_id }}, '{{ $task->description }}', {{ $task->point }})">
                                <p class="text-white py-1 px-2 inline-block rounded-md text-sm" style="background-color: {{ $task->badge->color }}">{{ $task->badge->name }}</p>
                                <h1 class="font-medium text-gray-600 mt-2">{{ $task->title }}</h1>
                                <div class="flex gap-2 mt-2">
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->start_date->format('D M') }}</p>
                                    </div>
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->end_date->format('D M') }}</p>
                                    </div>
                                </div>
                                <div class="flex mt-4 items-center gap-4">
                                    <div class="">
                                        <img src="{{ $task->user->img_user ? asset('storage/' . $task->user->img_user) : asset('assets/img/no-profile.svg') }}" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex gap-1 items-center">
                                            <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                                <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm">{{ $task->point }}</p>
                                        </div>
                                        <div class="flex gap-1 items-center task-time" data-task-id="{{ $task->id }}" data-working-hours="{{ $task->working_hour }}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                                <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm task-time-display">{{ $task->working_hour }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-xl">
                                        <div class="{{ $task->progress < 40 ? 'bg-red-500' : ($task->progress < 70 ? 'bg-yellow-500' : 'bg-green-500') }} h-4 rounded-xl" style="width: {{ $task->progress }}%;">
                                            <p class="text-center font-medium text-white text-xs">{{ $task->progress }}%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`,
                    listName: "todo",
                    originalWorkingHour: "{{ $task->working_hour }}"
                },
            @endforeach
        ];

        const progressItems = [
            @foreach ($tasks->where('list_name', 'progress') as $task)
                        {
                    id: "{{ $task->id }}",
                    title: `<div>
                                <p class="text-white py-1 px-2 inline-block rounded-md text-sm" style="background-color: {{ $task->badge->color }}">{{ $task->badge->name }}</p>
                                <h1 class="font-medium text-gray-600 mt-2">{{ $task->title }}</h1>
                                <div class="flex gap-2 mt-2">
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->start_date->format('D M') }}</p>
                                    </div>
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->end_date->format('D M') }}</p>
                                    </div>
                                </div>
                                <div class="flex mt-4 items-center gap-4">
                                    <div class="">
                                        <img src="{{ $task->user->img_user ? asset('storage/' . $task->user->img_user) : asset('assets/img/no-profile.svg') }}" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex gap-1 items-center">
                                            <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                                <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm">{{ $task->point }}</p>
                                        </div>
                                        <div class="flex gap-1 items-center task-time" data-task-id="{{ $task->id }}" data-working-hours="{{ $task->working_hour }}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                                <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm task-time-display">{{ $task->working_hour }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-xl">
                                        <div class="{{ $task->progress < 40 ? 'bg-red-500' : ($task->progress < 70 ? 'bg-yellow-500' : 'bg-green-500') }} h-4 rounded-xl" style="width: {{ $task->progress }}%;">
                                            <p class="text-center font-medium text-white text-xs">{{ $task->progress }}%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`,
                    listName: "progress",
                    originalWorkingHour: "{{ $task->working_hour }}"
                },
            @endforeach
        ];

        const doneItems = [
            @foreach ($tasks->where('list_name', 'done') as $task)
                        {
                    id: "{{ $task->id }}",
                    title: `<div>
                                <p class="text-white py-1 px-2 inline-block rounded-md text-sm" style="background-color: {{ $task->badge->color }}">{{ $task->badge->name }}</p>
                                <h1 class="font-medium text-gray-600 mt-2">{{ $task->title }}</h1>
                                <div class="flex gap-2 mt-2">
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->start_date->format('D M') }}</p>
                                    </div>
                                    <div class="flex gap-1 bg-green-600 items-center p-1 rounded-md">
                                        <svg width="16" height="16" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                                            <path d="M12 6L12 12L18 12" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <p class="text-white text-xs">{{ $task->end_date->format('D M') }}</p>
                                    </div>
                                </div>
                                <div class="flex mt-4 items-center gap-4">
                                    <div class="">
                                        <img src="{{ $task->user->img_user ? asset('storage/' . $task->user->img_user) : asset('assets/img/no-profile.svg') }}" alt="" class="w-10 h-10 rounded-full object-cover object-center">
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex gap-1 items-center">
                                            <svg width="20" height="20" viewBox="0 0 24 24" class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" stroke-width="2.5">
                                                <path stroke-width="2.5" d="M20 4.25h-2.025A1.5 1.5 0 0 0 16.5 3h-9a1.5 1.5 0 0 0-1.475 1.25H4A1.752 1.752 0 0 0 2.25 6v1.65a4.072 4.072 0 0 0 4.1 4.1h.321a6 6 0 0 0 4.579 3.2v3.11Q9 18.408 9 21h6q0-2.6-2.25-2.942v-3.11a6 6 0 0 0 4.579-3.2h.321a4.072 4.072 0 0 0 4.1-4.1V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h2V9a6.09 6.09 0 0 0 .127 1.231A2.562 2.562 0 0 1 3.75 7.65Zm16.5 0a2.562 2.562 0 0 1-2.377 2.581A6.09 6.09 0 0 0 18 9V5.75h2a.25.25 0 0 1 .25.25Z"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm">{{ $task->point }}</p>
                                        </div>
                                        <div class="flex gap-1 items-center task-time" data-task-id="{{ $task->id }}" data-working-hours="{{ $task->working_hour }}">
                                            <svg width="16" height="16" viewBox="0 0 24 24" class="fill-gay-600 stroke-gray-600" stroke-width="2.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="">
                                                <path d="M12 6L12 12L18 12" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M21.8883 10.5C21.1645 5.68874 17.013 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C16.1006 22 19.6248 19.5318 21.1679 16" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M17 16H21.4C21.7314 16 22 16.2686 22 16.6V21" stroke="" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="text-gray-500 font-medium text-sm task-time-display">{{ $task->working_hour }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="w-full bg-gray-200 rounded-xl">
                                        <div class="{{ $task->progress < 40 ? 'bg-red-500' : ($task->progress < 70 ? 'bg-yellow-500' : 'bg-green-500') }} h-4 rounded-xl" style="width: {{ $task->progress }}%;">
                                            <p class="text-center font-medium text-white text-xs">{{ $task->progress }}%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`,
                    listName: "done",
                    originalWorkingHour: "{{ $task->working_hour }}"
                },
            @endforeach
        ];

        const boards = [
            {
                id: "_todo",
                title: "To Do",
                item: todoItems,
                class: "my-board-todo"
            },
            {
                id: "_working",
                title: "In Progress",
                item: progressItems,
                class: "my-board-in-progress"
            },
            {
                id: "_done",
                title: "Done",
                item: doneItems,
                class: "my-board-done"
            }
        ];

        const taskTimers = {};

        function formatTime(seconds) {
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;

            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        function startTaskTimer(taskId) {
            if (taskTimers[taskId]) {
                return;
            }

            const timeElement = document.querySelector(`[data-task-id="${taskId}"] .task-time-display`);
            if (!timeElement) return;

            let currentTime = 0;
            const timeText = timeElement.textContent.trim();

            if (timeText.includes(':')) {
                const [hours, minutes, seconds] = timeText.split(':').map(part => parseInt(part, 10));
                currentTime = hours * 3600 + minutes * 60 + (seconds || 0);
            } else {
                currentTime = parseFloat(timeText) * 3600 || 0;
            }

            // start timer
            taskTimers[taskId] = setInterval(() => {
                currentTime++;
                timeElement.textContent = formatTime(currentTime);

                if (currentTime % 30 === 0) {
                    updateTaskWorkingHour(taskId, formatTime(currentTime));
                }
            }, 1000);
        }


        function stopTaskTimer(taskId) {
            if (taskTimers[taskId]) {
                clearInterval(taskTimers[taskId]);
                delete taskTimers[taskId];

                const timeElement = document.querySelector(`[data-task-id="${taskId}"] .task-time-display`);
                if (timeElement) {
                    updateTaskWorkingHour(taskId, timeElement.textContent);
                }
            }
        }

        function updateTaskWorkingHour(taskId, workingHour) {
            fetch('/task/' + taskId + '/update-working-hour', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    working_hour: workingHour
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Working hour updated successfully:', data);
                })
                .catch(error => {
                    console.error('Error updating working hour:', error);
                });
        }

        function updateTaskListName(taskId, listName) {
            fetch('/task/' + taskId + '/update-list-name', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    list_name: listName
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('List name updated successfully:', data);
                })
                .catch(error => {
                    console.error('Error updating list name:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function () {
            let KanbanTest = new jKanban({
                element: "#myKanban",
                gutter: "10px",
                widthBoard: "300px",
                dragBoards: false,
                itemHandleOptions: {
                    enabled: false,
                },
                dropEl: function (el, target, source, sibling) {
                    const taskId = el.dataset.eid;
                    const sourceId = source.parentElement.getAttribute('data-id');
                    const targetId = target.parentElement.getAttribute('data-id');

                    if (sourceId === targetId) {
                        return;
                    }

                    let newListName;
                    if (targetId === '_todo') {
                        newListName = 'todo';
                        stopTaskTimer(taskId);
                    } else if (targetId === '_working') {
                        newListName = 'progress';
                        startTaskTimer(taskId);
                    } else if (targetId === '_done') {
                        newListName = 'done';
                        stopTaskTimer(taskId);
                    }

                    if (newListName) {
                        updateTaskListName(taskId, newListName);
                    }
                },
                boards: boards
            });

            progressItems.forEach(item => {
                startTaskTimer(item.id);
            });

            window.addEventListener('beforeunload', function () {
                Object.keys(taskTimers).forEach(taskId => {
                    stopTaskTimer(taskId);
                });
            });
        });

        const range = document.getElementById("rangeInput");
        const tooltip = document.getElementById("sliderTooltip");

        range.addEventListener("input", function () {
            const val = +range.value;
            tooltip.setAttribute("data-tip", val);

            const percent = val / (range.max - range.min);
            const offset = range.offsetWidth * percent;

            tooltip.style.left = `${offset}px`;
            tooltip.style.transform = "translateX(-50%)";
        });

        function openUpdateModal(taskId, title, start_date, end_date, badge_tasks_id, description, point, progress = 0, list_name = '') {
            const form = document.getElementById('formUpdateTask');
            form.action = `/task/${taskId}`;

            document.getElementById('title').value = title;
            document.getElementById('start_date').value = start_date;
            document.getElementById('end_date').value = end_date;
            document.getElementById('badge_tasks_id').value = badge_tasks_id;
            document.getElementById('description').value = description;
            document.getElementById('point').value = point;
            document.getElementById('rangeInput').value = progress;
            document.getElementById('sliderTooltip').setAttribute('data-tip', progress);
            document.getElementById('list_name').value = list_name;

            range.value = progress;
            range.dispatchEvent(new Event("input"));

            modal_update_task.showModal();
        }


    </script>
@endsection