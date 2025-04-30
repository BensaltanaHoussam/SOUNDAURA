<!-- Player Bar -->
<div
    class="w-full bg-black sticky bottom-0 text-white flex items-center justify-between px-12 py-3 border-t border-gray-800">
    <audio id="audioPlayer" class="hidden"></audio>

    <!-- Left section - Song info -->
    <div class="flex items-center w-1/3">
        <div class="w-14 h-14 bg-gray-600 flex-shrink-0">
            <img id="trackCover" src="{{ asset('assets/img/songDefault.webp') }}" alt="Album cover"
                class="w-full h-full object-cover" />
        </div>
        <div class="ml-4">
            <div id="trackTitle" class="text-sm font-semibold">Select a track</div>
            <div id="trackArtist" class="text-xs text-gray-400">Artist name</div>
        </div>

    </div>

    <!-- Center section - Player controls -->
    <div class="flex flex-col items-center w-1/3">
        <div class="flex items-center space-x-4">
            <!-- Previous button -->
            <button id="prevBtn" class="text-white hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M4 4a.5.5 0 0 1 1 0v3.248l6.267-3.636c.54-.313 1.232.066 1.232.696v7.384c0 .63-.692 1.01-1.232.697L5 8.753V12a.5.5 0 0 1-1 0V4z" />
                </svg>
            </button>
            <button id="playPauseBtn"
                class="bg-white text-black rounded-full w-8 h-8 flex items-center justify-center hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-play-fill" viewBox="0 0 16 16">
                    <path
                        d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                </svg>
            </button>
            <!-- Next button -->
            <button id="nextBtn" class="text-white hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M12.5 4a.5.5 0 0 0-1 0v3.248L5.233 3.612C4.693 3.3 4 3.678 4 4.308v7.384c0 .63.692 1.01 1.233.697L11.5 8.753V12a.5.5 0 0 0 1 0V4z" />
                </svg>
            </button>
        </div>
        <div class="flex items-center w-full mt-2">
            <span id="currentTime" class="text-xs text-gray-400 mr-2">0:00</span>
            <div class="w-full bg-gray-600 rounded-full h-1 mx-2 hover:h-2 transition-all">
                <div id="progressBar" class="bg-white h-full rounded-full relative" style="width: 0%"></div>
            </div>
            <span id="duration" class="text-xs text-gray-400 ml-2">0:00</span>
        </div>
    </div>

    <!-- Right section - Volume controls -->
    <div class="flex items-center justify-end w-1/3 space-x-3">
        <button class="text-white hover:text-red-500 transition">
            <i class="ri-volume-up-fill"></i>
        </button>
        <input type="range" id="volumeControl" class="w-28  accent-red-500">
    </div>
</div>

