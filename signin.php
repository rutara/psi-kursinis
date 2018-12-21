<?php 
include_once("dropdown.php");
include_once("functions.php");
?>
<!DOCTYPE HTML>
<!-- <html lang="lt">
	<head>
		<title>Sign in</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
	</head> -->
	<body>
        <div class="white_box">
        <h2>Meilės laboratorija</h2>
        <h3>Registruotis</h3>
    <form method="post" action=""> 
           <table><tr><td>
          <label>Vardas</label>
        </td><td>
          <input type="text" name="name">
        </td></tr><tr><td>
          <label>Slaptažodis</label>
</td><td>
          <input type="password" name="pass"></td></tr><tr><td>
           <label>Gimino data</label>
</td><td>
          <input type="date" name="dob">
</td></tr><tr><td>
          <p>Lytis </p>
</td><td>
          <label>Vaikinas</label>
          <input type="radio" name="gender" value="vaikinas">
          <br>
          <label>Mergina</label>
           <input type="radio" name="gender" value="mergina"> 
</td></tr><tr><td>
           <label>Dominantis amžiaus intervalas</label>
</td><td>
          <label>Nuo</label>
          <input type="range" min="16" max="30"name="from">
          <br>
          <label>Iki</label>
          <input type="range" min="16" max="30" name="to">
</td></tr><tr><td>
           <label>Telefono numeris</label>
</td><td>
          <input type="text" name="tel">
</td></tr><tr><td>
           <label>El.pašto adresas</label>
</td><td>
          <input type="text" name="email">
</td></tr><tr><td>
           <label>Facebook profilio nuoroda</label>
</td><td>
          <input type="text" name="fblink">
 </td></tr>   </table>  
          <input class="button" type="submit" name = "submit2" value="Registruotis">

	</form>	
</form>
</div>
</body>
<?php
if(isset($_POST['submit2'])){
    
     if(empty($_POST['name']) || empty($_POST['pass'])){
         $error = "tuscia";
    } else {
        registruotis();
    }
}
?>
<!-- </html> -->