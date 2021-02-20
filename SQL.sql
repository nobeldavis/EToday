-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2021 at 08:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etoday`
--
CREATE DATABASE IF NOT EXISTS `etoday` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `etoday`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_registration`
--

CREATE TABLE `admin_registration` (
  `admin_id` int(3) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_registration`
--

INSERT INTO `admin_registration` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(13, 'Nobel', 'nobel@gmail.com', '123'),
(15, 'Amal', 'amal@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_image`) VALUES
(43, 'Magenta Keyboard Photo Gaming YouTube Channel Art.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(43, 'Education'),
(44, 'Sports'),
(45, 'Technology'),
(51, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_content`) VALUES
(59, 150, '2021-02-20 07:41:25', 'Nobel User', 'Corona danger danger!'),
(60, 150, '2021-02-20 07:41:39', 'randsalt', 'I agreee'),
(61, 146, '2021-02-20 07:41:57', 'randsalt', 'Oneplus is awesome!!!'),
(62, 144, '2021-02-20 07:42:26', 'Nobel User', 'Praying for the soldiers out there');

-- --------------------------------------------------------

--
-- Table structure for table `news_sugg`
--

CREATE TABLE `news_sugg` (
  `post_id2` int(11) NOT NULL,
  `post_category2` varchar(11) NOT NULL,
  `post_title2` varchar(255) NOT NULL,
  `post_date2` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_image2` text NOT NULL,
  `post_content2` text NOT NULL,
  `post_tags2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_sugg`
--

INSERT INTO `news_sugg` (`post_id2`, `post_category2`, `post_title2`, `post_date2`, `post_image2`, `post_content2`, `post_tags2`) VALUES
(39, 'India', 'Six districts in Maharashtra record â€˜noticeableâ€™ rise in average daily Covid deaths', '2021-02-20 07:40:36', 'AC12CoronaTesting03.jpg', '<p>Many districts have recorded an increase in average daily <a class=\"\" href=\"https://indianexpress.com/about/coronavirus/\">Covid-19</a> deaths in the last three weeks even as the state&rsquo;s average has dropped, data analysed by <a class=\"\" href=\"https://indianexpress.com\">The Indian Express</a> shows. Six districts &mdash; Ratnagiri, Beed, Sindhudurg, Raigad, Satara and Amravati &mdash; have witnessed a noticeable rise in average daily deaths.</p>\r\n<p>The state&rsquo;s weekly data shows daily Covid deaths dropped from 30.7 between January 29 and February 4 to 22.85 between February 5 and 11, and rose slightly to 31.1 deaths per day last week.<span class=\"article_title\"><a id=\"Alsoread_editdriven\" class=\"click-event\" href=\"https://indianexpress.com/article/cities/mumbai/as-maharashtra-records-6112-cases-3-districts-focus-on-genome-sequencing-7196430/\"></a></span></p>\r\n<p>In Amravati, it rose from 0.85 deaths a day between February 5 and 11 to 1.71 between February 12 and 18. In the same period, Satara rose from 0.85 to 1.14 deaths, Beed from 0.57 to 1.28, and Raigad from 1.85 to 5.7 average deaths a day. Maharashtra accounts for 51,669 deaths, one-third of India&rsquo;s toll.</p>', 'corona, maharashtra, india');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category` varchar(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category`, `post_title`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES
(144, 'Education', 'J&K: Two policemen shot dead in Srinagar; three held for attack at restaurant', '2021-02-20 07:29:39', 'Attack-in-srinagar-061.jpg', '<p>Two policemen were shot in the Barzulla area of Srinagar on Friday, in the second attack in the city in the past three days. In two other incidents in the Valley, a Special Police Officer was killed and a Constable injured in Budgam of Central Kashmir, while three militants were killed in an encounter in Shopian, South Kashmir.</p>\r\n<p>Director General, J&amp;K Police, Dilbag Singh told <a class=\"\" href=\"https://indianexpress.com\">The Indian Express</a> that while there appeared to have been only one attacker in the Srinagar incident, they were looking at the possibility of a back-up, &ldquo;to ensure his escape&rdquo;.</p>\r\n<p>The policemen killed in the Srinagar attack were identified as Constable Mohammad Yousuf from Zurhama, Kupwara, and Constable Suhail Ahmad from Logripora, Aishmuqam. In Budgam, SPO Mohammad Altaf was killed and Constable Manzoor Ahmad was injured even as the militants managed to escape.</p>\r\n<p>At a press conference held Friday, Kashmir IG Vijay Kumar said the three bike-borne assailants behind the February 17 attack in Srinagar &mdash; in which the son of the owner of Srinagar&rsquo;s famous Krishna Dhaba, Aakash Mehra, was seriously injured &mdash; had been arrested.</p>\r\n<p>The attack coincided with the visit of 24 foreign envoys to Kashmir, and the IG said the two were linked. &ldquo;The LeT (Lashkar-e-Toiba), in its cowardly attempt to disrupt the peaceful atmosphere in the Valley, choose a soft target, a famous food outlet, and attacked its inmates to terrorise non-locals and disrupt tourist activity that has seen an upsurge in the past two months.&rdquo;</p>\r\n<p>Identifying the three alleged LeT men as Vilayat Aziz Mir, Suhail Ahmad Mir and Owais Manzoor Sofi, the police said they had confessed, and the weapon and motorcycle suspected to have been used in the attack, as well as a grenade and other &ldquo;incriminating material&rdquo;, had been seized.</p>\r\n<p>IG Kumar said, &ldquo;A civilian called the SP of the area and informed him about a suspect. After seeing the CCTV footage, the parents of the suspect called the police station and they have accepted that their son was involved in the attack.&rdquo;</p>', 'india, military, police'),
(145, 'Technology', 'Jabra Elite 85t review: Perfect for work, and play', '2021-02-20 07:30:37', 'Jabra-Elite-85t-.jpg', '<p>When it comes to audio, Jabra is a company with some understated elegance. It is not talked about much, but has over the years done well to get a loyal set of users who trust the brand to deliver what it promises, especially with the dependability that enterprise users demand. The new Jabra Elite 85t is no exception to this rule.</p>\r\n<p><strong>Jabra Elite 85t price in India: Rs 18,999</strong></p>\r\n<p>The Jabra Elite 85t comes in a compact charging case that can easily fit into your jeans or coat pocket. Inside, there are two ergonomically designed pods that are not unique in design. But the two fit perfectly in your ears with very little protruding outside. The duo creates a vacuum of its own to keep noise out.</p>\r\n<p>Over the week or so I used the device, there were quite a few occasions on which I left the EarPods on even when there were no calls or music, because they are so easy to be forgotten thanks to the design and light weight. Even during long walks, trying to keep pace with the conversation happening on Zoom or <a class=\"\" href=\"https://indianexpress.com/about/google/\">Google</a> Meets, the earpieces would stay well in place.</p>\r\n<p>The Jabra Elite 85t comes with active noise cancellation and it is one of the best I have experienced in <a class=\"\" href=\"https://indianexpress.com/article/technology/techook/how-to-select-truly-wireless-earphones-6535108/\">truly wireless earphones</a>. They cut out most of the noise when I am working early in the morning, letting in only a stray horn here and there and completely draining out the drone of my rickety ceiling fan and the renovation work at my neighbour&rsquo;s. You can tap the earphones to go to transparency mode and be more aware of your surroundings.</p>\r\n<p>Also, the noise cancellation presented me with a mystery. As I was walking in my society, I noticed a few spots where the noise cancellation would recaliberate, maybe because the wind direction changed. The Jabra Sound+ gives you more control with the noise cancellation as there are preset modes for commute and focus. I have loved how the Jabra app gives pre-recorded soundscapes that help you focus or concentrate. My personal favourites have always been Ocean Waves and Cavern that help me create a space for myself, a tough ask these days when the entire family is cooped up at home.</p>', 'technology, jabra, jabra elite'),
(146, 'Technology', 'OnePlus 9 specifications leaked ahead of launch: Everything you need to know', '2021-02-20 07:32:47', 'oneplus9.jpg', '<p><a class=\"\" href=\"https://indianexpress.com/about/oneplus/\">OnePlus</a> is expected to announce the launch of OnePlus 9 series in the weeks. The lineup will likely include OnePlus 9, OnePlus 9 Pro, and OnePlus 9 Lite. While the company is yet to confirm the launch date, the flagship phones are widely rumoured to launch in the month of March. Ahead of the launch, a lot has already been leaked online. Now, the specifications of the OnePlus 9 have been <a class=\"\" href=\"https://twitter.com/techdroider/status/1362642536578256897\" target=\"_blank\" rel=\"nofollow, noopener\">leaked</a> via AIDA64 benchmarking software, which was spotted by <em>TechDroider</em>.</p>\r\n<h4>OnePlus 9 specifications (expected)</h4>\r\n<p>It suggested that the OnePlus 9 will arrive with a 6.55-inch full-HD+ display, just like the OnePlus 8. The panel will support 402ppi pixel density and a 120Hz refresh rate. Under the hood, the device is likely to pack a Qualcomm Snapdragon 888 processor, paired with Adreno 660 GPU.</p>', 'oneplus, smartphone, mobile'),
(147, 'Sports', 'â€˜Something needs to changeâ€™: Arsenalâ€™s Willian after suffering online racial abuse', '2021-02-20 07:33:41', 'willian.jpg', '<p>Arsenal winger Willian has become the latest Premier League player to be racially abused online and the Brazilian shared screenshots of the messages he received on social media.</p>\r\n<p>The 32-year-old Brazil international was targeted by two different users and he highlighted the messages on Instagram with the caption: &ldquo;Something needs to change! The fight against racism continues.&rdquo;</p>\r\n<p>Arsenal condemned the abuse and said anybody with a club membership that sends such messages would be banned.</p>\r\n<p>&ldquo;We all need to work together to drive this behaviour out. This includes clubs, governing bodies, fans, media and politicians; but requires the help and commitment of social media companies,&rdquo; a club spokesperson was quoted as saying by British media.</p>\r\n<p>&ldquo;We commit to using our voice and network to strengthen measures and action taken by relevant authorities to punish those responsible for this abuse which affects us all.&rdquo;</p>\r\n<p>Willian is the second Black Arsenal player to face abuse this week after forward Eddie Nketiah was sent a racist message on Twitter ahead of Thursday&rsquo;s Europa League last-32 tie against Benfica.</p>\r\n<p>Other Black players, including Manchester United&rsquo;s Axel Tuanzebe, Marcus Rashford and Anthony Martial, Chelsea&rsquo;s Reece James, West Bromwich Albion&rsquo;s Romaine Sawyers and Southampton&rsquo;s Alex Jankewitz have all been victims in recent weeks, prompting English soccer bodies to put pressure on social media companies to tackle the problem.</p>\r\n<p>Instagram has announced a series of measures to deal with online abuse, including removing accounts of people who send abusive messages, and developing new controls to help reduce the abuse people see.</p>\r\n<p>Arsenal chief executive Vinai Venkatesham on Thursday warned that abuse towards Black players was becoming normalised and was &ldquo;the biggest problem in the game at the moment&rdquo;.</p>', 'willian, sports, abuse, racial abuse, arsenal, sports'),
(148, 'Sports', 'How a football pipeline from Shillong feeds top Indian clubs', '2021-02-20 07:34:31', 'bipin-singh.jpg', '<p>In 2009, Shillong Lajong became the first club from the Northeast to qualify for the country&rsquo;s premier football competition, the I-League. A little more than a decade later, they are absent from the top two tiers of Indian football. Yet, their presence is unmistakable &mdash; because clubs across India continue to reap the benefits of the talent Shillong Lajong have churned out over all these years.</p>\r\n<p>From Mumbai City&rsquo;s Bipin Singh, one of the standout performers in the ongoing Indian Super League (ISL) season, to Bengaluru FC youngster Wungngayam Muirang, the first Tangkhul Naga player to feature in the competition, and Goa&rsquo;s Redeem Tlang, over 20 Shillong Lajong alumni have been snapped up by 10 out of the 11 teams in the top division.</p>\r\n<p>Graduates from academies set up by Tata, All India Football Federation and Minerva, too, are sprinkled across different teams and leagues in the country. But what sets Shillong Lajong apart is they are a community club feeding other clubs pan-India with finished products.</p>\r\n<p>In the process, and at a time when most Indian clubs are finding it tough to sustain operations, they have generated revenues in the eight-figure range. In 2017, for instance, the club earned Rs 1.47 crore in fees on contracts for its players at the ISL draft. In 2015, they purchased a 20-acre parcel of land, where their academy is being set up.</p>', 'bipin singh, football, india'),
(149, 'Education', 'NASAâ€™s Perseverance rover lands on Mars: Will search for signs of life, to collect rock samples', '2021-02-20 07:37:16', 'NASA_Perseverance_AP_1.jpg', '<h4><strong>NASA&rsquo;s Perseverance rover has successfully landed on Mars, and it is the most advanced rover that the US space agency has sent to the red planet till date. NASA confirmed the the successful touchdown in mission control at its Jet Propulsion Laboratory (JPL) in Southern California at 12:55 pm PST, which was around 2.25 am for India.</strong></h4>\r\n<p>Even, <a class=\"\" href=\"https://indianexpress.com/about/google/\">Google</a> Search is celebrating NASA&rsquo;s successful landing with celebratory fireworks, when you search for NASA Perseverance or NASA Mars rover 2021. Here are top points to keep in mind about NASA&rsquo;s historic landing.</p>\r\n<h4>Perseverance will collect Mars samples</h4>\r\n<p>The Perseverance rover is different from any other Mars mission because this one will try and collect Mars sample, which would later be brought back to Earth. Getting these samples back to Earth won&rsquo;t happen before 2031, and NASA is collaborating with its various centres and the European Space Agency (ESA) in order for this mission to succeed. But Perseverance is the first step in that journey.</p>\r\n<h4>Perseverances is searching for signs of life</h4>\r\n<p>The Mars rover is not just collecting sample rocks to bring back to Earth, but it is also the first rover actively looking for sciences of microbial life on the planet. That&rsquo;s also why the rover landed at the Jezero crater, believed to be an ancient lakebed and river delta.</p>\r\n<p>According to NASA&rsquo;s press statement, scientists have determined that 3.5 billion years ago, Jezero crater had its own river delta and was filled with water. Hence, this area could be vital in the search for signs of ancient microbial life.</p>\r\n<p>&ldquo;The rover is focused on astrobiology, or the study of life throughout the universe,&rdquo; explains NASA&rsquo;s mission page, adding it will search for &ldquo;telltale signs that microbial life may have lived on Mars billions of years ago.&rdquo; These core rock samples, which could hold clues to life on Mars, will be collected in metal tubes.</p>', 'nasa, mars, rover'),
(150, 'India', 'Six districts in Maharashtra record â€˜noticeableâ€™ rise in average daily Covid deaths', '2021-02-20 07:40:46', 'AC12CoronaTesting03.jpg', '<p>Many districts have recorded an increase in average daily <a class=\"\" href=\"https://indianexpress.com/about/coronavirus/\">Covid-19</a> deaths in the last three weeks even as the state&rsquo;s average has dropped, data analysed by <a class=\"\" href=\"https://indianexpress.com\">The Indian Express</a> shows. Six districts &mdash; Ratnagiri, Beed, Sindhudurg, Raigad, Satara and Amravati &mdash; have witnessed a noticeable rise in average daily deaths.</p>\r\n<p>The state&rsquo;s weekly data shows daily Covid deaths dropped from 30.7 between January 29 and February 4 to 22.85 between February 5 and 11, and rose slightly to 31.1 deaths per day last week.<span class=\"article_title\"><a id=\"Alsoread_editdriven\" class=\"click-event\" href=\"https://indianexpress.com/article/cities/mumbai/as-maharashtra-records-6112-cases-3-districts-focus-on-genome-sequencing-7196430/\"></a></span></p>\r\n<p>In Amravati, it rose from 0.85 deaths a day between February 5 and 11 to 1.71 between February 12 and 18. In the same period, Satara rose from 0.85 to 1.14 deaths, Beed from 0.57 to 1.28, and Raigad from 1.85 to 5.7 average deaths a day. Maharashtra accounts for 51,669 deaths, one-third of India&rsquo;s toll.</p>', 'corona, maharashtra, india');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `username`, `email`, `password`) VALUES
(16, 'Nobel User', 'nobel@gmail.com', '123'),
(22, 'randsalt', 'randsalt@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_registration`
--
ALTER TABLE `admin_registration`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

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
-- Indexes for table `news_sugg`
--
ALTER TABLE `news_sugg`
  ADD PRIMARY KEY (`post_id2`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_registration`
--
ALTER TABLE `admin_registration`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `news_sugg`
--
ALTER TABLE `news_sugg`
  MODIFY `post_id2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
