<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo}}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="icon" href="{{ asset('img/usuario.png') }}" type="x-icon">
</head>
<body>
    @include('sweetalert::alert')
    @yield('contenido')
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>