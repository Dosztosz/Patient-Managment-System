<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site_title= "patient managment";

$group_id = $_GET['id'];

if(isset($_GET['site'])){
    $site=$_GET['site'];
}

if(isset($_POST['submit'])){

        /* Getting POST data */
        $name = $_POST['name'];
         //SQL statement
         $sql = "UPDATE `groups` 
                  SET `group_name` = '$name'
                  WHERE `group_id` = $group_id";
         //Adding informations to database
         if (mysqli_query($connect, $sql)) {
            header('Location: groups.php?user=added');
         } else {
            echo "Error: " . $sql . ":-" . mysqli_error($connect);
         }
         mysqli_close($connect);
}

$sql = "SELECT * FROM `groups` WHERE group_id = $group_id";
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
<div class="container-fluid row bg-light p-0 m-0">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-10 p-0 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <div class="edit-bar">
          <div class="p-5 d-flex justify-content-center">
            <div class="p-5 w-50 bg-white">
        <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo '
            <h2>Editing '.$row['group_name'].' Group...</h2>
            <hr>
                <form method="POST">
                  <div class="form-group col-md-6">
                    <label for="login">Group Name</label>
                    <input type="text" value="'.$row['group_name'].'" name="name">
                  </div>
                    <input class="form-control" type="submit" name="submit" value="Edit Value">
                </form>
            ';
          }
        } else {
          echo "0 results";
        }
        ?>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>