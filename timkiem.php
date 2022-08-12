<!DOCTYPE html>
<html lang="en">
<?php
    include_once 'ketnoi.php';
    session_start();
    // kiểm tra số lượng giỏ hàng
    $soluong = isset($_SESSION['diem']) ? $_SESSION['diem'] : '';

    if(isset($_POST['tim'])){
        $tim = $_POST['tiemkiem'];
        // $dang = 5;
        // echo $tim;
        }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>
    <link rel="stylesheet" href="css/quancao.css">
    <link rel="stylesheet" href="css/icon.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    

    <!-- font awesome cdn link  -->
    <!-- những icon  -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
    
    
   
</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="trangchu.php#" class="logo"><i class="fas fa-utensils"></i>Hải Đăng</a>

    <nav class="navbar">
        <a class="active" href="trangchu.php#home">Trang Chủ</a>
        <a href="trangchu.php#dishes">Bán Chạy</a>
        <a href="trangchu.php#about">Giới Thiệu</a>
        <a href="trangchu.php#menu">menu</a>
        <a href="trangchu.php#review">Đánh Giá</a>
        <a href="trangchu.php#datban">Đặt Bàn</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <!-- <i class="fas fa-search" id="search-icon"></i> -->
        <a href="#" class="fas fa-heart"></a>
        <a href="giohang_giaodien.php" class="fas fa-shopping-cart"><span  style="color: red;" style="border: cornsilk;"><?php echo $soluong; ?></span></a>
        <div class="dropdown">
            <a href="login.php" class="fas fa-user"></a>
            <div class="dropdown-content">

                <?php $anhdaidien = isset($_SESSION['anhdaidien']) ? $_SESSION['anhdaidien'] : ''; ?>
                
                <img style="width: 50px; height: 50px; border-radius:50%;" align="center" src="images/anhdaidien/<?php echo $anhdaidien; ?>">
                
                <?php $ten = isset($_SESSION['ten_thanhvien']) ? $_SESSION['ten_thanhvien'] : ''; ?>
                <a  href="thanhvien.php"><?php echo $ten; ?></a>
                <hr>
                <a  href="donhangchuaxuly.php">Đơn Hàng</a>
                <hr>
                <a href="dangxuat.php">Đăng xuất</a>

            </div>
        </div>
        
    </div>

</header>

<!-- header section ends-->

<!-- search form  -->




<!-- menu section starts  -->
<section class="menu" id="menu">
    <hr>
    <hr>
    <hr>
    <h3 class="sub-heading"> </h3>
    <h1 class="heading"> Kết Quả Tìm Kiếm Của Bạn </h1>
    
    <!-- chon danh mục -->
    
    <br>

    
    

    <div class="box-container">
       
        <!--lấy sản phẩm từ csdl-->
        <?php
            
            $sql="SELECT * FROM sanpham ";
                $query = mysqli_query($conn,$sql);
           
                $sql="SELECT * FROM sanpham WHERE ten_sp LIKE '%$tim%'";
                $query = mysqli_query($conn,$sql);
            
            
        ?>
         <?php if(mysqli_num_rows($query) == 0){ ?>
            <h1>Không tìm thấy kết quả nào bạn có thể quay lại  <a href="trangchu.php#">trang chủ</a></h1>
            <?php }else{ ?>
        <!--chạy vòng lập lấy hết csdl-->
        <?php
        while($row= mysqli_fetch_array($query)){
        ?>
            <div class="box">
                <div class="image">
                    <img src="images/<?php echo $row['anh_sp'];?>" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3><?php echo $row['ten_sp'];?></h3>
                    <form action="giohang.php?id=<?php echo $row['id_sp'];?>" method="POST">
                        <?php if($row['so_luong'] <= 0){?>
                                <button class="btn btn- primary"  type="submit" name="themvaogiohang" disabled >Tạm Hết</button>
                            <?php }else{ ?>
                                <button class="btn btn- primary"  type="submit" name="themvaogiohang" >Mua</button>
                        <?php } ?>
                        
                        <span class="price"><?= number_format($row['gia_sp'] ,0,",",".")?>đ</span>
                    </form>
                    <p><?php echo $row['mota_sp'];?></p>
                    
                </div>
            </div>
            <?php
            }
            ?> 
            <?php } ?>
        

        


    </div>

</section>

<!-- menu section ends -->



<!-- review section ends -->

<!-- order section starts  -->


<!-- order section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Địa Chỉ Liên Hệ</h3>
            <a href="https://www.google.com/maps/place/%C4%90%E1%BA%A1i+H%E1%BB%8Dc+C%E1%BA%A7n+Th%C6%A1+Khu+H%C3%B2a+An/@9.7609935,105.6023273,17z/data=!3m1!4b1!4m5!3m4!1s0x31a0f1d1e88956ef:0xef7a6de6658fee0c!8m2!3d9.7609935!4d105.604516">Hòa An</a>
            <a href="https://www.google.com/maps/place/Can+Tho+University/@10.0299337,105.7684266,17z/data=!4m12!1m6!3m5!1s0x31a0895a51d60719:0x9d76b0035f6d53d0!2sCan+Tho+University!8m2!3d10.0299337!4d105.7706153!3m4!1s0x31a0895a51d60719:0x9d76b0035f6d53d0!8m2!3d10.0299337!4d105.7706153">Đại Học Cần Thơ</a>
            <a href="#">Nhà Riêng</a>
            
        </div>

        <div class="box">
            <h3>Hải Đăng Food</h3>
            <a href="trangchu.php#home">Trang Chủ</a>
            <a href="trangchu.php#dishes">Bán Chạy</a>
            <a href="trangchu.php#about">Giới Thiệu</a>
            <a href="trangchu.php#menu">menu</a>
            <a href="trangchu.php#review">Đánh Giá</a>
            <a href="trangchu.php#datban">Đặt Bàn</a>
        </div>

        <div class="box">
            <h3>Thông Tin Liên Lạc</h3>
            <a href="#">0912767638</a>
            <a href="#">Zalo: 0912767638</a>
            <a href="#">haidang@gmail.com</a>
            
            
        </div>

        <div class="box">
            <h3>Mạng Xã Hội</h3>
            <a href="https://www.facebook.com/profile.php?id=100007492080933">Facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <div class="credit"> Tiểu Luận <span>Hải Đăng Food</span> </div>

</section>


<!-- footer section ends -->

<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader.gif" alt="">
</div> -->


















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>



