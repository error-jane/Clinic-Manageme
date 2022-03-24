<?php
session_start();
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
<body>
<div class="container">
<div class="col-5 ">
	<div class="d-flex justify-content-center">
	<div class="wizard-header">
		<h3><b>LOG IN</b><br></h3>
	</div>
	</div>
	<form action = "clinic_login_ctrl.php" method = "post">
		
			<div>
				<label for="uname" ><b>Username</b></label>
				<input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
			</div><br>
			<div>
				<label for="psw" ><b>Password</b></label>
				<input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
			</div><br>   
			<!-- <input type="submit" value="LOG IN"/> -->
		<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?> 	
            <div>
                <button  type="submit" name="LOGIN" id="btn_logon" value="1" class="btn btn-primary btn-block">
					LOG IN
                </button>
            </div>
                    
		
		 
	</form>
	<div class="d-flex justify-content-center">
	<a href="clinic_registration_insert.php"  >Create new account</a>
	</div>
</div>
</div>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>