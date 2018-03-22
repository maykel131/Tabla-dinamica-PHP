CREATE DATABASE cadastrar;
use cadastrar;

CREATE TABLE persona(id int AUTO_INCREMENT,
	                nombre varchar(50),
	               apellido varchar(50),
	               telefono varchar(50),
	               sexo char,
	               correo varchar(50),
	               PRIMARY KEY (id) );