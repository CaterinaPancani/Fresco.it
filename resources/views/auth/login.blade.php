<x-layout.secondary>
    <div class="login-box">
        <h3>{{__('ui.LoginHere')}}</h3>
        <form id="loginForm" method="POST" action="/login">
            @csrf
            <div class="user-box">
                <label class="form-label color-primary"><strong></strong></label>
                <input type="email" name="email" placeholder="{{__('ui.EmailOrPhone')}}" class="form-control" value="{{old('email')}}">
                @error('email')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <div class="user-box">
                <label class="form-label color-primary"><strong></strong></label>
                <input type="password" placeholder="{{__('ui.Password')}}" name="password" class="form-control">
                @error('password')
                    <span>{{$message}}</span>
                @enderror
            </div>
            <button class="bottoneblu">{{__('ui.LoginButton')}}</button>
            {{-- <div class="social mt-4">
                <a href="#" class="go">
                    <i class="fa-brands fa-google"></i>{{__('ui.Google')}}
                </a>
                <a href="#" class="fb">
                    <i class="fa-brands fa-square-facebook"></i>{{__('ui.Facebook')}}
                </a>
            </div> --}}
            <br>
            <a href="/register" class="m-3 text-decoration-none color-accent">{{__('ui.NotRegistered?')}}</a>
            <a href="/forgot-password">{{__('ui.RecoverPassword')}}</a>
            <div class=" mt-5">
            <a href="/" class=" text-decoration-none color-accent"> Torna alla pagina home</a>
                </div>
        </form>
    </div>
</x-layout.secondary>
