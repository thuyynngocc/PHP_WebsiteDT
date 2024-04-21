-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 21, 2024 lúc 04:39 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maChiTiet` int(11) NOT NULL,
  `maDH` int(11) DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL,
  `soLuong` tinyint(4) DEFAULT NULL,
  `donGia` double DEFAULT NULL,
  `thanhTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maChiTiet`, `maDH`, `maSP`, `soLuong`, `donGia`, `thanhTien`) VALUES
(1, 13, 1, 1, 30000000, 30000000),
(2, 13, 2, 1, 30000000, 30000000),
(4, 20, 1, 1, 30000000, 30000000),
(5, 20, 2, 1, 30000000, 30000000),
(6, 21, 1, 1, 30000000, 30000000),
(7, 21, 2, 1, 30000000, 30000000),
(8, 22, 3, 2, 15000000, 30000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int(11) NOT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `dienThoai` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diaChi` varchar(100) DEFAULT NULL,
  `ghiChu` varchar(150) DEFAULT NULL,
  `phuongThucThanhToan` varchar(50) DEFAULT NULL,
  `ngayTao` date DEFAULT NULL,
  `maID` int(11) DEFAULT NULL,
  `trangThai` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDH`, `hoTen`, `dienThoai`, `email`, `diaChi`, `ghiChu`, `phuongThucThanhToan`, `ngayTao`, `maID`, `trangThai`) VALUES
(1, 'Ngọc', '0395583082', 'ngoc@gmail.com', 'TP.Hồ Chí Minh', '', 'cod', NULL, NULL, '1'),
(2, 'Ngọc', '0395583082', 'ngoc@gmail.com', 'TP.Hồ Chí Minh', '', 'cod', NULL, NULL, '1'),
(13, 'Ngọc', '0395583082', 'ngoc@gmail.com', 'TP.Hồ Chí Minh', '', 'cod', NULL, 3, '2'),
(18, 'Ngọc', '0395583082', 'ngoc@gmail.com', 'TP.Hồ Chí Minh', '', 'cod', NULL, 3, '3'),
(19, 'Nghĩa', '0972022700', 'nghia@gmail.com', 'Lâm Đồng', '', 'cod', NULL, 3, '3'),
(20, 'Nghĩa', '0972022799', 'Nghia@gmail.com', 'Lâm Đồng', '', 'cod', NULL, 3, '3'),
(21, 'Trung', '0123456789', 'trung@gmail.com', 'Tây Ninh', '', 'bank_transfer', NULL, 3, '3'),
(22, 'Trung', '123456789', 'trung@gmail.com', 'Tây Ninh', '', 'bank_transfer', '2024-04-14', 3, '3'),
(23, 'Thắng', '098765432', 'Thắng@gmail.com', 'Đồng Tháp', '', 'cod', '2024-04-14', 3, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maLoai` int(11) NOT NULL,
  `tenLoai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maLoai`, `tenLoai`) VALUES
