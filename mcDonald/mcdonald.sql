-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2019, 12:38
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mcdonald`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `kategoria` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `kategoria`) VALUES
(1, 'burger'),
(3, 'napoje'),
(2, 'shake');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_zamowien`
--

CREATE TABLE `lista_zamowien` (
  `index` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lista_zamowien`
--

INSERT INTO `lista_zamowien` (`index`, `id_zamowienia`, `id_produktu`, `ilosc`) VALUES
(1, 1, 8, 1),
(2, 1, 10, 1),
(3, 1, 1, 1),
(5, 74, 5, 1),
(6, 3, 1, 3),
(7, 4, 5, 1),
(8, 5, 10, 1),
(9, 6, 5, 1),
(11, 7, 5, 9),
(12, 7, 2, 6),
(13, 8, 5, 1),
(14, 9, 5, 1),
(15, 10, 5, 1),
(16, 11, 5, 1),
(17, 12, 10, 1),
(18, 13, 5, 1),
(19, 14, 10, 1),
(20, 15, 5, 1),
(21, 16, 5, 3),
(22, 17, 9, 4),
(23, 18, 5, 5),
(24, 19, 2, 1),
(25, 20, 5, 1),
(26, 21, 6, 1),
(27, 22, 5, 1),
(28, 23, 10, 1),
(29, 24, 10, 1),
(30, 25, 5, 1),
(31, 26, 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id_zamowienia` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id_zamowienia`, `data`, `status`) VALUES
(1, '2019-03-25 12:43:33', 2),
(2, '2019-03-25 12:43:40', 2),
(3, '2019-03-25 13:03:50', 2),
(4, '2019-03-25 12:59:26', 2),
(5, '2019-03-25 13:03:58', 2),
(6, '2019-03-26 07:06:53', 2),
(7, '2019-03-25 21:58:13', 2),
(8, '2019-03-26 07:34:48', 2),
(9, '2019-03-26 07:40:14', 2),
(10, '2019-03-26 07:49:58', 2),
(11, '2019-03-26 07:52:58', 2),
(12, '2019-03-26 07:57:19', 2),
(13, '2019-03-26 08:02:42', 2),
(14, '2019-03-26 08:17:08', 2),
(15, '2019-03-26 08:17:30', 2),
(16, '2019-03-26 09:04:48', 2),
(17, '2019-03-26 09:17:03', 2),
(18, '2019-03-26 09:17:53', 2),
(19, '2019-03-26 08:47:31', 2),
(20, '2019-03-26 09:13:59', 2),
(21, '2019-03-26 09:18:51', 2),
(22, '2019-03-26 09:24:00', 2),
(23, '2019-03-26 09:33:45', 2),
(24, '2019-03-26 09:33:37', 1),
(25, '2019-03-26 09:34:03', 1),
(26, '2019-03-26 11:35:50', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id_produktu` int(11) NOT NULL,
  `nazwa_produktu` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(20) NOT NULL,
  `cena_produktu` float NOT NULL,
  `img_src` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id_produktu`, `nazwa_produktu`, `id_kategorii`, `cena_produktu`, `img_src`) VALUES
(1, 'Shake truskawkowy', 2, 4.99, 'images/shake1.png'),
(2, 'Shake pomaranczowy ', 2, 4.99, 'images/shake.png'),
(3, 'Shake czekoladowy', 2, 4.99, 'images/shake3.png'),
(4, 'Shake waniliowy', 2, 4.99, 'images/shake4.png'),
(5, 'Big burger', 1, 7.99, 'images/kanapka.png'),
(6, 'Burger kurczok', 1, 8.99, 'images/kanapka1.png'),
(7, 'Burger bekon', 1, 10.99, 'images/kanapka3.png'),
(8, 'Burger mozarella', 1, 9.99, 'images/kanapka4.png'),
(9, 'Pepsi', 3, 3.99, 'images/pepsi.png'),
(10, 'Coca-Cola', 3, 3.99, 'images/cocacola.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`),
  ADD UNIQUE KEY `kategoria` (`kategoria`);

--
-- Indeksy dla tabeli `lista_zamowien`
--
ALTER TABLE `lista_zamowien`
  ADD PRIMARY KEY (`index`) USING BTREE;

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `lista_zamowien`
--
ALTER TABLE `lista_zamowien`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
