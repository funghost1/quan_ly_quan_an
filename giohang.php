<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    require_once "ketnoi.php";
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <!--<link rel="stylesheet" href="css/style.css">-->
</head>
<h1>đây là giỏ hàng</h1>

<?php

    $id = $_GET["id"];
    $sql = "SELECT * FROM `sanpham` WHERE id_sp = $id";
    $result = mysqli_query($conn,$sql);
    $mang_giohang = array();
    foreach($result as $value){
        $mang_giohang[$value["id_sp"]] = $value;
    } 
    // $detail = $mang_giohang[$id];
    // echo "<pre>";
    // print_r($detail);

    if(isset($_POST["themvaogiohang"])){

        if(!isset($_SESSION["cart"]) || $_SESSION["cart"] == null){
            // mua 1 lần số lượn bằng 1
            $mang_giohang[$id]["so_luong1"] = 1;
            $_SESSION["cart"][$id] = $mang_giohang[$id];  
        }
        else{
            // kiểm tra sản phẩm có trong giỏ hàng chưa nếu có rồi thì +1
            if(array_key_exists($id, $_SESSION["cart"])){
                $_SESSION["cart"][$id]["so_luong1"] +=1;
            }else{
                $mang_giohang[$id]["so_luong1"] = 1;
                $_SESSION["cart"][$id] = $mang_giohang[$id];
            }
        }
            header("location:giohang_giaodien.php");

        // echo "<pre>";
        // print_r($_SESSION["cart"]);


    }
?>

</html>