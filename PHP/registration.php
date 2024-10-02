<?php

session_start();

include "config.php";

$sql = "INSERT INTO User (username, pword)

        VALUES

        ('$_POST[user]', '$_POST[password]')";

if (mysqli_query($conn, $sql)) {
    echo "Insert record successfully";
    header('location: ../Pages/login.html');
    } 
else {
    header("location: ../Pages/login.html");
    }

mysqli_close($conn);
?>