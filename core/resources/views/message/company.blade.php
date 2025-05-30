@extends('layouts.main')
@section('main')
@section('title', 'Company Message')

    <div class="flex justify-between gap-4">
        <div class="bg-white shadow-md rounded-md w-60">
            <div class="p-4">
                <button
                    class="w-full flex justify-center items-center gap-1 px-7 py-2 text-white text-sm bg-blue-600 rounded-md hover:bg-blue-500 transition-colors"><svg
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                        <path
                            d="M14.3632 5.65156L15.8431 4.17157C16.6242 3.39052 17.8905 3.39052 18.6716 4.17157L20.0858 5.58579C20.8668 6.36683 20.8668 7.63316 20.0858 8.41421L18.6058 9.8942M14.3632 5.65156L4.74749 15.2672C4.41542 15.5993 4.21079 16.0376 4.16947 16.5054L3.92738 19.2459C3.87261 19.8659 4.39148 20.3848 5.0115 20.33L7.75191 20.0879C8.21972 20.0466 8.65806 19.8419 8.99013 19.5099L18.6058 9.8942M14.3632 5.65156L18.6058 9.8942"
                            stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Create</button>
            </div>

            <div class="space-y-2 p-4">
                <a href="" class="flex justify-between items-center text-sm rounded bg-sky-50 p-2">
                    <div class="flex gap-1">
                        <svg width="20" height="20" class="stroke-sky-600" viewBox="0 0 24 24" stroke-width="1.5"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 8L12 11L17 8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M10 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4H20C21.1046 4 22 4.89543 22 6V12.8571"
                                stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                d="M22 17.1111H15.7C12.1 17.1111 12.1 22 15.7 22M22 17.1111L18.85 14M22 17.1111L18.85 20.2222"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="text-sky-600">Message</p>
                    </div>
                    <p class="text-sky-600 text-xs font-medium">12</p>
                </a>
                <a href="" class="flex justify-between items-center text-sm rounded p-2 hover:bg-sky-50 group">
                    <div class="flex gap-1">
                        <svg width="20" height="20" class="stroke-gray-600 group-hover:stroke-sky-600" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.275 9.843 8.868 3.021A3.527 3.527 0 0 0 4.049 7.9L6.6 12l-2.551 4.1a3.469 3.469 0 0 0 .48 4.32 3.594 3.594 0 0 0 2.526 1.08 3.5 3.5 0 0 0 1.813-.518l11.407-6.822a2.512 2.512 0 0 0 0-4.314Zm-.513 3.457L8.354 20.12a2.475 2.475 0 0 1-3.111-.4 2.455 2.455 0 0 1-.343-3.088L7.465 12.5H13a.5.5 0 0 0 0-1H7.465L4.9 7.368a2.455 2.455 0 0 1 .345-3.091 2.571 2.571 0 0 1 1.8-.778 2.517 2.517 0 0 1 1.308.381l11.409 6.82a1.51 1.51 0 0 1 0 2.6Z">
                            </path>
                        </svg>
                        <p class="text-gray-600 group-hover:text-sky-600">Sent</p>
                    </div>
                    <p class="text-gray-500 text-xs font-medium">4</p>
                </a>
                <a href="" class="flex justify-between items-center text-sm rounded p-2 group hover:bg-sky-50">
                    <div class="flex gap-1">
                        <svg width="20" height="20" class="stroke-gray-600 group-hover:stroke-sky-600" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg" stroke-width="1.5">
                            <path
                                d="M20 9L18.005 20.3463C17.8369 21.3026 17.0062 22 16.0353 22H7.96474C6.99379 22 6.1631 21.3026 5.99496 20.3463L4 9">
                            </path>
                            <path
                                d="M20 9L18.005 20.3463C17.8369 21.3026 17.0062 22 16.0353 22H7.96474C6.99379 22 6.1631 21.3026 5.99496 20.3463L4 9H20Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M21 6H15.375M3 6H8.625M8.625 6V4C8.625 2.89543 9.52043 2 10.625 2H13.375C14.4796 2 15.375 2.89543 15.375 4V6M8.625 6H15.375"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="text-gray-600 group-hover:text-sky-600">Trash</p>
                    </div>
                    <!-- <p class="text-gray-500 text-xs font-medium">4</p> -->
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md w-full rounded-md flex flex-col justify-between">
            <div class="">
                <div class="p-5">
                    <form class="w-full max-w-md" action="{{ url('/message') }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" name="search_message"
                                class="block outline-none w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-200 focus:border-blue-200 focus:ring-4 transition-colors max-h-10"
                                placeholder="Search Message..." value="{{ request('search_message') }}" />
                        </div>
                    </form>
                </div>

                <div class="w-full flex flex-col overflow-y-auto scrollable max-h-screen">
                    @forelse($message as $item)
                        <a href="" class="border-t border-b p-5 border-gray-300 hover:bg-gray-100">
                            <div class="flex gap-5 w-full items-center justify-between">
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox">
                                    <div class="flex gap-2">
                                        <h1 class="font-medium text-gray-700 text-sm  text-nowrap">{{ $item->title }}</h1>
                                        <p class="text-gray-600 text-sm text-nowrap">{{ Str::limit($item->message, 50) }}</p>
                                    </div>
                                    @if ($item->is_read)
                                    @else
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                    </span>
                                    @endif
                                </div>
                                <p class="text-gray-500 text-nowrap text-xs">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @empty
                        <div class="w-full h-full flex items-center pt-10 flex-col">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                color="#4b5563" stroke-width="1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4 4.25C2.48122 4.25 1.25 5.48122 1.25 7V17C1.25 18.5188 2.48122 19.75 4 19.75H20C21.5188 19.75 22.75 18.5188 22.75 17V7C22.75 5.48122 21.5188 4.25 20 4.25H4ZM7.4301 8.38558C7.09076 8.14804 6.62311 8.23057 6.38558 8.5699C6.14804 8.90924 6.23057 9.37689 6.5699 9.61442L11.5699 13.1144C11.8281 13.2952 12.1719 13.2952 12.4301 13.1144L17.4301 9.61442C17.7694 9.37689 17.852 8.90924 17.6144 8.5699C17.3769 8.23057 16.9092 8.14804 16.5699 8.38558L12 11.5845L7.4301 8.38558Z"
                                    fill="#4b5563"></path>
                            </svg>
                            <p class="text-sm text-gray-600 mt-2">Your Message Currently Empty</p>
                        </div>
                    @endforelse

                </div>
            </div>
            <div class="flex px-5 py-2 mt-2">
                <p class="text-xs text-gray-400">Showing 1 of 12</p>
            </div>
        </div>
    </div>
@endsection