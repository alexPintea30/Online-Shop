@extends('layouts.app')

@section('content')
<div class="continut">

<form action="Report1.php" method="POST" >
    <p id="titlu_rapoarte">Alegeti judetul si perioada pentru care doriti rapoartele<br>
        <br>
        <br>
        <select name="judetul_ales" class="lista_rapoarte">
            <option value="Alba">Alba</option>
            <option value="Arad">Arad</option>
            <option value="Arges">Arges</option>
            <option value="Bacau">Bacau</option>
            <option value="Bihor">Bihor</option>
            <option value="Bistrita-Nasaud">Bistrita-Nasaud</option>
            <option value="Botosani">Botosani</option>
            <option value="Brasov">Brasov</option>
            <option value="Braila">Braila</option>
            <option value="Bucuresti"> Bucuresti</option>
            <option value="Buzau">Buzau</option>
            <option value="Caras-Severin">Caras-Severin</option>
            <option value="Calarasi">Calarasi</option>
            <option value="Cluj">Cluj</option>
            <option value="Constanta">Constanta</option>
            <option value="Covasna">Covasna </option>
            <option value="Dambovita">Dambovita</option>
            <option value="Dolj">Dolj</option>
            <option value="Galati">Galati</option>
            <option value="Giurgiu">Giurgiu</option>
            <option value="Gorj">Gorj</option>
            <option value="Hunedoara">Hunedoara </option>
            <option value="Harghita">Harghita</option>
            <option value="Ialomita">Ialomita</option>
            <option value="Iasi">Iasi </option>
            <option value="Ilfov">Ilfov</option>
            <option value="Maramures">Maramures</option>
            <option value="Mehedinti">Mehedinti </option>
            <option value="Mures">Mures</option>
            <option value="Neamt">Neamt</option>
            <option value="Olt">Olt </option>
            <option value="Prahova">Prahova</option>
            <option value="Satu Mare">Satu Mare</option>
            <option value="Salaj">Salaj</option>
            <option value="Sibiu">Sibiu</option>
            <option value="Teleorman">Teleorman</option>
            <option value="Suceava">Suceava</option>
            <option value="Timis">Timis </option>
            <option value="Tulcea">Tulcea</option>
            <option value="Vaslui">Vaslui</option>
            <option value="Valcea">Valcea</option>
            <option value="Vrancea">Vrancea</option>
            <option value="Other">Other</option>
            <option value="RO">Romaneasca</option>

        </select>
        <br>
        <br>
        <select name="datapicker" id="datapicker" class="lista_rapoarte" >
            <option value="Astazi">Astazi</option>
            <option value="In ultima saptamana">In ultima saptamana</option>
            <option value="In ultima luna">In ultima luna</option>
            <option value="In ultimele 6 luni">In ultimele 6 luni</option>
            <option value="In ultimul an">In ultimul an</option>
            <option value="Din toate timpurile">Din toate timpurile</option>
        </select>
        <br>
        <br>

        <input type="submit" id="btn1" value="Descarca Rapoarte" onclick="Trimite_formulare()">
        <input type="submit" id="btn2" formaction="Report2.php" hidden="hidden" value="Submit R2" >
        <input type="submit" id="btn3" formaction="Report3.php" hidden="hidden" value="Submit R3">


</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    function Trimite_formulare()
    {
        setTimeout(function(){ $("#btn2").click();}, 3000);
        setTimeout(function(){ $("#btn3").click();}, 6000);
    }

</script>
</div>

@stop
