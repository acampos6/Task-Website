<?php

$host = "localhost"; 
$user = "acampos6"; 
$pass = "acampos6"; 
$db = "acampos6";
$conn = mysqli_connect($host, $user, $pass, $db); 

// Check connection
if (!$conn) {
    echo "Connection failed";
}

?>