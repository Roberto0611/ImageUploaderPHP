CREATE TABLE IF NOT EXISTS `images_tabla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagenes` longblob NOT NULL,
  `creado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;