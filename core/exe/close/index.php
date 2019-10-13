<?php

class closeMessage
{
    private $number;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['number'])){
            // sanitize variables
            $this->number = mysqli_real_escape_string($conn, $_REQUEST['number']);
            $formated_phone = "+".ltrim($this->number);
            $sql1 = "UPDATE `messages` SET `status` = 3, `assignedUser` = 0 WHERE `phoneNumber` = $formated_phone";
            $closeExecute = mysqli_query($conn, $sql1);
            if ($closeExecute) {
                echo "1";
            } else {
                echo $conn->error;
            }    
        }
    }
}
$closeMessage = new closeMessage();
?>