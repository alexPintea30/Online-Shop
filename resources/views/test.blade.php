<?php
$connect = mysqli_connect("localhost", "root", "", "laravel");
$query = // comenzile sql propriu-zise pentru rapoartele corespunzatoare
    "SELECT books.title, regions.name,  sales.data_vanzarii, SUM(sales.cantitate) AS total
      FROM books
      JOIN authors on books.authorID=authors.id
      JOIN people on authors.personID=people.id
      JOIN regions on people.judetID=regions.id
      JOIN sales on books.id=sales.bookID
      GROUP BY books.title
      ORDER BY total DESC
";
//      WHERE regions.name ='$judetul' AND sales.data_vanzarii BETWEEN $perioada1 AND CURDATE()

$result = mysqli_query($connect, $query); //aplicam query-ul de mai sus pe baza de date

?>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <br />
    <br />
    <div class="table-responsive">
        <h2 align="center">Report 1</h2><br />
        <table class="table table-bordered">
            <tr>
                <th>Titlu Carte</th>
                <th>Regiune</th>
                <th>Carti vandute</th>
                <th>Data ultimei cumparari</th>
            </tr>
            <?php
            $cnt=5;
            while($row = @mysqli_fetch_array($result) )
            {
                echo '
       <tr>
						 <td>'.$row["title"].'</td>
                         <td>'.$row["name"].'</td>
                         <td>'.$row["total"].'</td>
                         <td>'.$row["data_vanzarii"].'</td>
       </tr>
        ';
            $cnt--;
            if($cnt ==0)
                break;
            }
            ?>
        </table>
        <br />
        <form method="post" action="test.php">
            <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </div>
</div>
</body>
</html>























<?php
$query =// comenzile sql propriu-zise pentru rapoartele corespunzatoare

    "SELECT people.nume, people.prenume, users.email, books.title, sum(sales.cantitate) AS total
         FROM books
	     JOIN sales ON books.id=sales.bookID
	     JOIN users ON sales.userID=users.id
	     JOIN people ON people.id=users.personID
	     GROUP BY sales.userID
	     ORDER BY total desc
";
//         WHERE sales.data_vanzarii BETWEEN $perioada1 AND CURDATE()


$result = mysqli_query($connect, $query); //aplicam query-ul de mai sus pe baza de date


?>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <br />
    <br />
    <div class="table-responsive">
        <h2 align="center">Report 2</h2><br />
        <table class="table table-bordered">
            <tr>
                <th>Cumparator</th>
                <th>Email</th>
                <th>Titlu</th>
                <th>Carti Cumparate</th>
            </tr>
            <?php
            $cnt=5;
            while($row = @mysqli_fetch_array($result) )
            {
                echo '
       <tr>
                         <td>'.$row["nume"].' '.$row["prenume"].'</td>
                         <td>'.$row["email"].'</td>
                         <td>'.$row["title"].'</td>
                         <td>'.$row["total"].'</td>
       </tr>
        ';
                $cnt--;
                if($cnt ==0)
                    break;
            }
            ?>
        </table>
        <br />
        <form method="post" action="test.php">
            <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </div>
</div>
</body>
</html>


















<?php
$query =// comenzile sql propriu-zise pentru rapoartele corespunzatoare
    "SELECT people.nume,people.prenume, SUM(sales.cantitate)  AS total
         FROM books
         INNER JOIN authors on authors.id=books.authorID
         INNER JOIN people on people.id = authors.personID
         INNER JOIN sales ON sales.bookID=books.id
         GROUP BY authors.id
		 ORDER BY total DESC
        ";
    //         WHERE sales.data_vanzarii BETWEEN $perioada1 AND CURDATE()


$result = mysqli_query($connect, $query); //aplicam query-ul de mai sus pe baza de date


?>
<html>
<head>
    <title>Report 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <br />
    <br />
    <br />
    <div class="table-responsive">
        <h2 align="center">Report 3</h2><br />
        <table class="table table-bordered">
            <tr>
                <th>Autor</th>
                <th>Carti vandute</th>
            </tr>
            <?php
            $cnt=5;
            while($row = @mysqli_fetch_array($result) )
            {
                echo '
       <tr>
                         <td>'.$row["nume"].' '.$row["prenume"].'</td>
                         <td>'.$row["total"].'</td>
       </tr>
        ';
                $cnt--;
                if($cnt ==0)
                    break;
            }
            ?>
        </table>
        <br />
        <form method="post" action="test.php">
            <input type="submit" name="export" class="btn btn-success" value="Export" />
        </form>
    </div>
</div>
</body>
</html>
