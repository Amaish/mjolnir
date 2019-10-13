<?php

class EditAdmin
{
    private $new_adminname, $new_adminNumber, $new_adminemail, $new_adminpassword;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['new_adminpassword'])){
            
            // sanitize variables
            $this->new_adminpassword = mysqli_real_escape_string($conn, $_REQUEST['new_adminpassword']);
            $this->new_adminNumber    = mysqli_real_escape_string($conn, $_REQUEST['new_adminNumber']);
            $this->new_adminname    = mysqli_real_escape_string($conn, $_REQUEST['new_adminname']);
            $this->new_adminemail    = mysqli_real_escape_string($conn, $_REQUEST['new_adminemail']);
            
            if(empty($this->new_adminpassword)){
                die('The password field cannot be empty');
            }

            if(strlen($this->new_adminpassword) < 6){
                die('The password should be at least 6 characters');
            }
            
            // check phonenumber if present.
            if(!empty($this->new_adminNumber)){
                if(!ctype_digit($this->new_adminNumber)){
                    die('Invalid phone number format');
                }
    
                if(strlen($this->new_adminNumber) !== 10){
                    die('Invalid phone number');
                }

                $formated_phone = "+254".substr($this->new_adminNumber, -9);
            }else {
                $fetch_number_array = array('id' => $adminId);
                $formated_phone = getByValue('admins', 'phoneNumber', $fetch_number_array );
            }

            //validate email
            // if (!filter_var($this->new_adminemail, FILTER_VALIDATE_EMAIL)) {
            //     die('Invalid email format');
            // }

                
            //encrypt password
            $encpassword   = sha1($this->new_adminpassword);
            
            // validate information to avoid duplicates
            $admin_arguments = array('id' => $adminId, 'password' => $encpassword);
            if(returnExists('admins', $admin_arguments) == 0){ #check this logic with a != sign
                die('Invalid password');
            }
            
            if(!empty($this->new_adminNumber) OR !empty($this->new_adminname) OR !empty($this->new_adminemail)){
                if(!empty($this->new_adminname)){
                    $values["username"]= $this->new_adminname;
                }
                if(!empty($this->new_adminemail)){
                    $values["email"]= $this->new_adminemail;
                }
                if(!empty($this->new_adminNumber)){
                    $values["phoneNumber"]= $formated_phone;
                }
            }
            echo updateBD($values,"admins",$adminId);
            $_SESSION['loggedadmin'] = $formated_phone;           
        }
    }
}

$EditAdmin = new EditAdmin();

?>