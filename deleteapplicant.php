<!-- PHP scritp  -->
<?php 
include 'Database.php';
include 'RegistrationForm.php';
 
$id= $_GET['id'];//query string 
$statusMsg ="";

$db = new Database();
$registrationForm = new RegistrationForm($db);
$insert = $registrationForm->delete($id);//delete

$db->close();

             
                 $statusMsg = "Record is deleted successfully."; 
           
?>

<!-- GUI  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Applicant</title>
</head>
<body>
    <h1>Delete Applicant</h1>

<b> <a style="color: #336600; text-decoration: none;" href="index.php">Back</a></b>
<br>
    <?php echo $statusMsg;?>

</body>
</html>