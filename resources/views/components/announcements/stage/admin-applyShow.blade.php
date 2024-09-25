<div class="m-3">
        <h4>{{$user->name}} si presenta così:</h4>
        <h5  class="form-control">{{$apply->presentazione}}</h5>
        <h4>Questo è quello che vorrebbe fare {{$user->name}} all'interno del team:</h4>
        <h5 class="form-control">{{$apply->lavoroPreferito}}</h5>
            @if($apply->cv)
                <div>
                    <h4>Questo è il suo curriculum</h4>
                    {{$apply->cv}}
                </div>
            @endif
</div>