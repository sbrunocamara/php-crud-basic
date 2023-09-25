-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/09/2023 às 01:16
-- Versão do servidor: 8.0.30
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prova_000000`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `auth_token`
--

CREATE TABLE `auth_token` (
  `id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` int NOT NULL,
  `expires_in` datetime NOT NULL,
  `created_in` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `auth_token`
--

INSERT INTO `auth_token` (`id`, `token`, `user`, `expires_in`, `created_in`) VALUES
(1, 'CsIIUXIyGckz5cpJiIJC6nIRiehVOiJb9I1N.bz2JYmiIxyDbiMWiRIalxevI4W2ZiiotijwkLlZH0JJQ3YISjpiFMIJTyN6ItOWOCf8dwZ.B9mtknVfbS98cH-Mj6rJYsET_3u_voruue0Uk-tUsnN', 1, '2023-09-20 10:01:36', '2023-09-19 22:01:36'),
(2, 'nRckUbXJie9yI5Czi6JIIVphIisN1OcGIJIC.bJJdiiHfTwIyiWaMIjQWpxDI8yWJtSiemb0IvI4jIilZJzFOtk3MRiYYC6lxOZZ2wiL2No.Mkmnt8TsfVnSeNc9_uJtjBuE-r-0b3u6UUsv9o_kYHr', 1, '2023-09-20 10:42:05', '2023-09-19 22:42:05'),
(3, 'iiscJIkCpeOGNiCn5I6hIVbJcXIJUI19zyIR.b2OaCIiSllYOJ0jDWwvR6JJfZZIZyJ3idYibxIWTyxepw2WimoitIMHtIkNQ4jLz8iMFIi.-Um9eU6j8YTnHss_3u9ufotkcJvV0bu-rSnBNrkME_t', 1, '2023-09-20 11:01:10', '2023-09-19 23:01:10'),
(4, 'c9JnIbecyJRIJsUOI6pGIh1IVIiCk5ziXNiC.xkijZwzvSlwaWTxJtIbJIHiWFWCILiIJ8DlYIpmRbI6idYiNJQ32iO0ZMf4Z2yoMeytOji.uUj0Y39n-ueHtntrrosJsSuNBEVmkk_c9bT-8fUv6_M', 1, '2023-09-20 11:02:16', '2023-09-19 23:02:16'),
(5, 'J9yIOGIINIi5pJRnzUbIisVIkiCeC61hXccJ.ziNZHjlfoSJyIJtxx6wTOiMbZiYIiiWCFM3v0iawypj2bRY8WOeiIkILZ2QImt4JIWDdJl.b68nvr_E-UtBJkknmu3MeoNUtT0r9jsH_cuVSYfu9s-', 1, '2023-09-20 11:03:20', '2023-09-19 23:03:20'),
(6, 'NI5e6iz9cpJisXVCGnIJRIOIUkIychCIJib1.JQ6jbTiiHiOtMIIYxY8lZM0iJLWoWJi2zifl2ZwtmIWaeIjywRpbIDOJv3SNICxik4ZdFy.bNBuUs9seETHvu9Y_rjJ_kuctorn-n0-VUtMm68f3kS', 1, '2023-09-26 10:35:51', '2023-09-25 22:35:51'),
(7, 'NCepycIhRk1VIGI5bJizcCi9iUJIIIJOnsX6.ktfxOIlI6ZjIiMMSeIWwt2WlJyY8mRiWZbiJj3iaYdCNQyw0iJpOIIZJDHz2TiLvFiobx4.v8jVTtub_UruB9S-_6nm0t-scrMseo9Hku3nUfNkEJY', 1, '2023-09-26 10:50:48', '2023-09-25 22:50:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `financeiro`
--

CREATE TABLE `financeiro` (
  `id` int NOT NULL,
  `pessoa_id` int NOT NULL,
  `data_vencimento` date NOT NULL,
  `valor_devido` int NOT NULL,
  `data_pagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `status`) VALUES
(1, 'teste', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `auth_token`
--
ALTER TABLE `auth_token`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `financeiro`
--
ALTER TABLE `financeiro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pessoa` (`pessoa_id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `auth_token`
--
ALTER TABLE `auth_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `financeiro`
--
ALTER TABLE `financeiro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `financeiro`
--
ALTER TABLE `financeiro`
  ADD CONSTRAINT `fk_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
