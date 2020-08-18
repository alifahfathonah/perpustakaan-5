/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.5.16 : Database - perpustakaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`perpustakaan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `perpustakaan`;

/*Table structure for table `tbl_access_menu` */

DROP TABLE IF EXISTS `tbl_access_menu`;

CREATE TABLE `tbl_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_access_menu` */

insert  into `tbl_access_menu`(`id`,`id_menu`,`id_user`,`status`) values 
(1,1,1,0),
(2,2,1,0),
(3,3,1,0),
(4,4,1,0),
(5,5,1,0),
(6,6,1,0),
(7,7,1,0),
(8,8,1,0),
(9,9,1,0),
(10,10,1,0);

/*Table structure for table `tbl_anggota` */

DROP TABLE IF EXISTS `tbl_anggota`;

CREATE TABLE `tbl_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(100) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `usia` date DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `fakultas` int(5) DEFAULT NULL,
  `prodi` int(5) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ava` varchar(225) DEFAULT NULL,
  `status` int(5) DEFAULT '0',
  `create_date` datetime DEFAULT NULL,
  `create_user` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_anggota` */

insert  into `tbl_anggota`(`id`,`no_anggota`,`nama`,`usia`,`alamat`,`fakultas`,`prodi`,`hp`,`email`,`ava`,`status`,`create_date`,`create_user`,`update_date`,`update_user`) values 
(1,'APS-2008-001','Didi','1994-03-20','Serpong',1,1,'09373738922','',NULL,1,'2020-08-16 05:03:08','admin','2020-08-16 05:14:56','admin'),
(6,'APS-2008-002','Silvia','2005-05-05','Batuceper',3,4,'089651955916','',NULL,0,'2020-08-16 05:12:34','admin',NULL,NULL),
(7,'APS-2008-003','Rian','2002-03-03','Karawaci',3,5,'038862356','',NULL,0,'2020-08-16 05:14:30','admin',NULL,NULL);

/*Table structure for table `tbl_buku` */

DROP TABLE IF EXISTS `tbl_buku`;

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(225) DEFAULT NULL,
  `category` int(10) DEFAULT NULL,
  `isi` text,
  `img_cover` varchar(225) DEFAULT NULL,
  `hal` int(50) DEFAULT NULL,
  `penerbit` varchar(225) DEFAULT NULL,
  `penulis1` varchar(225) DEFAULT NULL,
  `penulis2` varchar(225) DEFAULT NULL,
  `penulis3` varchar(225) DEFAULT NULL,
  `thn_terbit` varchar(4) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `user_created` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_updated` varchar(50) DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_buku` */

