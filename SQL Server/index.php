<?php
$servername = "DESKTOP-8COBBVN";
$database = "SampleDB";
$username = "";
$password = "";

$connection = [
    "Database" => $database,
    "username" => $username,
    "password" => $password,
];

$conn = sqlsrv_connect($servername, $connection);
if (!$conn) {
   die(print_r(sqlsrv_errors(),true)); 
}else{
    echo 'connection successful';
}
