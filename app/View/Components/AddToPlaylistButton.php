<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class AddToPlaylistButton extends Component
{
    public $trackId;

    public function __construct($trackId)
    {
        $this->trackId = $trackId;
    }

    public function render()
    {
        $playlists = auth()->user()->playlists;
        return view('components.add-to-playlist-button', [
            'trackId' => $this->trackId,
            'playlists' => $playlists
        ]); 
    }
}
