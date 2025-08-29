CREATE TABLE `vagas` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') NOT NULL,
  `data` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `ativo`, `data`) VALUES
(1, 'editor', 'julia', 's', '2025-08-12 19:50:05'),
(3, 'estagiario', 'folgado', 'n', '2025-08-12 21:59:31');

create table alunos(
         id int not null AUTO_INCREMENT PRIMARY KEY,/
         nome varchar(255),
         cpf varchar(11) unique,
         matricula varchar(255)
         telefone varchar(14) unique,
         email_pessoal varchar(255) unique,
         email_institucional varchar(255) unique,
         dtn date,
         curso varchar(255),
         periodo varchar(2)
         senha varchar (255)
);
