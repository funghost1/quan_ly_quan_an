<?php
    require_once "ketnoi.php";
    session_start();

    if (isset($_POST['login'])){
        $Username = $_POST['tk'];
        $Pass = $_POST['mk'];

    $select = mysqli_query($conn," SELECT * FROM thanh WHERE tai_khoan = '$Username' AND mat_khau = '$Pass'");
    $row  = mysqli_fetch_array($select);
    if(is_array($row)) {
        if($row['quyen']==1){
            $_SESSION["Username_nhanvien"] = $row['id_tv'];
        }elseif($row['quyen']==2){
            $_SESSION["Username_admin"] = $row['id_tv'];
        }elseif($row['quyen']==0){
            $_SESSION["Username"] = $row['tai_khoan'];
            $_SESSION["Pass"] = $row['mat_khau'];
            $_SESSION["id_thanhvien"] = $row['id_tv'];
            $_SESSION["ten_thanhvien"] = $row['ten_tv'];
            $_SESSION["anhdaidien"] = $row['hinh_dai_dien'];
        }
        
    }else{
        echo '<script type = "text/javascript">';
        echo 'alert("tài khoản mật khẩu không hợp lệ!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
    }

   
    }


    if(isset($_SESSION["Username"])){
        header("Location:trangchu.php");
    }
    // admin/nhanvien

    if(isset($_SESSION["Username_nhanvien"])){
        header("Location:admin/nhanvien.php");
    }

    // admin/quan tri

    if(isset($_SESSION["Username_admin"])){
        header("Location:quantri/ds_donhang_dangcho.php");
    }

    if(isset($_POST["dangky"])){
        $taikhoan = $_POST["taikhoan"];
        $matkhau = $_POST["matkhau"];
        $ten = $_POST["ten"];
        $sdt = $_POST["sdt"];
        $diachi = $_POST["diachi"];
        $hinhdaidien = $_POST["anhdaidien"];
    
    $sosanhtk = mysqli_query($conn," SELECT * FROM thanh WHERE tai_khoan = '$taikhoan'");
    $row1 = mysqli_fetch_array($sosanhtk);

    if(is_array($row1)){
        echo '<script type = "text/javascript">';
        echo 'alert("tên tài khoản đã tồn tại");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
    }else{
        $them = "INSERT INTO `thanh`( `tai_khoan`, `mat_khau`, `ten_tv`, `sdt`, `hinh_dai_dien`, `diachi`) VALUES 
        ('$taikhoan', '$matkhau', '$ten', '$sdt', '$hinhdaidien','$diachi')";
        $result_order = mysqli_query($conn,$them);
    }
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
    <link rel="stylesheet" href="css/dangki.css">
</head>

<body>

    <div class="h1">
        <h1 class="h">HẢI ĐĂNG FOOD</h1>
        <p class="pr">Chỉ nên ăn kiêng khi bạn đang chờ thịt chín.</p>
    </div>
    <div class="main">
        <form  action = "login.php" method = "post" >
            <input type="text" name="tk" placeholder="Tài Khoản Của Bạn" class="txt"><br>
            <input type="password" name="mk" placeholder="Mật Khẩu Của Bạn" class="txt"><br>
            
            <input type="submit" value="Đăng Nhập" name="login" class="login-btn"><br>
            <div class="a-link">
                <a href="" class="link">Đổi Mật Khẩu</a>
            </div>
            
                
          
        </form>
        
            <button align="center" style="width: 230px" class="ca" onclick="document.getElementById('id01').style.display='block'" class="pca">  Đăng Ký </button>
        
        
            
    </div>

    <div id="id01" class="modal">
        <!-- <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span> -->
        <form class="modal-content" action="login.php" method = "post">
            <div class="container">
                <h1>Đăng Ký Tài Khoản</h1>
                <p>Đăng Ký Nhanh Tài Khoản Của Bạn Để Vào Hệ Thống</p>
                <hr>
                <label for="email"><b>Tài Khoảng</b></label>
                <input class="input" type="text" placeholder="Enter Email" name="taikhoan" required>

                <label for="psw"><b>Mật Khẩu</b></label>
                <input class="input" type="password" placeholder="Enter Password" name="matkhau" required>

                <label for="psw-repeat"><b>Tên</b></label>
                <input class="input" type="text" placeholder="Họ Của Bạn" name="ten" required>

                <label for="psw-repeat"><b>Số Điện Thoại</b></label>
                <input class="input" type="text" placeholder="Tên Của Bạn" name="sdt" required>

                <label for="psw-repeat"><b>Địa Chỉ</b></label>
                <input class="input" type="text" placeholder="Địa Chỉ Của Bạn" name="diachi" required>

                <label for="psw-repeat"><b>Ảnh Đại Diện</b></label>
                <input type="file" checked="checked" name="anhdaidien" style="margin-bottom:15px"> 
                
                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn" name="dangky">Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>