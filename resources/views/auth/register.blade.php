<x-layout.secondary>
    <div class="login-box">
        <h3>{{__('ui.Register')}}</h3>
        <div class="register-box">
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
              
                            @error('name')
                                <span style="color:#ff0000">{{ $message }}</span>
                            @enderror
                            <input type="text" name="name" placeholder=" {{__('ui.Name')}}" class="form-control @error('name')  is-invalid @enderror" value="{{ old('name') }}" >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" name="sur_name" placeholder="{{__('ui.Surname')}}" class="form-control" value="{{ old('sur_name') }}">
                            @error('sur_name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" name="user_name" placeholder="{{__('ui.Username')}}" class="form-control" value="{{ old('user_name') }}">
                            @error('user_name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" name="phone_number" placeholder="{{__('ui.PhoneNumber')}}" class="form-control" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="date" name="birth" class="form-control" value="{{ old('birth') }}">
                            @error('birth')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="text" name="address" placeholder="{{__('ui.Address')}}" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="email" name="email" placeholder="{{__('ui.EmailAddress')}}" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="number" name="cap" placeholder="{{__('ui.CAP')}}" class="form-control" value="{{ old('cap') }}">
                            @error('cap')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="user-box">
                            <input type="password" name="password" placeholder="{{__('ui.Password')}}" class="form-control">
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="user-box">
                            <input type="password" name="password_confirmation" placeholder="{{__('ui.PasswordConfirm')}}" class="form-control">
                        </div>
                    </div>
                </div>
                <button class="bottoneblu" type="submit">{{__('ui.RegistrateButton')}}</button>
                <div class="  mt-3 text-center">
                    <a href="/" class=" text-decoration-none color-accent"> Torna alla pagina home</a>
                        </div>
            </form>
        </div>
    </div>
</x-layout.secondary>
