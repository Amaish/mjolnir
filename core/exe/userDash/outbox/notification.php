<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/loader.php');
include_once($_SERVER["DOCUMENT_ROOT"] . '/mjolnir/core/core.php');
$myObj->unassigned = $globalUnassignedMessages;
$myObj->inbox = $globalInboxMessages;
$myObj ->unread = implode(",",$cleanStatusArray);
$JSONdata = json_encode($myObj);
echo "data:{$JSONdata}\n\n";
?>