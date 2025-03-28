@extends('layouts.adminDash')
@section('title', 'Analytics')
@section('content')



<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Categories</h2>
        <button onclick="openModal()"
            class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
            Create
            <i class="fas fa-plus"></i>
        </button>
    </div>

    <!-- Search Bar -->
    <div class="relative mb-6">
        <i class="fas fa-search absolute left-3 top-3 text-slate-500"></i>
        <input type="text" placeholder="Search title, artist"
            class="w-full bg-black border border-slate-700 rounded-md py-2 pl-10 pr-4 focus:outline-none focus:ring-1 focus:ring-slate-600">
    </div>

    <!-- Layout Toggle -->
    <div class="flex justify-between items-center mb-4">
        <div></div>
        <div class="flex items-center gap-2 text-slate-400">
            <span>Layout</span>
            <button class="p-1 hover:bg-slate-700 rounded">
                <i class="fas fa-table-cells"></i>
            </button>
            <button class="p-1 hover:bg-slate-700 rounded">
                <i class="fas fa-grip"></i>
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-slate-400 border-b border-slate-800">
                    <th class="pb-3 pl-2">name of </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-slate-800 hover:bg-slate-800">
                    <td class="py-4 pl-2">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-triangle-exclamation text-orange-500"></i>
                            <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                <img src="{{asset('assets/img/up2me.jpg')}}" alt="Album Cover"
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <div>Lying 4 Fun</div>
                                <div class="text-slate-400 text-sm">Yeat</div>
                            </div>
                        </div>
                    </td>
                    <td>PaRaKa</td>
                    <td>Single</td>
                    <td>2025-03-18</td>
                    <td>
                        <div class="flex items-center gap-2">
                            <button class="text-orange-500 hover:text-orange-400">
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                            <span class="text-slate-400">12</span>
                        </div>
                    </td>
                    <td>
                        <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Accepted</span>
                    </td>
                    <td class=" pr-4">
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




    <!-- Pagination -->
    <div class="flex justify-center mt-6">
        <div class="flex items-center gap-2">
            <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-700">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-md bg-slate-800 hover:bg-slate-700">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="createCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-black border p-8 rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold">Add New category</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form method="POST" action="{{route('categories.store')}}"  class="space-y-6 w-[600px]">
  
            @csrf

            <div class="flex md:flex-row gap-6">
             
                <div class=" space-y-4 w-full">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Category Name</label>
                        <input type="text" name="name" required
                            class="w-full bg-black border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-red-500">
                    </div>              
                </div>

                
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" onclick="closeModal()"
                    class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">
                    
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('createCategoryModal').classList.remove('hidden');
        document.getElementById('createCategoryModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('createCategoryModal').classList.remove('flex');
        document.getElementById('createCategoryModal').classList.add('hidden');
    }

</script>




@endsection