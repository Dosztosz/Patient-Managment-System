<?php 
$user ="Tomek";
//Connecting to database
require "resources/configuration/connect.php";
$sql = "SELECT * FROM `patients`";

$result = $connect->query($sql);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Patient managment</title>
</head>
<body>
<div class="container">
        <!-- Import Main Menu -->
        <?php require "resources/templates/main-menu.php" ?>
        <div class="content">
            <!-- Import Header -->
            <?php require "resources/templates/header.php" ?>
            <div class="edit-bar">
                <a href=""><div class="button add">+</div></a>Dodaj nowego pacjenta
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
                    <?php
                    if ($result -> num_rows > 0) {
                        // output data from table Patietns
                        while($row = $result->fetch_assoc()) {
                          echo '<tr>
                          <td>'.$row['firstname'].'</td>
                          <td>'.$row['lastname'].'</td>
                          <td>'.$row['birthday'].'</td>
                          <td>'.$row['group_list'].'</td>
                          <td class="button-td"><a href="resources/configuration/edit.php?id="'.$row["id"].'""></td>
                          <td class="button-td"><a href="resources/configuration/delet.php?id="'.$row["id"].'"></td>
                          
                          </tr>';
                        }
                      }
                      else {
                        echo "Brak Pacjentów!";
                      }
                      $connect->close();
                    ?>
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