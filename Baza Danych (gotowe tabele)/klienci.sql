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
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `Id_klienta` int(11) NOT NULL AUTO_INCREMENT,
  `Imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Data_Urodzenia` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `Ulica` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Miasto` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `Kod_Pocztowy` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`Id_klienta`),
  UNIQUE KEY `Id_klienta` (`Id_klienta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
