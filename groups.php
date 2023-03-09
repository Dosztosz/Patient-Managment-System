<?php 
$user ="Tomek";
require "resources/configuration/connect.php"
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
            <div class="edit-bar">
                <a href=""><div class="button add">+</div></a>Dodaj Grupę Użytkowników
            </div>
            <div class="table-list">
                <table>
                    <thead>
                        <td>Name</td>
                        <td>Patient List</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </thead>
                    <tr>
                        <td>Borowanie</td>
                        <td>Dębosz</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>

                    </tr>
                    <tr>
                        <td>Kanałowe</td>
                        <td>Dębosz</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>
                    </tr>
                    <tr>
                        <td>Prześwietlenie</td>
                        <td>Dębosz</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>