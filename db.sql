/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : qd

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-11 17:31:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for q_account
-- ----------------------------
DROP TABLE IF EXISTS `q_account`;
CREATE TABLE `q_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `type` tinyint(4) unsigned NOT NULL COMMENT '分类id',
  `desc` varchar(200) DEFAULT NULL,
  `add_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='账号表';

-- ----------------------------
-- Records of q_account
-- ----------------------------
INSERT INTO `q_account` VALUES ('1', '1', '179766133', '111', '1', '11112222', '1520581390');
INSERT INTO `q_account` VALUES ('3', '1', '30024167', '111', '1', '', '1520583104');
INSERT INTO `q_account` VALUES ('2', '1', '81001985@qq.com', '11', '2', '1111', '1520581632');
INSERT INTO `q_account` VALUES ('4', '1', '81001985', '11', '1', '', '1520583933');
INSERT INTO `q_account` VALUES ('5', '1', '20043675', 'admin', '1', '', '1520612834');

-- ----------------------------
-- Table structure for q_account_cate
-- ----------------------------
DROP TABLE IF EXISTS `q_account_cate`;
CREATE TABLE `q_account_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of q_account_cate
-- ----------------------------
INSERT INTO `q_account_cate` VALUES ('1', 'QQ', '0', '1520512687');
INSERT INTO `q_account_cate` VALUES ('2', '百度', '0', '1520512701');

-- ----------------------------
-- Table structure for q_sign
-- ----------------------------
DROP TABLE IF EXISTS `q_sign`;
CREATE TABLE `q_sign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `aid` int(11) unsigned NOT NULL,
  `acate` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:未完成 1：已经完成 2:失败',
  `start_time` int(11) unsigned NOT NULL,
  `end_time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of q_sign
-- ----------------------------

-- ----------------------------
-- Table structure for q_user
-- ----------------------------
DROP TABLE IF EXISTS `q_user`;
CREATE TABLE `q_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `username` varchar(16) NOT NULL COMMENT '账号',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `phone` int(12) unsigned DEFAULT NULL,
  `password` varchar(32) NOT NULL COMMENT '密码',
  `point` int(11) unsigned NOT NULL COMMENT '0',
  `qq` int(11) unsigned DEFAULT NULL,
  `add_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of q_user
-- ----------------------------
INSERT INTO `q_user` VALUES ('1', '布尔', 'bool', '30024167@qq.com', '4294967295', '21232f297a57a5a743894a0e4a801fc3', '985', '81001985', '1520512701');
