<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $databasename = "big";
// marco//


$data = mysqli_connect($servername, 
    $username, $password, $databasename);
    $query = "SELECT codice_fiscale, nome, cognome, email FROM utenti";

 

    ?>
    