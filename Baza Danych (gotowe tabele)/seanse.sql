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
-- Struktura tabeli dla tabeli `seanse`
--

CREATE TABLE IF NOT EXISTS `seanse` (
  `ID_seansu` int(11) NOT NULL AUTO_INCREMENT,
  `Tytul_Filmu` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Data_Seansu` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `Godzina_Seansu` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `ID_Sali` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `Typ_Seansu` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`ID_seansu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `seanse`
--

INSERT INTO `seanse` (`ID_seansu`, `Tytul_Filmu`, `Data_Seansu`, `Godzina_Seansu`, `ID_Sali`, `Typ_Seansu`) VALUES
(3, 'XD Movie', '19.02.2019', '21:00', '3', '3D'),
(4, 'The Meg', '25-01-2019', '20:15', '2', '3D');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
