
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
        $row['lytis'];
        $_SESSION['lytis']= $row['lytis'];;
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
    $dob=$_POST['dob'];
    //$dob = date("Y-m-d",strtotime($gimetai));
    $lytis = $_POST['gender'];
    $nuo = $_POST['from'];
    $iki = $_POST['to'];
    $tel=$_POST['tel'];
    $pastas=$_POST['email'];
    $fb=$_POST['fblink'];
   $query = mysqli_query($conn,"INSERT INTO users (slaptazodis, vardas, gim_data, lytis, nuo, iki,tel,elpastas,fblink ) VALUES ('$slaptazodis','$vardas','$dob','$lytis',$nuo,$iki,'$tel','$pastas','$fb')");
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
$img1 = rand(1,3);
$img2 = rand(4,6);
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
echo "<table><tr><td>";
echo "<img src='img/$img1.png' class='pav'>";
echo "</td><td>";
echo "<img src='img/$img2.png' class='pav'>";
echo "</td></tr><tr><td>";
echo "<button type='submit' name='submit$i' value=$an_id1>$an1</button>"; 
echo "</td><td>";
echo "<button type='submit' name='submit$i' value=$an_id2>$an2</button>"; 
echo "</td></table>";
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
    
    $sql = "INSERT INTO user_answers (answer_id,user_id,question_id)
    VALUES ($ats,$id,$kl_id)";

    $darom = $conn->query($sql);
    if ($darom === TRUE) {
        // echo "New record created successfully";
        // $i++;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
};


function matching($curr_id){

    include("config.php");
    $conn = mysqli_connect($host, $user,$pass,$db); 
    $answers = mysqli_query($conn,"SELECT DISTINCT* FROM user_answers where user_id=$curr_id");
    $k=0;
    $curr_answer_id = array();
    $filtruoti = array();
    while ($row = mysqli_fetch_array($answers)){
        $curr_answer_id[]=$row['answer_id'];
    }

    //print_r($curr_answer_id);
    $users_all = mysqli_query($conn,"SELECT * FROM users");
    $rows_all = mysqli_num_rows($users_all);
    for ($i=1; $i <= $rows_all; $i++) { 
        $m_info[$i][0]=0;
        //echo"<h1>...........KAI USER_ID YRA $i............</h1>";
        $user_answers = mysqli_query($conn,"SELECT DISTINCT * FROM user_answers where user_id=$i");
        $query3 = mysqli_query($conn,"SELECT  DISTINCT * FROM users where user_id=$i");
        $info = mysqli_fetch_array($query3);
        $m_info[$i][4] = $info['lytis'];
        $m_info[$i][1] = $info['vardas'];
        $m_info[$i][2]= $info['user_id']; 
        $m_info[$i][3] = $info['gim_data'];      
        $n = 0 ;

        while ($user_all = mysqli_fetch_array($user_answers)){
            $all_answer_id[$k]=$user_all['answer_id'];
            settype( $curr_answer_id[$n],"integer");
            settype($all_answer_id[$k],"integer");
            // echo $all_answer_id[$k]."ir".$curr_answer_id[$n]."<br>";
            if($curr_answer_id[$n] == $all_answer_id[$k]){
                $m_info[$i][0]++;
            };

            $k++;
            $n++;
        };

    };

    rsort($m_info);

    for ($i=0; $i < count($m_info); $i++) {
        if(($curr_id !== $m_info[$i][2]) && ($_SESSION['lytis'] !== $m_info[$i][4])){
            $kitas[] = $m_info[$i];
        }

       
    }
    
    $id1=$kitas[0][2];
    $id2=$kitas[1][2];
    $id3=$kitas[2][2];
    echo "<h1>".$kitas[0][0]."0% ".$kitas[0][1]."</h1>";
    echo "<a href='contacts.php?var=$id1'><button>Kontaktai</button></a><a href='compare_an.php?var=$id1'><button>Palyginti atsakymus</button></a></li>";
    echo "<h1>".$kitas[1][0]."0% ".$kitas[1][1]."</h1>";
    echo "<a href='contacts.php?var=$id2'><button>Kontaktai</button></a><a href='compare_an.php?var=$id2'><button>Palyginti atsakymus</button></a></li>";
    echo "<h1>".$kitas[2][0]."0% ".$kitas[2][1]."</h1>";
    echo "<a href='contacts.php?var=$id3'><button>Kontaktai</button></a><a href='compare_an.php?var=$id3'><button>Palyginti atsakymus</button></a></li>";
};
// patikrinti ar kitas zmogus mergina ar vaikinas
//patikrinti ar tai nera tas pats vartotojas ( kas siuo atveju net neimanoma, nes poruojama tik su skirtinga lytimi, tai galima
//ir nedaryt)

?>