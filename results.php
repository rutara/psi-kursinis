<?php 
include_once("dropdown.php");
include_once("functions.php");
?>
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title>Pagrindinis</title>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="style/style.css"> 
	</head>
	<body class="match">
<div class="disconn">
<?php echo $_SESSION['username'];
$id = $_SESSION['id'];

?>
<!-- <form method = 'POST' action=''>
	<input type='submit' name='atsijungti' value ='Atsijungti'></input>
</form> -->
</div>
<div class="white_box">
<h1>Panašiausiai į klausimus atsakė: </h1>
<br>


<?php
matching($id);
// if(isset($_POST['atsijungti'])){
// 	//atsijungti();
// }
?>
</div>
</body>
</html>