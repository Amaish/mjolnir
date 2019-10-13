<?php
session_start();
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');


if(!isset($_SESSION['loggedadmin']) AND !isset($_SESSION['loggeduser'])){
    header('location:'.$root_path.'');
}

if(isset($_SESSION['loggedadmin'])){
    $unassigned_core = array('assignedUser'=>"0");
    $unassignedCore_ids = getManyByValue("messages", "id",$unassigned_core);
    if($unassignedCore_ids=="No Data Found"){
        $globalUnassignedMessages = 0;
    }
    else{
        $globalUnassignedMessages = sizeof($unassignedCore_ids);
    } 
    $fetch_array = array('phoneNumber' => $_SESSION['loggedadmin']);
    $adminId         = getByValue('admins', 'id', $fetch_array);
    $adminemail        = getByValue('admins', 'email', $fetch_array);
    $adminname            = getByValue('admins', 'username', $fetch_array);
    $adminNumber = substr_replace($_SESSION['loggedadmin'],"0",0,4);
}

if(isset($_SESSION['loggeduser'])){
    $fetch_array_user = array('phoneNumber' => $_SESSION['loggeduser']);
    $userId         = getByValue('users', 'id', $fetch_array_user);
    $useremail        = getByValue('users', 'email', $fetch_array_user);
    $username            = getByValue('users', 'username', $fetch_array_user);
    $userNumber = substr_replace($_SESSION['loggeduser'],"0",0,4);
    $unassigned_core = array('assignedUser'=>"0");
    $unassignedCore_ids = getManyByValue("messages", "id",$unassigned_core);
    $unassignedStatus = getManyByValue("messages", "status",$unassigned_core);
    $countsUnassigned = array_count_values($unassignedStatus);
    if($countsUnassigned['0']==null){
        $globalUnassignedMessages = 0;
    }
    else{
        $globalUnassignedMessages = $countsUnassigned['0'];
    }
    $notificationArgs = array('assignedUser'=>$userId);
    $inboxMessages = getManyByValue("messages", "status",$notificationArgs);
    $StatusPhoneArray = array_unique(getManyByValue("messages", "phoneNumber",$notificationArgs));        
    $counts = array_count_values($inboxMessages);
    if($counts['0']==null){
        $globalInboxMessages = 0;
        $cleanStatusArray=array();
    }
    else{
        $globalInboxMessages = $counts['0'];
        $cleanStatusArray=array();
        foreach ($StatusPhoneArray as $key => $assignedNumber) {
            $getStatusArgs = array('phoneNumber'=>$assignedNumber);
            $status = getByValue('messages', 'status', $getStatusArgs);
            if ($status==0) {
                array_push($cleanStatusArray,$assignedNumber);
            }
        }
    }
    $outboxArgs = array('user_id'=>$userId);
    $allInboxDates=getManyByValue("messages", "date",$notificationArgs);
    $allOutboxDates=getManyByValue("replies", "replied_on",$outboxArgs);
    foreach ($allInboxDates as $key => $date) {
        $dateRaw=date_create($date);
        $allInboxDates[$key] = date_format($dateRaw,"Y-m-d");
    }
    foreach ($allOutboxDates as $key => $sentDate) {
        $sentDateRaw=date_create($sentDate);
        $allOutboxDates[$key] = date_format($sentDateRaw,"Y-m-d");
    }
    $dateCounts = array_count_values($allInboxDates);
    $sentDateCounts = array_count_values($allOutboxDates);
    $enddate = strtotime(date("Y-m-d"));
    $startdate = strtotime("-1 week", $enddate);
    $inboxData=array();
    $outboxData=array();
    while ($startdate < $enddate) {
        $loopDate=date("Y-m-d", $startdate);
        if(array_key_exists($loopDate,$dateCounts) OR array_key_exists($loopDate,$sentDateCounts)){
            $rawLoopDate = date_create($loopDate);
            $inboxData[date_format($rawLoopDate,"D")]=$dateCounts[$loopDate];
            $outboxData[date_format($rawLoopDate,"D")]=$sentDateCounts[$loopDate];
        }else {
            $rawLoopDate = date_create($loopDate);
            $inboxData[date_format($rawLoopDate,"D")]=0;
            $outboxData[date_format($rawLoopDate,"D")]=0;
        }
        $startdate = strtotime("+1 day", $startdate);
    }
}
?>
