<?php 
include("functions.php");
?>
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>Sign in</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
        <div class="white_box">
        <h2>Meilės laboratorija</h2>
        <h3>Registruotis</h3>
    <form method="post" action=""> 
          <label>vardas</label>
          <input type="text" name="name"><br />
          <label>slaptazodis</label>
          <input type="password" name="pass"><br/>
           <label>Gimino data</label>
          <input type="date" name="dob"><br />
          <p>Lytis </p>
          <label>Vaikinas</label>

          <input type="radio" name="gender" value="vaikinas"><br /> 

          <label>Mergina</label>

           <input type="radio" name="gender" value="mergina"><br /> 
           
          <label>Nuo</label>
          <input type="range" min="16" max="30"name="from"><br />
          <label>Iki</label>
          <input type="range" min="16" max="30" name="to"><br/>
          <input class="button" type="submit" name = "submit2" value="Registruotis"><br />
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
</html>