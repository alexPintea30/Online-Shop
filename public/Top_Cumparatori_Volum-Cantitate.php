<?php


$judetul=$_POST['judetul_ales'];//referinta la alegerea userului din lista cu regiuni (nu folosesc aici)
$perioada=$_POST['datapicker'];//referinta la alegerea userului din lista cu perioadele de timp

switch ($perioada)
{//atribuim variabilei perioada1 valoarea de format DATE aleasa de user din lista de pe download page
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

    die();//incheiere comunicare
}


$output = ''; //golim preventiv sheetul/bufferul pe care urmeaza sa scriem(concatenam) datele


    $query =// comenzile sql propriu-zise pentru rapoartele corespunzatoare

        "SELECT people.nume, people.prenume, users.email, books.title, sum(sales.cantitate) AS total
         FROM books
	     JOIN sales ON books.id=sales.bookID
	     JOIN users ON sales.userID=users.id
	     JOIN people ON people.id=users.personID
         WHERE sales.data_vanzarii BETWEEN $perioada1 AND CURDATE()
	     GROUP BY sales.userID
	     ORDER BY total desc
";


    $result = mysqli_query($connect, $query); //aplicam query-ul de mai sus pe baza de date

    {
        $output .= " <!-- incepem scrierea pe sheet/buffer , incepand cu capetele de tabel -->
   <table class='table' border='1'> <!-- intocmim un tabel, mai exact punem capetele de tabel
                                         <tr> pt linie
                                         <th> pt cap de tabel scris boldat (sunt valori constante, fixe)-->
                    <tr>
                         <th>Cumparator</th>
                         <th>Email</th>
                         <th>Titlu</th>
                         <th>Carti Cumparate</th>
                    </tr>
  ";
        while($row = @mysqli_fetch_array($result) ) //parcurgem tabelul linie cu linie
        {
            $output .= ' <!-- concatenam elementele in variabila output, pentru a completa tabelul -->
                    <tr>
                         <td>'.$row["nume"].' '.$row["prenume"].'</td>
                         <td>'.$row["email"].'</td>
                         <td>'.$row["title"].'</td>
                         <td>'.$row["total"].'</td>
<!-- elementele din row trebuie sa corespunda cu cele din SELECT statement-ul din query-ul de sus ! -->
                    </tr>
                        ';
        }

        $output .= '</table>'; //inchidem tabelul

        header('Content-Type: application/xls'); //setarea extensiei pentru export

        header('Content-Disposition: attachment; filename=top-cumparatori-volum-cantitate.xls'); //setarea tipului(attachment) si a numelui

        echo $output; // transpunerea/golirea  sheetului/bufferului construit in fisierul care va fi descarcat
    }

?>

