-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 03:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php1`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikl`
--

CREATE TABLE `artikl` (
  `idartikl` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vecaslika` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolicina` int(11) NOT NULL,
  `vodootpornost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnarukvica` int(11) NOT NULL,
  `idmehanizam` int(11) NOT NULL,
  `idpol` int(11) NOT NULL,
  `idprecnik` int(11) NOT NULL,
  `idvrsta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikl`
--

INSERT INTO `artikl` (`idartikl`, `naziv`, `vecaslika`, `kolicina`, `vodootpornost`, `idnarukvica`, `idmehanizam`, `idpol`, `idprecnik`, `idvrsta`) VALUES
(1, 'LADY-DATEJUST', 'zenski-datejust.png', 50, '30 metara', 2, 1, 2, 7, 1),
(2, 'SKY-DWELLER', 'muski-sky.png', 40, '30 metara', 2, 1, 1, 5, 5),
(3, 'DAY-DATE 40', 'day-date40.png', 50, '20 metara', 2, 1, 1, 3, 2),
(4, 'EXPLORER', 'explorer.png', 60, '10 metara', 2, 1, 1, 4, 3),
(5, 'YACHT-MASTER 38', 'yacht.png', 20, '100 metara', 3, 1, 3, 2, 7),
(6, 'GMT-MASTER II', 'gmt.png', 20, '50 metara', 2, 1, 1, 3, 4),
(7, 'SUBMARINER DATE', 'submariner.png', 25, '40', 2, 1, 1, 3, 6),
(10, 'SUBMARINER', 'submariner1.png', 40, '30 metara', 2, 1, 3, 3, 6),
(12, 'SKY-DWELLER', 'sky.png', 20, '100 metara', 1, 1, 1, 4, 5),
(13, 'Filip', '1591971004_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(15, 'Filip', '1591971356_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(16, 'Filip', '1591971415_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(17, 'Filip', '1591971607_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(18, 'Filip', '1591971729_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(19, 'Filip', '1591971770_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(20, 'Filip', '1591971842_back.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(21, 'Filip', '1591971933_map.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(22, 'Filip', '1591971983_logo.png', 0, '30 metara', 1, 1, 1, 1, 1),
(23, 'Filip', '1594129076_francuska.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(24, 'Filip', '1594129112_francuska.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(25, 'Filip', '1594129177_kalis.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(26, 'Filip', '1594129382_pobednik.jpg', 0, '30 metara', 1, 1, 1, 1, 1),
(27, 'Filip', '1594132186_logo.jpg', 0, '30 metara', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL,
  `slika` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`idautor`, `slika`, `ime`, `opis`) VALUES
(1, 'autor.jpg', 'Filip Radosavljevic 74/18', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `cenovnik`
--

CREATE TABLE `cenovnik` (
  `idcena` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `datumod` date NOT NULL,
  `datumdo` date DEFAULT NULL,
  `aktivna` int(11) NOT NULL,
  `idartikl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cenovnik`
--

INSERT INTO `cenovnik` (`idcena`, `cena`, `datumod`, `datumdo`, `aktivna`, `idartikl`) VALUES
(1, 16000, '2020-06-09', '2020-12-06', 0, 1),
(2, 14000, '2020-06-09', '2020-07-07', 0, 2),
(3, 37000, '2020-06-17', NULL, 1, 3),
(4, 6700, '2020-06-10', '2020-12-06', 0, 4),
(5, 35000, '2020-06-11', '2020-12-06', 0, 5),
(6, 6800, '2020-06-10', '2020-07-07', 0, 6),
(7, 36200, '2020-06-11', NULL, 1, 7),
(8, 6800, '2020-06-11', '2020-07-07', 0, 10),
(9, 37950, '2020-06-11', NULL, 1, 12),
(12, 5000, '2020-12-06', '2020-07-07', 0, 2),
(13, 34000, '2020-12-06', NULL, 1, 1),
(14, 40000, '2020-12-06', NULL, 1, 5),
(15, 7000, '2020-12-06', NULL, 1, 4),
(16, 50000, '2020-12-06', NULL, 0, 20),
(17, 50000, '2020-12-06', NULL, 0, 21),
(18, 50000, '2020-12-06', NULL, 0, 22),
(19, 0, '2020-07-07', NULL, 1, 23),
(20, 0, '2020-07-07', NULL, 1, 24),
(21, 0, '2020-07-07', NULL, 1, 25),
(22, 50000, '2020-07-07', NULL, 1, 26),
(23, 50000, '2020-07-07', NULL, 1, 27),
(24, 7000, '2020-07-07', NULL, 1, 6),
(25, 5000, '2020-07-07', NULL, 1, 10),
(26, 7800, '2020-07-07', '2020-07-07', 0, 2),
(27, 50000, '2020-07-07', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkorisnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivan` int(11) NOT NULL,
  `iduloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idkorisnik`, `ime`, `prezime`, `email`, `sifra`, `aktivan`, `iduloga`) VALUES
(1, 'Filip', 'Radosavljevic', 'filipradosavlevjic@gmail.com', '3a30e08c1a8b88386d984e7708fee71e', 1, 2),
(11, 'Filip', 'Radosavljevic', 'filipradosavlevjic1@gmail.com', '3a30e08c1a8b88386d984e7708fee71e', 1, 2),
(12, 'Filip', 'Radosavljevic', 'test1@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 1, 3),
(13, 'Filip', 'Radosavljevic', 'test12@gmail.com', 'a8222b7d267fa9ecc019b9e90f3c2a22', 1, 2),
(14, 'Nikola', 'Miletic', 'test1234@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 0, 2),
(17, 'Filip', 'Mileticss', 'test0@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 1, 2),
(18, 'Filip', 'Mileticic', 'test012@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mehanizam`
--

CREATE TABLE `mehanizam` (
  `idmehanizam` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mehanizam`
--

INSERT INTO `mehanizam` (`idmehanizam`, `naziv`) VALUES
(1, 'Kvarcni'),
(2, 'Automatski'),
(3, 'Mehanički');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idmeni` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putanja` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idmeni`, `naziv`, `putanja`) VALUES
(1, 'Admin panel', 'admin.php'),
(3, 'Prodavnica', 'index.php'),
(4, 'Login', 'register.php'),
(5, 'Logout', 'logout.php'),
(6, 'O autoru', 'autor.php'),
(7, 'Kontakt', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `meniuloga`
--

CREATE TABLE `meniuloga` (
  `idmeniuloga` int(11) NOT NULL,
  `idmeni` int(11) NOT NULL,
  `iduloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meniuloga`
--

INSERT INTO `meniuloga` (`idmeniuloga`, `idmeni`, `iduloga`) VALUES
(22, 4, 1),
(23, 6, 1),
(24, 3, 1),
(25, 5, 2),
(26, 3, 2),
(27, 6, 2),
(28, 5, 3),
(29, 6, 3),
(30, 1, 3),
(31, 3, 3),
(32, 7, 1),
(33, 7, 2),
(34, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `narukvica`
--

CREATE TABLE `narukvica` (
  `idnarukvica` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narukvica`
--

INSERT INTO `narukvica` (`idnarukvica`, `naziv`) VALUES
(1, 'Koža'),
(2, 'Metal'),
(3, 'Guma');

-- --------------------------------------------------------

--
-- Table structure for table `podaci`
--

CREATE TABLE `podaci` (
  `idpodaci` int(11) NOT NULL,
  `adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broj` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `podaci`
--

INSERT INTO `podaci` (`idpodaci`, `adresa`, `broj`, `fax`, `email`) VALUES
(1, 'Balkanska 24', '063485584', '+04 (123) 456-7890', 'shoper@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `idpol` int(11) NOT NULL,
  `nazivpola` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`idpol`, `nazivpola`) VALUES
(1, 'muški'),
(2, 'ženski'),
(3, 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `idporudzbina` int(11) NOT NULL,
  `idartikl` int(11) NOT NULL,
  `idkorisnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brojtelefona` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datumnarudzvine` date NOT NULL,
  `Deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`idporudzbina`, `idartikl`, `idkorisnik`, `ime`, `prezime`, `adresa`, `brojtelefona`, `datumnarudzvine`, `Deleted`) VALUES
(1, 6, 12, 'Filip', 'Radosavljevic', 'ffff', '63355049', '2020-12-06', 0),
(2, 6, 12, 'Filip', 'Radosavljevic', 'ffff', '63355049', '2020-12-06', 0),
(3, 6, 12, 'Filip', 'Radosavljevic', 'ffff', '63355049', '2020-12-06', 0),
(4, 6, 12, 'Filip', 'Radosavljevic', 'ffff', '63355049', '2020-12-06', 0),
(5, 6, 12, '', '', '', '0', '2020-12-06', 0),
(6, 6, 12, '', '', '', '0', '2020-12-06', 0),
(8, 12, 12, 'Filip', 'Radosavljevic', 'Triglavska 4', '063355', '2020-06-07', 0),
(9, 12, 12, 'Filip', 'Radosavljevic', 'Triglavska 4', '063355', '2020-06-07', 0),
(10, 12, 12, 'Filip', 'Radosavljevic', 'Triglavska 4', '063355', '2020-06-07', 0),
(11, 12, 12, 'Filip', 'Radosavljevic', 'Triglavska 4', '06335577', '2020-06-07', 1),
(12, 12, 12, 'Filip', 'Radosavljevic', 'Triglavska 4', '06335577888', '2020-06-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `idPoruke` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `Poruka` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`idPoruke`, `idKorisnik`, `Poruka`, `Deleted`) VALUES
(1, 12, 'Filip', 0),
(2, 12, 'Marko', 0),
(3, 12, 'Zdravo sveta', 0),
(4, 12, 'Zdravo svete', 0),
(5, 12, 'Zdravo Sveta', 1);

-- --------------------------------------------------------

--
-- Table structure for table `precnik`
--

CREATE TABLE `precnik` (
  `idprecnik` int(11) NOT NULL,
  `velicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `precnik`
--

INSERT INTO `precnik` (`idprecnik`, `velicina`) VALUES
(1, 35),
(2, 38),
(3, 40),
(4, 42),
(5, 44),
(6, 45),
(7, 28),
(8, 32);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(50) NOT NULL,
  `uloga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `uloga`) VALUES
(1, 'obican'),
(2, 'korisnik'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `idvrsta` int(11) NOT NULL,
  `vrstanaziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`idvrsta`, `vrstanaziv`) VALUES
(1, 'DATEJUST'),
(2, 'DAY-DATE'),
(3, 'EXPLORER'),
(4, 'GMT-MASTER II'),
(5, 'SKY-DWELLER'),
(6, 'SUBMARINER'),
(7, 'YACHT-MASTER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikl`
--
ALTER TABLE `artikl`
  ADD PRIMARY KEY (`idartikl`),
  ADD KEY `idpol` (`idpol`),
  ADD KEY `idvrsta` (`idvrsta`),
  ADD KEY `idnarukvica` (`idnarukvica`),
  ADD KEY `idmehanizam` (`idmehanizam`),
  ADD KEY `idprecnik` (`idprecnik`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idautor`);

--
-- Indexes for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD PRIMARY KEY (`idcena`),
  ADD KEY `idartikl` (`idartikl`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `iduloga` (`iduloga`);

--
-- Indexes for table `mehanizam`
--
ALTER TABLE `mehanizam`
  ADD PRIMARY KEY (`idmehanizam`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idmeni`);

--
-- Indexes for table `meniuloga`
--
ALTER TABLE `meniuloga`
  ADD PRIMARY KEY (`idmeniuloga`),
  ADD KEY `idmeni` (`idmeni`),
  ADD KEY `iduloga` (`iduloga`);

--
-- Indexes for table `narukvica`
--
ALTER TABLE `narukvica`
  ADD PRIMARY KEY (`idnarukvica`);

--
-- Indexes for table `podaci`
--
ALTER TABLE `podaci`
  ADD PRIMARY KEY (`idpodaci`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`idpol`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`idporudzbina`),
  ADD KEY `idartikl` (`idartikl`),
  ADD KEY `idkorisnik` (`idkorisnik`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`idPoruke`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `precnik`
--
ALTER TABLE `precnik`
  ADD PRIMARY KEY (`idprecnik`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`idvrsta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikl`
--
ALTER TABLE `artikl`
  MODIFY `idartikl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cenovnik`
--
ALTER TABLE `cenovnik`
  MODIFY `idcena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mehanizam`
--
ALTER TABLE `mehanizam`
  MODIFY `idmehanizam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idmeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meniuloga`
--
ALTER TABLE `meniuloga`
  MODIFY `idmeniuloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `narukvica`
--
ALTER TABLE `narukvica`
  MODIFY `idnarukvica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `podaci`
--
ALTER TABLE `podaci`
  MODIFY `idpodaci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `idpol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `idporudzbina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `idPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `precnik`
--
ALTER TABLE `precnik`
  MODIFY `idprecnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `idvrsta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikl`
--
ALTER TABLE `artikl`
  ADD CONSTRAINT `artikl_ibfk_1` FOREIGN KEY (`idpol`) REFERENCES `pol` (`idpol`),
  ADD CONSTRAINT `artikl_ibfk_2` FOREIGN KEY (`idvrsta`) REFERENCES `vrsta` (`idvrsta`),
  ADD CONSTRAINT `artikl_ibfk_3` FOREIGN KEY (`idnarukvica`) REFERENCES `narukvica` (`idnarukvica`),
  ADD CONSTRAINT `artikl_ibfk_4` FOREIGN KEY (`idmehanizam`) REFERENCES `mehanizam` (`idmehanizam`),
  ADD CONSTRAINT `artikl_ibfk_5` FOREIGN KEY (`idprecnik`) REFERENCES `precnik` (`idprecnik`);

--
-- Constraints for table `cenovnik`
--
ALTER TABLE `cenovnik`
  ADD CONSTRAINT `cenovnik_ibfk_1` FOREIGN KEY (`idartikl`) REFERENCES `artikl` (`idartikl`);

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`iduloga`) REFERENCES `uloga` (`id`);

--
-- Constraints for table `meniuloga`
--
ALTER TABLE `meniuloga`
  ADD CONSTRAINT `meniuloga_ibfk_1` FOREIGN KEY (`iduloga`) REFERENCES `uloga` (`id`),
  ADD CONSTRAINT `meniuloga_ibfk_2` FOREIGN KEY (`idmeni`) REFERENCES `meni` (`idmeni`);

--
-- Constraints for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD CONSTRAINT `porudzbina_ibfk_1` FOREIGN KEY (`idartikl`) REFERENCES `artikl` (`idartikl`),
  ADD CONSTRAINT `porudzbina_ibfk_2` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnici` (`idkorisnik`);

--
-- Constraints for table `poruke`
--
ALTER TABLE `poruke`
  ADD CONSTRAINT `poruke_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnici` (`idkorisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
