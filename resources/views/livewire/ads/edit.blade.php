<div class="row">
    <div class="col-6">
        {{-- form --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-4 p-sm-5 background-secondary">
                            <h2 class="card-title text-center mb-5 color-accent">{{__('ui.editAd')}}</h2>
                            <hr class="my-4">
                            <form wire:submit="update">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <select wire:model.change='category' class="form-select @error('category') is-invalid @enderror">
                                            <option value="">{{__('ui.category')}}</option>
                                            @foreach (App\Models\Categories::all() as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="color-accent">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <input wire:model.change='title' placeholder="{{__('ui.title')}}" type="text" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="color-accent">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-3">
                                        <input wire:model.change='price' placeholder="{{__('ui.price')}}" type="number" class="form-control @error('price') is-invalid @enderror" >
                                        @error('price')
                                            <span class="color-accent">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <textarea wire:model.change='description' placeholder="{{__('ui.description')}}" type="text" class="form-control @error('description') is-invalid @enderror"></textarea>
                                        @error('description')
                                            <span class="color-accent">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div>
                                        <input wire:model="images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="immagine">
                                        @error('temporary_images.*')
                                            <span class="color-accent">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="background-primary color-accent btn" type="submit">Conferma e invia</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- show --}}
    <div class="col-6">
        <div style="height:100%;">
            <div id="carouselExampleDark" class="carousel carousel-dark slide m-5" style="height:50%; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);border-radius: 8px;">
                <div class="carousel-inner">
                        {{-- @dd($images) --}}
                        @if($oldimages)
                            @foreach ($oldimages as $key => $image)
                                <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="{{Storage::url($image->path)}}">
                                </div>
                            @endforeach
                            <div class="carousel-caption d-none d-md-block">
                                <a class="btn btn-danger" wire:click="removeImage({{ $key }})">Cancella</a>
                            </div>
                        @endif
                        @if($images)
                            @foreach ($images as $image)
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="{{$image->temporaryUrl()}}">
                                </div>
                            @endforeach
                        @endif
                        
                    
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
                                <p><strong>Categoria:</strong> <br> {{$pippo->name ?? ''}}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Prezzo:</strong> <br> {{$price??''}}€</p>
                            </div>
                        </div>
                        <h1> <strong>{{ $title ??''}}</strong></h1>
                        <p><strong>{{ $description ??''}}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




