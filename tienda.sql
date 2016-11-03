create database tienda;
use tienda;

create table categoria(
	id int auto_increment not null,	
	nombre varchar(50) not null,
	primary key(id)	
	);

create table articulo(
	codigo int auto_increment not null,
	nombre varchar(50) not null,
	precio decimal(10,2) not null,	
	descripcion varchar(500),
	costo decimal(10,2) not null,
	categoria int not null,
	primary key(codigo),
	foreign key(categoria) references categoria(id)	
	);

insert into	categoria(nombre) values("Celulares");
insert into	categoria(nombre) values("Accesorios");

insert into articulo(nombre,precio,costo,categoria) values("Moto X",5000,4000,1);
insert into articulo(nombre,precio,costo,categoria) values("Galaxy 7",8000,8000,1);