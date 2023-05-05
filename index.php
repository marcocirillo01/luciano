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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBERIA</title>
</head>
<body>
  <header>
    <img src="desktop/libri.jpg" alt="logo" width="180" class="logo">
    <h1>
      LIBRERIA
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

