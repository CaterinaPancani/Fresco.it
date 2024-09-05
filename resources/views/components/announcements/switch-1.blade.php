<div class="">
    @switch($choice)
        @case(1)
        <div >
            <div class="container">
            <h1 class="fw-bold text-center color-primary mb-5">Ciao Utente {{ auth()->user()->name }}!</h1>
           <p class="fs-1 fw-semibold text-center mt-5 pt-3">Sei nella sezione "Crea annuncio"</p>
           <p class="fs-5 fw-normal text-center mb-5">Ti ricordiamo che noi di Fresco.it abbiamo un team di esperti che controllerà il tuo annuncio per assicurarsi che sia tutto in norma prima della pubblicazione. </p>
           <p class="fs-1 fw-bold text-center mt-5 pt-5 color-primary">Crea il tuo annuncio qui:</p>
           <div class="text-center">
          <button class="bottoneblu btn btn-outline-dark btn-lg background-primary color-accent" weight="45" wire:click="create">Crea annuncio</button>
           </div>
            </div>
          <br>
        </div>
        @break
        @case(2)

        <div class="m-5">
            <h4>{{__('ui.CiaoRevisore')}} {{ auth()->user()->name }}</h4>
            <h6>{{__('ui.ControllaGliAnnunciDaApprovare')}}</h6>
            <button class="btn btn-outline-success" wire:click="index">{{__('ui.MostraLista')}}</button>
        </div>
            @break
        @case(3)

            <h4>{{__('ui.CiaoAdmin')}} {{ auth()->user()->name }}</h4>
            <h4>Cosa vuoi fare?</h4>
            <button class="btn btn-outline-success" wire:click="requestIndex">Mostra richieste revisore</button>
            <button class="btn btn-outline-success" wire:click="appliesIndex">Mostra candidature</button>
        @break
        @case(4)

            {{-- crea annuncio --}}
            <x-announcements.create-form/>
        @break
        @case(5)

            {{-- revisiona annunci --}}
            <x-announcements.index-table :ads="$ads"/>
        @break
        @case(6)

            <button class="btn btn-outline-success" wire:click="requestIndex">Mostra richieste revisore</button>
            <button class="btn btn-outline-success" wire:click="appliesIndex">Mostra candidature</button>
            <x-announcements.Admin-requestIndex :ads="$ads" :requests="$requests"/>
        @break
        @case(7)

            <button class="btn btn-outline-success" wire:click="requestIndex">Mostra richieste revisore</button>
            <button class="btn btn-outline-success" wire:click="appliesIndex">Mostra candidature</button>

            <x-announcements.Admin-appliesIndex :ads="$ads" :applies="$applies"/>
        @break
        @default
            <div style="margin:5%">
                <h1 class="fw-bold text-center color-primary mb-5">Continua a creare!</h1>
                <h6>
                    <button class="bottoneblu btn btn-outline-dark btn-lg background-primary color-accent" weight="45" wire:click="create">
                        {{__('ui.GoToCreate')}}
                    </button>
                </h6>

                <h1 class="fw-bold text-center color-primary mb-5">Torna alla home!</h1>
                <h6>
                    <button class="bottoneblu btn btn-outline-dark btn-lg background-primary color-accent" weight="45" wire:click="create">
                        <a href="{{route('home')}}">Homepage</a>
                    </button>
                </h6>
            </div>
        @break
    @endswitch
    </div>
