
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
    $lytis = $_POST['lytis'];
    $query = mysqli_query($conn,"SELECT* FROM users WHERE vardas ='$vardas' and  slaptazodis = '$slaptazodis' ");
    
    $rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    if($rows == 1){
        $_SESSION['username']=$vardas;
        $_SESSION['lytis']=$lytis;
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
echo "<button type='submit' name='submit$i' value=$an_id1>$an1 $i</button>"; 
echo "<button type='submit' name='submit$i' value=$an_id2>$an2 $i</button>"; 
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
$k=0;
$curr_answer_id = array();
   while ($row = mysqli_fetch_array($answers)){
   $curr_answer_id[]=$row['answer_id'];
}

print_r($curr_answer_id);
$users_all = mysqli_query($conn,"SELECT * FROM users");
$rows_all = mysqli_num_rows($users_all);

for ($i=1; $i <= $rows_all; $i++) { 
    $m_info[$i]=0;
echo"<h1>...........KAI USER_ID YRA $i............</h1>";
$user_answers = mysqli_query($conn,"SELECT * FROM user_answers where user_id=$i");
$query3 = mysqli_query($conn,"SELECT * FROM users where user_id=$i");
$info = mysqli_fetch_array($query3);
$g_info[$i] = $info['lytis'];
$vardas_info[$i] = $info['vardas'];
$id_info[$i] = $info['user_id'];            //veliau
$metai_ingo[$i] = $info['gim_data'];      //veliau
print_r($g_info);
$n = 0 ;

  while ($user_all = mysqli_fetch_array($user_answers)){
   $all_answer_id[$k]=$user_all['answer_id'];
    settype( $curr_answer_id[$n],"integer");
    settype($all_answer_id[$k],"integer");
    // echo $all_answer_id[$k]."ir".$curr_answer_id[$n]."<br>";
    if($curr_answer_id[$n] == $all_answer_id[$k]){
    $m_info[$i]++;
   };

      $k++;
      $n++;
};
settype($_SESSION['lytis'],"string");
settype($g_info[$i],"string");
if(($curr_id !== $id_info[$i]) && ($_SESSION['lytis'] !== $g_info[$i])){
echo "<h2>".$m_info[$i]."0%</h2>";
echo $vardas_info[$i];
echo "<br>";
echo $g_info[$i];
};
};

};
// patikrinti ar kitas zmogus mergina ar vaikinas
//patikrinti ar tai nera tas pats vartotojas ( kas siuo atveju net neimanoma, nes poruojama tik su skirtinga lytimi, tai galima
//ir nedaryt)
//padaryt masyva, kuriame butu reikalinga informacija matchinimui ( id, rate, lytis) info[0][1,50,mergina],[1]
?>