<div>
    @if(session('accepted'))
    <div class="alert alert-success">
        {{__('ui.acceptedAdvice')}}
      </div>
    @endif
    @if(session('refused'))
      <div class="alert alert-danger">
        {{__('ui.refusedAdvice')}}
      </div>
    @endif
    @if(session('success'))
      <div class="alert alert-success">
          {{__('ui.SuccessAdvice')}}
      </div>
    @endif
    @if(session('undo'))
      <div class="alert alert-success">
          {{__('ui.UndoAdvice')}}
      </div>
    @endif
    
    <div id="contenitoreEntrambiSwitch" class="row">
      
      <div id="contenitoreSwitch1" class="col-6">
        <x-announcements.switch-1 :choice="$choice"  :ads="$ads" :requests="$requests" :applies="$applies"/>
      </div>
      <div id="contenitoreSwitch2" class="col-6">
        <x-announcements.switch-2 :action="$action" :ad="$announcement" :title="$title" :category="$category" :description="$description" :images="$images" :price="$price" :alpha="$alpha" :user="$user" :apply="$apply"/>
      </div>
    </div>
</div>
