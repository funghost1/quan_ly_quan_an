<!DOCTYPE html>
<html lang="en">
<?php
    include_once 'ketnoi.php';
    session_start();
    // kiểm tra số lượng giỏ hàng
    $soluong = isset($_SESSION['diem']) ? $_SESSION['diem'] : '';

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
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
    
    
   
</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>Hải Đăng</a>

    <nav class="navbar">
        <a class="active" href="#home">Trang Chủ</a>
        <a href="#dishes">Bán Chạy</a>
        <a href="#about">Giới Thiệu</a>
        <a href="#menu">menu</a>
        <a href="#review">Đánh Giá</a>
        <a href="#datban">Đặt Bàn</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
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

<form action="timkiem.php#menu" method = "post" id="search-form">
    <input type="search" placeholder="Nhập Tên Món Ăn..." name="tiemkiem" id="search-box">
    <button type ="submit" name="tim"></i></button><label  class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">
        
        <div class="swiper-wrapper wrapper">
            
            
         


            <?php 
            $sqlnew = "SELECT * FROM sanpham WHERE trang_thai_sp = 1";
            $querynew = mysqli_query($conn,$sqlnew);
            while($row= mysqli_fetch_array($querynew)){
            ?>


            <div class="swiper-slide slide">
                <div class="content">
                    <span>Món Ăn Mới</span>
                    <h3><?php echo $row["ten_sp"] ?></h3>
                    <p><?php echo $row["mota_sp"] ?></p>
                    <a href="trangchu.php?id=<?php echo $row["dm_sp"] ?>#menu" class="btn">Mua Ngay</a>
                </div>
                <div class="image">
                    <img src="images/<?php echo $row["anh_sp"] ?>" alt="">
                </div>
            </div>

            <?php } ?>

            
           

        </div>
        
        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- dishes section starts  -->

<section class="dishes" id="dishes">

    <h3 class="sub-heading"> món ăn </h3>
    <h1 class="heading"> hot </h1>

    <div class="box-container">
        <?php 
            $sqlhot = "SELECT * FROM sanpham WHERE trang_thai_sp = 2";
            $query = mysqli_query($conn,$sqlhot);
            while($row= mysqli_fetch_array($query)){
        ?>

        <div class="box">
            <a href="#" class="fas fa-heart"></a>
            <img class="best" src="https://www.lotteria.vn/grs-static/images/icon-best-2.gif">
            <img src="images/<?php echo $row["anh_sp"] ?>" alt="">
            <h3><?php echo $row["ten_sp"] ?></h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span><?= number_format($row['gia_sp'] ,0,",",".")?>đ</span>
            <form action="giohang.php?id=<?php echo $row['id_sp'];?>" method="POST">
                        <?php if($row['so_luong'] <= 0){?>
                                <button class="btn btn- primary"  type="submit" name="themvaogiohang" disabled >Tạm Hết</button>
                            <?php }else{ ?>
                                <button class="btn btn- primary"  type="submit" name="themvaogiohang" >Mua</button>
                        <?php } ?>
                        
                        
                    </form>
            <!-- <a href="#" class="btn">add to cart</a> -->
        </div>
        <?php } ?>

       

        

    </div>

</section>

<!-- dishes section ends -->
<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> Hải Đăng Food </h3>
    <h1 class="heading"> Xin Chào Bạn Đã Đến Với Chúng Tôi… </h1>

    <div class="row">

        <div class="image">
            <img src="images/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>Giới Thiệu Về Quán</h3>
            <p>Chúng tôi được thành lập để phục vụ khách hàng có những món ăn ngon nhanh và tiện lợi. So với thị trường phát triển như ngày nay chúng tôi đang dần cải thiện mình để phục cho cho bạn có những món ăn ngon và hoàng chỉnh hơn. Khi bạn cảm thấy muốn ăn thì hãy gọi cho chúng tôi chúng tôi luôn luôn bên bạn trong mọi hoàng cảnh.</p>
            <h2>Số Điện Thoại Liên Hệ: 0912767638</h2>
            <h2>Địa Chỉ: Hòa An - phụng hiệp - hậu giang</h2>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Giao Nhanh</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Giá Hợp Lý</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>Hổ Trợ 24/7</span>
                </div>
            </div>
            <a href="trangchu.php#menu" class="btn">Mua Ngay</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->
<section class="menu" id="menu">

    <h3 class="sub-heading"> menu </h3>
    <h1 class="heading"> Mời bạn chọn món </h1>
    
    <!-- chon danh mục -->
    <div class="container-fluid" align="center">
        <a href="trangchu.php?id=1#menu" class="btn btn-primary"> Lẩu </a> &nbsp;&nbsp;
        <a href="trangchu.php?id=2#menu" class="btn btn-primary"> Xào </a> &nbsp;&nbsp;
        <a href="trangchu.php?id=3#menu" class="btn btn-primary"> Nướng </a> &nbsp;&nbsp;
        <a href="trangchu.php?id=4#menu" class="btn btn-primary"> Nước </a> &nbsp;&nbsp;
        <a href="trangchu.php?id=5#menu" class="btn btn-primary"> Khác </a> 
        <h1><p id="danhsachchon"></p></h1>
    </div>
    <br>

    
    

    <div class="box-container">
        <!--lấy sản phẩm từ csdl-->
        <?php
           
            $id = "1";
            $sql="SELECT * FROM sanpham ";
                $query = mysqli_query($conn,$sql);
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql="SELECT * FROM sanpham WHERE dm_sp = $id ";
                $query = mysqli_query($conn,$sql);
            }
            
        ?>
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
        

        


    </div>

</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> Phản Hồi </h3>
    <h1 class="heading"> Đánh giá của khách hàng  </h1> <a href="danhgia.php" class="btn">Gửi Phản Hồi</a>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <?php 
            $sql_danhgia = "SELECT * FROM `danh_gia` WHERE 1";
            $query = mysqli_query($conn,$sql_danhgia);
            while($row= mysqli_fetch_array($query)){
            ?>            
            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/anhdaidien/<?php echo $row["anh_tv"] ?>" alt="">
                    <div class="user-info">
                        <h3><?php echo $row["ten_tv"] ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p><?php echo $row["noi_dung"] ?></p>
            </div>
        <?php }?>
           

        </div>

    </div>
    
</section>

<!-- review section ends -->

<!-- order section starts  -->

<section class="" id="datban">

    <h3 class="sub-heading"> đặt bàn </h3>
    <h1 class="heading"> Mời bạn chọn bàn </h1>

    <div class="form">
 
        <div class="row">
             <?php
                
                $sqlbanan = "SELECT * FROM `ban_an`";
                $query = mysqli_query($conn,$sqlbanan);
                while($row= mysqli_fetch_array($query)){
            ?>
            <div class="col-sm-6 col-lg-3 ">

                <?php 
                    if($row['trang_thai'] == 1){
                ?>
                        <form action="datban_giaodien.php?id=<?php echo $row['id_ban'];?>" method="POST">
                            <div class="input">  
                                <input type="hidden" name="soban" value="<?php echo $row['id_ban']; ?>"> 
                                <button name="datban" class="btn btn- primary" >Bàn số <?php echo $row['id_ban']; ?></button>
                            </div>
                        </form>
                <?php }else{ ?>
                        <form action="">
                            <div class="input">   
                                <button class="btn btn-danger" disabled>Bàn số <?php echo $row['id_ban']; ?></button>
                            </div>
                        </form>
                    <?php } ?>
                
            </div>
            <?php } ?>
            
        </div>
    </div>
   
    

    

    

</section>


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



