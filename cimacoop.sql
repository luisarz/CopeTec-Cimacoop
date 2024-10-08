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

 Date: 07/10/2024 22:29:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for amortizacion_credito
-- ----------------------------
DROP TABLE IF EXISTS `amortizacion_credito`;
CREATE TABLE `amortizacion_credito`  (
  `id` int NOT NULL,
  `id_solicitud` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  `interes` decimal(10, 2) NULL DEFAULT NULL,
  `capital` decimal(10, 2) NULL DEFAULT NULL,
  `aportacion` decimal(10, 2) NULL DEFAULT NULL,
  `seguro` decimal(10, 2) NULL DEFAULT NULL,
  `cuota` decimal(10, 2) NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amortizacion_credito
-- ----------------------------

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
  `hora_aceptado` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_apertura_caja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of apertura_caja
-- ----------------------------
INSERT INTO `apertura_caja` VALUES (1, 1, 500.00, NULL, 11, '2024-10-06 13:12:18', NULL, NULL, 1, '2024-10-06 13:12:18', '2024-10-06 13:12:18');

-- ----------------------------
-- Table structure for asociados
-- ----------------------------
DROP TABLE IF EXISTS `asociados`;
CREATE TABLE `asociados`  (
  `id_asociado` int NOT NULL AUTO_INCREMENT,
  `numero_asociado` int NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of asociados
-- ----------------------------
INSERT INTO `asociados` VALUES (1, 1, '1', 150.00, 300.00, 0.00, 4, NULL, NULL, 10.00, 5.00, 1, '2024-09-25', '2024-09-25 12:08:48', '2024-09-25 12:08:48');
INSERT INTO `asociados` VALUES (3, 2, '2', 448.50, 897.00, 0.00, 0, 1, NULL, 10.00, 10.00, 2, '2024-10-04', '2024-10-04 18:55:56', '2024-10-05 11:00:59');

-- ----------------------------
-- Table structure for beneficiarios
-- ----------------------------
DROP TABLE IF EXISTS `beneficiarios`;
CREATE TABLE `beneficiarios`  (
  `id_beneficiario` int NOT NULL AUTO_INCREMENT,
  `id_asociado` int NULL DEFAULT NULL,
  `id_cuenta` int NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `porcentaje` decimal(10, 2) NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_beneficiario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of beneficiarios
-- ----------------------------
INSERT INTO `beneficiarios` VALUES (1, 3, 2, 'MARHA ALICIA JANDRES URRUTIA', '14', 50.00, 'SM', '0000000', '2024-10-06 13:21:12', '2024-10-06 17:07:29');
INSERT INTO `beneficiarios` VALUES (2, 3, 2, 'Juan Jose', '1', 50.00, 'SM', '0000-0000', '2024-10-06 17:07:47', '2024-10-06 17:07:47');

-- ----------------------------
-- Table structure for beneficiarios_depositos
-- ----------------------------
DROP TABLE IF EXISTS `beneficiarios_depositos`;
CREATE TABLE `beneficiarios_depositos`  (
  `id_beneficiario` int NOT NULL AUTO_INCREMENT,
  `id_deposito` int NULL DEFAULT NULL,
  `nombre_beneficiario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `edad` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `porcentaje` decimal(10, 2) NULL DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_beneficiario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of beneficiarios_depositos
-- ----------------------------

-- ----------------------------
-- Table structure for bitacora
-- ----------------------------
DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora`  (
  `id_bitacora` int NOT NULL AUTO_INCREMENT,
  `route` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `request` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_usuario` int NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2695 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bitacora
-- ----------------------------
INSERT INTO `bitacora` VALUES (1, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:11:04');
INSERT INTO `bitacora` VALUES (2, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:11:09');
INSERT INTO `bitacora` VALUES (3, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:11:40');
INSERT INTO `bitacora` VALUES (4, '/reportes/cartera-mora', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:12:32');
INSERT INTO `bitacora` VALUES (5, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:18:04');
INSERT INTO `bitacora` VALUES (6, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:18:05');
INSERT INTO `bitacora` VALUES (7, '/reportes/cartera-mora', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:18:59');
INSERT INTO `bitacora` VALUES (8, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:19:00');
INSERT INTO `bitacora` VALUES (9, '/reportes/creditos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:19:05');
INSERT INTO `bitacora` VALUES (10, '/reportes/desembolsos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:19:07');
INSERT INTO `bitacora` VALUES (11, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:19:33');
INSERT INTO `bitacora` VALUES (12, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:19:36');
INSERT INTO `bitacora` VALUES (13, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:27:43');
INSERT INTO `bitacora` VALUES (14, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:29:45');
INSERT INTO `bitacora` VALUES (15, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:29:49');
INSERT INTO `bitacora` VALUES (16, '/clientes/add', '{\"_token\":\"TiNdEMWtjXYiUeFIZY8wbiE4SkhEY4FyxQW17gng\",\"nombre\":\"REBECA ISABEL BARAHONA DE NOGERA\",\"genero\":\"0\",\"fecha_nacimiento\":\"1989-02-17\",\"dui_cliente\":\"04264814-2\",\"dui_extendido\":\"SAN MIGUEL\",\"fecha_expedicion\":\"2021-07-05\",\"telefono\":\"75943226\",\"nacionalidad\":\"SALVADORE\\u00d1A\",\"estado_civil\":\"CASADA\",\"direccion_personal\":\"COLONIA DUARTE, DESVIO GEREZ ROSALEZ, SS, SAN MIGEU\",\"nombre_negocio\":\"VENTA DE ROPA YA ACERO\",\"direccion_negocio\":\"2DA CALLE PTE,CALLE CHAPARRASTIQUE SAN MIGUEL\",\"tipo_vivienda\":\"1\",\"observaciones\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:33:15');
INSERT INTO `bitacora` VALUES (17, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:33:15');
INSERT INTO `bitacora` VALUES (18, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:33:20');
INSERT INTO `bitacora` VALUES (19, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:33:22');
INSERT INTO `bitacora` VALUES (20, '/asociados/add', '{\"_token\":\"TiNdEMWtjXYiUeFIZY8wbiE4SkhEY4FyxQW17gng\",\"numero_asociado\":\"0000000001\",\"id_cliente\":\"65\",\"fecha_ingreso\":\"2023-10-12\",\"sueldo_quincenal\":\"1650\",\"sueldo_mensual\":\"3150\",\"otros_ingresos\":\"150\",\"dependientes_economicamente\":\"2\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:07');
INSERT INTO `bitacora` VALUES (21, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:07');
INSERT INTO `bitacora` VALUES (22, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:10');
INSERT INTO `bitacora` VALUES (23, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:23');
INSERT INTO `bitacora` VALUES (24, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:34');
INSERT INTO `bitacora` VALUES (25, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:42');
INSERT INTO `bitacora` VALUES (26, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:43');
INSERT INTO `bitacora` VALUES (27, '/beneficiarios/add/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:45');
INSERT INTO `bitacora` VALUES (28, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:49');
INSERT INTO `bitacora` VALUES (29, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:49');
INSERT INTO `bitacora` VALUES (30, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:55');
INSERT INTO `bitacora` VALUES (31, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:40:58');
INSERT INTO `bitacora` VALUES (32, '/asociados/put', '{\"_token\":\"TiNdEMWtjXYiUeFIZY8wbiE4SkhEY4FyxQW17gng\",\"_method\":\"PUT\",\"id\":\"1\",\"id_cliente\":\"65\",\"fecha_ingreso\":\"2023-10-12\",\"sueldo_quincenal\":\"1650.00\",\"sueldo_mensual\":\"3150.00\",\"otros_ingresos\":\"150.00\",\"dependientes_economicamente\":\"2\",\"couta_ingreso\":\"10.00\",\"monto_aportacion\":\"10.00\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null,\"estado_solicitud\":\"3\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:04');
INSERT INTO `bitacora` VALUES (33, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:04');
INSERT INTO `bitacora` VALUES (34, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:11');
INSERT INTO `bitacora` VALUES (35, '/asociados/put', '{\"_token\":\"TiNdEMWtjXYiUeFIZY8wbiE4SkhEY4FyxQW17gng\",\"_method\":\"PUT\",\"id\":\"1\",\"id_cliente\":\"65\",\"fecha_ingreso\":\"2023-10-12\",\"sueldo_quincenal\":\"1650.00\",\"sueldo_mensual\":\"3150.00\",\"otros_ingresos\":\"150.00\",\"dependientes_economicamente\":\"2\",\"couta_ingreso\":\"10.00\",\"monto_aportacion\":\"10.00\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null,\"estado_solicitud\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:15');
INSERT INTO `bitacora` VALUES (36, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:16');
INSERT INTO `bitacora` VALUES (37, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:18');
INSERT INTO `bitacora` VALUES (38, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:41:25');
INSERT INTO `bitacora` VALUES (39, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:42:33');
INSERT INTO `bitacora` VALUES (40, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:43:16');
INSERT INTO `bitacora` VALUES (41, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:44:10');
INSERT INTO `bitacora` VALUES (42, '/beneficiarios/add/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:44:12');
INSERT INTO `bitacora` VALUES (43, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:44:16');
INSERT INTO `bitacora` VALUES (44, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:44:23');
INSERT INTO `bitacora` VALUES (45, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:53:49');
INSERT INTO `bitacora` VALUES (46, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:53:51');
INSERT INTO `bitacora` VALUES (47, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:55:17');
INSERT INTO `bitacora` VALUES (48, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:55:20');
INSERT INTO `bitacora` VALUES (49, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:55:21');
INSERT INTO `bitacora` VALUES (50, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 10:55:22');
INSERT INTO `bitacora` VALUES (51, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:18:34');
INSERT INTO `bitacora` VALUES (52, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:38');
INSERT INTO `bitacora` VALUES (53, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:46');
INSERT INTO `bitacora` VALUES (54, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:49');
INSERT INTO `bitacora` VALUES (55, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:52');
INSERT INTO `bitacora` VALUES (56, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:55');
INSERT INTO `bitacora` VALUES (57, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:24:59');
INSERT INTO `bitacora` VALUES (58, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:25:02');
INSERT INTO `bitacora` VALUES (59, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:25:10');
INSERT INTO `bitacora` VALUES (60, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-08 11:51:36');
INSERT INTO `bitacora` VALUES (61, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:16:23');
INSERT INTO `bitacora` VALUES (62, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:16:32');
INSERT INTO `bitacora` VALUES (63, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:20:10');
INSERT INTO `bitacora` VALUES (64, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:20:33');
INSERT INTO `bitacora` VALUES (65, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:23:05');
INSERT INTO `bitacora` VALUES (66, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"0\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:23:10');
INSERT INTO `bitacora` VALUES (67, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:23:10');
INSERT INTO `bitacora` VALUES (68, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:24:44');
INSERT INTO `bitacora` VALUES (69, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:24:47');
INSERT INTO `bitacora` VALUES (70, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:26:27');
INSERT INTO `bitacora` VALUES (71, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:26:28');
INSERT INTO `bitacora` VALUES (72, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:12');
INSERT INTO `bitacora` VALUES (73, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:12');
INSERT INTO `bitacora` VALUES (74, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:13');
INSERT INTO `bitacora` VALUES (75, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:13');
INSERT INTO `bitacora` VALUES (76, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:14');
INSERT INTO `bitacora` VALUES (77, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:14');
INSERT INTO `bitacora` VALUES (78, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:15');
INSERT INTO `bitacora` VALUES (79, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:15');
INSERT INTO `bitacora` VALUES (80, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:16');
INSERT INTO `bitacora` VALUES (81, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:16');
INSERT INTO `bitacora` VALUES (82, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:16');
INSERT INTO `bitacora` VALUES (83, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:17');
INSERT INTO `bitacora` VALUES (84, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:17');
INSERT INTO `bitacora` VALUES (85, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:18');
INSERT INTO `bitacora` VALUES (86, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:18');
INSERT INTO `bitacora` VALUES (87, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:19');
INSERT INTO `bitacora` VALUES (88, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:19');
INSERT INTO `bitacora` VALUES (89, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:20');
INSERT INTO `bitacora` VALUES (90, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:20');
INSERT INTO `bitacora` VALUES (91, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:21');
INSERT INTO `bitacora` VALUES (92, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"0\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:23');
INSERT INTO `bitacora` VALUES (93, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"0\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:27:49');
INSERT INTO `bitacora` VALUES (94, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:28:46');
INSERT INTO `bitacora` VALUES (95, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"0\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:28:49');
INSERT INTO `bitacora` VALUES (96, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:28:52');
INSERT INTO `bitacora` VALUES (97, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:28:58');
INSERT INTO `bitacora` VALUES (98, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:29:21');
INSERT INTO `bitacora` VALUES (99, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:30:41');
INSERT INTO `bitacora` VALUES (100, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:31:25');
INSERT INTO `bitacora` VALUES (101, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:32:38');
INSERT INTO `bitacora` VALUES (102, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:32:46');
INSERT INTO `bitacora` VALUES (103, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:33:21');
INSERT INTO `bitacora` VALUES (104, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:33:29');
INSERT INTO `bitacora` VALUES (105, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"1\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:33:41');
INSERT INTO `bitacora` VALUES (106, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"1\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:33:57');
INSERT INTO `bitacora` VALUES (107, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"1\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:33:59');
INSERT INTO `bitacora` VALUES (108, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"1\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:04');
INSERT INTO `bitacora` VALUES (109, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:04');
INSERT INTO `bitacora` VALUES (110, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:08');
INSERT INTO `bitacora` VALUES (111, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:08');
INSERT INTO `bitacora` VALUES (112, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:10');
INSERT INTO `bitacora` VALUES (113, '/configuracion/update', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"socio_automatico\":\"1\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:13');
INSERT INTO `bitacora` VALUES (114, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:13');
INSERT INTO `bitacora` VALUES (115, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:24');
INSERT INTO `bitacora` VALUES (116, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:34:26');
INSERT INTO `bitacora` VALUES (117, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:35:12');
INSERT INTO `bitacora` VALUES (118, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:37:21');
INSERT INTO `bitacora` VALUES (119, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:40:40');
INSERT INTO `bitacora` VALUES (120, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:41:08');
INSERT INTO `bitacora` VALUES (121, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:42:04');
INSERT INTO `bitacora` VALUES (122, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:42:51');
INSERT INTO `bitacora` VALUES (123, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:43:02');
INSERT INTO `bitacora` VALUES (124, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:43:09');
INSERT INTO `bitacora` VALUES (125, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:43:46');
INSERT INTO `bitacora` VALUES (126, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:44:07');
INSERT INTO `bitacora` VALUES (127, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:50:35');
INSERT INTO `bitacora` VALUES (128, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:50:52');
INSERT INTO `bitacora` VALUES (129, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:50:56');
INSERT INTO `bitacora` VALUES (130, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:50:59');
INSERT INTO `bitacora` VALUES (131, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:51:00');
INSERT INTO `bitacora` VALUES (132, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:51:49');
INSERT INTO `bitacora` VALUES (133, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:52:04');
INSERT INTO `bitacora` VALUES (134, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:52:22');
INSERT INTO `bitacora` VALUES (135, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:52:39');
INSERT INTO `bitacora` VALUES (136, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:20');
INSERT INTO `bitacora` VALUES (137, '/asociados/add', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"numero_asociado\":\"0000000005\",\"id_cliente\":\"63\",\"fecha_ingreso\":\"2024-05-29\",\"sueldo_quincenal\":\"15\",\"sueldo_mensual\":\"15\",\"otros_ingresos\":\"30\",\"dependientes_economicamente\":\"1\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:40');
INSERT INTO `bitacora` VALUES (138, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:41');
INSERT INTO `bitacora` VALUES (139, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:43');
INSERT INTO `bitacora` VALUES (140, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:47');
INSERT INTO `bitacora` VALUES (141, '/asociados/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:48');
INSERT INTO `bitacora` VALUES (142, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:52');
INSERT INTO `bitacora` VALUES (143, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:53:53');
INSERT INTO `bitacora` VALUES (144, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:56:28');
INSERT INTO `bitacora` VALUES (145, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:57:19');
INSERT INTO `bitacora` VALUES (146, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:57:37');
INSERT INTO `bitacora` VALUES (147, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:57:51');
INSERT INTO `bitacora` VALUES (148, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:58:11');
INSERT INTO `bitacora` VALUES (149, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:58:18');
INSERT INTO `bitacora` VALUES (150, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:58:56');
INSERT INTO `bitacora` VALUES (151, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:59:06');
INSERT INTO `bitacora` VALUES (152, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:59:12');
INSERT INTO `bitacora` VALUES (153, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:59:20');
INSERT INTO `bitacora` VALUES (154, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 18:59:27');
INSERT INTO `bitacora` VALUES (155, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:00:25');
INSERT INTO `bitacora` VALUES (156, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:01:07');
INSERT INTO `bitacora` VALUES (157, '/asociados/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:01:15');
INSERT INTO `bitacora` VALUES (158, '/asociados/put', '{\"_token\":\"DboEinABM8lOBo1JmqzMl9PzUM6sJoBWWvfXITEO\",\"_method\":\"PUT\",\"id\":\"2\",\"id_cliente\":\"63\",\"fecha_ingreso\":\"2024-05-29\",\"sueldo_quincenal\":\"15.00\",\"sueldo_mensual\":\"15.00\",\"otros_ingresos\":\"30.00\",\"dependientes_economicamente\":\"1\",\"couta_ingreso\":\"10.00\",\"monto_aportacion\":\"10.00\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null,\"estado_solicitud\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:01:19');
INSERT INTO `bitacora` VALUES (159, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:01:20');
INSERT INTO `bitacora` VALUES (160, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-05-29 19:09:56');
INSERT INTO `bitacora` VALUES (161, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:34:32');
INSERT INTO `bitacora` VALUES (162, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:39:11');
INSERT INTO `bitacora` VALUES (163, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:39:15');
INSERT INTO `bitacora` VALUES (164, '/cajas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:39:24');
INSERT INTO `bitacora` VALUES (165, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:10');
INSERT INTO `bitacora` VALUES (166, '/cajas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:14');
INSERT INTO `bitacora` VALUES (167, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:21');
INSERT INTO `bitacora` VALUES (168, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:26');
INSERT INTO `bitacora` VALUES (169, '/apertura/cortez/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:30');
INSERT INTO `bitacora` VALUES (170, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:31');
INSERT INTO `bitacora` VALUES (171, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:42');
INSERT INTO `bitacora` VALUES (172, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:46');
INSERT INTO `bitacora` VALUES (173, '/apertura/aperturarcaja', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_bobeda_movimiento\":\"1\",\"id_caja\":\"1\",\"monto_apertura\":\"9889.76\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:48');
INSERT INTO `bitacora` VALUES (174, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:48');
INSERT INTO `bitacora` VALUES (175, '/apertura/cortez/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:50');
INSERT INTO `bitacora` VALUES (176, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:50');
INSERT INTO `bitacora` VALUES (177, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:52');
INSERT INTO `bitacora` VALUES (178, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:40:54');
INSERT INTO `bitacora` VALUES (179, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:02');
INSERT INTO `bitacora` VALUES (180, '/boveda/recibirCorte', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_corte_movimiento\":\"2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:09');
INSERT INTO `bitacora` VALUES (181, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:10');
INSERT INTO `bitacora` VALUES (182, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:15');
INSERT INTO `bitacora` VALUES (183, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:16');
INSERT INTO `bitacora` VALUES (184, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:41:18');
INSERT INTO `bitacora` VALUES (185, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:42:39');
INSERT INTO `bitacora` VALUES (186, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:17');
INSERT INTO `bitacora` VALUES (187, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:22');
INSERT INTO `bitacora` VALUES (188, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:24');
INSERT INTO `bitacora` VALUES (189, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:25');
INSERT INTO `bitacora` VALUES (190, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:28');
INSERT INTO `bitacora` VALUES (191, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:38');
INSERT INTO `bitacora` VALUES (192, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:48:43');
INSERT INTO `bitacora` VALUES (193, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:54:11');
INSERT INTO `bitacora` VALUES (194, '/alerts/client/63', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:54:25');
INSERT INTO `bitacora` VALUES (195, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:55:54');
INSERT INTO `bitacora` VALUES (196, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:03');
INSERT INTO `bitacora` VALUES (197, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:36');
INSERT INTO `bitacora` VALUES (198, '/boveda/cerrar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:39');
INSERT INTO `bitacora` VALUES (199, '/boveda/realizarCierreBobeda', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_bobeda\":\"2\",\"monto\":\"48778.76\",\"id_empleado\":\"9\",\"observacion\":\"Ninguna\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:49');
INSERT INTO `bitacora` VALUES (200, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:50');
INSERT INTO `bitacora` VALUES (201, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:56:59');
INSERT INTO `bitacora` VALUES (202, '/boveda/realizarAperturaBobeda', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_bobeda\":\"2\",\"monto\":\"50000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:57:27');
INSERT INTO `bitacora` VALUES (203, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:57:27');
INSERT INTO `bitacora` VALUES (204, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:57:36');
INSERT INTO `bitacora` VALUES (205, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:57:45');
INSERT INTO `bitacora` VALUES (206, '/clientes/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"nombre\":\"Glenda Esperanza Portillo\",\"genero\":\"0\",\"fecha_nacimiento\":\"1980-12-12\",\"dui_cliente\":\"00000000-0\",\"dui_extendido\":\"San Miguel\",\"fecha_expedicion\":\"2020-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1a\",\"estado_civil\":\"Solteraq\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"Empleado\",\"direccion_negocio\":\"SAN miguel\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:59:02');
INSERT INTO `bitacora` VALUES (207, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:59:03');
INSERT INTO `bitacora` VALUES (208, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:59:37');
INSERT INTO `bitacora` VALUES (209, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 08:59:59');
INSERT INTO `bitacora` VALUES (210, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:00:23');
INSERT INTO `bitacora` VALUES (211, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:00:47');
INSERT INTO `bitacora` VALUES (212, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:00:51');
INSERT INTO `bitacora` VALUES (213, '/asociados/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"numero_asociado\":\"0000000010\",\"id_cliente\":\"66\",\"fecha_ingreso\":\"2024-06-26\",\"sueldo_quincenal\":\"150\",\"sueldo_mensual\":\"150\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"5\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:05');
INSERT INTO `bitacora` VALUES (214, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:05');
INSERT INTO `bitacora` VALUES (215, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:34');
INSERT INTO `bitacora` VALUES (216, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:36');
INSERT INTO `bitacora` VALUES (217, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:38');
INSERT INTO `bitacora` VALUES (218, '/asociados/put', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"PUT\",\"id\":\"3\",\"id_cliente\":\"66\",\"fecha_ingreso\":\"2024-06-26\",\"sueldo_quincenal\":\"150.00\",\"sueldo_mensual\":\"150.00\",\"otros_ingresos\":\"0.00\",\"dependientes_economicamente\":\"5\",\"couta_ingreso\":\"10.00\",\"monto_aportacion\":\"10.00\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null,\"estado_solicitud\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:43');
INSERT INTO `bitacora` VALUES (219, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:43');
INSERT INTO `bitacora` VALUES (220, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:48');
INSERT INTO `bitacora` VALUES (221, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:50');
INSERT INTO `bitacora` VALUES (222, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:57');
INSERT INTO `bitacora` VALUES (223, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:02:57');
INSERT INTO `bitacora` VALUES (224, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:03:05');
INSERT INTO `bitacora` VALUES (225, '/intereses/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:03:46');
INSERT INTO `bitacora` VALUES (226, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:01');
INSERT INTO `bitacora` VALUES (227, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:17');
INSERT INTO `bitacora` VALUES (228, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:19');
INSERT INTO `bitacora` VALUES (229, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:20');
INSERT INTO `bitacora` VALUES (230, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:48');
INSERT INTO `bitacora` VALUES (231, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:04:51');
INSERT INTO `bitacora` VALUES (232, '/cajas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:05:06');
INSERT INTO `bitacora` VALUES (233, '/bitacora', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:05:29');
INSERT INTO `bitacora` VALUES (234, '/bitacora', '{\"hasta\":\"23:59:59\",\"page\":\"2\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:05:32');
INSERT INTO `bitacora` VALUES (235, '/bitacora', '{\"hasta\":\"23:59:59 23:59:59\",\"page\":\"3\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:05:52');
INSERT INTO `bitacora` VALUES (236, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:06:04');
INSERT INTO `bitacora` VALUES (237, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:06:10');
INSERT INTO `bitacora` VALUES (238, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:06:13');
INSERT INTO `bitacora` VALUES (239, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:06:17');
INSERT INTO `bitacora` VALUES (240, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:06:55');
INSERT INTO `bitacora` VALUES (241, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:06');
INSERT INTO `bitacora` VALUES (242, '/boveda/realizarTraslado', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Por apertura de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:27');
INSERT INTO `bitacora` VALUES (243, '/boveda/realizarTraslado', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Por apertura de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:27');
INSERT INTO `bitacora` VALUES (244, '/reportes/comprobanteMovimientoBobeda/5', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:27');
INSERT INTO `bitacora` VALUES (245, '/reportes/comprobanteMovimientoBobeda/6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:28');
INSERT INTO `bitacora` VALUES (246, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:07:29');
INSERT INTO `bitacora` VALUES (247, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:12');
INSERT INTO `bitacora` VALUES (248, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:16');
INSERT INTO `bitacora` VALUES (249, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:18');
INSERT INTO `bitacora` VALUES (250, '/apertura/aperturarcaja', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_bobeda_movimiento\":\"5\",\"id_caja\":\"1\",\"monto_apertura\":\"1000.00\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:32');
INSERT INTO `bitacora` VALUES (251, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:32');
INSERT INTO `bitacora` VALUES (252, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:44');
INSERT INTO `bitacora` VALUES (253, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:08:45');
INSERT INTO `bitacora` VALUES (254, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:09:47');
INSERT INTO `bitacora` VALUES (255, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:10:04');
INSERT INTO `bitacora` VALUES (256, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:10:08');
INSERT INTO `bitacora` VALUES (257, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:10:30');
INSERT INTO `bitacora` VALUES (258, '/intereses/getIntereses/2', '{\"opcion_seleccionada\":\"2\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:10:57');
INSERT INTO `bitacora` VALUES (259, '/intereses/getIntereses/7', '{\"opcion_seleccionada\":\"7\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:00');
INSERT INTO `bitacora` VALUES (260, '/intereses/getIntereses/9', '{\"opcion_seleccionada\":\"9\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:03');
INSERT INTO `bitacora` VALUES (261, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:05');
INSERT INTO `bitacora` VALUES (262, '/cuentas/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_caja\":\"1\",\"id_asociado\":\"3\",\"fecha_apertura\":\"2024-06-26\",\"id_tipo_cuenta\":\"1\",\"id_interes_tipo_cuenta\":\"13\",\"numero_cuenta\":\"0000000003\",\"monto_apertura\":\"50\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:14');
INSERT INTO `bitacora` VALUES (263, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:14');
INSERT INTO `bitacora` VALUES (264, '/declare/145/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:28');
INSERT INTO `bitacora` VALUES (265, '/reportes/contrato/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:38');
INSERT INTO `bitacora` VALUES (266, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:11:58');
INSERT INTO `bitacora` VALUES (267, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:01');
INSERT INTO `bitacora` VALUES (268, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:10');
INSERT INTO `bitacora` VALUES (269, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:13');
INSERT INTO `bitacora` VALUES (270, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:20');
INSERT INTO `bitacora` VALUES (271, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:23');
INSERT INTO `bitacora` VALUES (272, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:25');
INSERT INTO `bitacora` VALUES (273, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:39');
INSERT INTO `bitacora` VALUES (274, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:54');
INSERT INTO `bitacora` VALUES (275, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:12:59');
INSERT INTO `bitacora` VALUES (276, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:13:00');
INSERT INTO `bitacora` VALUES (277, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:13:02');
INSERT INTO `bitacora` VALUES (278, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:13:18');
INSERT INTO `bitacora` VALUES (279, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:13:24');
INSERT INTO `bitacora` VALUES (280, '/reportes/RepEstadoCuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:13:36');
INSERT INTO `bitacora` VALUES (281, '/reportes/RepEstadoCuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:14:23');
INSERT INTO `bitacora` VALUES (282, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:14:44');
INSERT INTO `bitacora` VALUES (283, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:14:58');
INSERT INTO `bitacora` VALUES (284, '/cuentas/getcuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:04');
INSERT INTO `bitacora` VALUES (285, '/movimientos/realizarretiro', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"2\",\"id_cuenta\":\"145\",\"saldo\":\"50.00\",\"id_libreta\":\"1\",\"monto\":\"20\",\"cliente_transaccion\":\"Glenda Esperanza Portillo\",\"dui_transaccion\":\"03731671-7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:32');
INSERT INTO `bitacora` VALUES (286, '/movimientos/realizarretiro', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"2\",\"id_cuenta\":\"145\",\"saldo\":\"50.00\",\"id_libreta\":\"1\",\"monto\":\"20\",\"cliente_transaccion\":\"Glenda Esperanza Portillo\",\"dui_transaccion\":\"03731671-7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:33');
INSERT INTO `bitacora` VALUES (287, '/reportes/comprobanteMovimiento/6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:34');
INSERT INTO `bitacora` VALUES (288, '/reportes/comprobanteMovimiento/7', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:37');
INSERT INTO `bitacora` VALUES (289, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:15:40');
INSERT INTO `bitacora` VALUES (290, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:16:35');
INSERT INTO `bitacora` VALUES (291, '/reportes/RepEstadoCuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:16:38');
INSERT INTO `bitacora` VALUES (292, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:00');
INSERT INTO `bitacora` VALUES (293, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:04');
INSERT INTO `bitacora` VALUES (294, '/movimientos/depositar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:07');
INSERT INTO `bitacora` VALUES (295, '/cuentas/getLibreta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:10');
INSERT INTO `bitacora` VALUES (296, '/movimientos/realizardeposito', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"3\",\"id_cuenta\":\"145\",\"id_libreta\":\"1\",\"monto\":\"150\",\"dui_transaccion\":\"03731671-7\",\"cliente_transaccion\":\"Luis Arnulfo Marquez\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:29');
INSERT INTO `bitacora` VALUES (297, '/reportes/comprobanteMovimiento/8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:30');
INSERT INTO `bitacora` VALUES (298, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:33');
INSERT INTO `bitacora` VALUES (299, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:17:54');
INSERT INTO `bitacora` VALUES (300, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:18:11');
INSERT INTO `bitacora` VALUES (301, '/reportes/RepEstadoCuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:18:14');
INSERT INTO `bitacora` VALUES (302, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:18:28');
INSERT INTO `bitacora` VALUES (303, '/cuentas/listarMovimientosSinImprirmir/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:18:32');
INSERT INTO `bitacora` VALUES (304, '/cuentas/listarMovimientosSinImprirmir/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:19:16');
INSERT INTO `bitacora` VALUES (305, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:19:31');
INSERT INTO `bitacora` VALUES (306, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:20:37');
INSERT INTO `bitacora` VALUES (307, '/temp/generateTempPassword', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:20:55');
INSERT INTO `bitacora` VALUES (308, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:29');
INSERT INTO `bitacora` VALUES (309, '/temp/validatePassword/41Hmussss', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:38');
INSERT INTO `bitacora` VALUES (310, '/temp/validatePassword/41Hmu', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:44');
INSERT INTO `bitacora` VALUES (311, '/movimientos/anularmovimiento', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id\":\"7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:44');
INSERT INTO `bitacora` VALUES (312, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:45');
INSERT INTO `bitacora` VALUES (313, '/reportes/comprobanteMovimiento/7', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:21:50');
INSERT INTO `bitacora` VALUES (314, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:22:50');
INSERT INTO `bitacora` VALUES (315, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:22:57');
INSERT INTO `bitacora` VALUES (316, '/clientes/getClienteData/66', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:07');
INSERT INTO `bitacora` VALUES (317, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:26');
INSERT INTO `bitacora` VALUES (318, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:28');
INSERT INTO `bitacora` VALUES (319, '/referencias/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"nombre\":\"Luis Arnulfo M\\u00e1rquez Argueta\",\"parentesco\":\"Her,amp\",\"telefono\":\"26541561\",\"direccion\":\"San Miguel\",\"lugar_trabajo\":\"Computec\",\"observaciones\":\"ninguna\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:50');
INSERT INTO `bitacora` VALUES (320, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:50');
INSERT INTO `bitacora` VALUES (321, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:55');
INSERT INTO `bitacora` VALUES (322, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:57');
INSERT INTO `bitacora` VALUES (323, '/clientes/getClienteData/66', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:23:59');
INSERT INTO `bitacora` VALUES (324, '/creditos/solicitudes/referencias/add/1/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:27:40');
INSERT INTO `bitacora` VALUES (325, '/creditos/solicitudes/referencias/getReferencias/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:27:40');
INSERT INTO `bitacora` VALUES (326, '/creditos/solicitudes/bienes/add', '{\"clase_propiedad\":\"Casa de habitacion\",\"direccion_bien\":\"San miguel\",\"valor\":\"25000\",\"hipotecado_bien\":\"0\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:27:57');
INSERT INTO `bitacora` VALUES (327, '/creditos/solicitudes/bienes/getBienes/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:27:57');
INSERT INTO `bitacora` VALUES (328, '/creditos/solicitudes/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-06-26\",\"id_cliente\":\"66\",\"fecha_nacimiento\":\"1980-12-12\",\"genero\":\"0\",\"dui_cliente\":\"00000000-0\",\"fecha_expedicion\":\"2020-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1a\",\"estado_civil\":\"Solteraq\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"Empleado\",\"direccion_negocio\":\"SAN miguel\",\"tipo_vivienda\":\"0\",\"observaciones\":null,\"monto_solicitado\":\"500\",\"plazo\":\"12\",\"tasa\":\"42\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10\",\"aportaciones\":\"10\",\"destino\":\"58\",\"tipo_garantia\":\"3\",\"garantia\":\"Luis Arnulfo Marquez Argueta\",\"id_conyugue\":null,\"empresa_labora\":\"Computec\",\"cargo\":\"Propietario\",\"sueldo_conyugue\":\"500\",\"tiempo_laborando\":\"1 a\\u00f1o\",\"telefono_trabajo\":\"2654-1561\",\"sueldo_solicitante\":\"500\",\"comisiones\":\"200\",\"negocio_propio\":null,\"otros_ingresos\":\"200\",\"total_ingresos\":\"900\",\"gastos_vida\":\"100\",\"pagos_obligaciones\":\"0\",\"gastos_negocios\":\"0\",\"otros_gastos\":\"0\",\"total_gasto\":\"100\",\"id_referencia\":\"1\",\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":\"0\",\"hipotecado_bien\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:09');
INSERT INTO `bitacora` VALUES (329, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:09');
INSERT INTO `bitacora` VALUES (330, '/creditos/solicitud/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:16');
INSERT INTO `bitacora` VALUES (331, '/creditos/solicitudes/edit/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:45');
INSERT INTO `bitacora` VALUES (332, '/creditos/solicitudes/referencias/getReferencias/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:46');
INSERT INTO `bitacora` VALUES (333, '/creditos/solicitudes/bienes/getBienes/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:28:46');
INSERT INTO `bitacora` VALUES (334, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:29:28');
INSERT INTO `bitacora` VALUES (335, '/creditos/pagare/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:29:31');
INSERT INTO `bitacora` VALUES (336, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:30:51');
INSERT INTO `bitacora` VALUES (337, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:30:53');
INSERT INTO `bitacora` VALUES (338, '/creditos/solicitudes/send_comite/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:31:12');
INSERT INTO `bitacora` VALUES (339, '/creditos/solicitudes/send_comite', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"500.00\",\"plazo\":\"12\",\"tasa\":\"42.00\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10.00\",\"aportaciones\":\"10.00\",\"destino\":\"58\",\"garantia\":\"Luis Arnulfo Marquez Argueta\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:31:21');
INSERT INTO `bitacora` VALUES (340, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:31:21');
INSERT INTO `bitacora` VALUES (341, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:31:34');
INSERT INTO `bitacora` VALUES (342, '/creditos/solicitudes/desembolso/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:32:17');
INSERT INTO `bitacora` VALUES (343, '/creditos/solicitudes/create-credit', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"500.00\",\"plazo\":\"12\",\"tasa\":\"42.00\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10.00\",\"aportaciones\":\"10.00\",\"destino\":\"58\",\"garantia\":\"Luis Arnulfo Marquez Argueta\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:32:33');
INSERT INTO `bitacora` VALUES (344, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:32:33');
INSERT INTO `bitacora` VALUES (345, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:32:38');
INSERT INTO `bitacora` VALUES (346, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:32:44');
INSERT INTO `bitacora` VALUES (347, '/creditos/preaprobado/liquidar/7df0444d-2a1f-4cf5-bf36-677ebc62f4af', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:33:03');
INSERT INTO `bitacora` VALUES (348, '/creditos/preaprobado/liquidar/getDescuentos/7df0444d-2a1f-4cf5-bf36-677ebc62f4af', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:33:04');
INSERT INTO `bitacora` VALUES (349, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:34:37');
INSERT INTO `bitacora` VALUES (350, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:34:39');
INSERT INTO `bitacora` VALUES (351, '/intereses/getIntereses/9', '{\"opcion_seleccionada\":\"9\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:34:47');
INSERT INTO `bitacora` VALUES (352, '/cuentas/add', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"id_caja\":\"1\",\"id_asociado\":\"3\",\"fecha_apertura\":\"2024-06-26\",\"id_tipo_cuenta\":\"9\",\"id_interes_tipo_cuenta\":\"11\",\"numero_cuenta\":\"0000000001\",\"monto_apertura\":\"10\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:34:53');
INSERT INTO `bitacora` VALUES (353, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:34:53');
INSERT INTO `bitacora` VALUES (354, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:35:04');
INSERT INTO `bitacora` VALUES (355, '/creditos/preaprobado/liquidar/7df0444d-2a1f-4cf5-bf36-677ebc62f4af', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:35:05');
INSERT INTO `bitacora` VALUES (356, '/creditos/preaprobado/liquidar/getDescuentos/7df0444d-2a1f-4cf5-bf36-677ebc62f4af', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:35:06');
INSERT INTO `bitacora` VALUES (357, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:35:32');
INSERT INTO `bitacora` VALUES (358, '/creditos/solicitud/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:35:35');
INSERT INTO `bitacora` VALUES (359, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:36:20');
INSERT INTO `bitacora` VALUES (360, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:36:22');
INSERT INTO `bitacora` VALUES (361, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:03');
INSERT INTO `bitacora` VALUES (362, '/creditos/solicitudes/edit/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:06');
INSERT INTO `bitacora` VALUES (363, '/creditos/solicitudes/referencias/getReferencias/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:06');
INSERT INTO `bitacora` VALUES (364, '/creditos/solicitudes/bienes/getBienes/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:07');
INSERT INTO `bitacora` VALUES (365, '/creditos/solicitudes/put', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"PUT\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-06-26\",\"id_cliente\":\"66\",\"fecha_nacimiento\":\"1980-12-12\",\"genero\":\"0\",\"dui_cliente\":\"00000000-0\",\"fecha_expedicion\":\"2020-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1a\",\"estado_civil\":\"Solteraq\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"Empleado\",\"direccion_negocio\":\"SAN miguel\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\",\"monto_solicitado\":\"500.00\",\"plazo\":\"12\",\"tasa\":\"42.00\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10.00\",\"aportaciones\":\"10.00\",\"destino\":\"60\",\"tipo_garantia\":\"3\",\"garantia\":\"Luis Arnulfo Marquez Argueta\",\"id_conyugue\":null,\"empresa_labora\":\"Computec\",\"cargo\":\"Propietario\",\"sueldo_conyugue\":\"500.00\",\"tiempo_laborando\":\"500.00\",\"telefono_trabajo\":\"2654-1561\",\"sueldo_solicitante\":\"500.00\",\"comisiones\":\"200.00\",\"negocio_propio\":null,\"otros_ingresos\":\"200\",\"total_ingresos\":\"900.00\",\"gastos_vida\":\"100.00\",\"pagos_obligaciones\":\"0.00\",\"gastos_negocios\":\"0.00\",\"otros_gastos\":\"0.00\",\"total_gasto\":\"100.00\",\"id_referencia\":null,\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":\"0\",\"hipotecado_bien\":\"0\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:16');
INSERT INTO `bitacora` VALUES (366, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:17');
INSERT INTO `bitacora` VALUES (367, '/creditos/solicitudes/send_comite/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:20');
INSERT INTO `bitacora` VALUES (368, '/creditos/solicitudes/send_comite', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"500.00\",\"plazo\":\"12\",\"tasa\":\"42.00\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10.00\",\"aportaciones\":\"10.00\",\"destino\":\"60\",\"garantia\":\"Luis Arnulfo Marquez Argueta\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:21');
INSERT INTO `bitacora` VALUES (369, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:22');
INSERT INTO `bitacora` VALUES (370, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:27');
INSERT INTO `bitacora` VALUES (371, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:28');
INSERT INTO `bitacora` VALUES (372, '/creditos/solicitudes/desembolso/93f2cb5a-02d3-4e3c-9c42-7f2c557710a8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:31');
INSERT INTO `bitacora` VALUES (373, '/creditos/solicitudes/create-credit', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"id_solicitud\":\"93f2cb5a-02d3-4e3c-9c42-7f2c557710a8\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"500.00\",\"plazo\":\"12\",\"tasa\":\"42.00\",\"cuota\":\"51.74\",\"seguro_deuda\":\"10.00\",\"aportaciones\":\"10.00\",\"destino\":\"60\",\"garantia\":\"Luis Arnulfo Marquez Argueta\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:32');
INSERT INTO `bitacora` VALUES (374, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:32');
INSERT INTO `bitacora` VALUES (375, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:34');
INSERT INTO `bitacora` VALUES (376, '/creditos/preaprobado/liquidar/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:40');
INSERT INTO `bitacora` VALUES (377, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:37:41');
INSERT INTO `bitacora` VALUES (378, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"60\",\"monto_debe\":\"500.00\",\"monto_haber\":null,\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:38:24');
INSERT INTO `bitacora` VALUES (379, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:38:24');
INSERT INTO `bitacora` VALUES (380, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"500\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:38:54');
INSERT INTO `bitacora` VALUES (381, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:38:54');
INSERT INTO `bitacora` VALUES (382, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"288\",\"monto_debe\":\"0\",\"monto_haber\":\"10\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:39:22');
INSERT INTO `bitacora` VALUES (383, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:39:22');
INSERT INTO `bitacora` VALUES (384, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:39:41');
INSERT INTO `bitacora` VALUES (385, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:39:41');
INSERT INTO `bitacora` VALUES (386, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"7.50\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:10');
INSERT INTO `bitacora` VALUES (387, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:10');
INSERT INTO `bitacora` VALUES (388, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"19.78\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:35');
INSERT INTO `bitacora` VALUES (389, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:35');
INSERT INTO `bitacora` VALUES (390, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"2.5\",\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"comentario\":null,\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:56');
INSERT INTO `bitacora` VALUES (391, '/creditos/preaprobado/liquidar/getDescuentos/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:40:56');
INSERT INTO `bitacora` VALUES (392, '/creditos/solicitudes/liquidar', '{\"id_credito\":\"fd67ac1e-e4b4-4955-ac07-d56fedbafa54\",\"liquido\":\"438.34\",\"id_cuenta_ahorro_destino\":\"145\",\"id_cuenta_aportacion_destino\":\"146\",\"aportacionMonto\":\"0\",\"id_caja_aperturada\":\"1\",\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:09');
INSERT INTO `bitacora` VALUES (393, '/creditos/aprobado/liquidacion/fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:11');
INSERT INTO `bitacora` VALUES (394, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:12');
INSERT INTO `bitacora` VALUES (395, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:31');
INSERT INTO `bitacora` VALUES (396, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:51');
INSERT INTO `bitacora` VALUES (397, '/reportes/partidaContable/dbbdf592-5a19-4365-b11e-d116ca45b160', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:41:57');
INSERT INTO `bitacora` VALUES (398, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:42:46');
INSERT INTO `bitacora` VALUES (399, '/contabilidad/catalogo', '{\"_token\":\"10MQefHWwckeHh3PfylrzJDZ1CsygrpdToL1Sr17\",\"_method\":\"POST\",\"filtro\":\"11040101\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:42:57');
INSERT INTO `bitacora` VALUES (400, '/contabilidad/catalogo/edit/60', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:42:58');
INSERT INTO `bitacora` VALUES (401, '/contabilidad/catalogo/getCuentasById/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:42:59');
INSERT INTO `bitacora` VALUES (402, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:43:15');
INSERT INTO `bitacora` VALUES (403, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-06-26 09:43:43');
INSERT INTO `bitacora` VALUES (404, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:11:32');
INSERT INTO `bitacora` VALUES (405, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:11:38');
INSERT INTO `bitacora` VALUES (406, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:11:40');
INSERT INTO `bitacora` VALUES (407, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:11:43');
INSERT INTO `bitacora` VALUES (408, '/facturas/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:16');
INSERT INTO `bitacora` VALUES (409, '/facturas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:18');
INSERT INTO `bitacora` VALUES (410, '/facturas/detalles/76dc4b72-159c-4cdb-97c7-20142a1ba40e', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:19');
INSERT INTO `bitacora` VALUES (411, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:26');
INSERT INTO `bitacora` VALUES (412, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:29');
INSERT INTO `bitacora` VALUES (413, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:12:57');
INSERT INTO `bitacora` VALUES (414, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:13:06');
INSERT INTO `bitacora` VALUES (415, '/asociados/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:13:13');
INSERT INTO `bitacora` VALUES (416, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:13:15');
INSERT INTO `bitacora` VALUES (417, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:13:18');
INSERT INTO `bitacora` VALUES (418, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:13:20');
INSERT INTO `bitacora` VALUES (419, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:19:48');
INSERT INTO `bitacora` VALUES (420, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:19:53');
INSERT INTO `bitacora` VALUES (421, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:19:57');
INSERT INTO `bitacora` VALUES (422, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:20:09');
INSERT INTO `bitacora` VALUES (423, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:20:11');
INSERT INTO `bitacora` VALUES (424, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:20:13');
INSERT INTO `bitacora` VALUES (425, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:21:08');
INSERT INTO `bitacora` VALUES (426, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:21:22');
INSERT INTO `bitacora` VALUES (427, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:24:52');
INSERT INTO `bitacora` VALUES (428, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:24:54');
INSERT INTO `bitacora` VALUES (429, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 12:24:55');
INSERT INTO `bitacora` VALUES (430, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 13:27:16');
INSERT INTO `bitacora` VALUES (431, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 13:27:27');
INSERT INTO `bitacora` VALUES (432, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 13:27:32');
INSERT INTO `bitacora` VALUES (433, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 13:27:53');
INSERT INTO `bitacora` VALUES (434, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 13:28:11');
INSERT INTO `bitacora` VALUES (435, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:26:13');
INSERT INTO `bitacora` VALUES (436, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:20');
INSERT INTO `bitacora` VALUES (437, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:30');
INSERT INTO `bitacora` VALUES (438, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:44');
INSERT INTO `bitacora` VALUES (439, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:46');
INSERT INTO `bitacora` VALUES (440, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:47');
INSERT INTO `bitacora` VALUES (441, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:53');
INSERT INTO `bitacora` VALUES (442, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 16:27:57');
INSERT INTO `bitacora` VALUES (443, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:11:00');
INSERT INTO `bitacora` VALUES (444, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:11:02');
INSERT INTO `bitacora` VALUES (445, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:11:06');
INSERT INTO `bitacora` VALUES (446, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:11:52');
INSERT INTO `bitacora` VALUES (447, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:11:56');
INSERT INTO `bitacora` VALUES (448, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:12:12');
INSERT INTO `bitacora` VALUES (449, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:13:52');
INSERT INTO `bitacora` VALUES (450, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:13:58');
INSERT INTO `bitacora` VALUES (451, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:14:00');
INSERT INTO `bitacora` VALUES (452, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:14:06');
INSERT INTO `bitacora` VALUES (453, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:14:10');
INSERT INTO `bitacora` VALUES (454, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:19');
INSERT INTO `bitacora` VALUES (455, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:42');
INSERT INTO `bitacora` VALUES (456, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:46');
INSERT INTO `bitacora` VALUES (457, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:50');
INSERT INTO `bitacora` VALUES (458, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:52');
INSERT INTO `bitacora` VALUES (459, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:54');
INSERT INTO `bitacora` VALUES (460, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:15:58');
INSERT INTO `bitacora` VALUES (461, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:01');
INSERT INTO `bitacora` VALUES (462, '/beneficiarios/add/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:03');
INSERT INTO `bitacora` VALUES (463, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:05');
INSERT INTO `bitacora` VALUES (464, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:15');
INSERT INTO `bitacora` VALUES (465, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:18');
INSERT INTO `bitacora` VALUES (466, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:19');
INSERT INTO `bitacora` VALUES (467, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:23');
INSERT INTO `bitacora` VALUES (468, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:24');
INSERT INTO `bitacora` VALUES (469, '/beneficiarios/add', '{\"_token\":\"0OLAhLXUlZQxpllfoytnRahvBLnE8vMWwFNiWnOy\",\"id_asociado\":\"2\",\"id_cuenta\":\"142\",\"parentesco\":\"1\",\"nombre\":\"10\",\"porcentaje\":\"50\",\"direccion\":\"1\",\"telefono\":\"1\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:33');
INSERT INTO `bitacora` VALUES (470, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:33');
INSERT INTO `bitacora` VALUES (471, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:39');
INSERT INTO `bitacora` VALUES (472, '/beneficiarios/add', '{\"_token\":\"0OLAhLXUlZQxpllfoytnRahvBLnE8vMWwFNiWnOy\",\"id_asociado\":\"2\",\"id_cuenta\":\"142\",\"parentesco\":\"3\",\"nombre\":\"4456\",\"porcentaje\":\"50\",\"direccion\":\"45\",\"telefono\":\"582\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:49');
INSERT INTO `bitacora` VALUES (473, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:49');
INSERT INTO `bitacora` VALUES (474, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:16:51');
INSERT INTO `bitacora` VALUES (475, '/beneficiarios/add', '{\"_token\":\"0OLAhLXUlZQxpllfoytnRahvBLnE8vMWwFNiWnOy\",\"id_asociado\":\"2\",\"id_cuenta\":\"142\",\"parentesco\":\"2\",\"nombre\":\"12\",\"porcentaje\":\"20\",\"direccion\":\"12\",\"telefono\":\"12\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:17:00');
INSERT INTO `bitacora` VALUES (476, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:17:00');
INSERT INTO `bitacora` VALUES (477, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:24:05');
INSERT INTO `bitacora` VALUES (478, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:24:56');
INSERT INTO `bitacora` VALUES (479, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:28:46');
INSERT INTO `bitacora` VALUES (480, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:29:44');
INSERT INTO `bitacora` VALUES (481, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:30:15');
INSERT INTO `bitacora` VALUES (482, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:31:03');
INSERT INTO `bitacora` VALUES (483, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:32:22');
INSERT INTO `bitacora` VALUES (484, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:32:24');
INSERT INTO `bitacora` VALUES (485, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:32:29');
INSERT INTO `bitacora` VALUES (486, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:32:43');
INSERT INTO `bitacora` VALUES (487, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:33:06');
INSERT INTO `bitacora` VALUES (488, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:33:34');
INSERT INTO `bitacora` VALUES (489, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:34:00');
INSERT INTO `bitacora` VALUES (490, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:34:07');
INSERT INTO `bitacora` VALUES (491, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:34:27');
INSERT INTO `bitacora` VALUES (492, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:34:37');
INSERT INTO `bitacora` VALUES (493, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:34:48');
INSERT INTO `bitacora` VALUES (494, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:35:06');
INSERT INTO `bitacora` VALUES (495, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:35:20');
INSERT INTO `bitacora` VALUES (496, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:36:47');
INSERT INTO `bitacora` VALUES (497, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:37:04');
INSERT INTO `bitacora` VALUES (498, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:37:10');
INSERT INTO `bitacora` VALUES (499, '/beneficiarios/put', '{\"_token\":\"0OLAhLXUlZQxpllfoytnRahvBLnE8vMWwFNiWnOy\",\"_method\":\"PUT\",\"id\":\"1\",\"id_asociado\":\"2\",\"nombre\":\"10\",\"parentesco\":\"1\",\"porcentaje\":\"50.00\",\"direccion\":\"1\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:37:14');
INSERT INTO `bitacora` VALUES (500, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 17:37:14');
INSERT INTO `bitacora` VALUES (501, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-07-15 19:24:45');
INSERT INTO `bitacora` VALUES (502, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:01:50');
INSERT INTO `bitacora` VALUES (503, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:01:54');
INSERT INTO `bitacora` VALUES (504, '/clientes/63', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:01:57');
INSERT INTO `bitacora` VALUES (505, '/clientes/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"63\",\"nombre\":\"Luis Arnulfo Marquez Argueta\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2021-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Casado\",\"direccion_personal\":\"Meanguera\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco GOtera\",\"tipo_vivienda\":\"1\",\"observaciones\":null}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:00');
INSERT INTO `bitacora` VALUES (506, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:00');
INSERT INTO `bitacora` VALUES (507, '/alerts/clients', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:03');
INSERT INTO `bitacora` VALUES (508, '/alerts/active', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:08');
INSERT INTO `bitacora` VALUES (509, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:17');
INSERT INTO `bitacora` VALUES (510, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:20');
INSERT INTO `bitacora` VALUES (511, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:24');
INSERT INTO `bitacora` VALUES (512, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:31');
INSERT INTO `bitacora` VALUES (513, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:02:34');
INSERT INTO `bitacora` VALUES (514, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:39');
INSERT INTO `bitacora` VALUES (515, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:45');
INSERT INTO `bitacora` VALUES (516, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:50');
INSERT INTO `bitacora` VALUES (517, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:51');
INSERT INTO `bitacora` VALUES (518, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:55');
INSERT INTO `bitacora` VALUES (519, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:57');
INSERT INTO `bitacora` VALUES (520, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:20:58');
INSERT INTO `bitacora` VALUES (521, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:21:07');
INSERT INTO `bitacora` VALUES (522, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:21:13');
INSERT INTO `bitacora` VALUES (523, '/cuentas/listarMovimientosSinImprirmir/146', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:21:17');
INSERT INTO `bitacora` VALUES (524, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:21:29');
INSERT INTO `bitacora` VALUES (525, '/reportes/RepEstadoCuenta/146', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:21:33');
INSERT INTO `bitacora` VALUES (526, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:29:20');
INSERT INTO `bitacora` VALUES (527, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:29:22');
INSERT INTO `bitacora` VALUES (528, '/reportes/RepEstadoCuenta/145', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:29:25');
INSERT INTO `bitacora` VALUES (529, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:29:31');
INSERT INTO `bitacora` VALUES (530, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:07');
INSERT INTO `bitacora` VALUES (531, '/clientes/delete', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"DELETE\",\"id\":\"63\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:18');
INSERT INTO `bitacora` VALUES (532, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:19');
INSERT INTO `bitacora` VALUES (533, '/clientes/delete', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"DELETE\",\"id\":\"63\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:24');
INSERT INTO `bitacora` VALUES (534, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:24');
INSERT INTO `bitacora` VALUES (535, '/clientes/63', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:31');
INSERT INTO `bitacora` VALUES (536, '/clientes/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"63\",\"nombre\":\"Luis Arnulfo Marquez Argueta\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2021-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Casado\",\"direccion_personal\":\"Meanguera\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"1\",\"observaciones\":null}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:39');
INSERT INTO `bitacora` VALUES (537, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:39');
INSERT INTO `bitacora` VALUES (538, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:41');
INSERT INTO `bitacora` VALUES (539, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:43');
INSERT INTO `bitacora` VALUES (540, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:31:46');
INSERT INTO `bitacora` VALUES (541, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"1\",\"id_asociado\":\"2\",\"nombre\":\"Luis Efra\\u00edn M\\u00e1rquez Portillo\",\"parentesco\":\"Hijo\",\"porcentaje\":\"50.00\",\"direccion\":\"0\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:00');
INSERT INTO `bitacora` VALUES (542, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:00');
INSERT INTO `bitacora` VALUES (543, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:04');
INSERT INTO `bitacora` VALUES (544, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:06');
INSERT INTO `bitacora` VALUES (545, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:09');
INSERT INTO `bitacora` VALUES (546, '/beneficiarios/edit/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:13');
INSERT INTO `bitacora` VALUES (547, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"2\",\"id_asociado\":\"2\",\"nombre\":\"Glenda Esperanza Portillo Castro\",\"parentesco\":\"Esposa\",\"porcentaje\":\"50.00\",\"direccion\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:33');
INSERT INTO `bitacora` VALUES (548, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:32:33');
INSERT INTO `bitacora` VALUES (549, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:33:51');
INSERT INTO `bitacora` VALUES (550, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"12\",\"parentesco\":\"2\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:33:52');
INSERT INTO `bitacora` VALUES (551, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"12\",\"parentesco\":\"2\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:34:03');
INSERT INTO `bitacora` VALUES (552, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:34:34');
INSERT INTO `bitacora` VALUES (553, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:13');
INSERT INTO `bitacora` VALUES (554, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:14');
INSERT INTO `bitacora` VALUES (555, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:15');
INSERT INTO `bitacora` VALUES (556, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:18');
INSERT INTO `bitacora` VALUES (557, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:33');
INSERT INTO `bitacora` VALUES (558, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"12\",\"parentesco\":\"2\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:35');
INSERT INTO `bitacora` VALUES (559, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:35');
INSERT INTO `bitacora` VALUES (560, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:37');
INSERT INTO `bitacora` VALUES (561, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"asd\",\"parentesco\":\"2\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:40');
INSERT INTO `bitacora` VALUES (562, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:40');
INSERT INTO `bitacora` VALUES (563, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:44');
INSERT INTO `bitacora` VALUES (564, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"asd\",\"parentesco\":\"Esposa\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:35:54');
INSERT INTO `bitacora` VALUES (565, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"asd\",\"parentesco\":\"Esposa\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:36:09');
INSERT INTO `bitacora` VALUES (566, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:36:09');
INSERT INTO `bitacora` VALUES (567, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:36:11');
INSERT INTO `bitacora` VALUES (568, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:36:13');
INSERT INTO `bitacora` VALUES (569, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:50:52');
INSERT INTO `bitacora` VALUES (570, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:50:53');
INSERT INTO `bitacora` VALUES (571, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:52:25');
INSERT INTO `bitacora` VALUES (572, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:52:29');
INSERT INTO `bitacora` VALUES (573, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:52:31');
INSERT INTO `bitacora` VALUES (574, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:52:34');
INSERT INTO `bitacora` VALUES (575, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:23');
INSERT INTO `bitacora` VALUES (576, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:25');
INSERT INTO `bitacora` VALUES (577, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:29');
INSERT INTO `bitacora` VALUES (578, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:31');
INSERT INTO `bitacora` VALUES (579, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:33');
INSERT INTO `bitacora` VALUES (580, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:53:55');
INSERT INTO `bitacora` VALUES (581, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:54:05');
INSERT INTO `bitacora` VALUES (582, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:54:58');
INSERT INTO `bitacora` VALUES (583, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:55:40');
INSERT INTO `bitacora` VALUES (584, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:06');
INSERT INTO `bitacora` VALUES (585, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"1\",\"id_asociado\":\"2\",\"nombre\":\"Luis Efra\\u00edn M\\u00e1rquez Portillo\",\"parentesco\":\"7\",\"porcentaje\":\"50.00\",\"direccion\":\"0\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:17');
INSERT INTO `bitacora` VALUES (586, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:17');
INSERT INTO `bitacora` VALUES (587, '/beneficiarios/edit/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:22');
INSERT INTO `bitacora` VALUES (588, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"2\",\"id_asociado\":\"2\",\"nombre\":\"Glenda Esperanza Portillo Castro\",\"parentesco\":\"21\",\"porcentaje\":\"50.00\",\"direccion\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:30');
INSERT INTO `bitacora` VALUES (589, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:31');
INSERT INTO `bitacora` VALUES (590, '/beneficiarios/edit/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:34');
INSERT INTO `bitacora` VALUES (591, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"3\",\"id_asociado\":\"2\",\"nombre\":\"Xavier Alessandro Marquez portillo\",\"parentesco\":\"7\",\"porcentaje\":\"20.00\",\"direccion\":\"12\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:46');
INSERT INTO `bitacora` VALUES (592, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:56:46');
INSERT INTO `bitacora` VALUES (593, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:01');
INSERT INTO `bitacora` VALUES (594, '/intereses/delete', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"DELETE\",\"id\":\"3\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:09');
INSERT INTO `bitacora` VALUES (595, '/beneficiarios/edit/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:18');
INSERT INTO `bitacora` VALUES (596, '/beneficiarios/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"2\",\"id_asociado\":\"2\",\"nombre\":\"Glenda Esperanza Portillo Castro\",\"parentesco\":\"21\",\"porcentaje\":\"30\",\"direccion\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:23');
INSERT INTO `bitacora` VALUES (597, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:23');
INSERT INTO `bitacora` VALUES (598, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:26');
INSERT INTO `bitacora` VALUES (599, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:28');
INSERT INTO `bitacora` VALUES (600, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:31');
INSERT INTO `bitacora` VALUES (601, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:33');
INSERT INTO `bitacora` VALUES (602, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 08:59:35');
INSERT INTO `bitacora` VALUES (603, '/temp/validatePassword/asdad', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:05');
INSERT INTO `bitacora` VALUES (604, '/temp/validatePassword/password', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:11');
INSERT INTO `bitacora` VALUES (605, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:18');
INSERT INTO `bitacora` VALUES (606, '/temp/generateTempPassword', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:21');
INSERT INTO `bitacora` VALUES (607, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:29');
INSERT INTO `bitacora` VALUES (608, '/temp/validatePassword/M24vO', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:35');
INSERT INTO `bitacora` VALUES (609, '/cuentas/anularCuenta', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_cuenta_anular\":\"142\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:35');
INSERT INTO `bitacora` VALUES (610, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:35');
INSERT INTO `bitacora` VALUES (611, '/declare/142/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:40');
INSERT INTO `bitacora` VALUES (612, '/declare/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_cuenta\":\"142\",\"id_cliente\":\"63\",\"declaracion_id\":null,\"n_depositos\":\"0\",\"val_prom_depositos\":\"0\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"0\",\"val_prom_retiros\":\"0\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Salarios\",\"otro_origen_fondos\":null,\"comprobante_procedencia_fondo\":\"Constancia de Salarios\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:44');
INSERT INTO `bitacora` VALUES (613, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:44');
INSERT INTO `bitacora` VALUES (614, '/declare/142/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:01:46');
INSERT INTO `bitacora` VALUES (615, '/declare/142', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:02:00');
INSERT INTO `bitacora` VALUES (616, '/declare/update', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_cuenta\":\"142\",\"id_cliente\":\"63\",\"declaracion_id\":\"1\",\"n_depositos\":\"2\",\"val_prom_depositos\":\"50\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"5\",\"val_prom_retiros\":\"100\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Salarios\",\"otro_origen_fondos\":\"4500\",\"comprobante_procedencia_fondo\":\"Negocio Propio, Ultimas Dos Declaraciones de renta\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:02:38');
INSERT INTO `bitacora` VALUES (617, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:02:38');
INSERT INTO `bitacora` VALUES (618, '/declare/142/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:02:40');
INSERT INTO `bitacora` VALUES (619, '/reportes/contrato/142', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:02:53');
INSERT INTO `bitacora` VALUES (620, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:03:24');
INSERT INTO `bitacora` VALUES (621, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:03:26');
INSERT INTO `bitacora` VALUES (622, '/clientes/getClienteData/63', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:03:30');
INSERT INTO `bitacora` VALUES (623, '/creditos/solicitudes/referencias/add/1/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:04:56');
INSERT INTO `bitacora` VALUES (624, '/creditos/solicitudes/referencias/getReferencias/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:04:56');
INSERT INTO `bitacora` VALUES (625, '/creditos/solicitudes/bienes/add', '{\"clase_propiedad\":\"Casa de habitacion\",\"direccion_bien\":\"San miguel\",\"valor\":\"25000\",\"hipotecado_bien\":\"0\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:09');
INSERT INTO `bitacora` VALUES (626, '/creditos/solicitudes/bienes/getBienes/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:09');
INSERT INTO `bitacora` VALUES (627, '/creditos/solicitudes/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-08-15\",\"id_cliente\":\"63\",\"fecha_nacimiento\":\"1987-05-12\",\"genero\":\"0\",\"dui_cliente\":\"03731671-8\",\"fecha_expedicion\":\"2021-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Casado\",\"direccion_personal\":\"Meanguera\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":null,\"monto_solicitado\":\"1000\",\"plazo\":\"12\",\"tasa\":\"30\",\"cuota\":\"97.49\",\"seguro_deuda\":\"0\",\"aportaciones\":\"5\",\"destino\":\"60\",\"tipo_garantia\":\"3\",\"garantia\":\"Luis Marquez, Efrain marquez\",\"id_conyugue\":null,\"empresa_labora\":null,\"cargo\":null,\"sueldo_conyugue\":null,\"tiempo_laborando\":null,\"telefono_trabajo\":null,\"sueldo_solicitante\":\"1200\",\"comisiones\":\"0\",\"negocio_propio\":\"0\",\"otros_ingresos\":\"0\",\"total_ingresos\":\"1200\",\"gastos_vida\":\"200\",\"pagos_obligaciones\":\"0\",\"gastos_negocios\":\"0\",\"otros_gastos\":\"0\",\"total_gasto\":\"200\",\"id_referencia\":\"1\",\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":\"0\",\"hipotecado_bien\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:11');
INSERT INTO `bitacora` VALUES (628, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:11');
INSERT INTO `bitacora` VALUES (629, '/creditos/solicitud/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:17');
INSERT INTO `bitacora` VALUES (630, '/creditos/pagare/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:40');
INSERT INTO `bitacora` VALUES (631, '/creditos/solicitudes/send_comite/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:05:56');
INSERT INTO `bitacora` VALUES (632, '/creditos/solicitudes/send_comite', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"1000.00\",\"plazo\":\"12\",\"tasa\":\"30.00\",\"cuota\":\"97.49\",\"seguro_deuda\":\"0.00\",\"aportaciones\":\"5.00\",\"destino\":\"60\",\"garantia\":\"Luis Marquez, Efrain marquez\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:00');
INSERT INTO `bitacora` VALUES (633, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:00');
INSERT INTO `bitacora` VALUES (634, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:02');
INSERT INTO `bitacora` VALUES (635, '/creditos/solicitudes/edit/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:11');
INSERT INTO `bitacora` VALUES (636, '/creditos/solicitudes/referencias/getReferencias/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:12');
INSERT INTO `bitacora` VALUES (637, '/creditos/solicitudes/bienes/getBienes/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:12');
INSERT INTO `bitacora` VALUES (638, '/creditos/solicitudes/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-08-15\",\"id_cliente\":\"63\",\"fecha_nacimiento\":\"1980-12-12\",\"genero\":\"0\",\"dui_cliente\":\"00000000-0\",\"fecha_expedicion\":\"2020-12-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1a\",\"estado_civil\":\"Solteraq\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"Empleado\",\"direccion_negocio\":\"SAN miguel\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\",\"monto_solicitado\":\"1000.00\",\"plazo\":\"12\",\"tasa\":\"30.00\",\"cuota\":\"97.49\",\"seguro_deuda\":\"0.00\",\"aportaciones\":\"5.00\",\"destino\":\"60\",\"tipo_garantia\":\"3\",\"garantia\":\"Luis Marquez, Efrain marquez\",\"id_conyugue\":null,\"empresa_labora\":null,\"cargo\":null,\"sueldo_conyugue\":null,\"tiempo_laborando\":null,\"telefono_trabajo\":null,\"sueldo_solicitante\":\"1200.00\",\"comisiones\":\"0.00\",\"negocio_propio\":\"0.00\",\"otros_ingresos\":\"0\",\"total_ingresos\":\"1200.00\",\"gastos_vida\":\"200.00\",\"pagos_obligaciones\":\"0.00\",\"gastos_negocios\":\"0.00\",\"otros_gastos\":\"0.00\",\"total_gasto\":\"200.00\",\"id_referencia\":null,\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":\"0\",\"hipotecado_bien\":\"0\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:14');
INSERT INTO `bitacora` VALUES (639, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:14');
INSERT INTO `bitacora` VALUES (640, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:16');
INSERT INTO `bitacora` VALUES (641, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:18');
INSERT INTO `bitacora` VALUES (642, '/creditos/solicitudes/send_comite/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:21');
INSERT INTO `bitacora` VALUES (643, '/creditos/solicitudes/send_comite', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"1000.00\",\"plazo\":\"12\",\"tasa\":\"30.00\",\"cuota\":\"97.49\",\"seguro_deuda\":\"0.00\",\"aportaciones\":\"5.00\",\"destino\":\"60\",\"garantia\":\"Luis Marquez, Efrain marquez\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:23');
INSERT INTO `bitacora` VALUES (644, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:23');
INSERT INTO `bitacora` VALUES (645, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:24');
INSERT INTO `bitacora` VALUES (646, '/creditos/solicitudes/desembolso/bdf2d975-5b44-4591-9da9-6df1954d1243', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:29');
INSERT INTO `bitacora` VALUES (647, '/creditos/solicitudes/create-credit', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_solicitud\":\"bdf2d975-5b44-4591-9da9-6df1954d1243\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"1000.00\",\"plazo\":\"12\",\"tasa\":\"30.00\",\"cuota\":\"97.49\",\"seguro_deuda\":\"0.00\",\"aportaciones\":\"5.00\",\"destino\":\"60\",\"garantia\":\"Luis Marquez, Efrain marquez\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:31');
INSERT INTO `bitacora` VALUES (648, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:31');
INSERT INTO `bitacora` VALUES (649, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:32');
INSERT INTO `bitacora` VALUES (650, '/creditos/preaprobado/liquidar/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:35');
INSERT INTO `bitacora` VALUES (651, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:06:35');
INSERT INTO `bitacora` VALUES (652, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"60\",\"monto_debe\":\"1000.00\",\"monto_haber\":null,\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:08:52');
INSERT INTO `bitacora` VALUES (653, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:08:53');
INSERT INTO `bitacora` VALUES (654, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"1000\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:09:13');
INSERT INTO `bitacora` VALUES (655, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:09:13');
INSERT INTO `bitacora` VALUES (656, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"288\",\"monto_debe\":\"0\",\"monto_haber\":\"5\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:09:43');
INSERT INTO `bitacora` VALUES (657, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:09:43');
INSERT INTO `bitacora` VALUES (658, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:10:06');
INSERT INTO `bitacora` VALUES (659, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:10:06');
INSERT INTO `bitacora` VALUES (660, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"15.00\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:10:32');
INSERT INTO `bitacora` VALUES (661, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:10:32');
INSERT INTO `bitacora` VALUES (662, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"0\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":\"19.78\",\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:03');
INSERT INTO `bitacora` VALUES (663, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:03');
INSERT INTO `bitacora` VALUES (664, '/creditos/preaprobado/liquidar/quitarDescuento/15', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:11');
INSERT INTO `bitacora` VALUES (665, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:12');
INSERT INTO `bitacora` VALUES (666, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"19.78\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:27');
INSERT INTO `bitacora` VALUES (667, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:27');
INSERT INTO `bitacora` VALUES (668, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"2.5\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"comentario\":null,\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:39');
INSERT INTO `bitacora` VALUES (669, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:39');
INSERT INTO `bitacora` VALUES (670, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:56');
INSERT INTO `bitacora` VALUES (671, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:11:59');
INSERT INTO `bitacora` VALUES (672, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:02');
INSERT INTO `bitacora` VALUES (673, '/intereses/getIntereses/9', '{\"opcion_seleccionada\":\"9\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:11');
INSERT INTO `bitacora` VALUES (674, '/cuentas/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_caja\":\"1\",\"id_asociado\":\"2\",\"fecha_apertura\":\"2024-08-15\",\"id_tipo_cuenta\":\"9\",\"id_interes_tipo_cuenta\":\"11\",\"numero_cuenta\":\"0000000002\",\"monto_apertura\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:15');
INSERT INTO `bitacora` VALUES (675, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:15');
INSERT INTO `bitacora` VALUES (676, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:20');
INSERT INTO `bitacora` VALUES (677, '/creditos/preaprobado/liquidar/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:22');
INSERT INTO `bitacora` VALUES (678, '/creditos/preaprobado/liquidar/getDescuentos/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:23');
INSERT INTO `bitacora` VALUES (679, '/creditos/solicitudes/liquidar', '{\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"liquido\":\"934.87\",\"id_cuenta_ahorro_destino\":\"142\",\"id_cuenta_aportacion_destino\":\"147\",\"aportacionMonto\":\"0\",\"id_caja_aperturada\":\"1\",\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:30');
INSERT INTO `bitacora` VALUES (680, '/creditos/aprobado/liquidacion/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:32');
INSERT INTO `bitacora` VALUES (681, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:33');
INSERT INTO `bitacora` VALUES (682, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:44');
INSERT INTO `bitacora` VALUES (683, '/reportes/partidaContable/a6064250-da75-4f35-adb2-86621b9b7e91', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:12:47');
INSERT INTO `bitacora` VALUES (684, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:14:28');
INSERT INTO `bitacora` VALUES (685, '/contabilidad/catalogo', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"filtro\":\"FACTURAS\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:14:31');
INSERT INTO `bitacora` VALUES (686, '/contabilidad/catalogo/edit/428', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:15:20');
INSERT INTO `bitacora` VALUES (687, '/contabilidad/catalogo/getCuentasById/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:15:20');
INSERT INTO `bitacora` VALUES (688, '/contabilidad/catalogo/put', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"PUT\",\"id\":\"428\",\"tipo_catalogo\":\"2\",\"id_cuenta_padre\":\"427\",\"numero\":\"2203010101\",\"descripcion\":\"FACTURAS\",\"saldo\":\"-13.58\",\"iva\":\"1\",\"movimiento\":\"1\",\"estado\":\"1\",\"tipo_reporte\":\"O\",\"tipo_saldo_normal\":\"A\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:15:43');
INSERT INTO `bitacora` VALUES (689, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:15:44');
INSERT INTO `bitacora` VALUES (690, '/reportes/partidaContable/a6064250-da75-4f35-adb2-86621b9b7e91', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:15:46');
INSERT INTO `bitacora` VALUES (691, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:17:09');
INSERT INTO `bitacora` VALUES (692, '/creditos/abonos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:49:31');
INSERT INTO `bitacora` VALUES (693, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:49:33');
INSERT INTO `bitacora` VALUES (694, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:53:14');
INSERT INTO `bitacora` VALUES (695, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:54:59');
INSERT INTO `bitacora` VALUES (696, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:29');
INSERT INTO `bitacora` VALUES (697, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:32');
INSERT INTO `bitacora` VALUES (698, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:32');
INSERT INTO `bitacora` VALUES (699, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:32');
INSERT INTO `bitacora` VALUES (700, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:33');
INSERT INTO `bitacora` VALUES (701, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:33');
INSERT INTO `bitacora` VALUES (702, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:33');
INSERT INTO `bitacora` VALUES (703, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:33');
INSERT INTO `bitacora` VALUES (704, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:34');
INSERT INTO `bitacora` VALUES (705, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:34');
INSERT INTO `bitacora` VALUES (706, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:34');
INSERT INTO `bitacora` VALUES (707, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:34');
INSERT INTO `bitacora` VALUES (708, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:35');
INSERT INTO `bitacora` VALUES (709, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:35');
INSERT INTO `bitacora` VALUES (710, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:35');
INSERT INTO `bitacora` VALUES (711, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:35');
INSERT INTO `bitacora` VALUES (712, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:35');
INSERT INTO `bitacora` VALUES (713, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:36');
INSERT INTO `bitacora` VALUES (714, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:36');
INSERT INTO `bitacora` VALUES (715, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:36');
INSERT INTO `bitacora` VALUES (716, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:36');
INSERT INTO `bitacora` VALUES (717, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:36');
INSERT INTO `bitacora` VALUES (718, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:37');
INSERT INTO `bitacora` VALUES (719, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:37');
INSERT INTO `bitacora` VALUES (720, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:37');
INSERT INTO `bitacora` VALUES (721, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:37');
INSERT INTO `bitacora` VALUES (722, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:37');
INSERT INTO `bitacora` VALUES (723, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:38');
INSERT INTO `bitacora` VALUES (724, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:38');
INSERT INTO `bitacora` VALUES (725, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:38');
INSERT INTO `bitacora` VALUES (726, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:56:38');
INSERT INTO `bitacora` VALUES (727, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:53');
INSERT INTO `bitacora` VALUES (728, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:54');
INSERT INTO `bitacora` VALUES (729, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:54');
INSERT INTO `bitacora` VALUES (730, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:54');
INSERT INTO `bitacora` VALUES (731, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:54');
INSERT INTO `bitacora` VALUES (732, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:54');
INSERT INTO `bitacora` VALUES (733, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:55');
INSERT INTO `bitacora` VALUES (734, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:55');
INSERT INTO `bitacora` VALUES (735, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:55');
INSERT INTO `bitacora` VALUES (736, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:55');
INSERT INTO `bitacora` VALUES (737, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:55');
INSERT INTO `bitacora` VALUES (738, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:56');
INSERT INTO `bitacora` VALUES (739, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:56');
INSERT INTO `bitacora` VALUES (740, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:56');
INSERT INTO `bitacora` VALUES (741, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:56');
INSERT INTO `bitacora` VALUES (742, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:57');
INSERT INTO `bitacora` VALUES (743, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:57');
INSERT INTO `bitacora` VALUES (744, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:57');
INSERT INTO `bitacora` VALUES (745, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 09:59:57');
INSERT INTO `bitacora` VALUES (746, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:00:04');
INSERT INTO `bitacora` VALUES (747, '/alerts/new', '{\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"id_caja\":\"1\",\"monto_saldo\":\"102.49\",\"justificante\":\"si\",\"comprobante\":\"si\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:25');
INSERT INTO `bitacora` VALUES (748, '/creditos/payment', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"DIAS_MORA\":\"0\",\"INTERESES\":\"0.00\",\"CAPITAL\":\"97.49\",\"APORTACIONES\":\"5\",\"SEGURO_DEUDA\":\"0.00\",\"MORA\":\"0\",\"id_credito\":\"f178a472-bf89-4533-aaf7-6c8ac39bf731\",\"id_caja\":\"1\",\"saldo_capital\":\"1000.00\",\"aportacion_deposito\":\"5.00\",\"min_payment\":\"102.49\",\"cuota_to_val\":\"1\",\"monto_to_val\":\"3000\",\"fecha_pago\":\"2024-08-15\",\"cliente_operacion\":\"luis\",\"dui_operacion\":\"037316717\",\"MONTO_PAGO_MENSUAL\":\"102.49\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:26');
INSERT INTO `bitacora` VALUES (749, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:26');
INSERT INTO `bitacora` VALUES (750, '/creditos/abonos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:27');
INSERT INTO `bitacora` VALUES (751, '/creditos/payment/f178a472-bf89-4533-aaf7-6c8ac39bf731', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:32');
INSERT INTO `bitacora` VALUES (752, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:03:37');
INSERT INTO `bitacora` VALUES (753, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:04:31');
INSERT INTO `bitacora` VALUES (754, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:05:10');
INSERT INTO `bitacora` VALUES (755, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:05:37');
INSERT INTO `bitacora` VALUES (756, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:05:46');
INSERT INTO `bitacora` VALUES (757, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:06:22');
INSERT INTO `bitacora` VALUES (758, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:06:39');
INSERT INTO `bitacora` VALUES (759, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:06:58');
INSERT INTO `bitacora` VALUES (760, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:07:08');
INSERT INTO `bitacora` VALUES (761, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:07:46');
INSERT INTO `bitacora` VALUES (762, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:09:07');
INSERT INTO `bitacora` VALUES (763, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:09:17');
INSERT INTO `bitacora` VALUES (764, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:09:59');
INSERT INTO `bitacora` VALUES (765, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:10:36');
INSERT INTO `bitacora` VALUES (766, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:11:29');
INSERT INTO `bitacora` VALUES (767, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:11:53');
INSERT INTO `bitacora` VALUES (768, '/contabilidad/tipos-partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:13:21');
INSERT INTO `bitacora` VALUES (769, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:13:24');
INSERT INTO `bitacora` VALUES (770, '/reportes/partidaContable/5b2af05d-ebfb-4907-8f49-9210a7b3599e', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:13:28');
INSERT INTO `bitacora` VALUES (771, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:13:53');
INSERT INTO `bitacora` VALUES (772, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:16:05');
INSERT INTO `bitacora` VALUES (773, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:16:45');
INSERT INTO `bitacora` VALUES (774, '/reportes/comprobanteMovimiento/16', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:12');
INSERT INTO `bitacora` VALUES (775, '/reportes/comprobanteAbono/66ea48d5-ff39-47cb-8a33-8ab69f09a486', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:22');
INSERT INTO `bitacora` VALUES (776, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:37');
INSERT INTO `bitacora` VALUES (777, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:48');
INSERT INTO `bitacora` VALUES (778, '/apertura/cortez/5', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:49');
INSERT INTO `bitacora` VALUES (779, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:18:50');
INSERT INTO `bitacora` VALUES (780, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:29');
INSERT INTO `bitacora` VALUES (781, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:32');
INSERT INTO `bitacora` VALUES (782, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:32');
INSERT INTO `bitacora` VALUES (783, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:33');
INSERT INTO `bitacora` VALUES (784, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:33');
INSERT INTO `bitacora` VALUES (785, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:34');
INSERT INTO `bitacora` VALUES (786, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:34');
INSERT INTO `bitacora` VALUES (787, '/facturas/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:35');
INSERT INTO `bitacora` VALUES (788, '/creditos/abonos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:37');
INSERT INTO `bitacora` VALUES (789, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:41');
INSERT INTO `bitacora` VALUES (790, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:19:42');
INSERT INTO `bitacora` VALUES (791, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:00');
INSERT INTO `bitacora` VALUES (792, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:23');
INSERT INTO `bitacora` VALUES (793, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:24');
INSERT INTO `bitacora` VALUES (794, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:25');
INSERT INTO `bitacora` VALUES (795, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:27');
INSERT INTO `bitacora` VALUES (796, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:29');
INSERT INTO `bitacora` VALUES (797, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:31');
INSERT INTO `bitacora` VALUES (798, '/productos/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:33');
INSERT INTO `bitacora` VALUES (799, '/proveedores/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:34');
INSERT INTO `bitacora` VALUES (800, '/compras/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:36');
INSERT INTO `bitacora` VALUES (801, '/compras/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:48');
INSERT INTO `bitacora` VALUES (802, '/contabilidad/tipocuentacontable', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:53');
INSERT INTO `bitacora` VALUES (803, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:20:55');
INSERT INTO `bitacora` VALUES (804, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:23');
INSERT INTO `bitacora` VALUES (805, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:29');
INSERT INTO `bitacora` VALUES (806, '/configuracion/update', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"nombre_empresa\":\"Cimacoop\",\"nombre_comercial\":\"Cimacoop de RL\",\"rubro\":\"Prestamos de dinero\",\"nrc\":\"232345-0\",\"nit\":\"13141205871014\",\"telefono\":\"2654-1561\",\"direccion\":\"2a Calle Poniente barrio la soledad\",\"correo\":\"svcomputec@gmail.com\",\"porcentaje_capitalizacion\":\"1.50\",\"cuenta_capitalizacion\":\"460\",\"dias_gracia\":\"3\",\"interes_moratorio\":\"3.60\",\"consulta_crediticia\":\"2.00\",\"monto_deposito_credito\":\"5\",\"cuenta_tipo_credito\":\"2\",\"cuenta_aportacion\":\"460\",\"cuenta_interes_credito\":\"490\",\"cuenta_interes_credito_moratorio\":\"492\",\"deposito_cuenta_debe\":\"5\",\"deposito_cuenta_haber\":\"288\",\"retiro_cuenta_debe\":\"288\",\"retiro_cuenta_haber\":\"5\",\"socio_automatico\":\"1\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:34');
INSERT INTO `bitacora` VALUES (807, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:35');
INSERT INTO `bitacora` VALUES (808, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:41');
INSERT INTO `bitacora` VALUES (809, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:46');
INSERT INTO `bitacora` VALUES (810, '/boveda/recibirCorte', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_corte_movimiento\":\"7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:22:53');
INSERT INTO `bitacora` VALUES (811, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:18');
INSERT INTO `bitacora` VALUES (812, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:22');
INSERT INTO `bitacora` VALUES (813, '/boveda/realizarAperturaBobeda', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda\":\"2\",\"monto\":\"50000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones diarias\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:39');
INSERT INTO `bitacora` VALUES (814, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:39');
INSERT INTO `bitacora` VALUES (815, '/reportes/movimientosBobeda/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:45');
INSERT INTO `bitacora` VALUES (816, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:52');
INSERT INTO `bitacora` VALUES (817, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:54');
INSERT INTO `bitacora` VALUES (818, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:56');
INSERT INTO `bitacora` VALUES (819, '/apertura/aperturarcaja', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda_movimiento\":null,\"id_caja\":\"1\",\"monto_apertura\":null,\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:58');
INSERT INTO `bitacora` VALUES (820, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:23:59');
INSERT INTO `bitacora` VALUES (821, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:04');
INSERT INTO `bitacora` VALUES (822, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:12');
INSERT INTO `bitacora` VALUES (823, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:14');
INSERT INTO `bitacora` VALUES (824, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones diarias\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:28');
INSERT INTO `bitacora` VALUES (825, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones diarias\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:28');
INSERT INTO `bitacora` VALUES (826, '/reportes/comprobanteMovimientoBobeda/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:29');
INSERT INTO `bitacora` VALUES (827, '/reportes/comprobanteMovimientoBobeda/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:30');
INSERT INTO `bitacora` VALUES (828, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:24:30');
INSERT INTO `bitacora` VALUES (829, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:22');
INSERT INTO `bitacora` VALUES (830, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:23');
INSERT INTO `bitacora` VALUES (831, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:25');
INSERT INTO `bitacora` VALUES (832, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:35');
INSERT INTO `bitacora` VALUES (833, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:38');
INSERT INTO `bitacora` VALUES (834, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:25:40');
INSERT INTO `bitacora` VALUES (835, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:25');
INSERT INTO `bitacora` VALUES (836, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"50\",\"id_empleado\":\"9\",\"observacion\":\"asd\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:35');
INSERT INTO `bitacora` VALUES (837, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"50\",\"id_empleado\":\"9\",\"observacion\":\"asd\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:36');
INSERT INTO `bitacora` VALUES (838, '/reportes/comprobanteMovimientoBobeda/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:36');
INSERT INTO `bitacora` VALUES (839, '/reportes/comprobanteMovimientoBobeda/5', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:37');
INSERT INTO `bitacora` VALUES (840, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:38');
INSERT INTO `bitacora` VALUES (841, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:53');
INSERT INTO `bitacora` VALUES (842, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:27:55');
INSERT INTO `bitacora` VALUES (843, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"10\",\"id_empleado\":\"9\",\"observacion\":\"asdad\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:28:00');
INSERT INTO `bitacora` VALUES (844, '/reportes/comprobanteMovimientoBobeda/6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:28:00');
INSERT INTO `bitacora` VALUES (845, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:28:07');
INSERT INTO `bitacora` VALUES (846, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:13');
INSERT INTO `bitacora` VALUES (847, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:25');
INSERT INTO `bitacora` VALUES (848, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:27');
INSERT INTO `bitacora` VALUES (849, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"10\",\"id_empleado\":\"9\",\"observacion\":\"00\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:35');
INSERT INTO `bitacora` VALUES (850, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:35');
INSERT INTO `bitacora` VALUES (851, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:39');
INSERT INTO `bitacora` VALUES (852, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:41');
INSERT INTO `bitacora` VALUES (853, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:43');
INSERT INTO `bitacora` VALUES (854, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:44');
INSERT INTO `bitacora` VALUES (855, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:44');
INSERT INTO `bitacora` VALUES (856, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:44');
INSERT INTO `bitacora` VALUES (857, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:44');
INSERT INTO `bitacora` VALUES (858, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:44');
INSERT INTO `bitacora` VALUES (859, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:45');
INSERT INTO `bitacora` VALUES (860, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:45');
INSERT INTO `bitacora` VALUES (861, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:45');
INSERT INTO `bitacora` VALUES (862, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:45');
INSERT INTO `bitacora` VALUES (863, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:46');
INSERT INTO `bitacora` VALUES (864, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:46');
INSERT INTO `bitacora` VALUES (865, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:46');
INSERT INTO `bitacora` VALUES (866, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:46');
INSERT INTO `bitacora` VALUES (867, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:46');
INSERT INTO `bitacora` VALUES (868, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:47');
INSERT INTO `bitacora` VALUES (869, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:47');
INSERT INTO `bitacora` VALUES (870, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:47');
INSERT INTO `bitacora` VALUES (871, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:29:48');
INSERT INTO `bitacora` VALUES (872, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:18');
INSERT INTO `bitacora` VALUES (873, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:19');
INSERT INTO `bitacora` VALUES (874, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"10\",\"id_empleado\":\"9\",\"observacion\":\"asd\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:24');
INSERT INTO `bitacora` VALUES (875, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:24');
INSERT INTO `bitacora` VALUES (876, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:34');
INSERT INTO `bitacora` VALUES (877, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"10\",\"id_empleado\":\"9\",\"observacion\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:40');
INSERT INTO `bitacora` VALUES (878, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:40');
INSERT INTO `bitacora` VALUES (879, '/reportes/comprobanteMovimientoBobeda/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:42');
INSERT INTO `bitacora` VALUES (880, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:30:53');
INSERT INTO `bitacora` VALUES (881, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:31:24');
INSERT INTO `bitacora` VALUES (882, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:31:28');
INSERT INTO `bitacora` VALUES (883, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:31:29');
INSERT INTO `bitacora` VALUES (884, '/apertura/aperturarcaja', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda_movimiento\":null,\"id_caja\":\"1\",\"monto_apertura\":null,\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:31:32');
INSERT INTO `bitacora` VALUES (885, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:31:32');
INSERT INTO `bitacora` VALUES (886, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:29');
INSERT INTO `bitacora` VALUES (887, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:32');
INSERT INTO `bitacora` VALUES (888, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:34');
INSERT INTO `bitacora` VALUES (889, '/boveda/cerrar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:36');
INSERT INTO `bitacora` VALUES (890, '/boveda/realizarCierreBobeda', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda\":\"2\",\"monto\":\"47860.00\",\"id_empleado\":\"9\",\"observacion\":\"s\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:41');
INSERT INTO `bitacora` VALUES (891, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:41');
INSERT INTO `bitacora` VALUES (892, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:44');
INSERT INTO `bitacora` VALUES (893, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:53');
INSERT INTO `bitacora` VALUES (894, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:54');
INSERT INTO `bitacora` VALUES (895, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:32:56');
INSERT INTO `bitacora` VALUES (896, '/boveda/realizarAperturaBobeda', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda\":\"2\",\"monto\":\"50000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:06');
INSERT INTO `bitacora` VALUES (897, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:07');
INSERT INTO `bitacora` VALUES (898, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:09');
INSERT INTO `bitacora` VALUES (899, '/boveda/realizarTraslado', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"500\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de Operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:22');
INSERT INTO `bitacora` VALUES (900, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:22');
INSERT INTO `bitacora` VALUES (901, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:31');
INSERT INTO `bitacora` VALUES (902, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:33');
INSERT INTO `bitacora` VALUES (903, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:35');
INSERT INTO `bitacora` VALUES (904, '/apertura/aperturarcaja', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_bobeda_movimiento\":\"2\",\"id_caja\":\"1\",\"monto_apertura\":\"500.00\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:37');
INSERT INTO `bitacora` VALUES (905, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:37');
INSERT INTO `bitacora` VALUES (906, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:42');
INSERT INTO `bitacora` VALUES (907, '/reportes/comprobanteMovimientoBobeda/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:46');
INSERT INTO `bitacora` VALUES (908, '/reportes/comprobanteMovimientoBobeda/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:33:52');
INSERT INTO `bitacora` VALUES (909, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:34:02');
INSERT INTO `bitacora` VALUES (910, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:35:08');
INSERT INTO `bitacora` VALUES (911, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:35:11');
INSERT INTO `bitacora` VALUES (912, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:35:13');
INSERT INTO `bitacora` VALUES (913, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:35:16');
INSERT INTO `bitacora` VALUES (914, '/clientes/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-7\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"direccion_personal\":\"Meangeuera\",\"nombre_negocio\":\"Computec\",\"direccion_negocio\":\"San Francisco gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"Ninguna\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:36:16');
INSERT INTO `bitacora` VALUES (915, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:36:16');
INSERT INTO `bitacora` VALUES (916, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:36:19');
INSERT INTO `bitacora` VALUES (917, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:37:08');
INSERT INTO `bitacora` VALUES (918, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:37:40');
INSERT INTO `bitacora` VALUES (919, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:37:42');
INSERT INTO `bitacora` VALUES (920, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:37:44');
INSERT INTO `bitacora` VALUES (921, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:37:57');
INSERT INTO `bitacora` VALUES (922, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:38:09');
INSERT INTO `bitacora` VALUES (923, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:38:11');
INSERT INTO `bitacora` VALUES (924, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:40:08');
INSERT INTO `bitacora` VALUES (925, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:41:46');
INSERT INTO `bitacora` VALUES (926, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:41:59');
INSERT INTO `bitacora` VALUES (927, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:02');
INSERT INTO `bitacora` VALUES (928, '/asociados/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"numero_asociado\":\"0000000001\",\"id_cliente\":\"1\",\"fecha_ingreso\":\"2024-08-14\",\"sueldo_quincenal\":\"150\",\"sueldo_mensual\":\"150\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"0\",\"couta_ingreso\":\"0\",\"monto_aportacion\":\"0\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:15');
INSERT INTO `bitacora` VALUES (929, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:15');
INSERT INTO `bitacora` VALUES (930, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:20');
INSERT INTO `bitacora` VALUES (931, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:22');
INSERT INTO `bitacora` VALUES (932, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:29');
INSERT INTO `bitacora` VALUES (933, '/cuentas/add', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"id_caja\":\"1\",\"id_asociado\":\"1\",\"fecha_apertura\":\"2024-08-15\",\"id_tipo_cuenta\":\"1\",\"id_interes_tipo_cuenta\":\"10\",\"numero_cuenta\":\"0000000004\",\"monto_apertura\":\"100\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:35');
INSERT INTO `bitacora` VALUES (934, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:35');
INSERT INTO `bitacora` VALUES (935, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:40');
INSERT INTO `bitacora` VALUES (936, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:42:42');
INSERT INTO `bitacora` VALUES (937, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:43:08');
INSERT INTO `bitacora` VALUES (938, '/reportes/comprobanteMovimiento/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:43:14');
INSERT INTO `bitacora` VALUES (939, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:44:12');
INSERT INTO `bitacora` VALUES (940, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:44:38');
INSERT INTO `bitacora` VALUES (941, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 10:44:42');
INSERT INTO `bitacora` VALUES (942, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:12');
INSERT INTO `bitacora` VALUES (943, '/creditos/abonos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:17');
INSERT INTO `bitacora` VALUES (944, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:20');
INSERT INTO `bitacora` VALUES (945, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:30');
INSERT INTO `bitacora` VALUES (946, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:32');
INSERT INTO `bitacora` VALUES (947, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:35');
INSERT INTO `bitacora` VALUES (948, '/apertura/cortez/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:37');
INSERT INTO `bitacora` VALUES (949, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:37');
INSERT INTO `bitacora` VALUES (950, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:41');
INSERT INTO `bitacora` VALUES (951, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:42');
INSERT INTO `bitacora` VALUES (952, '/boveda/recibirCorte', '{\"_token\":\"wf93RSFBRpaxwfWTJtggCvKbpN9TkGe81xAK82hK\",\"_method\":\"POST\",\"id_corte_movimiento\":\"1\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:45');
INSERT INTO `bitacora` VALUES (953, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:45');
INSERT INTO `bitacora` VALUES (954, '/reportes/comprobanteMovimientoBobeda/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:11:47');
INSERT INTO `bitacora` VALUES (955, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:14');
INSERT INTO `bitacora` VALUES (956, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:18');
INSERT INTO `bitacora` VALUES (957, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:18');
INSERT INTO `bitacora` VALUES (958, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:20');
INSERT INTO `bitacora` VALUES (959, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:21');
INSERT INTO `bitacora` VALUES (960, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:22');
INSERT INTO `bitacora` VALUES (961, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:36');
INSERT INTO `bitacora` VALUES (962, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:38');
INSERT INTO `bitacora` VALUES (963, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:39');
INSERT INTO `bitacora` VALUES (964, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 11:12:40');
INSERT INTO `bitacora` VALUES (965, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:32:41');
INSERT INTO `bitacora` VALUES (966, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:37:52');
INSERT INTO `bitacora` VALUES (967, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:39:18');
INSERT INTO `bitacora` VALUES (968, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:39:25');
INSERT INTO `bitacora` VALUES (969, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:39:30');
INSERT INTO `bitacora` VALUES (970, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:39:33');
INSERT INTO `bitacora` VALUES (971, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:39:38');
INSERT INTO `bitacora` VALUES (972, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:40:57');
INSERT INTO `bitacora` VALUES (973, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:41:02');
INSERT INTO `bitacora` VALUES (974, '/clientes/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"nombre\":\"JUAN ANTONIO CAMPOS SANTOS\",\"genero\":\"1\",\"fecha_nacimiento\":\"1983-10-12\",\"dui_cliente\":\"01917920-6\",\"dui_extendido\":\"SAN MIGUEL\",\"fecha_expedicion\":\"2016-12-02\",\"telefono\":\"6848-7330\",\"nacionalidad\":\"SALVADORE\\u00d1O\",\"estado_civil\":\"CASADO\",\"direccion_personal\":\"COL. CIUDAD PACIFICA, SENDA LOS LAURELES, POL d #53 SM\",\"nombre_negocio\":\"VENTA AMBULANTE\",\"direccion_negocio\":\"AMBULANTE\",\"tipo_vivienda\":\"1\",\"observaciones\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:43:02');
INSERT INTO `bitacora` VALUES (975, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:43:02');
INSERT INTO `bitacora` VALUES (976, '/alerts/client/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:43:23');
INSERT INTO `bitacora` VALUES (977, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:43:39');
INSERT INTO `bitacora` VALUES (978, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:43:42');
INSERT INTO `bitacora` VALUES (979, '/asociados/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"numero_asociado\":\"00000000222\",\"id_cliente\":\"2\",\"fecha_ingreso\":\"2024-06-14\",\"sueldo_quincenal\":\"2100\",\"sueldo_mensual\":\"4200\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"0\",\"couta_ingreso\":\"0\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:44:47');
INSERT INTO `bitacora` VALUES (980, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:44:47');
INSERT INTO `bitacora` VALUES (981, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:44:53');
INSERT INTO `bitacora` VALUES (982, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:44:57');
INSERT INTO `bitacora` VALUES (983, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:17');
INSERT INTO `bitacora` VALUES (984, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:25');
INSERT INTO `bitacora` VALUES (985, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:25');
INSERT INTO `bitacora` VALUES (986, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:31');
INSERT INTO `bitacora` VALUES (987, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:36');
INSERT INTO `bitacora` VALUES (988, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:45:41');
INSERT INTO `bitacora` VALUES (989, '/boveda/realizarTraslado', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones diarias\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:46:36');
INSERT INTO `bitacora` VALUES (990, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:46:36');
INSERT INTO `bitacora` VALUES (991, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:46:53');
INSERT INTO `bitacora` VALUES (992, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:47:00');
INSERT INTO `bitacora` VALUES (993, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:47:15');
INSERT INTO `bitacora` VALUES (994, '/apertura/aperturarcaja', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"id_bobeda_movimiento\":\"1\",\"id_caja\":\"1\",\"monto_apertura\":\"1000.00\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:47:36');
INSERT INTO `bitacora` VALUES (995, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:47:37');
INSERT INTO `bitacora` VALUES (996, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:48:05');
INSERT INTO `bitacora` VALUES (997, '/reportes/comprobanteMovimientoBobeda/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:48:15');
INSERT INTO `bitacora` VALUES (998, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:48:38');
INSERT INTO `bitacora` VALUES (999, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:48:40');
INSERT INTO `bitacora` VALUES (1000, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:48:58');
INSERT INTO `bitacora` VALUES (1001, '/cuentas/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"id_caja\":\"1\",\"id_asociado\":\"2\",\"fecha_apertura\":\"2024-06-14\",\"id_tipo_cuenta\":\"1\",\"id_interes_tipo_cuenta\":\"10\",\"numero_cuenta\":\"000000000222\",\"monto_apertura\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:50:24');
INSERT INTO `bitacora` VALUES (1002, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:50:24');
INSERT INTO `bitacora` VALUES (1003, '/declare/149/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:50:38');
INSERT INTO `bitacora` VALUES (1004, '/declare/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"id_cuenta\":\"149\",\"id_cliente\":\"2\",\"declaracion_id\":null,\"n_depositos\":\"2\",\"val_prom_depositos\":\"500\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"0\",\"val_prom_retiros\":\"0\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Negocio Propio\",\"otro_origen_fondos\":null,\"comprobante_procedencia_fondo\":\"Constancia de Salarios\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:20');
INSERT INTO `bitacora` VALUES (1005, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:20');
INSERT INTO `bitacora` VALUES (1006, '/declare/149/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:23');
INSERT INTO `bitacora` VALUES (1007, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:52');
INSERT INTO `bitacora` VALUES (1008, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:55');
INSERT INTO `bitacora` VALUES (1009, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:51:58');
INSERT INTO `bitacora` VALUES (1010, '/beneficiarios/add/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:52:00');
INSERT INTO `bitacora` VALUES (1011, '/beneficiarios/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"id_asociado\":\"2\",\"id_cuenta\":\"149\",\"parentesco\":\"21\",\"nombre\":\"PATRICIA NOHEMI MEGIA SELAYA\",\"porcentaje\":\"100\",\"direccion\":\"COL CIUDAD PACIFICA, SENDA LOS LAURELES, POL d #53SM\",\"telefono\":\"64486016\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:53:18');
INSERT INTO `bitacora` VALUES (1012, '/beneficiarios/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:53:18');
INSERT INTO `bitacora` VALUES (1013, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:53:38');
INSERT INTO `bitacora` VALUES (1014, '/reportes/comprobanteMovimiento/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:53:46');
INSERT INTO `bitacora` VALUES (1015, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:03');
INSERT INTO `bitacora` VALUES (1016, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:06');
INSERT INTO `bitacora` VALUES (1017, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:22');
INSERT INTO `bitacora` VALUES (1018, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:43');
INSERT INTO `bitacora` VALUES (1019, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:45');
INSERT INTO `bitacora` VALUES (1020, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:55:49');
INSERT INTO `bitacora` VALUES (1021, '/intereses/getIntereses/2', '{\"opcion_seleccionada\":\"2\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:56:16');
INSERT INTO `bitacora` VALUES (1022, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:57:23');
INSERT INTO `bitacora` VALUES (1023, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:57:37');
INSERT INTO `bitacora` VALUES (1024, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:57:49');
INSERT INTO `bitacora` VALUES (1025, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:57:58');
INSERT INTO `bitacora` VALUES (1026, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:58:00');
INSERT INTO `bitacora` VALUES (1027, '/clientes/getClienteData/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 13:58:31');
INSERT INTO `bitacora` VALUES (1028, '/creditos/solicitudes/referencias/add/1/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:03:59');
INSERT INTO `bitacora` VALUES (1029, '/creditos/solicitudes/referencias/getReferencias/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:03:59');
INSERT INTO `bitacora` VALUES (1030, '/creditos/solicitudes/bienes/add', '{\"clase_propiedad\":\"CASA DE HABITACION\",\"direccion_bien\":\"CIUDAD PACIFICA, SENDA LOS LAURELES, POL D #53\",\"valor\":\"45000\",\"hipotecado_bien\":\"0\",\"id_solicitud\":\"bd81d341-1265-4ddd-ac73-a9ca5fb376f1\",\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:01');
INSERT INTO `bitacora` VALUES (1031, '/creditos/solicitudes/bienes/getBienes/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:01');
INSERT INTO `bitacora` VALUES (1032, '/creditos/solicitudes/add', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"id_solicitud\":\"bd81d341-1265-4ddd-ac73-a9ca5fb376f1\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-04-10\",\"id_cliente\":\"2\",\"fecha_nacimiento\":\"1983-10-12\",\"genero\":\"1\",\"dui_cliente\":\"01917920-6\",\"fecha_expedicion\":\"2016-12-02\",\"telefono\":\"6848-7330\",\"nacionalidad\":\"SALVADORE\\u00d1O\",\"estado_civil\":\"CASADO\",\"direccion_personal\":\"COL. CIUDAD PACIFICA, SENDA LOS LAURELES, POL d #53 SM\",\"nombre_negocio\":\"VENTA AMBULANTE\",\"direccion_negocio\":\"AMBULANTE\",\"tipo_vivienda\":\"1\",\"observaciones\":null,\"monto_solicitado\":\"3000\",\"plazo\":\"18\",\"tasa\":\"42\",\"cuota\":\"227.45\",\"seguro_deuda\":\"2\",\"aportaciones\":\"10\",\"destino\":\"61\",\"tipo_garantia\":\"4\",\"garantia\":\"VEHICULO NISSAN SENTRA P913391\",\"id_conyugue\":null,\"empresa_labora\":\"COMPUTEC\",\"cargo\":\"PROPIETARIO\",\"sueldo_conyugue\":\"500\",\"tiempo_laborando\":\"1 A\\u00d1O\",\"telefono_trabajo\":null,\"sueldo_solicitante\":\"4200\",\"comisiones\":\"0\",\"negocio_propio\":\"0\",\"otros_ingresos\":\"0\",\"total_ingresos\":\"4200\",\"gastos_vida\":\"500\",\"pagos_obligaciones\":\"529\",\"gastos_negocios\":\"400\",\"otros_gastos\":\"2000\",\"total_gasto\":\"3429\",\"id_referencia\":\"1\",\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":\"0\",\"hipotecado_bien\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:04');
INSERT INTO `bitacora` VALUES (1033, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:04');
INSERT INTO `bitacora` VALUES (1034, '/creditos/solicitud/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:16');
INSERT INTO `bitacora` VALUES (1035, '/creditos/pagare/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:25');
INSERT INTO `bitacora` VALUES (1036, '/creditos/solicitudes/send_comite/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:49');
INSERT INTO `bitacora` VALUES (1037, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:57');
INSERT INTO `bitacora` VALUES (1038, '/creditos/solicitudes/send_comite/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:05:59');
INSERT INTO `bitacora` VALUES (1039, '/creditos/solicitudes/send_comite', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"id_solicitud\":\"bd81d341-1265-4ddd-ac73-a9ca5fb376f1\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"3000.00\",\"plazo\":\"18\",\"tasa\":\"42.00\",\"cuota\":\"227.45\",\"seguro_deuda\":\"2.00\",\"aportaciones\":\"10.00\",\"destino\":\"61\",\"garantia\":\"VEHICULO NISSAN SENTRA P913391\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:06:16');
INSERT INTO `bitacora` VALUES (1040, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:06:17');
INSERT INTO `bitacora` VALUES (1041, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:06:30');
INSERT INTO `bitacora` VALUES (1042, '/creditos/solicitud/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:06:52');
INSERT INTO `bitacora` VALUES (1043, '/creditos/solicitudes/desembolso/bd81d341-1265-4ddd-ac73-a9ca5fb376f1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:07');
INSERT INTO `bitacora` VALUES (1044, '/creditos/solicitudes/create-credit', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"id_solicitud\":\"bd81d341-1265-4ddd-ac73-a9ca5fb376f1\",\"tasa_interes_deposito\":null,\"monto_solicitado\":\"3000.00\",\"plazo\":\"18\",\"tasa\":\"42.00\",\"cuota\":\"227.45\",\"seguro_deuda\":\"2.00\",\"aportaciones\":\"10.00\",\"destino\":\"61\",\"garantia\":\"VEHICULO NISSAN SENTRA P913391\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:24');
INSERT INTO `bitacora` VALUES (1045, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:25');
INSERT INTO `bitacora` VALUES (1046, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:28');
INSERT INTO `bitacora` VALUES (1047, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:30');
INSERT INTO `bitacora` VALUES (1048, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:35');
INSERT INTO `bitacora` VALUES (1049, '/creditos/preaprobado/liquidar/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:50');
INSERT INTO `bitacora` VALUES (1050, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:07:51');
INSERT INTO `bitacora` VALUES (1051, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"61\",\"monto_debe\":\"3000.00\",\"monto_haber\":null,\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:09:14');
INSERT INTO `bitacora` VALUES (1052, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:09:14');
INSERT INTO `bitacora` VALUES (1053, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"3000\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:09:31');
INSERT INTO `bitacora` VALUES (1054, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:09:31');
INSERT INTO `bitacora` VALUES (1055, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"288\",\"monto_debe\":\"0\",\"monto_haber\":\"37.2\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:10:38');
INSERT INTO `bitacora` VALUES (1056, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:10:38');
INSERT INTO `bitacora` VALUES (1057, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:11:20');
INSERT INTO `bitacora` VALUES (1058, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:11:20');
INSERT INTO `bitacora` VALUES (1059, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"5.65\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:11:37');
INSERT INTO `bitacora` VALUES (1060, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:11:37');
INSERT INTO `bitacora` VALUES (1061, '/creditos/preaprobado/liquidar/quitarDescuento/23', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:18');
INSERT INTO `bitacora` VALUES (1062, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:19');
INSERT INTO `bitacora` VALUES (1063, '/creditos/preaprobado/liquidar/quitarDescuento/22', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:22');
INSERT INTO `bitacora` VALUES (1064, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:23');
INSERT INTO `bitacora` VALUES (1065, '/creditos/preaprobado/liquidar/quitarDescuento/21', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:27');
INSERT INTO `bitacora` VALUES (1066, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:27');
INSERT INTO `bitacora` VALUES (1067, '/creditos/preaprobado/liquidar/quitarDescuento/20', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:31');
INSERT INTO `bitacora` VALUES (1068, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:15:31');
INSERT INTO `bitacora` VALUES (1069, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"37.29\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:15');
INSERT INTO `bitacora` VALUES (1070, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:15');
INSERT INTO `bitacora` VALUES (1071, '/creditos/preaprobado/liquidar/quitarDescuento/25', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:33');
INSERT INTO `bitacora` VALUES (1072, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:33');
INSERT INTO `bitacora` VALUES (1073, '/creditos/preaprobado/liquidar/quitarDescuento/24', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:38');
INSERT INTO `bitacora` VALUES (1074, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:39');
INSERT INTO `bitacora` VALUES (1075, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"33\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:50');
INSERT INTO `bitacora` VALUES (1076, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:16:50');
INSERT INTO `bitacora` VALUES (1077, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"74.58\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:17:36');
INSERT INTO `bitacora` VALUES (1078, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:17:36');
INSERT INTO `bitacora` VALUES (1079, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:17:58');
INSERT INTO `bitacora` VALUES (1080, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:17:59');
INSERT INTO `bitacora` VALUES (1081, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"5\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:18:13');
INSERT INTO `bitacora` VALUES (1082, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:18:13');
INSERT INTO `bitacora` VALUES (1083, '/creditos/preaprobado/liquidar/quitarDescuento/30', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:40');
INSERT INTO `bitacora` VALUES (1084, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:40');
INSERT INTO `bitacora` VALUES (1085, '/creditos/preaprobado/liquidar/quitarDescuento/29', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:43');
INSERT INTO `bitacora` VALUES (1086, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:44');
INSERT INTO `bitacora` VALUES (1087, '/creditos/preaprobado/liquidar/quitarDescuento/28', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:47');
INSERT INTO `bitacora` VALUES (1088, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:47');
INSERT INTO `bitacora` VALUES (1089, '/creditos/preaprobado/liquidar/quitarDescuento/27', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:50');
INSERT INTO `bitacora` VALUES (1090, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:51');
INSERT INTO `bitacora` VALUES (1091, '/creditos/preaprobado/liquidar/quitarDescuento/26', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:54');
INSERT INTO `bitacora` VALUES (1092, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:54');
INSERT INTO `bitacora` VALUES (1093, '/creditos/preaprobado/liquidar/quitarDescuento/19', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:57');
INSERT INTO `bitacora` VALUES (1094, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:19:57');
INSERT INTO `bitacora` VALUES (1095, '/creditos/preaprobado/liquidar/quitarDescuento/18', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:00');
INSERT INTO `bitacora` VALUES (1096, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:00');
INSERT INTO `bitacora` VALUES (1097, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"61\",\"monto_debe\":\"3000.00\",\"monto_haber\":\"0\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:14');
INSERT INTO `bitacora` VALUES (1098, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:14');
INSERT INTO `bitacora` VALUES (1099, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"3000\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:25');
INSERT INTO `bitacora` VALUES (1100, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:25');
INSERT INTO `bitacora` VALUES (1101, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"33\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:43');
INSERT INTO `bitacora` VALUES (1102, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:20:44');
INSERT INTO `bitacora` VALUES (1103, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"74.58\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:06');
INSERT INTO `bitacora` VALUES (1104, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:06');
INSERT INTO `bitacora` VALUES (1105, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:19');
INSERT INTO `bitacora` VALUES (1106, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:19');
INSERT INTO `bitacora` VALUES (1107, '/creditos/preaprobado/liquidar/quitarDescuento/36', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:48');
INSERT INTO `bitacora` VALUES (1108, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:49');
INSERT INTO `bitacora` VALUES (1109, '/creditos/preaprobado/liquidar/quitarDescuento/35', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:52');
INSERT INTO `bitacora` VALUES (1110, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:53');
INSERT INTO `bitacora` VALUES (1111, '/creditos/preaprobado/liquidar/quitarDescuento/34', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:56');
INSERT INTO `bitacora` VALUES (1112, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:56');
INSERT INTO `bitacora` VALUES (1113, '/creditos/preaprobado/liquidar/quitarDescuento/33', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:21:59');
INSERT INTO `bitacora` VALUES (1114, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:00');
INSERT INTO `bitacora` VALUES (1115, '/creditos/preaprobado/liquidar/quitarDescuento/32', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:03');
INSERT INTO `bitacora` VALUES (1116, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:03');
INSERT INTO `bitacora` VALUES (1117, '/creditos/preaprobado/liquidar/quitarDescuento/31', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:06');
INSERT INTO `bitacora` VALUES (1118, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:07');
INSERT INTO `bitacora` VALUES (1119, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"61\",\"monto_debe\":\"2200\",\"monto_haber\":\"0\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:40');
INSERT INTO `bitacora` VALUES (1120, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:40');
INSERT INTO `bitacora` VALUES (1121, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"2200\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:54');
INSERT INTO `bitacora` VALUES (1122, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:22:55');
INSERT INTO `bitacora` VALUES (1123, '/creditos/preaprobado/liquidar/quitarDescuento/38', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:28');
INSERT INTO `bitacora` VALUES (1124, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:28');
INSERT INTO `bitacora` VALUES (1125, '/creditos/preaprobado/liquidar/quitarDescuento/37', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:31');
INSERT INTO `bitacora` VALUES (1126, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:32');
INSERT INTO `bitacora` VALUES (1127, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"61\",\"monto_debe\":\"3000.00\",\"monto_haber\":\"0\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:49');
INSERT INTO `bitacora` VALUES (1128, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:25:49');
INSERT INTO `bitacora` VALUES (1129, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"3000\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:26:01');
INSERT INTO `bitacora` VALUES (1130, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:26:01');
INSERT INTO `bitacora` VALUES (1131, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:22');
INSERT INTO `bitacora` VALUES (1132, '/contabilidad/catalogo', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"filtro\":\"310101\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:25');
INSERT INTO `bitacora` VALUES (1133, '/contabilidad/catalogo/edit/460', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:32');
INSERT INTO `bitacora` VALUES (1134, '/contabilidad/catalogo/getCuentasById/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:33');
INSERT INTO `bitacora` VALUES (1135, '/contabilidad/catalogo/put', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"PUT\",\"id\":\"460\",\"tipo_catalogo\":\"3\",\"id_cuenta_padre\":\"459\",\"numero\":\"310101\",\"descripcion\":\"APORTACIONES PAGADAS\",\"saldo\":\"-78.50\",\"iva\":\"1\",\"movimiento\":\"1\",\"estado\":\"1\",\"tipo_reporte\":\"O\",\"tipo_saldo_normal\":\"A\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:37');
INSERT INTO `bitacora` VALUES (1136, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:38');
INSERT INTO `bitacora` VALUES (1137, '/contabilidad/catalogo', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"filtro\":\"310101\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:40');
INSERT INTO `bitacora` VALUES (1138, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:47');
INSERT INTO `bitacora` VALUES (1139, '/creditos/preaprobado/liquidar/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:55');
INSERT INTO `bitacora` VALUES (1140, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:27:56');
INSERT INTO `bitacora` VALUES (1141, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"45.00\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:07');
INSERT INTO `bitacora` VALUES (1142, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:08');
INSERT INTO `bitacora` VALUES (1143, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"74.58\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:40');
INSERT INTO `bitacora` VALUES (1144, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:41');
INSERT INTO `bitacora` VALUES (1145, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:53');
INSERT INTO `bitacora` VALUES (1146, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:28:53');
INSERT INTO `bitacora` VALUES (1147, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"5\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:29:16');
INSERT INTO `bitacora` VALUES (1148, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:29:17');
INSERT INTO `bitacora` VALUES (1149, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"1072\",\"monto_debe\":\"0\",\"monto_haber\":\"16\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:33:44');
INSERT INTO `bitacora` VALUES (1150, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:33:44');
INSERT INTO `bitacora` VALUES (1151, '/creditos/preaprobado/liquidar/quitarDescuento/46', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:43');
INSERT INTO `bitacora` VALUES (1152, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:43');
INSERT INTO `bitacora` VALUES (1153, '/creditos/preaprobado/liquidar/quitarDescuento/45', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:48');
INSERT INTO `bitacora` VALUES (1154, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:48');
INSERT INTO `bitacora` VALUES (1155, '/creditos/preaprobado/liquidar/quitarDescuento/44', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:51');
INSERT INTO `bitacora` VALUES (1156, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:52');
INSERT INTO `bitacora` VALUES (1157, '/creditos/preaprobado/liquidar/quitarDescuento/43', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:58');
INSERT INTO `bitacora` VALUES (1158, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:35:59');
INSERT INTO `bitacora` VALUES (1159, '/creditos/preaprobado/liquidar/quitarDescuento/42', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:02');
INSERT INTO `bitacora` VALUES (1160, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:03');
INSERT INTO `bitacora` VALUES (1161, '/creditos/preaprobado/liquidar/quitarDescuento/41', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:06');
INSERT INTO `bitacora` VALUES (1162, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:06');
INSERT INTO `bitacora` VALUES (1163, '/creditos/preaprobado/liquidar/quitarDescuento/40', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:09');
INSERT INTO `bitacora` VALUES (1164, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:10');
INSERT INTO `bitacora` VALUES (1165, '/creditos/preaprobado/liquidar/quitarDescuento/39', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:13');
INSERT INTO `bitacora` VALUES (1166, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:13');
INSERT INTO `bitacora` VALUES (1167, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"61\",\"monto_debe\":\"3000.00\",\"monto_haber\":\"0\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:31');
INSERT INTO `bitacora` VALUES (1168, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:31');
INSERT INTO `bitacora` VALUES (1169, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"5\",\"monto_debe\":\"0\",\"monto_haber\":\"3000\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:46');
INSERT INTO `bitacora` VALUES (1170, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:47');
INSERT INTO `bitacora` VALUES (1171, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"460\",\"monto_debe\":\"0\",\"monto_haber\":\"45.00\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:57');
INSERT INTO `bitacora` VALUES (1172, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:36:57');
INSERT INTO `bitacora` VALUES (1173, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"495\",\"monto_debe\":\"0\",\"monto_haber\":\"90\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:37:29');
INSERT INTO `bitacora` VALUES (1174, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:37:29');
INSERT INTO `bitacora` VALUES (1175, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"355\",\"monto_debe\":\"0\",\"monto_haber\":\"18\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:37:51');
INSERT INTO `bitacora` VALUES (1176, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:37:52');
INSERT INTO `bitacora` VALUES (1177, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"502\",\"monto_debe\":\"0\",\"monto_haber\":\"5\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:38:03');
INSERT INTO `bitacora` VALUES (1178, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:38:04');
INSERT INTO `bitacora` VALUES (1179, '/creditos/preaprobado/liquidar/add-descuento', '{\"id_cuenta\":\"1072\",\"monto_debe\":\"0\",\"monto_haber\":\"16\",\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"comentario\":null,\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:38:42');
INSERT INTO `bitacora` VALUES (1180, '/creditos/preaprobado/liquidar/getDescuentos/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:38:43');
INSERT INTO `bitacora` VALUES (1181, '/creditos/solicitudes/liquidar', '{\"id_credito\":\"43dfe707-acac-4f68-9bbe-c7d288ce5ea6\",\"liquido\":\"2807.80\",\"id_cuenta_ahorro_destino\":\"142\",\"id_cuenta_aportacion_destino\":\"147\",\"aportacionMonto\":\"0\",\"id_caja_aperturada\":\"1\",\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:11');
INSERT INTO `bitacora` VALUES (1182, '/creditos/aprobado/liquidacion/43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:14');
INSERT INTO `bitacora` VALUES (1183, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:16');
INSERT INTO `bitacora` VALUES (1184, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:30');
INSERT INTO `bitacora` VALUES (1185, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:48');
INSERT INTO `bitacora` VALUES (1186, '/reportes/RepEstadoCuenta/149', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:41:58');
INSERT INTO `bitacora` VALUES (1187, '/reportes/RepEstadoCuenta/142', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:42:16');
INSERT INTO `bitacora` VALUES (1188, '/contabilidad/tipos-partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:42:55');
INSERT INTO `bitacora` VALUES (1189, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:43:09');
INSERT INTO `bitacora` VALUES (1190, '/reportes/partidaContable/c20e8a5c-f384-4fdd-b7f6-d39a0f1505cb', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:43:13');
INSERT INTO `bitacora` VALUES (1191, '/rol', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:44:15');
INSERT INTO `bitacora` VALUES (1192, '/permisos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:44:19');
INSERT INTO `bitacora` VALUES (1193, '/getAllowAccess', '{\"id_rol\":\"1\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:44:20');
INSERT INTO `bitacora` VALUES (1194, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:44:43');
INSERT INTO `bitacora` VALUES (1195, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:45:14');
INSERT INTO `bitacora` VALUES (1196, '/alerts/client/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:45:16');
INSERT INTO `bitacora` VALUES (1197, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:50:56');
INSERT INTO `bitacora` VALUES (1198, '/reportes/partidaContable/c20e8a5c-f384-4fdd-b7f6-d39a0f1505cb', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:50:58');
INSERT INTO `bitacora` VALUES (1199, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:51:31');
INSERT INTO `bitacora` VALUES (1200, '/contabilidad/catalogo', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"filtro\":\"11040102\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:51:34');
INSERT INTO `bitacora` VALUES (1201, '/contabilidad/catalogo/edit/61', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:51:37');
INSERT INTO `bitacora` VALUES (1202, '/contabilidad/catalogo/getCuentasById/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:51:38');
INSERT INTO `bitacora` VALUES (1203, '/contabilidad/catalogo/put', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"PUT\",\"id\":\"61\",\"tipo_catalogo\":\"1\",\"id_cuenta_padre\":\"59\",\"numero\":\"11040102\",\"descripcion\":\"PRESTAMOS PARA COMERCIO\",\"saldo\":\"3000.00\",\"iva\":\"0\",\"movimiento\":\"1\",\"estado\":\"1\",\"tipo_reporte\":\"O\",\"tipo_saldo_normal\":\"A\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:52:08');
INSERT INTO `bitacora` VALUES (1204, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:52:08');
INSERT INTO `bitacora` VALUES (1205, '/reportes/partidaContable/c20e8a5c-f384-4fdd-b7f6-d39a0f1505cb', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:52:11');
INSERT INTO `bitacora` VALUES (1206, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:57:14');
INSERT INTO `bitacora` VALUES (1207, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:03');
INSERT INTO `bitacora` VALUES (1208, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:04');
INSERT INTO `bitacora` VALUES (1209, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:05');
INSERT INTO `bitacora` VALUES (1210, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:08');
INSERT INTO `bitacora` VALUES (1211, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:11');
INSERT INTO `bitacora` VALUES (1212, '/productos/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:12');
INSERT INTO `bitacora` VALUES (1213, '/compras/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:14');
INSERT INTO `bitacora` VALUES (1214, '/proveedores/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:15');
INSERT INTO `bitacora` VALUES (1215, '/proveedores/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:33');
INSERT INTO `bitacora` VALUES (1216, '/alerts', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:37');
INSERT INTO `bitacora` VALUES (1217, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:40');
INSERT INTO `bitacora` VALUES (1218, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:41');
INSERT INTO `bitacora` VALUES (1219, '/comite', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:42');
INSERT INTO `bitacora` VALUES (1220, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:43');
INSERT INTO `bitacora` VALUES (1221, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:45');
INSERT INTO `bitacora` VALUES (1222, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:47');
INSERT INTO `bitacora` VALUES (1223, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:47');
INSERT INTO `bitacora` VALUES (1224, '/facturas/list', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:48');
INSERT INTO `bitacora` VALUES (1225, '/creditos/abonos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:49');
INSERT INTO `bitacora` VALUES (1226, '/captaciones/plazos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:52');
INSERT INTO `bitacora` VALUES (1227, '/captaciones/depositosplazo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:53');
INSERT INTO `bitacora` VALUES (1228, '/reportes/cartera', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:57');
INSERT INTO `bitacora` VALUES (1229, '/reportes/cartera-mora', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:58:58');
INSERT INTO `bitacora` VALUES (1230, '/contabilidad/Reportes/balancegeneral', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:59:03');
INSERT INTO `bitacora` VALUES (1231, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:59:08');
INSERT INTO `bitacora` VALUES (1232, '/boveda/cerrar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:59:12');
INSERT INTO `bitacora` VALUES (1233, '/boveda/realizarCierreBobeda', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"id_bobeda\":\"2\",\"monto\":\"0\",\"id_empleado\":\"9\",\"observacion\":\"sd\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:59:25');
INSERT INTO `bitacora` VALUES (1234, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 14:59:26');
INSERT INTO `bitacora` VALUES (1235, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:01:46');
INSERT INTO `bitacora` VALUES (1236, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:01:54');
INSERT INTO `bitacora` VALUES (1237, '/contabilidad/catalogo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:02:46');
INSERT INTO `bitacora` VALUES (1238, '/contabilidad/catalogo', '{\"page\":\"4\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:02:51');
INSERT INTO `bitacora` VALUES (1239, '/contabilidad/catalogo', '{\"page\":\"112\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:02:53');
INSERT INTO `bitacora` VALUES (1240, '/contabilidad/catalogo', '{\"page\":\"109\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:02:55');
INSERT INTO `bitacora` VALUES (1241, '/contabilidad/catalogo', '{\"page\":\"108\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:02:57');
INSERT INTO `bitacora` VALUES (1242, '/contabilidad/catalogo', '{\"page\":\"2\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:03:10');
INSERT INTO `bitacora` VALUES (1243, '/contabilidad/catalogo', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"filtro\":\"comercio\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:03:18');
INSERT INTO `bitacora` VALUES (1244, '/contabilidad/catalogo', '{\"_token\":\"aWRj3vO6wbPlvyRGfWDKfLlZ5gHj7tm3CRhfGAq2\",\"_method\":\"POST\",\"filtro\":\"1104\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:03:30');
INSERT INTO `bitacora` VALUES (1245, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:04:10');
INSERT INTO `bitacora` VALUES (1246, '/contabilidad/cierre-mensual', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:04:12');
INSERT INTO `bitacora` VALUES (1247, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-08-15 15:06:10');
INSERT INTO `bitacora` VALUES (1248, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:07:02');
INSERT INTO `bitacora` VALUES (1249, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:07:06');
INSERT INTO `bitacora` VALUES (1250, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:07:09');
INSERT INTO `bitacora` VALUES (1251, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:07:11');
INSERT INTO `bitacora` VALUES (1252, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:07:13');
INSERT INTO `bitacora` VALUES (1253, '/clientes/add', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:07');
INSERT INTO `bitacora` VALUES (1254, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:07');
INSERT INTO `bitacora` VALUES (1255, '/alerts/clients', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:11');
INSERT INTO `bitacora` VALUES (1256, '/alerts/active', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:16');
INSERT INTO `bitacora` VALUES (1257, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:21');
INSERT INTO `bitacora` VALUES (1258, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:23');
INSERT INTO `bitacora` VALUES (1259, '/asociados/add', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"numero_asociado\":\"0000000001\",\"id_cliente\":\"1\",\"fecha_ingreso\":\"2024-09-25\",\"sueldo_quincenal\":\"150\",\"sueldo_mensual\":\"300\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"4\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"5\",\"referencia_asociado_uno\":null,\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:48');
INSERT INTO `bitacora` VALUES (1260, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:48');
INSERT INTO `bitacora` VALUES (1261, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:53');
INSERT INTO `bitacora` VALUES (1262, '/beneficiarios/add/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:55');
INSERT INTO `bitacora` VALUES (1263, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:59');
INSERT INTO `bitacora` VALUES (1264, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:08:59');
INSERT INTO `bitacora` VALUES (1265, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:03');
INSERT INTO `bitacora` VALUES (1266, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:09');
INSERT INTO `bitacora` VALUES (1267, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:09');
INSERT INTO `bitacora` VALUES (1268, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:11');
INSERT INTO `bitacora` VALUES (1269, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:14');
INSERT INTO `bitacora` VALUES (1270, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:18');
INSERT INTO `bitacora` VALUES (1271, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:39');
INSERT INTO `bitacora` VALUES (1272, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:39');
INSERT INTO `bitacora` VALUES (1273, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:42');
INSERT INTO `bitacora` VALUES (1274, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:42');
INSERT INTO `bitacora` VALUES (1275, '/cajas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:45');
INSERT INTO `bitacora` VALUES (1276, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:09:52');
INSERT INTO `bitacora` VALUES (1277, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:10');
INSERT INTO `bitacora` VALUES (1278, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:11');
INSERT INTO `bitacora` VALUES (1279, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:13');
INSERT INTO `bitacora` VALUES (1280, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:18');
INSERT INTO `bitacora` VALUES (1281, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:20');
INSERT INTO `bitacora` VALUES (1282, '/boveda/realizarAperturaBobeda', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_bobeda\":\"2\",\"monto\":\"50000\",\"id_empleado\":\"9\",\"observacion\":\"Apertura de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:35');
INSERT INTO `bitacora` VALUES (1283, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:35');
INSERT INTO `bitacora` VALUES (1284, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:37');
INSERT INTO `bitacora` VALUES (1285, '/boveda/realizarTraslado', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"1000\",\"id_empleado\":\"9\",\"observacion\":\"Inicio de operaciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:50');
INSERT INTO `bitacora` VALUES (1286, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:50');
INSERT INTO `bitacora` VALUES (1287, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:56');
INSERT INTO `bitacora` VALUES (1288, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:10:57');
INSERT INTO `bitacora` VALUES (1289, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:00');
INSERT INTO `bitacora` VALUES (1290, '/apertura/aperturarcaja', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_bobeda_movimiento\":\"2\",\"id_caja\":\"1\",\"monto_apertura\":\"1000.00\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:01');
INSERT INTO `bitacora` VALUES (1291, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:02');
INSERT INTO `bitacora` VALUES (1292, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:05');
INSERT INTO `bitacora` VALUES (1293, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:06');
INSERT INTO `bitacora` VALUES (1294, '/intereses/getIntereses/2', '{\"opcion_seleccionada\":\"2\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:13');
INSERT INTO `bitacora` VALUES (1295, '/cuentas/add', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"id_asociado\":\"1\",\"fecha_apertura\":\"2024-09-25\",\"id_tipo_cuenta\":\"2\",\"id_interes_tipo_cuenta\":\"7\",\"numero_cuenta\":\"0000000002\",\"monto_apertura\":\"250\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:25');
INSERT INTO `bitacora` VALUES (1296, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:25');
INSERT INTO `bitacora` VALUES (1297, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:28');
INSERT INTO `bitacora` VALUES (1298, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:11:30');
INSERT INTO `bitacora` VALUES (1299, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:14');
INSERT INTO `bitacora` VALUES (1300, '/declare/150/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:18');
INSERT INTO `bitacora` VALUES (1301, '/declare/add', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"_method\":\"POST\",\"id_cuenta\":\"150\",\"id_cliente\":\"1\",\"declaracion_id\":null,\"n_depositos\":\"2\",\"val_prom_depositos\":\"250\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"5\",\"val_prom_retiros\":\"25\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Negocio Propio\",\"otro_origen_fondos\":null,\"comprobante_procedencia_fondo\":\"Carn\\u00e9 o constancia de pensi\\u00f3n\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:41');
INSERT INTO `bitacora` VALUES (1302, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:41');
INSERT INTO `bitacora` VALUES (1303, '/declare/150/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:43');
INSERT INTO `bitacora` VALUES (1304, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:50');
INSERT INTO `bitacora` VALUES (1305, '/cuentas/listarMovimientosSinImprirmir/148', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:54');
INSERT INTO `bitacora` VALUES (1306, '/cuentas/listarMovimientosSinImprirmir/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:13:57');
INSERT INTO `bitacora` VALUES (1307, '/cuentas/listarMovimientosSinImprirmir/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:05');
INSERT INTO `bitacora` VALUES (1308, '/reportes/RepEstadoCuenta/148', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:15');
INSERT INTO `bitacora` VALUES (1309, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:15');
INSERT INTO `bitacora` VALUES (1310, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:28');
INSERT INTO `bitacora` VALUES (1311, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:34');
INSERT INTO `bitacora` VALUES (1312, '/cuentas/getcuenta/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:37');
INSERT INTO `bitacora` VALUES (1313, '/movimientos/realizarretiro', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"2\",\"id_cuenta\":\"150\",\"saldo\":\"250.00\",\"id_libreta\":\"6\",\"monto\":\"10\",\"cliente_transaccion\":\"Luis Marquez\",\"dui_transaccion\":\"03731671-7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:47');
INSERT INTO `bitacora` VALUES (1314, '/movimientos/realizarretiro', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"2\",\"id_cuenta\":\"150\",\"saldo\":\"250.00\",\"id_libreta\":\"6\",\"monto\":\"10\",\"cliente_transaccion\":\"Luis Marquez\",\"dui_transaccion\":\"03731671-7\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:48');
INSERT INTO `bitacora` VALUES (1315, '/reportes/comprobanteMovimiento/7', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:48');
INSERT INTO `bitacora` VALUES (1316, '/reportes/comprobanteMovimiento/8', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:50');
INSERT INTO `bitacora` VALUES (1317, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:14:53');
INSERT INTO `bitacora` VALUES (1318, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:29');
INSERT INTO `bitacora` VALUES (1319, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:34');
INSERT INTO `bitacora` VALUES (1320, '/movimientos/depositar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:35');
INSERT INTO `bitacora` VALUES (1321, '/cuentas/getLibreta/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:37');
INSERT INTO `bitacora` VALUES (1322, '/movimientos/realizardeposito', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"3\",\"id_cuenta\":\"150\",\"id_libreta\":\"6\",\"monto\":\"150\",\"dui_transaccion\":\"0\",\"cliente_transaccion\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:42');
INSERT INTO `bitacora` VALUES (1323, '/reportes/comprobanteMovimiento/9', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:42');
INSERT INTO `bitacora` VALUES (1324, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:44');
INSERT INTO `bitacora` VALUES (1325, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:15:51');
INSERT INTO `bitacora` VALUES (1326, '/contabilidad/partidas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:16:41');
INSERT INTO `bitacora` VALUES (1327, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:30');
INSERT INTO `bitacora` VALUES (1328, '/movimientos/depositar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:32');
INSERT INTO `bitacora` VALUES (1329, '/cuentas/getLibreta/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:34');
INSERT INTO `bitacora` VALUES (1330, '/movimientos/realizardeposito', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"4\",\"id_cuenta\":\"150\",\"id_libreta\":\"6\",\"monto\":\"10\",\"dui_transaccion\":\"03731671-7\",\"cliente_transaccion\":\"Luis MArquez\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:45');
INSERT INTO `bitacora` VALUES (1331, '/reportes/comprobanteMovimiento/10', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:45');
INSERT INTO `bitacora` VALUES (1332, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:47');
INSERT INTO `bitacora` VALUES (1333, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:17:53');
INSERT INTO `bitacora` VALUES (1334, '/movimientos/retirar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:18:38');
INSERT INTO `bitacora` VALUES (1335, '/cuentas/getcuenta/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:18:40');
INSERT INTO `bitacora` VALUES (1336, '/movimientos/realizarretiro', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_caja\":\"1\",\"num_movimiento_libreta\":\"5\",\"id_cuenta\":\"150\",\"saldo\":\"390.00\",\"id_libreta\":\"6\",\"monto\":\"5\",\"cliente_transaccion\":\"Luis\",\"dui_transaccion\":\"0373164\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:18:47');
INSERT INTO `bitacora` VALUES (1337, '/reportes/comprobanteMovimiento/11', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:18:47');
INSERT INTO `bitacora` VALUES (1338, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:18:49');
INSERT INTO `bitacora` VALUES (1339, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:07');
INSERT INTO `bitacora` VALUES (1340, '/apertura/cortez/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:09');
INSERT INTO `bitacora` VALUES (1341, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:09');
INSERT INTO `bitacora` VALUES (1342, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:19');
INSERT INTO `bitacora` VALUES (1343, '/boveda/recibirCorte', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"_method\":\"POST\",\"id_corte_movimiento\":\"3\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:25');
INSERT INTO `bitacora` VALUES (1344, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:25');
INSERT INTO `bitacora` VALUES (1345, '/boveda/cerrar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:31');
INSERT INTO `bitacora` VALUES (1346, '/boveda/realizarCierreBobeda', '{\"_token\":\"HKUkHjBfSnC7BnHh7RrR7WABKiEcxDO9rpe8734V\",\"id_bobeda\":\"2\",\"monto\":\"50135.00\",\"id_empleado\":\"9\",\"observacion\":\"INgresos por depositos\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:38');
INSERT INTO `bitacora` VALUES (1347, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:38');
INSERT INTO `bitacora` VALUES (1348, '/reportes/comprobanteMovimientoBobeda/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:41');
INSERT INTO `bitacora` VALUES (1349, '/reportes/comprobanteMovimientoBobeda/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:19:47');
INSERT INTO `bitacora` VALUES (1350, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:17');
INSERT INTO `bitacora` VALUES (1351, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:20');
INSERT INTO `bitacora` VALUES (1352, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:33');
INSERT INTO `bitacora` VALUES (1353, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:34');
INSERT INTO `bitacora` VALUES (1354, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:36');
INSERT INTO `bitacora` VALUES (1355, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:38');
INSERT INTO `bitacora` VALUES (1356, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:38');
INSERT INTO `bitacora` VALUES (1357, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:42');
INSERT INTO `bitacora` VALUES (1358, '/creditos/solicitudes/estudios', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:45');
INSERT INTO `bitacora` VALUES (1359, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:50');
INSERT INTO `bitacora` VALUES (1360, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:20:51');
INSERT INTO `bitacora` VALUES (1361, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:23:41');
INSERT INTO `bitacora` VALUES (1362, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:13');
INSERT INTO `bitacora` VALUES (1363, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:15');
INSERT INTO `bitacora` VALUES (1364, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:15');
INSERT INTO `bitacora` VALUES (1365, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:15');
INSERT INTO `bitacora` VALUES (1366, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:15');
INSERT INTO `bitacora` VALUES (1367, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:16');
INSERT INTO `bitacora` VALUES (1368, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:16');
INSERT INTO `bitacora` VALUES (1369, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:16');
INSERT INTO `bitacora` VALUES (1370, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:16');
INSERT INTO `bitacora` VALUES (1371, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:17');
INSERT INTO `bitacora` VALUES (1372, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:24:17');
INSERT INTO `bitacora` VALUES (1373, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:04');
INSERT INTO `bitacora` VALUES (1374, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:05');
INSERT INTO `bitacora` VALUES (1375, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:24');
INSERT INTO `bitacora` VALUES (1376, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:25');
INSERT INTO `bitacora` VALUES (1377, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:48');
INSERT INTO `bitacora` VALUES (1378, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:49');
INSERT INTO `bitacora` VALUES (1379, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:49');
INSERT INTO `bitacora` VALUES (1380, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:49');
INSERT INTO `bitacora` VALUES (1381, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:49');
INSERT INTO `bitacora` VALUES (1382, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:49');
INSERT INTO `bitacora` VALUES (1383, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:50');
INSERT INTO `bitacora` VALUES (1384, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:50');
INSERT INTO `bitacora` VALUES (1385, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:50');
INSERT INTO `bitacora` VALUES (1386, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:50');
INSERT INTO `bitacora` VALUES (1387, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:50');
INSERT INTO `bitacora` VALUES (1388, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:25:51');
INSERT INTO `bitacora` VALUES (1389, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:26:38');
INSERT INTO `bitacora` VALUES (1390, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:26:39');
INSERT INTO `bitacora` VALUES (1391, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:28:05');
INSERT INTO `bitacora` VALUES (1392, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:28:05');
INSERT INTO `bitacora` VALUES (1393, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:28:06');
INSERT INTO `bitacora` VALUES (1394, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:08');
INSERT INTO `bitacora` VALUES (1395, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:08');
INSERT INTO `bitacora` VALUES (1396, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:08');
INSERT INTO `bitacora` VALUES (1397, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:09');
INSERT INTO `bitacora` VALUES (1398, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:09');
INSERT INTO `bitacora` VALUES (1399, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:09');
INSERT INTO `bitacora` VALUES (1400, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:09');
INSERT INTO `bitacora` VALUES (1401, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:09');
INSERT INTO `bitacora` VALUES (1402, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:10');
INSERT INTO `bitacora` VALUES (1403, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:10');
INSERT INTO `bitacora` VALUES (1404, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:30:10');
INSERT INTO `bitacora` VALUES (1405, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:31');
INSERT INTO `bitacora` VALUES (1406, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:31');
INSERT INTO `bitacora` VALUES (1407, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:31');
INSERT INTO `bitacora` VALUES (1408, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:31');
INSERT INTO `bitacora` VALUES (1409, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:32');
INSERT INTO `bitacora` VALUES (1410, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:32');
INSERT INTO `bitacora` VALUES (1411, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:32');
INSERT INTO `bitacora` VALUES (1412, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:32');
INSERT INTO `bitacora` VALUES (1413, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:32');
INSERT INTO `bitacora` VALUES (1414, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:33');
INSERT INTO `bitacora` VALUES (1415, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:33');
INSERT INTO `bitacora` VALUES (1416, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:33');
INSERT INTO `bitacora` VALUES (1417, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:33');
INSERT INTO `bitacora` VALUES (1418, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:33');
INSERT INTO `bitacora` VALUES (1419, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:31:50');
INSERT INTO `bitacora` VALUES (1420, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:33:17');
INSERT INTO `bitacora` VALUES (1421, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:33:21');
INSERT INTO `bitacora` VALUES (1422, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:33:22');
INSERT INTO `bitacora` VALUES (1423, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:33:22');
INSERT INTO `bitacora` VALUES (1424, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:33:22');
INSERT INTO `bitacora` VALUES (1425, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:28');
INSERT INTO `bitacora` VALUES (1426, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:28');
INSERT INTO `bitacora` VALUES (1427, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:28');
INSERT INTO `bitacora` VALUES (1428, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:28');
INSERT INTO `bitacora` VALUES (1429, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:29');
INSERT INTO `bitacora` VALUES (1430, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:29');
INSERT INTO `bitacora` VALUES (1431, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:29');
INSERT INTO `bitacora` VALUES (1432, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:29');
INSERT INTO `bitacora` VALUES (1433, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:29');
INSERT INTO `bitacora` VALUES (1434, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:30');
INSERT INTO `bitacora` VALUES (1435, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:30');
INSERT INTO `bitacora` VALUES (1436, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:34:30');
INSERT INTO `bitacora` VALUES (1437, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:35:02');
INSERT INTO `bitacora` VALUES (1438, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:35:02');
INSERT INTO `bitacora` VALUES (1439, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-25 12:35:26');
INSERT INTO `bitacora` VALUES (1440, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 08:58:39');
INSERT INTO `bitacora` VALUES (1441, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 08:58:42');
INSERT INTO `bitacora` VALUES (1442, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 08:58:44');
INSERT INTO `bitacora` VALUES (1443, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:00:57');
INSERT INTO `bitacora` VALUES (1444, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:03:04');
INSERT INTO `bitacora` VALUES (1445, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:03:06');
INSERT INTO `bitacora` VALUES (1446, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:04:00');
INSERT INTO `bitacora` VALUES (1447, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:04:06');
INSERT INTO `bitacora` VALUES (1448, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:04:09');
INSERT INTO `bitacora` VALUES (1449, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:04:18');
INSERT INTO `bitacora` VALUES (1450, '/reportes/contrato/150', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:04:22');
INSERT INTO `bitacora` VALUES (1451, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:05:31');
INSERT INTO `bitacora` VALUES (1452, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:06:37');
INSERT INTO `bitacora` VALUES (1453, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:08:53');
INSERT INTO `bitacora` VALUES (1454, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:09:37');
INSERT INTO `bitacora` VALUES (1455, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:10:18');
INSERT INTO `bitacora` VALUES (1456, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:10:28');
INSERT INTO `bitacora` VALUES (1457, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:10:30');
INSERT INTO `bitacora` VALUES (1458, '/clientes/getClienteData/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:10:33');
INSERT INTO `bitacora` VALUES (1459, '/creditos/solicitudes/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"POST\",\"id_solicitud\":\"fc52c365-e66b-4740-bd97-53fc85d31b93\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-09-29\",\"id_cliente\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"genero\":\"1\",\"dui_cliente\":\"03731671-8\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":null,\"monto_solicitado\":\"50\",\"plazo\":\"50\",\"tasa\":\"2\",\"cuota\":\"1.04\",\"seguro_deuda\":null,\"aportaciones\":null,\"destino\":\"68\",\"tipo_garantia\":\"1\",\"garantia\":null,\"id_conyugue\":null,\"empresa_labora\":null,\"cargo\":null,\"sueldo_conyugue\":null,\"tiempo_laborando\":null,\"telefono_trabajo\":null,\"sueldo_solicitante\":\"150\",\"comisiones\":\"0\",\"negocio_propio\":\"0\",\"otros_ingresos\":\"25\",\"total_ingresos\":\"175\",\"gastos_vida\":\"500\",\"pagos_obligaciones\":\"2\",\"gastos_negocios\":null,\"otros_gastos\":null,\"total_gasto\":\"502\",\"id_referencia\":null,\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":null,\"hipotecado_bien\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:10:59');
INSERT INTO `bitacora` VALUES (1460, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:11:00');
INSERT INTO `bitacora` VALUES (1461, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:11:54');
INSERT INTO `bitacora` VALUES (1462, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:11:56');
INSERT INTO `bitacora` VALUES (1463, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:12:24');
INSERT INTO `bitacora` VALUES (1464, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:12:26');
INSERT INTO `bitacora` VALUES (1465, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:12:34');
INSERT INTO `bitacora` VALUES (1466, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:12:53');
INSERT INTO `bitacora` VALUES (1467, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:13:30');
INSERT INTO `bitacora` VALUES (1468, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:14:38');
INSERT INTO `bitacora` VALUES (1469, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:14:46');
INSERT INTO `bitacora` VALUES (1470, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:14:49');
INSERT INTO `bitacora` VALUES (1471, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:06');
INSERT INTO `bitacora` VALUES (1472, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:09');
INSERT INTO `bitacora` VALUES (1473, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:30');
INSERT INTO `bitacora` VALUES (1474, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:31');
INSERT INTO `bitacora` VALUES (1475, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:35');
INSERT INTO `bitacora` VALUES (1476, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:16:53');
INSERT INTO `bitacora` VALUES (1477, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:20:18');
INSERT INTO `bitacora` VALUES (1478, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:20:42');
INSERT INTO `bitacora` VALUES (1479, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:20:49');
INSERT INTO `bitacora` VALUES (1480, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:20:52');
INSERT INTO `bitacora` VALUES (1481, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:21:21');
INSERT INTO `bitacora` VALUES (1482, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:24:50');
INSERT INTO `bitacora` VALUES (1483, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:25:12');
INSERT INTO `bitacora` VALUES (1484, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:26:32');
INSERT INTO `bitacora` VALUES (1485, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:26:53');
INSERT INTO `bitacora` VALUES (1486, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:27:26');
INSERT INTO `bitacora` VALUES (1487, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:27:41');
INSERT INTO `bitacora` VALUES (1488, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:40:22');
INSERT INTO `bitacora` VALUES (1489, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:40:27');
INSERT INTO `bitacora` VALUES (1490, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:40:30');
INSERT INTO `bitacora` VALUES (1491, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:40:51');
INSERT INTO `bitacora` VALUES (1492, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:41:39');
INSERT INTO `bitacora` VALUES (1493, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:41:45');
INSERT INTO `bitacora` VALUES (1494, '/clientes/put', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:41:47');
INSERT INTO `bitacora` VALUES (1495, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:41:48');
INSERT INTO `bitacora` VALUES (1496, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:42:23');
INSERT INTO `bitacora` VALUES (1497, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:42:36');
INSERT INTO `bitacora` VALUES (1498, '/alerts/active', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:42:44');
INSERT INTO `bitacora` VALUES (1499, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:43:27');
INSERT INTO `bitacora` VALUES (1500, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:43:42');
INSERT INTO `bitacora` VALUES (1501, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:44:51');
INSERT INTO `bitacora` VALUES (1502, '/beneficiarios/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:44:53');
INSERT INTO `bitacora` VALUES (1503, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:45:03');
INSERT INTO `bitacora` VALUES (1504, '/clientes/solcitud-ingreso/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:45:05');
INSERT INTO `bitacora` VALUES (1505, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:46:10');
INSERT INTO `bitacora` VALUES (1506, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:46:24');
INSERT INTO `bitacora` VALUES (1507, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:14');
INSERT INTO `bitacora` VALUES (1508, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:17');
INSERT INTO `bitacora` VALUES (1509, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:20');
INSERT INTO `bitacora` VALUES (1510, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:25');
INSERT INTO `bitacora` VALUES (1511, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:28');
INSERT INTO `bitacora` VALUES (1512, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:47:31');
INSERT INTO `bitacora` VALUES (1513, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:51:25');
INSERT INTO `bitacora` VALUES (1514, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:51:28');
INSERT INTO `bitacora` VALUES (1515, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:51:31');
INSERT INTO `bitacora` VALUES (1516, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:51:44');
INSERT INTO `bitacora` VALUES (1517, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:51:47');
INSERT INTO `bitacora` VALUES (1518, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:59:11');
INSERT INTO `bitacora` VALUES (1519, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:59:20');
INSERT INTO `bitacora` VALUES (1520, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 09:59:22');
INSERT INTO `bitacora` VALUES (1521, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:00:05');
INSERT INTO `bitacora` VALUES (1522, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:00:11');
INSERT INTO `bitacora` VALUES (1523, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:00:23');
INSERT INTO `bitacora` VALUES (1524, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:05:17');
INSERT INTO `bitacora` VALUES (1525, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:05:21');
INSERT INTO `bitacora` VALUES (1526, '/modulo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:06:05');
INSERT INTO `bitacora` VALUES (1527, '/modulo/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:06:10');
INSERT INTO `bitacora` VALUES (1528, '/modulo/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"modulo\":\"Profesiones\",\"ruta\":\"\\/profesiones\",\"is_padre\":\"0\",\"id_padre\":\"4\",\"orden\":\"6\",\"icono\":\"ki-medal-star\",\"is_minimazed\":\"0\",\"target\":\"0\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:08');
INSERT INTO `bitacora` VALUES (1529, '/modulo', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:08');
INSERT INTO `bitacora` VALUES (1530, '/permisos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:10');
INSERT INTO `bitacora` VALUES (1531, '/getAllowAccess', '{\"id_rol\":\"1\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:11');
INSERT INTO `bitacora` VALUES (1532, '/allowAccess', '{\"id_modulo\":\"78\",\"id_rol\":\"1\",\"isActive\":\"true\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:16');
INSERT INTO `bitacora` VALUES (1533, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:08:23');
INSERT INTO `bitacora` VALUES (1534, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:24:49');
INSERT INTO `bitacora` VALUES (1535, '/rol', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:24:54');
INSERT INTO `bitacora` VALUES (1536, '/rol/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:24:57');
INSERT INTO `bitacora` VALUES (1537, '/rol', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:29:33');
INSERT INTO `bitacora` VALUES (1538, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:29:37');
INSERT INTO `bitacora` VALUES (1539, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:30:19');
INSERT INTO `bitacora` VALUES (1540, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:31:34');
INSERT INTO `bitacora` VALUES (1541, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:32:54');
INSERT INTO `bitacora` VALUES (1542, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:33:09');
INSERT INTO `bitacora` VALUES (1543, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:33:15');
INSERT INTO `bitacora` VALUES (1544, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:33:34');
INSERT INTO `bitacora` VALUES (1545, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:33:44');
INSERT INTO `bitacora` VALUES (1546, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:34:11');
INSERT INTO `bitacora` VALUES (1547, '/rol/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:34:14');
INSERT INTO `bitacora` VALUES (1548, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:36:21');
INSERT INTO `bitacora` VALUES (1549, '/rol/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:36:23');
INSERT INTO `bitacora` VALUES (1550, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 10:36:41');
INSERT INTO `bitacora` VALUES (1551, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:24:44');
INSERT INTO `bitacora` VALUES (1552, '/profesiones/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:24:45');
INSERT INTO `bitacora` VALUES (1553, '/profesiones/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"name\":\"Ama de casa\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:24:49');
INSERT INTO `bitacora` VALUES (1554, '/rol', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:24:49');
INSERT INTO `bitacora` VALUES (1555, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:24:55');
INSERT INTO `bitacora` VALUES (1556, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:26');
INSERT INTO `bitacora` VALUES (1557, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:41');
INSERT INTO `bitacora` VALUES (1558, '/profesiones/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:42');
INSERT INTO `bitacora` VALUES (1559, '/profesiones/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:52');
INSERT INTO `bitacora` VALUES (1560, '/profesiones/put', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"PUT\",\"id\":\"1\",\"name\":\"Ama de casa s\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:54');
INSERT INTO `bitacora` VALUES (1561, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:25:55');
INSERT INTO `bitacora` VALUES (1562, '/profesiones/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:00');
INSERT INTO `bitacora` VALUES (1563, '/profesiones/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"name\":\"Ing. Informatica\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:10');
INSERT INTO `bitacora` VALUES (1564, '/profesiones/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:31');
INSERT INTO `bitacora` VALUES (1565, '/profesiones/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"name\":\"error_log\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:41');
INSERT INTO `bitacora` VALUES (1566, '/profesiones/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"name\":\"error_log\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:43');
INSERT INTO `bitacora` VALUES (1567, '/profesiones/add', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"name\":\"error_log\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:43');
INSERT INTO `bitacora` VALUES (1568, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:43');
INSERT INTO `bitacora` VALUES (1569, '/profesiones/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:53');
INSERT INTO `bitacora` VALUES (1570, '/profesiones/put', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"PUT\",\"id\":\"3\",\"name\":\"error_log ss\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:56');
INSERT INTO `bitacora` VALUES (1571, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:26:56');
INSERT INTO `bitacora` VALUES (1572, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:27:49');
INSERT INTO `bitacora` VALUES (1573, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:27:52');
INSERT INTO `bitacora` VALUES (1574, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:30:27');
INSERT INTO `bitacora` VALUES (1575, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:30:52');
INSERT INTO `bitacora` VALUES (1576, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:34:13');
INSERT INTO `bitacora` VALUES (1577, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:34:26');
INSERT INTO `bitacora` VALUES (1578, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:34:32');
INSERT INTO `bitacora` VALUES (1579, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:35:11');
INSERT INTO `bitacora` VALUES (1580, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:36:23');
INSERT INTO `bitacora` VALUES (1581, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:36:47');
INSERT INTO `bitacora` VALUES (1582, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:37:29');
INSERT INTO `bitacora` VALUES (1583, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:38:02');
INSERT INTO `bitacora` VALUES (1584, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:38:25');
INSERT INTO `bitacora` VALUES (1585, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:38:40');
INSERT INTO `bitacora` VALUES (1586, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:38:46');
INSERT INTO `bitacora` VALUES (1587, '/clientes/put', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"2\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:39:16');
INSERT INTO `bitacora` VALUES (1588, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:39:16');
INSERT INTO `bitacora` VALUES (1589, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:41:44');
INSERT INTO `bitacora` VALUES (1590, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:41:47');
INSERT INTO `bitacora` VALUES (1591, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:02');
INSERT INTO `bitacora` VALUES (1592, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:06');
INSERT INTO `bitacora` VALUES (1593, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:08');
INSERT INTO `bitacora` VALUES (1594, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:18');
INSERT INTO `bitacora` VALUES (1595, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:19');
INSERT INTO `bitacora` VALUES (1596, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:45');
INSERT INTO `bitacora` VALUES (1597, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:49');
INSERT INTO `bitacora` VALUES (1598, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:42:51');
INSERT INTO `bitacora` VALUES (1599, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:10');
INSERT INTO `bitacora` VALUES (1600, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:14');
INSERT INTO `bitacora` VALUES (1601, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:16');
INSERT INTO `bitacora` VALUES (1602, '/clientes/put', '{\"_token\":\"hB1HNNVUwG1iGs1rv7uKHWqLykTuDwdh5nIsS4dC\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"4\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:22');
INSERT INTO `bitacora` VALUES (1603, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:22');
INSERT INTO `bitacora` VALUES (1604, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:43:25');
INSERT INTO `bitacora` VALUES (1605, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:45:08');
INSERT INTO `bitacora` VALUES (1606, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:45:09');
INSERT INTO `bitacora` VALUES (1607, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:45:28');
INSERT INTO `bitacora` VALUES (1608, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:45:54');
INSERT INTO `bitacora` VALUES (1609, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 11:46:44');
INSERT INTO `bitacora` VALUES (1610, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:20:45');
INSERT INTO `bitacora` VALUES (1611, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:20:50');
INSERT INTO `bitacora` VALUES (1612, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:20:52');
INSERT INTO `bitacora` VALUES (1613, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:21:22');
INSERT INTO `bitacora` VALUES (1614, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:21:31');
INSERT INTO `bitacora` VALUES (1615, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:21:34');
INSERT INTO `bitacora` VALUES (1616, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:22:29');
INSERT INTO `bitacora` VALUES (1617, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:22:46');
INSERT INTO `bitacora` VALUES (1618, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:23:37');
INSERT INTO `bitacora` VALUES (1619, '/clientes/put', '{\"_token\":\"VKRenCLw1xSGYW7rN1PBLkL3llG4talhPnsjqJhu\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"1\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:23:43');
INSERT INTO `bitacora` VALUES (1620, '/clientes/put', '{\"_token\":\"VKRenCLw1xSGYW7rN1PBLkL3llG4talhPnsjqJhu\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"1\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:24:51');
INSERT INTO `bitacora` VALUES (1621, '/clientes/put', '{\"_token\":\"VKRenCLw1xSGYW7rN1PBLkL3llG4talhPnsjqJhu\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"1\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:25:12');
INSERT INTO `bitacora` VALUES (1622, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:25:12');
INSERT INTO `bitacora` VALUES (1623, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:25:15');
INSERT INTO `bitacora` VALUES (1624, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:25:56');
INSERT INTO `bitacora` VALUES (1625, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:59:50');
INSERT INTO `bitacora` VALUES (1626, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 15:59:58');
INSERT INTO `bitacora` VALUES (1627, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-09-29 16:00:02');
INSERT INTO `bitacora` VALUES (1628, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 14:13:33');
INSERT INTO `bitacora` VALUES (1629, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 14:13:37');
INSERT INTO `bitacora` VALUES (1630, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 14:13:42');
INSERT INTO `bitacora` VALUES (1631, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 14:14:38');
INSERT INTO `bitacora` VALUES (1632, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 14:15:15');
INSERT INTO `bitacora` VALUES (1633, '/clientes/put', '{\"_token\":\"d4C6EE4kIxBJ3ka6RA6tgZ8AJljp9OPFbhWcERkA\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"2\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 15:19:01');
INSERT INTO `bitacora` VALUES (1634, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 15:19:01');
INSERT INTO `bitacora` VALUES (1635, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 15:19:03');
INSERT INTO `bitacora` VALUES (1636, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:45:50');
INSERT INTO `bitacora` VALUES (1637, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:45:53');
INSERT INTO `bitacora` VALUES (1638, '/alerts/client/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:45:55');
INSERT INTO `bitacora` VALUES (1639, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:46:05');
INSERT INTO `bitacora` VALUES (1640, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:46:08');
INSERT INTO `bitacora` VALUES (1641, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:46:10');
INSERT INTO `bitacora` VALUES (1642, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:49:36');
INSERT INTO `bitacora` VALUES (1643, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:49:38');
INSERT INTO `bitacora` VALUES (1644, '/clientes/put', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"5\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:49:44');
INSERT INTO `bitacora` VALUES (1645, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:49:44');
INSERT INTO `bitacora` VALUES (1646, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:50:20');
INSERT INTO `bitacora` VALUES (1647, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:50:36');
INSERT INTO `bitacora` VALUES (1648, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 17:50:37');
INSERT INTO `bitacora` VALUES (1649, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:06:33');
INSERT INTO `bitacora` VALUES (1650, '/clientes/put', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"2\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:06:39');
INSERT INTO `bitacora` VALUES (1651, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:06:39');
INSERT INTO `bitacora` VALUES (1652, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:06:41');
INSERT INTO `bitacora` VALUES (1653, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:06:57');
INSERT INTO `bitacora` VALUES (1654, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:07:09');
INSERT INTO `bitacora` VALUES (1655, '/clientes/put', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo Marquez\",\"genero\":\"1\",\"fecha_nacimiento\":\"1987-05-12\",\"dui_cliente\":\"03731671-8\",\"dui_extendido\":\"San Francisco Gotera\",\"fecha_expedicion\":\"2020-05-12\",\"telefono\":\"2654-1561\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"estado_civil\":\"Soltero\",\"profesion_id\":\"2\",\"direccion_personal\":\"San Miguel\",\"nombre_negocio\":\"CompuTec\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:07:11');
INSERT INTO `bitacora` VALUES (1656, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:07:11');
INSERT INTO `bitacora` VALUES (1657, '/clientes/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:07:29');
INSERT INTO `bitacora` VALUES (1658, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:08:35');
INSERT INTO `bitacora` VALUES (1659, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:08:37');
INSERT INTO `bitacora` VALUES (1660, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:08:39');
INSERT INTO `bitacora` VALUES (1661, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:28');
INSERT INTO `bitacora` VALUES (1662, '/clientes/delete', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"DELETE\",\"id\":\"1\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:38');
INSERT INTO `bitacora` VALUES (1663, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:38');
INSERT INTO `bitacora` VALUES (1664, '/clientes/delete', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"DELETE\",\"id\":\"1\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:42');
INSERT INTO `bitacora` VALUES (1665, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:42');
INSERT INTO `bitacora` VALUES (1666, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:24:46');
INSERT INTO `bitacora` VALUES (1667, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:25:13');
INSERT INTO `bitacora` VALUES (1668, '/asociados/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:25:24');
INSERT INTO `bitacora` VALUES (1669, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:26:59');
INSERT INTO `bitacora` VALUES (1670, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:27:02');
INSERT INTO `bitacora` VALUES (1671, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:27:03');
INSERT INTO `bitacora` VALUES (1672, '/reportes/contrato/148', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:27:08');
INSERT INTO `bitacora` VALUES (1673, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:27:30');
INSERT INTO `bitacora` VALUES (1674, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:27:31');
INSERT INTO `bitacora` VALUES (1675, '/clientes/add', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"nombre\":\"LORENA YAMILETH CHAVARRIA URRUTUIA\",\"genero\":\"0\",\"fecha_nacimiento\":\"1985-02-07\",\"dui_cliente\":\"037457783\",\"dui_extendido\":\"San Miguel\",\"fecha_expedicion\":\"2020-02-12\",\"telefono\":\"78944554\",\"nacionalidad\":\"SALVADORE\\u00d1A\",\"estado_civil\":\"SOLTERA\",\"profesion_id\":\"1\",\"direccion_personal\":\"BARRIO CONCEPCION, 23 CALLE OTE PSE MERLIOT, SAN MIGUEL\",\"nombre_negocio\":\"VENTA DE FRUTAS Y VERDURA\",\"direccion_negocio\":null,\"tipo_vivienda\":\"0\",\"observaciones\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:31:00');
INSERT INTO `bitacora` VALUES (1676, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:31:00');
INSERT INTO `bitacora` VALUES (1677, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:31:03');
INSERT INTO `bitacora` VALUES (1678, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:31:04');
INSERT INTO `bitacora` VALUES (1679, '/asociados/add', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"numero_asociado\":\"0000000002\",\"id_cliente\":\"2\",\"fecha_ingreso\":\"2024-05-12\",\"sueldo_quincenal\":\"448\",\"sueldo_mensual\":\"897\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"0\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":\"1\",\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:32:32');
INSERT INTO `bitacora` VALUES (1680, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:32:32');
INSERT INTO `bitacora` VALUES (1681, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:33:03');
INSERT INTO `bitacora` VALUES (1682, '/reportes/RepEstadoCuenta/143', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:33:15');
INSERT INTO `bitacora` VALUES (1683, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:33:15');
INSERT INTO `bitacora` VALUES (1684, '/cuentas/listarMovimientosSinImprirmir/147', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:36:41');
INSERT INTO `bitacora` VALUES (1685, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:18');
INSERT INTO `bitacora` VALUES (1686, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:26');
INSERT INTO `bitacora` VALUES (1687, '/asociados/delete', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"_method\":\"DELETE\",\"id\":\"2\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:32');
INSERT INTO `bitacora` VALUES (1688, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:33');
INSERT INTO `bitacora` VALUES (1689, '/asociados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:34');
INSERT INTO `bitacora` VALUES (1690, '/asociados/add', '{\"_token\":\"C0PxoMqGS8h26i8qECxMGi3deuVJuJhUlPVMuBev\",\"numero_asociado\":\"0000000002\",\"id_cliente\":\"2\",\"fecha_ingreso\":\"2024-10-04\",\"sueldo_quincenal\":\"448.5\",\"sueldo_mensual\":\"897\",\"otros_ingresos\":\"0\",\"dependientes_economicamente\":\"0\",\"couta_ingreso\":\"10\",\"monto_aportacion\":\"10\",\"referencia_asociado_uno\":\"1\",\"referencia_asociado_dos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:56');
INSERT INTO `bitacora` VALUES (1691, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:56');
INSERT INTO `bitacora` VALUES (1692, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:55:59');
INSERT INTO `bitacora` VALUES (1693, '/libretas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:03');
INSERT INTO `bitacora` VALUES (1694, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:04');
INSERT INTO `bitacora` VALUES (1695, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:08');
INSERT INTO `bitacora` VALUES (1696, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:10');
INSERT INTO `bitacora` VALUES (1697, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:13');
INSERT INTO `bitacora` VALUES (1698, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 18:56:14');
INSERT INTO `bitacora` VALUES (1699, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:00:11');
INSERT INTO `bitacora` VALUES (1700, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:00:16');
INSERT INTO `bitacora` VALUES (1701, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:00:18');
INSERT INTO `bitacora` VALUES (1702, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:19:32');
INSERT INTO `bitacora` VALUES (1703, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:19:34');
INSERT INTO `bitacora` VALUES (1704, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:22:18');
INSERT INTO `bitacora` VALUES (1705, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:23:28');
INSERT INTO `bitacora` VALUES (1706, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:23:30');
INSERT INTO `bitacora` VALUES (1707, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:23:38');
INSERT INTO `bitacora` VALUES (1708, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:25:11');
INSERT INTO `bitacora` VALUES (1709, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:25:13');
INSERT INTO `bitacora` VALUES (1710, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:25:36');
INSERT INTO `bitacora` VALUES (1711, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:25:59');
INSERT INTO `bitacora` VALUES (1712, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:30:11');
INSERT INTO `bitacora` VALUES (1713, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:30:26');
INSERT INTO `bitacora` VALUES (1714, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:31:03');
INSERT INTO `bitacora` VALUES (1715, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:38:18');
INSERT INTO `bitacora` VALUES (1716, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:38:37');
INSERT INTO `bitacora` VALUES (1717, '/clientes/solcitud-ingreso/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:40:24');
INSERT INTO `bitacora` VALUES (1718, '/clientes/solcitud-ingreso/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:42:58');
INSERT INTO `bitacora` VALUES (1719, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:43:04');
INSERT INTO `bitacora` VALUES (1720, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:43:19');
INSERT INTO `bitacora` VALUES (1721, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:43:28');
INSERT INTO `bitacora` VALUES (1722, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:43:53');
INSERT INTO `bitacora` VALUES (1723, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:44:02');
INSERT INTO `bitacora` VALUES (1724, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:48:33');
INSERT INTO `bitacora` VALUES (1725, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:51:31');
INSERT INTO `bitacora` VALUES (1726, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:51:55');
INSERT INTO `bitacora` VALUES (1727, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:52:06');
INSERT INTO `bitacora` VALUES (1728, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:52:23');
INSERT INTO `bitacora` VALUES (1729, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:52:58');
INSERT INTO `bitacora` VALUES (1730, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:53:08');
INSERT INTO `bitacora` VALUES (1731, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:53:35');
INSERT INTO `bitacora` VALUES (1732, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 19:53:44');
INSERT INTO `bitacora` VALUES (1733, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:18:27');
INSERT INTO `bitacora` VALUES (1734, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:18:49');
INSERT INTO `bitacora` VALUES (1735, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:18:57');
INSERT INTO `bitacora` VALUES (1736, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:19:06');
INSERT INTO `bitacora` VALUES (1737, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:20:30');
INSERT INTO `bitacora` VALUES (1738, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:20:50');
INSERT INTO `bitacora` VALUES (1739, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:21:25');
INSERT INTO `bitacora` VALUES (1740, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:21:29');
INSERT INTO `bitacora` VALUES (1741, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:22:15');
INSERT INTO `bitacora` VALUES (1742, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:22:35');
INSERT INTO `bitacora` VALUES (1743, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:30:22');
INSERT INTO `bitacora` VALUES (1744, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:30:30');
INSERT INTO `bitacora` VALUES (1745, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:31:11');
INSERT INTO `bitacora` VALUES (1746, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:34:22');
INSERT INTO `bitacora` VALUES (1747, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:35:02');
INSERT INTO `bitacora` VALUES (1748, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:35:31');
INSERT INTO `bitacora` VALUES (1749, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:35:55');
INSERT INTO `bitacora` VALUES (1750, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:36:13');
INSERT INTO `bitacora` VALUES (1751, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:36:30');
INSERT INTO `bitacora` VALUES (1752, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:37:21');
INSERT INTO `bitacora` VALUES (1753, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:38:00');
INSERT INTO `bitacora` VALUES (1754, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:38:13');
INSERT INTO `bitacora` VALUES (1755, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:39:39');
INSERT INTO `bitacora` VALUES (1756, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:39:59');
INSERT INTO `bitacora` VALUES (1757, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:40:20');
INSERT INTO `bitacora` VALUES (1758, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:42:14');
INSERT INTO `bitacora` VALUES (1759, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:44:46');
INSERT INTO `bitacora` VALUES (1760, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:45:26');
INSERT INTO `bitacora` VALUES (1761, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:45:32');
INSERT INTO `bitacora` VALUES (1762, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:46:23');
INSERT INTO `bitacora` VALUES (1763, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:47:16');
INSERT INTO `bitacora` VALUES (1764, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:47:56');
INSERT INTO `bitacora` VALUES (1765, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:49:40');
INSERT INTO `bitacora` VALUES (1766, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:49:57');
INSERT INTO `bitacora` VALUES (1767, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:50:27');
INSERT INTO `bitacora` VALUES (1768, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:50:50');
INSERT INTO `bitacora` VALUES (1769, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:51:27');
INSERT INTO `bitacora` VALUES (1770, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:52:36');
INSERT INTO `bitacora` VALUES (1771, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:52:47');
INSERT INTO `bitacora` VALUES (1772, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:53:04');
INSERT INTO `bitacora` VALUES (1773, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:53:13');
INSERT INTO `bitacora` VALUES (1774, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:53:29');
INSERT INTO `bitacora` VALUES (1775, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:54:17');
INSERT INTO `bitacora` VALUES (1776, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:54:49');
INSERT INTO `bitacora` VALUES (1777, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:55:29');
INSERT INTO `bitacora` VALUES (1778, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:55:33');
INSERT INTO `bitacora` VALUES (1779, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:56:52');
INSERT INTO `bitacora` VALUES (1780, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:57:48');
INSERT INTO `bitacora` VALUES (1781, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:58:29');
INSERT INTO `bitacora` VALUES (1782, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:59:10');
INSERT INTO `bitacora` VALUES (1783, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 20:59:30');
INSERT INTO `bitacora` VALUES (1784, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:00:07');
INSERT INTO `bitacora` VALUES (1785, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:00:57');
INSERT INTO `bitacora` VALUES (1786, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:01:56');
INSERT INTO `bitacora` VALUES (1787, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:02:40');
INSERT INTO `bitacora` VALUES (1788, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:04:24');
INSERT INTO `bitacora` VALUES (1789, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:06:01');
INSERT INTO `bitacora` VALUES (1790, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:06:28');
INSERT INTO `bitacora` VALUES (1791, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:06:44');
INSERT INTO `bitacora` VALUES (1792, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:07:25');
INSERT INTO `bitacora` VALUES (1793, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:08:04');
INSERT INTO `bitacora` VALUES (1794, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:09:16');
INSERT INTO `bitacora` VALUES (1795, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:09:32');
INSERT INTO `bitacora` VALUES (1796, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:09:48');
INSERT INTO `bitacora` VALUES (1797, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:10:32');
INSERT INTO `bitacora` VALUES (1798, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:11:25');
INSERT INTO `bitacora` VALUES (1799, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:11:36');
INSERT INTO `bitacora` VALUES (1800, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-04 21:13:14');
INSERT INTO `bitacora` VALUES (1801, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:43:08');
INSERT INTO `bitacora` VALUES (1802, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:43:10');
INSERT INTO `bitacora` VALUES (1803, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:43:28');
INSERT INTO `bitacora` VALUES (1804, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:44:16');
INSERT INTO `bitacora` VALUES (1805, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:44:32');
INSERT INTO `bitacora` VALUES (1806, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:45:44');
INSERT INTO `bitacora` VALUES (1807, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:48:21');
INSERT INTO `bitacora` VALUES (1808, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:48:55');
INSERT INTO `bitacora` VALUES (1809, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:49:14');
INSERT INTO `bitacora` VALUES (1810, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:50:32');
INSERT INTO `bitacora` VALUES (1811, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:51:49');
INSERT INTO `bitacora` VALUES (1812, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:52:52');
INSERT INTO `bitacora` VALUES (1813, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:53:50');
INSERT INTO `bitacora` VALUES (1814, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:54:15');
INSERT INTO `bitacora` VALUES (1815, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:54:33');
INSERT INTO `bitacora` VALUES (1816, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:54:43');
INSERT INTO `bitacora` VALUES (1817, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:55:17');
INSERT INTO `bitacora` VALUES (1818, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:56:04');
INSERT INTO `bitacora` VALUES (1819, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:56:27');
INSERT INTO `bitacora` VALUES (1820, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:56:38');
INSERT INTO `bitacora` VALUES (1821, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:57:11');
INSERT INTO `bitacora` VALUES (1822, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:57:38');
INSERT INTO `bitacora` VALUES (1823, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:57:50');
INSERT INTO `bitacora` VALUES (1824, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 07:58:55');
INSERT INTO `bitacora` VALUES (1825, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:04:15');
INSERT INTO `bitacora` VALUES (1826, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:04:29');
INSERT INTO `bitacora` VALUES (1827, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:04:43');
INSERT INTO `bitacora` VALUES (1828, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:04:54');
INSERT INTO `bitacora` VALUES (1829, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:05:05');
INSERT INTO `bitacora` VALUES (1830, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:05:14');
INSERT INTO `bitacora` VALUES (1831, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:05:26');
INSERT INTO `bitacora` VALUES (1832, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:05:36');
INSERT INTO `bitacora` VALUES (1833, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:05:49');
INSERT INTO `bitacora` VALUES (1834, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:06:00');
INSERT INTO `bitacora` VALUES (1835, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:06:19');
INSERT INTO `bitacora` VALUES (1836, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:06:29');
INSERT INTO `bitacora` VALUES (1837, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:06:38');
INSERT INTO `bitacora` VALUES (1838, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:06:46');
INSERT INTO `bitacora` VALUES (1839, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:07:14');
INSERT INTO `bitacora` VALUES (1840, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:07:26');
INSERT INTO `bitacora` VALUES (1841, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:07:37');
INSERT INTO `bitacora` VALUES (1842, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:07:48');
INSERT INTO `bitacora` VALUES (1843, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:08:12');
INSERT INTO `bitacora` VALUES (1844, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:08:26');
INSERT INTO `bitacora` VALUES (1845, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:08:39');
INSERT INTO `bitacora` VALUES (1846, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:08:48');
INSERT INTO `bitacora` VALUES (1847, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:09:13');
INSERT INTO `bitacora` VALUES (1848, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:09:48');
INSERT INTO `bitacora` VALUES (1849, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:10:13');
INSERT INTO `bitacora` VALUES (1850, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:10:39');
INSERT INTO `bitacora` VALUES (1851, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:11:22');
INSERT INTO `bitacora` VALUES (1852, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:11:42');
INSERT INTO `bitacora` VALUES (1853, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:12:18');
INSERT INTO `bitacora` VALUES (1854, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:12:31');
INSERT INTO `bitacora` VALUES (1855, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:12:58');
INSERT INTO `bitacora` VALUES (1856, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:55:37');
INSERT INTO `bitacora` VALUES (1857, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:55:48');
INSERT INTO `bitacora` VALUES (1858, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:56:21');
INSERT INTO `bitacora` VALUES (1859, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:57:35');
INSERT INTO `bitacora` VALUES (1860, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:58:00');
INSERT INTO `bitacora` VALUES (1861, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:58:37');
INSERT INTO `bitacora` VALUES (1862, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:58:51');
INSERT INTO `bitacora` VALUES (1863, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:59:04');
INSERT INTO `bitacora` VALUES (1864, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:59:28');
INSERT INTO `bitacora` VALUES (1865, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:59:40');
INSERT INTO `bitacora` VALUES (1866, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 08:59:56');
INSERT INTO `bitacora` VALUES (1867, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 09:00:05');
INSERT INTO `bitacora` VALUES (1868, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 09:00:17');
INSERT INTO `bitacora` VALUES (1869, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 09:00:31');
INSERT INTO `bitacora` VALUES (1870, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:34:49');
INSERT INTO `bitacora` VALUES (1871, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:35:36');
INSERT INTO `bitacora` VALUES (1872, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:40:03');
INSERT INTO `bitacora` VALUES (1873, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:40:25');
INSERT INTO `bitacora` VALUES (1874, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:41:13');
INSERT INTO `bitacora` VALUES (1875, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:41:27');
INSERT INTO `bitacora` VALUES (1876, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:42:04');
INSERT INTO `bitacora` VALUES (1877, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:42:10');
INSERT INTO `bitacora` VALUES (1878, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:42:36');
INSERT INTO `bitacora` VALUES (1879, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:43:30');
INSERT INTO `bitacora` VALUES (1880, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:43:51');
INSERT INTO `bitacora` VALUES (1881, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:44:27');
INSERT INTO `bitacora` VALUES (1882, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:44:40');
INSERT INTO `bitacora` VALUES (1883, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:45:54');
INSERT INTO `bitacora` VALUES (1884, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:46:22');
INSERT INTO `bitacora` VALUES (1885, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:46:58');
INSERT INTO `bitacora` VALUES (1886, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:47:18');
INSERT INTO `bitacora` VALUES (1887, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:47:55');
INSERT INTO `bitacora` VALUES (1888, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:48:25');
INSERT INTO `bitacora` VALUES (1889, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:48:48');
INSERT INTO `bitacora` VALUES (1890, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:49:03');
INSERT INTO `bitacora` VALUES (1891, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:49:29');
INSERT INTO `bitacora` VALUES (1892, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:49:55');
INSERT INTO `bitacora` VALUES (1893, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:50:11');
INSERT INTO `bitacora` VALUES (1894, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:50:29');
INSERT INTO `bitacora` VALUES (1895, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:51:38');
INSERT INTO `bitacora` VALUES (1896, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:54:44');
INSERT INTO `bitacora` VALUES (1897, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:54:58');
INSERT INTO `bitacora` VALUES (1898, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:55:14');
INSERT INTO `bitacora` VALUES (1899, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:55:26');
INSERT INTO `bitacora` VALUES (1900, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:55:40');
INSERT INTO `bitacora` VALUES (1901, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:55:44');
INSERT INTO `bitacora` VALUES (1902, '/clientes/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:55:47');
INSERT INTO `bitacora` VALUES (1903, '/clientes/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:57:12');
INSERT INTO `bitacora` VALUES (1904, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:57:18');
INSERT INTO `bitacora` VALUES (1905, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:57:19');
INSERT INTO `bitacora` VALUES (1906, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:57:37');
INSERT INTO `bitacora` VALUES (1907, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:58:06');
INSERT INTO `bitacora` VALUES (1908, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:58:18');
INSERT INTO `bitacora` VALUES (1909, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:58:43');
INSERT INTO `bitacora` VALUES (1910, '/clientes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 10:59:03');
INSERT INTO `bitacora` VALUES (1911, '/clientes/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:28');
INSERT INTO `bitacora` VALUES (1912, '/clientes/put', '{\"_token\":\"Wh5xEQyhFI1BiWG3WSZhfKK2k70pNCkIqh2pVZdt\",\"_method\":\"PUT\",\"id\":\"2\",\"nombre\":\"LORENA YAMILETH CHAVARRIA URRUTUIA\",\"genero\":\"0\",\"fecha_nacimiento\":\"1985-02-07\",\"dui_cliente\":\"037457783\",\"dui_extendido\":\"San Miguel\",\"fecha_expedicion\":\"2020-02-12\",\"telefono\":\"78944554\",\"nacionalidad\":\"SALVADORE\\u00d1A\",\"estado_civil\":\"SOLTERA\",\"conyugue\":\"Luis marquez\",\"profesion_id\":\"1\",\"direccion_personal\":\"BARRIO CONCEPCION, 23 CALLE OTE PSE MERLIOT, SAN MIGUEL\",\"nombre_negocio\":\"VENTA DE FRUTAS Y VERDURA\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":null}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:33');
INSERT INTO `bitacora` VALUES (1913, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:33');
INSERT INTO `bitacora` VALUES (1914, '/alerts/client/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:35');
INSERT INTO `bitacora` VALUES (1915, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:39');
INSERT INTO `bitacora` VALUES (1916, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:42');
INSERT INTO `bitacora` VALUES (1917, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:56');
INSERT INTO `bitacora` VALUES (1918, '/asociados/put', '{\"_token\":\"Wh5xEQyhFI1BiWG3WSZhfKK2k70pNCkIqh2pVZdt\",\"_method\":\"PUT\",\"id\":\"3\",\"id_cliente\":\"2\",\"fecha_ingreso\":\"2024-10-04\",\"sueldo_quincenal\":\"448.50\",\"sueldo_mensual\":\"897.00\",\"otros_ingresos\":\"0.00\",\"dependientes_economicamente\":\"0\",\"couta_ingreso\":\"10.00\",\"monto_aportacion\":\"10.00\",\"referencia_asociado_uno\":\"1\",\"referencia_asociado_dos\":null,\"estado_solicitud\":\"2\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:59');
INSERT INTO `bitacora` VALUES (1919, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:00:59');
INSERT INTO `bitacora` VALUES (1920, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-05 11:01:02');
INSERT INTO `bitacora` VALUES (1921, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 08:06:07');
INSERT INTO `bitacora` VALUES (1922, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 10:59:24');
INSERT INTO `bitacora` VALUES (1923, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 10:59:27');
INSERT INTO `bitacora` VALUES (1924, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 10:59:30');
INSERT INTO `bitacora` VALUES (1925, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 11:00:10');
INSERT INTO `bitacora` VALUES (1926, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 12:25:53');
INSERT INTO `bitacora` VALUES (1927, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 12:25:57');
INSERT INTO `bitacora` VALUES (1928, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 12:27:05');
INSERT INTO `bitacora` VALUES (1929, '/clientes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 12:27:13');
INSERT INTO `bitacora` VALUES (1930, '/clientes/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 12:27:15');
INSERT INTO `bitacora` VALUES (1931, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:03:40');
INSERT INTO `bitacora` VALUES (1932, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:04:02');
INSERT INTO `bitacora` VALUES (1933, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:04:46');
INSERT INTO `bitacora` VALUES (1934, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:08:03');
INSERT INTO `bitacora` VALUES (1935, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:08:21');
INSERT INTO `bitacora` VALUES (1936, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:09:24');
INSERT INTO `bitacora` VALUES (1937, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:10:08');
INSERT INTO `bitacora` VALUES (1938, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:10:31');
INSERT INTO `bitacora` VALUES (1939, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:10:53');
INSERT INTO `bitacora` VALUES (1940, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:05');
INSERT INTO `bitacora` VALUES (1941, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:11');
INSERT INTO `bitacora` VALUES (1942, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:12');
INSERT INTO `bitacora` VALUES (1943, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:12');
INSERT INTO `bitacora` VALUES (1944, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:14');
INSERT INTO `bitacora` VALUES (1945, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:17');
INSERT INTO `bitacora` VALUES (1946, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:32');
INSERT INTO `bitacora` VALUES (1947, '/boveda/aperturar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:33');
INSERT INTO `bitacora` VALUES (1948, '/boveda/realizarAperturaBobeda', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_bobeda\":\"2\",\"monto\":\"50135.00\",\"id_empleado\":\"9\",\"observacion\":\"inicio de oepraciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:42');
INSERT INTO `bitacora` VALUES (1949, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:42');
INSERT INTO `bitacora` VALUES (1950, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:45');
INSERT INTO `bitacora` VALUES (1951, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:46');
INSERT INTO `bitacora` VALUES (1952, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:47');
INSERT INTO `bitacora` VALUES (1953, '/apertura/aperturarcaja', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_bobeda_movimiento\":null,\"id_caja\":\"1\",\"monto_apertura\":null,\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:51');
INSERT INTO `bitacora` VALUES (1954, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:52');
INSERT INTO `bitacora` VALUES (1955, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:57');
INSERT INTO `bitacora` VALUES (1956, '/boveda/transferir/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:11:59');
INSERT INTO `bitacora` VALUES (1957, '/boveda/realizarTraslado', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"_method\":\"POST\",\"id_bobeda\":\"2\",\"tipo_operacion\":\"1\",\"id_caja\":\"1\",\"monto\":\"500\",\"id_empleado\":\"9\",\"observacion\":\"Inico de oepraciones\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:09');
INSERT INTO `bitacora` VALUES (1958, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:10');
INSERT INTO `bitacora` VALUES (1959, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:14');
INSERT INTO `bitacora` VALUES (1960, '/apertura/aperturarcaja', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:15');
INSERT INTO `bitacora` VALUES (1961, '/apertura/gettraslado/1', '{\"id\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:17');
INSERT INTO `bitacora` VALUES (1962, '/apertura/aperturarcaja', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_bobeda_movimiento\":\"2\",\"id_caja\":\"1\",\"monto_apertura\":\"500.00\",\"id_empleado\":\"9\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:18');
INSERT INTO `bitacora` VALUES (1963, '/apertura', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:18');
INSERT INTO `bitacora` VALUES (1964, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:23');
INSERT INTO `bitacora` VALUES (1965, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:24');
INSERT INTO `bitacora` VALUES (1966, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:34');
INSERT INTO `bitacora` VALUES (1967, '/cuentas/add', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_caja\":\"1\",\"id_asociado\":\"3\",\"fecha_apertura\":\"2024-10-06\",\"id_tipo_cuenta\":\"1\",\"id_interes_tipo_cuenta\":\"14\",\"numero_cuenta\":\"0000000001\",\"monto_apertura\":\"10\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:41');
INSERT INTO `bitacora` VALUES (1968, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:12:42');
INSERT INTO `bitacora` VALUES (1969, '/declare/1/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:13:10');
INSERT INTO `bitacora` VALUES (1970, '/declare/add', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"_method\":\"POST\",\"id_cuenta\":\"1\",\"id_cliente\":\"2\",\"declaracion_id\":null,\"n_depositos\":\"10\",\"val_prom_depositos\":\"10\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"0\",\"val_prom_retiros\":\"0\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Salarios\",\"otro_origen_fondos\":null,\"comprobante_procedencia_fondo\":\"Constancia de Salarios\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:13:17');
INSERT INTO `bitacora` VALUES (1971, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:13:17');
INSERT INTO `bitacora` VALUES (1972, '/declare/1/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:13:19');
INSERT INTO `bitacora` VALUES (1973, '/reportes/contrato/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:14:37');
INSERT INTO `bitacora` VALUES (1974, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:16:49');
INSERT INTO `bitacora` VALUES (1975, '/asociados/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:16:53');
INSERT INTO `bitacora` VALUES (1976, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:16:55');
INSERT INTO `bitacora` VALUES (1977, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:16:57');
INSERT INTO `bitacora` VALUES (1978, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:16:59');
INSERT INTO `bitacora` VALUES (1979, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:17:10');
INSERT INTO `bitacora` VALUES (1980, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:17:42');
INSERT INTO `bitacora` VALUES (1981, '/cuentas/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:17:43');
INSERT INTO `bitacora` VALUES (1982, '/intereses/getIntereses/1', '{\"opcion_seleccionada\":\"1\"}', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:18:32');
INSERT INTO `bitacora` VALUES (1983, '/cuentas/add', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_caja\":\"1\",\"id_asociado\":\"3\",\"fecha_apertura\":\"2023-10-19\",\"id_tipo_cuenta\":\"1\",\"id_interes_tipo_cuenta\":\"14\",\"numero_cuenta\":\"000000000114\",\"monto_apertura\":\"5\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:18:45');
INSERT INTO `bitacora` VALUES (1984, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:18:45');
INSERT INTO `bitacora` VALUES (1985, '/declare/2/new', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:18:48');
INSERT INTO `bitacora` VALUES (1986, '/declare/add', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"_method\":\"POST\",\"id_cuenta\":\"2\",\"id_cliente\":\"2\",\"declaracion_id\":null,\"n_depositos\":\"0\",\"val_prom_depositos\":\"0\",\"depo_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"n_retiros\":\"0\",\"val_prom_retiros\":\"0\",\"ret_tipo\":\"Ambos\\r\\n                                        (Cheque\\r\\n                                        y\\/o Efectivo)\",\"origen_fondos\":\"Salarios\",\"otro_origen_fondos\":null,\"comprobante_procedencia_fondo\":\"Constancia de Salarios\",\"otro_comprobante_fondos\":null}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:19:37');
INSERT INTO `bitacora` VALUES (1987, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:19:37');
INSERT INTO `bitacora` VALUES (1988, '/declare/2/pdf', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:19:39');
INSERT INTO `bitacora` VALUES (1989, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:20:24');
INSERT INTO `bitacora` VALUES (1990, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:20:31');
INSERT INTO `bitacora` VALUES (1991, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:20:35');
INSERT INTO `bitacora` VALUES (1992, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:20:37');
INSERT INTO `bitacora` VALUES (1993, '/beneficiarios/add', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"id_asociado\":\"3\",\"id_cuenta\":\"2\",\"parentesco\":\"14\",\"nombre\":\"MARHA ALICIA JANDRES URRUTIA\",\"porcentaje\":\"100\",\"direccion\":\"SM\",\"telefono\":\"0000000\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:12');
INSERT INTO `bitacora` VALUES (1994, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:12');
INSERT INTO `bitacora` VALUES (1995, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:15');
INSERT INTO `bitacora` VALUES (1996, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:22');
INSERT INTO `bitacora` VALUES (1997, '/configuracion', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:32');
INSERT INTO `bitacora` VALUES (1998, '/boveda', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:36');
INSERT INTO `bitacora` VALUES (1999, '/temp/generateTempPassword', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:39');
INSERT INTO `bitacora` VALUES (2000, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:46');
INSERT INTO `bitacora` VALUES (2001, '/temp/validatePassword/IySQO', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:49');
INSERT INTO `bitacora` VALUES (2002, '/movimientos/anularmovimiento', '{\"_token\":\"rraTKeI6ZYffBcRlcz6BUQlK2OzcHf2tTXmlQPaP\",\"_method\":\"POST\",\"id\":\"2\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:49');
INSERT INTO `bitacora` VALUES (2003, '/movimientos', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:21:57');
INSERT INTO `bitacora` VALUES (2004, '/reportes/comprobanteMovimiento/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:22:06');
INSERT INTO `bitacora` VALUES (2005, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:22:15');
INSERT INTO `bitacora` VALUES (2006, '/cuentas', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:22:18');
INSERT INTO `bitacora` VALUES (2007, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:22:21');
INSERT INTO `bitacora` VALUES (2008, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:23:00');
INSERT INTO `bitacora` VALUES (2009, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:32:22');
INSERT INTO `bitacora` VALUES (2010, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:32:40');
INSERT INTO `bitacora` VALUES (2011, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:33:21');
INSERT INTO `bitacora` VALUES (2012, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:33:39');
INSERT INTO `bitacora` VALUES (2013, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:34:20');
INSERT INTO `bitacora` VALUES (2014, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:34:31');
INSERT INTO `bitacora` VALUES (2015, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:34:44');
INSERT INTO `bitacora` VALUES (2016, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:35:28');
INSERT INTO `bitacora` VALUES (2017, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:35:54');
INSERT INTO `bitacora` VALUES (2018, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:36:03');
INSERT INTO `bitacora` VALUES (2019, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:38:03');
INSERT INTO `bitacora` VALUES (2020, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:38:39');
INSERT INTO `bitacora` VALUES (2021, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:38:55');
INSERT INTO `bitacora` VALUES (2022, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:39:25');
INSERT INTO `bitacora` VALUES (2023, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:40:02');
INSERT INTO `bitacora` VALUES (2024, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:40:46');
INSERT INTO `bitacora` VALUES (2025, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:41:09');
INSERT INTO `bitacora` VALUES (2026, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:41:38');
INSERT INTO `bitacora` VALUES (2027, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:42:19');
INSERT INTO `bitacora` VALUES (2028, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:42:31');
INSERT INTO `bitacora` VALUES (2029, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:47:21');
INSERT INTO `bitacora` VALUES (2030, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:48:06');
INSERT INTO `bitacora` VALUES (2031, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:49:10');
INSERT INTO `bitacora` VALUES (2032, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:53:31');
INSERT INTO `bitacora` VALUES (2033, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:55:10');
INSERT INTO `bitacora` VALUES (2034, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:55:36');
INSERT INTO `bitacora` VALUES (2035, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 13:56:45');
INSERT INTO `bitacora` VALUES (2036, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:28:17');
INSERT INTO `bitacora` VALUES (2037, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:53:41');
INSERT INTO `bitacora` VALUES (2038, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:53:42');
INSERT INTO `bitacora` VALUES (2039, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:53:47');
INSERT INTO `bitacora` VALUES (2040, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:55:20');
INSERT INTO `bitacora` VALUES (2041, '/asociados/solicitud/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:55:31');
INSERT INTO `bitacora` VALUES (2042, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:55:35');
INSERT INTO `bitacora` VALUES (2043, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:56:55');
INSERT INTO `bitacora` VALUES (2044, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:58:54');
INSERT INTO `bitacora` VALUES (2045, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 16:59:17');
INSERT INTO `bitacora` VALUES (2046, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:02:44');
INSERT INTO `bitacora` VALUES (2047, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:03:28');
INSERT INTO `bitacora` VALUES (2048, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:04:02');
INSERT INTO `bitacora` VALUES (2049, '/tipoCuenta', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:04:34');
INSERT INTO `bitacora` VALUES (2050, '/intereses/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:04:40');
INSERT INTO `bitacora` VALUES (2051, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:05:08');
INSERT INTO `bitacora` VALUES (2052, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:05:54');
INSERT INTO `bitacora` VALUES (2053, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:06:01');
INSERT INTO `bitacora` VALUES (2054, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:06:07');
INSERT INTO `bitacora` VALUES (2055, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:06:46');
INSERT INTO `bitacora` VALUES (2056, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:06:48');
INSERT INTO `bitacora` VALUES (2057, '/asociados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:18');
INSERT INTO `bitacora` VALUES (2058, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:22');
INSERT INTO `bitacora` VALUES (2059, '/beneficiarios/edit/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:24');
INSERT INTO `bitacora` VALUES (2060, '/beneficiarios/put', '{\"_token\":\"PSrmfgieaIHFdUpMsfWTmkElU4UilY4sJANKytxM\",\"_method\":\"PUT\",\"id\":\"1\",\"id_asociado\":\"3\",\"nombre\":\"MARHA ALICIA JANDRES URRUTIA\",\"parentesco\":\"14\",\"porcentaje\":\"50\",\"direccion\":\"SM\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:29');
INSERT INTO `bitacora` VALUES (2061, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:29');
INSERT INTO `bitacora` VALUES (2062, '/beneficiarios/add/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:31');
INSERT INTO `bitacora` VALUES (2063, '/beneficiarios/add', '{\"_token\":\"PSrmfgieaIHFdUpMsfWTmkElU4UilY4sJANKytxM\",\"id_asociado\":\"3\",\"id_cuenta\":\"2\",\"parentesco\":\"1\",\"nombre\":\"Juan Jose\",\"porcentaje\":\"50\",\"direccion\":\"SM\",\"telefono\":\"0000-0000\"}', 'POST', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:47');
INSERT INTO `bitacora` VALUES (2064, '/beneficiarios/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:47');
INSERT INTO `bitacora` VALUES (2065, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:07:50');
INSERT INTO `bitacora` VALUES (2066, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:16:30');
INSERT INTO `bitacora` VALUES (2067, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:19:07');
INSERT INTO `bitacora` VALUES (2068, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:19:30');
INSERT INTO `bitacora` VALUES (2069, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:19:42');
INSERT INTO `bitacora` VALUES (2070, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:20:15');
INSERT INTO `bitacora` VALUES (2071, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:20:46');
INSERT INTO `bitacora` VALUES (2072, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:21:21');
INSERT INTO `bitacora` VALUES (2073, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:42:47');
INSERT INTO `bitacora` VALUES (2074, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:42:50');
INSERT INTO `bitacora` VALUES (2075, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:43:29');
INSERT INTO `bitacora` VALUES (2076, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:44:50');
INSERT INTO `bitacora` VALUES (2077, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:44:52');
INSERT INTO `bitacora` VALUES (2078, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:45:09');
INSERT INTO `bitacora` VALUES (2079, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:49:14');
INSERT INTO `bitacora` VALUES (2080, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:50:03');
INSERT INTO `bitacora` VALUES (2081, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 17:50:23');
INSERT INTO `bitacora` VALUES (2082, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:07:54');
INSERT INTO `bitacora` VALUES (2083, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:07:55');
INSERT INTO `bitacora` VALUES (2084, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:20:47');
INSERT INTO `bitacora` VALUES (2085, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:21:55');
INSERT INTO `bitacora` VALUES (2086, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:22:28');
INSERT INTO `bitacora` VALUES (2087, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:25:29');
INSERT INTO `bitacora` VALUES (2088, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:26:27');
INSERT INTO `bitacora` VALUES (2089, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:27:38');
INSERT INTO `bitacora` VALUES (2090, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:27:53');
INSERT INTO `bitacora` VALUES (2091, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:29:38');
INSERT INTO `bitacora` VALUES (2092, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:29:55');
INSERT INTO `bitacora` VALUES (2093, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:29:56');
INSERT INTO `bitacora` VALUES (2094, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:30:52');
INSERT INTO `bitacora` VALUES (2095, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:30:53');
INSERT INTO `bitacora` VALUES (2096, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:31:32');
INSERT INTO `bitacora` VALUES (2097, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:31:53');
INSERT INTO `bitacora` VALUES (2098, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:32:53');
INSERT INTO `bitacora` VALUES (2099, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:33:12');
INSERT INTO `bitacora` VALUES (2100, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:33:18');
INSERT INTO `bitacora` VALUES (2101, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:33:19');
INSERT INTO `bitacora` VALUES (2102, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 18:33:20');
INSERT INTO `bitacora` VALUES (2103, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:31:05');
INSERT INTO `bitacora` VALUES (2104, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:31:22');
INSERT INTO `bitacora` VALUES (2105, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:31:53');
INSERT INTO `bitacora` VALUES (2106, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:32:04');
INSERT INTO `bitacora` VALUES (2107, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:32:51');
INSERT INTO `bitacora` VALUES (2108, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:32:57');
INSERT INTO `bitacora` VALUES (2109, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:33:31');
INSERT INTO `bitacora` VALUES (2110, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:33:52');
INSERT INTO `bitacora` VALUES (2111, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:34:07');
INSERT INTO `bitacora` VALUES (2112, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:34:43');
INSERT INTO `bitacora` VALUES (2113, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:34:54');
INSERT INTO `bitacora` VALUES (2114, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:35:44');
INSERT INTO `bitacora` VALUES (2115, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:35:59');
INSERT INTO `bitacora` VALUES (2116, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:36:10');
INSERT INTO `bitacora` VALUES (2117, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:36:17');
INSERT INTO `bitacora` VALUES (2118, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:37:34');
INSERT INTO `bitacora` VALUES (2119, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:37:53');
INSERT INTO `bitacora` VALUES (2120, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:38:09');
INSERT INTO `bitacora` VALUES (2121, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:38:30');
INSERT INTO `bitacora` VALUES (2122, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:40:10');
INSERT INTO `bitacora` VALUES (2123, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:40:30');
INSERT INTO `bitacora` VALUES (2124, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:41:01');
INSERT INTO `bitacora` VALUES (2125, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:41:14');
INSERT INTO `bitacora` VALUES (2126, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:42:27');
INSERT INTO `bitacora` VALUES (2127, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:43:21');
INSERT INTO `bitacora` VALUES (2128, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:43:56');
INSERT INTO `bitacora` VALUES (2129, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:43:57');
INSERT INTO `bitacora` VALUES (2130, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:43:58');
INSERT INTO `bitacora` VALUES (2131, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:44:17');
INSERT INTO `bitacora` VALUES (2132, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:44:30');
INSERT INTO `bitacora` VALUES (2133, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:44:36');
INSERT INTO `bitacora` VALUES (2134, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:44:43');
INSERT INTO `bitacora` VALUES (2135, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:45:17');
INSERT INTO `bitacora` VALUES (2136, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:46:48');
INSERT INTO `bitacora` VALUES (2137, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:46:58');
INSERT INTO `bitacora` VALUES (2138, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:48:22');
INSERT INTO `bitacora` VALUES (2139, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:50:47');
INSERT INTO `bitacora` VALUES (2140, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:50:58');
INSERT INTO `bitacora` VALUES (2141, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:51:26');
INSERT INTO `bitacora` VALUES (2142, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:53:28');
INSERT INTO `bitacora` VALUES (2143, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:53:46');
INSERT INTO `bitacora` VALUES (2144, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:54:11');
INSERT INTO `bitacora` VALUES (2145, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:59:12');
INSERT INTO `bitacora` VALUES (2146, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 19:59:43');
INSERT INTO `bitacora` VALUES (2147, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:00:01');
INSERT INTO `bitacora` VALUES (2148, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:00:36');
INSERT INTO `bitacora` VALUES (2149, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:01:23');
INSERT INTO `bitacora` VALUES (2150, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:01:34');
INSERT INTO `bitacora` VALUES (2151, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:01:49');
INSERT INTO `bitacora` VALUES (2152, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:02:39');
INSERT INTO `bitacora` VALUES (2153, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:03:51');
INSERT INTO `bitacora` VALUES (2154, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:04:04');
INSERT INTO `bitacora` VALUES (2155, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:05:13');
INSERT INTO `bitacora` VALUES (2156, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:05:34');
INSERT INTO `bitacora` VALUES (2157, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:05:58');
INSERT INTO `bitacora` VALUES (2158, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:06:32');
INSERT INTO `bitacora` VALUES (2159, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:07:08');
INSERT INTO `bitacora` VALUES (2160, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:07:36');
INSERT INTO `bitacora` VALUES (2161, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:07:46');
INSERT INTO `bitacora` VALUES (2162, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:09:07');
INSERT INTO `bitacora` VALUES (2163, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:09:25');
INSERT INTO `bitacora` VALUES (2164, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:09:35');
INSERT INTO `bitacora` VALUES (2165, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:10:06');
INSERT INTO `bitacora` VALUES (2166, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:10:25');
INSERT INTO `bitacora` VALUES (2167, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:10:36');
INSERT INTO `bitacora` VALUES (2168, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:10:48');
INSERT INTO `bitacora` VALUES (2169, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:11:43');
INSERT INTO `bitacora` VALUES (2170, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:12:37');
INSERT INTO `bitacora` VALUES (2171, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:17:31');
INSERT INTO `bitacora` VALUES (2172, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:18:56');
INSERT INTO `bitacora` VALUES (2173, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:19:07');
INSERT INTO `bitacora` VALUES (2174, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:19:48');
INSERT INTO `bitacora` VALUES (2175, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:20:26');
INSERT INTO `bitacora` VALUES (2176, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:20:38');
INSERT INTO `bitacora` VALUES (2177, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:21:02');
INSERT INTO `bitacora` VALUES (2178, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:21:21');
INSERT INTO `bitacora` VALUES (2179, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:21:35');
INSERT INTO `bitacora` VALUES (2180, '/reportes/contrato/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:21:47');
INSERT INTO `bitacora` VALUES (2181, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:23:51');
INSERT INTO `bitacora` VALUES (2182, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:23:55');
INSERT INTO `bitacora` VALUES (2183, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:23:57');
INSERT INTO `bitacora` VALUES (2184, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:24:37');
INSERT INTO `bitacora` VALUES (2185, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:24:39');
INSERT INTO `bitacora` VALUES (2186, '/clientes/getClienteData/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 20:24:43');
INSERT INTO `bitacora` VALUES (2187, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:08:19');
INSERT INTO `bitacora` VALUES (2188, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:09:01');
INSERT INTO `bitacora` VALUES (2189, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:11:58');
INSERT INTO `bitacora` VALUES (2190, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:13:29');
INSERT INTO `bitacora` VALUES (2191, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:15:12');
INSERT INTO `bitacora` VALUES (2192, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:20:46');
INSERT INTO `bitacora` VALUES (2193, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:21:19');
INSERT INTO `bitacora` VALUES (2194, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:22:30');
INSERT INTO `bitacora` VALUES (2195, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:23:04');
INSERT INTO `bitacora` VALUES (2196, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:23:08');
INSERT INTO `bitacora` VALUES (2197, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:25:41');
INSERT INTO `bitacora` VALUES (2198, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:25:47');
INSERT INTO `bitacora` VALUES (2199, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:26:44');
INSERT INTO `bitacora` VALUES (2200, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-06 21:32:17');
INSERT INTO `bitacora` VALUES (2201, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:18:09');
INSERT INTO `bitacora` VALUES (2202, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:18:13');
INSERT INTO `bitacora` VALUES (2203, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:18:15');
INSERT INTO `bitacora` VALUES (2204, '/clientes/getClienteData/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:24:31');
INSERT INTO `bitacora` VALUES (2205, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:37:10');
INSERT INTO `bitacora` VALUES (2206, '/clientes/getClienteData/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:37:15');
INSERT INTO `bitacora` VALUES (2207, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:39:47');
INSERT INTO `bitacora` VALUES (2208, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:39:50');
INSERT INTO `bitacora` VALUES (2209, '/referencias/put', '{\"_token\":\"BHs51Y6o2lqsCvsY9CVR0vPC7XHi4T2KlAQ4GVIo\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo M\\u00e1rquez Argueta\",\"parentesco\":\"Hermano\",\"telefono\":\"26541561\",\"direccion\":\"San Miguel\",\"lugar_trabajo\":\"Computec\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:39:57');
INSERT INTO `bitacora` VALUES (2210, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:39:57');
INSERT INTO `bitacora` VALUES (2211, '/creditos/solicitudes', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:40:18');
INSERT INTO `bitacora` VALUES (2212, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:40:20');
INSERT INTO `bitacora` VALUES (2213, '/creditos/solicitudes/referencias/add/1/c6474248-dc72-477d-b563-cb9dcff9cb89', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:40:27');
INSERT INTO `bitacora` VALUES (2214, '/creditos/solicitudes/referencias/getReferencias/c6474248-dc72-477d-b563-cb9dcff9cb89', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:40:28');
INSERT INTO `bitacora` VALUES (2215, '/clientes/getClienteData/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:41:02');
INSERT INTO `bitacora` VALUES (2216, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:46:25');
INSERT INTO `bitacora` VALUES (2217, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:46:50');
INSERT INTO `bitacora` VALUES (2218, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:46:59');
INSERT INTO `bitacora` VALUES (2219, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:49:10');
INSERT INTO `bitacora` VALUES (2220, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:50:23');
INSERT INTO `bitacora` VALUES (2221, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:51:01');
INSERT INTO `bitacora` VALUES (2222, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:55:36');
INSERT INTO `bitacora` VALUES (2223, '/creditos/solicitudes/referencias/add/1/37b6bdc7-7a90-4818-ab48-333992ce3705/21', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:55:46');
INSERT INTO `bitacora` VALUES (2224, '/creditos/solicitudes/referencias/getReferencias/37b6bdc7-7a90-4818-ab48-333992ce3705', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:55:46');
INSERT INTO `bitacora` VALUES (2225, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:56:34');
INSERT INTO `bitacora` VALUES (2226, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:56:42');
INSERT INTO `bitacora` VALUES (2227, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:56:43');
INSERT INTO `bitacora` VALUES (2228, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:57:00');
INSERT INTO `bitacora` VALUES (2229, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:57:01');
INSERT INTO `bitacora` VALUES (2230, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:57:25');
INSERT INTO `bitacora` VALUES (2231, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:57:25');
INSERT INTO `bitacora` VALUES (2232, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:59:55');
INSERT INTO `bitacora` VALUES (2233, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 10:59:55');
INSERT INTO `bitacora` VALUES (2234, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:01:04');
INSERT INTO `bitacora` VALUES (2235, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:01:04');
INSERT INTO `bitacora` VALUES (2236, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:01:48');
INSERT INTO `bitacora` VALUES (2237, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:02:39');
INSERT INTO `bitacora` VALUES (2238, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:03');
INSERT INTO `bitacora` VALUES (2239, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:19');
INSERT INTO `bitacora` VALUES (2240, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:25');
INSERT INTO `bitacora` VALUES (2241, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:37');
INSERT INTO `bitacora` VALUES (2242, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:54');
INSERT INTO `bitacora` VALUES (2243, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:03:54');
INSERT INTO `bitacora` VALUES (2244, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:04:47');
INSERT INTO `bitacora` VALUES (2245, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:04:51');
INSERT INTO `bitacora` VALUES (2246, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:05:27');
INSERT INTO `bitacora` VALUES (2247, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:06:05');
INSERT INTO `bitacora` VALUES (2248, '/creditos/solicitudes/referencias/quitar/4', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:06:18');
INSERT INTO `bitacora` VALUES (2249, '/creditos/solicitudes/referencias/quitar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:06:33');
INSERT INTO `bitacora` VALUES (2250, '/creditos/solicitudes/referencias/quitar/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:07:05');
INSERT INTO `bitacora` VALUES (2251, '/creditos/solicitudes/referencias/quitar/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:16:27');
INSERT INTO `bitacora` VALUES (2252, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:16:27');
INSERT INTO `bitacora` VALUES (2253, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:16:34');
INSERT INTO `bitacora` VALUES (2254, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:16:34');
INSERT INTO `bitacora` VALUES (2255, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:18:58');
INSERT INTO `bitacora` VALUES (2256, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:18:58');
INSERT INTO `bitacora` VALUES (2257, '/creditos/solicitudes/referencias/add/1/11e5020d-1ee7-46db-b4b9-da2c6abf02e3/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:19:15');
INSERT INTO `bitacora` VALUES (2258, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:19:21');
INSERT INTO `bitacora` VALUES (2259, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:19:58');
INSERT INTO `bitacora` VALUES (2260, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:20:39');
INSERT INTO `bitacora` VALUES (2261, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:21:00');
INSERT INTO `bitacora` VALUES (2262, '/creditos/solicitudes/referencias/getReferencias/11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:24:08');
INSERT INTO `bitacora` VALUES (2263, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:24:21');
INSERT INTO `bitacora` VALUES (2264, '/creditos/solicitudes/referencias/add/1/ce095f3f-a79d-4236-b176-f36f616ba567/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:24:28');
INSERT INTO `bitacora` VALUES (2265, '/creditos/solicitudes/referencias/getReferencias/ce095f3f-a79d-4236-b176-f36f616ba567', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:24:28');
INSERT INTO `bitacora` VALUES (2266, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:00');
INSERT INTO `bitacora` VALUES (2267, '/creditos/solicitudes/referencias/add/1/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:07');
INSERT INTO `bitacora` VALUES (2268, '/creditos/solicitudes/referencias/getReferencias/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:07');
INSERT INTO `bitacora` VALUES (2269, '/creditos/solicitudes/referencias/add/1/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:14');
INSERT INTO `bitacora` VALUES (2270, '/creditos/solicitudes/referencias/getReferencias/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:14');
INSERT INTO `bitacora` VALUES (2271, '/creditos/solicitudes/referencias/add/1/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:32');
INSERT INTO `bitacora` VALUES (2272, '/creditos/solicitudes/referencias/getReferencias/2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:32');
INSERT INTO `bitacora` VALUES (2273, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:34');
INSERT INTO `bitacora` VALUES (2274, '/creditos/solicitudes/referencias/add/1/09ba4433-4c87-4c2e-b4cb-8125941af33d/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:40');
INSERT INTO `bitacora` VALUES (2275, '/creditos/solicitudes/referencias/getReferencias/09ba4433-4c87-4c2e-b4cb-8125941af33d', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:41');
INSERT INTO `bitacora` VALUES (2276, '/creditos/solicitudes/referencias/add/1/09ba4433-4c87-4c2e-b4cb-8125941af33d/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:48');
INSERT INTO `bitacora` VALUES (2277, '/creditos/solicitudes/referencias/getReferencias/09ba4433-4c87-4c2e-b4cb-8125941af33d', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:26:48');
INSERT INTO `bitacora` VALUES (2278, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:04');
INSERT INTO `bitacora` VALUES (2279, '/creditos/solicitudes/referencias/add/1/6545bdb9-7d71-4e85-82e0-b6db4d591774/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:10');
INSERT INTO `bitacora` VALUES (2280, '/creditos/solicitudes/referencias/getReferencias/6545bdb9-7d71-4e85-82e0-b6db4d591774', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:11');
INSERT INTO `bitacora` VALUES (2281, '/creditos/solicitudes/referencias/add/1/6545bdb9-7d71-4e85-82e0-b6db4d591774/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:20');
INSERT INTO `bitacora` VALUES (2282, '/creditos/solicitudes/referencias/getReferencias/6545bdb9-7d71-4e85-82e0-b6db4d591774', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:20');
INSERT INTO `bitacora` VALUES (2283, '/creditos/solicitudes/referencias/add/1/6545bdb9-7d71-4e85-82e0-b6db4d591774/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:23');
INSERT INTO `bitacora` VALUES (2284, '/creditos/solicitudes/referencias/getReferencias/6545bdb9-7d71-4e85-82e0-b6db4d591774', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:27:23');
INSERT INTO `bitacora` VALUES (2285, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:28:09');
INSERT INTO `bitacora` VALUES (2286, '/creditos/solicitudes/referencias/add/1/0ef8c992-1462-4f4c-980e-84aef2147312/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:28:14');
INSERT INTO `bitacora` VALUES (2287, '/creditos/solicitudes/referencias/getReferencias/0ef8c992-1462-4f4c-980e-84aef2147312', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:28:14');
INSERT INTO `bitacora` VALUES (2288, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:29:36');
INSERT INTO `bitacora` VALUES (2289, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:29:50');
INSERT INTO `bitacora` VALUES (2290, '/creditos/solicitudes/referencias/add/1/4db7cf85-f205-4648-8cc6-605c641ceffd/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:29:55');
INSERT INTO `bitacora` VALUES (2291, '/creditos/solicitudes/referencias/getReferencias/4db7cf85-f205-4648-8cc6-605c641ceffd', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:29:55');
INSERT INTO `bitacora` VALUES (2292, '/creditos/solicitudes/referencias/quitar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:03');
INSERT INTO `bitacora` VALUES (2293, '/creditos/solicitudes/referencias/getReferencias/4db7cf85-f205-4648-8cc6-605c641ceffd', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:04');
INSERT INTO `bitacora` VALUES (2294, '/creditos/solicitudes/referencias/quitar/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:13');
INSERT INTO `bitacora` VALUES (2295, '/creditos/solicitudes/referencias/getReferencias/4db7cf85-f205-4648-8cc6-605c641ceffd', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:13');
INSERT INTO `bitacora` VALUES (2296, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:33');
INSERT INTO `bitacora` VALUES (2297, '/creditos/solicitudes/referencias/add/1/efde1aaa-9721-4963-82c4-006350899c9f/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:39');
INSERT INTO `bitacora` VALUES (2298, '/creditos/solicitudes/referencias/getReferencias/efde1aaa-9721-4963-82c4-006350899c9f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:39');
INSERT INTO `bitacora` VALUES (2299, '/creditos/solicitudes/referencias/quitar/21', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:41');
INSERT INTO `bitacora` VALUES (2300, '/creditos/solicitudes/referencias/getReferencias/efde1aaa-9721-4963-82c4-006350899c9f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:42');
INSERT INTO `bitacora` VALUES (2301, '/creditos/solicitudes/referencias/add/1/efde1aaa-9721-4963-82c4-006350899c9f/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:46');
INSERT INTO `bitacora` VALUES (2302, '/creditos/solicitudes/referencias/getReferencias/efde1aaa-9721-4963-82c4-006350899c9f', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:30:47');
INSERT INTO `bitacora` VALUES (2303, '/creditos/solicitudes/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:21');
INSERT INTO `bitacora` VALUES (2304, '/creditos/solicitudes/referencias/add/1/eab76a82-8dbe-4b37-87b8-510175e2e53c/2', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:27');
INSERT INTO `bitacora` VALUES (2305, '/creditos/solicitudes/referencias/getReferencias/eab76a82-8dbe-4b37-87b8-510175e2e53c', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:27');
INSERT INTO `bitacora` VALUES (2306, '/creditos/solicitudes/referencias/add/1/eab76a82-8dbe-4b37-87b8-510175e2e53c/3', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:30');
INSERT INTO `bitacora` VALUES (2307, '/creditos/solicitudes/referencias/getReferencias/eab76a82-8dbe-4b37-87b8-510175e2e53c', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:30');
INSERT INTO `bitacora` VALUES (2308, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:52');
INSERT INTO `bitacora` VALUES (2309, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 11:31:55');
INSERT INTO `bitacora` VALUES (2310, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:08:55');
INSERT INTO `bitacora` VALUES (2311, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:08:55');
INSERT INTO `bitacora` VALUES (2312, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:11:53');
INSERT INTO `bitacora` VALUES (2313, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:12:44');
INSERT INTO `bitacora` VALUES (2314, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:13:00');
INSERT INTO `bitacora` VALUES (2315, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:13:58');
INSERT INTO `bitacora` VALUES (2316, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:20:48');
INSERT INTO `bitacora` VALUES (2317, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:21:15');
INSERT INTO `bitacora` VALUES (2318, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:21:39');
INSERT INTO `bitacora` VALUES (2319, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:22:28');
INSERT INTO `bitacora` VALUES (2320, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:23:02');
INSERT INTO `bitacora` VALUES (2321, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:23:13');
INSERT INTO `bitacora` VALUES (2322, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:23:22');
INSERT INTO `bitacora` VALUES (2323, '/dashboard', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:24:52');
INSERT INTO `bitacora` VALUES (2324, '/referencias/put', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo M\\u00e1rquez Argueta\",\"parentesco\":\"Hermano\",\"telefono\":\"26541561\",\"direccion\":\"San Miguel\",\"lugar_trabajo\":\"Computec\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:24:56');
INSERT INTO `bitacora` VALUES (2325, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:24:57');
INSERT INTO `bitacora` VALUES (2326, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:24:58');
INSERT INTO `bitacora` VALUES (2327, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:25:57');
INSERT INTO `bitacora` VALUES (2328, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:26:06');
INSERT INTO `bitacora` VALUES (2329, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:28:42');
INSERT INTO `bitacora` VALUES (2330, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:28:45');
INSERT INTO `bitacora` VALUES (2331, '/referencias/put', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo M\\u00e1rquez Argueta\",\"parentesco\":\"Hermano\",\"telefono\":\"26541561\",\"direccion\":\"San Miguel\",\"lugar_trabajo\":\"Computec\",\"observaciones\":\"ninguna\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:28:48');
INSERT INTO `bitacora` VALUES (2332, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:28:49');
INSERT INTO `bitacora` VALUES (2333, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:28:50');
INSERT INTO `bitacora` VALUES (2334, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:15');
INSERT INTO `bitacora` VALUES (2335, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:19');
INSERT INTO `bitacora` VALUES (2336, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:21');
INSERT INTO `bitacora` VALUES (2337, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:51');
INSERT INTO `bitacora` VALUES (2338, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:53');
INSERT INTO `bitacora` VALUES (2339, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:29:55');
INSERT INTO `bitacora` VALUES (2340, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:30:18');
INSERT INTO `bitacora` VALUES (2341, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:08');
INSERT INTO `bitacora` VALUES (2342, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:11');
INSERT INTO `bitacora` VALUES (2343, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:31');
INSERT INTO `bitacora` VALUES (2344, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:50');
INSERT INTO `bitacora` VALUES (2345, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:52');
INSERT INTO `bitacora` VALUES (2346, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:31:59');
INSERT INTO `bitacora` VALUES (2347, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:01');
INSERT INTO `bitacora` VALUES (2348, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:04');
INSERT INTO `bitacora` VALUES (2349, '/referencias/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:30');
INSERT INTO `bitacora` VALUES (2350, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:31');
INSERT INTO `bitacora` VALUES (2351, '/referencias/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:32');
INSERT INTO `bitacora` VALUES (2352, '/referencias', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:32:35');
INSERT INTO `bitacora` VALUES (2353, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:44');
INSERT INTO `bitacora` VALUES (2354, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"13\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:48');
INSERT INTO `bitacora` VALUES (2355, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:49');
INSERT INTO `bitacora` VALUES (2356, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"29\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:53');
INSERT INTO `bitacora` VALUES (2357, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:53');
INSERT INTO `bitacora` VALUES (2358, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"6\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:56');
INSERT INTO `bitacora` VALUES (2359, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:56');
INSERT INTO `bitacora` VALUES (2360, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"8\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:59');
INSERT INTO `bitacora` VALUES (2361, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:35:59');
INSERT INTO `bitacora` VALUES (2362, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"11\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:01');
INSERT INTO `bitacora` VALUES (2363, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:01');
INSERT INTO `bitacora` VALUES (2364, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"9\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:03');
INSERT INTO `bitacora` VALUES (2365, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:03');
INSERT INTO `bitacora` VALUES (2366, '/empleados/delete', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"DELETE\",\"id\":\"10\"}', 'DELETE', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:05');
INSERT INTO `bitacora` VALUES (2367, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:05');
INSERT INTO `bitacora` VALUES (2368, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:36:36');
INSERT INTO `bitacora` VALUES (2369, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:37:42');
INSERT INTO `bitacora` VALUES (2370, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:38:25');
INSERT INTO `bitacora` VALUES (2371, '/profesiones/1', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:38:28');
INSERT INTO `bitacora` VALUES (2372, '/profesiones/put', '{\"_token\":\"XUHdYHKHqHPWhuABLrFkUtjTBrHaNjPzxkJowfn0\",\"_method\":\"PUT\",\"id\":\"1\",\"name\":\"Ama de Casa\"}', 'PUT', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:38:33');
INSERT INTO `bitacora` VALUES (2373, '/profesiones', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:38:33');
INSERT INTO `bitacora` VALUES (2374, '/empleados', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:45:13');
INSERT INTO `bitacora` VALUES (2375, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:45:14');
INSERT INTO `bitacora` VALUES (2376, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:45:37');
INSERT INTO `bitacora` VALUES (2377, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:45:53');
INSERT INTO `bitacora` VALUES (2378, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:46:10');
INSERT INTO `bitacora` VALUES (2379, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:46:34');
INSERT INTO `bitacora` VALUES (2380, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:48:35');
INSERT INTO `bitacora` VALUES (2381, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:49:10');
INSERT INTO `bitacora` VALUES (2382, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:49:17');
INSERT INTO `bitacora` VALUES (2383, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:49:47');
INSERT INTO `bitacora` VALUES (2384, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:55:48');
INSERT INTO `bitacora` VALUES (2385, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:56:12');
INSERT INTO `bitacora` VALUES (2386, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:56:34');
INSERT INTO `bitacora` VALUES (2387, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:57:10');
INSERT INTO `bitacora` VALUES (2388, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:57:23');
INSERT INTO `bitacora` VALUES (2389, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:58:37');
INSERT INTO `bitacora` VALUES (2390, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 15:58:55');
INSERT INTO `bitacora` VALUES (2391, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 16:00:31');
INSERT INTO `bitacora` VALUES (2392, '/empleados/add', '[]', 'GET', 11, 'Norman Parker', 'habbott@example.com', '2024-10-07 16:00:49');
INSERT INTO `bitacora` VALUES (2393, '/dashboard', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:14:57');
INSERT INTO `bitacora` VALUES (2394, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:15:08');
INSERT INTO `bitacora` VALUES (2395, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:15:10');
INSERT INTO `bitacora` VALUES (2396, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:15:13');
INSERT INTO `bitacora` VALUES (2397, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:15:51');
INSERT INTO `bitacora` VALUES (2398, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:17:01');
INSERT INTO `bitacora` VALUES (2399, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:17:14');
INSERT INTO `bitacora` VALUES (2400, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:17:24');
INSERT INTO `bitacora` VALUES (2401, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:18:43');
INSERT INTO `bitacora` VALUES (2402, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:19:04');
INSERT INTO `bitacora` VALUES (2403, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:20:50');
INSERT INTO `bitacora` VALUES (2404, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:21:11');
INSERT INTO `bitacora` VALUES (2405, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:21:25');
INSERT INTO `bitacora` VALUES (2406, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:22:19');
INSERT INTO `bitacora` VALUES (2407, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:22:27');
INSERT INTO `bitacora` VALUES (2408, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:23:07');
INSERT INTO `bitacora` VALUES (2409, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:23:17');
INSERT INTO `bitacora` VALUES (2410, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:23:19');
INSERT INTO `bitacora` VALUES (2411, '/empleados/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre_empleado\":\"GERENCIA\",\"genero_empleado\":\"M\",\"estado_familiar\":\"SOLTERO\",\"profesion_id\":\"4\",\"domicilio_departamento\":\"San Miguel\",\"direccion\":\"San miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"12345678-9\",\"expedicion_dui\":\"San Miguel\",\"nit\":\"1214-120588-101-5\",\"telefono\":\"2654-1561\",\"otros_datos\":\"Ninguno\"}', 'POST', 11, NULL, 'habbott@example.com', '2024-10-07 18:24:26');
INSERT INTO `bitacora` VALUES (2412, '/empleados/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre_empleado\":\"GERENCIA\",\"genero_empleado\":\"M\",\"estado_familiar\":\"SOLTERO\",\"profesion_id\":\"4\",\"domicilio_departamento\":\"San Miguel\",\"direccion\":\"San miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"12345678-9\",\"expedicion_dui\":\"San Miguel\",\"nit\":\"1214-120588-101-5\",\"telefono\":\"2654-1561\",\"otros_datos\":\"Ninguno\"}', 'POST', 11, NULL, 'habbott@example.com', '2024-10-07 18:24:50');
INSERT INTO `bitacora` VALUES (2413, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:24:50');
INSERT INTO `bitacora` VALUES (2414, '/cajas', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:24:56');
INSERT INTO `bitacora` VALUES (2415, '/cajas/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:24:58');
INSERT INTO `bitacora` VALUES (2416, '/user', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:25:00');
INSERT INTO `bitacora` VALUES (2417, '/user', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:25:25');
INSERT INTO `bitacora` VALUES (2418, '/user/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:25:26');
INSERT INTO `bitacora` VALUES (2419, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:27:30');
INSERT INTO `bitacora` VALUES (2420, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:27:32');
INSERT INTO `bitacora` VALUES (2421, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:27:36');
INSERT INTO `bitacora` VALUES (2422, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:27:37');
INSERT INTO `bitacora` VALUES (2423, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:29:41');
INSERT INTO `bitacora` VALUES (2424, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:29:43');
INSERT INTO `bitacora` VALUES (2425, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:30:54');
INSERT INTO `bitacora` VALUES (2426, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:30:55');
INSERT INTO `bitacora` VALUES (2427, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:31:16');
INSERT INTO `bitacora` VALUES (2428, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:31:25');
INSERT INTO `bitacora` VALUES (2429, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:31:27');
INSERT INTO `bitacora` VALUES (2430, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:29');
INSERT INTO `bitacora` VALUES (2431, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:31');
INSERT INTO `bitacora` VALUES (2432, '/empleados/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:34');
INSERT INTO `bitacora` VALUES (2433, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:38');
INSERT INTO `bitacora` VALUES (2434, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:39');
INSERT INTO `bitacora` VALUES (2435, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:32:57');
INSERT INTO `bitacora` VALUES (2436, '/empleados/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"2\",\"nombre_empleado\":\"Jk9vdZYpSp\",\"genero_empleado\":\"M\",\"estado_familiar\":\"VPpBzpEPOB\",\"profesion_id\":\"1\",\"domicilio_departamento\":\"4DeQB107Ux\",\"direccion\":\"uONIHzd8zj\",\"nacionalidad\":\"0WTkwiL9PR\",\"dui\":\"RUk3e7pbEx\",\"expedicion_dui\":\"zI5t0f1384\",\"nit\":\"Y8cbLU5I9A\",\"telefono\":\"nNl4NT9V7x\",\"otros_datos\":\"DsXHaC06K1\"}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:36:03');
INSERT INTO `bitacora` VALUES (2437, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:36:03');
INSERT INTO `bitacora` VALUES (2438, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:36:07');
INSERT INTO `bitacora` VALUES (2439, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:36:12');
INSERT INTO `bitacora` VALUES (2440, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:36:14');
INSERT INTO `bitacora` VALUES (2441, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:37:33');
INSERT INTO `bitacora` VALUES (2442, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:39:11');
INSERT INTO `bitacora` VALUES (2443, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:48:22');
INSERT INTO `bitacora` VALUES (2444, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:48:23');
INSERT INTO `bitacora` VALUES (2445, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:48:24');
INSERT INTO `bitacora` VALUES (2446, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:48:26');
INSERT INTO `bitacora` VALUES (2447, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:48:56');
INSERT INTO `bitacora` VALUES (2448, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:49:05');
INSERT INTO `bitacora` VALUES (2449, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:52:46');
INSERT INTO `bitacora` VALUES (2450, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:52:51');
INSERT INTO `bitacora` VALUES (2451, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:52:52');
INSERT INTO `bitacora` VALUES (2452, '/profesiones', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:07');
INSERT INTO `bitacora` VALUES (2453, '/profesiones/3', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:11');
INSERT INTO `bitacora` VALUES (2454, '/profesiones/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"3\",\"name\":\"Lic. Administraci\\u00f3n de empresas\"}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:29');
INSERT INTO `bitacora` VALUES (2455, '/profesiones', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:30');
INSERT INTO `bitacora` VALUES (2456, '/profesiones/4', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:32');
INSERT INTO `bitacora` VALUES (2457, '/profesiones/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"4\",\"name\":\"Lic. Mercadeo\"}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:42');
INSERT INTO `bitacora` VALUES (2458, '/profesiones', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:42');
INSERT INTO `bitacora` VALUES (2459, '/profesiones/5', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:53:44');
INSERT INTO `bitacora` VALUES (2460, '/profesiones/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"5\",\"name\":\"Alba\\u00f1il\"}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:03');
INSERT INTO `bitacora` VALUES (2461, '/profesiones', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:03');
INSERT INTO `bitacora` VALUES (2462, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:07');
INSERT INTO `bitacora` VALUES (2463, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:08');
INSERT INTO `bitacora` VALUES (2464, '/empleados/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre_empleado\":\"Caja 01\",\"genero_empleado\":\"F\",\"estado_familiar\":\"S\\/N\",\"profesion_id\":\"3\",\"domicilio_departamento\":\"San Miguel\",\"direccion\":\"San Miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"03731671**\",\"expedicion_dui\":\"San Miguel\",\"nit\":\"1314-120587-101-5\",\"telefono\":\"2654-1561\",\"otros_datos\":null}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:56');
INSERT INTO `bitacora` VALUES (2465, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:54:57');
INSERT INTO `bitacora` VALUES (2466, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:55:35');
INSERT INTO `bitacora` VALUES (2467, '/empleados/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"2\",\"nombre_empleado\":\"Colector 01\",\"genero_empleado\":\"M\",\"estado_familiar\":\"Soltero\",\"profesion_id\":\"4\",\"domicilio_departamento\":\"san Miguel\",\"direccion\":\"San Miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"03731671*8\",\"expedicion_dui\":\"SAN MIGUEL\",\"nit\":\"1314-120587-101-8\",\"telefono\":\"2654156\",\"otros_datos\":null}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 18:56:22');
INSERT INTO `bitacora` VALUES (2468, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:56:22');
INSERT INTO `bitacora` VALUES (2469, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 18:57:23');
INSERT INTO `bitacora` VALUES (2470, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:01:43');
INSERT INTO `bitacora` VALUES (2471, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:01:49');
INSERT INTO `bitacora` VALUES (2472, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:02:25');
INSERT INTO `bitacora` VALUES (2473, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:03:20');
INSERT INTO `bitacora` VALUES (2474, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:04:14');
INSERT INTO `bitacora` VALUES (2475, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:04:30');
INSERT INTO `bitacora` VALUES (2476, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:04:39');
INSERT INTO `bitacora` VALUES (2477, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:05:16');
INSERT INTO `bitacora` VALUES (2478, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:05:38');
INSERT INTO `bitacora` VALUES (2479, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:05:51');
INSERT INTO `bitacora` VALUES (2480, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:15');
INSERT INTO `bitacora` VALUES (2481, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:19');
INSERT INTO `bitacora` VALUES (2482, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:22');
INSERT INTO `bitacora` VALUES (2483, '/empleados/2', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:24');
INSERT INTO `bitacora` VALUES (2484, '/empleados/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"2\",\"nombre_empleado\":\"Colector 01\",\"genero_empleado\":\"M\",\"estado_familiar\":\"Soltero\",\"profesion_id\":\"3\",\"domicilio_departamento\":\"san Miguel\",\"direccion\":\"San Miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"03731671*8\",\"expedicion_dui\":\"SAN MIGUEL\",\"nit\":\"1314-120587-101-8\",\"telefono\":null,\"otros_datos\":null}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:31');
INSERT INTO `bitacora` VALUES (2485, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:06:32');
INSERT INTO `bitacora` VALUES (2486, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:07:37');
INSERT INTO `bitacora` VALUES (2487, '/empleados/1', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:07:39');
INSERT INTO `bitacora` VALUES (2488, '/empleados/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre_empleado\":\"Caja 01\",\"genero_empleado\":\"F\",\"estado_familiar\":\"S\\/N\",\"profesion_id\":\"3\",\"domicilio_departamento\":\"San Miguel\",\"direccion\":\"San Miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"03731671**\",\"expedicion_dui\":\"San Miguel\",\"nit\":\"1314-120587-101-5\",\"telefono\":null,\"otros_datos\":null}', 'PUT', 11, NULL, 'habbott@example.com', '2024-10-07 19:07:43');
INSERT INTO `bitacora` VALUES (2489, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:07:44');
INSERT INTO `bitacora` VALUES (2490, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:08:58');
INSERT INTO `bitacora` VALUES (2491, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:09:24');
INSERT INTO `bitacora` VALUES (2492, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:11:08');
INSERT INTO `bitacora` VALUES (2493, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:11:50');
INSERT INTO `bitacora` VALUES (2494, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:11:53');
INSERT INTO `bitacora` VALUES (2495, '/empleados', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:54:01');
INSERT INTO `bitacora` VALUES (2496, '/user', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:54:10');
INSERT INTO `bitacora` VALUES (2497, '/user/add', '[]', 'GET', 11, NULL, 'habbott@example.com', '2024-10-07 19:54:12');
INSERT INTO `bitacora` VALUES (2498, '/user/delete', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"DELETE\",\"id\":\"11\"}', 'DELETE', 11, NULL, 'habbott@example.com', '2024-10-07 19:54:21');
INSERT INTO `bitacora` VALUES (2499, '/set-new-password', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:57:32');
INSERT INTO `bitacora` VALUES (2500, '/set-new-password', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"password\":\"P@ssword7\",\"confirm-password\":\"P@ssword7\",\"toc\":\"1\"}', 'POST', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:58:29');
INSERT INTO `bitacora` VALUES (2501, '/dashboard', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:58:29');
INSERT INTO `bitacora` VALUES (2502, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:58:48');
INSERT INTO `bitacora` VALUES (2503, '/user/add', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:58:54');
INSERT INTO `bitacora` VALUES (2504, '/empleados', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:59:07');
INSERT INTO `bitacora` VALUES (2505, '/empleados/add', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 19:59:13');
INSERT INTO `bitacora` VALUES (2506, '/empleados/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre_empleado\":\"Gerencia\",\"genero_empleado\":\"M\",\"estado_familiar\":\"SN\",\"profesion_id\":\"3\",\"domicilio_departamento\":\"San Miguel\",\"direccion\":\"San Miguel\",\"nacionalidad\":\"Salvadore\\u00f1o\",\"dui\":\"00000000-0\",\"expedicion_dui\":\"San Miguel\",\"nit\":\"0000-000000-000+0\",\"telefono\":\"0000-0000\",\"otros_datos\":\"000\"}', 'POST', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:03');
INSERT INTO `bitacora` VALUES (2507, '/empleados', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:03');
INSERT INTO `bitacora` VALUES (2508, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:05');
INSERT INTO `bitacora` VALUES (2509, '/user/add', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:06');
INSERT INTO `bitacora` VALUES (2510, '/user/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"id_empleado_usuario\":\"3\",\"id_rol\":\"1\",\"email\":\"gerencia_cimacoop@gmail.com\",\"password\":\"gerencia\",\"rep_password\":\"gerencia\"}', 'POST', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:20');
INSERT INTO `bitacora` VALUES (2511, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:20');
INSERT INTO `bitacora` VALUES (2512, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:53');
INSERT INTO `bitacora` VALUES (2513, '/empleados', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:00:54');
INSERT INTO `bitacora` VALUES (2514, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:00');
INSERT INTO `bitacora` VALUES (2515, '/user/add', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:04');
INSERT INTO `bitacora` VALUES (2516, '/user/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"id_empleado_usuario\":\"2\",\"id_rol\":\"2\",\"email\":\"cimacoop_colector@gmail.com\",\"password\":\"colector01\",\"rep_password\":\"colector01\"}', 'POST', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:31');
INSERT INTO `bitacora` VALUES (2517, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:32');
INSERT INTO `bitacora` VALUES (2518, '/rol', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:34');
INSERT INTO `bitacora` VALUES (2519, '/rol/add', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:36');
INSERT INTO `bitacora` VALUES (2520, '/rol/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"name\":\"Colector\"}', 'POST', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:46');
INSERT INTO `bitacora` VALUES (2521, '/rol', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:46');
INSERT INTO `bitacora` VALUES (2522, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:50');
INSERT INTO `bitacora` VALUES (2523, '/user/23', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:01:52');
INSERT INTO `bitacora` VALUES (2524, '/user/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"23\",\"id_empleado_usuario\":\"2\",\"id_rol\":\"13\",\"email\":\"cimacoop_colector@gmail.com\",\"password\":\"colector01\"}', 'PUT', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:02:09');
INSERT INTO `bitacora` VALUES (2525, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:02:09');
INSERT INTO `bitacora` VALUES (2526, '/user/1', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:02:18');
INSERT INTO `bitacora` VALUES (2527, '/user/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"1\",\"id_empleado_usuario\":\"1\",\"id_rol\":\"2\",\"email\":\"caja_cimacoop@gmail.com\",\"password\":\"caja01\"}', 'PUT', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:02:32');
INSERT INTO `bitacora` VALUES (2528, '/user', '[]', 'GET', 1, 'Caja 01', 'nulfito@hotmail.com', '2024-10-07 20:02:32');
INSERT INTO `bitacora` VALUES (2529, '/dashboard', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:02:49');
INSERT INTO `bitacora` VALUES (2530, '/clientes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:02:54');
INSERT INTO `bitacora` VALUES (2531, '/dashboard', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:09:57');
INSERT INTO `bitacora` VALUES (2532, '/asociados', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:00');
INSERT INTO `bitacora` VALUES (2533, '/asociados/solicitud/3', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:04');
INSERT INTO `bitacora` VALUES (2534, '/asociados/solicitud/3', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:07');
INSERT INTO `bitacora` VALUES (2535, '/tipoCuenta', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:25');
INSERT INTO `bitacora` VALUES (2536, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:31');
INSERT INTO `bitacora` VALUES (2537, '/creditos/solicitudes/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:33');
INSERT INTO `bitacora` VALUES (2538, '/clientes/getClienteData/2', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:36');
INSERT INTO `bitacora` VALUES (2539, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:10:45');
INSERT INTO `bitacora` VALUES (2540, '/referencias/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:11:06');
INSERT INTO `bitacora` VALUES (2541, '/referencias/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre\":\"Marta Alicia Jandres\",\"parentesco\":null,\"telefono\":\"76227690\",\"direccion\":\"B. Concepcion\",\"lugar_trabajo\":\"Comerciante\",\"observaciones\":null}', 'POST', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:11:53');
INSERT INTO `bitacora` VALUES (2542, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:11:54');
INSERT INTO `bitacora` VALUES (2543, '/referencias/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:11:55');
INSERT INTO `bitacora` VALUES (2544, '/referencias/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre\":\"Lorena Urrutia\",\"parentesco\":null,\"telefono\":\"6048-9756\",\"direccion\":\"B. Concepcion\",\"lugar_trabajo\":\"Estudiante\",\"observaciones\":null}', 'POST', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:27');
INSERT INTO `bitacora` VALUES (2545, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:28');
INSERT INTO `bitacora` VALUES (2546, '/referencias/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:30');
INSERT INTO `bitacora` VALUES (2547, '/referencias/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre\":\"Yesenia Carolina\",\"parentesco\":null,\"telefono\":\"7868-6209\",\"direccion\":\"B. Concepcion\",\"lugar_trabajo\":\"Comerciante\",\"observaciones\":null}', 'POST', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:57');
INSERT INTO `bitacora` VALUES (2548, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:57');
INSERT INTO `bitacora` VALUES (2549, '/referencias/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:12:58');
INSERT INTO `bitacora` VALUES (2550, '/referencias/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"nombre\":\"Katherine Garc\\u00eda\",\"parentesco\":null,\"telefono\":\"7748-0638\",\"direccion\":\"Col. Espa\\u00f1a\",\"lugar_trabajo\":\"Comerciante\",\"observaciones\":null}', 'POST', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:13:28');
INSERT INTO `bitacora` VALUES (2551, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:13:29');
INSERT INTO `bitacora` VALUES (2552, '/referencias/1', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:13:39');
INSERT INTO `bitacora` VALUES (2553, '/referencias/put', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"PUT\",\"id\":\"1\",\"nombre\":\"Luis Arnulfo M\\u00e1rquez Argueta\",\"parentesco\":null,\"telefono\":\"26541561\",\"direccion\":\"San Miguel\",\"lugar_trabajo\":\"Computec\",\"observaciones\":\"ninguna\"}', 'PUT', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:13:43');
INSERT INTO `bitacora` VALUES (2554, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:13:43');
INSERT INTO `bitacora` VALUES (2555, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:14:04');
INSERT INTO `bitacora` VALUES (2556, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:14:24');
INSERT INTO `bitacora` VALUES (2557, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:14:50');
INSERT INTO `bitacora` VALUES (2558, '/referencias', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:14:55');
INSERT INTO `bitacora` VALUES (2559, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:15:12');
INSERT INTO `bitacora` VALUES (2560, '/creditos/solicitudes/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:15:13');
INSERT INTO `bitacora` VALUES (2561, '/creditos/solicitudes/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:20:57');
INSERT INTO `bitacora` VALUES (2562, '/creditos/solicitudes/add', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:21:15');
INSERT INTO `bitacora` VALUES (2563, '/clientes/getClienteData/2', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:26:44');
INSERT INTO `bitacora` VALUES (2564, '/creditos/solicitudes/referencias/add/2/42ca4b90-6882-463b-84fd-8130e3433f5d/14', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:27:32');
INSERT INTO `bitacora` VALUES (2565, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:27:32');
INSERT INTO `bitacora` VALUES (2566, '/creditos/solicitudes/referencias/add/3/42ca4b90-6882-463b-84fd-8130e3433f5d/8', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:27:42');
INSERT INTO `bitacora` VALUES (2567, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:27:42');
INSERT INTO `bitacora` VALUES (2568, '/creditos/solicitudes/referencias/add/4/42ca4b90-6882-463b-84fd-8130e3433f5d/32', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:33');
INSERT INTO `bitacora` VALUES (2569, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:33');
INSERT INTO `bitacora` VALUES (2570, '/creditos/solicitudes/referencias/add/5/42ca4b90-6882-463b-84fd-8130e3433f5d/31', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:48');
INSERT INTO `bitacora` VALUES (2571, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:48');
INSERT INTO `bitacora` VALUES (2572, '/creditos/solicitudes/add', '{\"_token\":\"ivaW8cSoNsPj2ZA8sA2BFu4KClHKjuXuzu6oMyLB\",\"_method\":\"POST\",\"id_solicitud\":\"42ca4b90-6882-463b-84fd-8130e3433f5d\",\"tasa_interes_deposito\":null,\"fecha_solicitud\":\"2024-08-08\",\"id_cliente\":\"2\",\"fecha_nacimiento\":\"1985-02-07\",\"genero\":\"0\",\"dui_cliente\":\"037457783\",\"fecha_expedicion\":\"2020-02-12\",\"telefono\":\"78944554\",\"nacionalidad\":\"SALVADORE\\u00d1A\",\"estado_civil\":\"SOLTERA\",\"direccion_personal\":\"BARRIO CONCEPCION, 23 CALLE OTE PSE MERLIOT, SAN MIGUEL\",\"nombre_negocio\":\"VENTA DE FRUTAS Y VERDURA\",\"direccion_negocio\":\"San Francisco Gotera\",\"tipo_vivienda\":\"0\",\"observaciones\":null,\"id_empleado\":\"2\",\"monto_solicitado\":\"500\",\"plazo\":\"12\",\"tasa\":\"42\",\"cuota\":\"51.74\",\"seguro_deuda\":\"0\",\"aportaciones\":\"10\",\"destino\":\"69\",\"tipo_garantia\":\"7\",\"garantia\":null,\"id_conyugue\":null,\"empresa_labora\":null,\"cargo\":null,\"sueldo_conyugue\":null,\"tiempo_laborando\":null,\"telefono_trabajo\":null,\"sueldo_solicitante\":\"0\",\"comisiones\":\"0\",\"negocio_propio\":\"1008\",\"otros_ingresos\":\"100\",\"total_ingresos\":\"1108\",\"gastos_vida\":\"400\",\"pagos_obligaciones\":\"250\",\"gastos_negocios\":\"250\",\"otros_gastos\":\"0\",\"total_gasto\":\"900\",\"id_referencia\":\"5\",\"parentesco_id\":\"31\",\"clase_propiedad\":null,\"direccion_bien\":null,\"valor_bien\":null,\"hipotecado_bien\":\"0\"}', 'POST', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:56');
INSERT INTO `bitacora` VALUES (2573, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:28:56');
INSERT INTO `bitacora` VALUES (2574, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:29:02');
INSERT INTO `bitacora` VALUES (2575, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:29:02');
INSERT INTO `bitacora` VALUES (2576, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:29:02');
INSERT INTO `bitacora` VALUES (2577, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:34:10');
INSERT INTO `bitacora` VALUES (2578, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:34:46');
INSERT INTO `bitacora` VALUES (2579, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:34:47');
INSERT INTO `bitacora` VALUES (2580, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:34:47');
INSERT INTO `bitacora` VALUES (2581, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:36:08');
INSERT INTO `bitacora` VALUES (2582, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:36:08');
INSERT INTO `bitacora` VALUES (2583, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:36:09');
INSERT INTO `bitacora` VALUES (2584, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:39:27');
INSERT INTO `bitacora` VALUES (2585, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:40:31');
INSERT INTO `bitacora` VALUES (2586, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:41:29');
INSERT INTO `bitacora` VALUES (2587, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:41:29');
INSERT INTO `bitacora` VALUES (2588, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:41:29');
INSERT INTO `bitacora` VALUES (2589, '/creditos/solicitudes/referencias/add/1/42ca4b90-6882-463b-84fd-8130e3433f5d/3', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:41:37');
INSERT INTO `bitacora` VALUES (2590, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:41:37');
INSERT INTO `bitacora` VALUES (2591, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:42:41');
INSERT INTO `bitacora` VALUES (2592, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:42:42');
INSERT INTO `bitacora` VALUES (2593, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:42:42');
INSERT INTO `bitacora` VALUES (2594, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:07');
INSERT INTO `bitacora` VALUES (2595, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:11');
INSERT INTO `bitacora` VALUES (2596, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:53');
INSERT INTO `bitacora` VALUES (2597, '/creditos/solicitudes/edit/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:56');
INSERT INTO `bitacora` VALUES (2598, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:57');
INSERT INTO `bitacora` VALUES (2599, '/creditos/solicitudes/bienes/getBienes/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:43:57');
INSERT INTO `bitacora` VALUES (2600, '/creditos/solicitudes/referencias/quitar/29', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:00');
INSERT INTO `bitacora` VALUES (2601, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:00');
INSERT INTO `bitacora` VALUES (2602, '/creditos/solicitudes/referencias/quitar/28', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:03');
INSERT INTO `bitacora` VALUES (2603, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:03');
INSERT INTO `bitacora` VALUES (2604, '/creditos/solicitudes/referencias/quitar/27', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:06');
INSERT INTO `bitacora` VALUES (2605, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:07');
INSERT INTO `bitacora` VALUES (2606, '/creditos/solicitudes/referencias/add/4/42ca4b90-6882-463b-84fd-8130e3433f5d/34', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:19');
INSERT INTO `bitacora` VALUES (2607, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:19');
INSERT INTO `bitacora` VALUES (2608, '/creditos/solicitudes/referencias/add/5/42ca4b90-6882-463b-84fd-8130e3433f5d/34', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:25');
INSERT INTO `bitacora` VALUES (2609, '/creditos/solicitudes/referencias/getReferencias/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:25');
INSERT INTO `bitacora` VALUES (2610, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:44:32');
INSERT INTO `bitacora` VALUES (2611, '/clientes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:53:26');
INSERT INTO `bitacora` VALUES (2612, '/clientes/2', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:53:28');
INSERT INTO `bitacora` VALUES (2613, '/clientes/2', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:54:32');
INSERT INTO `bitacora` VALUES (2614, '/clientes/2', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 20:55:41');
INSERT INTO `bitacora` VALUES (2615, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:00:38');
INSERT INTO `bitacora` VALUES (2616, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:01:45');
INSERT INTO `bitacora` VALUES (2617, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:02:07');
INSERT INTO `bitacora` VALUES (2618, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:02:38');
INSERT INTO `bitacora` VALUES (2619, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:03:36');
INSERT INTO `bitacora` VALUES (2620, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:06:19');
INSERT INTO `bitacora` VALUES (2621, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:09:08');
INSERT INTO `bitacora` VALUES (2622, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:10:32');
INSERT INTO `bitacora` VALUES (2623, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:10:58');
INSERT INTO `bitacora` VALUES (2624, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:11:43');
INSERT INTO `bitacora` VALUES (2625, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:12:23');
INSERT INTO `bitacora` VALUES (2626, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:13:57');
INSERT INTO `bitacora` VALUES (2627, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:14:05');
INSERT INTO `bitacora` VALUES (2628, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:14:33');
INSERT INTO `bitacora` VALUES (2629, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:15:27');
INSERT INTO `bitacora` VALUES (2630, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:15:52');
INSERT INTO `bitacora` VALUES (2631, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:16:05');
INSERT INTO `bitacora` VALUES (2632, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:16:06');
INSERT INTO `bitacora` VALUES (2633, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:16:09');
INSERT INTO `bitacora` VALUES (2634, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:21:19');
INSERT INTO `bitacora` VALUES (2635, '/creditos/solicitudes', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:27:09');
INSERT INTO `bitacora` VALUES (2636, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:27:12');
INSERT INTO `bitacora` VALUES (2637, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:27:47');
INSERT INTO `bitacora` VALUES (2638, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:41:37');
INSERT INTO `bitacora` VALUES (2639, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:42:15');
INSERT INTO `bitacora` VALUES (2640, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:44:08');
INSERT INTO `bitacora` VALUES (2641, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:44:21');
INSERT INTO `bitacora` VALUES (2642, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:44:54');
INSERT INTO `bitacora` VALUES (2643, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:45:09');
INSERT INTO `bitacora` VALUES (2644, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:46:34');
INSERT INTO `bitacora` VALUES (2645, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:47:18');
INSERT INTO `bitacora` VALUES (2646, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:47:37');
INSERT INTO `bitacora` VALUES (2647, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:48:06');
INSERT INTO `bitacora` VALUES (2648, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:48:22');
INSERT INTO `bitacora` VALUES (2649, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:48:41');
INSERT INTO `bitacora` VALUES (2650, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:50:48');
INSERT INTO `bitacora` VALUES (2651, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:51:30');
INSERT INTO `bitacora` VALUES (2652, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:51:48');
INSERT INTO `bitacora` VALUES (2653, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:52:26');
INSERT INTO `bitacora` VALUES (2654, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:52:48');
INSERT INTO `bitacora` VALUES (2655, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:53:01');
INSERT INTO `bitacora` VALUES (2656, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:58:55');
INSERT INTO `bitacora` VALUES (2657, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 21:59:23');
INSERT INTO `bitacora` VALUES (2658, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:00:03');
INSERT INTO `bitacora` VALUES (2659, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:00:31');
INSERT INTO `bitacora` VALUES (2660, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:01:15');
INSERT INTO `bitacora` VALUES (2661, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:01:36');
INSERT INTO `bitacora` VALUES (2662, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:02:00');
INSERT INTO `bitacora` VALUES (2663, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:02:28');
INSERT INTO `bitacora` VALUES (2664, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:02:49');
INSERT INTO `bitacora` VALUES (2665, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:03:04');
INSERT INTO `bitacora` VALUES (2666, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:03:21');
INSERT INTO `bitacora` VALUES (2667, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:03:38');
INSERT INTO `bitacora` VALUES (2668, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:03:46');
INSERT INTO `bitacora` VALUES (2669, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:04:16');
INSERT INTO `bitacora` VALUES (2670, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:04:37');
INSERT INTO `bitacora` VALUES (2671, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:05:10');
INSERT INTO `bitacora` VALUES (2672, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:05:19');
INSERT INTO `bitacora` VALUES (2673, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:05:33');
INSERT INTO `bitacora` VALUES (2674, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:05:45');
INSERT INTO `bitacora` VALUES (2675, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:06:05');
INSERT INTO `bitacora` VALUES (2676, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:06:31');
INSERT INTO `bitacora` VALUES (2677, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:07:13');
INSERT INTO `bitacora` VALUES (2678, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:07:41');
INSERT INTO `bitacora` VALUES (2679, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:08:32');
INSERT INTO `bitacora` VALUES (2680, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:08:51');
INSERT INTO `bitacora` VALUES (2681, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:09:02');
INSERT INTO `bitacora` VALUES (2682, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:09:29');
INSERT INTO `bitacora` VALUES (2683, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:09:37');
INSERT INTO `bitacora` VALUES (2684, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:09:55');
INSERT INTO `bitacora` VALUES (2685, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:10:16');
INSERT INTO `bitacora` VALUES (2686, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:10:50');
INSERT INTO `bitacora` VALUES (2687, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:18:23');
INSERT INTO `bitacora` VALUES (2688, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:18:32');
INSERT INTO `bitacora` VALUES (2689, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:18:45');
INSERT INTO `bitacora` VALUES (2690, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:19:35');
INSERT INTO `bitacora` VALUES (2691, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:19:46');
INSERT INTO `bitacora` VALUES (2692, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:20:08');
INSERT INTO `bitacora` VALUES (2693, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:20:33');
INSERT INTO `bitacora` VALUES (2694, '/creditos/solicitud/42ca4b90-6882-463b-84fd-8130e3433f5d', '[]', 'GET', 22, 'Gerencia', 'gerencia_cimacoop@gmail.com', '2024-10-07 22:20:53');

-- ----------------------------
-- Table structure for bobeda
-- ----------------------------
DROP TABLE IF EXISTS `bobeda`;
CREATE TABLE `bobeda`  (
  `id_bobeda` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `saldo_bobeda` decimal(10, 2) NULL DEFAULT NULL,
  `estado_bobeda` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_bobeda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bobeda
-- ----------------------------
INSERT INTO `bobeda` VALUES (2, 'Bovéda General', 49635.00, 1, '0023-07-15 00:00:00', '2024-10-06 13:12:09');

-- ----------------------------
-- Table structure for bobeda_movimientos
-- ----------------------------
DROP TABLE IF EXISTS `bobeda_movimientos`;
CREATE TABLE `bobeda_movimientos`  (
  `id_bobeda_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_bobeda` int NULL DEFAULT NULL,
  `id_caja` int NULL DEFAULT NULL,
  `tipo_operacion` int NULL DEFAULT NULL COMMENT '1-traslado 2-recepcion 3-Apertura 4-Cierre',
  `monto` decimal(10, 2) NOT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-enviada \r\n2-recibida\r\n3-cancelada\r\n4-anulada',
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_empleado` int NULL DEFAULT NULL,
  `fecha_operacion` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_bobeda_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bobeda_movimientos
-- ----------------------------
INSERT INTO `bobeda_movimientos` VALUES (1, 2, 0, 3, 50135.00, NULL, 2, 'inicio de oepraciones', 9, '2024-10-06 13:11:42', '2024-10-06 13:11:42', '2024-10-06 13:11:42');
INSERT INTO `bobeda_movimientos` VALUES (2, 2, 1, 1, 500.00, NULL, 2, 'Inico de oepraciones', 9, '2024-10-06 13:12:09', '2024-10-06 13:12:09', '2024-10-06 13:12:18');

-- ----------------------------
-- Table structure for cajas
-- ----------------------------
DROP TABLE IF EXISTS `cajas`;
CREATE TABLE `cajas`  (
  `id_caja` int NOT NULL AUTO_INCREMENT,
  `numero_caja` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado_caja` int NULL DEFAULT NULL COMMENT '0- cerrada 1-aperturada',
  `id_usuario_asignado` int NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_caja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cajas
-- ----------------------------
INSERT INTO `cajas` VALUES (0, '0', 0, 4, 0.00, '2023-06-16 12:25:03', '2023-06-16 12:25:03');
INSERT INTO `cajas` VALUES (1, 'Caja # 01', 1, 9, 500.00, '2023-06-14 16:47:11', '2024-10-06 13:12:18');
INSERT INTO `cajas` VALUES (2, 'Caja # 02', 0, 20, 0.00, '2023-06-14 16:50:02', '2023-09-13 10:50:19');

-- ----------------------------
-- Table structure for catalogo
-- ----------------------------
DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE `catalogo`  (
  `id_cuenta` int NOT NULL AUTO_INCREMENT,
  `id_cuenta_padre` int NULL DEFAULT NULL,
  `numero` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `tipo_catalogo` int NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `movimiento` int NULL DEFAULT NULL,
  `iva` int NULL DEFAULT NULL,
  `tipo_reporte` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL COMMENT 'Balance de Situación (B), \r\nEstado de Resultados (E) \r\nCuenta de Orden (O).',
  `tipo_saldo_normal` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL COMMENT 'Indica si el saldo de la cuenta es acreedor o deudor.\r\nSi el Tipo Detallado de la cuenta es Activo o Gasto el saldo normal es Deudor (D).\r\nSi el Tipo Detallado de la cuenta es Pasivo, Capital o Ingreso el saldo normal es Acreedor (A).\r\n',
  `codigo_agrupador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL COMMENT 'Codigo de la cuenta mayor cuenta padre primeros 4 diigitos',
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1245 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of catalogo
-- ----------------------------
INSERT INTO `catalogo` VALUES (1, NULL, '1', 'ACTIVO', 1, 12977.20, 0, 0, 'O', 'A', NULL, 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (2, 1, '11', 'ACTIVOS DE INTERMEDIACIÓN', 1, 12176.20, 0, 0, 'O', 'A', '1', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (3, 2, '1101', 'EFECTIVO Y EQUIVALENTES DE EFECTIVO', 1, -80979.25, 0, 0, 'O', 'A', '11', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (4, 3, '110101', 'EFECTIVO', 1, 10211.41, 0, 0, 'O', 'A', '1101', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (5, 4, '11010101', 'CAJA GENERAL', 1, 6584.23, 1, 0, 'O', 'A', '1101', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (6, 4, '11010102', 'CAJA CHICA', 1, 0.00, 1, 0, 'O', 'A', '1101', 1, NULL, '2023-08-24 09:44:14');
INSERT INTO `catalogo` VALUES (7, 4, '11010103', 'NUMERARIO EN RESERVA', 1, 0.00, 1, 0, 'O', 'A', '1101', 1, NULL, '2023-08-24 09:44:25');
INSERT INTO `catalogo` VALUES (8, 3, '110102', 'DEPÓSITOS EN ASOCIACIONES COOPERATIVAS Y FEDERACIONES', 1, 0.00, 0, 0, 'O', 'A', '1101', 1, NULL, '2023-08-24 09:45:21');
INSERT INTO `catalogo` VALUES (10, 3, '11010201', 'CUENTAS DE AHORRO', 1, 0.00, 1, 0, 'O', 'A', '1101', 1, NULL, '2023-08-24 09:47:33');
INSERT INTO `catalogo` VALUES (11, 3, '11010202', 'DEPÓSITOS A PLAZO', 1, -975.00, 1, 0, 'O', 'A', '1101', 1, NULL, '2023-11-20 12:16:53');
INSERT INTO `catalogo` VALUES (12, NULL, '110103', 'DEPÓSITOS EN OTRAS INSTITUCIONES FINANCIERAS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-24 09:03:21');
INSERT INTO `catalogo` VALUES (13, NULL, '11010301', 'CUENTAS CORRIENTES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (14, NULL, '1101030101', 'BANCO ATLANTIDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (15, NULL, '11010302', 'CUENTAS DE AHORRO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (16, NULL, '11010303', 'DEPÓSITOS A PLAZO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (17, NULL, '110104', 'OPERACIONES DE REPORTO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (18, NULL, '11010401', 'EMITIDOS POR EL BANCO CENTRAL DE RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (19, NULL, '11010402', 'EMITIDOS POR ENTIDADES DEL ESTADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (20, NULL, '11010403', 'EMITIDOS POR OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (22, NULL, '110105', 'EFECTIVO RESTRIGIDO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (23, NULL, '11010501', 'CUENTAS CORRIENTES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (24, NULL, '11010502', 'CUENTAS DE AHORRO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (25, NULL, '11010503', 'DEPÓSITOS A PLAZO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (26, 2, '1102', 'ACTIVOS FINANCIEROS NEGOCIABLES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (27, 26, '110201', 'VALORES REPRESENTATIVOS DE DEUDA', 1, 0.00, 0, 0, 'O', 'A', '1102', 1, NULL, '2023-08-24 09:47:57');
INSERT INTO `catalogo` VALUES (28, NULL, '11020101', 'EMITIDOS POR EL BANCO CENTRAL DE RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (29, NULL, '11020102', 'EMITIDOS POR ENTIDADES DEL ESTADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (30, NULL, '11020103', 'EMITIDOS POR BANCOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (31, NULL, '110202', 'ADQUISICIÓN TEMPORAL DE DOCUMENTOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (32, NULL, '11020201', 'EMITIDOS POR EL BANCO CENTRAL DE RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (33, NULL, '11020202', 'EMITIDOS POR ENTIDADES DEL ESTADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (34, NULL, '11020203', 'EMITIDOS POR BANCOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (35, NULL, '110203', 'PROVISIÓN PARA VALUACIÓN DE ACTIVOS FINANCIEROS NEGOCIABLES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (37, NULL, '11020301', 'PROVISIÓN PARA VALUACIÓN DE ACTIVOS FINANCIEROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (38, NULL, '110204', 'DETERIORO DE ACTIVOS FINANCIEROS NEGOCIABLES (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (40, NULL, '110205', 'DETERIORO DE ACTIVOS FINANCIEROS NEGOCIABLES (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (42, NULL, '1103', 'INVERSIONES MANTENIDAS HASTA EL VENCIMIENTO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (43, NULL, '110301', 'VALORES REPRESENTATIVOS DE DEUDA', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (44, NULL, '11030101', 'EMITIDOS POR EL BANCO CENTRAL DE RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (45, NULL, '11030102', 'EMITIDOS POR ENTIDADES DEL ESTADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (46, NULL, '11030103', 'EMITIDOS POR BANCOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (47, NULL, '110302', 'ADQUISICIÓN TEMPORAL DE DOCUMENTOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (48, NULL, '11030201', 'EMETIDOS POR EL BANCO CENTRAL DE RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (49, NULL, '11030202', 'EMITIDOS POR ENTIDADES DEL ESTADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (50, NULL, '11030203', 'EMITIDOS POR BANCOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (51, NULL, '110303', 'PROVISIÓN PARA VALUACIÓN DE INVERSIONES MANTENIDAS HASTA EL VENCIMIENTO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (53, NULL, '11030301', 'PROVISIÓN PARA VALUACION DE ACTIVOS FINANCIEROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (54, NULL, '110304', 'DETERIORO DE INVERSIONES MANTENIDAS HASTA EL VENCIMIENTO (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (56, NULL, '11030401', 'DETERIORO DE ACTIVOS FINANCIEROS NEGOCIABLES (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (58, 2, '1104', 'PRESTAMOS POR COBRAR', 1, 1948.64, 0, 0, 'O', 'A', '11', 1, NULL, '2024-08-15 09:12:30');
INSERT INTO `catalogo` VALUES (59, 58, '110401', 'PRESTAMOS PACTADOS HASTA UN AÑO PLAZO', 1, 448.26, 0, 0, '1', NULL, NULL, 1, NULL, '2023-09-30 10:40:53');
INSERT INTO `catalogo` VALUES (60, 58, '11040101', 'PRESTAMOS PARA CONSUMO', 1, 763.94, 1, 0, 'O', 'A', '1104', 1, NULL, '2024-08-15 09:12:30');
INSERT INTO `catalogo` VALUES (61, 59, '11040102', 'PRESTAMOS PARA COMERCIO', 1, 3000.00, 1, 0, 'O', 'A', '1104', 1, NULL, '2024-08-15 14:52:08');
INSERT INTO `catalogo` VALUES (62, NULL, '11040103', 'PRESTAMOS PARA SERVICIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (63, NULL, '11040104', 'PRESTAMOS PARA VIVIENDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (64, NULL, '11040105', 'PRESTAMOS PARA PRODUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (65, NULL, '11040106', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (66, NULL, '11040107', 'DESEMBOLSOS Y RECUPERACIONES POR APLICAR', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (67, 58, '110402', 'PRESTAMOS PACTADOS A MAS DE UN AÑO PLAZO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 14:42:19');
INSERT INTO `catalogo` VALUES (68, 58, '11040201', 'PRESTAMOS PARA CONSUMO', 1, 0.00, 1, 0, 'O', 'A', '1104', 1, NULL, '2023-08-24 09:50:50');
INSERT INTO `catalogo` VALUES (69, NULL, '11040202', 'PRESTAMOS PARA COMERCIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (70, NULL, '11040203', 'PRESTAMOS PARA SERVICIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (71, NULL, '11040204', 'PRESTAMOS PARA VIVIENDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (72, NULL, '11040205', 'PRESTAMOS PARA PRODUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (73, NULL, '11040206', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (74, 58, '110403', 'PRESTAMOS VENCIDOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 14:42:51');
INSERT INTO `catalogo` VALUES (75, NULL, '11040301', 'PRESTAMOS PARA CONSUMO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (76, NULL, '11040302', 'PRESTAMOS PARA COMERCIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (77, NULL, '11040303', 'PRESTAMOS PARA SERVICIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (78, NULL, '11040304', 'PRESTAMOS PARA VIVIENDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (79, NULL, '11040305', 'PRESTAMOS PARA PRODUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (80, NULL, '11040306', 'PRESTAMOS PARA LIQUIDEZ OROTATIVOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (81, NULL, '110404', 'PRESTAMOS EN COBRO JUDICIAL', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (82, NULL, '11040401', 'PRESTAMOS PARA CONSUMO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (83, NULL, '11040402', 'PRESTAMOS PARA COMERCIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (84, NULL, '11040403', 'PRESTAMOS PARA SERVICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (85, NULL, '11040404', 'PRESTAMOS PARA VIVIENDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (86, NULL, '11040405', 'PRESTAMOS PARA PRODUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (87, NULL, '11040406', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (88, NULL, '110409', 'ESTIMACION PARA INCOBRABILIDAD DE PRESTAMOS (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (89, NULL, '11040901', 'PRESTAMOS PARA CONSUMO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (90, NULL, '11040902', 'PRESTAMOS PARA COMERCIO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (91, NULL, '11040903', 'PRESTAMOS PARA SERVICIO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (92, NULL, '11040904', 'PRESTAMOS PARA VIVIENDA (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (93, NULL, '11040905', 'PRESTAMOS PARA PRODUCCION (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (94, NULL, '11040906', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (95, NULL, '1105', 'INTERESES POR COBRAR', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (96, NULL, '110501', 'PRESTAMOS PARA CONSUMO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (97, NULL, '110502', 'PRESTAMOS PARA COMERCIO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (98, NULL, '110503', 'PRESTAMOS PARA SERVICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (99, NULL, '110504', 'PRESTAMOS PARA VIVIENDA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (100, NULL, '110505', 'PRESTAMOS PARA PRODUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (101, NULL, '110506', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (102, NULL, '110509', 'ESTIMACION PARA INCOBRABILIDAD DE INTERESES (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (103, NULL, '11050901', 'PRESTAMOS PARA CONSUMO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (105, NULL, '11050902', 'PRESTAMOS PARA COMERCIO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (106, NULL, '11050903', 'PRESTAMOS PARA SERVICIO (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (107, NULL, '11050904', 'PRESTAMOS PARA VIVIENDA (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (108, NULL, '11050905', 'PRESTAMOS PARA PRODUCCION (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (109, NULL, '11050906', 'PRESTAMOS PARA LIQUIDEZ O ROTATIVOS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:17');
INSERT INTO `catalogo` VALUES (110, 1, '12', 'OTROS ACTIVOS', 1, 0.00, 0, 0, 'O', 'A', '1', 1, NULL, '2023-08-28 12:43:27');
INSERT INTO `catalogo` VALUES (111, 110, '1201', 'CUENTAS POR COBRAR', 1, 0.00, 0, 0, 'O', 'A', '12', 1, NULL, '2023-08-28 12:18:43');
INSERT INTO `catalogo` VALUES (112, 111, '120101', 'CUENTAS POR COBRAR A PARTES RELACIONADAS', 1, 0.00, 0, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:44:15');
INSERT INTO `catalogo` VALUES (113, 112, '12010101', 'CUERPOS DIRECTIVOS', 1, 0.00, 0, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:44:31');
INSERT INTO `catalogo` VALUES (114, 113, '1201010101', 'CONSEJO DE ADMINISTRACION', 1, 0.00, 1, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:44:49');
INSERT INTO `catalogo` VALUES (115, 113, '1201010102', 'JUNTA DE VIGILANCIA', 1, 0.00, 1, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:45:02');
INSERT INTO `catalogo` VALUES (116, 112, '1201010103', 'COMITÉS DE APOYO', 1, 0.00, 1, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:45:24');
INSERT INTO `catalogo` VALUES (117, 112, '12010102', 'EMPLEADOS', 1, 0.00, 0, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:46:05');
INSERT INTO `catalogo` VALUES (118, 117, '1201010201', 'FALTANTES DE CAJA', 1, 0.00, 1, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 12:46:35');
INSERT INTO `catalogo` VALUES (119, NULL, '1201010202', 'FALTANTE DE NUMERARIO EN RESERVA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (120, NULL, '1201010203', 'OTRO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (121, NULL, '12010103', 'ENTIDADES ASOCIADAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (122, NULL, '120102', 'CUENTAS POR COBRAR A ASOCIADOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (123, NULL, '12010201', 'CAPITAL SUSCRITO NO PAGADO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (124, NULL, '120103', 'CUENTAS POR COBRAR A TERCEROS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (125, NULL, '12010301', 'ANTICIPOS A PROVEEDORES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (126, NULL, '1201030101', 'ARTURO LARIN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (127, NULL, '1201030102', 'IMPRENTA RM', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (128, NULL, '1201030103', 'NEGOCIOS DE ORIENTE, S.A. DE C.V.', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (129, NULL, '12010302', 'DEPÓSITOS EN GARANTÍA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (130, NULL, '12010303', 'OTROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (131, NULL, '120104', 'PAGOS POR CUENTA AJENA', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (132, NULL, '12010401', 'GASTOS DE OTRAS OPERACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (133, NULL, '12010402', 'HONORARIOS PROFESIONALES COSTAS PROCÉSALES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (134, NULL, '12010403', 'OTROS DEUDORES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (135, NULL, '120105', 'SERVICIOS FINANCIEROS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (136, NULL, '12010501', 'TRÁMITES JURÍDICOS POR PERCIBIR', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (137, NULL, '12010502', 'OTROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (138, NULL, '120106', 'OTRAS CUENTAS POR COBRAR', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (139, NULL, '12010601', 'COSTAS PROCÉSALES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (140, NULL, '12010602', 'CHEQUES RECHAZADOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (141, NULL, '120109', 'ESTIMACION PARA CUENTAS INCOBRABLES (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (142, NULL, '12010901', 'CUENTAS POR COBRAR A PARTES RELACIONADAS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (143, NULL, '12010902', 'CUENTAS POR COBRAR A ASOCIADOS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (144, NULL, '12010903', 'CUENTAS POR COBRAR A TERCEROS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (145, NULL, '12010904', 'OTRO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (146, 110, '1202', 'ACTIVOS POR IMPUESTOS CORRIENTES', 1, 0.00, 0, 0, 'O', 'A', '12', 1, NULL, '2023-08-28 12:18:53');
INSERT INTO `catalogo` VALUES (147, 146, '120201', 'PAGO A CUENTA', 1, 0.00, 0, 0, 'O', 'A', '1202', 1, NULL, '2023-08-28 12:44:03');
INSERT INTO `catalogo` VALUES (148, 112, '12020101', 'PERIODO CORRIENTE', 1, 0.00, 1, 0, 'O', 'A', '1201', 1, NULL, '2023-08-28 13:10:37');
INSERT INTO `catalogo` VALUES (149, NULL, '12020102', 'REMANENTE PERIODOS ANTERIORES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (150, NULL, '12020103', 'OTROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (151, NULL, '120202', 'RETENCION DE IMPUESTO SOBRE LA RENTA', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (152, NULL, '12020201', 'TEMPORAL O PERMANENTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (153, NULL, '120203', 'IVA CRÉDITO FISCAL', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (154, NULL, '12020301', 'CRÉDITO FISCAL POR COMPRAS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (155, 146, '1202030101', 'COMPRAS INTERNAS', 1, 0.00, 1, 0, 'O', 'A', '1202', 1, NULL, '2023-08-27 08:31:40');
INSERT INTO `catalogo` VALUES (157, NULL, '1202030102', 'COMPRAS EXTERNAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (158, NULL, '12020302', 'RETENCIÓN 1%', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (159, NULL, '12020303', 'PERCEPCIÓN 1%', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (160, NULL, '12020304', 'REMANENTE PRÓXIMO PERIODO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (161, NULL, '12020305', 'CRÉDITO FISCAL PENDIENTE DE APLICAR', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (162, NULL, '1203', 'EXISTENCIAS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (163, NULL, '120301', 'ARTICULOS PROMOCIONALES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (164, NULL, '120302', 'PAPELERIA, ÚTILES Y ENSERES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (165, NULL, '120303', 'PLÁSTICOS Y MATERIALES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (166, NULL, '120304', 'ESTIMACION POR OBSOLESCENCIA DE EXISTENCIAS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (167, NULL, '120305', 'DETERIORO DE EXISTENCIAS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (168, NULL, '1204', 'GASTOS PAGADOS POR ANTICIPOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (169, NULL, '120401', 'SEGUROS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (170, NULL, '12040101', 'SEGURO CONTRA INCENDIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (171, NULL, '12040102', 'SEGURO CONTRA DAÑOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (172, NULL, '12040103', 'SEGURO CONTRA ROBOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (173, NULL, '12040104', 'OTROS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (174, NULL, '120402', 'ARRENDAMIENTOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (175, NULL, '12040201', 'ARRENDAMIENTO DE LOCALES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (176, NULL, '12040202', 'ARRENDAMIENTO DE EQUIPOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (177, NULL, '120403', 'PUBLICIDAD Y PROPAGANDA', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (178, NULL, '12040301', 'MEDIOS PUBLICITARIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (179, NULL, '120404', 'MEMBRESÍAS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (180, NULL, '12040401', 'EMISOR DE TARJETAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (181, NULL, '1205', 'ACTIVOS POR IMPUESTOS DIFERIDOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (182, NULL, '120501', 'IMPUESTOS SOBRE LA RENTA DIFERIDO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (183, NULL, '1206', 'INVERSIONES Y OTRAS PARTICIPACIONES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (184, NULL, '120601', 'INVERSIONES Y OTRAS PARTICIPACIONES', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (185, NULL, '12060101', 'INVERSIONES EN NEGOCIOS CONJUNTOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (186, NULL, '120602', 'PARTICIPACIONES Y OTROS DERECHOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (187, NULL, '12060201', 'FEDERACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (188, NULL, '12060202', 'ASOCIACIONES COOPERATIVAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (189, NULL, '12060203', 'OTRAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (190, 1, '13', 'ACTIVOS FÍSICOS E INTANGIBLES', 1, 0.00, 0, 0, 'O', 'A', '1', 1, NULL, '2023-08-28 12:17:07');
INSERT INTO `catalogo` VALUES (191, 190, '1301', 'PROPIEDADES, PLANTA Y EQUIPO', 1, 0.00, 0, 0, 'O', 'A', '13', 1, NULL, '2023-08-28 12:17:25');
INSERT INTO `catalogo` VALUES (192, 191, '130101', 'TERRENOS', 1, 0.00, 0, 0, 'O', 'A', '1301', 1, NULL, '2023-08-28 12:19:31');
INSERT INTO `catalogo` VALUES (193, NULL, '13010101', 'VALOR DE ADQUISICION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (194, NULL, '13010102', 'ADICIONES Y MEJORAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (195, NULL, '13010103', 'REVALÚO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (196, NULL, '130102', 'EDIFICIOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (197, NULL, '13010201', 'VALOR DE ADQUISICIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (198, NULL, '13010202', 'ADICIONES Y MEJORAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (199, NULL, '13010203', 'REVALÚO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (200, NULL, '130103', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (201, 191, '130104', 'MOBILIARIO Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, 'O', 'A', '1301', 1, NULL, '2023-08-27 08:31:58');
INSERT INTO `catalogo` VALUES (202, NULL, '130105', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (203, NULL, '130106', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (204, NULL, '130107', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (205, NULL, '130108', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (206, NULL, '130109', 'DEPRECIACIÓN ACUMULADA (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (207, NULL, '13010901', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (209, NULL, '13010902', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (210, NULL, '13010903', 'MOBILIARIO Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (211, NULL, '13010904', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (212, NULL, '13010905', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (213, NULL, '13010906', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (214, NULL, '13010907', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (215, NULL, '130110', 'DETERIORO DE PROPIEDAD, PLANTA Y EQUIPO (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (216, NULL, '13011001', 'TERRENOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (217, NULL, '13011002', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (218, NULL, '13011003', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (219, NULL, '13011004', 'MOBILIARIOS Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (220, NULL, '13011005', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (221, NULL, '13011006', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (222, NULL, '13011007', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (223, NULL, '13011008', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (224, NULL, '1302', 'PROPIEDADES, PLANTA Y EQUIPO EN ARRENDAMIENTOS FINANCIEROS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (226, NULL, '130201', 'TERRENOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (227, NULL, '130202', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (228, NULL, '130203', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (229, NULL, '130204', 'MOBILIARIO Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (230, NULL, '130205', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (231, NULL, '130206', 'MAQUINARIA Y EQUIPO DE CONSTRUCCION', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (232, NULL, '130207', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (233, NULL, '130208', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (234, NULL, '130209', 'DEPRECIACIÓN ACUMULADA EN ARRENDAMIENTO FINANCIERO (R)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (236, NULL, '13020901', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (237, NULL, '13020902', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (238, NULL, '13020903', 'MOBILIARIO Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (239, NULL, '13020904', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (240, NULL, '13020905', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (241, NULL, '13020906', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (242, NULL, '13020907', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (243, NULL, '130210', 'DETERIORO DE PROPIEDAD, PLANTA Y EQUIPO (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (244, NULL, '13021001', 'TERRENOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (245, NULL, '13021002', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (246, NULL, '13021003', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (247, NULL, '13021004', 'MOBILIARIO Y EQUIPO DE OFICINA', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (248, NULL, '13021005', 'MOBILIARIO Y EQUIPO SALA DE VENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (249, NULL, '13021006', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (250, NULL, '13021007', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (251, NULL, '13021008', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (252, NULL, '1303', 'PROPIEDADES DE INVERSIÓN', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (253, NULL, '130301', 'TERRENOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (254, NULL, '130302', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (255, 190, '1304', 'ACTIVOS INTANGIBLES', 1, 0.00, 0, 0, 'O', 'A', '13', 1, NULL, '2023-08-28 12:19:15');
INSERT INTO `catalogo` VALUES (256, NULL, '130401', 'DERECHO DE LLAVE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (257, NULL, '130402', 'PATENTES Y MARCAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (258, NULL, '130403', 'LICENCIAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (259, NULL, '130404', 'SOFTWARE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (261, NULL, '130405', 'AMORTIZACIÓN ACUMULADA DE ACTIVOS INTANGIBLES (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (263, NULL, '13040501', 'DERECHO DE LLAVE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (264, NULL, '13040502', 'PATENTES Y MARCAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (265, NULL, '13040503', 'LICENCIAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (266, NULL, '13040505', 'SOFTWARE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (267, NULL, '130406', 'DETERIORO DE ACTIVOS INTANGIBLES (CR)', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (268, NULL, '13040601', 'DERECHO DE LLAVE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (269, NULL, '13040602', 'PATENTES Y MARCAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (270, NULL, '13040603', 'LICENCIAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (271, NULL, '13040605', 'SOFTWARE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (272, NULL, '130407', 'ACTIVOS INTANGIBLES EN DESARROLLO', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (273, NULL, '13040701', 'PATENTES Y MARCAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (274, NULL, '13040702', 'SOFTWARE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (275, NULL, '1305', 'ACTIVOS RECIBIDOS EN PAGO O ADJUDICADOS', 1, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (276, NULL, '130501', 'TERRENOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (277, NULL, '130502', 'EDIFICIOS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (278, NULL, '130503', 'INSTALACIONES', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (279, NULL, '130504', 'MOBILIARIO Y EQUIPO', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (280, NULL, '130505', 'MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (281, NULL, '130506', 'EQUIPO DE TRANSPORTE', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (282, NULL, '130507', 'HERRAMIENTAS', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (283, NULL, '130508', 'ESTIMACIÓN DE PERDIDA EN VENTA DE ACTIVOS (CR)', 1, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (284, NULL, '2', 'PASIVO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (285, NULL, '21', 'PASIVOS DE INTERMEDIACIÓN', 2, -7876.00, 0, 0, '1', NULL, NULL, 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (286, 285, '2101', 'DEPÓSITO DE AHORRO', 2, -7876.00, 0, 0, 'O', 'A', '21', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (287, NULL, '210101', 'DEPÓSITO DE AHORRO A LA VISTA', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (288, 286, '21010101', 'DEPÓSITOS DE ASOCIADOS', 2, -5896.00, 1, 0, 'O', 'A', '2101', 1, NULL, '2024-09-25 12:18:47');
INSERT INTO `catalogo` VALUES (289, NULL, '21010102', 'OTROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (290, 286, '210102', 'DEPÓSITOS PACTADOS HASTA UN AÑO PLAZO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (291, NULL, '21010201', 'DEPÓSITOS DE ASOCIADOS', 2, -1000.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-09-18 11:44:19');
INSERT INTO `catalogo` VALUES (292, NULL, '2101020101', 'DEPÓSITOS DE 15 A 30 DÍAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (293, NULL, '2101020102', 'DEPOSITOS A 60 DIAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (294, NULL, '2101020103', 'DEPOSITOS A 90 DIAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (295, NULL, '2101020104', 'DEPOSITOS A 120 DIAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (296, NULL, '2101020105', 'DEPOSITOS A 180 DIAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (297, NULL, '2101020106', 'DEPOSITOS A MAS DE 180 DIAS PLAZO Y MENORES A 360 DIAS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (299, 286, '2101020107', 'DEPOSITOS A 360 DIAS PLAZO', 2, -2000.00, 1, 0, 'O', 'A', '2101', 1, NULL, '2023-09-18 11:20:56');
INSERT INTO `catalogo` VALUES (300, NULL, '2101020108', 'DEPOSITOS DE AHORRO PROGRAMADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (301, 286, '210103', 'DEPOSITOS PACTADOS A MAS DE UNA AÑO PLAZO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-21 19:07:18');
INSERT INTO `catalogo` VALUES (302, NULL, '21010301', 'DEPOSITOS DE ASOCIADOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (303, 286, '2101030101', 'DEPOSITOS PACTADOS A MAS DE UNA AÑO PLAZO', 2, 0.00, 1, 0, 'O', 'A', '2101', 1, NULL, '2023-09-04 18:41:30');
INSERT INTO `catalogo` VALUES (304, NULL, '2101030102', 'DEPOSITOS DE AHORRO PROGRAMADO A MAS DE UN AÑO PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (306, NULL, '210104', 'DEPOSITOS RESTRINGIDOS E INACTIVOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (307, NULL, '21010401', 'DEPOSITOS EN GARANTIA - CUENTA DE AHORRO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (308, NULL, '21010402', 'DEPOSITOS EN GARANTIA - AHORRO PROGRAMADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (309, NULL, '21010403', 'DEPOSITOS EN GARANTIA - DEPOSITOS A PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (310, NULL, '21010404', 'DEPOSITOS EMBARGADOS - CUENTA DE AHORRO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (311, NULL, '21010405', 'DEPOSITOS EMBARGADOS - AHORRO PROGRAMADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (313, NULL, '21010406', 'DEPOSITOS EMBARGADOS - DEPOSITOS A PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (314, NULL, '21010407', 'DEPOSITOS BLOQUEADOS - CUENTA DE AHORRO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (315, NULL, '21010408', 'DEPOSITOS BLOQUEADOS - AHORRO PROGRAMADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (316, NULL, '21010409', 'DEPOSITOS BLOQUEADOS - DEPOSITOS A PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (317, NULL, '21010410', 'DEPOSITOS INACTIVOS - CUENTA DE AHORRO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (318, NULL, '2102', 'PRESTAMOS POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (319, NULL, '210201', 'PRESTAMOS PACTADOS HASTA UN AÑO PLAZO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (320, NULL, '21020101', 'ASOCIACIONES COOPERATIVAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (321, NULL, '21020102', 'OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (322, NULL, '21020103', 'ENTIDADES DEL ESTADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (323, NULL, '21020104', 'EMPRESAS PRIVADAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (324, NULL, '21020105', 'PARTICULARES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (325, NULL, '21020106', 'ENTIDADES EXTRANJERAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (326, NULL, '210202', 'PRESTAMOS PACTADOS DE UN AÑO A CINCO AÑOS PLAZOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (328, NULL, '21020201', 'ASOCIACIONES COOPERATIVAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (329, NULL, '21020202', 'OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (330, NULL, '21020203', 'ENTIDADES DEL ESTADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (331, NULL, '21020204', 'EMPRESAS PRIVADAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (332, NULL, '21020205', 'PARTICULARES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (333, NULL, '21020206', 'ENTIDADES EXTRAJERAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (334, NULL, '210203', 'PRESTAMOS PACTADOS MAYORES DE CINCO AÑOS PLAZO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (336, NULL, '21020301', 'ASOCIACIONES COOPERATIVAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (337, NULL, '21020302', 'OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (338, NULL, '21020303', 'ENTIDADES DEL ESTADO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (339, NULL, '21020304', 'EMPRESAS PRIVADAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (340, NULL, '21020305', 'PARTICULARES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (341, NULL, '21020306', 'ENTIDADES EXTRANJERAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (342, 285, '2103', 'INTERESES Y OTROS POR PAGAR', 2, 0.00, 0, 0, 'O', 'A', '21', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (343, NULL, '210301', 'INTERESES POR PAGAR DEPOSITOS DE AHORRO', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (344, NULL, '21030101', 'DEPOSITOS A LA VISTA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (345, NULL, '21030102', 'DEPOSITOS PACTADOS HASTA UN AÑO PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (346, NULL, '21030103', 'DEPOSITOS PACTADOS A MAS DE UN AÑO PLAZO', 2, -975.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-09-18 14:01:08');
INSERT INTO `catalogo` VALUES (347, NULL, '210302', 'INTERESES POR PAGAR POR PRESTAMOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (348, NULL, '21030201', 'PRESTAMOS PACTADOS HASTA UN AÑO PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (349, NULL, '21030202', 'PRESTAMOS PACTADOS DE UN AÑO A CINCO AÑOS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (351, NULL, '21030203', 'PRESTAMOS PACTADOS MAYORES DE CINCO AÑOS PLAZO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (353, NULL, '210303', 'OTROS POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (354, NULL, '21030301', 'COMISIONES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (355, 342, '21030302', 'SEGUROS', 2, -72.00, 1, 0, 'O', 'A', '2103', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (356, NULL, '21030303', 'RECARGOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (357, NULL, '2104', 'OBLIGACIONES A LA VISTA', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (358, NULL, '210401', 'MILLAS Y PUNTOS POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (359, NULL, '21040101', 'MILLAS POR PAGAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (360, NULL, '21040102', 'PUNTOS POR PAGAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (361, NULL, '210402', 'COBROS POR CUENTA AJENA', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (362, NULL, '21040201', 'COBRANZAS LOCALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (363, NULL, '21040202', 'COBRANZAS DEL EXTERIOR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (364, NULL, '21040203', 'IMPUESTOS Y SERVICIOS PUBLICOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (366, NULL, '210403', 'TRANSFERENCIAS DE FONDOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (367, NULL, '21040301', 'TRANSFERENCIAS LOCALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (368, NULL, '210404', 'REMESAS FAMILIARES DEL EXTERIOR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (369, NULL, '21040401', 'ESTADOS UNIDOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (370, NULL, '21040402', 'CANADÁ', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (371, NULL, '22', 'OTROS PASIVOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (372, 371, '2201', 'CUENTAS Y DOCUMENTOS POR PAGAR', 2, 0.00, 0, 0, 'O', 'A', '22', 1, NULL, '2023-08-28 12:20:51');
INSERT INTO `catalogo` VALUES (373, NULL, '220101', 'CUENTAS POR PAGAR A TERCEROS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (374, NULL, '22010101', 'SOBREGIROS BANCARIOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (375, NULL, '22010102', 'PROVEEDORES', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (376, NULL, '2201010201', 'NACIONALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (377, NULL, '2201010202', 'EXTRANJEROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (378, NULL, '22010103', 'ACREEDORES POR PAGAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (379, NULL, '22010104', 'DEPOSITOS EN GARANTIA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (380, NULL, '22010105', 'APORTACIONES POR PAGAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (381, NULL, '22010106', 'OTRAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (382, NULL, '220102', 'CUENTAS POR PAGAR PARTES RELACIONADAS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (383, NULL, '22010201', 'CUERPOS DIRECTIVOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (384, NULL, '2201020101', 'CONSEJO DE ADMINISTRACION', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (385, NULL, '2201020102', 'JUNTA DE VIGILANCIA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (386, NULL, '22010202', 'COMITES DE APOYO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (387, NULL, '22010203', 'EMPLEADOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (388, NULL, '2201020301', 'GERENCIALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (389, NULL, '2201020302', 'OPERATIVOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (390, NULL, '220103', 'CUENTAS POR PAGAR A ASOCIADOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (391, NULL, '22010301', 'EXCEDENTES POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (392, NULL, '22010302', 'OTRAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (393, NULL, '220104', 'PASIVOS TRANSITORIOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (394, NULL, '22010401', 'INGRESOS POR APLICAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (395, NULL, '22010402', 'VALORES A REINTEGRAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (396, NULL, '22010403', 'SOBRANTES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (397, NULL, '22010404', 'DERECHOS REGISTRALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (398, NULL, '22010405', 'COLECTURIAS Y PAGADURIAS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (399, NULL, '22010406', 'OTROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (400, NULL, '220105', 'DOCUMENTOS POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (401, NULL, '22010501', 'PAGARES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (402, NULL, '22010502', 'LETRAS DE CAMBIO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (403, 371, '2202', 'RETENCIONES Y PROVISIONES', 2, 0.00, 0, 0, 'O', 'A', '22', 1, NULL, '2023-08-28 12:21:01');
INSERT INTO `catalogo` VALUES (404, NULL, '220201', 'RETENCIONES', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (405, NULL, '22020101', 'IMPUESTO SOBRE LA RENTA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (406, NULL, '22020102', 'ISSS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (407, NULL, '22020103', 'AFP´S', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (408, NULL, '22020104', 'FONDO SOCIAL PARA LA VIVIENDA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (409, NULL, '22020105', 'PROCURADURIA GENERAL DE LA REPUBLICA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (410, NULL, '22020106', 'PRESTAMOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (411, NULL, '22020107', 'OTROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (412, NULL, '220202', 'PROVISIONES', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (413, NULL, '22020201', 'SUELDOS Y SALARIOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (414, NULL, '22020202', 'VACACIONES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (415, NULL, '22020203', 'AGUINALDOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (416, NULL, '22020204', 'INDEMNIZACIONES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (418, NULL, '22020205', 'CUOTAS PATRONALES', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (419, NULL, '2202020501', 'ISSS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (420, NULL, '2202020502', 'AFP´S', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (421, NULL, '22020206', 'GASTOS DE ASAMBLEA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (422, NULL, '22020207', 'FONDO DE EDUCACION', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (423, NULL, '22020208', 'LITIGIOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (424, NULL, '22020209', 'OTROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (425, NULL, '2203', 'PASIVOS POR IMPUESTOS CORRIENTES', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (426, NULL, '220301', 'IVA DEBITO FISCAL', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (427, NULL, '22030101', 'DEBITO FISCAL', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (428, 427, '2203010101', 'FACTURAS', 2, -31.78, 1, 1, 'O', 'A', '2203', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (429, NULL, '2203010102', 'COMPROBANTE DE CREDITO FISCAL', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (430, NULL, '22030102', 'RETENCION 1%', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (431, NULL, '22030103', 'PERCEPCION 1%', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (432, NULL, '220302', 'IMPUESTOS POR PAGAR', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (433, NULL, '22030201', 'IMPUESTO IVA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (434, NULL, '22030202', 'IMPUESTO SOBRE LA RENTA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (435, NULL, '22030203', 'IMPUESTOS MUNICIPALES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (436, NULL, '22030204', 'PAGO A CUENTA', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (437, NULL, '22030205', 'OTROS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (438, NULL, '2204', 'OBLIGACIONES POR PAGAR POR ARRENDAMIENTOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (439, NULL, '220401', 'OBLIGACIONES POR PAGAR POR ARRENDAMIENTO FINANCIERO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (441, NULL, '220402', 'OBLIGACIONES POR PAGAR POR ARRENDAMIENTO OPERATIVO', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (443, NULL, '2205', 'PASIVOS POR IMPUESTOS DIFERIDOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (444, NULL, '220501', 'IMPUESTO SOBRE LA RENTA DIFERIDO POR PAGAR', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (445, NULL, '2206', 'PASIVOS ASOCIADOS CON ACTIVOS NO CORRIENTES EN VENTA', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (447, NULL, '220601', 'PASIVOS ASOCIADOS CON ACTIVOS NO CORRIENTES EN VENTA', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (449, NULL, '22060101', 'ASOCIADOS CON ACTIVOS RECIBIDOS EN PAGO ADJUDICADOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (451, NULL, '23', 'PASIVOS DIFERIDOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (452, NULL, '2301', 'INTERESES POR REFINANCIAMIENTO DE PRESTAMOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (453, NULL, '230101', 'INTERESES POR REFINANCIAMIENTO DE PRESTAMOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (454, NULL, '2302', 'INGRESOS PERCIBIDOS NO DEVENGADOS', 2, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (455, NULL, '230201', 'OPERACIONES DE PRESTAMOS', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (456, NULL, '230202', 'OTRAS OPERACIONES', 2, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (457, NULL, '3', 'PATRIMONIO', 3, -56.00, 0, 0, '1', NULL, NULL, 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (458, 457, '31', 'CAPITAL SOCIAL COOPERATIVO', 3, -56.00, 0, 0, 'O', 'A', '3', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (459, 458, '3101', 'APORTACIONES', 3, -56.00, 0, 0, 'O', 'A', '31', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (460, 459, '310101', 'APORTACIONES PAGADAS', 3, -123.50, 1, 1, 'O', 'A', '3101', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (461, 459, '310102', 'APORTACIONES NO PAGADAS', 3, 0.00, 1, 0, 'O', 'A', '3101', 1, NULL, '2023-08-28 12:21:37');
INSERT INTO `catalogo` VALUES (462, NULL, '32', 'RESERVAS', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (463, NULL, '3201', 'RESERVA LEGAL', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (464, NULL, '320101', 'RESERVA LEGAL', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (465, NULL, '3202', 'RESERVAS INSTITUCIONALES', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (466, NULL, '320201', 'RESERVA PARA ESTABILIZACION DE CAPITAL', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:18');
INSERT INTO `catalogo` VALUES (467, 457, '33', 'RESULTADOS POR APLICAR', 3, 0.00, 0, 0, 'O', 'A', '3', 1, NULL, '2023-08-28 12:22:00');
INSERT INTO `catalogo` VALUES (468, 467, '3301', 'EXCEDENTES POR APLICAR', 3, 0.00, 0, 0, 'O', 'A', '33', 1, NULL, '2023-08-28 12:23:19');
INSERT INTO `catalogo` VALUES (469, 468, '330101', 'EXCEDENTES DEL PRESENTE EJERCICIO', 3, 0.00, 1, 0, 'O', 'A', '3301', 1, NULL, '2023-08-28 12:24:46');
INSERT INTO `catalogo` VALUES (471, 468, '330102', 'EXCEDENTES DE EJERCICIOS ANTERIORES', 3, 0.00, 1, 0, 'O', 'A', '3301', 1, NULL, '2023-08-28 12:24:32');
INSERT INTO `catalogo` VALUES (472, 467, '3302', 'PERDIDA POR APLICAR (CR)', 3, 0.00, 0, 0, 'O', 'A', '33', 1, NULL, '2023-08-28 09:56:20');
INSERT INTO `catalogo` VALUES (473, 472, '330201', 'PERDIDA DEL PRESENTE EJERCICIO (CR)', 3, 0.00, 1, 0, 'O', 'A', '3302', 1, NULL, '2023-08-28 12:24:00');
INSERT INTO `catalogo` VALUES (474, 472, '330202', 'PERDIDA DE EJERCICIOS ANTERIORES (CR)', 3, 0.00, 1, 0, 'O', 'A', '3302', 1, NULL, '2023-08-28 12:24:16');
INSERT INTO `catalogo` VALUES (475, NULL, '34', 'PATRIMONIO RESTRINGIDO', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (476, NULL, '3401', 'DONACIONES, SUBSIDISO Y LEGADOS', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (477, NULL, '340101', 'DONACIONES', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (478, NULL, '340102', 'SUBSIDIOS', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (479, NULL, '340103', 'LEGADOS', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (480, NULL, '3402', 'SUPERÁVIT POR REVALUACIÓN DE ACTIVOS NO REALIZADOS', 3, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (482, NULL, '340201', 'TERRENOS', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (483, NULL, '340202', 'EDIFICIOS', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (484, NULL, '340203', 'OTROS', 3, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (485, NULL, '4', 'INGRESOS', 4, -40.20, 0, 0, '1', NULL, NULL, 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (486, 485, '41', 'INGRESOS DE OPERACION', 4, -40.20, 0, 0, 'O', 'A', '4', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (487, 486, '4101', 'INGRESOS POR ACTIVIDADES DE INTERMEDIACION', 4, -40.20, 0, 0, 'O', 'A', '41', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (488, 487, '410101', 'INTERESES CARTERA DE PRESTAMOS', 4, 0.00, 0, 0, 'O', 'A', '4101', 1, NULL, '2023-09-04 17:39:07');
INSERT INTO `catalogo` VALUES (489, 488, '41010101', 'INTERESES ORDINARIOS', 4, 0.00, 0, 0, 'O', 'A', '4101', 1, NULL, '2023-09-04 17:39:26');
INSERT INTO `catalogo` VALUES (490, 487, '4101010101', 'INTERESES PERCIBIDOS', 4, -0.20, 1, 0, 'O', 'A', '4101', 1, NULL, '2024-04-03 08:38:24');
INSERT INTO `catalogo` VALUES (491, 489, '4101010102', 'INTERESES POR PERCIBIR', 4, 0.00, 1, 0, 'O', 'A', '4101', 1, NULL, '2023-09-04 17:39:43');
INSERT INTO `catalogo` VALUES (492, NULL, '41010102', 'INTERESES MORATORIOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (493, 492, '4101010201', 'INTERESES PERCIBIDOS', 4, 0.00, 1, 0, 'O', 'A', '4101', 1, NULL, '2023-09-02 10:17:13');
INSERT INTO `catalogo` VALUES (494, NULL, '410102', 'COMISIONES', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (495, 487, '41010201', 'COMISIONES POR OTORGAMIENTO', 4, -154.34, 1, 1, 'O', 'A', '4101', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (496, NULL, '41010202', 'COMISIONES POR ADMINISTRACION DEL CREDITO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (497, NULL, '41010203', 'COMISIONES POR DESEMBOLSO EXTRA FINANCIMIENTO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (498, NULL, '41010204', 'COMISIONES SEGURO DE ROBO Y FRAUDE', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (499, NULL, '41010205', 'COMISIONES O PRIMAS POR OPERACIONES TEMPORALES CON DOCUMENTOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (501, 487, '41010206', 'OTRAS', 4, -40.00, 1, 0, 'O', 'A', '4101', 1, NULL, '2023-11-20 12:16:53');
INSERT INTO `catalogo` VALUES (502, 487, '41010207', 'COMISION INFORED', 4, -12.50, 1, 1, 'O', 'A', '4101', 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (503, NULL, '410103', 'INTERESES CARTERA DE INVERSIONES FINANCIERAS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (504, NULL, '41010301', 'ACTIVOS FINANCIEROS NEGOCIABLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (505, NULL, '410104', 'REVERSION DE PROVISIONES Y DETERIORO DE ACTIVOS FINANCIEROS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (507, NULL, '41010401', 'ACTRIVOS FINANCIEROS NEGOCIABLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (508, NULL, '41010402', 'LIBERACION DE PROVISIONES DE SANEAMIENTO POR INCOBRABILIDAD DE PRESTAMOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (510, NULL, '41010403', 'LIBERACION DE PROVISIONES DE SANEAMIENTO POR INCOBRABILIDAD DE INTERESES DE PRESTAMOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (512, NULL, '41010404', 'REVERSION DETERIORO DE PRESTAMOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (513, NULL, '410105', 'RECUPERACIONES DE ACTIVOS FINANCIEROS INCOBRABLES O SANEADOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (515, NULL, '41010501', 'RECUPERACIONES DE CREDITOS E INTERESES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (516, NULL, '41010502', 'RECUPERACIONES DE INVERSIONES FINANCIERAS E INTERESES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (518, NULL, '41010503', 'RECUPERACIONES DE GASTOS SOBRE PRESTAMOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (519, NULL, '410106', 'INTERESES SOBRE DEPOSITOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (520, NULL, '41010601', 'DEPOSITOS EN ASOCIACIONES COOPERATIVAS Y FEDERACIONES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (522, NULL, '41010602', 'DEPOSITOS EN INSTITUCIONES FINANCIERAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (523, NULL, '41010603', 'OPERACIONES DE REPORTO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (525, NULL, '41010604', 'EFECTIVO RESTRINGIDO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (526, NULL, '4102', 'INGRESO DE OTRAS OPERACIONES DE INTERMEDIACION', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (527, NULL, '410201', 'GANANCIA POR VENTA DE INVERSIONES FINANCIERAS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (528, NULL, '41020101', 'GANANCIA POR VENTA DE ACTIVOS FINANCIEROS NEGOCIBLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (530, NULL, '41020102', 'GANANCIA POR VENTA DE ACTIVOS FINANCIEROS MANTENIDOS HASTA EL VENCIMIENTO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (532, NULL, '410202', 'CAMBIOS EN EL VALOR RAZONABLE DE ACTIVOS Y PASIVOS FINANCIEROS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (534, NULL, '41020201', 'CAMBIOS EN EL VALOR RAZONALBE DE ACTIVOS FINANCIEROS NEGOCIABLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (536, NULL, '41020202', 'CAMBIO EN EL VALOR RAZONABLE DE ACTIVOS FINANCIEROS MANTENIDOS HASTA EL VENCIMIENTO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (538, NULL, '410203', 'SERVICIOS FINANCIEROS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (539, NULL, '41020301', 'TRAMITES JURIDICOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (540, NULL, '41020302', 'OTROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (541, NULL, '410204', 'OPERACIONES EN MONEDA EXTRANJERA', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (542, NULL, '41020401', 'UTILIDAD EN VENTA DE MONEDA EXTRANJERA', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (543, NULL, '41020402', 'COMISIONES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (544, NULL, '41020403', 'FLUCTUACIONES POR TIPO CAMBIO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (545, NULL, '410205', 'PLUSVALIA', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (546, NULL, '41020501', 'PLUSVALIA EN PARTICIPACIONES EN NEGOCIOS CONJUNTO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (548, NULL, '41020502', 'PUSVALIA EN ASOCIADAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (549, NULL, '410206', 'OTRAS COMISIONES', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (550, NULL, '41020601', 'TROQUELADO Y ENVASADO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (551, NULL, '41020602', 'DISTRIBUCION DE TARJETAS DE CREDITO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (552, NULL, '41020603', 'TRANSFERENCIA DE FONDOS AJENOS (REMESAS)', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (553, NULL, '41020604', 'COLECTURIA', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (554, NULL, '41020605', 'COMISIONES POR EMISION DE DOCUMENTOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (555, NULL, '41020606', 'COMISIONES POR CHEQUE RECHAZADO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (556, NULL, '410207', 'VENTA DE PAPELERIA', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (557, NULL, '41020701', 'VENTA DE LIBRETAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (558, NULL, '41020702', 'OTROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (559, NULL, '410208', 'GANANCIAS GENERADAS POR ENTIDADES REGISTRADAS BAJO EL METODO DE LA PARTICIPACION', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (561, NULL, '41020801', 'ASOCIADAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (562, NULL, '41020802', 'PARTICIPACIONES EN NEGOCIOS CONJUNTOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (563, NULL, '410209', 'EXCEDENTES', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (564, NULL, '41020901', 'ASOCIACIONES COOPERATIVAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (565, NULL, '41020902', 'FEDERACIONES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (566, NULL, '41020903', 'PARTICIPACIONES EN NEGOCIOS CONJUNTOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (567, NULL, '410210', 'RECARGOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (568, NULL, '41021001', 'RECARGOS SOBRE CREDITOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (569, NULL, '41021002', 'RECARGOS SOBRE DEPOSITOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (570, NULL, '4102100201', 'RECARGO POR MANEJO DE CUENTA', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (571, NULL, '4102100202', 'RECARGO POR INACTIVIDAD DE CUENTAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (572, NULL, '41021003', 'RECARGO POR SOBREGIRO (POR TARJETA DE CREDITOS)', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (574, NULL, '41021004', 'RECARGO POR LIBERACION DE FONDOS EN RESERVA', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (575, NULL, '41021005', 'OTROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (576, NULL, '410211', 'RECUPERACION DE GASTOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (577, NULL, '41021101', 'RECUPERACION DE GASTOS DE SEGUROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (579, NULL, '410212', 'OTROS DE INTERMEDIACION', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (580, NULL, '41021201', 'PONCHADORAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (581, NULL, '41021202', 'VENTA MILLAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (582, NULL, '41021203', 'INTERESES DEPOSITOS EN GARANTIA', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (583, NULL, '41021204', 'CARGO POR INACTIVIDAD DE TARJETA DE CREDITO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (584, NULL, '41021205', 'INSPECCIONES Y AVALÚOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (585, NULL, '42', 'INGRESOS DE NO OPERACION', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (586, NULL, '4201', 'GANANCIA EN VENTA DE ACTIVOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (587, NULL, '420101', 'PROPIEDAD, PLANTA Y EQUIPO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (588, NULL, '420102', 'PROPIEDADES DE INVERSION', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (589, NULL, '420103', 'ACTIVOS INTANGIBLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (590, NULL, '420104', 'ACTIVOS RECIBIDOS EN PAGO O ADJUDICADOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (591, NULL, '4202', 'INGRESOS POR EXPLOTACION DE ACTIVOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (592, NULL, '420201', 'PROPIEDAD, PLANTA Y EQUIPO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (593, NULL, '420202', 'PROPIEDADES DE INVERSION', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (594, NULL, '420203', 'REEMBOLSO DE GASTOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (595, NULL, '420204', 'OTROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (596, NULL, '4203', 'SUBVENCIONES', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (597, NULL, '420301', 'RELACIONADOS CON ACTIVOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (598, NULL, '420302', 'RELACIONADOS CON INGRESOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (599, NULL, '4204', 'REVERSION DE DETERIORO DE VALOR DE ACTIVOS', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (600, NULL, '420401', 'PROPIEDAD, PLANTA Y EQUIPO', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (601, NULL, '420402', 'PROPIEDADES DE INVERSION', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (602, NULL, '420403', 'ACTIVOS INTANGIBLES', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (603, NULL, '4205', 'OTROS INGRESOS DE NO OPERACION', 4, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (604, NULL, '420501', 'LIBERACION DE PROVISION DE ACTIVOS EXTRAORDINARIOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (606, NULL, '420502', 'INDEMNIZACIONES DE ASEGURADORAS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (607, NULL, '420503', 'LITIGIOS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (608, NULL, '420504', 'SOBRANTES DE CAJEROS', 4, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (609, NULL, '5', 'COSTOS Y GASTOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (610, 609, '51', 'COSTOS POR ACTIVIDADES DE INTERMEDIACION', 5, 0.00, 0, 0, 'O', 'A', '5', 1, NULL, '2023-08-26 12:31:51');
INSERT INTO `catalogo` VALUES (611, 610, '5101', 'CAPTACIÓN DE DEPÓSITOS', 5, 0.00, 0, 0, 'O', 'A', '51', 1, NULL, '2023-08-26 12:32:47');
INSERT INTO `catalogo` VALUES (612, 611, '510101', 'INTERESES SOBRE DEPÓSITOS DE AHORRO', 5, 0.00, 0, 0, 'O', 'A', '5101', 1, NULL, '2023-08-26 12:32:58');
INSERT INTO `catalogo` VALUES (613, 612, '51010101', 'AHORRO A LA VISTA', 5, 0.00, 1, 0, 'O', 'A', '5101', 1, NULL, '2023-08-26 12:33:10');
INSERT INTO `catalogo` VALUES (614, 612, '51010102', 'AHORRO PROGRAMADO', 5, 0.00, 1, 0, 'O', 'A', '5101', 1, NULL, '2023-08-26 12:36:05');
INSERT INTO `catalogo` VALUES (615, 611, '510102', 'INTERESES SOBRE DEPÓSITOS A PLAZO', 5, 0.00, 1, 0, 'O', 'A', '5101', 1, NULL, '2023-08-28 12:25:59');
INSERT INTO `catalogo` VALUES (616, 611, '510103', 'PREMIOS CUENTAS DE AHORRO', 5, 0.00, 1, 0, 'O', 'A', '5101', 1, NULL, '2023-08-28 12:26:13');
INSERT INTO `catalogo` VALUES (617, 611, '510104', 'SEGUROS SOBRE DEPÓSITOS', 5, 0.00, 1, 0, 'O', 'A', '5101', 1, NULL, '2023-08-28 12:26:27');
INSERT INTO `catalogo` VALUES (618, 610, '5102', 'COSTOS POR PRESTAMOS OBTENIDOS', 5, 0.00, 0, 0, 'O', 'A', '51', 1, NULL, '2023-08-26 12:35:14');
INSERT INTO `catalogo` VALUES (619, 618, '510201', 'DE ENTIDADES DEL SISTEMA FINANCIERO', 5, 0.00, 0, 0, 'O', 'A', '5102', 1, NULL, '2023-08-28 12:27:06');
INSERT INTO `catalogo` VALUES (620, NULL, '51020101', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (621, NULL, '51020102', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (622, NULL, '51020103', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (623, NULL, '51020104', 'EVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (624, NULL, '51020105', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (625, NULL, '510202', 'DE OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (626, NULL, '51020201', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (627, NULL, '51020202', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (628, NULL, '51020203', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (629, NULL, '51020204', 'EVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (631, NULL, '51020205', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (632, NULL, '510203', 'DE ENTIDADES DEL ESTADO', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (633, NULL, '51020301', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (634, NULL, '51020302', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (635, NULL, '51020303', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (636, NULL, '51020304', 'AVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (637, NULL, '51020305', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (638, NULL, '510204', 'DE EMPRESAS PRIVADAS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (639, NULL, '51020401', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (640, NULL, '51020403', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (641, NULL, '51020404', 'AVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (642, NULL, '51020405', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (643, NULL, '510205', 'DE PARTICULARES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (644, NULL, '51020501', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (645, NULL, '51020502', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (646, NULL, '51020503', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (647, NULL, '51020504', 'AVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (648, NULL, '51020505', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (649, NULL, '510206', 'DE ENTIDADES EXTRANJERAS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (650, NULL, '51020601', 'INTERESES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (651, NULL, '51020602', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (652, NULL, '51020603', 'RECARGOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (653, NULL, '51020604', 'AVALÚOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (654, NULL, '51020605', 'ESCRITURACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (655, NULL, '5103', 'PROVISIÓN DE SANEAMIENTO DE ACTIVOS DE INTERMEDIACIÓN', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (657, 655, '510301', 'SANEAMIENTO DE PRÉSTAMOS POR COBRAR', 5, 0.00, 1, 0, 'O', 'A', '5103', 1, NULL, '2023-08-28 12:25:42');
INSERT INTO `catalogo` VALUES (658, NULL, '510302', 'SANEAMIENTO DE INTERESES Y COMISIONES POR COBRAR', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (660, NULL, '510303', 'SANEAMIENTO DE COSTAS PROCÉSALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (661, NULL, '5104', 'OTRAS COMISIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (662, NULL, '510401', 'COMISIONES O PRIMAS POR OPERACIONES DE REPORTO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (663, NULL, '510402', 'COMISIONES POR TRANSFERENCIAS DE REMESAS FAMILIARES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (665, NULL, '5105', 'DETERIORO DE ACTIVOS FINANCIEROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (666, NULL, '510501', 'DETERIORO O CASTIGO DE ACTIVOS FINANCIEROS NEGOCIABLES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (668, NULL, '510502', 'DETERIORO O CASTIGO DE ACTIVOS FINANCIEROS HASTA EL VENCIMIENTO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (670, NULL, '510503', 'DETERIORO O CASTIGO DE CARTERA DE CREDITOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (671, NULL, '510504', 'DETERIORO O CASTIGO DE OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (672, NULL, '5106', 'PERDIDA POR DIFERENCIA DE PRECIOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (673, NULL, '510601', 'PERDIDA POR OPERACIONES CON TITULOS VALORES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (674, NULL, '5107', 'PERDIDA EN VENTA DE INVERSIONES FINANCIERAS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (675, NULL, '510701', 'PERDIDA EN VENTA DE ACTIVOS FINANCIEROS NEGOCIBLES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (677, NULL, '510702', 'PERDIDA EN VENTA DE ACTIVOS FINANCIEROS CONSERVADOS AL VENCIMIENTO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (679, NULL, '5108', 'CAMBIOS EN EL VALOR RAZONABLE DE ACTIVOS Y PASIVOS FINANCIEROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (681, NULL, '510801', 'CAMBIOS EN EL VALOR RAZONABLE DE ACTIVOS FINANCIEROS Y PASIVOS FINANCIEROS NEGOCIABLES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (683, NULL, '510802', 'CAMBIOS EN EL VALOR RAZONABLE DE ACTIVOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (686, NULL, '5109', 'PROGRAMAS Y PROMOCIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (687, NULL, '510901', 'MILLAS Y PUNTOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (688, NULL, '5110', 'PROMOCIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (689, NULL, '511001', 'PROMOCIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (690, NULL, '5111', 'MATERIALES TARJETAS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (691, NULL, '511101', 'PLÁSTICO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (692, NULL, '511102', 'TROQUELADO Y EMBOZADO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (693, NULL, '511103', 'IMPRESION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (694, NULL, '511104', 'DISEÑO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (695, NULL, '511105', 'OTROS MATERIALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (696, NULL, '5112', 'COMUNICACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (697, NULL, '511201', 'TELEFONOS FIJOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (698, NULL, '511202', 'TELEFONOS MOVILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (699, NULL, '511203', 'LINEAS DEDICADAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (700, NULL, '511204', 'TARJETAS PREPAGADAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (701, NULL, '511205', 'REPETIDORAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (702, NULL, '511206', 'COURIER', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (703, NULL, '511207', 'FRANQUICIAS Y ESTAMPILLAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (704, NULL, '511208', 'BEEPERS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (705, NULL, '511209', 'COMUNICACION SATELITAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (706, NULL, '511210', 'SERVICIO DE AUTORIZACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (707, NULL, '511211', 'PAGINAS WEB', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (708, NULL, '5113', 'PAPELERIA Y UTILES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (709, NULL, '511301', 'IMPRESION ESTADOS DE CUENTA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (710, NULL, '511302', 'IMPRESION CARTAS EXTRA FINANCIAMIENTO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (711, NULL, '511303', 'IMPRESION CARTAS INCREMENTO LIMITE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (712, NULL, '511304', 'IMPRESION CARTAS BIENVENIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (713, NULL, '511305', 'SOLICITUDES DE CREDITO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (714, NULL, '511306', 'CONTRATOS DE CREDITO Y PAGARE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (715, NULL, '511307', 'SOBRES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (716, NULL, '5114', 'COBRANZAS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (717, NULL, '511401', 'COMISIONES POR EMBARGO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (718, NULL, '511402', 'COBROS MEDIANTE ABOGADOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (719, NULL, '5115', 'SEGUROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (720, NULL, '511501', 'CONTRA ROBO Y EXTRAVIO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (721, NULL, '511502', 'POR MUERTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (722, NULL, '511503', 'CONTRA FRAUDE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (723, NULL, '511504', 'CONTRA FALSIFICACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (724, NULL, '511505', 'PROTECCION CARTERA DE PRESTAMOS POR COBRAR', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (725, NULL, '511506', 'PROTECCION CARTERA DE AHORROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (726, 609, '52', 'COSTOS POR OTRAS ACTIVIDADES DE OPERACION', 5, 0.00, 0, 0, 'O', 'A', '5', 1, NULL, '2023-08-26 12:35:24');
INSERT INTO `catalogo` VALUES (727, NULL, '5201', 'OPERACIONES EN MONEDA EXTRAJERA', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (728, NULL, '520101', 'PERDIDA EN VENTA DE MONEDA EXTRAJERA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (729, NULL, '520102', 'COMISIONES POR COMPRA DE MONEDA EXTRAJERA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (730, NULL, '520103', 'FLUCTUACIONES DE TIPO DE CAMBIO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (731, 726, '5202', 'LICENCIAS', 5, 0.00, 0, 0, 'O', 'A', '52', 1, NULL, '2023-08-27 10:54:06');
INSERT INTO `catalogo` VALUES (732, NULL, '520201', 'LICENCIA MASTERCARD', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (733, NULL, '520202', 'LICENCIA VISA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (734, NULL, '520203', 'AMERICAN EXPRESS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (735, NULL, '520204', 'MEMBRESIAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (737, NULL, '520205', 'OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (738, NULL, '5203', 'OTROS COSTOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (739, NULL, '520301', 'PROCESAMIENTO EXTERNO MASTER CARD', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (740, NULL, '520302', 'PROCESAMIENTO EXTERNO VISA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (741, NULL, '520303', 'BURÓ DE CRÉDITO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (742, NULL, '520304', 'LIQUIDACION POR ROBO Y FRAUDE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (743, NULL, '53', 'GASTOS DE OPERACION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (744, NULL, '5301', 'GASTOS DE ORGANISMOS DE DIRECCION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (745, NULL, '530101', 'CONSEJO DE ADMINISTRACION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (746, NULL, '53010101', 'DIETAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (747, NULL, '53010102', 'TRANSPORTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (748, NULL, '53010103', 'OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (749, NULL, '530102', 'JUNTA DE VIGILANCIA', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (750, NULL, '53010201', 'DIETAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (751, NULL, '53010202', 'TRANSPORTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (752, NULL, '53010203', 'OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (753, NULL, '530103', 'COMITES DE APOYO', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (754, NULL, '53010301', 'DIETAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (755, NULL, '53010302', 'TRANSPORTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (756, NULL, '53010303', 'OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (757, 743, '5302', 'GASTOS DE FUNCIONARIOS Y EMPLEADOS', 5, 0.00, 0, 0, 'O', 'A', '53', 1, NULL, '2023-08-27 10:58:20');
INSERT INTO `catalogo` VALUES (758, NULL, '530201', 'GERENCIA', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (759, NULL, '53020101', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (760, NULL, '5302010101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (761, NULL, '5302010102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (762, NULL, '5302010103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (763, NULL, '5302010104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (764, NULL, '5302010105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (765, NULL, '53020102', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (766, NULL, '5302010201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (767, NULL, '5302010202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (768, NULL, '5302010203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (769, NULL, '5302010204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (770, NULL, '5302010205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (771, NULL, '5302010206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (772, NULL, '5302010207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (773, NULL, '5302010208', 'FONDO DE CAJEROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (774, NULL, '5302010209', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (775, NULL, '5302010210', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (776, NULL, '5302010211', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (777, NULL, '5302010212', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (778, NULL, '5302010213', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (779, NULL, '53020103', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (780, NULL, '5302010301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (781, NULL, '5302010302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (782, NULL, '5302010303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (783, NULL, '53020104', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (784, NULL, '5302010401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (785, NULL, '5302010402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (786, NULL, '53020105', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (787, NULL, '5302010501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (789, NULL, '53020106', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (790, NULL, '5302010601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (791, NULL, '5302010602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (792, NULL, '5302010603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (793, NULL, '5302010604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (794, NULL, '530202', 'CONTABILIDAD', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (795, NULL, '53020201', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (796, NULL, '5302020101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (797, NULL, '5302020102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (798, NULL, '5302020103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (799, NULL, '5302020104', 'COMISONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (800, NULL, '5302020105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (801, NULL, '53020202', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (802, NULL, '5302020201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (803, NULL, '5302020202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (804, NULL, '5302020203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (805, NULL, '5302020204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (806, NULL, '5302020205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (807, NULL, '5302020206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (808, NULL, '5302020207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (809, NULL, '5302020208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (810, NULL, '5302020209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (811, NULL, '5302020210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (812, NULL, '5302020211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (813, NULL, '5302020212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (814, NULL, '53020203', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (815, NULL, '5302020301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (816, NULL, '5302020302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (817, NULL, '5302020303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (818, NULL, '53020204', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (819, NULL, '5302020401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (820, NULL, '5302020402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (821, NULL, '53020205', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (822, NULL, '5302020501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (823, NULL, '53020206', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (824, NULL, '5302020601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (825, NULL, '5302020602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (826, NULL, '5302020603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (827, NULL, '5302020604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (828, NULL, '530203', 'CREDITOS Y COBROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (829, NULL, '53020301', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (830, NULL, '5302030101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (831, NULL, '5302030102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (832, NULL, '5302030103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (833, NULL, '5302030104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (834, NULL, '5302030105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (835, NULL, '53020302', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (836, NULL, '5302030201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (837, NULL, '5302030202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (838, NULL, '5302030203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:19');
INSERT INTO `catalogo` VALUES (839, NULL, '5302030204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (841, NULL, '5302030205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (842, NULL, '5302030206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (843, NULL, '5302030207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (844, NULL, '5302030208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (845, NULL, '5302030209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (846, NULL, '5302030210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (847, NULL, '5302030211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (848, NULL, '5302030212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (849, NULL, '53020303', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (850, NULL, '5302030301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (851, NULL, '5302030302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (852, NULL, '5302030303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (853, NULL, '53020304', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (854, NULL, '5302030401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (855, NULL, '5302030402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (856, NULL, '53020305', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (857, NULL, '5302030501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (858, NULL, '53020306', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (859, NULL, '5302030601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (860, NULL, '5302030602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (861, NULL, '5302030603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (862, NULL, '5302030604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (863, NULL, '530204', 'CAPTACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (864, NULL, '53020401', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (865, NULL, '5302040101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (866, NULL, '5302040102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (867, NULL, '5302040103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (868, NULL, '5302040104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (869, NULL, '5302040105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (870, NULL, '53020402', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (871, NULL, '5302040201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (872, NULL, '5302040202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (873, NULL, '5302040203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (874, NULL, '5302040204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (875, NULL, '5302040205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (876, NULL, '5302040206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (877, NULL, '5302040207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (878, NULL, '5302040208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (879, NULL, '5302040209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (880, NULL, '5302040210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (881, NULL, '5302040211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (882, NULL, '5302040212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (883, NULL, '53020403', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (884, NULL, '5302040301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (885, NULL, '5302040302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (886, NULL, '5302040303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (887, NULL, '53020404', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (888, NULL, '5302040401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (889, NULL, '5302040402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (890, NULL, '53020405', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (891, NULL, '5302040501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (893, NULL, '53020406', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (894, NULL, '5302040601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (895, NULL, '5302040602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (896, NULL, '5302040603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (897, NULL, '5302040604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (898, NULL, '530205', 'MERCADEO', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (899, NULL, '53020501', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (900, NULL, '5302050101', 'SUELDOS Y SALARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (901, NULL, '5302050102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (902, NULL, '5302050103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (903, NULL, '5302050104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (904, NULL, '5302050105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (905, NULL, '53020502', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (906, NULL, '5302050201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (907, NULL, '5302050202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (908, NULL, '5302050203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (909, NULL, '5302050204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (910, NULL, '5302050205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (911, NULL, '5302050206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (912, NULL, '5302050207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (913, NULL, '5302050208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (914, NULL, '5302050209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (915, NULL, '5302050210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (916, NULL, '5302050211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (917, NULL, '5302050212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (918, NULL, '53020503', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (919, NULL, '5302050301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (920, NULL, '5302050302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (921, NULL, '5302050303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (922, NULL, '53020504', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (923, NULL, '5302050401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (924, NULL, '5302050402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (925, NULL, '53020505', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (926, NULL, '5302050501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (927, NULL, '53020506', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (928, NULL, '5302050601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (929, NULL, '5302050602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (930, NULL, '5302050603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (931, NULL, '5302050604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (932, NULL, '530206', 'INFORMATICA', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (933, NULL, '53020601', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (934, NULL, '5302060101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (935, NULL, '5302060102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (936, NULL, '5302060103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (937, NULL, '5302060104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (938, NULL, '5302060105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (939, NULL, '53020602', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (940, NULL, '5302060201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (941, NULL, '5302060202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (942, NULL, '5302060203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (943, NULL, '5302060204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (945, NULL, '5302060205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (946, NULL, '5302060206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (947, NULL, '5302060207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (948, NULL, '5302060208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (949, NULL, '5302060209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (950, NULL, '5302060210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (951, NULL, '5302060211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (952, NULL, '5302060212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (953, NULL, '53020603', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (954, NULL, '5302060301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (955, NULL, '5302060302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (956, NULL, '5302060303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (957, NULL, '53020604', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (958, NULL, '5302060401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (959, NULL, '5302060402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (960, NULL, '53020605', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (961, NULL, '5302060501', 'PENSIONES Y JUBILIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (962, NULL, '53020606', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (963, NULL, '5302060601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (964, NULL, '5302060602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (965, NULL, '5302060603', 'PEPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (966, NULL, '5302060604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (967, NULL, '530207', 'CAJA', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (968, NULL, '53020701', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (969, NULL, '5302070101', 'SUELDOS ORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (970, NULL, '5302070102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (971, NULL, '5302070103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (972, NULL, '5302070104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (973, NULL, '5302070105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (974, NULL, '53020702', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (975, NULL, '5302070201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (976, NULL, '5302070202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (977, NULL, '5302070203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (978, NULL, '5302070204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (979, NULL, '5302070205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (980, NULL, '5302070206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (981, NULL, '5302070207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (982, NULL, '5302070208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (983, NULL, '5302070209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (984, NULL, '5302070210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (985, NULL, '5302070211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (986, NULL, '5302070212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (987, NULL, '53020703', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (988, NULL, '5302070301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (989, NULL, '5302070302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (990, NULL, '5302070303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (991, NULL, '53020704', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (992, NULL, '5302070401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (993, NULL, '5302070402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (994, NULL, '53020705', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (995, NULL, '5302070501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (997, NULL, '53020706', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (998, NULL, '5302070601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (999, NULL, '5302070602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1000, NULL, '5302070603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1001, NULL, '5302070604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1002, NULL, '530208', 'SERVICIOS GENERALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1003, NULL, '53020801', 'REMUNERACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1004, NULL, '5302080101', 'SUELDOS Y SALARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1005, NULL, '5302080102', 'SUELDOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1006, NULL, '5302080103', 'SUELDOS EVENTUALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1007, NULL, '5302080104', 'COMISIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1008, NULL, '5302080105', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1009, NULL, '53020802', 'PRESTACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1010, NULL, '5302080201', 'AGUINALDOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1011, NULL, '5302080202', 'BONIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1012, NULL, '5302080203', 'VACACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1013, NULL, '5302080204', 'UNIFORMES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1014, NULL, '5302080205', 'SEGURO SOCIAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1015, NULL, '5302080206', 'INSAFORP', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1016, NULL, '5302080207', 'GASTOS MEDICOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1017, NULL, '5302080208', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1018, NULL, '5302080209', 'OTROS SEGUROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1019, NULL, '5302080210', 'AFP´S', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1020, NULL, '5302080211', 'SEGURO DE VIDA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1021, NULL, '5302080212', 'OTRAS PRESTACIONES AL PERSONAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1022, NULL, '53020803', 'INDEMNIZACIONES AL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1023, NULL, '5302080301', 'POR DESPIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1024, NULL, '5302080302', 'POR INCAPACIDAD TEMPORAL', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1025, NULL, '5302080303', 'POR RETIRO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1026, NULL, '53020804', 'OTROS GASTOS DEL PERSONAL', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1027, NULL, '5302080401', 'CAPACITACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1028, NULL, '5302080402', 'GASTOS DE VIAJE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1029, NULL, '53020805', 'PENSIONES Y JUBILACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1030, NULL, '5302080501', 'PENSIONES Y JUBILACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1031, NULL, '53020806', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1032, NULL, '5302080601', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1033, NULL, '5302080602', 'VIATICOS Y TRANSPORTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1034, NULL, '5302080603', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1035, NULL, '5302080604', 'DEPRECIACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1036, 743, '5303', 'GASTOS GENERALES', 5, 0.00, 0, 0, 'O', 'A', '53', 1, NULL, '2023-08-27 10:56:08');
INSERT INTO `catalogo` VALUES (1037, NULL, '530301', 'CONSUMO DE MATERIALES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1038, NULL, '53030101', 'COMBUSTIBLE Y LUBRICANTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1039, 1036, '53030102', 'PAPELERIA Y UTILES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:32:18');
INSERT INTO `catalogo` VALUES (1040, 1036, '53030103', 'MATERIALES DE LIMPIEZA', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:32:29');
INSERT INTO `catalogo` VALUES (1041, NULL, '530302', 'REPARACIN Y MANTENIMIENTO DE ACTIVO FIJO', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1042, NULL, '53030201', 'EDIFICIOS PROPIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1043, NULL, '53030202', 'EQUIPO DE COMPUTACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1044, NULL, '53030203', 'VEHICULOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1045, NULL, '53030204', 'MOBILIARIO Y EQUIPO DE OFICINA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1046, NULL, '530303', 'SERVICIOS PUBLICOS E IMPUESTOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1047, NULL, '53030301', 'COMUNICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1049, NULL, '53030302', 'ENERGIA ELECTRICA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1050, NULL, '53030303', 'AGUA POTABLE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1051, NULL, '53030304', 'IMPUESTOS MUNICIPALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1052, NULL, '53030305', 'SERVICIOS MUNICIPALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1053, NULL, '53030306', 'IVA NO DEDUCIBLE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1054, NULL, '530304', 'PUBLICIDAD Y PROMOCION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1055, NULL, '53030401', 'TELEVISION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1056, NULL, '53030402', 'RADIO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1057, NULL, '53030403', 'PRENSA ESCRITA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1058, 1036, '53030404', 'OTROS MEDIOS', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:32:41');
INSERT INTO `catalogo` VALUES (1059, 1036, '53030405', 'ARTICULOS PROMOCIONALES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:32:53');
INSERT INTO `catalogo` VALUES (1060, NULL, '53030406', 'GASTOS DE REPRESENTACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1061, NULL, '53030407', 'CAMPÁÑA PUBLICITARIA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1062, NULL, '530305', 'ARRENDAMIENTOS Y MANTENIMIENTOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1063, 1062, '53030501', 'LOCALES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-09-08 15:03:51');
INSERT INTO `catalogo` VALUES (1064, NULL, '53030502', 'EQUIPO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1065, NULL, '53030503', 'MANTENIMIENTO DE LOCALES ARRENDADOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1066, NULL, '53030504', 'MANTENIMIENTO DE EQUIPO ARRENDADO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1067, NULL, '53030505', 'MANTENIMIENTO DE BIENES RECIBIDOS EN PAGO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1068, NULL, '530306', 'SEGUROS SOBRE BIENES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1069, NULL, '53030601', 'SOBRE ACTIVOS FIJOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1070, NULL, '53030602', 'SOBRE RIESGOS FINANCIEROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1071, NULL, '53030603', 'FIANZA DE FIDELIDAD', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1072, NULL, '530307', 'HONORARIOS PROFESIONALES', 5, -16.00, 0, 0, '1', NULL, NULL, 1, NULL, '2024-08-15 14:41:11');
INSERT INTO `catalogo` VALUES (1073, NULL, '53030701', 'AUDITORES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1074, NULL, '53030702', 'ABOGADOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1075, NULL, '53030703', 'EMPRESAS CONSULTORAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1076, NULL, '53030704', 'ASESORES INDEPENDIENTES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1077, NULL, '53030705', 'OTROS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1078, NULL, '530308', 'DEPRECIACIONES Y AMORTIZACIONES', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1079, NULL, '53030801', 'EDIFICACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1080, NULL, '53030802', 'EQUIPO DE COMPUTACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1081, NULL, '53030803', 'EQUIPO DE OFICINA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1082, NULL, '53030804', 'MOBILIARIO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1083, NULL, '53030805', 'VEHICULOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1084, NULL, '53030806', 'MAQUINARIA, EQUIPO Y HERRAMIENTAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1085, NULL, '53030807', 'REMODELACION Y READECUACIONES EN LOCALES PROPIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1087, NULL, '53030808', 'CONSTRUCCIONES EN LOCALES ARRENDADOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1088, NULL, '53030809', 'OBRAS DE ARTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1089, NULL, '53030810', 'BIBLIOTECA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1090, NULL, '53030811', 'ARRENDAMIENTO FINANCIERO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1091, NULL, '53030812', 'EQUIPO DE SEGURIDAD', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1092, NULL, '53030813', 'ENSERES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1093, NULL, '53030814', 'INSTALACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1094, NULL, '53030815', 'SOFTWARE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1095, NULL, '53030816', 'LICENCIAS INFORMATICAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1096, NULL, '530309', 'OTROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1097, NULL, '53030901', 'SERVICIOS DE SEGURIDAD', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1098, NULL, '53030902', 'SUSCRIPCIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1099, 1036, '53030903', 'CONTRIBUCIONES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:33:04');
INSERT INTO `catalogo` VALUES (1101, NULL, '53030904', 'PUBLICACIONES Y CONVOCATORIAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1102, NULL, '53030905', 'SERVICIO DE TRASLADO DE VALORES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1103, NULL, '53030906', 'GASTOS DE ORGANIZACION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1104, NULL, '53030907', 'GASTOS DE ASAMBLEA', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1105, NULL, '53030908', 'FESTEJO NAVIDEÑO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1106, NULL, '53030909', 'RELACIONES PUBLICAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1107, 1036, '53030910', 'ATENCIONES Y RECREACIONES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:33:15');
INSERT INTO `catalogo` VALUES (1108, NULL, '53030911', 'RIESGOS COOPERATIVOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1109, 1036, '53030912', 'ANIVERSARIOS Y FESTIVIDADES', 5, 0.00, 1, 0, 'O', 'A', '5303', 1, NULL, '2023-08-27 08:33:41');
INSERT INTO `catalogo` VALUES (1110, NULL, '53030913', 'REMODELACIONES DE INSTALACIONES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1111, NULL, '53030914', 'GASTOS FUNERALES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1112, NULL, '53030915', 'MANTENIMIENTO DE SISTEMAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1113, 609, '54', 'GASTOS DE NO OPERACION', 5, 0.00, 0, 0, 'O', 'A', '5', 1, NULL, '2023-08-27 11:00:04');
INSERT INTO `catalogo` VALUES (1114, 1113, '5401', 'GASTOS POR IMPUESTO SOBRE LA RENTA', 5, 0.00, 0, 0, 'O', 'A', '54', 1, NULL, '2023-08-27 11:00:38');
INSERT INTO `catalogo` VALUES (1115, NULL, '540101', 'GASTOS POR IMPUESTO SOBRE LA RENTA CORRIENTE', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1116, NULL, '540102', 'GASTOS POR IMPUESTO SOBRE LA RENTA DIFERIDO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1117, NULL, '5402', 'OTROS GASTOS DE NO OPERACION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1118, NULL, '540201', 'PERDIDA POR RETIRO O DESAPROPIACION DE ACTIVOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1119, NULL, '540202', 'PERDIDA POR DETERIORO DE ACTIVOS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1120, NULL, '54020201', 'PROPIEDAD, PLANTA Y EQUIPO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1121, NULL, '54020202', 'PROPIEDADES DE INVERSION', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1122, NULL, '54020203', 'ACTIVOS INTANGIBLES', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1123, NULL, '540203', 'PERDIDAS GENERADAS POR ENTIDADES REGISTRADAS BAJO EL METODO DE LA PARTICIPACION', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1125, NULL, '54020301', 'ASOCIADAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1126, NULL, '54020302', 'PARTICIPACIONES EN NEGOCIOS EN CONJUNTO', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1127, NULL, '540204', 'OTROS', 5, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1128, NULL, '54020401', 'PROVISIONES CONSTITUIDAS POR CASTIGO DE ACTIVOS EXTRAORDINARIOS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1130, NULL, '54020402', 'MULTAS', 5, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1131, NULL, '6', 'CUENTAS LIQUIDADORAS', 6, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1132, NULL, '61', 'PERDIDAS Y EXCEDENTES', 6, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1133, NULL, '6101', 'PERDIDAS Y EXCEDENTES', 6, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1134, NULL, '610101', 'PERDIDAS Y EXCEDENTES', 6, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1135, NULL, '7', 'CUENTAS DE ORDEN', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1137, NULL, '71', 'CUENTAS DE ORDEN DEUDORAS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1139, NULL, '7101', 'INFORMACION FINANCIERA', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1141, NULL, '710101', 'DERECHOS Y OBLIGACIONES', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1143, NULL, '71010101', 'DISPONIBILIDAD POR CREDITOS OBTENIDOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1145, NULL, '7101010101', 'OTORGADOS POR ENTIDADES DEL ESTADO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1147, NULL, '7101010102', 'OTORGADOS POR EMPRESAS PRIVADAS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1149, NULL, '7101010103', 'PARTICULARES', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1151, NULL, '7101010104', 'OTRAS ENTIDADES DEL SISTEMA FINANCIERO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1153, NULL, '7101010105', 'OTORGADOS POR BANCOS EXTRANJEROS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1155, NULL, '71010102', 'EXIGIBILIDAD POR CREDITOS OTORGADOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1157, NULL, '7101010201', 'CREDITOS APROBADOS PENDIENTES DE FORMALIZAR', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1159, NULL, '7101010202', 'SALDOS NO UTILIZADOS DE LINEAS DE CREDITO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1161, NULL, '7101010203', 'SALDOS NO UTILIZADOS DE SOBREGIROS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1163, NULL, '7101010204', 'SALDOS NO UTILIZADOS DE TARJETAS DE CREDITO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1165, NULL, '710102', 'INTERESES SOBRE PRESTAMOS DE DUDOSA RECUPERACION', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1167, NULL, '71010201', 'INTERESES SOBRE PRESTAMOS DE DUDOSA RECUPERACION', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1169, NULL, '71010202', 'PRESTAMOS PARA PRODUCCION', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1171, NULL, '71010203', 'PRESTAMOS PARA COMERCIO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1173, NULL, '71010204', 'PRESTAMOS PARA CONSUMO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1175, NULL, '71010205', 'PRESTAMOS PARA SERVICIOS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1177, NULL, '71010206', 'PRESTAMOS PARA VIVIENDA', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1179, NULL, '71010207', 'PRESTAMOS ROTATIVOS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1181, NULL, '710103', 'SALDOS A CARGO DE DEUDORES', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1183, NULL, '71010301', 'SALDO A CARGO DE DEUDORES', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1185, NULL, '7101030101', 'SALDO A CARGO DE DEUDORES', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1187, NULL, '710104', 'ADMINISTRACIÓN DE FONDOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1189, NULL, '71010401', 'FONDOS RETORNABLES', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1191, NULL, '71010402', 'FONDOS NO RETORNABLES', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1193, NULL, '7102', 'EXISTENCIAS EN BÓVEDA', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1195, NULL, '710201', 'DOCUMENTOS DE CRÉDITOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1197, NULL, '71020101', 'CON HIPOTECA - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1199, NULL, '71020102', 'CON HIPOTECA ABIERTA - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1201, NULL, '71020103', 'CON PRENDA CON DESPLAZAMIENTO - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:20');
INSERT INTO `catalogo` VALUES (1203, NULL, '71020104', 'CON PRENDA SIN DESPLAZAMIENTO - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1205, NULL, '71020105', 'PRENDA SOBRE COSECHAS (AVIO) - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1207, NULL, '71020106', 'MUTUOS SIN GARANTIA REAL - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1209, NULL, '71020107', 'HIPOTECA LEGAL SUBSIDIARIA - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1211, NULL, '71020108', 'CON FIANZAS O AVALES - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1213, NULL, '71020109', 'DOCUMENTOS DE PRESTAMOS FIDUCIARIOS - ML', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1216, NULL, '710202', 'DOCUMENTOS DE CARTERA DE INVERSIONES FINANCIERAS Y OTROS DOCUMENTOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1218, NULL, '71020201', 'DOCUMENTOS DE ACTIVOS FINANCIEROS NEGOCIABLES', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1220, NULL, '71020202', 'DOCUMENTOS DE ACTIVOS FINANCIEROS HASTA EL VENCIMIENTO', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1222, NULL, '71020203', 'DOCUMENTOS EN CUSTODIA', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1224, NULL, '710203', 'ACTIVOS CASTIGADOS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1226, NULL, '71020301', 'CARTERA DE PRESTAMOS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1228, NULL, '71020302', 'INVERSIONES FINANCIERAS', 7, 0.00, 1, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1230, NULL, '72', 'CUENTAS DE ORDEN ACREEDORAS', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1232, NULL, '7201', 'INFORMACION FINANCIERA POR EL CONTRATO', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1234, NULL, '7202', 'EXISTENCIAS EN BÓVEDA POR EL CONTRARIO', 7, 0.00, 0, 0, '1', NULL, NULL, 1, NULL, '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1238, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-14 23:27:52', '2023-08-19 09:08:21');
INSERT INTO `catalogo` VALUES (1239, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-14 23:32:22', '2023-08-19 09:08:21');

-- ----------------------------
-- Table structure for catalogo_tipo
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_tipo`;
CREATE TABLE `catalogo_tipo`  (
  `id_tipo_catalogo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_catalogo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of catalogo_tipo
-- ----------------------------
INSERT INTO `catalogo_tipo` VALUES (1, 'ACTIVO', '1', NULL, '2023-07-26 11:03:27');
INSERT INTO `catalogo_tipo` VALUES (2, 'PASIVO', '1', NULL, NULL);
INSERT INTO `catalogo_tipo` VALUES (3, 'PATRIMONIO', '1', NULL, NULL);
INSERT INTO `catalogo_tipo` VALUES (4, 'INGRESOS', '1', NULL, '2023-07-26 11:04:29');
INSERT INTO `catalogo_tipo` VALUES (5, 'COSTOS', '1', NULL, '2023-07-26 11:13:00');
INSERT INTO `catalogo_tipo` VALUES (6, 'LIQUIDACION', '1', '2023-07-26 11:12:00', '2023-07-26 11:13:19');
INSERT INTO `catalogo_tipo` VALUES (7, 'ORDEN (SALDO ACREEDOR)', '1', '2023-07-26 11:12:11', '2023-07-26 13:16:07');

-- ----------------------------
-- Table structure for cierre_mensual
-- ----------------------------
DROP TABLE IF EXISTS `cierre_mensual`;
CREATE TABLE `cierre_mensual`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `year` int NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `fecha_reversion` datetime NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1=Proccesado 2-Revertido',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cierre_mensual
-- ----------------------------

-- ----------------------------
-- Table structure for cierre_mensual_partida
-- ----------------------------
DROP TABLE IF EXISTS `cierre_mensual_partida`;
CREATE TABLE `cierre_mensual_partida`  (
  `id_cierre_mensual_partida` int NOT NULL AUTO_INCREMENT,
  `id_cuenta` int NOT NULL,
  `saldo_anterior` decimal(10, 2) NOT NULL,
  `total_cargos` decimal(10, 2) NOT NULL,
  `total_abonos` decimal(10, 2) NOT NULL,
  `saldo_cierre` decimal(10, 2) NOT NULL,
  `cierre_mensual_id` int NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_cierre_mensual_partida`) USING BTREE,
  INDEX `cierre_contable_id`(`cierre_mensual_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cierre_mensual_partida
-- ----------------------------

-- ----------------------------
-- Table structure for client_credit_scores
-- ----------------------------
DROP TABLE IF EXISTS `client_credit_scores`;
CREATE TABLE `client_credit_scores`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `score` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `client_credit_scores_id_cliente_foreign`(`id_cliente` ASC) USING BTREE,
  CONSTRAINT `client_credit_scores_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of client_credit_scores
-- ----------------------------

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
  `direccion_personal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL,
  `direccion_negocio` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL,
  `nombre_negocio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `tipo_vivienda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `conyugue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `observaciones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL,
  `profesion_id` bigint NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `id_empleado` int NOT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'Luis Arnulfo Marquez', '1', '1987-05-12', '03731671-8', 'San Francisco Gotera', '2020-05-12', '2654-1561', 'Salvadoreño', 'Soltero', 'San Miguel', 'San Francisco Gotera', 'CompuTec', '0', NULL, 'ninguna', 2, 1, '2024-09-25 12:08:07', '2024-10-04 18:24:42', 9);
INSERT INTO `clientes` VALUES (2, 'LORENA YAMILETH CHAVARRIA URRUTUIA', '0', '1985-02-07', '037457783', 'San Miguel', '2020-02-12', '78944554', 'SALVADOREÑA', 'SOLTERA', 'BARRIO CONCEPCION, 23 CALLE OTE PSE MERLIOT, SAN MIGUEL', 'San Francisco Gotera', 'VENTA DE FRUTAS Y VERDURA', '0', 'Luis marquez', NULL, 1, 1, '2024-10-04 18:31:00', '2024-10-05 11:00:33', 9);

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras`  (
  `id_compra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_fcc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_proveedor` int NULL DEFAULT NULL,
  `neto` decimal(20, 2) NULL DEFAULT NULL,
  `iva` decimal(20, 2) NULL DEFAULT NULL,
  `percepcion` decimal(20, 2) NULL DEFAULT NULL,
  `total` decimal(20, 2) NULL DEFAULT NULL,
  `fecha_compra` date NULL DEFAULT NULL,
  `fecha_registro` datetime NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '0-Procesando\r\n1-Finalizda\r\n2-Anulada',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_compra`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compras
-- ----------------------------

-- ----------------------------
-- Table structure for compras_detalle
-- ----------------------------
DROP TABLE IF EXISTS `compras_detalle`;
CREATE TABLE `compras_detalle`  (
  `id_detalle_compra` int NOT NULL AUTO_INCREMENT,
  `id_compra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_producto` int NULL DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `precio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `subtotal` decimal(20, 2) NULL DEFAULT NULL,
  `iva` decimal(20, 2) NULL DEFAULT NULL,
  `percepcion` decimal(20, 2) NULL DEFAULT NULL,
  `total` decimal(20, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_compra`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compras_detalle
-- ----------------------------

-- ----------------------------
-- Table structure for configuracion
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion`  (
  `id_config` int NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nombre_comercial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `rubro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nrc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dias_gracia` int NULL DEFAULT NULL,
  `interes_moratorio` decimal(20, 2) NULL DEFAULT NULL,
  `consulta_crediticia` decimal(20, 2) NULL DEFAULT NULL,
  `year_contable` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `monto_deposito_credito` int NULL DEFAULT NULL,
  `cuenta_tipo_credito` int NULL DEFAULT NULL,
  `cuenta_aportacion` int NULL DEFAULT NULL,
  `cuenta_interes_credito` int NULL DEFAULT NULL,
  `cuenta_interes_credito_moratorio` int NULL DEFAULT NULL,
  `deposito_cuenta_debe` int NULL DEFAULT NULL,
  `deposito_cuenta_haber` int NULL DEFAULT NULL,
  `retiro_cuenta_debe` int NULL DEFAULT NULL,
  `porcentaje_capitalizacion` decimal(10, 2) NULL DEFAULT NULL,
  `cuenta_capitalizacion` int NULL DEFAULT NULL,
  `retiro_cuenta_haber` int NULL DEFAULT NULL,
  `socio_automatico` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_config`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of configuracion
-- ----------------------------
INSERT INTO `configuracion` VALUES (1, 'CIMACOOP, DE RL', 'Asociacion cooperativa de ahorrto y credito \"La Cima\" de responsabilidad limitada', 'Prestamos de dinero', '232345-0', '13141205871014', '2654-1561', '2a Calle Poniente barrio la soledad', 'svcomputec@gmail.com', 3, 3.60, 2.00, 2023, 1, 5, 2, 460, 490, 492, 5, 288, 288, 1.50, 460, 5, 1, NULL, '2024-05-29 18:34:13');

-- ----------------------------
-- Table structure for correlativos
-- ----------------------------
DROP TABLE IF EXISTS `correlativos`;
CREATE TABLE `correlativos`  (
  `id_correlativo` int NOT NULL AUTO_INCREMENT,
  `id_caja` int NULL DEFAULT NULL,
  `resolucion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `tipo_documento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `documento_inicial` int NULL DEFAULT NULL,
  `documento_final` int NULL DEFAULT NULL,
  `ultimo_emitido` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_correlativo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of correlativos
-- ----------------------------

-- ----------------------------
-- Table structure for creditos
-- ----------------------------
DROP TABLE IF EXISTS `creditos`;
CREATE TABLE `creditos`  (
  `id_credito` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '\'\'',
  `id_cliente` int NOT NULL DEFAULT 0,
  `id_solicitud` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  `monto_solicitado` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `liquido_recibido` decimal(20, 2) NULL DEFAULT NULL,
  `empleado_liquido` int NULL DEFAULT NULL,
  `id_cuenta_ahorro` int NULL DEFAULT NULL,
  `id_cuenta_aportacion` int NULL DEFAULT NULL,
  `aportacion_credito` decimal(20, 2) NULL DEFAULT NULL,
  `fecha_desembolso` datetime NULL DEFAULT NULL,
  `saldo_capital` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `plazo` int NOT NULL DEFAULT 0,
  `tasa` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `cuota` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `aportaciones` decimal(20, 6) NULL DEFAULT 0.000000,
  `seguro_deuda` decimal(20, 6) NULL DEFAULT 0.000000,
  `codigo_credito` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '0',
  `fecha_vencimiento` date NULL DEFAULT NULL,
  `proxima_fecha_pago` date NULL DEFAULT NULL,
  `ultima_fecha_pago` date NULL DEFAULT NULL,
  `fecha_pago` date NULL DEFAULT NULL,
  `interes_mora` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-Pre aprobado\r\n2-Liquidado (desembolsado)',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_credito`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of creditos
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cuenta_ahorro
-- ----------------------------

-- ----------------------------
-- Table structure for cuentas
-- ----------------------------
DROP TABLE IF EXISTS `cuentas`;
CREATE TABLE `cuentas`  (
  `id_cuenta` int NOT NULL AUTO_INCREMENT,
  `id_asociado` int NULL DEFAULT NULL,
  `id_asociado_comparte` int NULL DEFAULT NULL,
  `id_tipo_cuenta` int NULL DEFAULT NULL,
  `numero_cuenta` int NULL DEFAULT NULL,
  `monto_apertura` decimal(10, 2) NULL DEFAULT NULL,
  `fecha_apertura` date NULL DEFAULT NULL,
  `saldo_cuenta` decimal(10, 2) NULL DEFAULT NULL,
  `id_interes` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1- activa 2-desactivda 3-congelada',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `declarado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_cuenta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cuentas
-- ----------------------------
INSERT INTO `cuentas` VALUES (2, 3, NULL, 1, 114, 5.00, '2023-10-19', 5.00, 14, 1, '2024-10-06 13:18:45', '2024-10-06 13:19:37', 1);

-- ----------------------------
-- Table structure for declaracion_juradas
-- ----------------------------
DROP TABLE IF EXISTS `declaracion_juradas`;
CREATE TABLE `declaracion_juradas`  (
  `declaracion_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `lugar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `n_depositos` int NOT NULL,
  `n_retiros` int NOT NULL,
  `val_prom_depositos` double(8, 2) NOT NULL,
  `val_prom_retiros` double(8, 2) NOT NULL,
  `origen_fondos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comprobante_procedencia_fondo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_cliente` int NOT NULL,
  `id_cuenta` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otro_origen_fondos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `otro_comprobante_fondos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `depo_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ret_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`declaracion_id`) USING BTREE,
  INDEX `declaracion_juradas_id_cuenta_foreign`(`id_cuenta` ASC) USING BTREE,
  INDEX `declaracion_juradas_id_cliente_foreign`(`id_cliente` ASC) USING BTREE,
  CONSTRAINT `declaracion_juradas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `declaracion_juradas_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of declaracion_juradas
-- ----------------------------
INSERT INTO `declaracion_juradas` VALUES (1, 'San Miguel', '2024-09-25', 2, 5, 250.00, 25.00, 'Negocio Propio', 'Carné o constancia de pensión', 1, 150, '2024-09-25 12:13:41', '2024-09-25 12:13:41', NULL, NULL, 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)', 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)');
INSERT INTO `declaracion_juradas` VALUES (2, 'San Miguel', '2024-10-06', 10, 0, 10.00, 0.00, 'Salarios', 'Constancia de Salarios', 2, 1, '2024-10-06 13:13:17', '2024-10-06 13:13:17', NULL, NULL, 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)', 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)');
INSERT INTO `declaracion_juradas` VALUES (3, 'San Miguel', '2024-10-06', 0, 0, 0.00, 0.00, 'Salarios', 'Constancia de Salarios', 2, 2, '2024-10-06 13:19:37', '2024-10-06 13:19:37', NULL, NULL, 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)', 'Ambos\r\n                                        (Cheque\r\n                                        y/o Efectivo)');

-- ----------------------------
-- Table structure for departamentos_territorio
-- ----------------------------
DROP TABLE IF EXISTS `departamentos_territorio`;
CREATE TABLE `departamentos_territorio`  (
  `id_departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_depto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_departamento`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of departamentos_territorio
-- ----------------------------

-- ----------------------------
-- Table structure for depositos_plazo
-- ----------------------------
DROP TABLE IF EXISTS `depositos_plazo`;
CREATE TABLE `depositos_plazo`  (
  `id_deposito_plazo_fijo` int NOT NULL AUTO_INCREMENT,
  `numero_certificado` int NULL DEFAULT NULL,
  `id_asociado` int NULL DEFAULT NULL,
  `monto_deposito` decimal(22, 2) NULL DEFAULT NULL,
  `monto_total` decimal(22, 2) NULL DEFAULT NULL,
  `forma_deposito` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `numero_cheque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_cuenta_depositar` int NULL DEFAULT NULL,
  `id_cuenta_aportacion` int NULL DEFAULT NULL,
  `interes_deposito` int NULL DEFAULT NULL,
  `plazo_deposito` int NULL DEFAULT NULL,
  `fecha_deposito` date NULL DEFAULT NULL,
  `fecha_vencimiento` date NULL DEFAULT NULL,
  `forma_pago_interes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_activacion_automatica` date NULL DEFAULT NULL,
  `is_renoved` int(1) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `monto_apertura_cuenta` decimal(22, 2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `monto_aportacion_cuenta` decimal(22, 2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `id_cuenta_depositar_aportaciones` int NULL DEFAULT NULL,
  `id_cuenta_tipodeposito` int NULL DEFAULT NULL,
  `monto_comision` decimal(22, 2) UNSIGNED ZEROFILL NULL DEFAULT NULL,
  `interes_total` decimal(10, 2) NULL DEFAULT NULL,
  `interes_mensual` decimal(10, 2) NULL DEFAULT NULL,
  `deposito_interes_fecha` date NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_deposito_plazo_fijo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of depositos_plazo
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
  `domicilio_departamento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nacionalidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dui` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `expedicion_dui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nit` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `otros_datos` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `profesion_id` bigint NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_empleado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (1, 'Caja 01', 'F', 'S/N', 'San Miguel', 'San Miguel', 'Salvadoreño', '03731671**', 'San Miguel', '1314-120587-101-5', NULL, NULL, 1, 3, NULL, '2024-10-07');
INSERT INTO `empleados` VALUES (2, 'Colector 01', 'M', 'Soltero', 'san Miguel', 'San Miguel', 'Salvadoreño', '03731671*8', 'SAN MIGUEL', '1314-120587-101-8', NULL, NULL, 1, 5, '2024-10-07', '2024-10-07');
INSERT INTO `empleados` VALUES (3, 'Gerencia', 'M', 'SN', 'San Miguel', 'San Miguel', 'Salvadoreño', '00000000-0', 'San Miguel', '0000-000000-000+0', '000', NULL, 1, 3, '2024-10-07', '2024-10-07');

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas`  (
  `id_factura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo_documento` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL COMMENT '1-factura 2-ccf 3-Ticket',
  `numero_factura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_cliente` int NULL DEFAULT NULL,
  `neto` decimal(20, 2) NULL DEFAULT NULL,
  `iva` decimal(20, 2) NULL DEFAULT NULL,
  `retencion` decimal(20, 2) NULL DEFAULT NULL,
  `total` decimal(20, 2) NULL DEFAULT NULL,
  `fecha_factura` date NULL DEFAULT NULL,
  `fecha_registro` datetime NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '0-Procesando\r\n1-Finalizda\r\n2-Anulada',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_factura`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facturas
-- ----------------------------

-- ----------------------------
-- Table structure for facturas_detalle
-- ----------------------------
DROP TABLE IF EXISTS `facturas_detalle`;
CREATE TABLE `facturas_detalle`  (
  `id_detalle_factura` int NOT NULL AUTO_INCREMENT,
  `id_factura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_producto` int NULL DEFAULT NULL,
  `cantidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `precio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `subtotal` decimal(20, 2) NULL DEFAULT NULL,
  `iva` decimal(20, 2) NULL DEFAULT NULL,
  `retencion` decimal(20, 2) NULL DEFAULT NULL,
  `total` decimal(20, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_factura`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of facturas_detalle
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of intereses_tipo_cuenta
-- ----------------------------
INSERT INTO `intereses_tipo_cuenta` VALUES (6, 2, 50.00, '2023-06-08 18:42:51', '2023-06-08 18:42:51');
INSERT INTO `intereses_tipo_cuenta` VALUES (7, 2, 23.00, '2023-06-08 18:42:55', '2023-06-08 18:42:55');
INSERT INTO `intereses_tipo_cuenta` VALUES (9, 13, 10.00, '2023-06-08 18:43:09', '2023-06-08 18:43:09');
INSERT INTO `intereses_tipo_cuenta` VALUES (10, 1, 5.00, '2023-06-08 18:44:20', '2023-09-04 21:53:24');
INSERT INTO `intereses_tipo_cuenta` VALUES (11, 9, 23.00, '2023-06-08 18:47:47', '2023-06-08 18:47:52');
INSERT INTO `intereses_tipo_cuenta` VALUES (12, 7, 5.00, '2023-06-08 18:52:05', '2023-06-08 18:52:05');
INSERT INTO `intereses_tipo_cuenta` VALUES (13, 1, 3.00, '2023-06-08 22:22:05', '2023-06-16 20:34:09');
INSERT INTO `intereses_tipo_cuenta` VALUES (14, 1, 1.00, '2023-06-16 20:34:22', '2023-06-16 20:34:22');
INSERT INTO `intereses_tipo_cuenta` VALUES (15, 1, 99.00, '2023-09-04 22:04:51', '2023-09-04 22:04:51');

-- ----------------------------
-- Table structure for libretas
-- ----------------------------
DROP TABLE IF EXISTS `libretas`;
CREATE TABLE `libretas`  (
  `id_libreta` int NOT NULL AUTO_INCREMENT,
  `numero` int NULL DEFAULT NULL,
  `num_movimiento_libreta` int NULL DEFAULT NULL,
  `id_cuenta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_apertura` datetime NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `fecha_cierre` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_libreta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of libretas
-- ----------------------------
INSERT INTO `libretas` VALUES (1, 1, NULL, '145', '2024-06-26 09:11:14', 1, NULL, '2024-06-26 09:11:14', '2024-06-26 09:11:14');
INSERT INTO `libretas` VALUES (2, 2, NULL, '146', '2024-06-26 09:34:53', 1, NULL, '2024-06-26 09:34:53', '2024-06-26 09:34:53');
INSERT INTO `libretas` VALUES (3, 3, NULL, '147', '2024-08-15 09:12:15', 1, NULL, '2024-08-15 09:12:15', '2024-08-15 09:12:15');
INSERT INTO `libretas` VALUES (4, 4, NULL, '148', '2024-08-15 10:42:35', 1, NULL, '2024-08-15 10:42:35', '2024-08-15 10:42:35');
INSERT INTO `libretas` VALUES (5, 5, NULL, '149', '2024-08-15 13:50:24', 1, NULL, '2024-08-15 13:50:24', '2024-08-15 13:50:24');
INSERT INTO `libretas` VALUES (6, 6, NULL, '150', '2024-09-25 12:11:25', 1, NULL, '2024-09-25 12:11:25', '2024-09-25 12:11:25');
INSERT INTO `libretas` VALUES (7, 7, NULL, '1', '2024-10-06 13:12:42', 1, NULL, '2024-10-06 13:12:42', '2024-10-06 13:12:42');
INSERT INTO `libretas` VALUES (8, 8, NULL, '2', '2024-10-06 13:18:45', 1, NULL, '2024-10-06 13:18:45', '2024-10-06 13:18:45');

-- ----------------------------
-- Table structure for libro_mayor
-- ----------------------------
DROP TABLE IF EXISTS `libro_mayor`;
CREATE TABLE `libro_mayor`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cuenta_padre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `numero_cuenta_padre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `descripcion_cuenta_padre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_cuenta` int NULL DEFAULT NULL,
  `numero_cuenta` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_operacion` date NULL DEFAULT NULL,
  `cuenta_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `saldo_anterior` decimal(20, 2) NULL DEFAULT NULL,
  `cargos` decimal(20, 2) NULL DEFAULT NULL,
  `abonos` decimal(20, 2) NULL DEFAULT NULL,
  `saldo_actual` decimal(20, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of libro_mayor
-- ----------------------------

-- ----------------------------
-- Table structure for liquidacion
-- ----------------------------
DROP TABLE IF EXISTS `liquidacion`;
CREATE TABLE `liquidacion`  (
  `id_liquidacion` int NOT NULL AUTO_INCREMENT,
  `id_credito` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_cuenta` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `monto_debe` decimal(20, 2) NULL DEFAULT NULL,
  `monto_haber` decimal(20, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_liquidacion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of liquidacion
-- ----------------------------
INSERT INTO `liquidacion` VALUES (1, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '60', 500.00, 0.00, 1, NULL, '2024-06-26 09:38:24', '2024-06-26 09:38:24');
INSERT INTO `liquidacion` VALUES (2, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '5', 0.00, 438.34, 1, NULL, '2024-06-26 09:38:54', '2024-06-26 09:40:56');
INSERT INTO `liquidacion` VALUES (3, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '288', 0.00, 10.00, 1, NULL, '2024-06-26 09:39:22', '2024-06-26 09:39:22');
INSERT INTO `liquidacion` VALUES (4, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '355', 0.00, 18.00, 1, NULL, '2024-06-26 09:39:41', '2024-06-26 09:39:41');
INSERT INTO `liquidacion` VALUES (5, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '460', 0.00, 7.50, 1, NULL, '2024-06-26 09:40:10', '2024-06-26 09:40:10');
INSERT INTO `liquidacion` VALUES (6, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '428', 0.00, 3.88, 1, NULL, '2024-06-26 09:40:10', '2024-06-26 09:40:56');
INSERT INTO `liquidacion` VALUES (7, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '495', 0.00, 19.78, 1, NULL, '2024-06-26 09:40:35', '2024-06-26 09:40:35');
INSERT INTO `liquidacion` VALUES (8, 'fd67ac1e-e4b4-4955-ac07-d56fedbafa54', '502', 0.00, 2.50, 1, NULL, '2024-06-26 09:40:56', '2024-06-26 09:40:56');
INSERT INTO `liquidacion` VALUES (9, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '60', 1000.00, 0.00, 1, NULL, '2024-08-15 09:08:52', '2024-08-15 09:08:52');
INSERT INTO `liquidacion` VALUES (10, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '5', 0.00, 934.87, 1, NULL, '2024-08-15 09:09:13', '2024-08-15 09:11:39');
INSERT INTO `liquidacion` VALUES (11, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '288', 0.00, 5.00, 1, NULL, '2024-08-15 09:09:43', '2024-08-15 09:09:43');
INSERT INTO `liquidacion` VALUES (12, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '355', 0.00, 18.00, 1, NULL, '2024-08-15 09:10:06', '2024-08-15 09:10:06');
INSERT INTO `liquidacion` VALUES (13, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '460', 0.00, 15.00, 1, NULL, '2024-08-15 09:10:32', '2024-08-15 09:10:32');
INSERT INTO `liquidacion` VALUES (14, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '428', 0.00, 4.85, 1, NULL, '2024-08-15 09:10:32', '2024-08-15 09:11:39');
INSERT INTO `liquidacion` VALUES (16, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '495', 0.00, 19.78, 1, NULL, '2024-08-15 09:11:27', '2024-08-15 09:11:27');
INSERT INTO `liquidacion` VALUES (17, 'f178a472-bf89-4533-aaf7-6c8ac39bf731', '502', 0.00, 2.50, 1, NULL, '2024-08-15 09:11:39', '2024-08-15 09:11:39');
INSERT INTO `liquidacion` VALUES (47, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '61', 3000.00, 0.00, 1, NULL, '2024-08-15 14:36:31', '2024-08-15 14:36:31');
INSERT INTO `liquidacion` VALUES (48, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '5', 0.00, 2807.80, 1, NULL, '2024-08-15 14:36:46', '2024-08-15 14:38:43');
INSERT INTO `liquidacion` VALUES (49, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '460', 0.00, 45.00, 1, NULL, '2024-08-15 14:36:57', '2024-08-15 14:36:57');
INSERT INTO `liquidacion` VALUES (50, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '428', 0.00, 18.20, 1, NULL, '2024-08-15 14:36:57', '2024-08-15 14:38:03');
INSERT INTO `liquidacion` VALUES (51, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '495', 0.00, 90.00, 1, NULL, '2024-08-15 14:37:29', '2024-08-15 14:37:29');
INSERT INTO `liquidacion` VALUES (52, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '355', 0.00, 18.00, 1, NULL, '2024-08-15 14:37:51', '2024-08-15 14:37:51');
INSERT INTO `liquidacion` VALUES (53, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '502', 0.00, 5.00, 1, NULL, '2024-08-15 14:38:03', '2024-08-15 14:38:03');
INSERT INTO `liquidacion` VALUES (54, '43dfe707-acac-4f68-9bbe-c7d288ce5ea6', '1072', 0.00, 16.00, 1, NULL, '2024-08-15 14:38:43', '2024-08-15 14:38:43');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_07_25_194756_create_partida_contables_table', 2);
INSERT INTO `migrations` VALUES (11, '2023_07_25_201454_create_declaracion_juradas_table', 3);
INSERT INTO `migrations` VALUES (12, '2023_07_27_213519_add_declared_to_cuentas_table', 4);
INSERT INTO `migrations` VALUES (14, '2023_07_28_171702_add_other_origins_to_declaracion_juradas_table', 5);
INSERT INTO `migrations` VALUES (16, '2023_08_08_211556_create_notifications_table', 6);
INSERT INTO `migrations` VALUES (17, '2023_08_12_151756_create_parameters_table', 7);
INSERT INTO `migrations` VALUES (18, '2023_08_16_212038_add_id_empleado_to_client_table', 8);
INSERT INTO `migrations` VALUES (19, '2023_09_29_184057_create_client_credit_scores_table', 9);
INSERT INTO `migrations` VALUES (20, '2024_09_29_102204_create_profesions_table', 10);

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo`  (
  `id_modulo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icono` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ruta` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_padre` int NULL DEFAULT 0,
  `is_padre` bit(1) NOT NULL,
  `orden` int NULL DEFAULT NULL,
  `is_minimazed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `target` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_modulo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES (1, 'Administración', 'ki-home', '#', 0, b'1', 1, '0', 0);
INSERT INTO `modulo` VALUES (3, 'Cooperativa', 'ki-shop', '/configuracion', 4, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (4, 'Configuración', 'ki-gear', '#', 0, b'1', 7, '0', 0);
INSERT INTO `modulo` VALUES (5, 'Módulos', 'ki-like', '/modulo', 4, b'0', 5, '0', 0);
INSERT INTO `modulo` VALUES (6, 'Permisos', 'ki-fingerprint-scanning', '/permisos', 4, b'0', 6, '0', 0);
INSERT INTO `modulo` VALUES (7, 'Cuentas Clientes', 'ki-lock', '/cuentas', 1, b'0', 4, '1', 0);
INSERT INTO `modulo` VALUES (8, 'Cajas', 'ki-address-book', '/cajas', 4, b'0', 4, '1', 0);
INSERT INTO `modulo` VALUES (9, 'Apertura - Cierre Caja', 'ki-arrow-right-left', '/apertura', 29, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (10, 'Caja', 'ki-calculator', '/movimientos', 29, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (11, 'Usuarios', 'ki-faceid', '/user', 4, b'0', 4, '0', 0);
INSERT INTO `modulo` VALUES (12, 'Roles', 'ki-data', '/rol', 4, b'0', 8, '0', 0);
INSERT INTO `modulo` VALUES (13, 'Tipo Cuenta', 'ki-questionnaire-tablet', '/tipoCuenta', 1, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (14, 'Empleados', 'ki-security-user', '/empleados', 4, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (15, 'Clientes', 'ki-profile-user', '/clientes', 1, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (16, 'Referencias', 'ki-address-book', '/referencias', 4, b'0', 10, '0', 0);
INSERT INTO `modulo` VALUES (17, 'Asociados', 'ki-address-book', '/asociados', 1, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (18, 'Bóveda', 'ki-safe-home', '/boveda', 4, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (21, 'Captación', 'ki-address-book', '#', 0, b'1', 3, '0', 0);
INSERT INTO `modulo` VALUES (22, 'Plazos', 'ki-calendar-add', '/captaciones/plazos', 21, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (23, 'Depósitos a plazo', 'ki-save-deposit', '/captaciones/depositosplazo', 21, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (24, 'Créditos', 'ki-price-tag', '#', 0, b'1', 2, '0', 0);
INSERT INTO `modulo` VALUES (25, 'Solicitudes', 'ki-book', '/creditos/solicitudes', 24, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (26, 'Liquidar Créditos', 'ki-verify', '/creditos/solicitudes/estudios', 24, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (28, 'Abonos Créditos', 'ki-dollar', '/creditos/abonos', 29, b'0', 5, '0', 0);
INSERT INTO `modulo` VALUES (29, 'Caja', 'ki-bank', '#', 0, b'1', 2, '0', 0);
INSERT INTO `modulo` VALUES (30, 'Bitácora', 'ki-address-book', '/bitacora', 4, b'0', 11, '0', 0);
INSERT INTO `modulo` VALUES (31, 'Contabilidad', 'ki-medal-star', '#', 0, b'1', 5, '0', 0);
INSERT INTO `modulo` VALUES (32, 'Catalogo de Cuentas', 'ki-book', '/contabilidad/catalogo', 31, b'0', 2, '1', 0);
INSERT INTO `modulo` VALUES (37, 'Tipos de cuentas', 'ki-category', '/contabilidad/tipocuentacontable', 31, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (38, 'Partidas Contable', 'ki-abstract-26', '/contabilidad/partidas', 31, b'0', 4, '0', 0);
INSERT INTO `modulo` VALUES (39, 'Tipos Partidas', 'ki-lots-shopping', '/contabilidad/tipos-partidas', 31, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (41, 'Alertas de Lavado', 'ki-bank', '/alerts', 1, b'0', 12, '0', 0);
INSERT INTO `modulo` VALUES (43, 'Configuar Alertas Lavado', 'ki-calculator', '/params', 4, b'0', 12, '0', 0);
INSERT INTO `modulo` VALUES (44, 'Cierre mensual', 'ki-lock', '/contabilidad/cierre-mensual', 31, b'0', 5, '0', 0);
INSERT INTO `modulo` VALUES (45, 'Reportes Contables', 'ki-printer', '#', 0, b'1', 6, '0', 0);
INSERT INTO `modulo` VALUES (46, 'Balance General', 'ki-graph-up', '/contabilidad/Reportes/balancegeneral', 45, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (47, 'Estado de Resultados', 'ki-graph-up', '/contabilidad/Reportes/estadoresultado', 45, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (50, 'Balance de Comprobación', 'ki-graph-up', '/contabilidad/Reportes/balancecomprobacion', 45, b'0', 5, '0', 0);
INSERT INTO `modulo` VALUES (51, 'Anexos a Estados Financieros', 'ki-graph-up', '/contabilidad/Reportes/anexos', 45, b'0', 6, '0', 0);
INSERT INTO `modulo` VALUES (52, 'Libro Mayor', 'ki-graph-up', '/contabilidad/Reportes/libromayor', 45, b'0', 7, '0', 0);
INSERT INTO `modulo` VALUES (54, 'Partidas de Diario', 'ki-graph-up', '/contabilidad/Reportes/partidasdediario', 45, b'0', 10, '0', 0);
INSERT INTO `modulo` VALUES (55, 'Libro Diario General', 'ki-graph-up', '/contabilidad/Reportes/librodiario', 45, b'0', 10, '0', 0);
INSERT INTO `modulo` VALUES (56, 'Movimientos Histórico de Cuenta', 'ki-graph-up', '/contabilidad/Reportes/historicodecuenta', 45, b'0', 11, '0', 0);
INSERT INTO `modulo` VALUES (57, 'Catalogo de Cuentas', 'ki-graph-up', '/contabilidad/Reportes/catalogodecuentas', 45, b'0', 12, '0', 1);
INSERT INTO `modulo` VALUES (58, 'Libro auxiliar', 'ki-archive', '/contabilidad/Reportes/libroauxiliar', 45, b'0', 9, '0', 0);
INSERT INTO `modulo` VALUES (60, 'Reportes', 'ki-printer', '/reportes', 0, b'1', 4, '0', 0);
INSERT INTO `modulo` VALUES (61, 'Cartera Activa o vigente', 'ki-book-square', '/reportes/cartera', 60, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (62, 'Cartera en mora', 'ki-rocket', '/reportes/cartera-mora', 60, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (63, 'Desembolsos', 'ki-questionnaire-tablet', '/reportes/desembolsos', 60, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (64, 'Créditos Cancelados', 'ki-lovely', '/reportes/creditos', 60, b'0', 4, '0', 0);
INSERT INTO `modulo` VALUES (65, 'Ingresos', 'ki-dollar', '/reportes/ingresos', 60, b'0', 6, '0', 0);
INSERT INTO `modulo` VALUES (66, 'Créditos próximos a vencer', 'ki-timer', '/reportes/creditos/proximos-vencer', 60, b'0', 7, '0', 0);
INSERT INTO `modulo` VALUES (67, 'IVA', 'ki-address-book', '#', 0, b'1', 5, '0', 0);
INSERT INTO `modulo` VALUES (68, 'Libro de Ventas al Contribuyente', 'ki-lots-shopping', '/iva/facturas-contribuyente', 67, b'0', 1, '0', 0);
INSERT INTO `modulo` VALUES (69, 'Libro de Ventas al Consumidor', 'ki-cheque', '/iva/facturas-consumidor', 67, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (70, 'Libro de Compras', 'ki-basket', '/iva/compras', 67, b'0', 3, '0', 0);
INSERT INTO `modulo` VALUES (71, 'Compras', 'ki-handcart', '/compras/list', 1, b'0', 6, '0', 0);
INSERT INTO `modulo` VALUES (72, 'Prodúctos', 'ki-milk', '/productos/list', 1, b'0', 5, '0', 0);
INSERT INTO `modulo` VALUES (73, 'Proveedores', 'ki-people', '/proveedores/list', 1, b'0', 6, '0', 0);
INSERT INTO `modulo` VALUES (74, 'Estudio Comite', 'ki-crown', '/comite', 24, b'0', 2, '0', 0);
INSERT INTO `modulo` VALUES (75, 'Reporte Infored', 'ki-people', '/contabilidad/Reportes/infored', 60, b'0', 7, '0', 0);
INSERT INTO `modulo` VALUES (76, 'Facturación', 'ki-bill', '/facturas/list', 29, b'0', 4, '0', 0);
INSERT INTO `modulo` VALUES (77, 'Libretas', 'ki-book-open', '/libretas', 1, b'0', 4, '0', 0);
INSERT INTO `modulo` VALUES (78, 'Profesiones', 'ki-medal-star', '/profesiones', 4, b'0', 6, '0', 0);

-- ----------------------------
-- Table structure for modulo_rol
-- ----------------------------
DROP TABLE IF EXISTS `modulo_rol`;
CREATE TABLE `modulo_rol`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_modulo` int NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 127 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of modulo_rol
-- ----------------------------
INSERT INTO `modulo_rol` VALUES (14, 3, 1);
INSERT INTO `modulo_rol` VALUES (16, 8, 1);
INSERT INTO `modulo_rol` VALUES (17, 9, 1);
INSERT INTO `modulo_rol` VALUES (19, 4, 1);
INSERT INTO `modulo_rol` VALUES (20, 5, 1);
INSERT INTO `modulo_rol` VALUES (22, 1, 3);
INSERT INTO `modulo_rol` VALUES (25, 11, 1);
INSERT INTO `modulo_rol` VALUES (26, 12, 1);
INSERT INTO `modulo_rol` VALUES (27, 13, 1);
INSERT INTO `modulo_rol` VALUES (28, 14, 1);
INSERT INTO `modulo_rol` VALUES (29, 15, 1);
INSERT INTO `modulo_rol` VALUES (30, 16, 1);
INSERT INTO `modulo_rol` VALUES (31, 17, 1);
INSERT INTO `modulo_rol` VALUES (32, 18, 1);
INSERT INTO `modulo_rol` VALUES (35, 21, 1);
INSERT INTO `modulo_rol` VALUES (36, 22, 1);
INSERT INTO `modulo_rol` VALUES (37, 23, 1);
INSERT INTO `modulo_rol` VALUES (45, 7, 1);
INSERT INTO `modulo_rol` VALUES (46, 6, 1);
INSERT INTO `modulo_rol` VALUES (47, 24, 1);
INSERT INTO `modulo_rol` VALUES (48, 25, 1);
INSERT INTO `modulo_rol` VALUES (49, 26, 1);
INSERT INTO `modulo_rol` VALUES (51, 27, 1);
INSERT INTO `modulo_rol` VALUES (52, 28, 1);
INSERT INTO `modulo_rol` VALUES (53, 29, 1);
INSERT INTO `modulo_rol` VALUES (55, 29, 2);
INSERT INTO `modulo_rol` VALUES (56, 9, 2);
INSERT INTO `modulo_rol` VALUES (57, 10, 2);
INSERT INTO `modulo_rol` VALUES (58, 28, 2);
INSERT INTO `modulo_rol` VALUES (59, 30, 1);
INSERT INTO `modulo_rol` VALUES (60, 10, 1);
INSERT INTO `modulo_rol` VALUES (61, 31, 1);
INSERT INTO `modulo_rol` VALUES (62, 32, 1);
INSERT INTO `modulo_rol` VALUES (63, 1, 2);
INSERT INTO `modulo_rol` VALUES (64, 7, 2);
INSERT INTO `modulo_rol` VALUES (65, 17, 2);
INSERT INTO `modulo_rol` VALUES (66, 15, 2);
INSERT INTO `modulo_rol` VALUES (67, 24, 2);
INSERT INTO `modulo_rol` VALUES (69, 26, 2);
INSERT INTO `modulo_rol` VALUES (70, 21, 2);
INSERT INTO `modulo_rol` VALUES (71, 23, 2);
INSERT INTO `modulo_rol` VALUES (73, 33, 1);
INSERT INTO `modulo_rol` VALUES (74, 34, 1);
INSERT INTO `modulo_rol` VALUES (75, 35, 1);
INSERT INTO `modulo_rol` VALUES (76, 36, 1);
INSERT INTO `modulo_rol` VALUES (77, 37, 1);
INSERT INTO `modulo_rol` VALUES (78, 38, 1);
INSERT INTO `modulo_rol` VALUES (79, 39, 1);
INSERT INTO `modulo_rol` VALUES (80, 1, 1);
INSERT INTO `modulo_rol` VALUES (81, 41, 1);
INSERT INTO `modulo_rol` VALUES (82, 42, 1);
INSERT INTO `modulo_rol` VALUES (84, 43, 1);
INSERT INTO `modulo_rol` VALUES (85, 44, 1);
INSERT INTO `modulo_rol` VALUES (86, 45, 1);
INSERT INTO `modulo_rol` VALUES (87, 46, 1);
INSERT INTO `modulo_rol` VALUES (88, 47, 1);
INSERT INTO `modulo_rol` VALUES (89, 48, 1);
INSERT INTO `modulo_rol` VALUES (90, 51, 1);
INSERT INTO `modulo_rol` VALUES (91, 54, 1);
INSERT INTO `modulo_rol` VALUES (92, 57, 1);
INSERT INTO `modulo_rol` VALUES (93, 56, 1);
INSERT INTO `modulo_rol` VALUES (94, 53, 1);
INSERT INTO `modulo_rol` VALUES (95, 50, 1);
INSERT INTO `modulo_rol` VALUES (96, 49, 1);
INSERT INTO `modulo_rol` VALUES (97, 52, 1);
INSERT INTO `modulo_rol` VALUES (98, 55, 1);
INSERT INTO `modulo_rol` VALUES (99, 58, 1);
INSERT INTO `modulo_rol` VALUES (100, 59, 1);
INSERT INTO `modulo_rol` VALUES (101, 60, 1);
INSERT INTO `modulo_rol` VALUES (102, 61, 1);
INSERT INTO `modulo_rol` VALUES (103, 64, 1);
INSERT INTO `modulo_rol` VALUES (104, 62, 1);
INSERT INTO `modulo_rol` VALUES (105, 65, 1);
INSERT INTO `modulo_rol` VALUES (106, 63, 1);
INSERT INTO `modulo_rol` VALUES (107, 66, 1);
INSERT INTO `modulo_rol` VALUES (112, 71, 1);
INSERT INTO `modulo_rol` VALUES (113, 72, 1);
INSERT INTO `modulo_rol` VALUES (114, 73, 1);
INSERT INTO `modulo_rol` VALUES (115, 75, 1);
INSERT INTO `modulo_rol` VALUES (116, 74, 1);
INSERT INTO `modulo_rol` VALUES (117, 76, 1);
INSERT INTO `modulo_rol` VALUES (118, 67, 1);
INSERT INTO `modulo_rol` VALUES (119, 68, 1);
INSERT INTO `modulo_rol` VALUES (120, 69, 1);
INSERT INTO `modulo_rol` VALUES (121, 70, 1);
INSERT INTO `modulo_rol` VALUES (122, 15, 3);
INSERT INTO `modulo_rol` VALUES (123, 24, 3);
INSERT INTO `modulo_rol` VALUES (124, 25, 3);
INSERT INTO `modulo_rol` VALUES (125, 77, 1);
INSERT INTO `modulo_rol` VALUES (126, 78, 1);

-- ----------------------------
-- Table structure for movimientos
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos`  (
  `id_movimiento` int NOT NULL AUTO_INCREMENT,
  `id_cuenta` int NULL DEFAULT NULL,
  `id_cuenta_destino` int NULL DEFAULT NULL,
  `tipo_operacion` int NULL DEFAULT NULL COMMENT '1- Deposito \r\n2-Retiro \r\n3-RecepcionCaj\r\n4-trastadoCaja \r\n5-Corte X\r\n6-Corte Z\r\n7-Abono Credito\r\n8-Desembolso de Credito\r\n9-Depositos Aportaciones\r\n10-Deposito plazo fijo',
  `monto` decimal(10, 2) NULL DEFAULT NULL,
  `saldo` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-procesada \r\n2-anulada\r\n3-pendiente recibir en bobeda\r\n',
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dui_transaccion` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `cliente_transaccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `fecha_operacion` datetime NULL DEFAULT NULL,
  `cajero_operacion` int NULL DEFAULT NULL,
  `id_caja` int NULL DEFAULT NULL,
  `id_pago_credito` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `impreso` int NULL DEFAULT NULL,
  `id_libreta` int NULL DEFAULT NULL,
  `num_movimiento_libreta` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of movimientos
-- ----------------------------
INSERT INTO `movimientos` VALUES (1, 0, NULL, 3, 500.00, NULL, 1, NULL, NULL, '9', '2024-10-06 13:12:18', 9, 1, NULL, NULL, NULL, NULL, '2024-10-06 13:12:18', '2024-10-06 13:12:18');
INSERT INTO `movimientos` VALUES (2, 1, NULL, 1, 10.00, 10.00, 0, 'Deposito por apertura de cuenta', '037457783', 'LORENA YAMILETH CHAVARRIA URRUTUIA', '2024-10-06 13:12:42', 9, 1, NULL, 0, 7, 1, '2024-10-06 13:12:42', '2024-10-06 13:21:49');
INSERT INTO `movimientos` VALUES (3, 2, NULL, 1, 5.00, 5.00, 1, 'Deposito por apertura de cuenta', '037457783', 'LORENA YAMILETH CHAVARRIA URRUTUIA', '2024-10-06 13:18:45', 9, 1, NULL, 0, 8, 1, '2024-10-06 13:18:45', '2024-10-06 13:18:45');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('19273288-44d0-4213-aa72-cd33836898c2', 'App\\Notifications\\MoneylaunderingNotification', 'f178a472-bf89-4533-aaf7-6c8ac39bf731', 'App\\Models\\Credito', '{\"numero_caja\":\"Caja # 01\",\"monto_saldo\":\"102.49\",\"justificante\":\"si\",\"comprobante\":\"si\",\"cliente\":\"Luis Arnulfo Marquez Argueta\",\"cobrado_por\":\"Norman Parker\",\"codigo_credito\":\"00000632408150906312\",\"id_caja\":\"1\"}', NULL, '2024-08-15 10:03:25', '2024-08-15 10:03:25');

-- ----------------------------
-- Table structure for pagos_credito
-- ----------------------------
DROP TABLE IF EXISTS `pagos_credito`;
CREATE TABLE `pagos_credito`  (
  `id_pago_credito` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `id_credito` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `capital` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `interes` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `mora` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `aportacion` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `total_pago` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `seguro_deuda` decimal(20, 6) NOT NULL DEFAULT 0.000000,
  `fecha_pago` datetime NULL DEFAULT NULL,
  `cliente_operacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `dui_operacion` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_caja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `saldo_anterior` decimal(10, 2) NULL DEFAULT NULL,
  `saldo_actual` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_pago_credito`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pagos_credito
-- ----------------------------
INSERT INTO `pagos_credito` VALUES ('66ea48d5-ff39-47cb-8a33-8ab69f09a486', 'f178a472-bf89-4533-aaf7-6c8ac39bf731', 97.490000, 0.000000, 0.000000, 5.000000, 102.490000, 0.000000, '2024-08-15 00:00:00', 'luis', '037316717', '1', 1000.00, 902.51, '2024-08-15 10:03:26', '2024-08-15 10:03:26');

-- ----------------------------
-- Table structure for parameters
-- ----------------------------
DROP TABLE IF EXISTS `parameters`;
CREATE TABLE `parameters`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cuotas` int NOT NULL DEFAULT 4,
  `monto` double NOT NULL DEFAULT 3000,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parameters
-- ----------------------------
INSERT INTO `parameters` VALUES (1, 1, 3000, 'Norman Parker', NULL, '2023-08-13 08:53:21');

-- ----------------------------
-- Table structure for parentesco
-- ----------------------------
DROP TABLE IF EXISTS `parentesco`;
CREATE TABLE `parentesco`  (
  `id_parentesco` int NOT NULL AUTO_INCREMENT,
  `parentesco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_parentesco`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of parentesco
-- ----------------------------
INSERT INTO `parentesco` VALUES (1, ' Padre', 1);
INSERT INTO `parentesco` VALUES (2, ' Madre', 1);
INSERT INTO `parentesco` VALUES (3, ' Abuelo', 1);
INSERT INTO `parentesco` VALUES (4, ' Abuela', 1);
INSERT INTO `parentesco` VALUES (5, ' Bisabuelo', 1);
INSERT INTO `parentesco` VALUES (6, ' Bisabuela', 1);
INSERT INTO `parentesco` VALUES (7, ' Hijo', 1);
INSERT INTO `parentesco` VALUES (8, ' Hija', 1);
INSERT INTO `parentesco` VALUES (9, ' Nieto', 1);
INSERT INTO `parentesco` VALUES (10, ' Nieta', 1);
INSERT INTO `parentesco` VALUES (11, ' Bisnieto', 1);
INSERT INTO `parentesco` VALUES (12, ' Bisnieta', 1);
INSERT INTO `parentesco` VALUES (13, ' Hermano', 1);
INSERT INTO `parentesco` VALUES (14, ' Hermana', 1);
INSERT INTO `parentesco` VALUES (15, ' Tío', 1);
INSERT INTO `parentesco` VALUES (16, ' Tía', 1);
INSERT INTO `parentesco` VALUES (17, ' Primo', 1);
INSERT INTO `parentesco` VALUES (18, ' Prima', 1);
INSERT INTO `parentesco` VALUES (19, ' Sobrino', 1);
INSERT INTO `parentesco` VALUES (20, ' Sobrina', 1);
INSERT INTO `parentesco` VALUES (21, ' Cónyuge (Esposo/Esposa)', 1);
INSERT INTO `parentesco` VALUES (22, ' Suegro', 1);
INSERT INTO `parentesco` VALUES (23, ' Suegra', 1);
INSERT INTO `parentesco` VALUES (24, ' Yerno', 1);
INSERT INTO `parentesco` VALUES (25, ' Nuera', 1);
INSERT INTO `parentesco` VALUES (26, ' Cuñado', 1);
INSERT INTO `parentesco` VALUES (27, ' Cuñada', 1);
INSERT INTO `parentesco` VALUES (28, ' Padrastro', 1);
INSERT INTO `parentesco` VALUES (29, ' Madrastra', 1);
INSERT INTO `parentesco` VALUES (30, ' Hijastro', 1);
INSERT INTO `parentesco` VALUES (31, ' Hijastra', 1);
INSERT INTO `parentesco` VALUES (32, ' Hermanastro', 1);
INSERT INTO `parentesco` VALUES (33, ' Hermanastra', 1);
INSERT INTO `parentesco` VALUES (34, 'Amiga', 1);
INSERT INTO `parentesco` VALUES (35, 'Amigo', 1);

-- ----------------------------
-- Table structure for partida_contables_detalle
-- ----------------------------
DROP TABLE IF EXISTS `partida_contables_detalle`;
CREATE TABLE `partida_contables_detalle`  (
  `id_detalle_partida_contable` int NOT NULL AUTO_INCREMENT,
  `fecha_procesamiento` date NULL DEFAULT NULL,
  `id_cuenta` int NULL DEFAULT NULL,
  `id_partida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parcial` decimal(20, 2) NULL DEFAULT NULL,
  `cargos` decimal(20, 2) NULL DEFAULT NULL,
  `abonos` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_partida_contable`) USING BTREE,
  INDEX `id_cuenta`(`id_cuenta` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partida_contables_detalle
-- ----------------------------
INSERT INTO `partida_contables_detalle` VALUES (1, NULL, 288, '30ec2812-7435-45e7-a556-e31068d6628d', 10.00, 10.00, 0.00, 0, '2024-09-25 12:14:48', '2024-09-25 12:14:48');
INSERT INTO `partida_contables_detalle` VALUES (2, NULL, 5, '30ec2812-7435-45e7-a556-e31068d6628d', 10.00, 0.00, 10.00, 0, '2024-09-25 12:14:48', '2024-09-25 12:14:48');
INSERT INTO `partida_contables_detalle` VALUES (3, NULL, 288, '7f7f5d93-4222-44b8-afe6-43951102cc75', 10.00, 10.00, 0.00, 0, '2024-09-25 12:14:48', '2024-09-25 12:14:48');
INSERT INTO `partida_contables_detalle` VALUES (4, NULL, 5, '7f7f5d93-4222-44b8-afe6-43951102cc75', 10.00, 0.00, 10.00, 0, '2024-09-25 12:14:48', '2024-09-25 12:14:48');
INSERT INTO `partida_contables_detalle` VALUES (5, NULL, 5, '420757ba-f362-4702-9add-b5a7a9b4e1e3', 150.00, 150.00, 0.00, 0, '2024-09-25 12:15:42', '2024-09-25 12:15:42');
INSERT INTO `partida_contables_detalle` VALUES (6, NULL, 288, '420757ba-f362-4702-9add-b5a7a9b4e1e3', 150.00, 0.00, 150.00, 0, '2024-09-25 12:15:42', '2024-09-25 12:15:42');
INSERT INTO `partida_contables_detalle` VALUES (7, NULL, 5, '53a702e1-f948-4744-b74f-229b4c21ec7d', 10.00, 10.00, 0.00, 0, '2024-09-25 12:17:45', '2024-09-25 12:17:45');
INSERT INTO `partida_contables_detalle` VALUES (8, NULL, 288, '53a702e1-f948-4744-b74f-229b4c21ec7d', 10.00, 0.00, 10.00, 0, '2024-09-25 12:17:45', '2024-09-25 12:17:45');
INSERT INTO `partida_contables_detalle` VALUES (9, NULL, 288, '373ed434-ecd4-48b6-b731-2d996233ba41', 5.00, 5.00, 0.00, 0, '2024-09-25 12:18:47', '2024-09-25 12:18:47');
INSERT INTO `partida_contables_detalle` VALUES (10, NULL, 5, '373ed434-ecd4-48b6-b731-2d996233ba41', 5.00, 0.00, 5.00, 0, '2024-09-25 12:18:47', '2024-09-25 12:18:47');

-- ----------------------------
-- Table structure for partidas_contables
-- ----------------------------
DROP TABLE IF EXISTS `partidas_contables`;
CREATE TABLE `partidas_contables`  (
  `id_partida_contable` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `num_partida` int NULL DEFAULT NULL,
  `year_contable` int NULL DEFAULT NULL,
  `fecha_partida` date NULL DEFAULT NULL,
  `tipo_partida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `concepto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `monto` decimal(20, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `delete_allowed` int NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_partida_contable`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of partidas_contables
-- ----------------------------
INSERT INTO `partidas_contables` VALUES ('30ec2812-7435-45e7-a556-e31068d6628d', 1, 2024, '2024-09-25', '1', 'RETIRO DE LA CUENTA DE Ahorro Navideño Luis Arnulfo Marquez', NULL, 2, NULL, '2024-09-25', '2024-09-25 12:14:48');
INSERT INTO `partidas_contables` VALUES ('373ed434-ecd4-48b6-b731-2d996233ba41', 1, 2024, '2024-09-25', '1', 'RETIRO DE LA CUENTA DE Ahorro Navideño Luis Arnulfo Marquez', NULL, 2, NULL, '2024-09-25', '2024-09-25 12:18:47');
INSERT INTO `partidas_contables` VALUES ('420757ba-f362-4702-9add-b5a7a9b4e1e3', 1, 2024, '2024-09-25', '1', 'POR DEPOSITO A CUENTA DE Ahorro Navideño Luis Arnulfo Marquez', NULL, 2, NULL, '2024-09-25', '2024-09-25 12:15:42');
INSERT INTO `partidas_contables` VALUES ('53a702e1-f948-4744-b74f-229b4c21ec7d', 1, 2024, '2024-09-25', '1', 'POR DEPOSITO A CUENTA DE Ahorro Navideño Luis Arnulfo Marquez', NULL, 2, NULL, '2024-09-25', '2024-09-25 12:17:45');
INSERT INTO `partidas_contables` VALUES ('7f7f5d93-4222-44b8-afe6-43951102cc75', 1, 2024, '2024-09-25', '1', 'RETIRO DE LA CUENTA DE Ahorro Navideño Luis Arnulfo Marquez', NULL, 2, NULL, '2024-09-25', '2024-09-25 12:14:48');

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
-- Table structure for plazos
-- ----------------------------
DROP TABLE IF EXISTS `plazos`;
CREATE TABLE `plazos`  (
  `id_plazo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `meses` int NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_plazo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of plazos
-- ----------------------------
INSERT INTO `plazos` VALUES (1, 'Deposito 12 Meses', 12, 1, NULL, '2023-08-12 06:57:22');
INSERT INTO `plazos` VALUES (2, 'Deposito 18 meses', 18, 1, '2023-06-29 18:39:48', '2023-08-12 06:59:40');
INSERT INTO `plazos` VALUES (3, 'Plazo 5 años', 62, 1, '2023-06-30 08:58:18', '2023-07-09 12:32:30');

-- ----------------------------
-- Table structure for plazos_tasas
-- ----------------------------
DROP TABLE IF EXISTS `plazos_tasas`;
CREATE TABLE `plazos_tasas`  (
  `id_tasa` int NOT NULL AUTO_INCREMENT,
  `id_plazo` int NULL DEFAULT NULL,
  `valor` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_tasa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of plazos_tasas
-- ----------------------------
INSERT INTO `plazos_tasas` VALUES (1, 1, 3.50, 1, NULL, '2023-08-12 06:57:58');
INSERT INTO `plazos_tasas` VALUES (2, 1, 1.50, 1, NULL, '2023-08-12 06:58:07');
INSERT INTO `plazos_tasas` VALUES (3, 1, 1.00, NULL, '2023-06-30 09:06:26', '2023-08-12 06:58:13');
INSERT INTO `plazos_tasas` VALUES (4, 1, 8.00, NULL, '2023-06-30 09:06:41', '2023-08-12 06:58:21');
INSERT INTO `plazos_tasas` VALUES (5, 1, 5.00, NULL, '2023-06-30 09:07:13', '2023-06-30 09:07:13');
INSERT INTO `plazos_tasas` VALUES (6, 1, 6.00, NULL, '2023-06-30 09:07:25', '2023-08-12 06:58:28');
INSERT INTO `plazos_tasas` VALUES (7, 2, 5.00, NULL, '2023-06-30 09:09:33', '2023-06-30 09:09:33');
INSERT INTO `plazos_tasas` VALUES (8, 2, 3.00, NULL, '2023-06-30 09:09:40', '2023-06-30 09:09:40');
INSERT INTO `plazos_tasas` VALUES (9, 3, 7.00, NULL, '2023-06-30 09:09:49', '2023-06-30 09:09:49');
INSERT INTO `plazos_tasas` VALUES (10, 2, 1.00, NULL, '2023-07-09 13:45:52', '2023-07-09 13:45:52');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `presentacion` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `marca` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `costo` decimal(20, 2) NULL DEFAULT NULL,
  `cod_barra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `tipo_facturacion` int NULL DEFAULT NULL COMMENT '1-Compras 2-facturacion',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------

-- ----------------------------
-- Table structure for profesions
-- ----------------------------
DROP TABLE IF EXISTS `profesions`;
CREATE TABLE `profesions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profesions
-- ----------------------------
INSERT INTO `profesions` VALUES (1, 'Ama de Casa', 1, '2024-09-29 11:24:49', '2024-10-07 15:38:33');
INSERT INTO `profesions` VALUES (2, 'Ing. Informatica', 1, '2024-09-29 11:26:10', '2024-09-29 11:26:10');
INSERT INTO `profesions` VALUES (3, 'Lic. Administración de empresas', 1, '2024-09-29 11:26:41', '2024-10-07 18:53:29');
INSERT INTO `profesions` VALUES (4, 'Lic. Mercadeo', 1, '2024-09-29 11:26:43', '2024-10-07 18:53:42');
INSERT INTO `profesions` VALUES (5, 'Albañil', 1, '2024-09-29 11:26:43', '2024-10-07 18:54:03');

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores`  (
  `id_proveedor` int NOT NULL AUTO_INCREMENT,
  `dui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `nrc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `razon_social` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono` varbinary(15) NULL DEFAULT NULL,
  `decimales` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedores
-- ----------------------------

-- ----------------------------
-- Table structure for referencia_solicitud
-- ----------------------------
DROP TABLE IF EXISTS `referencia_solicitud`;
CREATE TABLE `referencia_solicitud`  (
  `id_referencia_solicitud` int NOT NULL AUTO_INCREMENT,
  `id_solicitud` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_referencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `parentesco_id` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_referencia_solicitud`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of referencia_solicitud
-- ----------------------------
INSERT INTO `referencia_solicitud` VALUES (3, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 10:57:00', '2024-10-07 10:57:00');
INSERT INTO `referencia_solicitud` VALUES (5, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 10:59:55', '2024-10-07 10:59:55');
INSERT INTO `referencia_solicitud` VALUES (6, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 11:03:54', '2024-10-07 11:03:54');
INSERT INTO `referencia_solicitud` VALUES (7, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 11:16:34', '2024-10-07 11:16:34');
INSERT INTO `referencia_solicitud` VALUES (8, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 11:18:58', '2024-10-07 11:18:58');
INSERT INTO `referencia_solicitud` VALUES (9, '11e5020d-1ee7-46db-b4b9-da2c6abf02e3', '1', 2, '2024-10-07 11:19:15', '2024-10-07 11:19:15');
INSERT INTO `referencia_solicitud` VALUES (10, 'ce095f3f-a79d-4236-b176-f36f616ba567', '1', 2, '2024-10-07 11:24:28', '2024-10-07 11:24:28');
INSERT INTO `referencia_solicitud` VALUES (11, '2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '1', 1, '2024-10-07 11:26:07', '2024-10-07 11:26:07');
INSERT INTO `referencia_solicitud` VALUES (12, '2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '1', 1, '2024-10-07 11:26:14', '2024-10-07 11:26:14');
INSERT INTO `referencia_solicitud` VALUES (13, '2c92e268-f71e-4853-9a62-cb2bd7bd2d6f', '1', 1, '2024-10-07 11:26:32', '2024-10-07 11:26:32');
INSERT INTO `referencia_solicitud` VALUES (14, '09ba4433-4c87-4c2e-b4cb-8125941af33d', '1', 3, '2024-10-07 11:26:40', '2024-10-07 11:26:40');
INSERT INTO `referencia_solicitud` VALUES (15, '09ba4433-4c87-4c2e-b4cb-8125941af33d', '1', 3, '2024-10-07 11:26:48', '2024-10-07 11:26:48');
INSERT INTO `referencia_solicitud` VALUES (16, '6545bdb9-7d71-4e85-82e0-b6db4d591774', '1', 1, '2024-10-07 11:27:10', '2024-10-07 11:27:10');
INSERT INTO `referencia_solicitud` VALUES (17, '6545bdb9-7d71-4e85-82e0-b6db4d591774', '1', 1, '2024-10-07 11:27:20', '2024-10-07 11:27:20');
INSERT INTO `referencia_solicitud` VALUES (18, '6545bdb9-7d71-4e85-82e0-b6db4d591774', '1', 1, '2024-10-07 11:27:23', '2024-10-07 11:27:23');
INSERT INTO `referencia_solicitud` VALUES (19, '0ef8c992-1462-4f4c-980e-84aef2147312', '1', 2, '2024-10-07 11:28:14', '2024-10-07 11:28:14');
INSERT INTO `referencia_solicitud` VALUES (20, '4db7cf85-f205-4648-8cc6-605c641ceffd', '1', 3, '2024-10-07 11:29:55', '2024-10-07 11:29:55');
INSERT INTO `referencia_solicitud` VALUES (22, 'efde1aaa-9721-4963-82c4-006350899c9f', '1', 1, '2024-10-07 11:30:46', '2024-10-07 11:30:46');
INSERT INTO `referencia_solicitud` VALUES (23, 'eab76a82-8dbe-4b37-87b8-510175e2e53c', '1', 2, '2024-10-07 11:31:27', '2024-10-07 11:31:27');
INSERT INTO `referencia_solicitud` VALUES (24, 'eab76a82-8dbe-4b37-87b8-510175e2e53c', '1', 3, '2024-10-07 11:31:30', '2024-10-07 11:31:30');
INSERT INTO `referencia_solicitud` VALUES (25, '42ca4b90-6882-463b-84fd-8130e3433f5d', '2', 14, '2024-10-07 20:27:32', '2024-10-07 20:27:32');
INSERT INTO `referencia_solicitud` VALUES (26, '42ca4b90-6882-463b-84fd-8130e3433f5d', '3', 8, '2024-10-07 20:27:42', '2024-10-07 20:27:42');
INSERT INTO `referencia_solicitud` VALUES (30, '42ca4b90-6882-463b-84fd-8130e3433f5d', '4', 34, '2024-10-07 20:44:19', '2024-10-07 20:44:19');
INSERT INTO `referencia_solicitud` VALUES (31, '42ca4b90-6882-463b-84fd-8130e3433f5d', '5', 34, '2024-10-07 20:44:25', '2024-10-07 20:44:25');

-- ----------------------------
-- Table structure for referencias
-- ----------------------------
DROP TABLE IF EXISTS `referencias`;
CREATE TABLE `referencias`  (
  `id_referencia` int NOT NULL AUTO_INCREMENT,
  `dui` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of referencias
-- ----------------------------
INSERT INTO `referencias` VALUES (1, NULL, 'Luis Arnulfo Márquez Argueta', NULL, '26541561', 'San Miguel', 'Computec', 'ninguna', 1, '2024-06-26', '2024-10-07');
INSERT INTO `referencias` VALUES (2, NULL, 'Marta Alicia Jandres', NULL, '76227690', 'B. Concepcion', 'Comerciante', NULL, 1, '2024-10-07', '2024-10-07');
INSERT INTO `referencias` VALUES (3, NULL, 'Lorena Urrutia', NULL, '6048-9756', 'B. Concepcion', 'Estudiante', NULL, 1, '2024-10-07', '2024-10-07');
INSERT INTO `referencias` VALUES (4, NULL, 'Yesenia Carolina', NULL, '7868-6209', 'B. Concepcion', 'Comerciante', NULL, 1, '2024-10-07', '2024-10-07');
INSERT INTO `referencias` VALUES (5, NULL, 'Katherine García', NULL, '7748-0638', 'Col. España', 'Comerciante', NULL, 1, '2024-10-07', '2024-10-07');

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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Administrador', '2023-06-08 23:37:51', '2023-06-08 23:37:51');
INSERT INTO `roles` VALUES (2, 'Cajero', '2023-06-08 23:40:25', '2023-06-08 23:40:25');
INSERT INTO `roles` VALUES (3, 'Gerente', '2023-06-08 23:40:31', '2023-06-08 23:40:31');
INSERT INTO `roles` VALUES (4, 'Contador', '2023-06-08 23:40:36', '2023-06-08 23:40:36');
INSERT INTO `roles` VALUES (5, 'Asesor de Crèditos', '2023-06-08 23:40:49', '2023-07-03 10:14:32');
INSERT INTO `roles` VALUES (6, 'Vigilante', '2023-06-08 23:40:56', '2023-06-08 23:40:56');
INSERT INTO `roles` VALUES (7, 'Ordenanza', '2023-06-08 23:41:04', '2023-06-08 23:41:04');
INSERT INTO `roles` VALUES (10, 'asdasd', '2023-06-08 23:50:17', '2023-06-08 23:50:17');
INSERT INTO `roles` VALUES (11, 'asd 8781 a', '2023-06-08 23:50:21', '2023-06-09 14:43:52');
INSERT INTO `roles` VALUES (12, 'asd', '2023-06-09 14:42:46', '2023-06-09 14:42:46');
INSERT INTO `roles` VALUES (13, 'Colector', '2024-10-07 20:01:46', '2024-10-07 20:01:46');

-- ----------------------------
-- Table structure for solicitud_credito
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_credito`;
CREATE TABLE `solicitud_credito`  (
  `id_solicitud` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero_solicitud` int NULL DEFAULT NULL,
  `id_empleado` bigint NULL DEFAULT NULL,
  `id_cliente` int NULL DEFAULT NULL,
  `id_socio` int NULL DEFAULT NULL,
  `monto_solicitado` decimal(10, 2) NULL DEFAULT NULL,
  `fecha_solicitud` date NULL DEFAULT NULL,
  `plazo` int NULL DEFAULT NULL,
  `tasa` decimal(10, 2) NULL DEFAULT NULL,
  `cuota` decimal(10, 2) NULL DEFAULT NULL,
  `aportaciones` decimal(10, 2) NULL DEFAULT NULL,
  `seguro_deuda` decimal(10, 2) NULL DEFAULT NULL,
  `destino` int NULL DEFAULT NULL,
  `tipo_garantia` bigint NULL DEFAULT NULL,
  `garantia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `id_conyugue` int NULL DEFAULT NULL,
  `empresa_labora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `sueldo_conyugue` decimal(10, 2) NULL DEFAULT NULL,
  `tiempo_laborando` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `sueldo` decimal(10, 2) NULL DEFAULT NULL,
  `cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `telefono_trabajo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `sueldo_solicitante` decimal(10, 2) NULL DEFAULT NULL,
  `comisiones` decimal(10, 2) NULL DEFAULT NULL,
  `negocio_propio` decimal(10, 2) NULL DEFAULT NULL,
  `otros_ingresos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `total_ingresos` decimal(10, 2) NULL DEFAULT NULL,
  `gastos_vida` decimal(10, 2) NULL DEFAULT NULL,
  `pagos_obligaciones` decimal(10, 2) NULL DEFAULT NULL,
  `gastos_negocios` decimal(10, 2) NULL DEFAULT NULL,
  `otros_gastos` decimal(10, 2) NULL DEFAULT NULL,
  `total_gasto` decimal(10, 2) NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL COMMENT '1-Presentada \r\n2-Aprobada \r\n3-Rechazada \r\n4-Enviada a Comite',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of solicitud_credito
-- ----------------------------
INSERT INTO `solicitud_credito` VALUES ('42ca4b90-6882-463b-84fd-8130e3433f5d', 1, 2, 2, NULL, 500.00, '2024-08-08', 12, 42.00, 51.74, 10.00, 0.00, 69, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 1008.00, '100', 1108.00, 400.00, 250.00, 250.00, 0.00, 900.00, 1, '2024-10-07 20:28:56', '2024-10-07 20:28:56');

-- ----------------------------
-- Table structure for solicitud_credito_bienes
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_credito_bienes`;
CREATE TABLE `solicitud_credito_bienes`  (
  `id_propiedad` int NOT NULL AUTO_INCREMENT,
  `id_solicitud` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `clase_propiedad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `valor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `hipotecado_bien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_propiedad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of solicitud_credito_bienes
-- ----------------------------

-- ----------------------------
-- Table structure for temp_password
-- ----------------------------
DROP TABLE IF EXISTS `temp_password`;
CREATE TABLE `temp_password`  (
  `id_temp_password` int NOT NULL AUTO_INCREMENT,
  `temp_password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `type_operation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `is_used` int NULL DEFAULT NULL,
  `expiration_date` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_temp_password`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of temp_password
-- ----------------------------
INSERT INTO `temp_password` VALUES (1, '$2y$10$64v2WU6CjMGJM0eJuWR4yOl9Yp2l8MO0EbsgeZwct1fhh7BxUaDq2', '41Hmu', 1, '2024-06-26 09:35:55', '2024-06-26 09:20:55', '2024-06-26 09:21:44');
INSERT INTO `temp_password` VALUES (2, '$2y$10$RlUttlZEqgXLqT1kQPruhucWamIWGoyUmwK0VRhTeVdD3K/3.K926', 'M24vO', 1, '2024-08-15 09:16:21', '2024-08-15 09:01:21', '2024-08-15 09:01:35');
INSERT INTO `temp_password` VALUES (3, '$2y$10$FhRQ8S.YrpK6eBdJcPmPsufxfJwgK8UDAmD0ltX2FMKu/rpNowhdu', 'IySQO', 1, '2024-10-06 13:36:39', '2024-10-06 13:21:39', '2024-10-06 13:21:49');

-- ----------------------------
-- Table structure for tipo_garantia
-- ----------------------------
DROP TABLE IF EXISTS `tipo_garantia`;
CREATE TABLE `tipo_garantia`  (
  `id_tipo_garantia` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_garantia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipo_garantia
-- ----------------------------
INSERT INTO `tipo_garantia` VALUES (1, 'Garantía', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (2, 'Hipotecaria', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (3, 'Fiduciaria', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (4, 'Prendaria', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (5, 'Orden de Descuento', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (6, 'Sin Garantía', 1, NULL, NULL);
INSERT INTO `tipo_garantia` VALUES (7, 'Pagaré', 1, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipos_cuentas
-- ----------------------------
INSERT INTO `tipos_cuentas` VALUES (1, 'Ahorro a la vista', 1, NULL, '2023-07-26');
INSERT INTO `tipos_cuentas` VALUES (2, 'Ahorro Navideño', 1, NULL, '2023-07-09');
INSERT INTO `tipos_cuentas` VALUES (7, 'Ahorro Infantil', 1, '2023-06-06', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (9, 'Aportaciones', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (10, 'Ahorro a plazo 6 meses', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_cuentas` VALUES (11, 'Ahorro a plazo 1 año', 1, '2023-06-08', '2023-07-09');

-- ----------------------------
-- Table structure for tipos_partidas_contables
-- ----------------------------
DROP TABLE IF EXISTS `tipos_partidas_contables`;
CREATE TABLE `tipos_partidas_contables`  (
  `id_tipo_partida` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NULL DEFAULT NULL,
  `estado` int NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `updated_at` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_partida`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_spanish2_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tipos_partidas_contables
-- ----------------------------
INSERT INTO `tipos_partidas_contables` VALUES (1, 'DIARIO', 1, NULL, '2023-07-26');
INSERT INTO `tipos_partidas_contables` VALUES (2, 'PROVISION', 1, NULL, '2023-07-09');
INSERT INTO `tipos_partidas_contables` VALUES (3, 'INGRESOS', 1, '2023-06-06', '2023-06-10');
INSERT INTO `tipos_partidas_contables` VALUES (4, 'EGRESOS', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_partidas_contables` VALUES (5, 'AJUSTES', 1, '2023-06-08', '2023-06-10');
INSERT INTO `tipos_partidas_contables` VALUES (6, 'LIQUIDACION', 1, '2023-06-08', '2023-07-09');
INSERT INTO `tipos_partidas_contables` VALUES (7, 'APERTURA', 1, NULL, NULL);

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
  `temp_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_recovery` bit(1) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 2, 'caja_cimacoop@gmail.com', NULL, '$2y$10$Ydn9oDBKaXLibdiTwJtiLudnZANPb2A3lMVVoVxZAEKMn.ZtEKpW2', '', 'yUBUZXAAIm4UrvhH8ciHxs2qPgNnJcVXfvVN0i7rdcpoeakclq4ZgUWK6SZv', b'0', NULL, '2024-10-07 20:02:32');
INSERT INTO `users` VALUES (22, 3, 1, 'gerencia_cimacoop@gmail.com', NULL, '$2y$10$uUQ3P8GQoXKw5akGvoLcN./kph.S9yMzw..DSUdCSqRYdsdXRagim', '', 'YTvziMEEmh3ZLVy44HVsj8qcEjWG0PXNW4ncm0yStKAOOzXGrhoKgnuKZ7jX', b'0', '2024-10-07 20:00:20', '2024-10-07 20:02:49');
INSERT INTO `users` VALUES (23, 2, 13, 'cimacoop_colector@gmail.com', NULL, '$2y$10$TqH7IJ0NT2ZB5BoosYO.uO2H3tluS5wLKov9ki6GjqHP8SClnRM4O', '', NULL, NULL, '2024-10-07 20:01:31', '2024-10-07 20:02:09');

-- ----------------------------
-- View structure for cierre_mensual_detalle
-- ----------------------------
DROP VIEW IF EXISTS `cierre_mensual_detalle`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `cierre_mensual_detalle` AS SELECT A.*, B.codigo_agrupador
FROM cierre_mensual_partida AS A
INNER JOIN catalogo AS B ON A.id_cuenta = B.id_cuenta ;

-- ----------------------------
-- View structure for partidascontables
-- ----------------------------
DROP VIEW IF EXISTS `partidascontables`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `partidascontables` AS SELECT
	A.id_partida_contable,
	A.num_partida,
	A.year_contable,
	A.fecha_partida,
	A.tipo_partida,
	A.concepto,
	A.estado,
	B.id_cuenta,
	B.parcial,
	B.cargos,
	B.abonos,
	C.codigo_agrupador,
	C.numero,
	C.descripcion
FROM
	partidas_contables AS A
	INNER JOIN partida_contables_detalle AS B ON A.id_partida_contable = B.id_partida 
	INNER JOIN catalogo as C on B.id_cuenta=C.id_cuenta
	where num_partida>0
ORDER BY
	A.num_partida ASC ;

SET FOREIGN_KEY_CHECKS = 1;
