{{-- <div class="container mt-5" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);border-radius: 8px;">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto my-5"> --}}
            {{-- <div class="carddetail background-accent"> --}}
                {{-- <div class="carousel-container background-accent"> --}}
                    {{-- <div id="carouselExample" class="carousel slide">
                        @foreach ($images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ $image->temporaryUrl() }}" alt="immagine">
                                <button type="button" class="btn" wire:click="removeImage({{ $key }})">Cancella</button>
                            </div>
                        @endforeach
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-content" style="margin:10px">
                        <h1> <strong>Titolo:</strong> <br> {{ $title }}</h1>
                        <p><strong>Descrizione:</strong> <br> {{ $description }}</p>
                        <p><strong>Prezzo:</strong> <br> {{ $price }}€</p>
                        <p><strong>Categoria:</strong> <br> {{ $category }}</p>
                        <button class="background-primary color-accent btn" wire:click="store">Conferma e invia</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div style="height:100%;">
    <div id="carouselExampleDark" class="carousel carousel-dark slide m-5" style="height:50%; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);border-radius: 8px;">
        <div class="carousel-inner">
                @foreach ($images as $key => $image)
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ $image->temporaryUrl() }}" alt="immagine">
                <div class="carousel-caption d-none d-md-block">
                    <a class="btn btn-danger" wire:click="removeImage({{ $key }})">Cancella</a>
                </div>
                </div>
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-content" style="margin:10px">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <p><strong>Categoria:</strong> <br> {{App\Models\Categories::find($category)->name ?? ''}}</p>
                    </div>
                    <div class="col-6">
                        <p><strong>Prezzo:</strong> <br> {{ $price }}€</p>
                    </div>
                </div>
                <h1> <strong>{{ $title }}</strong></h1>
                <p><strong>{{ $description }}</strong></p>
            </div>
            <button class="bottoneblu background-primary color-accent btn" wire:click="store">Conferma e invia</button>
        </div>
    </div>
</div>