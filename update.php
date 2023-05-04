<?php 
session_start();
include "connessione.php";
$data =new PDO(
"mysql:host=$servername;dbname=$databasename", 
$username, $password);
$nome = '';
//primo if quando premo aggiorna 
if(isset($_POST["id"]) && isset($_POST["aggiorna"])){
  $id_libro = $_POST["id"];
  
  $query = "SELECT nome FROM libri WHERE id = :id_libro LIMIT 1";
  $statement = $data->prepare($query);  
  $statement->execute(  
       array(  
            'id_libro'     =>     $id_libro,  
            
       )  
  );  

  $result = $statement->fetch(PDO::FETCH_ASSOC);
  $nome = $result["nome"];

}
//secondo iff quando faccio invia
if(isset($_POST["id"]) && isset($_POST["aggiornalibro"]) && isset($_POST["nuovo_nome"]) ){
  //querry per fare update
  $query = "UPDATE libri SET nome = :nuovo_nome WHERE id = :id_libro AND id_utente=". $_SESSION['marco'];
  $stmt = $data->prepare($query);
  $stmt->execute(  
    array(  
        'nuovo_nome' => $_POST["nuovo_nome"],
         'id_libro'     =>     $_POST["id"],  
         
    )  
  ); 

  $nome = $_POST["nuovo_nome"];

}
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
    <form method="post" action="">
      <label for="nuovo_nome">nome</label> 
      <input type="hidden" name="id" value="<?= $id_libro ?>">
        <input type="text" name='nuovo_nome' id ='nuovo_nome' value="<?= $nome ?>">
        <input type="submit" name="aggiornalibro">
      </form>
        </body>
        </html>