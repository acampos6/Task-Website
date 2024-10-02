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
      <h1>Welcome <?php echo $_SESSION['username']?></h1>
    </div>

    <div class="topnav">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
        
        <div id = "searchLeft">
            <form action="View.php" method="post">
    
            Search:<input type="text" name="search" placeholder = "Search by: Main Task" />
            <button name="selected" type="submit">Search</button>

            </form>
        </div>

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
            
                    $result = mysqli_query($conn, $sql);
            
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
            
                    $result = mysqli_query($conn, $sql);
            
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
    
    <form action="../PHP/delete.php" method="post">

      <center>
        
      <?php

        session_start();

        include "config.php";
        $name = $_SESSION['username'];
        $sql = "SELECT *
        from `taskTable` 
        where taskTable.username = '$name';";

        $result = mysqli_query($conn, $sql);


        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class=\"card card-1\">";
                echo '<input type="checkbox" name="task[]" id="mainTaskCheck" value="' . $row['task_Name'] . '" > ';
                echo '<h1>';
                echo $row['task_Name'];
                echo '</h1>';
                echo '<h2> To Be Completed By: ';
                echo $row['completedBy'];
                echo '</h2>';
                echo '<fieldset id = "des">
                        <legend id="title6" class="desc">
                        Description
                        </legend>
                        <p>';
                echo $row['description'];
                echo '</p>
                        </fieldset>
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
      <button id="delete" type = "submit">Delete</button>
      
    </form>


  </body>

</html>

<?php 
}else{
    header("Location: index.php");
     exit();

}

 ?>

