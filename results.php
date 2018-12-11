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
<button>Atsijungti</button>
</div>
<h2>Panašiausiai į klausimus atsakė: </h2>
<br>
<ul>
	<li><div class="circle">foto</div><p>vardas,metai</p><button>kontaktai</button><button>Palyginti atsakymus</button></li>
	<li><div class="circle">foto</div><p>vardas,metai</p><button>kontaktai</button><button>Palyginti atsakymus</button></li>
	<li><div class="circle">foto</div><p>vardas,metai</p><button>kontaktai</button><button>Palyginti atsakymus</button></li>
</ul>
</body>
</html>
<?php
matching($id);
?>
