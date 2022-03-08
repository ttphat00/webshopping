-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 07:53 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--
CREATE DATABASE IF NOT EXISTS `quanlydathang` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quanlydathang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date DEFAULT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThaiDH` varchar(20) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MSHH` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(50) NOT NULL,
  `QuyCach` text DEFAULT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(18, 'Chó Beagle / Chó Săn Thỏ Thuần Chủng', 'Chó Beagle còn gọi là Chó Săn Thỏ với ngoại hình nhỏ nhắn, nghộ nghĩnh và rất thông minh thích hợp làm thú cưng nuôi trong nhà. Đây cũng là giống chó cảnh được yêu thích số 1 trên thế giới.', 10000000, 19, 17),
(19, 'Bull Pháp', '- Giống: Bull Pháp\r\n- Màu sắc: bò sữa\r\n- Giới tính: Không\r\n- Tháng tuổi: 2 tháng 15 ngày\r\n- Đã tiêm chủng mũi đầu và sổ lãi 2 lần\r\n\r\nChó Bull Pháp bò sữa hay còn có tên tiếng anh là French Bulldog, một giống chó có nguồn gốc từ Pháp. Bull Pháp được nuôi dạy để làm bạn với con người và là thú cưng của mọi nhà.', 8000000, 19, 17),
(20, 'Mèo Anh Lông Ngắn', '- Giống Mèo: Anh Lông Ngắn\r\n- Màu sắc: Lilac\r\n- Độ tuổi: 2 tháng 15 ngày\r\n- Nguồn gốc: Thái Lan', 10000000, 19, 21),
(21, 'Mèo Anh Lông Dài', '- Giống Mèo: Anh Lông Dài\r\n- Màu sắc: Sivel\r\n- Độ tuổi:7 tháng 15 ngày\r\n- Nguồn gốc: Thái Lan', 7000000, 19, 21),
(22, 'Thức Ăn Cho Mèo A-Pro IQ Formula 500g – Thái Lan –', '- Sản phẩm A-Pro IQ Formula có công thức chính giúp tăng cường hệ thần kinh của mèo, từ đó giúp mèo khỏe mạnh hơn, nhanh nhạy hơn trong việc nắm bắt các sự việc diễn ra xung quanh.\r\n- Điều này cũng giúp cho mèo thông minh hơn khi bạn muốn huấn luyện hoặc dạy mèo đi vệ sinh đúng chỗ.\r\n- Không những vậy, nhờ vào công thức đặc biệt giúp tăng chỉ số IQ của mèo, sản phẩm sẽ vô cùng tốt nếu bạn cho mèo ăn từ bé.\r\n- Sản phẩm được sản xuất tại Thái Lan bởi công ty Perfect Companion, công ty hàng đầu về thức ăn cho thú cưng và chăn nuôi của Thái Lan.\r\n- Chính vì vậy, sản phẩm đạt được chất lượng và mức độ an toàn để trở thành thực phẩm chính cho mèo trong thời gian dài.\r\n- Gói thức ăn có thành phần được nghiên cứu khoa học kĩ lưỡng, phù hợp với nhu cầu dinh dưỡng của mèo.\r\n- Sản phẩm đã đáp ứng được đầy đủ các quy định về thực phẩm và kiểm duyệt chất lượng tại Thái Lan và Việt Nam. Nên bạn sẽ vô cùng yên tâm khi cho bé ăn hạt này.', 29000, 99, 22),
(23, 'Pate Lon Snappy Tom 400g – Trị Mèo Kén Ăn – Thái L', '- Khi đề cập đến pate lon, nổi bật nhất tại Việt Nam là 2 thương hiệu pate lon Whiskas và Snappy Tom.\r\n- Pate Snappy Tom được yêu thích bởi độ sánh mịn và không lợn cợn, từ đó giúp mèo dễ ăn hơn. Mèo thường không thích những loại thức ăn miếng to vì thế pate xây mịn là sự lựa chọn hoàn hảo mà bạn nên thử.\r\n- Sản phẩm cung cấp một lượng dinh dưỡng lớn giúp cho mèo có đủ dinh dưỡng để sinh hoạt hằng ngày.\r\n- Pate được đóng gói trong lon thiếc, vì vậy tránh được tối đa việc nhiễm khuẩn hoặc ký sinh trùng bám vào trong thức ăn.\r\n- Bạn có thể trộn pate với hạt hoặc nấu chung với các loại thực phẩm tươi sống để tăng thêm khẩu vị cho mèo.\r\n- Pate được sản xuất tại Thái Lan với công nghệ dây chuyền hiện đại, giúp đảm bảo chất lượng thức ăn không bị thay đổi cho dù bạn có trữ số lượng lớn.\r\n- Sản phẩm có hạn sử dụng xa nên bạn sẽ yên tâm khi mua số lượng nhiều cho bé ăn.', 45000, 99, 22),
(24, 'Đồ Chơi Nhồi Bông Hình Xương Mon Ami Toy Soft', '- Thương hiệu Việt Nam\r\n- Chất liệu vải mềm mại, giúp chó cảm thấy thoải mái khi chơi\r\n- Chất liệu an toàn cho chó khi chơi', 24000, 49, 24),
(25, 'Đồ Chơi Nhồi Bông Hình Chuột AFP Green Rush', '- Hàng nhập khẩu Pháp\r\n- Có nhồi catnip bên trong, giúp mèo thư giãn thoải mái', 99000, 49, 24),
(26, 'Cây Mèo Leo 3 Tầng AFP Retro Pet', '- Được bện dây thừng chắc chắn\r\n- Giúp mèo không bị ngứa móng\r\n- Hạn chế mèo cào đồ đạc trong nhà', 4000000, 29, 23),
(27, 'Sữa Tắm Cho Chó Mèo Da Nhạy Cảm Beaphar Hypo-Aller', '- Thương hiệu đến từ Hà Lan đạt chuẩn an toàn của Châu Âu\r\n- Sản phẩm được nghiên cứu chuyên biệt dành cho thú cưng da nhạy cảm không thể sử dụng các sản phẩm sữa tắm thông thường\r\n- Độ ph trung tính an toàn cho da không ảnh hương đến bề mặt bảo vệ da tự nhiên\r\n- Chứa tinh chất nuôi dưỡng da và lông giúp cải thiện da sáng bóng và lông mềm mượt\r\n- Thể tích: 250 ml\r\nHướng dẫn:\r\n+ Dùng nước ấm làm ướt lông\r\n+ Sử dụng sữa tắm ra lòng bàn tay, thoa đều và massage nhẹ nhàng cho đến khi thấm vào lông\r\n+ Để từ 2-3 phút và tắm lại bằng nước\r\n- Phù hợp với mọi giống chó và mèo có da nhạy cảm', 220000, 49, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(30) NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(18, 'cho-beagle.jpg', 18),
(19, 'bull-phap.jpg', 19),
(20, 'meo-aln.jpg', 20),
(21, 'meo-ald.jpg', 21),
(22, 'thuc-an-meo.jpg', 22),
(23, 'pate-meo.jpg', 23),
(24, 'do-choi-xuong.jpg', 24),
(25, 'do-choi-chuot.jpg', 25),
(26, 'cay-meo.jpg', 26),
(27, 'sua-tam.jpg', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(30) NOT NULL,
  `TenCongTy` varchar(50) DEFAULT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `SoFax` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(17, 'Chó Cảnh'),
(21, 'Mèo Cảnh'),
(22, 'Thức Ăn'),
(23, 'Đồ Dùng'),
(24, 'Đồ Chơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(30) NOT NULL,
  `ChucVu` varchar(30) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD UNIQUE KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
