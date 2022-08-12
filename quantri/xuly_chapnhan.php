<?php  
    require_once "../ketnoi.php"; 
    $id = $_GET['id'];

    // echo "$id";

    $sql = "UPDATE `don_han` SET `trang_thai` = '2' WHERE `don_han`.`id` = $id;";
    $querydangcho = mysqli_query($conn,$sql);
    header("location:ds_donhang_damua.php");
?>


