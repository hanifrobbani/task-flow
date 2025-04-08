@extends('dashboard')
@section('main')
@section('title', 'Task List')
<div class="p-5 bg-white shadow-md rounded-lg">
    <div class="flex items-center gap-4">
        <!-- ada select type list task (todo, in progress, dll)-->
        <!-- search nama task -->
        <select id="list-name" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition w-1/5">
            <option selected>All</option>
            <option value="US">Todo</option>
            <option value="US">In Progress</option>
            <option value="US">Done</option>
        </select>
        <select id="list-name" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition w-1/5">
            <option selected>Latest</option>
            <option value="US">Oldest</option>
            <option value="US">Longest Working Hours</option>
            <option value="US">Highest Point</option>
        </select>
        <input type="text" class="block  border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition" placeholder="search">

    </div>

    <div class="flex flex-col mt-5">
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">No</th>
                                <th scope="col" class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">Task Name</th>
                                <th scope="col" class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">Label</th>
                                <th scope="col" class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">Project Name</th>
                                <th scope="col" class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">List Name</th>
                                <th scope="col" class="px-4 py-3 text-end text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">1</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">John Brown</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">45</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">New York No. 1 Lake Park</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">Done</td>
                                <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">2</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">Jim Green</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">27</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">London No. 1 Lake Park</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">Todo</td>
                                <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">3</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">Joe Black</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">31</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">Sidney No. 1 Lake Park</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">In Progress</td>
                                <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection