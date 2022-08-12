<?php 
     require_once "dau.php";
?>
<div class="card">
        <div class="card-header">
             <br>
            <h1 class="card-title">Danh Sách Thành Viên</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MÃ THÀNH VIÊN</th>
                        <th>THÀNH VIÊN</th>
                        <th>TÀI KHOẢNG</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>ĐỊA CHỈ</th>
                        <th style="width: 40px">QUYỀN</th>
                        
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- truy vấn lấy du liệu -->
                     <?php
                        $sql_dangcho="SELECT * FROM thanh";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id_tv'];  ?></td>
                        <td><img style="width: 60px; border-radius: 50%;" class="img-circle elevation-2 " src="../images/anhdaidien/<?php echo $row['hinh_dai_dien']; ?>" alt="User Avatar "> <?php echo $row['ten_tv'];  ?></td>
                        <td><?php echo $row['tai_khoan'];  ?></td>
                        <td><?php echo $row['sdt'];  ?></td>
                        <td><?php echo $row['diachi'];  ?></td>
                        <?php if($row['quyen']==0){ ?>
                            <td><span class="badge bg-success">Thành Viên</span></td>
                        <?php }elseif($row['quyen']==1){ ?>
                            <td><span class="badge bg-warning">Nhân Viên</span></td>
                        <?php }else {?>
                            <td><span class="badge btn-danger">Chủ Quán</span></td>
                            <?php } ?>
                            
                       
                        <td>
                            <div class="container">
                                <h4><span class="badge bg-danger "><a class="fas fa-trash" href="xoathanhvien.php?id=<?php echo $row['id_tv']; ?>"></a></span></h4>

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