<?php 
include_once "../../config.php";
$id = '';
if(isset($_GET['deleteid'])){
if(!empty($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from reception where recepid = '$id'";
    $rslt = $conn->query($sql);
    if($rslt == TRUE){
        
    header('location:../admin.php');
    $conn->close();
    }
}}


?>