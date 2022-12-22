CREATE DATABASE PolarFitnessSolutions;
USE PolarFitnessSolutions;

CREATE TABLE ginasio(
    id          INT         UNSIGNED    AUTO_INCREMENT,
    nome        VARCHAR(50)     NOT NULL,
    morada      VARCHAR(200)    NOT NULL,
    telefone    INT             NOT NULL,
    email       VARCHAR(200)    NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE user(
    id                      INT             UNSIGNED   AUTO_INCREMENT,
    username                VARCHAR(50)     NOT NULL,
    password_hash           VARCHAR(255)    NOT NULL,
    email                   VARCHAR(70)     NOT NULL,
    auth_key                VARCHAR(32)     NOT NULL,
    password_reset_token    VARCHAR(255)    NULL    UNIQUE,    
    created_at              DATETIME             NOT NULL,
    updated_at              DATETIME             NOT NULL,
    verification_token      VARCHAR(255)    NULL,
    `status`                SMALLINT(6)     NOT NULL     DEFAULT '9',
    rua                     VARCHAR(200)    NOT NULL,
    codigo_postal           VARCHAR(8)      NOT NULL,
    localidade              VARCHAR(50)     NOT NULL,
    telefone                INT             NOT NULL,
    nif                     INT             NOT NULL,
    genero                  ENUM('Masculino', 'Feminimo', 'Outro')  NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE salaDeExercicio(
    id          INT             UNSIGNED   AUTO_INCREMENT,   
    lotacao     TINYINT         NOT NULL,
    nome        VARCHAR(50)     NOT NULL,
    user_id		INT             UNSIGNED,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE inscricao(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    horadata                DATETIME    NOT NULL,
    id_user                 INT			UNSIGNED,
    FOREIGN KEY (id_user) REFERENCES user(id),
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE mensagem(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    conteudo                VARCHAR(225)            NOT NULL,
    createdate              DATETIME    NOT NULL,
    id_user                 INT			UNSIGNED,
    id_funcionario          INT			UNSIGNED,
    FOREIGN KEY(id_user) REFERENCES user(id),
    FOREIGN KEY(id_funcionario) REFERENCES user(id),
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE planoNutricional(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    conteudo                LONGTEXT    NOT NULL,
    createdate              DATETIME    NOT NULL,
    id_user                 INT			UNSIGNED,
    id_funcionario          INT			UNSIGNED,
    FOREIGN KEY(id_user) REFERENCES user(id),
    FOREIGN KEY(id_funcionario) REFERENCES user(id),
    PRIMARY KEY(id)      
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE planoDeTreino(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    nome                    VARCHAR(30) NOT NULL,
    createdate              DATETIME,
    id_user                 INT			UNSIGNED,
    id_funcionario          INT			UNSIGNED,
    FOREIGN KEY(id_user) REFERENCES user(id),
    FOREIGN KEY(id_funcionario) REFERENCES user(id),
    PRIMARY KEY(id)    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE exercicio(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    nome                    VARCHAR(30)         	NOT NULL,
    max_rep                 INT,
    min_rep                 INT,
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE setCorrente(
    id                      INT         UNSIGNED    AUTO_INCREMENT,            
    reps                    INT,
    peso                    FLOAT,
    id_exercicio            INT			UNSIGNED,
    FOREIGN KEY(id_exercicio) REFERENCES exercicio(id),
    PRIMARY KEY(id)  
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE sessaoDeTreino(
    id                      INT         UNSIGNED     AUTO_INCREMENT,
    inicio                  DATETIME,
    fim                     DATETIME,
    id_set                  INT			UNSIGNED,
    id_user                 INT			UNSIGNED,
    FOREIGN KEY(id_set) REFERENCES setCorrente(id),
    FOREIGN KEY(id_user) REFERENCES user(id),
    PRIMARY KEY(id)    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE avaliacaoFisica(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    imc                     FLOAT,
    fc_repouso              INT,
    peso                    FLOAT,
    massa_magra             FLOAT,
    massa_gorda_ideal       FLOAT,
    massa_gorda_normal      FLOAT,
    fc_maximo               INT,
    altura                  FLOAT,
    massa_gorda             FLOAT,
    peso_corporal           FLOAT,
    excesso_de_peso         FLOAT,
    percentagem_de_gordura  FLOAT,
    id_user                 INT			UNSIGNED,
    id_funcionario          INT			UNSIGNED,
    FOREIGN KEY(id_funcionario) REFERENCES user(id),
    FOREIGN KEY(id_user) REFERENCES user(id),
    PRIMARY KEY(id)            
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;