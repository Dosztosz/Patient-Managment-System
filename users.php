<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>User managment</title>
</head>
<body>
<div class="container">
        <?php require "resources/templates/main-menu.php" ?>
        <div class="content">
            <?php require "resources/templates/header.php" ?>
            <div class="edit-bar">
                <a href="">
                    <div class="button add">+</div>
                </a>
                <a href="">
                    <div class="button delete">-</div></a>
            </div>
            <div class="table-list">
                <table>
                    <thead>
                        <td>Name</td>
                        <td>Vorname</td>
                        <td>Birth date</td>
                        <td>User Group</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </thead>
                    <tr>
                        <td>Tomasz</td>
                        <td>Dębosz</td>
                        <td>20.10.1998</td>
                        <td>Pacjenci</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>
                    </tr>
                    <tr>
                        <td>Tomasz</td>
                        <td>Dębosz</td>
                        <td>20.10.1998</td>
                        <td>Pacjenci</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>
                    </tr>
                    <tr>
                        <td>Tomasz</td>
                        <td>Dębosz</td>
                        <td>20.10.1998</td>
                        <td>Pacjenci</td>
                        <td class="button-td"><a href=""><div class="button add">Edit</div></a></td>
                        <td class="button-td"><a href=""><div class="button delete">Delete</div></a></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</body>
</html>