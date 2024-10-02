<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Task Manager</title>

    <link rel="stylesheet" href="../Resources/style.css">
    <script src="../Resources/nav.js"></script>


  </head>
  
  <body>

    <div class="header">
        <h1>View</h1>
    </div>

    <div class="topnav">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div>
    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="home.php">HOME</a>
        <a href="add.php">ADD</a>
        
        <div class="dropdown">
          <label>UPDATE</label>
          <div class="dropdown-content">

          <form action="Update.php" method="post">
            <?php
                    session_start();

                    include "config.php";
                    $name = $_SESSION['username'];

                    $sql = "SELECT task_Name
                    from `taskTable` 
                    where taskTable.username = '$name';";
            
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                          echo '<button name="selected" type="submit" value ="'.$row['task_Name'].'">'.$row['task_Name'].'</button>';
                        }
                    }
                    else {
                        echo "<p>";
                        echo "No tasks to show";
                        echo "</p>";
                    }
              ?>
          </form>
        </div>
      </div>

        <div class="dropdown">
        <label>VIEW</label>
            <div class="dropdown-content">

            <form action="View.php" method="post">
              <?php
                    session_start();

                    include "config.php";
                    
                    $name = $_SESSION['username'];

                    $sql = "SELECT task_Name
                    from `taskTable` 
                    where taskTable.username = '$name';";
            
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                          echo '<button name="selected" type="submit" value ="'.$row['task_Name'].'">'.$row['task_Name'].'</button>';
                        }
                    }
                    else {
                        echo "<p>";
                        echo "No tasks to show";
                        echo "</p>";
                    }
              ?>
            </form>

            </div>
        </div>

        <a href="../PHP/logout.php">LOG OUT</a>
    </div>
    
    <form action="../PHP/ViewUpdate.php" method="post">
      
      <center>


      <?php

        session_start();

        include "config.php";

        if(!empty($_POST['selected'])){
        
          $view = $_POST['selected'];
        
        }else if(!empty($_POST['search'])){

          $view = $_POST['search'];

        }
        else{
          header("Location: home.php");
        }

        $sql = "SELECT * FROM `taskTable` where `task_Name` = '$view' ";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            if ($row = mysqli_fetch_assoc($result)){
                echo '<div class="bigCard bigCard-1">';
                echo '<h1>';
                echo $row['task_Name'];
                echo '</h1>';
                echo '<h2> To Be Completed By: ';
                echo $row['completedBy'];
                echo '</h2>';
                echo '<fieldset>
                      <legend id="title6" class="desc">
                      SUB-TASKS
                      </legend>
                      <div class ="left">';
                      if (!empty($row['sub_Task1_Name']) && !empty($row['bullets'])){
                        echo '<ul>';
                        echo '<li>';
                        echo $row['sub_Task1_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy1'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task2_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy2'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task3_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy3'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task4_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy4'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task5_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy5'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task6_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy6'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task7_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy7'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task8_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy8'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task9_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy9'];
                        echo '</li>';
                        echo '<li>';
                        echo $row['sub_Task10_Name'];
                        echo ' Complete By:';
                        echo $row['sub_CompletedBy10'];
                        echo '</li>';
                        echo '</ul>';
                }
                else if (!empty($row['sub_Task1_Name']) && !empty($row['checkBox'])){
                    echo '<ul>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb1"';
                    if(!empty($row['sub_Task1_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task1_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy1'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb2"';
                    if(!empty($row['sub_Task2_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task2_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy2'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb3"';
                    if(!empty($row['sub_Task3_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task3_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy3'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb4"';
                    if(!empty($row['sub_Task4_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task4_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy4'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb5"';
                    if(!empty($row['sub_Task5_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task5_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy5'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb6';
                    if(!empty($row['sub_Task6_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task6_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy6'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb7"';
                    if(!empty($row['sub_Task7_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task7_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy7'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb8"';
                    if(!empty($row['sub_Task8_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task8_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy8'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb9"';
                    if(!empty($row['sub_Task9_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task9_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy9'];
                    echo '</li>';
                    echo '<li>';
                    echo '<input type="checkbox" name="cb10"';
                    if(!empty($row['sub_Task10_Check'])){echo 'checked';} echo'/>';
                    echo $row['sub_Task10_Name'];
                    echo ' Complete By:';
                    echo $row['sub_CompletedBy10'];
                    echo '</li>';
                    echo '</ul>';

                }
                else{
                    echo "No Sub-Task to show!";
                }
                echo '</div>';
                echo '</fieldset>';
                echo '<fieldset id = "des">
                      <legend id="title6" class="desc">
                      Description
                      </legend>
                      <p>';
                echo $row['description'];
                echo '</p>
                      </fieldset>
                      <input type="reset"> &nbsp;&nbsp;&nbsp; <input type="submit">
                      </div>';
            }
        }
        else {
            echo "<p>";
            echo "No tasks to show";
            echo "</p>";
        }

        ?>

      
      </center>
    </form>
  
    </body>

</html>

<?php 
}else{
    header("Location: index.php");
     exit();

}

 ?>

