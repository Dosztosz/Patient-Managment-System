<?php 
$sql = "SELECT
        groups.group_id,
        patients.patient_firstname,
        patients.patient_lastname,
        groups.group_name
        FROM patients
        JOIN patients_group
        ON patients.patient_id = patients_group.patient_id
        JOIN groups
        ON patients_group.group_id = groups.group_id";
$result = $connect->query($sql);
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
        $prev_id = null;
        if ($result -> num_rows > 0) {
            // output data from table Patietns
            while($row = $result->fetch_assoc()) {
              if ($row["group_id"] !== $prev_id) {
                echo '<tr>';
                echo '<td>'.$row['group_name'].'</td>';
                echo "<td>" . $row["patient_firstname"] . " " . $row["patient_lastname"]."<br>";
                $prev_id = $row["group_id"];
              } else {
                echo $row["patient_firstname"] . " " . $row["patient_lastname"]."<br>";
              }
            }
          }
          else {
            echo "Brak Pacjentów!";
          }
          $connect->close();
        ?>
    </table>
</div>