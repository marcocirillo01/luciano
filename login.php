<?php
session_start();
include "connessione.php";
$data = new PDO("mysql:host=$servername; dbname=$databasename", $username, );
$data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST["login"])) {
     if (empty($_POST["email"]) || empty($_POST["password"])) {
          echo 'spazio vuoto';
     } else {
          $statement = $data->prepare($query);
          $query = "SELECT id, email , password FROM utenti WHERE email = :email AND password = :password";
          $statement = $data->prepare($query);
          $statement->execute(
               array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"],

               )
          );

          $result = $statement->fetchAll();

          if(count($result) > 0){
               $_SESSION["marco"] = $result[0]['id'];
               header("location:tabella.php");
          }else{
               echo "errore";
               exit();
          }
     }

}
?>
           
  

     
   