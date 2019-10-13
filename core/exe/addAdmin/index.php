<?php

class addAdmin
{
    private $add_Adminname, $add_Adminnumber, $add_Adminpassword;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['add_Adminname']) AND isset($_REQUEST['add_Adminnumber']) AND isset($_REQUEST['add_Adminpassword'])){
            
            // sanitize variables
            $this->add_Adminname = mysqli_real_escape_string($conn, $_REQUEST['add_Adminname']);
            $this->add_Adminnumber    = mysqli_real_escape_string($conn, $_REQUEST['add_Adminnumber']);
            $this->add_Adminpassword    = mysqli_real_escape_string($conn, $_REQUEST['add_Adminpassword']);
            
            if(empty($this->add_Adminname) OR empty($this->add_Adminnumber) OR empty($this->add_Adminpassword)){
                die('Kindly fill in all fields');
            }

            if(strlen($this->add_Adminpassword) < 6){
                die('The password should be at least 6 characters');
            }            
            // check phonenumber and format it.
            if(!ctype_digit($this->add_Adminnumber)){
                die('Invalid phone number format');
            }

            if(strlen($this->add_Adminnumber) !== 10){
                die('Invalid phone number');
            }

            $formated_phone = "+254".substr($this->add_Adminnumber, -9);
                
            //encrypt password
            $encpassword   = sha1($this->add_Adminpassword);
            
            // validate information to avoid duplicates
            $phonearguments = array('phoneNumber' => $formated_phone);
            if(returnExists('admins', $phonearguments) > 0){
                die('The phone number is already registered');
            }
            $sql = "INSERT INTO `admins`(`username`,`phoneNumber`,`password`) VALUES('$this->add_Adminname','$formated_phone','$encpassword')";
            $saveAdmin = mysqli_query($conn, $sql);
            if ($saveAdmin) {
                echo "1";
            } else {
                echo $conn->error;
            }
                     
        }
    }
}

$addAdmin = new addAdmin();

?>