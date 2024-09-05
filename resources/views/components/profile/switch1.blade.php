<h3>Dettagli del profilo</h3>
<br>
<br>
    @switch($action)
        @case(1)
            <x-profile.userShow :user="$user"/>
        @break
        @case(2)
        @break
        @default
        <div class="mb-5">
            <div style=" margin: auto; ">
                <img class="mb-5" src="images/Fresco1.svg" alt="cover" style="width:200px;height:200px; ">
            </div>
            
            <p><span class="fw-bold">Nome:</span> {{Auth::user()->name}}</p>
            <p><span class="fw-bold">Cognome:</span> {{Auth::user()->sur_name}}</p>
            <p><span class="fw-bold">Nickname:</span> {{Auth::user()->user_name}}</p>
            <p><span class="fw-bold">Data di nascita:</span> {{Auth::user()->birth}}</p>
            <p><span class="fw-bold">Email:</span> {{Auth::user()->email}}</p>
            <p><span class="fw-bold">Ruolo:</span> {{Auth::user()->role}}</p>
            <p><span class="fw-bold">Telefono:</span> {{Auth::user()->phone_number}}</p>
            <p><span class="fw-bold">Qualcosa di te:</span> {{Auth::user()->description ?? "nessuna descrizione inserita"}}</p>
        </div>
        @break
    @endswitch