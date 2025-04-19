<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddToPlaylistButton extends Component
{
    public $trackId;
    public $playlists;

    public function __construct($trackId)
    {
        $this->trackId = $trackId;
        $this->playlists = auth()->user()->playlists()->get();
    }

    public function render()
    {
        return view(view: 'components.add-to-playlist-button');
    }
}