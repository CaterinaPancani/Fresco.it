<form action="{{route('lingua',$lang)}}" method="POST">
    @csrf
    <button type="submit">
        @if ($lang == 'it')
            <span class="fi fi-it"></span>
        @elseif($lang == 'en')
            <span class="fi fi-gb"></span>
        @elseif($lang == 'es')
            <span class="fi fi-es"></span>
        
        @endif

    </button>
</form>
 