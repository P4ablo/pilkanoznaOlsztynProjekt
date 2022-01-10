-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 10 Sty 2022, 13:36
-- Wersja serwera: 8.0.27
-- Wersja PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pilkaolsztyn`
--
CREATE DATABASE IF NOT EXISTS `pilkaolsztyn` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pilkaolsztyn`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualnosci`
--

DROP TABLE IF EXISTS `aktualnosci`;
CREATE TABLE IF NOT EXISTS `aktualnosci` (
  `idAktualnosci` int NOT NULL AUTO_INCREMENT,
  `Zawartosc` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`idAktualnosci`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `aktualnosci`
--

INSERT INTO `aktualnosci` (`idAktualnosci`, `Zawartosc`) VALUES
(1, 'Nulla nunc ipsum, tincidunt ut placerat quis, eleifend a nulla. Donec nec augue eu enim hendrerit tempor vitae et ante. Fusce sed tincidunt leo, quis rhoncus elit. Ut iaculis, mi et vestibulum rutrum, erat turpis elementum purus, a blandit urna neque at erat. Sed consequat, quam ac scelerisque aliquet, metus elit scelerisque odio, sed pellentesque purus neque ac urna. Nam tempus orci sed dui ullamcorper, non rhoncus sapien ornare. Nunc eget augue ut nisi pellentesque rutrum.\r\n\r\n'),
(2, 'Pellentesque eleifend enim ac eros interdum vestibulum a a dolor. Etiam id mauris eget mauris cursus sollicitudin vitae blandit tortor. Maecenas eget eros turpis. Pellentesque dictum odio id nibh rutrum consectetur. Donec quis ante massa. Praesent mattis leo in aliquam ornare. Donec nisl nulla, dictum eleifend est et, congue viverra odio. Aenean auctor tempus eros a luctus. Fusce posuere in elit quis accumsan. Etiam nec egestas orci.'),
(3, 'Nulla nunc ipsum, tincidunt ut placerat quis, eleifend a nulla. Donec nec augue eu enim hendrerit tempor vitae et ante. Fusce sed tincidunt leo, quis rhoncus elit. Ut iaculis, mi et vestibulum rutrum, erat turpis elementum purus, a blandit urna neque at erat. Sed consequat, quam ac scelerisque aliquet, metus elit scelerisque odio, sed pellentesque purus neque ac urna. Nam tempus orci sed dui ullamcorper, non rhoncus sapien ornare. Nunc eget augue ut nisi pellentesque rutrum.\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `druzyny`
--

DROP TABLE IF EXISTS `druzyny`;
CREATE TABLE IF NOT EXISTS `druzyny` (
  `idDruzyny` int NOT NULL AUTO_INCREMENT,
  `Lp` int DEFAULT NULL,
  `Druzyna` varchar(25) DEFAULT NULL,
  `Mecze` int NOT NULL,
  `Punkty` int DEFAULT NULL,
  `Zwyciestwa` int DEFAULT NULL,
  `Remisy` int DEFAULT NULL,
  `Porazki` int DEFAULT NULL,
  `Bramki` varchar(7) DEFAULT NULL,
  `Kapitan` int NOT NULL,
  PRIMARY KEY (`idDruzyny`),
  UNIQUE KEY `Druzyna_UNIQUE` (`Druzyna`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `druzyny`
--

INSERT INTO `druzyny` (`idDruzyny`, `Lp`, `Druzyna`, `Mecze`, `Punkty`, `Zwyciestwa`, `Remisy`, `Porazki`, `Bramki`, `Kapitan`) VALUES
(1, 1, 'RKS', 15, 27, 13, 1, 1, '42', 1),
(2, 2, 'Polonia', 15, 3, 1, 1, 13, '7', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia_druzyn`
--

