/*
 Navicat MariaDB Data Transfer

 Source Server         : task
 Source Server Type    : MariaDB
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : taskim

 Target Server Type    : MariaDB
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 03/11/2021 12:19:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for visit
-- ----------------------------
DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit`  (
  `ip_address` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `page_url` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `views_count` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ip_address`, `user_agent`, `page_url`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of visit
-- ----------------------------
INSERT INTO `visit` VALUES ('fe80::2103:54dd:d499:3190', 'Firefox', '2021-11-03 12:19:20', 'http://d1/php/work/TaskIM/indev/www/index1.html', 2);
INSERT INTO `visit` VALUES ('fe80::2103:54dd:d499:3190', 'Firefox', '2021-11-03 12:19:10', 'http://d1/php/work/TaskIM/indev/www/index2.html', 5);

SET FOREIGN_KEY_CHECKS = 1;
