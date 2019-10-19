CREATE TABLE `tb_aula` (
  `Id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `nomeInstrutor` int(11) DEFAULT NULL,
  `hrInicio` time DEFAULT NULL,
  `hrTermino` time DEFAULT NULL,
  `dias` varchar(255) DEFAULT NULL,
  `tipo_Aula` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_aula`),
  KEY `fk_instrutor` (`nomeInstrutor`),
  CONSTRAINT `fk_instrutor` FOREIGN KEY (`nomeInstrutor`) REFERENCES `tb_instrutor` (`Id_instrutor`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
