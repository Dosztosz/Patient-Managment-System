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
<div class="container">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="content">
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


<div class="edit-bar">
  <form action="add_patient.php" method="POST">
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
      <input type="submit" value="+">
    </form>Add new Patient
</div>
<h2>Patient List</h2>
<div class="table-list">
    <table>
        <thead>
            <td>Name</td>
            <td>Vorname</td>
            <td>Birth date</td>
            <td>User Group</td>
            <td>Edit</td>
            <td>Delete</td>
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
              <td class="button-td"><a href="edit_patient.php?id='.$row["patient_id"].'">Edit</a></td>
              <td class="button-td"><a href="delete_patient.php?id='.$row['patient_id'].'">Delete</a></td>
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
    </div>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>