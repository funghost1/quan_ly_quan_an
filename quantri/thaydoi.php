<?php
    require_once "../ketnoi.php";
    session_start();
    $id = $_GET["id"];
    if(isset($_POST["them"])){
        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $mota = $_POST["mota"];
        $loai = $_POST["loai"];
        $anh = $_POST["anh"];
        $id1 = $_POST["id"];
        $trang_thai = $_POST["trang_thai"];
        $them = "UPDATE `sanpham` SET `ten_sp`= '$ten',`gia_sp`='$gia',`so_luong`='$soluong',`mota_sp`='$mota',`anh_sp`='$anh',`dm_sp`='$loai', `trang_thai_sp`='$trang_thai' WHERE `id_sp` = '$id1'";  
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
<form class="modal-content" action="thaydoi.php" method ="post">
            <div class="container">
                <h1>Sử Thông Tin Món Ăn</h1>
                <p>Admin có thể sửa thông một món ăn.</p>
                <hr>

                <?php
               
                $sql = "SELECT * FROM `sanpham` WHERE id_sp = $id";
                $sanpham = mysqli_query($conn,$sql);               
                while($row= mysqli_fetch_array($sanpham)){ 
                ?>
                <label for="ten"><b>Tên Món Ăn</b></label>
                <input class="input" type="text"  value="<?php echo $row['ten_sp']; ?>" name="ten" required>

                

                <label for="gia"><b>Giá Món Ăn</b></label>
                <input class="input" type="text"  value="<?php echo $row['gia_sp']; ?>" name="gia" required>
               

                <label for="soluong"><b>Số Lượng</b></label>
                <input class="input" type="text"  name="soluong"  value="<?php echo $row['so_luong']; ?>" required> 

                <label for="psw-repeat"><b>Mô Tả</b></label>
                <input class="input" type="text"  value="<?php echo $row['mota_sp']; ?>" name="mota" required>

                <label for="ten"><b>Loại</b></label>

                    <select name="loai" class="form-control">
                        <option value="<?php echo $row['dm_sp']; ?>"> --Chọn--</option>
                            <option value="1">  Lẩu </option>
                            <option value="2">  Xào </option>
                            <option value="3">  Nướng </option>
                            <option value="4">  Nước </option>
                            <option value="5">  Khác </option>
  
                    </select>
                    <label for="ten"><b>Trạng Thái</b></label>
                    
                    <select name="trang_thai" class="form-control">
                        <option value="<?php echo $row['trang_thai_sp']; ?>"> --Chọn--</option>
                            <option value="0">  Bình Thường </option>
                            <option value="1">  SP Mới </option>
                            <option value="2">  SP Hot </option>
                            

                    </select>
                    <br>
                    <br>

                <label for="psw-repeat"><b>Ảnh Sản Phẩm</b></label>
                <input type="file"  checked="checked" name="anh" value="<?php echo $row['anh_sp']; ?>" style="margin-bottom:15px"> 
                <input type="hidden" name="id" value="<?php echo $id;?>">
         
                <?php } ?>
                <div class="clearfix">
                    <!-- <a href="" class="cancelbtn">Trở về</a> -->
                    <a href="sanpham.php"><button type="button" class="cancelbtn">Trở Về</button> </a>
                    <button type="submit" class="signupbtn" name="them">Sửa Sản Phẩm</button>
                </div>
            </div>
        </form>
</body>

