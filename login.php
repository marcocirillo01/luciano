<?php
session_start();
include "services/connessione.php";
$data = new PDO("mysql:host=$servername; dbname=$databasename", $username,);
$data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pass = $_POST['password'];
$pass = md5($pass);

$email = $_POST['email'];

if (isset($_POST["login"])) {
     if (empty($email) || empty($pass)) {
          echo 'spazio vuoto';
     } else {
          $query = "SELECT id, email, password FROM utenti WHERE email = :email AND password = :password";
          $statement = $data->prepare($query);
          $statement->execute(
               array(
                    'email' => $email,
                    'password' => $pass,
               )
          );
          $result = $statement->fetchAll();

          var_dump($result);

          if (count($result) > 0) {
               $_SESSION["marco"] = $result[0]['id'];
               header("location:libri/tabella.php");
          } else {
               echo "errore count";
               exit();
          }
     }
}
