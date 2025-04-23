<div class="relative" x-data="{ open: false }">
    <!-- Notification Bell Icon -->
    <button @click="open = !open" class="relative p-2 text-gray-400 hover:text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
            </path>
        </svg>
        <span id="unread-count"
            class="absolute top-0 right-0 inline-flex items-center justify-center px-[6px] py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1 -translate-y-1 bg-red-600 rounded-full {{ $unreadCount > 0 ? '' : 'hidden' }}">
            {{ $unreadCount }}
        </span>
    </button>

    <!-- Notification Dropdown -->
    <div x-show="open" @click.away="open = false"
        class="absolute right-0 w-80 mt-2 bg-black border border-gray-700 rounded-md shadow-lg">
        <div class="p-3 border-b border-gray-700">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold text-white">Notifications</h3>
                @if($unreadCount > 0)
                    <button onclick="markAllAsRead()" class="text-sm text-red-500 hover:text-red-400">
                        Mark all as read
                    </button>
                @endif
            </div>
        </div>

        <div class="max-h-96 overflow-y-auto">
            @forelse($notifications as $notification)
                <div id="notification-{{ $notification->id }}"
                    class="p-4 {{ !$notification->read_at ? 'bg-gray-900' : 'bg-black' }} hover:bg-gray-800 border-b border-gray-700">
                    <div class="flex items-center">
                        @if($notification->type === 'App\Notifications\NewTrackReleased')
                            <img src="{{ Storage::url($notification->data['cover_image']) }}" class="w-10 h-10 rounded"
                                alt="Track Cover">
                        @endif
                        <div class="ml-3 flex-1">
                            <p class="text-sm text-white">
                                {{ $notification->data['message'] }}
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>
                        @if(!$notification->read_at)
                            <button onclick="markAsRead('{{ $notification->id }}')" class="text-red-500 hover:text-red-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    No notifications
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function markAsRead(id) {
        fetch(`/notifications/${id}/mark-as-read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const notification = document.getElementById(`notification-${id}`);
                    notification.classList.remove('bg-gray-900');
                    notification.classList.add('bg-black');
                    updateUnreadCount(data.unreadCount);
                }
            });
    }

    function markAllAsRead() {
        fetch('/notifications/mark-all-as-read', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelectorAll('.bg-gray-900').forEach(el => {
                        el.classList.remove('bg-gray-900');
                        el.classList.add('bg-black');
                    });
                    updateUnreadCount(0);
                }
            });
    }

    function updateUnreadCount(count) {
        const badge = document.getElementById('unread-count');
        if (count > 0) {
            badge.textContent = count;
            badge.classList.remove('hidden');
        } else {
            badge.classList.add('hidden');
        }
    }
</script>