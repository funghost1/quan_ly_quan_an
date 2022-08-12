<?php 
     require_once "dau.php";
?>
<div class="card">
        <div class="card-header">
             <br>
            <h1 class="card-title">Danh Sách Món Ăn</h1>
        </div>
        <!-- <a class="btn btn-success" href="#">Thêm Món Ăn</a> -->
        <div class="row">
            <div  class="col-sm-6 col-md-6 "></div>
            <div class="col-sm-6 col-md-2 ">
            </div>
            <div class="col-sm-6 col-md-2 ">
            </div>
            <div  class="col-sm-6 col-md-2 ">
              <a type="btn" class="btn btn-success"  href="them.php"> Thêm Món +</a>&nbsp;
            </div>
          </div>
          
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>MÃ MÓN</th>
                        <th>TÊN MÓN</th>
                        
                        <th>GIÁ</th>
                        <th>SỐ LƯỢNG</th>
                        <th style="width: 40px">TRẠNG THÁI</th>
                        <th>DANH MỤC</th>
                        <th>...</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- truy vấn lấy du liệu -->
                     <?php
                        $sql_dangcho="SELECT * FROM sanpham";
                        $querydangcho = mysqli_query($conn,$sql_dangcho);
                        
                        while($row= mysqli_fetch_array($querydangcho)){ 
                    ?>

                    <tr>
                        <td align="center"><?php echo $row['id_sp'];  ?></td>
                        <td><?php echo $row['ten_sp'];  ?></td>
                       
                        <td><?php echo number_format($row['gia_sp'] ,0,",",".");  ?>  VNĐ</td>
                        <form action="cap_nhat_SL_SP.php" method="post">
                            <td><input type="number" name="soluong" value="<?php echo $row['so_luong'];  ?>">
                            <input type="hidden" name="id" value="<?php echo $row['id_sp']; ?>" >
                            <button name="capnhat" type="submit" class="fas fa-save" ></button> </td>
                        </form>
                        
                        <!--  -->
                        <!-- in trang thái sản phẩm -->
                        <?php if($row['so_luong'] >0 ){ ?>
                            <td><span class="badge bg-success">Còn Hàng</span></td>
                        <?php }else{ ?>
                            <td><span class="badge bg-danger">Hết Hàng</span></td>
                        <?php } ?>

                        <!-- in tên danh mục -->
                        <?php if($row['dm_sp'] == 1 ){ ?>
                        <td>Món Lẩu</td>
                        <?php }elseif($row['dm_sp'] == 2 ){ ?>
                        <td>Món Xào</td>
                        
                        <?php }elseif($row['dm_sp'] == 3 ){ ?>
                        <td>Món Nướng</td>
                        <?php }elseif($row['dm_sp'] == 4 ){ ?>
                        <td>Nước</td>
                        
                        <?php }elseif($row['dm_sp'] == 5 ){ ?>
                        <td>Khác</td>
                        <?php } ?>
                        <td>
                            <div class="container">
                                
                                <h4><span class="badge bg-danger"><a class="fas fa-edit" href="thaydoi.php?id=<?php echo $row['id_sp']; ?>"></a></span> || 
                                <span class="badge bg-danger"><a class="fas fa-trash" href="xoasp.php?id=<?php echo $row['id_sp']; ?>"></a></span></h4>

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