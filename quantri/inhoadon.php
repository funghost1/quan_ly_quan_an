<?php
    session_start();
    require_once "../ketnoi.php";

    $id_donhang = isset($_GET['id']) ? $_GET['id'] : '';
    
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>

    <link rel="stylesheet" href="css/chitiet_donhang.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
</head>

<body>
    <h2 class="text-center">HẢI ĐĂNG FOOD</h2>
    <h3 class="text-center">Hóa Đơn</h3>
    <?php
    $sqldonhang = "SELECT * FROM `don_han` WHERE id = '$id_donhang'";
    $query = mysqli_query($conn,$sqldonhang);
    while($row= mysqli_fetch_array($query)){
    ?>
    <div>

        Người Mua: <?php echo $row['ten_khach_hang']; ?>
       <br>
        Địa Chỉ: <?php echo $row['diachi']; ?>
        <br>
        Số Điện Thoại: <?php echo $row['sdt']; ?>
        <br>
        Thời Gian Mua: <?php echo $row['ngay_dat_hang']; ?>
    </div>
    <?php } ?>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th>Mã Đơn Hàng</th>

                </tr>
            </thead>

            <tbody>
                <?php
                    $sql = "SELECT * FROM `chitiet_donhang` WHERE id_don_hangg = '$id_donhang'";
                    $query = mysqli_query($conn,$sql);
                    $tien = 0;
                    $tong = 0;
                    
                    while($row= mysqli_fetch_array($query)){              
                        
                        ?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="../images/<?php echo $row['anh_sanpham']; ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $row['ten_sanpham']; ?></h4>

                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?php echo number_format($row['gia'] ,0,",","."); ?>đ</td>
                    <td align="center" data-th="Quantity"><?php echo $row['so_luong']; ?>
                    </td>
                    <?php $tien =  $row['gia'] * $row['so_luong'];?>
                    <?php $tong += $tien; ?>
                    <td data-th="Subtotal" class="text-center"><?php echo number_format($tien ,0,",","."); ?>đ</td>
                    <td align="center" class="actions" data-th="">
                        <?php echo $row['id_don_hangg']; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
                
            </tbody>
            <tfoot>
                
                <tr>
                    <td>    
                    </td>
                    <td>    
                        
                    </td>
                    <td > </td>
                    
                    <td ><strong>Tổng tiền: <?php echo number_format($tong ,0,",","."); ?>đ</strong>
                    </td>
                    
                    <td><button onclick="window.print()" class="btn btn-success btn-block">In <i class="fa fa-angle-right"></i></button>
                    
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

<script>
    const switchers = [...document.querySelectorAll('.switcher')]

    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })
</script>

</html>