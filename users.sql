use tienda;

create table users(  
  id int(10) auto_increment not null,
  name varchar(255)  not null,
  email varchar(255) not null,
  password varchar(255) not null,
  remember_token varchar(100),
  `created_at` timestamp,
  `updated_at` timestamp,
  primary key (id),
  unique key(email)
);


CREATE TABLE password_resets(
  email varchar(255) not null,
  token varchar(255) not null,
  created_at timestamp,
  key(email),
  key(token) 
);

