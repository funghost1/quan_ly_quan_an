<?php
    require_once "../ketnoi.php";
    session_start();

    if(isset($_POST["them"])){
        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $mota = $_POST["mota"];
        $loai = $_POST["loai"];
        $anh = $_POST["anh"];
        // echo "$loai";
        $them = "INSERT INTO `sanpham`( `ten_sp`, `gia_sp`, `so_luong`, `mota_sp`, `anh_sp`, `dm_sp`, `trang_thai_sp`) 
        VALUES ('$ten','$gia','$soluong','$mota','$anh','$loai','0')";
        $result_order = mysqli_query($conn,$them);
        header("Location:sanpham.php");
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hải Đăng</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../css/dangki.css">
</head>
<body>
<form class="modal-content" action="them.php" method ="post">
            <div class="container">
                <h1>Thêm Món Ăn</h1>
                <p>Admin có thể thêm một món ăn vào hệ thống.</p>
                <hr>
                <label for="ten"><b>Tên Món Ăn</b></label>
                <input class="input" type="text" placeholder="Tên món ăn" name="ten" required>

                

                <label for="gia"><b>Giá Món Ăn</b></label>
                <input class="input" type="text" placeholder="VNĐ" name="gia" required>
               

                <label for="soluong"><b>Số Lượng</b></label>
                <input class="input" type="text"  name="soluong" required> 

                <label for="psw-repeat"><b>Mô Tả</b></label>
                <input class="input" type="text" placeholder="Viết mô tả của bạn" name="mota" required>

                <label for="ten"><b>Loại</b></label>

                    <select name="loai" class="form-control">
                        <option value=""> --Chọn--</option>
                            <option value="1">  Lẩu </option>
                            <option value="2">  Xào </option>
                            <option value="3">  Nướng </option>
                            <option value="4">  Nước </option>
                            <option value="5">  Khác </option>
  
                    </select>
                    <br>
                    <br>

                <label for="psw-repeat"><b>Ảnh Sản Phẩm</b></label>
                <input type="file" checked="checked" name="anh" style="margin-bottom:15px"> 
         
                
                <div class="clearfix">
                    <!-- <a href="" class="cancelbtn">Trở về</a> -->
                    <a href="sanpham.php"><button type="button" class="cancelbtn">Trở Về</button> </a>
                    <button type="submit" class="signupbtn" name="them">Thêm Sản Phẩm</button>
                </div>
            </div>
        </form>
</body>

