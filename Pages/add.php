<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>

    <link rel="stylesheet" href="../Resources/style.css">
    <script src="../Resources/nav.js"></script>

  </head>
  
  <body>

    <div class="header">
        <h1>ADD A TASK</h1>
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
    <center>
    <div class="bigCard bigCard-1">
        <form action="../PHP/addTask.php" method="post">

            <header>
              <h2>Task</h2>
              <div>Fill out the fields below to create a task</div><br>
            </header>
            
            <fieldset>
                <legend id="title5" class="desc">
                    Main Task
                  </legend>

                <div>
                    Main Enter Task Name:
                    &nbsp;<input type="text" name="tname" /><br>
                </div>
                
                <div>
                    Set Task Completion Date
                    &nbsp;<input type="text" name="date" /><br>
                </div>
                
                <div>
                    <p>Description:</p>
                
                <div>
                    <textarea id="add" name="description" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
                </div>
                </div>
                </fieldset>
                
                <div>
                <fieldset>
                
                    <legend id="title5" class="desc">
                    Select a Choice
                    </legend>
                    
                    <div al>
                        <input id="radioDefault_5" name="Field5" type="hidden" value="">
                        <div>
                            <input type="checkbox" name="bullets">
                            Bullets
                        </div>
                    <div>
                        <input type="checkbox" name = "checkB">
                        Checkbox
                    </div>
                    </div>
            </fieldset>

            </div>
            
            <div>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 1
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname" /><br></td>
                </div>
                <div>
                    <td>Set Main Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 2
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname2" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate2" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 3
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname3" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate3" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 4
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname4" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate4" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 5
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname5" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate5" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 6
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname6" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate6" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 7
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname7" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate7" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 8
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname8" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate8" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 9
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname9" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate9" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 10
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname10" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate10" /><br></td>
                </div>
              </fieldset>
            </div>
            
            
            <div>
                  <div>
                    <input type="reset"> &nbsp;&nbsp;&nbsp; <input type="submit">
              </div>
              </div>
            
          </form>
     </div>
    </center>
  </body>
</html>

<?php 

}else{
    header("Location: index.php");
     exit();

}

 ?>