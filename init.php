<?php
include("config.php");

$conn = mysqli_connect($host,  $user, $pass);
if (!$conn) {
  die('Neina prisijungti: ' . mysqli_error($conn). '<br>');
}

// make foo the current db
$db_selected = mysqli_select_db($conn, "$db");
if ($db_selected) {
  die ("Duombaze jau sukurta: '$db'". '<br>');
}

$sql = "CREATE DATABASE `$db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

if ($conn->query($sql) === TRUE) {
    $conn = mysqli_connect($host,  $user, $pass, $db);
    echo 'Duombaze sekmingai sukurta'. '<br>';

    $filename = 'db/seed.sql';
    // Temporary variable, used to store current query
    $templine = '';
    // Read in entire file
    $lines = file($filename);
    // Loop through each line
    foreach ($lines as $line)
    {
        // Skip it if it's a comment
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;

        // Add this line to the current segment
        $templine .= $line;
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';')
        {
            // Perform the query
            $conn->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($conn) . '<br /><br />');
            // Reset temp variable to empty
            $templine = '';
        }
    }
    echo 'Sekmingai ideti duomenys is db/seed.sql'. '<br>';
} else {
    die ('Nepavyko sukurti duombases'. '<br>');
}