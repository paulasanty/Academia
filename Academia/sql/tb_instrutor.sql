CREATE TABLE `tb_instrutor` (
  `Id_instrutor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `tp_aula` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_instrutor`),
  KEY `fk_aula` (`tp_aula`),
  CONSTRAINT `fk_aula` FOREIGN KEY (`tp_aula`) REFERENCES `tb_aula` (`Id_aula`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
