<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site_title= "patient managment";

$patient_id = $_GET['id'];

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

$sql = "SELECT * FROM patients WHERE patient_id = $patient_id";
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
<div class="container-fluid row bg-light p-0 m-0">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-10 p-0 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <div class="p-5 d-flex justify-content-center">
            <div class="p-5 w-50 bg-white">
                <?php
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo '
                    <h2>Patient '.$row['patient_firstname'].' edit site</h2>
                    <hr>
                        <form method="POST">
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="login">login</label>
                                    <input type="text" class="form-control" value="'.$row['patient_login'].'" name="login">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" value="'.$row['patient_password'].'" name="password">
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" value="'.$row['patient_firstname'].'" name="firstname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" value="'.$row['patient_lastname'].'" name="lastname">
                                </div>
                            </div>
                            <label for="birthday">Birthday</label>
                            <input class="form-control" type="date" value="'.$row['patient_birthday'].'" name="birthday">
                            <input class="btn btn-success" type="submit"name="submit" value="Edit Value" >

                        </form>';
                  }
                } else {
                  echo "0 results";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>