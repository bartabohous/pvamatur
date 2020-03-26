-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 26. bře 2020, 18:40
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `web`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `poznamky`
--

CREATE TABLE `poznamky` (
  `id` int(11) NOT NULL,
  `nadpis` varchar(50) NOT NULL,
  `idvlastnika` int(11) NOT NULL,
  `casvytvoreni` timestamp NOT NULL DEFAULT current_timestamp(),
  `telo` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `poznamky`
--

INSERT INTO `poznamky` (`id`, `nadpis`, `idvlastnika`, `casvytvoreni`, `telo`, `flag`) VALUES
(9, 'sdds', 22, '2020-03-26 16:19:01', 'sdsd', -1),
(11, 'dfdf', 23, '2020-03-26 17:05:34', 'dfdfd', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `prijmeni` varchar(50) NOT NULL,
  `heslo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `jmeno`, `prijmeni`, `heslo`, `email`) VALUES
(17, 'test2', 'a', '18ac3e7343f016890c510e93f935261169d9e3f565436429830faf0934f4f8e4', 'test2'),
(19, 'test1aa', 'a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 'a'),
(21, 'w', 'w', '50e721e49c013f00c62cf59f2163542a9d8df02464efeb615d31051b0fddc326', 'w'),
(22, 'kokot', 'fdfd', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'dfdf'),
(23, 'g', 'g', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29', 'g');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `poznamky`
--
ALTER TABLE `poznamky`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `poznamky`
--
ALTER TABLE `poznamky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
