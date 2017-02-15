CREATE DATABASE IF NOT EXISTS `shopImooc`;
USE `shopImooc`;
-- 管理员表
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
`id` TINYINT(3) AUTO_INCREMENT KEY,
`username` VARCHAR(20) UNIQUE NOT NULL,
`password` CHAR(30) NOT NULL,
`email` VARCHAR(50) NOT NULL
);

-- 分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
`id` smallint(5) unsigned auto_increment key,
`cName` varchar(50) not null
);

-- 商品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
`id` int(10) unsigned auto_increment key,
`pName` varchar(255) not null unique,
`pSn` varchar(50) not null,
`pNum` int(10) unsigned default 1,
`mPrice` decimal(10,2) not null,
`iPrice` decimal(10,2) not null,
`pDesc` text,
`pImg` varchar(50) not null,
`pubTime` int(10) unsigned not null,
`isShow` tinyint(1) default 1,
`isHot` tinyint(1) default 0,
`cId` smallint(5) not null
);

-- 用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
`id` int(10) unsigned auto_increment key,
`username` varchar(20) unique not null,
`password` varchar(32) not null,
`sex` enum("男","女","保密") not null default "保密",
`face` varchar(50) not null ,
`regTime` int unsigned not null
);

-- 相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
`id` int(10) unsigned auto_increment key,
`pid` int(10) unsigned not null,
`albumPath` varchar(50) not null
);











