<?php
    session_start();
    require_once "ketnoi.php"; 
    if(isset($_POST["gui"])){
        if(empty($_POST["id_tv"]) || empty($_POST["ten_tv"]) || empty($_POST["anh_tv"]) )  {
            echo '<script type = "text/javascript">';
            echo 'alert("Bạn cần đăng nhập mới có thể đánh giá");';
            echo 'window.location.href = "login.php" ';
            echo '</script>';
          }else{
            $noidung = $_POST["danhgia"];
            $ten = $_POST["ten_tv"];
            $id = $_POST["id_tv"];
            $anh = $_POST["anh_tv"];
            $sql = "INSERT INTO `danh_gia`(`id_tv`, `ten_tv`, `anh_tv`, `noi_dung`, `trang_thai`) VALUES ('$id','$ten','$anh','$noidung',1)";
            $result_order = mysqli_query($conn,$sql);
            header("location:trangchu.php");
          }
        // echo"1";
    }
?>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 52px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.input1 {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 705px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<h2>Cảm Ơn Bạn Đã Đóng Góp Ý Kiến Cho Chúng Tôi</h2>


<div>

  <form action="danhgia.php" method="post">
    <label for="fname">Ý Kiến Của Bạn</label>
    <input type="text" id="fname" name="danhgia" required>

    <?php $id_thanhvien = isset($_SESSION['id_thanhvien']) ? $_SESSION['id_thanhvien'] : ''; ?>
    <input type="hidden" name="id_tv" value="<?php echo $id_thanhvien;?>">

    <?php $ten_thanhvien = isset($_SESSION['ten_thanhvien']) ? $_SESSION['ten_thanhvien'] : ''; ?>
    <input type="hidden" name="ten_tv" value="<?php echo $ten_thanhvien;?>">

    <?php $anh_thanhvien = isset($_SESSION['anhdaidien']) ? $_SESSION['anhdaidien'] : ''; ?>
    <input type="hidden" name="anh_tv" value="<?php echo $anh_thanhvien;?>">

    
    <input type="submit" value="Gửi" name="gui">
  </form>
  <a align="center" href="trangchu.php" class="input1">Trở Về</a>
  
  
</div>

</body>
</html>