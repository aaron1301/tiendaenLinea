create database tienda;
use tienda;

create table categoria(
	id int auto_increment not null,	
	nombre varchar(50) not null,
	created_at timestamp not null,
	updated_at timestamp not null,
	primary key(id)	
	);

create table articulo(
	codigo int auto_increment not null,
	nombre varchar(50) not null,
	precio decimal(10,2) not null,	
	descripcion varchar(500),
	costo decimal(10,2) not null,
	categoria int not null,
	created_at timestamp not null,
	updated_at timestamp not null,
	primary key(codigo),
	foreign key(categoria) references categoria(id)	
	);

insert into	categoria(nombre) values("Celulares");
insert into	categoria(nombre) values("Accesorios");

insert into articulo(nombre,precio,costo,categoria) values("Moto X",5000,4000,1);
insert into articulo(nombre,precio,costo,categoria) values("Galaxy 7",8000,8000,1);

create table users(  
  id int auto_increment not null,
  name varchar(255)  not null,
  direccion varchar(255) not null,
  telefono int not null,  
  fecha_nacimiento date not null,
  email varchar(255) not null,
  password varchar(255) not null,
  administrador boolean default false,
  remember_token varchar(100),
  `created_at` timestamp,
  `updated_at` timestamp,
  primary key (id),
  unique key(email)
);

insert into users(name,direccion,telefono,fecha_nacimiento,email,password,administrador) values("Aaron Velazquez","Por ahi",7280311,'1993-01-13',"aaron@gmail.com","$2y$10$kBtlyj7zO9L9iJFQgkyvY.jaCkWBrzAoCi8fmSfVa.BZ7kinRxQaG",true);

CREATE TABLE password_resets(
  email varchar(255) not null,
  token varchar(255) not null,
  created_at timestamp,
  key(email),
  key(token) 
);

create table calificacion(  
  id int auto_increment not null,
  valor int  not null,
  usuario int not null,
  articulo int not null,  
  `created_at` timestamp,
  `updated_at` timestamp,
  primary key (id),
  foreign key (usuario) references users(id),
  foreign key (articulo) references articulo(codigo),
  unique key(usuario,articulo)
);

create table comentario(  
  id int auto_increment not null,
  contenido varchar(255)  not null,
  usuario int not null,
  articulo int not null,  
  `created_at` timestamp,
  `updated_at` timestamp,
  primary key (id),
  foreign key (usuario) references users(id),
  foreign key (articulo) references articulo(codigo),
  unique key(usuario,articulo)
);

	