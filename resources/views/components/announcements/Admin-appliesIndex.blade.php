 
<h3 class="m-3">Candidature</h3>

<table class="table  m-3">
    <thead>
      <tr>
        <th scope="col">Utente</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($applies as $apply)
            <tr>
            <td>{{$apply->user_id}}</td>
            <td>
                <button wire:click="applyShow({{$apply->id}})">Mostra</button>
            </td>
            </tr>  
        @endforeach
    </tbody>
  </table>