<?php
#db configs change them in prod
$server     = "localhost";
$username   = "username";
$password   = "password";
$database   = "database";

$conn = mysqli_connect($server, $username, $password, $database);

if($conn->error){
    echo $conn->error;
}
?>




