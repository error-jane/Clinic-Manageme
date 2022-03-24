<!DOCTYPE HTML>  
<html>
<head>
        <!-- <meta charset="utf-8">
        <meta name="viewport" content="width=100%, height=100%, initial-scale=1, shrink-to-fit=no">  -->
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
        <title>Document</title> 
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
    
       

        <!--     Fonts and icons     -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	
    </head>
<body>  

<?php
include 'DMC.php';
include "clinic_employee_ctl.php";
include "css.php";
include "navbar-front.php";
//include "config.php";
$dmcEmp = new DMC();
$newEmp = new Clinic_Employee();

$result = $newEmp -> detailEmployee($_POST['detail']);

session_start();

$_SESSION['empID']  = $result['employeeID'];
$fname = $result['firstname'];
$lname = $result['lastname'];
$email = $result['email'];
$salary = $result['salary'];
$address = $result['address'];
$gender = $result['gender'];
$dateBirth = $result['date_of_birth'];
$role = $result['roleID'];
$phone = $result['phone_number'];
?>


<div class="container">
  <div class = "col-10 ">
<!--   Big container   -->
  <div>
        <!--      Wizard container        -->
            
                <!-- header -->
            <h2>Detail Employee</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    E-mail <input type="text" name="email" value="<?php echo $email;?>" class="form-control" disabled="disabled">
    <br>  
	  Role <select id="roleid" name="role" value="<?php echo $role;?>" class="form-control" disabled="disabled"> 
        <option value="1">Doctor</option>
        <option value="2">Staff</option>
        </select>  
    <br>
    First Name <input type="text" name="fname" value="<?php echo $fname;?>" class="form-control" disabled="disabled">
    <br>
    Last Name <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control" disabled="disabled">
    <br>
    Date of Birth <input type = "date" name = "Date_birth" value="<?php echo $dateBirth;?>" class="form-control" disabled="disabled" required>
    <br>
    Phone number <input type = "tel" name = "phone_num" value="<?php echo $phone;?>" class="form-control" disabled="disabled" required>
    <br>
    Address <textarea name="address" rows="5" cols="40" class="form-control" disabled="disabled"><?php echo $address;?></textarea>
    <br>
    Salary <input type = "text" name = "salary" value="<?php echo $salary;?>" class="form-control" disabled="disabled" required>
    <br>
    <div class = "col">
      Gender
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="1") echo "checked";?> value="1" class="form-control" disabled="disabled">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="2") echo "checked";?> value="2" class="form-control" disabled="disabled">Male
    </div>  
  
  <br>
  <div class = "col-12">
  <div class="d-flex flex-row-reverse">
                
                
    <input type = "submit"  class="btn btn-outline-danger" formaction = "clinic_employee_delete_view.php" value = "DELETE">  
  </div></div>
  </form>


  <div class = "col-12">
  <div class="d-flex flex-row-reverse">

  <form action = "clinic_employee_search_view.php" >
        <input type = "submit"  class="btn btn-outline-secondary" value = "CENCEL">
  </form>
  </div>
  </div>
</div>
</div>

</div>

</body>
</html>