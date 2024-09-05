<h4>
    Questo è l'annuncio di {{App\Models\User::find($ad->user_id)->name}}
</h4>

<div class="carddetail background-accent" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);border-radius: 8px;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($alpha as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{Storage::url($image->path)}}" alt="immagine">
                                </div>
                                <div class="col-4">
                                    <h5> Revisione immagini</h5>
                                    <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                    <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                    <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                    <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                    <p>Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                                </div>
                                <div class="col-4">
                                    <div>
                                        @if($image->labels)
                                            @foreach ($image->labels as $label)
                                            <ul>
                                                <li>{{$label}}</li>
                                            </ul>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-1">
            <div class="card-content">
                <h1> <strong>Titolo:</strong> <br> {{ $ad->title }}</h1>
                <p><strong>Descrizione:</strong> <br> {{ $ad->description }}</p>
                <p><strong>Prezzo:</strong> <br> {{ $ad->price }}€</p>
            </div>
        </div>
    </div>
</div>

<div style="display: flex; justify-content:space-between;">
    <div class="m-5">
        <button class="btn btn-success" wire:click="accept({{$ad->id}})"> Approva annuncio </button>
    </div>

    <div class="m-5">
        <button class="btn btn-danger" wire:click="refuse({{$ad->id}})"> Rifiuta annuncio </button>
    </div>
</div>
