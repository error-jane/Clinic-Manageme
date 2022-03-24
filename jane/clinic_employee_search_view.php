<?php
  include 'DMC.php';
  include "clinic_employee_ctl.php";
  include "css.php";
  include "navbar-front.php";
  
  $dmcEmp = new DMC();
  
  $newEmp = new Clinic_Employee();

?>
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
<div class="col-md-9 offset-md-2">
<div class="container">
	<div class="wizard-header">
		<h2><b>Employee</b><br></h2>
	</div>
	
	<form action="clinic_employee_search_view.php" method = "post">
	
	<div class="d-flex flex-row">
	
		<div class = "col-sm-8">
		<input type="text" class="form-control" placeholder="Search for names..." name="search">
		</div>
		<div class = "col-sm-2">	
			<button  type="submit" name="in_search" id="btn_search" value="1" class="btn btn-primary btn-block">
				Search
            </button>
			<!-- <input type="submit" value="Search"/> -->
		</div>
		<div class = "col-sm-2">
		<button  type="submit" formaction="clinic_employee_insert_view.php" name="add" id="add" value="1" class="btn btn-primary btn-block">
			ADD
            </button>
			<!-- <input type="submit" formaction="clinic_employee_insert_view.php" value="ADD"> -->
		</div>
	</div>
	<br>
	<div>
	<table class="table">
		<tr>
			<th>employee_id</th>
			<th>email</th>
			<th>name</th>
			<th>role</th>
			<th>phone</th>
			<th>view</th>
			<th>edit</th>
		</tr>
	<?php
	if (empty($_POST['search'])){

		echo "";
	
	}else{
		$searchINPUT = $_POST['search'];

		$query = $newEmp -> searchEmployee($searchINPUT);
  	if($query){
    	while($result =  mysqli_fetch_assoc($query)){  
	?>
		<tr>
    	<td><?php echo $result["employeeID"];?></td>
    	<td><?php echo $result["email"];?></td>
    	<td><?php echo $result["name"];?></td>
    	<td><?php echo $result["role_name"];?></td>
		<td ><?php echo $result["phone_number"];?></td>
		<td >
		<form action = 'clinic_employee_detail_view.php' method = 'post'>
        	<button type='submit'  class="btn btn-outline-info" formaction = 'clinic_employee_detail_view.php' name='detail' value = <?php echo $result["employeeID"]; ?>>View</button>
  		</form>
  		</td>
		<td >
		<form action = 'clinic_employee_edit_view.php' method = 'post'>
        	<button type='submit'  class="btn btn-outline-warning" name = 'update' value = <?php echo $result["employeeID"]; ?>>Edit</button>
  		</form>
  		</td>
  		</tr>
		<?php
      	}
  		}
		}
		?>
	</table>
   </div>
</form>
</div>
</div>
</body>
</html>