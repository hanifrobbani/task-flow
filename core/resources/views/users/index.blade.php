@extends('dashboard')
@section('title', 'Profile')

@section('main')
<div class="w-full bg-white p-6">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="https://demo.tailadmin.com/src/images/user/user-01.jpg" alt="" class="w-20 h-20 rounded-full">
            <div>
                <h1 class="font-semibold">Hanif Ridwan</h1>
                <div class="flex mt-1 items-center">
                    <div class="border-r border-gray-300 pr-2">
                        <p class="text-sm text-gray-600">Tech Manager</p>
                    </div>
                    <div class="border-l border-gray-300 pl-2">
                        <p class="text-sm text-gray-600">Indonesia, Bandung</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="border border-gray-400 rounded-full p-2 text-center text-sm hover:bg-gray-100 transition"><svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd" />
                </svg>
            </button>
            <button class="border border-gray-400 rounded-full p-2 text-center text-sm hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd" />
                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                </svg>

            </button>
            <button class="border border-gray-400 rounded-full p-2 text-center text-sm hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd" />
                </svg>

            </button>
            <button class="border border-gray-400 rounded-full py-2 px-4 text-sm flex gap-1 items-center hover:bg-gray-100 transition">
                <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                </svg>

                Edit</button>
        </div>
    </div>
</div>

<div class="w-full bg-white p-6 mt-5">
    <div class="flex justify-between">
        <h1 class="font-semibold">Personal Information</h1>
        <button class="border border-gray-400 rounded-full py-2 px-4 text-sm flex gap-1 items-center hover:bg-gray-100 transition">
            <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
            </svg>
            Edit
        </button>
    </div>
    <div class="grid grid-cols-2 gap-x-10 gap-y-4">
        <div>
            <label class="text-gray-600 text-sm block">Name</label>
            <p class="text-gray-800 text-sm font-semibold">Hanif Ridwan</p>
        </div>
        <div>
            <label class="text-gray-600 text-sm block">Status</label>
            <p class="text-gray-800 text-sm font-semibold">None</p>
        </div>
        <div>
            <label class="text-gray-600 text-sm block">Email address</label>
            <p class="text-gray-800 text-sm font-semibold">ridwanhanif12@mail.com</p>
        </div>
        <div>
            <label class="text-gray-600 text-sm block">Phone</label>
            <p class="text-gray-800 text-sm font-semibold">+62-876-987-5687</p>
        </div>
        <div class="col-span-2">
            <label class="text-gray-600 text-sm block">Bio</label>
            <p class="text-gray-800 text-sm font-semibold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, nisi! Minima ad expedita ullam fuga dolorum mollitia soluta id unde?</p>
        </div>
    </div>

</div>
@endsection