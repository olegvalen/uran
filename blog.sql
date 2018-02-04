-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(64) NOT NULL,
  `name` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Артур','Дороги раздора не бывают ровными','Дороги Народного фронта ведут в пропасть.\n\nПривет от Чирки.\nТо что сейчас началась атака Службу автомобильных дорог в области ни для кого не секрет. Конфликт между Укравтодором и КМУ в целом зашел далеко. Баталии перешли на региональный уровень. Нынешний начальник САД Житомирской области Савчеко Г.В. не очень сговорчив в работе с политическим руководством области и пытается решать поставленные задачи с учетом проблематики , а не под углом предвыборных желаний клики Зубко-Рабиновича. Начало атаки положили провокационные действия Бердичевских отделений Облавтодора раздуваемых ставлениками нардепа от БПП Ревеги , который мечтает о доле в ремонте и эксалуатации не на жалкие 10-15 млн гривен, а минимум 200 млн...Тут уже подключились народофронофцы ...Они обрюхатив дипломом одного из руководителей районного филиала Облавтодора мечтают пропихнуть его на руководство САД области и оседлать потоки. Нагнетается все не по дням а по часам. Уже кричат о сепаратизме, позвбыв , что Савченко Г.В. фактически под обстрелами вывел техники и средств из под носа сепаров на сотни млн. гривен.\nС апреля месяца Житомирская областная государственная Администрация будет рулить почти миллирдом гриве на рынке эксплуатации и ремонта дорого и избавиться от пристального ока САД сложно, знасит нужно загнать туда своего человека. Плевать на его знания, умения - главное что бы СВОЙ.\nОсобенно радует мантра - почему все в одних руках мол, вон Беларусская фирма зашла и хорошо работает..Тут бы патриотам местным говорливым поработать. Вся техника беларуссов с России и имеет росссийское происхожднние. Фирма прокладка. По сути отдали работ на сотни миллионов российской фирме....А они шпионов ищут...','2018-02-03 23:26:00'),(2,'Кристина','«Враги» и «соседи» – однозначные понятия в древних языках. ','Литва построила забор на границе с Россией. Видео\nВ Литве завершили возведение защитного заграждения вдоль границы с Калининградской областью. Об этом 31 января сообщила \"Русская служба ВВС\". Протяженность сооружения составляет 45 км, высота – два метра. Строительство обошлось Вильнюсу в €1,3 млн, установка камер наблюдения – еще в €2,3 млн. \"Этот забор не будет нас охранять от военной техники. Его задача – борьба с контрабандой и нелегальной миграцией\", – заверил офицер пограничной службы города Пагегяй Тадас Гечас. Общая протяженность границы между Литвой и РФ составляет 280 км. На большинстве участков страны разделяют природные барьеры – реки и озера. До 2020 года Литва планирует заверишить установку забора на границе с Беларусью.','2018-02-02 23:26:11');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_blog_id_index` (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,'Петр Петрович','Отлично!','2018-02-04 00:17:31'),(2,1,'Алексеич','Хорошо!','2018-02-04 00:18:31'),(5,1,'Серхио','Это комментарий!','2018-02-04 00:57:24'),(6,2,'Анатолий','Добавил еще один комментарий!','2018-02-04 01:19:04');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-04 20:33:27
