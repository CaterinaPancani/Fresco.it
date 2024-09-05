<table class="table m-3" style="overflow-y:scroll;">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Ruolo</th>
        <th scope="col">Data iscrizione</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                {{App\Models\Roles::find($user->role)->name}}
            </td>
            <td>{{$user->created_at}}</td>
            <td>
                <button wire:click="userShow({{$user->id}})">Mostra</button>
            </td>
            </tr>  
        @endforeach
    </tbody>
  </table>