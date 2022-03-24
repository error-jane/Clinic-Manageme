<!DOCTYPE HTML>  
<html>
<body>  
<?php
include 'DMC.php';
include "clinic_employee_ctl.php";
$newEmp = new Clinic_Employee();
if(!empty($_POST['update'])){
$result = $newEmp -> detailEmployee($_POST['update']);


$empID  = $_POST['update'];
$fname = $result['firstname'];
$lname = $result['lastname'];
$email = $result['email'];
$salary = $result['salary'];
$address = $result['address'];
$gender = $result['gender'];
$dateBirth = $result['date_of_birth'];
$role = $result['roleID'];
$phone = $result['phone_number'];
}

// define variables and set to empty values
$fnameErr =$lnameErr = $emailErr = $genderErr = $websiteErr = "";
//$fname =$lname = $email = $gender = $address = $dateBirth = $salary = $phone =$role= "";
?>
<h2>Edit Employee</h2>
<form method="post" action="clinic_employee_edit_view.php">
    E-mail <input type="text" name="txtemail" value="<?php echo $email;?>">
    
	Role <select id="roleid" name="txtrole" value="<?php echo $role;?>"> 
        <option value="1">Doctor</option>
        <option value="2">Staff</option>
        </select>  
    <br><br>
  First Name <input type="text" name="txtfname" value="<?php echo $fname;?>">

  Last Name <input type="text" name="txtlname" value="<?php echo $lname;?>">
  
  <br><br>
    Date of Birth <input type = "date" name = "txtDate_birth" value="<?php echo $dateBirth;?>" required>
    Age <input type = "text" name = "txtage">
    <br><br>
    Phone number <input type = "tel" name = "txtphone_num" value="<?php echo $phone;?>" required>
  Address <textarea name="txtaddress" rows="5" cols="40"><?php echo $address;?></textarea>
  <br><br>
  Salary <input type = "text" name = "txtsalary" value="<?php echo $salary;?>" required>
        <br><br>
  Gender
  <input type="radio" name="txtgender" <?php if (isset($gender) && $gender=="1") echo "checked";?> value="1">Female
  <input type="radio" name="txtgender" <?php if (isset($gender) && $gender=="2") echo "checked";?> value="2">Male
  
  <br><br>
  <button type='submit' name = 'edit' value = <?php echo $empID; ?>>Edit</button>

</form>
<form action = "clinic_employee_search_view.php" >
        <input type = "submit"  value = "CANCEL">
</form>

<?php

//$newEmp = new Clinic_Employee();
// $newEmp = new Clinic_Employee();
if(!empty($_POST['edit'])){
// 	if(isset($_POST['edit']))
// 	{
   echo $_REQUEST['txtfname'];
	 $newEmp -> editEmployee($_REQUEST['edit'], $_REQUEST['txtfname'], $_REQUEST['txtlname'], $_REQUEST['txtDate_birth'],
	 $_REQUEST['txtphone_num'],$_REQUEST['txtaddress'], $_REQUEST['txtrole'], $_REQUEST['txtemail'], $_REQUEST['txtgender'], $_REQUEST['txtsalary']);
//   //$msg = $pc->deleteEmployee($_SESSION['empID']);
   	header("Location: clinic_employee_search_view.php");
// 	}
 }

  
?>

</body>
</html>