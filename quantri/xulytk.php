<?php
if(is_numeric($_POST['thang']))
	$thang = $_POST['thang']; 
else $thang = date('m');
if(is_numeric($_POST['nam']))
	$nam = $_POST['nam']; 
else $nam = date('y');
require_once "../ketnoi.php"; 

// lấy ra sp bán chạy nhất theo tháng, năm
$soluotmua = mysqli_query($conn, "SELECT count(tong_tien) AS SL FROM don_han WHERE ngay_dat_hang BETWEEN '$nam/$thang/01' AND '$nam/$thang/31'");
while($dang =  mysqli_fetch_assoc($soluotmua) ){
	$tong = $dang['SL'];
}
$query = mysqli_query($conn,"SELECT id_san_pham, so_luong, ngay_dat_hang FROM chitiet_donhang, don_han WHERE don_han.id = chitiet_donhang.id_don_hangg AND ngay_dat_hang BETWEEN '$nam/$thang/01' AND '$nam/$thang/31' limit 1");
// lấy ra sp Tổng tiền thu đc theo tháng, năm
$query3 = mysqli_query($conn,"SELECT SUM(tong_tien) AS TT FROM don_han WHERE ngay_dat_hang BETWEEN '$nam/$thang/01' AND '$nam/$thang/31' AND don_han.trang_thai = 2");
foreach($query3 as $key => $value);
while($data = mysqli_fetch_assoc($query))
{

	$query2 = mysqli_query($conn, "SELECT ten_sp FROM sanpham WHERE id_sp = $data[id_san_pham]");
	while($data2 = mysqli_fetch_assoc($query2)) {
		echo '
		
		<h1 style="color: blue" >Doanh thu bán online</h1>
		<h2>Sản Phẩm Bán Chạy Nhất: '.$data2['ten_sp'].'</h2>
		<h3>Tổng số đơn hàng đã bán được trong tháng '.$thang.' năm '.$nam.' : '.$tong.'</h3>
		<hr>
		<h2>Doanh Thu Tháng '.$thang.': <span style="color: red">'.number_format($value['TT']).' đ</span></h2>
		
		';
	}
}

echo "<br>";
echo "//////////////////////////////////////////////////////////////////////////////////////////////";
$soluotmua1 = mysqli_query($conn, "SELECT count(tong_tien) AS SL FROM dat_ban_luu WHERE ngay_dat_ban BETWEEN '$nam/$thang/01' AND '$nam/$thang/31'");
while($dang1 =  mysqli_fetch_assoc($soluotmua1) ){
	$tong1 = $dang1['SL'];
}
$query = mysqli_query($conn,"SELECT id_san_pham, so_luong, ngay_dat_ban FROM chitiet_datban_luu, dat_ban_luu WHERE dat_ban_luu.id = chitiet_datban_luu.id_don_hangg AND ngay_dat_ban BETWEEN '$nam/$thang/01' AND '$nam/$thang/31' limit 1");
// lấy ra sp Tổng tiền thu đc theo tháng, năm
$query3 = mysqli_query($conn,"SELECT SUM(tong_tien) AS TT FROM dat_ban_luu WHERE ngay_dat_ban BETWEEN '$nam/$thang/01' AND '$nam/$thang/31'");
foreach($query3 as $key => $value);
while($data = mysqli_fetch_assoc($query))
{

	$query2 = mysqli_query($conn, "SELECT ten_sp FROM sanpham WHERE id_sp = $data[id_san_pham]");
	while($data2 = mysqli_fetch_assoc($query2)) {
		echo '
		<h1 style="color: blue" >Doanh thu bán tại quán</h1>
		<h2>Sản Phẩm Bán Chạy Nhất: '.$data2['ten_sp'].'</h2>
		<h3>Tổng số đơn hàng đã bán được trong tháng '.$thang.' năm '.$nam.' : '.$tong1.'</h3>
		<hr>
		<h2>Doanh Thu Tháng '.$thang.': <span style="color: red">'.number_format($value['TT']).' đ</span></h2>
		
		';
	}
}



 ?>