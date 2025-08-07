<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('assets/https://fonts.googleapis.com/css?family=Open+Sans:300,400')}}" rel="stylesheet" />  <!-- https://fonts.google.com/ -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}"       rel="stylesheet" />                         <!-- https://getbootstrap.com/ -->
    <link href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet" />                   <!-- https://fontawesome.com/ -->
    <link href="{{asset('assets/css/templatemo-diagoona.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/layout.css')}}" rel="stylesheet" />
    <style type="text/css">
        body{
            background-color: {{$config['bgcolor']}}
        }

        body{
            color:{{$config['textcolor']}};
        }
    </style>
<!--

TemplateMo 550 Diagoona

https://templatemo.com/tm-550-diagoona

-->
</head>
<body>
    <div class="tm-container">
        <div>
            <div class="tm-row pt-4">
                <div class="tm-col-left">
                    <div class="tm-site-header media">
                        <i class="fas fa-laptop fa-3x mt-1 tm-logo"></i>
                        <div class="media-body">
                            <h1 class="tm-sitename text-uppercase">@yield('Cabeçalho')</h1>
                            <p class="tm-slogon">@yield('subcabeçalho')</p>
                        </div>
                    </div>
                </div>
                <div class="tm-col-right">
                    <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                        <button class="navbar-toggler toggler-example mr-0 ml-auto" type="button"
                            data-toggle="collapse" data-target="#navbar-nav"
                            aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                            <ul class="navbar-nav text-uppercase">
                                <li class="nav-item active">
                                    <a class="nav-link tm-nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                                </li>

                                @foreach ($front_menu as $menuslug => $menutitle)
                                    <li class="nav-item">
                                        <a class="nav-link tm-nav-link" href="{{$menuslug}}">{{$menutitle}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="tm-row">
                <div class="tm-col-left"></div>
                <main class="tm-col-right">
                    <section class="tm-content">
                        <h2 class="mb-5 tm-content-title">
                            @yield('contentTitle')
                        </h2>
                        <p class="mb-5">
                            <h2>@yield('contentA')</h2>
                        </p>

                        <hr class="mb-5">

                        <p class="mb-5">
                            @yield('ContentB')
                        </p>

                        <!--<a href="#" class="btn btn-primary">Continue...</a-->
                    </section>
                </main>
            </div>
        </div>

        <div class="tm-row">
          <div class="tm-col-left text-center">
                 <!-- <ul class="tm-bg-controls-wrapper">
                    <li class="tm-bg-control active" data-id="0"></li>
                    <li class="tm-bg-control" data-id="1"></li>
                    <li class="tm-bg-control" data-id="2"></li>
                </ul> -->
            </div>
            <div class="tm-col-right tm-col-footer">
                <footer class="tm-site-footer text-right">
                    <p class="mb-0">{{$config['email']}}

                    | Administrativo: <a rel="nofollow" target="_parent" href="{{route('painel')}}" class="tm-text-link">Painel</a></p>
                </footer>
            </div>
        </div>

        <!-- Diagonal background design -->
        <div class="tm-bg">
            <div class="tm-bg-left"></div>
            <div class="tm-bg-right"></div>
        </div>
    </div>


<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('assets/js/templatemo-script.js')}}"></script>

</body>
</html>
