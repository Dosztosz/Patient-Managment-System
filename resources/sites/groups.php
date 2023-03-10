<?php 
$sql = "SELECT * FROM patients_group INNER JOIN patients
        ON patients.id = patients_group.id_patient
        INNER JOIN groups
        ON groups.id = patients_group.id_group";

$result = $connect->query($sql);
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
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
              echo '<tr>
              <td>'.$row['name'].'</td>
              <td>'.$row['patient_list'].'</td>
              <td class="button-td"><a href="resources/configuration/edit.php?id="'.$row["id"].'"">+</a></td>
              <td class="button-td"><a href="resources/configuration/delet.php?id="'.$row["id"].'">-</a></td>
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