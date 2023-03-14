<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site_title= "patient managment";

if(isset($_GET['site'])){
    $site=$_GET['site'];
}

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



<div class="container-fluid row bg-light">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-11 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>

          <div class="d-flex p-3 bg-white">
          <button id="form_hide" type="button" onclick="ShowForm()" class="btn btn-warning">Hide</button>
          <button id="form_show" type="button" onclick="ShowForm()" class="btn btn-success">Add new patient</button>
          <form id="form_add" action="add_patient.php" method="POST">
            <input type="text" placeholder="Group Name" name="name">
            <input type="submit" class="btn btn-success" value="+">
          </form>
    </div>
    <h2>Group List</h2>
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
          $connect->close();
        ?>
    </table>

</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>