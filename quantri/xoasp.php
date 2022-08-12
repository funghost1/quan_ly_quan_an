<?php
    require_once "../ketnoi.php";
    session_start();
    $id = $_GET["id"];
    // echo "$id";
    $xoa = "DELETE FROM `sanpham` WHERE id_sp = $id";  
    $result_order = mysqli_query($conn,$xoa);
    header("Location:sanpham.php");
    
  

?>