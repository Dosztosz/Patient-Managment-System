<?php
require "config.php";

$connect = new mysqli("$db_host","$db_user","$db_pass","$db_name");

// Check connection
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connect -> connect_error;
  exit();
}
else{ echo 'Sukces';}

?>