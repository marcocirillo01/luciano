<?php
session_start();
include "connessione.php";
    try  
    {  
         $data = new PDO("mysql:host=$servername; dbname=$databasename", $username,);  
         $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
         if(isset($_POST["login"]))  
         {  
              if(empty($_POST["nome"]) || empty($_POST["password"]))  
              {  
                  echo 'spazio vuoto';  
              }  
              else  
              {  
               $statement = $data->prepare($query);
                   $query = "SELECT id, nome , password FROM utenti WHERE nome = :nome AND password = :password";
                   $statement = $data->prepare($query);  
                   $statement->execute(  
                        array(  
                             'nome'     =>     $_POST["nome"],  
                             'password'     =>     $_POST["password"] ,
                             
                        )  
                   );  
                   
                   foreach ($statement as $chiave) 
                   if($chiave> 0)  
                  
                   {  
                        $_SESSION["marco"] = $chiave['id'];  
                        //echo $_SESSION["marco"] ;
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

    //risolvere else , 
    ?>  
   