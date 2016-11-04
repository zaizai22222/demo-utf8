CREATE DATABSE demo_utf8;

CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name_latin` char(20) NOT NULL,
  `name_utf8` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_utf8md4` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4_unicode_ci;
