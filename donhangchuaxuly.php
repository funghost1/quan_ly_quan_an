<?php
    session_start();
    require_once "ketnoi.php";
    $id_thanhvien = isset($_SESSION['id_thanhvien']) ? $_SESSION['id_thanhvien'] : ''; 
    
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <!--<link rel="stylesheet" href="css/style.css">-->
</head>

<body>




    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh Sách Đơn Hàng Chưa Xử Lý</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MÃ ĐƠN</th>
                        <th>TÊN NGƯỜI MUA</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>THỜI GIAN MUA</th>
                        <th style="width: 40px">TRẠNG THÁI</th>
                        <th>TỔNG TIỀN</th>
                        <th>CHI TIẾT</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- truy vấn lấy du liệu -->
                     <?php
                        $sql_dangcho="SELECT * FROM don_han WHERE id_khach_hang = '$id_thanhvien' AND trang_thai = '1' ORDER BY `don_han`.`id` DESC";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id'];  ?></td>
                        <td><?php echo $row['ten_khach_hang'];  ?></td>
                        <td><?php echo $row['diachi'];  ?></td>
                        <td><?php echo $row['sdt'];  ?></td>
                        <td><?php echo $row['ngay_dat_hang'];  ?></td>

                        <td><span class="badge bg-success">Đang Chờ Xử Lý</span></td>
                        <td><?php echo number_format($row['tong_tien'] ,0,",",".");  ?>VNĐ</td>
                        <td>
                            <div class="container">
                                <h4><span class="badge bg-danger"><a href="chitietdonhangdangxuly.php?id=<?php echo $row['id']; ?>">Xem Chi Tiết</a></span></h4>

                            </div>


                        </td>

                    </tr>
                    <?php } ?>
                    
                    




                </tbody>

            </table>
            <div class="card-footer" align="center">
                <a type="btn" class="btn btn-light col-lg-1" href="thanhvien.php">Trở Về</a>

            </div>
        </div>
    </div>
</body>



</html>