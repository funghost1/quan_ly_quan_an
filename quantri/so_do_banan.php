<?php 
     require_once "dau.php";
?>
<div class="card-header">
             <br>
            <h1 class="card-title">Sơ Đồ Bàn Ăn Hiện Tại Trong Quán</h1>
        </div>


   <div class="container">
							
                            <?php
                                
                                $table = "SELECT * FROM ban_an";
                                $resulttable = mysqli_query($conn,$table);
                                while ($rowtable = mysqli_fetch_array($resulttable)) { ?>
                                    <?php if($rowtable['trang_thai'] == 2){ ?>				
                                            <a href="ban_an.php?id=<?php echo $rowtable["id_ban"]; ?>" class="btn btn-danger" style="font-size:50px; margin: 25px; padding: 15px"> Bàn <?php echo $rowtable['id_ban']; ?> </a>
                                        <?php }else{?>
                                            <p  href="nhanvien.php?id=<?php echo $rowtable["id_ban"]; ?>" class="btn btn-success" style="font-size:50px; margin: 25px; padding: 15px"> Bàn <?php echo $rowtable['id_ban']; ?> </p>
                                    
                            <?php }}
                            ?>
                        
                    </div>
<?php 
     require_once "cuoi.php";
?>