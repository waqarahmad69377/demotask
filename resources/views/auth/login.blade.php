@extends('layout.auth')


@section("content")

@if(!Auth::check())
    
<section class="section main-section">
    <div class="card">
        <header class="card-header">
        <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-lock"></i></span>
            Login
        </p>
        </header>
        <div class="card-content">
        <form method="POST" action="{{route('login.attempt')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="field spaced relative">
            <label class="label" for="login">Login</label>
            <div class="control icons-left">
                <input class="input" type="text" name="email" placeholder="user@example.com" autocomplete="username" autofocus>
                <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help">
                Please enter your login
            </p>
            <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('email') }}</span>
            </div>

            <div class="field spaced relative">
            <label class="label" for="password">Password</label>
            <p class="control icons-left">
                <input class="input" type="password" name="password" placeholder="Password" autocomplete="current-password">
                <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help">
                Please enter your password
            </p>
            <span class="text-red-500 text-xs absolute right-0 bottom-0">{{ $errors->first('password') }}</span>
            </div>

            <div class="field spaced">
                <div class="control">
                    <label class="checkbox" for="remember"><input type="checkbox" id="remember" name="remember" value="1" checked>
                    <span class="check"></span>
                    <span class="control-label">Remember</span>
                    </label>
                </div>
            </div>

            <hr>

            <div class="field grouped">
            <div class="control">
                <button type="submit" class="button blue">
                    Login
                </button>
            </div>
            <div class="control">
                <a href="{{route('register')}}" class="button">
                    Create an account
                </a>
            </div>
            </div>
            @if(Session::has('success'))
                <div class="notification is-success text-green-500 text-base">
                    {{ Session::get('success') }}
                </div>
            @endif
        </form>
        </div>
    </div>
</section>

@endif

<section class="section main-section">
    <div class="card">
        <div class="card-content flex flex-row justify-between items-center">
            <a href="{{route('dashboard')}}" class="button blue">
                Back to Dashboard
            </a>
            <a href="{{route("logout")}}" class="border-2 border-blue-500 border-solid">Logout</a>
        </div>
    </div>
</section>


@endsection