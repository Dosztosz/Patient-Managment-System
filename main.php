<?php 
//Connecting to database
require "resources/configuration/connect.php";
$site="patients"
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
            switch ($site){
                case "patients";
                require "resources/sites/users.php";
                break;
                case "groups";
                require "resources/sites/groups.php";
                break;
            }
            ?>
        </div>
    </div>
</body>
</html>