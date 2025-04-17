@extends('dashboard')
@section('main')
    <div class="w-full bg-white shadow rounded-md flex justify-start gap-5 p-5">
        <div class="border-r-2 border-gray-300 w-full">
            <div class="flex gap-4 w-72 items-center">
                <div class="bg-sky-600 p-3 rounded-full">
                    <svg class=" fill-white" width="40" height="40" viewBox="0 0 24 24" fill=""
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke="" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                            d="M21.536 5.525a.751.751 0 0 1-1.061.011l-2-1.96a.75.75 0 0 1 1.05-1.076l2 1.96a.752.752 0 0 1 .011 1.065ZM5.53 3.53a.75.75 0 0 0-1.06-1.06l-2 2a.75.75 0 1 0 1.06 1.06Zm11.606 15.539 1.395 1.4a.75.75 0 1 1-1.062 1.058l-1.657-1.665a8.644 8.644 0 0 1-7.624 0l-1.657 1.667a.75.75 0 1 1-1.062-1.058l1.395-1.4a8.75 8.75 0 1 1 10.272 0ZM12 19.25A7.25 7.25 0 1 0 4.75 12 7.258 7.258 0 0 0 12 19.25Zm0-11.96a.75.75 0 0 0-.75.75v4a.75.75 0 0 0 1.5 0v-4a.75.75 0 0 0-.75-.75Z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-base text-gray-600 font-medium">Progress Harian</h1>
                    <p class="text-xl text-gray-600">120.21</p>
                </div>
            </div>
        </div>
        <div class="border-r-2 border-gray-300 w-full">
            <div class="flex gap-4 w-72 items-center">
                <div class="bg-green-600 p-3 rounded-full">
                    <svg class="stroke-white" width="40" height="40" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="">
                        <path d="M21.1679 8C19.6247 4.46819 16.1006 2 11.9999 2C6.81459 2 2.55104 5.94668 2.04932 11"
                            stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17 8H21.4C21.7314 8 22 7.73137 22 7.4V3" stroke="" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M2.88146 16C4.42458 19.5318 7.94874 22 12.0494 22C17.2347 22 21.4983 18.0533 22 13"
                            stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M7.04932 16H2.64932C2.31795 16 2.04932 16.2686 2.04932 16.6V21" stroke=""
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-base text-gray-600 font-medium">Progress Bulanan</h1>
                    <p class="text-xl text-gray-600">120.21</p>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class="flex gap-4 w-72 items-center">
                <div class="bg-gray-200 p-3 rounded-full">
                    <svg class="fill-gray-600" width="40" height="40" viewBox="0 0 24 24" fill=""
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 4.25h-1.275a2.246 2.246 0 0 0-2.225-2h-9a2.246 2.246 0 0 0-2.225 2H4A1.752 1.752 0 0 0 2.25 6v1.65a4.024 4.024 0 0 0 3.568 4.05 6.765 6.765 0 0 0 5.432 4v1.6c-1.938.258-3 1.543-3 3.7v.75h7.5V21c0-2.153-1.062-3.438-3-3.7v-1.6a6.765 6.765 0 0 0 5.432-4 4.024 4.024 0 0 0 3.568-4.05V6A1.752 1.752 0 0 0 20 4.25ZM3.75 7.65V6A.25.25 0 0 1 4 5.75h1.25V9a6.844 6.844 0 0 0 .085 1.019A2.448 2.448 0 0 1 3.75 7.65Zm10.437 12.6H9.813c.2-1.043.887-1.5 2.187-1.5s1.985.457 2.187 1.5Zm-2.187-6A5.256 5.256 0 0 1 6.75 9V4.5a.751.751 0 0 1 .75-.75h9a.751.751 0 0 1 .75.75V9A5.256 5.256 0 0 1 12 14.25Zm8.247-6.6a2.448 2.448 0 0 1-1.585 2.369A6.844 6.844 0 0 0 18.75 9V5.75H20a.25.25 0 0 1 .25.25Z">
                        </path>
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="text-base text-gray-600 font-medium">Nilai Bulan lalu</h1>
                    <p class="text-xl text-gray-600">87.21</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 w-full">
        <h1 class="font-medium text-lg text-gray-700 mb-2">Task Progress</h1>
        <div class="flex justify-between gap-5">
            <div class="flex flex-col p-5 bg-white shadow-md rounded-md w-full">
                <div class="flex justify-between text-xl mb-1 font-semibold">
                    <h1 class="text-gray-800">0/8h</h1>
                    <h1 class="text-red-500">0%</h1>
                </div>
                <div class="text-sm text-gray-600">
                    <p>Progress Harian</p>
                    <p>27/8/2025</p>
                </div>
                <div class="mt-4">
                    <div class="w-full h-4 bg-gray-300 rounded-md"></div>
                </div>
            </div>
            <div class="flex flex-col p-5 bg-white shadow-md rounded-md w-full">
                <div class="flex justify-between text-xl mb-1 font-semibold">
                    <h1 class="text-gray-800">0/40h</h1>
                    <h1 class="text-red-500">0%</h1>
                </div>
                <div class="text-sm text-gray-600">
                    <p>Target Mingguan</p>
                    <p>27/8/2025</p>
                </div>
                <div class="mt-4">
                    <div class="w-full h-4 bg-gray-300 rounded-md"></div>
                </div>
            </div>
            <div class="flex flex-col p-5 bg-white shadow-md rounded-md w-full">
                <div class="flex justify-between text-xl mb-1 font-semibold">
                    <h1 class="text-gray-800">0/8h</h1>
                    <h1 class="text-red-500">0%</h1>
                </div>
                <div class="text-sm text-gray-600">
                    <p>Progress Mingguan</p>
                    <p>27/8/2025</p>
                </div>
                <div class="mt-4">
                    <div class="w-full h-4 bg-gray-300 rounded-md"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="w-full mt-10 bg-white p-4 rounded-md shadow">
        <div class="flex gap-4">
            <h1 class="text-gray-600 font-medium">On Time Completed Task</h1>
            <p class="bg-green-200 text-green-600 flex gap-1 items-center text-sm py-1 px-2 rounded-md font-medium">
                <svg class="stroke-green-600" width="16" height="16" viewBox="0 0 24 24" stroke-width="2.5" fill="none"
                    xmlns="http://www.w3.org/2000/svg" color="">
                    <path d="M12 21L12 3M12 3L20.5 11.5M12 3L3.5 11.5" stroke="" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
                64%
            </p>
        </div>
        <div class="mt-2">
            <div class="flex justify-between">
                <h1 class="font-semibold text-gray-600">Completed Task</h1>
                <h1 class="font-semibold text-gray-600">72%</h1>
            </div>
            <div class="w-full h-2 bg-blue-500 rounded-md mt-2"></div>
        </div>
    </div>

    <div class="mt-10 flex gap-4">
        <div class="min-w-72 bg-white shadow-md rounded px-2 py-4">
            @php
                $dummyData = [
                    ['value' => 1048, 'name' => 'Done'],
                    ['value' => 735, 'name' => 'Pending'],
                    ['value' => 411, 'name' => 'Backlog'],
                ];
            @endphp
            <h1 class="text-gray-600 font-medium text-lg px-4">Task Overview</h1>
            <x-pie-chart chart-id="pie1" :data-pie-chart="$dummyData" pie-chart-name="Task Overview" />

        </div>
        <div class="w-full bg-white shadow-md rounded px-2 py-4">
            <div class="flex justify-between items-center px-4">
                <h1 class="text-gray-600 font-medium text-lg">Working Hour</h1>
                <div class="flex gap-2">
                    <button
                        class="text-sm bg-blue-200 text-sky-700 px-4 py-2 rounded-md font-medium hover:bg-sky-600 transition-colors hover:text-white">All</button>
                    <button
                        class="text-sm bg-blue-200 text-sky-700 px-4 py-2 rounded-md font-medium hover:bg-sky-600 transition-colors hover:text-white">Day</button>
                    <button
                        class="text-sm bg-blue-200 text-sky-700 px-4 py-2 rounded-md font-medium hover:bg-sky-600 transition-colors hover:text-white">Month</button>
                </div>
            </div>
            <x-bar-chart chart-id="project-stats" bar-chart-name="Working Hour"
                :data-bar-chart="[5, 20, 36, 10, 10, 20, 30]" :categories="['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']" />
        </div>
    </div>

@endsection