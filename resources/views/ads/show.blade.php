<x-layout.layout>
    <div class="carddetail background-variationdetail mt-5" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);border-radius: 8px;">
        <div class="carousel-container background-accent">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                @foreach($ad->images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : "images/logo.png" }}">
                        <img src="{{$image->getUrl(300,300) ?? ''}}" alt="Image">
                        {{-- <img src="{{ Storage::url($image->path) }}" class="d-block w-100" alt="Image"> --}}
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
        </div>
        <div class="card-content ms-5" style="margin:10px">
            <h1> <strong>Titolo:</strong> <br> {{ $ad->title }}</h1>
            <p><strong>Descrizione:</strong> <br> {{ $ad->description }}</p>
            <h5><strong>Categoria:</strong> <br> {{ $ad->category->name }}</h5>
            <p><strong>Prezzo:</strong> <br> {{ $ad->price }}€</p>
        </div>
    </div>
</x-layout.layout>



