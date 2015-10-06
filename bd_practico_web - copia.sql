DROP DATABASE IF EXISTS practicoweb;
create database practicoweb;
USE practicoweb;

CREATE TABLE vehiculo(	patente varchar(10) PRIMARY KEY,
						marca varchar(30),
                        modelo varchar(30),
                        nro_chasis varchar(30),
                        nro_motor varchar(30),
                        año_fabricacion int,
						kilometros int);

CREATE TABLE especialidad(	cod_especialidad varchar(2) PRIMARY KEY,
							descripcion varchar(15)	);

CREATE TABLE empleado(	dni int PRIMARY KEY,
						nombre varchar(30),
                        fecha_nac date,
                        tipo_licencia varchar(30),
                        tipo_empleado varchar(2),
                        FOREIGN KEY (tipo_empleado) REFERENCES especialidad(cod_especialidad)	);

CREATE TABLE viaje (	cod_viaje int PRIMARY KEY,
						chofer int,
						origen varchar(50),
						destino varchar(50),
                        vehiculo int,
                        acoplado int,
                        cliente varchar (30),
                        tipo_carga varchar(30),
						FOREIGN KEY (vehiculo) REFERENCES vehiculo(patente),
						FOREIGN KEY (acoplado) REFERENCES vehiculo(patente),
                        FOREIGN KEY (dni) references empleado(dni)	);

CREATE TABLE mantenimiento(	cod_mantenimiento int PRIMARY KEY,
							fecha date,
                            km_unidad int,
                            patente varchar(10),
                            costo int,
							mecanico int,
                            repuestos text,
                            FOREIGN KEY (patente) REFERENCES vehiculo(patente),
							FOREIGN KEY (mecanico) references empleado(dni)	);
                                        
CREATE TABLE parada(	cod_parada int,
						cod_viaje int,
                        kilometros int,
                        combustible_cargado int,
                        gasto int,
                        PRIMARY KEY (cod_parada, cod_viaje, kilometros),
                        FOREIGN KEY (cod_viaje) REFERENCES viaje(cod_viaje)	);

CREATE TABLE rol(	cod_rol int PRIMARY KEY,
					descripcion varchar(20)	);

CREATE TABLE usuario( 	usuario varchar(30) PRIMARY KEY, 
						contraseña varchar(30),
                        dni int,
                        cod_rol int,
                        FOREIGN KEY (dni) REFERENCES empleado(dni),
                        FOREIGN KEY (cod_rol) REFERENCES rol(cod_rol)
                        );