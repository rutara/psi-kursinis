
<?php

function prisijungti(){
$conn = mysqli_connect("localhost", "root", "ruta"); 
$db = mysqli_select_db($conn,"meilesl");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $vardas = $_POST['name'];
    $slaptazodis = $_POST['pass'];
   
    $query = mysqli_query($conn,"SELECT* FROM users WHERE vardas ='$vardas' and  slaptazodis = '$slaptazodis' ");
  
    $rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if($rows == 1){
        $_SESSION['username']=$vardas;
        $user_id = $row['id'];
        $_SESSION['id']=$user_id;
        header('Location: questions.php');
    }
    else{
        $error= "nei vienas row";
    }
    mysqli_close($conn);
};
function registruotis(){
$conn = mysqli_connect("localhost", "root", "ruta"); 
$db = mysqli_select_db($conn,"meilesl");
    $vardas = $_POST['name'];
    $slaptazodis = $_POST['pass'];
    $gimetai = $_POST['dob'];
    $dob = date("Y-m-d",strtotime($gimetai));
    //$age = date("Y-m-d")-$dob;
    $lytis = $_POST['gender'];
    $nuo = $_POST['from'];
    $iki = $_POST['to'];
   $query = mysqli_query($conn,"INSERT INTO users (id,slaptazodis, vardas, gim_data, lytis, nuo, iki ) VALUES (100,'$slaptazodis','$vardas','$dob','$lytis',$nuo,$iki)");
   if($query)
{
header('Location: login.php');
}
else
{
echo "Nepavyko";
}
    mysqli_close($conn);
}; 



function klausimai($i){
echo $i;
$conn = mysqli_connect("localhost", "root", "ruta","meilesl"); 
$query = mysqli_query($conn,"SELECT * FROM questions where q_id=$i");
$row = mysqli_fetch_array($query);
$klausimas = $row['question'];
if($query)
{
echo "<form method='post'>";
echo "<h1>$klausimas</h1>";
echo "<button type='submit' name='submit' value='dsc'>atsakymas1</button>";
echo "<button type='submit' name='submit' value='sda'>atsakymas2</button>";
echo "</form>";
}
};


?>