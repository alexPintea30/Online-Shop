<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="kewords"  content="book, books, store, online">
    <meta name="description" content="Online bookstore">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

<body>
<div class = "text-center">
    <h3>Admin panel</h3>
</div>


<nav id="navbar" class="navbar navbar-expand-md navbar-light bg-light static-top " style="border-spacing:0px">
    <div class="container-fluid">
        <button  type="button " class="navbar-toggler " data-toggle="collapse" data-target="#navbarMenu"  >
            <span class="navbar-toggler-icon ml-auto"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarMenu" >

            <ul class="navbar-nav ml-auto">

                @auth

                    @if(Auth::user()->isAdmin==1)
                        <div class="col-md-2 col-md-offset-1">
                            <li class="nav-item"><a class="nav-link" href="/">Pagina principala</a></li>
                        </div>
                            <li class="nav-item"><a class="nav-link" href="{{ route('addV') }}">Adauga versiune</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('updateV') }}">Modifica versiune</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('addM') }}">Adauga multiplier</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('updateM') }}">Modifica multiplier</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('addVM') }}">Adauga reducere</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('updateVM') }}">Modifica reducere</a></li>
                            <li class="nav-item"><a class="nav-link" href="/reports">Rapoarte</a></li>

                    @endif

                <div class="col-md-3 col-md-offset-1">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user-circle-o" style="font-size:25px"></i>Contul meu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </div>

                @endauth
            </ul>
        </div>
    </div>
</nav>

<section class="continut">
    @yield('content');
</section>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/manifest.js') }}"></script>


</body>
</html>
