<?php
    session_start();
    require_once "ketnoi.php";

    // cập nhật lại giỏ hàng
    if(isset($_POST["capnhat"])){
        if(isset($_SESSION["cart"])){
            foreach ($_SESSION["cart"] as $value){
                if($_POST["so_luong1".$value["id_sp"]] <= 0 ){
                    unset($_SESSION["cart"][$value["id_sp"]]);
                }
                else{
                    $_SESSION["cart"][$value["id_sp"]]["so_luong1"] = $_POST["so_luong1".$value["id_sp"]];
                }
            }
        }
    }

    if(isset($_POST["order"])){

      if(empty($_POST["ho_ten"]) || empty($_POST["dia_chi"]) || empty($_POST["phone"]) || empty($_POST["total"]) || empty($_POST["khach_hang"]) ){
        echo '<script type = "text/javascript">';
        echo 'alert("Bạn Chưa Đăng Nhập Hoặc Giỏ Hàng Trống!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
      }else{
        
        $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
        $ten = $_POST["ho_ten"];
        $diachi = $_POST["dia_chi"];
        $so_dt = $_POST["phone"];
        $gia = $_POST["total"];
        $id_khachhang = $_POST["khach_hang"];
        $ghi_chu = $_POST["ghi_chu"];
        $sql = "INSERT INTO `don_han`(`ten_khach_hang`, `sdt`, `diachi`, `trang_thai`, `tong_tien`, `id_khach_hang`, `ghi_chu`) VALUES ('$ten',
        '$so_dt', '$diachi', 1, '$gia', '$id_khachhang', '$ghi_chu')";
        // echo $sql;
        // echo "<pre>";
        // print_r($cart);
        $result_order = mysqli_query($conn,$sql);
        $order = "SELECT MAX(id) as 'id' FROM don_han";
        $order_result = mysqli_query($conn,$order);
        while($id_don_hang = mysqli_fetch_array($order_result)){

          $id_order = $id_don_hang['id'];

        }

        foreach($cart as $value){
          $id = $value["id_sp"];
          $sl = $value["so_luong1"];
          $slcapnhat = $value["so_luong"] - $value["so_luong1"] ;
          $ten_sp = $value['ten_sp'];
          $gia = $value['gia_sp'];
          $anh = $value['anh_sp'];
          // print_r($ten_sp);
          
          $order_detail = "INSERT INTO `chitiet_donhang`(`id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`) VALUES 
          ('$id','$sl','$id_order','$ten_sp','$gia','$anh')";
          $result_detail =  mysqli_query($conn,$order_detail);

          // cập nhật lại số lượng khi mua

          $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$slcapnhat' WHERE `sanpham`.`id_sp` = $id;";
          $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
        }
        $success = "Đặt hàng thành công";
        unset($_SESSION['cart']);
        unset($_SESSION['diem']);
        
        header("location:trangchu.php");
        

      }

    }
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complete Responsive Food Website Design Tutorial</title>



  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/styleGiohang.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <div class="container">
    <br>
    <div class="heading">
      <h1>
        <span class="shopper"></span> Giỏ Hàng
      </h1>

      <a href="trangchu.php" class="visibility-cart transition is-open">X</a>
    </div>
    <form action="giohang_giaodien.php" method="post">
      <div class="cart transition is-open">
        <button type="submit" name="capnhat" class="btn btn-update">CẬP NHẬT</button>
        
        <br />
        <br />


        <div class="table">

          <div class="layout-inline row th">
            <div class="col col-pro">Sản Phẩm</div>
            <div class="col col-price align-center ">
              Giá
            </div>
            <div class="col col-qty align-center">Số Lượng</div>
            <div class="col">Tổng</div>
            <div class="col">Xóa</div>
          </div>

          
          <?php
            $tongdonhan = 0;
            if(isset($_SESSION["cart"])){
              
              $diem = 0;
              foreach ($_SESSION["cart"] as $value){
                  
                  $tong = 0 ; 
                  $tong = $value["gia_sp"]*$value["so_luong1"];
                  $tongdonhan += $tong;
                  $diem++;
                  
                  
                  ?>          
          <div class="layout-inline row">

            <div class="col col-pro layout-inline">
              <img src="images/<?php echo $value["anh_sp"]; ?>" alt="kitten" />
              <p><?php echo $value["ten_sp"]; ?> </p>
            </div>

            <div class="col col-price col-numeric align-center ">
              <p><?php echo number_format($value['gia_sp'] ,0,",","."); ?></p>
            </div>

            <div class="col col-qty layout-inline">
              <input min="1" max="<?php echo $value["so_luong"];?>" name="so_luong1<?php echo $value["id_sp"]; ?>" type="number" value="<?php echo $value["so_luong1"]; ?>"/>   
            </div>


            <div class="col col-total col-numeric">
              <p> <?php echo number_format($tong ,0,",","."); ?></p>
            </div>

            <div class="col col-vat col-numeric">
              <a href="xoagiohang.php?id=<?php echo $value["id_sp"]; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
          </div>

          <?php
              }
          }
          ?>
           
          <?php 
            if(isset($diem)){
                $_SESSION['diem'] = $diem;
            }
          ?>
          

          <div class="tf">
            <div class="row layout-inline">
              <div class="col">
                <p>Tổng Tiền</p>
                <p><?php echo number_format($tongdonhan ,0,",",".");?>/Đ</p>
              </div>
              <div class="col"></div>
            </div>
            
          </div>
        </div>
    </form>
        

<!-- thông tin khách hàng-->
  <form action="giohang_giaodien.php" method="post">
        <h2 align="center" >THÔNG TIN KHÁCH HÀNG</h2>
        <div class="row">
          <div class="form-group col-md-3">
              <input class="form-control" type="text" name="ho_ten" id="ten" placeholder="Nhập Họ Tên" required>
          </div>

          <div class="form-group col-md-6">
              <input class="form-control" type="text" name="dia_chi" id="diachi" placeholder="Nhập Địa Chỉ" required>
          </div>

          <div class="form-group col-md-3">
            
              <input class="form-control" type="number" name="phone" id="sdt" placeholder="Nhập Số Điện Thoại" required> 
              <input type="hidden" name="total" value="<?php echo $tongdonhan; ?>" >
              <?php $thanhvien = isset($_SESSION['id_thanhvien']) ? $_SESSION['id_thanhvien'] : ''; ?>
              <input type="hidden" name="khach_hang" value="<?php echo $thanhvien;?>">
          </div>

        </div>

        <div >
          <textarea class="form-control" type="text-area" name="ghi_chu" placeholder="Ghi Chú"></textarea>
        </div>
        <br>
          <div class="form-group">
            <button type="submit" name="order" class="btn btn-update" >MUA HÀNG</button>
          </div> 
      </div>
    </form>
  
</body>

</html>


<script>
