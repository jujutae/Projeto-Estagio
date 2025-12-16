DROP DATABASE IF EXISTS `pro_vagas`;

CREATE DATABASE `pro_vagas` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;

USE `pro_vagas`;

CREATE TABLE `vagas` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titulo` varchar(255) NOT NULL,
    `descricao` text NOT NULL,
    `ativo` enum('s', 'n') NOT NULL,
    `data` timestamp NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

CREATE TABLE `alunos` (
    `id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nome` varchar(255) NOT NULL,
    `cpf` varchar(11) UNIQUE NOT NULL,
    `matricula` varchar(255) UNIQUE NOT NULL,
    `telefone` varchar(255) UNIQUE DEFAULT NULL,
    `email_pessoal` varchar(255) UNIQUE DEFAULT NULL,
    `email_institucional` varchar(255) UNIQUE DEFAULT NULL,
    `dtn` date DEFAULT NULL,
    `curso` varchar(255) DEFAULT NULL,
    `periodo` varchar(2) DEFAULT NULL,
    `senha` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

CREATE TABLE inscricao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL unique,
    id_vaga INT NOT NULL,
    data_inscricao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status varchar(50),
    FOREIGN KEY (id_aluno) REFERENCES alunos (id),
    FOREIGN KEY (id_vaga) REFERENCES vagas (id)
);