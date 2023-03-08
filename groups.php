<?php 
$user ="Tomek";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Group managment</title>
</head>
<body>
<div class="container">
        <?php require "resources/templates/main-menu.php" ?>
        <div class="content">
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