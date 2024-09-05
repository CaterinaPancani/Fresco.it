<div>
    @if(session('accepted'))
    <div class="alert alert-success">
        {{__('ui.acceptedAdvice')}}
      </div>
    @endif
    @if(session('refused'))
      <div class="alert alert-warning">
        {{('ui.refusedAdvice')}}
      </div>
    @endif
    @if(session('success'))
      <div class="alert alert-success">
          {{session('success')}}
      </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
  @endif
    @if(session('undo'))
      <div class="alert alert-success">
          {{__('ui.UndoAdvice')}}
      </div>
    @endif
    @if(session('warning'))
    <div class="alert alert-warning">
        {{session('warning')}}
    </div>
    @endif
    @if(session('revisore'))
    <div class="alert alert-warning">
        {{session('revisore')}}
    </div>
    @endif
    @if(session('candidato'))
    <div class="alert alert-warning">
        {{session('candidato')}}
    </div>
    @endif
</div>
