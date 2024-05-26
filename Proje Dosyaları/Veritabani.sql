CREATE DATABASE `web_tabanli_programlama_proje_odevi` DEFAULT CHARACTER SET utf8 COLLATE 
utf8_turkish_ci; 

USE `web_tabanli_programlama_proje_odevi`; 

CREATE TABLE `kullanicilar` 
  ( 
     `kullanici_id` INT(11) NOT NULL auto_increment, 
     `kullaniciadi` VARCHAR(255) NOT NULL, 
     `eposta`       VARCHAR(255) NOT NULL, 
     `sifre`        VARCHAR(255) NOT NULL, 
     PRIMARY KEY (`kullanici_id`) 
  ); 

CREATE TABLE `mangalar` 
  ( 
     `manga_id`        INT(11) NOT NULL auto_increment, 
     `ad`              VARCHAR(255) NOT NULL, 
     `tur`             VARCHAR(255) NOT NULL, 
     `puanlama`        VARCHAR(255) NOT NULL, 
     `yayinlanma_yili` VARCHAR(255) NOT NULL, 
     `bitti`           VARCHAR(12) NOT NULL, 
     PRIMARY KEY (`manga_id`) 
  ); 

INSERT INTO `mangalar` (ad, tur, puanlama, yayinlanma_yili, bitti)
VALUES 
('Jujutsu Kaisen', 'Aksiyon', '5', '2018', 'Devam Ediyor');

INSERT INTO `mangalar` (ad, tur, puanlama, yayinlanma_yili, bitti)
VALUES 
('Chainsaw Man', 'Aksiyon', '5', '2018', 'Devam Ediyor');

INSERT INTO `mangalar` (ad, tur, puanlama, yayinlanma_yili, bitti)
VALUES 
('Attack On Titan', 'Aksiyon', '5', '2010', 'Bitti');