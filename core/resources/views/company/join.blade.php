<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TaskFlow - Join Company</title>
    @vite('resources/css/app.css')

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- alphine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-family-thin bg-[#F5F5F5] min-h-screen">
    <nav class="flex justify-between w-full items-center px-4 py-2 bg-white shadow-md">
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
                <button
                    class="rounded-full px-4 py-2 text-gray-600 border border-gray-200 shadow font-medium text-sm hover:bg-gray-100 transition-colors">Join
                    Company</button>
                <button
                    class="rounded-full px-4 py-2 text-white bg-blue-600 font-medium text-sm hover:bg-blue-500 transition-colors">Create
                    Company</button>
            </div>
        </div>
    </nav>

    <main>
        <div class=" w-full min-h-72 flex items-center justify-center">
            <form class="w-full max-w-md">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block outline-none w-full p-4 ps-10 text-sm text-gray-900 border border-gray-200 rounded-lg focus:ring-blue-200 focus:border-blue-200 focus:ring-4 transition-colors" placeholder="Search Company..." required />
                </div>
            </form>
        </div>
        <div class="">
            <div class="flex w-full justify-center items-center gap-4">
                <button class="rounded-full px-4 py-2 border border-gray-200 bg-white font-medium text-sm transition-colors">IT</button>
                <button class="rounded-full px-4 py-2 border border-gray-200 bg-white font-medium text-sm transition-colors">Buseniss</button>
                <button class="rounded-full px-4 py-2 border border-gray-200 bg-white font-medium text-sm transition-colors">Marketing</button>
            </div>
        </div>
    </main>
</body>

</html>