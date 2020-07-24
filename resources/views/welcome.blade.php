@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="sortari">Aici o sa vina filtrele</div>
    <div class="produse">
    <div class="row">


    @foreach($carte as $row)

        <div class="col-3 product-grid"  >
        <div class="image">
            <a href="#">
                <img src="{{$row['image']}}"  height="300px"  class="w-100 image">
            </a>
            <div class="overlay">
                <div class="detalii"> Detalii despre carte </div>
            </div>
        </div>
        <h4 class="text-center">{{$row['title']}} </h4>
        <h5 class="text-center">{{$row->autorul->persoana['nume']}} {{$row->autorul->persoana['prenume']}}</h5>
        <h6 class="text-center">Pret: {{$row['base_price']}} lei</h6>
        <a href="{{ route('login') }}" class="btn" id="buy" >Cumpara</a>
        </div>

        @endforeach
        <div style="clear:both; width:100%;"></div>
        <div  style="clear:both"><ul class="pagination"><li class="page-item">{{$carte->links()}}</li></ul></div>
        </div>
    </div>
    </div>


@endsection