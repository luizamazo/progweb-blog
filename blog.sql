-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Set-2018 às 03:50
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `autor_original` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor_editado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteudo` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_original` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `editado` int(2) NOT NULL,
  `estado` int(2) NOT NULL,
  `post_id` int(11) NOT NULL,
  `resp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `autor_original`, `autor_editado`, `conteudo`, `data_original`, `data_editado`, `editado`, `estado`, `post_id`, `resp_id`) VALUES
(33, 'Jisoo', 'Jisoo', 'COMOON SKINNY LOVEEEE', '2018-09-24 22:00:35', '2018-09-24 22:01:04', 1, 2, 31, 0),
(36, 'admin', '', 'LONGE DE VOCE', '2018-09-24 22:04:39', '2018-09-24 22:23:31', 0, 2, 36, 0),
(37, 'admin', '', 'CAAAAA', '2018-09-24 22:18:18', '2018-09-24 22:23:31', 0, 2, 36, 0),
(38, 'admin', '', 'FAASADEFERGEGEGEGEGE', '2018-09-24 22:18:23', '2018-09-24 22:23:31', 0, 2, 36, 0),
(39, 'admin', '', 'TRISTE MAIS ', '2018-09-24 22:18:28', '2018-09-24 22:23:31', 0, 2, 36, 0),
(40, 'Jisoo', '', 'PUTS EH MESMO EI VEI KKKK', '2018-09-24 22:24:57', '2018-09-24 22:25:39', 0, 2, 30, 0),
(41, 'Jisoo', '', 'TO MT TRISTE ', '2018-09-24 22:25:01', '2018-09-24 22:25:39', 0, 2, 30, 0),
(42, 'Jisoo', '', 'EH MESMO EH VERDADE PORRAAAA', '2018-09-24 22:26:09', '2018-09-24 22:26:27', 0, 2, 6, 0),
(43, 'admin', '', 'PUTS TO MUITO TRISTE', '2018-09-25 00:09:40', '0000-00-00 00:00:00', 0, 1, 42, 0),
(44, 'admin', '', 'DONT TALK ABOUT IT ', '2018-09-25 00:11:11', '0000-00-00 00:00:00', 0, 1, 6, 0),
(45, 'Rosie', '', 'YOU AREA DRUG TO ME ', '2018-09-25 00:53:59', '0000-00-00 00:00:00', 0, 1, 42, 0),
(46, 'Rosie', '', 'POIEEEEE', '2018-09-25 00:56:43', '0000-00-00 00:00:00', 0, 1, 30, 0),
(47, 'Rosie', '', 'AAAAAAAAAAAAAAAAAAAAA', '2018-09-25 00:56:51', '0000-00-00 00:00:00', 0, 1, 6, 0),
(48, 'Jisoo', '', 'Muito bom', '2018-09-25 01:39:02', '0000-00-00 00:00:00', 0, 1, 45, 0),
(49, 'Jisoo', '', 'SHOW', '2018-09-25 01:39:14', '0000-00-00 00:00:00', 0, 1, 44, 0),
(50, 'Jisoo', '', 'JKKKKK', '2018-09-25 01:39:20', '0000-00-00 00:00:00', 0, 1, 43, 0),
(51, 'Sansa', '', 'COM TODA CERTEZAAAA!!!!!! KKKKKKKK ', '2018-09-25 01:48:09', '0000-00-00 00:00:00', 0, 1, 46, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `senha`, `tipo`, `estado`, `data`, `post_id`, `com_id`) VALUES
(1, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1', '2018-09-20 17:26:20', 0, 0),
(2, 'Minky', 'minky@hotmail.com', 'aea39457e537e0f8aa14445677484a19', '2', '2', '2018-09-23 18:31:26', 0, 0),
(4, 'Jisoo', 'jisoo@hotmail.com', '95c8fcfb13f40636ff2e4139bda00377', '4', '1', '2018-09-23 02:13:35', 0, 0),
(5, 'Lisa', 'lisa@hotmail.com', 'ed14f4a4d7ecddb6dae8e54900300b1e', '3', '1', '2018-09-23 02:13:11', 0, 0),
(6, 'Jennie', 'jennie@hotmail.com', '8a4b93ff76664d996ccfb95aacc412bc', '2', '1', '2018-09-23 01:41:32', 0, 0),
(10, 'Rosie', 'rosie@hotmail.com', 'b2796b9d5f9448f049f85064b726280f', '2', '1', '2018-09-23 01:38:36', 0, 0),
(18, 'Sansa', 'sansa@hotmail.com', '07716070b3424f1256eea20c64ff5f79', '3', '1', '2018-09-23 00:08:53', 0, 0),
(19, 'Rukia', 'rukia@gmail.com', '498b8cef4f21368786265ea067537b79', '4', '1', '2018-09-23 00:10:14', 0, 0),
(20, 'Pequena', 'pequena@live.com', 'b6f77018928770421a5248439b0d51ba', '2', '1', '2018-09-23 00:11:24', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `autor_original` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor_editado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteudo` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(2) NOT NULL,
  `data_original` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_editado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `editado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `autor_original`, `autor_editado`, `titulo`, `conteudo`, `estado`, `data_original`, `data_editado`, `editado`) VALUES
(43, 'Lisa', '', 'LOREM', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', 1, '2018-09-25 01:37:55', '0000-00-00 00:00:00', 0),
(44, 'Lisa', '', 'IPSUM', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia volupta', 1, '2018-09-25 01:38:14', '0000-00-00 00:00:00', 0),
(45, 'Lisa', '', 'P1', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia', 1, '2018-09-25 01:38:36', '0000-00-00 00:00:00', 0),
(46, 'admin', '', 'CAMPEÃO BRASILEIRO DE 2018', 'SÃO PAULO FUTEBOL CLUBEE!!!!!!!', 1, '2018-09-25 01:47:43', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
