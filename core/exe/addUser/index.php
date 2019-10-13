<?php

class addUser
{
    private $new_name, $new_number, $new_password;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['new_name']) AND isset($_REQUEST['new_number']) AND isset($_REQUEST['new_password'])){
            
            // sanitize variables
            $this->new_name = mysqli_real_escape_string($conn, $_REQUEST['new_name']);
            $this->new_number    = mysqli_real_escape_string($conn, $_REQUEST['new_number']);
            $this->new_password    = mysqli_real_escape_string($conn, $_REQUEST['new_password']);
            
            if(empty($this->new_name) OR empty($this->new_number) OR empty($this->new_password)){
                die('Kindly fill in all fields');
            }

            if(strlen($this->new_password) < 6){
                die('The password should be at least 6 characters');
            }            
            // check phonenumber and format it.
            if(!ctype_digit($this->new_number)){
                die('Invalid phone number format');
            }

            if(strlen($this->new_number) !== 10){
                die('Invalid phone number');
            }

            $formated_phone = "+254".substr($this->new_number, -9);
                
            //encrypt password
            $encpassword   = sha1($this->new_password);
            
            // validate information to avoid duplicates
            $phonearguments = array('phoneNumber' => $formated_phone);
            if(returnExists('admins', $phonearguments) > 0){
                die('The phone number is already registered');
            }
            $sql = "INSERT INTO `users`(`username`,`phoneNumber`,`password`,`created_by`) VALUES('$this->new_name','$formated_phone','$encpassword','$adminId')";
            $saveUser = mysqli_query($conn, $sql);
            if ($saveUser) {
                echo "1";
            } else {
                echo $conn->error;
            }
                     
        }
    }
}

$addUser = new addUser();

?>