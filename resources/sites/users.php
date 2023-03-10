<?php 
$sql = "SELECT * FROM `patients`";
$result = $connect->query($sql);
$site_title = "Patient manager"
?>

<div class="edit-bar">
    <a href=""><div class="button add">+</div></a>Dodaj nowego pacjenta
</div>
<h2>Patient List</h2>
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
              <td>'.$row['patient_firstname'].'</td>
              <td>'.$row['patient_lastname'].'</td>
              <td>'.$row['patient_birthday'].'</td>
              <td>'.$row['patient_grouplist'].'</td>
              <td class="button-td"><a href="resources/configuration/edit.php?id="'.$row["patient_id"].'"">+</a></td>
              <td class="button-td"><a href="resources/configuration/delet.php?id="'.$row["patient_id"].'">-</a></td>
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