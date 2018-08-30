-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando dados para a tabela teste.anuncios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
	(23, 2, 1, 'Relogio Y', 'Principais CaracterÃ­sticas:\r\n- SuperfÃ­cie geada com prego, textura especial e design contraÃ­do \r\n- AlÃ§a de couro aberta, respirÃ¡vel e confortÃ¡vel de usar \r\n- TrÃªs sub-seqÃ¼Ãªncias decorativas aumentam o grau de moda \r\n- A fivela de pino tradicional Ã© sempre design clÃ¡ssico \r\n- Uma boa escolha para um jovem ', 2000, 1),
	(24, 3, 3, 'Placa de video', 'qqqqqqqqqqq', 2000, 1),
	(25, 2, 4, 'Carro X', 'lol esse carro kkkkkkk!!!', 20000, 2),
	(26, 2, 2, 'Casaco irado!!!', 'Casaco muito maneiro', 200.5, 1),
	(27, 2, 2, 'BonÃ© ATR', 'boneeeeeeeeeeeee', 89.99, 1),
	(28, 2, 5, 'boneco', 'sssssssssssssssssssss', 20, 1);
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;

-- Copiando dados para a tabela teste.anuncio_imagens: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `anuncio_imagens` DISABLE KEYS */;
INSERT INTO `anuncio_imagens` (`id`, `id_anuncio`, `url`) VALUES
	(1, 2, 'cool.jpg'),
	(68, 23, '25efb5eb59799ee72c03c9fcf30c16ad.jpg'),
	(76, 24, '0060070e79217d29678be54774ecec7e.jpg'),
	(77, 24, 'c9b0decfde44495b3e9218d37f57335d.jpg'),
	(78, 25, 'caf20b9bf87cf9fbbfb5f9e5a9a93e2e.jpg'),
	(79, 26, '404da9fff77b252fe337161caa0d4238.jpg'),
	(80, 27, 'c01822e6bde828a5853fe5b610da9f59.jpg'),
	(81, 23, '71bf3eaa83eded1255fe918ae2d0d36e.jpg');
/*!40000 ALTER TABLE `anuncio_imagens` ENABLE KEYS */;

-- Copiando dados para a tabela teste.categorias: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nome`) VALUES
	(1, 'relógios'),
	(2, 'roupas'),
	(3, 'eletrônicos'),
	(4, 'carros'),
	(5, 'brinquedos'),
	(6, 'serviços'),
	(7, 'pesca'),
	(8, 'cosméticos');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Copiando dados para a tabela teste.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
	(2, 'David', 'daviduartedf@gmail.com', '4d470b2a7883f11ddba3152497c88ef5', '(61)99999-6666'),
	(3, 'Beltrano', 'beltrano@gmail.com', 'c0acd58b083501f155a936217c16060f', ''),
	(4, 'Danilo', 'danilo@gmail.com', 'e94d51a35484755a9f9672d13687f499', '(61)99999-6666');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
