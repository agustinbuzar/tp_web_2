DROP DATABASE IF EXISTS tp_web;
create database tp_web;
USE tp_web;

CREATE TABLE vehiculo(	patente varchar(10) PRIMARY KEY,
						marca varchar(30),
                        modelo varchar(30),
                        nro_chasis varchar(30),
                        nro_motor varchar(30),
                        ano_fabricacion int,
						kilometros int );

CREATE TABLE licencia(	cod_lic int primary key,
						descripcion varchar(30));

CREATE TABLE especialidad(	cod_especialidad int PRIMARY KEY,
							descripcion varchar(15));

CREATE TABLE empleado(	dni int PRIMARY KEY,
						nombre varchar(30),
                        apellido varchar(30),
                        fecha_nac date,
                        tipo_empleado int,
                        licencia int,
						foreign key (licencia) references licencia(cod_lic),
                        FOREIGN KEY (tipo_empleado) REFERENCES especialidad(cod_especialidad)	);

CREATE TABLE viaje (	cod_viaje int PRIMARY KEY AUTO_INCREMENT,
						dni_chofer int,
						origen varchar(50),
						destino varchar(50),
                        vehiculo varchar(10),
                        acoplado varchar(10),
                        cliente varchar (30),
                        tipo_carga varchar(30),
						FOREIGN KEY (vehiculo) REFERENCES vehiculo(patente),
						FOREIGN KEY (acoplado) REFERENCES vehiculo(patente),
                        FOREIGN KEY (chofer) REFERENCES empleado(dni)	);

CREATE TABLE mantenimiento(	cod_mantenimiento int PRIMARY KEY,
							fecha date,
                            km_unidad int,
                            patente varchar(10),
                            costo int,
							mecanico int,
                            repuestos text,
                            FOREIGN KEY (patente) REFERENCES vehiculo(patente),
							FOREIGN KEY (mecanico) REFERENCES empleado(dni)	);
                                        
CREATE TABLE parada(	cod_parada int,
						cod_viaje int,
                        kilometros int,
                        combustible_cargado int,
                        gasto int,
                        PRIMARY KEY (cod_parada, cod_viaje, kilometros),
                        FOREIGN KEY (cod_viaje) REFERENCES viaje(cod_viaje)	);

CREATE TABLE rol(	cod_rol int PRIMARY KEY,
					descripcion varchar(20)	);

CREATE TABLE usuario( 	nombre varchar(30) PRIMARY KEY,
						clave varchar(30),
                        dni int,
                        cod_rol int,
                        FOREIGN KEY (dni) REFERENCES empleado(dni),
                        FOREIGN KEY (cod_rol) REFERENCES rol(cod_rol)	);

insert into licencia(cod_lic, descripcion)
values	(1,'Automovil'),
		(2,'Auto y Camion'),
        (3,'Auto y Camion con acoplado');

insert into especialidad(cod_especialidad, descripcion)
values	(1,'Administracion'),
		(2,'conductor'),
        (3,'mecanico'),
        (4,'gerencia');

insert into empleado (dni,nombre, apellido, fecha_nac, tipo_empleado, licencia)
values 	(11111111,'Agustin','Buzarquis','1991-03-06',1,2),
		(22222222,'Juan','Murano','1993-01-01',2,3),
        (33333333,'Martin','Calvo','1993-09-09',3,1),
        (4444444,'Maximiliano','Gonzales','2000-01-01',3,1);

INSERT INTO rol (cod_rol, descripcion)
values (1,'chofer'),
		(2,'administrador'),
        (3,'supervisor');

insert into usuario (nombre, clave, dni, cod_rol)
values ('admin','123',11111111,2),
		('chofi','4040',22222222,1),
        ('capo','111',33333333,3);