DROP TABLE IF EXISTS `historia_druzyn`;
CREATE TABLE IF NOT EXISTS `historia_druzyn` (
  `idHistoria` int NOT NULL AUTO_INCREMENT,
  `Sezon` varchar(15) DEFAULT NULL,
  `Druzyna` varchar(25) DEFAULT NULL,
  `Druzyny_idDruzyny` int NOT NULL,
  PRIMARY KEY (`idHistoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `historia_druzyn`
--

INSERT INTO `historia_druzyn` (`idHistoria`, `Sezon`, `Druzyna`, `Druzyny_idDruzyny`) VALUES
(1, '2021-2022', 'RKS', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia_strzelcow`
--

DROP TABLE IF EXISTS `historia_strzelcow`;
CREATE TABLE IF NOT EXISTS `historia_strzelcow` (
  `idHistoria` int NOT NULL AUTO_INCREMENT,
  `Sezon` varchar(15) DEFAULT NULL,
  `Pilkarz` varchar(25) DEFAULT NULL,
  `Pilkarz_idPilkarz` int NOT NULL,
  PRIMARY KEY (`idHistoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `historia_strzelcow`
--

INSERT INTO `historia_strzelcow` (`idHistoria`, `Sezon`, `Pilkarz`, `Pilkarz_idPilkarz`) VALUES
(1, '2021-2022', 'Jan Kowalski', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kalendarz`
--

DROP TABLE IF EXISTS `kalendarz`;
CREATE TABLE IF NOT EXISTS `kalendarz` (
  `idWydarzenie` int NOT NULL AUTO_INCREMENT,
  `Data` datetime DEFAULT NULL,
  `Druzyna_a` varchar(45) DEFAULT NULL,
  `Druzyna_b` varchar(45) DEFAULT NULL,
  `Druzyny_idDruzyny_a` int NOT NULL,
  `Druzyny_idDruzyny_b` int NOT NULL,
  PRIMARY KEY (`idWydarzenie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `kalendarz`
--

INSERT INTO `kalendarz` (`idWydarzenie`, `Data`, `Druzyna_a`, `Druzyna_b`, `Druzyny_idDruzyny_a`, `Druzyny_idDruzyny_b`) VALUES
(1, '2022-01-14 19:00:00', 'RKS', 'Polonia', 1, 2),
(2, '2022-01-21 19:00:00', 'Polonia', 'RKS', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pilkarz`
--

DROP TABLE IF EXISTS `pilkarz`;
CREATE TABLE IF NOT EXISTS `pilkarz` (
  `idPilkarz` int NOT NULL AUTO_INCREMENT,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Druzyna` varchar(45) DEFAULT NULL,
  `Pozycja` varchar(45) DEFAULT NULL,
  `Numer` varchar(45) DEFAULT NULL,
  `Wzrost` varchar(45) DEFAULT NULL,
  `Waga` varchar(45) DEFAULT NULL,
  `Preferowana_noga` varchar(45) DEFAULT NULL,
  `Uzytkownicy_idUzytkownicy` int NOT NULL,
  `Druzyny_idDruzyny` int NOT NULL,
  PRIMARY KEY (`idPilkarz`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `pilkarz`
--

INSERT INTO `pilkarz` (`idPilkarz`, `Imie`, `Nazwisko`, `Email`, `Druzyna`, `Pozycja`, `Numer`, `Wzrost`, `Waga`, `Preferowana_noga`, `Uzytkownicy_idUzytkownicy`, `Druzyny_idDruzyny`) VALUES
(1, 'Jan', 'Kowalski', 'jankowalski@gmail.com', 'RKS', 'Napastnik', '10', '184', '73', 'Prawa', 2, 1),
(2, 'Jakub', 'Nowak', 'jakubnowak@gmail.com', 'Polonia', 'Napastnik', '6', '177', '77', 'Lewa', 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `strzelcy`
--

DROP TABLE IF EXISTS `strzelcy`;
CREATE TABLE IF NOT EXISTS `strzelcy` (
  `idStrzelcy` int NOT NULL AUTO_INCREMENT,
  `Lp.` int NOT NULL,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Gole` int DEFAULT NULL,
  `Pilkarz_idPilkarz` int NOT NULL,
  PRIMARY KEY (`idStrzelcy`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `strzelcy`
--

INSERT INTO `strzelcy` (`idStrzelcy`, `Lp.`, `Imie`, `Nazwisko`, `Gole`, `Pilkarz_idPilkarz`) VALUES
(1, 1, 'Jan', 'Kowalski', 15, 2),
(2, 2, 'Jakub', 'Nowak', 7, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

DROP TABLE IF EXISTS `uzytkownicy`;
CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `idUzytkownicy` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(45) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Haslo` varchar(45) NOT NULL,
  `Typ` int NOT NULL DEFAULT '1',
  `Status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUzytkownicy`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Login_UNIQUE` (`Login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idUzytkownicy`, `Email`, `Login`, `Haslo`, `Typ`, `Status`) VALUES
(1, 'admin@admin.pl', 'admin', 'admin', 5, 1),
(2, 'jankowalski@gmail.com', 'jankowalski', 'jankowalski', 1, 1),
(3, 'jakubnowak@gmail.com', 'jakubnowak', 'jakubnowak', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
