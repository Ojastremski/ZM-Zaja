-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Mar 2018, 07:11
-- Wersja serwera: 10.1.25-MariaDB
-- Wersja PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sawicki_1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `iten_slider`
--

DROP TABLE IF EXISTS `iten_slider`;
CREATE TABLE `iten_slider` (
  `id` int(11) NOT NULL,
  `image_link` text COLLATE utf8_polish_ci NOT NULL,
  `nazwa_jachtu` text COLLATE utf8_polish_ci,
  `cena_od` int(11) DEFAULT NULL,
  `link_to_page` text COLLATE utf8_polish_ci,
  `aktywny` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `iten_slider`
--

INSERT INTO `iten_slider` (`id`, `image_link`, `nazwa_jachtu`, `cena_od`, `link_to_page`, `aktywny`) VALUES
(1, 'http://jachty-mazury.com.pl/wp-content/uploads/slider/jacht-frajda.jpg', 'frajda', 499, '/frajda', 1),
(2, 'http://jachty-mazury.com.pl/wp-content/uploads/slider/jacht-freja.jpg', 'freja', 399, '/freja', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `iten_slider`
--
ALTER TABLE `iten_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `iten_slider`
--
ALTER TABLE `iten_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
