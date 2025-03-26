@extends('layouts.adminDash')
@section('title', 'Analytics')
@section('content')

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Music Analytics</h2>
        <div class="flex gap-2">
            <button class="bg-red-600 hover:bg-red-500 text-gray-200 px-4 py-2 rounded-md flex items-center gap-2">
                Last 30 Days
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
    </div>

    <!-- Overview Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-black border rounded-lg p-4">
            <div class="text-slate-400 text-sm mb-1">Total Streams</div>
            <div class="text-2xl font-bold">1.2M</div>
            <div class="flex items-center text-green-500 text-sm mt-2">
                <i class="fas fa-arrow-up mr-1"></i>
                12% from last month
            </div>
        </div>
        <div class="bg-black border rounded-lg p-4">
            <div class="text-slate-400 text-sm mb-1">Monthly Listeners</div>
            <div class="text-2xl font-bold">245K</div>
            <div class="flex items-center text-green-500 text-sm mt-2">
                <i class="fas fa-arrow-up mr-1"></i>
                8% from last month
            </div>
        </div>
        <div class="bg-black border rounded-lg p-4">
            <div class="text-slate-400 text-sm mb-1">Revenue</div>
            <div class="text-2xl font-bold">$12,450</div>
            <div class="flex items-center text-green-500 text-sm mt-2">
                <i class="fas fa-arrow-up mr-1"></i>
                15% from last month
            </div>
        </div>
        <div class="bg-black border rounded-lg p-4">
            <div class="text-slate-400 text-sm mb-1">New Followers</div>
            <div class="text-2xl font-bold">5,230</div>
            <div class="flex items-center text-red-500 text-sm mt-2">
                <i class="fas fa-arrow-down mr-1"></i>
                3% from last month
            </div>
        </div>
    </div>

    <!-- Top Songs -->
    <div class="bg-black rounded-lg p-4 mb-6">
        <h3 class="text-lg font-semibold mb-4">Top Songs</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-slate-400 border-b border-slate-700">
                        <th class="pb-3 pl-2">TITLE</th>
                        <th class="pb-3">STREAMS</th>
                        <th class="pb-3">LIKES</th>
                        <th class="pb-3">TREND</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700 hover:bg-slate-700">
                        <td class="py-4 pl-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                    <img src="{{asset('assets/img/up2me.jpg')}}" alt="Album Cover"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div>Lying 4 Fun</div>
                                </div>
                            </div>
                        </td>
                        <td>450K</td>
                        <td>32K</td>
                        <td>
                            <div class="flex items-center text-green-500">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>5</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-slate-700 hover:bg-slate-700">
                        <td class="py-4 pl-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                    <img src="{{asset('assets/img/lyfe.webp')}}" alt="Album Cover"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div>Flawless</div>
                                </div>
                            </div>
                        </td>
                        <td>280K</td>
                        <td>24K</td>
                        <td>
                            <div class="flex items-center text-green-500">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>6</span>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b border-slate-700 hover:bg-slate-700">
                        <td class="py-4 pl-2">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-700 rounded overflow-hidden">
                                    <img src="{{asset('assets/img/afterLyfe.jpg')}}" alt="Album Cover"
                                        class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <div>Money So Big</div>
                                </div>
                            </div>
                        </td>
                        <td>220K</td>
                        <td>18K</td>
                        <td>
                            <div class="flex items-center text-red-500">
                                <i class="fas fa-arrow-down mr-1"></i>
                                <span>9</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

 



</div>

@endsection 