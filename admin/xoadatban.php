<?php
    require_once "../ketnoi.php";
    session_start();
    $id = $_GET["id"];
    // echo "$id";
    $xoa = "DELETE FROM `chitiet_datban` WHERE id = $id";  
    $result_order = mysqli_query($conn,$xoa);
    header("Location:nhanvien.php");
    
  

?>