<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public $ad;

    public function toggleLike($adId)
    {
        if (Auth::check()) {
            $like = Likes::where('id_advertisement', $adId)
                ->where('id_user', Auth::id())
                ->first();

            if ($like) {
                $like->delete();
            } else {
                Likes::create([
                    'id_user' => Auth::id(),
                    'id_advertisement' => $adId
                ]);
            }
            $this->dispatch('likeToggled');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.card');
    }
}
