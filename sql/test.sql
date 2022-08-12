-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 09, 2022 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban_an`
--

CREATE TABLE `ban_an` (
  `id_ban` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ban_an`
--

INSERT INTO `ban_an` (`id_ban`, `trang_thai`) VALUES
(1, 2),
(2, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_datban`
--

CREATE TABLE `chitiet_datban` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `id_don_hangg` int(11) NOT NULL,
  `ten_sanpham` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `anh_sanpham` varchar(200) NOT NULL,
  `so_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiet_datban`
--

INSERT INTO `chitiet_datban` (`id`, `id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`, `so_ban`) VALUES
(89, 3, 3, 46, 'Bò Xào', 150000, 'boxao.jpg', 3),
(100, 1, 1, 51, 'Lẩu Gà Chanh Ớt', 100000, 'gatranhot.jpg', 1),
(104, 2, 1, 46, 'Lẩu Trâu', 100000, 'lautrau.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_datban_luu`
--

CREATE TABLE `chitiet_datban_luu` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `id_don_hangg` int(11) NOT NULL,
  `ten_sanpham` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `anh_sanpham` varchar(200) NOT NULL,
  `so_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiet_datban_luu`
--

INSERT INTO `chitiet_datban_luu` (`id`, `id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`, `so_ban`) VALUES
(79, 3, 2, 39, 'Bò Xào', 150000, 'boxao.jpg', 1),
(80, 3, 2, 40, 'Bò Xào', 150000, 'boxao.jpg', 2),
(81, 1, 1, 41, 'Lẩu Gà', 100000, 'gatranhot.jpg', 1),
(82, 3, 3, 41, 'Bò Xào', 150000, 'boxao.jpg', 1),
(83, 1, 1, 42, 'Lẩu Gà', 100000, 'gatranhot.jpg', 1),
(84, 5, 3, 43, 'Gà Nướng', 150000, 'ganuong.png', 1),
(85, 3, 2, 43, 'Bò Xào', 150000, 'boxao.jpg', 1),
(86, 1, 1, 43, 'Lẩu Gà', 100000, 'gatranhot.jpg', 1),
(87, 1, 1, 44, 'Lẩu Gà', 100000, 'gatranhot.jpg', 1),
(88, 1, 1, 45, 'Lẩu Gà', 100000, 'gatranhot.jpg', 3),
(90, 3, 2, 47, 'Bò Xào', 150000, 'boxao.jpg', 2),
(93, 3, 2, 49, 'Bò Xào', 150000, 'boxao.jpg', 1),
(96, 3, 2, 48, 'Bò Xào', 150000, 'boxao.jpg', 2),
(97, 14, 2, 50, 'Bò Nướng', 120000, 'bonuong.jpg', 2),
(98, 3, 1, 50, 'Bò Xào', 150000, 'boxao.jpg', 2),
(99, 4, 1, 50, 'Nước Chanh', 20000, '1.jpg', 2),
(101, 1, 1, 52, 'Lẩu Gà Chanh Ớt', 100000, 'gatranhot.jpg', 2),
(102, 4, 2, 52, 'Nước Chanh', 20000, '1.jpg', 2),
(103, 2, 1, 52, 'Lẩu Trâu', 100000, 'lautrau.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `id_don_hangg` int(11) NOT NULL,
  `ten_sanpham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `anh_sanpham` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id`, `id_san_pham`, `so_luong`, `id_don_hangg`, `ten_sanpham`, `gia`, `anh_sanpham`) VALUES
(2, 3, 1, 69, 'Bò Xào', 150000, 'boxao.jpg'),
(3, 4, 1, 70, 'Nước Chanh', 20000, 'nuocchanh.jpg'),
(4, 5, 1, 70, 'Gà Nướng', 150000, 'ganuong.png'),
(5, 1, 1, 71, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(6, 5, 1, 71, 'Gà Nướng', 150000, 'ganuong.png'),
(7, 5, 1, 72, 'Gà Nướng', 150000, 'ganuong.png'),
(8, 3, 1, 73, 'Bò Xào', 150000, 'boxao.jpg'),
(9, 1, 1, 74, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(10, 3, 1, 75, 'Bò Xào', 150000, 'boxao.jpg'),
(13, 1, 1, 78, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(18, 1, 1, 86, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(19, 3, 1, 87, 'Bò Xào', 150000, 'boxao.jpg'),
(20, 1, 1, 88, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(21, 1, 1, 89, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(22, 1, 1, 90, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(23, 3, 1, 91, 'Bò Xào', 150000, 'boxao.jpg'),
(24, 1, 2, 92, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(25, 3, 1, 93, 'Bò Xào', 150000, 'boxao.jpg'),
(26, 1, 1, 94, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(27, 1, 1, 95, 'Lẩu Gà', 100000, 'gatranhot.jpg'),
(28, 1, 3, 96, 'Lẩu Gà ', 100000, 'gatranhot.jpg'),
(29, 3, 1, 97, 'Bò Xào', 150000, 'boxao.jpg'),
(30, 3, 2, 98, 'Bò Xào', 150000, 'boxao.jpg'),
(31, 13, 1, 98, 'Bò Nhúng Mẻ', 100000, 'bonhungme.jpg'),
(32, 3, 2, 99, 'Bò Xào', 150000, 'boxao.jpg'),
(33, 1, 1, 99, 'Lẩu Gà Chanh Ớt', 100000, 'gatranhot.jpg'),
(34, 6, 1, 100, 'Mì Xào', 100000, 'mixao.jpg'),
(35, 3, 3, 101, 'Bò Xào', 150000, 'boxao.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id` int(11) NOT NULL,
  `id_tv` int(11) NOT NULL,
  `ten_tv` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `anh_tv` varchar(50) NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `danh_gia`
--

INSERT INTO `danh_gia` (`id`, `id_tv`, `ten_tv`, `anh_tv`, `noi_dung`, `trang_thai`) VALUES
(1, 1, 'Đăng', 'dang.jpg', 'Quán phục vụ tận tình, nhân viên thân thiện đồ ăn ngon nhanh chóng. Tôi rất hài lòng về món lẩu của quán 10 điểm', 1),
(3, 2, 'Lộc', 'loc.jpg', 'Quán phục vụ tận tình, nhân viên thân thiện đồ ăn ngon nhanh chóng. Tôi rất hài lòng về món lẩu của quán 10 điểm', 1),
(4, 4, 'Đạt', 'dat.jpg', 'Quán phục vụ tận tình, nhân viên thân thiện đồ ăn ngon nhanh chóng. Tôi rất hài lòng về món lẩu của quán 10 điểm', 1),
(7, 1, 'Đăng', 'dang.jpg', 'quán như con cạc', 1),
(8, 1, 'Đăng', 'dang.jpg', 'bán đắc như trâu', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_ban`
--

CREATE TABLE `dat_ban` (
  `id` int(11) NOT NULL,
  `ten_khach_hang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci DEFAULT NULL,
  `sdt` varchar(11) NOT NULL,
  `so_nguoi` int(5) NOT NULL,
  `ngay_dat_ban` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(3) NOT NULL,
  `tong_tien` int(10) NOT NULL,
  `ghi_chu` text CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `so_ban` int(5) NOT NULL,
  `id_khach_hang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dat_ban`
--

INSERT INTO `dat_ban` (`id`, `ten_khach_hang`, `sdt`, `so_nguoi`, `ngay_dat_ban`, `trang_thai`, `tong_tien`, `ghi_chu`, `so_ban`, `id_khach_hang`) VALUES
(46, 'Hải Đăng', '0912767638', 4, '2021-11-19 06:16:54', 1, 450000, '', 3, 1),
(51, 'Hải Đăng', '0912767638', 4, '2021-12-18 12:02:54', 1, 100000, '', 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dat_ban_luu`
--

CREATE TABLE `dat_ban_luu` (
  `id` int(11) NOT NULL,
  `ten_khach_hang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci DEFAULT NULL,
  `sdt` varchar(11) NOT NULL,
  `so_nguoi` int(5) NOT NULL,
  `ngay_dat_ban` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(3) NOT NULL,
  `tong_tien` int(10) NOT NULL,
  `ghi_chu` text CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `so_ban` int(5) NOT NULL,
  `id_khach_hang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dat_ban_luu`
--

INSERT INTO `dat_ban_luu` (`id`, `ten_khach_hang`, `sdt`, `so_nguoi`, `ngay_dat_ban`, `trang_thai`, `tong_tien`, `ghi_chu`, `so_ban`, `id_khach_hang`) VALUES
(39, '', '', 0, '2021-10-23 17:26:18', 1, 300000, '', 1, 5),
(40, 'cậu 3', '123644', 4, '2021-10-23 17:29:25', 1, 150000, '', 2, 1),
(41, '', '', 0, '2021-10-23 17:36:54', 1, 550000, '', 1, 5),
(42, '', '', 0, '2021-10-30 14:22:23', 1, 100000, '', 1, 5),
(43, 'Hải Đăng', '0912767638', 5, '2021-10-27 15:51:10', 1, 850000, 'Nhanh Nhanh Giùm Em', 1, 1),
(44, '', '', 0, '2021-10-30 16:00:34', 1, 100000, '', 1, 5),
(45, 'Hải Đăng', '0912767638', 4, '2021-11-02 12:15:35', 1, 100000, '', 3, 1),
(47, 'Hải Đăng', '123644', 4, '2021-11-19 06:57:13', 1, 300000, '', 2, 1),
(48, 'Ý Vi', '0912767638', 4, '2021-12-07 13:24:39', 1, 300000, '', 2, 1),
(49, 'Hải Đăng', '0912767638', 4, '2021-12-10 14:53:11', 1, 300000, '', 1, 1),
(50, 'Hải Đăng', '0912767638', 10, '2021-12-18 12:00:15', 1, 410000, '', 2, 1),
(52, 'Hải Đăng', '0912767638', 4, '2021-12-22 02:03:05', 1, 240000, '', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dm_sp`
--

CREATE TABLE `dm_sp` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `dm_sp`
--

INSERT INTO `dm_sp` (`id_dm`, `ten_dm`) VALUES
(1, 'Món Lẩu'),
(2, 'Món Xào'),
(3, 'Món Nướng'),
(4, 'Nước'),
(5, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_han`
--

CREATE TABLE `don_han` (
  `id` int(10) NOT NULL,
  `ten_khach_hang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `ngay_dat_hang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(3) NOT NULL,
  `tong_tien` int(10) NOT NULL,
  `ghi_chu` text CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `id_khach_hang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `don_han`
--

INSERT INTO `don_han` (`id`, `ten_khach_hang`, `sdt`, `diachi`, `ngay_dat_hang`, `trang_thai`, `tong_tien`, `ghi_chu`, `id_khach_hang`) VALUES
(69, 'Hải Đăng', '123644', 'Cần thơ', '2021-09-03 13:29:41', 1, 150000, '', 1),
(70, 'Hải Đăng', '123644', 'Cần thơ', '2021-09-03 14:45:44', 2, 170000, '', 1),
(71, 'Hải Đăng', '091277638', 'cần Thơ', '2021-12-16 12:50:51', 4, 250000, '', 1),
(72, 'Tấn Lộc', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-10-03 02:15:07', 3, 150000, '', 1),
(73, 'Nguyễn Hải Đăng', '0912767638', 'An Hòa Cần Thơ', '2021-09-03 15:14:16', 2, 150000, '', 1),
(74, 'Hiểu Băng', '0912767638', 'Sóc Trăng', '2021-10-04 07:48:31', 3, 100000, 'HAHA', 3),
(75, 'Hải Đăng', '0912767638', 'Cần thơ', '2021-10-01 03:03:52', 2, 150000, 'Bò không bỏ hành giùm em, cho em xin thêm trái ớt', 5),
(78, 'Hải Đăng', '123644', 'Cần thơ', '2021-10-03 02:04:52', 3, 100000, '', 1),
(86, 'Hải Đăng', '123644', 'Cần thơ', '2021-10-02 05:54:03', 2, 100000, '', 1),
(87, 'Hải Đăng', '123644', 'Cần thơ', '2021-10-01 03:05:55', 2, 150000, '', 5),
(88, 'Hải Đăng', '123644', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-15 16:55:43', 3, 100000, '', 1),
(89, 'đạt', '123644', 'đồng tháp', '2021-12-15 15:34:02', 2, 100000, '', 4),
(90, 'Hải Đăng', '123644', 'Cần thơ', '2021-11-16 08:44:44', 2, 100000, '', 1),
(91, 'cậu 3', '123644', 'đồng tháp', '2021-11-16 08:44:33', 2, 150000, '', 1),
(92, 'Hải Đăng', '123644', 'Cần thơ', '2021-11-16 08:44:25', 2, 200000, '', 1),
(93, 'hai đăng', '0912767638', 'cần thơ', '2021-11-16 08:44:16', 2, 150000, 'giao trước 9h giùm em', 1),
(94, 'Hải Đăng', '123644', 'Cần thơ', '2021-11-19 06:56:10', 2, 100000, '', 1),
(95, 'Hải Đăng', '123644', 'Cần thơ', '2021-12-15 14:38:37', 3, 100000, '', 1),
(96, 'Hải Đăng', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-10 14:43:23', 2, 300000, 'lẹ giùm em ít cay', 1),
(97, 'Hải Đăng', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-10 14:52:05', 2, 150000, '', 1),
(98, 'Hải Đăng', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-18 11:49:48', 1, 400000, 'giao nhanh giùm em', 1),
(99, 'Hải Đăng', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-18 12:04:46', 2, 400000, 'giao nhanh giùm em', 1),
(100, 'Hải Đăng', '0912767638', 'hẻm 311 an hòa nguyễn văn cừ ninh kều', '2021-12-22 02:07:18', 2, 100000, '', 1),
(101, 'thu', '01254678912', 'phuong an 3', '2022-04-24 06:20:57', 2, 450000, 'giao nhanh gium em', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `ten_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `so_luong` int(5) NOT NULL,
  `mota_sp` text CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `anh_sp` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `dm_sp` int(5) NOT NULL,
  `trang_thai_sp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `gia_sp`, `so_luong`, `mota_sp`, `anh_sp`, `dm_sp`, `trang_thai_sp`) VALUES
(1, 'Lẩu Gà Chanh Ớt', 100000, 6, 'lầu gà siêu ngon siêu hấp dẫn', 'gatranhot.jpg', 1, 2),
(2, 'Lẩu Trâu', 100000, 8, 'Lẩu thơm ngon thịt trâu hảo hạn', 'lautrau.jpg', 1, 2),
(3, 'Bò Xào', 150000, 37, 'Bò xào với rau đồng siêu ngon hấp dẫn', 'boxao.jpg', 2, 2),
(4, 'Nước Chanh', 20000, 17, 'Nước tranh vàng tươi ngon giải khác mùa hè', '1.jpg', 4, 2),
(5, 'Gà Nướng', 150000, 25, 'Món gà nướng là một trong món ăn bạn không thể bỏ qua tại quán của chúng tôi.', 'ganuong.png', 3, 1),
(6, 'Mì Xào', 100000, 9, 'Mì xào hấp dẫn an toàn vệ sinh', 'mixao.jpg', 2, 2),
(7, 'Gà Chiên Nước Mắm', 90000, 0, 'Cánh gà chiên nước nắm thơm ngon', 'canhgachiennuocnam.jpg', 5, 2),
(12, 'Mỳ Xào Cay', 50000, 10, 'Mỳ xào cay theo phong cách châu âu hương vị thơm dễ ăn.', 'home-img-1.png', 2, 1),
(13, 'Bò Nhúng Mẻ', 100000, 3, 'Thịt Bò tươi ngon, nước lẩu được nấu từ nước cơm mẻ', 'bonhungme.jpg', 1, 0),
(14, 'Bò Nướng', 120000, 8, 'Bò nướng thang đước, thịt bò tươi ngon được ướp nguyên liệu mật ong tự nhiên', 'bonuong.jpg', 3, 2),
(15, 'Cá Lóc Hấp', 80000, 0, 'Cá lóc đồng loại lớn, hấp muối và hấp rau củ', 'calochap.jpg', 5, 0),
(16, 'Cá Lóc Nướng', 80000, 4, 'Cá lóc đồng loại lớn, nướng chui ăn với nước nắm me', 'canuong.jpg', 3, 0),
(17, 'Cơm Chiên Hải Sản', 50000, 5, 'Cơm chiên với các loại hải sản tươi, thơm ngon', 'comchienhaisan.jpg', 5, 0),
(18, 'Lẩu Gà Hầm Xả', 120000, 0, 'Lẩu gà đá hầm xả thịt gà ngọt day, nước lẩu thơm ngon.', 'gahamxa.jpg', 1, 0),
(19, 'Ếch Xào', 110000, 3, 'Ếch đồng xào thơm ngon với các loại rau đồng.', 'echxao.jpg', 2, 0),
(20, 'Tôm Nướng', 90000, 15, 'Tôm biển nướng muối ớt, tôm loại lớn thơm ngon', 'tomnuong.jpg', 3, 0),
(21, 'Gà Hấp', 150000, 0, 'Gà vườn hấp bia, rau củ thơm ngon thịt gà ngọt', 'gahapbia.jpg', 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanh`
--

CREATE TABLE `thanh` (
  `id_tv` int(10) NOT NULL,
  `tai_khoan` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `mat_khau` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_nopad_ci NOT NULL,
  `ten_tv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `hinh_dai_dien` varchar(200) NOT NULL,
  `diachi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thanh`
--

INSERT INTO `thanh` (`id_tv`, `tai_khoan`, `mat_khau`, `ten_tv`, `sdt`, `hinh_dai_dien`, `diachi`, `quyen`) VALUES
(1, 'dang', 'dang', 'Đăng', '0912767638', 'dang.jpg', '', 0),
(2, 'loc', 'loc', 'Lộc', '0912767638', 'loc.jpg', '', 0),
(3, 'bang', 'bang', 'Băng', '0123456789', 'nyc.jpg', '', 0),
(4, 'dat', 'dat', 'Đạt', '0912767638', 'dat.jpg', 'Đồng Tháp', 0),
(5, 'dang1', 'dang1', 'Đăng', '0123456789', '19030429_1869119323347786_2140981665963717817_n.jpg', 'Hòa An Hậu Giang', 1),
(7, 'dang123', 'dang123', 'Đăng', '0912767638', 'dang.jpg', 'Trà lồng', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban_an`
--
ALTER TABLE `ban_an`
  ADD PRIMARY KEY (`id_ban`);

--
-- Chỉ mục cho bảng `chitiet_datban`
--
ALTER TABLE `chitiet_datban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_don_hangg` (`id_don_hangg`);

--
-- Chỉ mục cho bảng `chitiet_datban_luu`
--
ALTER TABLE `chitiet_datban_luu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitiet_donhang_ibfk_1` (`id_don_hangg`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dat_ban`
--
ALTER TABLE `dat_ban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dat_ban_luu`
--
ALTER TABLE `dat_ban_luu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dm_sp`
--
ALTER TABLE `dm_sp`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `don_han`
--
ALTER TABLE `don_han`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `order_detail_ibfk_2` (`dm_sp`);

--
-- Chỉ mục cho bảng `thanh`
--
ALTER TABLE `thanh`
  ADD PRIMARY KEY (`id_tv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban_an`
--
ALTER TABLE `ban_an`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chitiet_datban`
--
ALTER TABLE `chitiet_datban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `chitiet_datban_luu`
--
ALTER TABLE `chitiet_datban_luu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dat_ban`
--
ALTER TABLE `dat_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `dat_ban_luu`
--
ALTER TABLE `dat_ban_luu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `dm_sp`
--
ALTER TABLE `dm_sp`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_han`
--
ALTER TABLE `don_han`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `thanh`
--
ALTER TABLE `thanh`
  MODIFY `id_tv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_datban`
--
ALTER TABLE `chitiet_datban`
  ADD CONSTRAINT `chitiet_datban_ibfk_1` FOREIGN KEY (`id_don_hangg`) REFERENCES `dat_ban` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`id_don_hangg`) REFERENCES `don_han` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`dm_sp`) REFERENCES `dm_sp` (`id_dm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
