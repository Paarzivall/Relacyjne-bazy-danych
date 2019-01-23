-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 22 Sty 2019, 23:32
-- Wersja serwera: 5.5.62-0+deb8u1
-- Wersja PHP: 5.6.39-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `bugajmateusz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale_kinowe`
--

CREATE TABLE IF NOT EXISTS `sale_kinowe` (
  `ID_Sali` int(11) NOT NULL AUTO_INCREMENT,
  `Ilosc_Miejsc` int(11) NOT NULL,
  PRIMARY KEY (`ID_Sali`),
  UNIQUE KEY `ID_Sali` (`ID_Sali`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `sale_kinowe`
--

INSERT INTO `sale_kinowe` (`ID_Sali`, `Ilosc_Miejsc`) VALUES
(1, 100),
(2, 150),
(3, 200),
(4, 220);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
