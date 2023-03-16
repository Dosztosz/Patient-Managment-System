<?php
//Downloading url file
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
  }
?>


<div class="col-2 text-primary bg-dark min-vh-100 shadow-sm">
    <div class="logo">
        <h1>DENT-LOGO</h1>
    </div>
    <!-- Display Main Menu -->
    <nav class="nav nav-pills flex-column">
        <a class="nav-link text-white <?php active('patients.php');?>" href="patients.php">Users</a>
        <a class="nav-link text-white <?php active('groups.php');?>" href="groups.php">Groups</a>
    </nav>
</div>