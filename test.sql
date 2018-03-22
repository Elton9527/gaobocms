/*
Navicat MySQL Data Transfer

Source Server         : phpstudy_local
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-22 17:22:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateline` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', '难觅', '小朵开车撞翻了反光锥，浮夸的车技惊呆了美岚。小朵正式向徐天示爱，并帮徐天分析他对晓慧和小白的不同感情，徐天拒绝小朵的一片心意伤透了佳人的心。在兰芝的请求下跃进与她共舞，谁知被推门而入的刘老头目睹。小朵告诉晓慧自己喜欢上了徐天，心中满怀歉意。电梯再度发生意外，一起乘坐电梯的男子失声呼救，小朵却一脸淡然的安慰对方。', '梁跃进', '百度', '1521611618');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'elton', '123456');
