<?php
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
  }
?>


<div class="col-1 text-primary bg-dark min-vh-100">
    <div class="logo">
        <h1>DENT-LOGO</h1>
    </div>
    <nav class="nav nav-pills flex-column">
        <a class="nav-link text-white <?php active('index.php');?>" href="index.php">Home</a>
        <a class="nav-link text-white <?php active('patients.php');?>" href="patients.php">Users</a>
        <a class="nav-link text-white <?php active('groups.php');?>" href="groups.php">Groups</a>
        <a class="nav-link text-white <?php active('page1.php');?>" href="#">Disabled</a>
    </nav>
</div>