<h2>
    Modifica annuncio
</h2>
<form wire:submit.prevent="update">
    <input value="title" wire:model.live="title" placeholder="titolo" type="text">
    <br>
    <input value="description" wire:model.live="description" placeholder="descrizione" type="text">
    <br>
        <select value="category" wire:model.live="category" placeholder="categoria">
            <option>Seleziona una categoria</option>
            @foreach (App\Models\Categories::all() as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
    <br>
    <input value="price" wire:model.live="price" placeholder="prezzo" type="numeric">
    <button>Aggiorna e conferma</button>
</form>
