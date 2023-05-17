<?php
session_start();
include "connessione.php";
$data = new PDO("mysql:host=$servername; dbname=$databasename", $username, );
$data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pass= $_POST['password'];
$email= $_POST['email'];
if (isset($_POST["login"])) {
     if (empty($_POST["email"]) || empty($_POST["password"])) {
          echo 'spazio vuoto';
     } else {
          $query = "SELECT id, email , password FROM utenti WHERE email = :email AND password = :password";
          $statement = $data->prepare($query);
          $statement->execute(
               array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"],
               )
          );
$result = $statement->fetchAll();

$user=$data->prepare("SELECT password FROM utenti WHERE email = :email ");
$user->bindParam(':email', $email);
$user->execute();
$row = $user->fetch(PDO::FETCH_ASSOC);

$verifica=password_verify($pass,$row['password']);
echo $verifica;
if($verifica){
          if(count($result) > 0){
               $_SESSION["marco"] = $result[0]['id'];
               header("location:tabella.php");
          }else{
               //header("location:login.html");
               echo "errore";
               exit();
          }
     }
     }

}
?>
   
  

     
   