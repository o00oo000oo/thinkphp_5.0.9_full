/*
Navicat MySQL Data Transfer

Source Server         : ww
Source Server Version : 50148
Source Host           : qdm122695184.my3w.com:3306
Source Database       : qdm122695184_db

Target Server Type    : MYSQL
Target Server Version : 50148
File Encoding         : 65001

Date: 2017-06-15 09:48:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `cx_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `cx_admin_menu`;
CREATE TABLE `cx_admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '菜单名',
  `is_think_url` int(11) NOT NULL DEFAULT '0' COMMENT '否是使用thinkPHP的url助手函数生成:url(is_think_url)',
  `url_str` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'url值',
  `is_hide` int(11) NOT NULL DEFAULT '0' COMMENT '否是可见',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '亲级菜单ID',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '增新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of cx_admin_menu
-- ----------------------------
INSERT INTO `cx_admin_menu` VALUES ('1', '业务管理', '0', '', '0', '0', '2017-06-12 10:31:33');
INSERT INTO `cx_admin_menu` VALUES ('2', '会员管理', '0', '', '0', '1', '2017-06-12 10:31:28');
INSERT INTO `cx_admin_menu` VALUES ('3', '会员列表', '1', 'admin/member/lists', '0', '2', '2017-06-12 10:31:23');
INSERT INTO `cx_admin_menu` VALUES ('4', '会员新增', '0', 'http://www.baidu.com', '0', '2', '2017-06-12 10:31:25');
INSERT INTO `cx_admin_menu` VALUES ('5', '商品管理', '0', '', '0', '1', '2017-06-12 10:31:20');
INSERT INTO `cx_admin_menu` VALUES ('6', '商品列表', '1', 'admin/product/lists', '0', '5', '2017-06-12 10:31:18');
INSERT INTO `cx_admin_menu` VALUES ('7', '商品新增', '1', 'admin/product/add', '0', '5', '2017-06-12 10:31:14');
INSERT INTO `cx_admin_menu` VALUES ('8', '系统管理', '0', '', '0', '0', '2017-06-12 10:31:16');
INSERT INTO `cx_admin_menu` VALUES ('9', '菜单管理', '0', '', '0', '8', '2017-06-15 17:00:05');
INSERT INTO `cx_admin_menu` VALUES ('10', '菜单列表', '1', 'admin/menu/lists', '0', '9', '2017-06-12 10:31:09');
INSERT INTO `cx_admin_menu` VALUES ('11', '菜单新增', '1', 'admin/menu/add', '0', '9', '2017-06-06 19:28:39');
INSERT INTO `cx_admin_menu` VALUES ('31', 'a4', '1', '', '0', '0', '2017-06-16 01:36:49');
INSERT INTO `cx_admin_menu` VALUES ('32', 'a5', '1', '', '0', '0', '2017-06-16 01:36:53');
INSERT INTO `cx_admin_menu` VALUES ('34', 'a7', '1', '', '0', '0', '2017-06-16 01:37:07');
INSERT INTO `cx_admin_menu` VALUES ('35', 'a8', '1', '', '0', '0', '2017-06-16 01:37:18');
INSERT INTO `cx_admin_menu` VALUES ('37', 'a10', '1', '', '0', '0', '2017-06-16 01:37:30');
