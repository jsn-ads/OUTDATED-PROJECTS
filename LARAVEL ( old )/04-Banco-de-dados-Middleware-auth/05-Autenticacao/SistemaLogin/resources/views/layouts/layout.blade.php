<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - CRUDLARAVEL</title>
    <link rel="stylesheet" href="{{ url('resources/css/style.css')}}">
</head>
<body>
    <header>
        <h1>
            @yield('header')
            @isset($name)
                {{$name}}
            @endisset
        </h1>
    </header>
    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        @yield('footer')CRUDLaravel 1.0
    </footer>
</body>
</html>