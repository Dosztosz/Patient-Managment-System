<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site_title= "patient managment";

if(isset($_GET['site'])){
    $site=$_GET['site'];
}

$sql = "SELECT * FROM `patients`";
        $result = $connect->query($sql);
        $site_title = "Patient manager";
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



<?php if(!empty($_GET["user"])){
    if($_GET["user"] == "added"){
        require 'resources/templates/user_added.php'; 
    }
    elseif($_GET["user"] == "deleted"){
        require 'resources/templates/user_deleted.php'; 
    }
    
    } ?>


<div class="d-flex p-3 bg-white">
    <button id="form_hide" type="button" onclick="ShowForm()" class="btn btn-warning">Hide</button>
    <button id="form_show" type="button" onclick="ShowForm()" class="btn btn-success">Add new patient</button>
    <form id="form_add" action="add_patient.php" method="POST">
      <label for=""></label>
      <input type="text" placeholder="Login" name="login">
      <label for=""></label>
      <input type="password" placeholder="Password" name="password">
      <label for=""></label>
      <input type="text" placeholder="Firstname" name="firstname">
      <label for=""></label>
      <input type="text" placeholder="Lastname" name="lastname">
      <label for="">Birthday</label>
      <input type="date" name="birthday">
      <input type="submit" class="btn btn-success" value="Add">
    </form>
</div>
<h2>Patient List</h2>
    <table class=" table table-responsive thead-dark table-bordered w-100 .bg-white">
        <thead>
            <th scope="col">Name</th>
            <th scope="col">Vorname</th>
            <th scope="col">Birth date</th>
            <th scope="col">User Group</hd>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </thead>
        <?php
        if ($result -> num_rows > 0) {
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
              echo '<tr>
              <td>'.$row['patient_firstname'].'</td>
              <td>'.$row['patient_lastname'].'</td>
              <td>'.$row['patient_birthday'].'</td>
              <td>'.$row['patient_grouplist'].'</td>
              <td><a class="btn btn-warning" href="edit_patient.php?id='.$row["patient_id"].'"><i class="bi bi-gear-wide"></i></a></td>
              <td><a class="btn btn-danger" href="delete_patient.php?id='.$row['patient_id'].'"><i class="bi bi-trash"></i></a></td>
              </tr>';
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