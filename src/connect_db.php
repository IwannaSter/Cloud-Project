<?php
session_start();
$host = 'db'; // service name in docker-compose.yml file
$user = 'user';
$password = 'password';
$dbname = 'mydb';

$conn = new mysqli($host,$user,$password,$dbname); 

if($conn->connect_error){
    die("connection failed" . $conn->connect_error);
}
?>