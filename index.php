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
  <link rel="stylesheet" href="stile.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>
<body>
<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>DATI UTENTI</h2></th> 
   
  </tr> 
			  <th> CODICE FISCALE </th> 
			  <th> NOME </th> 
			  <th> COGNOME </th> 
			  <th> EMAIL </th>
        <th> OPERAZIONI </th>
    
        <form action="insert.php" method="POST">
          <p>
            <label for="nome">nome</label> 
              <input type="text" name='nome'id ='nome'>
           
            <label for="cognome">cognome</label> 
              <input type="text" name='cognome'id ='cognome'>
            
            <label for="codice_fiscale">codice fiscale</label> 
              <input type="text" name='codice_fiscale'id ='codice_fiscale'>
            
            <label for="email">email</label> 
              <input type="text" name='email'id ='email'>
          
              <label for="password">password</label> 
              <input type="text" name='password'id ='password'>
          </p>
          <input type="submit" value="invia">
        </form>
        <tr> 

<?php

foreach ($result as $row) {
      
  ?> 
                  <tr> <td><?php echo $row["codice_fiscale"];?></td> 
                  <td><?php echo  $row["nome"];?></td> 
                  <td><?php echo  $row["cognome"];?></td> 
                  <td><?php echo $row["email"];?></td> 
                  <td>
      
      <form action="delete.php" method="POST">;
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<input type="hidden" name="elimina" value="true">
<button type="submit" class='btn btn-danger' name='elimina'>Elimina</button>
</form>  
        
<?php 
                             } 
                        ?> 
              
                </table> 
                </body> 
                </html>
                <!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="/stilelogin.css">
    </head>
    <body>
        <form method="post" action="login.php">
            <h1>Login</h1>
            <input type="text" id="nome" placeholder="nome" name="nome">
            <input type="password" id="password" placeholder="password" name="password">
            <button type="submit" name="login">Accedi</button>
        </form>
    </body>
</html>
<?php
