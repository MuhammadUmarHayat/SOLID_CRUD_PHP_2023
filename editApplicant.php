
<!-- PHP Script -->
<?php
include 'Database.php';
include 'RegistrationForm.php';
 
$id= $_GET['id'];//query string 
$statusMsg ="";

$db = new Database();
$registrationForm = new RegistrationForm($db);

$record =$registrationForm->getData($id) ;
if ($record->num_rows > 0) 
{
    $row = $record->fetch_assoc();//fetch a single row
   $id= $row['id'];
   $name=  $row['Applicant_Name'];
 
$age=$row['Applicant_Age'];
$cnic=$row['Applicant_CNIC'];
$cell= $row['CellNo'];
$email=$row['Email'];
$address=$row['Address'] ;
}


?>
<?php


$message = "";

if(isset($_POST['submit']))
{
//update data

//name,age,cnic,cell,email,address
$id= $_GET['id'];

$name=$_POST['name'];
$age=$_POST['age'];
$cnic=$_POST['cnic'];
$cell=$_POST['cell'];
$email=$_POST['email'];
$address=$_POST['address'];

$updateData = [
    'Applicant_Name' => $name,
    'Applicant_Age' =>$age,
    'Applicant_CNIC'=>$cnic,
    'CellNo'=>$cell,
    'Email'=>$email,
    'Address'=>$address,
];
$result=$registrationForm->update($id, $updateData);
               


                     $message = "Applicant is  updated successfully";
        
    
                    }

    



?>




<!-- GUI -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Applicant</title>
</head>
<body>
 <h1>Add New Applicant</h1>
 <b> <a style="color: #336600; text-decoration: none;" href="index.php">Back</a></b>
 <form action="editApplicant.php?id=<?php echo $id; ?>" method="post">
                    <div class="center">
                        <table>
                        <tr><td>Applicant ID</td><td><?php echo $id; ?></td></tr>
                            <tr>
                                <td>Enter applicant name </td>
                                <td><input type="text" name="name" value="<?php echo $name?>"> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Enter applicant age</td>
                                <td><input type="number" name="age" value="<?php echo $age?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter applicant CNIC Number </td>
                                <td><input type="number" name="cnic" value="<?php echo $cnic?>"> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Enter Cell Number</td>
                                <td><input type="number" name="cell" value="<?php echo $cell?>"> <span class="error">*</span> </td>
                            </tr>
                            <tr>
                                <td>Enter applicant email </td>
                                <td><input type="email" name="email" value="<?php echo $email?>"> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td>Enter applicant address</td>
                                <td><input type="text" name="address" value="<?php echo $address?>"> <span class="error">*</span> </td>
                            </tr>
                            
                            <tr>
                                <td> </td>
                                <td> <button type="submit" name="submit"> Save Changes </button> </td>
                            </tr>
                        </table>
                        <?php
                        echo $message;
                        ?>
                    </div>
                </form>

  
</body>
</html>