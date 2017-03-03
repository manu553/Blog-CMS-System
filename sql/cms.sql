-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2017 at 11:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JavaScript'),
(4, 'Java'),
(5, 'C'),
(6, 'C++'),
(7, 'PHP'),
(8, 'General Programming'),
(9, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(3, 2, 'Sally White', 'afd@gmail.com', 'Another test comment from the front end posts', 'Approved', '2017-02-13'),
(4, 1, 'adddd', 'adf@gmail.com', 'more comments', 'Approved', '2017-02-13'),
(6, 2, 'asdfas', 'sdag@gmail.com', 'asdfsaefd', 'Approved', '2017-02-13'),
(7, 4, 'Test comment 4', 'asdf@gmail.com', 'asdfead', 'Approved', '2017-02-14'),
(8, 2, 'Blahhh', 'test@gmail.com', 'Test comment to see on google charts graph', 'Approved', '2017-02-28'),
(9, 12, 'Billy Bob', 'bob@gmail.com', 'Great post, enjoyed the read', 'Approved', '2017-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_cat_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'Draft',
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(1, 8, 'Starter Guide To Programming', 'Bob Ross', '2017-03-03', 'image-template1.png', '<h3><span style="text-decoration: underline;"><strong>Intro</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style="text-decoration: underline;"><strong>Middle</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<h3><span style="text-decoration: underline;"><strong>End</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>', 'Bob, General Programming, Learning to code', 0, 'Published', 7),
(2, 4, 'Java Explained!', 'John Doeeee', '2017-02-22', 'java.png', '<p>Java Explained!</p>', 'Programming, Java, Learning, Coding, Developing, Explained', 2, 'Published', 0),
(4, 7, 'PHP Explained!', 'Manveer Bhangu', '2017-02-22', '01space.jpg', '<p>PHP Explained!</p>', 'PHP, Programming, Explained', 5, 'Published', 1),
(6, 8, 'How To Get Faster At Typing!', 'Manveer Bhangu', '2017-03-03', 'keyboard.png', '<p>This post will teach you great lessons on how to improve your typing skills. All you need is practice to get faster and faster as well as doing typing tests.</p>\r\n<h3><span style="text-decoration: underline;"><strong>Intro</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3><span style="text-decoration: underline;"><strong>Middle</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>\r\n<h3><span style="text-decoration: underline;"><strong>End</strong></span></h3>\r\n<p>asdff aee add afeea df aeas af faeffe a dfsad haknapeskl akdnalen aleakk alnd eaejlkrnhl m faa amea joakdfaiefaje akmd foae a. albfelasl anljfvn aolsenflm namdnfgape. aosfbolanselnknealdn. askfnlkase. afasknfeelnglhakfeae lpajpnaslefn laef fnkje lanfoir nhafln nalsjfn.&nbsp;</p>', 'typing, speed, practice, learning', 0, 'Published', 5),
(7, 2, 'Intro To JQuery!', 'Bob Ross', '2017-03-03', 'jquery-intro.jpg', '<p>One of the most practical and hand-on approach to learning JQuery. Lots of demand for great JQuery developers in the job market!</p>', 'JQuery, JavaScript, Programming, Learning', 0, 'Published', 2),
(8, 8, 'Learning Binary!', 'John May', '2017-03-03', 'blue-binary.jpg', '<p>Get to know your 1s and 0s! Learn the most basic level of how machines works and the language they speak!</p>\r\n<p>&nbsp;</p>', 'Binary, Theory, Learning', 0, 'Published', 1),
(9, 9, 'Advanced Android Tutorial', 'John May', '2017-03-03', 'android.png', '<p>Learn more complicated and advanced lessons in android like how to have your apps scale to different screen sizes and fragmentation!</p>\r\n<p>asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef. asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef. asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef. asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef.&nbsp;</p>\r\n<p>asfesasf safe as sa saf asef as s..as. e.asf &nbsp;ae asfe . ase fsae . asef .asef asef asf .as fesf sefafss fasefkn asofesaef onfpias npfaspoefn pasifne aspnfepasn .a sfeasfe poasfe .asfe ofsaipefn pinsef.&nbsp;</p>', 'Android, Tutorial, C#, Android Studio', 0, 'Published', 0),
(10, 8, 'Getting used to MacOS', 'Manveer Bhangu', '2017-03-03', 'coding-mac.jpg', '<p>A simple post teaching you the ins and outs of your new mac!</p>', 'Learning, Mac, OS, Shell, Command Line', 0, 'Published', 0),
(11, 8, 'Is Your Application Really Secure?!', 'Jay Bennon', '2017-03-03', 'security-hash.jpg', '<p>Make sure your application is as secure as can be with these simple tricks!</p>', 'Security, Cyber, Crime, Hacking, Protection', 0, 'Published', 0),
(12, 8, 'The Joys of Learning to Code', 'Manveer Bhangu', '2017-03-03', 'happy-kid.jpg', '<p>All the great things about learning to code, the ability to express yourself in a unique way and create something that others can use and will help them in achieve their goals.</p>', 'Joy, Learning, Passion', 1, 'Published', 3),
(13, 1, 'Testpost', 'asf', '2017-03-03', '', '<p>test post for pagination</p>', 'asdaf,a e,a', 0, 'Published', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$heymynameisbobswaggerz'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'manu553', '$1$EW/.7K..$k8AmjImc/NtlVOsk/NNb2/', 'Manu', 'Bhangu', 'manu@gmail.com', '', 'Admin', ''),
(3, 'Bob', '12345', 'dgsa', 'sdfg', 'asdf@gmail.com', '', 'Subscriber', ''),
(4, 'testname', 'blah', '', '', 'test@gmail.com', '', 'Subscriber', '$2y$10$heymynameisbobswaggerz'),
(5, 'Testing2', 'blah2', '', '', 'testing2@gmail.com', '', 'Subscriber', '$2y$10$heymynameisbobswaggerz'),
(6, 'matt', '$1$7L3.CH5.$gvIaa9f4LG/7.9q.5G8mz.', '', '', 'matt@gmail.com', '', 'admin', '$2y$10$heymynameisbobswaggerz'),
(7, 'tester1', '$1$wf4.3K..$pNSa28yUXFbS3NGYhECIs1', '', '', 'tester1@gmail.com', '', 'Subscriber', '$2y$10$heymynameisbobswaggerz'),
(8, 'bob', '$1$9t5.c.3.$3gYWtPglH0/azvZupOozO/', '', '', 'bob@gmail.com', '', 'Subscriber', '$2y$10$heymynameisbobswaggerz');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `time`) VALUES
(1, 'ff39j45p8p5f6994t2l2e6u2v3', 1488580143),
(2, 'lq11bjlfmf09u0p9uell3cj1o1', 1488576847),
(3, 'k3sh44spoojhf7t3qp6u8k4te7', 1488577236),
(4, 'fupackn954cv5pur9fpl4fkvg3', 1488578299),
(5, '4at03ot4f4dc65d7v6h5c3n446', 1488579482),
(6, '00tjb359eg2k12gqs3m9v0l616', 1488579763),
(7, 'tlsoucpaku199s70gj7buhhva0', 1488579903);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
