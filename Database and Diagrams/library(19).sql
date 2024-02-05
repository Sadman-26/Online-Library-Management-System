-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 05:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_name` varchar(100) NOT NULL,
  `User_ID` varchar(8) DEFAULT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Phone_No` varchar(11) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User_name`, `User_ID`, `Name`, `Phone_No`, `Password`, `Email`) VALUES
('MaisaKabir', 'A769', 'Maisa Kabir', '45678901234', '$2y$10$on/wIJa83a2if.CoJ6E5K.dXZ6Da07KjjH9vqBNpiF5snQVWnCe7G', 'maisa.kabir@example.com'),
('MDSadmanSaqib', 'A984', 'MD. Sadman Saqib', '56789012345', '$2y$10$0KdfhUthZAwcujDgoPBTuewIuL1E5E7ZrD2YNuvzKs0cmhvTVX4A6', 'md.sadman.saqib@example.com'),
('NafisaRahman', 'A584', 'Nafisa Rahman', '34567890123', '$2y$10$B6f4Hfq1QUyiXaCiUUkyOOND.tVyzx0h7uvq9FPHK67pXMdzwlPH6', 'nafisa.rahman@example.com'),
('TazrianHossain', 'A579', 'Tazrian Hossain', '73698542247', '$2y$10$y5DN7ZQuX.RL6UzmqdHkB.6CHD.GsNrqwFKgaHspVSORGD1tvUtfq', 'tazrian.hossain@example.com'),
('WasimaAnnan', 'A233', 'Wasima Annan', '01578452268', '$2y$10$yzu9VesXnQnfHg2e0vLn1uliZeqSTlIlH/E68tFzOtIU1eBg32KkC', 'wasima.annan@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `User_ID` varchar(8) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `OTP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`User_ID`, `Password`, `OTP`) VALUES
('A233', '$2y$10$c7t2qaZIq/XOL/uk7Byd6.FTHAUHgXiuIHsTbgF3YwRW0UV6.Tlf.', '89021'),
('A579', '$2y$10$y5DN7ZQuX.RL6UzmqdHkB.6CHD.GsNrqwFKgaHspVSORGD1tvUtfq', '72436'),
('A584', '$2y$10$yiXdqQECIcGScVqbah7Q4OnkdxkCCp0TOn5PhH60FfhAUri.EJLEu', '53798'),
('A769', '$2y$10$AoQouI0aAilTLN.PFhGcQulawkzzjO31NSLvkSQWxn0Z8OCXW5dK2', '16245'),
('A984', '$2y$10$hCc6SltyDWNxYpw3I5VOROni52vUN6J1FJhC99/OeePAKQ3AaXZpa', '47589'),
('M119', '$2y$10$92Mb2gqmeDfCor7hBgGcKeDZ6u6oPbGGNHn9jpvzsBE8kXUN.YSMy', '39726'),
('M202', '$2y$10$U4cPJO1.XaNC5sHodATm4.F.A3U8/fj2Jd5FNKAVoT7AlTqk0VkuS', '97830'),
('M396', '$2y$10$BsKJA4dlpupA1/SH9NUZredi8JnK8qSQ6Xr/POIUeZ4Gt/95h//la', '28491'),
('M565', '$2y$10$1Ulo13sPe0WfCdr8bnC4ZeOavu1/UxhjtK6qHl/I.GP.ft4msy9Oe', '69236'),
('M602', '$2y$10$AA90NTKYJUEb4cMD1GsNEeglLrQRsCDwksXIlx3MWCsz3B494x7S.', '39314'),
('M724', '$2y$10$hcRCO9WDZ2k6bbW2oj8k4eaJN4CP3opWtkOOLGTLMT/ywMbdtT7.a', '97537'),
('M805', '$2y$10$2lVK1KGexyvsxKoqN1Zbl.W6LOJTjlJq6TjpiCBYJVX1RkhbDkXs6', '18013'),
('M819', '$2y$10$exDbGolYKoky1yasDJ.NHOWoWfMRBBtvrxNH6o6YN9IL9VekAUPBO', '51016'),
('M844', '$2y$10$8Aa3igLnZ7DN9KJeZGqPmuifgsd9uycZ6AXihzDuw.znYG39b1f/O', '19771'),
('M905', '$2y$10$mTzfCnDlLZZNeoY4ZipNveQIfmvC36UR3PUB.WWGq9cds4iCUzATu', '05062');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_ID` varchar(9) NOT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Edition` varchar(100) DEFAULT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Publisher_ID` varchar(10) DEFAULT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `Member_ID` varchar(10) DEFAULT NULL,
  `Issue_Date` date DEFAULT NULL,
  `Return_date` date DEFAULT NULL,
  `Fine` decimal(10,0) DEFAULT NULL,
  `Entry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_ID`, `ISBN`, `Title`, `Author`, `Edition`, `Genre`, `Description`, `Publisher_ID`, `admin_username`, `Member_ID`, `Issue_Date`, `Return_date`, `Fine`, `Entry_date`) VALUES
('B1W9C5T3', '978-0-987654-32-1', 'Bridge to Terabithia', 'Katherine Paterson', 'Special Edition', 'Children\'s Literature', 'Jess Aarons has been practicing all summer so he can be the fastest runner in the fifth grade. And he almost is, until the new girl in school, Leslie Burke, outpaces him. The two become fast friends and spend most days in the woods behind Leslie\'s house, where they invent an enchanted land called Terabithia. One morning, Leslie goes to Terabithia without Jess and a tragedy occurs. It will take the love of his family and the strength that Leslie has given him for Jess to be able to deal with his grief.\n\nBridge to Terabithia was also named an ALA Notable Children’s Book and has become a touchstone of children’s literature, as have many of Katherine Paterson’s other novels, including The Great Gilly Hopkins and Jacob Have I Loved.', 'HARPER123', 'TazrianHossain', '4288160', '2023-08-17', '2023-08-24', 13, '2022-08-22'),
('B1W9C5XX', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure—it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2023-08-24'),
('B1W9C5Z7', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure-it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', '4288160', '2023-08-17', '2023-08-23', 18, '2022-08-21'),
('B1W9L5O7', '978-1-234567-89-0', 'Number the Stars', 'Lois Lowry', 'Anniversary Edition', 'Historical Fiction', 'Ten-year-old Annemarie Johansen and her best friend Ellen Rosen often think of life before the war. It\'s now 1943 and their life in Copenhagen is filled with school, food shortages, and the Nazi soldiers marching through town. When the Jews of Denmark are \"relocated,\" Ellen moves in with the Johansens and pretends to be one of the family. Soon Annemarie is asked to go on a dangerous mission to save Ellen\'s life.', 'HOUGHTON34', 'WasimaAnnan', '4288160', '2023-08-17', '2023-08-24', 16, '2022-08-23'),
('B1WDL5O3', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure—it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2023-08-24'),
('B2V6R8Z0', '978-1-234567-89-1', 'Eragon', 'Christopher Paolini', 'First Edition', 'Fantasy', 'One boy...\nOne dragon...\nA world of adventure.\n\nWhen Eragon finds a polished blue stone in the forest, he thinks it is the lucky discovery of a poor farm boy; perhaps it will buy his family meat for the winter. But when the stone brings a dragon hatchling, Eragon soon realizes he has stumbled upon a legacy nearly as old as the Empire itself.\n\nOvernight his simple life is shattered, and he is thrust into a perilous new world of destiny, magic, and power. With only an ancient sword and the advice of an old storyteller for guidance, Eragon and the fledgling dragon must navigate the dangerous terrain and dark enemies of an Empire ruled by a king whose evil knows no bounds.\n\nCan Eragon take up the mantle of the legendary Dragon Riders? The fate of the Empire may rest in his hands.', 'KNOPF678', 'TazrianHossain', '4703270', '2023-08-17', '2023-08-24', NULL, '2022-08-24'),
('B3Y7E2T1', '978-1-234567-89-2', 'Where the Red Fern Grows', 'Wilson Rawls', 'Collector\'s Edition', 'Adventure', 'A loving threesome, they ranged the dark hills and river bottoms of Cherokee County. Old Dan had the brawn, Little Ann had the brains—and Billy had the will to train them to be the finest hunting team in the valley. Glory and victory were coming to them, but sadness waited too. And close by was the strange and wonderful power that\'s only found...\n\nWhere the Red Fern Grows—An exciting tale of love and adventure you\'ll never forget.', 'DOUBLEDAY4', 'MDSadmanSaqib', '3726259', '2023-08-17', '2023-08-24', 11, '2022-08-25'),
('B4A8D6K5', '978-1-234567-89-3', 'Lord of the Flies', 'William Golding', 'Definitive Edition', 'Classic Literature', 'At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate; this far from civilization the boys can do anything they want. Anything. They attempt to forge their own society, failing, however, in the face of terror, sin and evil. And as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far from reality as the hope of being rescued. Labeled a parable, an allegory, a myth, a morality tale, a parody, a political treatise, even a vision of the apocalypse, Lord of the Flies is perhaps our most memorable novel about “the end of innocence, the darkness of man’s heart.”', 'VIKING789', 'NafisaRahman', '3726259', '2023-08-04', '2023-08-11', 24, '2022-08-26'),
('B4A8F9N1', '978-1-234567-89-4', 'The Alchemist', 'Paulo Coelho', 'Special Edition', 'Fiction', 'Paulo Coelho\'s masterpiece tells the mystical story of Santiago, an Andalusian shepherd boy who yearns to travel in search of a worldly treasure. His quest will lead him to riches far different—and far more satisfying—than he ever imagined. Santiago\'s journey teaches us about the essential wisdom of listening to our hearts, recognizing opportunity and learning to read the omens strewn along life\'s path, and, most importantly, following our dreams.', 'HARPER123', 'NafisaRahman', '4703270', '2023-08-17', '2023-08-24', NULL, '2022-08-27'),
('B5X0H1U4', '978-1-234567-89-5', 'The Westing Game', 'Ellen Raskin', 'Mystery Edition', 'Mystery', 'A bizarre chain of events begins when sixteen unlikely people gather for the reading of Samuel W. Westing\'s will. And though no one knows why the eccentric, game-loving millionaire has chosen a virtual stranger-and a possible murderer-to inherit his vast fortune, one thing\'s for sure: Sam Westing may be dead ... but that won\'t stop him from playing one last game!', 'HARCOURT34', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-08-28'),
('B64e78470', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure—it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2023-08-24'),
('B64e784d4', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure—it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2023-08-24'),
('B64eb95dd', '978-1-234567-70-9', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 'First', 'Fantasy', 'Ever since Harry Potter had come home for the summer, the Dursleys had been so mean and hideous that all Harry wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he’s packing his bags, Harry receives a warning from a strange impish creature who says that if Harry returns to Hogwarts, disaster will strike.\r\n\r\nAnd strike it does. For in Harry’s second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor and a spirit who haunts the girls’ bathroom. But then the real trouble begins – someone is turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects… Harry Potter himself!', 'LEVINE08', 'TazrianHossain', NULL, NULL, NULL, NULL, '2023-08-27'),
('B64eba25', '978-1-234567-75-2', 'A Feast for Crows', 'George R.R. Martin', 'Mass Market Paperback', 'Fantasy', 'Crows will fight over a dead man\'s flesh, and kill each other for his eyes.\r\n\r\nBloodthirsty, treacherous and cunning, the Lannisters are in power on the Iron Throne in the name of the boy-king Tommen. The war in the Seven Kingdoms has burned itself out, but in its bitter aftermath new conflicts spark to life.', 'BANTAM26', 'MaisaKabir', '1549448', '2023-08-28', '2023-09-04', 0, '2023-08-27'),
('B6U4H8I2', '978-1-234567-89-6', 'Where the Wild Things Are', 'Maurice Sendak', 'Classic Edition', 'Children\'s Literature', 'Max, a wild and naughty boy, is sent to bed without his supper by his exhausted mother. In his room, he imagines sailing far away to a land of Wild Things. Instead of eating him, the Wild Things make Max their king.', 'HARPER123', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-08-29'),
('B6U4T7E8', '978-1-234567-89-7', 'The Hobbit', 'J.R.R. Tolkien', 'Classic Edition', 'Fantasy', 'In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor yet a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort.\nWritten for J.R.R. Tolkien’s own children, The Hobbit met with instant critical acclaim when it was first published in 1937. Now recognized as a timeless classic, this introduction to the hobbit Bilbo Baggins, the wizard Gandalf, Gollum, and the spectacular world of Middle-earth recounts of the adventures of a reluctant hero, a powerful and dangerous ring, and the cruel dragon Smaug the Magnificent. The text in this 372-page paperback edition is based on that first published in Great Britain by Collins Modern Classics (1998), and includes a note on the text by Douglas A. Anderson (2001).', 'HARPER123', 'TazrianHossain', '1549448', '2023-08-27', '2023-08-29', 0, '2022-08-30'),
('B7N1G2F9', '978-1-234567-89-8', 'Alice\'s Adventures in Wonderland', 'Lewis Carroll', 'Illustrated Edition', 'Fantasy', 'Chris Riddell\'s brilliant new full-colour illustrated Alice’s Adventures in Wonderland in a sumptuous hardback and jacketed edition. A perfect gift for families, children and all fans of this much-loved favourite classic.\n\nFirst published by Macmillan more than 150 years ago, Lewis Carroll’s iconic story has been loved and enjoyed by generations of children.\n\nThis edition presents Lewis Carroll\'s complete text, with new illustrations from Costa Award- and Kate Greenaway Medal-winner Chris Riddell. Published 200 years after the birth of Alice’s first illustrator, Sir John Tenniel, also the political cartoonist of his time, Chris Riddell\'s illustrations set a new bar in terms of excellence with his unique, rich and evocative interpretation of Carroll\'s world.\n\nWith the curious, quick-witted Alice at its heart, readers will not only rediscover characters such as the charming White Rabbit, the formidable Queen of Hearts, the Mad Hatter and the grinning Cheshire Cat but will find fresh and wonderful creations of these characters by a true master of his art,; images that will live in our hearts and minds for generations to come.', 'PHILOMEL67', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-08-31'),
('B7N1G2K3', '978-1-234567-89-9', 'The Book Thief', 'Markus Zusak', 'Collector\'s Edition', 'Historical Fiction', 'It is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will be busier still.\n\nBy her brother\'s graveside, Liesel\'s life is changed when she picks up a single object, partially hidden in the snow. It is The Gravedigger\'s Handbook, left behind there by accident, and it is her first act of book thievery. So begins a love affair with books and words, as Liesel, with the help of her accordian-playing foster father, learns to read. Soon she is stealing books from Nazi book-burnings, the mayor\'s wife\'s library, wherever there are books to be found.\n\nBut these are dangerous times. When Liesel\'s foster family hides a Jew in their basement, Liesel\'s world is both opened up, and closed down.\n\nIn superbly crafted writing that burns with intensity, award-winning author Markus Zusak has given us one of the most enduring stories of our time.', 'KNOPF678', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-01'),
('B7YH3E9K1', '978-2-345678-90-0', 'Charlotte\'s Web', 'E.B. White', 'First Edition', 'Children\'s Literature', 'This beloved book by E. B. White, author of Stuart Little and The Trumpet of the Swan, is a classic of children\'s literature that is \"just about perfect.\" This high-quality paperback features vibrant illustrations colorized by Rosemary Wells!\n\nSome Pig. Humble. Radiant. These are the words in Charlotte\'s Web, high up in Zuckerman\'s barn. Charlotte\'s spiderweb tells of her feelings for a little pig named Wilbur, who simply wants a friend. They also express the love of a girl named Fern, who saved Wilbur\'s life when he was born the runt of his litter.\n\nE. B. White\'s Newbery Honor Book is a tender novel of friendship, love, life, and death that will continue to be enjoyed by generations to come. This edition contains newly color illustrations by Garth Williams, the acclaimed illustrator of E. B. White\'s Stuart Little and Laura Ingalls Wilder\'s Little House series, among many other books.', 'HARPER123', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-02'),
('B8N4M6I2', '978-2-345678-90-1', 'Brown Girl Dreaming', 'Jacqueline Woodson', 'Poetry Edition', 'Poetry', 'Jacqueline Woodson, one of today\'s finest writers, tells the moving story of her childhood in mesmerizing verse.\n\nRaised in South Carolina and New York, Woodson always felt halfway home in each place. In vivid poems, she shares what it was like to grow up as an African American in the 1960s and 1970s, living with the remnants of Jim Crow and her growing awareness of the Civil Rights movement. Touching and powerful, each poem is both accessible and emotionally charged, each line a glimpse into a child’s soul as she searches for her place in the world. Woodson’s eloquent poetry also reflects the joy of finding her voice through writing stories, despite the fact that she struggled with reading as a child. Her love of stories inspired her and stayed with her, creating the first sparks of the gifted writer she was to become.', 'FSG123', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-09-03'),
('B9FDL4O3', '978-0-838254-32-1', 'Brida', 'Paulo Coelho', 'Paperback Edition', 'Fiction', 'This is the story of Brida, a young Irish girl, and her quest for knowledge. She has long been interested in various aspects of magic but is searching for something more. Her search leads her to people of great wisdom, who begin to teach Brida about the spiritual world. She meets a wise man who dwells in a forest, who teaches her about overcoming her fears and trusting in the goodness of the world; and a woman who teaches her how to dance to the music of the world, and how to pray to the moon. As Brida seeks her destiny, she struggles to find a balance between her relationships and her desire to become a witch. This enthralling novel incorporates themes that fans of Paulo Coelho will recognize and treasure—it is a tale of love, passion, mystery, and spirituality from the master storyteller.', 'HARPER123', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2023-08-24'),
('B9GK4M6P8', '978-2-345678-90-2', 'The Diary of a Young Girl', 'Anne Frank', 'Definitive Edition', 'Biography', 'Discovered in the attic in which she spent the last years of her life, Anne Frank’s remarkable diary has become a world classic—a powerful reminder of the horrors of war and an eloquent testament to the human spirit.\n\nIn 1942, with the Nazis occupying Holland, a thirteen-year-old Jewish girl and her family fled their home in Amsterdam and went into hiding. For the next two years, until their whereabouts were betrayed to the Gestapo, the Franks and another family lived cloistered in the “Secret Annexe” of an old office building. Cut off from the outside world, they faced hunger, boredom, the constant cruelties of living in confined quarters, and the ever-present threat of discovery and death. In her diary Anne Frank recorded vivid impressions of her experiences during this period. By turns thoughtful, moving, and surprisingly humorous, her account offers a fascinating commentary on human courage and frailty and a compelling self-portrait of a sensitive and spirited young woman whose promise was tragically cut short.', 'DOUBLEDAY4', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-04'),
('B9I2J0D7', '978-2-345678-90-3', 'The Fault in Our Stars', 'John Green', 'Movie Tie-in Edition', 'Young Adult', 'Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel\'s story is about to be completely rewritten.\n\nInsightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Green\'s most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love.', 'PENGUIN567', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-05'),
('B9I2O3J0', '978-2-345678-90-4', 'The Hunger Games', 'Suzanne Collins', 'Special Edition', 'Science Fiction', 'Could you survive on your own in the wild, with every one out to make sure you don\'t live to see the morning?\n\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.\n\nSixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she steps forward to take her sister\'s place in the Games. But Katniss has been close to dead before—and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weight survival against humanity and life against love.', 'SCHOLASTIC', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-06'),
('BA9I2O3P0', '978-2-345678-90-5', 'A Wrinkle in Time', 'Madeleine L\'Engle', 'Special Edition', 'Science Fiction', 'Out of this wild night, a strange visitor comes to the Murry house and beckons Meg, her brother Charles Wallace, and their friend Calvin O\'Keefe on a most dangerous and extraordinary adventure—one that will threaten their lives and our universe.\n\nWinner of the 1963 Newbery Medal, A Wrinkle in Time is the first book in Madeleine L\'Engle\'s classic Time Quintet.', 'FSG123', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-09-07'),
('BC7N1G2H9', '978-2-345678-90-6', 'The Cat in the Hat', 'Dr. Seuss', 'Deluxe Edition', 'Children\'s Literature', 'Then he said That is that.\nAnd then he was gone\nWith a tip of his hat.\n\nA dreary day turns into a wild romp when this beloved story introduces readers to the Cat in the Hat and his troublemaking friends, Thing 1 and Thing 2 – And don\'t forget Fish! A favorite among kids, parents and teachers, this story uses simple words and basic rhyme to encourage and delight beginning readers.\n\nOriginally created by Dr. Seuss himself, Beginner Books are fun, funny, and easy to read. These unjacketed hardcover early readers encourage children to read all on their own, using simple words and illustrations. Smaller than the classic large format Seuss picture books like The Lorax and Oh, The Places You\'ll Go!, these portable packages are perfect for practicing readers ages 3-7, and lucky parents too!', 'RANDOM789', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2022-09-08'),
('BD2A6F8R7', '978-2-345678-90-7', 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'Special Edition', 'Fantasy', 'Harry Potter thinks he is an ordinary boy - until he is rescued by an owl, taken to Hogwarts School of Witchcraft and Wizardry, learns to play Quidditch and does battle in a deadly duel. The Reason ... HARRY POTTER IS A WIZARD!', 'SCHOLASTIC', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-09'),
('BF5C2H1J0', '978-2-345678-90-8', 'The Giver', 'Lois Lowry', 'Revised Edition', 'Dystopian Fiction', 'At the age of twelve, Jonas, a young boy from a seemingly utopian, futuristic world, is singled out to receive special training from The Giver, who alone holds the memories of the true joys and pain of life.', 'HOUGHTON34', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-09-10'),
('BG3Y7E2S1', '978-2-345678-90-9', 'The Secret Garden', 'Frances Hodgson Burnett', 'Collector\'s Edition', 'Children\'s Literature', 'In a house full of sadness and secrets, can young, orphaned Mary find happiness?\n\nMary Lennox, a spoiled, ill-tempered, and unhealthy child, comes to live with her reclusive uncle in Misselthwaite Manor on England’s Yorkshire moors after the death of her parents. There she meets a hearty housekeeper and her spirited brother, a dour gardener, a cheerful robin, and her wilful, hysterical, and sickly cousin, Master Colin, whose wails she hears echoing through the house at night.\n\nWith the help of the robin, Mary finds the door to a secret garden, neglected and hidden for years. When she decides to restore the garden in secret, the story becomes a charming journey into the places of the heart, where faith restores health, flowers refresh the spirit, and the magic of the garden, coming to life anew, brings health to Colin and happiness to Mary.', 'WARNE456', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-11'),
('BG3Y7T3D2', '978-3-456789-01-0', 'Pride and Prejudice', 'Jane Austen', 'Special Edition', 'Romance', 'Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work \"her own darling child\" and its vivacious heroine, Elizabeth Bennet, \"as delightful a creature as ever appeared in print.\" The romantic clash between the opinionated Elizabeth and her proud beau, Mr. Darcy, is a splendid performance of civilized sparring. And Jane Austen\'s radiant wit sparkles as her characters dance a delicate quadrille of flirtation and intrigue, making this book the most superb comedy of manners of Regency England.\n', 'HOUGHTON34', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-09-12'),
('BI6U4O8S7', '978-3-456789-01-1', 'Wonder', 'R.J. Palacio', 'Movie Tie-in Edition', 'Young Adult', 'I won’t describe what I look like. Whatever you’re thinking, it’s probably worse.\n\nAugust Pullman was born with a facial difference that, up until now, has prevented him from going to a mainstream school. Starting 5th grade at Beecher Prep, he wants nothing more than to be treated as an ordinary kid—but his new classmates can’t get past Auggie’s extraordinary face. Wonder, begins from Auggie’s point of view, but soon switches to include his classmates, his sister, her boyfriend, and others.', 'KNOPF678', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-13'),
('BJ6U4J2H5', '978-3-456789-01-2', 'To Kill a Mockingbird', 'Harper Lee', 'Classic Edition', 'Classic Literature', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. \"To Kill A Mockingbird\" became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\n\nCompassionate, dramatic, and deeply moving, \"To Kill A Mockingbird\" takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 'LIPPINCOTT', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-14'),
('BJ6U4T7R8', '978-3-456789-01-3', 'The Tale of Peter Rabbit', 'Beatrix Potter', 'Classic Edition', 'Children\'s Literature', 'Follow the story of naughty Peter Rabbit as he squeezes—predictably—under the gate into Mr. McGregor\'s garden and finds himself in all kinds of trouble! But how does Peter Rabbit get himself out of this tricky situation? Beatrix Potter\'s story about one mischievous but ultimately endearing little creature will tell us, accompanied by beautiful illustrations and timeless verses which have transcended generations.\n\n\'The Tale of Peter Rabbit\', first published in 1902, is still today one of Beatrix Potter\'s most popular and well-loved tales. It is the first of the illustrious series that is The World of Beatrix Potter\', and a story which has endured retelling after retelling at bedtimes all over the world.', 'WARNE456', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-15'),
('BK4A7E8D6', '978-3-456789-01-4', 'Charlie and the Chocolate Factory', 'Roald Dahl', 'Deluxe Edition', 'Children\'s Literature', 'Charlie Bucket\'s wonderful adventure begins when he finds one of Mr. Willy Wonka\'s precious Golden Tickets and wins a whole day inside the mysterious chocolate factory. Little does he know the surprises that are in store for him!', 'PENGUIN567', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-16'),
('BL7C1F9G2', '978-0-987654-32-1', 'Bridge to Terabithia', 'Katherine Paterson', 'Special Edition', 'Children\'s Literature', 'Jess Aarons has been practicing all summer so he can be the fastest runner in the fifth grade. And he almost is, until the new girl in school, Leslie Burke, outpaces him. The two become fast friends and spend most days in the woods behind Leslie\'s house, where they invent an enchanted land called Terabithia. One morning, Leslie goes to Terabithia without Jess and a tragedy occurs. It will take the love of his family and the strength that Leslie has given him for Jess to be able to deal with his grief.\n\nBridge to Terabithia was also named an ALA Notable Children’s Book and has become a touchstone of children’s literature, as have many of Katherine Paterson’s other novels, including The Great Gilly Hopkins and Jacob Have I Loved.', 'HARPER123', 'TazrianHossain', '1549448', '2023-08-28', '2023-09-04', 0, '2022-09-17'),
('BM9I2T3F1', '978-3-456789-01-6', 'The Outsiders', 'S.E. Hinton', 'Anniversary Edition', 'Young Adult', 'The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he\'s always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc. The murder gets under Ponyboy\'s skin, causing his bifurcated world to crumble and teaching him that pain feels the same whether a soc or a greaser.', 'VIKING789', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-09-18'),
('BO1W9F9O0', '978-3-456789-01-7', 'The Great Gatsby', 'F. Scott Fitzgerald', 'Definitive Edition', 'Classic Literature', 'The Great Gatsby, F. Scott Fitzgerald\'s third book, stands as the supreme achievement of his career. This exemplary novel of the Jazz Age has been acclaimed by generations of readers. The story of the fabulously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted \"gin was the national drink and sex the national obsession,\" it is an exquisitely crafted tale of America in the 1920s.\n\nThe Great Gatsby is one of the great classics of twentieth-century literature.', 'DOUBLEDAY4', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-19'),
('BO1W9L5Q4', '978-3-456789-01-8', 'Percy Jackson & The Olympians: The Lightning Thief', 'Rick Riordan', 'Movie Tie-in Edition', 'Fantasy', 'Percy Jackson is a good kid, but he can\'t seem to focus on his schoolwork or control his temper. And lately, being away at boarding school is only getting worse - Percy could have sworn his pre-algebra teacher turned into a monster and tried to kill him. When Percy\'s mom finds out, she knows it\'s time that he knew the truth about where he came from, and that he go to the one place he\'ll be safe. She sends Percy to Camp Half Blood, a summer camp for demigods (on Long Island), where he learns that the father he never knew is Poseidon, God of the Sea. Soon a mystery unfolds and together with his friends—one a satyr and the other the demigod daughter of Athena - Percy sets out on a quest across the United States to reach the gates of the Underworld (located in a recording studio in Hollywood) and prevent a catastrophic war between the gods.', 'HYPERION56', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-20'),
('BQ1W9N5T2', '978-1-234567-89-6', 'Where the Wild Things Are', 'Maurice Sendak', 'Classic Edition', 'Children\'s Literature', 'Max, a wild and naughty boy, is sent to bed without his supper by his exhausted mother. In his room, he imagines sailing far away to a land of Wild Things. Instead of eating him, the Wild Things make Max their king.', 'HARPER123', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-21'),
('BS4A8D6F5', '978-4-567890-12-0', 'The Very Hungry Caterpillar', 'Eric Carle', 'Anniversary Edition', 'Children\'s Literature', 'THE all-time classic story, from generation to generation, sold somewhere in the world every 30 seconds! Have you shared it with a child or grandchild in your life?\n\nOne sunny Sunday, the caterpillar was hatched out of a tiny egg. He was very hungry. On Monday, he ate through one apple; on Tuesday, he ate through three plums--and still he was hungry. When full at last, he made a cocoon around himself and went to sleep, to wake up a few weeks later wonderfully transformed into a butterfly!', 'PHILOMEL67', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-22'),
('BT8N4M6K9', '978-3-456789-01-2', 'To Kill a Mockingbird', 'Harper Lee', 'Definitive Edition', 'Classic Literature', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. \"To Kill A Mockingbird\" became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\n\nCompassionate, dramatic, and deeply moving, \"To Kill A Mockingbird\" takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 'LIPPINCOTT', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2022-09-23'),
('BT8N4S7P9', '978-4-567890-12-2', 'The Catcher in the Rye', 'J.D. Salinger', 'Revised Edition', 'Classic Literature', 'Fleeing the crooks at Pencey Prep, he pinballs around New York City seeking solace in fleeting encounters—shooting the bull with strangers in dive hotels, wandering alone round Central Park, getting beaten up by pimps and cut down by erstwhile girlfriends. The city is beautiful and terrible, in all its neon loneliness and seedy glamour, its mingled sense of possibility and emptiness. Holden passes through it like a ghost, thinking always of his kid sister Phoebe, the only person who really understands him, and his determination to escape the phonies and find a life of true meaning.\n\nThe Catcher in the Rye is an all-time classic in coming-of-age literature- an elegy to teenage alienation, capturing the deeply human need for connection and the bewildering sense of loss as we leave childhood behind.', 'SCHOLASTIC', 'MaisaKabir', NULL, NULL, NULL, NULL, '2022-09-24'),
('BU5X0H1J3', '978-4-567890-12-3', 'Holes', 'Louis Sachar', 'Revised Edition', 'Young Adult', 'Stanley Yelnats is under a curse. A curse that began with his no-good-dirty-rotten-pig-stealing-great-great-grandfather and has since followed generations of Yelnats. Now Stanley has been unjustly sent to a boys’ detention center, Camp Green Lake, where the boys build character by spending all day, every day digging holes exactly five feet wide and five feet deep. There is no lake at Camp Green Lake. But there are an awful lot of holes.\n\nIt doesn’t take long for Stanley to realize there’s more than character improvement going on at Camp Green Lake. The boys are digging holes because the warden is looking for something. But what could be buried under a dried-up lake? Stanley tries to dig up the truth in this inventive and darkly humorous tale of crime and punishment—and redemption.', 'FSG123', 'MDSadmanSaqib', NULL, NULL, NULL, NULL, '2022-09-25'),
('BU5X0R8M6', '978-4-567890-12-4', 'Brave New World', 'Aldous Huxley', 'Anniversary Edition', 'Science Fiction', 'Originally published in 1932, this outstanding work of literature is more crucial and relevant today than ever before. Cloning, feel-good drugs, antiaging programs, and total social control through politics, programming, and media has Aldous Huxley accurately predicted our future? With a storyteller s genius, he weaves these ethical controversies in a compelling narrative that dawns in the year 632 AF (After Ford, the deity). When Lenina and Bernard visit a savage reservation, we experience how Utopia can destroy humanity. A powerful work of speculative fiction that has enthralled and terrified readers for generations, Brave New World is both a warning to be heeded and thought-provoking yet satisfying entertainment.', 'PHILOMEL67', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-26'),
('BV8X0Z1L3', '978-4-567890-12-5', 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'Collector\'s Edition', 'Fantasy', 'Narnia… the land beyond the wardrobe door, a secret place frozen in eternal winter, a magical country waiting to be set free.\n\nLucy is the first to find the secret of the wardrobe in the professor\'s mysterious old house. At first her brothers and sister don\'t believe her when she tells of her visit to the land of Narnia. But soon Edmund, then Peter and Susan step through the wardrobe themselves. In Narnia they find a country buried under the evil enchantment of the White Witch. When they meet the Lion Aslan, they realize they\'ve been called to a great adventure and bravely join the battle to free Narnia from the Witch\'s sinister spell.', 'HARPER123', 'TazrianHossain', NULL, NULL, NULL, NULL, '2022-09-27'),
('BY3V7R6Q2', '978-4-567890-12-6', 'Matilda', 'Roald Dahl', 'Anniversary Edition', 'Children\'s Literature', 'Matilda is a little girl who is far too good to be true. At age five-and-a-half she\'s knocking off double-digit multiplication problems and blitz-reading Dickens. Even more remarkably, her classmates love her even though she\'s a super-nerd and the teacher\'s pet. But everything is not perfect in Matilda\'s world...\n\nFor starters she has two of the most idiotic, self-centered parents who ever lived. Then there\'s the large, busty nightmare of a school principal, Miss (\"The\") Trunchbull, a former hammer-throwing champion who flings children at will, and is approximately as sympathetic as a bulldozer. Fortunately for Matilda, she has the inner resources to deal with such annoyances: astonishing intelligence, saintly patience, and an innate predilection for revenge.', 'PENGUIN567', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2022-09-28'),
('BZ2V6Q4L5', '978-4-567890-12-7', '1984', 'George Orwell', 'Classic Edition', 'Dystopian Fiction', 'The new novel by George Orwell is the major work towards which all his previous writing has pointed. Critics have hailed it as his \"most solid, most brilliant\" work. Though the story of Nineteen Eighty-Four takes place thirty-five years hence, it is in every sense timely. The scene is London, where there has been no new housing since 1950 and where the city-wide slums are called Victory Mansions. Science has abandoned Man for the State. As every citizen knows only too well, war is peace.\n\nTo Winston Smith, a young man who works in the Ministry of Truth (Minitru for short), come two people who transform this life completely. One is Julia, whom he meets after she hands him a slip reading, \"I love you.\" The other is O\'Brien, who tells him, \"We shall meet in the place where there is no darkness.\" The way in which Winston is betrayed by the one and, against his own desires and instincts, ultimately betrays the other, makes a story of mounting drama and suspense.', 'HYPERION56', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2022-09-29'),
('BZ2V6Q4R8', '978-5-678901-23-4', 'Fahrenheit 451', 'Ray Bradbury', 'Dystopian Edition', 'Science Fiction', 'Guy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.', 'RANDOM789', 'WasimaAnnan', NULL, NULL, NULL, NULL, '2022-09-30'),
('BZ2V6R8P4', '978-0-123450-98-7', 'The Little Prince', 'Antoine de Saint-Exupery', 'Anniversary Edition', 'Fantasy', 'The Little Prince is an honest and beautiful story about loneliness, friendship, sadness, and love. The prince is a small boy from a tiny planet (an asteroid to be precise), who travels the universe, planet-to-planet, seeking wisdom. On his journey, he discovers the unpredictable nature of adults.', 'HARCOURT34', 'NafisaRahman', NULL, NULL, NULL, NULL, '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `book_copy`
--

CREATE TABLE `book_copy` (
  `Book_ID` varchar(9) NOT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Copy_No` int(11) NOT NULL,
  `Location` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_copy`
--

INSERT INTO `book_copy` (`Book_ID`, `ISBN`, `Status`, `Copy_No`, `Location`) VALUES
('B1W9C5T3', '978-0-987654-32-1', 1, 1, 'Children\'s Literature'),
('B1W9C5XX', '978-0-838254-32-1', 1, 1, 'Fiction'),
('B1W9L5O7', '978-1-234567-89-0', 1, 1, 'Historical Fiction'),
('B1WDL5O3', '978-0-838254-32-1', 1, 2, 'Fiction'),
('B2V6R8Z0', '978-1-234567-89-1', 1, 1, 'Fantasy'),
('B3Y7E2T1', '978-1-234567-89-2', 1, 1, 'Adventure'),
('B4A8D6K5', '978-1-234567-89-3', 1, 1, 'Classic Literature'),
('B4A8F9N1', '978-1-234567-89-4', 1, 1, 'Fiction'),
('B5X0H1U4', '978-1-234567-89-5', 1, 1, 'Mystery'),
('B64e78470', '978-0-838254-32-1', 1, 4, 'Fiction'),
('B64e784d4', '978-0-838254-32-1', 1, 5, 'Fiction'),
('B64eb95dd', '978-1-234567-70-9', 1, 1, 'Fantasy'),
('B64eba25', '978-1-234567-75-2', 1, 1, 'Fantasy'),
('B6U4H8I2', '978-1-234567-89-6', 1, 1, 'Children\'s Literature'),
('B6U4T7E8', '978-1-234567-89-7', 1, 1, 'Fantasy'),
('B7N1G2F9', '978-1-234567-89-8', 1, 1, 'Fantasy'),
('B7N1G2K3', '978-1-234567-89-9', 1, 1, 'Historical Fiction'),
('B7YH3E9K1', '978-2-345678-90-0', 1, 1, 'Children\'s Literature'),
('B8N4M6I2', '978-2-345678-90-1', 1, 1, 'Poetry'),
('B9FDL4O3', '978-0-838254-32-1', 1, 3, 'Fiction'),
('B9GK4M6P8', '978-2-345678-90-2', 1, 1, 'Biography'),
('B9I2J0D7', '978-2-345678-90-3', 1, 1, 'Young Adult'),
('B9I2O3J0', '978-2-345678-90-4', 1, 1, 'Science Fiction'),
('BA9I2O3P0', '978-2-345678-90-5', 1, 1, 'Science Fiction'),
('BC7N1G2H9', '978-2-345678-90-6', 1, 1, 'Children\'s Literature'),
('BD2A6F8R7', '978-2-345678-90-7', 1, 1, 'Fantasy'),
('BF5C2H1J0', '978-2-345678-90-8', 1, 1, 'Dystopian Fiction'),
('BG3Y7E2S1', '978-2-345678-90-9', 1, 1, 'Science Fiction'),
('BG3Y7T3D2', '978-3-456789-01-0', 1, 1, 'Fantasy'),
('BI6U4O8S7', '978-3-456789-01-1', 1, 1, 'Children\'s Literature'),
('BJ6U4J2H5', '978-3-456789-01-2', 1, 1, 'Romance'),
('BJ6U4T7R8', '978-3-456789-01-3', 1, 1, 'Young Adult'),
('BK4A7E8D6', '978-3-456789-01-4', 1, 1, 'Classic Literature'),
('BL7C1F9G2', '978-0-987654-32-1', 1, 2, 'Children\'s Literature'),
('BM9I2T3F1', '978-3-456789-01-6', 1, 1, 'Children\'s Literature'),
('BO1W9F9O0', '978-3-456789-01-7', 1, 1, 'Young Adult'),
('BO1W9L5Q4', '978-3-456789-01-8', 1, 1, 'Classic Literature'),
('BQ1W9N5T2', '978-1-234567-89-6', 1, 2, 'Children\'s Literature'),
('BS4A8D6F5', '978-4-567890-12-0', 1, 1, 'Dystopian Fiction'),
('BT8N4M6K9', '978-3-456789-01-2', 1, 2, 'Science Fiction'),
('BT8N4S7P9', '978-4-567890-12-2', 1, 1, 'Fantasy'),
('BU5X0H1J3', '978-4-567890-12-3', 1, 1, 'Fantasy'),
('BU5X0R8M6', '978-4-567890-12-4', 1, 1, 'Children\'s Literature'),
('BV8X0Z1L3', '978-4-567890-12-5', 1, 1, 'Children\'s Literature'),
('BY3V7R6Q2', '978-4-567890-12-6', 1, 1, 'Classic Literature'),
('BZ2V6Q4L5', '978-4-567890-12-7', 1, 1, 'Fantasy'),
('BZ2V6Q4R8', '978-5-678901-23-4', 1, 1, 'Dystopian Fiction'),
('BZ2V6R8P4', '978-0-123450-98-7', 1, 1, 'Science Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `Title` varchar(255) NOT NULL,
  `Review` varchar(10000) DEFAULT NULL,
  `Rating` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`Title`, `Review`, `Rating`) VALUES
('Brida', 'I felt a strong lingering of \"The Alchemist\" and \"The Pilgrimage\" in this work(maybe more but I have read just these two).\r\n\r\nThe magic theorems, esp. soulmate theory is looked upon with trepidation, but I personally enjoyed the book for the structured approach, so an endearing 4-star for Brida', 4),
('The Little Prince', 'Its a book for those who remember being children and feel nostalgia for the simple comfort of childhood innocence but know they can never go back to it. Because they have met their Roses, and Foxes, and drank from a well with a rusty handle in the desert, and learned that a few thorns may not stand against the claws of a tiger. A must read for everyone', 4),
('1984', 'This book is far from perfect. Its characters lack depth, its rhetoric is sometimes didactic, its plot (well, half of it anyway) was lifted from Zumyatin’s We, and the lengthy Goldstein treatise shoved into the middle is a flaw which alters the structure of the novel like a scar disfigures a face.\r\n\r\nBut in the long run, all that does not matter, because George Orwell got it right.\r\nBasically, I think everyone should read 1984 at some point. You really have to be in the mood to work at reading it, though. But it\'s all worth it in the end. It\'s absolutely incredible and I loved it. I don\'t re-read many books but this will definitely be one of them. It is a hard read, but more importantly, it is a MUST read.', 4),
('Pride and Prejudice ', 'Eh, just okay. Basically a character study of 19th century England, society, courtship, etc. Nothing all that mind blowing or enthralling happens. In fact, not much really happens at all.\r\n\r\nI know some out there love this one, but it wasn\'t really for me.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `Member_ID` varchar(10) NOT NULL,
  `Book_ID` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed`
