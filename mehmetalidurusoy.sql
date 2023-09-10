-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Ağu 2023, 19:05:40
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mehmetalidurusoy`
--

-- --------------------------------------------------------


-- Tablo Adı: alan_degerler
-- Satır Sayısı: 0

CREATE TABLE `alan_degerler` (
  `deger_id` int(11) NOT NULL AUTO_INCREMENT,
  `deger_alan_id` int(11) NOT NULL,
  `deger_konu_id` int(11) NOT NULL,
  `deger_icerik` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`deger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


-- Tablo Adı: ayarlar
-- Satır Sayısı: 8

CREATE TABLE `ayarlar` (
  `ayar_id` int(11) NOT NULL AUTO_INCREMENT,
  `ayar_baslik` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_deger` text COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`ayar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


INSERT INTO `ayarlar` (`ayar_id`,`ayar_baslik`,`ayar_deger`) VALUES 
('1','panel_tema','bjk-tr'),
('2','site_tema','blogix'),
('3','site_favicon','192x192.png'),
('4','site_logo',''),
('5','ustalan_kodu',''),
('6','govde_kodu',''),
('7','altalan_kodu',''),
('9','panel_bilgiler','{\"panel_dil\":\"tr\",\"panel_dir\":\"ltr\",\"panel_seo\":\"kapali\"}');




-- Tablo Adı: icerikler
-- Satır Sayısı: 1

CREATE TABLE `icerikler` (
  `icerik_id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik_baslik` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_link` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_tip` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_desc` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_keyw` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_govde` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `icerik_kategori` int(11) DEFAULT NULL,
  `icerik_ekleyen` int(11) DEFAULT NULL,
  `icerik_resim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `icerik_hit` int(11) NOT NULL DEFAULT '0',
  `icerik_durum` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'beklemede',
  `icerik_etiket` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `icerik_anasayfa` int(11) NOT NULL DEFAULT '1',
  `icerik_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icerik_silinme_tarihi` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`icerik_id`),
  KEY `icerik_ekleyen` (`icerik_ekleyen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


INSERT INTO `icerikler` (`icerik_id`,`icerik_baslik`,`icerik_link`,`icerik_tip`,`icerik_desc`,`icerik_keyw`,`icerik_govde`,`icerik_kategori`,`icerik_ekleyen`,`icerik_resim`,`icerik_hit`,`icerik_durum`,`icerik_etiket`,`icerik_anasayfa`,`icerik_tarih`,`icerik_silinme_tarihi`) VALUES 
('1','Deneme','deneme','konu','dsadasdasdasdasdddasddsadasdasas','55757545454545454545454554545454545','5454545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtext <!--[anasayfa_devami_bol]--!>\r\n54545icerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454545454554545454545icerik_govdelongtexticerik_keywlongtext55757545454545454fsd','','','','0','beklemede','','1','2023-07-27 09:10:29','');




-- Tablo Adı: ilave_alanlar
-- Satır Sayısı: 0

CREATE TABLE `ilave_alanlar` (
  `alan_id` int(11) NOT NULL AUTO_INCREMENT,
  `alan_adi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `alan_tip` int(11) NOT NULL,
  PRIMARY KEY (`alan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


-- Tablo Adı: kategoriler
-- Satır Sayısı: 1

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_tip` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'konu',
  `kategori_baslik` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_link` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_aciklama` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_anahtarkelimeler` mediumtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_anasayfa_konu` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_full_konu` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kategori_ustid` int(11) NOT NULL,
  `kategori_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


INSERT INTO `kategoriler` (`kategori_id`,`kategori_tip`,`kategori_baslik`,`kategori_link`,`kategori_aciklama`,`kategori_anahtarkelimeler`,`kategori_anasayfa_konu`,`kategori_full_konu`,`kategori_ustid`,`kategori_tarih`) VALUES 
('1','konu','Genel','genel','','','','','0','2023-06-25 19:08:53');




-- Tablo Adı: uyeler
-- Satır Sayısı: 3

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_kadi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_link` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_sifre` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_ad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_soyad` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_eposta` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_avatar` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_website` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_hakkinda` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_rutbe` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'uye',
  `uye_cikti_durumu` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '[kadi]',
  `uye_ip` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_durum` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


INSERT INTO `uyeler` (`uye_id`,`uye_kadi`,`uye_link`,`uye_sifre`,`uye_ad`,`uye_soyad`,`uye_eposta`,`uye_avatar`,`uye_website`,`uye_hakkinda`,`uye_rutbe`,`uye_cikti_durumu`,`uye_ip`,`uye_tarih`,`uye_durum`) VALUES 
('1','mehmetalidurusoy','mehmetalidurusoy','e5d98fcc69d0b6c92b0312c6d8ad30100ef4bff8','Mehmet Ali','Durusoy','aluwistv12@gmail.com','[sistem].jpg','http://mehmetalidurusoy.unaux.com','s','yonetici','[adi] [soyadi]','::1','2023-08-09 06:52:19','1'),
('2','admin','admin','415aba2386238f1852f7c6058f1e06ea','','','admin@localhost.com','','','','uye','[kadi]','::1','2023-08-17 05:13:50','1'),
('3','benimblog','benimblog','$2y$10$OKM37L9wSC1BLSW6VhFDV.qr1hTLrPvyKTmzYkUIBXYpUH6WP2w5G','','','deneme@jaguar.com','','','','uye','[kadi]','::1','2023-08-17 05:14:34','0');




-- Tablo Adı: yorumlar
-- Satır Sayısı: 0

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_konu_id` int(11) NOT NULL,
  `yorum_ekleyen` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_eposta` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_mesaj` longtext COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_ip_adresi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yorum_ust` int(11) NOT NULL DEFAULT '0',
  `yorum_durum` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'yorum_onaylidegil',
  `yorum_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`yorum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;


