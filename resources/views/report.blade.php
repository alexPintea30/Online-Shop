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

use Illuminate\Support\Facades\DB;

echo "<h1> Still workin' on this one </h1>";


$users = DB::table('multipliers_versions')
    ->join('versions','multipliers_versions.version_id' ,'=','versions.id')
 //   ->join('carte', 'client.IDCarte', '=', 'carte.IDCarte')
  //  ->select (DB::raw('MAX(carte.NrCarti) as maxim'))
    ->where('versions.version_description', '=' , "Jan Version")
    ->select('versions.*')
    //->where('version_description', '=' , "Jan Version")
    ->get();
dd($users);
//print_r($users);


?>
