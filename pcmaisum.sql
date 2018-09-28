-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Set-2018 às 08:32
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcmaisum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `CODIGO` varchar(15) CHARACTER SET latin1 NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desejo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_carrinho`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_user`, `CODIGO`, `quantidade`, `desejo`) VALUES
(112, 100002, '260901', 1, 0),
(99, 100012, '202002', 1, 0),
(105, 100002, '202003', 0, 1),
(94, 100012, '250102', 1, 0),
(92, 100012, '250101', 0, 1),
(93, 100012, '220402', 0, 1),
(111, 100002, '250101', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `COD` varchar(6) CHARACTER SET latin1 NOT NULL,
  `DESCR` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`COD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`COD`, `DESCR`) VALUES
('23', 'Imagem'),
('22', 'Componentes'),
('21', 'Mobilidade'),
('20', 'Computadores'),
('24', 'Perifericos'),
('25', 'Armazenamento'),
('26', 'Consolas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `nome` varchar(35) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Assunto` varchar(50) NOT NULL,
  `mensagem` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`nome`, `Email`, `Assunto`, `mensagem`) VALUES
('guiiii', 'g_fcp@hotmail.com', 'guiiii', 'guiiii'),
('', '', '', ''),
('testepass', 'testepass@asd.com', '123456', '23232323'),
('dsadadadad', 'carlos@hotmail.com', '1231231231231', '12312312312312313'),
('dsadadadad', 'carlos@hotmail.com', '1231231231231', '12312312312312313'),
('Carlos Lopes', 'carlos@hotmail.com', 'computador', 'isto é um teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE IF NOT EXISTS `encomendas` (
  `id_enc` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `descritao` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `quantidade` double DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `codigopostal` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `nif` int(9) NOT NULL,
  `telemovel` int(9) NOT NULL,
  `data` datetime DEFAULT NULL,
  `hora` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_enc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id_enc`, `produto`, `descritao`, `preco`, `quantidade`, `nome`, `morada`, `codigopostal`, `localidade`, `nif`, `telemovel`, `data`, `hora`) VALUES
(1, NULL, NULL, NULL, NULL, 'teste teste ', 'teste teste ', '1234-123', 'teste teste ', 123456789, 123456789, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_artigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `abrev` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `stock` decimal(18,4) DEFAULT NULL,
  `grp` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `familia` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `preco` decimal(18,4) DEFAULT NULL,
  PRIMARY KEY (`id_artigo`,`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_artigo`, `codigo`, `abrev`, `nome`, `stock`, `grp`, `familia`, `preco`) VALUES
(52, '202001', 'Portátil Lenovo', 'Portátil Lenovo Ideapad 120S 11.6\" 120S-11IAP-755', '0.0000', '20', '20', '249.0000'),
(49, '192001', 'ASUSDESKTOP', 'Computador ASUSPRO Business Desktop D320MT-C3EHDPS1', '20.0000', '20', '19', '139.0000'),
(50, '192002', 'ASUSPRODSKTP', 'Computador ASUSPRO Business Desktop D320SF-C3EHDPL1', '20.0000', '20', '19', '169.0000'),
(51, '192003', 'LENOVO', 'Lenovo IdeaCentre 310S-08IGM-501 Prateado', '0.0000', '20', '19', '349.0000'),
(53, '202002', 'Lenovo Ideapad', 'Lenovo Ideapad 110 15.6\" 110-15IBR-459', '20.0000', '20', '20', '369.9900'),
(54, '202003', 'Lenovo Essentia', 'Lenovo Essential V110 15.6\" V110-15IKB', '20.0000', '20', '20', '499.9900'),
(55, '260901', 'XBOXONE', 'Microsoft Xbox One 1TB Call of Duty: Advanced Warfare', NULL, '26', '9', '389.0000'),
(56, '261001', 'ConsolaXBOX360', 'Consola Microsoft Xbox360 4GB Kinect + 1 Jogo\r\n', '0.0000', '26', '10', '199.9000'),
(57, '250101', 'SSD120GB', 'SSD 2.5\" SanDisk Plus 120GB MLC SATA', '25.0000', '25', '1', '29.9900'),
(61, '250201', 'disco', 'Disco Externo 2.5\" Toshiba Canvio Basics 1TB USB 3.0 Preto', '25.0000', '25', '2', '47.9000'),
(59, '250102', 'SSD240GB', 'SSD 2.5\" Toshiba TR200 240GB 3D TLC SATA\r\n', '25.0000', '25', '1', '49.9000'),
(60, '250103', 'HDD1TB', 'Disco Rígido 3.5\" Toshiba P300 1TB 7200RPM 64MB SATA III\r\n', '25.0000', '25', '1', '41.9000'),
(62, '250202', 'disco SSD', 'SSD Externo Asus Travelair AC 32GB WSD-A1 WiFi USB 2.0 Branco', '30.0000', '25', '2', '59.9000'),
(63, '250301', 'pendrive', 'Pen Samsung BAR Plus 64GB USB 3.1 Prateada\r\n', '0.0000', '25', '3', '24.9000'),
(64, '220401', 'intel', 'Processador Intel Core i5-7500 Quad-Core 3.4GHz c/ Turbo 3.8GHz 6MB Skt1151', '5.0000', '22', '4', '182.9000'),
(65, '220402', 'AMD RYZEN', 'Processador AMD Ryzen 3 1200 Quad-Core 3.1GHz c/ Turbo 3.4GHz 8MB SktAM4', '5.0000', '22', '4', '89.9000'),
(66, '220601', 'RAM1GB', 'Memória RAM G.SKILL NT 4GB (1x4GB) DDR4-2400MHz CL15 Preta\r\n', '20.0000', '22', '6', '40.3000'),
(67, '220602', 'RAM1GB', 'Memória RAM SO-DIMM G.SKILL Ripjaws 4GB (1x4GB) DDR4-2133MHz CL15\r\n', '20.0000', '22', '6', '40.2000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `COD` varchar(15) NOT NULL,
  `descr` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `categ` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`COD`,`categ`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`COD`, `descr`, `categ`) VALUES
('1', 'Armazenamento Interno', '25'),
('2', 'Armazenamento Externo', '25'),
('3', 'Pen Drives', '25'),
('4', 'Processadores', '22'),
('5', 'Placas Graficas', '22'),
('6', 'Memorias RAM', '22'),
('19', 'Desktops', '20'),
('20', 'Laptops', '20'),
('9', 'Xbox One', '26'),
('10', 'Xbox 360', '26'),
('11', 'Televisores', '23'),
('12', 'Monitores', '23'),
('13', 'Smartphones', '21'),
('14', 'Telemoveis', '21'),
('15', 'Tablets', '21'),
('16', 'Ratos/Teclados', '24'),
('17', 'Audio', '24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=100013 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `user`, `email`, `pass`) VALUES
(100002, 'Guilherme', 'G_fcp@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100003, 'Guilherme Torres', 'g_fc3p@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100004, 'Guilherme Torres', 'g_fc1p@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100005, 'teste', 'teste@teste.com', '09151a42659cfc08aff86820f973f640'),
(100006, 'diogo', 'diogo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100007, 'diogo', 'digo@diogo.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100008, 'testes', 'teste@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100009, 'tiago', 'tiago@tiago.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100010, 'rodrigo', 'rodrigo@rid.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100011, 'testepass', 'testepass@asd.com', 'e10adc3949ba59abbe56e057f20f883e'),
(100012, 'carlos', 'carlos@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
