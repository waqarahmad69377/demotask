<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css')
</head>
<body>
    
    <div id="app">
        @yield("content")
    </div>

    <script src="{{asset('assets/js/main.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    @yield('scripts')
</body>
</html>