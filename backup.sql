/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - reservasi_hotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reservasi_hotel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `reservasi_hotel`;

/*Table structure for table `assessments` */

DROP TABLE IF EXISTS `assessments`;

CREATE TABLE `assessments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `assessment_1` int(11) NOT NULL,
  `assessment_2` int(11) NOT NULL,
  `assessment_3` int(11) NOT NULL,
  `assessment_4` int(11) NOT NULL,
  `assessment_5` int(11) NOT NULL,
  `assessment_6` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `assessments` */

insert  into `assessments`(`id`,`assessment_1`,`assessment_2`,`assessment_3`,`assessment_4`,`assessment_5`,`assessment_6`,`total`,`created_at`,`updated_at`) values 
(1,0,0,0,0,0,0,0,'2022-07-06 16:02:50','2022-07-06 16:02:50'),
(2,0,0,0,0,0,0,0,'2022-07-06 16:12:54','2022-07-06 16:12:54'),
(3,1,0,0,0,5,5,11,'2022-08-11 12:10:51','2022-08-29 16:12:54'),
(4,0,0,0,0,0,0,0,'2022-08-11 13:37:30','2022-08-11 13:37:30'),
(5,0,0,0,0,0,0,0,'2022-09-01 13:06:29','2022-09-01 13:06:29'),
(6,0,0,0,0,0,0,0,'2022-09-06 09:06:19','2022-09-06 09:06:19'),
(7,0,0,0,0,0,0,0,'2022-09-06 09:08:18','2022-09-06 09:08:18'),
(8,0,0,0,0,0,0,0,'2022-09-06 09:08:26','2022-09-06 09:08:26'),
(9,0,0,0,0,0,0,0,'2022-09-06 09:08:42','2022-09-06 09:08:42');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `jenis_kamars` */

DROP TABLE IF EXISTS `jenis_kamars`;

CREATE TABLE `jenis_kamars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jenis_kamars` */

insert  into `jenis_kamars`(`id`,`nama`,`updated_at`,`created_at`) values 
(1,'Standard','2022-08-28 04:27:53',NULL),
(2,'Deluxe',NULL,NULL),
(3,'Suite',NULL,NULL);

/*Table structure for table `kamars` */

DROP TABLE IF EXISTS `kamars`;

CREATE TABLE `kamars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis_kamar` int(10) unsigned NOT NULL,
  `nomor_kamar` int(11) DEFAULT NULL,
  `keterangan_kamar` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kamars` */

insert  into `kamars`(`id`,`id_jenis_kamar`,`nomor_kamar`,`keterangan_kamar`,`created_at`,`updated_at`) values 
(1,3,1008,'asdjhfghasdufgkhj',NULL,'2022-08-28 05:29:57'),
(2,2,2001,NULL,NULL,NULL),
(3,3,3001,NULL,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_06_24_134637_tamus',1),
(6,'2022_06_24_134638_jenis_kamar',1),
(7,'2022_06_24_135219_kamar',1),
(8,'2022_06_24_135258_assessments',1),
(9,'2022_06_24_136640_reservasis',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `reservasis` */

DROP TABLE IF EXISTS `reservasis`;

CREATE TABLE `reservasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_tamu` int(10) unsigned NOT NULL,
  `id_kamar` int(10) unsigned NOT NULL,
  `id_assessment` int(10) unsigned DEFAULT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `total_hari_stay` int(11) NOT NULL,
  `total_dewasa` int(11) NOT NULL,
  `total_anak` int(11) NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `note_validasi` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('validating','rejected','verified') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reservasis` */

insert  into `reservasis`(`id`,`id_tamu`,`id_kamar`,`id_assessment`,`check_in`,`check_out`,`total_hari_stay`,`total_dewasa`,`total_anak`,`identity`,`note`,`note_validasi`,`status`,`created_at`,`updated_at`) values 
(14,4,3,3,'2022-08-16 00:10:00','2022-08-18 00:10:00',2,5,4,'202208291600_chronometer.png','Extra Bed asdf',NULL,'validating','2022-08-11 12:08:53','2022-08-29 16:12:54'),
(17,8,1,NULL,'2022-09-06 12:00:00','2022-09-07 12:00:00',1,1,1,'','sdfasasf',NULL,'validating','2022-09-06 09:02:41','2022-09-06 09:02:41'),
(20,8,1,NULL,'2022-09-06 00:00:00','2022-09-06 22:03:00',1,1,1,'','sdfasasf',NULL,'validating','2022-09-06 09:05:02','2022-09-06 09:05:02'),
(21,8,1,NULL,'2022-09-06 00:00:00','2022-09-06 12:05:00',1,1,1,'','sdfasasf',NULL,'validating','2022-09-06 09:05:24','2022-09-06 09:05:24'),
(22,8,1,NULL,'2022-09-06 00:00:00','2022-09-07 12:05:00',1,1,1,'','sdfasasf',NULL,'validating','2022-09-06 09:05:35','2022-09-06 09:05:35'),
(23,8,1,9,'2022-09-06 00:00:00','2022-09-08 12:05:00',2,1,1,'','sdfasasf',NULL,'validating','2022-09-06 09:05:48','2022-09-06 09:08:42');

/*Table structure for table `tamus` */

DROP TABLE IF EXISTS `tamus`;

CREATE TABLE `tamus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_grup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `is_group` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tamus` */

insert  into `tamus`(`id`,`nama_depan`,`nama_belakang`,`nama_grup`,`email`,`telepon`,`nik`,`pekerjaan`,`negara`,`kota`,`alamat`,`kode_pos`,`is_group`,`created_at`,`updated_at`) values 
(1,'Maulidi Adi','Prasetia',NULL,'disburse@foodtender.net','0890809808','12341234','Petani','Indonesia','Denpasar','Jalan Pulau Ayu No.49, Denpasar, Bali',80113,0,'2022-07-06 14:40:39','2022-08-28 07:02:44'),
(4,'Maulidi','uhuy','Aseq Squad uhuy','maulidi.adiprasetia@gmail.com','0890809808','51710111','Perompak','Indonesia','Denpasar','Jalan Pulau Ayu No.49, Denpasar, Bali',80113,0,'2022-08-11 12:07:27','2022-08-29 16:10:30'),
(6,'Maulidi Adi','Prasetia','John Doe Squad','mamank@mamank.com','0890809808','51710113','Petani','Indonesia','Denpasar','Jalan Pulau Ayu No.49, Denpasar, Bali',80113,1,'2022-08-11 13:36:02','2022-08-11 13:37:30'),
(7,'Maulidi Adi','Prasetia',NULL,'mamank@mamank.com','0890809808','517112','nelayan','Indonesia','Denpasar','Jalan Pulau Ayu No.49, Denpasar, Bali',80113,0,'2022-09-01 13:03:12','2022-09-01 13:10:10'),
(8,'Maulidi Adi','Prasetia',NULL,'mamank@yahoo.com','0890809808','5171011406000004','nelayan','Indonesia','Denpasar','Jalan Pulau Ayu No.49, Denpasar, Bali',80113,0,'2022-09-06 09:01:36','2022-09-06 09:08:42');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`profile_image`,`remember_token`,`created_at`,`updated_at`) values 
(1,'mamank','mamank@mamank.com','$2a$10$tlMV9UIB5ilYV84kSMJPEOodo0Lk7KVeuMvedlTZIWIKtqQBtF2lu',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