insert  into `tbl_buku`(`id`,`judul`,`category`,`isi`,`img_cover`,`hal`,`penerbit`,`penulis1`,`penulis2`,`penulis3`,`thn_terbit`,`kota`,`user_created`,`date_created`,`user_updated`,`date_updated`) values 
(5,'Kesatria, Putri dan Bintang Jatuh',2,'Kestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh\nKestaria, Putri dan Bintang Jatuh','20200721101338.jpg',375,'Erlangga','Dewi Lestari I','','','2017','Jakarta','admin','2020-08-16 21:48:10','admin','2020-08-16 04:48:10'),
(6,'Akar',4,'Akar','20200721101645.jpg',423,'Erlangga','Dewi Lestari','','','2018','Jakarta','admin','2020-07-23 05:20:50',NULL,'2020-07-23 10:20:50'),
(7,'Garis Waktu',1,'Garis Waktu','20200721104541.jpg',352,'','Fiersa Besari','','','2004','Jakarta','admin','2020-07-21 16:16:48',NULL,'2020-07-21 15:45:41'),
(8,'Konspirasi Alam Semesta',1,'Konspirasi Alam Semesta','20200721104645.jpg',350,'','Fiersa Besari','','','2008','Jakarta','admin','2020-07-21 10:46:45',NULL,'2020-07-21 15:46:45'),
(9,'Perahu Kertas',4,'Perahu Kertas','20200721104927.jpg',510,'','Dewi Lestari','','','2010','Jakarta','admin','2020-07-21 10:49:27',NULL,'2020-07-21 15:49:27'),
(10,'The Alchemist',2,'','20200721105151.jpg',210,'','Paul Coelho','','','2000','Jakarta','admin','2020-07-21 10:51:51',NULL,'2020-07-21 15:51:51');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(225) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_user` varchar(50) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`id`,`category`,`create_date`,`create_user`,`update_date`,`update_user`) values 
(1,'Fiksi','2020-07-14 09:27:05','admin','0000-00-00 00:00:00',NULL),
(2,'Non Fiksi','2020-07-14 10:26:10','admin','2020-07-14 05:26:10','admin'),
(3,'Dongeng','2020-07-14 10:07:22','admin','0000-00-00 00:00:00',NULL),
(4,'Novel','2020-07-14 10:07:23','admin','0000-00-00 00:00:00',NULL),
(5,'Biografi','2020-07-14 10:07:27','admin','0000-00-00 00:00:00',NULL),
(8,'Buku Pelajaran','2020-07-14 11:04:30','admin','2020-07-14 06:04:30','admin');

/*Table structure for table `tbl_fakultas` */

DROP TABLE IF EXISTS `tbl_fakultas`;

CREATE TABLE `tbl_fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_fakultas` */

insert  into `tbl_fakultas`(`id`,`fakultas`) values 
(1,'Fakultas Ekonomi'),
(2,'Fakultas Pendidikan Agama Islam'),
(3,'Fakultas Teknik'),
(4,'Fakultas Kesehatan'),
(5,'Fakultas Ilmu Sosial dan Pemerintahan'),
(6,'Fakultas Keguruan dan Ilmu Pendidikan');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  `submenu` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `is_main_menu` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`id`,`menu`,`submenu`,`url`,`icon`,`is_main_menu`) values 
(1,'Management User','-','user/index','team2.png',0),
(2,'Data Buku','-','buku/index','002-book.png',0),
(3,'Category','-','category/index','news.png',0),
(4,'Laporan','-','-','graph.png',0),
(5,'Laporan','Laporan Harian','daily/index','correct.png',1),
(6,'Laporan','Laporan Bulanan','monthly/index','correct.png',1),
(7,'Log Report','-','log/index','document.png',0),
(8,'Hak Akses User','-','priv/index','sun.png',0),
(9,'Management Anggota','-','anggota/index','plus1.png',0),
(10,'Pinjam Buku','-','pinjam/index','export.png',0);

/*Table structure for table `tbl_no` */

DROP TABLE IF EXISTS `tbl_no`;

CREATE TABLE `tbl_no` (
  `field` varchar(100) DEFAULT NULL,
  `no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_no` */

insert  into `tbl_no`(`field`,`no`) values 
('no_anggota','APS-2008-003'),
('no_transaksi','PERPUS2008009');

/*Table structure for table `tbl_pinjam_d` */

DROP TABLE IF EXISTS `tbl_pinjam_d`;

CREATE TABLE `tbl_pinjam_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(100) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `cat_buku` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pinjam_d` */

/*Table structure for table `tbl_pinjam_h` */

DROP TABLE IF EXISTS `tbl_pinjam_h`;

CREATE TABLE `tbl_pinjam_h` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(100) DEFAULT NULL,
  `no_anggota` varchar(100) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_denda` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pinjam_h` */

insert  into `tbl_pinjam_h`(`id`,`no_transaksi`,`no_anggota`,`tgl_pinjam`,`tgl_akhir`,`status`,`total_denda`,`create_date`,`create_user`) values 
(22,'PERPUS2008001','APS-2008-001','2020-08-18','2020-08-25',0,0,'2020-08-18 22:17:13','admin'),
(23,'PERPUS2008002','APS-2008-002','2020-08-18','2020-08-25',0,0,'2020-08-18 22:18:47','admin'),
(24,'PERPUS2008003','APS-2008-002','2020-08-18','2020-08-25',0,0,'2020-08-18 22:20:16','admin'),
(25,'PERPUS2008004','APS-2008-002','2020-08-18','2020-08-25',0,0,'2020-08-18 22:21:14','admin'),
(26,'PERPUS2008005','APS-2008-001','2020-08-18','2020-08-25',0,0,'2020-08-18 22:34:27','admin'),
(27,'PERPUS2008006','APS-2008-002','2020-08-18','2020-08-25',0,0,'2020-08-18 22:36:34','admin'),
(28,'PERPUS2008007','APS-2008-001','2020-08-18','2020-08-25',0,0,'2020-08-18 22:37:11','admin'),
(29,'PERPUS2008008','APS-2008-002','2020-08-18','2020-08-25',0,0,'2020-08-18 22:38:53','admin'),
(30,'PERPUS2008009','APS-2008-003','2020-08-18','2020-08-25',0,0,'2020-08-18 22:39:21','admin');

/*Table structure for table `tbl_prodi` */

DROP TABLE IF EXISTS `tbl_prodi`;

CREATE TABLE `tbl_prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fak` int(11) DEFAULT NULL,
  `prodi` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_prodi` */

