<?php
    session_start();
    require_once "ketnoi.php";

    $_SESSION["banan"] = isset($_GET['id']) ? $_GET['id'] : '';
    $soban = isset($_SESSION['banan']) ? $_SESSION['banan'] : ''; 
      
      

    // cập nhật lại giỏ hàng
    if(isset($_POST["capnhat"])){
        if(isset($_SESSION["datban"])){
            foreach ($_SESSION["datban"] as $value){
                if($_POST["so_luong1".$value["id_sp"]] <= 0 ){
                    unset($_SESSION["datban"][$value["id_sp"]]);
                }
                else{
                    $_SESSION["datban"][$value["id_sp"]]["so_luong1"] = $_POST["so_luong1".$value["id_sp"]];
                }
            }
        }
    }

    if(isset($_POST["order"])){

      if(empty($_POST["ho_ten"]) || empty($_POST["soluong"]) || empty($_POST["phone"]) || empty($_POST["total"]) || empty($_POST["khach_hang"]) || empty($_POST["soban"])){
        echo '<script type = "text/javascript">';
        echo 'alert("Bạn Chưa Đăng Nhập Hoặc Giỏ Hàng Trống!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
      }else{
        
        $datban = !empty($_SESSION['datban'])?$_SESSION['datban']:[];
        $ten = $_POST["ho_ten"];
        $soluong = $_POST["soluong"];
        $so_dt = $_POST["phone"];
        $gia = $_POST["total"];
        $id_khachhang = $_POST["khach_hang"];
        $ghi_chu = $_POST["ghi_chu"];
        $so_ban = $_POST["soban"];
        $sql = "INSERT INTO `dat_ban`(`ten_khach_hang`, `sdt`, `so_nguoi`, `trang_thai`, `tong_tien`, `ghi_chu`, `so_ban`, `id_khach_hang`) VALUES
        ('$ten', '$so_dt', '$soluong', 1, '$gia', '$ghi_chu', '$so_ban', '$id_khachhang')";
        // echo $sql;
        // echo "<pre>";
        // print_r($datban);
        $result_order = mysqli_query($conn,$sql);
        $order = "SELECT MAX(id) as 'id' FROM dat_ban";
        $order_result = mysqli_query($conn,$order);
        while($id_don_hang = mysqli_fetch_array($order_result)){

          $id_order = $id_don_hang['id'];

        }

        foreach($datban as $value){
          $id = $value["id_sp"];
          $sl = $value["so_luong1"];
          $slcapnhat = $value["so_luong"] - $value["so_luong1"] ;
          $ten_sp = $value['ten_sp'];
          $gia = $value['gia_sp'];
          $anh = $value['anh_sp'];
          // print_r($ten_sp);
          
          $order_detail = "INSERT INTO `chitiet_datban`(`id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`,`so_ban`) VALUES 
          ('$id','$sl','$id_order','$ten_sp','$gia','$anh','$so_ban')";
          $result_detail =  mysqli_query($conn,$order_detail);

          // cập nhật lại số lượng khi mua

          $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$slcapnhat' WHERE `sanpham`.`id_sp` = $id;";
          $result_capnhatSL =  mysqli_query($conn,$capnhatSL);

          $capnhatsoban = "UPDATE `ban_an` SET `trang_thai` = '2' WHERE `ban_an`.`id_ban` = $so_ban;";
          $result_capnhatsoban =  mysqli_query($conn,$capnhatsoban);
        }
        $success = "Đặt hàng thành công";
        unset($_SESSION['datban']);
        
        
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
        <?php 
        if(isset($soban) && $soban != ""){?>
          <span class="shopper"></span> Đặt Bàn Số <?php echo $soban; ?>
        <?php  }else{ ?>
          <span class="shopper"></span> Bạn Chưa Chọn Bàn ăn
        <?php  } ?>
        
        
        
      </h1>

      <a href="menu_datban.php" class="visibility-cart transition is-open">X</a>
    </div>
    <form action="datban_giaodien.php" method="post">
      <div class="cart transition is-open">
          

          <div class="row">
            <div  class="col-sm-6 col-md-6 "></div>
            <div class="col-sm-6 col-md-2 ">
             <button type="submit" name="capnhat" class="btn btn-update">CẬP NHẬT</button> 
            </div>
            <div class="col-sm-6 col-md-2 ">
              <a type="btn" class="btn btn-update"  href="trangchu.php#datban"> Chọn Bàn </a>
            </div>
            <div  class="col-sm-6 col-md-2 ">
              <a type="btn" class="btn btn-update"  href="menu_datban.php"> Thêm Món </a>&nbsp;
            </div>
          </div>
          
         
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
            if(isset($_SESSION["datban"])){
              
              
              foreach ($_SESSION["datban"] as $value){
                  
                  $tong = 0 ; 
                  $tong = $value["gia_sp"]*$value["so_luong1"];
                  $tongdonhan += $tong;
                  
                  
                  
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
              <a href="xoadatban.php?id=<?php echo $value["id_sp"]; ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
          </div>

          <?php
              }
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
  <form action="datban_giaodien.php" method="post">
        <h2 align="center" >THÔNG TIN KHÁCH HÀNG</h2>
        <div class="row">
          <div class="form-group col-md-3">
              <input class="form-control" type="text" name="ho_ten" id="ten" placeholder="Nhập Họ Tên" required>
          </div>

          <div class="form-group col-md-6">
              <input class="form-control" type="number" min="1" name="soluong" id="diachi" placeholder="Nhập Số Lượng Người" required>
          </div>

          <div class="form-group col-md-3">
            
              <input class="form-control" type="number" name="phone" id="sdt" placeholder="Nhập Số Điện Thoại" required> 
              <input type="hidden" name="total" value="<?php echo $tongdonhan; ?>" >
              <input type="hidden" name="soban" value="<?php echo $soban; ?>" >
              <?php $thanhvien = isset($_SESSION['id_thanhvien']) ? $_SESSION['id_thanhvien'] : ''; ?>
              <input type="hidden" name="khach_hang" value="<?php echo $thanhvien;?>">
          </div>

        </div>

        <div >
          <textarea class="form-control" type="text-area" name="ghi_chu" placeholder="Ghi Chú"></textarea>
        </div>
        <br>
          <div class="form-group">
            <button type="submit" name="order" class="btn btn-update" >Đặt Bàn</button>
          </div> 
      </div>
    </form>
  
</body>

</html>


<script>
