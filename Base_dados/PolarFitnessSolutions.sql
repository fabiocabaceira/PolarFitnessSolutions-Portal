CREATE DATABASE PolarFitnessSolutions;
USE PolarFitnessSolutions;

CREATE TABLE user(
    id                      INT             UNSIGNED   AUTO_INCREMENT,
    username                VARCHAR(50)     NOT NULL,
    password_hash           VARCHAR(255)    NOT NULL,
    email                   VARCHAR(70)     NOT NULL,
    auth_key                VARCHAR(32)     NOT NULL,
    password_reset_token    VARCHAR(255)    NULL    UNIQUE,    
    created_at              INT(11)              NOT NULL,
    updated_at              INT(11)              NOT NULL,
    verification_token      VARCHAR(255)    NULL,
    `status`                SMALLINT(6)     NOT NULL     DEFAULT '9',
    street                  VARCHAR(200)    NOT NULL,
    zip_code                VARCHAR(8)      NOT NULL,
    area                    VARCHAR(50)     NOT NULL,
    phone_number            INT             NOT NULL,
    nif                     INT             NOT NULL,
    gender                  ENUM('Masculino', 'Feminino', 'Outro')  NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE client(
    client_id               INT             UNSIGNED,
    PRIMARY KEY(client_id),
    FOREIGN KEY(client_id) REFERENCES user(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE worker(
    worker_id               INT             UNSIGNED,
    PRIMARY KEY(worker_id),
    FOREIGN KEY(worker_id) REFERENCES user(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE worker_client_relation(
    id                      INT             UNSIGNED    AUTO_INCREMENT,
    client_id               INT             UNSIGNED,
    worker_id               INT             UNSIGNED,
    FOREIGN KEY(client_id) REFERENCES client(client_id),
    FOREIGN KEY(worker_id) REFERENCES worker(worker_id),
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE booking(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    booking_date            DATETIME    NOT NULL,
    user_id                 INT			UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES user(id),
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE nutrition_plan(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    nutritionname 			VARCHAR(30)	NOT NULL,
    content                 LONGTEXT    NOT NULL,
    created_at              INT(11)     NOT NULL,
    updated_at              INT(11)     NOT NULL,
    client_id               INT			UNSIGNED,
    worker_id               INT			UNSIGNED,
    FOREIGN KEY(client_id)    REFERENCES client(client_id),
    FOREIGN KEY(worker_id)    REFERENCES worker(worker_id),
    PRIMARY KEY(id)      
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE workout_plan(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    workout_name            VARCHAR(30) NOT NULL,
    createdate              DATETIME,
    client_id               INT			UNSIGNED,
    worker_id               INT			UNSIGNED,
    FOREIGN KEY(client_id)    REFERENCES client(client_id),
    FOREIGN KEY(worker_id)    REFERENCES worker(worker_id),
    PRIMARY KEY(id)    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE exercise(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    exercise_name           VARCHAR(100)         	NOT NULL,
    max_rep                 INT,
    min_rep                 INT,
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE workout_plan_exercise_relation(
    id                      INT             UNSIGNED    AUTO_INCREMENT,
    workout_plan_id         INT             UNSIGNED,
    exercise_id             INT             UNSIGNED,
    FOREIGN KEY(workout_plan_id) REFERENCES workout_plan(id),
    FOREIGN KEY(exercise_id) REFERENCES exercise(id),
    PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE physical_evaluation(
    id                      INT         UNSIGNED    AUTO_INCREMENT,
    create_date             DATE,	
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
    client_id              INT			UNSIGNED,
    worker_id              INT			UNSIGNED,
    FOREIGN KEY(client_id)    REFERENCES client(client_id),
    FOREIGN KEY(worker_id)    REFERENCES worker(worker_id),
    PRIMARY KEY(id)            
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;