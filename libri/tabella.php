<?php
session_start();
include "../services/connessione.php";
$data = new pdo(
  "mysql:host=$servername;dbname=$databasename",
  $username,
  $password
);
$query = "SELECT id, nome, isbn, id_utente  FROM libri WHERE id_utente=" . $_SESSION['marco'];
$stmt = $data->prepare($query);
$stmt->execute();
$r = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../assets/css/tabella.css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TEST</title>
</head>

<body>
<link rel="stylesheet" href="../assets/css/stilenav.css"/>
<header>
  <img src="https://media.istockphoto.com/id/537387514/it/vettoriale/libreria-logo-illustrazione-vettoriale-solo-su-bianco-libro-aperto-logotype.jpg?s=612x612&w=0&k=20&c=DvAd20L6FzvkvCi6x0o3NC5OnGixht2vPNBGXA3rGsE=" alt="logo" width="100" class="logo">
  <h1><a href="../index.php">WEB BOOKSHELF</a>
    </h1>
    <nav>
      <ul class="menu">
      <li><a href="../Utenti.php">UTENTI</a></li>
      <li><a href="ins_libri.html">INSERISCI LIBRO</a></li>
      <li><a href="../login.html">LOGIN</a></li>
      </ul>
    </nav>
  </header>
  <div class="corpo">
    <tr>
      <table align="center" border="1px" style="width:600px; line-height:40px;">
       
    </tr>
    <th> ID </th>
    <th> NOME </th>
    <th> ISBN </th>
    <th> ID UTENTE </th>
    <th> OPERAZIONI </th>
    <?php

    foreach ($result as $row) {

    ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo  $row["nome"]; ?></td>
        <td><?php echo  $row["isbn"]; ?></td>
        <td><?php echo $row["id_utente"]; ?></td>
        <td>
          <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="update" value="true">
            <button type="submit" class='btn btn-danger' name='aggiorna'>Aggiorna</button>
          </form>
          <form action="delete_libri.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="elimina" value="true">
            <button type="submit" class='btn btn-danger' name='elimina'>Elimina</button>
          </form>
        <?php
      }
        ?>
        </table>
  </div>

</body>

</html>