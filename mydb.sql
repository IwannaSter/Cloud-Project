SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `Teachers` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Students` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `fathername` varchar(80) NOT NULL,
  `grade` float(11) NOT NULL,
  `mobilenumber` varchar(80) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `Teachers` (`id`, `name`, `surname`, `username`, `password`, `email`) VALUES
(1, 'John', 'Smith','jo', '123asd', 'jsmith@email.com'),
(2, 'Mary', 'Moe','ma', '123qwe', 'mmoe@email.com');

INSERT INTO `Students` (`id`, `name`, `surname`, `fathername`, `grade`, `mobilenumber`, `birthday`) VALUES
(1, 'James', 'Bond','Andew', 5.0, '6900000000', '2000-01-02'),
(2, 'Paul', 'Brown','Adam', 6.0, '6900000000', '2001-04-03'),
(3, 'Peter', 'Papadopoulos','Tom', 7.0, '6900000000', '2002-05-06');