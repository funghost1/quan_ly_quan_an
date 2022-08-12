<?php 
     require_once "dau.php";
?>
<div class="card">
        <div class="card-header">
             <br>
            <h1 class="card-title">Danh Sách Phản Hồi</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MÃ BÌNH LUẬN</th>
                        
                        <th>THÀNH VIÊN</th>
                        <th>MÃ THÀNH VIÊN</th>
                        <th>NỘI DUNG</th>
                        
                        
                        
                        <th>XÓA</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- truy vấn lấy du liệu -->
                     <?php
                        $sql_dangcho="SELECT * FROM danh_gia";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id'];  ?></td>
                        
                        <td><img style="width: 60px; border-radius: 50%;" class="img-circle elevation-2 " src="../images/anhdaidien/<?php echo $row['anh_tv']; ?>" alt="User Avatar "> <?php echo $row['ten_tv'];  ?></td>
                        <td align="center"><?php echo $row['id_tv'];  ?></td>
                        <td><?php echo $row['noi_dung'];  ?></td>
                        
                        <td>
                            <div class="container">
                                <h4><span class="badge bg-danger "><a class="fas fa-trash" href="xoabinhluan.php?id=<?php echo $row['id']; ?>"></a></span></h4>

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