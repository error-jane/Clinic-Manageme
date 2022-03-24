<!doctype html>
<?php
include 'DMC.php';
include "clinic_employee_ctl.php";

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

    <?php $address = ""?>


    <body>
        <!--   Big container   -->
        <div class="container">
        <!--      Wizard container        -->
            <div class="card wizard-card" data-color="blue" >
                <!-- header -->
                <form id="myform1" name="form1" method="post" action="" novalidate>

                <div class="wizard-header">
                    <h3>
                    <b>DETAIL</b> EMPLOYEE <br>
                    <!-- <small>This information will let us know more about you.</small> -->
                    </h3>
                </div>

                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->   
                           
                <div class="picture-container" > 
                    <div class="picture" data-color="red">
                        <img src="assets/img/default-avatar.png" class="picture-src" id="imgPlaceholder" title=""/>
                        <input type="file"  name="file_Upload" id="wizard-picture"  required>     
                    </div>
                    <h6>Choose Picture</h6>
                    </div>
                   
                <!-- group input -->
                <div class = "col-11">      
                    <div class="form-group row">
            
                        <label for="input_email" class="col-sm-2 col-form-label text-right">Email</label>
                        <div class="col-4">
                            <input type="email" class="form-control" name="input_email" id="input_email"
                            pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                            placeholder = "Email"
                            autocomplete="off" value = "<?php echo $email;?>"  disabled="disabled"  required>
                            <div class="invalid-feedback">
                                Please enter email
                            </div>            
                        </div>

            
                        <label for="select_role" class="col-sm-2 col-form-label text-right">Role</label>
                        <div class="col-4">
                            <select class="custom-select "  name="select_role" id="select_role" value = "<?php echo $role;?>"  disabled="disabled" required>
                                <option value="1">Doctor</option>
                                <option value="2">Staff</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select role
                            </div>           
                        </div>    
                    </div>
                            
                      
                    <div class="form-group row">
            
                        <label for="fname" class="col-sm-2 col-form-label text-right">First name</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="fname" id="fname"
                            pattern="[a-zA-Zก-ํ.]{1,}"  disabled="disabled" 
                            placeholder="First Name" autocomplete="off" value="<?php echo $fname;?>"  required>
                            <div class="invalid-feedback">
                                Please enter first name (except 0-9)
                            </div>      
                        </div>


                        <label for="lname" class="col-sm-2 col-form-label text-right">Last name</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="lname" id="lname"
                            pattern="[a-zA-Zก-ํ]{1,}"  disabled="disabled" 
                            placeholder="Last Name" autocomplete="off" value="<?php echo $lname;?>"  required>
                            <div class="invalid-feedback">
                                Please enter last name (except -,*+/.0-9)
                            </div>      
                        </div>
                    </div>

                    <div class="form-group row">
          
                        <label for="input_date" class="col-sm-2 col-form-label text-right">Date of Birth</label>
                        <div class="col-4">
                            <input type="date" class="form-control" name="input_date" id="input_date"  onchange="findAge()"
                            autocomplete="off" value = "<?php echo $dateBirth;?>" disabled="disabled" required>
                            <div class="invalid-feedback">
                                Please enter date of birth
                            </div>      
                        </div>

          
                        <label for="displayAge" class="col-sm-2 col-form-label text-right">Age</label>
                        <div class="col-4">
                            <input type="text" class="form-control" disabled="disabled" id="output_Age">
                        </div>
                    </div>

                    <div class="form-group row">
         
                        <label for="input_tel" class="col-sm-2 col-form-label text-right">Phone</label>
                        <div class="col-4">
                            <input type="text" class="form-control" name="input_tel" id="input_tel"
                            pattern="[0-9]{10}$"  disabled="disabled" 
                            maxlength ="10" placeholder = "Phone number" autocomplete="off" value = "<?php echo $phone;?>"  required>
                            <div class="invalid-feedback">
                                Please enter phone number (except -,*+/.)
                            </div>      
                        </div>


                        <legend class="col-form-label col-sm-2 pt-0 text-right">Gender</legend>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input col-sm-2" type="radio"
                                name="select_gender" id="gender_1" <?php if (isset($gender) && $gender=="01") echo "checked";?>
                                value="01"  disabled="disabled" required>
                                <label class="form-check-label " for="gender_1">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input col-sm-2" type="radio"
                                name="select_gender" id="gender_2" <?php if (isset($gender) && $gender=="02") echo "checked";?>
                                value="02"  disabled="disabled"  required>
                                <label class="form-check-label" for="gender_2">Female</label>
                                <div class="invalid-feedback">
                                    Please select gender
                                </div>
                            </div>                      
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="textarea_address" class="col-sm-2 col-form-label text-right">Address</label>
                        <div class="col">
                            <textarea class="form-control" name="textarea_address" id="textarea_address" rows="5" cols="40"  disabled="disabled" required>
                            <?php echo $address;?>
                            </textarea>
                            
       
                        </div>   
                    </div>     
        
                    <div class="form-group row">
                        <label for="input_salary" class="col-sm-2 col-form-label text-right">Salary</label>
                        <div class="col">
                            <input type="number" class="form-control" disabled="disabled" name="input_salary" id="input_salary"
                            placeholder = "Salary"  
                            autocomplete="off"  value="<?php echo $salary;?>" min="10000" max="99999" required>
                            <div class="invalid-feedback">
                                Please enter salary
                            </div>      
                        </div>
                    </div>  
                    <br><br>

  
                    
                    <div class="d-flex flex-row-reverse">
                        <div>
                            <input type = "submit"  class="btn btn-outline-primary" formaction = "clinic_employee_delete_view.php" value = "DELETE">  
                            <!-- <button  type="submit" name="delete" id="btn_delete" value="1" class="btn btn-primary btn-block">
                            DELETE
                            </button> -->
                        </div>
                    </div>
                    
                </div>
                
                
                
                <!-- End group input -->
                </form> 
                <br>
                <div class = "col-11">
                <form action = "clinic_employee_search_view.php">
                <div class="d-flex flex-row-reverse">
                
                <div>
                    <button  type="submit" name="Cencle" id="btn_cencle" value="1" class="btn btn-primary btn-block">
                        Cencle
                    </button>
                </div>
                </div>
                </form>  
                </div>    

            </div>

            <!--   Core JS Files   -->
	        <!-- <script src="assets/js/jquery-2.2.4.min.js"></script>
	        <script src="assets/js/bootstrap.min.js"></script>
	        <script src="assets/js/jquery.bootstrap.wizard.js"></script> -->

	        <!--  Plugin for the Wizard -->
	        <!-- <script src="assets/js/gsdk-bootstrap-wizard.js"></script> -->

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

