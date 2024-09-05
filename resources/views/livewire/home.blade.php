<div>
    <img id="header_img" src="{{asset('images/Progettosenzatitolo(1).png')}}" alt="img">
    <img id="loghetto" src="{{asset('images/2.svg')}}" alt="img" >

    @if(Auth::user() && Auth::user()->role === 1 && Auth::user()->email_verified_at)
        <div id="call_to_action">
            <a href="{{route('dashboard')}}" class="btn background-primary color-accent">{{__('ui.createAd')}}</a>
        </div>
    @endif

    <div class="Homeannunci" style="-webkit-box-shadow: 5px -4px 15px 0px rgba(17,71,58,0.65);
    box-shadow: 5px -4px 15px 0px rgba(17,71,58,0.65);">
        <h3 id="ultimiannunci" class="text-center color-primary">
            {{__('ui.lastAnnucement')}}
        </h3>
    </div>

    <div class="container-fluid mt-5">
        <div class="row text-center">
            @foreach ($ads as $ad)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-5 d-flex justify-content-center">
                    <livewire:card :ad="$ad" :key="$ad->id"/>
                </div>
            @endforeach
        </div>
    </div>

    <div class="HomeDicono" style="-webkit-box-shadow: 5px -4px 15px 0px rgba(17,71,58,0.65);
    box-shadow: 5px -4px 15px 0px rgba(17,71,58,0.65);">
        <h3 id="cosadicono" class="text-center color-primary">
            {{__('ui.aboutUs')}}
        </h3>
    </div>

    <div class="recensione-container">
        <img src="{{asset('images/Recensione1.png')}}" alt="Recensione">
        <img src="{{asset('images/Recensione2.png')}}" alt="Recensione">
        <img src="{{asset('images/Recensione3.png')}}" alt="Recensione">
    </div>
</div>


<script>
  var defaultImage = "{{ asset('images/Progettosenzatitolo(1).png') }}";
  var mobileImage = "{{ asset('images/headerimg3.png') }}";
  var extraSmallImage = "{{ asset('images/headerimg4.png') }}"; // Aggiungi questa linea

  function updateImageSrc() {
      var imgElement = document.getElementById('header_img');
      if (window.innerWidth < 801) {
          imgElement.src = extraSmallImage; // Imposta questa immagine se la larghezza è inferiore a 801px
      } else if (window.innerWidth < 1201) {
          imgElement.src = mobileImage; // Imposta questa immagine se la larghezza è tra 801px e 1200px
      } else {
          imgElement.src = defaultImage; // Imposta questa immagine se la larghezza è superiore a 1200px
      }
  }

  window.addEventListener('resize', updateImageSrc);
  window.addEventListener('DOMContentLoaded', updateImageSrc);
</script>



