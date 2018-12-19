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
session_start();
$id = $_SESSION['id'];
$var = $_GET["var"];
echo $var;
include("config.php");
$conn = mysqli_connect($host, $user,$pass,$db); 
$answers = mysqli_query($conn,"SELECT DISTINCT* FROM user_answers where user_id=$id");
$curr_answer_id = array();


while ($row = mysqli_fetch_array($answers)){
   $curr_answer_id[]=$row['answer_id'];
}

//print_r($curr_answer_id);


$answers = mysqli_query($conn,"SELECT DISTINCT * FROM user_answers where user_id=$var");
while ($row = mysqli_fetch_array($answers)){
   $u_answer_id[]=$row['answer_id'];
}
print_r($u_answer_id);
$query3 = mysqli_query($conn,"SELECT  DISTINCT * FROM users where user_id=$var");
$info = mysqli_fetch_array($query3);
echo $info['vardas'];  
?>
</div>
</body>
</html>