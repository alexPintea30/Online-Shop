@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: rgba(224, 219, 219, 0.4);">
        <div class="row">
        <div class="col-md-5" >
            <img src="/{{$book->image}}" class="w-75 zoom" style="margin:20px 0px 20px 40px;">
        </div>
        <div class="col-md-7" >
            <div style="margin: 20px 20px 10px 0px;">
            <h2>{{$book->title}}</h2>
            <hr>
            <h3>{{$book->autorul->persoana->prenume}} {{$book->autorul->persoana->nume}}</h3>
            <h4>Pret: {{$book->base_price}} lei</h4>
            <br>

            <p style="font-size:23px">Descriere:</p>
            <div style="overflow: auto; height:130px;font-size: 18px;font-weight:300;">{{$book->descriere}}</div>
            <br>
            <br>
            <br>
             @if($book->stoc>0)
                 @if(Auth::check())
            <form action="SaleController@store" >
                <label for="cantitate" style="font-size:20px"> Cantitate: </label>
                <input type="number" name="cantitate" min="1" class="form-control" style="display:inline-block; width:75px; height:35px">
                <input type="hidden" name="user" value="{{Auth::id()}}">
                <input type="hidden" name="book" value="{{$book->id}}">
                <input type="hidden" name="price" value="{{$book->base_price}}">
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
