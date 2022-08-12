<?php
    include_once 'ketnoi.php';
    session_start();
    $id_thanhvien = isset($_SESSION['id_thanhvien']) ? $_SESSION['id_thanhvien'] : ''; 

   
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thành viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/thanhvien.css">
    <!-- Google Font: Source Sans Pro -->

</head>

<body>
    <div>

        <?php
            $sql_tv="SELECT * FROM thanh WHERE id_tv = '$id_thanhvien'";
            $query = mysqli_query($conn,$sql_tv);
            while($row= mysqli_fetch_array($query)){
        ?>


        <div class="container-fluid ">
            <div class="card card-widget widget-user ">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-secondary " align="center">
                    <h3 class="widget-user-username ">TÊN NGƯỜI DÙNG</h3>
                    <h4 class="widget-user-desc "><?php echo $row['ten_tv']; ?></h4>
                    <img style="width: 200px; border-radius: 50%;" class="img-circle elevation-2 " src="images/anhdaidien/<?php echo $row['hinh_dai_dien']; ?>" alt="User Avatar ">
                    <br>
                </div>
               
            </div>

        <?php
            }
        ?> 


        <?php
            $sql_tongtien="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '2'";
            $querytongtien = mysqli_query($conn,$sql_tongtien);
            $tongtien = 0;
            $diemdonhang = 0;
            while($row= mysqli_fetch_array($querytongtien)){
                $tongtien += $row['tong_tien'];
                $diemdonhang++;
                
            
        ?>
        <?php
            }
        ?> 
            <div class="card-footer ">
                <div class="row ">
                    <div class="col-sm-4 border-right " align="center">
                        <div class="description-block ">
                            <h1 style="color: red;"><?php echo number_format($tongtien ,0,",",".");  ?> VNĐ</h1>

                            <span class="description-text "><b>Tổng Số Tiền Đã Mua</b></span>
                        </div>
                        <!-- /.description-block -->
                    </div>
        
                    <!-- /.col -->
                    <div class="col-sm-4 border-right " align="center">
                        <div class="description-block ">
                            <h1 class=" "><?php echo $diemdonhang; ?></h1>
                            <span class="description-text "><b>Đơn Hàng Đã Mua</b></span>
                        </div>
                        <!-- /.description-block -->
                    </div>

            <?php
                $sql_dangduyet="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '1'";
                $querydangduyet = mysqli_query($conn,$sql_dangduyet);
                $diemdangduyet = 0;
                while($row= mysqli_fetch_array($querydangduyet)){
                    $diemdangduyet++;
                
                
            ?>
            <?php
                }
            ?> 

                    <!-- /.col -->
                    <div class="col-sm-4 " align="center">
                        <div class="description-block ">
                            <h1 class=" "> <?php echo  $diemdangduyet; ?></h1>
                            <span class="description-text "><b>Đơn Hàng Đang Chờ</b></span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>

        <div class="container-fluid" >
            <div class="row ">
                <div class="col-sm-6 col-lg-3 ">
                    <div class="card text-white bg-primary mb-2 ">
                        <div class="card-body pb-0 ">


                            <div class="text-value " id="">
                            <div class="box-scroll">
                                    <h4 align="center">Đang Chờ</h4>

                                    <!-- truy vấn lấy du liệu -->
                                    <?php
                                        $sql_dangcho="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '1' ORDER BY `don_han`.`id` DESC";
                                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                                        
                                        while($row= mysqli_fetch_array($querydangcho)){ 
                                    ?>
                                        <div>Mã Đơn Hàng: <?php echo $row['id']; ?>  <a href="chitietdonhangdangxuly.php?id=<?php echo $row['id']; ?>" style="color: red;">Xem Chi Tiết</a></div>
                                        <div>Trạng Thái: Đang Chờ Xử Lý</div>                                 
                                        <div>Thời Gian Mua: <?php echo $row['ngay_dat_hang']; ?> </div>
                                        <div>Tổng Tiền: <?php echo number_format($row['tong_tien'] ,0,",",".");  ?> vnđ</div>
                                        <hr/>
                                    <?php } ?>
                                </div>
                            </div>

                            

                            <!--<div class="float-right d-none d-sm-inline-block ">
                                <b>Version</b> 3.1.0
                                
                            </div>-->
                        </div>
                    </div>
                    <!--su o day sssssssssssssssssss-->
                    <a class="btn btn-primary btn-sm form-control text-white " type="btn" href="donhangchuaxuly.php">XEM DANH SÁCH</a>
                    <!-- <button class="btn btn-primary btn-sm form-control text-white " id="refreshBaoCaoSanPham "></button> -->
                </div>

                <div class="col-sm-6 col-lg-3 ">
                    <div class="card text-white bg-success mb-2">
                        <div class="card-body pb-0 ">
                            <div class="text-value " id=" ">
                                <div class="box-scroll">
                                <h4 align="center">Đã Mua</h4>

                                    <!-- truy vấn lấy du liệu -->
                                    <?php
                                        $sql_damua="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '2' ORDER BY `don_han`.`id` DESC";
                                        $querydamua = mysqli_query($conn,$sql_damua);
                                        
                                        while($row= mysqli_fetch_array($querydamua)){ 
                                    ?>
                                        <div>Mã Đơn Hàng: <?php echo $row['id']; ?>  <a href="chitietdonhangdamua.php?id=<?php echo $row['id']; ?>" style="color: red;">Xem Chi Tiết</a></div>
                                        <div>Trạng Thái: Đang Chờ Xử Lý</div>                                 
                                        <div>Thời Gian Mua: <?php echo $row['ngay_dat_hang']; ?> </div>
                                        <div>Tổng Tiền: <?php echo number_format($row['tong_tien'] ,0,",",".");  ?> vnđ</div>
                                        <hr/>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!--su o day sssssssssssssssssss-->
                    
                    <a class="btn btn-success btn-sm form-control" type="btn" href="donhangdamua.php">XEM DANH SÁCH</a>
                </div>
                <!-- Tổng số đơn hàng -->
                <!-- Tổng số mặt hàng -->
                <div class="col-sm-6 col-lg-3 ">
                    <div class="card text-white bg-danger mb-2">
                        <div class="card-body pb-0 ">
                            <div class="text-value " id=" ">
                                <div class="box-scroll">

                                    <h4 align="center">Đã Hủy</h4>
                                    <?php
                                        $sql_damua="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '3' ORDER BY `don_han`.`id` DESC";
                                        $querydamua = mysqli_query($conn,$sql_damua);
                                        
                                        while($row= mysqli_fetch_array($querydamua)){ 
                                    ?>
                                        <div>Mã Đơn Hàng: <?php echo $row['id']; ?>  <a href="chitietdonhangdahuy.php?id=<?php echo $row['id']; ?>" style="color: red;">Xem Chi Tiết</a></div>
                                        <div>Trạng Thái: Mua Thất Bại</div>                                 
                                        <div>Thời Gian Mua: <?php echo $row['ngay_dat_hang']; ?> </div>
                                        <div>Tổng Tiền: <?php echo number_format($row['tong_tien'] ,0,",",".");  ?> vnđ</div>
                                        <hr/>
                                    <?php } ?>

                                </div>
                                
                            </div>
                            
                           
                        </div>
                    </div>
                    <a class="btn btn-danger btn-sm form-control" type="btn" href="donhangdahuy.php">XEM DANH SÁCH</a>
                </div>

                <div class="col-sm-6 col-lg-3 ">
                    <div class="card text-white bg-warning mb-2 ">
                        <div class="card-body pb-0 ">
                            <div class="text-value " id=" ">
                                <div class="box-scroll">
                                <h4 align="center">Đang Giao Hàng</h4>
                                    <?php
                                        $sql_damua="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '4' ORDER BY `don_han`.`id` DESC";
                                        $querydamua = mysqli_query($conn,$sql_damua);
                                        
                                        while($row= mysqli_fetch_array($querydamua)){ 
                                    ?>
                                        <div>Mã Đơn Hàng: <?php echo $row['id']; ?>  <a href="chitietdonhangdanggiao.php?id=<?php echo $row['id']; ?>" style="color: red;">Xem Chi Tiết</a></div>
                                        <div>Trạng Thái: Đang Chờ Xử Lý</div>                                 
                                        <div>Thời Gian Mua: <?php echo $row['ngay_dat_hang']; ?> </div>
                                        <div>Tổng Tiền: <?php echo number_format($row['tong_tien'] ,0,",",".");  ?> vnđ</div>
                                        <hr/>
                                    <?php } ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <a type="btn" href="#" class="btn btn-warning btn-sm form-control text-white">XEM DANH SÁCH</a>

                </div>
                
                <!-- Tổng số góp ý -->

            </div>
        </div>
        <br />
        <div class="container " id="create " align="center ">
            
            <a class="btn btn-info btn-group-lg form-control text-white bg-info col-lg-4 " type="btn" href="trangchu.php">Trở Về Trang Chính</a>

        </div>
    </div>
    </div>
</body>

</html>