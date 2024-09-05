<form wire:submit.prevent="tellus">
    <div class="mb-3">
        <label class="form-label">Vota!</label>
        @switch($star)
            @case(1)
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                </div>
            @break
            @case(2)
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                </div>
            @break
            @case(3)
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                </div>
            @break
            @case(4)
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                </div>
            @break
            @case(5)
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-solid fa-star fa-xl"></i>
                </button>
                </div>
            @break
            @default
                <div class="rating">
                <button wire:click="setRating(1)" type="button" class="rating-btn" aria-label="One star">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(2)" type="button" class="rating-btn" aria-label="Two stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(3)" type="button" class="rating-btn" aria-label="Three stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(4)" type="button" class="rating-btn" aria-label="Four stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                <button wire:click="setRating(5)" type="button" class="rating-btn" aria-label="Five stars">
                    <i class="fa-regular fa-star fa-xl"></i>
                </button>
                </div>
            @break
        @endswitch
    </div>
    <div class="mb-3">
        <label class="form-label">Aggiungi un titolo</label>
        <input type="text" placeholder="Cosa pensi del nostro sito?" wire:model="title" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Aggiungi una recensione scritta</label><br>
        <textarea type="text" placeholder="Scrivici cosa ti è piaciuto e cosa no, tutte le opinioni ci aiutano a migliorare!" wire:model="content" class="form-control" cols="76" rows="3"></textarea>
    </div>

    <button type="submit" class="bottoneblu btn">Invia</button>
</form>