--

INSERT INTO `borrowed` (`Member_ID`, `Book_ID`) VALUES
('1549448', 'B1W9C5XX'),
('1549448', 'B64eba25'),
('1549448', 'B6U4T7E8'),
('1549448', 'BL7C1F9G2'),
('1549448', 'BZ2V6R8P4'),
('3018369', 'B64eb95dd'),
('3018369', 'B7N1G2K3'),
('3726259', 'B3Y7E2T1'),
('3726259', 'B4A8D6K5'),
('4288160', 'B1W9C5T3'),
('4288160', 'B1W9C5Z7'),
('4288160', 'B1W9L5O7'),
('4703270', 'B2V6R8Z0'),
('4703270', 'B4A8F9N1');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `User_ID` varchar(8) DEFAULT NULL,
  `Feedback` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `User_ID`, `Feedback`) VALUES
(962904, 'M602', 'Bullsite'),
(3700230, 'M905', 'Library is Bomb as hell');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_ID` varchar(10) NOT NULL,
  `Student_ID` varchar(8) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `No_of_Books` int(11) DEFAULT NULL,
  `Admin_username` varchar(100) DEFAULT NULL,
  `User_ID` varchar(8) DEFAULT NULL,
  `Total_Fine` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_ID`, `Student_ID`, `Password`, `No_of_Books`, `Admin_username`, `User_ID`, `Total_Fine`) VALUES
