@extends('layouts.search')

@section('content')
    <div class="container">
    <div class="sortari">
        <div style="background-color: rgba(224, 219, 219, 0.8); padding:10px;margin:10px; ">
        <form action="/Filter">
            <p style="display:inline-block;font-family: Tahoma, Geneva, sans-serif;color: #555555;margin-left: 5vw;margin-right:0.6vw;">  Sortati dupa: </p><select class="form-control" name="select" onChange="window.location.href=this.value" style="width:12vw;display:inline-block;">
            <option value="/">Alege o optiune</option>
            <option  value="/?titlu=crescator" <?php echo (isset($_GET['titlu']) && $_GET['titlu'] == 'crescator') ? ' selected="selected"' : '' ; ?>>Titlu crescator</option>
            <option  value="/?titlu=descrescator"<?php echo (isset($_GET['titlu']) && $_GET['titlu'] == 'descrescator') ? ' selected="selected"' : '' ; ?>>Titlu descrescator</option>
            <option  value="/?autor=crescator" <?php echo (isset($_GET['autor']) && $_GET['autor'] == 'crescator') ? ' selected="selected"' : '' ; ?>>Autor crescator</option>
            <option  value="/?autor=descrescator" <?php echo (isset($_GET['autor']) && $_GET['autor'] == 'descrescator') ? ' selected="selected"' : '' ; ?>>Autor descrescator</option>
        </select>

            <p style="display:inline-block;font-family: Tahoma, Geneva, sans-serif;color: #555555;margin-left: 5vw;">  Interval pret:  </p>
            <label style="display:inline-block;font-family: Tahoma, Geneva, sans-serif;color: #555555;margin-left: 0.6vw;margin-right: 0.5vw;" for="minvalue"> min </label><input class="form-control"  type="text" name="minvalue" style="width:5vw;display:inline-block;">
            <label style="display:inline-block;font-family: Tahoma, Geneva, sans-serif;color: #555555;margin-right: 0.5vw;" for="maxvalue"> -max </label><input class="form-control" type="text" name="maxvalue" style="width:5vw;display:inline-block;">
            <button type="submit" class="btn btn-dark" style="margin-left: 1vw;">Filtreaza</button>
        </form>
        </div>

    </div>
    <div class="produse">
    <div class="row" >




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
