-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 04:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ainungasem`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodefaktur` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#INV',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tfaktur WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodeitem` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#PROD');
  SET @kode = 0;
  SELECT kode FROM mitem WHERE kode LIKE CONCAT( firstkode,'%') 
  ORDER BY kode DESC LIMIT 1 INTO @kode;
  
  SET @nomor = RIGHT(@kode,4);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @kode = CONCAT(firstkode,LPAD(@nomor,4,'0'));

  RETURN @kode;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodejurnal` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#J',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tjurnal WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodejurnalumum` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('J',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tjurnalumum WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodememo` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET @vartipe = '#MEMO';
  SET firstkode = CONCAT(@vartipe,DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tmemo WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepembayaran` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#PAY',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpembayaran WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepembelian` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#PAY',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpembelian WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepemesanan` (`xtipe` CHAR(1)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET @vartipe = ( IF(xtipe = 1, '#PO', '#SO') );
  SET firstkode = CONCAT(@vartipe,DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpemesanan WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepenerimaan` (`xtipe` CHAR(1)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET @vartipe = ( IF(xtipe = 1, '#TRM', '#KRM') );
  SET firstkode = CONCAT(@vartipe,DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpenerimaan WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepengeluarankas` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#PK',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpengeluarankas WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodepengiriman` (`xtipe` CHAR(1)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET @vartipe = ( IF(xtipe = 1, '#TRM', '#KRM') );
  SET firstkode = CONCAT(@vartipe,DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tpengiriman WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecoderetur` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET firstkode = CONCAT('#RTR',DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tretur WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatecodestokopname` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  DECLARE firstkode VARCHAR(20);
  SET @vartipe = '#STO';
  SET firstkode = CONCAT(@vartipe,DATE_FORMAT(CURRENT_DATE(),'%y%m%d'));
  SET @notrans = 0;
  SELECT notrans FROM tstokopname WHERE notrans LIKE CONCAT( firstkode,'%') 
  ORDER BY notrans DESC LIMIT 1 INTO @notrans;
  
  SET @nomor = RIGHT(@notrans,3);
  SET @nomor = COALESCE(@nomor,0) + 1;
  SET @notrans = CONCAT(firstkode,LPAD(@nomor,3,'0'));

  RETURN @notrans;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `generatenoakun` (`xnoheader` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci READS SQL DATA
BEGIN
  SET @count = (SELECT COUNT(*) FROM mnoakun WHERE noakunheader = xnoheader);
  SET @noakun = CONCAT(xnoheader, @count + 1);

  RETURN @noakun;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `id_header` int(11) DEFAULT NULL,
  `no_acc` int(11) NOT NULL,
  `nama_akun` varchar(256) NOT NULL,
  `status_akun` varchar(50) NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `id_header`, `no_acc`, `nama_akun`, `status_akun`, `saldo`, `date`, `created`) VALUES
(2, 3, 11112, 'Kas di Tangan', 'Debet', NULL, '2020-06-15 18:45:27', 'kakzi01'),
(3, 3, 11113, 'Kas di Bank', 'Debet', NULL, '2020-06-15 18:46:09', 'kakzi01'),
(4, 4, 11121, 'Fixed Asset, at Cost', 'Debet', NULL, '2020-06-15 18:47:36', 'kakzi01'),
(5, 4, 11122, 'Asset Tetap, Akumulasi Penyusutan', 'Debet', NULL, '2020-06-15 18:48:56', 'kakzi01'),
(6, 4, 11123, 'Biaya di Bayar di Muka', 'Debet', NULL, '2020-06-15 18:49:42', 'kakzi01'),
(7, 5, 11131, 'Persediaan Air Minum NU 220ml', 'Debet', NULL, '2020-06-15 18:50:30', 'kakzi01'),
(8, 6, 11141, 'Piutang Dagang', 'Debet', NULL, '2020-06-15 18:52:09', 'kakzi01'),
(9, 9, 11151, 'Hutang Dagang', 'Debet', NULL, '2020-06-16 04:21:31', 'kakzi01'),
(10, 11, 11161, 'Dana Promosi', 'Debet', NULL, '2020-06-16 04:22:40', 'kakzi01'),
(11, 11, 11162, 'Dana Sosial', 'Debet', NULL, '2020-06-16 04:23:13', 'kakzi01'),
(12, 11, 11163, 'Dana THR', 'Debet', NULL, '2020-06-16 04:23:50', 'kakzi01'),
(13, 11, 11164, 'Kewajiban lain lain', 'Debet', NULL, '2020-06-16 04:24:29', 'kakzi01'),
(14, 14, 31, 'Akun Modal', 'Debet', NULL, '2020-06-16 04:25:16', 'kakzi01'),
(15, 14, 32, 'Dana Cadangan', 'Debet', NULL, '2020-06-16 04:25:51', 'kakzi01'),
(16, 14, 34, 'Laba Tahun lalu', 'Debet', NULL, '2020-06-16 04:26:19', 'kakzi01'),
(17, 14, 33, 'Laba di Tahan', 'Debet', NULL, '2020-06-16 04:26:48', 'kakzi01'),
(18, 16, 41111, 'Pendapatan Penjualan', 'Kredit', NULL, '2020-06-16 04:27:43', 'kakzi01'),
(19, 16, 41112, 'Pendapatan Usaha lainya', 'Kredit', NULL, '2020-06-16 04:28:27', 'kakzi01'),
(20, 16, 41113, 'Penjualan Air Minum NU 220ml', 'Kredit', NULL, '2020-06-16 04:38:55', 'kakzi01'),
(21, 5, 11131, 'Harga Pokok Peersediaan AINU 220ml', 'Kredit', NULL, '2020-06-16 04:39:48', 'kakzi01'),
(22, 21, 61111, 'Biaya Gaji Karyawan', 'Kredit', NULL, '2020-06-16 04:40:58', 'kakzi01'),
(23, 21, 61112, 'Bagi Hasil BMT NU Pusat', 'Kredit', NULL, '2020-06-16 04:41:45', 'kakzi01'),
(24, 22, 71111, 'Biaya Alat Tulis Kantor', 'Kredit', NULL, '2020-06-16 04:42:55', 'kakzi01'),
(25, 22, 71112, 'Biaya Gathering', 'Kredit', NULL, '2020-06-16 04:44:45', 'kakzi01'),
(26, 22, 71113, 'Biaya Jamuan Kantor', 'Kredit', NULL, '2020-06-16 04:45:21', 'kakzi01'),
(27, 22, 71114, 'Biaya Listrik', 'Kredit', NULL, '2020-06-16 04:46:06', 'kakzi01'),
(28, 22, 71115, 'Biaya Pendidikan dan Pelatihan', 'Kredit', NULL, '2020-06-16 04:46:48', 'kakzi01'),
(29, 22, 71116, 'Biaya Perbaikan dan Pemeliharaan', 'Kredit', NULL, '2020-06-16 04:47:31', 'kakzi01'),
(30, 22, 71117, 'Biaya Pulsa dan Telepon', 'Kredit', NULL, '2020-06-16 04:48:18', 'kakzi01'),
(31, 22, 71118, 'Biaya Transfer', 'Kredit', NULL, '2020-06-16 04:49:24', 'kakzi01'),
(32, 22, 71119, 'Dana Kesehatan Santri', 'Kredit', NULL, '2020-06-16 04:50:08', 'kakzi01'),
(33, 22, 711110, 'Insentive Karyawan', 'Debet', NULL, '2020-06-16 04:51:13', 'kakzi01'),
(34, 22, 711111, 'Pakaian Dinas', 'Kredit', NULL, '2020-06-16 04:51:49', 'kakzi01'),
(35, 22, 711112, 'Tunjangan Hari Raya', 'Kredit', NULL, '2020-06-16 04:52:31', 'kakzi01'),
(36, 23, 81111, 'Biaya Bantuan Kegiatan/Proposal', 'Kredit', NULL, '2020-06-16 04:53:44', 'kakzi01'),
(37, 23, 81112, 'Biaya Iklan dan Promosi', 'Kredit', NULL, '2020-06-16 04:55:13', 'kakzi01'),
(38, 21, 61113, 'Biaya Sewa Kantor', 'Kredit', NULL, '2020-06-16 04:57:19', 'kakzi01'),
(39, 21, 61114, 'Biaya BBM Kendaraan Bermotor', 'Debet', NULL, '2020-06-16 04:58:21', 'kakzi01'),
(40, 21, 61115, 'Asset Tetap - Penyusutan', 'Kredit', NULL, '2020-06-16 04:59:03', 'kakzi01'),
(41, 21, 61116, 'Biaya Sumbangan Umum', 'Kredit', NULL, '2020-06-16 04:59:42', 'kakzi01'),
(42, 21, 61117, 'Amortisasi BDD', 'Kredit', NULL, '2020-06-16 05:00:19', 'kakzi01'),
(43, 21, 61118, 'Biaya Transportasi Kendaraan Luar', 'Kredit', NULL, '2020-06-16 05:01:20', 'kakzi01'),
(44, 21, 61119, 'Pajak Kendaraan', 'Kredit', NULL, '2020-06-16 05:02:02', 'kakzi01'),
(45, 21, 611110, 'Zakat', 'Kredit', NULL, '2020-06-16 05:02:42', 'kakzi01'),
(46, 21, 611111, 'Pajak', 'Kredit', NULL, '2020-06-16 05:03:20', 'kakzi01'),
(47, 24, 91111, 'Biaya lain - lain', 'Kredit', NULL, '2020-06-16 05:04:11', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tagihan_a` int(11) NOT NULL,
  `angsuran_pokok` int(11) NOT NULL,
  `angsuran_laba` int(11) NOT NULL,
  `saldo_tagihan` int(11) NOT NULL,
  `keterangan_a` text NOT NULL,
  `date_angsuran` date NOT NULL,
  `created_a` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_a` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id_angsuran`, `id_penjualan`, `id_pelanggan`, `tagihan_a`, `angsuran_pokok`, `angsuran_laba`, `saldo_tagihan`, `keterangan_a`, `date_angsuran`, `created_a`, `user_a`) VALUES
(1, 1, 10, 1000000, 500000, 100000, 762500, 'Angsuran ke 1', '2020-06-16', '2020-06-16 20:35:14', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id_bahan` int(11) NOT NULL,
  `kode_bahan` varchar(50) NOT NULL,
  `nama_bahan` varchar(128) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stock_bahan` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beban`
--

CREATE TABLE `tbl_beban` (
  `id_beban` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nota_beban` varchar(50) NOT NULL,
  `nama_beban` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `biaya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan_beban` text NOT NULL,
  `date_beban` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creat_beban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hpp_cart` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_pembelian`
--

CREATE TABLE `tbl_cart_pembelian` (
  `id_cart_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `qty_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `user_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart_pembelian`
--

INSERT INTO `tbl_cart_pembelian` (`id_cart_pembelian`, `id_produk`, `harga_barang`, `qty_barang`, `total_harga`, `user_created`) VALUES
(1, 7, 15000, 21, 315000, 'kakzi01'),
(2, 8, 0, 2, 25000, 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hpp_produk` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `laba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`id_detail`, `id_penjualan`, `id_produk`, `price`, `qty`, `hpp_produk`, `total`, `laba`) VALUES
(1, 1, 7, 15000, 90, 1080000, 1350000, 270000),
(2, 1, 8, 12500, 1, 10500, 12500, 2000),
(3, 2, 7, 15000, 1, 12000, 15000, 3000),
(4, 2, 8, 12500, 2, 21000, 25000, 4000);

--
-- Triggers `tbl_detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `tbl_detail_penjualan` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET stock_produk = stock_produk - NEW.qty
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faktur_pembelian`
--

CREATE TABLE `tbl_faktur_pembelian` (
  `id_faktur_pembelian` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `ket_faktur_pemb` text NOT NULL,
  `total_faktur_pemb` int(11) NOT NULL,
  `saldo_faktur_pemb` int(11) NOT NULL,
  `jatuh_faktur_pemb` date NOT NULL,
  `date_faktur_pemb` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_faktur_pemb` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_akun`
--

CREATE TABLE `tbl_header_akun` (
  `id_header` int(11) NOT NULL,
  `no_reff` int(11) NOT NULL,
  `nama_header` varchar(256) NOT NULL,
  `date_header` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_header` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_header_akun`
--

INSERT INTO `tbl_header_akun` (`id_header`, `no_reff`, `nama_header`, `date_header`, `created_by_header`) VALUES
(3, 1111, 'Asset Lancar', '2020-06-15 18:14:23', 'kakzi01'),
(4, 1112, 'Asset Tetap', '2020-06-15 18:14:56', 'kakzi01'),
(5, 1113, 'Persediaan', '2020-06-15 18:15:18', 'kakzi01'),
(6, 1114, 'Piutang Dagang', '2020-06-15 18:15:47', 'kakzi01'),
(9, 1115, 'Hutang Dagang', '2020-06-15 18:18:22', 'kakzi01'),
(11, 1116, 'Kewajiban Lainya', '2020-06-15 18:19:38', 'kakzi01'),
(12, 1, 'Aset', '2020-06-15 18:20:43', 'kakzi01'),
(13, 2, 'Kewajiban', '2020-06-15 18:20:55', 'kakzi01'),
(14, 3, 'Ekuitas', '2020-06-15 18:21:05', 'kakzi01'),
(16, 4, 'Pendapatan', '2020-06-15 18:24:22', 'kakzi01'),
(17, 4111, 'Pendapatan Penjualan', '2020-06-15 18:24:45', 'kakzi01'),
(19, 4112, 'Pendapatan lainya', '2020-06-15 18:25:39', 'kakzi01'),
(20, 5111, 'Harga Pokok Persediaan', '2020-06-15 18:27:13', 'kakzi01'),
(21, 6111, 'Biaya Usaha', '2020-06-15 18:30:45', 'kakzi01'),
(22, 7111, 'Biaya Kantor', '2020-06-15 18:41:54', 'kakzi01'),
(23, 8111, 'Biaya Promosi', '2020-06-15 18:42:43', 'kakzi01'),
(24, 9111, 'Biaya lainya', '2020-06-15 18:43:31', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `date`, `created`) VALUES
(1, 'Agen', '2020-03-27 14:24:57', 'kakzi01'),
(2, 'Sub Distributor', '2020-03-27 14:25:37', 'kakzi01'),
(3, 'Distributor', '2020-03-27 14:25:48', 'kakzi01'),
(8, 'Umum', '2020-03-27 14:34:32', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(128) NOT NULL,
  `pic_pelanggan` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `barcode_pelanggan` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `pic_pelanggan`, `id_kategori`, `nik`, `alamat_pelanggan`, `no_telp`, `barcode_pelanggan`, `date`, `created`) VALUES
(8, 'PLG1586180039', 'Toko Kita', 'Rozi', 'Agen', '3554464444', 'Katur', '0854332211', 'PLG1586180039.png', '2020-04-06 20:34:00', 'kakzi01'),
(9, 'PLG1586183274', 'Toko Berkah', 'Muhammad', 'Distributor', '35462711110', 'Desa Katur', '08873312345', 'PLG1586183274.png', '2020-04-06 21:27:54', 'kakzi01'),
(10, 'PLG1586183339', 'Maria Puspa', 'Maria Puspa', 'Umum', '35000111223', 'Katur', '08978822333', 'PLG1586183339.png', '2020-04-06 21:28:59', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `jenis_payment` varchar(50) NOT NULL,
  `cash` int(11) DEFAULT NULL,
  `remaining` int(11) NOT NULL,
  `tagihan` int(11) NOT NULL,
  `hpp_total` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `note` text,
  `date_penjualan` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `invoice`, `id_akun`, `id_pelanggan`, `sub_total`, `diskon`, `total_price`, `jenis_payment`, `cash`, `remaining`, `tagihan`, `hpp_total`, `laba`, `note`, `date_penjualan`, `jatuh_tempo`, `user_id`, `created`) VALUES
(1, 'AINU2006160001', 18, 10, 1362500, 0, 1362500, 'DP', 362500, 1000000, 400000, 590500, 172000, 'Pembayaran DP', '2020-06-16', '2020-06-30', 'kakzi01', '2020-06-16 20:31:33'),
(2, 'AINU2008140001', 2, 10, 40000, 0, 40000, 'DP', 20000, 20000, 20000, 33000, 7000, 'Ada', '2020-08-14', '2020-08-28', 'kakzi01', '2020-08-14 19:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(128) NOT NULL,
  `barcode_produk` varchar(128) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `stock_produk` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `hpp` varchar(50) NOT NULL,
  `harga_jual` varchar(50) NOT NULL,
  `date_produk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `barcode_produk`, `nama_produk`, `stock_produk`, `id_satuan`, `hpp`, `harga_jual`, `date_produk`, `created`) VALUES
(7, 'PROD1585299587', 'PROD1585299587.png', 'Air Minum NU 240ml', 199, 1, '12000', '15000', '2020-03-27 15:59:47', 'kakzi01'),
(8, 'PROD1587094376', 'PROD1587094376.png', 'Air Minum NU 210ml', 8867, 1, '10500', '12500', '2020-04-17 10:32:57', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`, `date`, `created`) VALUES
(1, 'Dus', '0000-00-00 00:00:00', 'kakzi01'),
(2, 'Botol', '2020-03-27 07:47:53', 'kakzi01'),
(3, 'Gelas', '2020-03-27 14:27:07', 'kakzi01'),
(4, 'Galon', '2020-03-27 14:35:38', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_bahan`
--

CREATE TABLE `tbl_stock_bahan` (
  `id_stock_b` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `qty_b` int(11) NOT NULL,
  `type_b` enum('in','out') NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `keterangan_b` text NOT NULL,
  `date_b` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_b` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_produk`
--

CREATE TABLE `tbl_stock_produk` (
  `stock_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_p` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `detail` text NOT NULL,
  `date_stock` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock_produk`
--

INSERT INTO `tbl_stock_produk` (`stock_id`, `id_produk`, `qty_p`, `type`, `id_supplier`, `detail`, `date_stock`, `created`, `user`) VALUES
(14, 7, 1000, 'in', 3, 'Stock Awal', '04/11/2020', '2020-04-11 10:51:08', 'kakzi01'),
(15, 8, 10000, 'in', 3, 'Stok', '04/17/2020', '2020-04-17 10:33:34', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `pic_supplier` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telp_supplier` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `pic_supplier`, `nik`, `alamat_supplier`, `telp_supplier`, `deskripsi`, `date`, `created`) VALUES
(1, 'SUP1584432479', 'Moh Fatkhur Rozi', 'Rozi', '354335353563', 'Katur', '08977667557', 'Supplier Paling Buruk', '1584432479', 'kakzi01'),
(2, 'SUP1584432721', 'PT Indo Prima Abadi', 'Fatkur Rozi', '3544009490950', 'Katur', '0876776555', 'Supplier Bahan Baku', '1584432721', 'kakzi01'),
(3, 'SUP1584780200', 'Al-Yasini', 'Bambang', '35444099989', 'Pasuruan', '085716722888', 'Supplier Pertama', '1584780200', 'kakzi01'),
(4, 'SUP1586484678', 'PT Maju Terus', 'Soleh', '1111', 'ga jelas', 'ga duwe', 'bakul lombok', '1586484678', 'kakzi01'),
(5, 'SUP1586484786', 'Pt Maju Mundur', 'Soleh', 'ga roh', 'ga duwe', 'iyo', 'bakul lombok', '1586484786', 'kakzi01'),
(6, 'SUP1586485478', 'PT Berkah', 'Sujanarko', '122232222', 'cepu', '09889778', 'Blank', '1586485478', 'kakzi01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Ahmad Yusuf', 'yusuf01', '$2y$10$AaICboa6nQgct6klSnxVWOB2JB2rDxP66bskE7/a1O1qDcKjq0Chu', 'default.jpg', 4, 1, 1583038076),
(9, 'Muhammad Sholeh', 'soleh01', '$2y$10$3nncXYvNMnBz0HU.//H9BOnOhEMOVtU2Zez3KDnNd1eTC7k84OmfS', 'default.jpg', 3, 1, 1583334503),
(10, 'Muhammad Fatkhur Rozi', 'kakzi01', '$2y$10$FqQEa.CQcrdy7/o8Ulb2DOC25O9cfH6Dm5WbUhhuTrj0s0CpxAM0u', 'default.jpg', 1, 1, 1583417752);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 1, 2),
(16, 1, 3),
(32, 1, 12),
(34, 3, 13),
(35, 3, 2),
(37, 1, 15),
(38, 3, 15),
(39, 3, 14),
(40, 3, 16),
(42, 3, 17),
(46, 4, 2),
(51, 4, 17),
(53, 3, 18),
(54, 4, 13),
(59, 1, 20),
(61, 1, 17),
(62, 1, 13),
(64, 1, 14),
(66, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(13, 'Master'),
(14, 'Akuntansi'),
(15, 'Produk'),
(16, 'Transaksi'),
(17, 'Inventory'),
(18, 'Tagihan'),
(19, 'Report'),
(20, 'Pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Admin Kasir'),
(4, 'Admin Inventory');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-chart-pie', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Menu Management', 'menu', 'fas fa-fw fa-brain', 1),
(4, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'User Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(31, 14, 'Akun', 'akuntansi', 'fas fa-fw fa-book-reader', 1),
(33, 13, 'Supplier', 'master', 'fas fa-fw fa-dolly', 1),
(35, 15, 'Produk', 'produk', 'fas fa-fw fa-apple-alt', 1),
(36, 16, 'Penjualan', 'transaksi', 'fas fa-fw fa-cash-register', 1),
(37, 17, 'Stock in', 'inventory', 'fas fa-fw fa-calendar-plus', 1),
(38, 17, 'Stock Out', 'inventory/stockout', 'fas fa-fw fa-calendar-minus', 1),
(39, 13, 'Pelanggan', 'master/pelanggan', 'fas fa-fw fa-shopping-bag', 1),
(40, 13, 'Satuan Barang', 'master/satuan', 'fas fa-fw fa-folder', 1),
(42, 16, 'History', 'transaksi/history', 'fas fa-fw fa-shopping-bag', 1),
(43, 18, 'Tagihan DP', 'tagihan', 'fas fa-fw fa-home', 1),
(44, 16, 'Angsuran', 'transaksi/angsuran', 'fas fa-fw fa-database', 1),
(48, 19, 'Laporan Penjualan', 'report', 'fas fa-fw fa-user-tie', 1),
(49, 19, 'Laporan Pembelian', 'report/laporan_pembelian', 'fas fa-fw fa-apple-alt', 1),
(50, 14, 'Header Akun', 'akuntansi/header_akun', 'fas fa-fw fa-user-tie', 1),
(51, 20, 'Faktur Pembelian', 'pembelian', 'fas fa-fw fa-shopping-bag', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tbl_beban`
--
ALTER TABLE `tbl_beban`
  ADD PRIMARY KEY (`id_beban`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_cart_pembelian`
--
ALTER TABLE `tbl_cart_pembelian`
  ADD PRIMARY KEY (`id_cart_pembelian`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_faktur_pembelian`
--
ALTER TABLE `tbl_faktur_pembelian`
  ADD PRIMARY KEY (`id_faktur_pembelian`);

--
-- Indexes for table `tbl_header_akun`
--
ALTER TABLE `tbl_header_akun`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_stock_bahan`
--
ALTER TABLE `tbl_stock_bahan`
  ADD PRIMARY KEY (`id_stock_b`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tbl_stock_produk`
--
ALTER TABLE `tbl_stock_produk`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_beban`
--
ALTER TABLE `tbl_beban`
  MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart_pembelian`
--
ALTER TABLE `tbl_cart_pembelian`
  MODIFY `id_cart_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faktur_pembelian`
--
ALTER TABLE `tbl_faktur_pembelian`
  MODIFY `id_faktur_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_header_akun`
--
ALTER TABLE `tbl_header_akun`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_stock_bahan`
--
ALTER TABLE `tbl_stock_bahan`
  MODIFY `id_stock_b` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock_produk`
--
ALTER TABLE `tbl_stock_produk`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD CONSTRAINT `tbl_bahan_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`);

--
-- Constraints for table `tbl_beban`
--
ALTER TABLE `tbl_beban`
  ADD CONSTRAINT `tbl_beban_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tbl_akun` (`id_akun`),
  ADD CONSTRAINT `tbl_beban_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`);

--
-- Constraints for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD CONSTRAINT `tbl_detail_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`);

--
-- Constraints for table `tbl_stock_bahan`
--
ALTER TABLE `tbl_stock_bahan`
  ADD CONSTRAINT `tbl_stock_bahan_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `tbl_bahan` (`id_bahan`),
  ADD CONSTRAINT `tbl_stock_bahan_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`),
  ADD CONSTRAINT `tbl_stock_bahan_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`);

--
-- Constraints for table `tbl_stock_produk`
--
ALTER TABLE `tbl_stock_produk`
  ADD CONSTRAINT `tbl_stock_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`),
  ADD CONSTRAINT `tbl_stock_produk_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
