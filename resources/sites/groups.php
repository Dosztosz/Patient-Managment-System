<?php 
$sql_1 = "SELECT * FROM patient_groups";
/*
$sql_2 = "SELECT
        patients.patient_firstname,
        patients.patient_lastname,
        groups.group_name
        FROM patients
        JOIN patients_group
        ON patients.patient_id = patients_group.patient_id
        JOIN groups
        ON patients_group.group_id = groups.group_id";
*/
$result = $connect->query($sql_1);
$site_title = "Patient manager"
?>

<div class="edit-bar">
    <a href=""><div class="button add">+</div></a>Add new Group
</div>
<h2>Group List</h2>
<div class="table-list">
    <table>
        <thead>
            <td>Name</td>
            <td>List of Patients</td>
            <td>Edit</td>
            <td>Delete</td>
        </thead>
        <?php
        if ($result -> num_rows > 0) {
          while($row = $result)
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
              echo '<tr>
              <td>'.$row['group_id'].'</td>
              <td>'.$row['group_name'].'</td>
              <td class="button-td"><a href="resources/configuration/edit.php?id="">+</a></td>
              <td class="button-td"><a href="resources/configuration/delet.php?id="">-</a></td>
              </tr>';
            }
          }
          else {
            echo "Brak Pacjentów!";
          }
          $connect->close();
        ?>
    </table>
</div>