(1, 'Điện Thoại'),
(2, 'Máy tính bảng'),
(3, 'Đồng hồ ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(100) DEFAULT NULL,
  `chitiet` varchar(150) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `hinh` varchar(50) DEFAULT NULL,
  `maLoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `chitiet`, `gia`, `hinh`, `maLoai`) VALUES
(1, 'iPhone 15 Pro', 'iPhone 15 Pro – Titan xanh – 128GB', 26000000, 'app/views/share/img/sp1.png', 1),
(2, 'iPhone 15 Pro ', 'iPhone 15 Pro – Titan đen – 256GB', 28490000, 'app/views/share/img/sp1.png', 1),
(3, 'iPhone 15 Pro Max', 'iPhone 15 Pro Max– Titan trắng – 1TB', 43999000, 'app/views/share/img/sp3.png', 1),
(4, 'iPhone 15 Pro Max', 'iPhone 15 Pro Max– Titan tự nhiên – 512GB', 36900000, 'app/views/share/img/sp4.png', 1),
(5, 'iPhone 15', 'iPhone 15 – Hồng nhạt – 128GB', 19390000, 'app/views/share/img/sp5.png', 1),
(6, 'iPhone 15 ', 'iPhone 15 – Vàng nhạt – 256GB', 20000000, 'app/views/share/img/sp6.png', 1),
(7, 'iPhone 14 Pro Max ', 'iPhone 14 Pro Max – Tím – 256GB', 27390000, 'app/views/share/img/sp7.png', 1),
(8, 'iPhone 14 Pro Max', 'iPhone 14 Pro Max – Đen – 256GB', 28000000, 'app/views/share/img/sp8.png', 1),
(9, 'iPhone 13', 'iPhone 13– Đỏ – 128GB', 14490000, 'app/views/share/img/sp9.png', 1),
(10, 'iPhone 13', 'iPhone 13– Trắng – 256GB', 17000000, 'app/views/share/img/sp10.png', 1),
(11, 'MacBook Air 13 inch M1 2020 ', 'MacBook Air 13 inch M1 2020 8CPU - 7GPU – Xám – 256GB	', 18590000, 'app/views/share/img/sp11.png', 2),
(12, 'MacBook Air 13 inch M1 2020 ', 'MacBook Air 13 inch M1 2020 8CPU - 7GPU – Vàng đồng – 256GB', 19999000, 'app/views/share/img/sp12.png', 2),
(13, 'MacBook Air 13 inch M2 ', 'MacBook Air 13 inch M2 – Vàng- 256GB ', 24000000, 'app/views/share/img/sp13.png', 2),
(14, 'MacBook Air 13 inch M2 ', 'MacBook Air 13 inch M2 – Xanh đen- 256GB ', 25000000, 'app/views/share/img/sp14.png', 2),
(15, 'MacBook Pro 14 inch M3', 'MacBook Pro 14 inch M3 – Xám – 512GB', 38590000, 'app/views/share/img/sp15.png', 2),
(16, 'MacBook Pro 14 inch M3 Pro', 'MacBook Pro 14 inch M3 Pro – Đen -512GB ', 49490000, 'app/views/share/img/sp20.png', 2),
(18, 'MacBook Pro 14 inch M3 Max', 'MacBook Pro 14 inch M3 Max – Bạc -1TB ', 79490000, 'app/views/share/img/sp20.png', 2),
(19, 'MacBook Pro 16 inch M3', 'MacBook Pro 16 inch M3 Pro-Đen-512GB	', 73290000, 'app/views/share/img/sp19.png', 2),
(20, 'MacBook Air 15 inch M2	', 'MacBook Air 15 inch M2 – Xanh đen- 512GB		', 33290000, 'app/views/share/img/sp20.png', 2),
(21, 'Apple Watch SE 2023 GPS 44mm ', 'Apple Watch SE 2023 GPS 44mm viền nhôm dây thể thao size S - Xanh đen đậm', 6790000, 'app/views/share/img/sp21.png', 3),
(22, 'Apple Watch SE 2023 GPS 44mm ', 'Apple Watch SE 2023 GPS 44mm viền nhôm dây thể thao size S - Xanh dương nhạt', 7000000, 'app/views/share/img/sp22.png', 3),
(23, 'Apple Watch SE 2023 GPS + Cellular 44mm ', 'Apple Watch SE 2023 GPS + Cellular 44mm viền nhôm dây thể thao size S- Trắng Starlight ', 8190000, 'app/views/share/img/sp23.png', 3),
(24, '', 'Apple Watch SE 2023 GPS + Cellular 44mm viền nhôm dây thể thao size S- Xanh dương nhạt ', 8190000, 'app/views/share/img/sp24.png', 3),
(25, 'Apple Watch Series 9 GPS + Cellular 45mm 	', 'Apple Watch Series 9 GPS + Cellular 45mm viền nhôm dây thể thao size S -Xanh đen đậm	', 13490000, 'app/views/share/img/sp25.png', 3),
(26, 'Apple Watch Series 9 GPS + Cellular 41mm 	', 'Apple Watch Series 9 GPS + Cellular 41mm viền nhôm dây vải- Hồng 	', 12290000, 'app/views/share/img/sp26.png', 3),
(27, 'Apple Watch Ultra 2 GPS + Cellular 49mm', 'Apple Watch Ultra 2 GPS + Cellular 49mm viền Titanium dây Alpine- Nâu ', 20.99, 'app/views/share/img/sp27.png', 3),
(28, 'Apple Watch Ultra 2 GPS + Cellular 49mm ', 'Apple Watch Ultra 2 GPS + Cellular 49mm viền Titanium dây Alpine- Xanh dương	', 20.99, 'app/views/share/img/sp28.png', 3),
(29, 'Apple Watch Ultra 2 GPS + Cellular 49mm', 'Apple Watch Ultra 2 GPS + Cellular 49mm viền Titanium dây Ocean- Cam', 21.99, 'app/views/share/img/sp29.png', 3),
(30, 'Apple Watch Ultra 2 GPS + Cellular 49mm ', 'Apple Watch Ultra 2 GPS + Cellular 49mm viền Titanium dây Ocean- Trắng', 21.99, 'app/views/share/img/sp30.png', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `maID` int(11) NOT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `matKhau` varchar(30) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`maID`, `hoTen`, `email`, `matKhau`, `role`) VALUES
(1, 'Trung', 'tranminhtrung1306@gmail.com', '$2y$12$HKpSkN6cdzj7uE6oCR2PHeG', 'USER'),
(2, 'Nghĩa', 'nghia@gmail.com', '$2y$12$rD7tDszhj8wQIf97P8PdvOj', 'ADMIN'),
(3, 'Ngọc', 'ngoc@gmail.com', '$2y$12$xwHr6kv7l1dNsOrmdy0kyeS', 'USER'),
(4, 'Thắng', 'thang@gmail.com', '$2y$12$UlpsWsTTMdZQH1eXueM5s.D', 'USER');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maChiTiet`),
  ADD KEY `maDH` (`maDH`),
  ADD KEY `maSP` (`maSP`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`),
  ADD KEY `maID` (`maID`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `maLoai` (`maLoai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`maID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `maChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `maID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`maDH`) REFERENCES `donhang` (`maDH`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`maID`) REFERENCES `users` (`maID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maLoai`) REFERENCES `loai` (`maLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
