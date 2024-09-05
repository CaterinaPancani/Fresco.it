<h4>I tuoi annunci preferiti</h4>
<div class="container background-secondary" style=";height:450px; overflow-y:scroll; overflow-x:hidden;">
    <div class="row">
        @if($ads)
            @foreach ($ads as $ad)
                <div class="col-sm-12 col-md-6 col-lg-4 spaziatura ">
                    {{-- <x-ads-card :ad="$ad"/> --}}
                    <livewire:card :ad="$ad"/>
                </div>
            @endforeach
        @else
            <h3>Non hai nessun annuncio tra i preferiti</h3>
        @endif
    </div>
</div>