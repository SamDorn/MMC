-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 21, 2023 alle 14:34
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mmc`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `altezza`
--

CREATE TABLE `altezza` (
  `altezza` int(11) NOT NULL,
  `fattore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `altezza`
--

INSERT INTO `altezza` (`altezza`, `fattore`) VALUES
(0, 0.77),
(25, 0.85),
(50, 0.93),
(75, 1),
(100, 0.93),
(125, 0.85),
(150, 0.78),
(176, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `dislocazione`
--

CREATE TABLE `dislocazione` (
  `dislocazione` int(11) NOT NULL,
  `fattore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `dislocazione`
--

INSERT INTO `dislocazione` (`dislocazione`, `fattore`) VALUES
(0, 1),
(30, 0.9),
(60, 0.81),
(90, 0.71),
(120, 0.52),
(135, 0.57),
(136, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `distanza_orizzontale`
--

CREATE TABLE `distanza_orizzontale` (
  `distanza` int(11) NOT NULL,
  `fattore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `distanza_orizzontale`
--

INSERT INTO `distanza_orizzontale` (`distanza`, `fattore`) VALUES
(25, 1),
(30, 0.83),
(40, 0.63),
(50, 0.5),
(55, 0.45),
(60, 0.42),
(64, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `distanza_verticale`
--

CREATE TABLE `distanza_verticale` (
  `dislocazione` int(11) NOT NULL,
  `fattore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `distanza_verticale`
--

INSERT INTO `distanza_verticale` (`dislocazione`, `fattore`) VALUES
(25, 1),
(30, 0.97),
(40, 0.93),
(50, 0.91),
(70, 0.88),
(100, 0.87),
(150, 0.86),
(176, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `ragione_sociale` varchar(255) NOT NULL,
  `data_emissione` date NOT NULL DEFAULT current_timestamp(),
  `peso` float NOT NULL,
  `altezza_da_terra` float NOT NULL,
  `distanza_verticale` float NOT NULL,
  `distanza_orizzontale` float NOT NULL,
  `dislocazione_angolare` float NOT NULL,
  `giudizio` varchar(255) NOT NULL,
  `frequenza` float NOT NULL,
  `ora_frequenza` varchar(255) NOT NULL,
  `costo` float NOT NULL,
  `una_mano` tinyint(1) NOT NULL,
  `due_persone` tinyint(1) NOT NULL,
  `peso_massimo` float NOT NULL,
  `indice` float NOT NULL,
  `valido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `evaluation`
--

INSERT INTO `evaluation` (`id`, `id_utente`, `ragione_sociale`, `data_emissione`, `peso`, `altezza_da_terra`, `distanza_verticale`, `distanza_orizzontale`, `dislocazione_angolare`, `giudizio`, `frequenza`, `ora_frequenza`, `costo`, `una_mano`, `due_persone`, `peso_massimo`, `indice`, `valido`) VALUES
(48, 3, 'RANICONE', '2023-05-14', 12, 50, 50, 55, 120, 'Scarso', 0.2, 'da 2 a 8 ore', 12, 1, 1, 3.56462, 3.36642, 1),
(49, 3, 'Fatture in cloud', '2023-05-11', 12, 75, 40, 50, 60, 'Buono', 1, 'da 1 a 2 ore', 12, 1, 1, 6.7797, 1.76999, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `frequenza`
--

CREATE TABLE `frequenza` (
  `frequenza` float NOT NULL,
  `durata` varchar(255) NOT NULL,
  `fattore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `frequenza`
--

INSERT INTO `frequenza` (`frequenza`, `durata`, `fattore`) VALUES
(0.2, '< 1 ora', 1),
(1, '< 1 ora', 0.94),
(4, '< 1 ora', 0.84),
(6, '< 1 ora', 0.75),
(9, '< 1 ora', 0.52),
(12, '< 1 ora', 0.37),
(15, '< 1 ora', 0),
(0.2, 'da 1 a 2 ore', 0.95),
(1, 'da 1 a 2 ore', 0.88),
(4, 'da 1 a 2 ore', 0.72),
(6, 'da 1 a 2 ore', 0.5),
(9, 'da 1 a 2 ore', 0.3),
(12, 'da 1 a 2 ore', 0.21),
(15, 'da 1 a 2 ore', 0),
(0.2, 'da 2 a 8 ore', 0.85),
(1, 'da 2 a 8 ore', 0.75),
(4, 'da 2 a 8 ore', 0.45),
(6, 'da 2 a 8 ore', 0.27),
(9, 'da 2 a 8 ore', 0.52),
(12, 'da 2 a 8 ore', 0),
(15, 'da 2 a 8 ore', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `ragione_sociale` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `nome`, `cognome`, `email`, `password`, `role`, `ragione_sociale`) VALUES
(3, 'Maurizio', 'Gaffuri', 'maurizio.gaffuri@gmail.com', 'mauriziogaffuri', 1, NULL),
(4, 'Marcella', 'Falzone', 'marcella.falzone@gmail.com', 'marcellafalzone', 0, 'Fatture in cloud');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
