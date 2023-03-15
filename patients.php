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


<div class="container-fluid row bg-light p-0 m-0">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main_menu.php" ?>
    <div class="col-11 p-0 content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>

        <script>
function ShowForm(){
    $( "#form_add" ).toggle( "show" );
    $( "#form_show" ).toggle( "hide" );
    $( "#form_hide" ).toggle( "show" );
}

</script>

<?php //Display user added / user deleted Info

if(!empty($_GET["user"])){
    if($_GET["user"] == "added"){
        $user_status_message = "Dodałeś nowego pacjenta";
        $user_status_bg = "bg-success";
    }
    elseif($_GET["user"] == "deleted"){
        $user_status_message = "Usunąłeś Pacjenta";
        $user_status_bg = "bg-danger";
    }
    echo '
    <script>
    //Script that Hides information bar
    function Hide(){
      $( "#toggle" ).toggle( "hide" );
    }
    </script>

    <div id="toggle">
      <div class="'.$user_status_bg.' d-flex p-2 justify-content-between">
          <h2 class="text-white">'.$user_status_message.'</h2>
          <p id="escape" onclick="Hide()">X</p>
      </div>
    </div>';

    
    } ?>

<h2 class="p-3"><i class="bi bi-person-bounding-box"></i>Patients</h2>
<div class="mb-3 mt-3 d-flex p-3">
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
    <!-- Table Displaying Patients -->
    <table class="table table-responsive thead-dark table-bordered w-100 .bg-white">
        <thead>
            <th scope="col">Patient Info</th>
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
              <td>'.$row['patient_firstname'].' '.$row['patient_lastname'].'</td>
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
          //Closing Connection
          $connect->close();
        ?>
    </table>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>