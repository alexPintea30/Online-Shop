<?php


$judetul=$_POST['judetul_ales']; //referinta la alegerea userului din lista cu regiuni
$perioada=$_POST['datapicker']; //referinta la alegerea userului din lista cu perioadele de timp

switch ($perioada)
{ //atribuim variabilei perioada1 valoarea de format DATE aleasa de user din lista de pe download page
    case "Astazi":
        $perioada1="CURDATE()";
        break;
    case "In ultima saptamana":
        $perioada1="CURDATE() - INTERVAL 1 WEEK";
        break;
    case "In ultima luna":
        $perioada1="CURDATE() - INTERVAL 1 MONTH";
        break;
    case "In ultimele 6 luni":
        $perioada1="CURDATE() - INTERVAL 6 MONTH";
        break;
    case "In ultimul an":
        $perioada1="CURDATE() - INTERVAL 1 YEAR";
        break;
    case "Din toate timpurile":
        $perioada1="CURDATE() - INTERVAL 99 YEAR";
        break;
}

// ne conectam la baza noastra de date
$connect = @mysqli_connect("localhost", "root", "", "laravel");
                        //host=localhost, user=root, fara parola, nume BD =laravel

//verificam conexiunea.
if(!$connect)
{
    //daca avem credetiale scrise gresit in $connect sau alta problema, vom primi notificarea de mai jos
    echo "<h1>Conexiune nereusita</h1>";

    //hiperlink de return la homepage in caz de conexiune nereusita
    echo' </br> <a style =  "font-size: 20px"; href="/">Reveniti la pagina principala</a> ';

    die(); //incheiere comunicare
}


$output = ''; //golim preventiv sheetul/bufferul pe care urmeaza sa scriem(concatenam) datele

// if(isset($_POST["judetul_ales"])) //Verificam ca datele primite sa nu fie nule, mai exact judetul
// {
 $query = // comenzile sql propriu-zise pentru rapoartele corespunzatoare
     "SELECT books.title, regions.name,  sales.data_vanzarii, SUM(sales.cantitate) AS total
      FROM books
      JOIN authors on books.authorID=authors.id
      JOIN people on authors.personID=people.id
      JOIN regions on people.judetID=regions.id
      JOIN sales on books.id=sales.bookID
      WHERE regions.name ='$judetul' AND sales.data_vanzarii BETWEEN $perioada1 AND CURDATE()
      GROUP BY books.title
      ORDER BY total DESC
";

 $result = mysqli_query($connect, $query); //aplicam query-ul de mai sus pe baza de date


 {
  $output .= " <!-- incepem scrierea pe sheet/buffer , incepand cu capetele de tabel -->
   <table class='table' border='1'> <!--// intocmim un tabel, mai exact punem capetele de tabel
                                        // tr pt linie/rand
                                        // th pt cap de tabel scris bold-->
                    <tr>
                         <th>Titlu Carte</th>
                         <th>Regiune</th>
                         <th>Carti vandute</th>
                         <th>Data ultimei cumparari</th>

                    </tr>
  ";
  while($row = @mysqli_fetch_array($result) ) //parcurgem tabelul linie cu linie, folosim @ pt a evita warningurile
  {
   $output .= ' <!-- concatenam elementele in variabila output, pentru a completa tabelul-->
                    <tr>
						 <td>'.$row["title"].'</td>
                         <td>'.$row["name"].'</td>
                         <td>'.$row["total"].'</td>
                         <td>'.$row["data_vanzarii"].'</td>
    <!-- elementele din row trebuie sa corespunda cu cele din SELECT statement-ul din query-ul de sus ! -->
                    </tr>
   ';

  }
  $output .= '</table>'; //inchidem tabelul

  header('Content-Type: application/xls');//setarea extensiei pentru export

  header('Content-Disposition: attachment; filename=cele-mai-multe-carti-pe-judet.xls');//setarea tipului(attachment) si a numelui exportului

  echo $output;//transpunerea/golirea sheetului/bufferului construit in fisierul care va fi descarcat
 }
//}
?>

<!-- operatia de concatenare este .=     exemplu:  $txt1 .= $txt2   ==>  $txt1$txt2    -->
