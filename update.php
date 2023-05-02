
<?php 
include "connessione.php";
    $nuovo_nome=$_POST['nuovo_nome'];
    $nuovo_cognome=$_POST['nuovo_cognome'];
    $id = $_POST['id'];
$data =new PDO(
    "mysql:host=$servername;dbname=$databasename", 
$username, $password);
$stmt = $data->prepare($query);
$query = "UPDATE utenti SET nome = :nuovo_nome, cognome = :nuovo_cognome WHERE `utenti`. id = :id";
$stmt = $data->prepare($query);
$stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="stile.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aggiorna</title>
</head>
<body>
    <form method="post">
      <label for="nuovo_nome">nome</label> 
        <input type="text" name='nuovo_nome'id ='nuovo_nome'>
     
      <label for="nuovo_cognome">cognome</label> 
        <input type="text" name='nuovo_cognome'id ='nuovo_cognome'>
        <input type="submit" value="Aggiorna">
</form>
        </body>
        </html>