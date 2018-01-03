-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 04:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', NULL, '2017-10-07 01:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `AuthorName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `AuthorName`, `created_at`, `updated_at`) VALUES
(1, 'Liton', '2017-10-07 00:16:55', '2017-10-07 00:16:55'),
(2, 'Mark', '2017-10-07 00:17:34', '2017-10-07 00:17:34'),
(3, 'Luise Curl', '2017-10-07 08:14:00', '2017-10-07 08:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `BookName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CatId` int(11) NOT NULL,
  `AuthorId` int(11) NOT NULL,
  `shelfId` int(11) NOT NULL,
  `ISBNNumber` int(11) NOT NULL,
  `BookPrice` int(11) NOT NULL,
  `TotalBook` int(11) NOT NULL,
  `TotalFixedBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `BookName`, `CatId`, `AuthorId`, `shelfId`, `ISBNNumber`, `BookPrice`, `TotalBook`, `TotalFixedBook`) VALUES
(1, 'Programing in C', 3, 1, 2, 1234, 120, 0, 1),
(2, 'Java Programming', 3, 1, 2, 1111, 120, 2, 2),
(3, 'Romio and Juliet', 4, 3, 2, 1212, 120, 30, 30),
(4, 'Master in java', 3, 3, 3, 1313, 120, 20, 21),
(5, 'Demo Book', 1, 1, 4, 1112, 120, 10, 11),
(6, 'Java Level', 3, 2, 1, 1213, 12, 10, 10),
(7, 'Apple', 1, 1, 1, 1110, 12, 10, 10),
(10, 'Cat', 1, 1, 1, 1101, 1, 23, 23),
(12, 'BCS', 5, 2, 1, 2121, 12, 12, 12),
(14, 'BCS English', 5, 2, 1, 1223, 23, 21, 21),
(16, 'BCS bangla', 5, 2, 1, 1103, 13, 24, 24),
(17, 'C baseic', 3, 1, 2, 1010, 23, 5, 5),
(18, 'Phython', 3, 1, 4, 1012, 23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_shelves`
--

CREATE TABLE `book_shelves` (
  `id` int(10) UNSIGNED NOT NULL,
  `ShelfName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TotalBook` int(11) NOT NULL DEFAULT '0',
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_shelves`
--

INSERT INTO `book_shelves` (`id`, `ShelfName`, `TotalBook`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Shelf 1', 140, 0, '2017-10-10 01:39:25', '2017-10-10 04:01:59'),
(2, 'Shelf 2', 38, 0, '2017-10-10 01:55:36', '2017-10-10 04:11:34'),
(3, 'Shelf 3', 21, 1, '2017-10-10 01:55:49', '2017-10-10 01:55:49'),
(4, 'Shelf 4', 12, 1, '2017-10-10 01:56:04', '2017-10-10 01:56:04'),
(5, 'Self 5', 0, 1, '2017-10-10 04:18:08', '2017-10-10 04:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `CategoryName`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Scientific', 1, '2017-10-07 00:14:38', '2017-10-07 08:11:06'),
(3, 'CSE', 1, '2017-10-07 00:15:54', '2017-10-07 00:15:54'),
(4, 'History', 1, '2017-10-07 08:07:16', '2017-10-07 08:07:16'),
(5, 'BCS', 1, '2017-10-07 08:09:51', '2017-10-07 08:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `isseud_books`
--

CREATE TABLE `isseud_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `BookId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StudentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ReturnDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IssuesDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RetrunStatus` tinyint(4) NOT NULL DEFAULT '0',
  `fine` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isseud_books`
--

INSERT INTO `isseud_books` (`id`, `BookId`, `StudentID`, `ReturnDate`, `IssuesDate`, `RetrunStatus`, `fine`) VALUES
(1, '1', 'SID01', 'October 7, 2017, 6:58 am', 'October 7, 2017, 6:40 am', 1, 20),
(2, '2', 'SID01', 'October 7, 2017, 2:20 pm', 'October 7, 2017, 6:51 am', 1, 20),
(3, '3', 'SID01', 'October 9, 2017, 2:59 pm', 'October 7, 2017, 2:18 pm', 1, 12),
(4, '2', 'SID02', 'October 9, 2017, 3:51 pm', 'October 9, 2017, 3:38 pm', 1, 20),
(5, '2', 'SID01', 'October 9, 2017, 3:51 pm', 'October 9, 2017, 3:38 pm', 1, 29),
(6, '4', 'SID02', 'October 10, 2017, 2:40 am', 'October 9, 2017, 4:05 pm', 1, 12),
(7, '4', 'SID01', 'October 9, 2017, 4:13 pm', 'October 9, 2017, 4:06 pm', 1, 20),
(8, '4', 'SID01', 'Not Return Yet', 'October 9, 2017, 4:14 pm', 0, 0),
(9, '5', 'SID03', 'Not Return Yet', 'October 10, 2017, 2:28 am', 0, 0),
(10, '1', 'SID02', 'Not Return Yet', 'October 10, 2017, 10:00 am', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_22_093454_create_admins_table', 1),
(4, '2017_09_22_093554_create_authors_table', 1),
(5, '2017_09_22_093636_create_books_table', 1),
(6, '2017_09_22_093743_create_categories_table', 1),
(7, '2017_09_22_093849_create_students_table', 1),
(8, '2017_09_25_125959_create_isseud_books_table', 1),
(9, '2017_10_10_073135_create_book_shelves_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `StudentId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FullName` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EmailId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobileNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'SID01', 'Test Demo', 'test123@gmail.com', '123456', '16d7a4fca7442dda3ad93c9a726597e4', 1, '2017-10-07 00:34:51', '2017-10-07 01:03:19'),
(2, 'SID02', 'demo', 'demo@gmail.com', '123456', '62cc2d8b4bf2d8728120d052163a77df', 1, '2017-10-08 21:11:29', '2017-10-09 09:11:29'),
(3, 'SID03', 'Demo  2', 'demo123@gmail.com', '12345', '62cc2d8b4bf2d8728120d052163a77df', 1, '2017-10-08 22:15:44', '2017-10-09 10:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_adminemail_unique` (`AdminEmail`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbnnumber_unique` (`ISBNNumber`);

--
-- Indexes for table `book_shelves`
--
ALTER TABLE `book_shelves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isseud_books`
--
ALTER TABLE `isseud_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_emailid_unique` (`EmailId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `book_shelves`
--
ALTER TABLE `book_shelves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `isseud_books`
--
ALTER TABLE `isseud_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
