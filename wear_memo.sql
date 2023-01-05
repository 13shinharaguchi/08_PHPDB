-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-01-05 15:09:05
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `wear_memo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `member_table`
--

CREATE TABLE `member_table` (
  `ID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `total_energy` int(11) NOT NULL,
  `received_energy` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- テーブルの構造 `memo_card_table`
--

CREATE TABLE `memo_card_table` (
  `ID` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `energy_consumption` int(11) NOT NULL,
  `retrospective_comment` text NOT NULL,
  `menber_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `memo_card_table`
--

INSERT INTO `memo_card_table` (`ID`, `title`, `content`, `energy_consumption`, `retrospective_comment`, `menber_id`, `created_at`, `updated_at`) VALUES
(1, 'タイトル', 'コンテント', 1, '', 1, '2023-01-01 16:33:46', '2023-01-01 16:33:46'),
(2, '行動する', '挨拶を頑張る', 10, '', 1, '2023-01-01 17:10:38', '2023-01-01 17:10:38'),
(3, '確認', '確認事項をまとめる', 10, '', 1, '2023-01-01 17:19:50', '2023-01-01 17:19:50'),
(4, 'テスト', '頑張る', 5, '', 1, '2023-01-05 08:26:41', '2023-01-05 08:26:41'),
(5, 'テストあ', 'あ', 1, '', 1, '2023-01-05 08:28:23', '2023-01-05 08:28:23'),
(6, '変更テスト', '機能のみ作成させる', 1, '', 1, '2023-01-05 09:09:16', '2023-01-05 09:09:16'),
(7, 'ここを変更する', 'コンテント', 5, '', 1, '2023-01-05 14:43:44', '2023-01-05 14:43:44'),
(8, 'キング', '数', 0, '', 1, '2023-01-05 17:14:31', '2023-01-05 17:14:31'),
(9, 'test', 'test', 2, '', 1, '2023-01-05 22:45:48', '2023-01-05 22:45:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `memo_card_table`
--
ALTER TABLE `memo_card_table`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `member_table`
--
ALTER TABLE `member_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `memo_card_table`
--
ALTER TABLE `memo_card_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
