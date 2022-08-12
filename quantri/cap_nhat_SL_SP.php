<?php 
session_start();
require_once "../ketnoi.php";
if(isset($_POST['capnhat'])){
    $soluong = $_POST["soluong"];
    $id = $_POST["id"];
    $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$soluong' WHERE `sanpham`.`id_sp` = $id;";
    $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
    header("location:sanpham.php");
    // echo $id;
}
?>