('1549448', 'S0000005', '$2y$10$92Mb2gqmeDfCor7hBgGcKeDZ6u6oPbGGNHn9jpvzsBE8kXUN.YSMy', 0, 'WasimaAnnan', 'M119', 0),
('2901963', 'S0000118', '$2y$10$1Ulo13sPe0WfCdr8bnC4ZeOavu1/UxhjtK6qHl/I.GP.ft4msy9Oe', 0, 'NafisaRahman', 'M565', 0),
('3018369', 'S0000169', '$2y$10$mTzfCnDlLZZNeoY4ZipNveQIfmvC36UR3PUB.WWGq9cds4iCUzATu', 0, 'TazrianHossain', 'M905', 0),
('3552371', 'S0000069', '$2y$10$hcRCO9WDZ2k6bbW2oj8k4eaJN4CP3opWtkOOLGTLMT/ywMbdtT7.a', 0, 'MaisaKabir', 'M724', 0),
('3611729', 'S0000001', '$2y$10$2lVK1KGexyvsxKoqN1Zbl.W6LOJTjlJq6TjpiCBYJVX1RkhbDkXs6', 0, 'MDSadmanSaqib', 'M805', 0),
('3726259', 'S0000200', '$2y$10$AA90NTKYJUEb4cMD1GsNEeglLrQRsCDwksXIlx3MWCsz3B494x7S.', 0, 'WasimaAnnan', 'M602', 0),
('4288160', 'S0000015', '$2y$10$8Aa3igLnZ7DN9KJeZGqPmuifgsd9uycZ6AXihzDuw.znYG39b1f/O', 0, 'MaisaKabir', 'M844', 0),
('4703270', 'S0000002', '$2y$10$exDbGolYKoky1yasDJ.NHOWoWfMRBBtvrxNH6o6YN9IL9VekAUPBO', 0, 'TazrianHossain', 'M819', 0),
('5918614', 'S0000003', '$2y$10$BsKJA4dlpupA1/SH9NUZredi8JnK8qSQ6Xr/POIUeZ4Gt/95h//la', 0, 'NafisaRahman', 'M396', 0),
('9622209', 'S0000117', '$2y$10$U4cPJO1.XaNC5sHodATm4.F.A3U8/fj2Jd5FNKAVoT7AlTqk0VkuS', 0, 'TazrianHossain', 'M202', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Transaction_ID` varchar(18) NOT NULL,
  `Payment_Status` tinyint(1) DEFAULT NULL,
  `Student_ID` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Transaction_ID`, `Payment_Status`, `Student_ID`) VALUES
