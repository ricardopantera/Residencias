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



select
a.id_equipos,
a.nombre_equipo,
a.id_proyecto,
a.idusuario,
b.nombre_usuario,
c.nombre_proyecto
from equipos as a
inner join usuario as b on a.idusuario = b.id_usuario
inner join proyecto as c on a.id_proyecto = c.id_proyecto
where c.id_proyecto = 1


