<?php 
$sql = "SELECT * FROM `patients`";
$result = $connect->query($sql);

if(isset($_POST['submit']))
{    
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     //SQL statement
     $sql = "INSERT INTO patients (name,email,mobile) VALUES ('$name','$email','$mobile')";
     //Adding informations to database
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
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
              <td>'.$row['firstname'].'</td>
              <td>'.$row['lastname'].'</td>
              <td>'.$row['birthday'].'</td>
              <td>'.$row['group_list'].'</td>
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