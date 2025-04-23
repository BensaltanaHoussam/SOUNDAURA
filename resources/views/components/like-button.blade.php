@props(['track'])

<div class="like-button" 
     data-track-id="{{ $track->id }}"
     data-liked="{{ auth()->check() && $track->isLikedBy(auth()->user()) ? 'true' : 'false' }}">
    
    <button type="button" 
            onclick="toggleLike(this)" 
            class="group flex items-center gap-1 text-sm {{ auth()->check() && $track->isLikedBy(auth()->user()) ? 'text-red-600' : 'text-gray-400' }}">
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-5 w-5 transition-colors group-hover:text-red-600" 
             fill="{{ auth()->check() && $track->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" 
             viewBox="0 0 24 24" 
             stroke="currentColor">
            <path stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <span class="likes-count transition-colors group-hover:text-red-600">{{ $track->likes()->count() }}</span>
    </button>
</div>

<script>
function toggleLike(button) {
    const container = button.closest('.like-button');
    const trackId = container.dataset.trackId;
    const isLiked = container.dataset.liked === 'true';
    const svg = button.querySelector('svg');
    const likesCount = button.querySelector('.likes-count');

    fetch(`/tracks/${trackId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.status === 401) {
            window.location.href = '/login';
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data && data.success) {
            // Update like status
            container.dataset.liked = data.liked;
            
            // Update button appearance
            if (data.liked) {
                button.classList.remove('text-gray-400');
                button.classList.add('text-red-600');
                svg.setAttribute('fill', 'currentColor');
            } else {
                button.classList.remove('text-red-600');
                button.classList.add('text-gray-400');
                svg.setAttribute('fill', 'none');
            }
            
            // Update likes count
            likesCount.textContent = data.likesCount;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>