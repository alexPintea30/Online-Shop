@extends('layouts.app')

@section('content')
    @php($controller = new \App\Http\Controllers\PriceController())
    <div class="container" style="background-color: rgba(224, 219, 219, 0.4);padding-top: 10px;">
       @guest <div class="alert alert-success text-center" style="width:90%;margin:auto;">Creaza-ti un cont, sau daca ai deja unul, logheaza-te pentru a beneficia de reduceri de pana la 60% la produsele noastre!</div> @endguest
        <div class="row">
        <div class="col-md-5" >
            <img src="/{{$book->image}}" class="w-75 zoom" style="margin:20px 0px 20px 40px;">
        </div>
        <div class="col-md-7" >
            <div style="margin: 20px 20px 10px 0px;">
            <h2>{{$book->title}}</h2>
            <hr>
            <h3>{{$book->autorul->persoana->prenume}} {{$book->autorul->persoana->nume}}</h3>
                <br>
            @guest<h4>Pret: {{$book->base_price}} lei</h4>@endguest
             @auth<h4 style="display:inline;">Pret: {{
                             round($controller->getFinalPrice(
                                 $book->base_price,
                                 $region[0]["name"],
                                 Carbon\Carbon::now()->diffInYears($person[0]['data_nasterii']),
                                 ($book->categorie['name'] == "straina") ? "OTHER" : "RO"
                             ),2)

                             }} lei </h4> <h4 style="text-decoration: line-through;margin-left: 5px;display:inline;color: #636b6f;">{{$book->base_price}} lei</h4>@endauth
            <br>
            <br>

            <p style="font-size:23px">Descriere:</p>
            <div style="overflow: auto; height:130px;font-size: 18px;font-weight:300;">{{$book->descriere}}</div>
            <br>
            <br>
            <br>
             @if($book->stoc>0)
                 @if(Auth::check())
                        @if(!empty($stocEpuizatMsg))
                            <div class="alert alert-danger"> {{ $stocEpuizatMsg }}</div>
                        @endif
            <form action="{{url('/submit')}}" >
                <label for="cantitate" style="font-size:20px"> Cantitate: </label>
                <input type="number" name="cantitate" min="1" class="form-control" style="display:inline-block; width:75px; height:35px">
                <input type="hidden" name="user" value="{{Auth::id()}}">
                <input type="hidden" name="book" value="{{$book->id}}">
                <input type="hidden" name="price" value="{{
                             round($controller->getFinalPrice(
                                 $book->base_price,
                                 $region[0]["name"],
                                 Carbon\Carbon::now()->diffInYears($person[0]['data_nasterii']),
                                 ($book->categorie['name'] == "straina") ? "OTHER" : "RO"
                             ),2)

                             }}">
                <button type="submit" class="btn btn-dark" style="display:inline-block" >Cumpara</button>
            </form>
                    @else
                        <form>
                            <label for="cantitate" style="font-size:20px"> Cantitate: </label>
                            <input type="number" name="cantitate" min="1" class="form-control" style="display:inline-block; width:75px; height:35px">
                            <input type="hidden" name="user" value="{{Auth::id()}}">
                            <a href="/login" class="btn btn-dark" style="display:inline-block" >Cumpara</a>
                        </form>
                     @endif
                @else
                <p class="alert alert-danger">Stoc epuizat!</p>
             @endif

            </div>
        </div>
        </div>
    </div>
@endsection
