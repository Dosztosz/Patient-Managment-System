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
<div class="container">
    <!-- Import Main Menu -->
    <?php require "resources/templates/main-menu.php" ?>
    <div class="content">
        <!-- Import Header -->
        <?php require "resources/templates/header.php" ?>
        <?php 
        //switch statement for displaying content on main site
        switch ($site){
            case "home";
            require "resources/sites/home.php";
            break;
            case "patients";
            require "resources/sites/users.php";
            break;
            case "groups";
            require "resources/sites/groups.php";
            break;
            case "add_user";
            require "resources/sites/add_user.php";
            break;
            case "delete_user";
            require "resources/sites/delete_user.php";
            break;
            case "add_group";
            require "resources/sites/add_group.php";
            break;
            case "delete_group";
            require "resources/sites/delete_group.php";
            break;
            case "edit_user";
            require "resources/sites/edit_user.php";
            break;
            case "edit_group";
            require "resources/sites/edit_group.php";
            break;
        }
        ?>
    </div>
</div>
<div class="footer">
    <?php include "resources/templates/footer.php" ?>
</div>
</body>
</html>