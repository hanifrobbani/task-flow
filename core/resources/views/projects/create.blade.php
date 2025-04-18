@extends('dashboard')
@section('main')
@section('title', 'Create Project')
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <form class="flex justify-between gap-4" action="">
        <div class=" block w-full max-w-xs">
            <div class="bg-white p-5 rounded shadow-md w-full">
                <div class="flex items-center">
                    <svg width="28" height="28" viewBox="0 0 24 24" class="fill-gray-600"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.08 10.389a.75.75 0 0 1 .931-.509 1.156 1.156 0 0 0 .329.04 1.583 1.583 0 0 0 .4-3.114.75.75 0 0 1 .377-1.452 3.083 3.083 0 0 1-.778 6.066 2.645 2.645 0 0 1-.751-.1.75.75 0 0 1-.508-.931Zm2.82 1.542h-.03a.75.75 0 0 0-.027 1.5 2.383 2.383 0 0 1 2.407 2.58V18a.75.75 0 0 0 1.5 0v-1.99a3.822 3.822 0 0 0-3.85-4.079ZM6.67 11.42a2.655 2.655 0 0 0 .751-.1A.75.75 0 1 0 7 9.88a1.156 1.156 0 0 1-.329.04 1.588 1.588 0 0 1-.394-3.12.75.75 0 1 0-.377-1.456 3.087 3.087 0 0 0 .77 6.076Zm-.811 1.23a.74.74 0 0 0-.779-.719 3.823 3.823 0 0 0-3.83 4.079V18a.75.75 0 0 0 1.5 0v-1.99a2.351 2.351 0 0 1 2.391-2.58.749.749 0 0 0 .718-.78ZM8.258 7a3.75 3.75 0 1 1 3.75 3.75A3.754 3.754 0 0 1 8.258 7Zm1.5 0a2.25 2.25 0 1 0 2.25-2.25A2.253 2.253 0 0 0 9.758 7Zm4.019 5.139h-3.554a4.889 4.889 0 0 0-5.2 5.211V20a.75.75 0 0 0 1.5 0v-2.65a3.441 3.441 0 0 1 3.7-3.711h3.554a3.441 3.441 0 0 1 3.7 3.711V20a.75.75 0 0 0 1.5 0v-2.65a4.889 4.889 0 0 0-5.2-5.211Z">
                        </path>
                    </svg>
                    <h1 class="text-sm font-medium text-gray-600">Selected Member</h1>
                </div>
                <div class="border border-gray-300 w-full rounded-lg min-h-40 p-2 mt-2 flex items-start flex-wrap gap-2" id="selected-members"></div> <!-- display flex, wrap space bug -->
                
            </div>
            <div class="bg-white p-5 rounded shadow-md w-full mt-5">
                <div class="relative">
                    <label for="countries" class="block mb-1 text-sm font-medium">Team Member</label>
                    <button id="dropdownHelperButton" data-dropdown-toggle="dropdownHelper"
                        class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg inline-flex justify-between items-center w-full p-2.5 outline-none"
                        type="button">Select Team Member<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHelper"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md border absolute max-h-96 overflow-y-scroll no-scrollbar">
                        <ul class="p-3 flex items-center flex-wrap text-sm text-gray-700"
                            aria-labelledby="dropdownHelperButton">
                            <li class="w-full">
                                <div class="flex p-2 rounded-sm hover:bg-gray-100 w-full items-center container-member">
                                    <div class="flex items-center h-5">
                                        <input aria-describedby="helper-checkbox-text-1" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2 hover:cursor-pointer member-checkbox">
                                    </div>
                                    <div class="ms-2 text-sm flex gap-2 member-box" data-member-id="ridwan">
                                        <div class="">
                                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                                alt="" class="w-8 h-8 rounded-full object-cover object-center">

                                        </div>
                                        <div class="">
                                            <label for="helper-checkbox-3"
                                                class="font-medium text-gray-900 dark:text-gray-300">
                                                <p class="member-name">Ridwan Fauzan</p>
                                                <p id="helper-checkbox-text-3"
                                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Designer
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="w-full">
                                <div class="flex p-2 rounded-sm hover:bg-gray-100 w-full items-center container-member">
                                    <div class="flex items-center h-5">
                                        <input aria-describedby="helper-checkbox-text-1" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2 hover:cursor-pointer member-checkbox">
                                    </div>
                                    <div class="ms-2 text-sm flex gap-2 member-box" data-member-id="ridwan">
                                        <div class="">
                                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                                alt="" class="w-8 h-8 rounded-full object-cover object-center">

                                        </div>
                                        <div class="">
                                            <label for="helper-checkbox-3"
                                                class="font-medium text-gray-900 dark:text-gray-300">
                                                <p class="member-name">Ridwan Fauzan</p>
                                                <p id="helper-checkbox-text-3"
                                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Designer
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded shadow-md w-full">
            <div class="mb-2 flex justify-between gap-5">
                <div class="w-full">
                    <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Badge Project</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition">
                        <option selected disabled>Select Badge</option>
                        <option value="US">Web Development</option>
                        <option value="US">Design</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Prority</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition">
                        <option selected disabled>Select Priority</option>
                        <option value="US">Low</option>
                        <option value="US">Medium</option>
                        <option value="US">High</option>
                    </select>
                </div>
            </div>

            <div class="my-3">
                <label for="countries" class="block mb-1 text-sm font-medium">Project Title</label>
                <input type="text"
                    class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition">
            </div>
            <div class="my-3">
                <label for="countries" class="block mb-1 text-sm font-medium">Description Project</label>
                <textarea name="" id=""
                    class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none min-h-40 text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"></textarea>
            </div>

            <div class="my-3">
                <label for="countries" class="block mb-1 text-sm font-medium">Status</label>
                <div class="flex gap-4 items-center">
                    <div class="flex items-center">
                        <input checked id="radio-type-1" type="radio" name="default-radio"
                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="radio-type" class="ms-1 text-sm font-medium text-gray-800">Public</label>
                    </div>

                    <div class="flex items-center">
                        <input id="radio-type-2" type="radio" value="" name="default-radio" class="w-4 h-4">
                        <label for="default-radio-2" class="ms-1 text-sm font-medium text-gray-800">Private</label>
                    </div>
                </div>

                <div class="flex mt-1">
                    <p class="text-red-600 -mt-1">*</p>
                    <p class="text-sm font-medium text-blue-600" id="radio-text"></p>
                </div>
            </div>


            <div class="my-3 flex items-center gap-5">
                <div class="w-full">
                    <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Start Date</label>
                    <input type="date"
                        class="w-full p-2 border border-gray-400 rounded-lg text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none">
                </div>
                <div class="w-full">
                    <label for="countries" class="block mb-1 text-sm font-medium">Due Date</label>
                    <input type="date"
                        class="w-full p-2 border border-gray-400 rounded-lg  text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none">
                </div>
            </div>

            <div class="mt-5 flex flex-row-reverse gap-2">
                <button
                    class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg text-sm hover:opacity-80 transition">Save</button>
                <a href="/project"
                    class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg text-sm hover:opacity-80 transition">Cancel</a>
            </div>
        </div>
        </>
