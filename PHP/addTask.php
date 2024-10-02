<?php
    session_start();
	include "config.php";

    $name = $_SESSION['username'];

    $bullets = 0;
    $checkB = 0;
    if (!empty($_POST['bullets'])){
        $bullets = 1;
    }
    if (!empty($_POST['checkB'])){
        $checkB = 1;
    }

$sql = "INSERT INTO `taskTable` ( 
                        username, 
                        task_Name, 
                        completedBy, 
                        checkBox, 
                        bullets,
                       sub_Task1_Name, sub_CompletedBy1,
                       sub_Task2_Name, sub_CompletedBy2,
                       sub_Task3_Name, sub_CompletedBy3,
                       sub_Task4_Name, sub_CompletedBy4,
                       sub_Task5_Name, sub_CompletedBy5,
                       sub_Task6_Name, sub_CompletedBy6,
                       sub_Task7_Name, sub_CompletedBy7,
                       sub_Task8_Name, sub_CompletedBy8,
                       sub_Task9_Name, sub_CompletedBy9,
                       sub_Task10_Name, sub_CompletedBy10,
                       description)

        VALUES

        ('$name', 
        '$_POST[tname]', 
        '$_POST[date]',
        '$checkB',
        '$bullets',
        '$_POST[stname]', '$_POST[sdate]',
        '$_POST[stname2]', '$_POST[sdate2]',
        '$_POST[stname3]', '$_POST[sdate3]',
        '$_POST[stname4]', '$_POST[sdate4]',
        '$_POST[stname5]', '$_POST[sdate5]',
        '$_POST[stname6]', '$_POST[sdate6]',
        '$_POST[stname7]', '$_POST[sdate7]',
        '$_POST[stname8]', '$_POST[sdate8]',
        '$_POST[stname9]', '$_POST[sdate9]',
        '$_POST[stname10]', '$_POST[sdate10]',
        '$_POST[description]'
        )";

if (mysqli_query($conn, $sql) ) {
    header("Location: ../Pages/home.php");
    } 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>