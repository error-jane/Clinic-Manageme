<?php
class Clinic_Employee_Conn extends DMC
{
    public function insertEmployee($obj)
    {
        $firstname = $obj['firstname'];
        $lastname = $obj['lastname'];
        $date_of_birth = $obj['date_of_birth'];
        $phone_number = $obj['phone_number'];
        $address = $obj['address'];
        $roleID = $obj['roleID'];
        $email = $obj['email'];
        $gender = $obj['gender'];
        $salary = $obj['salary'];
        $picture = "";
        
        $sql = "
        INSERT INTO `employee` 
        (`employeeID`, `firstname`, `lastname`, `date_of_birth`, `phone_number`, `age`, `address`, `roleID`, `email`, `gender`, `salary`, `pictureID`)
        VALUES 
        ('610510611', '$firstname', '$lastname', '$date_of_birth', '$phone_number', '22', '$address', '$roleID', '$email', '$gender', '$salary', '02')";
        $this->insert($sql);
    }

    public function getEmployeeSearch($msg)
    {
        //$sql = "SELECT * FROM employee WHERE firstname LIKE '$msg%'";
        $sql = 
        "SELECT employeeID, 
        CONCAT(firstname, ' ', lastname) AS name, 
        phone_number, 
        role.rolename as role_name, 
        email  
        FROM employee
        INNER JOIN  role
        ON role.roleid = employee.roleID
        WHERE employee.firstname LIKE '$msg%' OR role.rolename LIKE '$msg%'";
        $objEmployee = $this->select($sql);
        return $objEmployee;
    }   

    public function getDetailEmployeeSearch($empID)
    {
        $sql = "SELECT * FROM employee WHERE employeeID LIKE '$empID'";
        $result = $this->select($sql);
        $objEmployee = mysqli_fetch_assoc($result);
        return $objEmployee;
    }

    public function removeEmployee($empID)
    {
        $sql = "DELETE FROM employee WHERE employeeID = '$empID'";
        $this->delete($sql);
    }

    public function updateEmployee($obj)
    {
        $empID = $obj['empID'];
        $firstname = $obj['firstname'];
        $lastname = $obj['lastname'];
        $date_of_birth = $obj['date_of_birth'];
        $phone_number = $obj['phone_number'];
        $address = $obj['address'];
        $roleID = $obj['roleID'];
        $email = $obj['email'];
        $gender = $obj['gender'];
        $salary = $obj['salary'];
        $picture = "01";
        $sql = "UPDATE employee 
        SET firstname ='$firstname', lastname ='$lastname', date_of_birth ='$date_of_birth',
        phone_number='$phone_number', `address` ='$address', roleID='$roleID',email ='$email',
        gender='$gender', salary='$salary', pictureID='$picture'
        WHERE employeeID = '$empID'";
        $this->update($sql);
    }
}
?>
