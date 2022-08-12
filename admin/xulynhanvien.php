<?php 
     session_start();
     require_once "ketnoi.php";

     if(isset($_POST['luu'])){

        $soluong = $_POST["soluong"];
        $id =  $_POST["id"];
       
        $soban = $_POST["soban"];
        $id_sp = $_POST["id_san_pham"];
        // print_r($soluong);

        $sqlchitiet = "SELECT * FROM `chitiet_datban` WHERE so_ban = $soban && id = $id";
        $result = mysqli_query($conn,$sqlchitiet);

        while ($row = mysqli_fetch_array($result)) {
           if($row["so_luong"] >  $soluong){
               $soluongam = $row["so_luong"] - $soluong;
           }elseif($row["so_luong"] <  $soluong){
                $soluongduong = $soluong-$row["so_luong"] ;
           }else{
               $soluong0 = 0;
           }
    }

    // print_r($soluongduong);
        if(isset($soluongam)){

            $sqlcapnhat = "SELECT * FROM `sanpham` WHERE id_sp = $id_sp";
            $result = mysqli_query($conn,$sqlcapnhat);
            while ($row = mysqli_fetch_array($result)) {
                $slduong = $row["so_luong"] + $soluongam;
            }

            $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$slduong' WHERE `sanpham`.`id_sp` = $id_sp;";
            $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
        }

        if(isset($soluongduong)){

            $sqlcapnhat = "SELECT * FROM `sanpham` WHERE id_sp = $id_sp";
            $result = mysqli_query($conn,$sqlcapnhat);
            while ($row = mysqli_fetch_array($result)) {
                $slam = $row["so_luong"] - $soluongduong;
            }

            $capnhatSL = "UPDATE `sanpham` SET `so_luong` = '$slam' WHERE `sanpham`.`id_sp` = $id_sp;";
            $result_capnhatSL =  mysqli_query($conn,$capnhatSL);
        }
        $sql= "UPDATE `chitiet_datban` SET `so_luong` = '$soluong' WHERE `chitiet_datban`.`id` = $id;";
        $result = mysqli_query($conn,$sql);
        header("location:nhanvien.php");
    }

    if(isset($_POST['thanhtoan'])){
        $soban = $_POST['soban'];
        $tong = $_POST['tong'];
    //    print_r($soban);
    
    $table = "SELECT * FROM `dat_ban` WHERE `so_ban` = $soban";
                
    $resulttable = mysqli_query($conn,$table);
    while ($row = mysqli_fetch_array($resulttable)) { 
            $id = $row["id"];
            $ten = $row["ten_khach_hang"];
            $sdt = $row["sdt"];
            $songuoi = $row["so_nguoi"];
            $ngay = $row["ngay_dat_ban"];
            $trangthai = $row["trang_thai"];
            // $tong = $row["tong_tien"];
            $ghichu = $row["ghi_chu"];
            $soban11 = $row["so_ban"];
            $id_khach = $row["id_khach_hang"];
            // echo $tong;
            $sqlluu = "INSERT INTO `dat_ban_luu`(`id`, `ten_khach_hang`, `sdt`, `so_nguoi`, `ngay_dat_ban`, `trang_thai`, `tong_tien`, `ghi_chu`, `so_ban`, `id_khach_hang`) VALUES 
            ('$id','$ten','$sdt','$songuoi',' $ngay','$trangthai','$tong','$ghichu','$soban11','$id_khach')";
             $result = mysqli_query($conn,$sqlluu);
        }

    $table = "SELECT * FROM `chitiet_datban` WHERE so_ban = $soban";
	$resultdatban = mysqli_query($conn,$table);
			while ($row = mysqli_fetch_array($resultdatban)) {
                $idchitiet = $row["id"];
                $id_sp = $row["id_san_pham"];
                $sl = $row["so_luong"];
                $id_dh = $row["id_don_hangg"];
                $tensp = $row["ten_sanpham"];
                $gia = $row["gia"];
                $anh = $row["anh_sanpham"];
                $so_ban = $row["so_ban"];
                
                $sqlchitiet = "INSERT INTO `chitiet_datban_luu`(`id`, `id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`, `so_ban`) VALUES 
                ('$idchitiet','$id_sp','$sl','$id_dh','$tensp','$gia','$anh','$so_ban')";
                $result1 = mysqli_query($conn,$sqlchitiet);
            }

    print_r($id);
    print_r($soban);

    $sqlxoa = "DELETE FROM `dat_ban` WHERE `dat_ban`.`id` = $id";
    $resultxoa = mysqli_query($conn,$sqlxoa);

    $sqlcapnhatsoban = "UPDATE `ban_an` SET `trang_thai` = '1' WHERE `ban_an`.`id_ban` = $soban";
    $resultxoa = mysqli_query($conn,$sqlcapnhatsoban);
    header("location:nhanvien.php");
        
    }


?>