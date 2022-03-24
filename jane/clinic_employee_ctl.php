<?php
include "clinic_employee_model.php";
class Clinic_Employee 
{

    public function checkEmail($email)
    {
        $empConn = new Clinic_Employee_Conn(); 
        $result = $empConn -> selectEmail($email);
        $findUser = false;
        if(!$result){
            $findUser = false;
        }
        else{
            $findUser = true;
        }
        
        return $findUser ;
    }

    public function newEmployee($firstname, $lastname, $date_of_birth, $phone_number, $address, $roleID, $email, $gender, $salary)
    {
        $empConn = new Clinic_Employee_Conn(); 
        $newEmp['firstname'] = $firstname;
        $newEmp['lastname'] = $lastname;
        $newEmp['date_of_birth'] = $date_of_birth;
        $newEmp['phone_number'] = $phone_number;
        $newEmp['address'] = $address;
        $newEmp['roleID'] = $roleID;
        $newEmp['email'] = $email;
        $newEmp['gender'] = $gender;
        $newEmp['salary'] = $salary;
        $newEmp['picture'] = "01003";
        $empConn->insertEmployee($newEmp);
        
    }

    public function searchEmployee($msg)
    {
        $empConn = new Clinic_Employee_Conn(); 
        $objEmp = $empConn -> getEmployeeSearch($msg);
        return($objEmp);
    }

    public function detailEmployee($empID)
    {
        $empConn = new Clinic_Employee_Conn(); 
        $objEmp = $empConn -> getDetailEmployeeSearch($empID);
        return($objEmp);
    }

    public function deleteEmployee($empID)
    {
        $empConn = new Clinic_Employee_Conn();
        $empConn -> removeEmployee($empID);
    }

    public function editEmployee($empID, $firstname, $lastname, $date_of_birth, $phone_number, $address, $roleID, $email, $gender, $salary)
    {
        $empConn = new Clinic_Employee_Conn();
        $newEmp['empID'] = $empID;
        $newEmp['firstname'] = $firstname;
        $newEmp['lastname'] = $lastname;
        $newEmp['date_of_birth'] = $date_of_birth;
        $newEmp['phone_number'] = $phone_number;
        $newEmp['address'] = $address;
        $newEmp['roleID'] = $roleID;
        $newEmp['email'] = $email;
        $newEmp['gender'] = $gender;
        $newEmp['salary'] = $salary;
        $newEmp['picture'] = "02";
        $empConn -> updateEmployee($newEmp);
    }    
}
?>