('TX4yUj8nBiWG', 1, 'S0000118'),
('TXBYVFhunMBY', 1, 'S0000119'),
('TXEGGb486lbx', 1, 'S0000069'),
('TXFJowwDfmoQ', 0, 'S0000115'),
('TXFqOLkT0gR0', 0, 'S0000120'),
('TXfuXW1CMsVJ', 1, 'S0000200'),
('TXFwNTfLFH70', 1, 'S0000117'),
('TXhyxLk0qiMd', 1, 'S0000169'),
('TXl0s6f5FWNu', 0, 'S0000053'),
('TXWRHzG0TZo4', 1, 'S0000003'),
('TXWTnvxJXZzZ', 0, 'S0000116');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `Publisher_ID` varchar(10) NOT NULL,
  `Name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`Publisher_ID`, `Name`) VALUES
('BANTAM26', 'Bantam Books'),
('DOUBLEDAY4', 'Doubleday'),
('FSG123', 'Farrar, Straus and Giroux'),
('HARCOURT34', 'Harcourt'),
('HARPER123', 'Harper Collins'),
('HOUGHTON34', 'Houghton Mifflin Harcourt'),
('HYPERION56', 'Hyperion'),
('KNOPF678', 'Knopf'),
('LEVINE08', 'Arthur A. Levine'),
('LIPPINCOTT', 'Lippincott'),
('PAULSEN123', 'Paulsen'),
('PENGUIN567', 'Penguin'),
('PHILOMEL67', 'Philomel'),
('RANDOM789', 'Random House'),
('SCHOLASTIC', 'Scholastic'),
('VIKING789', 'Viking'),
('WARNE456', 'Warne');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Book_ID` varchar(9) NOT NULL,
  `ISBN` varchar(17) DEFAULT NULL,
  `Vendor_code` varchar(13) NOT NULL,
  `Price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Book_ID`, `ISBN`, `Vendor_code`, `Price`) VALUES
