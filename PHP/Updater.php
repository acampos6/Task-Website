<?php
session_start();
include "config.php";
$name = $_SESSION['username'];
$currentTask = $_SESSION['mTask'];

    $bullets = 0;
    $checkB = 0;
    if (!empty($_POST['bullets'])){
        $bullets = 1;
    }
    if (!empty($_POST['checkB'])){
        $checkB = 1;
    }

$sql = "UPDATE taskTable SET    task_Name = '$_POST[tname]', completedBy = '$_POST[date]', checkBox = '$checkB', bullets = '$bullets',
                                sub_Task1_Name = '$_POST[stname]', sub_CompletedBy1 = '$_POST[sdate]',
                                sub_Task2_Name = '$_POST[stname2]', sub_CompletedBy2 = '$_POST[sdate2]',
                                sub_Task3_Name = '$_POST[stname3]', sub_CompletedBy3 = '$_POST[sdate3]',
                                sub_Task4_Name = '$_POST[stname4]', sub_CompletedBy4 = '$_POST[sdate4]',
                                sub_Task5_Name = '$_POST[stname5]', sub_CompletedBy5 = '$_POST[sdate5]',
                                sub_Task6_Name = '$_POST[stname6]', sub_CompletedBy6 = '$_POST[sdate6]',
                                sub_Task7_Name = '$_POST[stname7]', sub_CompletedBy7 = '$_POST[sdate7]',
                                sub_Task8_Name = '$_POST[stname8]', sub_CompletedBy8 = '$_POST[sdate8]',
                                sub_Task9_Name = '$_POST[stname9]', sub_CompletedBy9 = '$_POST[sdate9]',
                                sub_Task10_Name = '$_POST[stname10]', sub_CompletedBy10 = '$_POST[sdate10]',
                                description = '$_POST[description]'
                            WHERE username = '$name' AND task_Name = '$currentTask'
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
