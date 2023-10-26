-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 06 sep. 2023 à 10:38
-- Version du serveur : 8.0.34-0ubuntu0.22.04.1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ubf_prod`
--

-- --------------------------------------------------------

--
-- Structure de la table `abscences`
--

CREATE TABLE `abscences` (
  `id` bigint UNSIGNED NOT NULL,
  `personnel_id` int UNSIGNED NOT NULL,
  `date_abs` date NOT NULL,
  `motif` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abscences`
--

INSERT INTO `abscences` (`id`, `personnel_id`, `date_abs`, `motif`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 3, '2023-02-02', 'malade', 1, '2023-02-22 11:10:54', '2023-02-22 11:10:54'),
(3, 26, '2023-02-03', 'malade', 1, '2023-02-22 17:02:15', '2023-02-22 17:02:15'),
(4, 27, '2023-02-02', 'malade', 1, '2023-02-23 09:10:04', '2023-02-23 09:10:04'),
(5, 27, '2023-03-01', 'Q', 1, '2023-03-11 16:40:02', '2023-03-11 16:40:02'),
(6, 24, '2020-03-02', 'QQ', 1, '2023-03-11 16:40:24', '2023-03-11 16:40:24'),
(7, 329, '2023-07-04', 'g', 1, '2023-07-24 14:01:50', '2023-07-24 14:01:50'),
(8, 332, '2023-07-04', 'Absent', 1, '2023-07-25 16:36:31', '2023-07-25 16:36:31');

-- --------------------------------------------------------

--
-- Structure de la table `budgetCategories`
--

