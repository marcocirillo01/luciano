<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "big";
$data = mysqli_connect($servername, 
    $username, $password, $databasename);
$data =new pdo(
    "mysql:host=$servername;dbname=$databasename", 
    $username, $password);
var_dump($_POST);
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$codice_fiscale=$_POST['codice_fiscale'];
$email=$_POST['email'];
$query="INSERT INTO utenti (codice_fiscale, nome, cognome, email) VALUES
('$codice_fiscale','$nome','$cognome','$email')";
 $stmt = $data->prepare($query);
 $stmt->execute();

?>
