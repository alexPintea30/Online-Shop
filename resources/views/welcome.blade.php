@extends('layouts.search')

@section('content')
    <div class="container">
    <div class="sortari">
        <form action="/Filter">
        Sortati dupa:<select name="select" onChange="window.location.href=this.value">
            <option value="/">Alege o optiune</option>
            <option  value="/?titlu=crescator" <?php echo (isset($_GET['titlu']) && $_GET['titlu'] == 'crescator') ? ' selected="selected"' : '' ; ?>>Titlu crescator</option>
            <option  value="/?titlu=descrescator"<?php echo (isset($_GET['titlu']) && $_GET['titlu'] == 'descrescator') ? ' selected="selected"' : '' ; ?>>Titlu descrescator</option>
            <option  value="/?autor=crescator" <?php echo (isset($_GET['autor']) && $_GET['autor'] == 'crescator') ? ' selected="selected"' : '' ; ?>>Autor crescator</option>
            <option  value="/?autor=descrescator" <?php echo (isset($_GET['autor']) && $_GET['autor'] == 'descrescator') ? ' selected="selected"' : '' ; ?>>Autor descrescator</option>
        </select>

            Interval pret:
            <label for="minvalue">Min</label><input type="text" name="minvalue">
            <label for="maxvalue">Max</label><input type="text" name="maxvalue">
            <button type="submit">Filtreaza</button>
        </form>


    </div>
    <div class="produse">
    <div class="row" >



        @php($controller = new \App\Http\Controllers\PriceController())
    @foreach($carte as $row)



        <div id="produs" class="col-md-3 col-sm-4 col-6 product-grid"  >
            <a href="/book/{{$row['id']}}">
            <div class="image" >

                <img src="{{$row['image']}}"  height="100%"  class="w-100 " id="imagebook">

            <div class="overlay">
                <div class="detalii"> Detalii despre carte </div>
            </div>
        </div>
            </a>
            <div id="bookinfo">

        <h5  class="text-center">{{$row['title']}} </h5>
        <h5  class="text-center">{{$row->autorul->persoana['prenume']}} {{$row->autorul->persoana['nume']}} </h5>
        <h6  class="text-center">Pret: {{$row['base_price']}} lei</h6>
        <h5  class="text-center">{{$row->autorul->persoana['nume']}} {{$row->autorul->persoana['prenume']}}</h5>
                @auth
                    <h5 class = "text-center">Pret ?:
                        {{
                             round($controller->getFinalPrice(
                                 $row['base_price'],
                                 $region[0]["name"],
                                 Carbon\Carbon::now()->diffInYears($person[0]['data_nasterii']),
                                 ($row->categorie['name'] == "straina") ? "OTHER" : "RO"
                             ),2)

                             }}
                  </h5>
                @endauth
                    <h6  class="text-center">Pret: {{$row['base_price']}} lei</h6>

            </div>

            <div>
            <a href="/book/{{$row['id']}}" class="btn text-center" id="buy" >Cumpara</a>
        </div>
        </div>

        @endforeach
    </div>
        <div style="clear:both; width:100%;"></div>
        <div   style="margin-top: 50px;" > {{$carte->appends(request()->input())->links('vendor/pagination/bootstrap-4')}}
        </div>




    </div>
    </div>
    </div>



@endsection
