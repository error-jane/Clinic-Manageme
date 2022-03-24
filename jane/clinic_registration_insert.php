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
<?php $password = ""?>
<body>
<div class="container">
<div class="col-5 ">
	<form id="myform1" name="form1" method="post" action="" novalidate>
	<div class="d-flex justify-content-center">
		<div class="wizard-header">
        	<h3>
        	<b>SING UP</b><br>
    		<!-- <small>This information will let us know more about you.</small> -->
        	</h3>
    	</div>
		</div>
		<label for="email" >Email</label>
                        
            <input type="email" class="form-control" name="email" id="email"
                pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                placeholder = "Email"
                autocomplete="off" value = "" required>
            <div class="invalid-feedback">
                Please enter email
            </div>            
        
		<br>
		<label for="username" >Username</label>
                        
            <input type="text" class="form-control" name="username" id="username"
                pattern="[a-zA-Z]{1,}"
                placeholder = "Username"
                autocomplete="off" value = "" required>
            <div class="invalid-feedback">
                Please enter username (except -,*+/.0-9)
            </div> 
		<!-- Username <input type = "text" class="form-control" 
		placeholder = "Username" name = "username"> -->
		<br>
		
		<label for="password" >Password</label>
                        
            <input type="password" class="form-control" name="password" id="password"
				
                placeholder = "Password"
                autocomplete="off" value = "" required>
            <div class="invalid-feedback">
                Please enter password 
            </div> 
		<!-- Password <input type = "password" class="form-control" 
		placeholder = "Password" name = "password"> -->
		<br>
		<label for="confirmpassword" >Confirm Password</label>
                        
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"
                placeholder = "Confirm Password"
                autocomplete="off" value = "" required>
            <div class="invalid-feedback">
                Please enter confirm password
            </div> 
		<!-- Confirm Password <input type = "password" class="form-control" 
		placeholder = "Confirm Password" name = "confirmpassword"> -->
		<br>


	
		
		<div>
		<button  type="submit" name="singup" id="btn_singup" value="1" class="btn btn-primary btn-block">
		SING UP
    	</button>
		</div>
		
	
	</form>
	<br>
	<form action="clinic_login_view.php">
	<div>
		<button  type="submit"  name="cencle" id="btn_cencle" value="1" class="btn btn-primary btn-block">
		CENCEL
    	</button>
		</div>
		</form>
</div>	
</div>

<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(function(){
     $("#myform1").on("change",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });

     $("#myform1").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });       
});

</script>

</body>
</html>
<?php
	include 'DMC.php';
    include "clinic_user_model.php";
    $clinicUS = new Clinic_User();
	
	if(isset($_POST['singup']))
  {
	#Receive data from the previous form
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = trim($_POST['confirmpassword']);
	$email = $_POST['email'];
	
	$check ="";
	$result = $clinicUS->checkUserByName($username);
	#Connected successfully
	if($clinicUS->checkEmail($email)){
		if($password == $confirmpassword){
			
			if($result){
				$check = mysqli_fetch_assoc($result);
			
			
			if($check['username'] == $username &&$check['email'] == $email){
				echo "this user insert alrady";
			}else{
				echo "change username";
			}
			}else{
				if(!$check){
				$clinicUS->insertUser($email,$username,$password);
				echo "insert new User success";}
			}
        
		}else{
			echo "confirmpassword not correct";
		}
	}else{
		echo "this email can not insert";
	}

}

?>
