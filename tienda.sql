create database tienda;
use tienda;

create table categoria(
	id int auto_increment not null,	
	nombre varchar(50) not null,
  descripcion varchar(500) not null,
	created_at timestamp default now(),
	updated_at timestamp default now(),
	primary key(id)	
	);

create table articulo(
	codigo int auto_increment not null,
	nombre varchar(50) not null,
	precio decimal(10,2) not null,	
	descripcion varchar(500),
	costo decimal(10,2) not null,
	categoria int not null,
	created_at timestamp default now(),
	updated_at timestamp default now(),
	primary key(codigo),
	foreign key(categoria) references categoria(id)	
	);

create table inventario(    
  id int not null,
  cantidad int not null,  
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),  
  foreign key (id) references articulo(codigo)  
);

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
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),
  unique key(email)
);

create table password_resets(
  email varchar(255) not null,
  token varchar(255) not null,
  created_at  timestamp default now(),
  key(email),
  key(token) 
);

create table calificacion(  
  id int auto_increment not null,
  valor int  not null,
  usuario int not null,
  articulo int not null,  
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
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
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),
  foreign key (usuario) references users(id),
  foreign key (articulo) references articulo(codigo),
  unique key(usuario,articulo)
);

create table carrito(  
  id int auto_increment not null,  
  usuario int not null,
  articulo int not null,
  cantidad int not null,  
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),
  foreign key (usuario) references users(id),
  foreign key (articulo) references articulo(codigo),
  unique key(usuario,articulo)  
);
  
create table pedido(  
  id int auto_increment not null,  
  usuario int not null,
  direccion varchar(50) not null,
  total decimal(10,2) not null,    
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),
  foreign key (usuario) references users(id)    
);

create table pedidoDetalle(  
  id int auto_increment not null,  
  pedido int not null,
  articulo int not null,
  cantidad int not null,  
  `created_at` timestamp default now(),
  `updated_at` timestamp default now(),
  primary key (id),
  foreign key (pedido) references pedido(id),
  foreign key (articulo) references articulo(codigo)   
);

delimiter |
create trigger restarinventario after insert on pedidoDetalle
  for each row
  begin        
    update inventario set cantidad = cantidad - 1 where new.articulo = id; 
  end;
|
delimiter ;

insert into categoria(nombre,descripcion) values("Celulares","Los mejores equipos para todos los miembros de la familia, elige el que se adapte mejor a tus necesidades.");
insert into categoria(nombre,descripcion) values("Accesorios","Si se te descompuso o te hace falta algo nuevo para tus equipos nosotros tenemos todo tipo de accesorios");
insert into categoria(nombre,descripcion) values("Tablets","Todos los niños quieren una, y los adultos las necesitan, mira cada uno de los modelos y marcas que ofrecemos");
insert into categoria(nombre,descripcion) values("Laptops","Nos distingue la gran variedad de laptops que tenemos, no te quedes sin la tuya visita nuestro catalogo y elige la que sea más apta para ti.");
insert into categoria(nombre,descripcion) values("Smartwatch","Excelentes relojes para todos aquellos que andan perdidos en el tiempo. ");


insert into articulo(nombre,descripcion,precio,costo,categoria) values("Moto X",
"Moto X siempre te escucha, te responde sin que tengas que usar tus manos. 
Nunca más perderás tus fotos, con sólo sacudirlo accederás a la cámara y tocando la pantalla donde sea podrás hacer clic y tener la foto perfecta. 
El Moto X te dice lo que necesitas saber. 
No necesitas estar revisando la hora o tus mensajes constantemente, las notificaciones te llegan automáticamente.
 Moto X, lo mejor de Google y un diseño perfecto para la palma de tu mano."
,5000,4000,1);
insert into articulo(nombre,descripcion,precio,costo,categoria) values("Galaxy S7",
"El Nuevo Galaxy S7, con numerosas innovaciones en sus funciones, hace que su uso sea más fácil y enriquecido. 
Con el diseño de cristal y metal como el Galaxy S6 pero con un perfecto agarre, hace del galaxy S7 el mejor Smartphone del mercado.
Con el certificado IP68 contra polvo y agua, podrás estar en la lluvia sin preocupación, con su batería de larga duración y carga ultrrápida estarás siempre conectado sin perder ningún detalle.
Para esos momentos inolvidables, Galaxy S7 te brinda una cámara de 12 dual mpx con un lente con mayor apertura (F1.7), con estabilizador óptico de imagen (OIS) y su rápido auto focus que te permitirán tener fotos más nítidas y brillantes en ambientes de poca luz o incluso con movimiento."  
,15479,14000,1);
insert into articulo(nombre,precio,costo,categoria) values("Samsung Galaxy Tab S",6500,6000,3);
insert into articulo(nombre,precio,costo,categoria) values("Asus Z580C-B1-BK",3900,2500,3);
insert into articulo(nombre,precio,costo,categoria) values("Huawei Mate 8",10001,9000,1);
insert into articulo(nombre,precio,costo,categoria) values("OnePlus 3",11000,10000,1); 
insert into articulo(nombre,precio,costo,categoria) values("Audiculares",5000,3000,2);

insert into inventario(id,cantidad) values(1,50);
insert into inventario(id,cantidad) values(2,100);  
insert into inventario(id,cantidad) values(3,20);  
insert into inventario(id,cantidad) values(4,40);
insert into inventario(id,cantidad) values(5,100);
insert into inventario(id,cantidad) values(6,80);
insert into inventario(id,cantidad) values(7,1);    

insert into users(name,direccion,telefono,fecha_nacimiento,email,password,administrador) values("Aaron Velazquez","Por ahi",7280311,'1993-01-13',"aaron630m@gmail.com","$2y$10$kBtlyj7zO9L9iJFQgkyvY.jaCkWBrzAoCi8fmSfVa.BZ7kinRxQaG",true);
insert into users(name,direccion,telefono,fecha_nacimiento,email,password,administrador) values("César Manjarrez Admin","La Cruz Elota",1051429,'1993-06-17',"cesar63549@gmail.com","$2y$10$uJLx1tnOF5uv7opFZCiyHO7uboe1D9K6ZMshSomoJ.IXO86WkE5PG",true);
insert into users(name,direccion,telefono,fecha_nacimiento,email,password,administrador) values("Ernesto Gutierrez","La Cruz Elota",1051429,'1993-06-17',"cesar_170693@hotmail.com","$2y$10$EnL.OZU01JbodT3qulO7qObA99bIN4RJrNtONPHYakJT6kOl7aEIK",false);

insert into comentario(contenido,usuario,articulo) values("gran producto",1,1);
insert into calificacion(usuario,articulo,valor) values(1,3,8);
insert into calificacion(usuario,articulo,valor) values(1,4,9);
insert into calificacion(usuario,articulo,valor) values(2,5,7);  


	