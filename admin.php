<?php
    include_once("config.php");
    include_once('dropdown.php');
$conn = mysqli_connect($host, $user, $pass);
$db = mysqli_select_db($conn,$db);
$query = mysqli_query($conn,"SELECT* FROM users");
    $rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html lang="lt">
	<head>
		<title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
   <div class='dark_box'>
    <table>
    <tr><td>Naudotojai (<?php echo $rows ?>)</td>
    <td>Klausimai</td>
    <td>Atsakymai</td>
    </tr>
    <tr>
    <td><?php
    while ($row=mysqli_fetch_array($query)){ 
    echo $row['vardas'];
    echo "<br>";
    }
     
    
    ?>
    
    </td>
    <td><?php
    // $query2 = mysqli_query($conn,"SELECT* FROM questions");
    // $row2 = mysqli_fetch_array($query2);
    for ($i=0; $i <10 ; $i++) { 
    $query2 = mysqli_query($conn,"SELECT* FROM questions where q_id = $i");
    $row2 = mysqli_fetch_array($query2);
    echo $row2['question'];
    echo "<br>";
    }
    ?></td>
    <td><?php
    for ($i=0; $i <10 ; $i++) { 
    $query3 = mysqli_query($conn,"SELECT* FROM answers where q_id = $i");
    while ($row3=mysqli_fetch_array($query3)){ 
    echo $row3['answer'];
    echo " ";
    }
     //echo ";";
    echo "<br>";
    }
    ?></td>
     </tr>
    </table>
</div>
    </body>
    </html>