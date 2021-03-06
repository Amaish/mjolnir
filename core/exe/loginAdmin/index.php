<?php


class LogInAdmin
{

    private $adminPhoneNumber, $adminpassword;

    function __construct(){

        session_set_cookie_params(1200);

        session_start();
        
        global $conn;
        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        
        if(isset($_REQUEST['adminPhoneNumber']) AND isset($_REQUEST['adminpassword'])){
            
            // sanitize variables

            $this->adminPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['adminPhoneNumber']);
            $this->password    = mysqli_real_escape_string($conn, $_REQUEST['adminpassword']);

            
            
            if(empty($this->adminPhoneNumber) OR empty($this->password)){
                die('Please fill all fields');
            }
            
            // check phonenumber length
            if(!ctype_digit($this->adminPhoneNumber)){
                die('Invalid phone number format');
            }

            if(strlen($this->adminPhoneNumber) !== 10){
                die('Invalid phone number');
            }

            // format phone
            $formated_phone = "+254".substr($this->adminPhoneNumber, -9);

            if(strlen($this->password) < 6){
                die('The password should be at least 6 characters');
            }

            //encrypt password
            $encpassword   = sha1($this->password);
            
            // validate information to avoid duplicates
            $admin_arguments = array('phoneNumber' => $formated_phone, 'password' => $encpassword);
            if(returnExists('admins', $admin_arguments) == 0){
                die('Invalid username and password');
            }

            $_SESSION['loggedadmin'] = $formated_phone;
            echo "1";
            
        }
    }
}

$logInAdmin = new LogInAdmin();

?>