insert  into `tbl_prodi`(`id`,`id_fak`,`prodi`) values 
(1,1,'Manajemen'),
(2,1,'Bisnis'),
(3,1,'Akuntansi'),
(4,3,'Teknik Informatika'),
(5,3,'Teknik Mesin'),
(6,3,'Teknik Industri'),
(7,3,'Teknik Sipil'),
(8,3,'Teknik Elektro');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `priv` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `img` varchar(225) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`,`nama`,`priv`,`status`,`img`,`last_login`,`create_date`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator',1,0,'',NULL,'2020-07-08 05:25:08'),
(2,'silvia','e5cb7c411f1d9a67f68deff4a954cfbc','Silvia Pajriati',1,0,'20200706055535.jpg',NULL,'2020-07-07 06:54:58'),
(3,'Iqbal','e10adc3949ba59abbe56e057f20f883e','iqbal',2,0,'',NULL,'2020-07-07 09:32:19'),
(4,'adi','7360409d967a24b667afc33a8384ec9e','Adi Lo',1,0,'',NULL,'2020-07-14 06:03:35'),
(5,'lia','a9961f25fb84c41b329ef5ee78518e0f','Lia',2,0,'',NULL,'2020-07-14 06:03:55');

/* Procedure structure for procedure `getdatabuku` */

/*!50003 DROP PROCEDURE IF EXISTS  `getdatabuku` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getdatabuku`(
	IN search text
    )
BEGIN
		SET @Param = 'SELECT a.*,b.category as cat from tbl_buku a INNER JOIN tbl_category b ON a.category=b.id';
		SET @Query = CONCAT(@Param,search);
		
		PREPARE stmt FROM @Query;
		EXECUTE stmt;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `getdatauser` */

/*!50003 DROP PROCEDURE IF EXISTS  `getdatauser` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getdatauser`()
BEGIN
	
		SELECT * from tbl_user;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `getmenu` */

/*!50003 DROP PROCEDURE IF EXISTS  `getmenu` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getmenu`()
BEGIN
	
		SELECT * FROM tbl_menu WHERE is_main_menu=0;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `getprivilege` */

/*!50003 DROP PROCEDURE IF EXISTS  `getprivilege` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getprivilege`(
	IN USER VARCHAR(50),
	IN url VARCHAR(50)
    )
BEGIN
	
		SELECT CASE WHEN jml=0 THEN 0
		WHEN STATUS=1 THEN 0
		ELSE 1 END AS priv FROM (SELECT COUNT(*) AS jml,a.status FROM tbl_access_menu a
		INNER JOIN tbl_menu b ON a.id_menu = b.id
		INNER JOIN tbl_user c ON a.id_user = c.id
		WHERE username=USER AND url=url) A ;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `savepinjambuku` */

/*!50003 DROP PROCEDURE IF EXISTS  `savepinjambuku` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `savepinjambuku`(
	IN no_transaksi VARCHAR(50),
	IN tgl date,
	IN anggota varchar(50),
	IN buku1 varchar(50),
	IN buku2 varchar(50),
	IN buku3 varchar(50),
	IN user varchar(50),
	OUT result VARCHAR(50)
    )
BEGIN
	
		DECLARE counts INT(10) DEFAULT 0;
		SELECT count(*) INTO counts FROM tbl_pinjam_d a INNER JOIN tbl_pinjam_h b ON
		a.no_transaksi=b.no_transaksi WHERE b.no_anggota=anggota AND a.status=0;
		
		
		INSERT INTO tbl_pinjam_h (no_transaksi,no_anggota,tgl_pinjam,tgl_akhir,status,total_denda,create_date,create_user)
		VALUES (no_transaksi,anggota,tgl,DATE_ADD(CURDATE(), INTERVAL 7 DAY),0,0,NOW(),user);
		
		INSERT INTO tbl_pinjam_d (no_transaksi,id_buku,cat_buku,judul,status,denda,create_date,create_user)
		select no_transaksi, a.*, user FROM (SELECT id,category,judul,0,null,NOW() FROM tbl_buku
		WHERE id IN (buku1,buku2,buku3)) a;
		
		SELECT no_transaksi INTO result;
	

	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
