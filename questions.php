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



$n=1;
$temp = 1;
if(!$_GET){
 klausimai($n);
};

for ($n=1; $n < 10; $n++) { 

if(isset($_GET["submit$n"])){
 irasyti($n);
 //$n++;
 klausimai($n+1);
 //break;

};
};
if(isset($_GET["submit10"])){
    irasyti(10);
    header('Location: results.php');
    
};

?>
   </div>     
</body>