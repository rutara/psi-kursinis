<?php
session_start();
function atsijungti(){
session_destroy();
header('Location: index.html');
 };
atsijungti();
?>