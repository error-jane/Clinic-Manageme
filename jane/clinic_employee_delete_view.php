<?php
    session_start();
    $empID = $_SESSION['empID'];
    include "css.php";
    include "navbar-front.php";
    include 'DMC.php';
    include "clinic_employee_ctl.php";
    
    $dmcEmp = new DMC();
    
    $newEmp = new Clinic_Employee();
    if(!empty($_REQUEST['delete'])){
        if($_REQUEST['delete'] === "$empID")
        {

            $newEmp -> deleteEmployee($empID);
            header("Location: clinic_employee_search_view.php");
		    exit();
        }
    }
    
    
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> -->
        <title>Document</title> 
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
    
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!--     Fonts and icons     -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	
    </head>
    <div class="col-md-9 offset-md-2">
    <div class="container">    
<h2>Delete Employee</h2>


    <p>employeeID. <?php echo $empID;?></p>
  
<form action = "clinic_employee_delete_view.php" menthod = "post" class="inline-block">
    
    <input type = "submit" class="btn btn-outline-secondary" value = "CENCEL" formaction="clinic_employee_search_view.php">
    <button type='submit' class="btn btn-outline-danger" name='delete' value = <?php echo $empID; ?>>CONFIRM</button>
</form>

<!-- <form action = "clinic_employee_search_view.php" menthod = "post" >  
    <input type = "submit" class="btn btn-outline-secondary" value = "CENCEL">
</form>     -->

</div></div>
</html>