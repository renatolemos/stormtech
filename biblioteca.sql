-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Out-2016 às 18:45
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `biblioteca`
--

CREATE TABLE IF NOT EXISTS `biblioteca` (
`id` int(11) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `ano` year(4) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `edicao` varchar(10) NOT NULL,
  `assunto` varchar(500) NOT NULL,
  `isbn` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `resumo` text NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `autor`, `titulo`, `ano`, `editora`, `edicao`, `assunto`, `isbn`, `genero`, `idioma`, `resumo`, `descricao`) VALUES
(19, 'Hama, Larry', 'A Morte do CapitÃ£o AmÃ©rica', 2016, 'Novo SÃ©culo - SP', '1', 'Marvel', 889917321, 'AÃ‡ÃƒO', 'Portugues ', 'NÃ£o tivemos outra escolha a nÃ£o ser trazer o corpo dele para cÃ¡ â€“ Tony Stark disse. â€“ Steve foi o Ãºnico produto bem-sucedido do Programa do Supersoldado. As informaÃ§Ãµes na cela dele sÃ£o protegidas por diversos atos de seguranÃ§a nacionais.\r\nAquilo simplesmente aumentou a minha raiva.', '126 pag'),
(20, 'Gerasini, Marc', 'Wolverine - Arma X', 2016, 'Novo SÃ©culo - SP', '1', 'Marvel', 898887, 'AÃ§Ã£o', 'Portugues ', 'Um violento andarilho com um passado misterioso torna-se cobaia de um experimento biotecnolÃ³gico ultrassecreto. Logan, ex-membro das ForÃ§as Especiais do CanadÃ¡, Ã© capturado por um grupo de cientistas e levado a um complexo de pesquisa nas Montanhas Rochosas Canadenses. ', '166 pag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biblioteca`
--
ALTER TABLE `biblioteca`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biblioteca`
--
ALTER TABLE `biblioteca`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
