@extends('dashboard')
@section('title', 'Profile')

@section('main')
    <style>
        i {
            font-size: 1.5rem;
        }
    </style>
    <div class="w-full bg-white p-6">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="{{ auth()->user()->img_user ? asset('storage/' . auth()->user()->img_user) : asset('assets/img/no-profile.svg') }}"
                    alt="" class="w-20 h-20 rounded-full">
                <div>
                    <h1 class="font-semibold">{{ $data->name }}</h1>
                    <div class="flex mt-1 items-center">
                        <div class="border-r border-gray-300 pr-2">
                            <p class="text-sm text-gray-600">{{ $data->userPosition->name }}</p>
                        </div>
                        <div class="border-l border-gray-300 pl-2">
                            <p class="text-sm text-gray-600">{{ $data->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                @foreach ($data->UserSocials as $socialUser)
                    <!-- <p>{{ $socialUser->social->name }}</p> -->
                    <a href="{{ $socialUser->link }}"
                        class="border border-gray-400 rounded-full p-2 text-center text-sm hover:bg-gray-100 transition">
                        <svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endforeach
                <button type="button" onclick="modal_edit_main_user.showModal()"
                    class="border border-gray-400 rounded-full py-2 px-4 text-sm flex gap-1 items-center hover:bg-gray-100 transition">
                    <svg class="w-4 h-4 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                    </svg>

                    Edit</button>
            </div>
        </div>
    </div>

    <!-- modal edit main user info -->
    <dialog id="modal_edit_main_user" class="modal">
        <form action="" method="POST" class="relative max-w-xl bg-white rounded-lg shadow-md px-5 py-4 w-full">
            @csrf
            <div class="flex justify-between items-center border-b border-gray-200">
                <h1 class="text-gray-800 font-medium">Edit Your Personal Information</h1>
                <button type="button" onclick="modal_edit_main_user.close()"
                    class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                    <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path
                            d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            <div class="flex flex-col items-center gap-2 mt-2">
                <div class="flex w-full gap-2 items-center">
                    <img src="{{ auth()->user()->img_user ? asset('storage/' . auth()->user()->img_user) : asset('assets/img/no-profile.svg') }}"
                        alt="" class="w-20 h-20 rounded-full">
                    <input type="file" class="block w-full border border-gray-400 rounded-md text-sm text-gray-500
                                        file:me-4 file:p-3
                                        file:rounded-md file:border-0
                                        file:text-xs file:font-medium
                                        file:bg-gray-600 file:text-white
                                        hover:file:bg-gray-700
                                        transition-colors
                                        file:disabled:opacity-50 file:disabled:pointer-events-none">
                </div>
                <div class="w-full flex gap-2">
                    <div class="block w-full">
                        <label for="" class="text-sm">Name</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->name }}">
                    </div>
                    <div class="block w-full">
                        <label for="" class="text-sm">Phone Number</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->phone_number }}">
                    </div>
                </div>
                <div class="w-full flex gap-2">
                    <div class="block w-full">
                        <label for="" class="text-sm">Position</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition">
                            @foreach ($userPosition as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $data->userPosition->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="block w-full">
                        <label for="" class="text-sm">Address</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->address }}">
                    </div>
                </div>

                <div class="border-t border-gray-200 w-full mt-2">
                    <h1 class="text-gray-800 font-medium">Social</h1>
                    <div class="space-y-2 mt-2">
                        <!-- exp -->
                        @foreach ($userSocial as $item)
                            @php
                                $userValue = $data->UserSocials->firstWhere('social_id', $item->id);
                            @endphp

                            <div class="flex gap-2 items-center mb-2">
                                {!! $item->logo !!}
                                <input type="text" name="socials[{{ $item->id }}]" value="{{ $userValue?->value ?? '' }}"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition">
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
            <button type="submit"
                class="text-sm mt-4 font-medium bg-blue-600 text-white px-5 py-1.5 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>

    <div class="w-full bg-white p-6 mt-5">
        <div class="flex justify-between">
            <h1 class="font-semibold">Personal Information</h1>
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
        <div class="grid grid-cols-2 gap-x-10 gap-y-4 mt-2">
            <div>
                <label class="text-gray-800 text-sm block font-medium">Name</label>
                <p class="text-gray-600 text-sm ">{{ $data->name }}</p>
            </div>
            <div>
                <label class="text-gray-800 text-sm block font-medium">Status</label>
                <p class="text-gray-600 text-sm ">None</p>
            </div>
            <div>
                <label class="text-gray-800 text-sm block font-medium">Email address</label>
                <p class="text-gray-600 text-sm ">{{ $data->email }}</p>
            </div>
            <div>
                <label class="text-gray-800 text-sm block font-medium">Phone</label>
                <p class="text-gray-600 text-sm ">{{ $data->phone_number }}</p>
            </div>
            <div class="col-span-2">
                <label class="text-gray-800 text-sm block font-medium">Bio</label>
                <p class="text-gray-600 text-sm ">{{ $data->bio }}</p>
            </div>
        </div>

    </div>

    <div class="w-full bg-white p-6 mt-5">
        <div class="flex justify-between">
            <h1 class="font-semibold">Skills</h1>
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
        <div class="flex flex-wrap gap-4 items-center mt-2">
            @foreach ($data->UserSkills as $skillUser)
                <div class="p-2 bg-gray-100 rounded-xl cursor-pointer flex gap-1 items-center">
                    <!-- <i class="devicon-html5-plain-wordmark colored" style="font-size: 1.5rem;"></i> -->
                    {!! $skillUser->skills->logo !!}
                    <p class="text-gray-600 text-sm">{{ $skillUser->skills->name }}</p>
                </div>
            @endforeach

        </div>
    </div>
@endsection