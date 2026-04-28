-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 28. 09:27
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `fitappprojectdb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dailycalories`
--

CREATE TABLE `dailycalories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `totalCalories` decimal(10,2) NOT NULL,
  `totalProtein` decimal(10,2) NOT NULL,
  `totalCarb` decimal(10,2) NOT NULL,
  `totalFat` decimal(10,2) NOT NULL,
  `cascade` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exercise_type` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `kcal_burned` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `exercises`
--

INSERT INTO `exercises` (`id`, `user_id`, `exercise_type`, `duration`, `kcal_burned`, `date`, `created_at`, `updated_at`) VALUES
(6, 1, 'run', 45, 450, '2026-04-26', '2026-04-26 14:39:41', '2026-04-26 14:39:41'),
(9, 8, 'football', 50, 400, '2026-04-27', '2026-04-27 17:47:11', '2026-04-27 17:47:11');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `calories` decimal(10,2) NOT NULL,
  `protein` decimal(10,2) NOT NULL,
  `carb` decimal(10,2) NOT NULL,
  `fat` decimal(10,2) NOT NULL,
  `fiber` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `food`
--

INSERT INTO `food` (`id`, `foodname`, `calories`, `protein`, `carb`, `fat`, `fiber`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Sertés szűzpecsenye', 143.00, 21.00, 0.00, 6.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(2, 'Sertéscomb', 160.00, 21.00, 0.00, 8.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(3, 'Sertésoldalas (sült)', 320.00, 18.00, 0.00, 28.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(4, 'Sertészsír', 896.00, 0.10, 0.00, 99.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(5, 'Csirkemell filé (1 db ~150g)', 120.00, 22.50, 0.00, 2.60, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(6, 'Pulykamell filé (1 db ~150g)', 104.00, 24.00, 0.00, 1.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(7, 'Pulyka felsőcomb', 150.00, 19.00, 0.00, 8.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(8, 'Kacsacomb (sült, bőrrel)', 220.00, 18.00, 0.00, 16.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(9, 'Kacsamell (sült, bőrrel)', 200.00, 19.00, 0.00, 14.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(10, 'Marhabélszín', 135.00, 22.00, 0.00, 5.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(11, 'Marhanyak', 180.00, 19.00, 0.00, 11.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(12, 'Csirkemáj (sült)', 170.00, 25.00, 1.00, 7.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(13, 'Csirkemell sonka (1 szelet ~15-20g)', 95.00, 18.00, 1.50, 2.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(14, 'Pulykamell sonka (1 szelet ~15-20g)', 90.00, 17.50, 1.00, 1.80, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(15, 'Füstölt Bacon (1 szelet ~15g)', 540.00, 13.00, 1.00, 54.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(16, 'Téliszalámi (1 szelet ~10g)', 520.00, 20.00, 1.00, 48.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(17, 'Debreceni kolbász (1 pár ~100g)', 310.00, 15.00, 2.00, 27.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(18, 'Vadhús (Szarvas/Őz)', 120.00, 23.00, 0.00, 2.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(19, 'Nyúlhús', 115.00, 22.00, 0.00, 3.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(20, 'Jázmin rizs (nyers)', 350.00, 7.00, 78.00, 0.60, 1.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(21, 'Bulgur (nyers)', 342.00, 12.00, 76.00, 1.30, 18.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(22, 'Kuszkusz (nyers)', 376.00, 12.80, 77.00, 0.60, 5.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(23, 'Burgonya (1 közepes ~150g)', 77.00, 2.00, 17.00, 0.10, 2.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(24, 'Édesburgonya (1 közepes ~200g)', 86.00, 1.60, 20.10, 0.10, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(25, 'Sült burgonya (olaj nélkül, 100g)', 93.00, 2.00, 21.00, 0.10, 2.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(26, 'Hasábburgonya (mirelit, sütőben, 100g)', 150.00, 2.50, 25.00, 4.00, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(27, 'Durum tészta (nyers, 100g)', 355.00, 12.50, 71.00, 1.50, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(28, 'Tojásos tészta (8 tojásos, nyers, 100g)', 395.00, 15.00, 68.00, 6.00, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(29, 'Vöröslencse (nyers, 100g)', 353.00, 24.00, 63.00, 1.10, 10.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(30, 'Csicseriborsó (száraz, 100g)', 364.00, 19.30, 60.60, 6.00, 17.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(31, 'Tojás (M-es, 1db ~50g)', 155.00, 13.00, 1.10, 11.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(32, 'Főtt tojás (1 db ~50g)', 155.00, 13.00, 1.10, 11.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(33, 'Tükörtojás (1 db ~50g) - kevés olajjal)', 196.00, 13.50, 0.80, 15.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(34, 'Tojásrántotta (2 db-ból ~110g, vajjal/olajjal)', 170.00, 11.00, 1.50, 13.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(35, 'Tojásfehérje (Lé - 100g)', 52.00, 11.00, 0.70, 0.20, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(36, 'Tojássárgája (1 db ~17g)', 322.00, 15.80, 3.50, 26.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(37, 'Sovány túró', 80.00, 14.10, 3.80, 0.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(38, 'Trappista sajt (1 szelet ~ 20g)', 352.00, 25.00, 0.00, 28.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(39, 'Skyr (natúr, 1 pohár ~ 150g)', 63.00, 11.00, 4.00, 0.20, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(40, 'Tej (1,5%-os)', 44.00, 3.40, 4.70, 1.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(41, 'Tej (2,8%-os)', 56.00, 3.30, 4.60, 2.80, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(42, 'Habtejszín (30%-os)', 292.00, 2.30, 3.10, 30.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(43, 'Tejföl (12%-os)', 134.00, 3.30, 3.90, 12.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(44, 'Kefir', 46.00, 3.20, 4.40, 1.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(45, 'Mozzarella sajt', 280.00, 22.00, 2.20, 20.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(46, 'Feta sajt', 264.00, 14.00, 4.10, 21.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(47, 'Camembert sajt', 299.00, 19.80, 0.50, 24.30, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(48, 'Parmigiano Reggiano (Parmezán)', 431.00, 38.50, 4.10, 28.60, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(49, 'Körözött (házi jellegű)', 145.00, 12.50, 3.50, 9.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(50, 'Mandulatej (cukrozatlan)', 13.00, 0.40, 0.10, 1.10, 0.30, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(51, 'Zabtej', 48.00, 1.10, 8.40, 0.80, 0.80, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(52, 'Kókusztej (konzerv)', 197.00, 2.00, 2.80, 19.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(53, 'Banán (1 közepes héj nélkül ~120g)', 89.00, 1.10, 23.00, 0.30, 2.60, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(54, 'Alma (1 közepes ~170g)', 52.00, 0.30, 14.00, 0.20, 2.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(55, 'Áfonya (1 marék ~50g)', 57.00, 0.70, 14.50, 0.30, 2.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(56, 'Kígyóuborka (1 db ~400g)', 15.00, 0.70, 3.60, 0.10, 0.50, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(57, 'Paradicsom (1 közepes ~100g)', 18.00, 0.90, 3.90, 0.20, 1.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(58, 'Brokkoli (nyers)', 34.00, 2.80, 6.60, 0.40, 2.60, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(59, 'Sárgarépa (1 közepes ~70-80g)', 41.00, 0.90, 9.60, 0.20, 2.80, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(60, 'Édesburgonya (nyers)', 86.00, 1.60, 20.10, 0.10, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(61, 'Eper (1 nagyobb szem ~15-20g)', 32.00, 0.70, 7.70, 0.30, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(62, 'Narancs (1 közepes ~150g)', 47.00, 0.90, 11.80, 0.10, 2.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(63, 'Avokádó', 160.00, 2.00, 8.50, 14.70, 6.70, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(64, 'Spenót (nyers)', 23.00, 2.90, 3.60, 0.40, 2.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(65, 'Vöröshagyma (1 közepes ~80g)', 40.00, 1.10, 9.30, 0.10, 1.70, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(66, 'Fokhagyma (1 gerezd ~5g)', 149.00, 6.40, 33.00, 0.50, 2.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(67, 'TV Paprika (1 db ~120g)', 20.00, 1.20, 3.00, 0.30, 1.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(68, 'Kaliforniai paprika (1 db ~200g)', 31.00, 1.00, 6.00, 0.30, 2.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(69, 'Cukkini (1 db ~250g)', 17.00, 1.20, 3.10, 0.30, 1.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(70, 'Jégsaláta (1 fej ~500g)', 14.00, 0.90, 3.00, 0.10, 1.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(71, 'Szőlő (1 fürt ~200g)', 67.00, 0.60, 17.00, 0.40, 0.90, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(72, 'Körte (1 közepes ~180g)', 57.00, 0.40, 15.00, 0.10, 3.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(73, 'Kivi (1 db ~70g)', 61.00, 1.10, 15.00, 0.50, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(74, 'Citrom (1 db ~100g)', 29.00, 1.10, 9.00, 0.30, 2.80, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(75, 'Görögdinnye (1 szelet ~300g)', 30.00, 0.60, 7.60, 0.20, 0.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(76, 'McDonalds - Big Mac (1db 215g)', 239.00, 12.00, 20.00, 12.00, 1.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(77, 'McDonalds - Sajtburger (1db 115g)', 261.00, 14.00, 26.00, 10.40, 1.70, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(78, 'McDonalds - McChicken (1db 170g)', 262.00, 12.40, 24.10, 12.90, 1.30, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(79, 'McDonalds - McFarm (1db 165g)', 263.00, 12.70, 18.20, 15.20, 1.50, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(80, 'McDonalds - McNuggets (6 db - 105g)', 238.00, 14.30, 14.30, 13.30, 1.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(81, 'McDonalds - Sült krumpli (Kicsi - 75g)', 290.00, 3.00, 36.00, 14.00, 3.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(82, 'McDonalds - Sült krumpli (Közepes - 115g)', 290.00, 3.00, 36.00, 14.00, 3.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(83, 'McDonalds - Sült krumpli (Nagy - 150g)', 290.00, 3.00, 36.00, 14.00, 3.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(84, 'KFC - Zinger szendvics (1db 175g)', 254.00, 12.60, 20.00, 13.70, 1.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(85, 'KFC - Twister (1db 215g)', 226.00, 8.80, 22.30, 11.20, 1.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(86, 'KFC - Hot Wings (5 db - 135g)', 333.00, 20.70, 8.90, 23.70, 1.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(87, 'KFC - Qurrito (1db 220g)', 282.00, 15.50, 21.80, 14.50, 0.90, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(88, 'KFC - Panírozott csirkemell csík (3 db - 90g)', 272.00, 23.30, 10.00, 15.60, 0.90, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(89, 'Burger King - Whopper (1db 270g)', 237.00, 10.40, 18.10, 13.70, 1.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(90, 'Burger King - Steakhouse Burger (1db 320g)', 247.00, 10.90, 16.30, 15.30, 1.30, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(91, 'Burger King - Chili Cheese Nuggets (6 db - 100g)', 230.00, 8.00, 19.00, 13.00, 1.50, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(92, 'Burger King - Bacon King (1db szimpla - 250g)', 360.00, 19.20, 18.00, 24.00, 0.80, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(93, 'Burger King - Hagymakarika (9 db - 120g)', 267.00, 2.50, 33.30, 13.30, 2.10, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(94, 'Coca-Cola (100ml)', 42.00, 0.00, 10.60, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(95, 'Pepsi (100ml)', 43.00, 0.00, 11.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(96, 'Fanta Narancs (100ml)', 48.00, 0.00, 12.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(97, 'Sprite (100ml)', 40.00, 0.00, 10.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(98, 'Kinley Tonic (100ml)', 37.00, 0.00, 9.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(99, 'Red Bull (100ml)', 45.00, 0.00, 11.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(100, 'Monster Energy (Original - Adag: 500ml)', 47.00, 0.00, 12.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(101, 'Hell Classic (Adag: 250ml)', 46.00, 0.00, 11.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(102, 'Coca-Cola Zero (Adag: 500ml)', 0.30, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(103, 'Pepsi Max (Adag: 500ml)', 0.30, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(104, 'Sprite Zero (Adag: 500ml)', 1.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(105, 'Monster Ultra (Fehér Zero - Adag: 500ml)', 2.00, 0.00, 0.90, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(106, 'Hell Zero (Adag: 250ml)', 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(107, 'Almalé (100%-os)', 45.00, 0.10, 10.10, 0.10, 0.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(108, 'Narancslé (100%-os)', 47.00, 0.70, 10.40, 0.20, 0.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(109, 'Pfanner Ice Tea (Citromos)', 28.00, 0.10, 6.80, 0.10, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(110, 'Sör (Világos - 5%)', 43.00, 0.50, 3.50, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(111, 'Bor (Száraz fehér)', 82.00, 0.10, 2.60, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(112, 'Pálinka / Vodka (40%)', 230.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(113, 'Burgonyachips (Sós - Adag: 70g)', 536.00, 6.00, 53.00, 35.00, 4.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(114, 'Hagymás-tejfölös chips (Adag: 70g)', 525.00, 6.20, 52.00, 33.00, 3.80, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(115, 'Tortilla chips (Nacho - Adag: 100g)', 480.00, 7.00, 60.00, 24.00, 5.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(116, 'Ropi (Sós pálcika - Adag: 45g)', 385.00, 10.00, 75.00, 5.00, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(117, 'Sós mogyoró (Pörkölt - Adag: 100g)', 610.00, 25.00, 12.00, 52.00, 8.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(118, 'Tejcsokoládé (Adag: 100g tábla)', 535.00, 7.50, 55.00, 30.00, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(119, 'Étcsokoládé (70% kakaó - Adag: 100g)', 560.00, 8.00, 35.00, 42.00, 10.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(120, 'Snickers szelet (Adag: 50g)', 485.00, 8.50, 60.00, 23.00, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(121, 'Mars szelet (Adag: 51g)', 448.00, 4.00, 70.00, 17.00, 1.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(122, 'Túró Rudi (Natúr - Adag: 30g)', 355.00, 9.00, 36.00, 19.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(123, 'KitKat szelet (Adag: 41.5g)', 518.00, 7.00, 59.00, 27.00, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(124, 'Haribo Goldbären (Gumicukor - Adag: 100g)', 343.00, 6.90, 77.00, 0.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(125, 'Haribo Tropifrutti (Adag: 100g)', 349.00, 4.50, 82.00, 0.50, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(126, 'Pillecukor (Marshmallow - Adag: 100g)', 320.00, 2.00, 78.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(127, 'Pattogatott kukorica (Sós - Adag: 100g)', 400.00, 12.00, 58.00, 14.00, 13.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(128, 'Pattogatott kukorica (Vajas - Adag: 100g)', 480.00, 9.00, 50.00, 28.00, 10.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(129, 'Mozis Popcorn (Nagy adag - kb. 150g)', 510.00, 8.00, 55.00, 30.00, 9.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(130, 'Mogyoróvaj (Natúr/Crunchy - 100g)', 588.00, 25.00, 20.00, 50.00, 6.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(131, 'Nutella (Mogyorókrém - 100g)', 539.00, 6.30, 57.50, 30.90, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(132, 'Ferrero Rocher (1 db = 12.5g)', 576.00, 8.20, 44.40, 42.70, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(133, 'Reese\'s Mogyoróvajas kosárka (1 db = 13g)', 515.00, 10.50, 56.00, 29.50, 3.50, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(134, 'M&M\'s (Mogyorós - Adag: 45g)', 511.00, 9.70, 58.70, 25.40, 3.90, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(135, 'Raffaello (1 db = 10g)', 628.00, 7.50, 38.30, 48.60, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(136, 'Kinder Bueno (1 rúd = 21.5g)', 572.00, 8.60, 49.50, 37.30, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(137, 'Kesudió (Pörkölt - 100g)', 553.00, 18.20, 30.20, 43.80, 3.30, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(138, 'Mandula (Natúr - 100g)', 579.00, 21.20, 21.70, 49.90, 12.50, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(139, 'Pisztácia (Héj nélkül - 100g)', 562.00, 20.20, 27.50, 45.30, 10.60, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(140, 'Dió (Tisztított - 100g)', 654.00, 15.20, 13.70, 65.20, 6.70, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(141, 'Tökmag (Pörkölt - 100g)', 559.00, 30.20, 10.70, 49.10, 6.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(142, 'Napraforgómag (Szotyi - 100g)', 584.00, 20.80, 20.00, 51.50, 8.60, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(143, 'Mogyorós Snak (Kukoricakukac - 100g)', 495.00, 13.00, 52.00, 25.00, 4.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(144, 'Bundázott mogyoró (Chilis/BBQ - 100g)', 520.00, 15.00, 38.00, 34.00, 5.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(145, 'Fehér kenyér (1 szelet ~50g)', 265.00, 9.00, 49.00, 3.20, 2.70, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(146, 'Teljes kiőrlésű kenyér (1 szelet ~50g)', 247.00, 13.00, 41.00, 3.40, 7.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(147, 'Vizes (1 db ~45g)', 272.00, 9.00, 53.00, 2.50, 2.20, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(148, 'Zsemle (1 db ~50g)', 280.00, 8.50, 57.00, 1.20, 2.40, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(149, 'Tortilla lap (Adag: 1db ~60g)', 312.00, 9.10, 50.00, 8.00, 2.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(150, 'Étóolaj (Napraforgó)', 884.00, 0.00, 0.00, 99.80, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(151, 'Vaj (82% zsírtartalom)', 717.00, 0.80, 0.10, 81.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(152, 'Margarin', 360.00, 0.20, 0.50, 40.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(153, 'Olívaolaj', 884.00, 0.00, 0.00, 99.80, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(154, 'Ketchup (1 evőkanál ~15g)', 112.00, 1.20, 25.00, 0.10, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(155, 'Mustár (1 evőkanál ~15g)', 66.00, 4.40, 5.00, 4.00, 3.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(156, 'Majonéz (1 evőkanál ~15g)', 680.00, 1.00, 3.00, 75.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(157, 'Kristálycukor', 387.00, 0.00, 100.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(158, 'Méz', 304.00, 0.30, 82.00, 0.00, 0.00, NULL, '2026-04-25 20:33:39', '2026-04-25 20:33:39'),
(159, 'Fehérjeszelet', 350.00, 30.50, 20.00, 10.20, 5.00, NULL, '2026-04-26 14:14:33', '2026-04-26 14:14:33'),
(160, 'Sajtos Pogácsa (Pékség', 100.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-26 14:21:54', '2026-04-26 14:21:54'),
(161, 'Fehérjeszelet', 350.00, 30.50, 20.00, 10.20, 5.00, NULL, '2026-04-26 14:39:05', '2026-04-26 14:39:05'),
(162, 'Fehérjeszelet', 350.00, 30.50, 20.00, 10.20, 5.00, NULL, '2026-04-26 14:41:46', '2026-04-26 14:41:46'),
(163, 'Fehérjeszelet', 350.00, 30.50, 20.00, 10.20, 5.00, NULL, '2026-04-27 10:15:32', '2026-04-27 10:15:32'),
(164, 'Nutellás csiga', 100.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-27 10:16:52', '2026-04-27 10:16:52'),
(165, 'Torta (Gyors)', 100.00, 0.00, 0.00, 0.00, 0.00, NULL, '2026-04-27 17:46:55', '2026-04-27 17:46:55'),
(166, 'Ananász', 100.00, 2.00, 3.00, 4.00, 30.00, '2026-04-27 17:49:26', '2026-04-27 17:48:39', '2026-04-27 17:49:26'),
(167, 'Ananász', 100.00, 40.00, 5.00, 1.00, 30.00, NULL, '2026-04-27 17:58:55', '2026-04-27 18:01:21'),
(168, 'anan', 100.00, 40.00, 5.00, 2.00, 40.00, '2026-04-27 18:01:09', '2026-04-27 18:00:39', '2026-04-27 18:01:09');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foodlogs`
--

CREATE TABLE `foodlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `foodId` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `foodlogs`
--

INSERT INTO `foodlogs` (`id`, `userId`, `foodId`, `quantity`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 150, '2026-04-21', '2026-04-21 08:30:46', '2026-04-21 08:28:04', '2026-04-21 08:30:46'),
(2, 1, 7, 150, '2026-04-21', NULL, '2026-04-21 08:30:50', '2026-04-21 08:30:50'),
(3, 1, 159, 200, '2026-04-22', '2026-04-22 10:03:32', '2026-04-22 09:33:01', '2026-04-22 10:03:32'),
(4, 1, 5, 200, '2026-04-22', NULL, '2026-04-22 10:03:27', '2026-04-22 10:03:27'),
(5, 1, 100, 500, '2026-04-23', '2026-04-23 06:43:57', '2026-04-23 06:28:24', '2026-04-23 06:43:57'),
(6, 1, 6, 100, '2026-04-23', '2026-04-23 06:43:58', '2026-04-23 06:28:40', '2026-04-23 06:43:58'),
(7, 1, 8, 4000, '2026-04-23', '2026-04-23 06:33:58', '2026-04-23 06:33:39', '2026-04-23 06:33:58'),
(8, 5, 30, 150, '2026-04-23', NULL, '2026-04-23 08:16:06', '2026-04-23 08:16:06'),
(9, 1, 3, 300, '2026-04-25', '2026-04-25 09:56:26', '2026-04-25 09:56:23', '2026-04-25 09:56:26'),
(10, 1, 1, 100, '2026-04-25', NULL, '2026-04-25 10:51:45', '2026-04-25 10:51:45'),
(11, 1, 6, 100, '2026-04-25', NULL, '2026-04-25 19:37:56', '2026-04-25 19:37:56'),
(12, 1, 3, 200, '2026-04-25', NULL, '2026-04-25 19:42:43', '2026-04-25 19:42:43'),
(13, 1, 76, 215, '2026-04-25', '2026-04-25 19:44:08', '2026-04-25 19:43:16', '2026-04-25 19:44:08'),
(14, 1, 76, 215, '2026-04-25', '2026-04-25 20:34:03', '2026-04-25 20:27:36', '2026-04-25 20:34:03'),
(15, 1, 76, 215, '2026-04-25', NULL, '2026-04-25 20:34:10', '2026-04-25 20:34:10'),
(16, 1, 160, 350, '2026-04-26', '2026-04-26 14:23:57', '2026-04-26 14:21:54', '2026-04-26 14:23:57'),
(17, 1, 1, 150, '2026-04-26', NULL, '2026-04-26 14:43:12', '2026-04-26 14:43:12'),
(18, 1, 3, 150, '2026-04-26', '2026-04-27 10:20:19', '2026-04-26 14:43:32', '2026-04-27 10:20:19'),
(19, 7, 32, 100, '2026-04-26', NULL, '2026-04-26 15:21:01', '2026-04-26 15:21:01'),
(20, 1, 164, 400, '2026-04-27', NULL, '2026-04-27 10:16:52', '2026-04-27 10:16:52'),
(21, 8, 110, 500, '2026-04-27', '2026-04-27 17:46:43', '2026-04-27 17:46:31', '2026-04-27 17:46:43'),
(22, 8, 26, 500, '2026-04-27', NULL, '2026-04-27 17:46:37', '2026-04-27 17:46:37'),
(23, 8, 27, 500, '2026-04-27', NULL, '2026-04-27 17:46:50', '2026-04-27 17:46:50'),
(24, 8, 165, 250, '2026-04-27', '2026-04-27 17:48:01', '2026-04-27 17:46:55', '2026-04-27 17:48:01'),
(25, 9, 7, 150, '2026-04-27', '2026-04-27 17:59:04', '2026-04-27 17:58:30', '2026-04-27 17:59:04'),
(26, 9, 11, 1400, '2026-04-27', NULL, '2026-04-27 17:58:38', '2026-04-27 17:58:38'),
(27, 9, 167, 100, '2026-04-27', NULL, '2026-04-27 17:58:55', '2026-04-27 17:58:55');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_26_104039_create_food_table', 1),
(5, '2026_02_26_104122_create_personal_datas_table', 1),
(6, '2026_02_26_104132_create_weight_logs_table', 1),
(7, '2026_02_26_104145_create_daily_calories_table', 1),
(8, '2026_02_26_104159_create_food_logs_table', 1),
(9, '2026_03_24_095917_create_exercises_table', 1),
(10, '2026_04_08_065552_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personaldatas`
--

CREATE TABLE `personaldatas` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `height` double DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `lifestyle` varchar(255) DEFAULT NULL,
  `goalWeight` double DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `personaldatas`
--

INSERT INTO `personaldatas` (`userId`, `id`, `birthDate`, `gender`, `height`, `weight`, `lifestyle`, `goalWeight`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2005-12-14', 'male', 182, 92.92, '1.375', 80, NULL, '2026-04-18 11:11:41', '2026-04-27 10:14:37'),
(2, 2, '2006-10-19', 'female', 160, 61.00, '1.375', 55, NULL, '2026-04-18 11:16:17', '2026-04-18 11:16:17'),
(3, 3, '2006-10-19', 'female', 160, 61.00, '1.375', 55, NULL, '2026-04-18 11:35:34', '2026-04-25 10:07:28'),
(5, 4, '2000-05-04', 'male', 196, 140.00, '1.375', 100, NULL, '2026-04-23 08:15:09', '2026-04-23 08:15:09'),
(6, 5, '1972-09-26', 'male', 160, 55.00, '1.2', 50, NULL, '2026-04-26 12:51:33', '2026-04-26 12:51:33'),
(7, 6, '1980-07-05', 'female', 169, 66.00, '1.55', 62, NULL, '2026-04-26 15:19:40', '2026-04-26 15:19:40'),
(8, 7, '2005-12-14', 'male', 180, 75.00, '1.55', 70, NULL, '2026-04-27 17:46:19', '2026-04-27 17:46:19'),
(9, 8, '2005-12-14', 'male', 180, 75.00, '1.55', 80, NULL, '2026-04-27 17:58:14', '2026-04-27 17:58:14');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api_token', '87bc53a31a582e668c7794afda898df9c69b10d24ef14ab8a59056ff072843f1', '[\"*\"]', '2026-04-27 10:21:30', NULL, '2026-04-26 13:59:47', '2026-04-27 10:21:30'),
(2, 'App\\Models\\User', 1, 'api_token', '3a5091625feb6741b4e82ab95952bca663407d44aaf7978dadb1aafd8733bbcd', '[\"*\"]', '2026-04-27 10:23:45', NULL, '2026-04-27 10:06:38', '2026-04-27 10:23:45');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('IJEB4veXkDLV1UqKkJnT0UsMc7pzxgKbcpTmx4Lv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlFoZG53am5aQW9GYmlrTkxraXZsU2dVTGVvYWZaeG5rbVl6MGJSSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1777320105);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Komacso', 'majomka11.he@gmail.com', NULL, '$2y$12$yvhEayTk8k.V0TtY3C0nue0B57YNKUkC9Wx1QLDsLIbxzbTzycqF.', 1, NULL, NULL, '2026-04-18 11:11:28', '2026-04-18 11:11:28'),
(2, 'Mimi', 'milla.szamoca@gmail.com', NULL, '$2y$12$8.BJCOzlP9eMygJCnbD5fO5ZHNQTS9THPhBa.Sf08eX93R9S18Ele', 0, NULL, '2026-04-18 11:30:03', '2026-04-18 11:15:57', '2026-04-18 11:30:03'),
(3, 'Mimi', 'milla.szamoca1@gmail.com', NULL, '$2y$12$86zAs/o1TJfrPPB35AEc6.8YVk/fLKxOoHUhjdd5alXCht2aS8z/S', 0, NULL, '2026-04-27 10:23:45', '2026-04-18 11:35:18', '2026-04-27 10:23:45'),
(4, 'Papi', 'papi@gmail.com', NULL, 'papivagyok2000', 0, 'papivagyok2000', '2026-04-25 19:41:42', NULL, '2026-04-25 19:41:42'),
(5, 'Davidson627', 'david.gonda01@gmail.com', NULL, '$2y$12$mo86smZ.nP9HEZ6d0PeCHuA.E/20HBhDB6bZjieLuqElnqNuMtHd.', 0, NULL, NULL, '2026-04-23 08:14:39', '2026-04-23 08:14:39'),
(6, 'momo', 'mono@gmail.com', NULL, '$2y$12$ZnfbcShJHodaDPijTWGMVO5inXhgJRGgTUfy9C8vBQMuj2Pq5KoIi', 0, NULL, '2026-04-26 14:59:05', '2026-04-26 12:50:57', '2026-04-26 14:59:05'),
(7, 'GONDA', 'gonda.maria@freemail.hu', NULL, '$2y$12$wbUVJYNiO9a6QgNdwEc1TOmARFxEh/mUrCv7XDhrkNx/8zYUrZ5z2', 0, NULL, NULL, '2026-04-26 15:18:35', '2026-04-26 15:18:35'),
(8, 'test', 'test@gmail.com', NULL, '$2y$12$VLmaaJ6tEKu63jiiLXw5mOYVwRcq3vdLqmWnWtz0WID4lh4M1IKDG', 0, NULL, '2026-04-27 17:49:54', '2026-04-27 17:45:53', '2026-04-27 17:49:54'),
(9, 'test', 'test1@gmail.com', NULL, '$2y$12$wZkMohn8gi77m7vhpLMlve.YNh6ntLIPmCHX6kQXtBYSmCq3B.qAm', 0, NULL, '2026-04-27 18:01:41', '2026-04-27 17:57:53', '2026-04-27 18:01:41');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `weightlogs`
--

CREATE TABLE `weightlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `date` date NOT NULL,
  `cascade` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- A tábla indexei `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- A tábla indexei `dailycalories`
--
ALTER TABLE `dailycalories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dailycalories_userid_foreign` (`userId`);

--
-- A tábla indexei `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercises_user_id_foreign` (`user_id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `foodlogs`
--
ALTER TABLE `foodlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodlogs_userid_foreign` (`userId`),
  ADD KEY `foodlogs_foodid_foreign` (`foodId`);

--
-- A tábla indexei `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- A tábla indexei `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personaldatas`
--
ALTER TABLE `personaldatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personaldatas_userid_foreign` (`userId`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- A tábla indexei `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A tábla indexei `weightlogs`
--
ALTER TABLE `weightlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weightlogs_userid_foreign` (`userId`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `dailycalories`
--
ALTER TABLE `dailycalories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT a táblához `foodlogs`
--
ALTER TABLE `foodlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `personaldatas`
--
ALTER TABLE `personaldatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `weightlogs`
--
ALTER TABLE `weightlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `dailycalories`
--
ALTER TABLE `dailycalories`
  ADD CONSTRAINT `dailycalories_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `foodlogs`
--
ALTER TABLE `foodlogs`
  ADD CONSTRAINT `foodlogs_foodid_foreign` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `foodlogs_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `personaldatas`
--
ALTER TABLE `personaldatas`
  ADD CONSTRAINT `personaldatas_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Megkötések a táblához `weightlogs`
--
ALTER TABLE `weightlogs`
  ADD CONSTRAINT `weightlogs_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
