<?php 
include_once "../../config.php";
$id = '';
if(isset($_GET['deleteid'])){
if(!empty($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from room where roomid = '$id'";
    $rslt_r = $conn->query($sql);
    if($rslt_r == TRUE){
        
    header('location:../admin.php');
    $conn->close();
    }
}}


?>