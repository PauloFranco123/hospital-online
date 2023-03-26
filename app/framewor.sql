create database framewor
default character set utf8;
use framewor;

create table usuarios
(
	usuario_id int primary key auto_increment,
	nome_usuario varchar(50) not null,
	nome varchar(100) not null,
    email varchar(100) not null,
    senha varchar(100) not null,
	biografia text not null,
	telefone_usuario varchar(15),
	endereco_usuario varchar(90)
);


create table consulta
(
	id integer primary key auto_increment,
	usuario_id int references usuario(usuario_id),
	email_alternative varchar(80),
	phone_alternative varchar(20) not null,
	especialidade varchar(200) not null,
	data_evento date not null,
	criado_em timestamp
) default charset = utf8;

create table posts
(
	id int primary key auto_increment,
    usuario_id int references usuario(usuario_id),
    titulo varchar(255) not null,
    texto text not null,
    criado_em timestamp 
    
)default charset= utf8;

