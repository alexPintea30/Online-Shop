
<html>
<body>

<h1>Rapoartele disponibile:</h1>

<form action='/action_page.php' method='get'>
    <label for='datapicker'>Cele mai multe carti vandute: </label>
    <input list='datapickers' name='datapicker' id='datapicker' placeholder="Astazi">
    <datalist id='datapickers'>
        <option value='Astazi'>
        <option value='In ultima saptamana'>
        <option value='In ultima luna'>
        <option value='In ultimele 6 luni'>
        <option value='In ultimul an'>
    </datalist>
    <input type='submit' value="Generati raportul">
</form>

</body>
</html>


<?php

/*
    $users = DB::table('client')
    ->selectRaw('select(*) as client_count, Varsta')
    ->where('Varsta', '=', 1)
    ->groupBy('Varsta')
    ->get();



$results = DB::table('client')->select('Nume', 'Judet')->get();
$results1 = DB::table('carte')->select('Titlu', 'Pret')->where('pret','>','50')->get();
*/

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;




$books = DB::table('books')
    ->join('authors','books.authorID' ,'=','authors.id')
    ->join('people', 'authors.personID', '=', 'people.id')
    ->join('regions', 'people.judetID', '=', 'regions.id')
    //  ->select (DB::raw('MAX(carte.NrCarti) as maxim'))
    //->where('versions.version_description', '=' , "Jan Version")
    ->select('books.title')->from DB::table('books') into outfile''
    ->where('regions.id', '=' , "2")
    ->get();

dd($books);

//print_r($users);






/*
$now = Carbon::now();
echo $now->year;
echo $now->month;
echo $now->day-7;
*/


?>
