<?php


class LogInUser
{

    private $userPhoneNumber, $userpassword;

    function __construct(){
        
        session_set_cookie_params(1200);

        session_start();
        
        global $conn;
        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        
        if(isset($_REQUEST['userPhoneNumber']) AND isset($_REQUEST['userpassword'])){
            
            // sanitize variables

            $this->userPhoneNumber = mysqli_real_escape_string($conn, $_REQUEST['userPhoneNumber']);
            $this->userpassword    = mysqli_real_escape_string($conn, $_REQUEST['userpassword']);

            
            
            if(empty($this->userPhoneNumber) OR empty($this->userpassword)){
                die('Please fill all fields');
            }
            // check phonenumber length
            if(!ctype_digit($this->userPhoneNumber)){
                die('Invalid phone number format');
            }

            if(strlen($this->userPhoneNumber) !== 10){
                die('Invalid phone number');
            }

            // format phone
            $formated_phone = "+254".substr($this->userPhoneNumber, -9);
            
            if(strlen($this->userpassword) < 6){
                die('The password should be at least 6 characters');
            }

            //encrypt password
            $encpassword   = sha1($this->userpassword);
            
            // validate information to avoid duplicates
            $account_arguments = array('phoneNumber' => $formated_phone, 'password' => $encpassword);
        
            if(returnExists('users', $account_arguments) == 0){
                die('Invalid username and password');
            }

            $_SESSION['loggeduser'] = $formated_phone;
            echo "1";
            
        }
    }
}

$logInUser = new LogInUser();

?>
