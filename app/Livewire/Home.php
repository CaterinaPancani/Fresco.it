<?php

namespace App\Livewire;

use App\Models\Ads;
use Livewire\Component;

class Home extends Component
{
    public $ads;

    public function mount()
    {
        $this->loadAds();
    }

    public function loadAds()
    {
        $this->ads = Ads::where('checked', true)
        ->orderBy('updated_at', 'DESC')
        ->take(8)
        ->get();
    }

    public function render()
    {
        $this->loadAds();
        return view('livewire.home',[
            'ads' => $this->ads
        ]);
    }

}
