<!DOCTYPE HTML>
<html lang="lt">

<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body id="start">
    <div class="white_box">
        <h1>Palyginti atsakymus</h1> 
<?php
session_start();
$id = $_SESSION['id'];
$var = $_GET["var"];
include("config.php");
$conn = mysqli_connect($host, $user,$pass,$db); 
$answers = mysqli_query($conn,"SELECT DISTINCT * FROM user_answers u JOIN answers a on a.answer_id=u.answer_id where user_id=$id");
while ($row = mysqli_fetch_array($answers)){
   $g_answer_id[]=$row['answer'];
}

//print_r($g_answer_id);


$answers2 = mysqli_query($conn,"SELECT DISTINCT * FROM user_answers u JOIN answers a on a.answer_id=u.answer_id where user_id=$var");
while ($row2 = mysqli_fetch_array($answers2)){
   $u_answer_id[]=$row2['answer'];
}
//print_r($u_answer_id);
$query3 = mysqli_query($conn,"SELECT  DISTINCT * FROM users where user_id=$var");
$info = mysqli_fetch_array($query3);
echo"<table>";
echo "<tr>";
echo"<th><h2>Tu</h2></th>";
echo"<th><h2><3</h2></th>";
echo "<th><h2>".$info['vardas']."</h2></th>";
echo "</tr>";

for ($i=0; $i <10 ; $i++) { 
    if($g_answer_id[$i]==$u_answer_id[$i]){
     echo "<tr class='green'>";   
    }
    else{
        echo "<tr class='red'>";  
    }  
 echo "<td>";
echo $g_answer_id[$i];
echo "</td>";
echo "<td></td>";
echo "<td>";
echo $u_answer_id[$i];
echo "</td>";
echo "</tr>";
}

echo "</table>"
?>
</div>
</body>
</html>