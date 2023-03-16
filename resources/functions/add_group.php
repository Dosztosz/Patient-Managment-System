<?php 

/* Import database connection */
require "../configuration/connect.php";
   if(isset($_POST['name'])){
   /* Getting POST data */
   $name = $_POST['name'];
    //SQL statement
    $sql = "INSERT INTO `groups` (group_id, group_name)
     VALUES (NULL, '$name')";
    //Adding informations to database
    if (mysqli_query($connect, $sql)) {
       echo "New record has been added successfully !";
       header('Location: ../../groups.php?user=added');
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($connect);
    }
    mysqli_close($connect);
   }
   else{
      echo'Brak danych do dodania pracownika';
   }

?>