CREATE TABLE `budgetCategories` (
  `id` bigint NOT NULL,
  `titre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint UNSIGNED NOT NULL,
  `code1` int UNSIGNED DEFAULT NULL,
  `code2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligne_budget` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compta` int DEFAULT NULL,
  `phase_operation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `budgets`
--

INSERT INTO `budgets` (`id`, `code1`, `code2`, `ligne_budget`, `compta`, `phase_operation`, `libelle`, `created_at`, `updated_at`) VALUES
(2422, 16, '16.1.2', '4.3.1.4', 6384, 'Dénombrement', 'Frais de mission des DR INS', NULL, NULL),
(2423, 16, '16.1.2', '4.3.1.5', 6384, 'Dénombrement', 'Frais de mission des chauffeurs des DR INS', NULL, NULL),
(2424, 16, '16.1.2', '4.4.3.1', 6384, 'Dénombrement', 'Frais de mission des DR INS', NULL, NULL),
(2425, 16, '16.1.2', '4.4.3.2', 6384, 'Dénombrement', 'Frais de mission des Chauffeurs DR INS', NULL, NULL),
(2426, 16, '16.1.2', '4.4.3.3', 6384, 'Dénombrement', 'Frais de mission des Superviseurs INS', NULL, NULL),
(2427, 16, '16.1.2', '4.4.4.1', 6384, 'Dénombrement', 'Frais de mission des Coordinateurs', NULL, NULL),
(2428, 16, '16.1.2', '4.4.4.2', 6384, 'Dénombrement', 'Frais de mission des Chauffeurs Coordinateurs', NULL, NULL),
(2429, 16, '16.1.2', '5.3.1', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mission des DR INS', NULL, NULL),
(2430, 16, '16.1.2', '5.3.2', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais mission de Chauffeurs des DR INS', NULL, NULL),
(2431, 16, '16.1.2', '5.4.3.1', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mission de supervision des formateurs', NULL, NULL),
(2432, 16, '16.1.2', '5.4.3.2', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mission de supervision des Chauffeurs des formateurs', NULL, NULL),
(2433, 16, '16.1.2', '5.4.3.4', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mission de superviseurs régionaux', NULL, NULL),
(2434, 16, '16.1.2', '5.4.3.5', 6384, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mission de supervision des Chauffeurs des superviseurs régionaux', NULL, NULL),
(2435, 16, '16.1.2', '2.11.1.2', 6384, 'Cartographie censitaire', 'Frais de mission des DR INS', NULL, NULL),
(2436, 16, '16.1.2', '2.11.1.3', 6384, 'Cartographie censitaire', 'Frais de mission des chauffeurs des DR INS', NULL, NULL),
(2437, 16, '16.1.2', '3.1.2.4', 6384, 'Recensement pilote', 'Frais de mission des formateurs ', NULL, NULL),
(2438, 16, '16.1.2', '3.1.2.5', 6384, 'Recensement pilote', 'Frais de mission chauffeur', NULL, NULL),
(2439, 16, '16.1.2', '2.19.1.1', 6384, 'Cartographie censitaire', 'Frais de mission des DR INS (coordinateurs régionaux)', NULL, NULL),
(2440, 16, '16.1.2', '2.19.1.2', 6384, 'Cartographie censitaire', 'Frais de mission des Chauffeurs DR INS', NULL, NULL),
(2441, 16, '16.1.2', '2.19.1.3', 6384, 'Cartographie censitaire', 'Frais de mission des Superviseurs régionaux', NULL, NULL),
(2442, 16, '16.1.2', '2.20.1.1', 6384, 'Cartographie censitaire', 'Frais de mission des Coordinateurs', NULL, NULL),
(2443, 16, '16.1.2', '2.20.1.2', 6384, 'Cartographie censitaire', 'Frais de mission des Chauffeurs Coordinateurs', NULL, NULL),
(2444, 16, '16.1.2', '4.5.1.7', 6384, 'Dénombrement', 'Frais de mission des chauffeurs des formateurs', NULL, NULL),
(2445, 16, '16.1.2', '4.5.1.6', 6384, 'Dénombrement', 'Frais de mission des formateurs', NULL, NULL),
(2446, 16, '16.1.2', '3.3.4', 6384, 'Recensement pilote', 'Frais de Mission chauffeur', NULL, NULL),
(2447, 16, '16.1.2', '2.15.1.1', 6611, 'Cartographie censitaire', 'Chefs d\'équipe cartographe', NULL, NULL),
(2448, 16, '16.1.2', '2.15.1.2', 6611, 'Cartographie censitaire', 'Agents cartographes et énumérateurs', NULL, NULL),
(2449, 16, '16.1.2', '2.15.1.3', 6611, 'Cartographie censitaire', 'Géomaticiens pool de saisie', NULL, NULL),
(2450, 16, '16.1.2', '2.15.1.4', 6611, 'Cartographie censitaire', 'Cartothécaire', NULL, NULL),
(2451, 16, '16.1.2', '2.15.1.5', 6611, 'Cartographie censitaire', 'Agents de validation et préparateurs pool de saisie', NULL, NULL),
(2452, 16, '16.1.2', '2.15.1.6', 6611, 'Cartographie censitaire', 'Informaticien au niveau régional', NULL, NULL),
(2453, 16, '16.1.2', '2.15.1.7', 6611, 'Cartographie censitaire', 'Manœuvres', NULL, NULL),
(2454, 16, '16.1.2', '2.15.1.8', 6611, 'Cartographie censitaire', 'Chauffeurs des superviseurs regionaux', NULL, NULL),
(2455, 16, '16.1.2', '2.17.1.1', 6618, 'Cartographie censitaire', 'Forfait traitement des comptables', NULL, NULL),
(2456, 16, '16.1.2', '2.18.1.7', 6618, 'Cartographie censitaire', 'Forfait des guides des équipes de cartographie', NULL, NULL),
(2457, 16, '16.1.2', '3.4.1.1', 6612, 'Recensement pilote', 'Assistants TIC', NULL, NULL),
(2458, 16, '16.1.2', '3.4.1.2', 6612, 'Recensement pilote', 'Chefs d\'équipe', NULL, NULL),
(2459, 16, '16.1.2', '3.4.1.3', 6612, 'Recensement pilote', 'Agents recenseurs', NULL, NULL),
(2460, 16, '16.1.2', '3.4.3.1', 6612, 'Recensement pilote', 'Forfait traitement des comptables', NULL, NULL),
(2461, 16, '16.1.2', '4.5.2.1', 6612, 'Dénombrement', 'Chefs d\'équipe (codification et saisie)', NULL, NULL),
(2462, 16, '16.1.2', '4.5.2.2', 6612, 'Dénombrement', 'Agents (codification et saisie)', NULL, NULL),
(2463, 16, '16.1.2', '2.16.1.1', 6612, 'Cartographie censitaire', 'Forfait perdiem chefs d\'équipe cartographe', NULL, NULL),
(2464, 16, '16.1.2', '2.16.1.2', 6612, 'Cartographie censitaire', 'Agents cartographes et énumérateurs', NULL, NULL),
(2465, 16, '16.1.2', '4.4.3.4', 6618, 'Dénombrement', 'Perdiem des Superviseurs hors INS', NULL, NULL),
(2466, 16, '16.1.2', '4.4.3.5', 6618, 'Dénombrement', 'Perdiem TIC', NULL, NULL),
(2467, 16, '16.1.2', '5.5.3.1', 6618, 'Enquête post-censitaire de couverture (EPC)', 'Perdiem  des encadreurs', NULL, NULL),
(2468, 16, '16.1.3', 'Primes (salaires des agents)', NULL, NULL, NULL, NULL, NULL),
(2469, 16, '16.1.3', '4.6.8', 6612, 'Dénombrement', 'Manœuvres', NULL, NULL),
(2470, 16, '16.1.3', '5.1.1.2', 6612, 'Enquête post-censitaire de couverture (EPC)', 'Prime des formateurs', NULL, NULL),
(2471, 16, '16.1.3', '5.4.1.2', 6612, 'Enquête post-censitaire de couverture (EPC)', 'Agents recenseurs', NULL, NULL),
(2472, 16, '16.2', 'Primes de transport', NULL, NULL, NULL, NULL, NULL),
(2473, 16, '16.2', '2.12.1.2', 6183, 'Cartographie censitaire', 'Prime de transport des formateurs ', NULL, NULL),
(2474, 16, '16.2', '2.12.1.3', 6183, 'Cartographie censitaire', 'Prime de transport des agents préparateurs et de validation', NULL, NULL),
(2475, 16, '16.2', '2.12.1.4', 6183, 'Cartographie censitaire', 'Prime de transport des informaticiens - opérateurs de saisie', NULL, NULL),
(2476, 16, '16.2', '2.12.1.5', 6183, 'Cartographie censitaire', 'Prime de transport des géomaticiens', NULL, NULL),
(2477, 16, '16.2', '2.12.1.6', 6183, 'Cartographie censitaire', 'Prime de transport des agents d\'édition', NULL, NULL),
(2478, 16, '16.2', '2.12.1.7', 6183, 'Cartographie censitaire', 'Prime de transport des Cartothécaires', NULL, NULL),
(2479, 16, '16.2', '2.13.1.2', 6183, 'Cartographie censitaire', 'Prime de transport des formateurs et superviseurs ', NULL, NULL),
(2480, 16, '16.2', '2.13.1.3', 6183, 'Cartographie censitaire', 'Prime de transport des auditeurs ', NULL, NULL),
(2481, 16, '16.2', '4.3.1.3', 6183, 'Dénombrement', 'Prime de transport des encadreurs issus d\'Abidjan', NULL, NULL),
(2482, 16, '16.2', '4.3.2.2', 6183, 'Dénombrement', 'Prime de transport des formateurs ', NULL, NULL),
(2483, 16, '16.2', '4.3.2.3', 6183, 'Dénombrement', 'Prime de transport des Superviseurs', NULL, NULL),
(2484, 16, '16.2', '4.3.3.2', 6183, 'Dénombrement', 'Prime de transport des formateurs ', NULL, NULL),
(2485, 16, '16.2', '4.3.3.3', 6183, 'Dénombrement', 'Prime de transport des auditeurs (aide-formateurs)', NULL, NULL),
(2486, 16, '16.2', '4.3.4.2', 6183, 'Dénombrement', 'Prime de transport et restauration des TIC', NULL, NULL),
(2487, 16, '16.2', '4.3.4.3', 6183, 'Dénombrement', 'Frais de transport des formateurs TIC  à Abidjan', NULL, NULL),
(2488, 16, '16.2', '4.3.4.4', 6183, 'Dénombrement', 'Transport des auditeurs TIC', NULL, NULL),
(2489, 16, '16.2', '6.1.1.3', 6183, 'Exploitations et traitements informatiques', 'Prime de transport des auditeurs ', NULL, NULL),
(2490, 16, '16.2', '2.11.1.1', 6183, 'Cartographie censitaire', 'Prime de transport des formateurs issus d\'Abidjan', NULL, NULL),
(2491, 16, '16.2', '5.4.2.1', 6183, 'Enquête post-censitaire de couverture (EPC)', 'Frais de mise en route des agents', NULL, NULL),
(2492, 16, '16.2', '5.5.1.1', 6183, 'Enquête post-censitaire de couverture (EPC)', 'Prime de transport des formateurs ', NULL, NULL),
(2493, 16, '16.2', '5.5.1.2', 6183, 'Enquête post-censitaire de couverture (EPC)', 'Prime de transport des auditeurs ', NULL, NULL),
(2494, 16, '16.2', '3.1.1.1', 6183, 'Recensement pilote', 'Prime de transport des formateurs issus d\'Abidjan', NULL, NULL),
(2495, 16, '16.2', '3.1.2.2', 6183, 'Recensement pilote', 'Prime de transport et restauration des TIC', NULL, NULL),
(2496, 16, '16.2', '3.1.2.7', 6183, 'Recensement pilote', 'Frais de transport des formateurs d\'Abidjan', NULL, NULL),
(2497, 16, '16.2', '3.1.2.8', 6183, 'Recensement pilote', 'Frais de transport des formateurs TIC  à Abidjan', NULL, NULL),
(2498, 16, '16.2', '3.1.2.9', 6183, 'Recensement pilote', 'Transport des auditeurs ', NULL, NULL),
(2499, 16, '16.2', '4.3.5.4', 6183, 'Dénombrement', 'Prime de transport des superviseurs formateurs ', NULL, NULL),
(2500, 16, '16.2', '4.3.5.5', 6183, 'Dénombrement', 'Prime de transport des aide-formateurs ', NULL, NULL),
(2501, 16, '16.2', '4.3.5.6', 6183, 'Dénombrement', 'Prime de transport des auditeurs ', NULL, NULL),
(2502, 16, '16.2', '4.5.1.2', 6183, 'Dénombrement', 'Prime de transport des auditeurs ', NULL, NULL),
(2503, 16, '16.2', '5.1.2.1', 6183, 'Enquête post-censitaire de couverture (EPC)', 'Prime de transport des auditeurs ', NULL, NULL),
(2504, 16, '16.2', '5.1.1.4', 6183, 'Enquête post-censitaire de couverture (EPC)', 'Prime de transport', NULL, NULL),
(2505, 16, '16.3', 'Primes de formation', NULL, NULL, NULL, NULL, NULL),
(2506, 16, '16.3', '4.0.2', 6618, 'Dénombrement', 'Prime de formation des formateurs TIC pour clonage', NULL, NULL),
(2507, 16, '16.3', '4.0.2', 6618, 'Dénombrement', 'Prime de formation des TIC pour clonage', NULL, NULL),
(2508, 16, '16.3', '6.1.1.2', 6618, 'Exploitations et traitements informatiques', 'Prime  des formateurs', NULL, NULL),
(2509, 16, '16.4', 'Prise en charge médicale', NULL, NULL, NULL, NULL, NULL),
(2510, 16, '16.4', '2.22.1.1', 6684, 'Cartographie censitaire', 'Boîte à pharmacie  des équipes', NULL, NULL),
(2511, 16, '16.4', '2.22.1.2', 6684, 'Cartographie censitaire', 'Boîte à pharmacie des Superviseurs régionaux', NULL, NULL),
(2512, 16, '16.4', '2.22.1.3', 6684, 'Cartographie censitaire', 'Remboursement de frais médicaux des membres des équipes', NULL, NULL),
(2513, 16, '16.4', '2.22.1.5', 6684, 'Cartographie censitaire', 'Service médical', NULL, NULL),
(2514, 16, '16.4', '3.4.7.1', 6684, 'Recensement pilote', 'Boîte à pharmacie Équipes ', NULL, NULL),
(2515, 16, '16.4', '3.4.7.2', 6684, 'Recensement pilote', 'Remboursement de frais médicaux', NULL, NULL),
(2516, 16, '16.4', '4.4.6.1', 6684, 'Dénombrement', 'Remboursement de frais médicaux', NULL, NULL),
(2517, 16, '16.4', '4.4.6.3', 6684, 'Dénombrement', 'Service médical', NULL, NULL),
(2518, 16, '16.4', '5.4.5.1', 6684, 'Enquête post-censitaire de couverture (EPC)', 'Remboursement de frais médicaux', NULL, NULL),
(2519, 16, '16.5', 'Carburant', NULL, NULL, NULL, NULL, NULL),
(2520, 16, '16.5.1', 'Carburant DR', NULL, NULL, NULL, NULL, NULL),
(2521, 16, '16.5.1', '2.11.1.8', 6053, 'Cartographie censitaire', 'Carburant des DR INS', NULL, NULL),
(2522, 16, '16.5.1', '2.19.1.4', 6053, 'Cartographie censitaire', 'Carburant DR INS', NULL, NULL),
(2523, 16, '16.5.1', '3.4.4.3', 6053, 'Recensement pilote', 'Carburant DR INS', NULL, NULL),
(2524, 16, '16.5.1', '4.3.1.10', 6053, 'Dénombrement', 'Carburant des DR INS', NULL, NULL),
(2525, 16, '16.5.1', '5.3.3', 6053, 'Enquête post-censitaire de couverture (EPC)', 'Carburant de mission des DR INS', NULL, NULL),
(2526, 16, '16.5.1', '4.4.3.6', 6053, 'Dénombrement', 'Carburant DR INS', NULL, NULL),
(2527, 16, '16.5.1', '2.14.5', 6053, 'Cartographie censitaire', 'Carburant DR INS non résidents', NULL, NULL),
(2528, 16, '16.5.2', 'Carburant véhicule de liaison', NULL, NULL, NULL, NULL, NULL),
(2529, 16, '16.5.2', '2.11.1.9', 6053, 'Cartographie censitaire', 'Carburant Véhicule de liaison', NULL, NULL),
(2530, 16, '16.5.2', '2.13.1.8', 6053, 'Cartographie censitaire', 'Carburant Véhicule de liaison', NULL, NULL),
(2531, 16, '16.5.2', '3.1.1.4', 6053, 'Recensement pilote', 'Carburant Véhicule de liaison', NULL, NULL),
(2532, 16, '16.5.2', '3.1.2.15', 6053, 'Recensement pilote', 'Carburant Véhicule de liaison DR', NULL, NULL),
(2533, 16, '16.5.2', '4.3.1.11', 6053, 'Dénombrement', 'Carburant Véhicule de liaison', NULL, NULL),
(2534, 16, '16.5.2', '4.3.2.7', 6053, 'Dénombrement', 'Carburant Véhicule de liaison', NULL, NULL),
(2535, 16, '16.5.2', '4.3.3.7', 6053, 'Dénombrement', 'Carburant Véhicule de liaison', NULL, NULL),
(2536, 16, '16.5.2', '4.3.4.7', 6053, 'Dénombrement', 'Carburant Véhicule de liaison', NULL, NULL),
(2537, 16, '16.5.2', '4.6.10', 6053, 'Dénombrement', 'Carburant de retour du matériel', NULL, NULL),
(2538, 16, '16.5.2', '6.1.1.7', 6053, 'Exploitations et traitements informatiques', 'Carburant de liaison', NULL, NULL),
(2539, 16, '16.5.3', 'Carburant test de conduite d\'engins', NULL, NULL, NULL, NULL, NULL),
(2540, 16, '16.5.3', '2.13.1.9', 6053, 'Cartographie censitaire', 'Carburant de test de conduite de mobylette', NULL, NULL),
(2541, 16, '16.5.3', '2.13.1.10', 6053, 'Cartographie censitaire', 'Carburant de test de conduite de véhicule', NULL, NULL),
(2542, 16, '16.5.3', '2.18.1.3', 6053, 'Cartographie censitaire', 'Carburant moto des agents hors Abidjan', NULL, NULL),
(2543, 16, '16.5.3', '3.4.2.4', 6053, 'Recensement pilote', 'Carburant de moto/mobylettes', NULL, NULL),
(2544, 16, '16.5.3', '5.4.2.3', 6053, 'Enquête post-censitaire de couverture (EPC)', 'Carburant de motos/mobylettes', NULL, NULL),
(2545, 16, '16.5.3', '4.4.2.7', 6053, 'Dénombrement', 'Carburant de hors-bord', NULL, NULL),
(2546, 16, '16.5.3', '2.18.1.6', 6053, 'Cartographie censitaire', 'Carburant de hors-bord', NULL, NULL),
(2547, 16, '16.5.4', 'Carburant équipes', NULL, NULL, NULL, NULL, NULL),
(2548, 16, '16.5.4', '2.19.1.5', 6053, 'Cartographie censitaire', 'Carburant superviseurs régionaux', NULL, NULL),
(2549, 16, '16.5.4', '2.20.1.3', 6053, 'Cartographie censitaire', 'Carburant Coordination', NULL, NULL),
(2550, 16, '16.5.4', '3.1.2.6', 6053, 'Recensement pilote', 'Carburant mission', NULL, NULL),
(2551, 16, '16.5.4', '3.3.5', 6053, 'Recensement pilote', 'Carburant Mission de sensibilisation (installation/suivi/evaluation)', NULL, NULL),
(2552, 16, '16.5.4', '3.4.5.3', 6053, 'Recensement pilote', 'Carburant des encadreurs', NULL, NULL),
(2553, 16, '16.5.4', '4.4.3.7', 6053, 'Dénombrement', 'Carburant superviseur', NULL, NULL),
(2554, 16, '16.5.4', '4.4.4.3', 6053, 'Dénombrement', 'Carburant Coordination', NULL, NULL),
(2555, 16, '16.5.4', '4.4.2.3', 6053, 'Dénombrement', 'Carburant véhicules des Superviseurs', NULL, NULL),
(2556, 16, '16.5.4', '4.5.1.8', 6053, 'Dénombrement', 'Carburant mission des formateurs', NULL, NULL),
(2557, 16, '16.5.4', '5.4.3.3', 6053, 'Enquête post-censitaire de couverture (EPC)', 'Carburant Mission de supervision des formateurs', NULL, NULL),
(2558, 16, '16.5.4', '5.4.3.6', 6053, 'Enquête post-censitaire de couverture (EPC)', 'Carburant Mission de supervision des superviseurs régionaux', NULL, NULL),
(2559, 16, '16.5.4', '4.6.9', 6053, 'Dénombrement', 'Carburant de déploiement', NULL, NULL),
(2560, 16, '16.5.5', 'Carburant autorités administratives', NULL, NULL, NULL, NULL, NULL),
(2561, 16, '16.5.5', '2.14.3', 6053, 'Cartographie censitaire', 'Carburant de mission d\'information des autorités administratives', NULL, NULL),
(2562, 16, '16.5.5', '2.14.4', 6053, 'Cartographie censitaire', 'Carburant autorités administratives non résidents', NULL, NULL),
(2563, 16, '16.5.5', '10.3.1', 6053, 'Fonctionnement', 'Direction nationale', NULL, NULL),
(2564, 16, '16.5.6', 'Carburant BTPR', NULL, NULL, NULL, NULL, NULL),
(2565, 16, '16.5.6', '10.3.2', 6053, 'Fonctionnement', 'Coordonnation Technique', NULL, NULL),
(2566, 16, '16.5.6', '10.3.3', 6053, 'Fonctionnement', 'Unités', NULL, NULL),
(2567, 16, '16.5.6', '10.3.4', 6053, 'Fonctionnement', 'Coordinations Régionales', NULL, NULL),
(2568, 16, '16.6', 'Achat de moyens de déplacement', NULL, NULL, NULL, NULL, NULL),
(2569, 16, '16.6.1', 'Achat de véhicules', NULL, NULL, NULL, NULL, NULL),
(2570, 16, '16.6.1', '10.1.1', 2451, 'Fonctionnement', 'Achat de véhicules fourgonnettes pour les routages', NULL, NULL),
(2571, 16, '16.6.2', 'Achat de mobylettes', NULL, NULL, NULL, NULL, NULL),
(2572, 16, '16.6.2', '2.7.1', 2458, 'Cartographie censitaire', 'Mobylette + 2 casques', NULL, NULL),
(2573, 16, '16.7', 'Autres charges de fonctionnement', NULL, NULL, NULL, NULL, NULL),
(2574, 16, '16.7', '1.2.1', NULL, 'Activités préparatoires', 'Sécurité des locaux et Charges de fonctionnement (vigiles, factures d\'eau et d\'électricité, …)', NULL, NULL),
(2575, 16, '16.7', '2.7.2', 6252, 'Cartographie censitaire', 'Assurance tout risque mobylette', NULL, NULL),
(2576, 16, '16.7', '2.7.3', 6242, 'Cartographie censitaire', 'Entretiens motos', NULL, NULL),
(2577, 16, '16.7', '2.9.2', 6058, 'Cartographie censitaire', 'Bottes (la paire)', NULL, NULL),
(2578, 16, '16.7', '2.9.3', 6058, 'Cartographie censitaire', 'Imperméables', NULL, NULL),
(2579, 16, '16.7', '4.7.9', 6327, 'Dénombrement', 'Dispositif de sécurité siège', NULL, NULL),
(2580, 16, '16.7', '5.4.2.2', 6242, 'Enquête post-censitaire de couverture (EPC)', 'Entretien de mobylettes/motos', NULL, NULL),
(2581, 16, '16.7', '6.1.2.5', 6317, 'Exploitations et traitements informatiques', 'Frais de transfert mobile money', NULL, NULL),
(2582, 16, '16.7', '10.1.4', 6252, 'Fonctionnement', 'Assurance tout risque des véhicules', NULL, NULL),
(2583, 16, '16.7', '10.1.5', 6242, 'Fonctionnement', 'Révision annuelle des véhicules', NULL, NULL),
(2584, 16, '16.7', '10.3.1', 6381, 'Fonctionnement', 'Frais d\'appel à candidature', NULL, NULL),
(2585, 16, '16.7', '10.3.2', 6618, 'Fonctionnement', 'Frais de traitement des dossiers et sélection', NULL, NULL),
(2586, 16, '16.7', '3.4.3.2', 6317, 'Recensement pilote', 'Frais de transfert mobile money', NULL, NULL),
(2587, 16, '16.7', '2.17.1.2', 6317, 'Cartographie censitaire', 'Frais de transfert mobile money', NULL, NULL),
(2588, 16, '16.7', '4.4.8.2', 6317, 'Dénombrement', 'Frais de transfert mobile money', NULL, NULL),
(2589, 16, '16.7', '4.5.2.3', 6317, 'Dénombrement', 'Frais de transfert mobile money', NULL, NULL),
(2590, 16, '16.7', '4.6.4', 6327, 'Dénombrement', 'Sécurité des magasins', NULL, NULL),
(2591, 16, '16.7', '4.6.6', 6612, 'Dénombrement', 'Archivistes', NULL, NULL),
(2592, 16, '16.7', '4.6.7', 6612, 'Dénombrement', 'Agent d\'archives', NULL, NULL),
(2593, 16, '16.7.2', '4.4.6.2', 6258, 'Dénombrement', 'Assurance Individuel Accident (Blessures, invalidité permanente, décès)', NULL, NULL),
(2594, 16, '16.7.2', '2.22.1.4', 6258, 'Cartographie censitaire', 'Assurance Individuel Accident (Blessures, invalidité permanente, décès)', NULL, NULL),
(2595, 16, '16.7.2', '3.4.7.3', 6258, 'Recensement pilote', 'Assurance Individuel Accident (Blessures, invalidité permanente, décès)', NULL, NULL),
(2596, 16, '16.7.2', '5.4.5.2', 6258, 'Enquête post-censitaire de couverture (EPC)', 'Assurance Individuel Accident (Blessures, invalidité permanente, décès)', NULL, NULL),
(2597, 17, '17', 'DIV', NULL, 'Divers et imprévus', 'Divers et imprévus', NULL, NULL),
(2598, 7, '7', '4.3.3.5', 6383, 'Dénombrement', 'eau minerale en salle', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `caisses`
--

CREATE TABLE `caisses` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('enregistrement','depense') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enregistrement',
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imputation_id` int DEFAULT NULL,
  `direction_id` int NOT NULL,
  `observation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `num_facture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiers` int DEFAULT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ligne_budget` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paiement` enum('cheque','v_mtn','espece') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_paiement` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `recu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` date DEFAULT NULL,
  `credit` int DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caisses`
--

INSERT INTO `caisses` (`id`, `type`, `code`, `imputation_id`, `direction_id`, `observation`, `num_facture`, `tiers`, `libelle`, `ligne_budget`, `paiement`, `ref_paiement`, `debit`, `parent_id`, `recu`, `date_en`, `credit`, `user_id`, `created_at`, `updated_at`) VALUES
(243, 'depense', '1509802885', 62230000, 3, NULL, 'SP 007', 171, 'LOCATIONS DE VIDEOS PROJECTEURS', 'DIV', 'espece', 'SP 007', 90000, NULL, 'fichiers/facture12-01-2022-11-51-40.pdf', '2021-09-29', NULL, 15, '2022-01-12 10:51:40', '2022-01-12 17:19:38'),
(244, 'depense', '215521263', 65810000, 6, NULL, 'PORO 004', NULL, 'Indemnités de fonction et autres ré', 'DIV', 'espece', 'PORO 004', 50000, NULL, 'fichiers/facture12-01-2022-11-53-53.pdf', '2021-09-20', NULL, 22, '2022-01-12 10:53:53', '2022-01-12 10:53:53'),
(245, 'depense', '764622873', 62230000, 3, NULL, '00492918', 147, 'LOCATIONS DE TRETEAUX', 'DIV', 'espece', 'SP 008', 450000, NULL, 'fichiers/facture12-01-2022-11-57-49.pdf', '2021-09-30', NULL, 15, '2022-01-12 10:57:49', '2022-01-12 17:19:02'),
(246, 'depense', '946530024', 60510000, 6, NULL, 'PORO 005', 169, 'Fournitures non stockables -Eau', '4.3.3.5', 'espece', 'PORO 005', 11475, NULL, 'fichiers/facture12-01-2022-12-36-09.pdf', '2021-09-22', NULL, 22, '2022-01-12 11:19:47', '2022-01-12 11:36:09'),
(247, 'depense', '531039265', 60560000, 6, NULL, 'PORO 006', 170, 'Achats de petit matériel et outilla', 'DIV', 'espece', 'PORO 006', 33000, NULL, 'fichiers/facture12-01-2022-12-30-06.pdf', '2021-09-24', NULL, 22, '2022-01-12 11:25:12', '2022-01-12 11:30:06'),
(248, 'depense', '664946469', 60470000, 6, NULL, '0775712', 179, 'Fournitures de bureau', 'DIV', 'espece', 'PORO 007', 3500, NULL, 'fichiers/facture12-01-2022-04-51-38.pdf', '2021-09-25', NULL, 22, '2022-01-12 11:43:18', '2022-01-12 15:51:38'),
(249, 'depense', '1570095920', 60530000, 6, NULL, '00801', 5, 'CARBURANT BTPR ET DIVERS', '4.3.1.10', 'espece', 'PORO 008', 20000, NULL, 'fichiers/facture12-01-2022-01-09-51.pdf', '2021-09-25', NULL, 22, '2022-01-12 12:06:57', '2022-01-12 12:09:51'),
(250, 'depense', '1293004193', 60510000, 6, NULL, 'PORO 009', 132, 'Fournitures non stockables -Eau', '4.3.3.5', 'espece', 'PORO 009', 6885, NULL, 'fichiers/facture12-01-2022-01-17-46.pdf', '2021-09-28', NULL, 22, '2022-01-12 12:16:34', '2022-01-12 12:17:46'),
(251, 'depense', '1438250710', 60530000, 6, NULL, '00707', 5, 'CARBURANT BTPR ET DIVERS', '4.3.1.10', 'espece', 'PORO 010', 10000, NULL, 'fichiers/facture12-01-2022-01-24-46.pdf', '2021-09-28', NULL, 22, '2022-01-12 12:24:46', '2022-01-12 12:24:46'),
(252, 'depense', '1386748875', 62420000, 6, NULL, 'PORO 011', 182, 'Entretien et réparations des biens', 'DIV', 'espece', 'PORO 011', 40000, NULL, 'fichiers/facture12-01-2022-01-33-42.pdf', '2021-09-30', NULL, 22, '2022-01-12 12:32:27', '2022-01-12 12:33:42'),
(253, 'depense', '563256536', 60530000, 6, NULL, '00425', 5, 'CARBURANT BTPR ET DIVERS', '4.3.1.10', 'espece', 'PORO 012', 10000, NULL, 'fichiers/facture12-01-2022-01-38-56.pdf', '2021-09-30', NULL, 22, '2022-01-12 12:38:56', '2022-01-12 12:38:56'),
(254, 'depense', '341647458', 63170000, 6, NULL, '001', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 001', 3900, NULL, NULL, '2021-10-05', NULL, 46, '2022-01-12 14:01:15', '2022-01-12 14:01:15'),
(255, 'depense', '2010771198', 66180000, 6, NULL, '002', 171, 'PERDIEM DR/AUTRE', 'DIV', 'espece', 'GBOKLE 002', 390000, NULL, 'fichiers/facture12-01-2022-03-12-11.pdf', '2021-10-07', NULL, 46, '2022-01-12 14:12:11', '2022-01-13 08:10:06'),
(256, 'depense', '1203589545', 63170000, 6, NULL, '003', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 003', 1500, NULL, NULL, '2021-10-08', NULL, 46, '2022-01-12 14:13:42', '2022-01-12 14:13:42'),
(257, 'depense', '1832452862', 63170000, 6, NULL, '004', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 004', 5000, NULL, NULL, '2021-10-13', NULL, 46, '2022-01-12 14:15:00', '2022-01-12 14:15:00'),
(258, 'depense', '1960261515', 63170000, 6, NULL, '005', 3, 'FAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 005', 5000, NULL, NULL, '2021-10-14', NULL, 46, '2022-01-12 14:16:09', '2022-01-12 14:16:09'),
(259, 'depense', '597006907', 60470000, 6, NULL, '006', 183, 'ACHAT DE SCOTH', 'DIV', 'espece', 'GBOKLE 006', 3000, NULL, 'fichiers/facture12-01-2022-03-23-25.pdf', '2021-10-14', NULL, 46, '2022-01-12 14:23:25', '2022-01-12 14:23:25'),
(260, 'depense', '784153692', 60560000, 6, NULL, '007', 96, 'ACHAT DE RIDEAU', 'DIV', 'espece', 'GBOKLE 007', 10000, NULL, NULL, '2021-10-14', NULL, 46, '2022-01-12 14:25:26', '2022-01-12 14:25:26'),
(261, 'depense', '858371395', 23580000, 6, NULL, '008', 96, 'INSTALLATION RIDEAU', 'DIV', 'espece', 'GBOKLE 008', 10000, NULL, NULL, '2021-10-14', NULL, 46, '2022-01-12 14:27:10', '2022-01-12 14:27:33'),
(262, 'depense', '1964903813', 24420000, 6, NULL, '009', 96, 'TRANSPORT DU MATERIEL INFORMATIQUE', 'DIV', 'espece', 'GBOKLE 009', 151500, NULL, 'fichiers/facture12-01-2022-03-29-34.pdf', '2021-10-14', NULL, 46, '2022-01-12 14:29:34', '2022-01-12 14:29:34'),
(263, 'depense', '554885945', 62280000, 6, NULL, '010', 1, 'AVANCE LOCATION CHAISES SASSANDRA', '4.3.5.8', 'espece', 'GBOKLE 010', 100000, NULL, 'fichiers/facture12-01-2022-03-36-44.pdf', '2021-10-16', NULL, 46, '2022-01-12 14:36:44', '2022-01-12 14:36:44'),
(264, 'depense', '1068781264', 62280000, 6, NULL, '011', 96, 'AVANCE LOCATION SONO', 'DIV', 'espece', 'GBOKLE 011', 100000, NULL, 'fichiers/facture12-01-2022-03-38-31.pdf', '2021-10-16', NULL, 46, '2022-01-12 14:38:31', '2022-01-12 14:38:31'),
(265, 'depense', '2066826195', 66840000, 6, NULL, '0012', 185, 'ACHAT CACHE-NEZ', 'DIV', 'espece', 'GBOKLE 012', 5200, NULL, 'fichiers/facture12-01-2022-03-47-21.pdf', '2021-10-17', NULL, 46, '2022-01-12 14:47:21', '2022-01-12 14:47:21'),
(266, 'depense', '1782404058', 60430000, 6, NULL, '013', 185, 'ACHAT DE DESORISANT', 'DIV', 'espece', 'GBOKLE 013', 1000, NULL, 'fichiers/facture12-01-2022-03-49-22.pdf', '2021-10-17', NULL, 46, '2022-01-12 14:49:22', '2022-01-12 14:49:22'),
(267, 'depense', '252270106', 60430000, 6, NULL, '014', 185, 'ACHAT GEL', 'DIV', 'espece', 'GBOKLE 014', 1050, NULL, 'fichiers/facture12-01-2022-03-51-08.pdf', '2021-10-17', NULL, 46, '2022-01-12 14:51:08', '2022-01-12 14:51:08'),
(268, 'depense', '939261058', 60560000, 6, NULL, '0001307-1292', 186, 'ACHAT RALLONGE', 'DIV', 'espece', 'GBOKLE 015', 86000, NULL, NULL, '2021-10-17', NULL, 46, '2022-01-12 14:58:54', '2022-01-12 14:58:54'),
(270, 'depense', '664170708', 62280000, 6, NULL, '016', 96, 'AVANCE LOCATION CHAISES DAKPADOU', '4.3.5.8', 'espece', 'GBOKLE 016', 50000, NULL, 'fichiers/facture12-01-2022-04-22-22.pdf', '2021-10-18', NULL, 46, '2022-01-12 15:22:22', '2022-01-12 15:22:22'),
(271, 'depense', '1863181576', 62280000, 6, NULL, '017', 96, 'AVANCE LOCATION CHAISES FRESCO', '4.3.5.8', 'espece', 'GBOKLE 017', 100000, NULL, 'fichiers/facture12-01-2022-04-24-15.pdf', '2021-10-18', NULL, 46, '2022-01-12 15:24:15', '2022-01-12 15:24:15'),
(272, 'depense', '1412363982', 62810000, 6, NULL, '018', 171, 'FRAIS DE COMMUNICATION', 'DIV', 'espece', 'GBOKLE 018', 40000, NULL, 'fichiers/facture12-01-2022-04-25-55.pdf', '2021-10-19', NULL, 46, '2022-01-12 15:25:55', '2022-01-12 15:25:55'),
(273, 'depense', '1695549724', 62220000, 6, NULL, '019', 96, 'AVANCE LOCATION SALLE SAGO', '4.3.2.4', 'espece', 'GBOKLE 019', 50000, NULL, 'fichiers/facture12-01-2022-04-28-28.pdf', '2021-10-21', NULL, 46, '2022-01-12 15:28:28', '2022-01-12 15:28:28'),
(274, 'depense', '242003521', 62280000, 6, NULL, '020', 96, 'LOCATION GROUPE ELECTROGENE', 'DIV', 'espece', 'GBOKLE 020', 35000, NULL, 'fichiers/facture12-01-2022-04-30-23.pdf', '2021-10-23', NULL, 46, '2022-01-12 15:30:23', '2022-01-12 15:30:23'),
(275, 'depense', '1819581470', 65880000, 6, NULL, '0000663-0000664', 187, 'FRAIS D\'HEBERGEMENT', 'DIV', 'espece', 'GBOKLE 021', 24000, NULL, 'fichiers/facture12-01-2022-04-35-10.pdf', '2021-10-27', NULL, 46, '2022-01-12 15:35:10', '2022-01-12 15:35:10'),
(276, 'depense', '1259058252', 62280000, 6, NULL, '022', 96, 'RELICAT LOCATION DE CHAISES FRESCO', '4.3.2.4', 'espece', 'GBOKLE 022', 41000, NULL, 'fichiers/facture12-01-2022-04-38-09.pdf', '2021-10-28', NULL, 46, '2022-01-12 15:38:09', '2022-01-12 15:39:40'),
(277, 'depense', '112700135', 62220000, 6, NULL, '023', 96, 'RELICAT LOCATION DE SALLE SAGO', '4.3.2.4', 'espece', 'GBOKLE 023', 100000, NULL, 'fichiers/facture12-01-2022-04-41-10.pdf', '2021-10-29', NULL, 46, '2022-01-12 15:41:10', '2022-01-12 15:41:10'),
(278, 'depense', '601935217', 60470000, 6, NULL, '024', 183, 'ACHAT PAQUET DE RAME', 'DIV', 'espece', 'GBOKLE 024', 12500, NULL, 'fichiers/facture12-01-2022-04-43-52.pdf', '2021-10-30', NULL, 46, '2022-01-12 15:43:52', '2022-01-12 15:43:52'),
(279, 'depense', '847566329', 62280000, 6, NULL, '025', 96, 'RELICAT LOCATION DE CHAISES DAKPADOU', '4.3.5.8', 'espece', 'GBOKLE 025', 90000, NULL, 'fichiers/facture12-01-2022-04-45-31.pdf', '2021-10-31', NULL, 46, '2022-01-12 15:45:31', '2022-01-12 15:45:31'),
(280, 'depense', '2119133448', 63170000, 6, NULL, '026', 3, 'FAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 026', 5000, NULL, NULL, '2021-11-02', NULL, 46, '2022-01-12 15:51:51', '2022-01-12 15:51:51'),
(281, 'depense', '236288895', 24420000, 6, NULL, '027', 96, 'RETOUR MATERIEL INFORMATIQUE', 'DIV', 'espece', 'GBOKLE 027', 125000, NULL, 'fichiers/facture12-01-2022-04-54-47.pdf', '2021-11-02', NULL, 46, '2022-01-12 15:54:47', '2022-01-12 15:54:47'),
(282, 'depense', '1339762266', 62410000, 6, NULL, '00234661', 188, 'Entretien et réparations des biens', 'DIV', 'espece', 'PORO 013', 156000, NULL, 'fichiers/facture12-01-2022-04-58-13.pdf', '2021-10-01', NULL, 22, '2022-01-12 15:58:13', '2022-01-12 15:58:13'),
(283, 'depense', '1384302112', 62280000, 6, NULL, '028', 1, 'RELICAT CHAISES ET SONO', 'DIV', 'espece', 'GBOKLE 028', 427200, NULL, 'fichiers/facture12-01-2022-05-09-20.pdf', '2021-11-02', NULL, 46, '2022-01-12 16:00:51', '2022-01-12 16:11:06'),
(284, 'depense', '1686083466', 60530000, 6, NULL, '029', 133, 'CARBURANT GROUPE ELECTROGENE', 'DIV', 'espece', 'GBOKLE 029', 30000, NULL, 'fichiers/facture12-01-2022-05-02-49.pdf', '2021-11-03', NULL, 46, '2022-01-12 16:02:49', '2022-01-12 16:02:49'),
(285, 'depense', '1275415276', 62880000, 6, NULL, '030', 3, 'CONNEXION TIC FRESCO', 'DIV', 'espece', 'GBOKLE 030', 10200, NULL, 'fichiers/facture12-01-2022-05-05-24.pdf', '2021-11-03', NULL, 46, '2022-01-12 16:05:24', '2022-01-12 16:05:24'),
(286, 'depense', '1083600992', 62880000, 6, NULL, '003050', 3, 'CONNEXION FLYBOX', 'DIV', 'espece', 'GBOKLE 031', 30000, NULL, 'fichiers/facture12-01-2022-05-08-55.pdf', '2021-11-04', NULL, 46, '2022-01-12 16:08:55', '2022-01-12 16:08:55'),
(287, 'depense', '1169223548', 60560000, 6, NULL, '032', 96, 'ACHAT DE SERRURE', '4.6.2', 'espece', 'GBOKLE 032', 6200, NULL, 'fichiers/facture12-01-2022-05-15-51.pdf', '2021-11-04', NULL, 46, '2022-01-12 16:15:51', '2022-01-12 16:20:02'),
(288, 'depense', '1211541625', 60470000, 6, NULL, '033', 96, 'IMPRESSION DOCUMENT FRESCO', 'DIV', 'espece', 'GBOKLE 033', 5100, NULL, 'fichiers/facture12-01-2022-05-19-27.pdf', '2021-11-07', NULL, 46, '2022-01-12 16:19:27', '2022-01-12 16:19:27'),
(289, 'depense', '71344870', 63170000, 6, NULL, 'PORO 014', 82, 'FRAIS D\'ENVOIS MOBILE MTN', 'DIV', 'espece', 'PORO 014', 7600, NULL, NULL, '2021-10-06', NULL, 22, '2022-01-12 16:22:01', '2022-01-12 19:58:37'),
(290, 'depense', '17886011', 60470000, 6, NULL, '034', 190, 'FOURNITURE DE BUREAU', '', 'espece', 'GBOKLE 034', 15500, NULL, 'fichiers/facture12-01-2022-05-28-40.pdf', '2021-11-08', NULL, 46, '2022-01-12 16:28:40', '2022-01-12 16:28:40'),
(291, 'depense', '307733872', 63170000, 6, NULL, '035', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 035', 5000, NULL, NULL, '2021-11-09', NULL, 46, '2022-01-12 16:29:58', '2022-01-12 16:29:58'),
(292, 'depense', '1722662039', 60530300, 6, NULL, '036', 133, 'CARBURANT SUPERVISEURS', '4.4.2.3', 'espece', 'GBOKLE 036', 210000, NULL, 'fichiers/facture12-01-2022-05-34-01.pdf', '2021-11-09', NULL, 46, '2022-01-12 16:34:01', '2022-01-12 16:34:01'),
(293, 'depense', '356731125', 60530300, 6, NULL, '037', 133, 'CARBURANT SUPERVISEURS', '4.4.3.7', 'espece', 'GBOKLE 037', 350000, NULL, 'fichiers/facture12-01-2022-05-37-13.pdf', '2021-11-11', NULL, 46, '2022-01-12 16:37:13', '2022-01-12 16:37:13'),
(294, 'depense', '201415334', 63170000, 6, NULL, '038', 3, 'FAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 038', 2500, NULL, NULL, '2021-11-11', NULL, 46, '2022-01-12 16:38:40', '2022-01-12 16:38:40'),
(295, 'depense', '1269859172', 24580000, 6, NULL, '039', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 039', 12000, NULL, 'fichiers/facture12-01-2022-06-04-02.pdf', '2021-11-11', NULL, 46, '2022-01-12 17:04:03', '2022-01-12 17:04:03'),
(296, 'depense', '1680290084', 24580000, 6, NULL, '040', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 040', 5000, NULL, 'fichiers/facture12-01-2022-06-05-43.pdf', '2021-11-11', NULL, 46, '2022-01-12 17:05:43', '2022-01-12 17:05:43'),
(297, 'depense', '1002564252', 60470000, 6, NULL, '021 NZM/FRES', 192, 'IMPRESSION DOCUMENT FRESCO', 'DIV', 'espece', 'GBOKLE 041', 15000, NULL, 'fichiers/facture12-01-2022-06-10-02.pdf', '2021-11-11', NULL, 46, '2022-01-12 17:10:02', '2022-01-12 17:10:02'),
(298, 'depense', '921439779', 24580000, 6, NULL, '042', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 042', 25000, NULL, 'fichiers/facture12-01-2022-06-11-26.pdf', '2021-11-11', NULL, 46, '2022-01-12 17:11:26', '2022-01-12 17:11:26'),
(299, 'depense', '109209604', 62880000, 6, NULL, '043', 3, 'CONNEXION TIC SAGO', 'DIV', 'espece', 'GBOKLE 043', 10100, NULL, 'fichiers/facture12-01-2022-06-16-07.pdf', '2021-11-13', NULL, 46, '2022-01-12 17:16:07', '2022-01-12 17:16:07'),
(300, 'depense', '348559821', 60550000, 3, NULL, '43408824', 148, 'ACHAT D\'AGRAFEUSES ET AGRAFES', 'DIV', 'espece', 'SP 09', 8100, NULL, 'fichiers/facture12-01-2022-06-18-41.pdf', '2021-10-04', NULL, 15, '2022-01-12 17:18:41', '2022-01-12 17:18:41'),
(302, 'depense', '179002283', 24420000, 6, NULL, '00503', 172, 'ACHAT D\'ENCRE', 'DIV', 'espece', 'GBOKLE 044', 246300, NULL, 'fichiers/facture12-01-2022-06-22-13.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:22:13', '2022-01-12 17:22:13'),
(303, 'depense', '1399347549', 24580000, 6, NULL, '045', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 045', 15000, NULL, 'fichiers/facture12-01-2022-06-23-48.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:23:48', '2022-01-12 17:23:48'),
(305, 'depense', '1243958991', 24580000, 6, NULL, '046', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 046', 25000, NULL, 'fichiers/facture12-01-2022-06-25-26.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:25:26', '2022-01-12 17:25:26'),
(306, 'depense', '333673438', 24580000, 6, NULL, '047', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 047', 20000, NULL, 'fichiers/facture12-01-2022-06-27-53.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:27:53', '2022-01-12 17:27:53'),
(308, 'depense', '1931162680', 24580000, 6, NULL, '048', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 048', 20000, NULL, 'fichiers/facture12-01-2022-06-29-24.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:29:24', '2022-01-12 17:29:24'),
(310, 'depense', '1144016552', 62880000, 6, NULL, '049', 3, 'CONNEXION TIC MEDON', 'DIV', 'espece', 'GBOKLE 049', 10000, NULL, 'fichiers/facture12-01-2022-06-31-15.pdf', '2021-11-14', NULL, 46, '2022-01-12 17:31:15', '2022-01-12 17:31:15'),
(311, 'depense', '497239628', 63170000, 3, NULL, 'SP 010', 3, 'FRAIS DE RETRAIT MOMO', 'DIV', 'espece', 'SP 010', 4500, NULL, NULL, '2021-10-06', NULL, 15, '2022-01-12 17:36:53', '2022-01-12 17:38:22'),
(312, 'depense', '302712861', 63170000, 3, NULL, 'SP 011', 3, 'FRAIS DE RETRAIT MOMO', 'DIV', 'espece', 'SP 011', 9600, NULL, NULL, '2021-10-06', NULL, 15, '2022-01-12 17:38:11', '2022-01-12 17:38:11'),
(314, 'depense', '1741912181', 66180000, 3, NULL, 'SP 012', 171, 'EMOLUMENT DELIBERATION SAN PEDRO', 'DIV', 'espece', 'SP 012', 210000, NULL, 'fichiers/facture12-01-2022-06-39-31.pdf', '2021-10-06', NULL, 15, '2022-01-12 17:39:31', '2022-01-12 17:39:31'),
(315, 'depense', '1656541357', 60530000, 3, NULL, 'SP 013', 133, 'CARBURANT VOITURE DR SAN PEDRO', 'DIV', 'espece', 'SP 013', 40000, NULL, 'fichiers/facture12-01-2022-06-41-16.pdf', '2021-10-06', NULL, 15, '2022-01-12 17:41:16', '2022-01-12 17:41:16'),
(316, 'depense', '1177375028', 65880000, 3, NULL, 'SP 014', 171, 'DEPOT A LASSISTANT DE LA NAWA', 'DIV', 'espece', 'SP 014', 5000, NULL, NULL, '2021-10-06', NULL, 15, '2022-01-12 17:46:17', '2022-01-12 17:46:17'),
(317, 'depense', '532180829', 63170000, 3, NULL, 'SP 015', 171, 'FRAIS D\'ENVOIS MOMO', 'DIV', 'espece', 'SP 015', 250, NULL, NULL, '2021-10-06', NULL, 15, '2022-01-12 17:47:24', '2022-01-12 17:47:24'),
(318, 'depense', '259705956', 66180000, 3, NULL, 'SP 016', 171, 'EMOLUMENT DELIBERATION TABOU', 'DIV', 'espece', 'SP 016', 240000, NULL, 'fichiers/facture12-01-2022-06-49-22.pdf', '2021-10-07', NULL, 15, '2022-01-12 17:48:50', '2022-01-12 17:49:22'),
(319, 'depense', '1361165249', 62810000, 3, NULL, 'SP 017', 173, 'ACHAT DE RECHARGE DE COMMUNICATION DR SAN PEDRO', 'DIV', 'espece', 'SP 017', 10000, NULL, 'fichiers/facture12-01-2022-06-52-49.pdf', '2022-10-07', NULL, 15, '2022-01-12 17:52:49', '2022-01-12 17:52:49'),
(320, 'depense', '1644161748', 60550000, 3, NULL, '43557824', 148, 'ACHAT CHEMISES CARTONNES ET FLACONS DE COLLE', 'DIV', 'espece', 'SP 018', 13860, NULL, 'fichiers/facture12-01-2022-06-55-54.pdf', '2021-10-08', NULL, 15, '2022-01-12 17:55:54', '2022-01-12 17:55:54'),
(321, 'depense', '1277009336', 60530000, 3, NULL, 'SP 019', 133, 'CARBURANT VOITURE DR SAN PEDRO', 'DIV', 'espece', 'SP 019', 28000, NULL, 'fichiers/facture12-01-2022-06-58-52.pdf', '2021-10-09', NULL, 15, '2022-01-12 17:58:52', '2022-01-12 17:58:52'),
(322, 'depense', '1477440442', 62230000, 8, 'facture N°0045 KG LOCATION ,Location de 100 chaises pour la formation des auditeurs a Dimbokro pendant 14 jours', '0045', NULL, 'KG LOCATION DIM/0045/Location de 100 chaises à Dimbokro(avance)', '4.3.5.8', 'espece', 'N\'ZI 009', 70000, NULL, 'fichiers/facture12-01-2022-07-17-45.pdf', '2021-10-14', NULL, 37, '2022-01-12 18:17:45', '2022-01-12 18:18:36'),
(326, 'depense', '863743170', 60550000, 3, NULL, '000218', 174, 'ACHAT DE SCOTCH', 'DIV', 'espece', 'SP 020', 1000, NULL, 'fichiers/facture12-01-2022-09-58-38.pdf', '2021-10-10', NULL, 15, '2022-01-12 20:58:38', '2022-01-12 20:58:38'),
(327, 'depense', '94763754', 63170000, 8, NULL, 'Abidjan3-002', 82, 'abidjan3-002/frais de retrait approvisionnement', '4.5.2.3', 'espece', 'Abidjan3-002', NULL, NULL, 'fichiers/facture12-01-2022-10-00-42.pdf', '2021-10-05', 2700, 34, '2022-01-12 21:00:42', '2022-01-12 21:00:42'),
(328, 'depense', '1100301775', 62810000, 3, NULL, 'SP 021', 3, 'DEPOT DE COMMUNICATION', 'DIV', 'espece', 'SP 021', 10000, NULL, 'fichiers/facture12-01-2022-10-00-42.pdf', '2021-10-11', NULL, 15, '2022-01-12 21:00:42', '2022-01-12 21:00:42'),
(329, 'depense', '430104735', 65880000, 3, NULL, 'SP 022', 82, 'DEPOT A LASSISTANT DE LA NAWA', 'DIV', 'espece', 'SP 022', 158000, NULL, 'fichiers/facture12-01-2022-10-02-49.pdf', '2021-10-11', NULL, 15, '2022-01-12 21:02:49', '2022-01-12 21:03:22'),
(330, 'depense', '138389225', 60550000, 3, NULL, '0000081', 175, 'ACHAT DE CARTONS DE RAME ET CARTOUCHE D\'ENCRE', '', 'espece', 'SP 023', 92500, NULL, 'fichiers/facture12-01-2022-10-08-17.pdf', '2021-10-12', NULL, 15, '2022-01-12 21:08:17', '2022-01-12 21:08:17'),
(331, 'depense', '437883265', 63170000, 3, NULL, 'SP 024', 3, 'FRAIS DE RETRAIT MOMO', 'DIV', 'espece', 'SP 024', 5000, NULL, NULL, '2021-10-13', NULL, 15, '2022-01-12 21:10:02', '2022-01-12 21:10:02'),
(332, 'depense', '1093168973', 60550000, 3, NULL, 'SP 025', 174, 'ACHAT DE ROULEAUX DE SCOTCH', 'DIV', 'espece', 'SP 025', 1500, NULL, 'fichiers/facture12-01-2022-10-12-33.pdf', '2021-10-14', NULL, 15, '2022-01-12 21:12:33', '2022-01-12 21:12:33'),
(333, 'depense', '1306952553', 62420000, 3, NULL, 'SP 026', 174, 'INSTALLATION CANON DE SERRURE', 'DIV', 'espece', 'SP 026', 7000, NULL, 'fichiers/facture12-01-2022-10-14-24.pdf', '2021-10-14', NULL, 15, '2022-01-12 21:14:24', '2022-01-12 21:14:24'),
(334, 'depense', '568337235', 61810000, 3, NULL, 'SP 027', 176, 'TRANSPORT MATERIEL', 'DIV', 'espece', 'SP 027', 200590, NULL, 'fichiers/facture12-01-2022-10-30-01.pdf', '2021-10-14', NULL, 15, '2022-01-12 21:30:01', '2022-01-12 21:30:01'),
(335, 'depense', '1736733432', 63170000, 3, NULL, 'SP 028', 3, 'FRAIS DE RETRAIT MOMO', 'DIV', 'espece', 'SP 028', 5000, NULL, NULL, '2021-10-14', NULL, 15, '2022-01-12 21:30:59', '2022-01-12 21:30:59'),
(336, 'depense', '767238605', 60530000, 3, NULL, 'SP 029', 133, 'CARBURANT VOITURE DR SAN PEDRO', 'DIV', 'espece', 'SP 029', 20000, NULL, 'fichiers/facture12-01-2022-10-33-05.pdf', '2021-10-17', NULL, 15, '2022-01-12 21:33:05', '2022-01-12 21:33:05'),
(337, 'depense', '92153777', 60570000, 3, NULL, 'SP 030', 171, 'FRAIS D\'IMPRESSIONS', 'DIV', 'espece', 'SP 030', 12000, NULL, 'fichiers/facture12-01-2022-10-36-45.pdf', '2021-10-18', NULL, 15, '2022-01-12 21:36:45', '2022-01-12 22:45:04'),
(338, 'depense', '21522708', 62810000, 3, NULL, 'SP 031', 171, 'FRAIS DE COMMUNICATION', 'DIV', 'espece', 'SP 031', 5000, NULL, 'fichiers/facture12-01-2022-10-38-25.pdf', '2021-10-18', NULL, 15, '2022-01-12 21:38:25', '2022-01-12 21:38:25'),
(339, 'depense', '1002068657', 60510000, 3, NULL, 'SP 032', 171, 'DOTATIONS EN EAU AIDE FORMATEURS', 'DIV', 'espece', 'SP 032', 9000, NULL, 'fichiers/facture12-01-2022-10-41-43.pdf', '2021-10-18', NULL, 15, '2022-01-12 21:41:43', '2022-01-12 21:41:43'),
(340, 'depense', '1861877495', 60550000, 3, NULL, '43730324', 148, 'ACHAT DE MARKERS', 'DIV', 'espece', 'SP 033', 4500, NULL, 'fichiers/facture12-01-2022-10-43-26.pdf', '2021-10-18', NULL, 15, '2022-01-12 21:43:26', '2022-01-12 21:43:26'),
(344, 'depense', '451859386', 60570000, 3, NULL, 'SP 034', 171, 'FRAIS D\'IMPRESSIONS ET AUTRES', 'DIV', 'espece', 'SP 034', 97000, NULL, 'fichiers/facture12-01-2022-10-47-23.pdf', '2021-10-19', NULL, 15, '2022-01-12 21:47:23', '2022-01-12 21:47:23'),
(345, 'depense', '1731884568', 63170000, 3, NULL, 'SP 035', 3, 'FRAIS DE RETRAIT MOMO', 'DIV', 'espece', 'SP 035', 2700, NULL, NULL, '2021-10-19', NULL, 15, '2022-01-12 21:49:18', '2022-01-12 21:49:18'),
(346, 'depense', '2113591845', 60530000, 3, NULL, 'SP 036', 177, 'CARBURANT VOITURE DR SAN PEDRO', 'DIV', 'espece', 'SP 036', 40000, NULL, 'fichiers/facture12-01-2022-10-52-32.pdf', '2021-10-20', NULL, 15, '2022-01-12 21:52:32', '2022-01-12 22:30:46'),
(347, 'depense', '358947888', 62230000, 3, NULL, '05', 146, 'AVANCE LOCATION SONO', 'DIV', 'espece', 'SP 037', 70000, NULL, 'fichiers/facture12-01-2022-10-56-50.pdf', '2021-10-21', NULL, 15, '2022-01-12 21:56:50', '2022-01-12 21:56:50'),
(348, 'depense', '1344020312', 61810000, 3, NULL, 'SP 038', 171, 'FRAIS DE TRANSPORT TABLETTES', 'DIV', 'espece', 'SP 038', 103500, NULL, 'fichiers/facture12-01-2022-10-58-51.pdf', '2021-10-22', NULL, 15, '2022-01-12 21:58:51', '2022-01-12 21:58:51'),
(349, 'depense', '474123829', 63170000, 3, NULL, 'SP 039', 3, 'FRAIS D\'ENVOIS MOMO', 'DIV', 'espece', 'SP 039', 1500, NULL, NULL, '2021-10-22', NULL, 15, '2022-01-12 22:00:39', '2022-01-12 22:00:39'),
(350, 'depense', '1532896336', 60550000, 3, NULL, '30100', 129, 'ACHAT DE POST IT', 'DIV', 'espece', 'SP 040', 3000, NULL, 'fichiers/facture12-01-2022-11-02-58.pdf', '2021-10-22', NULL, 15, '2022-01-12 22:02:58', '2022-01-12 22:02:58'),
(351, 'depense', '574512280', 6141000, 3, NULL, 'SP 041', 171, 'TRANSPORT AIDE FORMATEUR', '4.3.5.4', 'espece', 'SP 041', 5000, NULL, 'fichiers/facture12-01-2022-11-05-51.pdf', '2021-10-22', NULL, 15, '2022-01-12 22:05:51', '2022-01-12 22:05:51'),
(352, 'depense', '344057464', 60580000, 3, NULL, '0295886', 174, 'ACHATS DE MULTIPRISES', 'DIV', 'espece', 'SP 042', 216000, NULL, 'fichiers/facture12-01-2022-11-08-33.pdf', '2021-10-25', NULL, 15, '2022-01-12 22:08:33', '2022-01-12 22:08:33'),
(353, 'depense', '88840299', 62230000, 3, NULL, '06', 146, 'RELIQUAT LOCATION DE SONO', 'DIV', 'espece', 'SP 043', 70000, NULL, 'fichiers/facture12-01-2022-11-10-05.pdf', '2021-10-28', NULL, 15, '2022-01-12 22:10:05', '2022-01-12 22:10:05'),
(354, 'depense', '1335333076', 63830000, 3, NULL, 'SP 044', 171, 'REPAS SUR SITE AGENT INHP', '', 'espece', 'SP 044', 10000, NULL, 'fichiers/facture12-01-2022-11-11-35.pdf', '2021-10-28', NULL, 15, '2022-01-12 22:11:35', '2022-01-12 22:39:42'),
(355, 'depense', '1410149269', 62280000, 3, NULL, 'SP 045', 193, 'LOCATIONS DE TABLEAU', 'DIV', 'espece', 'SP 045', 21000, NULL, 'fichiers/facture12-01-2022-11-15-07.pdf', '2021-10-29', NULL, 15, '2022-01-12 22:15:07', '2022-01-12 22:17:19'),
(356, 'depense', '430333896', 62230000, 3, NULL, '037/R.R.P.T/021', 178, 'LOCATION GROUPE ELECTROGENE', 'DIV', 'espece', 'SP 046', 280000, NULL, 'fichiers/facture12-01-2022-11-19-02.pdf', '2021-10-29', NULL, 15, '2022-01-12 22:19:02', '2022-01-12 22:19:02'),
(357, 'depense', '2017225580', 60530000, 3, NULL, 'SP 047', 133, 'CARBURANT VOITURE DR SAN PEDRO', 'DIV', 'espece', 'SP 047', 22000, NULL, 'fichiers/facture12-01-2022-11-20-20.pdf', '2021-10-29', NULL, 15, '2022-01-12 22:20:20', '2022-01-12 22:20:20'),
(358, 'depense', '578844093', 62420000, 3, NULL, '0001473', 5, 'VIDANGE VOITURE DU DR SAN PEDRO', 'DIV', 'espece', 'SP 048', 75000, NULL, 'fichiers/facture12-01-2022-11-22-23.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:22:23', '2022-01-12 22:22:23'),
(359, 'depense', '1001371557', 62230000, 3, NULL, '01431', 180, 'LOCATION CHAISES', '4.3.5.8', 'espece', 'SP 049', 30000, NULL, 'fichiers/facture12-01-2022-11-24-43.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:24:43', '2022-01-12 22:24:43'),
(360, 'depense', '1144045551', 61810000, 3, NULL, 'SP 050', 171, 'FRAIS DE TRANSPORT CHAISES', 'DIV', 'espece', 'SP 050', 4000, NULL, 'fichiers/facture12-01-2022-11-26-22.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:26:22', '2022-01-12 22:26:22'),
(361, 'depense', '99839643', 62880000, 3, NULL, '1551173', 3, 'RECHARGEMENT INTERNET FLYBOX', 'DIV', 'espece', 'SP 051', 19000, NULL, 'fichiers/facture12-01-2022-11-28-48.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:28:48', '2022-01-12 22:30:17'),
(362, 'depense', '628776203', 62410000, 3, NULL, 'SP 052', 171, 'MISE EN ETAT DES SALLES', 'DIV', 'espece', 'SP 052', 180000, NULL, 'fichiers/facture12-01-2022-11-29-58.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:29:58', '2022-01-12 22:44:01'),
(363, 'depense', '1136685344', 62230000, 3, NULL, '1001', 181, 'LOCATIONS CHAISES', '4.3.5.8', 'espece', 'SP 053', 85500, NULL, 'fichiers/facture12-01-2022-11-33-19.pdf', '2021-10-30', NULL, 15, '2022-01-12 22:33:19', '2022-01-12 22:33:19'),
(364, 'depense', '1785735113', 63280000, 19, NULL, '001', 194, 'DIVERS FRAIS', 'ALEAS DES ACTIVITES DE TERRAIN (DIVERS ET IMPREVUS)', 'espece', 'ABIDJAN 4 002', NULL, NULL, 'fichiers/facture13-01-2022-09-40-38.pdf', '2021-10-05', 600, 29, '2022-01-13 08:40:38', '2022-01-13 08:40:38'),
(365, 'depense', '1008290719', 63170000, 6, NULL, '050', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 050', 61000, NULL, NULL, '2021-11-15', NULL, 46, '2022-01-13 08:59:41', '2022-01-13 09:00:04'),
(366, 'depense', '1978785276', 63170000, 19, NULL, '001', 171, 'FRAIS D\'ENVOIS MOBILE MTN', '4.4.8.2', 'espece', 'ABIDJAN 4 002', 600, NULL, 'fichiers/facture13-01-2022-10-07-15.pdf', '2021-10-05', NULL, 29, '2022-01-13 09:07:15', '2022-01-13 09:07:15'),
(367, 'depense', '491593308', 24580000, 6, NULL, '051', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 051', 6100000, NULL, 'fichiers/facture13-01-2022-10-19-53.pdf', '2021-11-15', NULL, 46, '2022-01-13 09:19:53', '2022-01-13 09:19:53'),
(368, 'depense', '1634124320', 63170000, 6, NULL, '052', 3, 'FRAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 052', 5000, NULL, NULL, '2021-11-16', NULL, 46, '2022-01-13 09:21:22', '2022-01-13 09:21:22'),
(369, 'depense', '1251788112', 60530000, 6, NULL, '053', 133, 'CARBURANT COORDONNATRICE', '4.4.4.3', 'espece', 'GBOKLE 053', 40000, NULL, 'fichiers/facture13-01-2022-10-25-52.pdf', '2021-11-16', NULL, 46, '2022-01-13 09:25:52', '2022-01-13 09:25:52'),
(370, 'depense', '1399431531', 24580000, 6, NULL, '054', 96, 'LOCATION MOTO', '4.4.2.4', 'espece', 'GBOKLE 054', 20000, NULL, 'fichiers/facture13-01-2022-10-27-49.pdf', '2021-11-16', NULL, 46, '2022-01-13 09:27:49', '2022-01-13 09:27:49'),
(371, 'depense', '1595522254', 60530300, 6, NULL, '055', 133, 'CARBURANT SUPERVISEURS', '4.4.2.3', 'espece', 'GBOKLE 055', 350000, NULL, 'fichiers/facture13-01-2022-10-35-31.pdf', '2021-11-16', NULL, 46, '2022-01-13 09:35:31', '2022-01-13 09:35:31'),
(372, 'depense', '613970324', 60470000, 6, NULL, '056', 96, 'FOURNITURE DE BUREAU', 'DIV', 'espece', 'GBOKLE 056', 46000, NULL, 'fichiers/facture13-01-2022-10-42-20.pdf', '2021-11-16', NULL, 46, '2022-01-13 09:42:20', '2022-01-13 09:42:20'),
(373, 'depense', '1780526789', 62880000, 6, NULL, '002970', 3, 'CONNEXION FLYBOX', 'DIV', 'espece', 'GBOKLE 057', 20000, NULL, 'fichiers/facture13-01-2022-10-45-46.pdf', '2021-11-17', NULL, 46, '2022-01-13 09:45:46', '2022-01-13 09:45:46'),
(374, 'depense', '722359674', 60470000, 6, NULL, '1309609', 183, 'FOURNITURE DE BUREAU', 'DIV', 'espece', 'GBOKLE 058', 18000, NULL, 'fichiers/facture13-01-2022-10-51-05.pdf', '2021-11-17', NULL, 46, '2022-01-13 09:51:05', '2022-01-13 09:51:05'),
(375, 'depense', '517169503', 62810000, 6, NULL, '059', 3, 'COMMUNICATION SUPERVISEURS', '4.4.5.3', 'espece', 'GBOKLE 059', 70000, NULL, 'fichiers/facture13-01-2022-10-54-37.pdf', '2021-11-18', NULL, 46, '2022-01-13 09:54:37', '2022-01-13 09:54:37'),
(376, 'depense', '106818170', 62880000, 6, NULL, '060', 3, 'DOTATION INTERNET DES TIC', 'DIV', 'espece', 'GBOKLE 060', 40000, NULL, 'fichiers/facture13-01-2022-11-01-42.pdf', '2021-11-18', NULL, 46, '2022-01-13 10:01:42', '2022-01-13 10:01:42'),
(377, 'depense', '623492531', 63170000, 6, NULL, '061', 3, 'FAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 061', 5000, NULL, NULL, '2021-11-19', NULL, 46, '2022-01-13 10:05:24', '2022-01-13 10:07:38'),
(378, 'depense', '1788431790', 63170000, 2, NULL, 'TCHOLOGO001', 3, 'FRAIS D\'ENVOIS MOBILE MTN', '4.5.2.3', 'espece', 'TCHOLOGO001', NULL, NULL, 'fichiers/facture13-01-2022-11-10-13.pdf', '2021-06-10', 5000, 40, '2022-01-13 10:10:13', '2022-01-13 11:40:21'),
(379, 'depense', '643493106', 10280000, 6, NULL, '062', 171, 'MENUES DEPENSES COORDONNATRICE', 'DIV', 'espece', 'GBOKLE 062', 200000, NULL, 'fichiers/facture13-01-2022-11-11-07.pdf', '2021-11-20', NULL, 46, '2022-01-13 10:11:07', '2022-01-13 10:11:07'),
(380, 'depense', '1835992269', 60530300, 6, NULL, '063', 133, 'CARBURANT SUPERVISEURS', '4.4.2.3', 'espece', 'GBOKLE 063', 370000, NULL, 'fichiers/facture13-01-2022-11-23-17.pdf', '2021-11-23', NULL, 46, '2022-01-13 10:23:17', '2022-01-13 10:23:17'),
(381, 'depense', '163204153', 63170000, 6, NULL, '063', 3, 'FAIS MOMO', '4.4.8.2', 'espece', 'GBOKLE 064', 1000, NULL, NULL, '2021-11-23', NULL, 46, '2022-01-13 10:30:44', '2022-01-13 10:31:27'),
(382, 'depense', '603108052', 60530000, 6, NULL, '065', 133, 'CARBURANT COORDONNATRICE', '4.4.4.3', 'espece', 'GBOKLE 065', 50000, NULL, 'fichiers/facture13-01-2022-12-46-45.pdf', '2021-11-23', NULL, 46, '2022-01-13 11:46:45', '2022-01-13 11:46:45'),
(383, 'depense', '405772812', 60110000, 3, NULL, 'VGD6777', 6, 'dans la Région', '1.1.2', 'espece', 'R6786', 10000, NULL, 'fichiers/facture19-02-2023-12-13-30.pdf', '2023-02-19', NULL, 1, '2023-02-19 12:13:30', '2023-02-19 12:13:30'),
(384, 'depense', '1024911275', 67110000, 2, NULL, 'N565676', 110, 'Emprunts obligataires', '1.1.2', 'espece', 'R6786', 30000, NULL, 'fichiers/facture21-02-2023-11-40-35.pdf', '2023-02-21', NULL, 1, '2023-02-21 16:09:22', '2023-02-21 23:40:35'),
(385, 'depense', '1608405960', 63120000, 4, NULL, 'VGD6777E', 152, 'Frais sur effets', '1.3.2', 'espece', 'R67863S', NULL, NULL, 'fichiers/facture11-03-2023-05-17-34.pdf', '2023-03-11', 10000, 1, '2023-03-11 17:17:34', '2023-03-11 17:17:34'),
(386, 'depense', '341638433', 66110000, 8, NULL, '00001', 197, 'Appointements salaires et commissio', 'okay', 'espece', '0101001', 5000000, NULL, NULL, '2023-07-26', NULL, 29, '2023-07-26 19:18:16', '2023-07-26 19:18:16'),
(387, 'depense', '1402875842', 66111000, 8, NULL, '00002', 197, 'SALAIRE AGENT CARTO', 'okay', 'espece', '02020202', 3000000, NULL, NULL, '2023-07-26', NULL, 29, '2023-07-26 19:19:27', '2023-07-26 19:19:27'),
(388, 'depense', '2013245861', 66113000, 8, NULL, '000023', 197, 'SALAIRE SUPERVISEUR', '10.1.1', 'espece', '020203', 4500000, NULL, NULL, '2023-07-26', NULL, 29, '2023-07-26 19:20:38', '2023-07-27 10:38:12'),
(389, 'depense', '1709183465', 40110000, 3, NULL, '0000155', 153, 'Fournisseurs', '4.0.2', 'espece', '01010018', NULL, NULL, NULL, '2023-07-31', 5500000, 1, '2023-07-31 10:31:16', '2023-07-31 10:31:16'),
(390, 'depense', '723915600', 40110000, 1, NULL, 'f45', 89, 'ACHAT STYLO', '34', 'espece', 'F45', 5000, NULL, NULL, '2023-08-31', NULL, 1, '2023-08-31 10:44:52', '2023-08-31 10:44:52');

-- --------------------------------------------------------

--
-- Structure de la table `campagnes`
--

CREATE TABLE `campagnes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `campagnes`
--

INSERT INTO `campagnes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2020', NULL, NULL),
(2, '2021', NULL, NULL),
(3, '2022', NULL, NULL),
(4, '2023', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `commenter_id` bigint UNSIGNED NOT NULL,
  `commentable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conducteurs`
--

CREATE TABLE `conducteurs` (
  `id` bigint UNSIGNED NOT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `supervisor_id` int UNSIGNED DEFAULT NULL,
  `number_car` varchar(191) DEFAULT NULL,
  `brand_car` varchar(191) DEFAULT NULL,
  `number_team` varchar(191) DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  `etat` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
);

--
-- Déchargement des données de la table `conducteurs`
--

INSERT INTO `conducteurs` (`id`, `last_name`, `name`, `phone`, `supervisor_id`, `number_car`, `brand_car`, `number_team`, `created_by`, `etat`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BALDE', 'MAMADOU BAILO', '+224 621-32-55-63', 45, 'AC-0347-02', 'TOYOTA PRADO', '1', 1, 1, NULL, '2023-09-01 17:11:53', NULL),
(2, 'SOW', 'MAMADOU BAILO', '+224 628-01-76-77', 46, 'AB-8660-02', 'TOYOTA LAND CRUSER', '2', 1, 1, NULL, '2023-09-01 17:11:53', NULL),
(3, 'DIALLO', 'AMADOU OURY', '+224 621-02-65-67', 47, 'AF-7281-02', 'TOYOTA HILUX', '3', 1, 1, NULL, '2023-09-01 17:11:53', NULL),
(4, 'BALDE', 'MAMADOU OURY', '+224 623-42-59-60', 48, 'AO-6220-02', 'TOYOTA HILUX', '5', 1, 1, NULL, '2023-09-01 17:11:53', NULL),
(5, 'CAMARA', 'MAMADOU ALIOU', '+224 624-15-07-27', 49, 'AK-5531-02', 'TOYOTA TL', '6', 1, 1, NULL, '2023-09-01 17:11:53', NULL),
(6, 'DIALLO', 'ABDOULAYE', '+224 620-38-75-93', 50, 'AN-2829-02', 'MITSHIBISI', '4', 1, 1, NULL, '2023-09-01 17:11:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint UNSIGNED NOT NULL,
  `labelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `model` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaire` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `configurations`
--

INSERT INTO `configurations` (`id`, `labelle`, `level`, `created_at`, `updated_at`, `model`, `salaire`) VALUES
(1, 'prime', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(2, 'transport', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(3, 'mise_route', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(4, 'conges', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(5, 'gratification', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(6, 'salaire', 1, '2020-12-14 11:32:02', '2023-02-16 11:34:44', 'paies', 0),
(7, 'communication', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(8, 'perdiem', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(9, 'internet', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(10, 'guide', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(11, 'brute', 1, '2020-09-01 14:25:39', '2020-09-01 14:25:39', 'paies', 0),
(12, 'prime_ni', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(13, 'brut_social', 1, '2020-09-01 14:25:39', '2020-09-01 14:25:39', 'paies', 0),
(15, 'carburant', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:22', 'paies', 0),
(16, 'avance', 1, '2021-08-14 04:20:54', '2023-08-11 13:30:23', 'paies', 0);

-- --------------------------------------------------------

--
-- Structure de la table `directions`
--

CREATE TABLE `directions` (
  `id` int UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `directions`
--

INSERT INTO `directions` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'BCR', NULL, NULL),
(2, 'Conakry', NULL, NULL),
(3, 'Faranah', NULL, NULL),
(4, 'Kindia', NULL, NULL),
(5, 'Labé', NULL, NULL),
(6, 'Mamou', NULL, NULL),
(7, 'Nzérékoré', NULL, NULL),
(8, 'Boke', '2023-07-26 19:14:47', '2023-07-26 19:14:47'),
(9, 'Coyah1', NULL, NULL),
(10, 'Coyah2', NULL, NULL),
(11, 'Fangamadou', NULL, NULL),
(12, 'Kiniero', NULL, NULL),
(13, 'Koba', NULL, NULL),
(14, 'Koubia', NULL, NULL),
(15, 'Matam1', NULL, NULL),
(16, 'Matam2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `direction_user`
--

CREATE TABLE `direction_user` (
  `direction_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `direction_user`
--

INSERT INTO `direction_user` (`direction_id`, `user_id`) VALUES
(0, 0),
(1, 1),
(1, 6),
(1, 24),
(1, 26),
(1, 28),
(2, 1),
(2, 3),
(2, 5),
(2, 6),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 50),
(3, 1),
(3, 3),
(3, 5),
(3, 6),
(3, 9),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(4, 1),
(4, 3),
(4, 5),
(4, 6),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(5, 1),
(5, 3),
(5, 5),
(5, 6),
(5, 9),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(6, 3),
(6, 5),
(6, 6),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(7, 3),
(7, 5),
(7, 6),
(7, 7),
(7, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 28),
(7, 29),
(8, 3),
(8, 5),
(8, 6),
(8, 8),
(8, 20),
(8, 24),
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(9, 3),
(9, 5),
(9, 6),
(9, 18),
(9, 24),
(9, 25),
(9, 26),
(9, 27),
(9, 28),
(10, 3),
(10, 5),
(10, 6),
(10, 24),
(10, 25),
(10, 26),
(10, 27),
(10, 28),
(11, 3),
(11, 5),
(11, 6),
(11, 8),
(11, 24),
(11, 25),
(11, 26),
(11, 27),
(11, 28),
(12, 3),
(12, 5),
(12, 6),
(12, 9),
(12, 24),
(12, 25),
(12, 26),
(12, 27),
(12, 28),
(13, 3),
(13, 5),
(13, 6),
(13, 8),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 47),
(14, 3),
(14, 5),
(14, 6),
(14, 7),
(14, 24),
(14, 25),
(14, 26),
(14, 27),
(14, 28),
(15, 24),
(16, 3),
(16, 5),
(16, 24),
(16, 25),
(16, 26),
(16, 27),
(16, 28),
(17, 3),
(17, 5),
(17, 13),
(17, 24),
(17, 25),
(17, 26),
(17, 27),
(17, 28),
(18, 3),
(18, 5),
(18, 24),
(18, 25),
(18, 26),
(18, 27),
(18, 28),
(19, 3),
(19, 5),
(19, 24),
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(20, 3),
(20, 5),
(20, 24),
(20, 25),
(20, 26),
(20, 27),
(20, 28),
(21, 3),
(21, 5),
(21, 24),
(21, 25),
(21, 26),
(21, 27),
(21, 28),
(22, 3),
(22, 5),
(22, 24),
(22, 25),
(22, 26),
(22, 27),
(22, 28),
(23, 3),
(23, 26),
(24, 3),
(24, 26),
(24, 44),
(25, 3),
(25, 26),
(26, 3),
(26, 26),
(27, 3),
(27, 26),
(28, 3),
(28, 26),
(29, 3),
(29, 21),
(29, 26),
(30, 3),
(30, 26),
(31, 3),
(31, 26),
(32, 3),
(32, 26),
(33, 3),
(33, 26),
(34, 3),
(34, 26),
(35, 3),
(35, 26),
(36, 3),
(36, 26),
(37, 3),
(37, 26),
(38, 3),
(38, 26),
(39, 3),
(39, 26);

