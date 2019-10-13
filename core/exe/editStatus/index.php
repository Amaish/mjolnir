<?php
class editStatus
{
    private $editedStatus, $userID;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['editedStatus']) AND isset($_REQUEST['userID'])){
            
            // sanitize variables
            $this->editedStatus = mysqli_real_escape_string($conn, $_REQUEST['editedStatus']);
            $this->userID = mysqli_real_escape_string($conn, $_REQUEST['userID']);

            if ($this->editedStatus == "Active") {
                $sql = "UPDATE `users` SET `status` = 1 WHERE `id` = $this->userID";
                $editUser = mysqli_query($conn, $sql);
                if ($editUser) {
                    echo "1";
                } else {
                    echo $conn->error;
                }  
            } else {
                $sql = "UPDATE `users` SET `status` = 0 WHERE `id` = $this->userID";
                $editUser = mysqli_query($conn, $sql);
                if ($editUser) {
                    echo "1";
                } else {
                    echo $conn->error;
                }  
            }                   
        }
    }
}

$editStatus = new editStatus();

?>