







<div class="">
    @if(Auth::user()->role===3)
        <div class="row">
            <div class="col-3"><button class="bottoneblu bottonedio" wire:click="usersIndex">Gestisci utenti</button></div>
            <div class="col-3"><button class="bottoneblu bottonedio" wire:click="getStarted">Vai alla dashboard</button></div>
        </div>
    @elseif(Auth::user()->role===2)
        <div class="row">
            <div class="col-3"><button class="bottoneblu bottonedio" wire:click="getStarted">Get started!</button></div>
            <div class="col-3"><button class="bottoneblu bottonedio" wire:click="review">Recensisci</button></div>
            <div class="col-3 mannaia"><button class="bottoneblu bottonedio" wire:click="favourites">Preferiti</button></div>
        </div>
    @else
        <div class="row wrappami">
            <div class="col-3 mannaia"><button class="bottoneblu bottonedio" wire:click="favourites">Preferiti</button></div>
            {{-- <div class="col-3 mannaia"><button class="bottoneblu bottonedio" wire:click="chart">Carrello</button></div> --}}
            <div class="col-3 mannaia"><button class="bottoneblu bottonedio" wire:click="myAds">I miei annunci</button></div>
            <div class="col-3 mannaia"><button class="bottoneblu bottonedio" wire:click="review">Recensisci</button></div>
        </div>
    @endif
        <div  style="margin-bottom: 20%; margin-top: 20%">
            @switch($choice)
                @case(1)
                    <x-profile.favourites :ads="$ads"/>
                @break
                @case(2)
                    <x-profile.chart/>
                @break
                @case(3)
                    <x-profile.myAds :ads="$ads"/>
                @break
                @case(4)
                    <x-profile.review :star="$star"/>
                @break
                @case(5)
                    <x-profile.usersIndex :users="$users"/>
                @break
                @default
                <div class="text-center">
                    <em class="font-italic">
                        Scegli un azione in alto
                    </em>
                </div>
                @break
            @endswitch
        </div>
</div>
