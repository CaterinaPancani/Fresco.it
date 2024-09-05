<div class="card mb-3" style="width: 100%;height: 100%;">
    @if(!$ad->images->isEmpty())
        <a href="{{ route('adDetail', $ad->id) }}">
            <img class="card-img-top" src="{{ $ad->images->first()->getUrl(300,300)  }}" alt="cover">
        </a>
    @else
        <a href="{{ route('adDetail', $ad->id) }}">
            <img class="card-img-top" src="{{ asset('images/logo.png') }}" alt="cover">
        </a>
    @endif
    <div class="card-body">
      <h5 class="card-title">{{$ad->title}}</h5>
      <p class="card-text">{{$ad->price}}</p>
      <a href="{{ route('adDetail', $ad->id) }}" class="btn btn-primary">Dettagli</a>
    </div>
  </div>
