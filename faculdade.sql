-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2024 às 03:20
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faculdade`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `ID_crg` int(13) NOT NULL,
  `nome_crg` varchar(255) NOT NULL,
  `nivel_crg` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`ID_crg`, `nome_crg`, `nivel_crg`) VALUES
(1, 'Membro', 0),
(2, 'Aluno', 0),
(4, 'Professor', 0),
(5, 'Administrador', 554),
(7, 'BANIDO', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usr` int(13) NOT NULL,
  `nome_usr` varchar(255) NOT NULL,
  `matricula_usr` varchar(255) NOT NULL,
  `email_usr` varchar(255) NOT NULL,
  `senha_usr` varchar(255) NOT NULL,
  `avatar_usr` varchar(255) NOT NULL,
  `telefone_usr` varchar(11) NOT NULL,
  `cargo_usr` int(13) NOT NULL,
  `data_usr` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_usr`, `nome_usr`, `matricula_usr`, `email_usr`, `senha_usr`, `avatar_usr`, `telefone_usr`, `cargo_usr`, `data_usr`) VALUES
(1, 'Paulo', 'UC21105651', 'paulocesar.priv@gmail.com', '$2y$10$HyrTBicbQy2UbRmUBj0gr.ODyxyE82FK0NUHBdJ0FGc5suj2sFtkK', '../assets/img/avatar/2.jpg', '61998109001', 4, '2023-07-18 03:23:08'),
(2, 'Daniel', 'daniel', 'daniel@gmail.com', 'e381677e47e79162a23438c1432ad1afad764cbe', '../assets/img/avatar/2.jpg', '61998109001', 5, '2023-07-18 03:23:08'),
(3, 'Teste', 'UC74607971', 'paulocesar.privt@gmail.com', '$2y$10$.Q5H28InY3Ge6kIgr5za3.ma033yp4EzvokLbgc4Jd4hcRrUhUIra', '', '61998102001', 2, '2024-09-16 22:12:05');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`ID_crg`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usr`),
  ADD KEY `usuarios_cargos` (`cargo_usr`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `ID_crg` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usr` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `CARGO_USR` FOREIGN KEY (`cargo_usr`) REFERENCES `cargos` (`ID_crg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
