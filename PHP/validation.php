<?php

session_start();

include "config.php";

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username  = test_input($_POST['user']);
$pass = test_input($_POST['password']);


    $sql = "SELECT id, username, pword FROM User WHERE username = '$username' AND pword = '$pass' ";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if ($row['username'] === $username && $row['pword'] === $pass) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("location: ../Pages/home.php");

            exit();

        }else{

            header("location: ../Pages/login.html ");

            exit();

        }

    }else{

        header("location: ../Pages/login.html");

        exit();

    }


?>