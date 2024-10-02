<?php 

session_start();

    include "config.php";

    if(!empty($_POST['selected'])) {

    $view = $_POST['selected'];

    $sql = "SELECT * FROM `taskTable` where `task_Name` = '$view' ";

    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){

        $_SESSION["mTask"] = $row["task_Name"];
        $_SESSION["mDate"] = $row["completedBy"];
        $_SESSION["cb"] = $row["checkBox"];
        $_SESSION["bu"] = $row["bullets"];

/* Remember what I is was doing then // Fix this

*/
        $_SESSION["sb1"] = $row["sub_Task1_Name"]; $_SESSION["sd1"] = $row["sub_CompletedBy1"]; 
        $_SESSION["sb2"] = $row["sub_Task2_Name"]; $_SESSION["sd2"] = $row["sub_CompletedBy2"]; 
        $_SESSION["sb3"] = $row["sub_Task3_Name"]; $_SESSION["sd3"] = $row["sub_CompletedBy3"]; 
        $_SESSION["sb4"] = $row["sub_Task4_Name"]; $_SESSION["sd4"] = $row["sub_CompletedBy4"]; 
        $_SESSION["sb5"] = $row["sub_Task5_Name"]; $_SESSION["sd5"] = $row["sub_CompletedBy5"]; 
        $_SESSION["sb6"] = $row["sub_Task6_Name"]; $_SESSION["sd6"] = $row["sub_CompletedBy6"]; 
        $_SESSION["sb7"] = $row["sub_Task7_Name"]; $_SESSION["sd7"] = $row["sub_CompletedBy7"]; 
        $_SESSION["sb8"] = $row["sub_Task8_Name"]; $_SESSION["sd8"] = $row["sub_CompletedBy8"]; 
        $_SESSION["sb9"] = $row["sub_Task9_Name"]; $_SESSION["sd9"] = $row["sub_CompletedBy9"]; 
        $_SESSION["sb10"] = $row["sub_Task10_Name"]; $_SESSION["sd10"] = $row["sub_CompletedBy10"];


        $_SESSION["des"] = $row["description"];
    }
    else{
        header("Location: ../Pages/home.php");
    }

    }

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

        

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE TASK</title>

    <link rel="stylesheet" href="../Resources/style.css">
    <script src="../Resources/nav.js"></script>

  </head>
  
  <body>

    <div class="header">
        <h1>UPDATE A TASK</h1>
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
        <form action="../PHP/Updater.php" method="post">

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
                    &nbsp;<input type="text" name="tname" value="<?php echo $_SESSION["mTask"];?>" /><br>
                </div>
                
                <div>
                    Set Task Completion Date
                    &nbsp;<input type="text" name="date" value="<?php echo $_SESSION["mDate"];?>"/><br>
                </div>
                
                <div>
                    <p>Description:</p>
                
                <div>
                    <textarea id="add" name="description" spellcheck="true" rows="10" cols="50" tabindex="4" placeholder="<?php echo $_SESSION["des"]?>"></textarea>
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
                    <td> &nbsp;<input type="text" name="stname" value="<?php echo $_SESSION["sb1"];?>"/><br></td>
                </div>
                <div>
                    <td>Set Main Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate" value="<?php echo $_SESSION["sd1"];?>" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 2
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname2" value="<?php echo $_SESSION["sb2"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate2" value="<?php echo $_SESSION["sd2"];?>" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 3
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname3" value="<?php echo $_SESSION["sb3"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate3" value="<?php echo $_SESSION["sd3"];?>" /><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 4
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname4" value="<?php echo $_SESSION["sb4"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate4" value="<?php echo $_SESSION["sd4"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 5
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname5" value="<?php echo $_SESSION["sb5"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate5" value="<?php echo $_SESSION["sd5"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 6
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname6" value="<?php echo $_SESSION["sb6"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate6" value="<?php echo $_SESSION["sd6"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 7
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname7" value="<?php echo $_SESSION["sb7"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate7" value="<?php echo $_SESSION["sd7"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 8
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname8" value="<?php echo $_SESSION["sb8"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate8" value="<?php echo $_SESSION["sd8"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 9
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname9" value="<?php echo $_SESSION["sb9"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate9" value="<?php echo $_SESSION["sd9"];?>"/><br></td>
                </div>
              </fieldset>
              <fieldset>
                <legend id="title6" class="desc">
                 Sub Task 10
                </legend>
                <div>
                <div>
                    <td>Enter A Sub Task:</td>
                    <td> &nbsp;<input type="text" name="stname10" value="<?php echo $_SESSION["sb10"];?>" /><br></td>
                </div>
                <div>
                    <td>Set Task Completion Date</td>
                    <td>&nbsp;<input type="text" name="sdate10" value="<?php echo $_SESSION["sd10"];?>"/><br></td>
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