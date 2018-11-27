<?php 
include("functions.php");
session_start();
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
<?php


echo 'Labas, '.$_SESSION['username'];
echo '. Tu esi numeris ' .$_SESSION['id'];

$count=0;
$i=1;
//isset($_POST['submit']);
if(isset($_POST['submit'])){
klausimai($i);
isset($_POST['submit'])='false';
}
if(!isset($_POST['submit'])){
echo"Nusisetino!!!!!!!!";
$i++;
echo "i lygu" .$i;
}
while(isset($_POST['submit'])){
klausimai($i);

}


?>
   </div>     
</body>