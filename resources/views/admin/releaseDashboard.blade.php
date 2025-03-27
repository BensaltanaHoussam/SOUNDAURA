@extends('layouts.adminDash')
@section('title', 'Analytics')
@section('content')

    <div class="p-6">


        <!-- Top Songs -->
        <div class="bg-black rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold mb-4">Users</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-slate-400 border-b border-slate-800">
                            <th class="pb-3 pl-2">NAME</th>
                            <th class="pb-3">EMAIL</th>
                            <th class="pb-3">ROLE</th>
                            <th class="pb-3">REGISTERED DATE</th>
                            <th class="pb-3">STATUS</th>
                            <th class="pb-3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-800 hover:bg-slate-800">
                            <td class="py-4 pl-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-slate-700 rounded-full overflow-hidden">
                                        <img src="{{asset('assets/img/destroy.jpg')}}" alt="User Avatar"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div>Destroy Lonely</div>

                                    </div>
                                </div>
                            </td>
                            <td>johndoe@example.com</td>
                            <td>artist</td>
                            <td>2023-05-15</td>
                            <td>
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Active</span>
                            </td>
                            <td class="pr-4">
                                <div class="flex justify-end gap-4">
                                    <!-- Edit Button -->
                                    <button class="text-slate-400 hover:text-white">
                                        <i class="ri-edit-box-fill"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="text-red-500 hover:text-red-400">
                                        <i class="ri-delete-bin-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-slate-800 hover:bg-slate-800">
                            <td class="py-4 pl-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-slate-700 rounded-full overflow-hidden">
                                        <img src="{{asset('assets/img/kenCarson.avif')}}" alt="User Avatar"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div>Ken Carson</div>
                                    </div>
                                </div>
                            </td>
                            <td>janesmith@example.com</td>
                            <td>artist</td>
                            <td>2024-08-22</td>
                            <td>
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-xs">Pending</span>
                            </td>
                            <td class="pr-4">
                                <div class="flex justify-end gap-4">
                                    <!-- Edit Button -->
                                    <button class="text-slate-400 hover:text-white">
                                        <i class="ri-edit-box-fill"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="text-red-500 hover:text-red-400">
                                        <i class="ri-delete-bin-fill"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>





    </div>

@endsection