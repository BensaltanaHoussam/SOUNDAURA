@props(['user'])

<form action="{{ route('follow.toggle', $user) }}" method="POST" class="inline">
    @csrf
    @php
        $isFollowing = auth()->user()?->isFollowing($user);
    @endphp

    <button type="submit"
            class="px-6 py-2 rounded-full font-medium text-sm transition 
                   {{ $isFollowing 
                        ? 'bg-red-600 text-white hover:bg-red-700' 
                        : 'border border-red-600 text-red-600 hover:bg-red-600 hover:text-white' }}">
        {{ $isFollowing ? 'Following' : 'Follow' }}
    </button>
</form>
