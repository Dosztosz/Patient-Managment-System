<?php 
require "resources/configuration/connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
     //SQL statement
     $sql = "INSERT INTO patients (patient_id, patient_login, patient_password, patient_firstname, patient_lastname, patient_birthday, patient_grouplist)
      VALUES (NULL, '$login','$password','$firstname','$lastname','$birthday','0')";
     //Adding informations to database
     if (mysqli_query($connect, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($connect);

?>