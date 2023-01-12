-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celluler`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `balas` text DEFAULT NULL,
  `time_chatting` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `pesan`, `balas`, `time_chatting`) VALUES
(1, 1, 'hai', NULL, '2022-05-08 14:52:16'),
(2, 1, '0', 'hai juga', '2022-05-08 14:58:17'),
(3, 1, '0', 'ada yang bisa di bantu?', '2022-05-08 14:59:06'),
(4, 1, '0', 'kami siap membantu anda', '2022-05-08 14:59:31'),
(5, 1, '0', 'jadi bagai mana?', '2022-05-08 15:00:09'),
(6, 1, 'bisa di bantu ka?', '0', '2022-05-08 15:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_promo` varchar(50) DEFAULT NULL,
  `harga_promo` varchar(50) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_promo`, `harga_promo`, `tanggal`) VALUES
(1, 1, '0', '0', '0'),
(3, 3, 'lebara', '12000', '2022-05-10'),
(4, 4, '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(1, 'vivo', 'photo1.jpg'),
(2, 'xiamo', 'photo2.jpg'),
(3, 'nokia', 'photo3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(125) DEFAULT NULL,
  `lokasi` int(125) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_toko`, `lokasi`, `alamat`) VALUES
(1, 'radhika celluler', 211, 'kadugede kuningan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `jenis_kel` varchar(25) DEFAULT NULL,
  `kode_pos` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `email`, `password`, `no_tlpn`, `jenis_kel`, `kode_pos`, `alamat`) VALUES
(1, 'silva', 'silva@gmail.com', '12345', '085156727368', 'perempuan', '123121', 'kuningan'),
(2, 'jamal', 'jamal@gmail.com', '1234567', '089192819283', 'laki laki', '2378221', 'subang'),
(3, 'babi', 'babi@gmail.com', 'babibu', '08919281212', 'laki laki', '817621', 'jamban');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `berat`, `stock`, `images`, `deskripsi`) VALUES
(1, 'xiamo m3', 1, '8000000', '200', '7', 'white-800x800.png', 'xiami dengan spesifikasi snapdragen cipset 670.\r\ngaransi resmi.'),
(3, 'iphon 12', 3, '14000000', '250', '30', '61d2f93392b57c0004c64747.png', 'Iphone 12 dengan garansi resi ibox selama 1 tahun'),
(4, 'samsung s22', 2, '15000000', '20', '5', 'samsung-galaxy-s21-ultra-5g-sm-g9980.jpg', 'samsung s22 ultra garansi resmi samsung.');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '32412356453', 'silva'),
(2, 'BNI', '54235653232', 'tiara');

-- --------------------------------------------------------

--
-- Table structure for table `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(50) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`id_rinci`, `no_order`, `id_produk`, `qty`) VALUES
(1, '20220506WJUITUVL', 3, 1),
(2, '20220507FHP2BZZD', 4, 1),
(3, '20220507FHP2BZZD', 3, 1),
(4, '20220507FHP2BZZD', 1, 1),
(5, '20220821DVA7ABXI', 1, 1),
(6, '20220821DVA7ABXI', 3, 1),
(7, '20221014F7WQMJHD', 1, 1),
(8, '20221014SCDP0ZUH', 1, 1),
(9, '20221014WRXF6UVF', 4, 1),
(10, '20221014CGAY57OY', 3, 1),
(11, '20221014IYP1PNHY', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `riview`
--

CREATE TABLE `riview` (
  `id_riview` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(125) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `status` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riview`
--

INSERT INTO `riview` (`id_riview`, `id_pelanggan`, `id_produk`, `nama_pelanggan`, `tanggal`, `isi`, `status`) VALUES
(1, 1, 1, NULL, '2022-09-18', 'satu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_order` varchar(50) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `type_order` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(128) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `provinsi` varchar(125) DEFAULT NULL,
  `kota` varchar(125) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `no_resi` varchar(125) DEFAULT NULL,
  `berat` bigint(255) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(125) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `jml_bayar` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_user`, `no_order`, `tgl_order`, `type_order`, `nama_pelanggan`, `no_tlpn`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `ongkir`, `estimasi`, `no_resi`, `berat`, `grand_total`, `total_bayar`, `status_order`, `status_bayar`, `atas_nama`, `nama_bank`, `bukti_bayar`, `no_rek`, `jml_bayar`, `catatan`) VALUES
(1, 1, NULL, '20220506WJUITUVL', '2022-05-06', 1, 'uud', '0912838291221', 'Banten', 'Serang', 'Ciawilor', '45591', 'tiki', 'ECO', 11000, '4 Hari', 'jne12345', 750, 1050000, 1061000, 4, 1, 'wulan', 'bni', 'signup-bg1.jpg', '123456789', '123444', NULL),
(2, 1, NULL, '20220507FHP2BZZD', '2022-05-07', 1, 'uud', '123412341234', 'Bangka Belitung', 'Bangka', 'Ciawilor', '45591', 'tiki', 'ECO', 35000, '4 Hari', NULL, 470, 8372700, 8407700, 4, 1, 'sasa', 'bca', 'signup-bg2.jpg', NULL, '123444', NULL),
(3, 2, NULL, '20220821DVA7ABXI', '2022-08-21', 1, 'jamal', '121211212121', 'Bangka Belitung', 'Bangka Tengah', 'Ciawigebang, Kuningan', '123121', 'pos', 'Pos Reguler', 34650, '8 HARI Hari', '12981721', 450, 8226877, 8261527, 4, 1, 'sdad', 'saa', 'WhatsApp_Image_2022-08-03_at_08_41_36_(1).jpeg', NULL, '1222222', NULL),
(5, NULL, 1, '20221014SCDP0ZUH', '2022-10-14', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8000000, 4, NULL, NULL, NULL, '0', NULL, NULL, NULL),
(6, NULL, 1, '20221014WRXF6UVF', '2022-10-14', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15000000, 4, NULL, NULL, NULL, '0', NULL, NULL, NULL),
(7, NULL, 1, '20221014CGAY57OY', '2022-10-14', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13876877, 4, NULL, NULL, NULL, '0', NULL, NULL, NULL),
(8, 1, NULL, '20221014IYP1PNHY', '2022-10-14', 1, 'silva', '085156727368', 'Jawa Timur', 'Lamongan', 'kuningan', '123121', 'jne', 'OKE', 23000, '3-6 Hari', NULL, 250, 13988000, 14011000, 4, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `riview`
--
ALTER TABLE `riview`
  ADD PRIMARY KEY (`id_riview`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `riview`
--
ALTER TABLE `riview`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
