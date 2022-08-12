<?php  
    require_once "../ketnoi.php"; 
    $id = $_GET['id'];

    // echo "$id";

    $sql = "UPDATE `don_han` SET `trang_thai` = '3' WHERE `don_han`.`id` = $id;";
    $querydangcho = mysqli_query($conn,$sql);
    header("location:ds_donhang_dangcho.php");
?>


