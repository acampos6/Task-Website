<?php

$host = "localhost"; 
$user = ""; 
$pass = ""; 
$db = "";
$conn = mysqli_connect($host, $user, $pass, $db); 

// Check connection
if (!$conn) {
    echo "Connection failed";
}

?>
