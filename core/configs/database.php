<?php
#db configs change them in prod
$server     = "localhost";
$username   = "maina";
#$username   = "morgan";#server user
$password   = "Ruth!99!";
#$password   = "Kunguma05";#server password
$database   = "mjolnir";

$conn = mysqli_connect($server, $username, $password, $database);

if($conn->error){
    echo $conn->error;
}
?>




