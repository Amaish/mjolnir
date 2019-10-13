<?php

function formSearchString($arguments)
{
    $string = "";
    foreach ($arguments as $key => $value) {
        $string .= "`" . $key . "`=" . "'" . $value . "' && ";
    }
    
    $conditions = substr($string, 0, -3);
    return $conditions;
}

function returnExists($table, $arguments)
{
    global $conn;
    $appendSearch = formSearchString($arguments);
    $formedQuery  = "SELECT * FROM $table WHERE " . $appendSearch . " ORDER BY id DESC";
    $getValues    = mysqli_num_rows(mysqli_query($conn, $formedQuery));
    return $getValues;
}

function getByValue($table, $column, $arguments)
{
    global $conn;
    $appendSearch = formSearchString($arguments);
    $formedQuery  = "SELECT * FROM $table WHERE " . $appendSearch . " ORDER BY id DESC";
    $executeQuery = mysqli_query($conn, $formedQuery);
    if (mysqli_num_rows($executeQuery) > 0) 
    {
        $getValues = mysqli_fetch_array($executeQuery);
        return $getValues[$column];
    } else {
        return false;
    }
}


function getManyByValue($table, $column, $arguments)
{
    global $conn;
    $databack     = "";
    $appendSearch = formSearchString($arguments);
    $formedQuery  = "SELECT * FROM $table WHERE " . $appendSearch . " ORDER BY id ASC";
    $executeQuery = mysqli_query($conn, "$formedQuery");
    if (mysqli_num_rows($executeQuery) > 0) 
    {
        while ($getValues = mysqli_fetch_array($executeQuery)) 
        {
            $databack .= $getValues[$column] . "~";
        }
        
        $columnArray = substr($databack, 0, -1);
        return explode("~", $columnArray);
    } else {
        return "No Data Found";
    }
}

// sends message for verification
function sendMessage($phoneNumber,$message,$bulkSMSMode,$linkId)
{
    require_once('smsGateway.php');
    #$username   = "sandbox";
    #$apikey     = "d41b43e99f6b962582c9566f17f9ef0504c8e69aa59af25137679f27cf7ad939";
    // $username = "amaina";
    // $apikey = "75c2402ce9d4209145fba99c7d6cb44d8d7ced0451059dceb15da45bb8c2541e";
    // $from = "20880";
    $username   = "tryneglobal";
    $apikey     = "8df32bbc04f9dcf8a81811c7b4d288f940f87fe2d1ec4a75947c62f48f3050ef";
    $from = "20437";
    $recipients = $phoneNumber;
    $messageLong    = $message."\n\nNB: The information contained on this text message is for general information purposes only. Whilst we endeavour to keep the information up to date and correct, Wakili Mkononi makes no representations or warranties of any kind, express or implied about the completeness or accuracy of the information provided. We respond to all messages within 24 hours of receipt except on weekends & public holidays.";    
    $options = array('linkId' => $linkId);
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try 
    {
        $results = $gateway->sendMessage($recipients, $messageLong, $from,$bulkSMSMode,$options); 
        $resultsLog = $results[0];
        $messageId = $resultsLog->messageId;
        $cost = $resultsLog->cost;
        $number = $resultsLog->number;
        $status = $resultsLog->status;
        $statusCode = $resultsLog->statusCode;
        $datelog = date("Y-m-d h:i:sa");
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mjolnir/error.log',"\n[INFO] ".$datelog." STATUS ".$status." STATUS CODE ".$statusCode." COST ".$cost." PHONE NUMBER ".$number." MESSAGE ID ".$messageId." MESSAGE ".$message,FILE_APPEND);
        return true;
    }
        catch ( AfricasTalkingGatewayException $e )
    {
        $datelog = date("Y-m-d h:i:sa");
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/mjolnir/error.log',"\n[ERROR] ".$datelog." Encountered an error while sending: ".$e->getMessage(),FILE_APPEND);
        return false;
    }
}

function updateBD($values, $table, $id){
    global $conn;
    $obj = new ArrayObject( $values );
    $iterator = $obj->getIterator();
    while( $iterator->valid() ){
        $key = $iterator->key();
        $value = $iterator->current();
        $sql = "UPDATE `$table` SET `$key` = '$value' WHERE `id`='$id'";
        if(mysqli_query($conn, $sql)){
            $response = "1";
        }else{
            $response = $conn->error;
        }
        $iterator->next();
    }
    return $response;
}

function getAll($table, $column)
{
    global $conn;
    $databack     = "";
    $formedQuery  = "SELECT * FROM $table ORDER BY $column ASC";
    $executeQuery = mysqli_query($conn, "$formedQuery");
    if (mysqli_num_rows($executeQuery) > 0) {
        while ($getValues = mysqli_fetch_array($executeQuery)) {
            $databack .= $getValues[$column] . ",";
        }
        
        $columnArray = substr($databack, 0, -1);
        return explode(",", $columnArray);
    } else {
        return "No Data Found";
    }
}


?>