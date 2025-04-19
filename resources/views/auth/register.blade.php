@extends('layout.auth')


@section("content")

@if(!Auth::check())

<section class="section main-section">
    <div class="card">
        <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            Register
        </p>
        </header>
        <div class="card-content">
        <form method="POST" action="{{route('store.user')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="field spaced relative">
                <label class="label" for="firstName">First Name</label>
                <div class="control icons-left">
                    <input class="input" type="text" name="first_name" value="{{old('first_name')}}" id="firstName" placeholder="John" autocomplete="firstname" autofocus>
                    <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
                <p class="help">
                    Please enter your first name
                </p>
                <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('first_name') }}</span>
            </div>

            <div class="field spaced relative">
                <label class="label" for="lastName">Last Name</label>
                <div class="control icons-left">
                    <input class="input" type="text" name="last_name" value="{{old("last_name")}}" id="lastName" placeholder="Doe" autocomplete="lastname">
                    <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
                <p class="help">
                    Please enter your last name
                </p>
                <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('last_name') }}</span>
            </div>

            <div class="field spaced relative">
                <label class="label" for="email">E-mail</label>
                <div class="control icons-left">
                    <input class="input" type="email" name="email" value="{{old("email")}}" id="email" placeholder="user@example.com" autocomplete="lastname">
                    <span class="icon is-small left"><i class="mdi mdi-email"></i></span>
                </div>
                <p class="help">
                    Please enter your email address
                </p>
                <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('email') }}</span>
            </div>

            <div class="field spaced relative">
                <label class="label" for="password">Password</label>
                <p class="control icons-left">
                    <input class="input" type="password" name="password" id="password" placeholder="Password" autocomplete="current-password">
                    <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
                <p class="help">
                    Please enter your password
                </p>
                <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('password') }}</span>
            </div>

            <div class="field spaced relative">
                <label class="label" for="confPassword">Confrim Password</label>
                <p class="control icons-left">
                    <input class="input" type="password" name="password_confirmation" id="confPassword" placeholder="Confirm Password" autocomplete="current-password">
                    <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
                <p class="help">
                    Please enter your Confrim Password
                </p>
                <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('password') }}</span>
            </div>

            {{-- <div class="field spaced">
                <div class="control">
                    <label class="checkbox"><input type="checkbox" name="remember" value="1" checked>
                    <span class="check"></span>
                    <span class="control-label">Remember</span>
                    </label>
                </div>
            </div> --}}

            <hr>

            <div class="field grouped">
            <div class="control">
                <button type="submit" class="button blue">
                    Register
                </button>
            </div>
            <div class="control">
                <a href="{{route('login')}}" class="button">
                Back
                </a>
            </div>
            </div>

        </form>
        </div>
    </div>
</section>

@else

<section class="section main-section">
    <div class="card">
        <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            Register
        </p>
        </header>
        <div class="card-content">
            <h1>You are already logged in</h1>
            <p>Click <a href="{{route('dashboard')}}" class="text-blue-500 font-semibold">here</a> to go to your dashboard.</p>

        </div>
    </div>
</section>

@endif

@endsection