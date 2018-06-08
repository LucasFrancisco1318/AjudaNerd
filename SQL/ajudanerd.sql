-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2018 at 12:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajudanerd`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_books_save` (IN `ptitle` VARCHAR(150), IN `pcategorybook` VARCHAR(100), IN `pauthor` VARCHAR(50), IN `pwriter` VARCHAR(50), IN `pphoto` VARCHAR(256), IN `pbook` VARCHAR(256), IN `pidfreepaid` INT, IN `ppricesbook` DECIMAL(10,2), IN `pdescripion` VARCHAR(256), IN `piduser` INT)  BEGIN

    DECLARE vidbook INT;

    INSERT INTO tb_books (title, categorybook, author, writer, photo, book, idfreepaid, pricesbook, description, iduser)
    VALUES (ptitle, pcategorybook, pauthor, pwriter, pphoto, pbook, pidfreepaid, ppricesbook, pdescripion, piduser);

    SET vidbook = LAST_INSERT_ID();

    SELECT * FROM tb_books WHERE idbook = LAST_INSERT_ID();

  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_category_book_save` (IN `pidcategorybook` INT, IN `pcategorybook` VARCHAR(64))  BEGIN

    IF pidcategorybook > 0 THEN

      UPDATE tb_category_book
      SET categorybook = pcategorybook
      WHERE idcategorybook = pidcategorybook;

    ELSE

      INSERT INTO tb_category_book (categorybook) VALUES(pcategorybook);

      SET pidcategorybook = LAST_INSERT_ID();

    END IF;

    SELECT * FROM tb_category_book WHERE idcategorybook = pidcategorybook;

  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usersupdate_save` (IN `piduser` INT, IN `pperson` VARCHAR(64), IN `puser` VARCHAR(50), IN `pprofession` VARCHAR(100), IN `pemail` VARCHAR(128), IN `pnrphone` VARCHAR(14), IN `plogin` VARCHAR(64), IN `ppassword` VARCHAR(256), IN `pinadmin` INT)  BEGIN

    DECLARE vidperson INT;

    SELECT idperson
    INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;

    UPDATE tb_persons
    SET
      person     = pperson,
      email      = pemail,
      nrphone    = pnrphone,
      profession = pprofession
    WHERE idperson = vidperson;

    UPDATE tb_users
    SET
      user     = puser,
      login    = plogin,
      password = ppassword,
      inadmin  = pinadmin
    WHERE iduser = piduser;

    SELECT *
    FROM tb_users a INNER JOIN tb_persons b USING (idperson)
    WHERE a.iduser = piduser;

  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete` (IN `piduser` INT)  BEGIN

    DECLARE vidperson INT;

    SET FOREIGN_KEY_CHECKS = 0;

    SELECT idperson
    INTO vidperson
    FROM tb_users
    WHERE iduser = piduser;

    DELETE FROM tb_persons
    WHERE idperson = vidperson;

    DELETE FROM tb_users
    WHERE iduser = piduser;

    SET FOREIGN_KEY_CHECKS = 1;

  END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save` (IN `pperson` VARCHAR(64), IN `puser` VARCHAR(50), IN `pprofession` VARCHAR(100), IN `pemail` VARCHAR(128), IN `pnrphone` VARCHAR(14), IN `plogin` VARCHAR(64), IN `ppassword` VARCHAR(256), IN `pinadmin` INT)  BEGIN

    DECLARE vidperson INT;

    INSERT INTO tb_persons (person, email, nrphone, profession)
    VALUES (pperson, pemail, pnrphone, pprofession);

    SET vidperson = LAST_INSERT_ID();

    INSERT INTO tb_users (idperson, login, password, inadmin, user)
    VALUES (vidperson, plogin, ppassword, pinadmin, puser);

    SELECT *
    FROM tb_users a INNER JOIN tb_persons b USING (idperson)
    WHERE a.iduser = LAST_INSERT_ID();

  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_books`
--

CREATE TABLE `tb_books` (
  `idbook` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `categorybook` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `photo` varchar(256) NOT NULL DEFAULT 'Capa-em-branco',
  `book` varchar(256) NOT NULL,
  `idfreepaid` int(11) NOT NULL DEFAULT '1',
  `pricesbook` decimal(10,2) NOT NULL,
  `description` varchar(256) NOT NULL,
  `iduser` int(11) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_free_paid`
