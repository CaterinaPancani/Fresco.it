
            <div class="card h-100">
                @if(!$ad->images()->get()->isEmpty())
                    <a href="{{ route('adDetail', $ad->id) }}">
                        <img class="card-img-top" src="{{ $ad->images->first()->getUrl(300,300) }}" alt="cover">
                    </a>
                @else
                    <a href="{{ route('adDetail', $ad->id) }}">
                        <img class="card-img-top" src="{{ asset('images/logo.png') }}" alt="cover">
                    </a>
                @endif
                @auth
                    <button wire:click="toggleLike({{ $ad->id }})" class="position-absolute top-0 end-0 m-3 border-0 bg-transparent">
                        @if(App\Models\Likes::where('id_advertisement',$ad->id)->first() && App\Models\Likes::where('id_user',Auth::user()->id)->first())
                            <i class="fa-solid fa-heart fa-xl text-danger"></i>
                        @else
                            <i class="fa-regular fa-heart fa-xl text-danger"></i>
                        @endif
                    </button>
                @endauth
                <div class="card-body">
                    <p class="card-text"><strong>{{$ad->description}}</strong></p>
                    <p class="card-text"><strong>{{$ad->price}}€</strong></p>
                </div>
            </div>
 
