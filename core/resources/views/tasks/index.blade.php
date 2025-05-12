@extends('dashboard')
@section('main')
@section('title', 'Task List')
    <div class="p-5 bg-white shadow-md rounded-lg">
        @if (session()->has('errorTask'))
            <x-toast-notification :show="true" variant="error" title="Error!" message="{{ session('errorTask') }}"
                :duration="7000" />
        @endif
        @if (session()->has('successTask'))
            <x-toast-notification :show="true" variant="success" title="Success!" message="{{ session('successTask') }}" :duration="7000" />
        @endif
        <div class="flex items-center gap-4">
            <select id="list-name"
                class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition w-1/5">
                <option selected>All</option>
                <option value="US">Todo</option>
                <option value="US">In Progress</option>
                <option value="US">Done</option>
            </select>
            <select id="list-name"
                class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block p-2.5 outline-none focus:ring-4 focus:ring-blue-200 transition w-1/5">
                <option selected>Latest</option>
                <option value="US">Oldest</option>
                <option value="US">Longest Working Hours</option>
                <option value="US">Highest Point</option>
            </select>
            <input type="text"
                class="block  border border-gray-300 text-sm rounded-lg p-2 outline-none text-gray-600 font-medium focus:ring-4 focus:ring-blue-200 transition"
                placeholder="search">

        </div>

        <div class="flex flex-col mt-5">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        No</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        Task Name</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        Label</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        Project Name</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        List Name</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        Point</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-end text-xs font-semibold text-gray-600 uppercase dark:text-neutral-500">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($tasks as $item)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $item->title }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->badge->name }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->project->title }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->list_name }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $item->point }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <button type="button" onclick="openDeleteModal({{ $item->id }})"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal delete task -->
        <dialog id="modal_delete_task" class="modal">
            <form method="POST" id="formDeleteTask" class="relative max-w-md bg-white rounded-lg shadow-md p-6 z-50 w-full">
                @csrf
                @method('DELETE')
                <div class="flex gap-2 items-center">
                    <div>
                        <div class="p-2 rounded-full bg-red-200" x-show="variant === 'danger'" id="danger">
                            <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" color="#b91c1c">
                                <path
                                    d="M20.0429 21H3.95705C2.41902 21 1.45658 19.3364 2.22324 18.0031L10.2662 4.01533C11.0352 2.67792 12.9648 2.67791 13.7338 4.01532L21.7768 18.0031C22.5434 19.3364 21.581 21 20.0429 21Z"
                                    stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M12 9V13" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M12 17.01L12.01 16.9989" stroke="#b91c1c" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-lg font-semibold text-gray-800 mb-2">Delete Task</h1>
                </div>
                <div class="my-2">
                    <p class="text-sm text-gray-600">Are you sure want to delete this task?</p>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="modal_delete_task.close()"
                        class="text-sm font-medium border border-gray-300 px-3 py-1 rounded-md hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                        class="text-sm font-medium bg-red-600 text-white px-3 py-1 rounded-md hover:opacity-80 transition">
                        Yes, Delete!
                    </button>
                </div>
            </form>
        </dialog>

    </div>
@endsection
@section('js')
<script>
    function openDeleteModal(taskId) {
        const form = document.getElementById('formDeleteTask');
        form.action = `/task/${taskId}`;
        modal_delete_task.showModal();
    }
</script>

@endsection