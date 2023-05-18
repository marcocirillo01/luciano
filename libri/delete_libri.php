<?php 

include('../services/connessione.php');
$conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
 $id = $_POST['id'];
 $sql = "DELETE FROM libri WHERE id={$id}";
 $conn->exec($sql);
 header("location:tabella.php");

 
?>