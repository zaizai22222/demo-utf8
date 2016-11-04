CREATE DATABSE demo_utf8;

CREATE TABLE `demo` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name_latin` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `name_utf8` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_utf8md4` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
