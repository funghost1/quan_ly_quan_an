
<?php
    require_once "../ketnoi.php";
    session_start();
    $id = $_GET["id"];
     echo "$id";
    $xoa = "DELETE FROM `thanh` WHERE id_tv = $id";  
    $result_order = mysqli_query($conn,$xoa);
    header("Location:ds_thanhvien.php");

?>
