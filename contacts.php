<?php
include_once("dropdown.php");
?>
<!DOCTYPE HTML>
<html lang="lt">

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="start">
    <div class="white_box">
        <h1>Kontaktai</h1>
        
<?php


$var = $_GET["var"];
include_once("config.php");
include_once("dropdown.php");
$conn = mysqli_connect($host, $user,$pass,$db); 
$answers = mysqli_query($conn,"SELECT DISTINCT* FROM users where user_id=$var");
$curr_answer_id = array();
$row = mysqli_fetch_array($answers);
$vardas=$row['vardas'];
$gimetai=$row['gim_data'];
$tel=$row['tel'];
$pastas=$row['elpastas'];
$fb=$row['fblink'];
$dob = date("Y-m-d",strtotime($gimetai));
$age = date("Y-m-d")-$dob;
echo "<h1>$vardas,$age</h1>";
echo"<h3>$tel</h3>";
echo"<h3>$pastas</h3>";
echo  "<a href='$fb' target='_blank'><button>Facebook nuoroda</button></a>";

?>
</div>
</body>
</html>