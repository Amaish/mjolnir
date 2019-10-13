<?php

class replyUser
{
    private $reply, $number, $messageId;

    function __construct(){
        
        global $conn;        

        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
        include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
        
        if(isset($_REQUEST['reply']) AND isset($_REQUEST['number']) AND isset($_REQUEST['messageId'])){
            // sanitize variables
            $this->reply = mysqli_real_escape_string($conn, $_REQUEST['reply']);
            $this->number = mysqli_real_escape_string($conn, $_REQUEST['number']);
            $this->messageId = mysqli_real_escape_string($conn, $_REQUEST['messageId']);
            $linkIdargs = array('id' => $this->messageId);
            $linkId = getByValue("messages","linkId",$linkIdargs);
            $bulkSMSMode = 0;
            if(empty($this->reply)){
                die('Text box is empty message not sent');
            }else {
                $formated_phone = "+".ltrim($this->number);
                if (sendMessage($formated_phone,$this->reply,$bulkSMSMode,$linkId)){
                    $sql = "INSERT INTO `replies`(`content`,`phoneNumber`,`message_id`,`user_id`) VALUES('$this->reply','$formated_phone','$this->messageId','$userId')";
                    $sql2 = "UPDATE `messages` SET `assignedUser` = $userId, `status` = 2 WHERE `phoneNumber` = $formated_phone";
                    $replyExecute = mysqli_query($conn, $sql);
                    $messageUpdate = mysqli_query($conn, $sql2);
                    if ($replyExecute AND $messageUpdate) {
                        echo "1";
                    } else {
                        echo $conn->error;
                    } 
                }
            }  
        }
    }
}
$replyUser = new replyUser();
?>