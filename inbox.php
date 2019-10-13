<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
 $from = mysqli_real_escape_string($conn, $_POST['from']);
 $to = mysqli_real_escape_string($conn, $_POST['to']);
 $text = mysqli_real_escape_string($conn, $_POST['text']);
 $date = mysqli_real_escape_string($conn, $_POST['date']);
 $id = mysqli_real_escape_string($conn, $_POST['id']);
 $linkId = mysqli_real_escape_string($conn, $_POST['linkId']);
 $networkCode= mysqli_real_escape_string($conn, $_POST['networkCode']);
 $inboxArgs = array('phoneNumber' => $from);
 if(returnExists("messages", $inboxArgs)>0){
    $assignedUserId = getByValue("messages","assignedUser",$inboxArgs);
    $query = "INSERT INTO `messages`(`phoneNumber`,`shortCode`,`content`,`linkId`,`networkCode`,`assignedUser`)
    VALUES('$from','$to','$text','$linkId','$networkCode','$assignedUserId')";
 }else {
    $query = "INSERT INTO `messages`(`phoneNumber`,`shortCode`,`content`,`linkId`,`networkCode`)
    VALUES('$from','$to','$text','$linkId','$networkCode')";
 }
// run query
$saveDetails = mysqli_query($conn, $query);
if($saveDetails){
    $datelog = date("Y-m-d h:i:sa");
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mjolnir/sql.log',"\n[INFO] ".$datelog." Success Message from ".$from,FILE_APPEND);
}
else{
    $datelog = date("Y-m-d h:i:sa");
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mjolnir/sql.log',"\n[ERROR] ".$datelog." Message from ".$from." ".$conn->error,FILE_APPEND);
}