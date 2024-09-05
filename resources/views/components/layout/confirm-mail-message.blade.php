

<div class="div">
    <div class="alert alert-warning" role="alert">
        Si prega di confermare l'indirizzo email presso la propia casella di posta.
    </div>

    <form action="/email/verification-notification" method="POST">
        @csrf
        <button type="submit"> Reinvia la Mail </button>
    </form>
    <h4></h4>
</div>
