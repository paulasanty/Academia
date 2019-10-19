CREATE TABLE `tb_financeiro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` int(11) NOT NULL DEFAULT 0,
  `plano` int(11) DEFAULT NULL,
  `form_pgto` int(11) DEFAULT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `valorParcela` decimal(10,2) DEFAULT NULL,
  `numParcela` decimal(10,0) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `dt_pgto` date DEFAULT NULL,
  `valorPago` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_matricula_cliente` (`matricula`),
  KEY `fk_form_pgto_cliente` (`form_pgto`),
  KEY `fk_plano_cliente` (`plano`),
  CONSTRAINT `fk_form_pgto_cliente` FOREIGN KEY (`form_pgto`) REFERENCES `tb_cliente` (`form_pgto`),
  CONSTRAINT `fk_matricula_cliente` FOREIGN KEY (`matricula`) REFERENCES `tb_cliente` (`matricula`),
  CONSTRAINT `fk_plano_cliente` FOREIGN KEY (`plano`) REFERENCES `tb_plano` (`Id_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
