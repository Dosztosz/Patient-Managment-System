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
    <script src="resources/javascript/jquery-3.6.4.min.js"></script>
    <title>Add Patient</title>
</head>
<body>
<div class="container">
        <?php require "resources/templates/main-menu.php" ?>
        <div class="content">
            <?php require "resources/templates/header.php" ?>
            <div class="form">
                <h2>
                    Add new Patient
                </h2>
                <form action="POST">
                    <label for="">Name</label>
                    <input type="text" value="Name">
                    <label for="">Vorname</label>
                    <input type="text" value="Vorname">
                    <label for="">Birthday Date</label>
                    <input type="date" value="2018-07-22">
                    <label>Multi-select
                    <input mbsc-input id="my-input" data-dropdown="true" data-tags="true" />
                    </label>
                    <select id="multiple-select" multiple>
                        <option value="1">Books</option>
                        <option value="2">Movies, Music & Games</option>
                        <option value="3">Electronics & Computers</option>
                        <option value="4">Home, Garden & Tools</option>
                        <option value="5">Health & Beauty</option>
                        <option value="6">Toys, Kids & Baby</option>
                        <option value="7">Clothing & Jewelry</option>
                        <option value="8">Sports & Outdoors</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#multiple-select').mobiscroll().select({
    inputElement: document.getElementById('my-input'),
    touchUi: false
});
    </script>
</body>
</html>

