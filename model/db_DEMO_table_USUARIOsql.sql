create database demo
use demo

create table Usuario(
id INT IDENTITY(1,1) PRIMARY KEY,
nombre varchar(35) NOT NULL,
apellidos varchar(60) NOT NULL,
nacimiento date NOT NULL,
ciudad_estado varchar(70) NOT NULL,
usuario varchar(30) NOT NULL,
correo varchar(50) NOT NULL,
contrasena varchar(61) NOT NULL
)