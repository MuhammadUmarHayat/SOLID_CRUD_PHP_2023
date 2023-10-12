<?php

include 'Database.php';
include 'RegistrationForm.php';
$db = new Database();
$registrationForm = new RegistrationForm($db);
$record = $registrationForm->list();



?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Management</title>
</head>
<body>
 <h1>Applicant Management</h1>
<b> <a style="color: #336600; text-decoration: none;" href="addApplicant.php">New Applicant</a></b>
<table border=1>
    
<tr>
<td>#</td>
                                <td>Name</td>
                                <td>Age</td>
                                <td>CNIC #</td>
                                <td>Cell #</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td></td>
                                <td></td>
</tr>

<?php

if ($record && $record->num_rows > 0) {
    while ($row = $record->fetch_assoc()) {
    ?>

    <tr>
<td><?php echo $row['id'] ?></td>
<td><?php echo $row['Applicant_Name'] ?></td>
                                <td><?php echo $row['Applicant_Age'] ?></td>
                                <td><?php echo $row['Applicant_CNIC'] ?></td>
                                <td><?php echo $row['CellNo'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo '<a style="color: #336600; text-decoration: none;"  href="editApplicant.php?id=' . $row['id'] . '">Edit Details</a>';


?></td>
<td> <?php echo '<a style="color:#ff0000 ; text-decoration: none;" href="deleteapplicant.php?id=' . $row['id'] . '">Delete Details</a>';
    ?></td>
</tr>

    
    
<?php



                        }
                        } ?>
                        </table>


</body>
</html>