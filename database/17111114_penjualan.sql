-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 02:08 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `17111114_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'okriiza', 'okriiza', 'Rendi Okriza Putra'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Bandung', 10000),
(2, 'Jakarta', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(64) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'okriizaa@gmail.com', 'okriiza', 'Rendi Okriza Putra', '089502161899', ''),
(2, 'BambangSalehudin@gmail.com', 'bambang', 'Bambang Salehudin', '08397436807', ''),
(3, 'kocak@gmail.com', 'kocak', 'kocak gaming', '0829823579235', ''),
(4, 'okriza@gmail.com', 'okriza', 'okriza', '0987654214', 'okriza'),
(5, 'samuel@gmail.com', 'samuel', 'samuel', '0896254623', 'dimana weh');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 51, 'Rendi Okriza Putra', 'BRI', 51, '2019-08-20', '190820034335IMG_6033.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(38, 3, 1, '2019-07-17', 26000, 'Bandung', 10000, 'jln muhammad iwan 1 no 78', 'sudah kirim pembayaran', ''),
(39, 3, 1, '2019-07-18', 19000, 'Bandung', 10000, 'jln muhammad iwan 1 no 78', 'Pending', ''),
(40, 3, 1, '2019-07-19', 35000, 'Bandung', 10000, 'jln muhammad iwan 1 no 78', 'Pending', ''),
(41, 3, 2, '2019-07-20', 23000, 'Jakarta', 15000, 'sad', 'Pending', ''),
(42, 3, 1, '2019-07-20', 19000, 'Bandung', 10000, 'sadsa', 'Pending', ''),
(43, 3, 1, '2019-07-20', 18000, 'Bandung', 10000, 'sad', 'Pending', ''),
(44, 4, 2, '2019-07-25', 23000, 'Jakarta', 15000, 'jln moh ramdhan', 'Pending', ''),
(45, 4, 2, '2019-07-25', 32000, 'Jakarta', 15000, 'jln moh ramdhan', 'Pending', ''),
(46, 5, 1, '2019-07-30', 59000, 'Bandung', 10000, 'lsgksldghsldkgsdlgds', 'Pending', ''),
(47, 6, 1, '2019-07-30', 55000, 'Bandung', 10000, 'jln bkr', 'Pending', ''),
(48, 3, 2, '2019-08-20', 22000, 'Jakarta', 15000, 'jln muhammad iwan 1 no 78', 'Pending', ''),
(49, 3, 2, '2019-08-20', 54000, 'Jakarta', 15000, 'asafaasfsa', 'Pending', ''),
(50, 3, 1, '2019-08-20', 44000, 'Bandung', 10000, 'jln moh ramdhan', 'sudah kirim pembayaran', ''),
(51, 3, 2, '2019-08-20', 51000, 'Jakarta', 15000, 'jln moh ramdhan', 'barang dikirim', 'asfs346we32'),
(52, 3, 1, '2019-11-14', 17000, 'Bandung', 10000, 'drtfyu', 'Pending', ''),
(53, 3, 1, '2019-12-05', 31000, 'Bandung', 10000, 'jln Pasirluyu Utara, GG. H. hasanudin , Rt 003 rw 001 no 47a (kost kodir)', 'Pending', ''),
(54, 4, 1, '2019-12-17', 16000, 'Bandung', 10000, 'sadasf', 'Pending', ''),
(55, 3, 0, '2020-01-31', 7000, '', 0, '500 Kingston RD Toronto', 'Pending', ''),
(56, 3, 2, '2020-06-29', 35000, 'Jakarta', 15000, 'jln moh ramdhan', 'Pending', ''),
(57, 3, 1, '2020-06-29', 16000, 'Bandung', 10000, '', 'Pending', ''),
(58, 3, 0, '2020-06-29', 8000, '', 0, '', 'Pending', ''),
(59, 3, 1, '2020-07-06', 19000, 'Bandung', 10000, 'adasdasa', 'Pending', ''),
(60, 3, 1, '2020-07-06', 48000, 'Bandung', 10000, 'dfghakdakgdas', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(28, 32, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(29, 32, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(30, 32, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(31, 33, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(32, 33, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(33, 33, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(34, 33, 5, 1, 'Juice Jeruk', 6000, 500, 500, 6000),
(35, 34, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(36, 34, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(37, 35, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(38, 35, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(39, 35, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(40, 36, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(41, 36, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(42, 37, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(43, 37, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(44, 38, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(45, 38, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(46, 39, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(47, 40, 1, 2, 'Juice Alpukat', 9000, 500, 1000, 18000),
(48, 40, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(49, 41, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(50, 42, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(51, 43, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(52, 44, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(53, 45, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(54, 45, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(55, 46, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(56, 46, 2, 5, 'Juice Mangga', 8000, 500, 2500, 40000),
(57, 47, 1, 5, 'Juice Alpukat', 9000, 500, 2500, 45000),
(58, 48, 11, 1, 'Juice Markisa', 7000, 500, 500, 7000),
(59, 49, 2, 2, 'Juice Mangga', 8000, 500, 1000, 16000),
(60, 49, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(61, 49, 3, 2, 'Juice Melon ', 7000, 500, 1000, 14000),
(62, 50, 1, 1, 'Juice Alpukat', 9000, 500, 500, 9000),
(63, 50, 9, 1, 'Juice Semangka', 6000, 500, 500, 6000),
(64, 50, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(65, 50, 7, 2, 'Juice Wortel', 6000, 500, 1000, 12000),
(66, 51, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(67, 51, 8, 1, 'Juice Anggur', 8000, 500, 500, 8000),
(68, 51, 6, 1, 'Juice Strawberry', 7000, 500, 500, 7000),
(69, 51, 11, 1, 'Juice Markisa', 7000, 500, 500, 7000),
(70, 51, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(71, 52, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(72, 53, 6, 3, 'Juice Strawberry', 7000, 500, 1500, 21000),
(73, 54, 5, 1, 'Juice Jeruk', 6000, 500, 500, 6000),
(74, 55, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(75, 56, 3, 1, 'Juice Melon ', 7000, 500, 500, 7000),
(76, 56, 4, 1, 'Juice Tomat', 7000, 500, 500, 7000),
(77, 56, 5, 1, 'Juice Jeruk', 6000, 500, 500, 6000),
(78, 57, 7, 1, 'Juice Wortel', 6000, 500, 500, 6000),
(79, 58, 2, 1, 'Juice Mangga', 8000, 500, 500, 8000),
(80, 59, 1, 1, 'Lorem Ipsum', 9000, 500, 500, 9000),
(81, 60, 1, 1, 'Lorem Ipsum', 9000, 500, 500, 9000),
(82, 60, 2, 1, 'Lorem Ipsum', 8000, 500, 500, 8000),
(83, 60, 3, 3, 'Lorem Ipsum', 7000, 500, 1500, 21000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(1, 'Lorem Ipsum', 9000, 500, '1.png', '                                                                                                                                      ', 8),
(2, 'Lorem Ipsum', 8000, 500, '2.jpg', '                                                                             ', 9),
(3, 'Lorem Ipsum', 7000, 500, '3.jpg', '                                                                                      ', 7),
(4, 'Lorem Ipsum', 7000, 500, '1.png', '                                                                 ', 10),
(5, 'Lorem Ipsum', 6000, 500, '2.jpg', '                                                                               ', 10),
(6, 'Lorem Ipsum', 7000, 500, '3.jpg', '                                    ', 10),
(7, 'Lorem Ipsum', 6000, 500, '1.png', '                                                                                                            ', 10),
(8, 'Lorem Ipsum', 8000, 500, '2.jpg', '                                    ', 10),
(9, 'Lorem Ipsum', 6000, 500, '3.jpg', '', 10),
(11, 'Lorem Ipsum', 7000, 500, '1.png', '                                                                        ', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
