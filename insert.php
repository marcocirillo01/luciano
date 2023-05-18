<?php
include "services/connessione.php";
$data =new pdo(
    "mysql:host=$servername;dbname=$databasename", 
    $username, $password);
    //insert
   
//var_dump($_POST);
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$codice_fiscale=$_POST['codice_fiscale'];
$email=$_POST['email'];
$password2=$_POST['password'];
$password1=md5($password2);
if (strpos($email,'@')==false)
{
    trigger_error("non cé la @", E_USER_ERROR);
    header("location: inseriscidati.html");
}
$query="INSERT INTO utenti ( codice_fiscale, nome, cognome, email, password ) VALUES
('$codice_fiscale','$nome','$cognome','$email','$password1')";
echo $query;
 $stmt = $data->prepare($query);
 $stmt->execute();
 header("location: Utenti.php");
?>
