<?php 

include('connessione.php');
$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
 $id = $_POST['id'];
 $sql = "DELETE FROM utenti WHERE id={$id}";
 $conn->exec($sql);
 header("location:Utenti.php");

 
?>