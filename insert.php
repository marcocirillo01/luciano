<?php
include "connessione.php";
$data =new pdo(
    "mysql:host=$servername;dbname=$databasename", 
    $username, $password);
    //insert
var_dump($_POST);
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$codice_fiscale=$_POST['codice_fiscale'];
$email=$_POST['email'];
$password1=$_POST['password'];
$query="INSERT INTO utenti ( codice_fiscale, nome, cognome, email, password ) VALUES
('$codice_fiscale','$nome','$cognome','$email','$password1')";
echo $query;
 $stmt = $data->prepare($query);
 $stmt->execute();
?>
