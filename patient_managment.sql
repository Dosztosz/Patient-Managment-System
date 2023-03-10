-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Mar 2023, 13:11
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `patient_managment`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(100) NOT NULL,
  `patient_login` varchar(100) NOT NULL,
  `patient_password` varchar(100) NOT NULL,
  `patient_firstname` varchar(100) NOT NULL,
  `patient_lastname` varchar(100) NOT NULL,
  `patient_birthday` date NOT NULL,
  `patient_grouplist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_login`, `patient_password`, `patient_firstname`, `patient_lastname`, `patient_birthday`, `patient_grouplist`) VALUES
(1, 'orhideo', 'orhideo320', 'Janina', 'Tracz', '1998-03-08', '1'),
(2, 'janek', 'janusz29', 'Janusz', 'Krawczyk', '1996-04-08', '1, 3'),
(3, 'dawud', 'dawud420', 'Daiwd', 'Piątkowski', '1995-02-05', '1, 3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `patients_group`
--

CREATE TABLE `patients_group` (
  `group_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `patients_group`
--

INSERT INTO `patients_group` (`group_id`, `patient_id`) VALUES
('1', '1'),
('1', '2'),
('1', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `patient_groups`
--

CREATE TABLE `patient_groups` (
  `group_id` int(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `group_patients` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `patient_groups`
--

INSERT INTO `patient_groups` (`group_id`, `group_name`, `group_patients`) VALUES
(1, 'Leczenie Kanałowe', '1, 2, 3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indeksy dla tabeli `patient_groups`
--
ALTER TABLE `patient_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `patient_groups`
--
ALTER TABLE `patient_groups`
  MODIFY `group_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
