<?php
session_start();
include 'DMC.php';
include "clinic_user_model.php";
$clinicUS = new Clinic_User();
$error = "username/password incorrect";
  if (isset($_POST['uname']) && isset($_POST['psw'])){
	  $username = $_POST['uname'];
	  $password = $_POST['psw'];
	  
	  	if($clinicUS -> checkUser($username,$password)){
		  header("Location: clinic_employee_search_view.php");
		}
		else{
			$_SESSION["error"] = $error;
			header("Location: clinic_login_view.php");
			exit();
		}
	  }
  else{
	  exit();
  }
?>
