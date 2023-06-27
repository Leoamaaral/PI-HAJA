CREATE DATABASE project;

USE project;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY
    nome VARCHAR(100),
    telefone VARCHAR(30),
    email VARCHAR(60),
    senha VARCHAR(32)
);

CREATE TABLE dados (
    id INT AUTO_INCREMENT PRIMARY KEY
    id_usuario INT,
    equipe VARCHAR(100),
    carro VARCHAR(100),
    kmola VARCHAR(100),
    seno VARCHAR(100),
    arctg VARCHAR(100),
    angulo VARCHAR(100),
    kmola2 VARCHAR(100),
    seno2 VARCHAR(100),
    arctg2 VARCHAR(100),
    angulo2 VARCHAR(100),
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario)
);
