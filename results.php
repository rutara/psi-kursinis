<?php 
include("functions.php");
session_start();
?>
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>Pagrindinis</title>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="style/style.css"> 
	</head>
	<body>
<div class="disconn">
<?php echo $_SESSION['username'];
$id = $_SESSION['id'];

?>
<form method = 'POST' action=''>
	<input type='submit' name='atsijungti' value ='Atsijungti'></input>
</form>
</div>
<h1>Panašiausiai į klausimus atsakė: </h1>
<br>

</body>
</html>
<?php
matching($id);
// if(isset($_POST['atsijungti'])){
// 	//atsijungti();
// }
?>
