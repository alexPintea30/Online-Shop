@extends('layouts.app') <!-- aplic designul general al site-ului asupra pagini -->

@section('content') <!-- aplic subdesignul de tip content al designului de mai sus -->

<div class="continut">
<!--form-ul care va culege datele; folosesc POST pentru a nu fi probleme cu length restrictions, eventual sensitive data.-->
<form action="Cele_Mai_Multe_Carti_Vandute_Pe_Judet.php" method="POST" >
<!-- dupa selectarea datelor, acestea vor fi preluate si folosite in paginire de form-uri,
 gen Cele_Mai_Multe_Carti_Vandute_Pe_Judet.php -->

    <p id="titlu_rapoarte">Alegeti judetul si perioada pentru care doriti rapoartele<br>
        <br>
        <br>
 <?php
        //Ne conectam la BD folosind extensia PDO.
        $pdo = new PDO('mysql:host=localhost; dbname=laravel', 'root', '');

        //setam statement-ul corespunzator datelor pe care le dorim, din tabela corespunzatore.
        $sql = "SELECT name FROM regions";

        //Pregatim select statement-ul de mai sus pentru rulare
        $stmt = $pdo->prepare($sql);

        //Executam statement-ul
        $stmt->execute();

        //Receptionam datele din BD prin metoda fetchAll.
        $regions = $stmt->fetchAll();

        ?>
    <!-- select-ul corespunzator regiunilor pentru care se vor calcula rapoartele -->
        <select name="judetul_ales" label="judetul_ales" class="lista_rapoarte">

            <?php foreach($regions as $region): ?>
     <!-- luam datele care ne intereseaza rand pe rand din BD si le implementam ca drop-list.-->
            <option value="<?= $region['name']; ?>"><?= $region['name']; ?></option>
            <?php endforeach; ?>

        </select>

        <br>
        <br>
    <!-- select-ul corespunzator perioadelor de timp pentru care se vor calcula rapoartele -->
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

    <!-- butonul de download principal, vizibil, care la click apeleaza functia "Trimite_formulare"-->
        <input type="submit" id="btn1" value="Descarca Rapoarte" onclick="Trimite_formulare()">

   <!-- butonul de download pentru al doilea raport, nu e vizibil, urmeaza a fi actionat in functia "Trimite_formulare" -->
        <input type="submit" id="btn2" formaction="Top_Cumparatori_Volum-Cantitate.php" hidden="hidden" value="Submit R2" >

    <!--butonul de download pentru al treilea raport, nu e vizibil, urmeaza a fi actionat in functia "Trimite_formulare" -->
        <input type="submit" id="btn3" formaction="Cei_Mai_Bine_Vanduti_Autori-Volum.php" hidden="hidden" value="Submit R3">


</form>


<!--referinta la libraria de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 //Functia care va actiona un click pe butoanele 2 & 3, actionata de un click pe butonul 1.
    function Trimite_formulare()
    {
        //folosesc timeout pentru a nu bloca procesul de download; trebuie sa existe un delay intre ele.
        setTimeout(function(){ $("#btn2").click();}, 3000);
        setTimeout(function(){ $("#btn3").click();}, 6000);
    }

</script>
</div>

@stop
<!-- inchid template-ul de design. -->
