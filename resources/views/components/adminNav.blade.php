<!-- Sidebar -->
<aside class="w-56 border-r border-slate-800 hidden md:block flex flex-col">
    <nav class="flex flex-col py-4 space-y-1">
        <div class="px-4 pt-6 pb-2 text-xs uppercase text-slate-500">
            Music
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="{{ route('users') }}" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('songsDashboard') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-music"></i>
                <span>Users</span>
            </a>
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('albumDashboard') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-compact-disc"></i>
                <span>Categories</span>
            </a>
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="{{ route('adminAnalytics') }}" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('analytics') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-chart-line"></i>
                <span>Analytics</span>
            </a>
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('reviews') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-users"></i>
                <span>Reports</span>
            </a>
        </div>

        <div class="px-4 pt-6 pb-2 text-xs uppercase text-slate-500">
            Support
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('requests') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-question-circle"></i>
                <span>Requests</span>
            </a>
        </div>

        <div class="px-4 py-2 text-sm">
            <a href="" 
               class="flex items-center gap-3 p-2 rounded-md {{ request()->routeIs('support') ? 'bg-slate-800 bg-opacity-50 text-red-600' : 'text-white hover:bg-slate-800' }}">
                <i class="fas fa-headset"></i>
                <span>Support</span>
            </a>
        </div>
    </nav>
</aside>