<?php

    $id = $_GET['id'];
    session_start();
    require_once "../ketnoi.php";

?>

<?php
   

  
     
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
  <link rel="stylesheet" href="../css/styleGiohang.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="../js/script.js"></script>
</head>

<body>
  <div class="container">
    <br>
    <div class="heading">
      <h1>
        Bàn Số <?php echo "$id"; ?>
      </h1>

      <a href="so_do_banan.php" class="visibility-cart transition is-open">X</a>
    </div>
    <form action="datban_giaodien.php" method="post">
      <div class="cart transition is-open">
          

          <!-- <div class="row">
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
          </div> -->
          
         
        <br />
        


        <div class="table">

          <div class="layout-inline row th">
          <!-- <div class="col"></div> -->
            <div class="col col-pro">Sản Phẩm</div>
            <div class="col col-price align-center ">
              Giá
            </div>
            <div class="col col-qty align-center">Số Lượng</div>
            <div class="col">Tổng</div>
            
          </div>

          
          <?php

                $sql = "SELECT * FROM `chitiet_datban` WHERE so_ban = $id";
                $result = mysqli_query($conn,$sql); 
                $tongdonhan = 0;
                
                while ($row = mysqli_fetch_array($result)) {
                    $tong = 0 ; 
                    $tong = $row["gia"]*$row["so_luong"];
                    $tongdonhan += $tong;
                  ?>          
          <div class="layout-inline row">
          <!-- <div class="col col-vat col-numeric">
              
              </div> -->

            <div class="col col-pro layout-inline">
              <img src="../images/<?php echo $row["anh_sanpham"]; ?>" alt="kitten" />
              <p><?php echo $row["ten_sanpham"]; ?> </p>
            </div>

            <div class="col col-price col-numeric align-center ">
              <p><?php echo number_format($row['gia'] ,0,",","."); ?></p>
            </div>

            <div class="col col-qty layout-inline">
                <p><?php echo $row["so_luong"]; ?></p>
               
            </div>


            <div class="col col-total col-numeric">
                
              <p> <?php echo number_format($tong ,0,",","."); ?></p>
            </div>

            
          </div>

          <?php
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
  <!-- <form action="datban_giaodien.php" method="post">
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
            <button type="submit" name="order" class="btn btn-update" >MUA HÀNG</button>
          </div> 
      </div>
    </form> -->
  
</body>

</html>


<script>
