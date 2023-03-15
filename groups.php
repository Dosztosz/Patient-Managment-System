<?php 
//Connecting to database
require "resources/configuration/connect.php";

if(isset($_GET['site'])){
    $site=$_GET['site'];
}
//Statement for displaying Groups with patient names
$sql = "SELECT
        groups.group_id,
        patients.patient_firstname,
        patients.patient_lastname,
        groups.group_name
        FROM patients
        JOIN patients_group
        ON patients.patient_id = patients_group.patient_id
        JOIN groups
        ON patients_group.group_id = groups.group_id";
$result = $connect->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Import Head -->
    <?php require "resources/templates/head.php" ?>
    <title>Group managment</title>
</head>
<body>
<script>
function ShowForm(){
    $( "#form_add" ).toggle( "show" );
    $( "#form_show" ).toggle( "hide" );
    $( "#form_hide" ).toggle( "show" );
}

</script>



<div class="container-fluid row bg-light p-0 m-0">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-11 p-0 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>

        <script>
function ShowForm(){
    $( "#form_add" ).toggle( "show" );
    $( "#form_show" ).toggle( "hide" );
    $( "#form_hide" ).toggle( "show" );
}

</script>

<?php //Display user added / user deleted Info

if(!empty($_GET["user"])){
    if($_GET["user"] == "added"){
        $user_status_message = "Dodałeś nowego pacjenta";
        $user_status_bg = "bg-success";
    }
    elseif($_GET["user"] == "deleted"){
        $user_status_message = "Usunąłeś Pacjenta";
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

          <div class="d-flex p-3 bg-white">
          <button id="form_hide" type="button" onclick="ShowForm()" class="btn btn-warning">Hide</button>
          <button id="form_show" type="button" onclick="ShowForm()" class="btn btn-success">Add new Group</button>
          <form id="form_add" action="add_patient.php" method="POST">
            <input type="text" placeholder="Group Name" name="name">
            <input type="submit" class="btn btn-success" value="+">
          </form>
    </div>
    <h2 class="p-3"><i class="bi bi-person-bounding-box"></i>Group List</h2>
    <!-- Table Displaying Groups -->
    <table class=" table table-responsive thead-dark table-bordered w-100 .bg-white">
        <thead>
            <th>Edit</td>
            <th>Delete</td>
            <th>Name</td>
            <th>List of Patients</td>
        </thead>
        <?php
        $prev_id = null;
        if ($result -> num_rows > 0) {
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
              if ($row["group_id"] !== $prev_id) {
                echo '<tr>';
                echo '<td><a type="button" class="btn btn-warning" href="edit_group.php?id='.$row['group_id'].'"><i class="bi bi-gear-wide"></i></a></td>
                      <td><a type="button" class="btn btn-danger" href="delete_group.php?id='.$row['group_id'].'"><i class="bi bi-trash"></i></a></td>
                      <td>'.$row['group_name'].'</td>';
                echo "<td>" . $row["patient_firstname"] . " " . $row["patient_lastname"]."<br>";
                $prev_id = $row["group_id"];
              } else {
                echo $row["patient_firstname"] . " " . $row["patient_lastname"]."<br>";
              }
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
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>