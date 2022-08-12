<?php 
     require_once "dau.php";
?>
<div class="card">
        <div class="card-header">
             <br>
            <h1 class="card-title">Danh Sách Đơn Hàng Đã Mua</h1>
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
                        $sql_dangcho="SELECT * FROM don_han WHERE trang_thai = '2' ORDER BY `don_han`.`id` DESC";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id'];  ?></td>
                        <td><?php echo $row['ten_khach_hang'];  ?></td>
                        <td><?php echo $row['diachi'];  ?></td>
                        <td><?php echo $row['sdt'];  ?></td>
                        <td><?php echo $row['ngay_dat_hang'];  ?></td>

                        <td><span class="badge bg-success">Đã Mua</span></td>
                        <td><?php echo number_format($row['tong_tien'] ,0,",",".");  ?>VNĐ</td>
                        <td>
                            <div class="container">
                                <h4><span class="badge bg-danger"><a class="fas fa-eye" href="chitietdonhangdamua.php?id=<?php echo $row['id']; ?>"></a></span></h4>

                            </div>


                        </td>

                    </tr>
                    <?php } ?>
                    
                    




                </tbody>

            </table>
            
        </div>
    </div>
<?php 
     require_once "cuoi.php";
?>