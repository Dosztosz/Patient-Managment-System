<?php 

/* Import database connection */
require "resources/configuration/connect.php";
   if(isset($_GET['id'])){
   /* Getting POST data */
   $id = $_GET['id'];
    //SQL statement
    $sql = "DELETE FROM `groups` WHERE `group_id` = $id";
    //Adding informations to database
    if (mysqli_query($connect, $sql)) {
       header('Location: group.php?user=deleted');
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($connect);
   }
   else{
      echo'Brak danych do dodania pracownika';
   }

?>