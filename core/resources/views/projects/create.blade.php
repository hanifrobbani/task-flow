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
            <h1 class="mb-2 text-sm font-medium text-gray-800">Selected Member</h1>
            <div class="border border-gray-300 w-full rounded-lg h-40"></div>
        </div>
        <div class="bg-white p-5 rounded shadow-md w-full mt-5">
            <div class="relative">
                <label for="countries" class="block mb-1 text-sm font-medium">Team Member</label>
                <button id="dropdownHelperButton" data-dropdown-toggle="dropdownHelper" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg inline-flex justify-between items-center w-full p-2.5 outline-none" type="button">Select Team Member<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownHelper" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md border absolute max-h-96 overflow-y-scroll no-scrollbar">
                    <ul class="p-3 flex items-center flex-wrap text-sm text-gray-700" aria-labelledby="dropdownHelperButton">
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input id="helper-checkbox-1" aria-describedby="helper-checkbox-text-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-checkbox-1" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Enable notifications</div>
                                        <p id="helper-checkbox-text-1" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful instruction goes over here.</p>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input id="helper-checkbox-2" aria-describedby="helper-checkbox-text-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-checkbox-2" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Enable 2FA auth</div>
                                        <p id="helper-checkbox-text-2" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful instruction goes over here.</p>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex items-center h-5">
                                    <input id="helper-checkbox-3" aria-describedby="helper-checkbox-text-3" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                </div>
                                <div class="ms-2 text-sm">
                                    <label for="helper-checkbox-3" class="font-medium text-gray-900 dark:text-gray-300">
                                        <div>Ridwan Fauzan</div>
                                        <p id="helper-checkbox-text-3" class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful instruction goes over here.</p>
                                    </label>
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
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition">
                    <option selected disabled>Select Badge</option>
                    <option value="US">Web Development</option>
                    <option value="US">Design</option>
                </select>
            </div>
            <div class="w-full">
                <label for="countries" class="block mb-1 text-sm font-medium text-gray-800">Prority</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition">
                    <option selected disabled>Select Priority</option>
                    <option value="US">Low</option>
                    <option value="US">Medium</option>
                    <option value="US">High</option>
                </select>
            </div>
        </div>

        <div class="my-3">
            <label for="countries" class="block mb-1 text-sm font-medium">Project Title</label>
            <input type="text" class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition">
        </div>
        <div class="my-3">
            <label for="countries" class="block mb-1 text-sm font-medium">Description Project</label>
            <textarea name="" id="" class="block w-full border border-gray-300 text-sm rounded-lg p-2 outline-none min-h-40 text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"></textarea>
        </div>

        <div class="my-3">
            <label for="countries" class="block mb-1 text-sm font-medium">Status</label>
            <div class="flex gap-4 items-center">
                <div class="flex items-center">
                    <input checked id="radio-type-1" type="radio" name="default-radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
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
                <input type="date" class="w-full p-2 border border-gray-400 rounded-lg text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none">
            </div>
            <div class="w-full">
                <label for="countries" class="block mb-1 text-sm font-medium">Due Date</label>
                <input type="date" class="w-full p-2 border border-gray-400 rounded-lg  text-gray-600 text-sm focus:ring-4 focus:ring-blue-200 transition outline-none">
            </div>
        </div>

        <div class="mt-5 flex flex-row-reverse gap-2">
            <button class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg text-sm hover:opacity-80 transition">Save</button>
            <a href="/project" class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg text-sm hover:opacity-80 transition">Cancel</a>
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

        document.addEventListener('DOMContentLoaded', function() {
            updateText();

            radioPublic.addEventListener('change', updateText);
            radioPrivate.addEventListener('change', updateText);

            const toggleButton = document.getElementById('dropdownHelperButton');
            const dropdown = document.getElementById('dropdownHelper');

            toggleButton.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!dropdown.contains(event.target) && !toggleButton.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>

    @endsection