('B1W9C5T3', '978-0-987654-32-1', 'VN123', 23),
('B1W9C5XX', '978-0-838254-32-1', 'VN012', 22),
('B1W9C5Z7', '978-0-838254-32-1', 'VN012', 16),
('B1W9L5O7', '978-1-234567-89-0', 'VN234', 22),
('B1WDL5O3', '978-0-838254-32-1', 'VN012', 22),
('B2V6R8Z0', '978-1-234567-89-1', 'VN345', 17),
('B3Y7E2T1', '978-1-234567-89-2', 'VN456', 28),
('B4A8D6K5', '978-1-234567-89-3', 'VN567', 22),
('B4A8F9N1', '978-1-234567-89-4', 'VN678', 20),
('B5X0H1U4', '978-1-234567-89-5', 'VN789', 17),
('B64e78470', '978-0-838254-32-1', 'VN009', 22),
('B64e784d4', '978-0-838254-32-1', 'VN009', 22),
('B64eb95dd', '978-1-234567-70-9', 'VN009', 18),
('B64eba25', '978-1-234567-75-2', 'VN123', 25),
('B6U4H8I2', '978-1-234567-89-6', 'VN890', 19),
('B6U4T7E8', '978-1-234567-89-7', 'VN901', 13),
('B7N1G2F9', '978-1-234567-89-8', 'VN012', 26),
('B7N1G2K3', '978-1-234567-89-9', 'VN123', 18),
('B7YH3E9K1', '978-2-345678-90-0', 'VN234', 23),
('B8N4M6I2', '978-2-345678-90-1', 'VN345', 26),
('B9FDL4O3', '978-0-838254-32-1', 'VN012', 22),
('B9GK4M6P8', '978-2-345678-90-2', 'VN456', 15),
('B9I2J0D7', '978-2-345678-90-3', 'VN567', 16),
('B9I2O3J0', '978-2-345678-90-4', 'VN678', 19),
('BA9I2O3P0', '978-2-345678-90-5', 'VN789', 24),
('BC7N1G2H9', '978-2-345678-90-6', 'VN890', 18),
('BD2A6F8R7', '978-2-345678-90-7', 'VN901', 14),
('BF5C2H1J0', '978-2-345678-90-8', 'VN012', 30),
('BG3Y7E2S1', '978-2-345678-90-9', 'VN123', 20),
('BG3Y7T3D2', '978-3-456789-01-0', 'VN234', 19),
('BI6U4O8S7', '978-3-456789-01-1', 'VN345', 15),
('BJ6U4J2H5', '978-3-456789-01-2', 'VN456', 17),
('BJ6U4T7R8', '978-3-456789-01-3', 'VN567', 18),
('BK4A7E8D6', '978-3-456789-01-4', 'VN678', 15),
('BL7C1F9G2', '978-0-987654-32-1', 'VN789', 21),
('BM9I2T3F1', '978-3-456789-01-6', 'VN890', 23),
('BO1W9F9O0', '978-3-456789-01-7', 'VN901', 15),
('BO1W9L5Q4', '978-3-456789-01-8', 'VN012', 22),
('BQ1W9N5T2', '978-1-234567-89-6', 'VN123', 22),
('BS4A8D6F5', '978-4-567890-12-0', 'VN234', 13),
('BT8N4M6K9', '978-3-456789-01-2', 'VN345', 13),
('BT8N4S7P9', '978-4-567890-12-2', 'VN456', 26),
('BU5X0H1J3', '978-4-567890-12-3', 'VN567', 20),
('BU5X0R8M6', '978-4-567890-12-4', 'VN678', 20),
('BV8X0Z1L3', '978-4-567890-12-5', 'VN789', 20),
('BY3V7R6Q2', '978-4-567890-12-6', 'VN890', 25),
('BZ2V6Q4L5', '978-4-567890-12-7', 'VN901', 19),
('BZ2V6Q4R8', '978-5-678901-23-4', 'VN012', 16),
('BZ2V6R8P4', '978-0-123450-98-7', 'VN123', 21);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` varchar(8) NOT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Email`, `Phone`, `First_name`, `Middle_Name`, `Last_name`) VALUES
('S0000001', 'john.doe@example.com', '12345678901', 'John', 'A.', 'Doe'),
('S0000002', 'jane.smith@example.com', '23456789012', 'Jane', 'B.', 'Smith'),
('S0000003', 'michael.johnson@example.com', '34567890123', 'Michael', 'C.', 'Johnson'),
('S0000004', 'emily.williams@example.com', '45678901234', 'Emily', 'D.', 'Williams'),
('S0000005', 'david.brown@example.com', '56789012345', 'David', 'E.', 'Brown'),
('S0000006', 'sarah.davis@example.com', '67890123456', 'Sarah', 'F.', 'Davis'),
('S0000007', 'chris.miller@example.com', '78901234567', 'Christopher', 'G.', 'Miller'),
('S0000008', 'jessica.wilson@example.com', '89012345678', 'Jessica', 'H.', 'Wilson'),
('S0000009', 'daniel.moore@example.com', '90123456789', 'Daniel', 'I.', 'Moore'),
('S0000010', 'ashley.taylor@example.com', '01234567890', 'Ashley', 'J.', 'Taylor'),
('S0000011', 'alex.jackson@example.com', '12345678901', 'Alex', 'K.', 'Jackson'),
('S0000012', 'olivia.anderson@example.com', '23456789012', 'Olivia', 'L.', 'Anderson'),
('S0000013', 'william.martin@example.com', '34567890123', 'William', 'M.', 'Martin'),
('S0000014', 'sophia.thompson@example.com', '45678901234', 'Sophia', 'N.', 'Thompson'),
('S0000015', 'james.roberts@example.com', '56789012345', 'James', 'O.', 'Roberts'),
('S0000016', 'ava.cooper@example.com', '67890123456', 'Ava', 'P.', 'Cooper'),
('S0000017', 'logan.hill@example.com', '78901234567', 'Logan', 'Q.', 'Hill'),
('S0000018', 'mia.turner@example.com', '89012345678', 'Mia', 'R.', 'Turner'),
('S0000019', 'benjamin.carter@example.com', '90123456789', 'Benjamin', 'S.', 'Carter'),
('S0000020', 'amelia.morris@example.com', '01234567890', 'Amelia', 'T.', 'Morris'),
('S0000049', 'samuel.lewis@example.com', '98765432109', 'Samuel', 'Y.', 'Lewis'),
('S0000050', 'sophie.hughes@example.com', '87654321098', 'Sophie', 'Z.', 'Hughes'),
('S0000051', 'liam.miller@example.com', '12345678901', 'Liam', 'A.', 'Miller'),
('S0000052', 'ava.johnson@example.com', '23456789012', 'Ava', 'B.', 'Johnson'),
('S0000053', 'noah.smith@example.com', '34567890123', 'Noah', 'C.', 'Smith'),
('S0000054', 'isabella.williams@example.com', '45678901234', 'Isabella', 'D.', 'Williams'),
('S0000055', 'james.jones@example.com', '56789012345', 'James', 'E.', 'Jones'),
('S0000056', 'emma.davis@example.com', '67890123456', 'Emma', 'F.', 'Davis'),
('S0000057', 'oliver.martinez@example.com', '78901234567', 'Oliver', 'G.', 'Martinez'),
('S0000058', 'sophia.brown@example.com', '89012345678', 'Sophia', 'H.', 'Brown'),
('S0000059', 'william.anderson@example.com', '90123456789', 'William', 'I.', 'Anderson'),
('S0000060', 'ava.rodriguez@example.com', '01234567890', 'Ava', 'J.', 'Rodriguez'),
('S0000061', 'liam.lee@example.com', '12345678901', 'Liam', 'K.', 'Lee'),
('S0000062', 'olivia.garcia@example.com', '23456789012', 'Olivia', 'L.', 'Garcia'),
('S0000063', 'noah.wilson@example.com', '34567890123', 'Noah', 'M.', 'Wilson'),
('S0000064', 'isabella.hernandez@example.com', '45678901234', 'Isabella', 'N.', 'Hernandez'),
('S0000065', 'james.martin@example.com', '56789012345', 'James', 'O.', 'Martin'),
('S0000066', 'emma.jackson@example.com', '67890123456', 'Emma', 'P.', 'Jackson'),
('S0000067', 'oliver.johnson@example.com', '78901234567', 'Oliver', 'Q.', 'Johnson'),
('S0000068', 'sophia.rodriguez@example.com', '89012345678', 'Sophia', 'R.', 'Rodriguez'),
('S0000069', 'william.martinez@example.com', '90123456789', 'William', 'S.', 'Martinez'),
('S0000070', 'ava.brown@example.com', '01234567890', 'Ava', 'T.', 'Brown'),
('S0000099', 'oliver.rodriguez@example.com', '98765432109', 'Oliver', 'Y.', 'Rodriguez'),
('S0000100', 'emma.martinez@example.com', '87654321098', 'Emma', 'Z.', 'Martinez'),
('S0000101', 'jack.williams@example.com', '12345678901', 'Jack', 'A.', 'Williams'),
('S0000102', 'olivia.johnson@example.com', '23456789012', 'Olivia', 'B.', 'Johnson'),
('S0000103', 'liam.smith@example.com', '34567890123', 'Liam', 'C.', 'Smith'),
('S0000104', 'ava.jones@example.com', '45678901234', 'Ava', 'D.', 'Jones'),
('S0000105', 'noah.davis@example.com', '56789012345', 'Noah', 'E.', 'Davis'),
('S0000106', 'emma.martinez@example.com', '67890123456', 'Emma', 'F.', 'Martinez'),
('S0000107', 'liam.brown@example.com', '78901234567', 'Liam', 'G.', 'Brown'),
('S0000108', 'sophia.anderson@example.com', '89012345678', 'Sophia', 'H.', 'Anderson'),
('S0000109', 'william.rodriguez@example.com', '90123456789', 'William', 'I.', 'Rodriguez'),
('S0000110', 'olivia.miller@example.com', '01234567890', 'Olivia', 'J.', 'Miller'),
('S0000111', 'jack.wilson@example.com', '12345678901', 'Jack', 'K.', 'Wilson'),
('S0000112', 'emma.smith@example.com', '23456789012', 'Emma', 'L.', 'Smith'),
('S0000113', 'noah.jones@example.com', '34567890123', 'Noah', 'M.', 'Jones'),
('S0000114', 'sophia.davis@example.com', '45678901234', 'Sophia', 'N.', 'Davis'),
('S0000115', 'liam.martinez@example.com', '56789012345', 'Liam', 'O.', 'Martinez'),
('S0000116', 'olivia.brown@example.com', '67890123456', 'Olivia', 'P.', 'Brown'),
('S0000117', 'jack.anderson@example.com', '78901234567', 'Jack', 'Q.', 'Anderson'),
('S0000118', 'emma.rodriguez@example.com', '89012345678', 'Emma', 'R.', 'Rodriguez'),
('S0000119', 'noah.miller@example.com', '90123456789', 'Noah', 'S.', 'Miller'),
('S0000120', 'sophia.wilson@example.com', '01234567890', 'Sophia', 'T.', 'Wilson'),
('S0000149', 'william.davis@example.com', '98765432109', 'William', 'Y.', 'Davis'),
('S0000150', 'olivia.anderson@example.com', '87654321098', 'Olivia', 'Z.', 'Anderson'),
('S0000151', 'ethan.miller@example.com', '12345678901', 'Ethan', 'A.', 'Miller'),
('S0000152', 'mia.johnson@example.com', '23456789012', 'Mia', 'B.', 'Johnson'),
('S0000153', 'logan.smith@example.com', '34567890123', 'Logan', 'C.', 'Smith'),
('S0000154', 'avery.jones@example.com', '45678901234', 'Avery', 'D.', 'Jones'),
('S0000155', 'scarlett.davis@example.com', '56789012345', 'Scarlett', 'E.', 'Davis'),
('S0000156', 'elijah.martinez@example.com', '67890123456', 'Elijah', 'F.', 'Martinez'),
('S0000157', 'grace.brown@example.com', '78901234567', 'Grace', 'G.', 'Brown'),
('S0000158', 'jacob.anderson@example.com', '89012345678', 'Jacob', 'H.', 'Anderson'),
('S0000159', 'luna.rodriguez@example.com', '90123456789', 'Luna', 'I.', 'Rodriguez'),
('S0000160', 'noah.miller@example.com', '01234567890', 'Noah', 'J.', 'Miller'),
('S0000161', 'chloe.wilson@example.com', '12345678901', 'Chloe', 'K.', 'Wilson'),
('S0000162', 'owen.smith@example.com', '23456789012', 'Owen', 'L.', 'Smith'),
('S0000163', 'emma.jones@example.com', '34567890123', 'Emma', 'M.', 'Jones'),
('S0000164', 'jackson.davis@example.com', '45678901234', 'Jackson', 'N.', 'Davis'),
('S0000165', 'sophia.martinez@example.com', '56789012345', 'Sophia', 'O.', 'Martinez'),
('S0000166', 'aiden.brown@example.com', '67890123456', 'Aiden', 'P.', 'Brown'),
('S0000167', 'mia.anderson@example.com', '78901234567', 'Mia', 'Q.', 'Anderson'),
('S0000168', 'liam.rodriguez@example.com', '89012345678', 'Liam', 'R.', 'Rodriguez'),
('S0000169', 'ava.miller@example.com', '90123456789', 'Ava', 'S.', 'Miller'),
('S0000170', 'jackson.wilson@example.com', '01234567890', 'Jackson', 'T.', 'Wilson'),
('S0000199', 'luna.jones@example.com', '98765432109', 'Luna', 'Y.', 'Jones'),
('S0000200', 'owen.davis@example.com', '87654321098', 'Owen', 'Z.', 'Davis'),
('S0000201', 'grace.smith@example.com', '12345678901', 'Grace', 'A.', 'Smith'),
('S0000202', 'jacob.johnson@example.com', '23456789012', 'Jacob', 'B.', 'Johnson'),
('S0000203', 'luna.miller@example.com', '34567890123', 'Luna', 'C.', 'Miller'),
('S0000204', 'aiden.jones@example.com', '45678901234', 'Aiden', 'D.', 'Jones'),
('S0000205', 'mia.davis@example.com', '56789012345', 'Mia', 'E.', 'Davis'),
('S0000206', 'owen.martinez@example.com', '67890123456', 'Owen', 'F.', 'Martinez'),
('S0000207', 'chloe.brown@example.com', '78901234567', 'Chloe', 'G.', 'Brown'),
('S0000208', 'jackson.anderson@example.com', '89012345678', 'Jackson', 'H.', 'Anderson'),
('S0000209', 'luna.rodriguez@example.com', '90123456789', 'Luna', 'I.', 'Rodriguez'),
('S0000210', 'owen.miller@example.com', '01234567890', 'Owen', 'J.', 'Miller'),
('S0000211', 'mia.wilson@example.com', '12345678901', 'Mia', 'K.', 'Wilson'),
('S0000212', 'grace.smith@example.com', '23456789012', 'Grace', 'L.', 'Smith'),
('S0000213', 'jacob.jones@example.com', '34567890123', 'Jacob', 'M.', 'Jones'),
('S0000214', 'luna.davis@example.com', '45678901234', 'Luna', 'N.', 'Davis'),
('S0000215', 'aiden.martinez@example.com', '56789012345', 'Aiden', 'O.', 'Martinez'),
('S0000216', 'mia.brown@example.com', '67890123456', 'Mia', 'P.', 'Brown'),
('S0000217', 'owen.anderson@example.com', '78901234567', 'Owen', 'Q.', 'Anderson'),
('S0000218', 'chloe.rodriguez@example.com', '89012345678', 'Chloe', 'R.', 'Rodriguez'),
('S0000219', 'jackson.miller@example.com', '90123456789', 'Jackson', 'S.', 'Miller'),
('S0000220', 'luna.wilson@example.com', '01234567890', 'Luna', 'T.', 'Wilson'),
('S0000249', 'owen.jones@example.com', '98765432109', 'Owen', 'Y.', 'Jones'),
('S0000250', 'chloe.davis@example.com', '87654321098', 'Chloe', 'Z.', 'Davis');

