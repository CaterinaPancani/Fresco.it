<div class="m-3">Revisiona annunci
    
      <button class="btn btn-danger m-3" wire:click="undo">Annulla azione</button>
        <table class=" table table-hover" style="margin: 0 auto; width: 90%; ">
            <thead>
              <tr>
                <th scope="" >Utente</th>
                <th scope="">Categoria</th>
                <th scope="">Titolo</th>
                <th scope="">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ad)
                <tr>
                    <td style="background-color: rgb(227, 254, 247);">{{$ad->user_id}}</td>
                    <td style="background-color: rgb(227, 254, 247);">{{$ad->category_id}}</td>
                    <td style="background-color: rgb(227, 254, 247);">{{$ad->title}}</td>
                    <td class="container" style="background-color: rgb(227, 254, 247);">

      <div class="row justify-content-center">
        <button class="btn btn-info" style="width: 100px;" wire:click="show({{$ad}})"><i class="fas fa-search"></i></button>
            <div style="width: 10px;"></div>
    </div>
                    
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>

   
</div>
