@extends('dashboard')
@section('title', 'Setting Account')
@section('main')

<div class="w-full bg-white p-5 rounded-lg shadow-md mb-7">
    <div class="">
        <h1 class="text-gray-800 font-semibold mb-4">Account</h1>
        <div class="flex justify-between items-center border-b mb-4 py-2">
            <h1 class="text-gray-600 font-medium">Date Joining</h1>
            <p class="text-gray-600 text-sm font-medium">12 May, 2020</p>
        </div>
        <div class="flex justify-between border-b py-2 items-center">
            <h1 class="text-gray-600 font-medium">Password</h1>
            <button class="px-3 py-2 text-gray-800 text-sm font-medium bg-gray-300 rounded-md hover:bg-gray-200 transition-colors">Change Password</button>
        </div>
        <div class="flex justify-between border-b py-2 items-center">
            <h1 class="text-red-600 font-medium">Report</h1>
            <a href="" class="text-red-600 text-sm underline">Make a Report</a>
        </div>
    </div>
</div>
<div class="w-full bg-white p-5 rounded-lg shadow-md">
    <div class="">
        <h1 class="text-gray-800 font-semibold mb-4">Danger Zone</h1>
        <div class="flex justify-between border-b py-2 items-center">
            <h1 class="text-gray-600 font-medium">Leave your Company</h1>
            <button class="px-3 py-2 bg-black text-sm font-medium text-white rounded-md hover:bg-gray-800 transition-colors">Leave Company</button>
        </div>
        <div class="flex justify-between items-center border-b mb-4 py-2">
            <h1 class="text-gray-600 font-medium">Delete your Account</h1>
            <button class="px-3 py-2 bg-red-600 text-sm font-medium text-white rounded-md hover:bg-red-500 transition-colors">Delete Account</button>
        </div>
    </div>
</div>

@endsection