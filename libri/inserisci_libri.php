<?php
session_start();
include "../services/connessione.php";
$data =new pdo(
    "mysql:host=$servername;dbname=$databasename", 
    $username, $password);
$id_u= $_SESSION["marco"];
$nome=$_POST['nome'];
$isbn=$_POST['isbn'];

$query="INSERT INTO libri ( id_utente, nome, isbn ) VALUES ('$id_u''$nome','$isbn',)";
echo $query;
 $stmt = $data->prepare($query);
 $stmt->execute();
 header("location:tabella.php");
?>