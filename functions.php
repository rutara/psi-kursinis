
<?php
function prisijungti(){
include("config.php");
$conn = mysqli_connect($host, $user, $pass); 
$db = mysqli_select_db($conn,$db);
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
        $user_id = $row['user_id'];
        $_SESSION['id']=$user_id;
        $query2 = mysqli_query($conn,"SELECT* FROM user_answers WHERE user_id ='$user_id' ");
        $rows2 = mysqli_num_rows($query2);
        if($rows2>0){
         header('Location: results.php');
        }
        else
        header('Location: questions.php');
    }
    else{
        $error= "nei vienas row";
    }
    mysqli_close($conn);
};
function registruotis(){
include("config.php");
$conn = mysqli_connect($host, $user, $pass); 
$db = mysqli_select_db($conn,$db);
    $vardas = $_POST['name'];
    $slaptazodis = $_POST['pass'];
    $gimetai = $_POST['dob'];
    $dob = date("Y-m-d",strtotime($gimetai));
    $lytis = $_POST['gender'];
    $nuo = $_POST['from'];
    $iki = $_POST['to'];
   $query = mysqli_query($conn,"INSERT INTO users (slaptazodis, vardas, gim_data, lytis, nuo, iki ) VALUES ('$slaptazodis','$vardas','$dob','$lytis',$nuo,$iki)");
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
include("config.php");

$conn = mysqli_connect($host, $user,$pass,$db); 
$query = mysqli_query($conn,"SELECT * FROM questions where q_id=$i");
$answers = mysqli_query($conn,"SELECT * FROM answers where q_id=$i");
$row = mysqli_fetch_array($query); 
$j=1;
while ($row2 = mysqli_fetch_array($answers)) {
${'an'.$j}= $row2["answer"];
${'an_id'.$j}=$row2["answer_id"];
$j++;
 }
$klausimas = $row['question']; 
$id = $_SESSION['id']; 
$kl_id = $row['q_id'];

echo "<form method='get'>";
echo "<h1>$klausimas</h1>";
echo "<a href='?SUDVABALIS'><button type='submit' name='submit$i' value=$an_id1>$an1 $i</button></a>"; 
echo "<a href='?SUDUKALNAS'><button type='submit' name='submit$i' value=$an_id2>$an2 $i</button></a>"; 
echo "</form>";

};

function irasyti($i){
include("config.php");

$conn = mysqli_connect($host, $user,$pass,$db); 
$query = mysqli_query($conn,"SELECT * FROM questions where q_id=$i");
$answers = mysqli_query($conn,"SELECT * FROM answers where q_id=$i");
$row = mysqli_fetch_array($query); 
$j=1;
while ($row2 = mysqli_fetch_array($answers)) {
${'an'.$j}= $row2["answer"];
${'an_id'.$j}=$row2["answer_id"];
$j++;
 }
$klausimas = $row['question']; 
$id = $_SESSION['id']; 
$kl_id = $row['q_id'];

$ats =  $_GET["submit$i"];

// testavimui
echo "atsakymo numeris $ats <br>";
echo "klausimo numeris $kl_id <br>";


$sql = "INSERT INTO user_answers (answer_id,user_id,question_id)
VALUES ($ats,$id,$kl_id)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $i++;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
};


function matching($curr_id){
include("config.php");
$conn = mysqli_connect($host, $user,$pass,$db); 
$answers = mysqli_query($conn,"SELECT * FROM user_answers where user_id=$curr_id");
$row = mysqli_fetch_array($answers); 
$j=1;
$k=1;
   while ($row = mysqli_fetch_array($answers)){

   ${'curr_question'.$j}= $row['question_id']."<br>";
   ${'curr_answer_id'.$j}=$row['answer_id']."<br>";
   echo "curr_question turim";
   echo ${'curr_question'.$j};
   echo "curr_answer_id turim";
   echo ${'curr_answer_id'.$j};
   echo ".............<br>";
   $j++;
   }
$users_all = mysqli_query($conn,"SELECT * FROM users");
$rows_all = mysqli_num_rows($users_all);

for ($i=1; $i <= $rows_all; $i++) { 
echo"<h1>...........KAI USER_ID YRA $i............</h1>";
$user_answers = mysqli_query($conn,"SELECT * FROM user_answers where user_id=$i");
$user_all = mysqli_fetch_array($user_answers);
//visi atsakimai tam tikro naudotojo su id isfor ciklo  
  while ($user_all = mysqli_fetch_array($user_answers)){
   ${'all_answer_id'.$k}=$user_all['answer_id'];
   echo "atsakimo id  ".${'all_answer_id'.$k};
   echo "<br>";
   
//if(${'curr_answer_id'.$k} == ${'all_answer_id'.$k}){
echo"ar sutampa??? ";
echo "<br>";
echo ${'curr_answer_id5'};
echo "ir ";
echo ${'all_answer_id'.$k};
echo "<br>";
if(${'curr_answer_id5'} == ${'all_answer_id'.$k}){
    echo"taip";
    echo "<br>";
}
else{
    echo"ne";
    echo "<br>";
}
   echo "k = $k";
   echo"<br>";
   echo "............<br>";
      $k++;
     
   
 



};
};
 
    

// jei sutampa, tai i laikina kintamaji kintamaji ++,bent kol, kas statiskai
};

?>