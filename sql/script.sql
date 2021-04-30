create database tempo_store;

create table marca(
  mar_id numeric not null,
  mar_nombre varchar(22) not null,
  primary key (mar_id));


create table producto(
  pro_id numeric not null,
  pro_nombre varchar not null,
  pro_descripcion varchar not null,
  pro_unidades numeric not null,
  pro_precio numeric not null,
  mar_id numeric not null,
  primary key (pro_id),
  foreign key (mar_id) references marca(mar_id));

create table usuario(
  usu_correo varchar (22) not null,
  usu_nombre varchar (22) not null,
  usu_contraseña varchar(22) not null,
  primary key (usu_correo));



