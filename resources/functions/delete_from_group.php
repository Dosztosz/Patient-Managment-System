<?php 

/* Import database connection */
require "../configuration/connect.php";
   if(isset($_GET['id'])){
   /* Getting POST data */
   $id = $_GET['id'];
    //SQL statement
    $sql = "DELETE FROM `patients_group` WHERE `groups_patients_Id` = $id";
    //Adding informations to database
    if (mysqli_query($connect, $sql)) {
       header('Location: ../../groups.php?user=deleted');
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
    mysqli_close($connect);
   }
   else{
      echo'Brak danych do dodania pracownika';
   }

?>