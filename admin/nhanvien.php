<?php
	session_start();
	require_once('../ketnoi.php');

	$_SESSION['soban'] = isset($_GET['id']) ? $_GET['id'] : '0';;
	$soban = isset($_SESSION['soban']) ? $_SESSION['soban'] : '0';
	
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/clickevent.js"></script>  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body>
	<?php if(isset($_SESSION["Username_nhanvien"]))  { ?>

		<div class="header-cashier">
			<div class="container-fluid">
				<div class="row ft-tabs">
					<div class="col-md-3">
						<ul class="tabs-list">
							<li><a href="#" class="active" data="pos">Thực Đơn</a></li>
							<li><a href="#"  data="listtable">Bàn Ăn</a></li>
							
						</ul>
					</div>
					
					<div class="col-md-4 cashier-search">
						<input type="text" name="txtnamemenu" id="search-menu" placeholder="Nhập tên mặt hàng" class="form-control">
						<div id="result-menu-post">
							
						</div>
					</div>
				
					
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row content">
				<div class="col-md-6" id="table-list" hidden="true">
					<div class="row list-filter">
						<div class="col-md list-filter-content">
								<button class="btn btn-primary">Trong Nhà</button>
						</div>
						
					</div>
					<!-- in bàn ăn ra màng hình-->
					<div >
						<div class="container">
							
								<?php
									
									$table = "SELECT * FROM ban_an";
									$resulttable = mysqli_query($conn,$table);
									while ($rowtable = mysqli_fetch_array($resulttable)) { ?>
										<?php if($rowtable['trang_thai'] == 2){ ?>				
												<a href="nhanvien.php?id=<?php echo $rowtable["id_ban"]; ?>" class="btn btn-danger" style="font-size:30px; margin: 15px; padding: 15px"> Bàn <?php echo $rowtable['id_ban']; ?> </a>
											<?php }else{?>
												<p  href="nhanvien.php?id=<?php echo $rowtable["id_ban"]; ?>" class="btn btn-success" style="font-size:30px; margin: 15px; padding: 15px"> Bàn <?php echo $rowtable['id_ban']; ?> </p>
										
								<?php }}
								?>
							
						</div>
					</div>
				</div>
				<div class="col-md-6" id="pos" >
					<div class="row list-filter">
						<div class="col-md list-filter-content">
							<form action="nhanvien.php" method="post">
							<button type="btn" class="btn btn-primary active">Món Lẩu</button>
							<button type="btn" class="btn btn-primary active">Món Xào</button>
							<button type="btn" class="btn btn-primary active">Món Nướng</button>
							<button type="btn" class="btn btn-primary active">Nước</button>
							<button type="btn" class="btn btn-primary active">Khác</button>
							</form>
							
						</div>
					</div>
					<div class="row product-list">
						<div class="col-md product-list-content">
							<ul>
								<?php
									$menu = "SELECT * FROM sanpham";
									$resultmenu = mysqli_query($conn,$menu);
									while ($rowmenu = mysqli_fetch_array($resultmenu)) { ?>
										<li><a href="#"  title="<?php echo $rowmenu['ten_sp'];?>">
										<div class="img-product">
											<img src="../images/<?php echo $rowmenu['anh_sp']; ?>">
										</div>
										<div class="product-info">
											<span class="product-name"><?php echo $rowmenu['ten_sp'];?></span><br>
											<strong><?php echo number_format($rowmenu['gia_sp']);?> VNĐ</strong>
											<br>
											<form action="themmonan.php" method="post">


												<input type="hidden" name="soban" value="<?php echo $soban; ?>" >
												<?php $id_sp = $rowmenu['id_sp'];  ?>
												<input type="hidden" name="id_sp" value="<?php echo $rowmenu['id_sp']; ?>" >
												<input type="hidden" name="ten_sp" value="<?php echo $rowmenu['ten_sp']; ?>" >
												<input type="hidden" name="gia" value="<?php echo $rowmenu['gia_sp']; ?>" >
												<input type="hidden" name="anh" value="<?php echo $rowmenu['anh_sp']; ?>" >
												<input type="hidden" name="sl" value="<?php echo $rowmenu['so_luong']; ?>" >



												<?php if($rowmenu['so_luong'] <= 0){?>
														<button class="btn btn-primary"  type="submit" name="themvaodatban" disabled >Hết</button>
													<?php }else{ ?>
														<button class="btn btn-primary"  type="submit" name="themvaodatban" >Thêm</button>
												<?php } ?>
											</form>
										</div>
									</a>
								</li>
								<?php }
								?>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 content-listmenu" id="content-listmenu">
					<div class="row" id="bill-info">
						<div class="col-md-2 table-infor">
							Bàn: <?php echo $soban; ?>
						</div>
						<div class="col-md-5">
							<div class="col-md-12 p-0 input-group">
								<!-- <input type="text" id="customer-infor" placeholder="Tìm khách hàng" class="form-control"> -->
								<div class="input-group-append">
									<!-- <button class="btn btn-primary" data-toggle="modal" data-target="#ModelAddcustomer"><i class="fa fa-plus" aria-hidden="true"></i></button> -->
									<a type="btn" class="btn btn-primary active" href="taoban.php">Tạo Bàn Ăn</a>
								</div>
								<div id="result-customer"></div>
								<span class="del-customer"></span>
							</div>
						</div>
						<div class="col-md-5">
							
								<a type="btn" class="btn btn-danger" href="dangxuat.php">Đăng Xuất</a>
							
						</div>
					</div>
					<div class="row bill-detail">
						<div class="col-md-12 bill-detail-content">
							<table class="table table-bordered">
							<thead class="thead-light">
								<tr>
								<th scope="col">STT</th>
								<th scope="col">Tên sản phẩm</th>
								<th scope="col">Số lượng</th>
								
								<th scope="col">Gía bán</th>
								<th scope="col">Thành Tiền</th>
								<th scope="col">Lưu/Xóa</th>
								</tr>
							</thead>



						

							
							<tbody>

									<?php 
										$table = "SELECT * FROM dat_ban WHERE 'so_ban' = $soban";
										$resulttable = mysqli_query($conn,$table);
										while ($rowban = mysqli_fetch_array($resulttable)) { ?>
									<?php } ?>


								<?php 
								$thanhtien = 0;
								$tong = 0;
								$table = "SELECT * FROM `chitiet_datban` WHERE so_ban = $soban";
								$resultdatban = mysqli_query($conn,$table);
								while ($row = mysqli_fetch_array($resultdatban)) { ?>
									
							<tr >
								<td class="text-center">1</td>
								<td  align="center"><?php echo $row['ten_sanpham']; ?></td>
								<td><div class="input-group spinner ">
									<form  action="xulynhanvien.php" method="post">

										<input type="number" class="form-control quantity-product-oders" name="soluong" value="<?php echo $row['so_luong']; ?>">
										<input type="hidden" name="id" value="<?php echo $row["id"]; ?>" >
										<input type="hidden" name="soban" value="<?php echo $soban; ?>" >
										<input type="hidden" name="id_san_pham" value="<?php echo $row["id_san_pham"]; ?>" >
										
											
										<button class="form-control quantity-product-oders btn btn-primary fa fa-save" name="luu" type="submit" ></button>
							
											
									</form>
									</div></td>
								
								<td><input type="text" class="form-control price-order" disabled="disabled" name="" value="<?php echo $row['gia']; ?>"></td>
								<?php $thanhtien = $row['so_luong'] * $row['gia'];?>
								<?php $tong += $thanhtien;?>
								<td class="text-center total-money"><?php echo $thanhtien; ?></td>
								<td>
									<form  action="xulynhanvien.php" method="post">
										<input type="hidden" name="soluong" value="<?php echo $row['so_luong']; ?>" >
										
											<a href="xoadatban.php?id=<?php echo $row["id"] ?>" class="btn btn-primary fa fa-times-circle del-pro-order"></a>
										
									</form>
								</td>
								<!-- <td class="text-center">
									
									<i class="fa fa-times-circle del-pro-order"></i>
								</td> -->
							</tr>
							<?php } ?>
							</tbody>
							</table>
								</div>
							</div>



						<form action="xulynhanvien.php" method="post">
							<div class="row bill-action">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12 p-1">
											<textarea class="form-control" id="note-order" placeholder="Nhập ghi chú hóa đơn" rows="3"></textarea>
										</div>
									</div>
									<div class="row">
										
										<div class="col-md-12 col-xs-6 p-1">
											<input type="hidden" name="soban" value="<?php echo $soban; ?>" >
											<input type="hidden" name="tong" value="<?php echo $tong; ?>" >
											<button name="thanhtoan" type="submit" class="btn-print"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh Toán (F9)</button>
										</div>
										
										<!-- <div class="col-md-6 col-xs-6 p-1">
											<button name="luu1" type="submit" class="btn-pay"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu (F10)</button>
										</div> -->
									</div>
								</div>




						</form>




						<div class="col-md-6">
							<div class="row form-group">
								<label class="col-form-label col-md-4"><b>Tổng cộng</b></label>
								<div class="col-md-8">
									<input type="text" value="<?php echo $tong; ?>" class="form-control total-pay" disabled="disabled">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-form-label col-md-4"><b>Khách Đưa</b></label>
								<div class="col-md-8">
									<input type="text" class="form-control customer-pay" value="0" placeholder="Nhập số điền khách đưa">
								</div>
							</div>
							<div class="row form-group">
								<label class="col-form-label col-md-4"><b>Tiền thừa</b></label>
								<div class="col-md-8 excess-cash">
									0
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	<?php }else{
		header("Location:../login.php");
	} ?>
</body>
</html>
