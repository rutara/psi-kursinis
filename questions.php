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

$n=1;
$temp = 1;
if(!$_GET){
 klausimai($n);
};
if(isset($_GET["submit1"])){
$n=2;
 irasyti(1);
 klausimai($n);
};

if(isset($_GET["submit2"])){
    $n=3;
     irasyti(2);
     klausimai($n);
}
if(isset($_GET["submit3"])){
    $n=4;
     irasyti(3);
     klausimai($n);
};
if(isset($_GET["submit4"])){
    $n=5;
    irasyti(4);
     klausimai($n);
};
if(isset($_GET["submit5"])){
    $n=6;
    irasyti(5);
     klausimai($n);
};
if(isset($_GET["submit6"])){
    $n=7;
    irasyti(6);
     klausimai($n);
};
if(isset($_GET["submit7"])){
    $n=8;
    irasyti(7);
     klausimai($n);
};
if(isset($_GET["submit8"])){
    $n=9;
    irasyti(8);
     klausimai($n);
};
if(isset($_GET["submit9"])){
    $n=10;
    irasyti(9);
     klausimai($n);
};
if(isset($_GET["submit10"])){
    irasyti(10);
    header('Location: results.php');
    
};

?>
   </div>     
</body>