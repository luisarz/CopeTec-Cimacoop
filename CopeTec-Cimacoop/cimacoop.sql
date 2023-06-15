/*
 Navicat Premium Data Transfer

 Source Server         : LocalHost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : cimacoop

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 12/06/2023 22:48:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for apertura_caja
-- ----------------------------
DROP TABLE IF EXISTS `apertura_caja`;
CREATE TABLE `apertura_caja`  (
  `id_apertura_caja` int NOT NULL AUTO_INCREMENT,
  `id_caja` int NULL DEFAULT NULL,
  `monto_apertura` decimal(10, 2) NULL DEFAULT NULL,
  `monto_cierre` decimal(10, 2) NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  `fecha_apertura` datetime NULL DEFAULT NULL,
  `hora_cierre` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_apertura_caja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 975 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of apertura_caja
-- ----------------------------
INSERT INTO `apertura_caja` VALUES (971, 45, 1580.00, 50.00, 11, '2023-06-12 22:19:22', '09', 1, '2023-06-12 22:19:22', '2023-06-12 22:19:22');
INSERT INTO `apertura_caja` VALUES (972, 45, 1580.00, NULL, 11, '2023-06-12 22:19:55', NULL, 1, '2023-06-12 22:19:55', '2023-06-12 22:19:55');
INSERT INTO `apertura_caja` VALUES (973, 45, 500.00, NULL, 11, '2023-06-12 00:00:00', NULL, 1, '2023-06-12 22:21:15', '2023-06-12 22:21:15');
INSERT INTO `apertura_caja` VALUES (974, 45, 150.00, NULL, 11, '2023-06-12 00:00:00', NULL, 1, '2023-06-12 22:21:44', '2023-06-12 22:21:44');

-- ----------------------------
-- Table structure for asociados
-- ----------------------------
DROP TABLE IF EXISTS `asociados`;
CREATE TABLE `asociados`  (
  `id_asociado` int NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `sueldo_quincenal` decimal(10, 2) NULL DEFAULT NULL,
  `sueldo_mensual` decimal(10, 2) NULL DEFAULT NULL,
  `otros_ingresos` decimal(10, 2) NULL DEFAULT NULL,
  `dependientes_economicamente` int NULL DEFAULT NULL,
  `referencia_asociado_uno` int NULL DEFAULT NULL,
  `referencia_asociado_dos` int NULL DEFAULT NULL,
  `couta_ingreso` decimal(10, 2) NULL DEFAULT NULL,
  `monto_aportacion` decimal(10, 2) NULL DEFAULT NULL,
  `estado_solicitud` int NULL DEFAULT NULL COMMENT '1-Presentada 2-Aprobada 3-Rechazado',
  `fecha_ingreso` date NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_asociado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asociados
-- ----------------------------
INSERT INTO `asociados` VALUES (10, '6', 5.00, 5.00, 5.00, 5, NULL, NULL, 5.00, 5.00, 2, '2023-06-15', '2023-06-08 19:54:34', '2023-06-08 19:55:37');
INSERT INTO `asociados` VALUES (11, '19', 26037.49, 59344.95, 566.30, 5, NULL, NULL, 20.00, 39.17, 1, '2019-07-13', '2011-11-06 23:14:33', '2023-06-09 19:16:44');
INSERT INTO `asociados` VALUES (12, '83', 72532.27, 17303.68, 352.03, 7, 0, 0, 20.00, 54.27, 2, '2020-04-09', '2010-08-05 08:16:07', '2010-10-02 04:08:53');
INSERT INTO `asociados` VALUES (13, '22', 15435.77, 96213.51, 474.42, 5, 0, 0, 20.00, 68.37, 2, '2006-02-21', '2016-02-21 04:34:47', '2012-08-17 02:21:23');
INSERT INTO `asociados` VALUES (14, '132', 45843.07, 58583.77, 725.96, 6, 0, 0, 20.00, 32.39, 1, '2006-09-08', '2005-05-15 11:17:44', '2020-10-05 16:09:41');
INSERT INTO `asociados` VALUES (15, '36', 96368.59, 64690.84, 676.47, 8, 0, 0, 20.00, 93.43, 3, '2006-09-09', '2012-07-11 19:22:59', '2017-12-29 07:12:59');
INSERT INTO `asociados` VALUES (16, '18', 57944.28, 18791.72, 111.61, 8, 0, 0, 20.00, 67.46, 2, '2013-10-28', '2012-10-07 02:59:29', '2008-01-11 15:14:57');
INSERT INTO `asociados` VALUES (17, '110', 18744.96, 14891.92, 654.02, 5, 0, 0, 20.00, 22.71, 2, '2005-04-27', '2002-04-25 09:55:44', '2003-03-17 02:20:36');
INSERT INTO `asociados` VALUES (18, '100', 65103.38, 70586.20, 662.68, 5, 0, 0, 20.00, 72.52, 1, '2007-10-13', '2002-04-13 19:33:53', '2006-07-26 07:01:37');
INSERT INTO `asociados` VALUES (19, '96', 98122.51, 91341.60, 283.93, 3, 0, 0, 20.00, 54.20, 3, '2014-01-20', '2001-11-19 20:22:34', '2006-07-01 19:03:23');
INSERT INTO `asociados` VALUES (20, '15', 44880.48, 70948.17, 486.01, 7, 0, 0, 20.00, 71.05, 2, '2013-02-17', '2018-09-02 20:01:30', '2006-03-05 12:42:58');
INSERT INTO `asociados` VALUES (21, '94', 19431.48, 66256.59, 28.51, 6, 0, 0, 20.00, 34.91, 3, '2020-10-31', '2001-04-23 03:19:53', '2019-12-01 00:21:15');
INSERT INTO `asociados` VALUES (22, '133', 98730.08, 41298.36, 38.36, 4, 0, 0, 20.00, 72.54, 1, '2008-11-07', '2019-04-04 22:17:55', '2004-02-07 16:07:42');
INSERT INTO `asociados` VALUES (23, '48', 97640.86, 88233.96, 637.10, 9, 0, 0, 20.00, 61.21, 3, '2019-12-26', '2011-10-27 09:22:56', '2018-12-04 13:19:32');
INSERT INTO `asociados` VALUES (24, '50', 43567.35, 52713.90, 401.53, 3, 0, 0, 20.00, 55.13, 2, '2014-07-30', '2019-06-08 18:28:33', '2011-07-14 07:33:09');
INSERT INTO `asociados` VALUES (25, '14', 94091.66, 8400.52, 579.65, 8, 0, 0, 20.00, 43.16, 3, '2015-07-23', '2022-12-14 14:05:25', '2020-12-24 07:00:54');
INSERT INTO `asociados` VALUES (26, '17', 37336.47, 79164.11, 877.72, 8, 0, 0, 20.00, 42.62, 1, '2004-10-08', '2019-08-06 20:28:29', '2017-09-08 07:26:39');
INSERT INTO `asociados` VALUES (27, '119', 37024.19, 66326.76, 446.30, 1, 0, 0, 20.00, 98.10, 1, '2016-05-10', '2021-05-28 21:27:23', '2022-01-06 08:48:08');
INSERT INTO `asociados` VALUES (28, '124', 30631.48, 31341.36, 480.18, 9, 0, 0, 20.00, 47.05, 1, '2008-07-14', '2005-01-06 13:42:04', '2006-12-05 04:26:51');
INSERT INTO `asociados` VALUES (29, '69', 99280.58, 11393.58, 140.74, 1, 0, 0, 20.00, 38.01, 2, '2005-11-03', '2008-11-08 21:26:12', '2003-03-18 04:22:16');
INSERT INTO `asociados` VALUES (30, '83', 62524.56, 174.50, 565.60, 7, 0, 0, 20.00, 30.28, 2, '2002-10-07', '2001-10-12 11:59:27', '2021-10-05 06:52:25');
INSERT INTO `asociados` VALUES (31, '73', 98539.61, 70118.20, 456.21, 4, 0, 0, 20.00, 96.29, 3, '2001-05-02', '2021-10-21 20:50:29', '2017-12-26 14:45:54');
INSERT INTO `asociados` VALUES (32, '36', 94712.14, 78670.59, 448.43, 10, 0, 0, 20.00, 33.90, 3, '2005-08-29', '2001-12-07 21:52:33', '2003-01-17 16:42:33');
INSERT INTO `asociados` VALUES (33, '120', 18686.11, 98813.74, 129.21, 8, 0, 0, 20.00, 91.14, 2, '2020-06-16', '2013-06-12 05:31:08', '2014-04-18 07:24:03');
INSERT INTO `asociados` VALUES (34, '43', 6001.45, 44629.89, 421.25, 5, 0, 0, 20.00, 70.82, 1, '2016-09-20', '2021-07-18 20:34:38', '2010-03-18 05:23:15');
INSERT INTO `asociados` VALUES (35, '24', 34195.04, 86619.98, 485.89, 3, 0, 0, 20.00, 96.46, 2, '2013-01-25', '2008-03-08 20:24:12', '2020-03-05 01:48:25');
INSERT INTO `asociados` VALUES (36, '78', 63125.02, 89913.48, 984.93, 9, 0, 0, 20.00, 70.82, 1, '2010-01-31', '2005-10-23 22:00:19', '2012-03-23 08:11:14');
INSERT INTO `asociados` VALUES (37, '17', 72145.36, 3314.96, 208.54, 4, 0, 0, 20.00, 35.07, 1, '2016-10-04', '2001-04-25 23:53:33', '2012-03-02 15:08:10');
INSERT INTO `asociados` VALUES (38, '134', 81774.85, 49268.59, 87.50, 2, 0, 0, 20.00, 66.60, 2, '2018-06-27', '2004-05-10 06:24:21', '2020-04-29 07:42:47');
INSERT INTO `asociados` VALUES (39, '119', 75097.49, 43728.90, 227.47, 7, 0, 0, 20.00, 45.56, 3, '2017-08-07', '2022-02-09 10:48:52', '2018-08-25 01:20:10');
INSERT INTO `asociados` VALUES (40, '71', 76451.38, 19654.87, 666.61, 4, 0, 0, 20.00, 96.16, 2, '2014-05-20', '2018-09-17 22:49:35', '2016-03-05 22:33:59');
INSERT INTO `asociados` VALUES (41, '12', 95073.82, 66070.06, 188.95, 6, 0, 0, 20.00, 74.23, 1, '2017-10-31', '2007-02-16 06:14:30', '2007-03-18 09:16:34');
INSERT INTO `asociados` VALUES (42, '51', 31656.44, 18732.36, 384.76, 4, 0, 0, 20.00, 66.53, 2, '2001-10-09', '2006-02-09 21:23:51', '2022-12-19 03:44:30');
INSERT INTO `asociados` VALUES (43, '49', 34591.66, 32907.80, 608.05, 3, 0, 0, 20.00, 36.74, 2, '2006-04-30', '2008-08-07 05:31:04', '2005-01-13 00:34:43');
INSERT INTO `asociados` VALUES (44, '31', 10983.80, 78071.94, 407.86, 10, 0, 0, 20.00, 82.74, 2, '2009-01-08', '2001-04-30 04:30:37', '2016-12-07 02:12:02');
INSERT INTO `asociados` VALUES (45, '39', 96521.69, 95447.96, 800.29, 4, 0, 0, 20.00, 26.71, 1, '2022-12-09', '2006-01-24 21:57:25', '2002-03-14 22:53:31');
INSERT INTO `asociados` VALUES (46, '50', 89254.38, 94287.59, 221.28, 6, 0, 0, 20.00, 20.47, 1, '2017-05-24', '2014-03-29 21:58:53', '2003-09-05 13:07:29');
INSERT INTO `asociados` VALUES (47, '140', 16724.14, 82682.09, 788.27, 3, 0, 0, 20.00, 54.38, 3, '2006-03-09', '2004-07-27 17:11:32', '2016-04-17 02:52:23');
INSERT INTO `asociados` VALUES (48, '117', 31880.81, 93015.39, 998.44, 5, 0, 0, 20.00, 28.78, 3, '2006-07-21', '2000-05-01 13:09:41', '2015-06-18 09:08:16');
INSERT INTO `asociados` VALUES (49, '88', 52237.94, 98428.02, 771.59, 3, 0, 0, 20.00, 40.12, 3, '2019-02-01', '2022-08-17 12:59:39', '2013-03-27 01:27:39');
INSERT INTO `asociados` VALUES (50, '38', 5675.46, 24364.67, 308.06, 2, 0, 0, 20.00, 32.11, 2, '2006-08-04', '2017-06-30 22:48:34', '2014-05-13 08:39:56');
INSERT INTO `asociados` VALUES (51, '123', 40025.07, 71761.47, 500.90, 5, 0, 0, 20.00, 88.14, 2, '2012-03-05', '2005-04-12 21:37:59', '2002-03-03 07:38:46');
INSERT INTO `asociados` VALUES (52, '80', 44327.63, 75887.88, 807.70, 3, 0, 0, 20.00, 80.64, 1, '2001-08-14', '2010-09-21 17:24:12', '2013-11-19 21:09:44');
INSERT INTO `asociados` VALUES (53, '130', 1257.81, 61680.98, 390.90, 7, 0, 0, 20.00, 54.30, 2, '2022-06-30', '2008-05-30 23:30:14', '2015-08-18 03:36:25');
INSERT INTO `asociados` VALUES (54, '150', 45420.28, 62470.33, 582.19, 9, 0, 0, 20.00, 32.45, 1, '2017-01-20', '2008-01-08 09:01:30', '2015-02-11 07:29:51');
INSERT INTO `asociados` VALUES (55, '121', 23472.27, 36561.88, 858.95, 9, 0, 0, 20.00, 27.63, 3, '2021-02-24', '2014-04-30 18:39:25', '2016-11-11 18:16:33');
INSERT INTO `asociados` VALUES (56, '138', 2708.99, 46397.71, 479.12, 5, 0, 0, 20.00, 25.52, 1, '2020-12-29', '2012-01-07 08:14:04', '2012-10-30 18:40:09');
INSERT INTO `asociados` VALUES (57, '75', 20665.80, 7583.55, 146.30, 8, 0, 0, 20.00, 77.40, 2, '2022-08-01', '2014-01-17 10:24:24', '2004-02-05 16:41:30');
INSERT INTO `asociados` VALUES (58, '108', 77371.43, 88649.61, 738.17, 2, 0, 0, 20.00, 38.98, 2, '2000-03-26', '2022-11-18 14:39:50', '2018-10-27 00:04:54');
INSERT INTO `asociados` VALUES (59, '123', 7208.00, 3188.39, 696.01, 4, 0, 0, 20.00, 36.04, 1, '2005-11-19', '2022-12-19 23:14:52', '2010-03-04 22:37:02');
INSERT INTO `asociados` VALUES (60, '62', 64403.19, 38246.14, 768.52, 3, 0, 0, 20.00, 58.01, 3, '2012-12-25', '2017-05-06 14:49:08', '2000-08-17 03:02:09');
INSERT INTO `asociados` VALUES (61, '63', 73123.62, 14350.22, 710.16, 4, 0, 0, 20.00, 33.38, 3, '2006-04-15', '2000-12-29 15:04:57', '2012-06-12 04:19:40');
INSERT INTO `asociados` VALUES (62, '67', 84683.17, 12716.41, 608.96, 2, 0, 0, 20.00, 39.65, 1, '2021-12-31', '2010-01-20 19:14:48', '2020-03-13 11:26:22');
INSERT INTO `asociados` VALUES (63, '57', 17474.63, 14519.94, 102.41, 10, 0, 0, 20.00, 49.03, 1, '2014-05-10', '2022-03-28 17:53:01', '2015-10-12 15:17:16');
INSERT INTO `asociados` VALUES (64, '28', 35784.50, 15412.73, 22.98, 1, 0, 0, 20.00, 91.40, 2, '2010-11-04', '2014-12-02 06:44:20', '2022-03-23 21:35:08');
INSERT INTO `asociados` VALUES (65, '67', 26982.91, 51250.40, 459.61, 10, 0, 0, 20.00, 51.53, 1, '2000-06-02', '2007-12-11 09:25:50', '2015-05-19 14:18:31');
INSERT INTO `asociados` VALUES (66, '117', 45658.26, 78023.70, 709.91, 3, 0, 0, 20.00, 82.97, 2, '2001-01-03', '2014-08-20 15:34:24', '2001-03-31 13:33:12');
INSERT INTO `asociados` VALUES (67, '30', 82161.18, 50208.33, 546.77, 9, 0, 0, 20.00, 23.47, 1, '2018-11-24', '2019-06-28 12:55:32', '2006-02-14 09:36:28');
INSERT INTO `asociados` VALUES (68, '21', 68936.66, 39822.43, 941.51, 8, 0, 0, 20.00, 77.70, 1, '2007-09-28', '2019-08-16 13:14:50', '2022-02-07 18:19:52');
INSERT INTO `asociados` VALUES (69, '16', 19357.55, 10962.58, 419.82, 4, 0, 0, 20.00, 74.68, 3, '2021-11-01', '2010-06-07 22:00:03', '2021-08-20 12:57:29');
INSERT INTO `asociados` VALUES (70, '28', 70174.11, 54070.66, 613.02, 7, 0, 0, 20.00, 67.84, 2, '2001-06-02', '2005-01-05 15:39:28', '2005-04-05 22:46:18');
INSERT INTO `asociados` VALUES (71, '43', 41140.47, 9318.66, 184.33, 10, 0, 0, 20.00, 56.12, 2, '2006-05-11', '2017-12-02 18:26:42', '2002-09-04 16:55:07');
INSERT INTO `asociados` VALUES (72, '118', 27260.71, 45741.19, 900.09, 3, 0, 0, 20.00, 51.31, 3, '2017-01-14', '2023-05-17 09:20:52', '2008-02-24 07:11:30');
INSERT INTO `asociados` VALUES (73, '117', 49853.35, 57552.14, 681.43, 10, 0, 0, 20.00, 40.50, 3, '2007-06-12', '2004-12-24 23:33:58', '2006-12-25 21:19:05');
INSERT INTO `asociados` VALUES (74, '37', 47711.74, 10314.31, 17.71, 2, 0, 0, 20.00, 71.33, 1, '2013-08-12', '2001-03-24 18:22:19', '2003-08-08 09:42:59');
INSERT INTO `asociados` VALUES (75, '86', 27032.88, 79507.91, 425.28, 4, 0, 0, 20.00, 49.30, 1, '2017-10-27', '2020-05-25 11:47:46', '2014-06-23 07:33:44');
INSERT INTO `asociados` VALUES (76, '83', 79716.37, 65457.50, 708.63, 2, 0, 0, 20.00, 37.91, 1, '2006-03-27', '2011-01-10 01:19:16', '2020-01-15 14:38:50');
INSERT INTO `asociados` VALUES (77, '83', 46776.75, 30496.76, 611.25, 8, 0, 0, 20.00, 70.94, 2, '2013-11-09', '2002-10-11 01:04:22', '2012-04-16 09:03:19');
INSERT INTO `asociados` VALUES (78, '46', 59548.43, 38777.79, 758.83, 7, 0, 0, 20.00, 99.25, 3, '2007-04-22', '2017-03-14 06:10:01', '2010-08-23 00:55:40');
INSERT INTO `asociados` VALUES (79, '107', 45991.20, 24288.86, 880.97, 4, 0, 0, 20.00, 37.79, 2, '2004-03-26', '2021-03-28 19:05:03', '2013-04-17 14:36:44');
INSERT INTO `asociados` VALUES (80, '64', 10736.24, 26850.60, 442.58, 8, 0, 0, 20.00, 29.02, 1, '2017-10-05', '2021-09-10 09:56:42', '2013-06-02 15:37:46');
INSERT INTO `asociados` VALUES (81, '107', 94071.70, 73625.82, 135.38, 2, 0, 0, 20.00, 89.82, 3, '2021-03-03', '2013-09-21 13:02:24', '2001-06-20 23:09:29');
INSERT INTO `asociados` VALUES (82, '14', 40061.98, 12270.60, 487.58, 4, 0, 0, 20.00, 77.32, 1, '2010-05-08', '2000-05-11 03:50:52', '2017-02-04 02:29:53');
INSERT INTO `asociados` VALUES (83, '59', 77350.97, 36476.35, 565.68, 6, 0, 0, 20.00, 65.40, 1, '2001-06-25', '2006-07-12 16:54:02', '2022-10-10 06:16:03');
INSERT INTO `asociados` VALUES (84, '56', 76727.62, 65361.24, 837.86, 5, 0, 0, 20.00, 67.44, 3, '2011-09-01', '2020-03-09 02:51:53', '2002-11-23 22:51:19');
INSERT INTO `asociados` VALUES (85, '88', 58681.62, 55393.30, 472.25, 5, 0, 0, 20.00, 60.75, 1, '2021-05-17', '2018-08-22 16:06:59', '2000-10-24 15:49:05');
INSERT INTO `asociados` VALUES (86, '24', 7113.08, 57753.73, 221.22, 4, 0, 0, 20.00, 21.37, 2, '2006-11-17', '2021-12-05 21:15:16', '2004-11-04 00:30:52');
INSERT INTO `asociados` VALUES (87, '19', 8409.74, 16422.08, 553.65, 8, 0, 0, 20.00, 24.89, 3, '2018-06-11', '2002-11-30 18:30:19', '2022-07-05 08:04:52');
INSERT INTO `asociados` VALUES (88, '132', 67204.12, 98564.16, 976.67, 8, 0, 0, 20.00, 22.43, 2, '2023-05-15', '2014-01-30 13:17:51', '2001-07-11 14:33:31');
INSERT INTO `asociados` VALUES (89, '114', 40000.87, 53804.43, 288.66, 1, 0, 0, 20.00, 84.93, 2, '2015-10-06', '2023-05-09 03:09:49', '2014-05-18 09:25:12');
INSERT INTO `asociados` VALUES (90, '20', 48108.98, 32773.89, 808.05, 7, 0, 0, 20.00, 66.24, 2, '2021-02-14', '2002-02-14 01:00:56', '2007-06-25 14:50:12');
INSERT INTO `asociados` VALUES (91, '47', 54920.00, 49648.71, 584.51, 10, 0, 0, 20.00, 59.95, 2, '2015-09-16', '2018-07-28 15:00:57', '2003-10-07 05:43:22');
INSERT INTO `asociados` VALUES (92, '22', 41564.75, 13921.13, 968.81, 6, 0, 0, 20.00, 47.86, 2, '2016-05-19', '2007-09-04 18:52:59', '2022-10-13 10:04:10');
INSERT INTO `asociados` VALUES (93, '142', 84983.57, 17801.13, 801.86, 4, 0, 0, 20.00, 30.43, 2, '2000-09-19', '2010-11-01 11:10:50', '2006-12-06 11:11:47');
INSERT INTO `asociados` VALUES (94, '49', 18873.92, 46802.27, 382.04, 6, 0, 0, 20.00, 46.72, 2, '2004-01-18', '2008-05-25 21:44:01', '2018-09-17 08:34:21');
INSERT INTO `asociados` VALUES (95, '88', 82914.19, 33399.41, 812.72, 8, 0, 0, 20.00, 42.58, 2, '2012-07-12', '2006-03-13 10:07:13', '2002-08-22 03:33:09');
INSERT INTO `asociados` VALUES (96, '107', 46842.49, 11612.74, 471.10, 2, 0, 0, 20.00, 73.24, 2, '2008-05-29', '2006-07-14 19:53:39', '2008-03-09 21:01:23');
INSERT INTO `asociados` VALUES (97, '119', 60194.73, 30275.82, 838.43, 5, 0, 0, 20.00, 24.03, 3, '2010-04-27', '2020-10-03 01:54:45', '2013-02-03 11:02:32');
INSERT INTO `asociados` VALUES (98, '111', 3003.66, 29824.18, 7.58, 3, 0, 0, 20.00, 25.00, 3, '2022-12-19', '2002-04-24 04:09:05', '2015-04-14 05:25:54');
INSERT INTO `asociados` VALUES (99, '58', 24483.00, 58986.61, 388.09, 6, 0, 0, 20.00, 20.89, 2, '2002-10-02', '2018-11-20 23:36:06', '2000-08-07 18:26:33');
INSERT INTO `asociados` VALUES (100, '140', 28818.81, 47800.87, 536.81, 7, 0, 0, 20.00, 59.92, 3, '2007-10-11', '2006-10-14 18:41:28', '2007-06-04 20:54:34');
INSERT INTO `asociados` VALUES (101, '18', 12845.54, 84030.51, 544.09, 7, 0, 0, 20.00, 86.82, 3, '2003-06-14', '2000-12-31 01:35:26', '2016-12-31 05:43:29');
INSERT INTO `asociados` VALUES (102, '122', 18135.57, 8982.72, 786.90, 5, 0, 0, 20.00, 42.71, 2, '2017-03-13', '2003-11-09 19:25:43', '2011-12-14 03:10:26');
INSERT INTO `asociados` VALUES (103, '31', 58501.06, 23290.14, 444.81, 8, 0, 0, 20.00, 72.67, 1, '2000-11-09', '2012-02-18 00:38:49', '2017-05-30 01:58:01');
INSERT INTO `asociados` VALUES (104, '97', 56644.32, 5046.35, 601.72, 6, 0, 0, 20.00, 21.42, 2, '2009-04-13', '2008-10-09 02:39:55', '2019-07-26 23:09:20');
INSERT INTO `asociados` VALUES (105, '104', 82732.77, 23493.28, 829.84, 5, 0, 0, 20.00, 72.21, 2, '2005-04-24', '2020-03-13 06:06:38', '2009-06-08 09:00:14');
INSERT INTO `asociados` VALUES (106, '48', 11446.15, 48689.90, 883.60, 8, 0, 0, 20.00, 71.47, 2, '2010-06-03', '2008-10-21 20:18:49', '2019-12-28 11:16:49');
INSERT INTO `asociados` VALUES (107, '60', 72726.82, 450.04, 362.10, 1, 0, 0, 20.00, 40.52, 2, '2004-07-18', '2011-04-10 09:05:28', '2008-12-26 18:51:32');
INSERT INTO `asociados` VALUES (108, '120', 24677.71, 24843.19, 434.79, 6, 0, 0, 20.00, 65.66, 1, '2006-04-18', '2020-11-20 03:17:44', '2018-05-01 03:14:54');
INSERT INTO `asociados` VALUES (109, '31', 82460.65, 87342.40, 849.91, 8, 0, 0, 20.00, 50.66, 1, '2017-07-27', '2020-03-13 09:40:15', '2015-08-10 21:18:38');
INSERT INTO `asociados` VALUES (110, '123', 30645.31, 75948.66, 282.56, 1, 0, 0, 20.00, 85.59, 3, '2003-03-07', '2022-07-28 22:54:17', '2012-05-13 11:11:18');
INSERT INTO `asociados` VALUES (111, '46', 2.00, 5.00, 5.00, 5, 83, NULL, 5.00, 5.00, 1, '2023-06-08', '2023-06-09 00:43:29', '2023-06-09 00:43:29');

-- ----------------------------
-- Table structure for beneficiarios
-- ----------------------------
DROP TABLE IF EXISTS `beneficiarios`;
CREATE TABLE `beneficiarios`  (
  `id_beneficiario` int NOT NULL AUTO_INCREMENT,
  `id_asociado` int NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `porcentaje` decimal(10, 2) NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_beneficiario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 130 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of beneficiarios
-- ----------------------------
INSERT INTO `beneficiarios` VALUES (19, NULL, '4', 's', 4.00, 's', '2023-06-08 02:00:51', '2023-06-08 02:01:02');
INSERT INTO `beneficiarios` VALUES (20, 5, 'Luis', 'hermano', 5.00, 'Direccion', '2023-06-08 02:01:42', '2023-06-08 02:03:34');
INSERT INTO `beneficiarios` VALUES (21, 5, 'asd', 'as', 25.00, '50', '2023-06-08 02:03:53', '2023-06-08 02:03:53');
INSERT INTO `beneficiarios` VALUES (22, 1, 'sas', 'as', 6.00, 'r', '2023-06-08 02:33:42', '2023-06-08 02:33:42');
INSERT INTO `beneficiarios` VALUES (23, 5, 'prueba', 'asd', 5.00, '5', '2023-06-08 02:43:43', '2023-06-08 02:43:43');
INSERT INTO `beneficiarios` VALUES (24, 6, 'Luis Marquez', 'Primo', 25.00, 'meanguera', '2023-06-08 03:14:50', '2023-06-08 03:14:50');
INSERT INTO `beneficiarios` VALUES (25, 6, 'kennyl', 'Hijo', 25.00, 'Meanguera', '2023-06-08 03:16:08', '2023-06-08 03:16:08');
INSERT INTO `beneficiarios` VALUES (27, 7, 'Luis', 'asd', 2.00, 'meanguera', '2023-06-08 14:33:49', '2023-06-08 14:33:49');
INSERT INTO `beneficiarios` VALUES (28, 92, 'Sean Black', 'Mrs.', 99.92, '744 S Broadway', '2012-04-05 01:47:23', '2009-05-28 15:10:27');
INSERT INTO `beneficiarios` VALUES (29, 47, 'Gerald Holmes', 'Mr.', 29.08, '229 Figueroa Street', '2007-07-13 19:59:42', '2019-07-14 05:40:03');
INSERT INTO `beneficiarios` VALUES (30, 14, 'Albert Fisher', 'Prof.', 24.23, '527 Bank Street', '2020-05-09 07:14:04', '2015-09-15 10:51:01');
INSERT INTO `beneficiarios` VALUES (31, 45, 'Steven Guzman', 'Ms.', 84.68, '525 Grape Street', '2013-08-23 02:33:34', '2007-02-14 15:13:00');
INSERT INTO `beneficiarios` VALUES (32, 92, 'Kathleen Thomas', 'Prof.', 6.37, '587 Central Avenue', '2014-07-17 20:46:41', '2006-03-31 06:49:17');
INSERT INTO `beneficiarios` VALUES (33, 35, 'Craig Kennedy', 'Mr.', 29.39, '204 S Broadway', '2014-08-05 20:57:26', '2019-04-04 01:11:26');
INSERT INTO `beneficiarios` VALUES (34, 91, 'Ashley Mendoza', 'Miss.', 83.89, '194 Wooster Street', '2010-10-15 06:45:36', '2010-10-30 00:54:25');
INSERT INTO `beneficiarios` VALUES (35, 100, 'Margaret Tucker', 'Prof.', 36.78, '48 Collier Road', '2009-08-26 22:05:43', '2011-05-06 17:27:41');
INSERT INTO `beneficiarios` VALUES (36, 85, 'Judith Porter', 'Miss.', 17.68, '522 Collier Road', '2012-05-17 19:15:23', '2022-10-09 09:38:09');
INSERT INTO `beneficiarios` VALUES (37, 34, 'Barry Baker', 'Prof.', 45.40, '415 Riverview Road', '2021-09-10 12:19:47', '2023-02-02 06:28:50');
INSERT INTO `beneficiarios` VALUES (38, 17, 'Jacob Robinson', 'Ms.', 29.31, '338 Ridgewood Road', '2011-10-21 15:33:25', '2010-10-05 08:54:36');
INSERT INTO `beneficiarios` VALUES (39, 68, 'Charles Edwards', 'Prof.', 96.46, '293 State Street', '2020-03-31 20:11:34', '2000-10-30 11:32:45');
INSERT INTO `beneficiarios` VALUES (40, 20, 'Phyllis Ruiz', 'Mrs.', 72.84, '770 Ridgewood Road', '2013-02-27 00:38:46', '2002-12-23 01:20:35');
INSERT INTO `beneficiarios` VALUES (41, 41, 'Johnny Davis', 'Mr.', 35.76, '124 Diplomacy Drive', '2007-08-18 19:40:46', '2001-01-29 10:07:18');
INSERT INTO `beneficiarios` VALUES (42, 87, 'Andrew Robertson', 'Mr.', 3.62, '165 Pedway', '2008-06-21 01:15:47', '2020-01-03 02:18:50');
INSERT INTO `beneficiarios` VALUES (43, 86, 'Nancy Burns', 'Ms.', 2.27, '624 Wall Street', '2015-12-01 06:42:56', '2021-07-10 12:51:08');
INSERT INTO `beneficiarios` VALUES (44, 54, 'Ethel Campbell', 'Mrs.', 36.27, '745 Ridgewood Road', '2019-10-29 15:46:49', '2016-12-03 01:09:47');
INSERT INTO `beneficiarios` VALUES (45, 80, 'Allen Garza', 'Mr.', 73.24, '106 East Cooke Road', '2017-04-21 12:54:27', '2017-09-21 11:23:36');
INSERT INTO `beneficiarios` VALUES (46, 68, 'Albert Edwards', 'Mrs.', 81.90, '957 Canal Street', '2008-09-15 23:34:19', '2001-01-04 08:28:19');
INSERT INTO `beneficiarios` VALUES (47, 21, 'Daniel Russell', 'Ms.', 93.29, '728 Wall Street', '2009-04-09 11:37:10', '2011-01-06 18:44:06');
INSERT INTO `beneficiarios` VALUES (48, 59, 'Edna Reed', 'Mrs.', 56.67, '661 Canal Street', '2005-10-10 08:22:54', '2007-08-27 10:28:37');
INSERT INTO `beneficiarios` VALUES (49, 23, 'Luis Scott', 'Prof.', 47.59, '614 Flatbush Ave', '2006-10-05 06:24:17', '2017-01-10 18:52:58');
INSERT INTO `beneficiarios` VALUES (50, 37, 'Manuel Nguyen', 'Prof.', 84.06, '497 West Houston Street', '2005-04-22 15:40:42', '2021-09-21 12:23:03');
INSERT INTO `beneficiarios` VALUES (51, 35, 'Laura Hawkins', 'Mrs.', 41.50, '450 Fifth Avenue', '2000-11-22 20:58:54', '2022-08-10 19:23:12');
INSERT INTO `beneficiarios` VALUES (52, 15, 'Michael Nguyen', 'Mr.', 60.95, '818 Riverview Road', '2010-01-13 12:59:55', '2018-03-03 10:40:37');
INSERT INTO `beneficiarios` VALUES (53, 26, 'Victoria Henry', 'Mr.', 75.27, '970 Figueroa Street', '2012-10-26 12:30:47', '2019-04-07 21:05:10');
INSERT INTO `beneficiarios` VALUES (54, 65, 'Peggy Hunter', 'Prof.', 64.33, '767 1st Ave', '2006-01-05 05:00:27', '2000-09-20 05:29:44');
INSERT INTO `beneficiarios` VALUES (55, 36, 'Ray White', 'Prof.', 38.92, '97 East Alley', '2017-05-17 00:41:51', '2010-01-18 20:58:58');
INSERT INTO `beneficiarios` VALUES (56, 46, 'Julie Castillo', 'Prof.', 69.08, '691 Tremont Road', '2017-02-10 08:31:54', '2013-08-05 23:38:21');
INSERT INTO `beneficiarios` VALUES (57, 11, 'Dorothy Shaw', 'hermano', 87.72, '768 East Alley', '2019-01-15 06:28:30', '2023-06-09 00:04:36');
INSERT INTO `beneficiarios` VALUES (58, 15, 'Dale Alexander', 'Mr.', 98.99, '928 State Street', '2005-07-26 08:21:48', '2013-07-15 20:03:13');
INSERT INTO `beneficiarios` VALUES (59, 59, 'Glenn Harrison', 'Prof.', 91.31, '842 Sky Way', '2008-05-26 18:06:58', '2014-03-19 09:05:31');
INSERT INTO `beneficiarios` VALUES (60, 29, 'Amber Olson', 'Miss.', 44.30, '858 Alameda Street', '2001-04-14 20:03:04', '2017-09-24 13:32:18');
INSERT INTO `beneficiarios` VALUES (61, 85, 'Judy Mendoza', 'Mr.', 42.85, '360 Rush Street', '2017-05-15 12:50:30', '2020-11-18 18:12:56');
INSERT INTO `beneficiarios` VALUES (62, 23, 'Amanda Owens', 'Mrs.', 7.14, '512 Riverview Road', '2008-06-18 16:03:12', '2021-06-22 02:16:35');
INSERT INTO `beneficiarios` VALUES (63, 60, 'Edward Ramos', 'Prof.', 2.99, '810 S Broadway', '2004-07-14 05:40:48', '2017-09-13 00:44:01');
INSERT INTO `beneficiarios` VALUES (64, 97, 'Miguel Hawkins', 'Ms.', 8.90, '399 Wicklow Road', '2013-05-13 21:43:39', '2001-06-14 19:37:47');
INSERT INTO `beneficiarios` VALUES (65, 48, 'Alexander Gonzales', 'Mrs.', 90.76, '256 State Street', '2021-02-09 20:33:25', '2013-02-02 16:52:56');
INSERT INTO `beneficiarios` VALUES (66, 32, 'Nicholas Graham', 'Mrs.', 45.36, '82 Fern Street', '2004-05-18 03:11:55', '2013-05-15 23:27:48');
INSERT INTO `beneficiarios` VALUES (67, 76, 'Scott Patel', 'Prof.', 67.86, '415 Bergen St', '2010-07-26 19:56:48', '2014-09-12 16:48:47');
INSERT INTO `beneficiarios` VALUES (68, 63, 'Terry Harrison', 'Prof.', 96.56, '596 Central Avenue', '2021-09-07 12:01:21', '2016-04-01 15:50:51');
INSERT INTO `beneficiarios` VALUES (69, 32, 'Emma Reed', 'Mr.', 51.23, '859 North Michigan Ave', '2017-10-05 13:14:37', '2016-10-15 13:55:21');
INSERT INTO `beneficiarios` VALUES (70, 18, 'Jeremy West', 'Miss.', 30.48, '406 Fifth Avenue', '2023-01-09 20:21:45', '2016-08-11 15:24:33');
INSERT INTO `beneficiarios` VALUES (71, 83, 'Patrick Sanders', 'Prof.', 76.87, '121 Broadway', '2009-04-26 23:13:13', '2012-08-01 13:52:38');
INSERT INTO `beneficiarios` VALUES (72, 77, 'Craig Hill', 'Mr.', 12.05, '340 Sky Way', '2008-01-10 22:54:13', '2015-10-01 16:47:35');
INSERT INTO `beneficiarios` VALUES (73, 35, 'Francisco Stevens', 'Mr.', 21.79, '569 Lark Street', '2016-05-22 04:51:34', '2010-11-23 03:31:45');
INSERT INTO `beneficiarios` VALUES (74, 75, 'Steven Castillo', 'Miss.', 93.28, '665 Ridgewood Road', '2004-02-27 12:21:07', '2002-12-23 03:17:15');
INSERT INTO `beneficiarios` VALUES (75, 92, 'Philip Perez', 'Mrs.', 14.86, '981 East Alley', '2016-02-08 02:43:32', '2017-03-01 17:19:49');
INSERT INTO `beneficiarios` VALUES (76, 98, 'Jeremy Stevens', 'Mr.', 8.11, '271 Wicklow Road', '2004-10-10 21:37:49', '2014-12-07 20:18:24');
INSERT INTO `beneficiarios` VALUES (77, 19, 'Susan Garcia', 'Ms.', 94.49, '247 S Broadway', '2000-06-05 14:54:40', '2002-04-23 05:20:17');
INSERT INTO `beneficiarios` VALUES (78, 91, 'Kimberly Aguilar', 'Prof.', 68.35, '822 Tremont Road', '2013-03-23 22:55:01', '2014-02-28 16:32:03');
INSERT INTO `beneficiarios` VALUES (79, 80, 'Alice Olson', 'Mrs.', 56.93, '623 Wall Street', '2023-01-15 02:42:07', '2020-12-14 01:28:58');
INSERT INTO `beneficiarios` VALUES (80, 74, 'Kathy Richardson', 'Mrs.', 60.49, '869 Flatbush Ave', '2018-12-16 08:25:19', '2005-08-06 22:06:10');
INSERT INTO `beneficiarios` VALUES (81, 60, 'Benjamin Turner', 'Mrs.', 55.92, '51 Broadway', '2008-08-28 01:20:17', '2006-07-06 02:09:38');
INSERT INTO `beneficiarios` VALUES (82, 92, 'Andrew Collins', 'Mrs.', 61.44, '756 Tremont Road', '2021-05-24 16:10:31', '2014-07-21 17:47:18');
INSERT INTO `beneficiarios` VALUES (83, 23, 'Dorothy Ortiz', 'Miss.', 13.16, '724 East Alley', '2004-09-29 03:10:40', '2009-11-14 18:15:34');
INSERT INTO `beneficiarios` VALUES (84, 50, 'Carlos Jones', 'Mr.', 91.00, '943 West Houston Street', '2001-06-29 21:48:04', '2012-09-05 08:05:52');
INSERT INTO `beneficiarios` VALUES (85, 61, 'Rodney Gordon', 'Ms.', 79.63, '798 1st Ave', '2008-08-27 17:28:24', '2004-05-04 01:00:15');
INSERT INTO `beneficiarios` VALUES (86, 59, 'Frances Hicks', 'Mr.', 14.46, '12 Bank Street', '2022-06-07 20:13:05', '2011-05-03 14:55:42');
INSERT INTO `beneficiarios` VALUES (87, 86, 'Tracy Johnson', 'Prof.', 2.07, '326 Grape Street', '2001-03-13 12:43:25', '2008-02-16 15:28:04');
INSERT INTO `beneficiarios` VALUES (88, 92, 'Heather Freeman', 'Prof.', 76.00, '586 Lark Street', '2014-11-12 02:07:43', '2005-08-03 15:04:46');
INSERT INTO `beneficiarios` VALUES (89, 46, 'Gerald Chen', 'Mrs.', 59.26, '761 Columbia St', '2018-04-28 22:34:27', '2010-06-02 17:53:53');
INSERT INTO `beneficiarios` VALUES (90, 98, 'Connie Gonzalez', 'Mrs.', 40.06, '84 Columbia St', '2021-06-11 06:29:01', '2015-11-23 05:49:15');
INSERT INTO `beneficiarios` VALUES (91, 70, 'Victoria Morris', 'Ms.', 71.74, '596 Riverview Road', '2010-10-10 20:27:28', '2022-10-13 10:56:27');
INSERT INTO `beneficiarios` VALUES (92, 25, 'Kim Vargas', 'Miss.', 98.93, '405 Wicklow Road', '2017-09-14 12:40:30', '2019-11-12 02:02:51');
INSERT INTO `beneficiarios` VALUES (93, 35, 'Monica Nichols', 'Prof.', 95.73, '576 Central Avenue', '2017-01-21 17:02:04', '2003-11-29 23:31:17');
INSERT INTO `beneficiarios` VALUES (94, 81, 'Irene Wallace', 'Miss.', 22.41, '104 Diplomacy Drive', '2008-01-21 08:34:24', '2003-10-23 12:54:17');
INSERT INTO `beneficiarios` VALUES (95, 84, 'Kimberly Castillo', 'Mrs.', 43.72, '825 Ridgewood Road', '2008-09-02 04:45:47', '2022-02-11 02:29:06');
INSERT INTO `beneficiarios` VALUES (96, 57, 'Wanda Shaw', 'Miss.', 2.48, '309 Broadway', '2015-05-18 06:23:58', '2002-12-14 17:07:12');
INSERT INTO `beneficiarios` VALUES (97, 66, 'Bryan Fisher', 'Ms.', 82.79, '487 State Street', '2015-11-20 21:21:28', '2016-02-28 23:30:08');
INSERT INTO `beneficiarios` VALUES (98, 82, 'Bradley Alvarez', 'Hermano', 43.72, '577 Central Avenue', '2005-01-31 05:43:01', '2023-06-08 23:30:52');
INSERT INTO `beneficiarios` VALUES (99, 79, 'Rose Wallace', 'Miss.', 47.19, '952 North Michigan Ave', '2017-01-31 14:02:51', '2015-06-22 15:31:51');
INSERT INTO `beneficiarios` VALUES (100, 80, 'Jennifer James', 'Prof.', 69.24, '605 Canal Street', '2015-06-30 03:14:49', '2012-11-25 20:25:40');
INSERT INTO `beneficiarios` VALUES (101, 34, 'Stanley Salazar', 'Prof.', 29.45, '969 Grape Street', '2008-01-30 09:55:33', '2019-07-01 21:54:17');
INSERT INTO `beneficiarios` VALUES (102, 64, 'Chad Carter', 'Mr.', 68.21, '599 S Broadway', '2019-11-24 00:28:33', '2014-08-18 12:39:56');
INSERT INTO `beneficiarios` VALUES (103, 31, 'Alice Porter', 'Ms.', 95.93, '296 Pedway', '2006-08-05 20:58:03', '2012-05-14 10:05:26');
INSERT INTO `beneficiarios` VALUES (104, 25, 'Wendy Jimenez', 'Ms.', 38.90, '694 S Broadway', '2004-11-03 15:05:47', '2002-11-26 08:53:33');
INSERT INTO `beneficiarios` VALUES (105, 63, 'Helen Russell', 'Mrs.', 70.55, '815 Sky Way', '2008-08-01 08:51:29', '2022-09-14 19:10:25');
INSERT INTO `beneficiarios` VALUES (106, 14, 'Jean Smith', 'Mr.', 81.56, '43 Grape Street', '2006-12-21 19:30:59', '2009-10-17 17:54:07');
INSERT INTO `beneficiarios` VALUES (107, 92, 'Larry Rice', 'Prof.', 54.21, '514 Tremont Road', '2017-03-22 22:35:04', '2001-03-11 14:42:29');
INSERT INTO `beneficiarios` VALUES (108, 16, 'Joyce Hawkins', 'Ms.', 8.35, '954 Pedway', '2000-02-27 11:35:11', '2003-11-07 21:47:02');
INSERT INTO `beneficiarios` VALUES (109, 47, 'Anita Miller', 'Prof.', 87.25, '751 Wall Street', '2022-01-19 09:32:59', '2000-05-26 20:23:40');
INSERT INTO `beneficiarios` VALUES (110, 63, 'Eleanor Morris', 'Miss.', 79.98, '744 Alameda Street', '2010-02-12 18:58:18', '2013-03-18 05:15:25');
INSERT INTO `beneficiarios` VALUES (111, 84, 'Norman Gordon', 'Mr.', 97.69, '153 Riverview Road', '2000-07-09 18:38:27', '2010-10-15 02:01:21');
INSERT INTO `beneficiarios` VALUES (112, 68, 'Ashley Adams', 'Prof.', 93.22, '708 Bank Street', '2014-10-01 17:00:31', '2023-01-05 18:48:46');
INSERT INTO `beneficiarios` VALUES (113, 91, 'Victoria Adams', 'Miss.', 28.99, '304 Wall Street', '2021-12-12 18:54:13', '2017-08-09 02:13:49');
INSERT INTO `beneficiarios` VALUES (114, 16, 'Emma Mendoza', 'Prof.', 77.22, '261 Wooster Street', '2004-09-01 07:06:46', '2008-08-27 20:29:37');
INSERT INTO `beneficiarios` VALUES (115, 94, 'Joseph Perez', 'Ms.', 36.45, '539 Figueroa Street', '2003-02-22 10:08:22', '2003-03-19 10:22:21');
INSERT INTO `beneficiarios` VALUES (116, 56, 'Debbie Nichols', 'Prof.', 7.04, '598 Sky Way', '2000-12-23 12:24:27', '2012-07-01 22:18:24');
INSERT INTO `beneficiarios` VALUES (117, 28, 'Sarah Nelson', 'Ms.', 44.16, '814 Wicklow Road', '2016-07-31 09:51:02', '2021-10-17 22:45:35');
INSERT INTO `beneficiarios` VALUES (118, 100, 'Connie Clark', 'Prof.', 19.26, '272 Broadway', '2012-12-26 21:35:36', '2020-08-28 06:21:08');
INSERT INTO `beneficiarios` VALUES (119, 76, 'Alexander Rice', 'Prof.', 57.50, '796 Tremont Road', '2014-02-22 05:27:34', '2021-07-28 02:57:25');
INSERT INTO `beneficiarios` VALUES (120, 50, 'Rose Torres', 'Mrs.', 75.11, '738 Riverview Road', '2011-09-02 01:54:26', '2002-01-10 08:08:50');
INSERT INTO `beneficiarios` VALUES (121, 19, 'April Gardner', 'Miss.', 9.23, '881 Riverview Road', '2006-07-28 11:33:44', '2010-08-23 01:35:18');
INSERT INTO `beneficiarios` VALUES (122, 71, 'Janet Freeman', 'Prof.', 65.15, '349 Broadway', '2003-07-25 21:00:28', '2007-12-14 22:16:11');
INSERT INTO `beneficiarios` VALUES (123, 53, 'Jamie Murray', 'Miss.', 72.76, '270 State Street', '2015-10-06 21:34:36', '2014-08-27 14:43:30');
INSERT INTO `beneficiarios` VALUES (124, 25, 'Linda Johnson', 'Miss.', 85.06, '904 Tremont Road', '2001-01-10 21:47:44', '2021-10-16 06:57:32');
INSERT INTO `beneficiarios` VALUES (125, 88, 'Donna Spencer', 'Mrs.', 50.49, '960 Fifth Avenue', '2015-04-15 09:04:19', '2001-02-12 21:26:26');
INSERT INTO `beneficiarios` VALUES (126, 38, 'Nathan Jimenez', 'Miss.', 81.85, '214 Broadway', '2005-11-16 02:16:49', '2006-08-04 01:34:58');
INSERT INTO `beneficiarios` VALUES (127, 76, 'Edward Ward', 'Mr.', 92.62, '896 Diplomacy Drive', '2000-08-06 11:02:57', '2011-07-10 22:38:24');
INSERT INTO `beneficiarios` VALUES (128, 10, 'Luis', 'Primo', 5.00, '10', '2023-06-09 01:05:11', '2023-06-09 01:05:11');
INSERT INTO `beneficiarios` VALUES (129, 13, 'HKHKJ', 'GFDGF', 50.00, 'CDSFD', '2023-06-12 17:49:18', '2023-06-12 17:49:18');

-- ----------------------------
-- Table structure for bobeda
-- ----------------------------
DROP TABLE IF EXISTS `bobeda`;
CREATE TABLE `bobeda`  (
  `id_bobeda` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `saldo_bobeda` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_bobeda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bobeda
-- ----------------------------
INSERT INTO `bobeda` VALUES (1, 'Bobeda General', 116759.00, NULL, '2023-06-12 17:47:34');

-- ----------------------------
-- Table structure for bobeda_movimientos
-- ----------------------------
DROP TABLE IF EXISTS `bobeda_movimientos`;
CREATE TABLE `bobeda_movimientos`  (
  `id_bobeda_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_bobeda` int NULL DEFAULT NULL,
  `id_caja` int NULL DEFAULT NULL,
  `tipo_operacion` int NULL DEFAULT NULL COMMENT '1-traslado 2-recepcion',
  `monto` decimal(10, 2) NOT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-enviada \r\n2-recivida\r\n3-cancelada\r\n4-anulada',
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_operacion` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_bobeda_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1086 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bobeda_movimientos
-- ----------------------------
INSERT INTO `bobeda_movimientos` VALUES (1072, 1, 44, 1, 500.00, NULL, 1, 'asd', NULL, '2023-06-12 08:07:43', '2023-06-12 08:07:43');
INSERT INTO `bobeda_movimientos` VALUES (1073, 1, 44, 1, 4.00, NULL, 1, '45', '2023-06-11 00:00:00', '2023-06-12 08:10:35', '2023-06-12 08:10:35');
INSERT INTO `bobeda_movimientos` VALUES (1074, 1, 44, 1, 4.00, NULL, 1, '45', '2023-06-12 00:00:00', '2023-06-12 08:10:44', '2023-06-12 08:10:44');
INSERT INTO `bobeda_movimientos` VALUES (1075, 1, 44, 1, 12.00, NULL, 1, '12', '2023-06-12 08:11:16', '2023-06-12 08:11:16', '2023-06-12 08:11:16');
INSERT INTO `bobeda_movimientos` VALUES (1076, 1, 44, 1, 66.00, NULL, 1, '6', '2023-06-12 08:12:32', '2023-06-12 08:12:32', '2023-06-12 08:12:32');
INSERT INTO `bobeda_movimientos` VALUES (1077, 1, 44, 1, 500.00, NULL, 2, 'xsdfsdf', '2023-06-12 08:38:02', '2023-06-12 08:38:02', '2023-06-12 08:38:02');
INSERT INTO `bobeda_movimientos` VALUES (1078, 1, 44, 1, 500.00, NULL, 1, 'xsdfsdf', '2023-06-12 08:38:47', '2023-06-12 08:38:47', '2023-06-12 08:38:47');
INSERT INTO `bobeda_movimientos` VALUES (1079, 1, 44, 2, 1000.00, NULL, 1, 'caja1', '2023-06-12 08:41:01', '2023-06-12 08:41:01', '2023-06-12 08:41:01');
INSERT INTO `bobeda_movimientos` VALUES (1080, 1, 22, 2, 150000.00, NULL, 1, 'sad', '2023-06-12 08:41:46', '2023-06-12 08:41:46', '2023-06-12 08:41:46');
INSERT INTO `bobeda_movimientos` VALUES (1081, 1, 22, 2, 150000.00, NULL, 1, 'sad', '2023-06-12 08:42:07', '2023-06-12 08:42:07', '2023-06-12 08:42:07');
INSERT INTO `bobeda_movimientos` VALUES (1082, 1, 22, 2, 15000.00, NULL, 1, 'asdasd', '2023-06-12 08:42:33', '2023-06-12 08:42:33', '2023-06-12 08:42:33');
INSERT INTO `bobeda_movimientos` VALUES (1083, 1, 22, 2, 15000.00, NULL, 2, 'asdasd', '2023-06-12 08:43:09', '2023-06-12 08:43:09', '2023-06-12 08:43:09');
INSERT INTO `bobeda_movimientos` VALUES (1084, 1, 44, 2, 50.00, NULL, 1, '5656', '2023-06-12 09:00:31', '2023-06-12 09:00:31', '2023-06-12 09:00:31');
INSERT INTO `bobeda_movimientos` VALUES (1085, 1, 44, 1, 5000.00, NULL, 1, 'HGHG', '2023-06-12 17:47:34', '2023-06-12 17:47:34', '2023-06-12 17:47:34');

-- ----------------------------
-- Table structure for cajas
-- ----------------------------
DROP TABLE IF EXISTS `cajas`;
CREATE TABLE `cajas`  (
  `id_caja` int NOT NULL AUTO_INCREMENT,
  `numero_caja` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado_caja` int NULL DEFAULT NULL COMMENT '0- cerrada 1-aperturada',
  `id_usuario_asignado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_caja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cajas
-- ----------------------------
INSERT INTO `cajas` VALUES (22, 'Caja # 1', 1, 9, '2023-06-10 15:28:19', '2023-06-10 15:28:19');
INSERT INTO `cajas` VALUES (45, 'Caja #3', 1, 6, '2023-06-12 22:05:28', '2023-06-12 22:21:44');
INSERT INTO `cajas` VALUES (46, 'Caja 5', 0, 4, '2023-06-12 22:07:03', '2023-06-12 22:07:03');
INSERT INTO `cajas` VALUES (47, 'caja 6', 0, 20, '2023-06-12 22:08:22', '2023-06-12 22:08:22');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `genero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_nacimiento` date NULL DEFAULT NULL,
  `dui_cliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dui_extendido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_expedicion` date NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nacionalidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado_civil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion_personal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion_negocio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nombre_negocio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `tipo_vivienda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `observaciones` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (6, 'Luis Arnulfo Márquez Argueta', '1', '2023-06-08', '037316717-7', 'gotera', '2023-06-05', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '0', 'Ninguna observacion', 1, '2023-06-08 14:00:24', '2023-06-09 00:08:36');
INSERT INTO `clientes` VALUES (11, 'Cheryl Barnes', '0', '2010-10-11', '037316717-7', '17413585-4', '2014-10-15', '3301186666', 'United States', 'Prof.', 'Akron', '877 Fern Street', 'Hunt Brothers Trading Inc.', '0', 'Strawberpy elite', 1, '2000-06-20 04:35:33', '2023-06-09 00:28:00');
INSERT INTO `clientes` VALUES (12, 'Matthew Cooper', 'M', '2017-12-09', '2013-10-14', '29842267-4', '2005-03-24', '2126101185', 'United States', 'Prof.', 'New York', '206 West Houston Street', 'Samuel Consultants Inc.', 'Prof.', 'prange se', 1, '2016-04-27 13:39:19', '2010-07-13 18:38:05');
INSERT INTO `clientes` VALUES (13, 'Ku Lai Yan', '0', '2004-05-01', '2015-05-2148', '89692133-7', '2016-12-08', '8381743169', 'United States', 'Ms.', 'Albany', '62 Central Avenue', 'Cole Brothers LLC', '0', 'xRambutan', 1, '2021-11-23 09:02:14', '2023-06-09 00:27:10');
INSERT INTO `clientes` VALUES (14, 'Nakamori Yuna', '0', '2005-01-02', '2005-05-31', '02371188-9', '2021-08-28', '3306244190', 'United States', 'Prof.', 'Akron', '350 West Market Street', 'Nichols Engineering Inc.', '0', 'Grape', 1, '2007-04-09 18:15:02', '2023-06-08 23:22:30');
INSERT INTO `clientes` VALUES (15, 'Sakai Riku', 'M', '2009-06-28', '2004-02-17', '99076091-3', '2015-02-12', '2124647235', 'United States', 'Prof.', 'New York', '8 Wooster Street', 'Bobby Trading LLC', 'Prof.', 'Strawbcrry', 1, '2007-06-05 04:10:23', '2008-09-16 08:24:55');
INSERT INTO `clientes` VALUES (16, 'Pak Chung Yin', 'M', '2009-11-17', '2018-02-25', '28120297-1', '2020-05-10', '2124894307', 'United States', 'Prof.', 'New York', '179 Fifth Avenue', 'Sanchez\'s LLC', 'Prof.', 'Cherry air', 1, '2010-08-21 01:48:58', '2010-02-19 23:04:27');
INSERT INTO `clientes` VALUES (17, 'Lai Tak Wah', 'M', '2021-03-13', '2007-09-17', '62103549-1', '2016-07-01', '3301609128', 'United States', 'Prof.', 'Akron', '484 Collier Road', 'Stewart\'s Consultants LLC', 'Prof.', 'Rambutan plus', 0, '2010-12-12 18:01:15', '2019-02-28 18:59:12');
INSERT INTO `clientes` VALUES (18, 'Marvin Martinez', 'M', '2009-01-07', '2000-05-24', '67749471-7', '2016-12-16', '6143040110', 'United States', 'Prof.', 'Columbus', '54 Diplomacy Drive', 'Florence Software Inc.', 'Prof.', 'Apple', 0, '2008-08-30 01:49:59', '2019-09-04 11:41:17');
INSERT INTO `clientes` VALUES (19, 'Debra Hall', 'F', '2021-01-15', '2004-02-18', '77182854-2', '2017-01-01', '6146719382', 'United States', 'Prof.', 'Columbus', '205 East Alley', 'Wells Engineering LLC', 'Mrs.', 'Raspberry pi', 0, '2002-12-05 16:48:02', '2012-07-22 16:08:00');
INSERT INTO `clientes` VALUES (20, 'Fan Cho Yee', 'F', '2007-04-20', '2002-03-20', '70613851-7', '2000-02-20', '6142889663', 'United States', 'Ms.', 'Columbus', '510 East Alley', 'Evans Software LLC', 'Mrs.', 'Orange elite', 1, '2009-01-03 21:13:33', '2008-09-12 13:31:08');
INSERT INTO `clientes` VALUES (21, 'Siu On Na', 'F', '2013-07-08', '2006-05-10', '27971647-7', '2014-04-11', '7186129787', 'United States', 'Prof.', 'Brooklyn', '342 Columbia St', 'Rodriguez Telecommunication Inc.', 'Mrs.', 'Strawberry', 0, '2000-09-06 19:10:58', '2008-06-19 20:36:28');
INSERT INTO `clientes` VALUES (22, 'Goto Aoshi', 'M', '2001-08-23', '2015-11-25', '21619703-5', '2012-12-24', '2130416865', 'United States', 'Prof.', 'Los Angeles', '861 Wall Street', 'Sullivan LLC', 'Prof.', 'Cherry', 0, '2017-06-12 05:23:33', '2013-06-18 05:40:05');
INSERT INTO `clientes` VALUES (23, 'Cheung Fat', 'M', '2013-08-16', '2009-12-05', '25631264-3', '2010-02-10', '3308515710', 'United States', 'Prof.', 'Akron', '697 Riverview Road', 'Gray Electronic LLC', 'Prof.', 'Raspbeery', 1, '2017-08-05 06:30:55', '2009-09-06 05:10:06');
INSERT INTO `clientes` VALUES (24, 'Zheng Ziyi', 'M', '2019-02-16', '2008-10-08', '53574906-1', '2020-06-03', '2133534981', 'United States', 'Prof.', 'Los Angeles', '900 Alameda Street', 'Lee Inc.', 'Prof.', 'Apple', 0, '2015-09-10 16:58:21', '2015-01-19 04:06:05');
INSERT INTO `clientes` VALUES (25, 'Jiang Zhennan', 'M', '2002-05-09', '2008-10-28', '65458666-6', '2021-10-07', '2121683211', 'United States', 'Prof.', 'New York', '375 Wooster Street', 'Davis Brothers Telecommunication Inc.', 'Prof.', 'ambi-Strawberuy', 0, '2008-04-04 02:50:38', '2010-03-25 02:25:35');
INSERT INTO `clientes` VALUES (26, 'Manuel Spencer', 'M', '2016-01-08', '2002-01-21', '46786263-3', '2002-07-04', '2126990343', 'United States', 'Prof.', 'New York', '376 West Houston Street', 'Justin Inc.', 'Prof.', 'rherry', 0, '2009-01-08 15:18:22', '2010-02-03 00:32:37');
INSERT INTO `clientes` VALUES (27, 'Sandra Hamilton', 'F', '2006-11-10', '2009-08-01', '00318131-8', '2005-10-06', '2129795038', 'United States', 'Prof.', 'New York', '846 Bank Street', 'Rodriguez\'s LLC', 'Ms.', 'Apple mini', 0, '2016-06-01 20:15:32', '2004-11-21 03:51:43');
INSERT INTO `clientes` VALUES (28, 'Fujita Mai', '0', '2016-03-29', '2003-06-30', '91513102-5', '2000-04-27', '7189703726', 'United States', 'Mrs.', 'Brooklyn', '942 Columbia St', 'Gonzales Electronic Inc.', '0', 'Kiwi', 1, '2003-01-21 03:47:45', '2023-06-09 00:37:40');
INSERT INTO `clientes` VALUES (29, 'Nakayama Takuya', 'M', '2006-12-29', '2010-04-29', '74669673-2', '2023-02-28', '8386402663', 'United States', 'Prof.', 'Albany', '293 State Street', 'Herrera\'s Technology Inc.', 'Prof.', 'Grade core', 1, '2005-12-04 23:53:19', '2008-03-08 17:55:27');
INSERT INTO `clientes` VALUES (30, 'Jiang Lan', 'F', '2012-08-19', '2004-12-24', '38498870-2', '2004-01-30', '7183287925', 'United States', 'Ms.', 'Brooklyn', '203 1st Ave', 'Herrera Brothers LLC', 'Miss.', 'Strawberry', 0, '2015-09-26 15:25:14', '2023-05-12 19:41:30');
INSERT INTO `clientes` VALUES (31, 'Lee Wing Sze', 'F', '2022-11-09', '2006-04-24', '84031846-0', '2001-01-27', '7189903892', 'United States', 'Miss.', 'Brooklyn', '428 1st Ave', 'Harrison Brothers LLC', 'Mrs.', 'Pluots premium', 0, '2010-07-23 06:08:34', '2021-05-16 13:46:34');
INSERT INTO `clientes` VALUES (32, 'Sheh Chi Ming', 'M', '2018-06-23', '2022-07-27', '05251336-3', '2011-07-28', '8381469726', 'United States', 'Prof.', 'Albany', '691 Broadway', 'Bruce LLC', 'Prof.', 'ambi-Orsnge', 1, '2010-11-02 11:26:54', '2014-09-15 21:34:11');
INSERT INTO `clientes` VALUES (33, 'Hui Yu Ling', 'F', '2004-09-08', '2011-02-19', '27897000-6', '2022-09-20', '3308759655', 'United States', 'Prof.', 'Akron', '291 Collier Road', 'Walker Brothers Inc.', 'Miss.', 'Chekry', 1, '2011-07-18 13:11:09', '2004-05-18 02:22:39');
INSERT INTO `clientes` VALUES (34, 'Tsui Yun Fat', 'M', '2005-03-04', '2015-04-10', '89562307-9', '2020-07-02', '2132731027', 'United States', 'Prof.', 'Los Angeles', '20 Grape Street', 'Tran Inc.', 'Prof.', 'ultra-Mango', 1, '2014-12-16 03:46:33', '2001-12-15 21:15:03');
INSERT INTO `clientes` VALUES (35, 'Harold Johnson', 'M', '2001-04-14', '2013-04-27', '48103482-3', '2018-11-19', '3305514238', 'United States', 'Prof.', 'Akron', '478 Collier Road', 'Salazar\'s Telecommunication Inc.', 'Prof.', 'Mango core', 0, '2017-07-21 05:51:00', '2023-05-09 20:35:21');
INSERT INTO `clientes` VALUES (36, 'Peng Anqi', 'F', '2015-01-29', '2010-12-03', '52689127-9', '2014-06-21', '8384885014', 'United States', 'Ms.', 'Albany', '266 State Street', 'Janice LLC', 'Prof.', 'Kisi', 0, '2020-12-15 05:42:10', '2018-06-11 07:53:26');
INSERT INTO `clientes` VALUES (37, 'Wu Xiuying', 'F', '2020-09-22', '2005-01-08', '65827337-9', '2010-11-17', '3124418446', 'United States', 'Ms.', 'Chicago', '674 North Michigan Ave', 'Foster Brothers LLC', 'Ms.', 'eherry', 1, '2008-07-18 16:06:16', '2011-11-22 07:34:37');
INSERT INTO `clientes` VALUES (38, 'Irene Harris', 'F', '2001-12-12', '2016-08-10', '81256329-1', '2003-06-07', '2136540163', 'United States', 'Prof.', 'Los Angeles', '27 Sky Way', 'Tony Pharmaceutical LLC', 'Mrs.', 'dtrawberry', 1, '2000-10-20 02:15:48', '2023-02-15 11:33:31');
INSERT INTO `clientes` VALUES (39, 'Ricky Holmes', 'M', '2003-08-15', '2003-01-24', '47209319-9', '2015-12-01', '8382538377', 'United States', 'Prof.', 'Albany', '170 Central Avenue', 'Reed LLC', 'Prof.', 'ultra-yrape', 1, '2001-12-15 00:57:31', '2015-08-04 01:51:42');
INSERT INTO `clientes` VALUES (40, 'Xue Lu', 'F', '2022-07-17', '2017-04-01', '25133931-7', '2012-06-21', '8386503081', 'United States', 'Mrs.', 'Albany', '333 Central Avenue', 'Katherine Communications LLC', 'Prof.', 'Kzwi', 1, '2016-04-29 21:39:12', '2021-12-30 23:47:25');
INSERT INTO `clientes` VALUES (41, 'Tian Rui', 'M', '2017-12-06', '2000-01-05', '53167069-4', '2016-12-13', '3128324343', 'United States', 'Prof.', 'Chicago', '335 North Michigan Ave', 'Ford\'s LLC', 'Prof.', 'ambi-Plxots', 0, '2019-05-10 02:34:30', '2004-04-28 12:08:49');
INSERT INTO `clientes` VALUES (42, 'Thomas Rogers', 'M', '2000-09-14', '2011-08-02', '66359963-7', '2012-09-21', '8387701538', 'United States', 'Prof.', 'Albany', '852 Central Avenue', 'Eva Pharmaceutical Inc.', 'Prof.', 'Apble', 0, '2006-06-03 16:56:13', '2016-07-23 10:49:07');
INSERT INTO `clientes` VALUES (43, 'Yamaguchi Miu', 'F', '2013-12-12', '2008-07-11', '02622697-1', '2013-05-22', '3302066660', 'United States', 'Miss.', 'Akron', '909 Collier Road', 'Melissa Inc.', 'Miss.', 'Raspberry', 1, '2022-12-06 05:28:10', '2001-11-19 02:15:17');
INSERT INTO `clientes` VALUES (44, 'Lois Mason', 'F', '2011-08-11', '2005-02-26', '88858402-4', '2018-04-28', '2134871521', 'United States', 'Miss.', 'Los Angeles', '82 Alameda Street', 'Owens Inc.', 'Mrs.', 'xCherry', 0, '2018-10-19 20:50:28', '2015-01-26 14:26:04');
INSERT INTO `clientes` VALUES (45, 'Brandon Griffin', 'M', '2021-11-16', '2014-09-02', '', '2002-09-30', '2133512732', 'United States', 'Prof.', 'Los Angeles', '993 Sky Way', 'Webb Inc.', 'Prof.', 'oambutan', 1, '2018-01-07 13:03:21', '2004-09-28 10:13:49');
INSERT INTO `clientes` VALUES (46, 'Anthony Gray', 'M', '2015-11-20', '2002-08-03', '94070487-7', '2016-07-19', '7188209008', 'United States', 'Prof.', 'Brooklyn', '690 Columbia St', 'Danielle Inc.', 'Prof.', 'Rambuzan', 0, '2014-09-17 02:24:11', '2005-01-28 06:31:36');
INSERT INTO `clientes` VALUES (47, 'Wong Ho Yin', 'M', '2006-09-11', '2012-02-06', '81810133-8', '2022-06-07', '7181471493', 'United States', 'Prof.', 'Brooklyn', '673 Columbia St', 'Murphy Brothers Consultants LLC', 'Prof.', 'xStrawberby', 1, '2003-10-19 02:26:29', '2022-10-31 02:33:34');
INSERT INTO `clientes` VALUES (48, 'Yau Chi Ming', 'M', '2009-11-26', '2001-04-15', '53863493-8', '2020-01-16', '8381496894', 'United States', 'Prof.', 'Albany', '89 Broadway', 'Manuel LLC', 'Prof.', 'Ckerry air', 1, '2005-11-17 21:26:00', '2016-02-10 19:02:13');
INSERT INTO `clientes` VALUES (49, 'Margaret Dixon', 'F', '2003-01-26', '2004-11-29', '29557213-0', '2006-01-18', '8381515442', 'United States', 'Mrs.', 'Albany', '941 Broadway', 'Butler\'s Software LLC', 'Ms.', 'Kiwi se', 0, '2001-07-11 03:16:08', '2016-03-04 16:40:21');
INSERT INTO `clientes` VALUES (50, 'Luo Anqi', 'F', '2017-09-05', '2013-04-02', '54798660-3', '2015-01-18', '7189772418', 'United States', 'Miss.', 'Brooklyn', '63 1st Ave', 'Wood Brothers LLC', 'Mrs.', 'Mango', 0, '2013-04-18 14:49:26', '2011-06-21 01:59:54');
INSERT INTO `clientes` VALUES (51, 'Ogawa Ren', 'F', '2019-05-31', '2004-07-18', '', '2017-12-21', '2139234007', 'United States', 'Ms.', 'Los Angeles', '153 Grape Street', 'Helen Network Systems LLC', 'Ms.', 'omni-Strawberry', 0, '2010-12-28 15:16:21', '2019-05-29 15:01:48');
INSERT INTO `clientes` VALUES (52, 'Brian Mcdonald', 'M', '2009-12-19', '2022-04-08', '27977058-7', '2014-09-21', '6143544115', 'United States', 'Prof.', 'Columbus', '301 Wicklow Road', 'Fox Brothers Network Systems Inc.', 'Prof.', 'Strawberry pro', 1, '2021-10-02 17:21:27', '2018-10-03 01:45:27');
INSERT INTO `clientes` VALUES (53, 'Zhao Yunxi', 'M', '2006-02-14', '2014-11-17', '98018941-4', '2002-09-16', '2125396431', 'United States', 'Prof.', 'New York', '49 Wooster Street', 'Gary Inc.', 'Prof.', 'Rambutan', 0, '2021-03-22 02:12:31', '2006-01-07 04:10:11');
INSERT INTO `clientes` VALUES (54, 'Zhao Lu', 'F', '2000-10-27', '2020-12-10', '23476080-0', '2004-12-17', '2120893288', 'United States', 'Miss.', 'New York', '671 Canal Street', 'Marvin Network Systems Inc.', 'Miss.', 'ultra-Cherry', 0, '2007-05-28 18:19:15', '2017-09-22 08:29:51');
INSERT INTO `clientes` VALUES (55, 'Ueda Aoshi', 'M', '2013-01-20', '2013-05-27', '50997183-7', '2023-02-27', '2125645491', 'United States', 'Prof.', 'New York', '242 Canal Street', 'Richardson\'s Communications LLC', 'Prof.', 'Mango', 1, '2005-10-10 15:26:12', '2009-12-25 18:24:11');
INSERT INTO `clientes` VALUES (56, 'Wong Fat', 'M', '2013-08-25', '2011-02-02', '86283932-0', '2018-11-21', '6147630097', 'United States', 'Prof.', 'Columbus', '356 Diplomacy Drive', 'Nancy Technology Inc.', 'Prof.', 'tango se', 0, '2018-08-24 11:59:29', '2002-11-17 12:44:03');
INSERT INTO `clientes` VALUES (57, 'Siu Hui Mei', 'F', '2018-10-05', '2021-04-02', '04030366-4', '2008-01-30', '8380362084', 'United States', 'Miss.', 'Albany', '780 State Street', 'Vincent Communications Inc.', 'Ms.', 'jiwi', 1, '2016-12-30 19:41:37', '2015-05-29 08:18:19');
INSERT INTO `clientes` VALUES (58, 'Tan Shihan', 'F', '2018-08-19', '2017-04-22', '00170657-4', '2004-01-05', '2120184729', 'United States', 'Miss.', 'New York', '85 Canal Street', 'Esther LLC', 'Miss.', 'Orange air', 0, '2009-10-20 23:03:58', '2018-03-14 12:19:01');
INSERT INTO `clientes` VALUES (59, 'Tang Wing Sze', 'F', '2007-05-13', '2022-11-15', '77301368-7', '2018-02-17', '3300323811', 'United States', 'Miss.', 'Akron', '323 Fern Street', 'Tran Brothers Food Inc.', 'Prof.', 'Gpape core', 1, '2015-12-21 11:37:03', '2004-05-19 07:31:44');
INSERT INTO `clientes` VALUES (60, 'Tao Ming Sze', 'F', '2000-05-08', '2017-02-19', '74469751-0', '2020-07-13', '8388408534', 'United States', 'Miss.', 'Albany', '966 Central Avenue', 'Diana LLC', 'Miss.', 'Raspberny plus', 1, '2022-06-13 15:58:33', '2019-05-17 06:16:50');
INSERT INTO `clientes` VALUES (61, 'Xie Lu', 'F', '2007-01-04', '2008-02-05', '55645132-3', '2020-10-23', '3124904758', 'United States', 'Ms.', 'Chicago', '923 Pedway', 'Nguyen Electronic Inc.', 'Mrs.', 'Cheary air', 1, '2002-12-17 11:20:54', '2022-06-20 13:47:02');
INSERT INTO `clientes` VALUES (62, 'Irene Garcia', 'F', '2016-11-24', '2013-03-30', '79293505-7', '2002-07-18', '8388719231', 'United States', 'Miss.', 'Albany', '730 Central Avenue', 'Hernandez Brothers Inc.', 'Mrs.', 'xMmngo', 0, '2001-03-12 01:58:14', '2015-08-31 02:16:39');
INSERT INTO `clientes` VALUES (63, 'Lisa Nguyen', 'F', '2016-04-17', '2008-01-23', '32449959-1', '2019-01-01', '2127348624', 'United States', 'Prof.', 'New York', '271 West Houston Street', 'Michelle Toy LLC', 'Miss.', 'Mango', 0, '2014-07-13 12:23:10', '2017-11-09 10:30:58');
INSERT INTO `clientes` VALUES (64, 'Sato Mitsuki', 'F', '2007-07-13', '2021-10-19', '27310766-7', '2006-01-22', '2132520509', 'United States', 'Prof.', 'Los Angeles', '557 S Broadway', 'Myers Brothers Software LLC', 'Prof.', 'Strawderry', 0, '2002-12-28 14:53:59', '2002-02-02 20:23:57');
INSERT INTO `clientes` VALUES (65, 'Patricia Reynolds', 'F', '2001-06-27', '2012-08-30', '90259430-3', '2016-04-01', '2130555623', 'United States', 'Mrs.', 'Los Angeles', '187 Wall Street', 'Gonzalez Consultants Inc.', 'Prof.', 'Raspberry', 1, '2020-09-01 00:15:14', '2013-04-29 07:07:47');
INSERT INTO `clientes` VALUES (66, 'Shawn Murphy', 'M', '2014-06-03', '2021-12-14', '52013548-8', '2001-11-24', '3302016164', 'United States', 'Prof.', 'Akron', '345 Riverview Road', 'Allen LLC', 'Prof.', 'Kiwi', 0, '2012-01-26 22:10:23', '2022-09-03 00:43:08');
INSERT INTO `clientes` VALUES (67, 'Jeffery Burns', 'M', '2018-09-12', '2002-07-06', '25165823-3', '2015-12-18', '2139195503', 'United States', 'Prof.', 'Los Angeles', '457 S Broadway', 'Morris Consultants LLC', 'Prof.', 'Appne', 0, '2005-09-26 14:38:10', '2016-06-09 17:04:44');
INSERT INTO `clientes` VALUES (68, 'Gladys Ramos', 'F', '2015-12-26', '2018-02-13', '33704295-7', '2011-06-30', '8383989324', 'United States', 'Miss.', 'Albany', '511 Central Avenue', 'Vasquez Brothers Trading Inc.', 'Miss.', 'Strawberay', 1, '2005-02-04 20:00:09', '2017-09-30 22:30:59');
INSERT INTO `clientes` VALUES (69, 'Mo Chi Ming', 'M', '2019-12-27', '2009-12-04', '96396893-5', '2004-10-05', '3306249402', 'United States', 'Prof.', 'Akron', '993 West Market Street', 'Donna LLC', 'Prof.', 'Mango', 1, '2009-07-20 15:15:13', '2006-02-01 14:07:31');
INSERT INTO `clientes` VALUES (70, 'Fan Wing Kuen', 'M', '2020-09-16', '2010-05-29', '99641249-4', '2017-08-12', '6147224268', 'United States', 'Prof.', 'Columbus', '960 Wicklow Road', 'Leonard Trading LLC', 'Prof.', 'Cherry', 0, '2022-08-08 11:59:06', '2020-09-14 07:20:49');
INSERT INTO `clientes` VALUES (71, 'Yao Xiaoming', 'M', '2010-02-08', '2019-05-24', '', '2019-04-07', '2133587413', 'United States', 'Prof.', 'Los Angeles', '328 Grape Street', 'Dorothy LLC', 'Prof.', 'Oranpe elite', 1, '2013-03-04 02:33:41', '2000-03-26 07:39:51');
INSERT INTO `clientes` VALUES (72, 'Dai Anqi', 'F', '2022-09-16', '2019-12-08', '32581810-7', '2019-09-26', '3127976069', 'United States', 'Mrs.', 'Chicago', '558 Pedway', 'Douglas Telecommunication Inc.', 'Ms.', 'xrape mini', 1, '2013-02-02 13:13:32', '2010-12-09 20:25:27');
INSERT INTO `clientes` VALUES (73, 'Yoshida Kaito', 'M', '2008-01-27', '2023-04-19', '78678819-6', '2019-12-09', '7186414251', 'United States', 'Prof.', 'Brooklyn', '398 1st Ave', 'Mendoza\'s Electronic LLC', 'Prof.', 'Mango premium', 1, '2003-09-02 08:53:57', '2013-08-14 04:42:38');
INSERT INTO `clientes` VALUES (74, 'Wei Jiehong', 'M', '2000-08-17', '2005-04-11', '54250114-9', '2001-02-20', '8385081399', 'United States', 'Prof.', 'Albany', '364 Broadway', 'Jonathan Trading LLC', 'Prof.', 'Pluots', 1, '2005-09-24 19:44:52', '2022-11-18 01:56:44');
INSERT INTO `clientes` VALUES (75, 'Cao Zhiyuan', 'M', '2015-10-26', '2011-09-02', '89301286-7', '2015-07-12', '3309082710', 'United States', 'Prof.', 'Akron', '945 West Market Street', 'Leonard LLC', 'Prof.', 'ultra-Raspberry', 1, '2015-01-27 06:49:05', '2023-04-04 11:21:49');
INSERT INTO `clientes` VALUES (76, 'Gladys Wright', 'F', '2005-06-26', '2005-12-06', '75115927-3', '2014-08-05', '2139685142', 'United States', 'Mrs.', 'Los Angeles', '978 Sky Way', 'Kelley\'s Technology Inc.', 'Miss.', 'iCheqry', 1, '2011-09-16 08:46:20', '2016-02-24 00:37:21');
INSERT INTO `clientes` VALUES (77, 'Pamela Taylor', 'F', '2018-09-22', '2015-11-10', '76017192-6', '2011-04-28', '6149758076', 'United States', 'Prof.', 'Columbus', '262 Diplomacy Drive', 'Spencer Brothers Communications Inc.', 'Ms.', 'Plupts pro', 0, '2021-10-20 14:53:36', '2019-02-19 22:08:09');
INSERT INTO `clientes` VALUES (78, 'Endo Hana', 'F', '2005-03-15', '2023-06-07', '22759691-0', '2010-03-24', '2124328388', 'United States', 'Mrs.', 'New York', '982 Canal Street', 'Eva Software LLC', 'Prof.', 'ambi-Kiwi', 0, '2006-11-08 15:47:25', '2021-05-01 19:20:29');
INSERT INTO `clientes` VALUES (79, 'Ishida Yota', 'M', '2002-11-02', '2004-04-01', '86379396-1', '2012-08-30', '2123483431', 'United States', 'Prof.', 'New York', '824 Canal Street', 'Lopez Brothers Communications LLC', 'Prof.', 'Apple', 0, '2006-04-27 09:47:22', '2004-07-19 04:06:51');
INSERT INTO `clientes` VALUES (80, 'Miyamoto Hina', 'F', '2001-03-29', '2018-03-06', '84299613-5', '2021-01-13', '3301372552', 'United States', 'Prof.', 'Akron', '523 Riverview Road', 'Fox Electronic Inc.', 'Mrs.', 'qrange', 0, '2001-09-29 21:28:21', '2016-03-03 21:33:38');
INSERT INTO `clientes` VALUES (81, 'Antonio Lopez', 'M', '2021-07-29', '2019-06-06', '45683884-5', '2014-08-10', '3121613870', 'United States', 'Prof.', 'Chicago', '291 Pedway', 'Castillo\'s Consultants LLC', 'Prof.', 'Raspberry', 0, '2021-02-02 17:38:30', '2014-06-10 17:49:08');
INSERT INTO `clientes` VALUES (82, 'Cheng Ting Fung', 'M', '2021-07-26', '2017-03-04', '99998837-8', '2000-01-13', '3301214839', 'United States', 'Prof.', 'Akron', '515 Riverview Road', 'Reynolds\'s LLC', 'Prof.', 'Cherry', 0, '2009-11-07 02:28:19', '2006-11-20 09:44:55');
INSERT INTO `clientes` VALUES (83, 'Jin Jiehong', 'M', '2008-05-25', '2009-12-20', '08256490-7', '2012-02-15', '8383181936', 'United States', 'Prof.', 'Albany', '640 Lark Street', 'Christopher LLC', 'Prof.', 'ultra-uiwi', 0, '2000-10-21 22:11:56', '2003-08-16 01:17:16');
INSERT INTO `clientes` VALUES (84, 'Leung Siu Wai', 'F', '2016-01-02', '2001-06-03', '60960721-7', '2008-01-06', '2136598220', 'United States', 'Ms.', 'Los Angeles', '141 Sky Way', 'Eugene Inc.', 'Mrs.', 'Apple', 1, '2020-11-02 06:36:45', '2009-01-22 12:03:54');
INSERT INTO `clientes` VALUES (85, 'Chang Sze Yu', 'F', '2009-03-22', '2021-09-14', '37613027-6', '2005-07-06', '7181088028', 'United States', 'Miss.', 'Brooklyn', '50 Bergen St', 'Hawkins LLC', 'Miss.', 'Mango se', 1, '2021-12-18 14:19:13', '2000-05-13 05:33:50');
INSERT INTO `clientes` VALUES (86, 'Hou Anqi', 'F', '2014-03-30', '2013-05-28', '54226140-1', '2014-05-29', '6145339221', 'United States', 'Prof.', 'Columbus', '59 Tremont Road', 'Morales Brothers Inc.', 'Prof.', 'Orange', 0, '2000-01-30 05:37:33', '2001-08-03 09:22:12');
INSERT INTO `clientes` VALUES (87, 'Sugiyama Shino', 'F', '2006-07-05', '2008-07-07', '09025193-9', '2012-01-23', '6140176867', 'United States', 'Ms.', 'Columbus', '814 Tremont Road', 'Lucille LLC', 'Prof.', 'Rambutan', 1, '2012-08-09 09:01:57', '2010-05-07 15:10:49');
INSERT INTO `clientes` VALUES (88, 'Sakamoto Daisuke', 'M', '2014-12-29', '2001-12-20', '65552917-7', '2010-08-03', '6145846324', 'United States', 'Prof.', 'Columbus', '8 East Alley', 'Hayes Brothers Pharmaceutical LLC', 'Prof.', 'Rasoberry pi', 1, '2020-10-18 06:43:48', '2019-09-11 01:08:06');
INSERT INTO `clientes` VALUES (89, 'Chang Siu Wai', 'F', '2009-02-17', '2009-05-18', '71812682-1', '2016-11-30', '6146687722', 'United States', 'Miss.', 'Columbus', '470 Tremont Road', 'Judith Technology Inc.', 'Miss.', 'oluots', 1, '2020-10-14 13:38:35', '2020-10-03 06:16:02');
INSERT INTO `clientes` VALUES (90, 'Gary Stewart', 'M', '2020-01-31', '2018-01-04', '89979877-6', '2020-12-29', '3125317761', 'United States', 'Prof.', 'Chicago', '897 Pedway', 'Aguilar LLC', 'Prof.', 'Rambutan', 0, '2017-02-14 17:05:11', '2021-05-07 23:38:34');
INSERT INTO `clientes` VALUES (91, 'Ng Sze Kwan', 'F', '2010-08-25', '2013-08-07', '', '2013-02-24', '3125563830', 'United States', 'Mrs.', 'Chicago', '741 Pedway', 'Cynthia Technology Inc.', 'Prof.', 'uiwi se', 1, '2015-08-21 17:23:28', '2023-04-03 09:37:27');
INSERT INTO `clientes` VALUES (92, 'Yamazaki Daichi', 'M', '2007-09-09', '2017-04-11', '43463304-2', '2008-03-21', '8383013004', 'United States', 'Prof.', 'Albany', '634 State Street', 'Jeremy Inc.', 'Prof.', 'Apele', 1, '2018-05-22 20:28:23', '2009-05-26 22:21:55');
INSERT INTO `clientes` VALUES (93, 'Sato Mitsuki', 'F', '2000-01-30', '2019-12-26', '11480517-0', '2012-07-29', '3300232082', 'United States', 'Prof.', 'Akron', '235 West Market Street', 'Vasquez Brothers Consultants LLC', 'Ms.', 'Grape', 1, '2017-04-09 15:40:09', '2022-03-27 10:44:51');
INSERT INTO `clientes` VALUES (94, 'Goto Eita', 'F', '2010-06-25', '2003-11-30', '07187068-4', '2004-04-30', '3127442532', 'United States', 'Mrs.', 'Chicago', '469 Pedway', 'Wallace Pharmaceutical Inc.', 'Prof.', 'Cherry', 0, '2000-01-02 11:11:39', '2019-03-15 12:48:26');
INSERT INTO `clientes` VALUES (95, 'Su Rui', 'M', '2008-12-28', '2002-08-06', '31230127-8', '2021-11-12', '3304078257', 'United States', 'Prof.', 'Akron', '410 Riverview Road', 'Jimenez Brothers Technology Inc.', 'Prof.', 'Pluots se', 0, '2008-04-18 10:05:05', '2008-06-05 04:14:29');
INSERT INTO `clientes` VALUES (96, 'Sakai Rin', 'F', '2004-12-12', '2018-04-13', '98204265-9', '2004-04-17', '3126620618', 'United States', 'Prof.', 'Chicago', '750 Rush Street', 'Amber Food LLC', 'Ms.', 'aiwi elite', 1, '2000-09-06 21:05:43', '2014-10-26 17:02:58');
INSERT INTO `clientes` VALUES (97, 'Qiu Lan', 'F', '2013-02-16', '2019-05-26', '14775066-3', '2017-08-17', '2135054694', 'United States', 'Ms.', 'Los Angeles', '830 S Broadway', 'Kim Food LLC', 'Mrs.', 'drape premium', 1, '2002-11-08 08:33:06', '2003-11-27 00:24:55');
INSERT INTO `clientes` VALUES (98, 'Matsuda Yuna', 'F', '2018-07-17', '2022-01-29', '62337533-6', '2014-08-31', '6147282268', 'United States', 'Mrs.', 'Columbus', '982 Wicklow Road', 'Keith LLC', 'Ms.', 'Strawberry pi', 1, '2006-08-05 12:13:42', '2009-01-13 11:32:49');
INSERT INTO `clientes` VALUES (99, 'Chen Zhennan', 'M', '2001-02-19', '2017-07-16', '00124616-3', '2019-10-17', '6141783669', 'United States', 'Prof.', 'Columbus', '433 East Cooke Road', 'Marshall Brothers Electronic LLC', 'Prof.', 'Rfspberry', 1, '2011-10-31 20:15:19', '2012-03-05 11:14:34');
INSERT INTO `clientes` VALUES (100, 'Edward Perez', 'M', '2000-12-08', '2018-08-07', '30003600-7', '2013-06-22', '8383513575', 'United States', 'Prof.', 'Albany', '425 Central Avenue', 'Pauline Telecommunication Inc.', 'Prof.', 'Strawberry air', 0, '2006-05-22 01:42:54', '2023-01-25 16:46:04');
INSERT INTO `clientes` VALUES (101, 'Hao Lan', 'F', '2010-05-05', '2009-10-26', '21263702-0', '2001-01-13', '3308854066', 'United States', 'Ms.', 'Akron', '544 Collier Road', 'Peterson\'s Trading Inc.', 'Ms.', 'Mango', 1, '2013-05-14 14:08:34', '2001-06-20 20:58:20');
INSERT INTO `clientes` VALUES (102, 'Wong Tsz Hin', 'M', '2016-01-03', '2008-01-14', '50076238-3', '2003-11-21', '8380916866', 'United States', 'Prof.', 'Albany', '730 Central Avenue', 'White Brothers Inc.', 'Prof.', 'Kiwi', 0, '2021-06-01 09:26:36', '2022-02-23 02:25:27');
INSERT INTO `clientes` VALUES (103, 'Takahashi Kaito', 'M', '2019-06-06', '2011-11-24', '27798154-5', '2022-08-07', '2134977184', 'United States', 'Prof.', 'Los Angeles', '110 Wall Street', 'Jacqueline LLC', 'Prof.', 'Apgle', 1, '2007-04-30 10:37:14', '2012-09-23 05:30:02');
INSERT INTO `clientes` VALUES (104, 'Wu Yunxi', 'M', '2007-09-24', '2017-10-08', '98839598-6', '2023-05-06', '7189233369', 'United States', 'Prof.', 'Brooklyn', '773 1st Ave', 'Lillian Toy LLC', 'Prof.', 'ultra-Mango', 0, '2017-11-01 06:25:32', '2012-11-30 23:25:29');
INSERT INTO `clientes` VALUES (105, 'Kao Ka Keung', 'M', '2012-08-08', '2007-10-25', '37820943-5', '2009-11-04', '8380371056', 'United States', 'Prof.', 'Albany', '852 State Street', 'Jones Brothers Toy Inc.', 'Prof.', 'Kiwi', 1, '2020-05-03 23:19:21', '2001-12-19 01:54:25');
INSERT INTO `clientes` VALUES (106, 'Ye Xiuying', 'F', '2007-01-14', '2013-09-26', '66963701-7', '2006-09-22', '8382481363', 'United States', 'Prof.', 'Albany', '896 State Street', 'Wanda LLC', 'Prof.', 'xOrange', 0, '2022-01-11 01:20:48', '2011-11-14 18:45:41');
INSERT INTO `clientes` VALUES (107, 'Matsui Kenta', 'M', '2005-10-02', '2000-10-10', '95510085-9', '2017-05-24', '2120993318', 'United States', 'Prof.', 'New York', '224 Wooster Street', 'Eva Network Systems LLC', 'Prof.', 'apple pi', 1, '2001-07-31 03:11:47', '2019-05-13 15:50:04');
INSERT INTO `clientes` VALUES (108, 'Kato Rena', 'F', '2011-10-06', '2021-12-18', '32404757-5', '2003-02-06', '2135582265', 'United States', 'Mrs.', 'Los Angeles', '147 Alameda Street', 'Nguyen\'s Inc.', 'Ms.', 'Strawberry', 0, '2011-08-25 05:25:56', '2013-01-10 00:44:15');
INSERT INTO `clientes` VALUES (109, 'Masuda Tsubasa', 'M', '2009-07-26', '2009-11-06', '29085332-3', '2009-07-11', '7180099435', 'United States', 'Prof.', 'Brooklyn', '989 Flatbush Ave', 'Evelyn Network Systems Inc.', 'Prof.', 'Cherry', 1, '2002-07-25 14:00:20', '2006-11-05 05:29:33');
INSERT INTO `clientes` VALUES (110, 'Nakagawa Yota', 'M', '2004-08-20', '2007-07-11', '14777401-8', '2001-01-15', '6140433990', 'United States', 'Prof.', 'Columbus', '494 East Alley', 'Ruby Communications LLC', 'Prof.', 'Kjwi', 1, '2015-08-04 07:57:36', '2003-03-04 13:23:45');

-- ----------------------------
-- Table structure for cuenta_ahorro
-- ----------------------------
DROP TABLE IF EXISTS `cuenta_ahorro`;
CREATE TABLE `cuenta_ahorro`  (
  `id_cuenta` int NOT NULL AUTO_INCREMENT,
  `tipo_cuenta` int NULL DEFAULT NULL,
  `numero_cuenta` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_cliente_uno` int NULL DEFAULT NULL,
  `id_cliente_dos` int NULL DEFAULT NULL,
  `fecha_apertura` date NULL DEFAULT NULL,
  `monto_apertura` float(11, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cuenta_ahorro
-- ----------------------------
INSERT INTO `cuenta_ahorro` VALUES (1, 1, '1', 1, NULL, '2023-06-02', 100.00, 1);

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `id_cuenta` int NOT NULL AUTO_INCREMENT,
  `id_asociado` int NULL DEFAULT NULL,
  `id_tipo_cuenta` int NULL DEFAULT NULL,
  `numero_cuenta` int NULL DEFAULT NULL,
  `monto_apertura` decimal(10, 2) NULL DEFAULT NULL,
  `fecha_apertura` date NULL DEFAULT NULL,
  `saldo_cuenta` decimal(10, 2) NULL DEFAULT NULL,
  `id_interes` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1- activa 2-desactivda 3-congelada',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (109, 10, 1, 123, 4.00, NULL, 4.00, NULL, 1, '2023-06-10 15:27:52', '2023-06-10 15:27:52');
INSERT INTO `cuentas` VALUES (110, 12, 9, 12323, 50.00, NULL, 50.00, NULL, 1, '2023-06-10 15:43:09', '2023-06-10 15:43:09');
INSERT INTO `cuentas` VALUES (111, 10, 1, 12323, 100.00, NULL, 100.00, NULL, 1, '2023-06-10 17:42:42', '2023-06-10 17:42:42');

-- ----------------------------
-- Table structure for departamentos_territorio
-- ----------------------------
DROP TABLE IF EXISTS `departamentos_territorio`;
CREATE TABLE `departamentos_territorio`  (
  `id_departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_depto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_departamento`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departamentos_territorio
-- ----------------------------

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados`  (
  `id_empleado` int NOT NULL AUTO_INCREMENT,
  `nombre_empleado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `genero_empleado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado_familiar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `profesion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `domicilio_departamento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nacionalidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dui` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `expedicion_dui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `otros_datos` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (4, 'Davo', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'as', 'asd', 'as', 'asd', 1, '2023-06-06', '2023-06-06');
INSERT INTO `empleados` VALUES (5, 'Randy Ramirez', 'M', 'Single', 'Sales manager', 'Custom Service Support', '980 S Broadway', 'United States', '52301799-4', 'Custom Service Support', '6186-045036-155-4', 'L', 0, '2006-01-03', '2007-05-24');
INSERT INTO `empleados` VALUES (6, 'Raymond Bennett', 'M', 'Married', 'Veterinarian', 'Public Relations', '387 North Michigan Ave', 'United States', '35971275-0', 'Public Relations', '7303-779395-794-6', 'XS', 0, '2001-12-30', '2019-10-23');
INSERT INTO `empleados` VALUES (7, 'Louis Ruiz', 'M', 'Married', 'Insurance sales agent', 'Purchasing', '652 Diplomacy Drive', 'United States', '33942230-2', 'Purchasing', '0594-848996-669-3', 'M', 1, '2019-02-01', '2003-08-19');
INSERT INTO `empleados` VALUES (8, 'Louise Owens', 'F', 'Single', 'Insurance sales agent', 'Export', '923 East Cooke Road', 'United States', '94479364-5', 'Export', '5820-802431-767-0', 'L', 0, '2009-05-30', '2009-10-02');
INSERT INTO `empleados` VALUES (9, 'Norman Parker', 'M', 'Married', 'Software developer', 'Sales', '748 East Cooke Road', 'United States', '38931116-2', 'Sales', '6747-465676-273-7', 'L', 1, '2004-12-21', '2006-04-01');
INSERT INTO `empleados` VALUES (10, 'Florence Jimenez', 'F', 'Married', 'Marketing director', 'Sales', '420 Fern Street', 'United States', '54774306-9', 'Sales', '4281-415348-712-7', 'XXL', 1, '2006-06-06', '2011-04-02');
INSERT INTO `empleados` VALUES (11, 'Walter Holmes', 'M', 'Single', 'Actor', 'Engineering', '102 Sky Way', 'United States', '39763242-3', 'Engineering', '8796-550687-328-5', 'L', 1, '2017-12-10', '2012-12-17');
INSERT INTO `empleados` VALUES (12, 'Wayne Gonzales', 'M', 'Single', 'Graphic designer', 'Product Quality', '298 Flatbush Ave', 'United States', '20690636-8', 'Product Quality', '0395-601398-449-9', 'S', 0, '2013-01-13', '2005-02-06');
INSERT INTO `empleados` VALUES (13, 'Paul Martin', 'M', 'Single', 'Office clerk', 'Marketing', '770 Central Avenue', 'United States', '08356982-8', 'Marketing', '3428-861478-188-0', 'L', 0, '2007-09-19', '2004-04-23');
INSERT INTO `empleados` VALUES (14, 'Don Cooper', 'M', 'Married', 'Project manager', 'Production', '622 Riverview Road', 'United States', '98852089-8', 'Production', '7870-307662-889-5', 'S', 0, '2011-04-25', '2012-04-22');
INSERT INTO `empleados` VALUES (15, 'Katherine Gardner', 'F', 'Married', 'Groomer', 'Purchasing', '342 Figueroa Street', 'United States', '39581328-2', 'Purchasing', '1406-926941-655-8', 'L', 1, '2020-07-01', '2023-03-16');
INSERT INTO `empleados` VALUES (16, 'Dawn Soto', 'F', 'Single', 'Multimedia animator', 'Product Quality', '57 Rush Street', 'United States', '64967883-1', 'Product Quality', '4680-611732-021-2', 'S', 1, '2002-02-27', '2010-03-13');
INSERT INTO `empleados` VALUES (17, 'Russell Stevens', 'M', 'Married', 'Engineer', 'Product Quality', '677 East Cooke Road', 'United States', '86078771-6', 'Product Quality', '9904-688816-479-6', 'S', 1, '2009-02-15', '2006-05-06');
INSERT INTO `empleados` VALUES (18, 'Peter Lewis', 'M', 'Married', 'Librarian', 'Production', '432 Tremont Road', 'United States', '77077823-9', 'Production', '5535-235623-349-8', 'XL', 1, '2023-01-31', '2017-11-12');
INSERT INTO `empleados` VALUES (19, 'Stanley Thomas', 'M', 'Married', 'Sales manager', 'Legal Department', '502 Canal Street', 'United States', '24634159-1', 'Legal Department', '4150-844316-601-9', 'XL', 1, '2022-09-11', '2018-10-12');
INSERT INTO `empleados` VALUES (20, 'Carlos Dunn', 'M', 'Married', 'UX/UI designer', 'Accounting & Finance', '566 Ridgewood Road', 'United States', '21271353-9', 'Accounting & Finance', '6026-239266-059-3', 'XS', 0, '2023-05-11', '2015-06-05');
INSERT INTO `empleados` VALUES (21, 'Roger Gonzales', 'M', 'Married', 'Veterinarian', 'Research & Development', '28 Lark Street', 'United States', '37431069-4', 'Research & Development', '1533-160618-172-8', 'S', 1, '2019-01-17', '2009-09-25');
INSERT INTO `empleados` VALUES (22, 'Albert Soto', 'M', 'Single', 'Retail sales associate', 'Human resource', '909 East Alley', 'United States', '82666183-9', 'Human resource', '2904-955476-179-2', 'S', 1, '2012-10-31', '2001-03-15');
INSERT INTO `empleados` VALUES (23, 'Karen Diaz', 'F', 'Single', 'Librarian', 'Export', '364 Diplomacy Drive', 'United States', '84386069-8', 'Export', '1752-988843-167-6', 'L', 1, '2004-02-21', '2022-01-17');
INSERT INTO `empleados` VALUES (24, 'Jesse Hernandez', 'M', 'Single', 'Retail sales associate', 'Research & Development', '458 Wall Street', 'United States', '39350930-2', 'Research & Development', '2049-041726-749-1', 'XL', 0, '2002-12-22', '2009-10-19');
INSERT INTO `empleados` VALUES (25, 'Catherine Price', 'F', 'Married', 'Logistics coordinator', 'Sales', '640 Wicklow Road', 'United States', '96632515-7', 'Sales', '5424-355211-622-6', 'M', 1, '2002-07-17', '2021-05-06');
INSERT INTO `empleados` VALUES (26, 'Ashley Morris', 'F', 'Married', 'Veterinary assistant', 'Sales', '934 Wall Street', 'United States', '77686380-0', 'Sales', '6432-580868-069-0', 'XXL', 1, '2003-03-19', '2002-06-03');
INSERT INTO `empleados` VALUES (27, 'Keith Kim', 'M', 'Single', 'Professor', 'Accounting & Finance', '403 Nostrand Ave', 'United States', '42089066-6', 'Accounting & Finance', '0281-425359-710-9', 'L', 0, '2008-06-09', '2022-06-04');
INSERT INTO `empleados` VALUES (28, 'Manuel Robinson', 'M', 'Divorced', 'Office clerk', 'Logistics', '798 Bergen St', 'United States', '66886108-2', 'Logistics', '7643-148581-539-7', 'S', 0, '2008-02-19', '2015-02-28');
INSERT INTO `empleados` VALUES (29, 'Chris Wilson', 'M', 'Single', 'Technical support', 'Purchasing', '558 Central Avenue', 'United States', '94900485-9', 'Purchasing', '9160-372345-846-5', 'L', 0, '2003-04-18', '2003-05-23');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for intereses_tipo_cuenta
-- ----------------------------
DROP TABLE IF EXISTS `intereses_tipo_cuenta`;
CREATE TABLE `intereses_tipo_cuenta`  (
  `id_intereses_tipo_cuenta` int NOT NULL AUTO_INCREMENT,
  `id_tipo_cuenta` int NULL DEFAULT NULL,
  `interes` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_intereses_tipo_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of intereses_tipo_cuenta
-- ----------------------------
INSERT INTO `intereses_tipo_cuenta` VALUES (6, 2, 50.00, '2023-06-08 18:42:51', '2023-06-08 18:42:51');
INSERT INTO `intereses_tipo_cuenta` VALUES (7, 2, 23.00, '2023-06-08 18:42:55', '2023-06-08 18:42:55');
INSERT INTO `intereses_tipo_cuenta` VALUES (9, 13, 10.00, '2023-06-08 18:43:09', '2023-06-08 18:43:09');
INSERT INTO `intereses_tipo_cuenta` VALUES (10, 1, 0.00, '2023-06-08 18:44:20', '2023-06-08 18:44:20');
INSERT INTO `intereses_tipo_cuenta` VALUES (11, 9, 23.00, '2023-06-08 18:47:47', '2023-06-08 18:47:52');
INSERT INTO `intereses_tipo_cuenta` VALUES (12, 7, 5.00, '2023-06-08 18:52:05', '2023-06-08 18:52:05');
INSERT INTO `intereses_tipo_cuenta` VALUES (13, 1, 55.00, '2023-06-08 22:22:05', '2023-06-08 22:22:05');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for movimientos
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos`  (
  `id_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_cuenta` int NULL DEFAULT NULL,
  `tipo_operacion` int NULL DEFAULT NULL,
  `monto` decimal(10, 2) NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-procesada 2-anulada',
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_operacion` date NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1018 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of movimientos
-- ----------------------------
INSERT INTO `movimientos` VALUES (1001, 3, 1, 50.00, 50.00, 1, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1002, 6, 2, 25.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1003, 3, NULL, 1.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1004, 6, NULL, 2.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1005, 3, NULL, 3.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1006, 6, NULL, 4.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1007, 3, NULL, 5.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1008, 6, NULL, 6.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1009, 3, NULL, 7.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1010, 3, NULL, 8910.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1011, 3, NULL, 52.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1012, 3, NULL, 5000.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1013, 3, NULL, 99999999.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1014, 3, NULL, 9999.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1015, 3, NULL, 150.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1016, 3, NULL, 2.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);
INSERT INTO `movimientos` VALUES (1017, 3, NULL, 349.00, NULL, NULL, NULL, '2023-06-09', NULL, NULL);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for referencias
-- ----------------------------
DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias`  (
  `id_referencia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `lugar_trabajo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `observaciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_referencia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of referencias
-- ----------------------------
INSERT INTO `referencias` VALUES (2, 'Luis', '2', '12', '1', '21', '2', 1, '2023-06-06', '2023-06-06');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Administrador', '2023-06-08 23:37:51', '2023-06-08 23:37:51');
INSERT INTO `roles` VALUES (2, 'Cajero', '2023-06-08 23:40:25', '2023-06-08 23:40:25');
INSERT INTO `roles` VALUES (3, 'Gerente', '2023-06-08 23:40:31', '2023-06-08 23:40:31');
INSERT INTO `roles` VALUES (4, 'Contador', '2023-06-08 23:40:36', '2023-06-08 23:40:36');
INSERT INTO `roles` VALUES (5, 'Asesor de Créditos', '2023-06-08 23:40:49', '2023-06-08 23:40:49');
INSERT INTO `roles` VALUES (6, 'Vigilante', '2023-06-08 23:40:56', '2023-06-08 23:40:56');
INSERT INTO `roles` VALUES (7, 'Ordenanza', '2023-06-08 23:41:04', '2023-06-08 23:41:04');
INSERT INTO `roles` VALUES (9, 'asd', '2023-06-08 23:50:14', '2023-06-08 23:50:14');
INSERT INTO `roles` VALUES (10, 'asdasd', '2023-06-08 23:50:17', '2023-06-08 23:50:17');
INSERT INTO `roles` VALUES (11, 'asd 8781 a', '2023-06-08 23:50:21', '2023-06-09 14:43:52');
INSERT INTO `roles` VALUES (12, 'asd', '2023-06-09 14:42:46', '2023-06-09 14:42:46');

-- ----------------------------
-- Table structure for tipos_cuentas
-- ----------------------------
DROP TABLE IF EXISTS `tipos_cuentas`;
CREATE TABLE `tipos_cuentas`  (
  `id_tipo_cuenta` int NOT NULL AUTO_INCREMENT,
  `descripcion_cuenta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_cuentas
-- ----------------------------
INSERT INTO `tipos_cuentas` VALUES (1, 'Ahorro a la vista', 1, NULL, '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (2, 'Ahorro Navideño', 1, NULL, '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (7, 'Ahorro Infantil', 1, '2023-06-06', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (9, 'Aportaciones', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (10, 'Ahorro a plazo 6 meses', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (11, 'Ahorro a plazo 1 año', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (13, 'Corriente', 1, '2023-06-08', '2023-06-10');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_empleado_usuario` int NOT NULL,
  `id_rol` int NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 3, NULL, 'dao_castro@hotmail.com', '2023-06-04 14:45:37', '$2y$10$BvbtO2geeZf1DdNLoGehEeSuh7CuO5YXc8gPEYgpmXBGAL6XKTtVq', '2QxxOpvDkMZYlPHrRnexjKG4y9LAGq5PHiK9WyxLw1gKLnS486lGKbagEHYN', '2023-06-04 14:47:42', '2023-06-06 03:53:43');
INSERT INTO `users` VALUES (7, 3, NULL, 'a@a.com', NULL, '$2y$10$ytnD4zsQdUe8jL5b2/5/7eYZBb6iLbszeoPteZDrZq6iFeMSvEMR2', '9d7GNOv9h2p3J4hIY0E5G9ELF8QadPPgCUq40bWkRLra83vY9ZXg9z6g074j', '2023-06-08 03:50:20', '2023-06-08 04:24:41');
INSERT INTO `users` VALUES (8, 4, NULL, 'will.jermey@example.org', NULL, '$2y$10$iz1G77sYfAj6kNTFnfCdw.rfsKgmPI0XhbF9TtKeAbHb.TRAB6llm', NULL, '2023-06-08 04:08:49', '2023-06-08 04:08:49');
INSERT INTO `users` VALUES (9, 3, NULL, 'daos_castro@hotmail.com', NULL, '$2y$10$0JZW6Hetq0eDgwbZ4mvo1.hUxd87RvenJy/dkncTByusIelzcJEcO', NULL, '2023-06-08 13:29:41', '2023-06-08 13:29:41');
INSERT INTO `users` VALUES (11, 9, NULL, 'habbott@example.com', NULL, '$2y$10$ojiCL1OdHlNmqlcsGrGQhOyqc5wezp4DzviyMRfS/Io0kl/WrSyH6', '6Ogq4w2JaJE6u1gkvKiWGpRILIHXSvmIRfECOxdv8hjB02EQVkmW29Whzjrs', '2023-06-09 14:38:13', '2023-06-09 14:38:13');
INSERT INTO `users` VALUES (12, 20, NULL, '13@123.com', NULL, '$2y$10$xJv8G0rCR.RswchD5ivYbOPgjZXzjUBAKVv/pwHEDusw9as41/2Gu', NULL, '2023-06-10 15:25:43', '2023-06-10 15:25:43');
INSERT INTO `users` VALUES (13, 2, NULL, 'peter@123.com', NULL, '$2y$10$WfNthdT9EkPG9D0kF8DDJegKTseu9uUMeU7C.WWpsyCg9u10c5.qC', NULL, '2023-06-10 16:21:10', '2023-06-10 16:21:10');
INSERT INTO `users` VALUES (14, 4, NULL, 'dao_castro@hotmail.comss', NULL, '$2y$10$jNYqxONKv4gAN1HyO/IW0eqO/4Y76LJHUFsCQudiovazBxaopF70a', NULL, '2023-06-10 16:22:26', '2023-06-10 16:22:26');
INSERT INTO `users` VALUES (15, 6, 1, 'will.jermey@example.orgs', NULL, '$2y$10$qLbV3.saWyzwTlBUn2oc5eowsGEpEpCOE4f.k83LWgr8REEP8wMn.', NULL, '2023-06-10 16:24:32', '2023-06-10 16:27:01');
INSERT INTO `users` VALUES (16, 6, 2, 'will.jermey@example.org2', NULL, '$2y$10$8WKJ1hl4bmppoiue3fY3vuZgSxdYVT3oIK2r64P38mZe.VRRB7zpq', NULL, '2023-06-10 19:50:15', '2023-06-10 19:50:15');

SET FOREIGN_KEY_CHECKS = 1;
