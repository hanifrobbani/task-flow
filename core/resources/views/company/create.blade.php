@extends('layouts.blank')
@section('blank')
    <div class="w-full flex justify-center items-center py-10">
        <div class="w-2/3 bg-white rounded-md shadow-md p-5 max-w-7xl mx-auto">
            <h1 class="text-gray-600 font-medium text-xl">Create Company</h1>

            <form class="w-full space-y-4 py-4" method="POST" action="{{ url('/company') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex w-full gap-4 items-center">
                    <img src="{{ asset('assets/img/no-profile.svg') }}" alt="" class="w-24 h-24 rounded-full"
                        id="profile-img-container">
                    <input type="file" name="profile_img"
                        class="block w-full border border-gray-400 rounded-md text-sm text-gray-500 file:me-4 file:p-3  file:border-0 file:text-xs file:font-medium file:bg-gray-700 file:text-white hover:file:bg-gray-600 transition-colors file:disabled:opacity-50 file:disabled:pointer-events-none bg-gray-50"
                        onchange="previewProfileImg()" id="profile-img">
                </div>
                <div class="flex justify-between gap-4">
                    <div class="w-full">
                        <label for="countries" class="block mb-1 font-medium text-gray-600">Company Title</label>
                        <input type="text"
                            class="block w-full border border-gray-300 rounded-lg p-2.5 outline-none text-gray-600 font-medium placeholder:font-normal focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                            name="name" placeholder="Enter your company title">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block mb-1 font-medium text-gray-600">Field of Work</label>
                        <input type="text"
                            class="block w-full border border-gray-300 rounded-lg p-2.5 outline-none text-gray-600 font-medium placeholder:font-normal focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                            name="field_of_work" placeholder="What field does your company operate in?">
                        @error('field_of_work')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-full">
                    <label for="countries" class="block mb-1 font-medium text-gray-600">Address</label>
                    <input type="text"
                        class="block w-full border border-gray-300 rounded-lg p-2.5 outline-none text-gray-600 font-medium placeholder:font-normal focus:ring-4 focus:ring-blue-200 transition bg-gray-50"
                        name="address" placeholder="Enter company address">
                    @error('address')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="bio" class="block mb-1 font-medium text-gray-600">Company Description</label>
                    <textarea name="description" placeholder="Tell us about your company" class="w-full h-24 max-h-40 border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 focus:ring-4 focus:ring-blue-200 transition bg-gray-50"></textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="bio" class="block mb-1 font-medium text-gray-600">Background</label>
                    <div class="flex items-center justify-center bg-gray-50">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-60 border-2 {{ $errors->has('thumbnail') ? 'border-red-500' : 'border-gray-300' }} border-dashed rounded-lg cursor-pointer hover:bg-gray-100 relative">

                            <img id="image-preview" src=""
                                class="absolute w-full h-full object-contain rounded-lg hidden" />

                            <div id="upload-placeholder" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500">JPG, JPEG or PNG</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" name="background_img" />
                            <input type="hidden" name="current_background_img" />
                        </label>
                    </div>
                </div>

                <div class="flex items-center mb-4">
                    <input id="link-checkbox" type="checkbox" value="" required
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 focus:ring-2">
                    <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900">I agree
                        with the <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">terms and conditions</a>.</label>
                </div>
                
                <button type="submit" class="bg-blue-600 mt-4 p-2.5 text-white rounded-md w-full">Continue & Create Company!</button>


            </form>
        </div>
    </div>

    <script>
        function previewProfileImg() {
            const img = document.getElementById('profile-img')
            const imgContainer = document.getElementById('profile-img-container')

            const oFReader = new FileReader()
            oFReader.readAsDataURL(img.files[0])

            oFReader.onload = function (e) {
                imgContainer.src = e.target.result
            }
        }

        const fileInput = document.getElementById("dropzone-file");
        const previewImage = document.getElementById("image-preview");
        const uploadPlaceholder = document.getElementById("upload-placeholder");

        function showPreview(src) {
            previewImage.src = src;
            previewImage.classList.remove("hidden");
            uploadPlaceholder.classList.add("hidden");
        }

        function handleFileInputChange(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    showPreview(e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }

        fileInput.addEventListener("change", handleFileInputChange);

        if (previewImage.src) {
            showPreview(previewImage.src);
        }

        function addRemoveButton() {
            const existingButton = document.querySelector(".remove-image-btn");
            if (existingButton) {
                existingButton.remove();
            }

            const removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.className = "remove-image-btn absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 hover:bg-red-600";
            removeButton.innerHTML = `
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>`;

            removeButton.onclick = function (e) {
                e.preventDefault();
                e.stopPropagation();
                previewImage.src = "";
                previewImage.classList.add("hidden");
                uploadPlaceholder.classList.remove("hidden");
                fileInput.value = "";
                this.remove();
            };

            const container = fileInput.parentElement;
            container.appendChild(removeButton);
        }

        fileInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove("hidden");
                    uploadPlaceholder.classList.add("hidden");
                    addRemoveButton();
                };
                reader.readAsDataURL(file);
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            if (previewImage.src && previewImage.src !== window.location.href) {
                previewImage.classList.remove("hidden");
                uploadPlaceholder.classList.add("hidden");
                addRemoveButton();
            } else {
                previewImage.classList.add("hidden");
                uploadPlaceholder.classList.remove("hidden");
                const existingButton = document.querySelector(".remove-image-btn");
                if (existingButton) {
                    existingButton.remove();
                }
            }
        });
    </script>
@endsection