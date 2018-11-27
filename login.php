<?php 
session_start();
include("functions.php");

?>
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
        <div class="white_box">
        <h2>Meilės laboratorija</h2>
        <h3>Prisijungti</h3>
    <form method="post" action=""> 
          <label>vardas</label>
          <input type="text" name="name"><br />
          <label>slaptazodis</label>
          <input type="password" name="pass"><br />
          <input class="button" type="submit" name = "submit" value="Prisijungti"><br />
	</form>	
   <?php
   if(isset($_POST['submit'])){
    
     if(empty($_POST['name']) || empty($_POST['pass'])){
         $error = "tuscia";
    } else {
        prisijungti();
    }
}
?>
</form>
</div>
</body>