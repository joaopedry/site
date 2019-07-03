-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jul-2019 às 08:09
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eat_play`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medias`
--

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `title` varchar(240) NOT NULL,
  `url_file` varchar(240) NOT NULL,
  `type` varchar(180) NOT NULL,
  `date` date NOT NULL,
  `seq` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medias`
--

INSERT INTO `medias` (`id`, `title`, `url_file`, `type`, `date`, `seq`) VALUES
(1, 'Bonde da Stronda feat. Mr Catra - Mansão Thug Stronda', 'Mansao Thug Stronda.mp3', 'audio', '2019-07-03', 1),
(2, 'Jhef - Vida Mítica', 'Jhef - Vida Mítica (Official Vídeo).mp4', 'video', '2019-07-03', 2),
(3, 'O Rappa - Anjos \"Pra Quem Tem Fé\"', 'O Rappa-Anjos_PraQuemTemFe.mp3', 'audio', '2019-07-03', 3),
(4, 'Turma do Pagode - Deixa em Off', 'Turma do Pagode - Deixa em Off.mp3', 'audio', '2019-07-03', 4),
(5, 'MC Livinho - Hoje Eu Vou Parar na Gaiola', 'Baile_Gaiola.mp3', 'audio', '2019-07-03', 255),
(6, 'Dubai - Hungria Hip Hop', 'Dubai - Hungria Hip Hop (Official Music).mp3', 'audio', '2019-07-03', 255);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(240) NOT NULL,
  `url_icon` varchar(250) NOT NULL,
  `url_file` varchar(240) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `name`, `url_icon`, `url_file`, `date`) VALUES
(1, 'Lanches', 'lanches.jpg', 'Cardápio.jpg', '2019-06-27 18:58:34'),
(2, 'Pratos prontos', 'pratos.jpg', 'Cardápio2.jpg', '2019-06-27 18:59:55'),
(3, 'Doces', 'doces.jpg', 'Cardápio.jpg', '2019-06-27 18:58:48'),
(5, 'Porções', 'porcoes.jpg', 'Cardápio2.jpg', '2019-06-27 18:59:59'),
(6, 'Aperitivos', 'aperitivos.jpg', 'Cardápio.jpg', '2019-06-27 18:59:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `food` varchar(120) NOT NULL,
  `type` varchar(70) NOT NULL,
  `price` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `food`, `type`, `price`, `date`) VALUES
(1, 'Pastel de Frango', 'Lanches', 4, '2019-07-03 00:41:30'),
(2, 'Brigadeiro', 'Doces', 3, '2019-07-03 00:44:32'),
(3, 'Fritas com Bacon', 'Porções', 25, '2019-07-03 01:50:25'),
(4, 'Fritas', 'Porções', 20, '2019-07-03 01:50:43'),
(5, 'Pastel de Carne', 'Lanches', 4, '2019-07-03 01:50:53'),
(6, 'Beijinho', 'Doces', 3, '2019-07-03 01:51:06'),
(7, 'Coca Cola Lata', 'Bebidas', 5.5, '2019-07-03 01:52:13'),
(8, 'Água 500ml', 'Bebidas', 3, '2019-07-03 01:52:48'),
(9, 'Marmita', 'Pratos prontos', 12, '2019-07-03 01:53:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `take_orders`
--

CREATE TABLE `take_orders` (
  `id_order` int(11) NOT NULL,
  `number_order` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `mesa` varchar(8) NOT NULL,
  `food` varchar(250) NOT NULL,
  `qtd` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `take_orders`
--

INSERT INTO `take_orders` (`id_order`, `number_order`, `name`, `phone`, `mesa`, `food`, `qtd`, `status`, `description`) VALUES
(1, 1, 'João Pedro', '(47) 98833-297', 'Externo', '1', 1, 1, 'Favor enviar ketchup.'),
(2, 1, 'João Pedro', '(47) 98833-297', 'Externo', '2', 2, 1, 'Favor enviar ketchup.'),
(3, 1, 'João Pedro', '(47) 98833-297', 'Externo', '', 0, 1, 'Favor enviar ketchup.'),
(4, 1, 'João Pedro', '(47) 98833-297', 'Externo', '', 0, 1, 'Favor enviar ketchup.'),
(5, 1, 'João Pedro', '(47) 98833-297', 'Externo', '', 0, 1, 'Favor enviar ketchup.'),
(6, 2, 'Maria Paula', '(41) 98877-416', '7', '5', 1, 2, 'Sem canudo.'),
(7, 2, 'Maria Paula', '(41) 98877-416', '7', '', 0, 1, 'Sem canudo.'),
(8, 2, 'Maria Paula', '(41) 98877-416', '7', '', 0, 1, 'Sem canudo.'),
(9, 2, 'Maria Paula', '(41) 98877-416', '7', '', 0, 1, 'Sem canudo.'),
(10, 2, 'Maria Paula', '(41) 98877-416', '7', '7', 1, 2, 'Sem canudo.'),
(11, 3, 'Robson Luiz', '(47) 3441-6060', 'Externo', '', 0, 1, 'Sem farofa.'),
(12, 3, 'Robson Luiz', '(47) 3441-6060', 'Externo', '', 0, 1, 'Sem farofa.'),
(13, 3, 'Robson Luiz', '(47) 3441-6060', 'Externo', '9', 1, 2, 'Sem farofa.'),
(14, 3, 'Robson Luiz', '(47) 3441-6060', 'Externo', '', 0, 1, 'Sem farofa.'),
(15, 3, 'Robson Luiz', '(47) 3441-6060', 'Externo', '8', 1, 3, 'Sem farofa.'),
(16, 4, 'Carlos Henrique Casemiro', '(11) 9447-5142', '3', '', 0, 1, 'Dobro de Bacon'),
(17, 4, 'Carlos Henrique Casemiro', '(11) 9447-5142', '3', '2', 3, 1, 'Dobro de Bacon'),
(18, 4, 'Carlos Henrique Casemiro', '(11) 9447-5142', '3', '', 0, 1, 'Dobro de Bacon'),
(19, 4, 'Carlos Henrique Casemiro', '(11) 9447-5142', '3', '3', 2, 1, 'Dobro de Bacon'),
(20, 4, 'Carlos Henrique Casemiro', '(11) 9447-5142', '3', '7', 1, 1, 'Dobro de Bacon'),
(21, 5, 'Daniel Alves', '(11) 97519-846', '8', '5', 2, 1, ''),
(22, 5, 'Daniel Alves', '(11) 97519-846', '8', '', 0, 1, ''),
(23, 5, 'Daniel Alves', '(11) 97519-846', '8', '', 0, 1, ''),
(24, 5, 'Daniel Alves', '(11) 97519-846', '8', '4', 1, 1, ''),
(25, 5, 'Daniel Alves', '(11) 97519-846', '8', '7', 2, 1, ''),
(26, 6, 'Alisson Becker', '(11) 3412-8525', '4', '1', 1, 1, 'Para viagem'),
(27, 6, 'Alisson Becker', '(11) 3412-8525', '4', '', 0, 1, 'Para viagem'),
(28, 6, 'Alisson Becker', '(11) 3412-8525', '4', '', 0, 1, 'Para viagem'),
(29, 6, 'Alisson Becker', '(11) 3412-8525', '4', '3', 2, 1, 'Para viagem'),
(30, 6, 'Alisson Becker', '(11) 3412-8525', '4', '8', 1, 1, 'Para viagem'),
(31, 7, 'Philippe Coutinho', '(11) 3446-5456', '6', '1', 1, 1, '2 Copos'),
(32, 7, 'Philippe Coutinho', '(11) 3446-5456', '6', '', 0, 1, '2 Copos'),
(33, 7, 'Philippe Coutinho', '(11) 3446-5456', '6', '', 0, 1, '2 Copos'),
(34, 7, 'Philippe Coutinho', '(11) 3446-5456', '6', '', 0, 1, '2 Copos'),
(35, 7, 'Philippe Coutinho', '(11) 3446-5456', '6', '7', 1, 1, '2 Copos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Lanches'),
(2, 'Doces'),
(3, 'Pratos prontos'),
(4, 'Porções'),
(6, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(240) NOT NULL,
  `password` varchar(16) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `date`) VALUES
(1, 'root', '1q2w3e4r', '2019-05-22'),
(2, 'user', '1q2w3e4r', '2019-07-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_orders`
--
ALTER TABLE `take_orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `take_orders`
--
ALTER TABLE `take_orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
