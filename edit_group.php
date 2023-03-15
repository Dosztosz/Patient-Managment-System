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
        $login = $_POST['login'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $birthday = $_POST['birthday'];
         //SQL statement
         $sql = "UPDATE `patients` 
         SET `patient_login` = '$login', `patient_password` = '$password', `patient_firstname` = '$firstname', `patient_lastname` = '$lastname', `patient_birthday` = '$birthday'
         WHERE `patients`.`patient_id` = $patient_id;";
         //Adding informations to database
         if (mysqli_query($connect, $sql)) {
            echo "New record has been added successfully !";
            header('Location: patients.php?user=added');
         } else {
            echo "Error: " . $sql . ":-" . mysqli_error($connect);
         }
         mysqli_close($connect);
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
        ON patients_group.group_id = groups.group_id
        WHERE groups.group_id = '$group_id'";
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
<div class="container-fluid row bg-light">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-10 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <div class="edit-bar">
        <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo '
            <h2>Patient '.$row['patient_firstname'].' edit</h2>
                <form method="POST">
                    <input type="text" value="'.$row['group_name'].'" name="login">
                  <input type="submit" name="submit" value="+">
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
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>