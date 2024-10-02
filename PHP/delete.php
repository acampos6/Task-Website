<?php
	include("config.php");
$conn =  mysqli_connect($host, $user, $pass, $db); 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(!empty($_POST['task'])) {

    foreach($_POST['task'] as $value){
        $sql = "DELETE from taskTable where task_Name = '$value'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: ../Pages/home.php");
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }   
}
else{
    echo 'No task to delete';
}
mysqli_close($conn);

?>