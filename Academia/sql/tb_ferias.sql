CREATE TABLE `tb_ferias` (
  `Id_ferias` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) DEFAULT NULL,
  `periodo` date DEFAULT NULL,
  `qtd_dias` int(2) DEFAULT NULL,
  PRIMARY KEY (`Id_ferias`),
  KEY `fk_matricula` (`matricula`),
  CONSTRAINT `fk_matricula` FOREIGN KEY (`matricula`) REFERENCES `tb_cliente` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
