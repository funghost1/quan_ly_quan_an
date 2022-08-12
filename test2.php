


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="test/test/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <p class="nav-link"><b>Hệ Thống Quản Lý Quán Ăn</b></p>

                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"> Tra cứu CV</i>
                    </a>
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
                <img src="test/test/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="test/test/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="http://localhost:50959/" class="d-block">Đăng Lộc</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list-alt fa-4x"></i>
                                <p>
                                    QUẢN LÝ CÔNG VIỆC
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <!--su o day sssssssssssssssssss-->
                                    <a href="http://localhost:50959/Home/CVDagiao" class="nav-link">
                                        <i class="fas fa-share-square"></i>
                                        <p>CÔNG VIÊC ĐÃ GIAO</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!--su o day sssssssssssssssssss-->
                                    <a href="http://localhost:50959/Home/CVDuocgiao" class="nav-link">
                                        <i class="fas fa-file-download"></i>
                                        <p>CÔNG VIỆC ĐÃ NHẬN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!--su o day sssssssssssssssssss-->
                                    <a href="http://localhost:50959/Home/CVHoangThanh" class="nav-link">
                                        <i class="fas fa-clipboard-check"></i>
                                        <p>CÔNG VIỆC ĐÃ HOÀN THÀNH</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <!--su o day sssssssssssssssssss-->
                                    <a href="http://localhost:50959/Home/CVChuaHoangThanh" class="nav-link">
                                        <i class="fas fa-sync-alt"></i>
                                        <p>CÔNG VIỆC CHƯA HOÀN THÀNH</p>
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

        <div class="content-wrapper" style="min-height: 674px;">

            <div class="container-fluid">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-secondary">
                        <h3 class="widget-user-username">TÊN NGƯỜI DÙNG</h3>
                        <h5 class="widget-user-desc">ĐƠN VỊ</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="/" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h1 class="">200</h1>

                                    <span class="description-text"><b>VIỆC ĐƯỢC GIAO</b></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h1 class="">13 / 20</h1>
                                    <span class="description-text"><b>ĐÃ HOÀN THÀNH</b></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h1 class=""> 35</h1>
                                    <span class="description-text"><b>VIỆC ĐÃ GIAO</b></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-primary mb-2">
                        <div class="card-body pb-0">
                            <div class="text-value" id="">
                                <h1>0</h1>
                            </div>

                            <div>TỔNG SỐ CÔNG VIỆC ĐÃ GIAO</div>

                            <!--<div class="float-right d-none d-sm-inline-block">
                            <b>Version</b> 3.1.0
                            </div>-->
                        </div>
                    </div>
                    <!--su o day sssssssssssssssssss-->
                    <button class="btn btn-primary btn-sm form-control text-white" id="refreshBaoCaoSanPham">Xem danh sác</button>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-warning mb-2">
                        <div class="card-body pb-0">
                            <div class="text-value" id="">
                                <h1>0</h1>
                            </div>
                            <div>TỔNG SỐ CÔNG VIỆC ĐÃ NHẬN</div>
                        </div>
                    </div>
                    <!--su o day sssssssssssssssssss-->
                    <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Xem danh sách</button>
                </div>
                <!-- Tổng số đơn hàng -->
                <!-- Tổng số mặt hàng -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-success mb-2">
                        <div class="card-body pb-0">
                            <div class="text-value" id="">
                                <h1>0</h1>
                            </div>
                            <div>CÔNG VIỆC CHƯA HOÀN THÀNH </div>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-sm form-control" id="">XEM DANH SÁCH</button>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-danger mb-2">
                        <div class="card-body pb-0">
                            <div class="text-value" id="">
                                <h1>0</h1>
                            </div>
                            <div>CÔNG VIỆC CHƯA HOÀN THÀNH</div>
                        </div>
                    </div>

                    <button class="btn btn-danger btn-sm form-control" id="">XEM DANH SÁCH</button>
                </div>
                <!-- Tổng số góp ý -->

            </div>
            <br />
            <div class="container" id="create" align="center">
                <button class="btn btn-info btn-group-lg form-control text-white bg-info col-lg-4" id="create">Tạo công việc </button>
            </div>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            <div class="float-l d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="test/test/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="test/test/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="test/test/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="test/test/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="test/test/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="test/test/plugins/raphael/raphael.min.js"></script>
    <script src="test/test/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="test/test/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="test/test/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="test/test/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="test/test/dist/js/pages/dashboard2.js"></script>
</body>

</html>