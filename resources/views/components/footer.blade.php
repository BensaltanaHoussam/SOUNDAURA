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
            <button id="playPauseBtn"
                class="bg-white text-black rounded-full w-8 h-8 flex items-center justify-center hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-play-fill" viewBox="0 0 16 16">
                    <path
                        d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                </svg>
            </button>
        </div>
        <div class="flex items-center w-full mt-2">
            <span id="currentTime" class="text-xs text-gray-400 mr-2">0:00</span>
            <div class="w-full bg-gray-600 rounded-full h-1 mx-2">
                <div id="progressBar" class="bg-white h-1 rounded-full" style="width: 0%"></div>
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
    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const progressBar = document.getElementById('progressBar');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const volumeControl = document.getElementById('volumeControl');
    const trackTitle = document.getElementById('trackTitle');
    const trackArtist = document.getElementById('trackArtist');
    const trackCover = document.getElementById('trackCover');

    // Play track 
    window.playTrack = function (audioUrl, title, artist, coverUrl) {
        trackTitle.textContent = title;
        trackArtist.textContent = artist;
        trackCover.src = coverUrl;
        audioPlayer.src = audioUrl;


        audioPlayer.play();
        updatePlayPauseIcon(true);
    }


    // Play/Pause toggle
    playPauseBtn.addEventListener('click', function () {
        if (audioPlayer.paused) {
            audioPlayer.play();
            updatePlayPauseIcon(true);
        } else {
            audioPlayer.pause();
            updatePlayPauseIcon(false);
        }
    });

    // Update play button icon
    function updatePlayPauseIcon(isPlaying) {
        playPauseBtn.innerHTML = isPlaying
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5zm5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5z"/></svg>'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg>';
    }

    // Time update handler
    audioPlayer.addEventListener('timeupdate', () => {
        const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
        progressBar.style.width = `${progress}%`;
        currentTime.textContent = formatTime(audioPlayer.currentTime);
    });


    // Duration change handler
    audioPlayer.addEventListener('loadedmetadata', () => {
        duration.textContent = formatTime(audioPlayer.duration);
    });

    // Volume control
    volumeControl.addEventListener('input', (e) => {
        audioPlayer.volume = e.target.value / 100;
    });

    // Format time helper
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
    }
</script>