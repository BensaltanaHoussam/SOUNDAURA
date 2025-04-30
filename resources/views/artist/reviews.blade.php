@extends('layouts.dashboard')
@section('title', 'Home')
@section('content')




    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">My Music</h2>
            <button onclick="openModal()"
                class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
                Create
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6">
            <button class="bg-red-600 text-gray-200 px-6 py-2 rounded-full">Drafts</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Distributed</button>
            <button class="bg-black hover:bg-slate-600 px-6 py-2 rounded-full">Deleted</button>
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
                        <th class="w-12 pb-3 pl-4"></th>
                        <th class="pb-3 pl-2">TITLE</th>
                        <th class="pb-3">TYPE</th>
                        <th class="pb-3">RELEASE DATE</th>
                        <th class="pb-3">COMMENTS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                        <!-- Album Row -->
                        <tr class="border-b border-slate-800 hover:bg-black">
                            <td class="pl-4">
                                <button onclick="toggleComments('comments-{{ $album->id }}')"
                                    class="w-6 h-6 flex items-center justify-center rounded-full bg-black border hover:bg-slate-600 transition-colors">
                                    <i class="ri-arrow-down-s-line"></i>
                                </button>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                        <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div class="font-medium text-white">{{ $album->title }}</div>
                                </div>
                            </td>
                            <td class="text-slate-400">Album</td>
                            <td class="text-slate-400">{{ $album->created_at->format('Y-m-d') }}</td>
                            <td class="text-slate-400">{{ $album->comments->count() }}</td>
                        </tr>

                        <!-- Comments Row -->
                        <tr id="comments-{{ $album->id }}" class="hidden">
                            <td colspan="5" class="bg-zinc-900/50 p-4">
                                <div class="space-y-4 ml-14">
                                    @forelse($album->comments as $comment)
                                        <div class="flex items-start gap-3 p-3 rounded-lg bg-black/30">
                                            <img src="{{ $comment->user->profile_picture ? asset('storage/' . $comment->user->profile_picture) : asset('assets/img/profile.jpg') }}" class="w-8 h-8 rounded-full">
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <span class="font-medium text-white">{{ $comment->user->name }}</span>
                                                    <span class="text-sm text-slate-400">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <p class="text-slate-300 mt-1">{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-slate-400 text-center py-4">No comments yet</p>
                                    @endforelse
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function toggleComments(commentId) {
                const commentsRow = document.getElementById(commentId);
                commentsRow.classList.toggle('hidden');
            }
        </script>








    </div>







@endsection