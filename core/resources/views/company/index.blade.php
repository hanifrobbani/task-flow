@extends('dashboard')

@section('main')
@section('title', 'Company Management')
    <div class="rounded-lg shadow-md w-full">
        @if (session()->has('errorCompany'))
            <x-toast-notification :show="true" variant="error" title="Error!" message="{{ session('errorCompany') }}"
                :duration="7000" />
        @endif
        @if (session()->has('successCompany'))
            <x-toast-notification :show="true" variant="success" title="Success!" message="{{ session('successCompany') }}"
                :duration="7000" />
        @endif
        <div class="w-full min-h-28 bg-blue-100"></div>

        <div class="w-full relative max-h-1">
            <div class="absolute z-10 top-1/2 -translate-y-1/2 left-5">
                <img src="https://flowbite.com/application-ui/demo/images/users/avatar-4.png" alt="Company Logo"
                    class="w-24 h-24">
            </div>
        </div>
        <div class="bg-white min-h-28 p-4 flex justify-between">
            <div class="pt-10">
                <h1 class="font-semibold text-gray-800 text-xl">{{ $company->name }}</h1>
                <div class="flex items-center text-sm text-gray-800 mb-2">
                    <p class="pr-2 border-r border-gray-300">{{ $company->address }}</p>
                    <p class="pl-2 border-l border-gray-300">{{ $company->field_of_work }}</p>
                </div>
                <p class="text-sm text-gray-600">
                    {{ $company->description }}
                </p>
            </div>
            <div>
                <button
                    class="border border-gray-400 rounded-full py-2 px-4 text-sm flex gap-1 items-center hover:bg-gray-100 transition">
                    <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>
                    Edit
                </button>
            </div>
        </div>
    </div>

    <div class="flex mt-5 gap-5">
        <div class="p-5 bg-white rounded-lg shadow-md w-full">
            <h1 class="text-gray-800 font-medium">Team Member</h1>
            <div class="overflow-x-auto sm:rounded-lg">
                <div class="py-4 px-2 flex justify-between items-center">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class="p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-200 transition-colors outline-none focus:ring-4"
                            placeholder="Search for users">
                    </div>

                    <button type="button" onclick="modal_add_employee.showModal()"
                        class="p-2 bg-blue-600 text-white text-xs rounded-md flex gap-1 items-center hover:opacity-80"><svg
                            width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                            <path d="M17 10H20M23 10H20M20 10V7M20 10V13" stroke="#ffffff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M1 20V19C1 15.134 4.13401 12 8 12V12C11.866 12 15 15.134 15 19V20" stroke="#ffffff"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z"
                                stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg> Add Employee</button>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Position
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->employee as $employee)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://flowbite.com/application-ui/demo/images/users/joseph-mcfall.png"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $employee->name }}</div>
                                        <div class="font-normal text-gray-500">{{ $employee->email }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $employee->userPosition->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="p-5 bg-white rounded-lg shadow-md max-w-lg min-w-64">
            <h1 class="text-gray-800 font-medium">Message</h1>
            <div class="w-full h-full flex items-center pt-10 flex-col">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    color="#4b5563" stroke-width="1">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4 4.25C2.48122 4.25 1.25 5.48122 1.25 7V17C1.25 18.5188 2.48122 19.75 4 19.75H20C21.5188 19.75 22.75 18.5188 22.75 17V7C22.75 5.48122 21.5188 4.25 20 4.25H4ZM7.4301 8.38558C7.09076 8.14804 6.62311 8.23057 6.38558 8.5699C6.14804 8.90924 6.23057 9.37689 6.5699 9.61442L11.5699 13.1144C11.8281 13.2952 12.1719 13.2952 12.4301 13.1144L17.4301 9.61442C17.7694 9.37689 17.852 8.90924 17.6144 8.5699C17.3769 8.23057 16.9092 8.14804 16.5699 8.38558L12 11.5845L7.4301 8.38558Z"
                        fill="#4b5563"></path>
                </svg>
                <p class="text-sm text-gray-600 mt-2">Your Mail Currently Empty</p>
            </div>

        </div>
    </div>

    <div class="mt-5 flex gap-2">
        <div class="p-5 bg-white rounded-lg shadow-md w-full">
            <div class="flex justify-between items-center mb-4">
                <h1>Employee Position</h1>
                <button class="p-2 bg-blue-600 text-white text-xs rounded-md flex gap-1 items-center hover:opacity-80">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#ffffff">
                        <path d="M8 12H12M16 12H12M12 12V8M12 12V16" stroke="#ffffff" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg></button>
            </div>
            <div class="overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Position
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                Tech Lead
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                                    position</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-5 bg-white rounded-lg shadow-md w-full">
            <h1>Employee Activity</h1>
            <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Working Hour
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white">
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full"
                                src="https://flowbite.com/application-ui/demo/images/users/joseph-mcfall.png"
                                alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">Neil Sims</div>
                                <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <p class="font-medium text-blue-600 dark:text-blue-500 text-center">120h</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal create task -->
    <dialog id="modal_add_employee" class="modal">
        <form action="{{ url('/user/join-company/' . $company->id) }}" method="POST"
            class="relative max-w-xl bg-white rounded-lg shadow-md p-5 w-full">
            @csrf
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Add new Employee</h1>
                <button type="button" onclick="modal_add_employee.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="w-full mt-2">
                <label for="" class="text-sm text-gray-600">Email</label>
                <input type="email"
                    class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                    name="email">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="text-xs mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Send Invitation
            </button>
        </form>
    </dialog>
@endsection