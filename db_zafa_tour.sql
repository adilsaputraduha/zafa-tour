/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - db_zafa_tour
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_zafa_tour` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_zafa_tour`;

/*Table structure for table `tb_booking` */

DROP TABLE IF EXISTS `tb_booking`;

CREATE TABLE `tb_booking` (
  `booking_nomor` char(20) NOT NULL,
  `booking_tanggal` date DEFAULT NULL,
  `booking_peserta` int(11) DEFAULT NULL,
  `booking_paket` int(11) DEFAULT NULL,
  `booking_status` int(11) DEFAULT NULL,
  `booking_jenis` int(11) DEFAULT NULL,
  `booking_jumlah` int(11) DEFAULT NULL,
  `booking_total` int(11) DEFAULT NULL,
  `booking_document` int(11) DEFAULT 0,
  `booking_metode` int(11) DEFAULT NULL,
  `booking_tenor` int(11) DEFAULT NULL,
  `booking_isverif` int(11) DEFAULT NULL,
  `booking_cicilanke` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_booking` */

insert  into `tb_booking`(`booking_nomor`,`booking_tanggal`,`booking_peserta`,`booking_paket`,`booking_status`,`booking_jenis`,`booking_jumlah`,`booking_total`,`booking_document`,`booking_metode`,`booking_tenor`,`booking_isverif`,`booking_cicilanke`) values 
('FP-20221216-955','2022-12-16',6,1,9,1,3,8100000,1,0,1,1,0);

/*Table structure for table `tb_contact` */

DROP TABLE IF EXISTS `tb_contact`;

CREATE TABLE `tb_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_nama` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_subject` varchar(255) DEFAULT NULL,
  `contact_phone_number` varchar(255) DEFAULT NULL,
  `contact_message` varchar(255) DEFAULT NULL,
  `contact_created` datetime DEFAULT NULL,
  `contact_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_contact` */

insert  into `tb_contact`(`contact_id`,`contact_nama`,`contact_email`,`contact_subject`,`contact_phone_number`,`contact_message`,`contact_created`,`contact_status`) values 
(1,'Jhon','jhondoe@gmail.com','Cara Order Di Zafa Tour','082174974834','Saya ingin bertanya kepada admin Zafa Tour, saya tidak tau cara order di website, bisa bantu dijelaskan?','2022-10-30 09:41:15',1),
(2,'Doe','doejhon@gmail.com','Lowongan','082149249271','Ada lowongan kerja Software Engineer gak admin?','2022-10-30 00:19:13',0),
(3,'Stella','stella@gmail.com','Website Error','08239249824','Hallo admin, website error ketika melakukan transaksi pemesanan, tolong diperbaiki segera ya','2022-10-30 12:22:16',0);

/*Table structure for table `tb_detail_fasilitas` */

DROP TABLE IF EXISTS `tb_detail_fasilitas`;

CREATE TABLE `tb_detail_fasilitas` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_paket` int(11) DEFAULT NULL,
  `detail_fasilitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_fasilitas` */

insert  into `tb_detail_fasilitas`(`detail_id`,`detail_paket`,`detail_fasilitas`) values 
(4,210,1),
(5,210,2),
(6,210,3),
(7,210,4),
(8,210,5),
(9,210,6),
(10,210,7),
(11,101,1),
(12,609,1),
(13,609,2),
(14,609,3),
(15,319,1),
(16,319,2),
(17,753,1);

/*Table structure for table `tb_detail_syarat` */

DROP TABLE IF EXISTS `tb_detail_syarat`;

CREATE TABLE `tb_detail_syarat` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_paket` int(11) DEFAULT NULL,
  `detail_syarat` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_detail_syarat` */

insert  into `tb_detail_syarat`(`detail_id`,`detail_paket`,`detail_syarat`) values 
(3,210,1),
(4,210,2),
(5,609,1),
(6,609,2),
(7,319,2),
(8,753,1);

/*Table structure for table `tb_document` */

DROP TABLE IF EXISTS `tb_document`;

CREATE TABLE `tb_document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_booking` char(20) DEFAULT NULL,
  `document_nik` varchar(255) DEFAULT NULL,
  `document_nama` varchar(255) DEFAULT NULL,
  `document_alamat` varchar(255) DEFAULT NULL,
  `document_tempat_lahir` varchar(255) DEFAULT NULL,
  `document_tgl_lahir` date DEFAULT NULL,
  `document_notelp` varchar(255) DEFAULT NULL,
  `document_kelamin` int(11) DEFAULT NULL,
  `document_no_paspor` varchar(255) DEFAULT NULL,
  `document_tgl_berlaku` date DEFAULT NULL,
  `document_foto_ktp` varchar(255) DEFAULT NULL,
  `document_foto_paspor` varchar(255) DEFAULT NULL,
  `document_peserta` int(11) DEFAULT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_document` */

insert  into `tb_document`(`document_id`,`document_booking`,`document_nik`,`document_nama`,`document_alamat`,`document_tempat_lahir`,`document_tgl_lahir`,`document_notelp`,`document_kelamin`,`document_no_paspor`,`document_tgl_berlaku`,`document_foto_ktp`,`document_foto_paspor`,`document_peserta`) values 
(11,'FP-20221216-955','1234567891234567','Adil','Jalan Padang','Padang','2001-02-28','95935938593',1,'242242','2022-12-16','1671202449_98237f521d67998a5dee.png','1671202449_131ae2861034131f75b6.png',1),
(12,'FP-20221216-955','1234567891234567','Saputra','Jalan Padang','Padang','2001-02-14','02850285985',1,'5535353','2022-12-16','1671202513_bbd05efc779980997009.png','1671202513_d86a219639ba94c695a5.png',2),
(13,'FP-20221216-955','1234567891234567','Saputra 2','Jalan Padang','Padang','2001-02-14','02850285985',1,'5535353','2022-12-16','1671202513_bbd05efc779980997009.png','1671202513_d86a219639ba94c695a5.png',3);

/*Table structure for table `tb_faq` */

DROP TABLE IF EXISTS `tb_faq`;

CREATE TABLE `tb_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(255) DEFAULT NULL,
  `faq_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_faq` */

insert  into `tb_faq`(`faq_id`,`faq_title`,`faq_description`) values 
(1,'Apa itu Zafa Tour','Zafa Tour merupakan biro perjalanan haji dan umroh yang bernaung di bawah PT. Zafa Mulia Mandiri yang resmi terdaftar sebagai penyelenggara perjalanan ibadah umroh dari Kementrian Agama RI berdasarkan SK Menteri Agama RI Nomor 678 Tahun 2017.'),
(2,'Bagaimana cara melakukan order di Zafa Tour?','Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(3,'Bagaimana cara mendapatkan update dari Zafa Tour?','Kamu bisa mendapatkan informasi atau berita terbaru dari Zafa Tour melalui email kamu dengan cara menginputkan email kamu pada menu contact dibawah website ini.'),
(4,'Bagaimana melaporkan keluhan kepada Zafa Tour?','Kamu dapat melaporkan segala bentuk keluhan, kritik dan saran melalui form contact yang dapat dilihat pada bagian bawah website ini.'),
(5,'Bagaimana saya dapat menghubungi Zafa Tour?','Kamu dapat menghubungi Zafa Tour melalui nomor whatsapp, instagram resmi, dan facebook resmi milik Zafa Tour.');

/*Table structure for table `tb_fasilitas` */

DROP TABLE IF EXISTS `tb_fasilitas`;

CREATE TABLE `tb_fasilitas` (
  `fasilitas_id` int(11) NOT NULL AUTO_INCREMENT,
  `fasilitas_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fasilitas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_fasilitas` */

insert  into `tb_fasilitas`(`fasilitas_id`,`fasilitas_nama`) values 
(1,'Visa Umroh'),
(2,'Kain Seragam'),
(3,'Tas Passport'),
(4,'ID Card'),
(5,'Buku Manasik'),
(6,'Mukena dan Bergo (Jamaah Perempuan)'),
(7,'Bus AC');

/*Table structure for table `tb_paket` */

DROP TABLE IF EXISTS `tb_paket`;

CREATE TABLE `tb_paket` (
  `paket_id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_nama` varchar(255) DEFAULT NULL,
  `paket_deskripsi` varchar(255) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL,
  `paket_tgl_mulai` date DEFAULT NULL,
  `paket_tgl_selesai` date DEFAULT NULL,
  `paket_kuota` int(11) DEFAULT NULL,
  `paket_session` int(11) DEFAULT NULL,
  PRIMARY KEY (`paket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_paket` */

insert  into `tb_paket`(`paket_id`,`paket_nama`,`paket_deskripsi`,`paket_harga`,`paket_tgl_mulai`,`paket_tgl_selesai`,`paket_kuota`,`paket_session`) values 
(1,'Paket Hemat Banget','Paket Hemat adalah paket untuk perjalanan umroh anda yang ramah dikantong namun mendapatkan fasilitas yang mewah.',2700000,'2023-03-01','2023-04-28',100,210),
(4,'Paket Maret','Lorem ipsum',10000,'2023-06-14','2023-10-03',100,753);

/*Table structure for table `tb_pembayaran` */

DROP TABLE IF EXISTS `tb_pembayaran`;

CREATE TABLE `tb_pembayaran` (
  `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembayaran_nomor` char(20) DEFAULT NULL,
  `pembayaran_tanggal` date DEFAULT NULL,
  `pembayaran_bukti` varchar(255) DEFAULT NULL,
  `pembayaran_bayar` int(11) DEFAULT NULL,
  `pembayaran_isverif` int(11) DEFAULT NULL,
  `pembayaran_tenor` int(11) DEFAULT NULL,
  PRIMARY KEY (`pembayaran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pembayaran` */

insert  into `tb_pembayaran`(`pembayaran_id`,`pembayaran_nomor`,`pembayaran_tanggal`,`pembayaran_bukti`,`pembayaran_bayar`,`pembayaran_isverif`,`pembayaran_tenor`) values 
(32,'FP-20221216-955','2022-12-16','1671202196_114f7a2c99805817f78a.png',0,1,NULL),
(33,'FP-20221216-955','2022-12-16','1671202245_5322a98ba66fc4234a58.png',1,1,NULL);

/*Table structure for table `tb_peserta` */

DROP TABLE IF EXISTS `tb_peserta`;

CREATE TABLE `tb_peserta` (
  `peserta_id` int(11) NOT NULL AUTO_INCREMENT,
  `peserta_nama` varchar(255) DEFAULT NULL,
  `peserta_email` varchar(255) DEFAULT NULL,
  `peserta_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`peserta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_peserta` */

insert  into `tb_peserta`(`peserta_id`,`peserta_nama`,`peserta_email`,`peserta_password`) values 
(1,'Peserta Satu','pesertasatu@gmail.com','$2a$12$F22fNRCH/iqs2sBG32aIh.ouWlCLh61ZS8gCYjFlQ9lKZ/5ETy5VO'),
(2,'Peserta Dua','pesertadua@gmail.com','$2y$10$sMjCi2PQQV/UOVy6n7VxJeFrpSnD6j1LN2KD21ybRW2FQZY7zELom'),
(3,'Peserta Tiga','pesertatiga@gmail.com','$2y$10$fOV3sV/epVtLhtbwhC0R/OrN4sX5G9qGCtEVKv1Kt01KRxJHkJNCS'),
(4,'Peserta Empat','pesertaempat@gmail.com','$2y$10$zg3gGvqd/lHw8xuAbDNVK..DEQVdgHJM/OHaVyC0Ul1XATkqpafju'),
(6,'Adil Saputra','adilsaputra@gmail.com','$2y$10$PpWnqb6ZHQnRWEStp0gftex6aLqqvrHCXcwVxsmJMdxIwe01KFsrG');

/*Table structure for table `tb_syarat` */

DROP TABLE IF EXISTS `tb_syarat`;

CREATE TABLE `tb_syarat` (
  `syarat_id` int(11) NOT NULL AUTO_INCREMENT,
  `syarat_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`syarat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_syarat` */

insert  into `tb_syarat`(`syarat_id`,`syarat_nama`) values 
(1,'Kartu Tanda Penduduk (KTP)'),
(2,'Kartu Vaksin Booster');

/*Table structure for table `tb_testimonial` */

DROP TABLE IF EXISTS `tb_testimonial`;

CREATE TABLE `tb_testimonial` (
  `testi_id` int(11) NOT NULL AUTO_INCREMENT,
  `testi_name` varchar(255) DEFAULT NULL,
  `testi_jobs` varchar(255) DEFAULT NULL,
  `testi_title` varchar(255) DEFAULT NULL,
  `testi_message` varchar(255) DEFAULT NULL,
  `testi_star` int(11) DEFAULT NULL,
  PRIMARY KEY (`testi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_testimonial` */

insert  into `tb_testimonial`(`testi_id`,`testi_name`,`testi_jobs`,`testi_title`,`testi_message`,`testi_star`) values 
(1,'Indra Kusuma','PNS','Aplikasi Keren','Terima kasih Zafa Tour yang telah menemani perjalanan saya ke tanah suci. Adminnya ramah dan aplikasinya keren.',4);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`user_email`,`user_name`,`user_password`,`user_level`) values 
(1,'superadmin@gmail.com','Super Admin','$2a$12$F22fNRCH/iqs2sBG32aIh.ouWlCLh61ZS8gCYjFlQ9lKZ/5ETy5VO','0'),
(2,'pimpinanzafa@gmail.com','Pimpinan Zafa','$2y$10$322C8VA0K43mqQTpW/qTKO9lgZdc/uA9EECx1KIsN/0t5pyqu1TUK','2');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
