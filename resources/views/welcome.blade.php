@extends('layouts.search')

@section('content')
    <div class="container">
    <div class="sortari">Aici o sa vina filtrele</div>
    <div class="produse">
    <div class="row" >


    @foreach($carte as $row)

        <div id="produs" class="col-md-3 product-grid"  >
        <div class="image" style="height: 60%">
            <a href="#">
                <img src="{{$row['image']}}"  height="100%"  class="w-100 image" id="imagebook">
            </a>
            <div class="overlay">
                <div class="detalii"> Detalii despre carte </div>
            </div>
        </div>
            <div id="bookinfo" style="overflow: hidden">

        <h5  class="text-center">{{$row['title']}} </h5>
        <h5  class="text-center">{{$row->autorul->persoana['nume']}} {{$row->autorul->persoana['prenume']}}</h5>
        <h6  class="text-center">Pret: {{$row['base_price']}} lei</h6>
            </div>

            <div >
            <a href="{{ route('login') }}" class="btn text-center" id="buy" >Cumpara</a>
        </div>
        </div>
        @endforeach
        <div style="clear:both; width:100%;"></div>
        <div style="margin-top:25px; margin-left: auto;margin-right: auto">  {{$carte->links('vendor/pagination/bootstrap-4')}}
            </div>
    </div>
    </div>
    </div>



@endsection