function findAge() {
    var Bdate = document.getElementById('input_date').value;
    var Bday = +new Date(Bdate);
    Q4A = ~~ ((Date.now() - Bday) / (31557600000));
    //document.getElementById('resultBday').innerHTML = Q4A;

    document.getElementById('output_Age').value = Q4A;
}

function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#wizard-picture").change(function () {
      readURL(this);
    });
</script>
</body>
 
  


<?php 

if(isset($_POST['input_email']))
{
  if($newEmp -> checkEmail($_REQUEST['input_email'])){
    echo("can not use this email");
  }else{

    if(isset($_POST['submit']))
  {
  
  $file = $_REQUEST['file_Upload'];

  $salary =  $_REQUEST['input_salary'];

  $address = $_REQUEST['textarea_address'];

  $gender = $_REQUEST['select_gender'];

  $phone =  $_REQUEST['input_tel'];

  $dateBirth =  $_REQUEST['input_date'];

  $lname =  $_REQUEST['lname'];

  $fname =  $_REQUEST['fname'];

  $email = $_REQUEST['input_email'];

  $role = $_REQUEST['select_role'];

  
  
  $newEmp -> newEmployee($fname, $lname, $dateBirth, $phone, $address, $role, $email, $gender, $salary);
  echo($fname." insert success");
  //header("Location: clinic_employee_search_view.php");
  }

  }
}  


?>
</html>
