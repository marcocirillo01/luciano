<?php
include "connessione.php";
$data =new PDO(
  "mysql:host=$servername;dbname=$databasename", 
  $username, $password);
$stmt = $data->prepare($query);
$query = "SELECT password , id, codice_fiscale, nome, cognome, email  FROM utenti";
$id =['id'];
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
    <title>UTENTI</title>
</head>
<body>
<?php require('particels/navbar.php')?>
<div class="corpo">
  <table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="5"><h2>DATI UTENTI</h2></th> 
   
  </tr> 
			  <th> CODICE FISCALE </th> 
			  <th> NOME </th> 
			  <th> COGNOME </th> 
			  <th> EMAIL </th>
        <th> OPERAZIONI </th>
        <tr> 

<?php

foreach ($result as $row) {
      
  ?> 
                  <tr> <td><?php echo $row["codice_fiscale"];?></td> 
                  <td><?php echo  $row["nome"];?></td> 
                  <td><?php echo  $row["cognome"];?></td> 
                  <td><?php echo $row["email"];?></td> 
                  <td>
                  <form action="delete.php" method="POST">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<input type="hidden" name="elimina" value="true">
<button type="submit" class='btn btn-danger' name='elimina'>Elimina</button>
</form>  

                            
<?php 
                             } 
                        ?> 
                  </table>
                 </div>

                </body> 
                </html>