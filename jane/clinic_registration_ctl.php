<?php
	include 'DMC.php';
    include "clinic_user_model.php";
    $clinicUS = new Clinic_User();
	#Receive data from the previous form
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = trim($_POST['confirmpassword']);
	$email = $_POST['email'];
	echo $username;
	#Connected successfully
	if($password == $confirmpassword){
 
        
        $clinicUS->insertUser($email,$username,$password);
		header("Location: clinic_login_view.php");
	//mysqli_query($conn, "INSERT INTO userlogin (username, password, email) VALUES
	//		('$username', '$password', '$email')");
	
	}else{
		header("Location: clinic_login_view.php");
	}
?>
