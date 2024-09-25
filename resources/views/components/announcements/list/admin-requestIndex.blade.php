      
<h3 class="m-3">Richieste revisori</h3>

<table class="table m-3">
    <thead>
      <tr>
        <th scope="col">Utente</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
            <tr>
            <td>{{$request->user_id}}</td>
            <td>
                <button wire:click="requestShow({{$request}})">Mostra</button>
            </td>
            </tr>  
        @endforeach
    </tbody>
  </table>