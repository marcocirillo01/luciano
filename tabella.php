<?php
include "connessione.php";
$data =new pdo(
    "mysql:host=$servername;dbname=$databasename", 
    $username, $password);
$stmt = $data->prepare($query);
$query = "SELECT id, nome, isbn, id_utente  FROM libri";
$stmt = $data->prepare($query);
$stmt->execute();
$r = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = $stmt->fetchAll();

foreach ($result as $row) 
?>
              <!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="stile.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
<tr> 
<table align="center" border="1px" style="width:600px; line-height:40px;"> 
		<th colspan="4"><h2>LIBRI</h2></th> 
   
  </tr> 
			  <th> ID </th> 
			  <th> NOME </th> 
			  <th> ISBN </th> 
			  <th> ID UTENTE </th>
              <tr> <td><?php echo $row["id"];?></td> 
                  <td><?php echo  $row["nome"];?></td> 
                  <td><?php echo  $row["isbn"];?></td> 
                  <td><?php echo $row["id_utente"];?></td> 
                  <td>
</body> 
                </html>