@endsection

    @section('js')
        <script>
            const radioPublic = document.getElementById('radio-type-1');
            const radioPrivate = document.getElementById('radio-type-2');
            const radioText = document.getElementById('radio-text');

            function updateText() {
                if (radioPublic.checked) {
                    radioText.innerText = "All your team can see this project";
                    console.log("radio public");
                } else if (radioPrivate.checked) {
                    radioText.innerText = "Only you and your selected team can access this project";
                    console.log("radio private");
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                updateText();

                radioPublic.addEventListener('change', updateText);
                radioPrivate.addEventListener('change', updateText);

                const toggleButton = document.getElementById('dropdownHelperButton');
                const dropdown = document.getElementById('dropdownHelper');

                toggleButton.addEventListener('click', function () {
                    dropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', function (event) {
                    if (!dropdown.contains(event.target) && !toggleButton.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });

            const checkboxes = document.querySelectorAll(".member-checkbox");
            const selectedContainer = document.querySelector("#selected-members");

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function () {
                    const memberName = document.querySelector(".member-name");
                    const memberId = memberName.dataset.memberId;
    
                    if (this.checked) {
                        const clone = memberName.cloneNode(true);
                        clone.id = `selected-${memberId}`;
                        clone.classList.add("text-xs", "text-gray-600", "font-medium", "p-1", "shadow-md", "rounded-lg", "bg-gray-50")
                        
                        selectedContainer.classList.remove("min-h-40")
                        selectedContainer.appendChild(clone);
                    } else {
                        const existing = document.querySelector(`#selected-${memberId}`);
                        if (existing) {
                            existing.remove();
                        }
                    }
                });
            })
        </script>

    @endsection