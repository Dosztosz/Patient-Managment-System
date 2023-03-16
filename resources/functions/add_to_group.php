<?php 

/* Import database connection */
require "../configuration/connect.php";
   /* Getting POST data */
   $patient_id = $_POST['patient_id'];
   $group_id = $_POST['group_id'];

    //SQL statement
    $sql = "INSERT INTO `patients_group` (groups_patients_Id, group_id, patient_id)
            VALUES (NULL, '$group_id', '$patient_id')";
    //Adding informations to database
    if (mysqli_query($connect, $sql)) {
       header('Location: ../../groups.php?user=added');
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
    mysqli_close($connect);

?>