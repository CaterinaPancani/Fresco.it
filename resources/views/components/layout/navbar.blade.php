<nav class="fixed-top">
    <ul id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="mt-2 mb-5" style="border-bottom: 5px solid #e3fef7;">
            <li>
                <div>
                    @auth
                    <a href="{{route('profilo')}}">{{ auth()->user()->name }}!</a>
                    {{-- <a href="">{{ __('ui.IltuoCarrello') }}</a> --}}
                    @else
                    <a href="{{ route('login') }}">{{ __('ui.CiaoAccedi') }}</a>
                    @endauth
                </div>
            </li>
        </div>
        <li>
            <a href="{{ route('ads.index') }}">{{ __('ui.Annunci') }}</a>
        </li>
        <li class="nav-item">
            <a class="hoverElement dropdown-toggle color-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('ui.Categorie') }}
            </a>
            <ul class="dropdown-menu">
                @foreach (App\Models\Categories::all() as $category)
                <li class="nav-item"><a class="nav-link color-accent" href="{{ route('adsByCategory',$category->id) }}">{{ __('ui.' . $category->name) }}</a></li>
                @endforeach
            </ul>
        </li>
        @auth
        @if(Auth::user()->role===1)
        <li class="nav-item dropdown">
            <a class="hoverElement dropdown-toggle color-secondary" href="#" id="navCategorie" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __('ui.Contattaci') }}
            </a>
            <ul class="dropdown-menu " aria-labelledby="navCategorie">
                <li class="nav-item"><a class="nav-link color-accent" href="{{ route('lavora-con-noi') }}">{{ __('ui.LavoraConNoi') }}</a></li>
                <li class="nav-item"><a class="nav-link color-accent" href="{{ route('beChecker',Auth::user()) }}">{{ __('ui.DiventaRevisore') }}</a></li>
            </ul>
        </li>
        @endif
        @endauth
    </ul>

    <div class="background-primary color-accent" id="main" style="height: 90px; display: flex; align-items: center; justify-content: space-between; padding: 0 10px;">
        <div style="display: flex; align-items: center; width:155px">
            <span class="hoverElement color-detail" style="font-size: 30px; cursor: pointer; margin-right: 0px;" onclick="openNav()">&#9776;</span>
            <a class="imagestyle" href="{{ route('home') }}">
                <img width="150" id="logoimgfilter" src="{{ asset('images/2.svg') }}" alt="img">
            </a>
        </div>
        <div>
            <form action="{{ route('ads.index') }}" method="GET" style="display: flex;">
                <input id="search-input" name="searched" class="form-control col mt-2" type="search" placeholder="{{ __('ui.barSearch') }}" aria-label="Search" style="flex-grow: 1; height: 38px; padding: 0 10px;">
            </form>
        </div>
        <div style="margin: 25px;">
            <div class="dropdowns-container">
                <div class="dropdown language-dropdown m-3">
                    <a class="btn dropdown-toggle color-detail" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span id="selected-flag" class="background-primary color-detail hoverElement">
                            <span class="{{ __('ui.lingua') }}"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu background-accent" style="text-align: center;">
                        <li>
                            <form action="{{ route('lingua', 'es') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <span class="fi fi-es"></span>
                                </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('lingua', 'en') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <span class="fi fi-gb"></span>
                                </button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('lingua', 'it') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <span class="fi fi-it"></span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="user-menu m-3">
                    <a id="user-menu" class="nav-link color-secondary" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user" style="color: #77b0aa;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end background-accent">
                        @guest
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.LoginHere') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.Register') }}</a>
                        </li>
                        @endguest
                        @auth
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">{{ __('ui.useLogout') }}</a>
                            <form action="/logout" method="POST" id="form-logout">
                                @csrf
                            </form>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('ui.Dashboard') }}</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    var accentColor = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim();
    var detailColor = getComputedStyle(document.documentElement).getPropertyValue('--detail').trim();

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.form-control');
        const searchButton = document.querySelector('button[type="submit"]');

        searchButton.addEventListener('click', function(event) {

            if (searchInput.style.display === 'block') {
                return true;
            }

            event.preventDefault();
            searchInput.style.display = 'block';
            searchInput.focus();
        });
    });

    function toggleSearchInput() {
        var form = document.querySelector('form');
        var searchInput = document.getElementById('search-input');
        if (searchInput.style.display === 'block') {
            searchInput.style.display = 'none';
            form.classList.remove('form-ricerca-attivo');
        } else {
            searchInput.style.display = 'block';
            form.classList.add('form-ricerca-attivo');
        }
    }
</script>
