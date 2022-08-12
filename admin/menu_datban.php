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
    <link rel="stylesheet" href="../css/quancao.css">
    <link rel="stylesheet" href="../css/icon.css">
    <!--<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />-->
    

    <!-- font awesome cdn link  -->
    <!-- những icon  -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    
    
   
</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="trangchu.php" class="logo"><i class="fas fa-utensils"></i>Hải Đăng</a>

   
    <div class="icons">
        <a href="nhanvien.php" class="fas fa-home fa-3x"></a>
        

            </div>
        </div>
        
    </div>
   

</header>
<hr>
<hr>
<hr>





<!-- menu section starts  -->
<section class="menu" id="menu">

    <h3 class="sub-heading"> MENU ĐẶT BÀN </h3>
    <h1 class="heading"> Thêm Món Ăn Vào BÀn Ăn </h1>
    
    <!-- chon danh mục -->
    <div class="container-fluid" align="center">
        <a href="menu_datban.php?id=1#menu" class="btn btn-primary"> Lẩu </a> &nbsp;&nbsp;
        <a href="menu_datban.php?id=2#menu" class="btn btn-primary"> Xào </a> &nbsp;&nbsp;
        <a href="menu_datban.php?id=3#menu" class="btn btn-primary"> Nướng </a> &nbsp;&nbsp;
        <a href="menu_datban.php?id=4#menu" class="btn btn-primary"> Nước </a> &nbsp;&nbsp;
        <a href="menu_datban.php?id=5#menu" class="btn btn-primary"> Khác </a> 
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
                    <img src="../images/<?php echo $row['anh_sp'];?>" alt="">
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
                    <form action="datban.php?id=<?php echo $row['id_sp'];?>" method="POST">
                        <?php if($row['so_luong'] <= 0){?>
                                <button class="btn btn- primary"  type="submit" name="themvaodatban" disabled >Tạm Hết</button>
                            <?php }else{ ?>
                                <button class="btn btn- primary"  type="submit" name="themvaodatban" >Mua</button>
                        <?php } ?>
                        
                        <span class="price"><?= number_format($row['gia_sp'] ,0,",",".")?>đ</span>
                    </form>
                    <p><?php echo $row['mota_sp'];?></p>
                    
                </div>
            </div>
            <?php
            }
            ?> 
        

        <div class="box">
            <div class="image">
                <img src="images/menu-2.jpg" alt="">
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

                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$12.99</span>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-3.jpg" alt="">
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
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$12.99</span>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-4.jpg" alt="">
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
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$12.99</span>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/menu-5.jpg" alt="">
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
                <h3>delicious food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                <a href="#" class="btn">add to cart</a>
                <span class="price">$12.99</span>
            </div>
        </div>


    </div>

</section>



<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>locations</h3>
            <a href="#">india</a>
            <a href="#">japan</a>
            <a href="#">russia</a>
            <a href="#">USA</a>
            <a href="#">france</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">dishes</a>
            <a href="#">about</a>
            <a href="#">menu</a>
            <a href="#">reivew</a>
            <a href="#">order</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">+111-222-3333</a>
            <a href="#">shaikhanas@gmail.com</a>
            <a href="#">anasbhai@gmail.com</a>
            <a href="#">mumbai, india - 400104</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
            <a href="#">linkedin</a>
        </div>

    </div>

    <div class="credit"> copyright @ 2021 by <span>mr. web designer</span> </div>

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



