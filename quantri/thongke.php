<?php  require_once "../ketnoi.php"; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../quantri/test/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../quantri/test/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../quantri/test/dist/css/adminlte.min.css">

    <!-- Linh css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!--thêm vào sao-->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
	function hienthongbao(){
		if(confirm("Bạn có muốn xoá dòng dữ liệu này không?"))
			return true;
		else return false;
	}
    </script>
    <script>
	$(document).ready(function( ){
		$("#thang").keyup(function(){
			$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
		});
		$("#nam").keyup(function(){
			$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
		});
		$.post("xulytk.php", {thang: $("#thang").val(), nam: $("#nam").val() }, function(data){$("#inra").html(data);});
			
});
</script>
<style>
	/* a {
		text-decoration: none; color: aliceblue; text-align: center
	}
	a:hover {
		text-decoration: underline
	} */
	.trangadmin {
		width: 80%; height: 60px; background:  #36AFF3; margin: auto; text-align: center; line-height: 60px; font-size: 20px; color: aliceblue
	}
	.quanly {
		width: 80%; height: auto;  margin: 10px auto; 
	}
	.quanly table {
		width: 100%;
	}
	.quanly table th {
		background: rgba(0,0,0,0.40) color: aliceblue; margin: 3px; padding: 5px;
	}
	.quanly a {
		color: #0014F9
	} 
	.quanly table td {
		padding: 5px
	}
	/* ul {
		margin: 10px 300px;
	}
	a {
		color: rgba(0,21,255,1.00); text-align: center
	} */
	.menu {
		width: 80%; height: 50px; margin: 10px auto; background: #36AFF3
	}
	.menu ul {
		margin: 0px; padding: 0px; list-style: none; 
	}
	.menu ul li {
		float: left; color: aliceblue; width: 200px; line-height: 50px; text-align: center
	}
	.menu ul li a {
		text-decoration: none; color: aliceblue; font-size: 20px
	}
	.menu ul li a:hover {
		text-decoration: underline
	}
	.menu ul li:hover {
		background: rgba(66,255,0,1.00);
	}.menu ul li:hover a {
		color: red
	}
</style>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="test/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <p class="nav-link"><b>Admin Hệ Thống Quản Lý Quán Ăn</b></p>

                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"> Tra cứu CV</i>
                    </a> -->
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Nhập tên công việc, người giao việc, ID..." aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Navbar Search -->
                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="http://localhost:50959/" class="brand-link">
                <img src="../quantri/test/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <?php 
                    
                    $id_thanhvien = isset($_SESSION['Username_admin']) ? $_SESSION['Username_admin'] : '';
                    $sql="SELECT * FROM thanh WHERE id_tv = '$id_thanhvien'";
                    $query = mysqli_query($conn,$sql);
                    while($row= mysqli_fetch_array($query)){ 
                ?>
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../images/anhdaidien/<?php echo $row['hinh_dai_dien']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="dangxuat.php" class="d-block"><?php echo $row['ten_tv']; ?></a>
                    </div>
                </div>
                <?php } ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                        <!-- quản lý đơn hàng -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-alt fa-4x"></i>
                                <p>
                                    QUẢN LÝ ĐƠN HÀNG
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ds_donhang_dangcho.php" class="nav-link">
                                        <i class="fas fa-share-square"></i>
                                        <p>ĐƠN HÀNG ĐANG CHỜ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ds_donhang_danggiao.php" class="nav-link">
                                        <i class="fas fa-share-square"></i>
                                        <p>ĐƠN HÀNG ĐANG GIAO</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ds_donhang_damua.php" class="nav-link">
                                        <i class="fas fa-file-download"></i>
                                        <p>ĐƠN HÀNG ĐÃ BÁN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ds_donhang_dahuy.php" class="nav-link">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>ĐƠN HÀNG ĐÃ HỦY</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="thongke.php" class="nav-link">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>THỐNG KÊ DOANH THU</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                         <!-- quản lý bàn ăn -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-alt fa-4x"></i>
                                <p>
                                    QUẢN LÝ BÀN ĂN
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="so_do_banan.php" class="nav-link">
                                        <i class="fas fa-share-square"></i>
                                        <p>SƠ ĐỒ BÀN ĂN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="ds_banan_dathanhtoan.php" class="nav-link">
                                        <i class="fas fa-file-download"></i>
                                        <p>BÁN TẠI QUÁN</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <!-- quản lý thành viên -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-alt fa-4x"></i>
                                <p>
                                    THÀNH VIÊN-SẢN PHẨM
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ds_thanhvien.php" class="nav-link">
                                        <i class="fas fa-share-square"></i>
                                        <p>DANH SÁCH THÀNH VIÊN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="sanpham.php" class="nav-link">
                                        <i class="fas fa-file-download"></i>
                                        <p>DANH SÁCH MÓN ĂN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="binhluan.php" class="nav-link">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>DANH SÁCH BÌNH LUẬN</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>


                    </ul>


                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->


        <!--body-->

        <div class="content-wrapper" style="min-height: 674px;">
        <hr>

            <div class="quanly">
            <h2>Thống Kê tháng: <input type="text" value="<?php echo date('m') ?>" size=1 id='thang'> Năm: <input type="text" value="<?php echo date('Y') ?>" size=5 id='nam'></h2>
            <hr>
            <div id="inra">
            
            </div>
            
            
            
            
            <!--SELECT IdMon, SoLuong, Ngay FROM chitiethd, hoadon WHERE SoLuong = (SELECT MAX(SoLuong) FROM chitiethd) AND hoadon.IdHd = chitiethd.IdHd AND Ngay BETWEEN '2018/12/01' AND '2018/12/31'-->
        </div>












<?php 
     require_once "cuoi.php";
?>