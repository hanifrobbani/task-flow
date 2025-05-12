@extends('dashboard')
@section('title', 'Profile')

@section('main')
    <style>
        i {
            font-size: 1.5rem;
        }
    </style>
    <div class="w-full bg-white p-6">

        @if (session()->has('errorUser'))
            <x-toast-notification :show="true" variant="error" title="Error!" message="{{ session('errorUser') }}"
                :duration="7000" />
        @endif
        @if (session()->has('successUser'))
            <x-toast-notification :show="true" variant="success" title="Success!" message="{{ session('successUser') }}" :duration="7000" />
        @endif

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
                            <p class="text-sm text-gray-600">{{ $data->address ?? 'No Address' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4">
                @foreach ($data->UserSocials as $socialUser)
                    <a href="{{ $socialUser->link }}" target="_blank"
                        class="border border-gray-400 rounded-full p-2 text-center text-sm hover:bg-gray-100 transition">
                        {!! $socialUser->social->logo !!}
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
        <form action="{{ url('/user/profile/edit') }}" method="POST"
            class="relative max-w-2xl bg-white rounded-lg shadow-md px-5 py-4 w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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

            <div class="flex flex-col items-center gap-2 mt-2 max-h-96 overflow-y-auto scrollable px-2">
                <div class="flex w-full gap-2 items-center">
                    <img src="{{ auth()->user()->img_user ? asset('storage/' . auth()->user()->img_user) : asset('assets/img/no-profile.svg') }}"
                        alt="" class="w-20 h-20 rounded-full" id="img-container">
                    <input type="file" name="img_user" class="block w-full border border-gray-400 rounded-md text-sm text-gray-500
                                                                file:me-4 file:p-3
                                                                file:rounded-md file:border-0
                                                                file:text-xs file:font-medium
                                                                file:bg-gray-600 file:text-white
                                                                hover:file:bg-gray-700
                                                                transition-colors
                                                                file:disabled:opacity-50 file:disabled:pointer-events-none"
                        onchange="previewImg()" id="img-user">
                </div>
                <div class="w-full flex gap-2">
                    <div class="block w-full">
                        <label for="name" class="text-sm">Name</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->name }}" name="name">
                    </div>
                    <div class="block w-full">
                        <label for="email" class="text-sm">Email</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600  focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->email }}" readonly>
                    </div>
                </div>
                <div class="w-full flex gap-2">
                    <div class="block w-full">
                        <label for="user_positions_id" class="text-sm">Position</label>
                        <select id="user_positions_id"
                            class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition"
                            name="user_positions_id">
                            @foreach ($userPosition as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $data->userPosition->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="block w-full">
                        <label for="phone_number" class="text-sm">Phone Number</label>
                        <input type="text"
                            class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600  focus:ring-4 focus:ring-blue-200 transition"
                            value="{{ $data->phone_number }}" name="phone_number">
                    </div>
                </div>
                <div class="block w-full">
                    <label for="address" class="text-sm">Address</label>
                    <input type="text"
                        class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600  focus:ring-4 focus:ring-blue-200 transition"
                        value="{{ $data->address }}" name="address">
                </div>
                <div class="block w-full">
                    <label for="bio" class="text-sm">Bio</label>
                    <textarea name="bio" id="bio"
                        class="w-full h-20 max-h-40 border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 focus:ring-4 focus:ring-blue-200 transition">{{ $data->bio }}</textarea>
                </div>

                <div class="w-full mt-2">
                    <h1 class="text-gray-800 font-medium">Social</h1>
                    <div class="space-y-2 mt-2">
                        <!-- exp -->
                        @foreach ($userSocial as $item)
                            @php
                                $userValue = $data->UserSocials->firstWhere('socials_id', $item->id);
                            @endphp

                            <div class="flex gap-2 items-center mb-2">
                                {!! $item->logo !!}
                                <input type="hidden" name="socials[{{ $item->id }}][socials_id]" value="{{ $item->id }}">
                                <input type="text" name="socials[{{ $item->id }}][link]" value="{{ $userValue?->link ?? '' }}"
                                    class="w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <button type="submit"
                class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                Save
            </button>
        </form>
    </dialog>

    <div class="w-full bg-white p-6 mt-5">
        <div class="flex justify-between">
            <h1 class="font-semibold">Personal Information</h1>
            <button type="button" onclick="modal_edit_main_user.showModal()"
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
                <label class="text-gray-800 text-sm block font-medium">Company</label>
                <p class="text-gray-600 text-sm ">None</p>
            </div>
            <div>
                <label class="text-gray-800 text-sm block font-medium">Email address</label>
                <p class="text-gray-600 text-sm ">{{ $data->email }}</p>
            </div>
            <div>
                <label class="text-gray-800 text-sm block font-medium">Phone</label>
                <p class="text-gray-600 text-sm ">{{ $data->phone_number ?? '-' }}</p>
            </div>
            <div class="col-span-2">
                <label class="text-gray-800 text-sm block font-medium">Bio</label>
                <p class="text-gray-600 text-sm ">{{ $data->bio ?? '-' }}</p>
            </div>
        </div>
    </div>

    <div class="w-full bg-white p-6 mt-5">
        <div class="flex justify-between">
            <h1 class="font-semibold">Skills</h1>
            <button type="button" onclick="modal_edit_skill_user.showModal()"
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
            @if (count($data->UserSkills))
            @foreach ($data->UserSkills as $skillUser)
                <div class="p-2 bg-gray-100 rounded-xl cursor-pointer flex gap-1 items-center">
                    {!! $skillUser->skills->logo !!}
                    <p class="text-gray-600 text-sm">{{ $skillUser->skills->name }}</p>
                </div>
            @endforeach
            @else
            <p class="text-gray-600 text-sm">No Skills Added Yet!</p>
            @endif
        </div>

        <!-- Modal form skill -->
        <dialog id="modal_edit_skill_user" class="modal">
            <form action="{{ url('/user/skills/edit') }}" method="POST"
                class="relative max-w-2xl bg-white rounded-lg shadow-md px-5 py-4 w-full">
                @csrf
                @method('PUT')
                <div class="flex justify-between items-center border-b border-gray-200">
                    <h1 class="text-gray-800 font-medium">Edit Your Skills</h1>
                    <button type="button" onclick="modal_edit_skill_user.close()"
                        class="hover:bg-gray-100 transition-colors rounded-lg p-2">
                        <svg width="24" height="24" stroke-width="2" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" color="#000000">
                            <path
                                d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-4 mt-4">
                    @foreach ($skills as $item)
                        @php
                            $isChecked = $data->UserSkills->contains('skills_id', $item->id);
                        @endphp
                        <div class="flex items-center gap-1 mb-4">
                            <input id="skill_{{ $item->id }}" type="checkbox" name="skillsId[{{ $item->id }}]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500" {{ $isChecked ? 'checked' : '' }}>
                            <div class="flex items-center gap-1 py-1 px-2 bg-gray-100 rounded-lg">
                                {!! $item->logo !!}
                                <label for="skill_{{ $item->id }}" class="text-gray-700 text-sm">{{ $item->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit"
                    class="text-sm mt-5 font-medium bg-blue-600 text-white px-5 py-2 rounded-md hover:opacity-80 transition">
                    Save
                </button>
            </form>
        </dialog>
    </div>

    <script>
        function previewImg() {
            const img = document.getElementById('img-user')
            const imgContainer = document.getElementById('img-container')

            const oFReader = new FileReader()
            oFReader.readAsDataURL(img.files[0])

            oFReader.onload = function (e) {
                imgContainer.src = e.target.result
            }
        }
    </script>

@endsection