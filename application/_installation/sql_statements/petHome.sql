/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50610
Source Host           : localhost:3306
Source Database       : petbaby

Target Server Type    : MYSQL
Target Server Version : 50610
File Encoding         : 65001

Date: 2013-12-29 23:26:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `petbaseinfo`
-- ----------------------------
DROP TABLE IF EXISTS `petbaseinfo`;
CREATE TABLE `petbaseinfo` (
  `pet_id` char(64) NOT NULL COMMENT '主键',
  `pet_fullName` varchar(64) NOT NULL COMMENT '宠物全名',
  `pet_type` tinyint(4) DEFAULT NULL COMMENT '宠物类型，如：狗，猫',
  `pet_origin` varchar(64) DEFAULT NULL COMMENT '原产地',
  `pet_alias` varchar(64) DEFAULT NULL COMMENT '别名',
  `pet_englishName` varchar(64) DEFAULT NULL COMMENT '英文名',
  `pet_weight` varchar(32) DEFAULT NULL COMMENT '体重',
  `pet_life` varchar(32) DEFAULT NULL COMMENT '寿命',
  `pet_train` tinyint(4) DEFAULT NULL COMMENT '是否容易训练',
  `pet_guard` tinyint(4) DEFAULT NULL COMMENT '是否能看家',
  `pet_speciality` varchar(256) DEFAULT NULL COMMENT '性格特长',
  `pet_lossHair` tinyint(4) DEFAULT NULL COMMENT '容易掉头发',
  `pet_smelly` tinyint(4) DEFAULT NULL COMMENT '是否体味',
  `pet_height_man` varchar(32) DEFAULT NULL COMMENT '雄性身高',
  `pet_height_women` varchar(32) DEFAULT NULL COMMENT '雌性身高',
  `pet_somatotype` varchar(32) DEFAULT NULL COMMENT '体型',
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of petbasetinfo
-- ----------------------------

-- ----------------------------
-- Table structure for `petextendinfo`
-- ----------------------------
DROP TABLE IF EXISTS `petextendinfo`;
CREATE TABLE `petextendinfo` (
  `pet_id` char(64) NOT NULL,
  `petExtend_dailyCare` varchar(1024) DEFAULT NULL COMMENT '日常护理',
  `petExtend_trainGuide` varchar(1024) DEFAULT NULL COMMENT '训练指南',
  `petExtend_feedPattern` varchar(1024) DEFAULT NULL COMMENT '喂养方式',
  `petExtend_suggest` varchar(1024) DEFAULT NULL COMMENT '购买建议',
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of petextendinfo
-- ----------------------------
