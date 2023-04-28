<?php
session_start();
include "connessione.php";
    try  
    {  
         $connect = new PDO("mysql:host=$servername; dbname=$databasename", $username,);  
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
         if(isset($_POST["login"]))  
         {  
              if(empty($_POST["nome"]) || empty($_POST["password"]))  
              {  
                  echo 'spazio vuoto';  
              }  
              else  
              {  
                   $query = "SELECT * FROM utenti WHERE nome = :nome AND password = :password";  
                   $statement = $connect->prepare($query);  
                   $statement->execute(  
                        array(  
                             'nome'     =>     $_POST["nome"],  
                             'password'     =>     $_POST["password"]  
                        )  
                   );  
                   $count = $statement->rowCount();  
                   if($count > 0)  
                   {  
                        $_SESSION["nome"] = $_POST["username"];  
                        header("location:tabella.php");  
                   }  
                   else  
                   {  
                        echo 'DATI SBAGLIATI';  
                   }  
              }  
         }  
    }  
    catch(PDOException $error)  
    {  
         $message = $error->getMessage();  
    }  
    ?>  
   