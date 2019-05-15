-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 08:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(255) NOT NULL,
  `crdate` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject1` varchar(500) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '0',
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `crdate`, `subject`, `subject1`, `status`, `user_id`) VALUES
(7, '15-05-2019', 'A Childhood Saved', 'hjkdsle;jldxmv.', 0, 2),
(8, '16-02-2019', 'part2', 'Ruhi understood that it was a racket of child beggars. She felt pity for those small children. She decided to inform the police. The police and an NGO â€˜Bachpan Bachao Andolanâ€™ soon reached the place. The man was perplexed on seeing the police. The police arrested him and the children were sent under the protection of the NGO from where they would be sent to their homes. Ruhi felt relieved and was appreciated by everyone. She was later rewarded by the government for her effort in rescuing the', 0, 2),
(9, '17-02-2019', 'A Spaceship on Earth!', 'Last Sunday, I was watching TV. Suddenly I heard people shouting outside. It was about 10:30 p.m. As I opened my door, bright lights from outside dazzled my eyes. I went outside towards the place where a large crowd had gathered outside our colony park. There was a huge spaceship that had landed in the park. It had a thousand lights blinking and from the windows, one could see a few strange figures peeping out. I was surprised to see the aliens. Meanwhile, the police had also reached the park. P', 0, 2),
(10, '17-02-2019', 'on Earth!', 'As they started moving towards the spaceship, the sirens that were installed in it started blowing. We could notice the strange figures hurriedly moving inside the spaceship. Then, as if understanding the intentions of the scientists that they probably wanted to capture them, they started blowing green-coloured dust from their spaceship. Its wheels started moving like a blower and the spaceship started moving upwards. The scientists rushed out of the park. People tried to click pictures of the s', 0, 2),
(11, '18-02-2019', 'A Lost', 'When Amit woke up in the morning and looked at his face in the mirror, he did not recognise the face looking back at him. â€˜This is not meâ€¦â€¦â€¦â€¦ â€˜ he cried aloud. The face staring at him was calm and cool. Amit moved his fingers on the surface of the mirror. It felt different. He touched his face. It appeared strange and was like touching someone elseâ€™s face. He felt scared and anxious. Where was his face? What had happened? He tried to recall the last eveningâ€™s events and could har', 0, 2),
(12, '27-02-2019', 'identity!', 'He tried hard to remember what he had been doing the previous night. Yes, he remembered he had been reading a book â€˜The Alien visits Homeâ€™. It was an old book that was kept in the attic. There were some magical words in the book which he had chanted loudly. He quickly looked for the book, opened it and tried hard to find those magical words. He also found the words which undid the effect of the words he had spoken the previous night. He muttered the words and with a loud whoosh sound he was ', 0, 2),
(17, '15-05-2019', 'hgjk', 'fghj', 0, 0),
(18, '15-05-2019', 'fhgjk', 'hgj,', 0, 0),
(19, '15-05-2019', 'sdfg', 'hrllo', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`) VALUES
(1, 'shivani', 'shivani@gmail.com', '$2y$10$2.yCNRRmdfzQELLuXSnwfe5oIhfdQxG6dUW6awUC.3F6dqpoTnGy.'),
(2, 'roshan', 'root@m.com', '$2y$10$EixrgOYMOPdlsm8JG0A8SOb33wDPaEUTYFd/rj3qDBWuU4ZaVaYb6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
