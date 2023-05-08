<?php
include "connessione.php";
$data =new PDO(
  "mysql:host=$servername;dbname=$databasename", 
  $username, $password);
$stmt = $data->prepare($query);
$query = "SELECT password , id, codice_fiscale, nome, cognome, email  FROM utenti";
$id =['id'];
$stmt = $data->prepare($query);
$stmt->execute();
$r = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = $stmt->fetchAll();


foreach ($result as $row) 
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="stilenav.css"/>
    <script src="https://kit.fontawesome.com/e28537ee0a.js" crossorigin="anonymous"></script>
    <title>LIBERIA</title>
</head>
<body>
  <header>
  <img src="https://media.istockphoto.com/id/537387514/it/vettoriale/libreria-logo-illustrazione-vettoriale-solo-su-bianco-libro-aperto-logotype.jpg?s=612x612&w=0&k=20&c=DvAd20L6FzvkvCi6x0o3NC5OnGixht2vPNBGXA3rGsE=" alt="logo" width="100" class="logo">
  <h1>WEB BOOKSHELF
    </h1>
    <nav>
      <ul class="menu">
      <li><a href="Utenti.php">UTENTI</a></li>
      <li><a href="inseriscidati.html">INSERISCI I TUOI DATI </a></li>
      <li><a href="login.html">LOGIN</a></li>
      </ul>
    </nav>
  </header>
  
                </body> 
                </html>

