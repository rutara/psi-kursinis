<?php 
include_once("dropdown.php");
include_once("functions.php");
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


header('Content-Type: text/html; charset=utf-8');


$n=1;
$temp = 1;
if(!$_GET){
 klausimai($n);
};

echo "<pre>";
print_r($_POST);
print_r($_GET);
echo "</pre>";

for ($n=1; $n < 12; $n++) { 

if(isset($_GET["submit$n"])){
    echo "</br>";
    echo "SUBMITTING";
    echo "</br>";
 irasyti($n);
 klausimai($n+1);
};
};
if(isset($_GET["submit10"])){
    irasyti(10);
    header('Location: results.php');
    
};

?>
   </div>     
</body>