<script>
    // Player elements
    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const progressBar = document.getElementById('progressBar');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const volumeControl = document.getElementById('volumeControl');
    const trackTitle = document.getElementById('trackTitle');
    const trackArtist = document.getElementById('trackArtist');
    const trackCover = document.getElementById('trackCover');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const progressContainer = progressBar.parentElement;

    // Track queue management
    let currentTrackIndex = 0;
    let trackQueue = [];

    // Format time helper
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
    }

    // Update play/pause icon
    function updatePlayPauseIcon(isPlaying) {
        playPauseBtn.innerHTML = isPlaying
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>';
    }

    // Save player state
    function savePlayerState() {
        const playerState = {
            currentTrack: {
                audioUrl: audioPlayer.src,
                title: trackTitle.textContent,
                artist: trackArtist.textContent,
                coverUrl: trackCover.src
            },
            currentTime: audioPlayer.currentTime,
            isPlaying: !audioPlayer.paused,
            volume: audioPlayer.volume,
            queue: trackQueue,
            currentTrackIndex: currentTrackIndex
        };
        localStorage.setItem('playerState', JSON.stringify(playerState));
    }

    // Load player state
    function loadPlayerState() {
        const savedState = JSON.parse(localStorage.getItem('playerState'));
        if (savedState) {
            // Restore track info
            trackTitle.textContent = savedState.currentTrack.title;
            trackArtist.textContent = savedState.currentTrack.artist;
            trackCover.src = savedState.currentTrack.coverUrl;
            audioPlayer.src = savedState.currentTrack.audioUrl;

            // Restore volume
            audioPlayer.volume = savedState.volume;
            volumeControl.value = savedState.volume * 100;

            // Restore queue
            trackQueue = savedState.queue || [];
            currentTrackIndex = savedState.currentTrackIndex || 0;

            // Restore playback position
            audioPlayer.addEventListener('loadedmetadata', function () {
                audioPlayer.currentTime = savedState.currentTime;
                if (savedState.isPlaying) {
                    audioPlayer.play();
                    updatePlayPauseIcon(true);
                }
            }, { once: true });
        }
    }

    // Play track function
    window.playTrack = function (audioUrl, title, artist, coverUrl, addToQueue = true) {
        const trackInfo = { audioUrl, title, artist, coverUrl };

        if (addToQueue) {
            trackQueue.push(trackInfo);
            currentTrackIndex = trackQueue.length - 1;
        }

        trackTitle.textContent = title;
        trackArtist.textContent = artist;
        trackCover.src = coverUrl;
        audioPlayer.src = audioUrl;
        audioPlayer.play();
        updatePlayPauseIcon(true);
        savePlayerState();
    };

    // Event Listeners
    playPauseBtn.addEventListener('click', function () {
        if (audioPlayer.paused) {
            audioPlayer.play();
            updatePlayPauseIcon(true);
        } else {
            audioPlayer.pause();
            updatePlayPauseIcon(false);
        }
        savePlayerState();
    });

    // Progress bar updates
    audioPlayer.addEventListener('timeupdate', () => {
        if (!audioPlayer.duration) return;
        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressBar.style.width = `${progress}%`;
        currentTime.textContent = formatTime(audioPlayer.currentTime);
        savePlayerState();
    });

    // Duration update
    audioPlayer.addEventListener('loadedmetadata', () => {
        duration.textContent = formatTime(audioPlayer.duration);
    });

    // Seek functionality
    progressContainer.addEventListener('click', function (e) {
        if (!audioPlayer.duration) return;
        const rect = this.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const newTime = (clickX / rect.width) * audioPlayer.duration;
        audioPlayer.currentTime = newTime;
        savePlayerState();
    });

    // Volume control
    volumeControl.addEventListener('input', function (e) {
        audioPlayer.volume = e.target.value / 100;
        savePlayerState();
    });

    // Previous track
    prevBtn.addEventListener('click', function () {
        if (currentTrackIndex > 0) {
            currentTrackIndex--;
            const prevTrack = trackQueue[currentTrackIndex];
            playTrack(prevTrack.audioUrl, prevTrack.title, prevTrack.artist, prevTrack.coverUrl, false);
        }
    });

    // Next track
    nextBtn.addEventListener('click', function () {
        if (currentTrackIndex < trackQueue.length - 1) {
            currentTrackIndex++;
            const nextTrack = trackQueue[currentTrackIndex];
            playTrack(nextTrack.audioUrl, nextTrack.title, nextTrack.artist, nextTrack.coverUrl, false);
        }
    });

    // Auto-play next track
    audioPlayer.addEventListener('ended', function () {
        if (currentTrackIndex < trackQueue.length - 1) {
            nextBtn.click();
        }
    });

    // Handle errors
    audioPlayer.addEventListener('error', function (e) {
        console.error('Audio playback error:', e);
        trackTitle.textContent = 'Error playing track';
    });

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', loadPlayerState);

    // Save state before page unload
    window.addEventListener('beforeunload', savePlayerState);

    window.addEventListener('keyup', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.mobile-panel').forEach(panel => {
                panel.classList.remove('active');
            });
        } else if (e.key === ' ') {
            e.preventDefault();
            if (audioPlayer.paused) {
                audioPlayer.play();
                updatePlayPauseIcon(true);
            } else {
                audioPlayer.pause();
                updatePlayPauseIcon(false);
            }
            savePlayerState();
        }
    });
</script>