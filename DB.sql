create table proyecto (
id_proyecto int (10) auto_increment,
nombre_proyecto varchar(250),
primary key (id_proyecto)
);



create table equipos (
id_equipos int (10) auto_increment,
nombre_equipo varchar(250),
id_proyecto int(10),
idusuario int(10),
primary key (id_equipos),
  KEY `FK_Proyecto` (`id_proyecto`),
  KEY `FK_USUARIO` (`idusuario`),
  CONSTRAINT `FK_Proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  CONSTRAINT `FK_USUARIO` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id_usuario`)
  
);


CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(250) DEFAULT NULL,
  `contraseña` varchar(250) DEFAULT NULL,
  `idrol` int(10) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_roles` (`idrol`),
  CONSTRAINT `FK_roles` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;













CREATE TABLE `roles` (
  `id_rol` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
SELECT * FROM db_hik.roles;






/*tabla de equipos*/

create table equipo (
id_equipo int (10) auto_increment,
nombre_equipo varchar(250),
primary key (id_equipo)
);

/*tabla de preguntas*/
create table preguntas(
id_pregunta int(10) auto_increment,
valor_pregunta int(100),
primary key (id_pregunta)
);


/*tabla de aspectos */






