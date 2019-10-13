<?php
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
$failureReason = $_POST['failureReason'];
$messageId = $_POST['id'];
$networkCode = $_POST['networkCode'];
$phoneNumber = $_POST['phoneNumber'];
$retryCount = $_POST['retryCount'];
$status = $_POST['status'];
$datelog = date("Y-m-d h:i:sa");
file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mjolnir/error.log',"\n[INFO] ".$datelog." STATUS ".$status." FAILURE REASON ".$failureReason." PHONE NUMBER ".$phoneNumber." MESSAGE ID ".$messageId." NUMBER OF RETRIES ".$retryCount,FILE_APPEND);
?>