-- --------------------------------------------------------

--
-- Table structure for table `student_signup`
--

CREATE TABLE `student_signup` (
  `Student_ID` varchar(8) NOT NULL,
  `Member_ID` varchar(10) NOT NULL,
  `Transaction_ID` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_signup`
--

INSERT INTO `student_signup` (`Student_ID`, `Member_ID`, `Transaction_ID`) VALUES
('S0000003', '5918614', 'TXWRHzG0TZo4'),
('S0000069', '3552371', 'TXEGGb486lbx'),
('S0000117', '9622209', 'TXFwNTfLFH70'),
('S0000118', '2901963', 'TX4yUj8nBiWG'),
('S0000169', '3018369', 'TXhyxLk0qiMd'),
('S0000200', '3726259', 'TXfuXW1CMsVJ');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `Vendor_Code` varchar(13) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Contact_No` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`Vendor_Code`, `Name`, `Contact_No`) VALUES
('VN009', 'Vendor Parker', '56789012334'),
('VN012', 'Vendor David', '45678901234'),
('VN123', 'Vendor Alice', '12345678901'),
('VN181', 'Vendor Alibaba', '03259845217'),
('VN234', 'Vendor Henry', '89012345678'),
('VN345', 'Vendor Eve', '56789012345'),
('VN456', 'Vendor Bob', '23456789012'),
('VN567', 'Vendor Irene', '90123456789'),
('VN678', 'Vendor Frank', '67890123456'),
('VN789', 'Vendor Carol', '34567890123'),
('VN890', 'Vendor Jack', '01234567890'),
('VN901', 'Vendor Grace', '78901234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_name`),
  ADD UNIQUE KEY `User_ID` (`User_ID`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `OTP` (`OTP`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `admin_username` (`admin_username`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `Publisher_ID` (`Publisher_ID`),
  ADD KEY `Title` (`Title`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `book_copy`
--
ALTER TABLE `book_copy`
  ADD PRIMARY KEY (`Book_ID`,`Copy_No`),
  ADD UNIQUE KEY `Book_ID` (`Book_ID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD KEY `book_review_ibfk_1` (`Title`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`Member_ID`,`Book_ID`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `borrowed_ibfk_2` (`Book_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `feedback_ibfk_1` (`User_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_ID`,`Student_ID`),
  ADD UNIQUE KEY `Admin_username` (`Admin_username`,`User_ID`),
  ADD UNIQUE KEY `User_ID` (`User_ID`),
  ADD KEY `member_ibfk_1` (`Student_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Transaction_ID`),
  ADD KEY `payment_ibfk_1` (`Student_ID`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`Publisher_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Book_ID`),
  ADD UNIQUE KEY `Book_ID` (`Book_ID`),
  ADD KEY `Vendor_code` (`Vendor_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_signup`
--
ALTER TABLE `student_signup`
  ADD PRIMARY KEY (`Student_ID`,`Member_ID`,`Transaction_ID`),
  ADD KEY `Member_ID` (`Member_ID`),
  ADD KEY `Transaction_ID` (`Transaction_ID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`Vendor_Code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `authentication` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`admin_username`) REFERENCES `admin` (`User_name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`Publisher_ID`) REFERENCES `publication` (`Publisher_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `book_copy`
--
ALTER TABLE `book_copy`
  ADD CONSTRAINT `book_copy_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `book` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_copy_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD CONSTRAINT `borrowed_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowed_ibfk_2` FOREIGN KEY (`Book_ID`) REFERENCES `book` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `member` (`User_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`Admin_username`) REFERENCES `admin` (`User_name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `authentication` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Book_ID`) REFERENCES `book` (`Book_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`Vendor_code`) REFERENCES `vendor` (`Vendor_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_signup`
--
ALTER TABLE `student_signup`
  ADD CONSTRAINT `student_signup_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_signup_ibfk_2` FOREIGN KEY (`Member_ID`) REFERENCES `member` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_signup_ibfk_3` FOREIGN KEY (`Transaction_ID`) REFERENCES `payment` (`Transaction_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
