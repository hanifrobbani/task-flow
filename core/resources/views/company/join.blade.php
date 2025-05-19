@extends('layouts.blank')

@section('blank')
    <div class="bg-white w-full shadow-md fixed z-20">
        <nav class="flex justify-between w-full items-center px-4 py-2 bg-white shadow-md max-w-[100rem] mx-auto">
            <div class="flex justify-center items-center">
                <img src="{{asset('assets/img/logo.png')}}" alt="" class="w-14 h-14">
                <div class="flex flex-col items-center justify-start">
                    <h1 class="text-2xl font-bold leading-5"><span class="text-blue-600">Task</span>Flow</h1>
                    <p class=" text-gray-400" style="font-size: 10px;">Management Apps</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex gap-5 font-medium list-none text-sm text-gray-600">
                    <li class="p-3 hover:bg-gray-100 rounded-full cursor-pointer transition-colors">Pricing</li>
                    <li class="p-3 hover:bg-gray-100 rounded-full cursor-pointer transition-colors">Help</li>
                    <li class="p-3 hover:bg-gray-100 rounded-full cursor-pointer transition-colors">More Info</li>
                </div>
                <div class="flex gap-4 relative items-center">
                    <button type="button" onclick="modal_logout.showModal()"
                        class="rounded-full px-4 py-2 text-gray-600 border border-gray-200 shadow font-medium text-sm hover:bg-red-600 hover:text-white transition-colors">Logout</button>
                    <a href="/company/create"
                        class="rounded-full px-4 py-2 text-white bg-blue-600 font-medium text-sm hover:bg-blue-500 transition-colors">Create
                        Company</a>
                </div>
            </div>
        </nav>
    </div>

    <main class="max-w-[100rem] mx-auto pt-10">
        <div class=" w-full min-h-72 flex items-center justify-center">
            <form class="w-full max-w-md shadow-md" action="{{ url('/company') }}">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search_company"
                        class="block outline-none w-full p-4 ps-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-200 focus:border-blue-200 focus:ring-4 transition-colors"
                        placeholder="Search Company..." value="{{ request('search_company') }}" />
                </div>
            </form>
        </div>
        @if ($company->count())
            <div class="grid grid-cols-3 gap-4 px-10">
                @foreach ($company as $item)
                    <div
                        class="bg-white shadow p-5 border border-gray-200 hover:border-gray-600 cursor-pointer group transition-colors">
                        <div class="flex gap-4">
                            <img src="{{ $item->profile_img ? asset('storage/' . $item->profile_img) : asset('assets/img/no-profile.svg') }}"
                                alt="Company Profile" class="w-12 h-12">
                            <div class="">
                                <h1 class="transition-colors font-medium text-lg group-hover:text-blue-600">{{ $item->name }}</h1>
                                <p class="text-gray-600 text-sm">{{ $item->address }}</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex gap-1 items-center">
                                <svg width="24" height="24" class="stroke-gray-500" stroke-width="2" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" color="">
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
                                <p class="text-sm text-gray-800">{{ $item->field_of_work }}</p>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-1 items-center">
                                    <svg width="26" height="26" class="stroke-gray-500" viewBox="0 0 24 24" stroke-width="1.5"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 18V17C7 14.2386 9.23858 12 12 12V12C14.7614 12 17 14.2386 17 17V18"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1 18V17C1 15.3431 2.34315 14 4 14V14" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M23 18V17C23 15.3431 21.6569 14 20 14V14" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M4 14C5.10457 14 6 13.1046 6 12C6 10.8954 5.10457 10 4 10C2.89543 10 2 10.8954 2 12C2 13.1046 2.89543 14 4 14Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M20 14C21.1046 14 22 13.1046 22 12C22 10.8954 21.1046 10 20 10C18.8954 10 18 10.8954 18 12C18 13.1046 18.8954 14 20 14Z"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <p class="text-sm text-blue-600 ">{{ $item->employee->count() }}+ member</p>
                                </div>
                                <button
                                    class="px-3 py-2 rounded-md text-white bg-blue-600 text-sm font-medium hover:opacity-80">Join
                                    Company</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="w-full text-center">
                <div class="space-y-3">
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('assets/img/no-company.svg') }}" alt="" class="w-36 h-36">
                    </div>
                    <div>
                        <h1 class="text-lg text-gray-800 font-medium">No Company Found!</h1>
                        <p class="text-gray-600 text-sm">Check for typos or try another keyword.</p>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <!-- modal logout -->
    <dialog id="modal_logout" class="modal">
        <form action="/logout" method="POST" class="relative max-w-md bg-white rounded-lg shadow-md p-6 z-50 w-full">
            @csrf
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
                <div class="my-2">
                    <h1 class="text-lg font-semibold text-gray-800 mb-2">Logout</h1>
                </div>
            </div>
            <p class="text-sm text-gray-600">Are you sure want to logout?</p>
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="modal_logout.close()"
                    class="text-sm font-medium border border-gray-300 px-3 py-1 rounded-md hover:bg-gray-50 transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="text-sm font-medium bg-red-600 text-white px-3 py-1 rounded-md hover:opacity-80 transition">
                    Logout
                </button>
            </div>
        </form>

    </dialog>
@endsection