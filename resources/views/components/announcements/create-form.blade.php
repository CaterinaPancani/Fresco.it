<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                <div class="card-body p-4 p-sm-5 background-secondary">
                    <h2 class="card-title text-center mb-5 color-accent">{{__('ui.inserisciArticolo')}}</h2>
                    <hr class="my-4">
                    <form wire:submit="preview">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
