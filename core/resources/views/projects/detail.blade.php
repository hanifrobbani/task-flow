@extends('dashboard')
@section('title', $data->title)

@section('main')
    <div class="w-full bg-white rounded-lg shadow-md min-h-32">
        @if (session()->has('errorProject'))
            <x-toast-notification :show="true" variant="error" title="Error!" message="{{ session('errorProject') }}"
                :duration="7000" />
        @endif
        @if (session()->has('successProject'))
            <x-toast-notification :show="true" variant="success" title="Success!" message="{{ session('successProject') }}"
                :duration="7000" />
        @endif

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
                    <p class="font-semibold text-gray-600">{{ $data->tasks->count() }}</p>
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
                    <p class="font-semibold text-gray-600">{{ $data->tasks->filter(fn($task) => $task->list_name === 'done')->count() }}</p>
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
                    <p class="font-semibold text-gray-600">{{ $totalHours }}</p>
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
                    <p class="font-semibold text-gray-600">{{ $data->progress }}%</p>
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
                    <button type="button" onclick="modal_edit_project.showModal()"
                        class="hidden group-hover:flex items-center text-gray-600 text-sm"><svg width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="#4b5563">
                            <path
                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>Edit</button>
                </div>
            </div>
            <div class="p-4">
                <p class="text-gray-600 text-sm">{{ $data->description }}</p>

                <div class="flex justify-between w-full mt-10">
                    <div class="">
                        <h1 class="text-gray-600">Start Date</h1>
                        <p class="text-gray-700 font-medium">{{ $data->start_date->format('d M, Y') }}</p>
                    </div>
                    <div class="">
                        <h1 class="text-gray-600">Due Date</h1>
                        <p class="text-gray-700 font-medium">{{ $data->end_date->format('d M, Y') }}</p>
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
        <div class="w-full max-w-sm bg-white rounded-lg shadow-md min-h-32 max-h-screen hover:bg-gray-50 transition-colors group">
            <div class="border-b">
                <div class="p-4 flex justify-between">
                    <h1 class="font-medium text-gray-600">Team Member</h1>
                    <button type="button" onclick="modal_edit_member.showModal()"
                        class="hidden group-hover:flex items-center text-gray-600 text-sm"><svg width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="#4b5563">
                            <path
                                d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                                stroke="#4b5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>Edit</button>
                </div>
            </div>
            <div class="w-full">
                @php
                    $bgColors = [
                        'bg-red-300 text-red-800',
                        'bg-green-300 text-green-800',
                        'bg-blue-300 text-blue-800',
                        'bg-yellow-300 text-yellow-800',
                        'bg-purple-300 text-purple-800',
                        'bg-teal-300 text-teal-800',
                    ];
                @endphp

                @foreach ($data->teamMembers as $member)
                    @php
                        $randomColor = $bgColors[array_rand($bgColors)];
                    @endphp
                    <div class="flex px-4 py-2 gap-2 mb-2 border-b">
                        <img src="{{ $member->user->img_user ? asset('storage/' . $member->user->img_user) : asset('assets/img/no-profile.svg') }}"
                            alt="" class="w-12 h-12 rounded-full object-cover object-center">
                        <div class="text-sm w-full flex justify-between items-center">
                            <div>
                                <h1 class="font-medium text-gray-700">{{ $member->user->name }}</h1>
                                <p class="text-gray-600">{{ Str::limit($member->user->email, 24) }}</p>
                            </div>
                            <div class="border">
                                <p class="inline-block py-1 px-2 text-xs font-medium rounded-md {{ $randomColor }}">
                                    {{ $member->user->userPosition->name ?? 'No Position'}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="w-full bg-white rounded-lg shadow-md mt-5 p-4">
        <div class="border-b border-gray-200 pb-2 mb-2">
            <h1 class="font-medium text-lg text-red-600">Danger Zone</h1>
        </div>
        <div class="space-y-2">
            <div class="flex justify-between items-center border-b border-gray-200 pb-2">
                <div class="">
                    <p class="font-medium">Close Project</p>
                    <p class="text-sm text-gray-700">make this project inaccessible</p>
                </div>
                <button class="text-sm px-3 py-2 bg-gray-800 text-white font-medium rounded-md">Close Project</button>
            </div>
            <div class="flex justify-between items-center pb-2">
                <div class="">
                    <p class="font-medium">Delete Project</p>
                    <p class="text-sm text-gray-700">Once you do this, there is no going back!</p>
                </div>
                <button class="text-sm px-3 py-2 bg-red-600 text-white font-medium rounded-md" type="button" onclick="modal_delete_project.showModal()">Delete Project</button>
            </div>
        </div>
    </div>

    <!-- Modal form project -->
    <dialog id="modal_edit_project" class="modal">
        <form action="{{ url('/project/' . $data->id) }}" method="POST"
            class="relative max-w-2xl bg-white rounded-lg shadow-md p-5 w-full">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Edit Project</h1>
                <button type="button" onclick="modal_edit_project.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="max-h-96 overflow-y-auto scrollable p-2">
                <div class="mb-2 flex justify-between gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Badge Project</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="badge">
                            <option disabled {{ $data->badge ? '' : 'selected' }}>Select Badge</option>
                            <option value="web development" {{ $data->badge == 'web development' ? 'selected' : '' }}>Web
                                Development</option>
                            <option value="design" {{ $data->badge == 'design' ? 'selected' : '' }}>Design</option>
                            <option value="marketing" {{ $data->badge == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        </select>

                        @error('badge')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Prority</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="priority">
                            <option disabled {{ $data->priority == '' ? 'selected' : '' }}>Select Priority</option>
                            <option value="low" {{ $data->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $data->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $data->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="my-3">
                    <label for="countries" class="block mb-1 text-sm font-medium">Project Title</label>
                    <input type="text"
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"
                        name="title" value="{{ old('title', $data->title) }}">
                    @error('title')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="countries" class="block mb-1 text-sm font-medium">Description Project</label>
                    <textarea name="description" id=""
                        class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none min-h-40 text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition">{{ old('description', $data->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="countries" class="block mb-1 text-sm font-medium">Status</label>
                    <div class="flex gap-4 items-center">
                        <div class="flex items-center">
                            <input {{ $data->is_private == '0' ? 'checked' : '' }} id="radio-type-1" type="radio" value="0"
                                name="is_private" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="radio-type" class="ms-1 text-sm font-medium text-gray-800">Public</label>
                        </div>

                        <div class="flex items-center">
                            <input id="radio-type-2" type="radio" {{ $data->is_private == '1' ? 'checked' : '' }} value="1"
                                name="is_private" class="w-4 h-4">
                            <label for="default-radio-2" class="ms-1 text-sm font-medium text-gray-800">Private</label>
                        </div>
                    </div>

                    <div class="flex mt-1">
                        <p class="text-red-600 -mt-1">*</p>
                        <p class="text-sm font-medium text-blue-600" id="radio-text"></p>
                    </div>
                    @error('is_private')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="my-3 flex items-center gap-5">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Start Date</label>
                        <input type="date"
                            class="w-full p-2 border border-gray-400 rounded-lg text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none"
                            name="start_date" value="{{ old('start_date', $data->start_date->format('Y-m-d')) }}">
                        @error('start_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 text-sm font-medium">Due Date</label>
                        <input type="date"
                            class="w-full p-2 border border-gray-400 rounded-lg  text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none"
                            name="end_date" value="{{ old('end_date', $data->end_date->format('Y-m-d')) }}">
                        @error('end_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>

    <!-- Modal form member -->
    <dialog id="modal_edit_member" class="modal">
        <form action="{{ url('/project/member/' . $data->id) }}" method="POST"
            class="relative max-w-2xl bg-white rounded-lg shadow-md p-5 w-full">
            @csrf
            @method('PUT')
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Edit Member</h1>
                <button type="button" onclick="modal_edit_member.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="dropdown w-full">
                <div tabindex="0" role="button"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg inline-flex justify-between items-center w-full p-2.5 outline-none">
                    Select Team Member
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="dropdown-content z-[1] bg-white border shadow-md rounded-lg w-full max-h-96 overflow-y-auto mt-2 p-2">
                    @foreach ($user as $item)
                        <li>
                            <label class="flex items-center gap-2 p-2 hover:bg-gray-100 rounded-sm cursor-pointer">
                                <input type="checkbox" name="memberId[{{ $item->id }}]" value="{{ $item->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2 hover:cursor-pointer item-checkbox"
                                    {{ $data->teamMembers->contains('users_id', $item->id) ? 'checked' : '' }} />
                                <img src="{{ $item->img_user ? asset('storage/' . $item->img_user) : asset('assets/img/no-profile.svg') }}"
                                    class="w-8 h-8 rounded-full object-cover object-center" />
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $item->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $item->userPosition->name ?? 'No Position' }}</p>
                                </div>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>


            <button type="submit"
                class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>
    
    <!-- Modal delete project -->
    <dialog id="modal_delete_project" class="modal">
        <form action="{{ url('/project/' . $data->id) }}" method="POST" class="relative max-w-md bg-white rounded-lg shadow-md p-6 z-50 w-full">
            @csrf
            @method('DELETE')
            <div class="flex gap-2 items-center">
                <div>
                    <div class="p-2 rounded-full bg-red-200" x-show="variant === 'danger'" id="danger">
                        <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="#b91c1c">
                            <path
                                d="M20.0429 21H3.95705C2.41902 21 1.45658 19.3364 2.22324 18.0031L10.2662 4.01533C11.0352 2.67792 12.9648 2.67791 13.7338 4.01532L21.7768 18.0031C22.5434 19.3364 21.581 21 20.0429 21Z"
                                stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 9V13" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round">
                            </path>
                            <path d="M12 17.01L12.01 16.9989" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-lg font-semibold text-gray-800 mb-2">Delete Project</h1>
            </div>
            <div class="my-2">
                <p class="text-sm text-gray-600">Are you sure want to delete this project?</p>
            </div>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="modal_delete_project.close()"
                    class="text-sm font-medium border border-gray-300 px-3 py-1 rounded-md hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="text-sm font-medium bg-red-600 text-white px-3 py-1 rounded-md hover:opacity-80 transition">
                    Yes, Delete!
                </button>
            </div>
        </form>

    </dialog>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radioPublic = document.getElementById('radio-type-1');
            const radioPrivate = document.getElementById('radio-type-2');
            const radioText = document.getElementById('radio-text');

            function updateText() {
                if (radioPublic.checked) {
                    radioText.innerText = "All your team can see this project";
                } else if (radioPrivate.checked) {
                    radioText.innerText = "Only you and your selected team can access this project";
                }
            }

            updateText();

            radioPublic.addEventListener('change', updateText);
            radioPrivate.addEventListener('change', updateText);

        });
    </script>


@endsection