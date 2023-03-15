<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site_title= "patient managment";

if(isset($_GET['site'])){
    $site=$_GET['site'];
}
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
    <div class="content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <?php 
$sql = "SELECT * FROM `patients`";
$result = $connect->query($sql);
$site_title = "Patient manager";




?>
<?php if(isset($_POST['user'])){ require "resources/templates/user_added.php"; } ?>


<h2>Patient List</h2>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>