-- --------------------------------------------------------

--
-- Structure de la table `engins`
--

CREATE TABLE `engins` (
  `id` bigint UNSIGNED NOT NULL,
  `number_team` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int UNSIGNED DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `engins`
--

INSERT INTO `engins` (`id`, `number_team`, `number`, `brand`, `created_by`, `etat`, `created_at`, `updated_at`) VALUES
(1, '3', '2500', 'TVS', 1, 0, NULL, NULL),
(2, '3', '2602', 'TVS', 1, 0, NULL, NULL),
(3, '4', '2693', 'TVS', 1, 0, NULL, NULL),
(4, '4', '2427', 'TVS', 1, 0, NULL, NULL),
(5, '5', '2477', 'TVS', 1, 0, NULL, NULL),
(6, '5', '2466', 'TVS', 1, 0, NULL, NULL),
(7, '6', '2599', 'TVS', 1, 0, NULL, NULL),
(8, '6', '2490', 'TVS', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaire` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `s_formation` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `libelle`, `salaire`, `created_at`, `updated_at`, `s_formation`) VALUES
(1, 'agent tic', 100000, NULL, NULL, 0),
(2, 'assistant tic', 250000, NULL, NULL, 0),
(3, 'chef d\'équipe ', 150000, NULL, NULL, 10000),
(4, 'agent recensement', 120000, NULL, NULL, 10000),
(5, 'chef d\'équipe codification et saisie', 180000, NULL, NULL, 0),
(6, 'superviseur', 400000, NULL, NULL, 0),
(7, 'agent codification et saisie', 150000, NULL, NULL, 0),
(8, 'archiviste', 250000, NULL, NULL, 0),
(9, 'chef équipe manutantion', 150000, NULL, NULL, 0),
(10, 'agent manutantion', 90000, NULL, NULL, 0),
(11, 'personnel assistant administratif', 350000, NULL, NULL, 0),
(12, 'personnel assistant logistique', 350000, NULL, NULL, 0),
(13, 'personnel assistant comptable', 350000, NULL, NULL, 0),
(14, 'personne specialiste en communication', 350000, NULL, NULL, 0),
(15, 'personnel call center', 250000, NULL, NULL, 0),
(16, 'agent de reprographie', 150000, NULL, NULL, 0),
(17, 'autre personnel d\'appui', 100000, NULL, NULL, 0),
(18, 'agent de saisie', 100000, NULL, NULL, 0),
(19, 'aide formateur', 30000, NULL, NULL, 0),
(20, 'Agent cartographe', 300000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` bigint UNSIGNED NOT NULL,
  `personnel_id` int UNSIGNED NOT NULL,
  `date_abs` date NOT NULL,
  `motif` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteweb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codef` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `name`, `slug`, `contact`, `email`, `siteweb`, `codef`, `localisation`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 'BENI SECURITE INTERNATIONAL', '00000000000001', '625356176', '', 'guineemarket.com', '40112030', 'Kissosso', 0, NULL, '2023-08-21 13:45:06'),
(9, 'NORIA PRESTATIOS', '000001254785', '666020202', '', 'noria.com', '40112050', 'MATAM', 0, NULL, '2023-08-21 13:45:40'),
(10, 'BUREAU DE GESTION DES VEHICULE BGVA', 'RC0007', '666010101', '', 'guineemarket.com', '40112051', 'Kissosso', 0, NULL, '2023-08-21 15:21:10'),
(11, 'BORO ET FRERE', NULL, NULL, 'bobofrere@gmail.com', NULL, '40112052', NULL, 0, NULL, '2023-08-26 14:54:43'),
(12, 'BNCI(BIBLIOTHEQUE NATIONAL CI)', NULL, NULL, '', NULL, '40112053', NULL, 0, NULL, NULL),
(13, 'BERNABE CI', NULL, NULL, '', NULL, '40112054', NULL, 0, NULL, NULL),
(14, 'CALIS CI', NULL, NULL, '', NULL, '40113000', NULL, 0, NULL, NULL),
(15, 'CABINET CERCLE', NULL, NULL, '', NULL, '40113001', NULL, 0, NULL, NULL),
(16, 'CAFE RESTOS', NULL, NULL, '', NULL, '40113004', NULL, 0, NULL, NULL),
(17, 'CENTRE CULTUREL SAINT PAUL', NULL, NULL, '', NULL, '40113005', NULL, 0, NULL, NULL),
(18, 'C F A O MOTORS', NULL, NULL, '', NULL, '40113006', NULL, 0, NULL, NULL),
(19, 'CACOMIAF', NULL, NULL, '', NULL, '40113007', NULL, 0, NULL, NULL),
(20, 'C I E', NULL, NULL, '', NULL, '40113010', NULL, 0, NULL, NULL),
(21, 'COMPLEXE HOTELIER BELLE COTE', NULL, NULL, '', NULL, '40113012', NULL, 0, NULL, NULL),
(22, 'COMPLEXE GRD ROI', NULL, NULL, '', NULL, '40113015', NULL, 0, NULL, NULL),
(23, 'DEINE LUCIE', NULL, NULL, '', NULL, '40113019', NULL, 0, NULL, NULL),
(24, 'DINOSOR', NULL, NULL, '', NULL, '40113020', NULL, 0, NULL, NULL),
(25, 'DIGPRINT', '000000002', '666020203', '', 'madina.com', '40113021', 'Madina', 0, NULL, '2023-08-21 14:01:30'),
(26, 'DERMOPHARM', NULL, NULL, '', NULL, '40113022', NULL, 0, NULL, NULL),
(27, 'DVEAS CONSULTING', NULL, NULL, '', NULL, '40113023', NULL, 0, NULL, NULL),
(28, 'DISTRIMAX', NULL, NULL, '', NULL, '40113024', NULL, 0, NULL, NULL),
(29, 'D M I', NULL, NULL, '', NULL, '40113025', NULL, 0, NULL, NULL),
(30, 'ETS KLAM', NULL, NULL, '', NULL, '40113030', NULL, 0, NULL, NULL),
(31, 'ETS CVAM', NULL, NULL, '', NULL, '40113031', NULL, 0, NULL, NULL),
(32, 'ETS IB', NULL, NULL, '', NULL, '40113032', NULL, 0, NULL, NULL),
(33, 'EKAF SERVICE', NULL, NULL, '', NULL, '40113035', NULL, 0, NULL, NULL),
(34, 'E M SERVICE', NULL, NULL, '', NULL, '40113036', NULL, 0, NULL, NULL),
(35, 'ENTREPRISE CISSE', NULL, NULL, '', NULL, '40113040', NULL, 0, NULL, NULL),
(36, 'E N S E A', NULL, NULL, '', NULL, '40113042', NULL, 0, NULL, NULL),
(37, 'ELISHA', NULL, NULL, '', NULL, '40113501', NULL, 0, NULL, NULL),
(38, 'FOFANA ADAMA', NULL, NULL, '', NULL, '40116015', NULL, 0, NULL, NULL),
(39, 'FROIDS DIVINE', NULL, NULL, '', NULL, '40116025', NULL, 0, NULL, NULL),
(40, 'FULL CIRCLE MEDIA', NULL, NULL, '', NULL, '40116050', NULL, 0, NULL, NULL),
(41, 'GLOBE TECH', NULL, NULL, '', NULL, '40117030', NULL, 0, NULL, NULL),
(42, 'GNAKI ET COMPAGNIE', NULL, NULL, '', NULL, '40117031', NULL, 0, NULL, NULL),
(43, 'GUELA EVENTSCE', NULL, NULL, '', NULL, '40117035', NULL, 0, NULL, NULL),
(44, 'GONH', NULL, NULL, '', NULL, '40117040', NULL, 0, NULL, NULL),
(45, 'G E S', NULL, NULL, '', NULL, '40117050', NULL, 0, NULL, NULL),
(46, 'HARDSOFT', NULL, NULL, '', NULL, '40117075', NULL, 0, NULL, NULL),
(47, 'HOTEL AHO', NULL, NULL, '', NULL, '40118005', NULL, 0, NULL, NULL),
(48, 'HOTEL ATTOUNGLAN', NULL, NULL, '', NULL, '40118008', NULL, 0, NULL, NULL),
(49, 'HOTEL KING PALACE', NULL, NULL, '', NULL, '40118009', NULL, 0, NULL, NULL),
(50, 'HOTEL LA PRESIDENCE', NULL, NULL, '', NULL, '40118010', NULL, 0, NULL, NULL),
(51, 'HOTEL IMMACULEE', NULL, NULL, '', NULL, '40118015', NULL, 0, NULL, NULL),
(52, 'HOTEL LA PRUNELLE', NULL, NULL, '', NULL, '40118020', NULL, 0, NULL, NULL),
(53, 'HOTEL LE ROCHER', NULL, NULL, '', NULL, '40118050', NULL, 0, NULL, NULL),
(54, 'ILLIMAD', NULL, NULL, '', NULL, '40118060', NULL, 0, NULL, NULL),
(55, 'INNOV TECHNOLOGY', NULL, NULL, '', NULL, '40118070', NULL, 0, NULL, NULL),
(56, 'IMPACTAFRIK', NULL, NULL, '', NULL, '40118071', NULL, 0, NULL, NULL),
(57, 'HARDSOFT', NULL, NULL, '', NULL, '40118072', NULL, 0, NULL, NULL),
(58, 'IVOIRE PRESTIGE', NULL, NULL, '', NULL, '40118075', NULL, 0, NULL, NULL),
(59, 'KONATE & FILS', NULL, NULL, '', NULL, '40118079', NULL, 0, NULL, NULL),
(60, 'LES PALMES', NULL, NULL, '', NULL, '40118080', NULL, 0, NULL, NULL),
(61, 'L B T P', NULL, NULL, '', NULL, '40118081', NULL, 0, NULL, NULL),
(62, 'LYCEE TECHNIQUE D\'ABIDJAN', NULL, NULL, '', NULL, '40118082', NULL, 0, NULL, NULL),
(63, 'MBODJ PIECES AUTO', NULL, NULL, '', NULL, '40118083', NULL, 0, NULL, NULL),
(64, 'M B I', NULL, NULL, '', NULL, '40118084', NULL, 0, NULL, NULL),
(65, 'MICHE DECO', NULL, NULL, '', NULL, '40118085', NULL, 0, NULL, NULL),
(66, 'NEW BURO CI', NULL, NULL, '', NULL, '40118086', NULL, 0, NULL, NULL),
(67, 'NOUVELLE VISION GARAGE', NULL, NULL, '', NULL, '40118087', NULL, 0, NULL, NULL),
(68, 'PHCIE LABO LONGCHAMP', NULL, NULL, '', NULL, '40118088', NULL, 0, NULL, NULL),
(69, 'PHCIE DU PALAIS', NULL, NULL, '', NULL, '40118089', NULL, 0, NULL, NULL),
(70, 'REGIE ARC EN CIEL', NULL, NULL, '', NULL, '40118090', NULL, 0, NULL, NULL),
(71, 'NOBLE GALERIE', NULL, NULL, '', NULL, '40118091', NULL, 0, NULL, NULL),
(72, 'S G C I', NULL, NULL, '', NULL, '40118100', NULL, 0, NULL, NULL),
(73, 'SAFARI TECHNOLOGIE', NULL, NULL, '', NULL, '40118101', NULL, 0, NULL, NULL),
(74, 'S C I VALLON', NULL, NULL, '', NULL, '40118110', NULL, 0, NULL, NULL),
(75, 'PROSUMA', NULL, NULL, '', NULL, '40118111', NULL, 0, NULL, NULL),
(76, 'RIMCO', NULL, NULL, '', NULL, '40118114', NULL, 0, NULL, NULL),
(77, 'SN INDIGO', NULL, NULL, '', NULL, '40118115', NULL, 0, NULL, NULL),
(78, 'SOCIETE BORRO ET FRERES', NULL, NULL, '', NULL, '40118120', NULL, 0, NULL, NULL),
(79, 'SOCOCE 2 PLATEAU', NULL, NULL, '', NULL, '40118125', NULL, 0, NULL, NULL),
(80, 'SONGON PARK', NULL, NULL, '', NULL, '40118140', NULL, 0, NULL, NULL),
(81, 'N D V CI', NULL, NULL, '', NULL, '40118150', NULL, 0, NULL, NULL),
(82, 'M T N', NULL, NULL, '', NULL, '40118189', NULL, 0, NULL, NULL),
(83, 'SOFITEL', NULL, NULL, '', NULL, '40118250', NULL, 0, NULL, NULL),
(84, 'SMAT TELECOM', NULL, NULL, '', NULL, '40118251', NULL, 0, NULL, NULL),
(85, 'SONAM ASSURANCE', NULL, NULL, '', NULL, '40118270', NULL, 0, NULL, NULL),
(86, 'SAHAM ASSURANCE', NULL, NULL, '', NULL, '40118271', NULL, 0, NULL, NULL),
(87, 'SOCIAM 7', NULL, NULL, '', NULL, '40118273', NULL, 0, NULL, NULL),
(88, 'SODECI', NULL, NULL, '', NULL, '40118274', NULL, 0, NULL, NULL),
(89, 'SOUAD DISTRIBUTION', NULL, NULL, '', NULL, '40118275', NULL, 0, NULL, NULL),
(90, 'SUCESS 2T', NULL, NULL, '', NULL, '40118350', NULL, 0, NULL, NULL),
(91, 'TOTAL CI', NULL, NULL, '', NULL, '40118355', NULL, 0, NULL, NULL),
(92, 'TOUBA ELECTRONIQUE', NULL, NULL, '', NULL, '40118460', NULL, 0, NULL, NULL),
(93, 'ORRYX LOGISTIQUE', NULL, NULL, '', NULL, '40118510', NULL, 0, NULL, NULL),
(94, 'P C I S / SAGE', NULL, NULL, '', NULL, '40118520', NULL, 0, NULL, NULL),
(95, 'MEDILAB INFO', NULL, NULL, '', NULL, '40118990', NULL, 0, NULL, NULL),
(96, 'FRSS/DIVERS', NULL, NULL, '', NULL, '40119099', NULL, 0, NULL, NULL),
(97, 'INSTITUT NATIONAL DE STATISTIQUE', NULL, NULL, '', NULL, '41114500', NULL, 0, NULL, NULL),
(98, 'U N F P A', NULL, NULL, '', NULL, '41115000', NULL, 0, NULL, NULL),
(99, 'SALAIRE PERSONNEL RGPH 2019', NULL, NULL, '', NULL, '4221010', NULL, 0, NULL, NULL),
(100, 'SALAIRE ADMINISTRATEUR SYSTEME', NULL, NULL, '', NULL, '4221050', NULL, 0, NULL, NULL),
(101, 'SALAIRE CHAFFEUR CONTRACTUEL', NULL, NULL, '', NULL, '4221070', NULL, 0, NULL, NULL),
(102, 'SALAIRE GEOMATICIEN', NULL, NULL, '', NULL, '4222020', NULL, 0, NULL, NULL),
(103, 'SALAIRE AGENT CARTO', NULL, NULL, '', NULL, '4223030', NULL, 0, NULL, NULL),
(104, 'SALAIRE CHEF D\'EQUIPE', NULL, NULL, '', NULL, '4224040', NULL, 0, NULL, NULL),
(105, 'SALAIRE SUPERVISEUR', NULL, NULL, '', NULL, '4225050', NULL, 0, NULL, NULL),
(106, 'OPERATEUR DE SAISIE', NULL, NULL, '', NULL, '4226060', NULL, 0, NULL, NULL),
(107, 'SALAIRE AGENT PREPARATEUR', NULL, NULL, '', NULL, '4227070', NULL, 0, NULL, NULL),
(108, 'SALAIRE AGENT RECENSEUR', NULL, NULL, '', NULL, '4228080', NULL, 0, NULL, NULL),
(109, 'I N S (Institut National S)', NULL, NULL, '', NULL, '47131001', NULL, 0, NULL, NULL),
(110, 'SUBVENTION RECU / RP2020', NULL, NULL, '', NULL, '47131002', NULL, 0, NULL, NULL),
(111, 'CAISSE A JUSTIFIER', NULL, NULL, '', NULL, '47131050', NULL, 0, NULL, NULL),
(112, 'FOURNISSEUR A JUSTIFIER', NULL, NULL, '', NULL, '47131060', NULL, 0, NULL, NULL),
(113, 'PIECES MANQUANTES', NULL, NULL, '', NULL, '47131070', NULL, 0, NULL, NULL),
(114, 'SALAIRE AGEN(T CARTO', NULL, NULL, '', NULL, '47131900', NULL, 0, NULL, NULL),
(115, 'Réparateur de moto', 'reparateurdemoto', NULL, '', NULL, '40110000', 'Mana', 0, '2020-09-02 08:16:14', '2020-09-02 08:16:14'),
(116, 'Réparateur de moto', 'reparateurdemoto', NULL, '', NULL, '40110000', 'Mana', 0, '2020-09-02 08:16:15', '2020-09-02 08:16:15'),
(117, 'Diakité Lamine/réparateur Moto', 'diakitelaminereparateurmoto', NULL, '', NULL, '40110000', NULL, 0, '2020-09-02 08:17:10', '2020-09-02 08:17:10'),
(119, 'SIDIBE NAWA mecanicien-garagiste', 'sidibenawamecanicien-garagiste', '05 17 15 00 / 48 65 22 26', '', NULL, '40119100', 'DALOA', 0, '2020-09-09 11:00:53', '2020-09-09 11:00:53'),
(122, 'Sidibé Hamed', 'sidibehamed', NULL, '', NULL, '40119200', 'Man', 0, '2020-09-14 07:00:22', '2020-09-14 07:00:22'),
(123, 'SIDIKI COULIBALY SATION TOTAL DALOA', 'sidikicoulibalysationtotaldaloa', '32 78 37 54 / 07 95 74 89', '', NULL, '40119101', 'DALOA QUATIER COMMERCE GARE ROUTIERE', 0, '2020-09-22 11:56:30', '2020-09-22 11:56:30'),
(124, 'AFIQUE INGENIEURIE & TECHNOLOGIE', NULL, NULL, '', NULL, '40110920', NULL, 0, NULL, NULL),
(125, '247 COMMUNICATION', NULL, NULL, '', NULL, '40110930', NULL, 0, NULL, NULL),
(126, 'AE/BEKO', NULL, NULL, '', NULL, '40111030', NULL, 0, NULL, NULL),
(127, 'ARCHIDOC CONSULTING', NULL, NULL, '', NULL, '40111040', NULL, 0, NULL, NULL),
(128, 'ASSOUAN SERVICE', NULL, NULL, '', NULL, '40111100', NULL, 0, NULL, NULL),
(129, 'BUR MA SARL', NULL, NULL, '', NULL, '40112028', NULL, 0, NULL, NULL),
(130, 'BAH MULTI SERVICE', NULL, NULL, '', NULL, '40112029', NULL, 0, NULL, NULL),
(132, 'CDCI', 'cdci', '22531978700', '', NULL, 'CDCI', 'DAOUKRO', 0, '2021-10-04 11:55:57', '2021-10-04 11:55:57'),
(133, 'SHELL', 'shell', '22507076189876', '', NULL, '991996', NULL, 0, '2021-10-04 12:09:51', '2021-10-04 12:09:51'),
(134, 'SHELL', 'shell', '0707618987', '', NULL, '991996', 'DAOUKRO', 0, '2021-10-04 12:10:48', '2021-10-04 12:10:48'),
(136, 'ETA PERDIEM DU CHAUFFEUR', 'etaperdiemduchauffeur', '0748466326', '', NULL, '0000180003831', 'DAOUKRO', 0, '2021-10-04 12:38:05', '2021-10-04 12:38:05'),
(138, 'ORANGE FLYBOX', 'orangeflybox', '2721239000', '', 'www.orange.ci', '9606123 E', 'DAOUKRO', 0, '2021-10-04 13:00:31', '2021-10-04 13:00:31'),
(139, 'ORANGE FLYBOX', 'orangeflybox', '2721239000', '', 'www.orange.ci', '9606123 E', 'DAOUKRO', 0, '2021-10-04 13:00:31', '2021-10-04 13:00:31'),
(141, 'CHAUFFEUR DR SAN PEDRO', 'chauffeurdrsanpedro', NULL, '', NULL, '401', NULL, 0, '2021-10-04 14:19:13', '2021-10-04 14:19:13'),
(142, 'DR SAN PEDRO', 'drsanpedro', NULL, '', NULL, '401', 'SAN PEDRO', 0, '2021-10-04 14:19:43', '2021-10-04 14:19:43'),
(146, 'ELA PRODUCTION', 'elaproduction', NULL, '', NULL, '401', 'SAN PEDRO', 0, '2021-10-04 14:21:32', '2021-10-04 14:21:32'),
(147, 'LE PARADIS DES JUS', 'leparadisdesjus', NULL, '', NULL, '401', 'SAN PEDRO', 0, '2021-10-04 14:22:05', '2021-10-04 14:22:05'),
(148, 'LIBRAIRIE DE FRANCE GROUPE', 'librairiedefrancegroupe', NULL, '', NULL, '401', NULL, 0, '2021-10-04 14:23:44', '2021-10-04 14:23:44'),
(149, 'SDMT-CI', 'sdmt-ci', NULL, '', NULL, '401', 'SAN PEDRO', 0, '2021-10-04 15:36:33', '2021-10-04 15:36:33'),
(150, 'PHCIE NITORO SARL', 'phcienitorosarl', NULL, '', NULL, '401', 'SAN PEDRO', 0, '2021-10-04 15:37:01', '2021-10-04 15:37:01'),
(152, 'SUPER MARCHER LA PAIX', 'supermarcherlapaix', '0140644003', '', NULL, 'SUPER MARCHER LA PAIX', 'DAOUKRO', 0, '2021-10-08 05:55:17', '2021-10-08 05:55:17'),
(153, 'TOTAL DAOUKRO', 'totaldaoukro', '07543088', '', NULL, '1350788T', 'DAOUKRO', 0, '2021-10-08 09:11:59', '2021-10-08 09:11:59'),
(154, 'LOCATION TRETAUX', 'locationtretaux', NULL, '', NULL, 'JX2 AGENCE DE  LOCATION', 'AGBOVILLE', 0, '2021-10-11 10:17:21', '2021-10-11 10:17:21'),
(155, 'LIBRAIRIE GRACE DIVINE', 'librairiegracedivine', '22507112875', '', NULL, 'N0701680', 'AGBOVILLE', 0, '2021-10-12 14:30:15', '2021-10-12 14:30:15'),
(156, 'TOTAL AGBOVILLE', 'totalagboville', '08882112', '', NULL, '514163', 'AGBOVILLE', 0, '2021-10-12 14:42:27', '2021-10-12 14:42:27'),
(157, 'ORANGE CI AGBOVILLE', 'orangeciagboville', '08897298', '', NULL, 'F-SNCH02', 'AGBOVILLE', 0, '2021-10-12 15:08:03', '2021-10-12 15:08:03'),
(158, 'sous traitance', 'soustraitance', NULL, '', NULL, 'securite', 'AGBOVILLE', 0, '2021-10-14 15:02:21', '2021-10-14 15:02:21'),
(159, 'KOUDOU KIMDO', 'koudoukimdo', '0709487579', '', NULL, '1201580 F', 'SEGUELA', 0, '2022-01-06 17:20:57', '2022-01-06 17:20:57'),
(160, 'SYLLA OUMAR ELECTRO-MECANIQUE', 'syllaoumarelectro-mecanique', '2250757242629', '', NULL, '21681346', 'SEGUELA', 0, '2022-01-06 17:29:19', '2022-01-06 17:29:19'),
(161, 'KOUAME KHAN MARTIAL', 'kouamekhanmartial', '2250505636614', '', NULL, '0', 'SEGUELA', 0, '2022-01-06 18:08:30', '2022-01-06 18:08:30'),
(162, 'SIRA-TRANS LOGISTICS SARL', 'sira-translogisticssarl', '0707644448', '', NULL, '0', 'SEGUELA', 0, '2022-01-08 05:02:14', '2022-01-08 05:02:14'),
(163, 'LOCATION BAKAYOKO', 'locationbakayoko', '0707251990', '', NULL, '0', 'SEGUELA', 0, '2022-01-08 06:00:32', '2022-01-08 06:00:32'),
(164, 'DEPARTEMENT DE DIMBOKRO', 'departementdedimbokro', NULL, '', NULL, 'DEPT DIMBOKRO', 'DIMBOKRO', 0, '2022-01-10 14:41:58', '2022-01-10 14:41:58'),
(165, 'DEPARTEMENT DE DIMBOKRO', 'departementdedimbokro', NULL, '', NULL, 'DEPT DIMBOKRO', 'DIMBOKRO', 0, '2022-01-10 14:51:47', '2022-01-10 14:51:47'),
(166, 'DEPARTEMENT DE KOUASSI-KOUASSIKRO', 'departementdekouassi-kouassikro', NULL, '', NULL, 'DEPT KK', 'KOUASSI-KOUASSIKRO', 0, '2022-01-11 07:46:29', '2022-01-11 07:46:29'),
(167, 'ETS KONE ET FRERES', 'etskoneetfreres', '0707156160/0545574041', '', NULL, '1618371 R', 'SEGUELA', 0, '2022-01-11 14:03:36', '2022-01-11 14:03:36'),
(168, 'SARA PETROLEUM S.A', 'sarapetroleums.a', '2723536639/2723504865', '', NULL, '0', 'SEGUELA', 0, '2022-01-11 16:13:22', '2022-01-11 16:13:22'),
(169, 'CDCI', 'cdci', NULL, NULL, NULL, 'PORO 005', 'KORHOGO', 0, '2022-01-12 11:09:13', '2023-08-26 14:54:27'),
(170, 'MADJ DISTRIBUTION', 'madjdistribution', '0545484878', '', NULL, 'PORO 006', 'KORHOGO', 0, '2022-01-12 11:26:52', '2022-01-12 11:26:52'),
(171, 'BTPR', 'btpr', NULL, '', NULL, '1', NULL, 0, '2022-01-12 11:27:58', '2022-01-12 11:27:58'),
(172, 'LIBRAIRIE DE FRANCE GROUPE', 'librairiedefrancegroupe', NULL, '', NULL, '1235456', NULL, 0, '2022-01-12 11:32:22', '2022-01-12 11:32:22'),
(173, 'ORANGE CI', 'orangeci', NULL, '', NULL, '482486', NULL, 0, '2022-01-12 11:33:42', '2022-01-12 11:33:42'),
(174, 'QUINCAILLERIE HAMIDOU', 'quincailleriehamidou', NULL, '', NULL, '43316548', NULL, 0, '2022-01-12 11:34:54', '2022-01-12 11:34:54'),
(175, 'ETS AHOUA SOEUR', 'etsahouasoeur', NULL, '', NULL, '755666', NULL, 0, '2022-01-12 11:35:28', '2022-01-12 11:35:28'),
(176, 'COSMOS SARL', 'cosmossarl', NULL, '', NULL, '4123333', NULL, 0, '2022-01-12 11:36:10', '2022-01-12 11:36:10'),
(177, 'STATION AFRIQOIL', 'stationafriqoil', NULL, '', NULL, '4161663', NULL, 0, '2022-01-12 11:37:50', '2022-01-12 11:37:50'),
(178, 'RADIO PHARE FM', 'radiopharefm', NULL, '', NULL, '02502362', NULL, 0, '2022-01-12 11:40:11', '2022-01-12 11:40:11'),
(179, 'ETS SKY', 'etssky', NULL, '', NULL, 'PORO 007', NULL, 0, '2022-01-12 11:40:13', '2022-01-12 11:40:13'),
(180, 'CONFIANCE LOGISTIQUE', 'confiancelogistique', NULL, '', NULL, '4704511552', NULL, 0, '2022-01-12 11:42:30', '2022-01-12 11:42:30'),
(181, 'ETS NEMLIN', 'etsnemlin', NULL, '', NULL, '7788565', NULL, 0, '2022-01-12 11:43:12', '2022-01-12 11:43:12'),
(182, 'INFAS', 'infas', NULL, '', NULL, 'PORO 11', NULL, 0, '2022-01-12 12:33:03', '2022-01-12 12:33:03'),
(183, 'SLEIMAN JAMAL', 'sleimanjamal', NULL, '', NULL, '6047', 'SASSANDRA', 0, '2022-01-12 14:20:45', '2022-01-12 14:20:45'),
(184, 'SERVICE LOCATION', 'servicelocation', NULL, '', NULL, '6228', 'SASSANDRA', 0, '2022-01-12 14:33:28', '2022-01-12 14:33:28'),
(185, 'KING CASH', 'kingcash', NULL, '', NULL, '6056', 'SASSANDRA', 0, '2022-01-12 14:41:16', '2022-01-12 14:41:16'),
(186, 'QUINCAILLERIE', 'quincaillerie', NULL, '', NULL, '6056', 'SASSANDRA', 0, '2022-01-12 14:55:34', '2022-01-12 14:55:34'),
(187, 'HOTEL LA FALAISE', 'hotellafalaise', NULL, '', NULL, '6588', 'FRESCO', 0, '2022-01-12 15:33:11', '2022-01-12 15:33:11'),
(188, 'INHP', 'inhp', NULL, '', NULL, 'PORO 013', 'KORHOGO', 0, '2022-01-12 15:39:14', '2022-01-12 15:39:14'),
(189, 'LOCATION', 'location', NULL, '', NULL, '000000', 'SASSANDRA', 0, '2022-01-12 16:10:25', '2022-01-12 16:10:25'),
(190, 'EDWIGE SERVICE', 'edwigeservice', NULL, '', NULL, '6047', NULL, 0, '2022-01-12 16:26:04', '2022-01-12 16:26:04'),
(191, 'PHARMACIE', 'pharmacie', NULL, '', NULL, '000000', NULL, 0, '2022-01-12 16:26:24', '2022-01-12 16:26:24'),
(192, 'N\'GUESSAN ZIMMIN MARCEL', 'nguessanzimminmarcel', NULL, '', NULL, '0000000', NULL, 0, '2022-01-12 16:26:44', '2022-01-12 16:26:44'),
(193, 'GLOBAL INFORMATIQUE', 'globalinformatique', NULL, '', NULL, '2512211221', NULL, 0, '2022-01-12 22:16:57', '2022-01-12 22:16:57'),
(194, 'RGPH', 'rgph', NULL, '', NULL, '001', NULL, 0, '2022-01-13 08:29:18', '2022-01-13 08:29:18'),
(195, 'BTPR', 'btpr', NULL, '', NULL, '4011001', 'ABIDJAN', 0, '2022-01-13 09:06:27', '2022-01-13 09:06:27'),
(196, 'BOUGOULA BOUTIQUE', 'bougoulaboutique', NULL, '', NULL, '6056', 'SASSANDRA', 0, '2022-01-13 11:51:11', '2022-01-13 11:51:11'),
(197, 'DIATAS', 'diatas', '625356176', '', NULL, '40119000', NULL, 0, '2023-07-26 18:52:21', '2023-07-26 18:52:21'),
(198, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-26 14:21:38', '2023-08-26 14:21:38'),
(199, 'NOMS', 'N°RCCM', 'CONTACTS', 'EMAILS', 'SITE WEB', 'CODES', 'ADRESSES', NULL, '2023-08-26 14:21:38', '2023-08-26 14:21:38'),
(200, 'DIABY', '700000001', '224628010100', 'frss1@rgph.gn', 'rgph.gn', '2208000001', 'BOKE', NULL, '2023-08-26 14:22:12', '2023-08-26 14:22:12'),
(201, 'TOURE', '700000002', '224628010101', 'frss2@rgph.gn', 'rgph.gn', '2208000002', 'CONAKRY', NULL, '2023-08-26 14:22:12', '2023-08-26 14:22:12'),
(202, 'FOFANA', '700000003', '224628010102', 'frss3@rgph.gn', 'rgph.gn', '2208000003', 'KINDIA', NULL, '2023-08-26 14:22:12', '2023-08-26 14:22:12');

-- --------------------------------------------------------

--
-- Structure de la table `imputations`
--

CREATE TABLE `imputations` (
  `id` bigint UNSIGNED NOT NULL,
  `code` int UNSIGNED NOT NULL,
  `libelle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `imputations`
--

INSERT INTO `imputations` (`id`, `code`, `libelle`) VALUES
(1, 10110000, 'Capital souscrit, non appelé'),
(2, 10120000, 'Capital souscrit, appelé, non versé'),
(3, 10130000, 'Capital souscrit, appelé, versé, no'),
(4, 10140000, 'Capital souscrit, appelé, versé, am'),
(5, 10210000, 'Dotation initiale'),
(6, 10220000, 'Dotations complémentaires'),
(7, 10280000, 'Autres dotations'),
(8, 10410000, 'FINANCEMENT RECU'),
(9, 11810000, 'Réserves facultatives'),
(10, 11880000, 'Réserves diverses'),
(11, 12910000, 'Perte nette à reporter'),
(12, 12920000, 'Perte - Amortissements réputés diff'),
(13, 13010000, 'Résultat en instance d\'affectation'),
(14, 13090000, 'Résultat en instance d\'affectation'),
(15, 13810000, 'Résultat de fusion'),
(16, 13820000, 'Résultat d\'apport partiel d\'actif'),
(17, 13830000, 'Résultat de scission'),
(18, 13840000, 'Résultat de liquidation'),
(19, 14110000, 'Etat'),
(20, 14120000, 'Régions'),
(21, 14130000, 'Départements'),
(22, 14140000, 'Communes et collectivités publiques'),
(23, 14150000, 'Entités publiques ou mixtes'),
(24, 14160000, 'Entités et organismes privés'),
(25, 14170000, 'Organismes internationaux'),
(26, 14180000, 'Autres'),
(27, 15310000, 'Fonds National'),
(28, 15320000, 'Prélèvement pour le Budget'),
(29, 15510000, 'Reconstitution des gisements minier'),
(30, 15610000, 'Hausse de prix'),
(31, 15620000, 'Fluctuation des cours'),
(32, 16110000, 'Emprunts obligataires ordinaires'),
(33, 16120000, 'Emprunts obligataires convertibles'),
(34, 16130000, 'Emprunts obligataires remboursables'),
(35, 16180000, 'Autres emprunts obligataires'),
(36, 16510000, 'Dépôts'),
(37, 16520000, 'Cautionnements'),
(38, 16610000, 'sur emprunts obligataires'),
(39, 16620000, 'sur emprunts et dettes auprès des é'),
(40, 16630000, 'sur avances reçues de l\'Etat'),
(41, 16640000, 'sur avances reçues et comptes coura'),
(42, 16650000, 'sur dépôts et cautionnements reçus'),
(43, 16670000, 'sur avances assorties de conditions'),
(44, 16680000, 'sur autres emprunts et dettes'),
(45, 16710000, 'Avances bloquées pour augmentation'),
(46, 16720000, 'Avances conditionnées par l\'Etat'),
(47, 16730000, 'Avances conditionnées par les autre'),
(48, 16740000, 'Avances conditionnées par les organ'),
(49, 16810000, 'Rentes viagères capitalisées'),
(50, 16820000, 'Billets de fonds'),
(51, 16830000, 'Dettes consécutives à des titres em'),
(52, 16840000, 'Emprunts participatifs'),
(53, 16850000, 'Participation des travailleurs aux'),
(54, 16860000, 'Emprunts et dettes contractés auprè'),
(55, 17620000, 'sur dettes de location-acquisition'),
(56, 17630000, 'sur dettes de location-acquisitio'),
(57, 17640000, 'sur dettes de location-acquisition'),
(58, 17680000, 'sur autres dettes de location-acqu'),
(59, 18110000, 'Dettes liées à des participations ('),
(60, 18120000, 'Dettes liées à des participations ('),
(61, 19610000, 'Provisions pour pensions et obligat'),
(62, 19620000, 'Actif du régime de retraite'),
(63, 19810000, 'Provisions pour amendes et pénalité'),
(64, 19830000, 'Provisions de propre assureur'),
(65, 19840000, 'Provisions pour démantèlement et re'),
(66, 19850000, 'Provisions pour droits à réduction'),
(67, 19880000, 'Provisions pour divers risques et c'),
(68, 21210000, 'Brevets'),
(69, 21220000, 'Licences'),
(70, 21230000, 'Concessions de service public'),
(71, 21280000, 'Autres concessions et droits simila'),
(72, 21310000, 'Logiciels'),
(73, 21320000, 'Sites internet'),
(74, 21810000, 'Frais de prospection et d’évaluatio'),
(75, 21820000, 'Coûts d’obtention du contrat'),
(76, 21830000, 'Fichiers clients, notices, titres d'),
(77, 21840000, 'Coûts des franchises'),
(78, 21880000, 'Divers droits et valeurs incorporel'),
(79, 21910000, 'Frais de développement'),
(80, 21930000, 'Logiciels et sites internet'),
(81, 21980000, 'Autres droits et valeurs incorporel'),
(82, 22110000, 'Terrains d\'exploitation agricole'),
(83, 22120000, 'Terrains d\'exploitation forestière'),
(84, 22180000, 'Autres terrains'),
(85, 22210000, 'Terrains à bâtir'),
(86, 22280000, 'Autres terrains nus'),
(87, 22310000, 'pour bâtiments industriels et agric'),
(88, 22320000, 'pour bâtiments administratifs et co'),
(89, 22340000, 'pour bâtiments affectés aux autres'),
(90, 22350000, 'pour bâtiments affectés aux autres'),
(91, 22380000, 'Autres terrains bâtis'),
(92, 22410000, 'Plantation d\'arbres et d\'arbustes'),
(93, 22450000, 'Améliorations du fonds'),
(94, 22480000, 'Autres travaux'),
(95, 22510000, 'Carrières'),
(96, 22610000, 'Parkings'),
(97, 22810000, 'Terrains - immeubles de placement'),
(98, 22850000, 'Terrains des logements affectés au'),
(99, 22860000, 'Terrains de location - acquisition'),
(100, 22880000, 'Divers terrains'),
(101, 22910000, 'Terrains agricoles et forestiers'),
(102, 22920000, 'Terrains nus'),
(103, 22950000, 'Terrains de carrières - tréfonds'),
(104, 22980000, 'Autres terrains'),
(105, 23110000, 'Bâtiments industriels'),
(106, 23120000, 'Bâtiments agricoles'),
(107, 23130000, 'Bâtiments administratifs et commerc'),
(108, 23140000, 'Bâtiments affectés au logement du p'),
(109, 23150000, 'Bâtiments - immeubles de placement'),
(110, 23160000, 'Bâtiments de location - acquisition'),
(111, 23210000, 'Bâtiments industriels'),
(112, 23220000, 'Bâtiments agricoles'),
(113, 23230000, 'Bâtiments administratifs et commerc'),
(114, 23240000, 'Bâtiments affectés au logement du p'),
(115, 23250000, 'Bâtiments - immeubles de placement'),
(116, 23260000, 'Bâtiments de location - acquisition'),
(117, 23310000, 'Voies de terre'),
(118, 23320000, 'Voies de fer'),
(119, 23330000, 'Voies d’eau'),
(120, 23340000, 'Barrages, Digues'),
(121, 23350000, 'Pistes d’aérodrome'),
(122, 23380000, 'Autres ouvrages d’infrastructures'),
(123, 23410000, 'Installations complexes spécialisée'),
(124, 23420000, 'Installations complexes spécialisée'),
(125, 23430000, 'Installations à caractère spécifiqu'),
(126, 23440000, 'Installations à caractère spécifiqu'),
(127, 23450000, 'Aménagements et agencements des bât'),
(128, 23510000, 'Installations générales'),
(129, 23580000, 'Autres aménagements de bureaux'),
(130, 23910000, 'Bâtiments en cours'),
(131, 23920000, 'Installations en cours'),
(132, 23930000, 'Ouvrages d’infrastructure en cours'),
(133, 23940000, 'Aménagements, agencements et instal'),
(134, 23950000, 'Aménagements de bureaux en cours'),
(135, 23980000, 'Autres installations et agencements'),
(136, 24110000, 'Matériel industriel'),
(137, 24120000, 'Outillage industriel'),
(138, 24130000, 'Matériel commercial'),
(139, 24140000, 'Outillage commercial'),
(140, 24160000, 'Matériel et outillage industriel et'),
(141, 24210000, 'Matériel agricole'),
(142, 24220000, 'Outillage agricole'),
(143, 24260000, 'Matériel et outillage agricole de l'),
(144, 24410000, 'Matériel de bureau'),
(145, 24420000, 'Matériel informatique'),
(146, 24430000, 'Matériel bureautique'),
(147, 24440000, 'Mobilier de bureau'),
(148, 24450000, 'Matériel et mobilier - immeubles de'),
(149, 24460000, 'Matériel et mobilier de location -'),
(150, 24470000, 'Matériel et mobilier des logements'),
(151, 24510000, 'Matériel automobile'),
(152, 24520000, 'Matériel ferroviaire'),
(153, 24530000, 'Matériel fluvial, lagunaire'),
(154, 24540000, 'Matériel naval'),
(155, 24550000, 'Matériel aérien'),
(156, 24560000, 'Matériel de transport de location -'),
(157, 24570000, 'Matériel hippomobile'),
(158, 24580000, 'Autres matériels de transport'),
(159, 24610000, 'Cheptel, animaux de trait'),
(160, 24620000, 'Cheptel, animaux reproducteurs'),
(161, 24630000, 'Animaux de garde'),
(162, 24650000, 'Plantations agricoles'),
(163, 24680000, 'Autres actifs biologiques'),
(164, 24710000, 'Agencements et aménagements du maté'),
(165, 24720000, 'Agencements et aménagements des act'),
(166, 24780000, 'Autres agencements, aménagements du'),
(167, 24810000, 'Collections et œuvres d’art'),
(168, 24880000, 'Divers matériels et mobiliers'),
(169, 24910000, 'Matériel et outillage industriel et'),
(170, 24920000, 'Matériel et outillage agricole'),
(171, 24930000, 'Matériel d’emballage récupérable et'),
(172, 24940000, 'Matériel et mobilier de bureau'),
(173, 24950000, 'Matériel de transport'),
(174, 24960000, 'Actifs biologiques'),
(175, 24970000, 'Agencements et aménagements du maté'),
(176, 24980000, 'Autres matériels et actifs biologiq'),
(177, 27110000, 'Prêts participatifs'),
(178, 27111000, 'PRET PERSONEL BTPR'),
(179, 27120000, 'Prêts aux associés'),
(180, 27130000, 'Billets de fonds'),
(181, 27140000, 'Créances de location-financement'),
(182, 27150000, 'Titres prêtés'),
(183, 27180000, 'Autres prêts et créances'),
(184, 27210000, 'Prêts immobiliers'),
(185, 27220000, 'Prêts mobiliers et d’installation'),
(186, 27280000, 'Autres Prêts au personnel BTPR'),
(187, 27310000, 'Retenues de garantie'),
(188, 27330000, 'Fonds réglementé'),
(189, 27340000, 'Créances sur le concédant'),
(190, 27380000, 'Autres créances sur l’Etat'),
(191, 27410000, 'Titres immobilisés de l’activité de'),
(192, 27420000, 'Titres participatifs'),
(193, 27430000, 'Certificats d’investissement'),
(194, 27440000, 'Parts de fonds commun de placement'),
(195, 27450000, 'Obligations'),
(196, 27460000, 'Actions ou parts propres'),
(197, 27480000, 'Autres titres immobilisés'),
(198, 27510000, 'Dépôts pour loyers d’avance'),
(199, 27520000, 'Dépôts pour l’électricité'),
(200, 27530000, 'Dépôts pour l’eau'),
(201, 27540000, 'Dépôts pour le gaz'),
(202, 27550000, 'Dépôts pour le téléphone, le télex,'),
(203, 27560000, 'Cautionnements sur marchés publics'),
(204, 27570000, 'Cautionnements sur autres opération'),
(205, 27580000, 'Autres dépôts et cautionnements'),
(206, 27610000, 'Prêts et créances non commerciales'),
(207, 27620000, 'Prêts au personnel'),
(208, 27630000, 'Créances sur l\'Etat'),
(209, 27640000, 'Titres immobilisés'),
(210, 27650000, 'Dépôts et cautionnements versés'),
(211, 27660000, 'Créances de location-financement'),
(212, 27670000, 'Créances rattachées à des participa'),
(213, 27680000, 'Immobilisations financières diverse'),
(214, 27710000, 'Créances rattachées à des participa'),
(215, 27720000, 'Créances rattachées à des participa'),
(216, 27730000, 'Créances rattachées à des sociétés'),
(217, 27740000, 'Avances à des Groupements d\'intérêt'),
(218, 27810000, 'Créances diverses groupe'),
(219, 27820000, 'Créances diverses hors groupe'),
(220, 27840000, 'Banques dépôts à terme'),
(221, 27850000, 'Or et métaux précieux (1)'),
(222, 27880000, 'Autres immobilisations financières'),
(223, 28110000, 'Amortissements des frais de dévelop'),
(224, 28120000, 'Amortissements des brevets, licence'),
(225, 28130000, 'Amortissements des logiciels et sit'),
(226, 28140000, 'Amortissements des marques'),
(227, 28150000, 'Amortissements du fonds commercial'),
(228, 28160000, 'Amortissements du droit au bail'),
(229, 28170000, 'Amortissements des investissements'),
(230, 28180000, 'Amortissements des autres droits et'),
(231, 28240000, 'Amortissements des travaux de mise'),
(232, 28310000, 'Amortissements des bâtiments indust'),
(233, 28320000, 'Amortissements des bâtiments indust'),
(234, 28330000, 'Amortissements des ouvrages d\'infra'),
(235, 28340000, 'Amortissements des aménagements, ag'),
(236, 28350000, 'Amortissements des aménagements de'),
(237, 28370000, 'Amortissements des bâtiments indust'),
(238, 28380000, 'Amortissements des autres installat'),
(239, 28410000, 'Amortissements du matériel et outil'),
(240, 28420000, 'Amortissements du matériel et outil'),
(241, 28430000, 'Amortissements du matériel d\'emball'),
(242, 28440000, 'Amortissements du matériel et mobil'),
(243, 28441000, 'AMORTISSEMENT MATERIEL DE BUREAU'),
(244, 28442000, 'AMORTISSEMENT MATERIEL INFORMATIQUE'),
(245, 28443000, 'AMORTISSEMENT MATERIEL BUREAUTIQUE'),
(246, 28450000, 'Amortissements du matériel de trans'),
(247, 28460000, 'Amortissements des actifs biologiqu'),
(248, 28470000, 'Amortissements des agencements, amé'),
(249, 28480000, 'Amortissements des autres matériels'),
(250, 29110000, 'Dépréciations des frais de développ'),
(251, 29120000, 'Dépréciations des brevets, licences'),
(252, 29130000, 'Dépréciations des logiciels et site'),
(253, 29140000, 'Dépréciations des marques'),
(254, 29150000, 'Dépréciations du fonds commercial'),
(255, 29160000, 'Dépréciations du droit au bail'),
(256, 29170000, 'Dépréciations des investissements d'),
(257, 29180000, 'Dépréciations des autres droits et'),
(258, 29190000, 'Dépréciations des immobilisations i'),
(259, 29210000, 'Dépréciations des terrains agricole'),
(260, 29220000, 'Dépréciations des terrains nus'),
(261, 29230000, 'Dépréciations des terrains bâtis'),
(262, 29240000, 'Dépréciations des travaux de mise e'),
(263, 29250000, 'Dépréciations des terrains de carri'),
(264, 29260000, 'Dépréciations des terrains aménagés'),
(265, 29270000, 'Dépréciations des terrains mis en c'),
(266, 29280000, 'Dépréciations des autres terrains'),
(267, 29290000, 'Dépréciations des aménagements de t'),
(268, 29310000, 'Dépréciations des bâtiments industr'),
(269, 29320000, 'Dépréciations des bâtiments industr'),
(270, 29330000, 'Dépréciations des ouvrages d\'infras'),
(271, 29340000, 'Dépréciations des aménagements, age'),
(272, 29350000, 'Dépréciations des aménagements de b'),
(273, 29370000, 'Dépréciations des bâtiments industr'),
(274, 29380000, 'Dépréciations des autres installati'),
(275, 29390000, 'Dépréciations des bâtiments et inst'),
(276, 29410000, 'Dépréciations du matériel et outill'),
(277, 29420000, 'Dépréciations du matériel et outill'),
(278, 29430000, 'Dépréciations du matériel d\'emballa'),
(279, 29440000, 'Dépréciations du matériel et mobili'),
(280, 29450000, 'Dépréciations du matériel de transp'),
(281, 29460000, 'Dépréciations des actifs biologique'),
(282, 29470000, 'Dépréciations des agencements, amén'),
(283, 29480000, 'Dépréciations des autres matériels'),
(284, 29490000, 'Dépréciations de matériel en cours'),
(285, 29510000, 'Dépréciations des avances et acompt'),
(286, 29520000, 'Dépréciations des avances et acompt'),
(287, 29610000, 'Dépréciations des titres de partici'),
(288, 29620000, 'Dépréciations des titres de partici'),
(289, 29630000, 'Dépréciations des titres de partici'),
(290, 29650000, 'Dépréciations des participations da'),
(291, 29660000, 'Dépréciations des parts dans des GI'),
(292, 29680000, 'Dépréciations des autres titres de'),
(293, 29710000, 'Dépréciations des prêts et créances'),
(294, 29720000, 'Dépréciations des prêts au personne'),
(295, 29730000, 'Dépréciations des créances sur l\'Et'),
(296, 29740000, 'Dépréciations des titres immobilisé'),
(297, 29750000, 'Dépréciations des dépôts et caution'),
(298, 29770000, 'Dépréciations des créances rattaché'),
(299, 29780000, 'Dépréciations des créances financiè'),
(300, 31110000, 'Marchandises A1'),
(301, 31120000, 'Marchandises A2'),
(302, 31210000, 'Marchandises B1'),
(303, 31220000, 'Marchandises B2'),
(304, 31310000, 'Animaux'),
(305, 31320000, 'Végétaux'),
(306, 33510000, 'Emballages perdus'),
(307, 33520000, 'Emballages récupérables non identif'),
(308, 33530000, 'Emballages à usage mixte'),
(309, 33580000, 'Autres emballages'),
(310, 34110000, 'Produits en cours P1'),
(311, 34120000, 'Produits en cours P2'),
(312, 34210000, 'Travaux en cours T1'),
(313, 34220000, 'Travaux en cours T2'),
(314, 34310000, 'Produits intermédiaires A'),
(315, 34320000, 'Produits intermédiaires B'),
(316, 34410000, 'Produits résiduels A'),
(317, 34420000, 'Produits résiduels B'),
(318, 34510000, 'Animaux'),
(319, 34520000, 'Végétaux'),
(320, 35110000, 'Etudes en cours E1'),
(321, 35120000, 'Etudes en cours E2'),
(322, 35210000, 'Prestations de services S1'),
(323, 35220000, 'Prestations de services S2'),
(324, 36310000, 'Animaux'),
(325, 36320000, 'Végétaux'),
(326, 36380000, 'Autres stocks (activités annexes)'),
(327, 37110000, 'Produits intermédiaires A'),
(328, 37120000, 'Produits intermédiaires B'),
(329, 37210000, 'Déchets'),
(330, 37220000, 'Rebuts'),
(331, 37230000, 'Matières de récupération'),
(332, 37310000, 'Animaux'),
(333, 37320000, 'Végétaux'),
(334, 37380000, 'Autres stocks (activités annexes)'),
(335, 38710000, 'Stock en consignation'),
(336, 38720000, 'Stock en dépôt'),
(337, 40110000, 'Fournisseurs'),
(338, 40120000, 'Fournisseurs Groupe'),
(339, 40130000, 'Fournisseurs sous-traitants'),
(340, 40160000, 'Fournisseurs, réserve de propriété'),
(341, 40170000, 'Fournisseurs, retenues de garantie'),
(342, 40210000, 'Fournisseurs, Effets à payer'),
(343, 40220000, 'Fournisseurs - Groupe, Effets à pay'),
(344, 40230000, 'Fournisseurs sous-traitants, Effets'),
(345, 40410000, 'Fournisseurs dettes en compte, immo'),
(346, 40420000, 'Fournisseurs dettes en compte, immo'),
(347, 40460000, 'Fournisseurs effets à payer, immobi'),
(348, 40470000, 'Fournisseurs effets à payer, immobi'),
(349, 40810000, 'Fournisseurs'),
(350, 40820000, 'Fournisseurs - Groupe'),
(351, 40830000, 'Fournisseurs sous-traitants'),
(352, 40860000, 'Fournisseurs, intérêts courus'),
(353, 40910000, 'Fournisseurs avances et acomptes ve'),
(354, 40920000, 'Fournisseurs - Groupe avances et ac'),
(355, 40930000, 'Fournisseurs sous-traitants avances'),
(356, 40940000, 'Fournisseurs créances pour emballag'),
(357, 40980000, 'Fournisseurs, rabais, remises, rist'),
(358, 41110000, 'Clients'),
(359, 41120000, 'Clients - Groupe'),
(360, 41140000, 'Clients, Etat et Collectivités publ'),
(361, 41150000, 'Clients, organismes internationaux'),
(362, 41160000, 'Clients, réserve de propriété'),
(363, 41170000, 'Clients, retenues de garantie'),
(364, 41180000, 'Clients, dégrèvement de Taxes sur l'),
(365, 41210000, 'Clients, Effets à recevoir'),
(366, 41220000, 'Clients - Groupe, Effets à recevoir'),
(367, 41240000, 'Etat et Collectivités publiques, Ef'),
(368, 41250000, 'Organismes Internationaux, Effets à'),
(369, 41310000, 'Clients, chèques impayés'),
(370, 41320000, 'Clients, Effets impayés'),
(371, 41330000, 'Clients, cartes de crédit impayées'),
(372, 41380000, 'Clients, autres valeurs impayées'),
(373, 41410000, 'Créances en compte, immobilisations'),
(374, 41420000, 'Créances en compte, immobilisations'),
(375, 41460000, 'Effets à recevoir, immobilisations'),
(376, 41470000, 'Effets à recevoir, immobilisations'),
(377, 41610000, 'Créances litigieuses'),
(378, 41620000, 'Créances douteuses'),
(379, 41810000, 'Clients, factures à établir'),
(380, 41860000, 'Clients, intérêts courus'),
(381, 41910000, 'Clients, avances et acomptes reçus'),
(382, 41920000, 'Clients - Groupe, avances et acompt'),
(383, 41940000, 'Clients, dettes pour emballages et'),
(384, 41980000, 'Clients, rabais, remises, ristourne'),
(385, 42110000, 'Personnel, avances'),
(386, 42120000, 'SALAIRE BTPR Personnel, acomptes'),
(387, 42130000, 'Frais avancés et fournitures au per'),
(388, 42200000, 'Compte à créer'),
(389, 4220000, 'PERSONNEL, REMUNERATIONS DUES'),
(390, 42310000, 'Personnel, oppositions'),
(391, 42320000, 'Personnel, saisies-arrêts'),
(392, 42330000, 'Personnel, avis à tiers détenteur'),
(393, 42410000, 'Assistance médicale'),
(394, 42420000, 'Allocations familiales'),
(395, 42450000, 'Organismes sociaux rattachés à l\'en'),
(396, 42480000, 'Autres oeuvres sociales internes'),
(397, 42510000, 'Délégués du personnel'),
(398, 42520000, 'Syndicats et Comités d\'entreprises,'),
(399, 42580000, 'Autres représentants du personnel'),
(400, 42610000, 'Participation aux bénéfices'),
(401, 42640000, 'Participation au capital'),
(402, 42810000, 'Dettes provisionnées pour congés à'),
(403, 42860000, 'Autres charges à payer'),
(404, 42870000, 'Produits à recevoir'),
(405, 43110000, 'CNPS PERSONNEL BTPR'),
(406, 43110050, 'CNPS CHAUFFEUR BTPR'),
(407, 43111000, 'CNPS AGENT CARTO'),
(408, 43112000, 'CNPS CHEF D\'EQUIPE'),
(409, 43113000, 'CNPS SUPERVISEUR'),
(410, 43114000, 'CNPS AGENT ADMINISTRATIF'),
(411, 43115000, 'CNPS GEOMATICIEN'),
(412, 43116000, 'CNPS AGENT PREPARATEUR'),
(413, 43117000, 'CNPS AGENT RECENSEUR'),
(414, 43118000, 'CNPS TIC'),
(415, 43120000, 'Accidents de travail'),
(416, 43130000, 'Caisse de retraite obligatoire'),
(417, 43131000, 'CNPS BTPR'),
(418, 43132000, 'CNPS ADMINISTRATEUR SYSTEME'),
(419, 43133000, 'CNPS CHAUFFEURS CONTRACTUELS'),
(420, 43140000, 'Caisse de retraite facultative'),
(421, 43180000, 'Autres cotisations sociales'),
(422, 43181000, 'ASSURANCE CMU'),
(423, 43181050, 'CMU-CHAUFFEURS'),
(424, 43310000, 'Mutuelle'),
(425, 43320000, 'Assurances Retraite'),
(426, 43330000, 'Assurances et organismes de santé'),
(427, 43340000, 'T.V.A. facturée sur production livr'),
(428, 43350000, 'T.V.A. sur factures à établir'),
(429, 43810000, 'Charges sociales sur gratifications'),
(430, 43820000, 'Charges sociales sur congés à payer'),
(431, 43860000, 'Autres charges à payer'),
(432, 43870000, 'Produits à recevoir'),
(433, 44210000, 'Impôts et taxes d\'Etat'),
(434, 44220000, 'Impôts et taxes pour les collectivi'),
(435, 44230000, 'Impôts et taxes recouvrables sur de'),
(436, 44240000, 'Impôts et taxes recouvrables sur de'),
(437, 44260000, 'Droits de douane'),
(438, 44280000, 'Autres impôts et taxes'),
(439, 44310000, 'T.V.A. facturée sur ventes'),
(440, 44320000, 'T.V.A. facturée sur prestations de'),
(441, 44330000, 'T.V.A. facturée sur travaux'),
(442, 44410000, 'Etat, T.V.A. due'),
(443, 44450000, 'Etat, dégrèvement T.V.A.'),
(444, 44490000, 'Etat, crédit de T.V.A. à reporter'),
(445, 44510000, 'T.V.A. récupérable sur immobilisati'),
(446, 44520000, 'T.V.A. récupérable sur achats'),
(447, 44530000, 'T.V.A. récupérable sur transport'),
(448, 44540000, 'T.V.A. récupérable sur services ext'),
(449, 4454000, 'Compte à créer'),
(450, 44550000, 'T.V.A. récupérable sur factures non'),
(451, 44560000, 'T.V.A. transférée par d\'autres enti'),
(452, 44710000, 'IGR BTPR 2019'),
(453, 44710050, 'IGR - CHAUFFEURS CONTRACTUELS'),
(454, 44711000, 'IGR AGENT CARTO'),
(455, 44712000, 'IGR CHEF D\'EQUIPE'),
(456, 44713000, 'IGR SUPERVISEUR'),
(457, 44714000, 'IGR AGENT ADMINISTRATIF'),
(458, 44715000, 'IGR GEOMATICIEN'),
(459, 44716000, 'IGR AGENT PREPARATEUR'),
(460, 44717000, 'IGR AGENT RECENSEUR'),
(461, 44718000, 'IGR TIC'),
(462, 44719000, 'IGR ADMINISTRATEURS SYSTEMES'),
(463, 44720000, 'IS PERSONNEL BTPR 2019'),
(464, 44720050, 'IS - CHAUFFEURS CONTRACTUELS'),
(465, 44721000, 'IS AGENT CARTO'),
(466, 44722000, 'IS CHEF D\'EQUIPE'),
(467, 44723000, 'IS SUPERVISEUR'),
(468, 44724000, 'IS AGENT ADMINISTRATIF'),
(469, 44725000, 'IS GEOMATICIEN'),
(470, 44726000, 'IS AGENT PREPARATEUR'),
(471, 44727000, 'IS AGENT RECENSEUR'),
(472, 44728000, 'IS TIC'),
(473, 44729000, 'IS ADMINISTRATEURS SYSTEMES'),
(474, 44730000, 'CN BTPR 2019'),
(475, 44730050, 'CN - CHAUFFEURS CONTRACTUELS'),
(476, 44731000, 'CN AGENT CARTO'),
(477, 44732000, 'CN CHEF D\'EQUIPE'),
(478, 44733000, 'CN SUPERVISEUR'),
(479, 44734000, 'CN AGENT ADMINISTRATIF'),
(480, 44735000, 'CN GEOMATICIEN'),
(481, 44736000, 'CN AGENT PREPARATEUR'),
(482, 44737000, 'CN AGENT RECENSEUR'),
(483, 44738000, 'CN TIC'),
(484, 44739000, 'CN ADMINISTRATEURS SYSTEMES'),
(485, 44740000, 'Contribution nationale de solidarit'),
(486, 44780000, 'Autres impôts et contributions'),
(487, 44860000, 'Charges à payer'),
(488, 44870000, 'Produits à recevoir'),
(489, 44910000, 'Etat, obligations cautionnées'),
(490, 44920000, 'Etat, avances et acomptes versés su'),
(491, 44930000, 'Etat, fonds de dotation à recevoir'),
(492, 44940000, 'Etat, subventions d\'investissement'),
(493, 44950000, 'Etat, subventions d\'exploitation à'),
(494, 44951000, 'ETAT DE CI SUBVENTIONS D\'EXPLOITATI'),
(495, 44952000, 'ARTCI SUBVENTION A RECEVOIR'),
(496, 44960000, 'Etat, subventions d\'équilibre à rec'),
(497, 44970000, 'Etat, avances sur subventions'),
(498, 44990000, 'Etat, fonds réglementé provisionné'),
(499, 45810000, 'Organismes internationaux, fonds de'),
(500, 45820000, 'Organismes internationaux, subventi'),
(501, 45821000, 'BAD SUBVENTION A RECEVOIR'),
(502, 45822000, 'BANQUE MONDIALE SUBVENTION A REVOIR'),
(503, 45823000, 'BADEA SUBVENTION A RECEVOIR'),
(504, 46110000, 'Apporteurs, apports en nature'),
(505, 46120000, 'Apporteurs, apports en numéraire'),
(506, 46130000, 'Apporteurs, capital appelé, non ver'),
(507, 46360000, 'Intérêts courus'),
(508, 47110000, 'Débiteurs divers'),
(509, 47131000, 'DEBITEUR ET CREDITEUR DIVERS'),
(510, 47150000, 'Rémunérations d’administrateurs non'),
(511, 47160000, 'Compte d’affacturage et de titrisat'),
(512, 47170000, 'Débiteurs divers - retenues de gara'),
(513, 47180000, 'Apport, compte de fusion et opérati'),
(514, 47190000, 'Bons de souscription d’actions et d'),
(515, 47210000, 'Créances sur cessions de titres de'),
(516, 47260000, 'Versements restant à effectuer sur'),
(517, 47310000, 'Mandants'),
(518, 47320000, 'Mandataires'),
(519, 47321000, 'UNFPA'),
(520, 47322000, 'UNFPA FINANCIER'),
(521, 47323000, 'UNFPA MANDATAIRE'),
(522, 47330000, 'Commettants'),
(523, 47340000, 'Commissionnaires'),
(524, 47390000, 'Etat, Collectivités publiques, fond'),
(525, 47460000, 'Compte de répartition périodique de'),
(526, 47470000, 'Compte de répartition périodique de'),
(527, 47510000, 'Compte-actif'),
(528, 47520000, 'Compte-passif'),
(529, 4761000, 'CHARGE CONSTATEE D\'AVANCE'),
(530, 47700000, 'PRODUITS CONSTATES D\'AVANCE RP'),
(531, 4770000, 'PRODUITS CONSTATES D\'AVANCE RP'),
(532, 47810000, 'Diminution des créances d’exploitat'),
(533, 47811000, 'Diminution des créances d’exploitat'),
(534, 47818000, 'Diminution des créances HAO'),
(535, 47820000, 'Diminution des créances financières'),
(536, 47830000, 'Augmentation des dettes d’exploitat'),
(537, 47831000, 'Augmentation des dettes d’exploitat'),
(538, 47838000, 'Augmentation des dettes HAO'),
(539, 47840000, 'Augmentation des dettes financières'),
(540, 47860000, 'Différences d’évaluation sur instru'),
(541, 47880000, 'Différences compensées par couvertu'),
(542, 47910000, 'Augmentation des créances d’exploit'),
(543, 47911000, 'Augmentation des créances d’exploit'),
(544, 47918000, 'Augmentation des créances HAO'),
(545, 47920000, 'Augmentation des créances financièr'),
(546, 47930000, 'Diminution des dettes d’exploitatio'),
(547, 47931000, 'Diminution des dettes d’exploitatio'),
(548, 47938000, 'Diminution des dettes HAO'),
(549, 47940000, 'Diminution des dettes financières'),
(550, 47970000, 'Différences d’évaluation sur instru'),
(551, 47980000, 'Différences compensées par couvertu'),
(552, 48110000, 'Immobilisations incorporelles'),
(553, 48120000, 'Immobilisations corporelles'),
(554, 48130000, 'Versements restant à effectuer sur'),
(555, 48160000, 'Réserve de propriété (3)'),
(556, 48161000, 'Réserve de propriété - immobilisati'),
(557, 48162000, 'Réserve de propriété - immobilisati'),
(558, 48170000, 'Retenues de garantie (3)'),
(559, 48171000, 'Retenues de garantie - immobilisat'),
(560, 48172000, 'Retenues de garantie - immobilisat'),
(561, 48180000, 'Factures non parvenues (3)'),
(562, 48181000, 'Factures non parvenues - immobilisa'),
(563, 48182000, 'Factures non parvenues - immobilisa'),
(564, 48210000, 'Immobilisations incorporelles'),
(565, 48220000, 'Immobilisations corporelles'),
(566, 48510000, 'En compte, immobilisations incorpor'),
(567, 48520000, 'En compte, immobilisations corporel'),
(568, 48530000, 'Effets à recevoir, immobilisations'),
(569, 48540000, 'Effets à recevoir, immobilisations'),
(570, 48550000, 'Effets escomptés non échus'),
(571, 48560000, 'Immobilisations financières'),
(572, 48570000, 'Retenues de garantie'),
(573, 48580000, 'Factures à établir'),
(574, 49110000, 'Créances litigieuses'),
(575, 49120000, 'Créances douteuses'),
(576, 49620000, 'Associés, comptes courants'),
(577, 49630000, 'Associés, opérations faites en comm'),
(578, 49660000, 'Groupe, comptes courants'),
(579, 49850000, 'Créances sur cessions d\'immobilisat'),
(580, 49860000, 'Créances sur cessions de titres de'),
(581, 49880000, 'Autres créances H.A.O.'),
(582, 49910000, 'Sur opérations d\'exploitation'),
(583, 49980000, 'Sur opérations H.A.O.'),
(584, 50110000, 'Titres du Trésor à court terme'),
(585, 50120000, 'Titres d\'organismes financiers'),
(586, 50130000, 'Bons de caisse à court terme'),
(587, 50160000, 'Frais d’acquisition des titres de T'),
(588, 50210000, 'Actions ou parts propres'),
(589, 50220000, 'Actions cotées'),
(590, 50230000, 'Actions non cotées'),
(591, 50240000, 'Actions démembrées (certificats d\'i'),
(592, 50250000, 'Autres actions'),
(593, 50260000, 'Frais d’acquisition des actions'),
(594, 50310000, 'Obligations émises par l\'entité et'),
(595, 50320000, 'Obligations cotées'),
(596, 50330000, 'Obligations non cotées'),
(597, 50350000, 'Autres obligations'),
(598, 50360000, 'Frais d’acquisition des obligations'),
(599, 50420000, 'Bons de souscription d\'actions'),
(600, 50430000, 'Bons de souscription d\'obligations'),
(601, 50610000, 'Titres du Trésor et bons de caisse'),
(602, 50620000, 'Actions'),
(603, 50630000, 'Obligations'),
(604, 51810000, 'Warrants'),
(605, 51820000, 'Billets de fonds'),
(606, 51850000, 'Chèques de voyage'),
(607, 51860000, 'Coupons échus'),
(608, 51870000, 'Intérêts échus des obligations'),
(609, 52110000, 'Banques RGPH 2019'),
(610, 52610000, 'Banque, intérêts courus charges à p'),
(611, 52670000, 'Banque, intérêts courus produits à'),
(612, 55110000, 'MONNEY ELECTRONIQUE MTN-MFS'),
(613, 57110000, 'CAISSE RGPH'),
(614, 57112000, 'TRESO-APPLICATION'),
(615, 585000, 'APPORT EN CAISSE'),
(616, 585500, 'ALIMENTATION -APPLICATION'),
(617, 588000, 'VIREMENT MTN'),
(618, 60110000, 'dans la Région (5)'),
(619, 60120000, 'hors Région (5)'),
(620, 60130000, 'aux entités du groupe dans la Régio'),
(621, 60140000, 'aux entités du groupe hors Région'),
(622, 60150000, 'frais sur achats (6)'),
(623, 60190000, 'Rabais, Remises et Ristournes obten'),
(624, 60210000, 'dans la Région (5)'),
(625, 60220000, 'hors Région (5)'),
(626, 60230000, 'aux entités du groupe dans la Régio'),
(627, 60240000, 'aux entités du groupe hors Région'),
(628, 60250000, 'frais sur achats (6)'),
(629, 60290000, 'Rabais, Remises et Ristournes obten'),
(630, 60310000, 'Variations des stocks de marchandis'),
(631, 60320000, 'Variations des stocks de matières p'),
(632, 60330000, 'Variations des stocks d\'autres appr'),
(633, 60410000, 'Matières consommables'),
(634, 60420000, 'Matières combustibles'),
(635, 60430000, 'Produits d\'entretien'),
(636, 60440000, 'Fournitures d\'atelier et d\'usine'),
(637, 60450000, 'frais sur achats (6)'),
(638, 60460000, 'Fournitures de magasin'),
(639, 60470000, 'Fournitures de bureau'),
(640, 60490000, 'Rabais, Remises et Ristournes obten'),
(641, 60510000, 'Fournitures non stockables -Eau'),
(642, 60520000, 'Fournitures non stockables - Electr'),
(643, 60530000, 'CARBURANT BTPR ET DIVERS'),
(644, 605301000, 'CARBURANT AGENT'),
(645, 60530100, 'CARBURANT AGENT'),
(646, 605302000, 'CARBURANT C E'),
(647, 60530200, 'CARBURANT C E'),
(648, 605303000, 'CARBURANT SUPERVISEUR'),
(649, 60530300, 'CARBURANT SUPERVISEUR'),
(650, 605304000, 'CARBURANT MISSION'),
(651, 60530400, 'CARBURANT MISSION'),
(652, 60540000, 'Fournitures d\'entretien non stockab'),
(653, 60550000, 'Fournitures de bureau non stockable'),
(654, 60560000, 'Achats de petit matériel et outilla'),
(655, 60570000, 'Achats d\'études et prestations de s'),
(656, 60580000, 'Achats de travaux, matériels et équ'),
(657, 60590000, 'Rabais, Remises et Ristournes obten'),
(658, 60810000, 'Emballages perdus'),
(659, 60820000, 'Emballages récupérables non identif'),
(660, 60830000, 'Emballages à usage mixte'),
(661, 60850000, 'frais sur achats (6)'),
(662, 60890000, 'Rabais, Remises et Ristournes obten'),
(663, 6141000, 'TRANSPORT/SALAIRE PERSONEL BTPR'),
(664, 6141050, 'TRANSPORT/SALAIRE ADM SYST'),
(665, 6141070, 'TRANSPORT - GEOMATICIEN'),
(666, 61411000, 'TRANSPORT/SALAIRE PERSONEL BTPR'),
(667, 61411050, 'TRANSPORT/SALAIRE ADM SYST'),
(668, 61411070, 'TRANSPORT - GEOMATICIEN'),
(669, 6142000, 'TRANSPORT/SALAIRE CHAUFFEUR'),
(670, 61421000, 'TRANSPORT/SALAIRE CHAUFFEUR'),
(671, 61610000, 'TRANSPORT SUR PLIS'),
(672, 61810000, 'Voyages et déplacements'),
(673, 61820000, 'Transports entre établissements ou'),
(674, 61830000, 'Transports administratifs'),
(675, 62210000, 'Locations de terrains'),
(676, 62220000, 'Locations de bâtiments'),
(677, 62230000, 'Locations de matériels et outillage'),
(678, 62240000, 'Malis sur emballages'),
(679, 62250000, 'Locations d\'emballages'),
(680, 62260000, 'Fermages et loyers du foncier'),
(681, 62280000, 'Locations et charges locatives dive'),
(682, 62320000, 'Crédit-bail immobilier'),
(683, 62330000, 'Crédit-bail mobilier'),
(684, 62340000, 'Location-vente'),
(685, 62380000, 'Autres contrats de location-acquisi'),
(686, 62410000, 'Entretien et réparations des biens'),
(687, 62411000, 'Entretien et réparations des biens'),
(688, 62420000, 'Entretien et réparations des biens'),
(689, 62430000, 'Maintenance'),
(690, 62440000, 'Charges de démantèlement et remise'),
(691, 62480000, 'Autres entretiens et réparations'),
(692, 62510000, 'Assurances multirisques'),
(693, 62520000, 'Assurances matériel de transport'),
(694, 62530000, 'Assurances risques d\'exploitation'),
(695, 62540000, 'Assurances responsabilité du produc'),
(696, 62550000, 'Assurances insolvabilité clients'),
(697, 62570000, 'Assurances transport sur ventes'),
(698, 62580000, 'Autres primes d\'assurances'),
(699, 62610000, 'Etudes et recherches'),
(700, 62650000, 'Documentation générale'),
(701, 62660000, 'Documentation technique'),
(702, 62710000, 'Annonces, insertions'),
(703, 62720000, 'Catalogues, imprimés publicitaires'),
(704, 62730000, 'Echantillons'),
(705, 62740000, 'Foires et expositions'),
(706, 62750000, 'Publications'),
(707, 62760000, 'Cadeaux à la clientèle'),
(708, 62770000, 'Frais de colloques, séminaires, con'),
(709, 62780000, 'Autres charges de publicité et rela'),
(710, 62810000, 'Frais de téléphone'),
(711, 62820000, 'Frais de télex'),
(712, 62830000, 'Frais de télécopie'),
(713, 62880000, 'Autres frais de télécommunications'),
(714, 63110000, 'Frais sur titres (vente, garde)'),
(715, 63120000, 'Frais sur effets'),
(716, 63130000, 'Location de coffres'),
(717, 63140000, 'Commissions d\'affacturage et de tit'),
(718, 63150000, 'Commissions sur cartes de crédit'),
(719, 63160000, 'Frais d\'émission d\'emprunts'),
(720, 63170000, 'FRAIS D\'ENVOIS MOBILE MTN'),
(721, 63172000, 'AUTRE FRAIS D\'ENVOIE ORANGE-MTN'),
(722, 63180000, 'Autres frais bancaires'),
(723, 63220000, 'Commissions et courtages sur ventes'),
(724, 63240000, 'Honoraires des professions règlemen'),
(725, 63250000, 'Frais d\'actes et de contentieux'),
(726, 63260000, 'Rémunérations d’affacturage et de t'),
(727, 63270000, 'FRAIS D\'ENTRETIEN ET SURVEILLANCE'),
(728, 63280000, 'DIVERS FRAIS'),
(729, 63300000, 'FORMATION DU PERSONNEL'),
(730, 63420000, 'Redevances pour brevets, licences'),
(731, 63430000, 'Redevances pour logiciels'),
(732, 63440000, 'Redevances pour marques'),
(733, 63450000, 'Redevances pour sites internet'),
(734, 63460000, 'Redevances pour concessions, droits'),
(735, 63510000, 'Cotisations'),
(736, 63580000, 'Concours divers'),
(737, 63710000, 'Personnel intérimaire'),
(738, 63720000, 'Personnel détaché ou prêté à l\'enti'),
(739, 63810000, 'Frais de recrutement du personnel'),
(740, 63820000, 'Frais de déménagement'),
(741, 63830000, 'Réceptions'),
(742, 63840000, 'Missions'),
(743, 63850000, 'Charges de copropriété'),
(744, 63880000, 'Charges externes diverses'),
(745, 64110000, 'Impôts fonciers et taxes annexes'),
(746, 64120000, 'Patentes, licences et taxes annexes'),
(747, 64130000, 'Taxes sur appointements et salaires'),
(748, 64140000, 'Taxes d\'apprentissage'),
(749, 64150000, 'Formation professionnelle continue'),
(750, 64180000, 'Autres impôts et taxes directs'),
(751, 64610000, 'Droits de mutation'),
(752, 64620000, 'Droits de timbre'),
(753, 64630000, 'Taxes sur les véhicules de société'),
(754, 64640000, 'Vignettes'),
(755, 64680000, 'Autres droits d\'enregistrement'),
(756, 64710000, 'Pénalités d\'assiette, impôts direct'),
(757, 64720000, 'Pénalités d\'assiette, impôts indire'),
(758, 64730000, 'Pénalités de recouvrement, impôts d'),
(759, 64740000, 'Pénalités de recouvrement, impôts i'),
(760, 64780000, 'Autres pénalités et amendes fiscale'),
(761, 65110000, 'PERTES SUR CREANCES CLIENTS ET AUTR'),
(762, 65150000, 'ARRONDIT ET PERTE / CREANCE'),
(763, 65151000, 'PERTES /Autres débiteurs'),
(764, 65410000, 'Immobilisations incorporelles'),
(765, 65420000, 'Immobilisations corporelles'),
(766, 65810000, 'Indemnités de fonction et autres ré'),
(767, 65820000, 'Dons'),
(768, 65830000, 'Mécénat'),
(769, 65880000, 'Autres charges diverses'),
(770, 65910000, 'sur risques à court terme'),
(771, 65930000, 'sur stocks'),
(772, 65940000, 'sur créances'),
(773, 65980000, 'Autres charges pour dépréciations'),
(774, 66110000, 'Appointements salaires et commissio'),
(775, 66111000, 'SALAIRE AGENT CARTO'),
(776, 66112000, 'SALAIRE CHEF D\'EQUIPE'),
(777, 66113000, 'SALAIRE SUPERVISEUR'),
(778, 66114000, 'SALAIRE ADMINISTRATEUR SYSTEME'),
(779, 66115000, 'SALAIRE GEOMATICIEN'),
(780, 66116000, 'SALAIRE PERSONNEL BTPR 2019'),
(781, 66116050, 'SALAIRE CHAUFFEUR CONTRACTUEL'),
(782, 66117000, 'SALAIRE AGENT PREPARATEUR'),
(783, 66118000, 'SALAIRE AGENT RECENSEUR'),
(784, 66119000, 'OPERATEUR DE SAISIE'),
(785, 66120000, 'Primes et gratifications'),
(786, 66121000, 'GRATIFICATION BTPR'),
(787, 66122000, 'GRATIFICATION ADM SYSTEME'),
(788, 66130000, 'Congés payés'),
(789, 66131000, 'CONGES PAYES BTPR'),
(790, 66132000, 'CONGES PAYES ADM SYSTEME'),
(791, 66140000, 'Indemnités de préavis, de licenciem'),
(792, 66150000, 'Indemnités de maladie versées aux t'),
(793, 66160000, 'Supplément familial'),
(794, 66170000, 'Avantages en nature'),
(795, 66180000, 'PERDIEM DR/AUTRE'),
(796, 66181000, 'PERDIEM AGENT'),
(797, 66182000, 'PERDIEM CE'),
(798, 66183000, 'PERDIEM SUPERVISEUR'),
(799, 66184000, 'PERDIEM MISSION ET AUTRE'),
(800, 66185000, 'PERDIEM AGENT AEJ'),
(801, 66210000, 'Appointements salaires et commissio'),
(802, 66220000, 'Primes et gratifications'),
(803, 66230000, 'Congés payés'),
(804, 66240000, 'Indemnités de préavis, de licenciem'),
(805, 66250000, 'Indemnités de maladie versées aux t'),
(806, 66260000, 'Supplément familial'),
(807, 66270000, 'Avantages en nature'),
(808, 66280000, 'Autres rémunérations directes'),
(809, 66310000, 'Indemnités de logement'),
(810, 66320000, 'Indemnités de représentation'),
(811, 66330000, 'Indemnités d\'expatriation'),
(812, 66340000, 'Indemnités de transport'),
(813, 66380000, 'Autres indemnités et avantages dive'),
(814, 66410000, 'Charges sociales sur rémunération d'),
(815, 66420000, 'Charges sociales sur rémunération d'),
(816, 66610000, 'Rémunération du travail de l\'exploi'),
(817, 66620000, 'CHARGE SOCIALE CMU'),
(818, 66710000, 'Personnel intérimaire'),
(819, 66720000, 'Personnel détaché ou prêté à l’enti'),
(820, 66810000, 'Versements aux Syndicats et Comités'),
(821, 66820000, 'Versements aux Comités d\'hygiène et'),
(822, 66830000, 'Versements et contributions aux aut'),
(823, 66840000, 'Médecine du travail et pharmacie'),
(824, 66850000, 'Assurances et organismes de santé'),
(825, 66860000, 'Assurances retraite et fonds de pen'),
(826, 66870000, 'Majorations et pénalités sociales'),
(827, 66880000, 'Charges sociales diverses'),
(828, 67110000, 'Emprunts obligataires'),
(829, 67120000, 'Emprunts auprès des établissements'),
(830, 67130000, 'Dettes liées à des participations'),
(831, 67140000, 'Primes de remboursement des obligat'),
(832, 67220000, 'Intérêts dans loyers de location-ac'),
(833, 67230000, 'Intérêts dans loyers de location-ac'),
(834, 67240000, 'Intérêts dans loyers de location-ac'),
(835, 67280000, 'Intérêts dans loyers des autres loc'),
(836, 67410000, 'Avances reçues et dépôts créditeurs'),
(837, 67420000, 'Comptes courants bloqués'),
(838, 67430000, 'Intérêts sur obligations cautionnée'),
(839, 67440000, 'Intérêts sur dettes commerciales'),
(840, 67450000, 'Intérêts bancaires et sur opération'),
(841, 67480000, 'Intérêts sur dettes diverses'),
(842, 67710000, 'Pertes sur cessions de titres de pl'),
(843, 67720000, 'Malis provenant d’attribution gratu'),
(844, 67810000, 'sur rentes viagères'),
(845, 67820000, 'sur opérations financières'),
(846, 67840000, 'sur instruments de trésorerie'),
(847, 67910000, 'sur risques financiers'),
(848, 67950000, 'sur titres de placement'),
(849, 67980000, 'Autres charges pour dépréciations e'),
(850, 68120000, 'Dotations aux amortissements des im'),
(851, 68130000, 'Dotations aux amortissements des im'),
(852, 69110000, 'Dotations aux provisions pour risqu'),
(853, 69130000, 'Dotations aux dépréciations des imm'),
(854, 69140000, 'Dotations aux dépréciations des imm'),
(855, 69710000, 'Dotations aux provisions pour risqu'),
(856, 69720000, 'Dotations aux dépréciations des imm'),
(857, 70110000, 'dans la Région (7)'),
(858, 70120000, 'hors Région (7)'),
(859, 70130000, 'aux entités du groupe dans la Régio'),
(860, 70140000, 'aux entités du groupe hors Région'),
(861, 70150000, 'sur internet'),
(862, 70190000, 'Rabais, remises, ristournes accordé'),
(863, 70210000, 'dans la Région (7)'),
(864, 70220000, 'hors Région (7)'),
(865, 70230000, 'aux entités du groupe dans la Régio'),
(866, 70240000, 'aux entités du groupe hors Région'),
(867, 70250000, 'sur internet'),
(868, 70290000, 'Rabais, remises, ristournes accordé'),
(869, 70310000, 'dans la Région (7)'),
(870, 70320000, 'hors Région (7)'),
(871, 70330000, 'aux entités du groupe dans la Régio'),
(872, 70340000, 'aux entités du groupe hors Région'),
(873, 70350000, 'sur internet'),
(874, 70390000, 'Rabais, remises, ristournes accordé'),
(875, 70410000, 'dans la Région (7)'),
(876, 70420000, 'hors Région (7)'),
(877, 70430000, 'aux entités du groupe dans la Régio'),
(878, 70440000, 'aux entités du groupe hors Région'),
(879, 70450000, 'sur internet'),
(880, 70490000, 'Rabais, remises, ristournes accordé'),
(881, 70510000, 'dans la Région (7)'),
(882, 70520000, 'hors Région (7)'),
(883, 70530000, 'aux entités du groupe dans la Régio'),
(884, 70540000, 'aux entités du groupe hors Région'),
(885, 70550000, 'sur internet'),
(886, 70590000, 'Rabais, remises, ristournes accordé'),
(887, 70610000, 'dans la Région (7)'),
(888, 70620000, 'hors Région (7)'),
(889, 70630000, 'aux entités du groupe dans la Régio'),
(890, 70640000, 'aux entités du groupe hors Région'),
(891, 70650000, 'sur internet'),
(892, 70690000, 'Rabais, remises, ristournes accordé'),
(893, 70710000, 'Ports, emballages perdus et autres'),
(894, 70720000, 'Commissions et courtages(8)'),
(895, 70730000, 'Locations et redevances de location'),
(896, 70740000, 'Bonis sur reprises et cessions d\'em'),
(897, 70750000, 'Mise à disposition de personnel (8)'),
(898, 70760000, 'Redevances pour brevets, logiciels,'),
(899, 70770000, 'Services exploités dans l\'intérêt d'),
(900, 70780000, 'Autres produits accessoires'),
(901, 71810000, 'SUBVENTION ETAT'),
(902, 71820000, 'Versées par les organismes internat'),
(903, 71830000, 'Versées par des tiers'),
(904, 72210000, 'immobilisations corporelles (hors'),
(905, 72220000, 'immobilisations corporelles (actifs'),
(906, 73410000, 'Produits en cours'),
(907, 73420000, 'Travaux en cours'),
(908, 73510000, 'Etudes en cours'),
(909, 73520000, 'Prestations de services en cours'),
(910, 73710000, 'Produits intermédiaires'),
(911, 73720000, 'Produits résiduels'),
(912, 75210000, 'Quote-part transférée de pertes (co'),
(913, 75250000, 'Bénéfices attribués par transfert ('),
(914, 75410000, 'Immobilisations incorporelles'),
(915, 75420000, 'Immobilisations corporelles'),
(916, 75810000, 'Indemnités de fonction et autres ré'),
(917, 75820000, 'Indemnités d’assurances reçues'),
(918, 75880000, 'Autres produits divers'),
(919, 75910000, 'sur risques à court terme'),
(920, 75930000, 'sur stocks'),
(921, 75940000, 'sur créances'),
(922, 75980000, 'sur autres charges pour dépréciatio'),
(923, 77120000, 'Intérêts de prêts'),
(924, 77130000, 'Intérêts sur créances diverses'),
(925, 77180000, 'Compte à créer'),
(926, 77210000, 'Revenus des titres de participation'),
(927, 77220000, 'Revenus autres titres immobilisés'),
(928, 77450000, 'Revenus des obligations'),
(929, 77460000, 'Revenus des titres de placement'),
(930, 77810000, 'sur rentes viagères'),
(931, 77820000, 'sur opérations financières'),
(932, 77840000, 'INTERET FINANCIER'),
(933, 77910000, 'sur risques financiers'),
(934, 77950000, 'sur titres de placement'),
(935, 77980000, 'sur autres charges pour dépréciatio'),
(936, 79110000, 'pour risques et charges'),
(937, 79130000, 'des immobilisations incorporelles'),
(938, 79140000, 'des immobilisations corporelles'),
(939, 79710000, 'pour risques et charges'),
(940, 79720000, 'des immobilisations financières'),
(941, 89110000, 'Activités exercées dans l\'Etat'),
(942, 89120000, 'Activités exercées dans les autres'),
(943, 89130000, 'Activités exercées hors Région'),
(944, 89910000, 'Dégrèvements'),
(945, 89940000, 'Annulations pour pertes rétroactive'),
(946, 90110000, 'Crédits confirmés obtenus'),
(947, 90120000, 'Emprunts restant à encaisser'),
(948, 90130000, 'Facilités de financement renouvelab'),
(949, 90140000, 'Facilités d\'émission'),
(950, 90180000, 'Autres engagements de financement o'),
(951, 90210000, 'Avals obtenus'),
(952, 90220000, 'Cautions, garanties obtenues'),
(953, 90230000, 'Hypothèques obtenues'),
(954, 90240000, 'Effets endossés par des tiers'),
(955, 90280000, 'Autres garanties obtenues'),
(956, 90310000, 'Achats de marchandises à terme'),
(957, 90320000, 'Achats à terme de devises'),
(958, 90330000, 'Commandes fermes des clients'),
(959, 90380000, 'Autres engagements réciproques'),
(960, 90410000, 'Abandons de créances conditionnels'),
(961, 90430000, 'Ventes avec clause de réserve de pr'),
(962, 90480000, 'Divers engagements obtenus'),
(963, 90510000, 'Crédits accordés non décaissés'),
(964, 90580000, 'Autres engagements de financement a'),
(965, 90610000, 'Avals accordés'),
(966, 90620000, 'Cautions, garanties accordées'),
(967, 90630000, 'Hypothèques accordées'),
(968, 90640000, 'Effets endossés par l\'entité'),
(969, 90680000, 'Autres garanties accordées'),
(970, 90710000, 'Ventes de marchandises à terme'),
(971, 90720000, 'Ventes à terme de devises'),
(972, 90730000, 'Commandes fermes aux fournisseurs'),
(973, 90780000, 'Autres engagements réciproques'),
(974, 90810000, 'Annulations conditionnelles de dett'),
(975, 90820000, 'Engagements de retraite'),
(976, 90830000, 'Achats avec clause de réserve de pr'),
(977, 90880000, 'Divers engagements accordés');

-- --------------------------------------------------------

--
-- Structure de la table `licences`
--

CREATE TABLE `licences` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_30_113500_create_comments_table', 1),
(4, '2019_04_03_071839_create_permission_tables', 1),
(5, '2020_01_25_021004_create_personnels_table', 1),
(6, '2020_01_25_025220_create_fonctions_table', 1),
(7, '2020_01_26_190324_create_caisses_table', 1),
(8, '2020_02_02_081254_create_budgets_table', 1),
(9, '2020_02_02_090910_create_abscences_table', 1),
(10, '2020_02_08_094647_create_paies_table', 1),
(11, '2020_03_26_085441_create_fournisseurs_table', 1),
(12, '2020_08_13_234927_create_portefeuilles_table', 1),
(13, '2020_08_29_043012_create_formations_table', 1),
(14, '2020_08_31_135843_create_configurations_table', 1),
(15, '2020_09_13_163557_create_licences_table', 1),
(16, '2021_06_05_133511_create_campagnes_table', 1),
(17, '2021_09_01_200909_create_direction_personnel_table', 1),
(18, '2023_08_28_200224_create_perso_recruts_table', 2),
(19, '2023_09_02_140114_create_engins_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 3),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11),
(3, 'App\\User', 12),
(3, 'App\\User', 13),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 16),
(3, 'App\\User', 17),
(3, 'App\\User', 18),
(3, 'App\\User', 19),
(3, 'App\\User', 20),
(3, 'App\\User', 21),
(3, 'App\\User', 22),
(2, 'App\\User', 24),
(5, 'App\\User', 25),
(1, 'App\\User', 26),
(2, 'App\\User', 27),
(4, 'App\\User', 28),
(1, 'App\\User', 29),
(3, 'App\\User', 29),
(2, 'App\\User', 30),
(3, 'App\\User', 30),
(1, 'App\\User', 31),
(3, 'App\\User', 31),
(1, 'App\\User', 32),
(3, 'App\\User', 32),
(1, 'App\\User', 33),
(3, 'App\\User', 33),
(1, 'App\\User', 34),
(3, 'App\\User', 34),
(2, 'App\\User', 35),
(3, 'App\\User', 35),
(3, 'App\\User', 36),
(3, 'App\\User', 37),
(3, 'App\\User', 38),
(3, 'App\\User', 39),
(3, 'App\\User', 40),
(3, 'App\\User', 41),
(3, 'App\\User', 42),
(3, 'App\\User', 43),
(3, 'App\\User', 44),
(3, 'App\\User', 45),
(3, 'App\\User', 46),
(3, 'App\\User', 48),
(3, 'App\\User', 49);

-- --------------------------------------------------------

--
-- Structure de la table `paies`
--

CREATE TABLE `paies` (
  `id` bigint UNSIGNED NOT NULL,
  `personnel_id` int UNSIGNED NOT NULL,
  `prime` int DEFAULT NULL,
  `transport` int DEFAULT NULL,
  `mise_route` int DEFAULT NULL,
  `conges` int DEFAULT NULL,
  `gratification` int DEFAULT NULL,
  `carburant` int DEFAULT NULL,
  `communication` int DEFAULT NULL,
  `perdiem` int DEFAULT NULL,
  `internet` int DEFAULT NULL,
  `guide` int DEFAULT NULL,
  `prime_ni` int DEFAULT NULL,
  `avance` int DEFAULT NULL,
  `actif` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paies`
--

INSERT INTO `paies` (`id`, `personnel_id`, `prime`, `transport`, `mise_route`, `conges`, `gratification`, `carburant`, `communication`, `perdiem`, `internet`, `guide`, `prime_ni`, `avance`, `actif`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-02 00:00:00', '2023-08-11 17:35:06'),
(2, 12, NULL, 500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-02 00:00:00', '2023-08-11 17:35:06'),
(3, 10, NULL, 800000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-02 00:00:00', '2023-08-11 17:44:10'),
(4, 10, NULL, 200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-02 00:00:00', '2023-08-11 17:45:16'),
(5, 12, NULL, 200000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-08-02 00:00:00', '2023-08-11 17:45:16');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'access_admin', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(2, 'all_personnels', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(3, 'all_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(4, 'view_users', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(5, 'add_users', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(6, 'edit_users', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(7, 'delete_users', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(8, 'view_all_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(9, 'add_all_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(10, 'edit_all_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(11, 'delete_all_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(12, 'view_permissions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(13, 'add_permissions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(14, 'edit_permissions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(15, 'delete_permissions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(16, 'view_roles', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(17, 'add_roles', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(18, 'edit_roles', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(19, 'delete_roles', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(20, 'view_personnels', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(21, 'add_personnels', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(22, 'edit_personnels', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(23, 'delete_personnels', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(24, 'view_directions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(25, 'add_directions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(26, 'edit_directions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(27, 'delete_directions', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(28, 'view_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(29, 'add_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(30, 'edit_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(31, 'delete_caisses', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(32, 'view_budgets', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(33, 'add_budgets', 'web', '2021-09-21 23:18:37', '2021-09-21 23:18:37'),
(34, 'edit_budgets', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(35, 'delete_budgets', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(36, 'view_imputations', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(37, 'add_imputations', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(38, 'edit_imputations', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(39, 'delete_imputations', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(40, 'view_all_personnels', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(41, 'add_all_personnels', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(42, 'edit_all_personnels', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(43, 'delete_all_personnels', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(44, 'view_depenses', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(45, 'add_depenses', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(46, 'edit_depenses', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(47, 'delete_depenses', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(48, 'view_fournisseurs', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(49, 'add_fournisseurs', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(50, 'edit_fournisseurs', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(51, 'delete_fournisseurs', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(52, 'view_portefeuilles', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(53, 'add_portefeuilles', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(54, 'edit_portefeuilles', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(55, 'delete_portefeuilles', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(56, 'view_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(57, 'add_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(58, 'edit_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(59, 'delete_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(60, 'xlsPaies_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(61, 'pdfPaies_downloads', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(62, 'view_abscences', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(63, 'add_abscences', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(64, 'edit_abscences', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(65, 'delete_abscences', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(66, 'view_paies', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(67, 'add_paies', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(68, 'edit_paies', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38'),
(69, 'delete_paies', 'web', '2021-09-21 23:18:38', '2021-09-21 23:18:38');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint UNSIGNED NOT NULL,
  `matricule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenoms` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction_id` int UNSIGNED DEFAULT NULL,
  `mm_numero` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction_id` int DEFAULT NULL,
  `numero_equipe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` float(5,2) DEFAULT NULL,
  `note2` float(6,2) DEFAULT NULL,
  `rank` int DEFAULT '0',
  `is_admited` int DEFAULT '0',
  `admited_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int UNSIGNED DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `matricule`, `nom`, `prenoms`, `fonction_id`, `mm_numero`, `contact`, `direction_id`, `numero_equipe`, `note`, `note2`, `rank`, `is_admited`, `admited_at`, `created_by`, `etat`, `priority`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'MA122', 'SANOH', 'Ousmane ', 3, '+224 620-28-01-98', '+224 620-28-01-98', 12, '4', 17.75, NULL, 13, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(2, '9YN20', 'BANGOURA', 'Alpha ', 3, '+224 620-38-83-26', '+224 620-38-83-26', 9, '1', 17.25, NULL, 1, 1, '2023-08-31 11:30:33', 1, 2, 19, NULL, '2023-08-31 11:30:33', '2023-08-31 13:01:33'),
(3, 'Q7LP2', ' MASSADOUNO', 'Blaise  Bakary', 3, '+224 625-30-81-07', '+224 625-30-81-07', 11, '3', 17.25, NULL, 9, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(4, 'OQ11V', ' GUEMOU', 'Paul', 3, '+224 620-15-91-57', '+224 620-15-91-57', 15, '7', 17.25, NULL, 25, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(5, 'JQVXK', ' GUILAVOGUI', 'Togba', 20, '+224 628-09-05-74', '+224 628-09-05-74', 11, '3', 17.25, NULL, 10, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(6, '11H2W', 'BARRY', 'Mamadou  Maladho ', 3, '+224 623-45-87-17', '+224 623-45-87-17', 14, '6', 17.12, NULL, 21, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(7, '5K2MW', ' BARRY', 'Boubacar Houdy', 3, '+224 620-60-42-89', '+224 620-60-42-89', 16, '8', 16.75, NULL, 29, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(8, '216D1', 'CAMARA', 'Fodé Elvis ', 3, '+224 628-89-23-91', '+224 628-89-23-91', 13, '5', 16.75, NULL, 17, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(9, 'C00071', ' LAMAH', 'Jerome Moriba', 20, '+224 628-06-31-31', '+224 628-06-31-31', 13, '5', 16.75, NULL, 18, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(10, '0CD02', 'DIALLO', 'Mamadou Saliou', 0, '+224 625-29-63-07', '+224 625-29-63-07', 0, '', 16.75, NULL, 1, 1, '2023-09-01 19:00:40', 1, 1, 18, NULL, '2023-09-01 19:00:40', '2023-09-01 19:00:40'),
(11, 'D2AX8', ' FOFONA', 'Mohamed Lamine', 20, '+224 622-91-00-49', '+224 622-91-00-49', 15, '7', 16.50, NULL, 26, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(12, '156G2', 'CAMARA', 'Alkaly Mohammed ', 3, '+224 621-55-12-85', '+224 621-55-12-85', 10, '2', 16.25, NULL, 5, 1, '2023-08-31 11:30:34', 1, 2, 19, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(13, 'K814D', ' CAMARA', 'Mohamed Nourdine', 20, '+224 621-18-13-38', '+224 621-18-13-38', 9, '1', 16.25, NULL, 2, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(14, '5ETZC', 'MAMY', 'Payard Blanchard ', 20, '+224 626-54-81-60', '+224 626-54-81-60', 16, '8', 16.25, NULL, 30, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(15, '6GZ21', 'TOUNKARA', 'Aïssatou ', 20, '+224 622-30-57-04', '+224 622-30-57-04', 13, '5', 16.00, NULL, 19, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(16, 'K0T11', ' DIALLO', 'Mamadou Lamarana Maria', 20, '+224 621-81-35-87', '+224 621-81-35-87', 14, '6', 16.00, NULL, 23, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(17, '849WB', 'TOURE', 'Moussa ', 20, '+224 628-32-19-95', '+224 628-32-19-95', 15, '7', 16.00, NULL, 27, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(18, '937P0', ' BILIVOGUI', 'Denise Vaba', 20, '+224 624-19-81-40', '+224 624-19-81-40', 10, '2', 15.88, NULL, 6, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(19, '352Q1', 'SYLLA', 'Ismael  ', 20, '+224 628-50-59-60', '+224 628-50-59-60', 10, '2', 15.75, NULL, 7, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(20, 'E0243', ' SACKO', 'Salihan', 20, '+224 620-35-50-55 ', '+224 620-35-50-55 ', 12, '4', 15.75, NULL, 14, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(21, '1F9A7', ' SIDIBE', 'Sory', 20, '+224 626-96-21-54', '+224 626-96-21-54', 16, '8', 15.50, NULL, 31, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(22, '2I874', ' BANGOURA', 'Oumar', 20, '+224 623-06-66-47', '+224 623-06-66-47', 9, '1', 15.25, NULL, 3, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(23, 'M2E21', 'DIALLO', 'Tiguidanké ', 20, '+224 620-91-45-94', '+224 620-91-45-94', 16, '8', 15.25, NULL, 32, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(24, 'C00072', 'CAMARA', 'Souleymane ', 20, '+224 628-41-44-92', '+224 628-41-44-92', 12, '4', 15.12, NULL, 15, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(25, '7W121', 'SACKO', 'Aly Badra ', 20, '+224 623-24-09-96', '+224 623-24-09-96', 15, '7', 15.00, NULL, 28, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(26, 'RS12Z', ' BEIMY', 'Blaise', 20, '+224 620-64-74-72', '+224 620-64-74-72', 10, '2', 15.00, NULL, 8, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(27, '23211', ' TOUNKARA', 'Jean  Fara', 20, '+224 628-67-90-65', '+224 628-67-90-65', 11, '3', 15.00, NULL, 11, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(28, 'C00073', ' LAMAH', 'Marie Thérèse', 20, '+224 622-44-76-25', '+224 622-44-76-25', 9, '1', 15.00, NULL, 4, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(29, 'RW018', 'MILLIMONO', 'Kémo ', 20, '+224 624-46-78-37', '+224 624-46-78-37', 11, '3', 14.75, NULL, 12, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(30, 'XK510', ' DIALLO', 'Sekou Oumar', 20, '+224 621-61-31-17', '+224 621-61-31-17', 13, '5', 14.75, NULL, 20, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(31, '6X21P', ' SANE', 'Mamadou', 20, '+224 625-43-69-78', '+224 625-43-69-78', 14, '6', 14.62, NULL, 24, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(32, 'C00074', ' DIALLO', 'Amadou  Oury', 0, '+224 623-85-10-29', '+224 623-85-10-29', 0, '', 14.01, NULL, 33, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(33, 'AN3R6', 'BARRY', 'Madou ', 20, '+224 620-27-46-55', '+224 620-27-46-55', 14, '6', 14.00, NULL, 1, 1, '2023-09-01 19:06:01', 1, 2, 0, NULL, '2023-09-01 19:06:01', '2023-09-01 19:06:17'),
(34, 'C00075', ' KAMISSOKO', 'Oumar', 20, '+224 628-28-86-40', '+224 628-28-86-40', 12, '4', 14.00, NULL, 16, 1, '2023-08-31 11:30:34', 1, 2, 18, NULL, '2023-08-31 11:30:34', '2023-08-31 13:01:33'),
(35, '100F3', 'TOUNKARA', 'Mamadou Billo ', 0, '+224 622-33-37-15', '+224 622-33-37-15', 0, '', 13.25, NULL, 35, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(36, '2231W', '  KONATE', 'Mamady', 0, '+224 627-59-27-94', '+224 627-59-27-94', 0, '', 12.75, NULL, 36, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(37, '916S2', ' BARRY', 'Oumou Koultoumy', 0, '+224 624-49-96-16', '+224 624-49-96-16', 0, '', 11.50, NULL, 37, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(38, 'C00076', ' KONOMOU', 'Stéphany', 0, '+224 612-86-24-99', '+224 612-86-24-99', 0, '', 9.25, NULL, 38, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(39, '731D1', 'MASSADOUNO', 'Moussa ', 0, '+224 621-11-05-30', '+224 621-11-05-30', 0, '', 9.00, NULL, 39, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(40, 'C00077', ' SANOH', 'Fama', 0, '+224 623-01-43-55', '+224 623-01-43-55', 0, '', 8.25, NULL, 40, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(41, 'L4101', ' TOURE', 'Ibrahima Sory', 0, '+224 622-88-98-84', '+224 622-88-98-84', 0, '', 8.00, NULL, 41, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(42, 'J2GV0', 'KABA', 'Oumar ', 0, '+224 622-00-66-22', '+224 622-00-66-22', 0, '', 5.75, NULL, 42, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(43, '1192E', 'HONOMOU ', 'Patrice Labilé', 0, '+224 628-43-71-94', '+224 628-43-71-94', 0, '', 5.50, NULL, 43, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(44, '0KB92', 'TRAORE', 'Lancinet', 0, '+224 621-49-26-81', '+224 621-49-26-81', 0, '', 4.62, NULL, 44, 1, '2023-08-31 11:30:34', 1, 1, 0, NULL, '2023-08-31 11:30:34', '2023-08-31 11:30:34'),
(45, 'F00001', 'BAH', 'Abdoulaye ', 6, '+224 622-42-82-59', '+224 622-42-82-59', 9, '1,2', 12.70, NULL, 1, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 14:43:38'),
(46, 'F00002', ' Haba', 'Pièrre', 6, '+224 625 04-91-18', '+224 625 04-91-18', 11, '3', 10.00, NULL, 2, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 14:43:38'),
(47, 'F00003', ' Toffany', 'Pièrre', 6, '+224 623-14-01-35', '+224 623-14-01-35', 12, '4', 15.80, NULL, 3, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 14:43:38'),
(48, 'F00004', 'Sylla', 'Aboubacar', 6, '+224 625 21-48-01', '+224 623 22-31-28', 13, '5', 12.70, NULL, 4, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 15:20:10'),
(49, 'F00005', 'Diallo', 'Amadou Tafsir ', 6, '+224 620-42-09-69', '+224 620-42-09-69', 14, '6', 18.50, NULL, 5, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 14:43:38'),
(50, 'F00006', ' Diallo', 'Mamadou Aliou Seydou', 6, '+224 628-07-50-23', '+224 628-07-50-23', 15, '7,8', 12.50, NULL, 6, 1, '2023-08-31 14:42:50', 1, 2, 20, NULL, '2023-08-31 14:42:50', '2023-08-31 14:43:38');

-- --------------------------------------------------------

--
-- Structure de la table `perso_recruts`
--

CREATE TABLE `perso_recruts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `portefeuilles`
--

CREATE TABLE `portefeuilles` (
  `id` bigint UNSIGNED NOT NULL,
  `direction_id` int NOT NULL,
  `montant` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `portefeuilles`
--

INSERT INTO `portefeuilles` (`id`, `direction_id`, `montant`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 7, 454000, 7, '2021-09-28 15:34:58', '2021-09-28 15:34:58'),
(2, 14, 200000, 7, '2021-09-28 15:36:02', '2021-09-28 15:36:02'),
(3, 9, 690000, 5, '2021-09-28 18:11:53', '2021-09-28 18:11:53'),
(4, 9, 50000, 5, '2021-09-28 18:13:29', '2021-09-28 18:13:29'),
(5, 7, 570000, 7, '2021-09-29 09:47:25', '2021-09-29 09:47:25'),
(6, 14, 4000, 7, '2021-09-29 09:56:21', '2021-09-29 09:56:21'),
(7, 1, 0, 7, '2021-09-29 16:16:31', '2021-09-29 16:16:31'),
(8, 7, -454000, 7, '2021-09-29 16:17:17', '2021-09-29 16:17:17'),
(9, 14, 50000, 7, '2021-10-02 08:36:35', '2021-10-02 08:36:35'),
(10, 7, 50000, 7, '2021-10-02 10:07:51', '2021-10-02 10:07:51'),
(11, 1, 0, 7, '2021-10-03 11:59:58', '2021-10-03 11:59:58'),
(12, 14, -50000, 7, '2021-10-03 12:01:20', '2021-10-03 12:01:20'),
(13, 7, -50000, 7, '2021-10-04 07:57:22', '2021-10-04 07:57:22'),
(14, 3, 930000, 9, '2021-10-04 08:11:51', '2021-10-04 08:11:51'),
(15, 5, 382500, 9, '2021-10-04 08:44:25', '2021-10-04 08:44:25'),
(16, 12, 436500, 9, '2021-10-04 08:45:37', '2021-10-04 08:45:37'),
(17, 14, 767600, 7, '2021-10-07 12:53:06', '2021-10-07 12:53:06'),
(18, 7, 767600, 7, '2021-10-07 12:53:43', '2021-10-07 12:53:43'),
(19, 7, 505000, 7, '2021-10-14 16:56:19', '2021-10-14 16:56:19'),
(20, 14, 505000, 7, '2021-10-14 16:56:46', '2021-10-14 16:56:46'),
(21, 7, 1242300, 7, '2021-10-16 15:58:45', '2021-10-16 15:58:45'),
(30, 1, 20000, 26, '2022-01-12 15:58:02', '2022-01-12 15:58:02'),
(31, 3, 36265600, 15, '2022-01-12 17:11:00', '2022-01-12 17:11:00'),
(32, 3, 36265600, 15, '2022-01-12 17:11:39', '2022-01-12 17:11:39'),
(33, 38, 484800, 37, '2022-01-12 18:51:26', '2022-01-12 18:51:26'),
(34, 38, 1746300, 37, '2022-01-12 18:52:55', '2022-01-12 18:52:55'),
(35, 38, 1746300, 37, '2022-01-12 18:54:03', '2022-01-12 18:54:03'),
(36, 38, 1746300, 37, '2022-01-12 18:55:28', '2022-01-12 18:55:28'),
(37, 38, 1746300, 37, '2022-01-12 18:56:46', '2022-01-12 18:56:46'),
(38, 38, 12010, 37, '2022-01-12 19:13:05', '2022-01-12 19:13:05'),
(39, 38, 10000000, 37, '2022-01-12 19:13:43', '2022-01-12 19:13:43'),
(40, 38, 1746159, 37, '2022-01-12 19:25:59', '2022-01-12 19:25:59'),
(41, 1, 274500, 34, '2022-01-12 21:01:33', '2022-01-12 21:01:33'),
(42, 1, 274500, 34, '2022-01-12 21:06:18', '2022-01-12 21:06:18'),
(43, 31, 545400, 40, '2022-01-13 09:00:27', '2022-01-13 09:00:27'),
(44, 32, 3380, 39, '2022-01-13 09:07:20', '2022-01-13 09:07:20'),
(45, 36, 25721400, 46, '2022-01-13 10:11:38', '2022-01-13 10:11:38'),
(46, 36, 25721400, 46, '2022-01-13 10:12:18', '2022-01-13 10:12:18'),
(47, 36, 25721400, 46, '2022-01-13 10:17:39', '2022-01-13 10:17:39'),
(48, 36, 25721400, 46, '2022-01-13 10:35:57', '2022-01-13 10:35:57'),
(49, 36, 25721400, 46, '2022-01-13 10:36:47', '2022-01-13 10:36:47'),
(50, 36, 25721400, 46, '2022-01-13 10:37:43', '2022-01-13 10:37:43'),
(51, 36, 25721400, 46, '2022-01-13 10:55:10', '2022-01-13 10:55:10'),
(52, 31, 545400, 40, '2022-01-13 11:41:22', '2022-01-13 11:41:22'),
(53, 38, 500000, 37, '2022-01-13 11:49:51', '2022-01-13 11:49:51'),
(54, 1, 100000, 1, '2022-01-13 16:37:41', '2022-01-13 16:37:41'),
(55, 16, 100000, 1, '2023-02-19 12:12:11', '2023-02-19 12:12:11'),
(56, 3, 300000, 1, '2023-02-19 12:14:33', '2023-02-19 12:14:33'),
(57, 2, 13000000, 1, '2021-02-19 20:42:43', '2021-02-19 20:42:43'),
(58, 1, 250000, 1, '2021-02-19 20:44:54', '2021-02-19 20:44:54'),
(59, 2, 250000, 1, '2023-02-21 16:08:22', '2023-02-21 16:08:22'),
(60, 2, 1000000, 1, '2023-07-11 07:17:50', '2023-07-11 07:17:50');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-09-21 23:18:55', '2021-09-21 23:18:55'),
(2, 'cu', 'web', '2021-09-21 23:18:56', '2021-09-21 23:18:56'),
(3, 'cc', 'web', '2021-09-21 23:18:56', '2021-09-21 23:18:56'),
(4, 'rh', 'web', '2021-09-21 23:18:56', '2021-09-21 23:18:56'),
(5, 'btpr', 'web', '2021-09-21 23:18:56', '2021-09-21 23:18:56');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(16, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(25, 2),
(26, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(6, 3),
(8, 3),
(10, 3),
(28, 3),
(30, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(56, 3),
(61, 3),
(4, 4),
(8, 4),
(12, 4),
(16, 4),
(20, 4),
(22, 4),
(24, 4),
(28, 4),
(32, 4),
(36, 4),
(40, 4),
(43, 4),
(44, 4),
(48, 4),
(52, 4),
(56, 4),
(62, 4),
(63, 4),
(64, 4),
(65, 4),
(66, 4),
(1, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(24, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(39, 5),
(44, 5),
(45, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(62, 5),
(63, 5),
(66, 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction_id` int UNSIGNED NOT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/img/avatar.png',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` enum('attente','active','bloqué','supprimé') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `uuid` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `phone`, `direction_id`, `photo`, `password`, `statut`, `remember_token`, `email_verified_at`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@erp.rgph.gov.gn', NULL, 1, '/img/avatar.png', '$2y$10$30KTqqBJjoISw5S02QN2PuC5hpl/4pbRWNnpJkW0l1oKjHcckRctu', 'active', '9tGVapEKqgv1Wh6nolFZ4kgZCqHzl2BO6G1xXO0iI0hhEKjaOlRE8Ya6ZaZD', NULL, '681db6a4-c316-43fd-a6fe-31d3dbcf7751', '2021-09-21 23:18:56', '2023-08-31 12:43:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abscences`
--
ALTER TABLE `abscences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `caisses`
--
ALTER TABLE `caisses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `caisses_code_unique` (`code`);

--
-- Index pour la table `campagnes`
--
ALTER TABLE `campagnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Index pour la table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `direction_user`
--
ALTER TABLE `direction_user`
  ADD PRIMARY KEY (`direction_id`,`user_id`);

--
-- Index pour la table `engins`
--
ALTER TABLE `engins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `imputations`
--
ALTER TABLE `imputations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `imputations_code_unique` (`code`);

--
-- Index pour la table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `paies`
--
ALTER TABLE `paies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personnels_matricule_unique` (`matricule`),
  ADD UNIQUE KEY `contact_UNIQUE` (`contact`);

--
-- Index pour la table `perso_recruts`
--
ALTER TABLE `perso_recruts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portefeuilles`
--
ALTER TABLE `portefeuilles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abscences`
--
ALTER TABLE `abscences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2599;

--
-- AUTO_INCREMENT pour la table `caisses`
--
ALTER TABLE `caisses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT pour la table `campagnes`
--
ALTER TABLE `campagnes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `engins`
--
ALTER TABLE `engins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT pour la table `imputations`
--
ALTER TABLE `imputations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978;

--
-- AUTO_INCREMENT pour la table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `paies`
--
ALTER TABLE `paies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `perso_recruts`
--
ALTER TABLE `perso_recruts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `portefeuilles`
--
ALTER TABLE `portefeuilles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
