/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : mcr

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-05-22 10:59:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_black`
-- ----------------------------
DROP TABLE IF EXISTS `t_black`;
CREATE TABLE `t_black` (
  `blackid` int(11) NOT NULL auto_increment,
  `blackname` char(4) default NULL,
  PRIMARY KEY  (`blackid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_black
-- ----------------------------
INSERT INTO `t_black` VALUES ('1', '有');
INSERT INTO `t_black` VALUES ('2', '无');

-- ----------------------------
-- Table structure for `t_blue`
-- ----------------------------
DROP TABLE IF EXISTS `t_blue`;
CREATE TABLE `t_blue` (
  `blueid` int(11) NOT NULL auto_increment,
  `blueName` char(10) default NULL,
  PRIMARY KEY  (`blueid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_blue
-- ----------------------------
INSERT INTO `t_blue` VALUES ('1', '全蓝');
INSERT INTO `t_blue` VALUES ('2', '部分');
INSERT INTO `t_blue` VALUES ('3', '个别');
INSERT INTO `t_blue` VALUES ('4', '无蓝变');
INSERT INTO `t_blue` VALUES ('5', '其它');

-- ----------------------------
-- Table structure for `t_buy`
-- ----------------------------
DROP TABLE IF EXISTS `t_buy`;
CREATE TABLE `t_buy` (
  `buyid` int(11) NOT NULL auto_increment,
  `userid` int(11) default NULL,
  `portid` int(11) default NULL,
  `title` varchar(30) default NULL,
  `content` varchar(100) default NULL,
  `updatetime` datetime default NULL,
  `kindid` int(11) default NULL,
  `stuffid` int(11) default NULL,
  `price` int(11) default NULL,
  PRIMARY KEY  (`buyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_buy
-- ----------------------------
INSERT INTO `t_buy` VALUES ('1', '2', '1', '材料载歌载舞玩酷地', '霸天天有不测风云载歌载舞', '2015-05-17 18:03:37', '1', '1', null);
INSERT INTO `t_buy` VALUES ('2', '4', '3', '156975668853336666', 'Dgjhbbghhhjjjffg', '2015-05-18 11:06:36', '3', '6', null);
INSERT INTO `t_buy` VALUES ('3', '4', '1', 'Etygghjk', 'Dhjjnbhiokj', '2015-05-18 18:32:56', '1', '1', '12');

-- ----------------------------
-- Table structure for `t_climb`
-- ----------------------------
DROP TABLE IF EXISTS `t_climb`;
CREATE TABLE `t_climb` (
  `climbid` int(11) NOT NULL auto_increment,
  `climbName` char(10) default NULL,
  PRIMARY KEY  (`climbid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_climb
-- ----------------------------
INSERT INTO `t_climb` VALUES ('1', '部分');
INSERT INTO `t_climb` VALUES ('2', '个别');
INSERT INTO `t_climb` VALUES ('3', '四面见线');
INSERT INTO `t_climb` VALUES ('4', '其它');

-- ----------------------------
-- Table structure for `t_decay`
-- ----------------------------
DROP TABLE IF EXISTS `t_decay`;
CREATE TABLE `t_decay` (
  `decayid` int(11) NOT NULL auto_increment,
  `decayName` char(10) default NULL,
  PRIMARY KEY  (`decayid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_decay
-- ----------------------------
INSERT INTO `t_decay` VALUES ('1', '部分');
INSERT INTO `t_decay` VALUES ('2', '个别');
INSERT INTO `t_decay` VALUES ('3', '无腐朽');
INSERT INTO `t_decay` VALUES ('4', '其它');

-- ----------------------------
-- Table structure for `t_device`
-- ----------------------------
DROP TABLE IF EXISTS `t_device`;
CREATE TABLE `t_device` (
  `deviceid` int(11) NOT NULL auto_increment,
  `deviceName` char(20) default NULL,
  PRIMARY KEY  (`deviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_device
-- ----------------------------
INSERT INTO `t_device` VALUES ('1', '普通带锯');
INSERT INTO `t_device` VALUES ('2', '俄罗斯据');
INSERT INTO `t_device` VALUES ('3', '多片锯');
INSERT INTO `t_device` VALUES ('4', '其它');

-- ----------------------------
-- Table structure for `t_dry`
-- ----------------------------
DROP TABLE IF EXISTS `t_dry`;
CREATE TABLE `t_dry` (
  `dryid` int(11) NOT NULL auto_increment,
  `dryname` char(2) default NULL,
  PRIMARY KEY  (`dryid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_dry
-- ----------------------------
INSERT INTO `t_dry` VALUES ('1', '是');
INSERT INTO `t_dry` VALUES ('2', '否');

-- ----------------------------
-- Table structure for `t_dump`
-- ----------------------------
DROP TABLE IF EXISTS `t_dump`;
CREATE TABLE `t_dump` (
  `dumpid` int(11) NOT NULL auto_increment,
  `portid` int(11) NOT NULL,
  `dumpName` char(20) default NULL,
  PRIMARY KEY  (`dumpid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_dump
-- ----------------------------
INSERT INTO `t_dump` VALUES ('1', '1', '满1号货场');
INSERT INTO `t_dump` VALUES ('2', '1', '满2号货场');

-- ----------------------------
-- Table structure for `t_dumpposition`
-- ----------------------------
DROP TABLE IF EXISTS `t_dumpposition`;
CREATE TABLE `t_dumpposition` (
  `positionid` int(11) NOT NULL auto_increment,
  `portid` int(11) default NULL,
  `position` varchar(20) default NULL,
  `ordervalue` int(11) default NULL,
  PRIMARY KEY  (`positionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_dumpposition
-- ----------------------------

-- ----------------------------
-- Table structure for `t_enterposition`
-- ----------------------------
DROP TABLE IF EXISTS `t_enterposition`;
CREATE TABLE `t_enterposition` (
  `enterpositionid` int(11) NOT NULL auto_increment,
  `portid` int(11) default NULL,
  `enterPositionName` char(30) default NULL,
  PRIMARY KEY  (`enterpositionid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_enterposition
-- ----------------------------
INSERT INTO `t_enterposition` VALUES ('1', '1', '满口岸');

-- ----------------------------
-- Table structure for `t_field`
-- ----------------------------
DROP TABLE IF EXISTS `t_field`;
CREATE TABLE `t_field` (
  `fieldid` int(11) NOT NULL default '0',
  `fieldname` varchar(10) default NULL,
  `introduce` varchar(20) default NULL,
  `score` int(11) default NULL,
  PRIMARY KEY  (`fieldid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_field
-- ----------------------------

-- ----------------------------
-- Table structure for `t_fieldrecord`
-- ----------------------------
DROP TABLE IF EXISTS `t_fieldrecord`;
CREATE TABLE `t_fieldrecord` (
  `recordid` int(11) NOT NULL default '0',
  `productid` int(11) default NULL,
  `fieldname` varchar(10) default NULL,
  `userid` int(11) default NULL,
  `updatetime` timestamp NULL default NULL on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`recordid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_fieldrecord
-- ----------------------------

-- ----------------------------
-- Table structure for `t_from`
-- ----------------------------
DROP TABLE IF EXISTS `t_from`;
CREATE TABLE `t_from` (
  `fromid` int(11) NOT NULL default '0',
  `fromName` char(20) default NULL,
  PRIMARY KEY  (`fromid`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_from
-- ----------------------------
INSERT INTO `t_from` VALUES ('1', '克拉斯诺');
INSERT INTO `t_from` VALUES ('2', '嘎拉布拉');
INSERT INTO `t_from` VALUES ('3', '伊尔库');
INSERT INTO `t_from` VALUES ('4', '济码');
INSERT INTO `t_from` VALUES ('5', '布拉斯克');
INSERT INTO `t_from` VALUES ('6', '乌兰乌德');
INSERT INTO `t_from` VALUES ('7', '彼得');
INSERT INTO `t_from` VALUES ('8', '其它');

-- ----------------------------
-- Table structure for `t_goodposition`
-- ----------------------------
DROP TABLE IF EXISTS `t_goodposition`;
CREATE TABLE `t_goodposition` (
  `goodPositionId` int(11) NOT NULL auto_increment,
  `packid` int(11) NOT NULL,
  `goodPositionName` char(255) default NULL,
  PRIMARY KEY  (`goodPositionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_goodposition
-- ----------------------------
INSERT INTO `t_goodposition` VALUES ('1', '1', '01');
INSERT INTO `t_goodposition` VALUES ('2', '1', '02');

-- ----------------------------
-- Table structure for `t_goodstatus`
-- ----------------------------
DROP TABLE IF EXISTS `t_goodstatus`;
CREATE TABLE `t_goodstatus` (
  `goodStatusid` int(11) NOT NULL,
  `goodstatusName` char(20) default NULL,
  PRIMARY KEY  (`goodStatusid`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_goodstatus
-- ----------------------------
INSERT INTO `t_goodstatus` VALUES ('0', '装车');
INSERT INTO `t_goodstatus` VALUES ('1', '入关');
INSERT INTO `t_goodstatus` VALUES ('2', '暂停线');
INSERT INTO `t_goodstatus` VALUES ('3', '货场');
INSERT INTO `t_goodstatus` VALUES ('4', '完成销售');
INSERT INTO `t_goodstatus` VALUES ('5', '转入待售');

-- ----------------------------
-- Table structure for `t_kind`
-- ----------------------------
DROP TABLE IF EXISTS `t_kind`;
CREATE TABLE `t_kind` (
  `kindid` int(11) NOT NULL auto_increment,
  `kindName` char(10) NOT NULL,
  PRIMARY KEY  (`kindid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_kind
-- ----------------------------
INSERT INTO `t_kind` VALUES ('1', '原木');
INSERT INTO `t_kind` VALUES ('2', '条子');
INSERT INTO `t_kind` VALUES ('3', '口料');
INSERT INTO `t_kind` VALUES ('4', '大方');
INSERT INTO `t_kind` VALUES ('5', '大板');
INSERT INTO `t_kind` VALUES ('6', '防腐材');

-- ----------------------------
-- Table structure for `t_knob`
-- ----------------------------
DROP TABLE IF EXISTS `t_knob`;
CREATE TABLE `t_knob` (
  `knobid` int(11) NOT NULL auto_increment,
  `knobName` char(10) default NULL,
  PRIMARY KEY  (`knobid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_knob
-- ----------------------------
INSERT INTO `t_knob` VALUES ('1', '大节');
INSERT INTO `t_knob` VALUES ('2', '正常');
INSERT INTO `t_knob` VALUES ('3', '小节');
INSERT INTO `t_knob` VALUES ('4', '无节');
INSERT INTO `t_knob` VALUES ('5', '其它');

-- ----------------------------
-- Table structure for `t_newold`
-- ----------------------------
DROP TABLE IF EXISTS `t_newold`;
CREATE TABLE `t_newold` (
  `newoldid` int(11) NOT NULL auto_increment,
  `newoldName` char(10) default NULL,
  PRIMARY KEY  (`newoldid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_newold
-- ----------------------------
INSERT INTO `t_newold` VALUES ('1', '旧材');
INSERT INTO `t_newold` VALUES ('2', '部分发黑');
INSERT INTO `t_newold` VALUES ('3', '新材');

-- ----------------------------
-- Table structure for `t_oil`
-- ----------------------------
DROP TABLE IF EXISTS `t_oil`;
CREATE TABLE `t_oil` (
  `oilid` int(11) NOT NULL auto_increment,
  `oilname` char(255) default NULL,
  PRIMARY KEY  (`oilid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_oil
-- ----------------------------
INSERT INTO `t_oil` VALUES ('1', '有');
INSERT INTO `t_oil` VALUES ('2', '无');

-- ----------------------------
-- Table structure for `t_pack`
-- ----------------------------
DROP TABLE IF EXISTS `t_pack`;
CREATE TABLE `t_pack` (
  `packid` int(11) NOT NULL auto_increment,
  `dumpid` int(11) NOT NULL,
  `packName` char(20) default NULL,
  PRIMARY KEY  (`packid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_pack
-- ----------------------------
INSERT INTO `t_pack` VALUES ('1', '1', '1号装卸线');
INSERT INTO `t_pack` VALUES ('2', '1', '2号装卸线');
INSERT INTO `t_pack` VALUES ('3', '2', '01');
INSERT INTO `t_pack` VALUES ('4', '2', '02');

-- ----------------------------
-- Table structure for `t_pause`
-- ----------------------------
DROP TABLE IF EXISTS `t_pause`;
CREATE TABLE `t_pause` (
  `pauseid` int(11) NOT NULL auto_increment,
  `portid` int(11) NOT NULL,
  `pauseName` char(20) default NULL,
  PRIMARY KEY  (`pauseid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_pause
-- ----------------------------
INSERT INTO `t_pause` VALUES ('1', '1', '满暂停线');

-- ----------------------------
-- Table structure for `t_port`
-- ----------------------------
DROP TABLE IF EXISTS `t_port`;
CREATE TABLE `t_port` (
  `portid` int(11) NOT NULL auto_increment,
  `portName` char(20) character set utf8 default NULL,
  PRIMARY KEY  (`portid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_port
-- ----------------------------
INSERT INTO `t_port` VALUES ('1', '满洲里');
INSERT INTO `t_port` VALUES ('2', '二连浩特');
INSERT INTO `t_port` VALUES ('3', '绥芬河');
INSERT INTO `t_port` VALUES ('4', '嘉荫');
INSERT INTO `t_port` VALUES ('5', '新疆');
INSERT INTO `t_port` VALUES ('6', '其他');

-- ----------------------------
-- Table structure for `t_position`
-- ----------------------------
DROP TABLE IF EXISTS `t_position`;
CREATE TABLE `t_position` (
  `positionid` int(11) NOT NULL auto_increment,
  `positionName` char(10) default NULL,
  PRIMARY KEY  (`positionid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_position
-- ----------------------------
INSERT INTO `t_position` VALUES ('1', '边材');
INSERT INTO `t_position` VALUES ('2', '芯材');

-- ----------------------------
-- Table structure for `t_product`
-- ----------------------------
DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `productid` int(11) NOT NULL auto_increment,
  `carnum` char(255) NOT NULL,
  `userid` int(11) default NULL,
  `kindid` tinyint(4) default NULL,
  `stuffid` tinyint(4) default NULL,
  `productlen` tinyint(4) default NULL,
  `diameterlen` tinyint(4) default NULL,
  `wide` tinyint(4) default NULL,
  `thinckness` tinyint(4) default NULL,
  `tolerance` tinyint(4) default NULL,
  `widerange` int(11) default NULL,
  `thincknessrange` int(11) default NULL,
  `refwight` tinyint(4) default NULL,
  `refcapacity` tinyint(4) default NULL,
  `refnum` int(11) default NULL,
  `salestatusid` tinyint(4) default NULL,
  `timber` varchar(10) default NULL,
  `dry` varchar(2) default NULL,
  `newold` varchar(10) default NULL,
  `timbertype` varchar(10) default NULL,
  `knob` varchar(10) default NULL,
  `blue` varchar(10) default NULL,
  `worm` varchar(10) default NULL,
  `decay` varchar(10) default NULL,
  `climb` varchar(10) default NULL,
  `slash` varchar(2) default NULL,
  `ring` varchar(2) default NULL,
  `oil` varchar(2) default NULL,
  `black` varchar(2) default NULL,
  `position` varchar(10) default NULL,
  `device` varchar(10) default NULL,
  `fromid` tinyint(4) default NULL,
  `portid` tinyint(4) default NULL,
  `publishtime` datetime default NULL,
  `showtime` datetime default NULL,
  `assembletime` varchar(20) default NULL,
  `entertime` varchar(20) default NULL,
  `enterpositionid` tinyint(4) default NULL,
  `pausetime` varchar(20) default NULL,
  `pauseid` tinyint(4) default NULL,
  `trackid` varchar(4) default NULL,
  `dumpid` tinyint(4) default NULL,
  `dumptime` varchar(20) default NULL,
  `packid` tinyint(6) default NULL,
  `goodpositionid` varchar(4) default NULL,
  `completetime` datetime default NULL,
  `updatetime` datetime default NULL,
  `goodstatusid` tinyint(4) default NULL,
  PRIMARY KEY  (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_product
-- ----------------------------
INSERT INTO `t_product` VALUES ('1', '55886688', '1', '1', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '1', '2015-04-24 18:55:46', '2015-04-24 18:55:55', '2015-04-24 18:56:14', null, null, null, null, null, null, null, null, null, null, '2015-04-24 18:56:32', '0');
INSERT INTO `t_product` VALUES ('2', '12345678', '4', '1', '1', '12', '0', '0', '0', '0', '0', '0', '0', '0', '12', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 16:50:04', '2015-05-12 16:50:04', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 16:50:04', null);
INSERT INTO `t_product` VALUES ('3', '23456789', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:32:16', '2015-05-12 18:32:16', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:32:16', null);
INSERT INTO `t_product` VALUES ('4', '34567890', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:34:12', '2015-05-12 18:34:12', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:34:12', null);
INSERT INTO `t_product` VALUES ('5', '56575859', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:42:38', '2015-05-12 18:42:38', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:42:38', null);
INSERT INTO `t_product` VALUES ('6', '23456780', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:45:06', '2015-05-12 18:45:06', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:45:06', null);
INSERT INTO `t_product` VALUES ('7', '23456723', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:46:38', '2015-05-12 18:46:38', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:46:38', null);
INSERT INTO `t_product` VALUES ('8', '2342345', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:49:06', '2015-05-12 18:49:06', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:49:06', null);
INSERT INTO `t_product` VALUES ('9', '23424561', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:51:37', '2015-05-12 18:51:37', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:51:37', null);
INSERT INTO `t_product` VALUES ('10', '56852312', '4', '1', '1', '12', '0', '0', '0', '0', '0', '0', '45', '23', '36', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-12 18:56:01', '2015-05-12 18:55:00', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-12 18:56:01', null);
INSERT INTO `t_product` VALUES ('11', '', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 14:28:49', '2015-05-13 14:28:49', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 14:28:49', null);
INSERT INTO `t_product` VALUES ('12', '56585253', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 15:24:03', '2015-05-13 15:24:03', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 15:24:03', null);
INSERT INTO `t_product` VALUES ('13', '12345634', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 15:28:34', '2015-05-13 15:28:34', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 15:28:34', null);
INSERT INTO `t_product` VALUES ('14', '56585223', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 15:28:55', '2015-05-13 15:28:55', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 15:28:55', null);
INSERT INTO `t_product` VALUES ('15', '23252728', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 15:31:29', '2015-05-13 15:31:29', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 15:31:29', null);
INSERT INTO `t_product` VALUES ('16', '58585656', '4', '1', '1', '12', '0', '0', '0', '0', '0', '0', '23', '25', '23', null, '红皮细纹', '', '旧材', '根节', '', '全蓝', '无虫眼', '无腐朽', '', '无', '有', '有', '有', '', '', '2', '1', '2015-05-13 15:55:16', '2015-05-13 15:55:16', '2015-05-13T15:54', '2015-05-14T15:54', null, '2015-05-16T15:54', null, '12', '1', '2015-05-21T15:55', '1', '23', null, '2015-05-13 15:55:16', null);
INSERT INTO `t_product` VALUES ('17', '23212528', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 16:02:48', '2015-05-13 16:02:48', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 16:02:48', null);
INSERT INTO `t_product` VALUES ('18', '25236989', '4', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-13 18:24:54', '2015-05-13 18:24:54', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-13 18:24:54', null);
INSERT INTO `t_product` VALUES ('19', '12345564', '2', '2', '1', '12', '0', '0', '0', '0', '0', '0', '21', '32', '22', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2', '2015-05-17 19:01:37', '2015-05-17 19:01:37', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-17 19:01:37', null);
INSERT INTO `t_product` VALUES ('20', '34563213', '2', '1', '5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '2015-05-17 19:06:09', '2015-05-17 19:06:09', '', '', null, '', null, '', '1', '', '1', '', null, '2015-05-17 19:06:09', null);

-- ----------------------------
-- Table structure for `t_productpic`
-- ----------------------------
DROP TABLE IF EXISTS `t_productpic`;
CREATE TABLE `t_productpic` (
  `picid` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `productpic` varchar(50) NOT NULL,
  `instime` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`picid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_productpic
-- ----------------------------
INSERT INTO `t_productpic` VALUES ('1', '9', 'Uploads/20150512/2015051218513858624.jpg', '2015-05-12 18:51:38');
INSERT INTO `t_productpic` VALUES ('2', '10', 'Uploads/20150512/2015051218560332974.jpg', '2015-05-12 18:56:03');
INSERT INTO `t_productpic` VALUES ('3', '10', 'Uploads/20150512/2015051218560331314.jpg', '2015-05-12 18:56:03');
INSERT INTO `t_productpic` VALUES ('4', '10', 'Uploads/20150512/2015051218560339434.jpg', '2015-05-12 18:56:03');
INSERT INTO `t_productpic` VALUES ('5', '10', 'Uploads/20150512/2015051218560317664.jpg', '2015-05-12 18:56:03');
INSERT INTO `t_productpic` VALUES ('6', '12', 'Uploads/20150513/2015051315240423124.jpg', '2015-05-13 15:24:04');
INSERT INTO `t_productpic` VALUES ('7', '14', 'Uploads/20150513/2015051315285675784.jpg', '2015-05-13 15:28:56');
INSERT INTO `t_productpic` VALUES ('8', '16', 'Uploads/20150513/2015051315551718054.jpg', '2015-05-13 15:55:17');
INSERT INTO `t_productpic` VALUES ('9', '16', 'Uploads/20150513/2015051315551748694.jpg', '2015-05-13 15:55:17');
INSERT INTO `t_productpic` VALUES ('10', '18', 'Uploads/20150513/2015051318245561804.jpg', '2015-05-13 18:24:55');
INSERT INTO `t_productpic` VALUES ('11', '18', 'Uploads/20150513/2015051318245578714.jpg', '2015-05-13 18:24:55');
INSERT INTO `t_productpic` VALUES ('12', '19', 'Uploads/20150517/2015051719013894242.jpg', '2015-05-17 19:01:38');
INSERT INTO `t_productpic` VALUES ('13', '19', 'Uploads/20150517/2015051719013979052.jpg', '2015-05-17 19:01:39');
INSERT INTO `t_productpic` VALUES ('14', '20', 'Uploads/20150517/2015051719061062932.jpg', '2015-05-17 19:06:10');

-- ----------------------------
-- Table structure for `t_ring`
-- ----------------------------
DROP TABLE IF EXISTS `t_ring`;
CREATE TABLE `t_ring` (
  `ringid` int(11) NOT NULL auto_increment,
  `ringName` char(4) default NULL,
  PRIMARY KEY  (`ringid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_ring
-- ----------------------------
INSERT INTO `t_ring` VALUES ('1', '有');
INSERT INTO `t_ring` VALUES ('2', '无');

-- ----------------------------
-- Table structure for `t_sale`
-- ----------------------------
DROP TABLE IF EXISTS `t_sale`;
CREATE TABLE `t_sale` (
  `saleid` int(11) NOT NULL auto_increment,
  `userid` int(11) default NULL,
  `productid` int(11) default NULL,
  `title` varchar(30) default NULL,
  `content` varchar(100) default NULL,
  `portid` int(11) default NULL,
  `kindid` int(11) default NULL,
  `stuffid` int(11) default NULL,
  `price` int(11) default NULL,
  `updatetime` datetime default NULL,
  `carnum` varchar(8) default NULL,
  PRIMARY KEY  (`saleid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_sale
-- ----------------------------
INSERT INTO `t_sale` VALUES ('1', '2', null, '无可奈何花落去大哥大梦魇可想而知', '柘城无可无不可无可无不可老板娘', '1', '1', '1', null, '2015-05-16 16:59:28', null);
INSERT INTO `t_sale` VALUES ('2', '4', null, 'Typerghz', 'shjhvghjkkjgghhg', '3', '1', '1', null, '2015-05-18 11:07:29', null);
INSERT INTO `t_sale` VALUES ('3', '4', null, 'Dghhnjjiooo', 'Ghihhvhjjkmkohgvvv', '1', '1', '1', '4586', '2015-05-18 18:33:39', null);

-- ----------------------------
-- Table structure for `t_salestatus`
-- ----------------------------
DROP TABLE IF EXISTS `t_salestatus`;
CREATE TABLE `t_salestatus` (
  `salestatusid` int(11) NOT NULL auto_increment,
  `salestatusName` char(6) default NULL,
  PRIMARY KEY  (`salestatusid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_salestatus
-- ----------------------------
INSERT INTO `t_salestatus` VALUES ('1', '预售');
INSERT INTO `t_salestatus` VALUES ('2', '销售');
INSERT INTO `t_salestatus` VALUES ('3', '已售');

-- ----------------------------
-- Table structure for `t_slash`
-- ----------------------------
DROP TABLE IF EXISTS `t_slash`;
CREATE TABLE `t_slash` (
  `slashid` int(11) NOT NULL auto_increment,
  `slashname` char(4) default NULL,
  PRIMARY KEY  (`slashid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_slash
-- ----------------------------
INSERT INTO `t_slash` VALUES ('1', '有');
INSERT INTO `t_slash` VALUES ('2', '无');

-- ----------------------------
-- Table structure for `t_storage`
-- ----------------------------
DROP TABLE IF EXISTS `t_storage`;
CREATE TABLE `t_storage` (
  `storageid` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `storagePosition` varchar(30) NOT NULL,
  PRIMARY KEY  (`storageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_storage
-- ----------------------------

-- ----------------------------
-- Table structure for `t_stuff`
-- ----------------------------
DROP TABLE IF EXISTS `t_stuff`;
CREATE TABLE `t_stuff` (
  `stuffid` int(11) NOT NULL auto_increment,
  `stuffName` char(10) default NULL,
  PRIMARY KEY  (`stuffid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_stuff
-- ----------------------------
INSERT INTO `t_stuff` VALUES ('1', '樟子松');
INSERT INTO `t_stuff` VALUES ('2', '落叶松');
INSERT INTO `t_stuff` VALUES ('3', '鱼鳞松');
INSERT INTO `t_stuff` VALUES ('4', '臭白');
INSERT INTO `t_stuff` VALUES ('5', '红松');
INSERT INTO `t_stuff` VALUES ('6', '白桦');
INSERT INTO `t_stuff` VALUES ('7', '红桦');
INSERT INTO `t_stuff` VALUES ('8', '水曲柳');
INSERT INTO `t_stuff` VALUES ('9', '柞木');
INSERT INTO `t_stuff` VALUES ('10', '杨木');
INSERT INTO `t_stuff` VALUES ('11', '其它');

-- ----------------------------
-- Table structure for `t_timber`
-- ----------------------------
DROP TABLE IF EXISTS `t_timber`;
CREATE TABLE `t_timber` (
  `timberid` int(11) NOT NULL auto_increment,
  `timbername` char(10) default NULL,
  PRIMARY KEY  (`timberid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_timber
-- ----------------------------
INSERT INTO `t_timber` VALUES ('1', '红皮细纹');
INSERT INTO `t_timber` VALUES ('2', '黑皮材');
INSERT INTO `t_timber` VALUES ('3', '加工材');
INSERT INTO `t_timber` VALUES ('4', '其它');

-- ----------------------------
-- Table structure for `t_timbertype`
-- ----------------------------
DROP TABLE IF EXISTS `t_timbertype`;
CREATE TABLE `t_timbertype` (
  `timbertypeid` int(11) NOT NULL auto_increment,
  `timbertypeName` char(10) default NULL,
  PRIMARY KEY  (`timbertypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_timbertype
-- ----------------------------
INSERT INTO `t_timbertype` VALUES ('1', '选材');
INSERT INTO `t_timbertype` VALUES ('2', '根节');
INSERT INTO `t_timbertype` VALUES ('3', '中节');
INSERT INTO `t_timbertype` VALUES ('4', '稍节');
INSERT INTO `t_timbertype` VALUES ('5', '其它');

-- ----------------------------
-- Table structure for `t_track`
-- ----------------------------
DROP TABLE IF EXISTS `t_track`;
CREATE TABLE `t_track` (
  `trackid` int(11) NOT NULL auto_increment,
  `pauseid` int(11) NOT NULL,
  `trackName` char(20) default NULL,
  PRIMARY KEY  (`trackid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_track
-- ----------------------------
INSERT INTO `t_track` VALUES ('1', '1', '01');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `userid` int(11) NOT NULL auto_increment,
  `phone` char(11) NOT NULL,
  `username` varchar(20) default NULL,
  `userpic` varchar(50) default NULL,
  `portid` int(11) default NULL,
  `city` varchar(20) default NULL,
  `rightid` int(11) default NULL,
  `score` int(11) default NULL,
  `password` varchar(100) default NULL,
  `phone1` char(11) default NULL,
  `phone2` char(11) default NULL,
  `freeze` tinyint(4) default NULL,
  `remark` varchar(30) default NULL,
  `loginnum` int(11) default '0',
  `regtime` datetime NOT NULL,
  `logintime` datetime NOT NULL,
  PRIMARY KEY  (`userid`),
  KEY `portid` (`portid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('2', '13453456956', '123456', null, '1', '太原', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, '1', '2015-05-05 16:09:46', '2015-05-05 16:09:46');
INSERT INTO `t_user` VALUES ('3', '13466876383', '456789', null, '1', '太原', null, null, 'e35cf7b66449df565f93c607d5a81d09', null, null, null, null, '1', '2015-05-05 16:13:39', '2015-05-05 16:13:39');
INSERT INTO `t_user` VALUES ('4', '13934544931', '白利', null, '1', '', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, '1', '2015-05-12 09:17:49', '2015-05-12 09:17:49');
INSERT INTO `t_user` VALUES ('5', '18235100872', 'study1228', null, '0', '', null, null, 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, '1', '2015-05-18 10:41:31', '2015-05-18 10:41:31');

-- ----------------------------
-- Table structure for `t_worm`
-- ----------------------------
DROP TABLE IF EXISTS `t_worm`;
CREATE TABLE `t_worm` (
  `wormid` int(11) NOT NULL auto_increment,
  `wormName` char(10) default NULL,
  PRIMARY KEY  (`wormid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of t_worm
-- ----------------------------
INSERT INTO `t_worm` VALUES ('1', '部分');
INSERT INTO `t_worm` VALUES ('2', '个别');
INSERT INTO `t_worm` VALUES ('3', '无虫眼');
INSERT INTO `t_worm` VALUES ('4', '其它');
