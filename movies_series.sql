-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Φεβ 2019 στις 20:23:04
-- Έκδοση διακομιστή: 10.1.37-MariaDB
-- Έκδοση PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `movies_series`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `activeusers`
--

CREATE TABLE `activeusers` (
  `tableid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_password`, `id`) VALUES
('MasterAdmin', 'dibuth', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `favoritelist`
--

CREATE TABLE `favoritelist` (
  `tableid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `seriesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `favoritelist`
--

INSERT INTO `favoritelist` (`tableid`, `userid`, `movieid`, `seriesid`) VALUES
(36, 1, 5, 0),
(37, 1, 2, 0),
(38, 1, 0, 2),
(39, 1, 3, 0),
(40, 2, 1, 0),
(41, 2, 0, 1),
(42, 2, 0, 5),
(43, 2, 0, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `releaseyear` int(4) NOT NULL,
  `director` varchar(30) NOT NULL,
  `cast` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `rating` double NOT NULL,
  `comments` text NOT NULL,
  `duration` double NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `movie_name`, `description`, `releaseyear`, `director`, `cast`, `genre`, `rating`, `comments`, `duration`, `image`) VALUES
(1, 'Titanic', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic. ', 1997, 'James Cameron ', 'Leonardo DiCaprio, Kate Winslet, Billy Zane', 'drama', 8.475, 'ÎŸ Ï‡ÏÎ®ÏƒÏ„Î·Ï‚ Ilias1\n ÏƒÏ‡Î¿Î»Î¯Î±ÏƒÎµ:  [  \r\n			\r\n			ok	 ] \n', 3.14, 'movieimages/titanic.jpg'),
(2, 'The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency. ', 1994, ' Frank Darabont,Stephen King', 'Tim Robbins, Morgan Freeman, Bob Gunton .', 'drama', 8.6, '0', 2.22, 'movieimages/The Shawshank Redemption.jpg'),
(3, 'The Godfather', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son. ', 1972, ' Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan ', 'Crime, Drama', 7.95, '0', 2.55, 'movieimages/godfather.jpg'),
(4, 'The Lord of the Rings: The Return of the King', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring. ', 2003, 'Peter Jackson', 'Elijah Wood, Viggo Mortensen, Ian McKellen ', ' Action, Adventure, Drama', 8.7, '0', 3.21, 'movieimages/The Lord of the RingsThe Return of the King.jpg'),
(5, 'Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption. ', 1994, 'Quentin Tarantino', 'John Travolta, Uma Thurman, Samuel L. Jackson', ' Crime, Drama', 7.7, '0', 2.34, 'movieimages/Pulp Fiction.jpg'),
(6, 'Aquaman', 'Arthur Curry, the human-born heir to the underwater kingdom of Atlantis, goes on a quest to prevent a war between the worlds of ocean and land.', 2018, 'James Wan', ' Jason Momoa, Amber Heard, Willem Dafoe', 'Action, Adventure, Fantasy', 7.4, '', 2.23, 'movieimages/aquaman.jpg'),
(7, 'Split', ' \r\nThree girls are kidnapped by a man with a diagnosed 23 distinct personalities. They must try to escape before the apparent emergence of a frightful new 24th.', 2016, 'M. Night Shyamalan', 'James McAvoy, Anya Taylor-Joy, Haley Lu Richardson ', ' Horror, Thriller', 7.3, ' \r\n       ', 1.57, 'movieimages/split.jpg'),
(8, 'Fantastic Beasts: The Crimes of Grindelwald ', ' \r\nThe second installment of the \"Fantastic Beasts\" series featuring the adventures of Magizoologist Newt Scamander.', 2018, 'David Yates', 'Eddie Redmayne, Katherine Waterston, Dan Fogler', 'Adventure, Family, Fantasy', 6.8, ' \r\n       ', 2.14, 'movieimages/cog.jpg'),
(9, 'Ralph Breaks the Internet', ' Six years after the events of \"Wreck-It Ralph,\" Ralph and Vanellope, now friends, discover a wi-fi router in their arcade, leading them into a new adventure.\r\n       ', 2018, 'Phil Johnston, Rich Moore', 'John C. Reilly, Sarah Silverman, Gal Gadot ', 'Animation, Adventure, Comedy', 7.3, ' \r\n       ', 1.52, 'movieimages/wbi.jpg'),
(10, 'A Quiet Place', 'In a post-apocalyptic world, a family is forced to live in silence while hiding from monsters with ultra-sensitive hearing. \r\n       ', 2018, 'John Krasinski', 'Emily Blunt, John Krasinski, Millicent Simmonds', ' Drama, Horror, Mystery', 7.6, ' \r\n       ', 1.3, 'movieimages/quietplace.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `ratings`
--

CREATE TABLE `ratings` (
  `tableid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `seriesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `ratings`
--

INSERT INTO `ratings` (`tableid`, `userid`, `movieid`, `seriesid`) VALUES
(1, 2, 1, 0),
(2, 1, 1, 0),
(3, 1, 2, 0),
(4, 1, 3, 0),
(5, 1, 0, 2),
(6, 2, 0, 1),
(7, 2, 0, 2),
(8, 2, 0, 4),
(9, 1, 0, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `series_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `releaseyear` int(11) NOT NULL,
  `director` varchar(200) NOT NULL,
  `cast` text NOT NULL,
  `genre` text NOT NULL,
  `rating` double NOT NULL,
  `comments` text NOT NULL,
  `duration` double NOT NULL,
  `image` varchar(100) NOT NULL,
  `num_of_seasons` int(11) NOT NULL,
  `num_of_episodes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `series`
--

INSERT INTO `series` (`id`, `series_name`, `description`, `releaseyear`, `director`, `cast`, `genre`, `rating`, `comments`, `duration`, `image`, `num_of_seasons`, `num_of_episodes`) VALUES
(1, 'Game of Thrones', 'Nine noble families fight for control over the mythical lands of Westeros, while an ancient enemy returns after being dormant for thousands of years. ', 2011, 'David Benioff, D.B. Weiss', ' Emilia Clarke, Peter Dinklage, Kit Harington', ' Action, Adventure, Drama', 8.875, 'ÎŸ Ï‡ÏÎ®ÏƒÏ„Î·Ï‚ DiPa\n ÏƒÏ‡Î¿Î»Î¯Î±ÏƒÎµ:  [  \r\n			\r\n			9/10	 ] \n', 0.57, 'seriesimages/got.jpg', 8, 73),
(2, 'Outlander', 'An English combat nurse from 1945 is mysteriously swept back in time to 1743.', 2014, 'Ronald D. Moore', ' Caitriona Balfe, Sam Heughan, Duncan Lacroix ', ' Drama, Fantasy, Romance ', 9.375, 'ÎŸ Ï‡ÏÎ®ÏƒÏ„Î·Ï‚ Ilias1\n ÏƒÏ‡Î¿Î»Î¯Î±ÏƒÎµ:  [  \r\n			\r\n		ok2		 ] \n ', 1.4, 'seriesimages/outlander.jpg', 4, 79),
(3, 'The Flash', 'After being struck by lightning, Barry Allen wakes up from his coma to discover he\'s been given the power of super speed, becoming the Flash, fighting crime in Central City. ', 2014, ' Greg Berlanti, Geoff Johns, Andrew Kreisberg', ' Grant Gustin, Candice Patton, Danielle Panabaker ', ' Action, Adventure, Drama ', 7.9, ' ', 0.43, 'seriesimages/flash.jpg', 5, 115),
(4, 'Black Mirror', 'An anthology series exploring a twisted, high-tech world where humanity\'s greatest innovations and darkest instincts collide. ', 2011, 'Charlie Brooker', 'Daniel Lapaine, Hannah John-Kamen, Michaela Coel ', ' Drama, Sci-Fi, Thriller', 8.95, '', 1, 'seriesimages/black_mirror.jpg', 4, 23),
(5, 'Doctor Who', 'The further adventures in time and space of the alien adventurer known as the Doctor, a Time Lord/Lady who can change appearance and gender by regenerating when near death, and his/her human companions.', 2005, 'Sydney Newman', 'Jodie Whittaker, Peter Capaldi, Pearl Mackie', 'Adventure, Drama, Family ', 7.8, '', 0.45, 'seriesimages/doctor_who.jpg', 11, 188),
(7, 'American Gods', 'A recently released ex-convict named Shadow meets a mysterious man who calls himself \"Wednesday\" and who knows more than he first seems to about Shadow\'s life and past. \r\n       ', 2017, 'Bryan Fuller, Michael Green', 'Ricky Whittle, Emily Browning, Pablo Schreiber', 'Drama, Fantasy, Mystery', 8, ' \r\n       ', 1, 'seriesimages/ag.jpg', 0, 0),
(8, 'Grey\'s Anatomy', 'A drama centered on the personal and professional lives of five surgical interns and their supervisors. \r\n       ', 2005, 'Shonda Rhimes', ' Ellen Pompeo, Justin Chambers, Chandra Wilson ', ' Drama, Romance', 7.6, ' \r\n       ', 0.41, 'seriesimages/ga.jpg', 0, 0),
(9, 'Peaky Blinders ', ' \r\nA gangster family epic set in 1919 Birmingham, England; centered on a gang who sew razor blades in the peaks of their caps, and their fierce boss Tommy Shelby. ', 2013, 'Steven Knight', 'Cillian Murphy, Helen McCrory, Paul Anderson', ' Crime, Drama', 8.8, ' \r\n       ', 1, 'seriesimages/pb.jpg', 0, 0),
(10, 'The Good Place', 'Four people and their otherworldly frienemy struggle in the afterlife to define what it means to be good. \r\n       ', 2016, 'Michael Schur', 'Kristen Bell, William Jackson Harper, Jameela Jamil', ' Comedy, Drama, Fantasy ', 8.2, ' \r\n       ', 0.22, 'seriesimages/goodp.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `city`, `phone`, `password`, `id`) VALUES
('Ilias1', 'Ilias', 'zach', 'uthproject@mail.com', 'Crete', '6955365875', '123456789', 1),
('DiPa', 'Dimitris', 'Pantelis', 'dimitrispantelis95@gmail.com', 'Lamia', '6955687988', '12345677', 2),
('Maria13', 'Maria', 'Fotou', 'mariaf@mail.com', 'Athens', '6958754558', '123456789', 3),
('AnnaP', 'Anna', 'Papavasileiou', 'AnnaPapa@mail.com', 'Skyros', '6954587369', '12345', 4),
('LenaM', 'Lena', 'Malliou', 'LenaM20#mail.com', 'London', '6955335905', 'lenam20', 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `watchlist`
--

CREATE TABLE `watchlist` (
  `tableid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `seriesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `watchlist`
--

INSERT INTO `watchlist` (`tableid`, `userid`, `movieid`, `seriesid`) VALUES
(12, 0, 0, 1),
(13, 1, 3, 0),
(17, 2, 0, 4),
(22, 2, 0, 2),
(23, 1, 0, 7),
(24, 2, 3, 0);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `activeusers`
--
ALTER TABLE `activeusers`
  ADD PRIMARY KEY (`tableid`);

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `favoritelist`
--
ALTER TABLE `favoritelist`
  ADD PRIMARY KEY (`tableid`);

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`tableid`);

--
-- Ευρετήρια για πίνακα `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`tableid`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `activeusers`
--
ALTER TABLE `activeusers`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT για πίνακα `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `favoritelist`
--
ALTER TABLE `favoritelist`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `ratings`
--
ALTER TABLE `ratings`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
