<?php 
session_start();
include_once("dropdown.php");
include_once("functions.php");

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
        <table><tr><td>
          <label>vardas</label>
</td><td>
          <input type="text" name="name">
</td></tr><tr><td>
          <label>slaptazodis</label>
</td><td>
          <input type="password" name="pass">
</td></tr></table>
          <input class="button" type="submit" name = "submit" value="Prisijungti">
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