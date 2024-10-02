<?php
session_start();
include "config.php";
$name = $_SESSION['username'];
$currentTask = $_SESSION['mTask'];

    $cb1 = 0;
    $cb2 = 0;
    $cb3 = 0;
    $cb4 = 0;
    $cb5 = 0;
    $cb6 = 0;
    $cb7 = 0;
    $cb8 = 0;
    $cb9 = 0;
    $cb10 = 0;

    if (!empty($_POST['cb1'])){
        $cb1 = 1;
    }
    if (!empty($_POST['cb2'])){
        $cb2 = 1;
    }
    if (!empty($_POST['cb3'])){
        $cb3 = 1;
    }
    if (!empty($_POST['cb4'])){
        $cb4 = 1;
    }
    if (!empty($_POST['cb5'])){
        $cb5 = 1;
    }
    if (!empty($_POST['cb6'])){
        $cb6= 1;
    }
    if (!empty($_POST['cb7'])){
        $cb7 = 1;
    }
    if (!empty($_POST['cb8'])){
        $cb8= 1;
    }
    if (!empty($_POST['cb9'])){
        $cb9 = 1;
    }
    if (!empty($_POST['cb10'])){
        $cb10 = 1;
    }

$sql = "UPDATE taskTable SET    
                                sub_Task1_Check = '$cb1', 
                                sub_Task2_Check = '$cb2',
                                sub_Task3_Check = '$cb3', 
                                sub_Task4_Check = '$cb4', 
                                sub_Task5_Check = '$cb5', 
                                sub_Task6_Check = '$cb6', 
                                sub_Task7_Check = '$cb7',
                                sub_Task8_Check = '$cb8', 
                                sub_Task9_Check = '$cb9', 
                                sub_Task10_Check = '$cb10'
                            WHERE username = '$name' AND task_Name= '$currentTask'
                            ";


if (mysqli_query($conn, $sql)) {
    header("Location: ../Pages/home.php");
    } 
    else 
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);
?>
