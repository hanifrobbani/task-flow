<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="">
            {{ $slot ?? '' }}
            <x-modal-component />
        </div>

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

                        <!-- <x-toast-notification :show="true" title="Sukses!" message="Data berhasil disimpan."
                            :duration="4000" /> -->
                        <!-- <div x-data="{ showModal: false }">
                            <button @click="showModal = true" class="px-4 py-2 bg-blue-500 text-white rounded">
                                Buka Modal
                            </button>

                            <x-modal-form>
                                <form class="max-w-sm mx-auto">
                                    <div class="mb-5">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                            email</label>
                                        <input type="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="name@flowbite.com" required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                            password</label>
                                        <input type="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required />
                                    </div>
                                    <div class="flex items-start mb-5">
                                        <div class="flex items-center h-5">
                                            <input id="remember" type="checkbox" value=""
                                                class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                                required />
                                        </div>
                                        <label for="remember"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                                            me</label>
                                    </div>
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>

                            </x-modal-form>
                        </div> -->

                        <button class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg text-sm hover:opacity-80 transition" onclick="my_modal_1.showModal()">Open Form Modal</button>

                        <dialog id="my_modal_1" class="modal">
                            <div class="modal-box">
                                <h3 class="font-bold text-lg">Tambah Data User</h3>

                                <form action="/submit-user" method="POST">
                                    @csrf
                                    <div class="form-control">
                                        <label class="label">Nama</label>
                                        <input type="text" name="name" class="input input-bordered w-full" required>
                                    </div>
                                    <div class="form-control mt-4">
                                        <label class="label">Email</label>
                                        <input type="email" name="email" class="input input-bordered w-full" required>
                                    </div>
                                    <div class="modal-action mt-4">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="button" onclick="my_modal_1.close()" class="btn">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </dialog>

                    </div>
                </div>
                @include('footer')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.css" />
@yield('js')

</html>