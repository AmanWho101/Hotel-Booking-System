<?php
$DBserver = "localhost";
$DBname = "hotel";
$DBuser = "root";
$DBpass = "";

$conn = mysqli_connect($DBserver,$DBuser,$DBpass,$DBname);
if(!$conn){
    die(mysqli_connect_error($conn));
}

?>