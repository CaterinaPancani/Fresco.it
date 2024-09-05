<x-layout.layout>

            <div class="form-login-card">
                <br>
                <br>
                <div class="card text-center pt-3 color-accent background- form-login-card">
                    <h1>
                        Vuoi lavorare con noi?
                    </h1>
                    <br>
                    <p>
                        Riempi il form, ti risponderemo il prima possibile
                    </p>
                    
                </div>
<br>
<br>
                <form action="{{route('candidati')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-3">
                        <label class="form-label"><strong>Allega un curriculum (facoltativo)</strong></label>
                        <input name="cv" class="form-control" type="file" id="formFile">
                        @error('cv')
                        <span class="color-accent">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="m-3">
                        <label class="form-label"><strong>Parlaci di te, perché vuoi entrare a far parte del team Fresco.it?</strong></label>
                        <input name="presentazione" class="form-control" type="text">
                        @error('presentazione')
                        <span class="color-accent">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="m-3">
                        <label class="form-label"><strong>Quale ruolo ti piacerebbe ricoprire nel team Fresco.it?</strong></label>
                        <input name="lavoroPreferito" class="form-control" type="text">
                        @error('lavoroPreferito')
                        <span class="color-accent">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Submit</button>
                  </form>
            </div>

            @if($user->role===1)

                <div class="card text-center pt-3 color-accent background-secondary form-login-card">
                    <div>
                        <a href="{{route('beChecker',$user)}}" class="btn background-detail color-primary">RICHIEDI DI DIVENTARE REVISORE</a>
                    </div>
                </div>
            @endif
</x-layout.layout>
