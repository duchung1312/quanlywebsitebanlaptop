/*
 Navicat Premium Data Transfer

 Source Server         : CuongCo
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : projecthtc

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 21/10/2021 10:57:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for danhmuc
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc`  (
  `MaDM` int(10) NOT NULL,
  `TenDM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`MaDM`) USING BTREE,
  INDEX `TenDM`(`TenDM`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhmuc
-- ----------------------------
INSERT INTO `danhmuc` VALUES (1, 'Bàn Phím Cơ');
INSERT INTO `danhmuc` VALUES (2, 'Chuột Gaming');
INSERT INTO `danhmuc` VALUES (3, 'Console');
INSERT INTO `danhmuc` VALUES (4, 'Laptop Gaming');
INSERT INTO `danhmuc` VALUES (5, 'Laptop Văn Phòng');
INSERT INTO `danhmuc` VALUES (6, 'Màn Hình');
INSERT INTO `danhmuc` VALUES (7, 'Tai Nghe');
INSERT INTO `danhmuc` VALUES (8, 'Vỏ Case');

-- ----------------------------
-- Table structure for giohang
-- ----------------------------
DROP TABLE IF EXISTS `giohang`;
CREATE TABLE `giohang`  (
  `MaSP` int(10) NOT NULL,
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `TongTien` int(11) NOT NULL,
  PRIMARY KEY (`MaSP`) USING BTREE,
  CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hoadon
-- ----------------------------
DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon`  (
  `MaHD` int(10) NOT NULL,
  `MaKH` int(10) NOT NULL,
  `TenHD` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayBan` date NOT NULL,
  `TongTien` int(11) NOT NULL,
  PRIMARY KEY (`MaHD`) USING BTREE,
  INDEX `MaKH`(`MaKH`) USING BTREE,
  INDEX `MaSP`(`TenSP`) USING BTREE,
  INDEX `MaHD`(`MaHD`) USING BTREE,
  INDEX `NgayBan`(`NgayBan`) USING BTREE,
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hoadon
-- ----------------------------
INSERT INTO `hoadon` VALUES (1, 1, 'Hóa Đơn Thanh Toán', 'PC Acer', '2021-10-16', 9000000);
INSERT INTO `hoadon` VALUES (2, 2, 'Nguyễn Hùng', 'PC Acer', '2021-09-29', 180000000);

-- ----------------------------
-- Table structure for khachhang
-- ----------------------------
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang`  (
  `MaKH` int(10) NOT NULL,
  `TenKH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GioiTinh` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SDT` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  PRIMARY KEY (`MaKH`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of khachhang
-- ----------------------------
INSERT INTO `khachhang` VALUES (1, 'Cường ', 'Quận Hà Đông', 'Nữ', '0987652', '2021-10-09');
INSERT INTO `khachhang` VALUES (2, 'Hùng', 'Hà Nội', 'Nam', '0924283', '2021-10-05');

-- ----------------------------
-- Table structure for nguoidung
-- ----------------------------
DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE `nguoidung`  (
  `Id` int(10) NOT NULL,
  `TaiKhoan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MatKhau` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenNguoiDung` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nguoidung
-- ----------------------------
INSERT INTO `nguoidung` VALUES (2, 'Hung01', '8888', 'Nguyễn Hùng');
INSERT INTO `nguoidung` VALUES (3, 'sa', '1', 'Nguyễn Mạnh Thời');

-- ----------------------------
-- Table structure for nhasx
-- ----------------------------
DROP TABLE IF EXISTS `nhasx`;
CREATE TABLE `nhasx`  (
  `MaNSX` int(10) NOT NULL,
  `TenNSX` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`TenNSX`) USING BTREE,
  INDEX `MaNSX`(`MaNSX`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nhasx
-- ----------------------------
INSERT INTO `nhasx` VALUES (1, 'Acer');
INSERT INTO `nhasx` VALUES (2, 'Asus');
INSERT INTO `nhasx` VALUES (3, 'Dell');
INSERT INTO `nhasx` VALUES (4, 'Lenovo');
INSERT INTO `nhasx` VALUES (5, 'Nintendo');
INSERT INTO `nhasx` VALUES (6, 'NZXT');
INSERT INTO `nhasx` VALUES (7, 'Sony');
INSERT INTO `nhasx` VALUES (8, 'MicroSoft');

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham`  (
  `MaSP` int(10) NOT NULL,
  `TenNSX` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenSP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `AnhSP` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenDM` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DonGia` int(20) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MoTa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GiaCu` int(20) NOT NULL,
  PRIMARY KEY (`MaSP`) USING BTREE,
  INDEX `MaDM`(`TenDM`) USING BTREE,
  INDEX `TenNSX`(`TenNSX`) USING BTREE,
  CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`TenNSX`) REFERENCES `nhasx` (`TenNSX`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`TenDM`) REFERENCES `danhmuc` (`TenDM`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
INSERT INTO `sanpham` VALUES (1, 'NZXT', 'ASUS', 'vocase2.png', 'Vỏ Case', 900000, 3, 'CPU: AMD Ryzen™ 9 5900HX (3.3GHz up to 4.6GHz, 16MB) RAM: 16GB(8GB DDR4 on board + 8GB DDR4 3200MHz) (1x SO-DIMM slot) Ổ cứng: 512GB M.2 NVMe™ PCIe® 3.0 SSD', 10000000);
INSERT INTO `sanpham` VALUES (2, 'Sony', 'Sony Playstation 4 Pro', 'console2.png', 'Console', 900000, 3, 'Không có !', 1000000);
INSERT INTO `sanpham` VALUES (3, 'NZXT', 'Surface Book Pro 7', 'laptop7.png', 'Laptop Văn Phòng', 90000000, 2, 'Chưa cập nhật !', 100000000);
INSERT INTO `sanpham` VALUES (4, 'Asus', 'ROG Zephyrus G14 Alan Walker', 'laptop5.png', 'Laptop Gaming', 90000000, 3, 'Có', 100000000);
INSERT INTO `sanpham` VALUES (5, 'Nintendo', 'Nintendo Switch', 'console1.png', 'Console', 7490000, 4, 'Nintendo Switch V2 Pokemon', 8490000);
INSERT INTO `sanpham` VALUES (6, 'Asus', 'Turtle Beach Stealth 700', 'tn1.png', 'Tai Nghe', 3990000, 1, 'Chưa cập nhật !', 4390000);
INSERT INTO `sanpham` VALUES (7, 'Asus', 'Chuột ROG Strix Carry', 'chuot1.png', 'Chuột Gaming', 1490000, 1, 'Chưa cập nhật !', 1790000);
INSERT INTO `sanpham` VALUES (8, 'Asus', 'Màn ROG STRIX XG27VQ', 'm1.png', 'Màn Hình', 10990000, 1, 'Chưa cập nhật !', 11990000);
INSERT INTO `sanpham` VALUES (9, 'Asus', 'Màn ROG Strix XG258Q', 'm2.png', 'Màn Hình', 10290000, 1, 'Chưa cập nhật !', 10790000);
INSERT INTO `sanpham` VALUES (10, 'Asus', 'Bàn phím cơ OG Strix Scope RX', 'bpc1.png', 'Bàn Phím Cơ', 2690000, 1, 'Chưa cập nhật !', 2990000);
INSERT INTO `sanpham` VALUES (11, 'Asus', 'Bàn phím cơ ROG Falchion', 'bpc2.png', 'Bàn Phím Cơ', 3290000, 1, 'Chưa cập nhật !', 3790000);
INSERT INTO `sanpham` VALUES (12, 'Asus', 'NZXT H1 MATTE WHITE', 'vocase3.png', 'Vỏ Case', 8900000, 1, 'Chưa cập nhật !', 9290000);
INSERT INTO `sanpham` VALUES (14, 'Nintendo', 'Nintendo Switch Pro Controller - Monster Hunter Rise Edition', 'console3.png', 'Console', 2350000, 1, 'Chưa cập nhật !', 2750000);
INSERT INTO `sanpham` VALUES (15, 'Nintendo', 'NINTENDO SWITCH JOY-CON CONTROLLER SET (NEON RED + NEON BLUE)', 'console4.png', 'Console', 1990000, 1, 'Chưa cập nhật !', 2190000);
INSERT INTO `sanpham` VALUES (16, 'Nintendo', 'Nintendo Switch Dock Set - Combo phụ kiện Dock, Sạc & Cáp HDMI cho máy Switch', 'console5.jpg', 'Console', 1990000, 1, 'Chưa cập nhật !', 2490000);
INSERT INTO `sanpham` VALUES (17, 'Acer', 'Laptop Acer Gaming Predator Triton 300 ', 'laptop8.jpg', 'Laptop Gaming', 43999000, 1, '(PT315-53-75LQ) (NH.QDQSV.001) (i7 11800H/16GB RAM/512GB SSD/RTX 3060 6G/15.6 inch QHD 165Hz/Win10/Đen) (2021)', 45000000);

-- ----------------------------
-- Table structure for tintuc
-- ----------------------------
DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE `tintuc`  (
  `MaTT` int(11) NOT NULL,
  `TieuDe` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Anh` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Anh2` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NgayDang` date NOT NULL,
  `NguoiViet` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NoiDung` varchar(20000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`MaTT`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tintuc
-- ----------------------------
INSERT INTO `tintuc` VALUES (1, 'MicroSoft ra mắt bản nâng cấp Xbox Series X', 'tt3.png', 'tt3.png', '2021-10-07', 'Thị Cường', 'Vào ngày 16/3 vừa qua, Microsoft đã công bố toàn bộ thông số phần cứng của Xbox Series X, cỗ máy chơi game tấn tiến nhất của tập đoàn này sẽ ra mắt vào dịp cuối năm.\r\n<br>Thông số đầy đủ của Xbox Series X:\r\n<br>- CPU: 8 nhân cấu trúc Zen 2 với tốc độ 3.8Ghz (3.6 GHz với SMT).\r\n<br>- GPU: 12 TFLOPS, 52 đơn vị xử lý ở tốc độ 1.825 GHz với kiến trúc RDNA 2.\r\n<br>- Tiến trình: 7nm Enhanced\r\n<br>- RAM: 16 GB GDDR6 với 10GB ở tốc độ 560GB/s và 6 GB ở 336GB/s.\r\n<br>- Ổ cứng: 1TB SSD ở khả năng mở rộng bằng ổ cứng ngoài lên đến 1 TB.\r\n<br>- Ổ đĩa: 4K UHD Blu-ray .\r\n<br>- Mục tiêu: Đạt độ phân giải 4K với 60FPS, có thể lên đến 120FPS.\r\n<br>Với những thông số trên, Xbox Series X đem lại hiệu suất cao hơn hẳn các dòng máy cũ khi chất lượng đồ họa, tốc độ tải game và có khả năng cao tương thích với các trò chơi thế hệ tiếp theo.\r\n<br>Một trong những tính năng đáng chú ý nhất đối với người chơi mà Xbox Series X có, đó là hỗ trợ DirectX Raytracing được tăng tốc độ phần cứng, mô phỏng các thuộc tính của ánh sáng và âm thanh trong thời gian thực chính xác hơn. Ví dụ được thử nghiệm và chứng minh khi chơi tựa game Minecraft.\r\n<br>Một thông tin rò rỉ từ nhà phát triển đã tiết lộ cấu hình có thể của PS5, và có vẻ như nó sẽ thua cuộc trước Xbox Series X\r\n<br>Một tin nhắn mã hóa được gửi qua NeoGAF đã ám chỉ sức mạnh của hệ máy PS5 sắp tới của Sony, và nó có thể là tin tốt cho Xbox Series X của Microsoft. Trong khi phần lớn thông tin trong tin nhắn đã bị mã hóa, người hâm mộ đã siêng năng giải mã từng câu chữ và xem thông số kỹ thuật của PS5 so với Xbox Series X sẽ thế nào.\r\n');
INSERT INTO `tintuc` VALUES (2, 'Những chiếc Laptop Gaming mỏng nhẹ cho sinh viên', 'tt4.png', 'tt4.png', '2021-10-05', 'Cường', '- Những chiếc laptop gaming mỏng nhẹ dành cho sinh viên\r\n<br>  &emsp;- MSI GF65 10SER 622VN\r\n<br>  &emsp;- MSI GF65 10SER 622VN lấy nhựa làm vật liệu chủ đạo đem đến cho chiếc laptop một trọng lượng không thể tin nổi, 1.86 kg. Cùng mặt trên được làm từ nhôm Aluminum với các đường nét phay xước mạnh mẽ, GF65 10SER 622VN vẫn toát lên vóc dáng laptop gaming MSI được hỗ trợ thêm logo rồng đỏ từ chính hãng.\r\n<br>  &emsp;- Nhẹ cân là thế nhưng sức mạnh bên trong của MSI GF65 10SER 622VN lại biến nó thành một đối thủ “nặng ký” trong phân khúc laptop gaming giá rẻ. Trang bị bộ vi xử lý Intel Core i7-10750H cùng chiếc card màn hình RTX 2060, đây thực sự là con quái vật khi có thể tự tin cân tất cả tựa game hot nhất hiện nay như: LOL, PUBG, Valorant, … ở mức setting High và các tựa game AAA khác.\r\n<br>  &emsp;- Ngoài ra, với 8GB RAM và 512GB SSD, MSI GF65 10SER 622VN sẵn sàng hỗ trợ các bạn lưu trữ nhiều dữ liệu và khả năng đa nhiệm tốt nhất trong công việc và học tập.\r\n<br>  &emsp;- Acer Aspire 7 A715 42G R4ST\r\n<br>  &emsp;- Nếu vẻ ngoài quá đỗi mạnh mẽ của Acer Nitro 5 khiến bạn không hài lòng, vậy bạn nghĩ sao về người anh em Acer Aspire R4ST.\r\n<br>  &emsp;- Sở hữu thiết kế tối giản vốn có của dòng Acer Aspire, Aspire 7 A715 42G R4ST đem đến cho người dùng vẻ ngoài lịch sự. Không vết cắt sắc nhọn, không đường nét hầm hố, Aspire 7 sẽ giống như một chiếc laptop văn phòng với 2.1 kg và màn hình có khả năng mở góc rộng lên đến 180 độ.\r\n<br>  &emsp;- Nhưng Aspire 7 lại mang trong mình danh hiệu laptop gaming. CPU AMD Ryzen 5 5500U cùng GTX 1650 đã khẳng định lại với người dùng hiệu năng chơi game trên Aspire 7 R4ST. Chiến game, làm việc, học tập, tất cả đều mượt mà trên Aspire 7 A715 42G R4ST. \r\n<br>  &emsp;- Đi cùng 8GB RAM và 256GB SSD, Aspire 7 A715 42G R4ST cung cấp cho bạn không gian lưu trữ dữ liệu và khả năng truyền, tải tệp tin nhanh chóng trên chiếc laptop. Đi kèm với mức giá dưới 20 triệu, đây xứng là một trong những chiếc laptop gaming dưới 20 triệu đáng mua nhất hiện nay.\r\n<br>  &emsp;- Lenovo Legion 5P 15IMH05 82AY003EVN\r\n<br>  &emsp;- Chiếc laptop gaming từ Lenovo được tạo nên từ hợp kim nhôm đem đến trọng lượng chỉ 2.3 kg cùng chiếc màn hình 15.6 inch có viền siêu mỏng, bạn có thể đồng hành cùng Legion 5P 15IMH05 82AY003EVN ở bất kì nơi đâu, lúc nào khi chiếc laptop vô cùng vừa vặn, gọn gàng trong chiếc balo của mình.\r\n<br>  &emsp;- Mang trong mình dòng máu Legion, chiếc laptop gaming từ nhà Lenovo vẫn có thể đáp ứng các nhu cầu chơi những tựa game hot hiện nay của bạn. Sở hữu thêm 8GB RAM và 512GB SSD, Legion 5P 15IMH05 82AY003EVN cung cấp không gian lưu trữ rộng lớn cho game và “tài liệu học tập” nếu có.\r\n<br>  &emsp;- Tổng kết\r\nTrên đây là danh sách những chiếc laptop gaming mỏng nhẹ đáng mua nhất hiện nay dành cho sinh viên. Bạn thích sản phẩm nào trong danh sách này? Hãy để lại cảm nghĩ của bạn ở dưới phần bình luận cho GEARVN biết nhé. Xin chào tạm biệt và hẹn gặp lại các bạn trong những bài viết tiếp theo.');
INSERT INTO `tintuc` VALUES (3, 'ASUS ROG Huracan G21CX Đánh giá và Cảm nhận', 'tt5.png', 'tt5.png', '2021-10-14', 'Mạnh Thời', '- Chỉ cần một cái nhìn là bạn có thể nhận thấy rằng ROG Huracan G21CX không giống bất kỳ gaming desktop nào . Đặc biệt bộ khung với kiểu dáng mạnh mẽ và một thiết kế không đối xứng đã tạo ra sự ấn tượng ngay từ cái nhìn đầu tiên , và kèm theo đó là một sự nâng cấp đáng giá từ phần hông là chiếc nắp từ tính có thể  gấp lại và mở ra, sẽ cải thiện luồng không khí vào hệ thống và cho phép tăng hiệu suất CPU và GPU. Luồng khí bổ sung cung cấp khả năng làm mát cần thiết để giải phóng toàn bộ cơn giận dữ của bộ xử lý Intel® Core ™ i7 thế hệ thứ 9 và đồ họa NVIDIA® GeForce® RTX 2070 mang đến một  trải nghiệm chơi game thật sự đặc biệt .Giờ đây  bạn hoàn toàn có thể chơi các tựa game mới nhất ở các chế độ cài đặt khắc nghiệt nhất.\r\n<br>&emsp;- ASUS ROG HURACAN G21CX  là một gaming Desktop với dung tích sử dụng bên trong là 13 lít rất nhỏ gọn, nhưng Huracan có nắp bảo vệ từ tính ở sườn bên phải, có thể mở để cải thiện khả năng loại bỏ nhiệt và hiệu suất tổng thể.Ngoài việc cải tiến trong thiết kế phần hông thì nó có một khung gầm góc cạnh, hung dữ với các nếp gấp sắc nét phản ánh một “vết sẹo’’ mà Asus đã trải qua 30 năm hình thành và phát triễn.\r\n<br>&emsp;- Thao tác nâng cấp linh kiện bên trong dễ dàng\r\n<br>&emsp;- Nếu như cấu hình hiện tại của chiếc ASUS ROG HURACAN G21CX vẫn chưa làm bạn hài lòng. Giờ đây bạn không còn quá lo ngại về vấn đề đó nữa, Asus đã cung cấp cho cỗ máy này khả năng tùy biến thay đổi linh kiện một cách đơn giản nhất đảm bảo cho bạn luôn sẵn sàng cho các trận chiến, cả hai bảng điều khiển đều có thể mở được một cách dễ dàng để lộ ra các thành phần bên trong, giúp bạn dễ dàng tiếp cận khi nâng cấp lên phần cứng mới nhất. Nâng cấp lên card đồ họa mạnh hơn, ổ lưu trữ dung lượng lớn hơn hoặc đơn giản là thêm RAM để “Chiến binh” của bạn luôn mạnh mẽ nhất có thể. Có cả một ổ SSD 2,5 inch có thể thay thế ngay lập tức bằng một thao tác rất dễ dàng,có thể thay thể được trong vài giây.');
INSERT INTO `tintuc` VALUES (4, 'ROG ra mắt laptop Zephyrus G14 Alan Walker', 'tt1.png', 'tt1.png', '2021-11-07', 'Kem', '<br>  &emsp;-Laptop 14 inch mạnh mẽ cho game thủ và nhà sáng tạo, đồng thiết kế bởi nhà sản xuất, DJ nổi tiếng thế giới Alan Walker.\r\n<br>  &emsp;-ASUS Republic of Gamers (ROG) vừa công bố phiên bản đặc biệt ROG Zephyrus G14 Alan Walker (tên mã GA401QEC). Sản phẩm này là sự kết hợp giữa nghệ sĩ, DJ và nhà sản xuất âm nhạc nổi tiếng thế giới Alan Walker. Với thiết kế độc đáo đi kèm bộ mixer ROG Remix, đây sẽ là sản phẩm tuyệt vời dành cho game thủ phong cách và nhà sáng tạo âm nhạc.\r\n<br>  &emsp;-Sự kết hợp hoàn hảo giữa công nghệ và âm nhạc\r\n<br>  &emsp;-Điều này mang đến sự nghiệp nổi bật trong lĩnh vực âm nhạc điện tử. Anh bắt đầu sự nghiệp của mình như là một nhà sản xuất tự học, sau đó phát hành các tác phẩm âm nhạc trên YouTube và SoundCloud, nổi tiếng với bài hát Faded năm 2015. Với hàng tỷ lượt phát trực tuyến trên YouTube và Spotify, Alan Walker còn là một nghệ sĩ nổi tiếng trong ngành công nghiệp game, là nhà sản xuất âm nhạc cho PUBG Mobile và Death Stranding. Chính vì vậy, Zephyrus G14 Alan Walker là sự kết hợp hoàn hảo giữa game thủ, công nghệ và âm nhạc.\r\n<br>  &emsp;-Hòa vào nhịp đập công nghệ\r\n<br>  &emsp;-Khi ROG lần đầu hợp tác với Alan Walker, bản đặc biệt ROG Zephyrus G14 đã kết hợp tính cơ động và hiệu suất mạnh mẽ từ CPU đầu bảng AMD Ryzen 9 5900HS và đồ họa NVIDIA GeForce RTX 3050Ti. Đối với cộng đồng Walker, đây là công cụ tối ưu cho các game thủ và nhà sáng tạo, luôn sẵn sàng cho mọi tác vụ chỉ trong vòng một nốt nhạc.\r\n<br>  &emsp;-Thiết kế đặc trưng từ Alan Walker\r\n<br>  &emsp;-Phiên bản đặc biệt ROG Zephyrus G14 Alan Walker được đóng gói và hoàn thiện với ngoại hình được cá nhân hóa cao cấp. Đồng thiết kế bởi Alan Walker, phiên bản đặc biệt này mang đến nhiều điểm nhấn màu sắc độc đáo, như màn hình LED AniMe Matrix™ màu Spectre Blue độc quyền. Phần logo cũng có tông màu tương tự, với logo Alan Walker cùng chữ ký của nam nghệ sĩ bên cạnh logo ROG. \r\nLogo này được sản xuất với công nghệ lắng đọng hơi vật lý (PVD) mang đến hiệu ứng phản xạ thay đổi với từng góc độ khác nhau. Hai đai vải dọc theo nắp máy với phong cách Cyberpunk đặc trưng của ROG, trong đó một đai với hiệu ứng phản quang hòa vào ánh sáng từ hệ thống LED ma trận.\r\n<br>  &emsp;-Alan Walker cho biết: \"Tôi cảm thấy rất tự hào vì có cơ hội làm việc với ROG và tôi rất vui mừng được cho cả thế giới thấy những gì chúng tôi đã làm trong suốt thời gian dài\".\r\n<br>  &emsp;-Trải nghiệm tuyệt vời ngay từ khi bạn chạm những ngón tay vào chiếc hộp đựng máy, với thiết kế đẹp và chất liệu nắp làm từ Acrylic, tất cả đều do Alan Walker lựa chọn. Phần hộp là phần yêu thích của Alan Walker trong dự án này, đây không chỉ đơn thuần là chiếc hộp đựng máy, mà còn là một phụ kiện cực kỳ sáng tạo. Khi bạn kết nối chiếc hộp này và Zephyrus G14 thông qua cổng USB Type-C, nó sẽ biến thành bộ chơi nhạc ROG Remix với 18 hiệu ứng âm thanh của riêng Alan Walker và được kích hoạt thông qua những nút cảm ứng trên bề mặt. Bạn có thể bắt đầu với một trong những tác phẩm của Alan Walker hoặc nhập giai điệu của mình vào phần mềm được phát triển bởi Alan Walker và đội ngũ của anh ấy. ROG Remix cũng hiển thị những ảnh động độc đáo từ ROG và Alan Walker trên màn hình chính và màn hình LED AniMe Matrix™ dựa trên ngõ vào MIDI được lựa chọn.\r\n<br>  &emsp;-Chiếc laptop này thậm chí còn có hình ảnh khởi động được tùy biến và hình nền Alan Walker. Bàn di chuột được phủ kính với những họa tiết sóng nhạc, cùng với bàn phím với chủ đề và màu sắc đặc trưng của Alan Walker, với các phím A và W là logo của anh. Bên cạnh đó, bạn cũng sẽ được tặng kèm một chiếc mũ lưỡi trai cùng bít tất mang phong cách Alan Walker và ROG. Đi kèm là một túi chống sốc ROG Sleeve như là một biểu tượng của game thủ phong cách.\r\n\r\n');
INSERT INTO `tintuc` VALUES (5, 'Thoả sức chiến game tại nhà với ba laptop gaming Acer', 'tt6.png', 'tt6.png', '2021-01-06', 'Nguyễn Thị Đồng', '<br>  &emsp;-Những mẫu laptop gaming từ Acer chắc chắn sẽ nâng tầm trải nghiệm của bạn khi tận hưởng các tựa game hot hiện nay.\r\n<br>  &emsp;-Thoả sức chiến game tại nhà với bộ ba laptop gaming Acer\r\n<br>  &emsp;-Đối với những ai đã làm và các bạn sinh viên, việc tự lắp PC nhằm giải trí, chơi game tại nhà sẽ gặp nhiều bất lợi bởi các linh kiện đang có giá cao. Thêm vào đó, khi tình hình ổn trở lại, nhóm đối tượng này sẽ chẳng thể thường xuyên sử dụng PC, từ đó dẫn đến lãng phí tiền bạc. Vậy nên, sắm cho bản thân laptop gaming sẽ là giải pháp tối ưu trong thời điểm này.\r\nPredator Helios 300\r\n<br>  &emsp;-Về thiết kế, Helios 300 thừa hưởng nét đặc trưng của dòng Predator vốn hầm hố và đẹp theo phong cách tương lai. Tuy vậy, hãng cũng đã tinh chỉnh để máy mềm mại hơn. Nhìn sang cấu hình, mẫu laptop gaming này được trang bị vi xử lý Intel Core i7 thế hệ mới nhất, RAM 32GB, card màn hình NVIDIA GeForce RTX 3060 6GB. Nhờ đó, máy có hiệu suất cao, vận hành mượt mà.\r\n<br>  &emsp;-Thoả sức chiến game tại nhà với bộ ba laptop gaming Acer - Ảnh 1.\r\n<br>  &emsp;-Game thủ có thể tận hưởng trải nghiệm chơi game mượt mà, không bị nhòe với tốc độ làm mới 144Hz và thời gian phản hồi rất nhanh chỉ 3ms. Bên cạnh đó, bộ điều khiển Ethernet của Killer’s E2600, Killer Wi-Fi 6 AX1650i và Trung tâm điều khiển 2.0 cũng giúp những người chơi FPS có thêm lợi thế lớn về tốc độ kết nối. Có thể nói, Predator Helios 300 chính là tập hợp của những gì tiên tiến nhất hiện nay. Do vậy, các tác vụ công việc văn phòng, giải trí đa phương tiện hay mini game đều không thể làm khó mẫu laptop gaming này.\r\n<br>  &emsp;-Acer Nitro 5\r\n<br>  &emsp;-Acer Nitro 5 mang thiết kế tinh tế cùng những đường cắt đậm chất gaming. Màn hình IPS QHD lên đến 165Hz tràn viền mang lại trải nghiệm game nhập vai hoàn hảo cùng đèn LED RGB 4 Zone thay đổi được 16,7 triệu màu cho game thủ thỏa sức sáng tạo không gian riêng.\r\nThoả sức chiến game tại nhà với bộ ba laptop gaming Acer - Ảnh 2.\r\nNitro 5 đơn giản là giúp bạn thống trị thế giới game với sức mạnh tổng hợp của bộ xử lý Intel Core i7 thế hệ thứ 11 và GPU NVIDIA GeForce RTX 30 Series. Mạnh mẽ bậc nhất phân khúc, đánh bật mọi đối thủ cạnh tranh trong tầm giá với hiệu năng \"quái vật\", đó là cách người ta nói về chiếc laptop gaming này.\r\nGiờ đây, game thủ đã không còn nỗi sợ máy nóng khi thao tác nhiều hoạt động cùng lúc. Bởi Nitro 5 được trang bị quạt đôi, công nghệ Acer CoolBoost và thiết kế 4 cổng thoát khí. Thêm vào đó, diện mạo hoàn toàn mới cùng hình ảnh sắc nét của màn hình sẽ giúp các game thủ trải nghiệm những cảm giác chơi game \"không một vết xước\".\r\nAcer Gaming Aspire 7\r\n<br>  &emsp;-Ở phân khúc giá mềm hơn, không thể không nhắc đến Acer Gaming Aspire 7. Chiếc laptop gaming này thường được xem là \"con quái vật ẩn trong dáng hình hoàng tử\" bởi vẻ ngoài gọn gàng, hệt như mẫu laptop văn phòng thông thường nhưng thực chất lại có hiệu năng cực mạnh mẽ.\r\nThoả sức chiến game tại nhà với bộ ba laptop gaming Acer - Ảnh 3.\r\nGaming Aspire 7 sở hữu bộ xử lý AMD Ryzen 5 5500U giúp máy hoạt động mượt mà, ổn định khi thực hiện mọi tác vụ và chơi game. AMD Ryzen từ lâu đã trở thành ông trùm hiệu năng khi có thể tối ưu rất tốt sức mạnh của máy. Thêm vào đó là sự hỗ trợ của card đồ họa NVIDIA GTX1650Ti đã biến Gaming Aspire 7 trở thành laptop chơi game tốt nhất nhì phân khúc, giúp người dùng ngoài chơi game mượt mà còn có thể làm những tác vụ đồ họa rất tốt.\r\nTổng kết lại, trong thời điểm nhạy cảm hiện nay, laptop gaming là sự lựa chọn tối ưu bậc nhất cho các game thủ. Với những model đã được gợi ý trên, bạn có thể tiếp tục thỏa mãn niềm đam mê của mình ở tầm cao mới.\r\nVới chương trình Bảo hành 3S1 duy nhất tại Việt Nam, những dòng sản phẩm cao cấp như Acer Predator, Nitro 5 và Acer Gaming Aspire 7... sẽ được kiểm tra, bảo hành và gửi lại khách chỉ trong thời gian ngắn: 3 ngày (72h) bao gồm cả thứ 7, Chủ nhật, quá 3 ngày người dùng sẽ được đổi sản phẩm mới tương đương hoặc cao hơn.\r\nKhi mua máy laptop gaming của Acer từ đây đến hết ngày 31/10, khách hàng sẽ được cộng thêm 01 năm bảo hành tiêu chuẩn. Chi tiết vui lòng tham khảo tại đây.');
INSERT INTO `tintuc` VALUES (6, 'Gaming cực đã cùng màn hình HP Omen X27', 'tt8.png', 'tt8.png', '2021-10-11', 'Mạnh Thời', '<br>&ensp;-Chỉ cần một Laptop văn phòng bình thường là các bạn đã có thể chơi tốt những tựa game cực hay này rồi.\r\n<br>Limbo\r\n<br>&ensp;-Đến với Limbo, người chơi bị đưa vào một thế giới kỳ lạ mà chẳng kèm theo bất kỳ lời giải thích nào. Không có hình dáng cụ thể, chú bé trong Limbo hiện lên đơn giản là một bóng đen với đôi mắt là hai điểm sáng nhỏ. Cũng chính đôi mắt là thứ để phân biệt cậu với phần còn lại trong thế giới Limbo, cái thế giới mà gói gọn lại chỉ có 2 màu: đen và trắng.\r\n<br>&ensp;-Màu sắc trong Limbo sẽ làm bạn phải bất ngờ với chiều sâu và sức cuốn hút của nó. Bước qua những nhà máy bỏ hoang, những thành phố đổ nát… người chơi được cảm nhận sự hoang tàn, lạnh lẽo của nơi đây. Cảm giác đó càng tăng cao với tông màu đen-trắng mà Limbo mang tới. Hơn thế, hình ảnh trong game luôn mập mờ, nhập nhòe như những đoạn phim cũ kỹ. Đây quả là một hiệu ứng ánh sáng tuyệt vời khiến thế giới nơi đây thêm phần mờ ảo.\r\n<br>&ensp;-Môi trường trong game khá phong phú, với nhiều khung cảnh từ những khu rừng cho đến các màn chơi với cần gạt, các loại công tắc… Không khí mà nhà sản xuất đem vào Limbo thông qua phần đồ họa kèm âm thanh đem lại cho người chơi trải nghiệm đặc biệt.\r\n<br>&ensp;-Trine 2: Complete Story\r\n<br>&ensp;-Bạn là nhân viên văn phòng? Bạn chỉ có 1 tiếng buổi trưa để nghỉ ngơi? Bạn cần tìm một tựa game đơn giản, nhẹ nhàng nhưng vẫn phải hấp dẫn và vui vẻ để giải trí sau những giờ làm việc hay học tập căng thẳng? Trine 2: Complete Story chính là thứ mà bạn đang tìm kiếm.\r\n<br>&ensp;-Trine 2: Complete Story là tựa game hành động, phiêu lưu được sản xuất và phát hành bởi Frozenbyte Studio. Game là hậu bản tiếp nối của Trine 1 (được phát hành trước đó 4 năm). Điểm sáng dễ nhận thấy nhất của Trine 2 chính là phần hình ảnh cực kỳ bắt mắt. Mặc dù không sử dụng những engine đồ họa tân tiên hay làm game thủ “mờ mắt” với các khung cảnh hoành tráng, game chỉ đơn giản cuốn hút người chơi bởi màu sắc nhẹ nhàng nhưng được kết hợp cực kỳ khéo léo.\r\n<br>&ensp;-Bạn sẽ trải nghiệm những giây phút cực kỳ thú vị khi nhìn thấy ánh nắng soi rọi đánh dấu thời khắc thoát khỏi một cánh rừng rậm rạp đầy những cây nấm kỳ quái… Mặc dù có tới 3 nhân vật nhưng Trine 2 lại chỉ cho phép người chơi đi lại theo 2 chiều. Và chính điều này đã cho phép Frozenbyte thỏa sức “vẽ vời” cho khung hình background trở nên cực kỳ hoa mỹ và mang đậm màu sắc thần tiên.\r\n<br>&ensp;-The Flame in the Flood là một tựa game đi theo phong cách sinh tồn. Không giống như đa số tựa game khác nơi những yếu tố như thức ăn, nước uống chỉ quan trọng trong khoảng thời gian đầu, The Flame in the Flood hứa hẹn sẽ tái hiện lại một cách chân thực nhất những khó khăn mà chúng ta sẽ gặp phải khi lạc vào thế giới hoang sơ cách xa nền văn minh hiện đại.\r\n<br>&ensp;-Trước tiên, The Flame in the Flood là một tựa game hoàn toàn tập trung vào chơi đơn, vì thế bạn không thể trông chờ vào sự hỗ trợ từ bất kì ai khác ngoài bản thân. Tiếp đến, phần lớn thời gian trong game bạn sẽ rơi vào hoàn cảnh thiếu thốn tới mức phải nhặt nhạnh từng cành hoa ngọn cỏ để làm thực phẩm vào ban ngày, trong khi hy vọng rằng không gặp phải những bầy sói khát máu vào ban đêm.\r\nRayman Legends\r\n');
INSERT INTO `tintuc` VALUES (7, '12 bước kiểm tra trước khi mua một chiếc laptop cũ', 'tt9.png', 'tt9.png', '2021-10-08', 'Thị Cường', '- Chúc các bạn chọn được một chiếc laptop cũ ưng ý, đúng với tiêu chí ngon - bổ - rẻ.\r\n<br>&ensp;1. Kiểm tra tổng thể hình thức chiếc laptop: Việc đầu tiên bạn cần làm là quan sát kỹ một lượt toàn bộ máy xem ngoại hình của nó có cũ quá không, có xước xát nhiều không, có bị móp méo, các khớp kết nối có chắc chắn không và các cạnh viền xem có hở nhiều không.\r\n<br>&ensp;Nếu một chiếc laptop bị móp méo hoặc xước nhiều chứng tỏ người dùng trước không mấy trân trọng chiếc máy thường xuyên làm rơi hoặc quăng quật vì vậy độ bền cũng như độ ổn định của máy sẽ giảm đi rất nhiều. Nếu các viền của máy bị hở nhiều có thể máy đã được tháo lắp nhiều lần bạn có thể cân nhắc hướng sang những chiếc máy khác.\r\n<br>&ensp;Đóng mở máy vài lần để cảm nhận độ gập bản lề kết nối màn hình với thân máy. Nếu quá lỏng hoặc quá cứng đều sẽ ảnh hưởng tới quá trình sử dụng máy, nhất là cứng quá thì dễ làm bung chân ốc, bẻ vỡ vỏ máy.\r\n<br>&ensp;Nếu không có nhiều kinh nghiệm lựa chọn laptop cũ bạn nên quan tâm đến những chiếc laptop còn nguyên tem của các nhà phân phối lớn như FPT, Digiworld, Vĩnh Xuân, Thế Giới Di Động, Viettel… Những sản phẩm còn tem này chứng tỏ máy chưa bị tháo ra sửa chữa từ khi mua mới.\r\n<br>&ensp;2. Kiểm tra màn hình: Đầu tiên bạn hãy kiểm tra độ sáng tối, màu sắc hiển thị của chiếc laptop bằng cách chỉnh độ sáng tối lên xuống. Lưu ý, bạn nên xem kỹ các góc của màn hình có mờ không, nếu độ sáng không đều và 4 góc màn hình bị mờ thì nguyên chính có thể là do đèn hình yếu. Chuyển màn hình về màn hình trắng bạn xem có điểm màu đen hoặc có vài đốm đen đóm sáng không rõ ràng, đó chính là điểm chết. Bạn không nên chọn mua laptop có màn hình không tốt, sau này sẽ khiến bạn tốn thêm 1 khoản kinh phí khi thay màn hình laptop mới đấy.\r\n<br>&ensp;3. Kiểm tra bàn phím và chuột cảm ứng: Khi kiểm tra bàn phím, bạn khởi động chương trình Word hoặc Notepad ở trên máy tính, gõ tất cả các phím chữ, số và ký tự xem có liệt nút nào không, các chữ số gõ có nhạy hay không, độ nẩy của phím còn tốt không.\r\n<br>&ensp;Để test toàn bộ bàn phím, bạn có thể vào Google gõ tìm kiếm \"test keyboard\" sẽ có rất nhiều trang web hỗ trợ test phím các bạn chỉ cần truy cập vào và test từng nút phím một.\r\n<br>&ensp;Đối với chuột cảm ứng, bạn kiểm tra độ nhạy và di chuyển chuột xem hết màn hình của laptop bạn hay không.\r\n<br>&ensp;4. Kiểm tra sức khỏe ổ cứng của laptop: Ổ cứng laptop là thiết bị quan trọng bậc nhất cần kiểm tra khi bạn lựa chọn mua laptop cũ vì sức khỏe ổ cứng không nhìn được như màn hình hay gõ thử được như bàn phím, do vậy ta phải dùng phần mềm để test. Bạn có thể kiểm tra bằng cách cài phần mềm Hard Disk Sentinel Pro để kiểm tra ổ cứng. Nếu khi test thấy được 100% thì ổ cứng bạn hoạt động tốt, nếu dưới 100% thì ổ cứng đấy đang bắt đầu có vấn đề.\r\n<br>&ensp;5. Kiểm tra cấu hình máy: Bạn phải biết cách kiểm tra cấu hình máy, một số nơi bán thường cung cấp phần mềm test laptop mục đích để chúng ta an tâm hơn sản phẩm họ bán. Phần mềm CPU-Z cung cấp nhiều thông tin chi tiết về cấu hình. Với phần mềm này, bạn có thể biết chi tiết về CPU (tên CPU, tốc độ các nhân, tốc độ bus), bo mạch (hãng sản xuất, model, BIOS, ngày sản xuất mainboard), bộ nhớ RAM (kích thước bộ nhớ RAM, chuẩn loại RAM, dung lượng và BUS).');

SET FOREIGN_KEY_CHECKS = 1;
