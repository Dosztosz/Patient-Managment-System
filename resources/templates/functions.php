<?php

function writePatients($group_id){
   require "resources/configuration/connect.php";
   $sql_patients = "SELECT * FROM patients";
   $result_patients_select = $connect->query($sql_patients);

   if ($result_patients_select -> num_rows > 0){
      while($patients = $result_patients_select->fetch_assoc()) {
        echo  '<option value="'.$patients['patient_id'].'">'.$patients['patient_firstname'].' '.$patients['patient_lastname'].'</option>';
      }
    }
    else{
      echo '<td>None patients to choose from</td>';
    }
}


?>