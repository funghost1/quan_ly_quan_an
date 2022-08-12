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


<?php

    // $id = $_GET["id"];
    // $sql = "SELECT * FROM `sanpham` WHERE id_sp = $id";
    // $result = mysqli_query($conn,$sql);
    // $mang_giohang = array();
    // foreach($result as $value){
    //     $mang_giohang[$value["id_sp"]] = $value;
    // } 
    // // $detail = $mang_giohang[$id];
    // // echo "<pre>";
    // // print_r($detail);

    if(isset($_POST["themvaodatban"])){
        if($_POST["soban"] == 0 ){
            header("location:nhanvien.php");
        }else{

        $soban = $_POST["soban"];
        $id_sp = $_POST["id_sp"];
        $ten_sp = $_POST["ten_sp"];
        $gia = $_POST["gia"];
        $anh = $_POST["anh"];
        $sl = $_POST["sl"];
        $sl1 = $sl - 1;

        // print_r($id_sp);
        $sql = "SELECT * FROM `dat_ban` WHERE so_ban = $soban";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($result)) {
            $iddatban = $row['id'];
        }
        // print_r($iddatban);
        $sqlchitiet = "SELECT * FROM `chitiet_datban` WHERE so_ban = $soban";
        $result = mysqli_query($conn,$sqlchitiet);
        // $soluong = 0;
        while ($row = mysqli_fetch_array($result)) {
            if($row['id_san_pham'] == $id_sp){
                $soluong = $row['so_luong'] + 1;
                $id = $row['id'];
                // $sqlcapnhap = "UPDATE `chitiet_datban` SET `so_luong` = '$soluong' WHERE `chitiet_datban`.`id` = $id";
                // $result = mysqli_query($conn,$sqlcapnhap);
            }
        }
        if(isset($soluong)){
            $sqlcapnhap = "UPDATE `chitiet_datban` SET `so_luong` = '$soluong' WHERE `chitiet_datban`.`id` = $id";
            $result = mysqli_query($conn,$sqlcapnhap);

            $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$sl1' WHERE `sanpham`.`id_sp` = $id_sp;";
            $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
        }else{
            $sqlthemmon = "INSERT INTO `chitiet_datban` (`id`, `id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`, `so_ban`) VALUES 
            (NULL, '$id_sp', 1, '$iddatban', '$ten_sp', '$gia', '$anh', '$soban')";
            $result = mysqli_query($conn,$sqlthemmon);

            $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$sl1' WHERE `sanpham`.`id_sp` = $id_sp;";
            $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
        }

        header("location:nhanvien.php");
    }
    }
?>

</html>