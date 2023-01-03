-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 12:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_ID` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_ID`, `date`, `total`) VALUES
(117, '2021-10-07 11:13:18', 700);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productID` int(10) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productcategory` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `remainunit` int(255) NOT NULL,
  `cartID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productID`, `productname`, `productcategory`, `price`, `remainunit`, `cartID`) VALUES
(65, 'เทียน', 'ธูป/เทียน', 30, 51, 383),
(66, 'หมี่เตี๊ยวจีน', 'อาหาร', 40, 45, 384);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(10) NOT NULL,
  `orderDate` datetime NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post` int(255) NOT NULL,
  `usersreg_ID` int(10) NOT NULL,
  `postatus` varchar(255) NOT NULL,
  `slip` varchar(255) NOT NULL,
  `postID` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `orderDate`, `firstname`, `lastname`, `tel`, `address`, `post`, `usersreg_ID`, `postatus`, `slip`, `postID`) VALUES
(100, '2021-10-07 05:38:08', 'zack', 'zackzzzz', '09854', '12/52 อ.กระทุ่มแบน ต.อ้อมน้อยจ.สมุทรสาคร 74130  ', 74122, 9, 'ยกเลิกคำสั่งซื้อ', '', NULL),
(101, '2021-10-07 06:14:46', 'zack', 'zack', '0988905791', '41/78', 74130, 14, 'จัดส่งสินค้าเรียบร้อยแล้ว', '166954519_1775408325961388_8446855709975619643_n.jpg', '1234512');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `DetailID` int(10) NOT NULL,
  `order_ID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `Qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`DetailID`, `order_ID`, `productID`, `Qty`) VALUES
(177, 100, 69, 1),
(178, 101, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(10) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `productcategory` varchar(255) NOT NULL,
  `remainunit` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `productdetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productname`, `pic`, `productcategory`, `remainunit`, `price`, `productdetail`) VALUES
(65, 'เทียน', 'เทียน.jpg', 'ธูป/เทียน', 51, 30, '<p>เทียน1แพ็คมี 12 แท่ง ขนาดกลาง</p>\r\n'),
(66, 'หมี่เตี๊ยวจีน', 'R.jpg', 'อาหาร', 45, 40, '<p>หมีเตี๊่ยว หมี่จีน หมี่เจ เมืองจีน ขนาด 400 กรัม เส้นนุ่ม&nbsp;</p>\r\n'),
(67, 'หมี่ฮ่องกง', '7381abb5244bf1cf1da1ee8a00d2400b_tn.jpg', 'อาหาร', 62, 100, '<p>หมี่ฮ่องกง ตรานกนางแอ่น&nbsp; 1 ห่อบรรจุ 1 กิโลกรัม</p>\r\n'),
(69, 'ธูปไร้ควัน', '604c1ef74319d1a98af229bc3abe4fe9.jpg', 'ธูป/เทียน', 147, 200, '<p>ธูปไร้ควันขนาดใหญ่ 700 กรัม</p>\r\n'),
(70, 'ตั่วกิม', 'ตั่วกิม.jpg', 'กระดาษไหว้', 50, 150, '<p>ตั่วกิม 1มัด มี 120 แผ่น</p>\r\n'),
(71, 'ถ้วยน้ำชา(กลม)', '888.jpg', 'ชุดน้ำชา', 28, 35, '<p>&nbsp;</p>\r\n\r\n<p>ถ้วยน้ำชาสีแดง พลาสติก แบบกลม​ กว้าง16xสูง2.5cm ขนาดแก้วกว้าง5xสูง3cm</p>\r\n'),
(72, 'ถ้วยน้ำชา(แถว)', 'images.jpg', 'ชุดน้ำชา', 69, 35, '<p>&nbsp;</p>\r\n\r\n<p>ชุดถ้วยน้ำชา แบบแถวยาว ทำจากพลาสติก&nbsp; สีแดง ขนาดถาดรอง กว้าง 5.5 ซม. / ยาว 25.5 ซม. / ถ้วยแต่ละใบกว้าง 5 ซม.</p>\r\n'),
(74, 'ธูป', 'R.jpg', 'ธูป/เทียน', 30, 120, '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(10) NOT NULL,
  `productID` int(10) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productcategory` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `stat` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `pricetotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `productID`, `productname`, `productcategory`, `date`, `stat`, `qty`, `pricetotal`) VALUES
(469, 73, '♥', 'อาหาร', '2021-10-07 09:38:23', 'นำเข้า', 120, 0),
(470, 74, 'ธูป', 'ธูป/เทียน', '2021-10-07 11:12:52', 'นำเข้า', 30, 0),
(471, 65, 'เทียน', 'ธูป/เทียน', '2021-10-07 11:13:18', 'ขาย', 10, 300),
(472, 66, 'หมี่เตี๊ยวจีน', 'อาหาร', '2021-10-07 11:13:18', 'ขาย', 10, 400),
(473, 65, 'เทียน', '51', '2021-10-07 11:15:17', 'ขาย', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fitstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fitstname`, `lastname`, `tel`, `address`, `role`) VALUES
('zack', '1234', 'tachapoom', 'mungcharoen', '0988905791', '14/78', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `usersreg`
--

CREATE TABLE `usersreg` (
  `usersreg_ID` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersreg`
--

INSERT INTO `usersreg` (`usersreg_ID`, `username`, `password`, `firstname`, `lastname`, `tel`, `address`, `post`) VALUES
(9, 'zack', '1234', 'zack', 'zackzzzz', '09854', '12/52 อ.กระทุ่มแบน ต.อ้อมน้อย\r\nจ.สมุทรสาคร 74130  ', 74122),
(10, 'zackผ', '1234', 'กๆไ', 'กไๆ', '123', 'กไกไก', 0),
(11, 'io', '123', 'dw', 'dw', '123', 'dwq  ', 74130),
(12, 'zc', '1234', 'dsawd', 'dwq', '0988905791', 'dqw', 1),
(13, 'zackz', '1234', 'zackz', 'zack', '0988905791', '12/78', 741320),
(14, 'zack1234', '1234', 'zack', 'zack', '0988905791', '41/78', 74130);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `usersreg`
--
ALTER TABLE `usersreg`
  ADD PRIMARY KEY (`usersreg_ID`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `DetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT for table `usersreg`
--
ALTER TABLE `usersreg`
  MODIFY `usersreg_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
