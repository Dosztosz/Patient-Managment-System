<?php 
//Connecting to database
require "resources/configuration/connect.php";

//Statement for displaying Groups with patient names
$sql_main = "SELECT * FROM `groups`";
$result = $connect->query($sql_main);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Import Head -->
    <?php require "resources/templates/head.php" ?>
    <title>Group managment</title>
</head>
<body>




<div class="container-fluid row bg-light p-0 m-0">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-10 p-0 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <h2 class="p-3"><i class="bi bi-person-bounding-box"></i>Group List</h2>


<?php //Display user added / user deleted Info

if(!empty($_GET["user"])){
    if($_GET["user"] == "added"){
        $user_status_message = "Dodałeś nową grupę";
        $user_status_bg = "bg-success";
    }
    elseif($_GET["user"] == "deleted"){
        $user_status_message = "Usunąłeś grupę";
        $user_status_bg = "bg-danger";
    }
    echo '
    <script>
    //Script that Hides information bar
    function Hide(){
      $( "#toggle" ).toggle( "hide" );
    }
    </script>

    <div id="toggle">
      <div class="'.$user_status_bg.' d-flex p-2 justify-content-between">
          <h2 class="text-white">'.$user_status_message.'</h2>
          <p id="escape" onclick="Hide()">X</p>
      </div>
    </div>';

    
    } ?>

          <div class="mb-3 mt-3 d-flex p-3">
          <button id="form_hide" type="button" onclick="ShowForm()" class="btn btn-warning">Hide</button>
          <button id="form_show" type="button" onclick="ShowForm()" class="btn btn-success">Add new Group</button>
          <form id="form_add" action="resources/functions/add_group.php"  method="POST">
            <input type="text" placeholder="Group Name" name="name">
            <input type="submit" class="btn btn-success" value="Add">
          </form>
    </div>
    
    <!-- Table Displaying Groups -->
    <div class="p-3">
    <table class=" table table-responsive thead-dark table-bordered w-100 bg-white">
        <thead>
            <th>Group Name</td>
            <th>Patients in group</td>
            <th>Add patients to the group</td>
            <th>Edit group</td>
            <th>Delete Group</td>
        </thead>
        <?php
        $prev_id = null;
        if ($result -> num_rows > 0) {
            
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
                $group_id = $row['group_id'];
                $group_name = $row['group_name'];
                echo '<tr>
                <td>'.$group_name.'</td>';
                $sql_patients = "SELECT
                                  groups.group_id,
                                  patients.patient_firstname,
                                  patients.patient_lastname,
                                  groups.group_name,
                                  patients_group.groups_patients_Id
                                  FROM patients
                                  JOIN patients_group
                                  ON patients.patient_id = patients_group.patient_id
                                  JOIN groups
                                  ON patients_group.group_id = groups.group_id
                                  WHERE groups.group_id = $group_id";
                $result_patients = $connect->query($sql_patients);
                if ($result_patients -> num_rows > 0){
                  echo '<td>';
                  while($patients = $result_patients->fetch_assoc()) {
                    echo  '<div>'.$patients['patient_firstname'].' '.$patients['patient_lastname'].' 
                    <a href="resources/functions/delete_from_group.php?id='.$patients['groups_patients_Id'].'"><i style="color: red;" class="bi bi-trash"></i></a></div>';
                  }
                  echo '</td>';
                }
                else{
                  echo '<td>Brak zadeklarowanych Pacjentów</td>';
                }
                echo '<td>
                  <form method="POST" action="resources/functions/add_to_group.php">
                    <label for="patient_id">Choose Patient:</label>
                    <select name="patient_id">';

                      writePatients($group_id);
                    

                echo '</select>
                  <input type="hidden" name="group_id" value="'.$group_id.'" />
                  <input type="submit" class="btn btn-success" value="Add">
                  </form>
                </td>
                <td><a type="button" class="btn btn-warning" href="edit_group.php?id='.$group_id.'"><i class="bi bi-gear-wide"></i></i></a></td>
                <td><a type="button" class="btn btn-danger" href="resources/functions/delete_group.php?id='.$group_id.'"><i class="bi bi-trash"></i></a></td>';
            }
          }
          else {
            echo "Brak Pacjentów!";
          }
          //Closing Connection
          $connect->close();
        ?>
    </table>
    </div>

</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>