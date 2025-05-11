<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TaskFlow</title>
    @vite('resources/css/app.css')

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- alphine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- EChart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.6.0/echarts.min.js"
        integrity="sha512-XSmbX3mhrD2ix5fXPTRQb2FwK22sRMVQTpBP2ac8hX7Dh/605hA2QDegVWiAvZPiXIxOV0CbkmUjGionDpbCmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- DevIcon -->
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    @yield('css')
</head>

<body class="font-family-thin overflow-y-auto">
    <div class="min-h-screen flex w-full relative bg-[#F5F5F5]">
        <!-- Sidebar -->
        <aside class="w-1/5 min-h-screen fixed z-40">
            @include('sidebar')
        </aside>

        <!-- Konten Utama -->
        <div class="flex flex-col w-full">
            <!-- Header -->
            <header class="fixed top-0 z-30 bg-white  h-20 flex items-center shadow 2k:ml-0 w-full">
                @include('header')
            </header>

            <!-- Main Content -->
            <main class="h-full ml-[20%] w-[calc(100%-20%)] pt-20">
                <div class="flex flex-col max-w-full h-full p-5">
                    <div class="w-full flex justify-between">
                        <div>
                            <h1 class="font-medium text-lg text-gray-600">@yield('title', 'Dashboard')</h1>
                        </div>

                        @php
                            use App\Helpers\BreadcrumbHelper;
                            $breadcrumbs = BreadcrumbHelper::generate();
                        @endphp

                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-4">
                                <li class="inline-flex items-center">
                                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700">
                                        TaskFlow
                                    </a>
                                </li>

                                @foreach ($breadcrumbs as $key => $breadcrumb)
                                    <li @if ($loop->last) aria-current="page" @endif>
                                        <div class="flex items-center">
                                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>

                                            @if ($loop->last)
                                                <span
                                                    class="ms-1 text-sm font-medium text-gray-400 md:ms-2">{{ $breadcrumb['name'] }}</span>
                                            @else
                                                <a href="{{ $breadcrumb['url'] }}"
                                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">
                                                    {{ $breadcrumb['name'] }}
                                                </a>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </nav>


                    </div>
                    <div class="pt-4">
                        @yield('main')
                        
                    </div>
                </div>
                @include('footer')
            </main>
        </div>
    </div>

    @stack('scripts')
    @yield('js')
</body>

</html>