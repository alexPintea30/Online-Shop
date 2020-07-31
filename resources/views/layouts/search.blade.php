<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>OnlineBookstore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="kewords"  content="book, books, store, online">
    <meta name="description" content="Online bookstore">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css" type="text/css">


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>

    <nav id="navbar" class="navbar navbar-expand-md navbar-dark bg-dark static-top " >
        <div class="container-fluid">
            <div class="navbar-header">
                @if(Auth::check())
                    <a href="/home" class="navbar-brand"><img height="90px" src="/images/comrawpixel534885.png" alt="nu se poate incarca imaginea" style="padding-left: 30px"></a>
                @else
                    <a href="/" class="navbar-brand"><img height="90px" src="/images/comrawpixel534885.png" alt="nu se poate incarca" style="padding-left: 30px"></a>
                @endif
            </div>

            <button  type="button " class="navbar-toggler " data-toggle="collapse" data-target="#navbarMenu"  >
                <span class="navbar-toggler-icon ml-auto"></span>
            </button>



            <div class="collapse navbar-collapse" id="navbarMenu" >
                <div class="navbar-nav ml-auto search-box"  style="margin:20px;">
                    <form class="form-inline" action="" method="">
                    <input class="form-control mr-sm-2" type="text" name="" placeholder="Cautati dupa titlu/autor">
                    <button class="btn btn-dark my-sm-0" type="submit"><i class="fa fa-search" style="font-size:24px"></i></button>
                    </form>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#footersc">Contact</a></li>
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user-circle-o" style="font-size:25px"></i>Login</a></li>
                    @endguest
                    @auth

                        @if(Auth::user()->isAdmin==1)
                            <li class="nav-item"><a class="nav-link" href="/reports">Rapoarte</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Clienti</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Adauga carte</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o" style="font-size:25px"></i>Contul meu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>



<section class="continut">
    @yield('content')
</section>



<footer id="footersc" class="py-3 bg-dark ">
    <p><i class="fa fa-briefcase" style="font-size:24px;margin:5px;"></i> Adresa: Str. Bucuresti, nr. 5, Cluj-Napoca</p>
    <p><i class="fa fa-phone-square" style="font-size:24px;margin:5px;"></i> Telefon: 0746342020</p>
    <p><i class="fa fa-envelope" style="font-size:24px;margin:5px;"></i> Email: bookstoreonline@yahoo.com</p>
</footer>
</body>
</html>