--

CREATE TABLE `tb_free_paid` (
  `idfreepaid` int(11) NOT NULL,
  `freePaid` varchar(50) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_free_paid`
--

INSERT INTO `tb_free_paid` (`idfreepaid`, `freePaid`, `dtregister`) VALUES
(1, 'Gratuito', '2018-06-08 20:51:52'),
(2, 'Pago', '2018-06-08 20:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_inadmin`
--

CREATE TABLE `tb_inadmin` (
  `idinadmin` int(11) NOT NULL,
  `inadmin` varchar(50) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_inadmin`
--

INSERT INTO `tb_inadmin` (`idinadmin`, `inadmin`, `dtregister`) VALUES
(1, 'USUARIO', '2018-06-08 20:51:52'),
(2, 'ADMINISTRADOR', '2018-06-08 20:51:52'),
(3, 'SUPORTE', '2018-06-08 20:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idperson` int(11) NOT NULL,
  `person` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nrphone` varchar(14) NOT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `imgprofile` varchar(128) NOT NULL DEFAULT 'standard-photo',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_persons`
--

INSERT INTO `tb_persons` (`idperson`, `person`, `email`, `nrphone`, `profession`, `imgprofile`, `dtregister`) VALUES
(1, 'Lucas Francisco de Sousa', 'lucasfrancisco1318@gmail.com', '(61)98128-7117', 'Desenvolvedor', 'Lucas', '2018-06-08 20:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan`
--

CREATE TABLE `tb_plan` (
  `idplan` int(11) NOT NULL,
  `nameplan` varchar(50) NOT NULL,
  `priceplan` decimal(10,2) NOT NULL,
  `timeduration` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_plan`
--

INSERT INTO `tb_plan` (`idplan`, `nameplan`, `priceplan`, `timeduration`, `description`, `dtregister`) VALUES
(1, 'GRATUITO', '0.00', 'VITALICIO', 'DESCRIÇÃO', '2018-06-08 20:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `idperson` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `inadmin` int(11) DEFAULT '1',
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idplan` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`iduser`, `user`, `idperson`, `login`, `password`, `inadmin`, `dtregister`, `idplan`) VALUES
(2, 'LucasFranciscc', 1, 'admin', '$2y$12$co1arjzqCHF8VESQAyAZYuRD8bs7UkHU7Db1TtsfEEen8/L4jfsKG', 2, '2018-06-08 22:18:40', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_books`
--
ALTER TABLE `tb_books`
  ADD PRIMARY KEY (`idbook`),
  ADD KEY `idfreepaid` (`idfreepaid`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_free_paid`
--
ALTER TABLE `tb_free_paid`
  ADD PRIMARY KEY (`idfreepaid`);

--
-- Indexes for table `tb_inadmin`
--
ALTER TABLE `tb_inadmin`
  ADD PRIMARY KEY (`idinadmin`);

--
-- Indexes for table `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idperson`);

--
-- Indexes for table `tb_plan`
--
ALTER TABLE `tb_plan`
  ADD PRIMARY KEY (`idplan`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idperson` (`idperson`),
  ADD KEY `inadmin` (`inadmin`),
  ADD KEY `idplan` (`idplan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_books`
--
ALTER TABLE `tb_books`
  MODIFY `idbook` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_free_paid`
--
ALTER TABLE `tb_free_paid`
  MODIFY `idfreepaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_inadmin`
--
ALTER TABLE `tb_inadmin`
  MODIFY `idinadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `idplan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_books`
--
ALTER TABLE `tb_books`
  ADD CONSTRAINT `tb_books_ibfk_1` FOREIGN KEY (`idfreepaid`) REFERENCES `tb_free_paid` (`idfreepaid`),
  ADD CONSTRAINT `tb_books_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `tb_users` (`iduser`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`idperson`) REFERENCES `tb_persons` (`idperson`),
  ADD CONSTRAINT `tb_users_ibfk_2` FOREIGN KEY (`inadmin`) REFERENCES `tb_inadmin` (`idinadmin`),
  ADD CONSTRAINT `tb_users_ibfk_3` FOREIGN KEY (`idplan`) REFERENCES `tb_plan` (`idplan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
