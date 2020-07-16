-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2020 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `user`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `idGallery` int(11) NOT NULL,
  `titleGallery` longtext NOT NULL,
  `descGallery` longtext NOT NULL,
  `imgFullNameGallery` longtext NOT NULL,
  `orderGallery` int(11) NOT NULL,
  `proID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`idGallery`, `titleGallery`, `descGallery`, `imgFullNameGallery`, `orderGallery`, `proID`) VALUES
(34, 'a', 'a', 'balenciaga.jpg', 1, 42),
(35, 'b', 'b', 'balenciaga.jpg', 2, 43),
(36, 'aa', 'aa', 'balenciaga.jpg', 3, 44),
(40, 'mu', 'mu', 'mu.5f0ec7b97798b3.21960024.jpg', 4, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `proID` int(10) NOT NULL,
  `proName` varchar(100) NOT NULL,
  `proDesc` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`proID`, `proName`, `proDesc`, `price`, `amount`) VALUES
(18, '4', '111', 111, 111),
(21, '3', '111', 111, 111),
(25, 'Student1227568', '111', 111, 111),
(26, 'My sheep', '111', 111, 111),
(27, 'Nhữ Hoàng Minh Đức', '111', 111, 111),
(28, 'dddddddd?', '111', 1113330000000, 111),
(29, '1', '11111111111111111111111111111111111111111111111111111111111', 1200000, 111),
(30, 'dưq', '12', 21, 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `is_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `name`, `password`, `email`, `is_admin`) VALUES
(9, 'nguyễn văn thuận', '$2y$10$nXRTeWRKXosxIxkwHKlu..Y5UtLC/Lpp3kFPbycD02kau1VJI938i', 'thuanrua881@gmail.com', 1),
(10, 'Student1234235', '$2y$10$Uma4tr1KYr9qTIncO4iVe.LUgO2KCvHPyA2dMm51cG0IJo/xXstzC', 'thuannvth1909002@fpt.edu.vn', 0),
(11, 'Nhữ Hoàng Minh Đức', '$2y$10$hxv5y19HrF8mAXjlfd/ZAuPs4DUcq2hN3mk8Q.dEkrDc1VPvWAOzu', 'ducdaik2k1@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idGallery`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idGallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `proID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
