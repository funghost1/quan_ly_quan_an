<?php 
     require_once "dau.php";
?>
<div class="card">
        <div class="card-header">
             <br>
            <h1 class="card-title">Danh Sách Bàn Ăn Đã Bán</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MÃ ĐƠN</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>SỐ BÀN</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>THỜI GIAN ĂN</th>
                        <th style="width: 40px">TRẠNG THÁI</th>
                        <th>TỔNG TIỀN</th>
                        <th>CHI TIẾT</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- truy vấn lấy du liệu -->
                     <?php
                        $sql_dangcho="SELECT * FROM dat_ban_luu WHERE trang_thai = '1' ORDER BY `dat_ban_luu`.`id` DESC";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id'];  ?></td>
                        <td><?php echo $row['ten_khach_hang'];  ?></td>
                        <td><?php echo $row['so_ban'];  ?></td>
                        <td><?php echo $row['sdt'];  ?></td>
                        <td><?php echo $row['ngay_dat_ban'];  ?></td>

                        <td><span class="badge bg-success">Đã Thanh Toán</span></td>
                        <td><?php echo number_format($row['tong_tien'] ,0,",",".");  ?>VNĐ</td>
                        <td>
                            <div class="container">
                                <h4><span class="badge bg-danger"><a class="fas fa-eye" href="chitiet_banan.php?id=<?php echo $row['id']; ?>"></a></span></h4>

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