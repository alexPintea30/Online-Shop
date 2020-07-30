
<?php
?>
<form action="Report1.php" method="POST" id="btn1">
    <p>Alegeti judetul si perioada pentru care doriti raportul<br>
        <br>
        <br>
        <select name="judetul_ales">
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
        <select name="datapicker" id="datapicker">
            <option value="Astazi">Astazi</option>
            <option value="In ultima saptamana">In ultima saptamana</option>
            <option value="In ultima luna">In ultima luna</option>
            <option value="In ultimele 6 luni">In ultimele 6 luni</option>
            <option value="In ultimul an">In ultimul an</option>
            <option value="Din toate timpurile">Din toate timpurile</option>
        </select>
        <br>
        <br>
        <input type="submit" id="btn1" name="submit_btn" value="Exportati Rapoartele" ;>
</form>

<form action="Report2.php" method="POST">
    <input type="submit" id="btn2" name="submit_btn" value=""style="display: none;";>
</form>

<form action="Report3.php" method="POST">
    <input type="submit" id="btn3" name="submit_btn" value="" ;>
</form>

<button type="button" id="btnnn">Click Me!</button>


<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'>

    $('p').click(function(){
alert("The paragraph was clicked.");
});

</script>
