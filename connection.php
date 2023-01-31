<?php
$server="localhost";
$user="root";
$pass="";
$db="school";

$conn=mysqli_connect($server,$user,$pass,$db);

if($conn){
    //echo "Connection success";
}
else{
    echo "connection failed ".mysqli_connect_error();
}
?>