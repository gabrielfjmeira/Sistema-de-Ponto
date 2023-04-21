CREATE DATABASE prototipo_db;
USE prototipo_db;

/*Criação da Tabela de Usuários*/
CREATE TABLE USUARIO(
	USUARIO_Codigo INT(3) NOT NULL AUTO_INCREMENT,
    USUARIO_Nome VARCHAR(100) NOT NULL,
    USUARIO_Email VARCHAR(70) NOT NULL UNIQUE,
    USUARIO_Senha VARCHAR(100) NOT NULL,
    USUARIO_Administrador BOOLEAN NOT NULL,
    
    PRIMARY KEY(USUARIO_Codigo)
);

/*Criação da Tabela de Log de Usuários*/
CREATE TABLE LOGUSUARIO(
	LOGUSUARIO_ID INT(3) NOT NULL AUTO_INCREMENT,
    USUARIO_Codigo INT(3) NOT NULL,
    LOGUSUARIO_Realizado DATETIME NOT NULL,
    LOGUSUARIO_Descricao VARCHAR(255) NOT NULL,        
    
    PRIMARY KEY(LOGUSUARIO_ID, USUARIO_Codigo, LOGUSUARIO_Realizado),
    FOREIGN KEY(USUARIO_Codigo) REFERENCES USUARIO(USUARIO_Codigo)
);

/*Criação da Tabela de Ponto Eletrônico*/
CREATE TABLE PONTO(
    USUARIO_Codigo INT(3) NOT NULL,
    PONTO_Realizado DATETIME NOT NULL,
    PONTO_Tipo BOOLEAN NOT NULL,

    PRIMARY KEY(USUARIO_Codigo, PONTO_Realizado),
    FOREIGN KEY(USUARIO_Codigo) REFERENCES USUARIO(USUARIO_Codigo)
);