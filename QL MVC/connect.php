<?php
$server="127.0.0.1";
$username="root";
$database="admin";
$password = "";
$conn=new mysqli($server,$username,$password,$database);
if($conn->connect_error){
    die("connection false:".$conn->connect_error);
}
?>
