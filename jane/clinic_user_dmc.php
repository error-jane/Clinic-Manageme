<?php
class Clinic_User extends DMC
{
    public function checkUser($username,$password)
    {
        $sql = "
        SELECT *
        FROM userlogin
        WHERE username = '$username' AND password = '$password'";
        $result = $this->select($sql);
        $findUser = false;
        if(!$result){
            $findUser = false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username and $row['password'] === $password){
                $findUser = true;
             }
        }
        
        return $findUser ;
    }

    public function insertUser($email,$username,$password)
    {
        //$username = $obj['username'];
        //$password =$obj['password'];
        //$email = $obj['email'];
        $sql = "
        INSERT INTO userlogin 
        (username, password, email) 
        VALUES ('$username', '$password', '$email')";
        $this->insert($sql);
    }
}
?>