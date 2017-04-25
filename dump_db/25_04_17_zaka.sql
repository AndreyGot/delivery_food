-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2017 at 03:21 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_has_food`
--

CREATE TABLE `cart_has_food` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `alias`, `restaurant_id`) VALUES
(9, 'СЭНДВИЧИ, БУРГЕРЫ', '', '/uploads/images/categories/sendvichi_burgery/1_1492165120.jpg', 'sendvichi_burgery', 4),
(10, 'КАРТОШКА', '', '/uploads/images/categories/kartoshka/1_1492168370.jpg', 'kartoshka', 4),
(11, 'САЛАТЫ', '', '/uploads/images/categories/salaty/1_1492168680.jpg', 'salaty', 4),
(12, 'НАБОРЫ', '', '/uploads/images/categories/nabory/1_1492168855.jpg', 'nabory', 4),
(13, 'СОУСЫ', '', '/uploads/images/categories/sousy/1_1492169010.jpg', 'sousy', 4),
(15, 'ДЕСЕРТЫ', '', '/uploads/images/categories/deserty/1_1492169369.jpg', 'deserty', 4),
(16, 'МОЛОЧНЫЕ КОКТЕЙЛИ', '', '/uploads/images/categories/molochnye_kokteyli/1_1492169640.jpg', 'molochnye_kokteyli', 4),
(17, 'НАПИТКИ', '', '/uploads/images/categories/napitki/1_1492170519.jpg', 'napitki', 4),
(18, 'НОВИНКИ', '', '/uploads/images/categories/novinki/1_1492173157.jpg', 'novinki', 4),
(19, 'Сандвичи', '', '/uploads/images/categories/sandvichi/1_1492242360.jpg', 'sandvichi', 5),
(20, 'Курица', '', '/uploads/images/categories/kurica/1_1492244016.jpg', 'kurica', 5),
(21, 'Баскеты', '', '/uploads/images/categories/baskety/1_1492244917.jpg', 'baskety', 5),
(22, 'Снэки', '', '/uploads/images/categories/sneki/1_1492256383.png', 'sneki', 5),
(23, 'Салаты', '', '/uploads/images/categories/salaty/1_1492256591.png', 'salaty', 5),
(24, 'Десерты', '', '/uploads/images/categories/deserty/1_1492257958.png', 'deserty', 5),
(25, 'Напитки', '', '/uploads/images/categories/napitki/1_1492258410.png', 'napitki', 5),
(26, 'Комбо', '', '/uploads/images/categories/kombo/1_1492497647.png', 'kombo', 5),
(27, 'Завтрак', '', '/uploads/images/categories/zavtrak/1_1492498124.png', 'zavtrak', 5),
(28, 'Соусы', '', '/uploads/images/categories/sousy/1_1492500305.png', 'sousy', 5),
(29, 'Сальса', '', '/uploads/images/categories/salsa/1_1492500614.png', 'salsa', 5),
(30, 'Батл Баскет', '', '/uploads/images/categories/batl_basket/1_1492500829.png', 'batl_basket', 5),
(31, 'Бургеры', '', '/uploads/images/categories/burgery/1_1492504134.png', 'burgery', 6),
(32, 'Гарниры', '', '/uploads/images/categories/garniry/1_1492510341.png', 'garniry', 6),
(33, 'Снеки', '', '/uploads/images/categories/sneki/1_1492510742.png', 'sneki', 6),
(34, 'Салаты', '', '/uploads/images/categories/salaty/1_1492510966.png', 'salaty', 6),
(35, 'Напитки', '', '/uploads/images/categories/napitki/1_1492511134.png', 'napitki', 6),
(36, 'Десерты', '', '/uploads/images/categories/deserty/1_1492511431.png', 'deserty', 6),
(37, 'СУШИ', '', '/uploads/images/categories/sushi/1_1492518346.jpg', 'sushi', 7),
(38, 'ЕВРОПЕЙСКИЕ РОЛЛЫ', '', '/uploads/images/categories/evropeyskie_rolly/1_1492519659.jpg', 'evropeyskie_rolly', 7),
(39, 'ЗАПЕЧЕННЫЕ СУШИ', '', '/uploads/images/categories/zapechennye_sushi/1_1492522199.jpg', 'zapechennye_sushi', 7),
(40, 'ОСТРЫЕ СУШИ', '', '/uploads/images/categories/ostrye_sushi/1_1492522403.jpg', 'ostrye_sushi', 7),
(41, 'ЗАПЕЧЕННЫЕ РОЛЛЫ', '', '/uploads/images/categories/zapechennye_rolly/1_1492523487.jpg', 'zapechennye_rolly', 7),
(42, 'ГОРЯЧИЕ РОЛЛЫ В КЛЯРЕ', '', '/uploads/images/categories/goryachie_rolly_v_klyare/1_1492523751.jpg', 'goryachie_rolly_v_klyare', 7),
(43, 'КЛАССИЧЕСКИЕ РОЛЛЫ', '', '/uploads/images/categories/klassicheskie_rolly/1_1492524055.jpg', 'klassicheskie_rolly', 7),
(44, 'ЕВРОПЕЙСКИЕ РОЛЛЫ С ОСТРЫМ СОУСОМ', '', '/uploads/images/categories/evropeyskie_rolly_s_ostrym_sousom/1_1492524430.jpg', 'evropeyskie_rolly_s_ostrym_sousom', 7),
(45, 'АССОРТИ', '', '/uploads/images/categories/assorti/1_1492524671.jpg', 'assorti', 7),
(46, 'ЯПОНСКИЕ СУПЫ', '', '/uploads/images/categories/yaponskie_supy/1_1492525330.jpg', 'yaponskie_supy', 7),
(47, 'ЯПОНСКИЕ САЛАТЫ', '', '/uploads/images/categories/yaponskie_salaty/1_1492539642.jpg', 'yaponskie_salaty', 7),
(48, 'ГОРЯЧИЕ ЯПОНСКИЕ БЛЮДА', '', '/uploads/images/categories/goryachie_yaponskie_blyuda/1_1492540488.jpg', 'goryachie_yaponskie_blyuda', 7),
(49, 'РИС', '', '/uploads/images/categories/ris/1_1492541036.jpg', 'ris', 7),
(50, 'ТЕРИЯКИ', '', '/uploads/images/categories/teriyaki/1_1492541954.jpg', 'teriyaki', 7),
(51, 'ЯКИТОРИ', '', '/uploads/images/categories/yakitori/1_1492542898.jpg', 'yakitori', 7),
(52, 'ЯПОНСКИЕ ДЕСЕРТЫ', '', '/uploads/images/categories/yaponskie_deserty/1_1492543191.jpg', 'yaponskie_deserty', 7),
(53, 'ПИЦЦА', '', '/uploads/images/categories/picca/1_1492584478.jpg', 'picca', 7),
(54, 'ПАСТА', '', '/uploads/images/categories/pasta/1_1492586662.jpg', 'pasta', 7),
(55, 'ХЛЕБ', '', '/uploads/images/categories/hleb/1_1492587388.jpg', 'hleb', 7),
(56, 'ХОЛОДНЫЕ ЗАКУСКИ', '', '/uploads/images/categories/holodnye_zakuski/1_1492588052.jpg', 'holodnye_zakuski', 7),
(57, 'ГОРЯЧИЕ ЗАКУСКИ', '', '/uploads/images/categories/goryachie_zakuski/1_1492590793.jpg', 'goryachie_zakuski', 7),
(58, 'ИТАЛЬЯНСКИЕ СУПЫ', '', '/uploads/images/categories/italyanskie_supy/1_1492597814.jpg', 'italyanskie_supy', 7),
(59, 'ИТАЛЬЯНСКИЕ САЛАТЫ', '', '/uploads/images/categories/italyanskie_salaty/1_1492599563.jpg', 'italyanskie_salaty', 7),
(60, 'ИТАЛЬЯНСКИЕ БЛЮДА ИЗ РЫБЫ И МОРЕПРОДУКТОВ', '', '/uploads/images/categories/italyanskie_blyuda_iz_ryby_i_moreproduktov/1_1492600055.jpg', 'italyanskie_blyuda_iz_ryby_i_moreproduktov', 7),
(61, 'ГАРНИРЫ', '', '/uploads/images/categories/garniry/1_1492600281.jpg', 'garniry', 7),
(62, 'ИТАЛЬЯНСКИЕ БЛЮДА ИЗ ПТИЦЫ И МЯСА', '', '/uploads/images/categories/italyanskie_blyuda_iz_pticy_i_myasa/1_1492601615.jpg', 'italyanskie_blyuda_iz_pticy_i_myasa', 7),
(63, 'ИТАЛЬЯНСКИЕ ДЕСЕРТЫ', '', '/uploads/images/categories/italyanskie_deserty/1_1492602748.jpg', 'italyanskie_deserty', 7),
(64, 'НАПИТКИ', '', '/uploads/images/categories/napitki/1_1492603503.jpg', 'napitki', 7),
(65, 'ЧАЙ', '', '/uploads/images/categories/chay/1_1492605784.jpg', 'chay', 7),
(67, 'Салаты', '', '/uploads/images/categories/salaty/1_1492609330.jpg', 'salaty', 8),
(68, 'Бургеры', '', '/uploads/images/categories/burgery/1_1492686208.png', 'burgery', 9),
(69, 'Салаты', '', '/uploads/images/categories/salaty/1_1492686412.jpg', 'salaty', 9),
(70, 'Блюда на мангале', '', '/uploads/images/categories/blyuda_na_mangale/1_1492687218.jpg', 'blyuda_na_mangale', 9),
(71, 'Первые блюда', '', '/uploads/images/categories/pervye_blyuda/1_1492688755.jpg', 'pervye_blyuda', 9),
(72, 'Десерты', '', '/uploads/images/categories/deserty/1_1492688958.jpg', 'deserty', 9),
(73, 'Напитки', '', '/uploads/images/categories/napitki/1_1492692014.jpg', 'napitki', 9),
(74, 'Роллы', '', '/uploads/images/categories/rolly/1_1492772132.png', 'rolly', 11),
(75, 'Фаст роллы', '', '/uploads/images/categories/fast_rolly/1_1492846277.png', 'fast_rolly', 11),
(76, 'Суши', '', '/uploads/images/categories/sushi/1_1492848012.png', 'sushi', 11),
(77, 'Запеченные роллы', '', '/uploads/images/categories/zapechennye_rolly/1_1492859108.png', 'zapechennye_rolly', 11),
(78, 'Лапша WOK', '', '/uploads/images/categories/lapsha_wok/1_1493017035.png', 'lapsha_wok', 11),
(79, 'Горячее и салаты', '', '/uploads/images/categories/goryachee_i_salaty/1_1493019987.png', 'goryachee_i_salaty', 11),
(80, 'Наборы', '', '/uploads/images/categories/nabory/1_1493024454.png', 'nabory', 11),
(81, 'Детское меню', '', '/uploads/images/categories/detskoe_menyu/1_1493035411.png', 'detskoe_menyu', 11);

-- --------------------------------------------------------

--
-- Table structure for table `fast_order`
--

CREATE TABLE `fast_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `creation_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `order_status_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fast_order`
--

INSERT INTO `fast_order` (`id`, `number`, `customer_name`, `phone`, `region`, `city`, `street`, `house`, `flat`, `description`, `creation_date`, `delivery_date`, `payment_method_id`, `order_status_id`) VALUES
(1, 'fo1493104249', 'Андрей', '122', NULL, 'Сочи', 'maidan', '12', '12', '', '2017-04-25 07:10:49', '2017-04-25 07:10:49', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fast_order_has_food`
--

CREATE TABLE `fast_order_has_food` (
  `fast_order_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `actual_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fast_order_has_food`
--

INSERT INTO `fast_order_has_food` (`fast_order_id`, `food_id`, `actual_price`, `quantity`) VALUES
(1, 107, 50, 1),
(1, 108, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` double UNSIGNED NOT NULL,
  `bonus` smallint(5) UNSIGNED DEFAULT NULL,
  `rating` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `bonus`, `rating`, `category_id`) VALUES
(59, 'Биг Мак', '/uploads/images/food/big_mak/1_1492165159.jpg', 'Два рубленых бифштекса из натуральной 100%-й говядины, ломтики сыра Чеддер, лук, два кусочка маринованного огурца и свежий салат на булочке с кунжутом, заправленной соусом Биг Мак\r\n', 130, 0, 0, 9),
(60, 'Биг Тейсти', '/uploads/images/food/big_teysti/1_1492165861.jpg', 'Рубленый бифштекс из 100%-й говядины на большой булочке с кунжутом, три кусочка сыра Эмменталь, два ломтика помидора, свежий салат, лук и пикантный соус Гриль\r\n\r\n', 224, 0, 0, 9),
(61, 'Гамбургер', '/uploads/images/food/gamburger/1_1492166088.jpg', 'Рубленый бифштекс из 100%-й говядины с луком и маринованным огурцом на булочке, заправленной горчицей и кетчупом. Гамбургер Макдональдс (фан-сайт блюда) - это основа всего мирового фастфуда.\r\n\r\n', 48, 0, 0, 9),
(62, 'Гранд Чизбургер', '/uploads/images/food/grand_chizburger/1_1492166134.jpg', 'Гранд Чизбургер\r\n', 118, 0, 0, 9),
(63, 'Двойной Гранд Чизбургер', '/uploads/images/food/dvoynoy_grand_chizburger/1_1492166435.jpg', 'Двойной Гранд Чизбургер - СУПЕРНОВИНКА!!!\r\n', 160, 0, 0, 9),
(64, 'Двойной Чизбургер', '/uploads/images/food/dvoynoy_chizburger/1_1492166637.jpg', 'Два рубленых бифштекса из натуральной 100%-й говядины с двумя кусочками сыра Чеддер, луком и с кусочками маринованного огурца на булочке, заправленной горчицей и кетчупом\r\n\r\n', 115, 0, 0, 9),
(65, 'Двойной Чизбургер де Люкс', '/uploads/images/food/dvoynoy_chizburger_de_lyuks/1_1492166748.jpg', 'Рубленый бифштекс из 100%-й говядины с двумя кусочками сыра Чеддер на булочке с кунжутом, заправленной горчицей, кетчупом,луком, двумя кусочками маринованного огурца\r\n\r\n', 180, 0, 0, 9),
(66, 'Двойной Чизбургер Фреш', '/uploads/images/food/dvoynoy_chizburger_fresh/1_1492166842.jpg', 'Новинка сезона Весна-Лето 2017\r\n\r\n', 130, 0, 0, 9),
(67, 'Креветки 4 шт', '/uploads/images/food/krevetki_4_sht/1_1492167045.jpg', 'Хит сезона 2015\r\n\r\n', 166, 0, 0, 9),
(68, 'Креветки 6 шт', '/uploads/images/food/krevetki_6_sht/1_1492167120.jpg', 'Хит сезона 2015\r\n\r\n', 220, 0, 0, 9),
(69, 'Креветки 9 шт', '/uploads/images/food/krevetki_9_sht/1_1492167253.jpg', 'Хит сезона 2015\r\n', 299, 0, 0, 9),
(70, 'Куриные крылышки 4 шт.', '/uploads/images/food/kurinye_krylyshki_4_sht/1_1492167309.jpg', 'Летний хит сезона 2015\r\n\r\n', 126, 0, 0, 9),
(71, 'Куриные крылышки 6 шт.', '/uploads/images/food/kurinye_krylyshki_6_sht/1_1492167355.jpg', 'Летний хит сезона 2015\r\n\r\n', 176, 0, 0, 9),
(72, 'Куриные крылышки 9 шт.', '/uploads/images/food/kurinye_krylyshki_9_sht/1_1492167382.jpg', 'Летний хит сезона 2015\r\n\r\n', 248, 0, 0, 9),
(73, 'Филе Фреш', '/uploads/images/food/file_fresh/1_1492167434.jpg', 'Новинка Август 2016\r\n\r\n', 150, 0, 0, 9),
(74, 'Филе-о-фиш', '/uploads/images/food/file-o-fish/1_1492167474.jpg', 'Филе рыбы (семейства тресковых) в панировке на пышной пропаренной булочке с половинкой кусочка сыра Чеддер, заправленной соусом тар-та\r\n\r\n', 124, 0, 0, 9),
(75, 'Фиш Ролл', '/uploads/images/food/fish_roll/1_1492167524.jpg', 'Североатлантическая пикша, соус песто, сыр Чеддер, салат, помидор, огурец в пшеничной лепешке\r\n\r\n', 160, 0, 0, 9),
(76, 'Цезарь Ролл', '/uploads/images/food/cezar_roll/1_1492167570.jpg', 'Сочная куриная котлета, салат, свежий помидор и сыр Пармезан в пшеничной лепешке, заправляется соусом Цезарь\r\n', 159, 0, 0, 9),
(77, 'Чизбургер', '/uploads/images/food/chizburger/1_1492167609.jpg', 'Рубленый бифштекс из натуральной 100%-й говядины с кусочком сыра Чеддер, с луком и маринованным огурцом на булочке, заправленной горчицей и кетчупом\r\n', 58, 0, 0, 9),
(78, 'Чизбургер де Люкс', '/uploads/images/food/chizburger_de_lyuks/1_1492167757.jpg', 'Чизбургер де Люкс\r\n\r\n', 138, 0, 0, 9),
(79, 'Чизбургер Фреш', '/uploads/images/food/chizburger_fresh/1_1492167803.jpg', 'Новинка Апрель 2017\r\n\r\n', 95, 0, 0, 9),
(80, 'Чикен Де Люкс', '/uploads/images/food/chiken_de_lyuks/1_1492167838.jpg', 'Булочка с кунжутом, салат, помидор, хрустящий бекон, пряный соус и сочная курица в новом Чикен Де Люкс.\r\n', 172, 0, 0, 9),
(81, 'Чикен Карри', '/uploads/images/food/chiken_karri/1_1492167894.jpg', 'Салат, хрустящий бекон, пряный соус карри и сочная курица в новом Чикен Карри.\r\n', 130, 0, 0, 9),
(82, 'Чикен МакНаггетс 20 шт. (3 соуса)', '/uploads/images/food/chiken_maknaggets_20_sht_3_sousa/1_1492167923.jpg', 'Кетчуп, майонез, барбекю, карри,горчичный, сырный кисло-сладкий.\r\n', 264, 0, 0, 9),
(83, 'Чикен МакНаггетс 6 шт. (1 соус)', '/uploads/images/food/chiken_maknaggets_6_sht_1_sous/1_1492167965.jpg', 'Кетчуп, майонез, барбекю, карри,горчичный, сырный кисло-сладкий.\r\n', 105, 0, 0, 9),
(84, 'Чикен МакНаггетс 9 шт. (2 соуса)', '/uploads/images/food/chiken_maknaggets_9_sht_2_sousa/1_1492167989.jpg', 'Кетчуп, майонез, барбекю, карри,горчичный, сырный кисло-сладкий.\r\n', 150, 0, 0, 9),
(85, 'Чикенбургер', '/uploads/images/food/chikenburger/1_1492168029.jpg', 'Сандвич с сочной куриной котлетой в хрустящей панировке, салатом и нежным соусом\r\n', 58, 0, 0, 9),
(86, 'Шримп Ролл', '/uploads/images/food/shrimp_roll/1_1492168056.jpg', 'В состав блюда входят сочные креветки в хрустящей панировке, листья салата в горячей тортилье, заправленной пикантными соусами. Пробуем, комментируем.\r\n\r\n', 190, 0, 0, 9),
(87, 'Картошка по-деревенски', '/uploads/images/food/kartoshka_po-derevenski/1_1492168398.jpg', 'Аппетитные, обжаренные со специями ломтики картофеля\r\n\r\n', 68, 0, 0, 10),
(89, 'Картошка фри (порция большая)', '/uploads/images/food/kartoshka_fri_porciya_bolshaya/1_1492168476.jpg', 'Хрустящий, с золотистой корочкой и слегка посоленный\r\n', 75, 0, 0, 10),
(90, 'Картошка фри (порция маленькая)', '/uploads/images/food/kartoshka_fri_porciya_malenkaya/1_1492168517.jpg', 'Хрустящий, с золотистой корочкой и слегка посоленный\r\n', 43, 0, 0, 10),
(91, 'Картошка фри (порция средняя)', '/uploads/images/food/kartoshka_fri_porciya_srednyaya/1_1492168550.jpg', 'Хрустящий, с золотистой корочкой и слегка посоленный\r\n', 50, 0, 0, 10),
(92, 'Морковные палочки', '/uploads/images/food/morkovnye_palochki/1_1492168721.jpg', '100-процентно натуральный продукт, состоящий из натуральной моркови\r\n\r\n', 43, 0, 0, 11),
(93, 'Салат овощной', '/uploads/images/food/salat_ovoshchnoy/1_1492168753.jpg', '', 188, 0, 0, 11),
(94, 'Салат Цезарь', '/uploads/images/food/salat_cezar/1_1492168776.jpg', '', 250, 0, 0, 11),
(95, 'Яблочные дольки', '/uploads/images/food/yablochnye_dolki/1_1492168804.jpg', '100-процентно натуральный продукт, состоящий из натуральной яблока\r\n\r\n', 43, 0, 0, 11),
(96, 'Хэппи мил (Чизбургер, картофель Фри, напиток)', '/uploads/images/food/heppi_mil_chizburger_kartofel_fri_napitok/1_1492168881.jpg', 'Чикен Макнаггетс 4 шт.+ картошка фри +  напиток\r\n\r\n', 206, 0, 0, 12),
(97, 'Хэппи мил (Чикен Макнаггетс 4шт. + соус, картошка Фри, напиток)', '/uploads/images/food/heppi_mil_chiken_maknaggets_4sht__sous_kartoshka_fri_napitok/1_1492168914.jpg', 'Чикенбургер + картошка фри +  напиток\r\n\r\n', 211, 0, 0, 12),
(98, 'Хэппи мил (Чикенбургер, картофель Фри, напиток)', '/uploads/images/food/heppi_mil_chikenburger_kartofel_fri_napitok/1_1492168964.jpg', 'Чизбургер + картошка фри +  напиток\r\n\r\n', 206, 0, 0, 12),
(99, 'Соус 1000 островов', '/uploads/images/food/sous_1000_ostrovov/1_1492169069.jpg', '', 19, 0, 0, 13),
(100, 'Соус Барбекю', '/uploads/images/food/sous_barbekyu/1_1492169094.jpg', '', 19, 0, 0, 13),
(101, 'Соус Горчичный', '/uploads/images/food/sous_gorchichnyy/1_1492169115.jpg', '', 19, 0, 0, 13),
(102, 'Соус Карри', '/uploads/images/food/sous_karri/1_1492169142.jpg', '', 19, 0, 0, 13),
(103, 'Соус Кетчуп', '/uploads/images/food/sous_ketchup/1_1492169174.jpg', '', 19, 0, 0, 13),
(104, 'Соус Кисло-сладкий', '/uploads/images/food/sous_kislo-sladkiy/1_1492169192.jpg', '', 19, 0, 0, 13),
(105, 'Соус Сальса', '/uploads/images/food/sous_salsa/1_1492169207.jpg', '', 19, 0, 0, 13),
(106, 'Соус Сырный', '/uploads/images/food/sous_syrnyy/1_1492169222.jpg', '', 19, 0, 0, 13),
(107, 'Горячий пирожок вкус сезона (персик)', '/uploads/images/food/goryachiy_pirojok_vkus_sezona_persik/1_1492169411.jpg', '', 50, 0, 0, 15),
(108, 'Горячий пирожок с вишней', '/uploads/images/food/goryachiy_pirojok_s_vishney/1_1492169431.jpg', '', 50, 0, 0, 15),
(109, 'Макфлури ДеЛюкс Спелая Вишня', '/uploads/images/food/makfluri_delyuks_spelaya_vishnya/1_1492169493.jpg', '', 91, 0, 0, 15),
(110, 'Макфлури карамель-шоколад', '/uploads/images/food/makfluri_karamel-shokolad/1_1492169523.jpg', '', 89, 0, 0, 15),
(111, 'Макфлури клубника-шоколад', '/uploads/images/food/makfluri_klubnika-shokolad/1_1492169552.jpg', 'Нежное клубнично-шоколадное, смешнное с хрустящим наполнителем.\r\n', 89, 0, 0, 15),
(112, 'Маффин с черной смородиной', '/uploads/images/food/maffin_s_chernoy_smorodinoy/1_1492169582.jpg', '', 73, 0, 0, 15),
(113, 'Маффин с шоколадом', '/uploads/images/food/maffin_s_shokoladom/1_1492169598.jpg', '', 73, 0, 0, 15),
(114, 'Молочный коктейль ванильный (большой)', '/uploads/images/food/molochnyy_kokteyl_vanilnyy_bolshoy/1_1492169696.jpg', 'Густой и сытный молочный коктейль\r\n\r\n', 105, 0, 0, 16),
(115, 'Молочный коктейль ванильный (маленький)', '/uploads/images/food/molochnyy_kokteyl_vanilnyy_malenkiy/1_1492169725.jpg', 'Густой и сытный молочный коктейль\r\n', 69, 0, 0, 16),
(116, 'Молочный коктейль ванильный (стандарт)', '/uploads/images/food/molochnyy_kokteyl_vanilnyy_standart/1_1492169757.jpg', 'Густой и сытный молочный коктейль\r\n', 92, 0, 0, 16),
(117, 'Молочный коктейль клубничный (большой)', '/uploads/images/food/molochnyy_kokteyl_klubnichnyy_bolshoy/1_1492169787.jpg', 'Густой и сытный молочный коктейль\r\n', 105, 0, 0, 16),
(118, 'Молочный коктейль клубничный (маленький)', '/uploads/images/food/molochnyy_kokteyl_klubnichnyy_malenkiy/1_1492169815.jpg', 'Густой и сытный молочный коктейль\r\n', 69, 0, 0, 16),
(119, 'Молочный коктейль клубничный (стандарт)', '/uploads/images/food/molochnyy_kokteyl_klubnichnyy_standart/1_1492169846.jpg', 'Густой и сытный молочный коктейль\r\n', 92, 0, 0, 16),
(120, 'Молочный коктейль шоколадный (большой)', '/uploads/images/food/molochnyy_kokteyl_shokoladnyy_bolshoy/1_1492169869.jpg', 'Густой и сытный молочный коктейль\r\n', 105, 0, 0, 16),
(121, 'Молочный коктейль шоколадный (маленький)', '/uploads/images/food/molochnyy_kokteyl_shokoladnyy_malenkiy/1_1492169902.jpg', 'Густой и сытный молочный коктейль\r\n', 69, 0, 0, 16),
(122, 'Молочный коктейль шоколадный (стандарт)', '/uploads/images/food/molochnyy_kokteyl_shokoladnyy_standart/1_1492169923.jpg', 'Густой и сытный молочный коктейль\r\n', 92, 0, 0, 16),
(123, 'Апельсиновый сок (большая)', '/uploads/images/food/apelsinovyy_sok_bolshaya/1_1492170549.jpg', '', 78, 0, 0, 17),
(124, 'Апельсиновый сок (маленькая)', '/uploads/images/food/apelsinovyy_sok_malenkaya/1_1492170573.jpg', '', 61, 0, 0, 17),
(125, 'Апельсиновый сок (стандарт)', '/uploads/images/food/apelsinovyy_sok_standart/1_1492170601.jpg', '', 88, 0, 0, 17),
(126, 'Вода Виттель - бутылка 0,5 (газированная/негазированная)', '/uploads/images/food/voda_vittel_-_butylka_05_gazirovannayanegazirovannaya/1_1492170712.jpg', '', 84, 0, 0, 17),
(127, 'Вода Перье - бутылка 0,5 (газированная/негазированная)', '/uploads/images/food/voda_pere_-_butylka_05_gazirovannayanegazirovannaya/1_1492170769.jpg', '', 99, 0, 0, 17),
(128, 'Глясе', '/uploads/images/food/glyase/1_1492170802.jpg', 'Сверху - мороженное, а под ним - ароматный кофе! Удивительный контраст освежающей прохлады и бодрящего, горячего кофе, который дарит чувство гармонии.\r\n', 102, 0, 0, 17),
(129, 'Двойной эспрессо', '/uploads/images/food/dvoynoy_espresso/1_1492170831.jpg', '', 65, 0, 0, 17),
(130, 'Капучино', '/uploads/images/food/kapuchino/1_1492170857.jpg', '', 85, 0, 0, 17),
(131, 'Капучино (большой)', '/uploads/images/food/kapuchino_bolshoy/1_1492170915.jpg', '', 99, 0, 0, 17),
(132, 'Кока-кола (большая)', '/uploads/images/food/koka-kola_bolshaya/1_1492170989.jpg', '', 90, 0, 0, 17),
(133, 'Кока-кола (маленькая)', '/uploads/images/food/koka-kola_malenkaya/1_1492171001.jpg', '', 40, 0, 0, 17),
(134, 'Кока-кола (средняя)', '/uploads/images/food/koka-kola_srednyaya/1_1492171014.jpg', '', 70, 0, 0, 17),
(135, 'Кока-кола (стандарт)', '/uploads/images/food/koka-kola_standart/1_1492171084.jpg', '', 60, 0, 0, 17),
(136, 'Кока-кола зеро (большая)', '/uploads/images/food/koka-kola_zero_bolshaya/1_1492171106.jpg', '', 90, 0, 0, 17),
(137, 'Кока-кола зеро (маленькая)', '/uploads/images/food/koka-kola_zero_malenkaya/1_1492171119.jpg', '', 48, 0, 0, 17),
(138, 'Кока-кола зеро (средняя)', '/uploads/images/food/koka-kola_zero_srednyaya/1_1492171133.jpg', '', 70, 0, 0, 17),
(139, 'Кока-кола зеро (стандарт)', '/uploads/images/food/koka-kola_zero_standart/1_1492171158.jpg', '', 60, 0, 0, 17),
(140, 'Кофе (большой)', '/uploads/images/food/kofe_bolshoy/1_1492171186.jpg', '', 79, 0, 0, 17),
(141, 'Кофе (стандарт)', '/uploads/images/food/kofe_standart/1_1492171201.jpg', '', 68, 0, 0, 17),
(142, 'Латте', '/uploads/images/food/latte/1_1492171216.jpg', '', 99, 0, 0, 17),
(143, 'Липтон Айс Ти (большая)', '/uploads/images/food/lipton_ays_ti_bolshaya/1_1492171296.jpg', '', 90, 0, 0, 17),
(144, 'Липтон Айс Ти (маленькая)', '/uploads/images/food/lipton_ays_ti_malenkaya/1_1492171311.jpg', '', 48, 0, 0, 17),
(145, 'Липтон Айс Ти (средняя)', '/uploads/images/food/lipton_ays_ti_srednyaya/1_1492171322.jpg', '', 70, 0, 0, 17),
(146, 'Липтон Айс Ти (стандарт)', '/uploads/images/food/lipton_ays_ti_standart/1_1492171334.jpg', '', 60, 0, 0, 17),
(147, 'Липтон Айс Ти зеленый (большая)', '/uploads/images/food/lipton_ays_ti_zelenyy_bolshaya/1_1492171366.jpg', '', 95, 0, 0, 17),
(148, 'Липтон Айс Ти зеленый (маленькая)', '/uploads/images/food/lipton_ays_ti_zelenyy_malenkaya/1_1492171383.jpg', '', 48, 0, 0, 17),
(149, 'Липтон Айс Ти зеленый (средняя)', '/uploads/images/food/lipton_ays_ti_zelenyy_srednyaya/1_1492171489.jpg', '', 74, 0, 0, 17),
(150, 'Липтон Айс Ти зеленый (стандарт)', '/uploads/images/food/lipton_ays_ti_zelenyy_standart/1_1492171506.jpg', '', 63, 0, 0, 17),
(151, 'Спрайт (большая)', '/uploads/images/food/sprayt_bolshaya/1_1492172524.jpg', '', 90, 0, 0, 17),
(152, 'Спрайт (маленькая)', '/uploads/images/food/sprayt_malenkaya/1_1492172540.jpg', '', 48, 0, 0, 17),
(153, 'Спрайт (средняя)', '/uploads/images/food/sprayt_srednyaya/1_1492172559.jpg', '', 70, 0, 0, 17),
(154, 'Спрайт (стандарт)', '/uploads/images/food/sprayt_standart/1_1492172571.jpg', '', 60, 0, 0, 17),
(155, 'Двойной Чизбургер Фреш', '/uploads/images/food/dvoynoy_chizburger_fresh/1_1492173192.jpg', 'Новинка сезона Весна-Лето 2017\r\n\r\n', 130, 0, 0, 18),
(156, 'Чизбургер Фреш', '/uploads/images/food/chizburger_fresh/1_1492173230.jpg', '', 95, 0, 0, 18),
(157, 'Чикен Де Люкс', '/uploads/images/food/chiken_de_lyuks/1_1492173281.jpg', 'Булочка с кунжутом, салат, помидор, хрустящий бекон, пряный соус и сочная курица в новом Чикен Де Люкс.\r\n', 172, 0, 0, 18),
(158, 'Чикен Карри', '/uploads/images/food/chiken_karri/1_1492173301.jpg', 'Салат, хрустящий бекон, пряный соус карри и сочная курица в новом Чикен Карри.\r\n', 130, 0, 0, 18),
(159, 'Биггер', '/uploads/images/food/bigger/1_1492242406.jpg', 'Большое удовольствие! Чем больше, тем лучше! Поэтому в нашем Биггере целых три свежих куриных филе в оригинальной или острой хрустящей панировке и еще целый фейерверк вкусов! Большой аппетит — большой Биггер!', 193, 0, 0, 19),
(160, 'Ай-Твистер Чиз', '/uploads/images/food/ay-tvister_chiz/1_1492242547.jpg', 'Встречайте «Сырррные недели» в KFC!\r\nВкус сочной курочки… c нежным сыром и сырным соусом в новом Ай-твистер  Чиз в KFC! «Сырные недели в KFC — настоящая любовь с первого кусочка!', 49, 0, 0, 19),
(161, 'Сандерс', '/uploads/images/food/sanders/1_1492242604.jpg', 'Сандвич «Сандерс» ярко, как никогда прежде, раскрывает знаменитый вкус, созданный самим полковником Сандерсом. Он приготовлен вручную из свежего куриного мяса по знаменитому секретному рецепту «11 трав и специй». Нежное куриное филе с хрустящими маринованными огурчиками, сочным луком, заправленные кетчупом и майонезным соусом в мягкой кунжутной булочке …ммм… SO GOOD!', 84, 0, 0, 19),
(162, 'Твистер Виджи', '/uploads/images/food/tvister_vidji/1_1492242665.jpg', 'Закручено со вкусом! Картофельная котлета Хашбраун, ломтик сыра, с сочными листьями салата и кусочками помидора в нежном соусе завернуты в пшеничную лепешку, обжаренную в тостере', 143, 0, 0, 19),
(163, 'Лонгер BBQ', '/uploads/images/food/longer_bbq/1_1492242735.jpg', 'Сочная курочка, маринованные огурчики и аппетитный соус барбекю… мммм! Спешите попробовать!', 49, 0, 0, 19),
(164, 'Такос Сальса', '/uploads/images/food/takos_salsa/1_1492242804.jpg', 'Сочное куриное филе в золотистой оригинальной панировке, соус Сальса и  поджаренная на гриле такос-лепешка всего за 39 рублей! Такос — это не про любовь, такос — это про перекус!', 39, 0, 0, 19),
(165, 'Такос Сырный', '/uploads/images/food/takos_syrnyy/1_1492242864.jpg', 'Сочное куриное филе в золотистой оригинальной панировке, сырный соус и  поджаренная на гриле такос-лепешка всего за 39 рублей! Такос — это не про любовь, такос — это про перекус!', 39, 0, 0, 19),
(166, 'Чизбургер Сальса', '/uploads/images/food/chizburger_salsa/1_1492242959.jpg', 'Аррива!  Зацени новый Чизбургер Сальса в KFC!\r\nСочное куриное филе с классическим мексиканским миксом Сырного и соуса Сальса, лук и ломтик сыра в булочке с кунжутом.', 99, 0, 0, 19),
(167, 'Твистер Сальса', '/uploads/images/food/tvister_salsa/1_1492243039.jpg', 'Аррива!  Зацени новый Твистер Сальса в KFC!\r\nСочное куриное филе с классическим мексиканским миксом Сырного и соуса Сальса, свежие листья салата, лук, маринованные огурчики и ломтик сыра закручены в пшеничную тортилью.', 153, 0, 0, 19),
(168, 'Шефбургер ', '/uploads/images/food/shefburger/1_1492243211.jpg', 'Попробуйте новый уникальный бургер от шефа! Сочная курица, томаты, свежий салат, соус Цезарь и аппетитная булочка. Такого вы еще не пробовали!\r\n\r\n', 129, 0, 0, 19),
(169, 'Острый Шефбургер', '/uploads/images/food/ostryy_shefburger/1_1492243282.jpg', 'Попробуйте новый уникальный бургер от шефа! Острая курочка в панировке Hot&spicy, сочные листья салата, пикантные маринованные огурчики, лук, фирменный соус «Бургер» и булочка с кунжутом. Мммм!', 129, 0, 0, 19),
(170, 'Твистер из тостера', '/uploads/images/food/tvister_iz_tostera/1_1492243342.jpg', 'Закручен со вкусом! Кусочки нежнейшего куриного филе в хрустящей острой или оригинальной панировке с сочными листьями салата, кусочками помидора и нежным соусом мы завернули в пшеничную лепешку и поджарили в тостере. Тут все и закрутилось!', 143, 0, 0, 19),
(171, 'Боксмастер из тостера', '/uploads/images/food/boksmaster_iz_tostera/1_1492243476.jpg', 'Полная перезагрузка! Мощный заряд энергии в нашем Боксмастере! Сочное куриное филе в оригинальной или острой хрустящей панировке, румяный хашбраун, ломтик сыра, кусочки помидора, салат и нежный соус в горячей лепешке – динамично и со вкусом!', 173, 0, 0, 19),
(172, '1 Ножка', '/uploads/images/food/1_nojka/1_1492244123.jpg', 'Ножки — самый лакомый кусочек курочки, любимый с самого детства. Теперь у вас есть еще один вкусный повод зайти в KFC: куриные ножки с оригинальным вкусом, приготовленные по секретному рецепту Полковника Сандерса «11 трав и специй». Самая вкусная курочка в КFC! ', 54, 0, 0, 20),
(173, '2 Ножки', '/uploads/images/food/2_nojki/1_1492244210.jpg', 'Ножки — самый лакомый кусочек курочки, любимый с самого детства. Теперь у вас есть еще один вкусный повод зайти в KFC: куриные ножки с оригинальным вкусом, приготовленные по секретному рецепту Полковника Сандерса «11 трав и специй». Самая вкусная курочка в КFC!', 105, 0, 0, 20),
(174, '3 Ножки', '/uploads/images/food/3_nojki/1_1492244264.jpg', 'Ножки — самый лакомый кусочек курочки, любимый с самого детства. Теперь у вас есть еще один вкусный повод зайти в KFC: куриные ножки с оригинальным вкусом, приготовленные по секретному рецепту Полковника Сандерса «11 трав и специй». Самая вкусная курочка в КFC!', 159, 0, 0, 20),
(175, '3 Стрипса', '/uploads/images/food/3_stripsa/1_1492244322.jpg', 'Только любимый вкус – и ничего лишнего. Потрясающе нежное куриное филе мы панируем вручную и готовим в ресторане по уникальному рецепту Полковника Сандерса. Совершенный вкус! ', 103, 0, 0, 20),
(176, '6 Стрипсов', '/uploads/images/food/6_stripsov/1_1492244367.jpg', 'Только любимый вкус – и ничего лишнего. Потрясающе нежное куриное филе мы панируем вручную и готовим в ресторане по уникальному рецепту Полковника Сандерса. Совершенный вкус!', 195, 0, 0, 20),
(177, 'Байтсы большие', '/uploads/images/food/baytsy_bolshie/1_1492244420.jpg', 'Свежие сочные кусочки курицы в обжигающе острой хрустящей панировке «Hot and Spicy». Взрыв вкуса для любителей острых ощущений!\r\n', 199, 0, 0, 20),
(178, '9 Стрипсов', '/uploads/images/food/9_stripsov/1_1492244484.jpg', 'Только любимый вкус – и ничего лишнего. Потрясающе нежное куриное филе мы панируем вручную и готовим в ресторане по уникальному рецепту Полковника Сандерса. Совершенный вкус! ', 249, 0, 0, 20),
(179, '3 Крыла', '/uploads/images/food/3_kryla/1_1492244536.jpg', 'Огонь внутри! Далеко не ангельские крылышки*! Наши острые куриные крылышки в хрустящей панировке со жгучими специями – настоящий огонь! \r\n*Крыло — однофаланговая часть на одной или двух костях.', 97, 0, 0, 20),
(180, '6 Крыльев', '/uploads/images/food/6_krylev/1_1492244596.jpg', 'Огонь внутри! Далеко не ангельские крылышки*! Наши острые куриные крылышки в хрустящей панировке со жгучими специями – настоящий огонь! \r\n*Крыло — однофаланговая часть на одной или двух костях.', 173, 0, 0, 20),
(181, '9 крыльев', '/uploads/images/food/9_krylev/1_1492244643.jpg', 'Огонь внутри! Далеко не ангельские крылышки*! Наши острые куриные крылышки в хрустящей панировке со жгучими специями – настоящий огонь! \r\n*Крыло — однофаланговая часть на одной или двух костях.', 229, 0, 0, 20),
(182, 'Байтсы малые', '/uploads/images/food/baytsy_malye/1_1492244683.jpg', 'Свежие сочные кусочки курицы в обжигающе острой хрустящей панировке «Hot and Spicy». Взрыв вкуса для любителей острых ощущений!', 74, 0, 0, 20),
(183, 'Байтсы средние', '/uploads/images/food/baytsy_srednie/1_1492244750.jpg', 'Свежие сочные кусочки курицы в обжигающе острой хрустящей панировке «Hot and Spicy». Взрыв вкуса для любителей острых ощущений!', 111, 0, 0, 20),
(184, 'Байтсы Терияки', '/uploads/images/food/baytsy_teriyaki/1_1492244812.jpg', 'Золотистые кусочки сочного куриного филе, посыпанные кунжутом, в соусе Терияки. Немного сладковатый на вкус, густой по консистенции с имбирно-медовым оттенком соус Терияки идеально сочетается с курочкой KFC!', 119, 0, 0, 20),
(185, 'Баскет 25 крыльев', '/uploads/images/food/basket_25_krylev/1_1492244976.jpg', '25 острых крыльев*. Настроение в большом формате! Всемирно известные хиты от KFC в нашем Баскете! Для вас мы собрали отличную компанию – обжигающе острые крылышки. Много не бывает!\r\n\r\n*Крыло — однофаланговая часть на одной или двух костях', 499, 0, 0, 21),
(186, 'Баскет дэет с оригинальными стрипсами', '/uploads/images/food/basket_deet_s_originalnymi_stripsami/1_1492245835.jpg', 'Всемирно известные хиты от KFC в нашем Баскете! Для вас мы собрали отличную компанию – сочные кусочки курицы, обжигающе острые крылышки, нежнейшие стрипсы и картофель фри. Много не бывает!\r\nВ состав баскета входят: 2 ножки, 4 куриных крылышка*, 4 стрипса в оригинальной панировке, 2 картофеля фри 60г. \r\n*Крыло — однофаланговая часть на одной или двух костях.', 360, 0, 0, 21),
(187, 'Баскет 16 острых крыльев ', '/uploads/images/food/basket_deet_s_originalnymi_stripsami/1_1492253498.png', 'Всемирно известные хиты от KFC в нашем Баскете! Для вас мы собрали отличную компанию – сочные кусочки курицы, обжигающе острые крылышки, нежнейшие стрипсы и картофель фри. Много не бывает!\r\nВ состав баскета входят: 2 ножки, 4 куриных крылышка*, 4 стрипса в оригинальной панировке, 2 картофеля фри 60г. \r\n*Крыло — однофаланговая часть на одной или двух костях.', 360, 0, 0, 21),
(188, 'Стар-баскет', '/uploads/images/food/star-basket/1_1492255129.png', 'Bсе хиты KFC  в одном мини-баскете «Стар-баскет»:  1 ножка, 2 куриных крылышка*, 1 стрипс (оригинальный), 4 байтс, 1 мал. картофель фри.  Теперь ты сразу сможешь попробовать все разнообразие курочки KFC и выбрать свой любимый формат!\r\n\r\n*Крыло — однофаланговая часть на одной или двух костях.\r\n\r\nВ некоторых ресторанах KFC продукты и цены могут отличаться', 199, 0, 0, 21),
(189, 'Баскет дэет с острыми стрипсами', '/uploads/images/food/basket_deet_s_ostrymi_stripsami/1_1492255202.png', 'Всемирно известные хиты от KFC в нашем Баскете! Для вас мы собрали отличную компанию – сочные кусочки курицы, обжигающе острые крылышки, нежнейшие стрипсы и картофель фри. Много не бывает!\r\nВ состав баскета входят: 2 ножки, 4 куриных крылышка*, 4 стрипса в панировке Hot and spicy, 2 картофеля фри 60г. \r\n*Крыло — однофаланговая часть на одной или двух костях.', 360, 0, 0, 21),
(190, 'Батл Баскет', '/uploads/images/food/batl_basket/1_1492256219.png', 'Батл Баскет с 4 апреля в KFC! Сочная курица, картофель фри и соус Heinz на выбор. Всего за 99 рублей в KFC!', 99, 0, 0, 21),
(191, 'Баскет фри', '/uploads/images/food/basket_fri/1_1492256447.png', 'Еще больше вкуса! В наших крупных ломтиках мы сохранили еще больше вкуса твоего любимого картофеля фри. Он получается именно таким, как ты любишь – с аппетитно хрустящей корочкой и мягкой, рассыпчатой серединкой. Любимое удовольствие!', 99, 0, 0, 22),
(192, 'Картофель фри стандартный', '/uploads/images/food/kartofel_fri_standartnyy/1_1492256495.png', 'Еще больше вкуса! В наших крупных ломтиках мы сохранили еще больше вкуса твоего любимого картофеля фри. Он получается именно таким, как ты любишь – с аппетитно хрустящей корочкой', 58, 0, 0, 22),
(193, 'Картофель фри малый', '/uploads/images/food/kartofel_fri_malyy/1_1492256530.png', 'Еще больше вкуса! В наших крупных ломтиках мы сохранили еще больше вкуса твоего любимого картофеля фри. Он получается именно таким, как ты любишь – с аппетитно хрустящей корочкой и мягкой, рассыпчатой серединкой. Любимое удовольствие!', 43, 0, 0, 22),
(194, 'Салат Цезарь Лайт', '/uploads/images/food/salat_cezar_layt/1_1492256664.png', 'Салат Цезарь — это кусочки нежнейшего куриного филе в оригинальной панировке, сочные листья салата айсберг, сыр реджанито, гренки и великолепный соус Цезарь.', 119, 0, 0, 23),
(195, 'Мороженое «Летняя фантазия»', '/uploads/images/food/morojenoe_letnyaya_fantaziya/1_1492258005.png', 'Нежное мягкое сливочное мороженое. ', 70, 0, 0, 24),
(196, 'Мороженое в рожке «Летнее»', '/uploads/images/food/morojenoe_v_rojke_letnee/1_1492258051.png', 'Нежное мягкое сливочное мороженое в вафельном рожке.\r\n\r\n', 29, 0, 0, 24),
(197, 'Айс Дрим', '/uploads/images/food/ays_drim/1_1492258103.png', 'Нежное мороженое, украшенное сиропом и хрустящими посыпками в оригинальном круглом стаканчике. Стильная красная ложка – последний  эффектный штрих к этому аппетитному десерту.  \r\n\r\n', 85, 0, 0, 24),
(198, 'Чизкейк New-York Карамель', '/uploads/images/food/chizkeyk_new-york_karamel/1_1492258134.png', 'Нежный ванильный чизкейк Нью Йорк с карамельным топпингом тает во рту, особенно хорошо сочетается с горячим латте или капучино\r\n\r\n', 121, 0, 0, 24),
(199, 'Чизкейк New-York Клубника', '/uploads/images/food/chizkeyk_new-york_klubnika/1_1492258168.png', 'Нежный ванильный чизкейк Нью Йорк с клубничным топпингом тает во рту, особенно хорошо сочетается с горячим латте или капучино\r\n\r\n', 121, 0, 0, 24),
(200, 'Чизкейк New-York Шоколад', '/uploads/images/food/chizkeyk_new-york_shokolad/1_1492258254.png', 'Нежный ванильный чизкейк Нью Йорк с шоколадным топпингом тает во рту, особенно хорошо сочетается с горячим латте или капучино\r\n\r\n', 121, 0, 0, 24),
(201, 'Прохладительные напитки 0.3л', '/uploads/images/food/prohladitelnye_napitki_03l/1_1492258440.png', 'Pepsi, 7-up, Mirinda, холодный чай Липтон «Лимон, Зеленый».\r\n\r\n', 48, 0, 0, 25),
(202, 'Прохладительные напитки 0,4 л', '/uploads/images/food/prohladitelnye_napitki_04_l/1_1492258462.png', 'Pepsi, 7-up, Mirinda, холодный чай Липтон «Лимон, Зеленый». \r\n\r\n', 60, 0, 0, 25),
(203, 'Прохладительные напитки 0.5 л', '/uploads/images/food/prohladitelnye_napitki_05_l/1_1492258484.png', 'Pepsi, 7-up, Mirinda, холодный чай Липтон «Лимон, Зеленый». \r\n\r\n', 70, 0, 0, 25),
(204, 'Прохладительные напитки 0.8 л', '/uploads/images/food/prohladitelnye_napitki_08_l/1_1492258507.png', 'Pepsi, 7-up, Mirinda, холодный чай Липтон «Лимон, Зеленый».  \r\n\r\n', 99, 0, 0, 25),
(205, 'Пиво 0,3 л', '/uploads/images/food/pivo_03_l/1_1492258543.png', 'Сибирская корона 0,3 л \r\n\r\n', 99, 0, 0, 25),
(206, 'Пиво 0,5 л', '/uploads/images/food/pivo_05_l/1_1492258581.png', 'Сибирская корона 0,5 л \r\n\r\n', 109, 0, 0, 25),
(207, 'Кофе Двойной Эспрессо 0,1', '/uploads/images/food/kofe_dvoynoy_espresso_01/1_1492260524.png', 'Кофе Двойной Эспрессо 0,1 зерновой \r\n\r\n', 64, 0, 0, 25),
(208, 'Кофе Американо 0,2', '/uploads/images/food/kofe_amerikano_02/1_1492260560.png', 'Кофе Американо 0,2 зерновой\r\n\r\n', 68, 0, 0, 25),
(209, 'Кофе Американо 0,3', '/uploads/images/food/kofe_amerikano_03/1_1492260624.png', 'Кофе Американо 0,3 зерновой\r\n\r\n', 79, 0, 0, 25),
(210, 'Кофе Капучино 0,3', '/uploads/images/food/kofe_kapuchino_03/1_1492260690.png', 'Кофе Капучино 0,3 зерновой \r\n\r\n', 94, 0, 0, 25),
(211, 'Кофе Капучино 0,4', '/uploads/images/food/kofe_kapuchino_04/1_1492260737.png', 'Кофе Капучино 0,4 зерновой \r\n', 104, 0, 0, 25),
(212, 'Кофе Латте 0,3', '/uploads/images/food/kofe_latte_03/1_1492260754.png', 'Кофе Латте 0,3 зерновой\r\n\r\n', 99, 0, 0, 25),
(213, 'Кофе Глясе 0,2', '/uploads/images/food/kofe_glyase_02/1_1492260791.png', 'Кофе Глясе 0,2 зерновой\r\n\r\n', 102, 0, 0, 25),
(214, 'Чай 0.4л', '/uploads/images/food/chay_04l/1_1492260816.png', 'Черный и зеленый чай 0.4л\r\n\r\n', 69, 0, 0, 25),
(215, 'Чай 0.3л', '/uploads/images/food/chay_03l/1_1492260931.png', 'Черный и зеленый чай 0.3л', 59, 0, 0, 25),
(216, 'Пепси кола 1,25л', '/uploads/images/food/pepsi_kola_125l/1_1492260957.png', 'Пепси кола 1,25л\r\n\r\n', 107, 0, 0, 25),
(217, 'Bud 0,3л.', '/uploads/images/food/bud_03l/1_1492260988.png', 'Пиво Bud 0,3л.', 109, 0, 0, 25),
(218, 'Bud 0,5л.', '/uploads/images/food/bud_05l/1_1492261021.png', 'Пиво Bud 0,5л.\r\n\r\n', 139, 0, 0, 25),
(219, 'Липтон Айс Ти Зеленый 0,5л', '/uploads/images/food/lipton_ays_ti_zelenyy_05l/1_1492261045.png', 'Липтон Айс Ти Зеленый \r\n\r\n', 79, 0, 0, 25),
(220, 'Липтон Айс Ти Лимон 0,5л', '/uploads/images/food/lipton_ays_ti_limon_05l/1_1492261084.png', 'Липтон Айс Ти Лимон \r\n\r\n', 79, 0, 0, 25),
(221, '7UP Мохито', '/uploads/images/food/7up_mohito/1_1492261109.png', 'Бесспорный хит летнего сезона! Беспроигрышное сочетание бодрящей цитрусовой кислинки, мятной свежести, лимонада и кубиков льда. Окунитесь в океан свежести,  прохлады и удовольствия.  Почувствуйте дух острова свободы, родины мохито!\r\n\r\n', 89, 0, 0, 25),
(222, 'Милкшейк Ваниль 0,25', '/uploads/images/food/milksheyk_vanil_025/1_1492261136.png', 'Выбери коктейль со вкусом Нежной Ванили, такой простой и в то же время изысканный. Молочный коктейль — такой восхитительно нежный, что хочется пить, не отрываясь!', 69, 0, 0, 25),
(223, 'Милкшейк Клубника 0,25', '/uploads/images/food/milksheyk_klubnika_025/1_1492261156.png', 'Яркий вкус Лесной Клубники перенесет в лето и подарит хорошее настроение. Молочный коктейль — такой восхитительно нежный, что хочется пить не отрываясь!\r\n\r\n', 69, 0, 0, 25),
(224, 'Милкшейк Шоколадно-Ореховый 0,25', '/uploads/images/food/milksheyk_shokoladno-orehovyy_025/1_1492261178.png', 'Восхитительный Шоколадно-Ореховый вкус — лучший выбор для тех, кто не представляет свою жизнь без молочного шоколада. Молочный коктейль - такой восхитительно нежный, что хочется пить, не отрываясь!\r\n\r\n', 69, 0, 0, 25),
(225, 'Милкшейк Ваниль 0,4', '/uploads/images/food/milksheyk_vanil_04/1_1492261212.png', 'Выбери коктейль со вкусом Нежной Ванили, такой простой и в то же время изысканный. Молочный коктейль — такой восхитительно нежный, что хочется пить, не отрываясь!\r\n\r\n', 91, 0, 0, 25),
(226, 'Милкшейк Клубника 0,4', '/uploads/images/food/milksheyk_klubnika_04/1_1492261236.png', 'Яркий вкус Лесной Клубники перенесет в лето и подарит хорошее настроение. Молочный коктейль — такой восхитительно нежный, что хочется пить не отрываясь!\r\n\r\n', 91, 0, 0, 25),
(227, 'Милкшейк Шоколадно-Ореховый 0,4', '/uploads/images/food/milksheyk_shokoladno-orehovyy_04/1_1492261257.png', 'Восхитительный Шоколадно-Ореховый вкус — лучший выбор для тех, кто не представляет свою жизнь без молочного шоколада. Молочный коктейль - такой восхитительно нежный, что хочется пить, не отрываясь!\r\n\r\n', 91, 0, 0, 25),
(228, 'Pepsi лайт 0,6 л', '/uploads/images/food/pepsi_layt_06_l/1_1492261296.png', 'Pepsi лайт 0,6 л бутылка \r\n\r\n', 79, 0, 0, 25),
(229, 'Аква Минерале б/газа 0,6', '/uploads/images/food/akva_minerale_bgaza_06/1_1492261317.png', ' Вода питьевая Аква Минерале б/газа 0,6\r\n\r\n', 79, 0, 0, 25),
(230, 'Аква Минерале 0,6 газированная', '/uploads/images/food/akva_minerale_06_gazirovannaya/1_1492261346.png', ' Вода питьевая  Аква Минерале 0,6 газ \r\n\r\n', 79, 0, 0, 25),
(231, 'Сок "Красная вишня" 0,25', '/uploads/images/food/sok_krasnaya_vishnya_025/1_1492261368.png', 'Сок "Красная вишня" 0,25\r\n\r\n', 59, 0, 0, 25),
(232, 'Сок "Лесные ягоды" 0,25', '/uploads/images/food/sok_lesnye_yagody_025/1_1492261391.png', 'Сок "Лесные ягоды" 0,25\r\n\r\n', 59, 0, 0, 25),
(233, 'Обед для самых маленьких', '/uploads/images/food/obed_dlya_samyh_malenkih/1_1492497674.png', 'Возьмите для маленьких посетителей  Детский обед из четырех блюд на выбор: горячее (два стрипса или кусок курицы), картофель фри, напиток (сок 0,2 л, газированный напиток 0,3 л или чай 0,3 л) и десерт — мороженое с топпингом на выбор: клубника, карамель или шоколад.\r\n\r\n', 195, 0, 0, 26),
(234, 'Рисбокс Терияки', '/uploads/images/food/risboks_teriyaki/1_1492497715.png', 'Рисбокс Терияки снова в меню! Горячий рис с овощами, сочные кусочки курочки с соусом Терияки и кунжутом. \r\n\r\n', 139, 0, 0, 26),
(235, '«Коробка удачи» Warface', '/uploads/images/food/korobka_udachi_warface/1_1492497756.png', 'Этот набор – отличное решение для тех, кто в игре! На дне каждого бокса размещен код на игровой предмет популярного онлайн-шутера Warface. Пин-код из «Коробки удачи» — это шанс получить легендарное оружие и ценную амуницию. Испытай свою удачу в KFC! В состав набора входит: картофель фри мал, 1 куриная ножка или 2 стрипса на выбор, соус Грибной.\r\n\r\n', 99, 0, 0, 26),
(236, 'Бизнес ланч', '/uploads/images/food/biznes_lanch/1_1492498014.png', 'Твистер острый или оригинальный на выбор, два стрипса острых или оригинальных на выбор, картофель фри мал., газированный напиток Пепси 0,6\r\n', 199, 0, 0, 26),
(237, 'Такосбокс Сальса', '/uploads/images/food/takosboks_salsa/1_1492498052.png', 'Такос Сальса, картофель фри и соус Сальса — три в одном всего за 89 рублей!\r\n', 89, 0, 0, 26),
(238, 'Такосбокс Сырный', '/uploads/images/food/takosboks_syrnyi/1_1492498076.png', 'Такос Сырный, картофель фри и сырный соус — три в одном всего за 89 рублей! \r\n\r\n', 89, 0, 0, 26),
(239, 'Брейкер', '/uploads/images/food/breyker/1_1492498148.png', 'Брейкер – нежная горячая булочка, свежее жареное яйцо, ломтики аппетитного бекона, нежный сыр, майонезный соус и соус Барбекю.\r\n\r\n', 96, 0, 0, 27),
(240, 'Бустер', '/uploads/images/food/buster/1_1492498729.png', 'Бустер – нежная горячая булочка, сочное куриное филе в хрустящей панировке, свежее жареное яйцо, хрустящие маринованные огурчики,  заправленные майонезом. \r\n\r\nЗаряд энергии и оптимизма!', 105, 0, 0, 27),
(241, 'БоксМастер утренний', '/uploads/images/food/boksmaster_utrenniy/1_1492498764.png', 'БоксМастер утренний – свежее жареное яйцо, сочное куриное филе в оригинальной хрустящей панировке, ломтик сыра, кусочки помидора, свежий салат и майонез в горячей подрумяненной лепешке.\r\n\r\nЯркий вкус и мощный заряд энергии на целый день!', 143, 0, 0, 27),
(242, 'Твистер утренний', '/uploads/images/food/tvister_utrenniy/1_1492498790.png', 'Твистер утренний – свежее жареное яйцо, сочное куриное филе в хрустящей панировке, сочные листья салата, кусочки помидора и нежный соус мы завернули в пшеничную лепешку и поджарили в тостере.\r\n\r\nЭтим утром – закрути по-новому!', 123, 0, 0, 27),
(243, 'Яичница с байтсами', '/uploads/images/food/yaichnica_s_baytsami/1_1492498830.png', 'Яичница с байтсами – два свежих пожаренных яйца и аппетитные байтсы в хрустящей панировке. Вдохновляющее начало нового дня!\r\n\r\n', 105, 0, 0, 27),
(244, 'Картофельная котлета', '/uploads/images/food/kartofelnaya_kotleta/1_1492499555.png', 'Картофельная котлета – хрустящая горячая картофельная котлета, обжаренная в растительном масле. Солнечный день начинается с приятных мелочей.\r\n\r\n', 44, 0, 0, 27),
(245, 'Блинчики', '/uploads/images/food/blinchiki/1_1492499631.png', 'Два нежных блинчика из пшеничной муки. Добавь аппетитный джем на выбор: клубника или персик.\r\n\r\nНасладись этим утром!\r\n\r\n', 79, 0, 0, 27),
(246, 'Биггер Утренний', '/uploads/images/food/bigger_utrenniy/1_1492499659.png', 'Грандиозное начало прекрасного дня! Размер имеет значение! Выберите действительно большой и аппетитный сендвич: большая булочка с кунжутом, два стрипса в хрустящей оригинальной или острой панировке, свежепожареное яйцо, кусочки помидора, ломтик нежного сыра, свежие листья салата, заправленные майонезом и соусом барбекю. Большие планы на день — большой Биггер Утренний!\r\n\r\n', 163, 0, 0, 27),
(247, 'Джемы', '/uploads/images/food/djemy/1_1492499684.png', 'Клубничный, персиковый джемы — отличное дополнение к блинчикам, сырникам или овсяной каше на завтрак.\r\n\r\n', 13, 0, 0, 27),
(248, 'Райзер', '/uploads/images/food/rayzer/1_1492499714.png', 'Райзер – нежная горячая булочка, свежее жареное яйцо, нежный сыр и соус Барбекю.\r\n\r\nНовый день будет солнечным!', 76, 0, 0, 27),
(249, 'Овсяная каша', '/uploads/images/food/ovsyanaya_kasha/1_1492499764.png', 'Нежная овсяная каша – идеальное начало дня. Добавьте джем на выбор: клубника и персик.\r\n\r\nС джемом 76 р.', 66, 0, 0, 27),
(250, 'Тост с сыром', '/uploads/images/food/tost_s_syrom/1_1492499796.png', 'Тост с двумя ломтиками нежного сыра на подрумяненной булочке. Хороший день начинается с приятных мелочей.\r\n\r\n', 39, 0, 0, 27),
(251, 'Кетчуп томатный', '/uploads/images/food/ketchup_tomatnyy/1_1492500370.png', 'Кетчуп томатный', 19, 0, 0, 28),
(252, 'Соус Терияки', '/uploads/images/food/sous_teriyaki/1_1492500404.png', 'Соус деликатесный Терияки', 19, 0, 0, 28),
(253, 'Соус Барбекю', '/uploads/images/food/sous_barbekyu/1_1492500431.png', 'Соус Барбекю оригинальный\r\n', 19, 0, 0, 28),
(254, 'Соус кисло-сладкий Чили', '/uploads/images/food/sous_kislo-sladkiy_chili/1_1492500457.png', 'Соус кисло-сладкий Чили\r\n\r\n', 19, 0, 0, 28),
(255, 'Соус Чесночный', '/uploads/images/food/sous_chesnochnyy/1_1492500485.png', 'Соус Чесночный оригинальный\r\n', 19, 0, 0, 28),
(256, 'Соус Сырный оригинальный', '/uploads/images/food/sous_syrnyy_originalnyy/1_1492500508.png', 'Соус Сырный оригинальный\r\n\r\n', 19, 0, 0, 28),
(257, 'Соус Кентукки Барбекью', '/uploads/images/food/sous_kentukki_barbekyu/1_1492500535.png', 'Соус Кентукки Барбекью  \r\n', 19, 0, 0, 28),
(258, 'Соус Грибной', '/uploads/images/food/sous_gribnoy/1_1492500557.png', 'Соус Грибной ', 19, 0, 0, 28),
(259, 'Такос Сальса', '/uploads/images/food/takos_salsa/1_1492500648.png', 'Сочное куриное филе в золотистой оригинальной панировке, соус Сальса и  поджаренная на гриле такос-лепешка всего за 39 рублей! Такос — это не про любовь, такос — это про перекус! \r\n\r\n', 39, 0, 0, 29),
(260, 'Такос Сырный', '/uploads/images/food/takos_syrnyy/1_1492500671.png', 'Сочное куриное филе в золотистой оригинальной панировке, сырный соус и  поджаренная на гриле такос-лепешка всего за 39 рублей! Такос — это не про любовь, такос — это про перекус!\r\n\r\n', 39, 0, 0, 29),
(261, 'Чизбургер Сальса', '/uploads/images/food/chizburger_salsa/1_1492500697.png', 'Аррива!  Зацени новый Чизбургер Сальса в KFC!\r\n\r\nСочное куриное филе с классическим мексиканским миксом Сырного и соуса Сальса, лук и ломтик сыра в булочке с кунжутом. Всего за 99 рублей!', 99, 0, 0, 29),
(262, 'Твистер Сальса', '/uploads/images/food/tvister_salsa/1_1492500722.png', 'Аррива!  Зацени новый Твистер Сальса в KFC!\r\n\r\nСочное куриное филе с классическим мексиканским миксом Сырного и соуса Сальса, свежие листья салата, лук, маринованные огурчики и ломтик сыра закручены в пшеничную тортилью', 153, 0, 0, 29),
(263, 'Такосбокс Сальса', '/uploads/images/food/takosboks_salsa/1_1492500755.png', 'Такос Сальса, картофель фри и соус Сальса — три в одном всего за 89 рублей!\r\n\r\n', 89, 0, 0, 29),
(264, 'Такосбокс Сырный', '/uploads/images/food/takosboks_syrnyi/1_1492500793.png', 'Такос Сырный, картофель фри и сырный соус — три в одном всего за 89 рублей!\r\n\r\n', 89, 0, 0, 29),
(265, 'Батл Баскет', '/uploads/images/food/batl_basket/1_1492500855.png', 'Батл Баскет с 4 апреля в KFC! Сочная курица, картофель фри и соус Heinz на выбор. Всего за 99 рублей в KFC!\r\n\r\n', 99, 0, 0, 30),
(266, 'ВОППЕР', '/uploads/images/food/vopper/1_1492504330.png', 'ВОППЕР — это вкуснейшая приготовленная на огне 100% говядина с сочными помидорами, свежим нарезанным листовым салатом, густым майонезом, хрустящими маринованными огурчиками и рубленым белым луком на нежной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(267, 'ВОППЕР ДЖУНИОР', '/uploads/images/food/vopper_djunior/1_1492504724.png', 'Приготовленный на огне бифштекс из 100% говядины, сочные помидоры, свежий нарезанный салат, густой майонез, хрустящие огурчики и рубленый белый лук в мягкой булочке, посыпанной кунжутом.\r\n', 1, 0, 0, 31),
(268, 'Двойной ВОППЕР', '/uploads/images/food/dvoynoy_vopper/1_1492505128.png', 'Два аппетитных, приготовленных на огне бифштекса из 100% говядины с сочными помидорами, свежим нарезанным листовым салатом, густым майонезом, хрустящими маринованными огурчиками и рубленым белым луком на нежной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(269, 'Тройной ВОППЕР', '/uploads/images/food/troynoy_vopper/1_1492505296.png', 'Тройной ВОППЕР® — это целых три вкуснейших, приготовленных на огне бифштекса из 100% говядины с сочными помидорами, свежим нарезанным листовым салатом, густым майонезом, хрустящими маринованными огурчиками и рубленым белым луком на нежной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(270, 'СТЕЙКХАУС', '/uploads/images/food/steykhaus/1_1492505323.png', 'Стейкхаус – это сочетание нашей фирменной, приготовленной на огне 100% говядины с ломтиками бекона, а также специальным соусом «Барбекю», майонезом, листьями свежего салата, помидором и хрустящим луком на воздушной булочке, посыпанной кукурузной крошкой.\r\n', 1, 0, 0, 31),
(271, 'БИГ КИНГ', '/uploads/images/food/big_king/1_1492505394.png', 'Больше 100% говядины. Больше сыра. Больше соуса. Кроме двух фирменных бифштексов, и ломтика сыра, в состав входят фирменный соус «Биг Кинг», листовой салат, огурчики, свежий лук — и все это на подрумяненной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(272, 'Двойной ЧИЗБУРГЕР', '/uploads/images/food/dvoynoy_chizburger/1_1492505444.png', 'Два приготовленных на огне фирменных говяжьих бифштекса, сверху один ломтик слегка расплавленного сыра, хрустящий маринованный огурчик, золотистая горчица и кетчуп. И все это в подрумяненной и посыпанной кунжутом булочке.\r\n', 1, 0, 0, 31),
(273, 'ЧИЗБУРГЕР', '/uploads/images/food/chizburger/1_1492505476.png', 'Вы не ошибетесь, выбирая Чизбургер: это фирменная приготовленная на огне говядина с ломтиком слегка расплавленного сыра, хрустящим огурчиком, желтой горчицей и кетчупом, которые подаются в подрумяненной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(274, 'ГАМБУРГЕР', '/uploads/images/food/gamburger/1_1492505506.png', 'Приготовленный на огне бифштекс с маринованным огурчиком, горчицей и кетчупом в подрумяненной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(275, 'ЛОНГ БИФ', '/uploads/images/food/long_bif/1_1492505531.png', '100% говядина, приготовленная на огне с маринованными огурчиками, майонезом, кетчупом и хрустящим луком.\r\n', 1, 0, 0, 31),
(276, 'ГРИЛЬ ЧИКЕН БАРБЕКЮ', '/uploads/images/food/gril_chiken_barbekyu/1_1492505555.png', 'В этом сэндвиче приготовленное на гриле нежное белое куриное филе встречается с беконом, соусом «Барбекю», листовым салатом, спелым помидором, густым майонезом и хрустящим поджаренным луком на подрумяненной булочке.\r\n', 1, 0, 0, 31),
(277, 'КРИСПИ ЧИКЕН', '/uploads/images/food/krispi_chiken/1_1492505579.png', 'В классическом сэндвиче Криспи Чикен® курицу в хрустящей панировке дополняет нарезанный листовой салат и легкий слой сливочного майонеза. Свежеприготовленный сэндвич подается на идеально подрумяненной булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(278, 'ЧИКЕНБУРГЕР', '/uploads/images/food/chikenburger/1_1492505651.png', 'Особенный и очень вкусный бургер из хрустящих куриных наггетсов, листового салата под соусом из кетчупа и майонеза на нежной булочке.\r\n', 1, 0, 0, 31),
(279, 'ЛОНГ ЧИКЕН', '/uploads/images/food/long_chiken/1_1492505679.png', 'Сэндвич Лонг Чикен® – это сочная курочка в легкой панировке, плюс простое сочетание нарезанного листового салата и густого майонеза на булочке с кунжутной посыпкой.\r\n', 1, 0, 0, 31),
(280, 'ФИШ КИНГ', '/uploads/images/food/fish_king/1_1492505700.png', 'Наш сэндвич с рыбным филе высшего качества — это легкое, рассыпчатое филе белой рыбы, которое приправлено майонезом и нарезанным листовым салатом.\r\n', 1, 0, 0, 31),
(281, 'ЦЕЗАРЬ РОЛЛ', '/uploads/images/food/cezar_roll/1_1492505722.png', 'Сочная куриная котлетка, сочный помидор и листья салата, сыр Пармезан вместе с соусом Цезарь в пшеничной лепешке.\r\n', 1, 0, 0, 31),
(282, 'БАРБЕКЮ БИФ РОЛЛ', '/uploads/images/food/barbekyu_bif_roll/1_1492505751.png', 'Говяжья котлета, свежие листья салата, расплавленный сыр, бекон и хрустящий лук под "дымным" соусом барбекю в пшеничной лепешке.\r\n', 1, 0, 0, 31),
(283, 'Картофель ДЕРЕВЕНСКИЙ', '/uploads/images/food/kartofel_derevenskiy/1_1492510369.png', 'Известный всем вкус деревенской картошки – в золотистых горячих ломтиках.\r\n', 1, 0, 0, 32),
(284, 'Картофель КИНГ ФРИ', '/uploads/images/food/kartofel_king_fri/1_1492510422.png', 'Горячие, посыпанные крупной солью кусочки картофеля Кинг Фри® у нас выходят золотистыми снаружи и пышными внутри.\r\n', 1, 0, 0, 32),
(285, 'ЛУКОВЫЕ КОЛЕЧКИ', '/uploads/images/food/lukovye_kolechki/1_1492510674.png', 'Золотистые луковые колечки попадают на стол горячими и хрустящими. Рекомендуем с любым из наших соусов.\r\n', 1, 0, 0, 32),
(286, 'КРЫЛЫШКИ КИНГ', '/uploads/images/food/krylyshki_king/1_1492510761.png', 'Крылышки по фирменному рецепту отлично подойдут как закуска к обеду или пиву.\r\n', 1, 0, 0, 33),
(287, 'КИНГ НАГГЕТС', '/uploads/images/food/king_naggets/1_1492510790.png', 'Наши наггетс сделаны из нежного белого куриного мяса и отличаются удобным размером. К ним предлагается на выбор шесть разных, но одинаково вкусных соусов: сырный, кетчуп, барбекю, кисло-сладкий, карри, майонез.\r\n', 1, 0, 0, 33),
(288, 'КИНГ БУКЕТ', '/uploads/images/food/king_buket/1_1492510849.png', 'Большая порция хрустящих крылышек, луковых колечек и золотистой Кинг Фри\r\n', 1, 0, 0, 33),
(289, 'КИНГ БУКЕТ (крылышки)', '/uploads/images/food/king_buket_krylyshki/1_1492510913.png', 'Большая порция хрустящих крылышек!\r\n', 1, 0, 0, 33),
(290, 'САЛАТ-МИКС', '/uploads/images/food/salat-miks/1_1492510994.png', 'Только свежие томаты, морковь, листья салата Айсберг и ничего лишнего.\r\n', 1, 0, 0, 34),
(291, 'САЛАТ ЦЕЗАРЬ', '/uploads/images/food/salat_cezar/1_1492511018.png', 'Кусочки куриного филе, сыр Пармезан и свежие овощи под нежным соусом Цезарь.\r\n', 1, 0, 0, 34),
(292, 'Минеральная вода', '/uploads/images/food/mineralnaya_voda/1_1492511172.png', 'Классический выбор к любому блюду.\r\n', 1, 0, 0, 35),
(293, 'Pepsi / Mirinda / 7UP', '/uploads/images/food/pepsi__mirinda__7up/1_1492511210.png', 'Настоящий вкус Pepsi – идеальный спутник к любому блюду. Шипучая кислинка 7UP освежает в любое время дня. Mirinda – это всегда оранжевое настроение!\r\n', 1, 0, 0, 35),
(294, 'Холодный чай', '/uploads/images/food/holodnyy_chay/1_1492511241.png', 'Lipton Ice Tea – освежающее удовольствие вне зависимости от сезона.\r\n', 1, 0, 0, 35),
(295, 'СОК', '/uploads/images/food/sok/1_1492511264.png', 'Сок «Я» апельсиновый или яблочный на выбор.\r\n', 1, 0, 0, 35),
(296, 'Adrenaline Rush', '/uploads/images/food/adrenaline_rush/1_1492511293.png', 'Для всех, кто живет полной жизнью и верит в бесконечность человеческих возможностей, силу духа и энергию сердца!\r\n', 1, 0, 0, 35),
(297, 'КОФЕ', '/uploads/images/food/kofe/1_1492511323.png', 'Натуральный свежесваренный кофе станет прекрасным дополнением и к плотному обеду, и к легкому десерту.\r\n', 1, 0, 0, 35),
(298, 'ЧАЙ', '/uploads/images/food/chay/1_1492511347.png', 'Зеленый или черный чай высшего качества на выбор.\r\n', 1, 0, 0, 35),
(299, 'МОЛОЧНЫЙ ШЕЙК', '/uploads/images/food/molochnyy_sheyk/1_1492511367.png', 'Шейк с шоколадом/ванилью/клубникой — настоящий глоток прохлады. Ведь этот густой напиток на основе сделан из сливочного мороженого, которое в идеальной пропорции смешано с шоколадным, ванильным или клубничным соусом.\r\n', 1, 0, 0, 35),
(300, 'Мороженое РОЖОК', '/uploads/images/food/morojenoe_rojok/1_1492511455.png', 'Ванильное мягкое мороженое. Мороженое в рожке придумали не мы. Но вам стоит попробовать наше прохладное, густое сливочное лакомство в классическом вафельном рожке, чтобы убедиться: мы довели его до совершенства.\r\n', 1, 0, 0, 36),
(301, 'Пирожок с вишней', '/uploads/images/food/pirojok_s_vishney/1_1492511478.png', 'Горячий хрустящий пирожок с начинкой из ароматной спелой вишни.\r\n', 1, 0, 0, 36),
(302, 'Горячий БРАУНИ', '/uploads/images/food/goryachiy_brauni/1_1492511497.png', 'Это мягкое пирожное с темным шоколадом внутри. Оно подается горячим и особенно вкусно, если добавить сверху мороженое.\r\n', 1, 0, 0, 36),
(303, 'МОРОЖЕНОЕ ТВИКС', '/uploads/images/food/morojenoe_tviks/1_1492511546.png', 'Печенье и карамель в классическом вкусе.\r\n', 1, 0, 0, 36),
(304, 'Orbit', '/uploads/images/food/orbit/1_1492511568.png', 'Ешь. Пей. Жуй Orbit.\r\n', 1, 0, 0, 36);
INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `bonus`, `rating`, `category_id`) VALUES
(305, 'СУШИ ЛОСОСЬ', '/uploads/images/food/sushi_losos/1_1492518415.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	3 г.\r\nУглеводы	15 г.\r\nКалории	110  ккал.\r\nВес: 30 грамм', 80, 0, 0, 37),
(306, 'СУШИ КОПЧЕНЫЙ УГОРЬ', '/uploads/images/food/sushi_kopchenyy_ugor/1_1492518542.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	7 г.\r\nЖиры	9 г.\r\nУглеводы	15 г.\r\nКалории	172  ккал.\r\nВес: 30 грамм', 105, 0, 0, 37),
(307, 'СУШИ МУКИ-ЭБИ', '/uploads/images/food/sushi_muki-ebi/1_1492518584.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	5 г.\r\nУглеводы	16 г.\r\nКалории	124  ккал.\r\nВес: 35 грамм', 90, 0, 0, 37),
(308, 'СУШИ ТУНЕЦ', '/uploads/images/food/sushi_tunec/1_1492518770.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	1 г.\r\nУглеводы	15 г.\r\nКалории	85  ккал.\r\nВес: 30 грамм', 95, 0, 0, 37),
(309, 'СУШИ ТИГРОВАЯ КРЕВЕТКА', '/uploads/images/food/sushi_tigrovaya_krevetka/1_1492518869.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	4 г.\r\nУглеводы	15 г.\r\nКалории	126  ккал.\r\nВес: 30 грамм', 105, 0, 0, 37),
(310, 'СУШИ ТОРИ УНАГИ', '/uploads/images/food/sushi_tori_unagi/1_1492518912.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	9 г.\r\nУглеводы	15 г.\r\nКалории	161  ккал.\r\nВес: 35 грамм', 90, 0, 0, 37),
(311, 'СУШИ ТОБИКО ОРАНЖ', '/uploads/images/food/sushi_tobiko_oranj/1_1492518973.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	1 г.\r\nУглеводы	16 г.\r\nКалории	83  ккал.\r\nВес: 30 грамм', 95, 0, 0, 37),
(312, 'СУШИ КОПЧЕНЫЙ ЛОСОСЬ', '/uploads/images/food/sushi_kopchenyy_losos/1_1492519033.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	3 г.\r\nУглеводы	15 г.\r\nКалории	109  ккал.\r\nВес: 30 грамм', 80, 0, 0, 37),
(313, 'СУШИ ЛОСОСЬ С АВОКАДО В СОУСЕ ТОМАГО-НО-МОТО', '/uploads/images/food/sushi_losos_s_avokado_v_souse_tomago-no-moto/1_1492519068.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	6 г.\r\nУглеводы	16 г.\r\nКалории	145  ккал.\r\nВес: 35 грамм\r\n\r\n', 70, 0, 0, 37),
(314, 'СУШИ ВОДОРОСЛИ ЧУКА', '/uploads/images/food/sushi_vodorosli_chuka/1_1492519105.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	2 г.\r\nЖиры	2 г.\r\nУглеводы	24 г.\r\nКалории	115  ккал.\r\nВес: 30 грамм', 40, 0, 0, 37),
(315, 'СУШИ КОПЧЕНОЕ КУРИНОЕ ФИЛЕ', '/uploads/images/food/sushi_kopchenoe_kurinoe_file/1_1492519155.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	9 г.\r\nУглеводы	15 г.\r\nКалории	152  ккал.\r\nВес: 35 грамм', 75, 0, 0, 37),
(316, 'СУШИ ИКРА ЛОСОСЯ', '/uploads/images/food/sushi_ikra_lososya/1_1492519204.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	3 г.\r\nУглеводы	15 г.\r\nКалории	108  ккал.\r\nВес: 30 грамм', 150, 0, 0, 37),
(317, 'СУШИ МОРСКОЙ ОКУНЬ', '/uploads/images/food/sushi_morskoy_okun/1_1492519229.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	1 г.\r\nУглеводы	15 г.\r\nКалории	87  ккал.\r\nВес: 30 грамм', 55, 0, 0, 37),
(318, 'СУШИ ЯПОНСКИЙ ОМЛЕТ', '/uploads/images/food/sushi_yaponskiy_omlet/1_1492519261.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	3 г.\r\nУглеводы	18 г.\r\nКалории	108  ккал.\r\nВес: 40 грамм', 40, 0, 0, 37),
(319, 'СУШИ ГРИБЫ НАМЕКО', '/uploads/images/food/sushi_griby_nameko/1_1492519303.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	2 г.\r\nЖиры	1 г.\r\nУглеводы	16 г.\r\nКалории	77  ккал.\r\nВес: 30 грамм', 60, 0, 0, 37),
(320, 'ФИЛАДЕЛЬФИЯ КЛАССИК', '/uploads/images/food/filadelfiya_klassik/1_1492519751.jpg', 'Пищевая ценность порции.:\r\nБелки	24 г.\r\nЖиры	25 г.\r\nУглеводы	68 г.\r\nКалории	589  ккал.\r\nВес: 210 грамм', 285, 0, 0, 38),
(321, 'АЛЯСКА', '/uploads/images/food/alyaska/1_1492521004.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	21 г.\r\nЖиры	14 г.\r\nУглеводы	69 г.\r\nКалории	490  ккал.\r\nВес: 170 грамм', 290, 0, 0, 38),
(322, 'ДРАКОН', '/uploads/images/food/drakon/1_1492521041.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	34 г.\r\nЖиры	36 г.\r\nУглеводы	80 г.\r\nКалории	780  ккал.\r\nВес: 205 грамм', 380, 0, 0, 38),
(323, 'КАНАДСКИЙ', '/uploads/images/food/kanadskiy/1_1492521115.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	29 г.\r\nЖиры	33 г.\r\nУглеводы	73 г.\r\nКалории	709  ккал.\r\nВес: 215 грамм', 380, 0, 0, 38),
(324, 'КАЛИФОРНИЯ REMIX', '/uploads/images/food/kaliforniya_remix/1_1492521147.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	22 г.\r\nЖиры	19 г.\r\nУглеводы	73 г.\r\nКалории	554  ккал.\r\nВес: 205 грамм', 360, 0, 0, 38),
(325, 'КАЛИФОРНИЯ ТОБИКО', '/uploads/images/food/kaliforniya_tobiko/1_1492521178.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	20 г.\r\nЖиры	20 г.\r\nУглеводы	73 г.\r\nКалории	552  ккал.\r\nВес: 190 грамм', 370, 0, 0, 38),
(326, 'УГОРЬ КЛАССИК', '/uploads/images/food/ugor_klassik/1_1492521292.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	22 г.\r\nЖиры	35 г.\r\nУглеводы	70 г.\r\nКалории	678  ккал.\r\nВес: 165 грамм', 395, 0, 0, 38),
(327, 'ХАКОНЕ', '/uploads/images/food/hakone/1_1492521331.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	25 г.\r\nЖиры	43 г.\r\nУглеводы	78 г.\r\nКалории	801  ккал.\r\nВес: 270 грамм', 350, 0, 0, 38),
(328, 'ФИЛАДЕЛЬФИЯ', '/uploads/images/food/filadelfiya/1_1492521385.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	23 г.\r\nЖиры	27 г.\r\nУглеводы	70 г.\r\nКалории	612  ккал.\r\nВес: 200 грамм', 410, 0, 0, 38),
(329, 'СЭНДАЙ', '/uploads/images/food/senday/1_1492521418.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	27 г.\r\nУглеводы	82 г.\r\nКалории	644  ккал.\r\nВес: 195 грамм', 270, 0, 0, 38),
(330, 'ЭДО', '/uploads/images/food/edo/1_1492521452.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	16 г.\r\nУглеводы	85 г.\r\nКалории	587  ккал.\r\nВес: 190 грамм', 310, 0, 0, 38),
(331, 'БАЛТИМОР', '/uploads/images/food/baltimor/1_1492521482.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	23 г.\r\nУглеводы	69 г.\r\nКалории	556  ккал.\r\nВес: 170 грамм', 230, 0, 0, 38),
(332, 'ТАЙЛАНДСКИЙ', '/uploads/images/food/taylandskiy/1_1492521514.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	28 г.\r\nЖиры	28 г.\r\nУглеводы	77 г.\r\nКалории	671  ккал.\r\nВес: 235 грамм', 500, 0, 0, 38),
(333, 'САМУРАЙ', '/uploads/images/food/samuray/1_1492521553.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	14 г.\r\nУглеводы	73 г.\r\nКалории	496  ккал.\r\nВес: 190 грамм', 330, 0, 0, 38),
(334, 'МИДОРИ', '/uploads/images/food/midori/1_1492521611.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	17 г.\r\nУглеводы	72 г.\r\nКалории	518  ккал.\r\nВес: 180 грамм', 210, 0, 0, 38),
(335, 'МАЦУРИ', '/uploads/images/food/macuri/1_1492521671.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	22 г.\r\nЖиры	22 г.\r\nУглеводы	75 г.\r\nКалории	587  ккал.\r\nВес: 190 грамм', 160, 0, 0, 38),
(336, 'ОМАКИ', '/uploads/images/food/omaki/1_1492521700.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	20 г.\r\nУглеводы	84 г.\r\nКалории	563  ккал.\r\nВес: 180 грамм', 180, 0, 0, 38),
(337, 'ИНЬ-ЯНЬ', '/uploads/images/food/in-yan/1_1492521741.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	13 г.\r\nУглеводы	67 г.\r\nКалории	454  ккал.\r\nВес: 155 грамм', 230, 0, 0, 38),
(338, 'ВАКАБА', '/uploads/images/food/vakaba/1_1492521765.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	20 г.\r\nУглеводы	78 г.\r\nКалории	566  ккал.\r\nВес: 205 грамм', 240, 0, 0, 38),
(339, 'КАЙША', '/uploads/images/food/kaysha/1_1492521791.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	30 г.\r\nЖиры	29 г.\r\nУглеводы	71 г.\r\nКалории	668  ккал.\r\nВес: 200 грамм', 460, 0, 0, 38),
(340, 'МАКИ ПЕСТО', '/uploads/images/food/maki_pesto/1_1492521829.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	15 г.\r\nЖиры	18 г.\r\nУглеводы	78 г.\r\nКалории	534  ккал.\r\nВес: 180 грамм', 260, 0, 0, 38),
(341, 'ТАЦУ', '/uploads/images/food/tacu/1_1492521863.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	15 г.\r\nУглеводы	72 г.\r\nКалории	489  ккал.\r\nВес: 185 грамм', 250, 0, 0, 38),
(342, 'САППОРО', '/uploads/images/food/sapporo/1_1492521901.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	12 г.\r\nУглеводы	78 г.\r\nКалории	476  ккал.\r\nВес: 205 грамм', 240, 0, 0, 38),
(343, 'МИСАВА', '/uploads/images/food/misava/1_1492521936.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	10 г.\r\nЖиры	13 г.\r\nУглеводы	82 г.\r\nКалории	479  ккал.\r\nВес: 210 грамм', 170, 0, 0, 38),
(344, 'ЮБИ', '/uploads/images/food/yubi/1_1492521968.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	10 г.\r\nЖиры	9 г.\r\nУглеводы	70 г.\r\nКалории	396  ккал.\r\nВес: 160 грамм', 150, 0, 0, 38),
(345, 'ЯСАЙ', '/uploads/images/food/yasay/1_1492522011.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	4 г.\r\nУглеводы	70 г.\r\nКалории	346  ккал.\r\nВес: 160 грамм', 140, 0, 0, 38),
(346, 'САВАРА ШИЦУ', '/uploads/images/food/savara_shicu/1_1492522044.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	20 г.\r\nЖиры	11 г.\r\nУглеводы	71 г.\r\nКалории	458  ккал.\r\nВес: 180 грамм', 250, 0, 0, 38),
(347, 'КИНОКО', '/uploads/images/food/kinoko/1_1492522070.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	12 г.\r\nУглеводы	76 г.\r\nКалории	166  ккал.\r\nВес: 180 грамм', 170, 0, 0, 38),
(348, 'ЗАПЕЧЕННЫЕ СУШИ ЛОСОСЬ', '/uploads/images/food/zapechennye_sushi_losos/1_1492522247.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	6 г.\r\nУглеводы	15 г.\r\nКалории	137  ккал.\r\nВес: 30 грамм', 75, 0, 0, 39),
(349, 'ЗАПЕЧЕННЫЕ СУШИ КОПЧЕНОЕ КУРИНОЕ ФИЛЕ', '/uploads/images/food/zapechennye_sushi_kopchenoe_kurinoe_file/1_1492522286.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	7 г.\r\nУглеводы	15 г.\r\nКалории	145  ккал.\r\nВес: 30 грамм', 65, 0, 0, 39),
(350, 'ЗАПЕЧЕННЫЕ СУШИ ТИГРОВАЯ КРЕВЕТКА', '/uploads/images/food/zapechennye_sushi_tigrovaya_krevetka/1_1492522312.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	7 г.\r\nЖиры	7 г.\r\nУглеводы	15 г.\r\nКалории	151  ккал.\r\nВес: 30 грамм', 95, 0, 0, 39),
(351, 'ЗАПЕЧЕННЫЕ СУШИ КОПЧЕНЫЙ УГОРЬ', '/uploads/images/food/zapechennye_sushi_kopchenyy_ugor/1_1492522332.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	9 г.\r\nУглеводы	15 г.\r\nКалории	162  ккал.\r\nВес: 30 грамм', 95, 0, 0, 39),
(352, 'ОСТРЫЕ СУШИ КОПЧЕНЫЙ УГОРЬ', '/uploads/images/food/ostrye_sushi_kopchenyy_ugor/1_1492522435.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	11 г.\r\nУглеводы	15 г.\r\nКалории	184  ккал.\r\nВес: 30 грамм', 95, 0, 0, 40),
(353, 'ОСТРЫЕ СУШИ ЛОСОСЬ', '/uploads/images/food/ostrye_sushi_losos/1_1492522500.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	7 г.\r\nУглеводы	15 г.\r\nКалории	140  ккал.\r\nВес: 30 грамм', 70, 0, 0, 40),
(354, 'ОСТРЫЕ СУШИ ТИГРОВАЯ КРЕВЕТКА', '/uploads/images/food/ostrye_sushi_tigrovaya_krevetka/1_1492522588.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	7 г.\r\nУглеводы	15 г.\r\nКалории	145  ккал.\r\nВес: 30 грамм', 95, 0, 0, 40),
(355, 'ОСТРЫЕ СУШИ ТУНЕЦ', '/uploads/images/food/ostrye_sushi_tunec/1_1492523027.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	5 г.\r\nУглеводы	15 г.\r\nКалории	120  ккал.\r\nВес: 30 грамм', 95, 0, 0, 40),
(356, 'ОСТРЫЕ СУШИ КОПЧЕНЫЙ ЛОСОСЬ', '/uploads/images/food/ostrye_sushi_kopchenyy_losos/1_1492523060.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	7 г.\r\nУглеводы	16 г.\r\nКалории	139  ккал.\r\nВес: 30 грамм', 70, 0, 0, 40),
(357, 'ОСТРЫЕ СУШИ МОРСКОЙ ОКУНЬ', '/uploads/images/food/ostrye_sushi_morskoy_okun/1_1492523101.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	5 г.\r\nУглеводы	15 г.\r\nКалории	122  ккал.\r\nВес: 30 грамм', 60, 0, 0, 40),
(358, 'ЗАПЕЧЕННЫЙ РОЛЛ АКАДЗИ', '/uploads/images/food/zapechennyy_roll_akadzi/1_1492523518.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	36 г.\r\nЖиры	23 г.\r\nУглеводы	76 г.\r\nКалории	659  ккал.\r\nВес: 230 грамм', 310, 0, 0, 41),
(359, 'ЗАПЕЧЕННЫЙ РОЛЛ НАГАНО', '/uploads/images/food/zapechennyy_roll_nagano/1_1492523546.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	28 г.\r\nЖиры	45 г.\r\nУглеводы	69 г.\r\nКалории	787  ккал.\r\nВес: 190 грамм', 300, 0, 0, 41),
(360, 'ЗАПЕЧЕННЫЙ РОЛЛ ОСЕНЬ', '/uploads/images/food/zapechennyy_roll_osen/1_1492523571.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	41 г.\r\nУглеводы	71 г.\r\nКалории	747  ккал.\r\nВес: 225 грамм', 310, 0, 0, 41),
(361, 'ЗАПЕЧЕННЫЙ РОЛЛ ХАТАНО', '/uploads/images/food/zapechennyy_roll_hatano/1_1492523597.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	23 г.\r\nУглеводы	70 г.\r\nКалории	560  ккал.\r\nВес: 190 грамм', 240, 0, 0, 41),
(362, 'ЗАПЕЧЕННЫЙ РОЛЛ НАСУ', '/uploads/images/food/zapechennyy_roll_nasu/1_1492523630.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	21 г.\r\nЖиры	27 г.\r\nУглеводы	84 г.\r\nКалории	662  ккал.\r\nВес: 210 грамм', 230, 0, 0, 41),
(363, 'ЗАПЕЧЕННЫЙ РОЛЛ ХОККАЙДО', '/uploads/images/food/zapechennyy_roll_hokkaydo/1_1492523662.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	25 г.\r\nУглеводы	74 г.\r\nКалории	597  ккал.\r\nВес: 190 грамм', 200, 0, 0, 41),
(364, 'ГОРЯЧИЙ РОЛЛ АМЕРИКА', '/uploads/images/food/goryachiy_roll_amerika/1_1492523790.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	27 г.\r\nЖиры	27 г.\r\nУглеводы	93 г.\r\nКалории	721  ккал.\r\nВес: 220 грамм', 360, 0, 0, 42),
(365, 'ГОРЯЧИЙ РОЛЛ ЕВРОПА', '/uploads/images/food/goryachiy_roll_evropa/1_1492523811.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	23 г.\r\nЖиры	17 г.\r\nУглеводы	95 г.\r\nКалории	628  ккал.\r\nВес: 225 грамм', 210, 0, 0, 42),
(366, 'ГОРЯЧИЙ РОЛЛ САНСИ', '/uploads/images/food/goryachiy_roll_sansi/1_1492523857.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	20 г.\r\nУглеводы	88 г.\r\nКалории	623  ккал.\r\nВес: 210 грамм', 340, 0, 0, 42),
(367, 'ГОРЯЧИЙ РОЛЛ СПАЙС С ОКУНЕМ', '/uploads/images/food/goryachiy_roll_spays_s_okunem/1_1492523882.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	18 г.\r\nУглеводы	100 г.\r\nКалории	637  ккал.\r\nВес: 220 грамм', 240, 0, 0, 42),
(368, 'ГОРЯЧИЙ РОЛЛ КАНЗАС СИТИ', '/uploads/images/food/goryachiy_roll_kanzas_siti/1_1492523913.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	20 г.\r\nЖиры	21 г.\r\nУглеводы	92 г.\r\nКалории	635  ккал.\r\nВес: 220 грамм', 250, 0, 0, 42),
(369, 'ГОРЯЧИЙ РОЛЛ АЗИЯ', '/uploads/images/food/goryachiy_roll_aziya/1_1492523961.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	16 г.\r\nЖиры	12 г.\r\nУглеводы	99 г.\r\nКалории	565  ккал.\r\nВес: 220 грамм', 220, 0, 0, 42),
(370, 'КЛАССИЧЕСКИЙ РОЛЛ КОПЧЁНЫЙ УГОРЬ', '/uploads/images/food/klassicheskiy_roll_kopchenyy_ugor/1_1492524086.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	14 г.\r\nУглеводы	53 г.\r\nКалории	384  ккал.\r\nВес: 110 грамм', 170, 0, 0, 43),
(371, 'КЛАССИЧЕСКИЙ РОЛЛ С ЛОСОСЕМ', '/uploads/images/food/klassicheskiy_roll_s_lososem/1_1492524118.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	8 г.\r\nУглеводы	50 г.\r\nКалории	316  ккал.\r\nВес: 110 грамм', 150, 0, 0, 43),
(372, 'КЛАССИЧЕСКИЙ РОЛЛ ТИГРОВАЯ КРЕВЕТКА', '/uploads/images/food/klassicheskiy_roll_tigrovaya_krevetka/1_1492524156.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	16 г.\r\nЖиры	11 г.\r\nУглеводы	50 г.\r\nКалории	368  ккал.\r\nВес: 110 грамм', 190, 0, 0, 43),
(373, 'КЛАССИЧЕСКИЙ РОЛЛ КОПЧЕНЫЙ ЛОСОСЬ', '/uploads/images/food/klassicheskiy_roll_kopchenyy_losos/1_1492524206.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	13 г.\r\nЖиры	8 г.\r\nУглеводы	51 г.\r\nКалории	329  ккал.\r\nВес: 100 грамм', 150, 0, 0, 43),
(374, 'КЛАССИЧЕСКИЙ РОЛЛ ТУНЕЦ', '/uploads/images/food/klassicheskiy_roll_tunec/1_1492524232.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	11 г.\r\nЖиры	2 г.\r\nУглеводы	50 г.\r\nКалории	261  ккал.\r\nВес: 98 грамм', 170, 0, 0, 43),
(375, 'КЛАССИЧЕСКИЙ РОЛЛ ОГУРЕЦ', '/uploads/images/food/klassicheskiy_roll_ogurec/1_1492524262.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	3 г.\r\nУглеводы	51 г.\r\nКалории	249  ккал.\r\nВес: 95 грамм', 75, 0, 0, 43),
(376, 'КЛАССИЧЕСКИЙ РОЛЛ АВОКАДО', '/uploads/images/food/klassicheskiy_roll_avokado/1_1492524289.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	2 г.\r\nУглеводы	52 г.\r\nКалории	251  ккал.\r\nВес: 90 грамм', 80, 0, 0, 43),
(377, 'КЛАССИЧЕСКИЙ РОЛЛ МОРСКОЙ ОКУНЬ', '/uploads/images/food/klassicheskiy_roll_morskoy_okun/1_1492524312.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	9 г.\r\nЖиры	3 г.\r\nУглеводы	50 г.\r\nКалории	263  ккал.\r\nВес: 95 грамм', 130, 0, 0, 43),
(378, 'КЛАССИЧЕСКИЙ РОЛЛ ЯПОНСКИЙ ОМЛЕТ', '/uploads/images/food/klassicheskiy_roll_yaponskiy_omlet/1_1492524340.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	7 г.\r\nЖиры	4 г.\r\nУглеводы	52 г.\r\nКалории	266  ккал.\r\nВес: 100 грамм', 70, 0, 0, 43),
(379, 'ОСТРЫЙ РОЛЛ ПИКАНТНЫЙ', '/uploads/images/food/ostryy_roll_pikantnyy/1_1492524471.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	29 г.\r\nУглеводы	72 г.\r\nКалории	627  ккал.\r\nВес: 170 грамм', 260, 0, 0, 44),
(380, 'ОСТРЫЙ РОЛЛ ГУРМАН', '/uploads/images/food/ostryy_roll_gurman/1_1492524501.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	19 г.\r\nУглеводы	70 г.\r\nКалории	531  ккал.\r\nВес: 200 грамм', 220, 0, 0, 44),
(381, 'ОСТРЫЙ РОЛЛ ЦУНАМИ', '/uploads/images/food/ostryy_roll_cunami/1_1492524545.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	21 г.\r\nУглеводы	68 г.\r\nКалории	560  ккал.\r\nВес: 200 грамм', 360, 0, 0, 44),
(382, 'ОСТРЫЙ РОЛЛ МЕКСИКА', '/uploads/images/food/ostryy_roll_meksika/1_1492524576.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	23 г.\r\nЖиры	26 г.\r\nУглеводы	69 г.\r\nКалории	604  ккал.\r\nВес: 170 грамм', 280, 0, 0, 44),
(383, 'ОСТРЫЙ РОЛЛ МАКИ-КАРИ', '/uploads/images/food/ostryy_roll_maki-kari/1_1492524603.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	15 г.\r\nЖиры	20 г.\r\nУглеводы	81 г.\r\nКалории	561  ккал.\r\nВес: 170 грамм', 175, 0, 0, 44),
(384, 'АССОРТИ ТОМИКО', '/uploads/images/food/assorti_tomiko/1_1492524697.jpg', 'Ассорти из роллов – Вакаба, Мисава, Омаки, Мексика, Гурман, Аляска\r\nПищевая ценность порции.:\r\nБелки	113 г.\r\nЖиры	118 г.\r\nУглеводы	452 г.\r\nКалории	3321  ккал.\r\nВес: 1180 грамм', 1300, 0, 0, 45),
(385, 'АССОРТИ МАКОТО', '/uploads/images/food/assorti_makoto/1_1492524729.jpg', 'суши: тунец, морской окунь, копченый лосось,тигровая креветка, ролл Кагамии классические острые роллы из Копченого угря и лосося\r\nПищевая ценность порции.:\r\nБелки	94 г.\r\nЖиры	74 г.\r\nУглеводы	399 г.\r\nКалории	2632  ккал.\r\nВес: 780 грамм', 1050, 0, 0, 45),
(386, 'АССОРТИ ТАСКЭ', '/uploads/images/food/assorti_taske/1_1492524940.jpg', 'Ассорти из роллов без сырой рыбы:Мацури, Мидори, Осака, Киноко, Сэндай\r\nПищевая ценность порции.:\r\nБелки	94 г.\r\nЖиры	103 г.\r\nУглеводы	382 г.\r\nКалории	2832  ккал.\r\nВес: 950 грамм', 870, 0, 0, 45),
(387, 'АССОРТИ ОБУ', '/uploads/images/food/assorti_obu/1_1492524966.jpg', 'Ассорти из роллов и спайс суши: ролл с огурцом,с имбирем и оливками, с японским омлетом, острые роллы:Пикантный и Хатимаки, острые суши с тунцом, окунем и угрем\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	74 г.\r\nЖиры	92 г.\r\nУглеводы	345 г.\r\nКалории	2499  ккал.\r\nВес: 780 грамм', 850, 0, 0, 45),
(388, 'КРАСНЫЙ СУП С МОРЕПРОДУКТАМИ', '/uploads/images/food/krasnyy_sup_s_moreproduktami/1_1492525358.jpg', 'кусочки лосося, грибы намеко, лапша удон, кунжутное масло и острый соус Кимчи\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	21 г.\r\nУглеводы	11 г.\r\nКалории	340  ккал.\r\nВес: 340 грамм', 270, 0, 0, 46),
(389, 'ИГАЙ', '/uploads/images/food/igay/1_1492525435.jpg', 'сливочный суп с мидиями, болгарским перцем, цуккини, морковью, зеленым луком и сухариками\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	18 г.\r\nУглеводы	24 г.\r\nКалории	332  ккал.\r\nВес: 250 грамм', 160, 0, 0, 46),
(390, 'СЯКЕ ДЗАСУЙ', '/uploads/images/food/syake_dzasuy/1_1492525462.jpg', 'острый суп из бульона суимоно с лососем, коктейльными креветками, рисом, грибами шитаке, сыром Тофу, водорослями Вакаме и зеленым луком\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	7 г.\r\nУглеводы	20 г.\r\nКалории	215  ккал.\r\nВес: 300 грамм', 230, 0, 0, 46),
(391, 'НИКУ ДЗИРУ', '/uploads/images/food/niku_dziru/1_1492525495.jpg', 'острый суп из бульона суимоно с говяжьей вырезкой, лапшой Удон, шампиньонами, водорослями Вакаме, сыром Тофу, зеленым луком и луком порей\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	15 г.\r\nЖиры	10 г.\r\nУглеводы	9 г.\r\nКалории	186  ккал.\r\nВес: 300 грамм', 240, 0, 0, 46),
(392, 'НАБЭ ЯКИ', '/uploads/images/food/nabe_yaki/1_1492525521.jpg', 'бульон суимоно с копченым угрем, лапшой удон, шампиньонами, сыром Тофу, водорослями Вакаме, зеленым луком и луком порей\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	20 г.\r\nУглеводы	9 г.\r\nКалории	288  ккал.\r\nВес: 290 грамм', 260, 0, 0, 46),
(393, 'МИСО С ВОДОРОСЛЯМИ', '/uploads/images/food/miso_s_vodoroslyami/1_1492525548.jpg', 'бульон мисо, грибы намеко, лук порей, сыр Тофу, водоросли Вакаме, зеленый лук\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	2 г.\r\nУглеводы	7 г.\r\nКалории	59  ккал.\r\nВес: 260 грамм', 120, 0, 0, 46),
(394, 'МИСО С КУРИНЫМ ФИЛЕ', '/uploads/images/food/miso_s_kurinym_file/1_1492525623.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	8 г.\r\nУглеводы	13 г.\r\nКалории	179  ккал.\r\nВес: 300 грамм', 140, 0, 0, 46),
(395, 'МИСО С ЛОСОСЕМ', '/uploads/images/food/miso_s_lososem/1_1492525993.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	8 г.\r\nУглеводы	7 г.\r\nКалории	145  ккал.\r\nВес: 280 грамм', 170, 0, 0, 46),
(396, 'ГРИБНОЙ КРЕМ-СУП', '/uploads/images/food/gribnoy_krem-sup/1_1492526021.jpg', 'шампиньоны, сливки и японские сухарики\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	32 г.\r\nУглеводы	23 г.\r\nКалории	473  ккал.\r\nВес: 260 грамм', 170, 0, 0, 46),
(397, 'САЛАТ ЧУКА', '/uploads/images/food/salat_chuka/1_1492539741.jpg', 'водоросли Чука, сыр Тофу, соус Гомодари и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	14 г.\r\nУглеводы	72 г.\r\nКалории	430  ккал.\r\nВес: 130 грамм', 210, 0, 0, 47),
(398, 'КАЛИФОРНИЙСКИЙ САЛАТ', '/uploads/images/food/kaliforniyskiy_salat/1_1492539816.jpg', 'креветки, рис, авокадо,тобико оранж, огурец,зеленый лук и Томаго-но-Мото\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	29 г.\r\nУглеводы	50 г.\r\nКалории	518  ккал.\r\nВес: 180 грамм', 240, 0, 0, 47),
(399, 'ХАРАСУМЕ', '/uploads/images/food/harasume/1_1492539879.jpg', 'из теплой стеклянной лапши, болгарского перца, репчатого лука, моркови в кунжутно-соевой заправке и кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	1 г.\r\nУглеводы	56 г.\r\nКалории	242  ккал.\r\nВес: 210 грамм', 140, 0, 0, 47),
(400, 'КЕНИКУ-ТОМАТО', '/uploads/images/food/keniku-tomato/1_1492540037.jpg', 'обжаренное куриное филе с томатом, огурцом, луком порей в соусе Томаго-но-Мото и кунжуте\r\nПищевая ценность порции.:\r\nБелки	22 г.\r\nЖиры	44 г.\r\nУглеводы	34 г.\r\nКалории	624  ккал.\r\nВес: 270 грамм', 280, 0, 0, 47),
(401, 'САЛАТ С КРАСНОЙ РЫБОЙ', '/uploads/images/food/salat_s_krasnoy_ryboy/1_1492540248.jpg', 'Красная рыба, лист салата,огурец и томат в коньячнойзаправке с Томаго-но-Мото\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	16 г.\r\nЖиры	19 г.\r\nУглеводы	8 г.\r\nКалории	267  ккал.\r\nВес: 170 грамм', 250, 0, 0, 47),
(402, 'ГРЕЧЕСКИЙ САЛАТ', '/uploads/images/food/grecheskiy_salat/1_1492540280.jpg', 'микс листьев салата, огурец, помидор, болгарский перец, красный лук, сыр "Feta", маслины, оливки в лимонно-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	10 г.\r\nУглеводы	20 г.\r\nКалории	198  ккал.\r\nВес: 220 грамм', 240, 0, 0, 47),
(403, 'КАРА АГЭ', '/uploads/images/food/kara_age/1_1492540517.jpg', 'куриное филе замаринованное в медово-соевом соусе обжаренное во фритюре подается с картофелем пай\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	45 г.\r\nЖиры	49 г.\r\nУглеводы	127 г.\r\nКалории	1125  ккал.\r\nВес: 210 грамм', 240, 0, 0, 48),
(404, 'ШНИЦЕЛЬ ИЗ КУРИНОГО ФИЛЕ', '/uploads/images/food/shnicel_iz_kurinogo_file/1_1492540590.jpg', 'Шницель из куриного филе в японской панировке с лапшой из огурцов и моркови с соусом тартар\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	52 г.\r\nЖиры	37 г.\r\nУглеводы	86 г.\r\nКалории	885  ккал.\r\nВес: 280 грамм', 260, 0, 0, 48),
(405, 'ОКУНЬ С ОВОЩАМИ ГРИЛЬ', '/uploads/images/food/okun_s_ovoshchami_gril/1_1492540657.jpg', 'Жареное филе окуня с овощами гриль и соусом Унаги\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	35 г.\r\nЖиры	10 г.\r\nУглеводы	41 г.\r\nКалории	388  ккал.\r\nВес: 260 грамм', 340, 0, 0, 48),
(406, 'СВИНИНА ХОЙСИН', '/uploads/images/food/svinina_hoysin/1_1492540700.jpg', 'Жареные кусочки свинины с соусом Хойсин, стручковой фасолью и картофелем мини\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	23 г.\r\nЖиры	56 г.\r\nУглеводы	20 г.\r\nКалории	680  ккал.\r\nВес: 200 грамм', 265, 0, 0, 48),
(407, 'ОВОЩИ ГРИЛЬ', '/uploads/images/food/ovoshchi_gril/1_1492540725.jpg', 'кабачок, баклажан,шампиньон, болгарский перец, томат\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	1 г.\r\nУглеводы	43 г.\r\nКалории	196  ккал.\r\nВес: 250 грамм', 190, 0, 0, 48),
(408, 'РИС C МИДИЯМИ', '/uploads/images/food/ris_c_midiyami/1_1492541127.jpg', 'мидии в сливочном соусе на подушке из риса с зеленым луком и черным кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	25 г.\r\nЖиры	58 г.\r\nУглеводы	141 г.\r\nКалории	1192  ккал.\r\nВес: 390 грамм', 280, 0, 0, 49),
(409, 'РИС С КУРИНЫМ ФИЛЕ', '/uploads/images/food/ris_s_kurinym_file/1_1492541171.jpg', 'болгарским перцем, морковью, цуккини, соевым соусом и кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	32 г.\r\nЖиры	14 г.\r\nУглеводы	149 г.\r\nКалории	846  ккал.\r\nВес: 320 грамм', 190, 0, 0, 49),
(410, 'УНАГИ ДОМБУРИ', '/uploads/images/food/unagi_domburi/1_1492541206.jpg', 'копченый угорь на подушке из риса с соусом Унаги и кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	29 г.\r\nЖиры	30 г.\r\nУглеводы	147 г.\r\nКалории	969  ккал.\r\nВес: 300 грамм', 380, 0, 0, 49),
(411, 'РИС С ОВОЩАМИ', '/uploads/images/food/ris_s_ovoshchami/1_1492541360.jpg', 'болгарский перец, морковь, цуккини,соевый соус и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	1 г.\r\nУглеводы	145 г.\r\nКалории	634  ккал.\r\nВес: 260 грамм', 135, 0, 0, 49),
(412, 'РИС С КРЕВЕТКАМИ', '/uploads/images/food/ris_s_krevetkami/1_1492541389.jpg', 'Коктейльные креветки в сливочном соусе с имбирем, овощами и пряным рисом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	32 г.\r\nЖиры	38 г.\r\nУглеводы	140 г.\r\nКалории	1032  ккал.\r\nВес: 370 грамм', 330, 0, 0, 49),
(413, 'РИС С КУСОЧКАМИ ГОВЯДИНЫ', '/uploads/images/food/ris_s_kusochkami_govyadiny/1_1492541415.jpg', 'Вырезка говяжья в сливочном соусе, томатами, грибами и пряным рисом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	27 г.\r\nЖиры	46 г.\r\nУглеводы	144 г.\r\nКалории	1099  ккал.\r\nВес: 375 грамм', 350, 0, 0, 49),
(414, 'РИС С МОРЕПРОДУКТАМИ', '/uploads/images/food/ris_s_moreproduktami/1_1492541464.jpg', 'кусочками лосося, болгарским перцем, морковью, цуккини, соевым соусом и кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	37 г.\r\nЖиры	10 г.\r\nУглеводы	145 г.\r\nКалории	821  ккал.\r\nВес: 325 грамм', 280, 0, 0, 49),
(415, 'ГОХАН', '/uploads/images/food/gohan/1_1492541516.jpg', 'рис с соевым соусом и кунжутом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	7 г.\r\nЖиры	1 г.\r\nУглеводы	90 г.\r\nКалории	398  ккал.\r\nВес: 150 грамм', 60, 0, 0, 49),
(416, 'КУРИНОЕ ФИЛЕ В СОУСЕ "ТЕРИЯКИ"', '/uploads/images/food/kurinoe_file_v_souse_teriyaki/1_1492542047.jpg', 'куриное филе, болгарский перец, баклажан, цуккини, грибы шитаке, морковь и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	34 г.\r\nЖиры	17 г.\r\nУглеводы	43 г.\r\nКалории	463  ккал.\r\nВес: 360 грамм', 300, 0, 0, 50),
(417, 'ОВОЩИ В СОУСЕ "ТЕРИЯКИ"', '/uploads/images/food/ovoshchi_v_souse_teriyaki/1_1492542511.jpg', 'болгарский перец, баклажан, цуккини, грибы шитаке, морковь и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	10 г.\r\nЖиры	2 г.\r\nУглеводы	49 г.\r\nКалории	250  ккал.\r\nВес: 340 грамм', 250, 0, 0, 50),
(418, 'ТЕМПУРА ИЗ РЫБЫ И КРЕВЕТОК', '/uploads/images/food/tempura_iz_ryby_i_krevetok/1_1492542547.jpg', 'Рыба, тигровые креветки, лук порей,кабачок, морковь, и соус темпура\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	10 г.\r\nУглеводы	54 г.\r\nКалории	404  ккал.\r\nВес: 160 грамм', 240, 0, 0, 50),
(419, 'СВИНИНА В СОУСЕ "ТЕРИЯКИ"', '/uploads/images/food/svinina_v_souse_teriyaki/1_1492542591.jpg', 'свинина, болгарский перец, баклажан, цуккини, грибы шитаке, морковь и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	27 г.\r\nЖиры	46 г.\r\nУглеводы	43 г.\r\nКалории	691  ккал.\r\nВес: 390 грамм', 330, 0, 0, 50),
(420, 'КРАСНАЯ РЫБА В СОУСЕ «ТЕРИЯКИ»', '/uploads/images/food/krasnaya_ryba_v_souse_teriyaki/1_1492542618.jpg', 'Красная рыба, болгарский перец, баклажан, цуккини,грибы шиитаке, морковь\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	29 г.\r\nЖиры	17 г.\r\nУглеводы	63 г.\r\nКалории	520  ккал.\r\nВес: 340 грамм', 400, 0, 0, 50),
(421, 'ЯСАЙ ТЕМПУРА', '/uploads/images/food/yasay_tempura/1_1492542644.jpg', 'болгарский перец, кабачок, морковь, баклажан, лук порей с соусом темпура\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	0 г.\r\nУглеводы	49 г.\r\nКалории	219  ккал.\r\nВес: 134 грамм', 170, 0, 0, 50),
(422, 'ТИГРОВАЯ КРЕВЕТКА', '/uploads/images/food/tigrovaya_krevetka/1_1492542949.jpg', 'с чесночным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	9 г.\r\nУглеводы	7 г.\r\nКалории	175  ккал.\r\nВес: 55 грамм', 230, 0, 0, 51),
(423, 'КУРИНЫЕ СЕРДЕЧКИ С СОУСОМ ЯКИТОРИ', '/uploads/images/food/kurinye_serdechki_s_sousom_yakitori/1_1492542987.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	16 г.\r\nУглеводы	28 г.\r\nКалории	359  ккал.\r\nВес: 50 грамм', 110, 0, 0, 51),
(424, 'КУРИНОЕ ФИЛЕ С СОУСОМ ЯКИТОРИ', '/uploads/images/food/kurinoe_file_s_sousom_yakitori/1_1492543014.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	10 г.\r\nУглеводы	27 г.\r\nКалории	262  ккал.\r\nВес: 50 грамм', 95, 0, 0, 51),
(425, 'ОСЬМИНОГ С ЧЕСНОЧНЫМ СОУСОМ', '/uploads/images/food/osminog_s_chesnochnym_sousom/1_1492543051.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	25 г.\r\nЖиры	2 г.\r\nУглеводы	22 г.\r\nКалории	201  ккал.\r\nВес: 40 грамм', 150, 0, 0, 51),
(426, 'ЛОСОСЬ С СОУСОМ ЯКИТОРИ', '/uploads/images/food/losos_s_sousom_yakitori/1_1492543075.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	22 г.\r\nЖиры	15 г.\r\nУглеводы	27 г.\r\nКалории	330  ккал.\r\nВес: 70 грамм', 220, 0, 0, 51),
(427, 'КУРИНАЯ ПЕЧЕНЬ С СОУСОМ ЯКИТОРИ', '/uploads/images/food/kurinaya_pechen_s_sousom_yakitori/1_1492543105.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	23 г.\r\nЖиры	12 г.\r\nУглеводы	27 г.\r\nКалории	304  ккал.\r\nВес: 60 грамм', 80, 0, 0, 51),
(428, 'ИЗУМИ', '/uploads/images/food/izumi/1_1492543220.jpg', 'сладкий ролл со сливочным сыром, изюмом, грецким орехом в японском блинчике с шоколадной крошкой и клубничным соусом со сливками, 195 г.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	17 г.\r\nЖиры	50 г.\r\nУглеводы	37 г.\r\nКалории	667  ккал.\r\nВес: 165 грамм', 290, 0, 0, 52),
(429, 'РОЛЛ С СЫРОМ МАСКАРПОНЕ', '/uploads/images/food/roll_s_syrom_maskarpone/1_1492543264.jpg', ' Шоколадный блинчик, ананас, киви и банан\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	9 г.\r\nЖиры	23 г.\r\nУглеводы	54 г.\r\nКалории	458  ккал.\r\nВес: 160 грамм', 180, 0, 0, 52),
(430, 'РОЛЛ ИЗ МОЛОЧНОГО И БЕЛОГО ШОКОЛАДА С МАРАКУЙЕЙ', '/uploads/images/food/roll_iz_molochnogo_i_belogo_shokolada_s_marakuyey/1_1492543285.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	18 г.\r\nУглеводы	23 г.\r\nКалории	271  ккал.\r\nВес: 75 грамм', 130, 0, 0, 52),
(431, 'РОЛЛ ИЗ МОЛОЧНОГО ШОКОЛАДА С ПРАЛИНЕ ИЗ ФУНДУКА', '/uploads/images/food/roll_iz_molochnogo_shokolada_s_praline_iz_funduka/1_1492543320.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	26 г.\r\nУглеводы	28 г.\r\nКалории	369  ккал.\r\nВес: 75 грамм', 130, 0, 0, 52),
(432, 'ТОФУ-ПАЙ', '/uploads/images/food/tofu-pay/1_1492543355.jpg', 'пирожки из слоенного теста с творогом и изюмом. Подаются со сливочным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	8 г.\r\nУглеводы	8 г.\r\nКалории	120  ккал.\r\nВес: 110 грамм', 110, 0, 0, 52),
(433, 'БЭРИ-ПАЙ', '/uploads/images/food/beri-pay/1_1492543378.jpg', 'пирожки из слоенного теста с черной смородиной. Подаются с клубничным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	2 г.\r\nУглеводы	11 г.\r\nКалории	77  ккал.\r\nВес: 105 грамм', 110, 0, 0, 52),
(434, 'ТРУБОЧКИ С ФИНИКОВОЙ ПАСТОЙ', '/uploads/images/food/trubochki_s_finikovoy_pastoy/1_1492543421.jpg', 'с грецким орехом,апельсинами и ягодным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	7 г.\r\nЖиры	13 г.\r\nУглеводы	28 г.\r\nКалории	261  ккал.\r\nВес: 100/30 грамм', 175, 0, 0, 52),
(435, 'ТЕМПУРА ИЗ БАНАНОВ С МЕДОМ', '/uploads/images/food/tempura_iz_bananov_s_medom/1_1492543445.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	2 г.\r\nУглеводы	130 г.\r\nКалории	567  ккал.\r\nВес: 200 грамм', 150, 0, 0, 52),
(436, 'ТЕМПУРА ИЗ ЯБЛОК С МЕДОМ', '/uploads/images/food/tempura_iz_yablok_s_medom/1_1492543473.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	1 г.\r\nУглеводы	112 г.\r\nКалории	482  ккал.\r\nВес: 200 грамм', 150, 0, 0, 52),
(437, 'ТЕМПУРА ИЗ АНАНАСОВ С МЕДОМ', '/uploads/images/food/tempura_iz_ananasov_s_medom/1_1492543624.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	1 г.\r\nУглеводы	117 г.\r\nКалории	491  ккал.\r\nВес: 200 грамм', 240, 0, 0, 52),
(438, 'ТЕМПУРА ИЗ ФРУКТОВ', '/uploads/images/food/tempura_iz_fruktov/1_1492543659.jpg', 'банан, яблоко и ананас с медом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	1 г.\r\nУглеводы	137 г.\r\nКалории	589  ккал.\r\nВес: 200 грамм', 260, 0, 0, 52),
(439, 'ПИЦЦА РУСТИКА', '/uploads/images/food/picca_rustika/1_1492584535.jpg', 'Картофель, бекон, корнишоны, красный лук, чеснок, сыр Mozzarella,орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	67 г.\r\nЖиры	39 г.\r\nУглеводы	158 г.\r\nКалории	1256  ккал.\r\nВес: 590 грамм', 370, 0, 0, 53),
(440, 'ФОКАЧЧА ПОСТНАЯ', '/uploads/images/food/fokachcha_postnaya/1_1492584580.jpg', 'Итальянская лепешка из тонкого теста, Mozzarella, с чесночным маслом и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	11 г.\r\nУглеводы	117 г.\r\nКалории	672  ккал.\r\nВес: 190 грамм', 110, 0, 0, 53),
(441, 'ВЕГЕТАРИАНСКАЯ ПИЦЦА', '/uploads/images/food/vegetarianskaya_picca/1_1492584617.jpg', 'Томаты, кабачок, маслины, баклажаны,болгарский перец, оливки, томатный соус, шампиньоны, орегано и сыр Mozzarella\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	59 г.\r\nЖиры	40 г.\r\nУглеводы	135 г.\r\nКалории	1134  ккал.\r\nВес: 540 грамм', 380, 0, 0, 53),
(442, 'ПИЦЦА КАПРИЧОЗА', '/uploads/images/food/picca_kaprichoza/1_1492584678.jpg', 'Ветчина, артишоки, маслины, оливки, шампиньоны, сыр Mozzarella,орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	72 г.\r\nЖиры	43 г.\r\nУглеводы	118 г.\r\nКалории	1150  ккал.\r\nВес: 460 грамм', 390, 0, 0, 53),
(443, 'ПИЦЦА С КУРИНЫМ ФИЛЕ', '/uploads/images/food/picca_s_kurinym_file/1_1492584710.jpg', 'Шампиньоны, томаты, болгарский перец, сыр Mozzarella, орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	78 г.\r\nЖиры	35 г.\r\nУглеводы	125 г.\r\nКалории	1129  ккал.\r\nВес: 545 грамм', 390, 0, 0, 53),
(444, 'ПИЦЦА КАРБОНАРА', '/uploads/images/food/picca_karbonara/1_1492584743.jpg', 'Бекон, яйцо, сыры Пармезан и Mozzarella, орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	71 г.\r\nЖиры	47 г.\r\nУглеводы	116 г.\r\nКалории	1169  ккал.\r\nВес: 465 грамм', 400, 0, 0, 53),
(445, 'ПИЦЦА ДИАБЛО', '/uploads/images/food/picca_diablo/1_1492584807.jpg', 'Острая пицца с салями Peperoni, сыром Mozzarella, томатами, перцем Чили, орегано и томатным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	65 г.\r\nЖиры	66 г.\r\nУглеводы	117 г.\r\nКалории	1329  ккал.\r\nВес: 390 грамм', 350, 0, 0, 53),
(446, 'ПИЦЦА МАРГАРИТА', '/uploads/images/food/picca_margarita/1_1492584836.jpg', 'Традиционная пицца с сыром Mozzarella, томатным соусом и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	60 г.\r\nЖиры	40 г.\r\nУглеводы	126 г.\r\nКалории	1101  ккал.\r\nВес: 345 грамм', 260, 0, 0, 53),
(447, 'ПИЦЦА КАЛЬЦОНЕ', '/uploads/images/food/picca_kalcone/1_1492584864.jpg', '«Конверт с начинкой» из ветчины, артишоков, шампиньонов, сыра Mozzarella, орегано и томатного соуса\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	62 г.\r\nЖиры	32 г.\r\nУглеводы	119 г.\r\nКалории	1011  ккал.\r\nВес: 400 грамм', 340, 0, 0, 53),
(448, 'ПИЦЦА ФИЛАДЕЛЬФИЯ', '/uploads/images/food/picca_filadelfiya/1_1492585857.jpg', 'Лосось, сыры сливочный и Mozzarella, томатный соус, орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	93 г.\r\nЖиры	81 г.\r\nУглеводы	122 г.\r\nКалории	1584  ккал.\r\nВес: 519 грамм', 450, 0, 0, 53),
(449, 'ПИЦЦА С МОРЕПРОДУКТАМИ', '/uploads/images/food/picca_s_moreproduktami/1_1492585884.jpg', 'томатами, сыром Mozzarella,орегано и томатным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	119 г.\r\nЖиры	41 г.\r\nУглеводы	132 г.\r\nКалории	1375  ккал.\r\nВес: 500 грамм', 490, 0, 0, 53),
(450, 'ПИЦЦА ПАРМА', '/uploads/images/food/picca_parma/1_1492585929.jpg', 'Пармская ветчина, соус Песто, томаты, сыры пармезан и "Mozzarella"\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	78 г.\r\nЖиры	43 г.\r\nУглеводы	187 г.\r\nКалории	1442  ккал.\r\nВес: 410 грамм', 570, 0, 0, 53),
(451, 'ПИЦЦА DIVILLAGGIO', '/uploads/images/food/picca_divillaggio/1_1492586008.jpg', 'с охотничьими колбасками, брокколи, сыром Моцарелла и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	78 г.\r\nЖиры	43 г.\r\nУглеводы	187 г.\r\nКалории	1442  ккал.\r\nВес: 490 грамм', 440, 0, 0, 53),
(452, 'ПИЦЦА ПРОШУТО ФУНГИ', '/uploads/images/food/picca_proshuto_fungi/1_1492586030.jpg', 'Ветчина, сыр Mozzarella, шампиньоны, томаты, орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	73 г.\r\nЖиры	38 г.\r\nУглеводы	120 г.\r\nКалории	1118  ккал.\r\nВес: 410 грамм', 360, 0, 0, 53),
(453, 'ПИЦЦА С ГРИБАМИ', '/uploads/images/food/picca_s_gribami/1_1492586058.jpg', 'шампиньоны, трюфельное масло, сыр Mozzarella, орегано и томатный соус\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	55 г.\r\nЖиры	33 г.\r\nУглеводы	119 г.\r\nКалории	991  ккал.\r\nВес: 390 грамм', 370, 0, 0, 53),
(454, 'ПИЦЦА С ТУНЦОМ', '/uploads/images/food/picca_s_tuncom/1_1492586145.jpg', 'Тунец в собственном соку,красный лук,орегано,маслины,томатный соус и сыр "Mozzarella"\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	69 г.\r\nЖиры	37 г.\r\nУглеводы	125 г.\r\nКалории	1104  ккал.\r\nВес: 460 грамм', 350, 0, 0, 53),
(455, 'ПИЦЦА ЧЕТЫРЕ СЫРА', '/uploads/images/food/picca_chetyre_syra/1_1492586171.jpg', 'тесто, сыр Моцарелла, сыр Пармезан, голубой сыр, сыр Фета, сметана\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	65 г.\r\nЖиры	57 г.\r\nУглеводы	119 г.\r\nКалории	1251  ккал.\r\nВес: 380 грамм', 410, 0, 0, 53),
(456, 'ФОКАЧЧА', '/uploads/images/food/fokachcha/1_1492586190.jpg', 'Итальянская лепешка из тонкого теста, Mozzarella, с чесночным маслом и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	11 г.\r\nУглеводы	117 г.\r\nКалории	672  ккал.\r\nВес: 190 грамм', 110, 0, 0, 53),
(457, 'ПАСТА КАРБОНАРА', '/uploads/images/food/pasta_karbonara/1_1492586692.jpg', 'спагетти с беконом, базиликом, пармезаном " Grana Podano" в сливочном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	36 г.\r\nЖиры	45 г.\r\nУглеводы	76 г.\r\nКалории	849  ккал.\r\nВес: 256 грамм', 270, 0, 0, 54),
(458, 'ТАЛЬЯТЕЛЛЕ С КУРИНЫМ ФИЛЕ', '/uploads/images/food/talyatelle_s_kurinym_file/1_1492586887.jpg', 'с кабачком, болгарским перцем и пармезаном в сливочном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	39 г.\r\nЖиры	42 г.\r\nУглеводы	95 г.\r\nКалории	909  ккал.\r\nВес: 330 грамм', 260, 0, 0, 54),
(459, 'ПАСТА БОЛОНЬЕЗ', '/uploads/images/food/pasta_bolonez/1_1492586919.jpg', 'Спагетти с традиционным соусом из двух видов мяса и пармезаном\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	45 г.\r\nЖиры	29 г.\r\nУглеводы	88 г.\r\nКалории	797  ккал.\r\nВес: 315 грамм', 260, 0, 0, 54),
(460, 'СПАГЕТТИ С РЫБОЙ И МОРЕПРОДУКТАМИ', '/uploads/images/food/spagetti_s_ryboy_i_moreproduktami/1_1492586984.jpg', 'в чесночно-сливочном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	72 г.\r\nЖиры	67 г.\r\nУглеводы	86 г.\r\nКалории	1236  ккал.\r\nВес: 315 грамм', 380, 0, 0, 54),
(461, 'ТАЛЬЯТЕЛЛЕ С КРЕВЕТКАМИ', '/uploads/images/food/talyatelle_s_krevetkami/1_1492587012.jpg', 'в розовом соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	46 г.\r\nЖиры	41 г.\r\nУглеводы	93 г.\r\nКалории	930  ккал.\r\nВес: 310 грамм', 390, 0, 0, 54),
(462, 'ТАЛЬЯТЕЛЛЕ С БЕЛЫМИ ГРИБАМИ', '/uploads/images/food/talyatelle_s_belymi_gribami/1_1492587043.jpg', 'кусочками куриной печени в сливочном соусе с пармезаном\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	34 г.\r\nЖиры	48 г.\r\nУглеводы	72 г.\r\nКалории	858  ккал.\r\nВес: 260 грамм', 260, 0, 0, 54),
(463, 'РИЗОТТО ИЗ ПЕРЛОВКИ', '/uploads/images/food/rizotto_iz_perlovki/1_1492587190.jpg', 'С белыми грибами и пармезаном\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	21 г.\r\nУглеводы	35 г.\r\nКалории	383  ккал.\r\nВес: 300 грамм', 250, 0, 0, 54),
(464, 'СПАГЕТТИ С ГРИБАМИ', '/uploads/images/food/spagetti_s_gribami/1_1492587218.jpg', 'Спагетти с шампиньонами, пармезаном в сливочном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	28 г.\r\nЖиры	41 г.\r\nУглеводы	90 г.\r\nКалории	844  ккал.\r\nВес: 285 грамм', 300, 0, 0, 54),
(465, 'РАВИОЛИ С БЕЛЫМИ ГРИБАМИ', '/uploads/images/food/ravioli_s_belymi_gribami/1_1492587241.jpg', 'в сливочном соусе "Pesto" и пармезаном\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	41 г.\r\nУглеводы	50 г.\r\nКалории	643  ккал.\r\nВес: 215 грамм', 290, 0, 0, 54),
(466, 'ТАЛЬЯТЕЛЛЕ С КОЛБАСКАМИ', '/uploads/images/food/talyatelle_s_kolbaskami/1_1492587277.jpg', 'Цукини, паста из вяленых томатов и артишоки в томатном соусе с пармезаном\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	36 г.\r\nЖиры	37 г.\r\nУглеводы	81 г.\r\nКалории	799  ккал.\r\nВес: 265 грамм', 320, 0, 0, 54),
(467, 'ПАСТА АРАБИАТА', '/uploads/images/food/pasta_arabiata/1_1492587310.jpg', 'Тальятелле с чесноком, Чили перцем и пармезаном Grana Podano в томатном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	28 г.\r\nЖиры	13 г.\r\nУглеводы	85 г.\r\nКалории	570  ккал.\r\nВес: 275 грамм', 190, 0, 0, 54),
(468, 'ФОКАЧЧА', '/uploads/images/food/fokachcha/1_1492587423.jpg', 'Итальянская лепешка из тонкого теста, Mozzarella, с чесночным маслом и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	11 г.\r\nУглеводы	117 г.\r\nКалории	672  ккал.\r\nВес: 190 грамм', 110, 0, 0, 55),
(469, 'ХЛЕБНАЯ КОРЗИНКА НА КОМПАНИЮ', '/uploads/images/food/hlebnaya_korzinka_na_kompaniyu/1_1492587455.png', 'Хлебная корзинка на компанию фокачча, темные и белые булочки, гриссини 375 г.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	42 г.\r\nЖиры	16 г.\r\nУглеводы	230 г.\r\nКалории	1229  ккал.\r\nВес:  грамм', 150, 0, 0, 55),
(470, 'ФОКАЧЧА ПОСТНАЯ', '/uploads/images/food/fokachcha_postnaya/1_1492587493.jpg', 'Итальянская лепешка из тонкого теста, Mozzarella, с чесночным маслом и орегано\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	26 г.\r\nЖиры	11 г.\r\nУглеводы	117 г.\r\nКалории	672  ккал.\r\nВес: 190 грамм', 110, 0, 0, 55),
(471, 'ХЛЕБНАЯ КОРЗИНКА', '/uploads/images/food/hlebnaya_korzinka/1_1492587592.png', 'Хлебная корзинка белая и темная булочка, гриссини 2 шт 85 г\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	2 г.\r\nУглеводы	56 г.\r\nКалории	278  ккал.', 80, 0, 0, 55),
(472, 'ГРИССИНИ', '/uploads/images/food/grissini/1_1492587618.jpg', 'традиционные итальянские хлебные палочки 10 г.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	1 г.\r\nЖиры	1 г.\r\nУглеводы	9 г.\r\nКалории	46  ккал.', 20, 0, 0, 55),
(473, 'КАПРЕЗЕ СЫР "MOZZARELLA"', '/uploads/images/food/kapreze_syr_mozzarella/1_1492588098.jpg', 'со свежими и подвяленными помидорами с заправкой песто\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	25 г.\r\nЖиры	25 г.\r\nУглеводы	21 г.\r\nКалории	403  ккал.\r\nВес: 300 грамм', 410, 0, 0, 56),
(474, 'ЦУККИНИ СО СЛИВОЧНЫМ СЫРОМ', '/uploads/images/food/cukkini_so_slivochnym_syrom/1_1492588129.jpg', 'Цуккини, фаршированные сливочным сыром с подвяленными томатами\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	9 г.\r\nЖиры	31 г.\r\nУглеводы	23 г.\r\nКалории	406  ккал.\r\nВес: 200 грамм', 210, 0, 0, 56),
(475, 'РУЛЕТИКИ ИЗ ВЕТЧИНЫ', '/uploads/images/food/ruletiki_iz_vetchiny/1_1492588163.jpg', 'Пармская ветчина, сыр “Mozzarella”, листьями салата и жульеном из овощей с дольками апельсина в заправке Винегрет с вялеными томатами и молотым гранатом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	18 г.\r\nЖиры	10 г.\r\nУглеводы	33 г.\r\nКалории	289  ккал.\r\nВес: 160 грамм', 330, 0, 0, 56),
(476, 'БУЖЕНИНА', '/uploads/images/food/bujenina/1_1492589976.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	41 г.\r\nУглеводы	17 г.\r\nКалории	512  ккал.\r\nВес: 195 грамм', 250, 0, 0, 56),
(477, 'ЦУККИНИ С КРАСНОЙ РЫБОЙ', '/uploads/images/food/cukkini_s_krasnoy_ryboy/1_1492589997.jpg', 'со сливочным кремом Листья салата, овощной жульен, итальянские травы и молотый гранат с заправкой Винегрет\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	18 г.\r\nУглеводы	28 г.\r\nКалории	331  ккал.\r\nВес: 190 грамм', 270, 0, 0, 56),
(478, 'МИКС ИЗ СВЕЖИХ ОВОЩЕЙ', '/uploads/images/food/miks_iz_svejih_ovoshchey/1_1492590025.jpg', 'огурец, томат, редис, красный лук, болгарский перец и свежая зелень с оливковым маслом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	1 г.\r\nУглеводы	22 г.\r\nКалории	111  ккал.\r\nВес: 250 грамм', 200, 0, 0, 56),
(479, 'ТИГРОВЫЕ КРЕВЕТКИ В СЛОЕНОМ ТЕСТЕ', '/uploads/images/food/tigrovye_krevetki_v_sloenom_teste/1_1492590832.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	21 г.\r\nУглеводы	17 г.\r\nКалории	316  ккал.\r\nВес: 160 грамм', 360, 0, 0, 57),
(480, 'КУРИНОЕ ФИЛЕ ЗАПЕЧЕННОЕ В СЛИВКАХ', '/uploads/images/food/kurinoe_file_zapechennoe_v_slivkah/1_1492590957.jpg', 'Куриное филе запеченное в сливках под сырной корочкой\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	42 г.\r\nЖиры	39 г.\r\nУглеводы	20 г.\r\nКалории	601  ккал.\r\nВес: 145 грамм', 200, 0, 0, 57),
(481, 'ОВОЩИ ГРИЛЬ', '/uploads/images/food/ovoshchi_gril/1_1492590983.jpg', 'кабачок, шампиньон, томат и болгарский перец\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	1 г.\r\nУглеводы	30 г.\r\nКалории	150  ккал.\r\nВес: 170 грамм', 230, 0, 0, 57),
(482, 'ГРИБЫ ПО-КАТАЛОНСКИ', '/uploads/images/food/griby_po-katalonski/1_1492591015.jpg', 'с запечённым картофелем, орехом кешью, копченой грудкой индейки под соусом из вяленых томатов\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	23 г.\r\nУглеводы	27 г.\r\nКалории	384  ккал.\r\nВес: 160 грамм', 250, 0, 0, 57),
(483, 'ЗАПЕЧЕННЫЙ БАКЛАЖАН', '/uploads/images/food/zapechennyy_baklajan/1_1492591043.jpg', 'фаршированный овощами и сыром Mozzarella\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	8 г.\r\nЖиры	4 г.\r\nУглеводы	36 г.\r\nКалории	213  ккал.\r\nВес: 205 грамм', 230, 0, 0, 57),
(484, 'МИНЕСТРОНЕ С БЕКОНОМ', '/uploads/images/food/minestrone_s_bekonom/1_1492599208.jpg', 'куриный бульон, отварные овощи, бекон\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	25 г.\r\nЖиры	12 г.\r\nУглеводы	11 г.\r\nКалории	246  ккал.\r\nВес: 275 грамм', 180, 0, 0, 58),
(485, 'КРЕМ-СУП ГРИБНОЙ', '/uploads/images/food/krem-sup_gribnoy/1_1492599348.jpg', 'шампиньоны, белые грибы, сливки, чесночные гренки, соусы бальзамический и песто\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	32 г.\r\nУглеводы	23 г.\r\nКалории	473  ккал.\r\nВес: 260 грамм', 220, 0, 0, 58),
(486, '«PAVESE» - ПАВЕЗЕ', '/uploads/images/food/pavese_-_paveze/1_1492599376.jpg', 'куриное мясо, бульон с яйцом, пармезан\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	34 г.\r\nЖиры	18 г.\r\nУглеводы	 г.\r\nКалории	299  ккал.\r\nВес: 240 грамм', 170, 0, 0, 58),
(487, 'СУП ИТАЛЬЯНСКИЙ', '/uploads/images/food/sup_italyanskiy/1_1492599417.jpg', 'Пармская ветчина, кусочки говядины, колбаса пепперони, болгарский перец, кабачок, морковь и сельдерей\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	24 г.\r\nЖиры	45 г.\r\nУглеводы	52 г.\r\nКалории	706  ккал.\r\nВес: 270 грамм', 230, 0, 0, 58),
(488, 'КРЕМ СУП ИЗ РЫБЫ', '/uploads/images/food/krem_sup_iz_ryby/1_1492599445.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	23 г.\r\nУглеводы	16 г.\r\nКалории	289  ккал.\r\nВес: 260 грамм', 210, 0, 0, 58),
(489, 'СЛИВОЧНЫЙ СУП', '/uploads/images/food/slivochnyy_sup/1_1492599472.jpg', 'с кусочками ягненка, стручковой фасолью, морковью, картошкой, свежим тархуном и специями\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	30 г.\r\nЖиры	65 г.\r\nУглеводы	23 г.\r\nКалории	801  ккал.\r\nВес: 260 грамм', 280, 0, 0, 58),
(490, 'ЦЕЗАРЬ С КУРИНЫМ ФИЛЕ', '/uploads/images/food/cezar_s_kurinym_file/1_1492599602.jpg', 'микс листьев салата, пармезан, классическая заправка, чесночные крутоны 210 г.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	37 г.\r\nЖиры	12 г.\r\nУглеводы	49 г.\r\nКалории	447  ккал.\r\nВес: 200 грамм', 340, 0, 0, 59),
(491, 'А-ЛЯ ОЛИВЬЕ', '/uploads/images/food/a-lya_olive/1_1492599635.jpg', 'куриное филе, картофель кашин, корнишоны и перепелиное яйцо в заправке из домашнего майонеза и белого перца\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	19 г.\r\nЖиры	30 г.\r\nУглеводы	20 г.\r\nКалории	428  ккал.\r\nВес: 170 грамм', 200, 0, 0, 59),
(492, 'ГРЕЧЕСКИЙ САЛАТ', '/uploads/images/food/grecheskiy_salat/1_1492599658.jpg', 'микс листьев салата, огурец, помидор, болгарский перец, красный лук, сыр "Feta", маслины, оливки в лимонно-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	6 г.\r\nЖиры	10 г.\r\nУглеводы	20 г.\r\nКалории	198  ккал.\r\nВес: 220 грамм', 240, 0, 0, 59),
(493, 'ТЕПЛЫЙ САЛАТ С ДОЛЬКАМИ КАРТОФЕЛЯ', '/uploads/images/food/teplyy_salat_s_dolkami_kartofelya/1_1492599705.jpg', 'Микс листьев салата, кусочки отварной говядины, жареные шампиньоны, красный лук, маслины и оливки, чесночные гренки в горчично-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	14 г.\r\nЖиры	7 г.\r\nУглеводы	24 г.\r\nКалории	213  ккал.\r\nВес: 170 грамм', 220, 0, 0, 59);
INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `bonus`, `rating`, `category_id`) VALUES
(494, 'САЛАТ ИЗ ЗАПЕЧЁННОЙ СВЕКЛЫ', '/uploads/images/food/salat_iz_zapechennoy_svekly/1_1492599731.jpg', 'Микс листьев салата, сливочный сыр, кусочки апельсина и ананаса в бальзамической заправке с кедровыми орешками\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	9 г.\r\nЖиры	16 г.\r\nУглеводы	44 г.\r\nКалории	356  ккал.\r\nВес: 280 грамм', 240, 0, 0, 59),
(495, 'САЛАТ НИСУАЗ', '/uploads/images/food/salat_nisuaz/1_1492599758.jpg', 'микс салат, тунец, красный лук, яйцо, лимонно-оливковая заправка\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	22 г.\r\nЖиры	19 г.\r\nУглеводы	27 г.\r\nКалории	370  ккал.\r\nВес: 230 грамм', 280, 0, 0, 59),
(496, 'САЛАТ ИЗ ФИЛЕ ИНДЕЙКИ', '/uploads/images/food/salat_iz_file_indeyki/1_1492599804.jpg', 'в панировке с отварным картофелем, листья салата и красный лук в лимонно-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	20 г.\r\nЖиры	10 г.\r\nУглеводы	58 г.\r\nКалории	399  ккал.\r\nВес: 250 грамм', 290, 0, 0, 59),
(497, 'САЛАТ ИЗ ГОВЯЖЬЕЙ ВЫРЕЗКИ', '/uploads/images/food/salat_iz_govyajey_vyrezki/1_1492599839.jpg', 'с красной фасолью, корнишонов, болгарского перца и свежего ф огурца с заправкой из домашнего майонеза и дижонской горчицы\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	15 г.\r\nЖиры	11 г.\r\nУглеводы	33 г.\r\nКалории	288  ккал.\r\nВес: 150 грамм', 320, 0, 0, 59),
(498, 'САЛАТ ИЗ ЖАРЕНОГО ЛОСОСЯ', '/uploads/images/food/salat_iz_jarenogo_lososya/1_1492599858.jpg', 'Микс листьев салата, огурец, редис и пармезан в лимонно-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	31 г.\r\nЖиры	25 г.\r\nУглеводы	44 г.\r\nКалории	530  ккал.\r\nВес: 230 грамм', 390, 0, 0, 59),
(499, 'САЛАТ ИЗ ПАРМСКОЙ ВЕТЧИНЫ', '/uploads/images/food/salat_iz_parmskoy_vetchiny/1_1492599896.jpg', 'Микс листьев салата, кусочки сыра Mozzarella, в апельсиново-оливковой заправке\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	29 г.\r\nЖиры	18 г.\r\nУглеводы	27 г.\r\nКалории	382  ккал.\r\nВес: 190 грамм', 450, 0, 0, 59),
(500, 'ЦЕЗАРЬ С ТИГРОВЫМИ КРЕВЕТКАМИ', '/uploads/images/food/cezar_s_tigrovymi_krevetkami/1_1492599919.jpg', 'микс листьев салата, пармезан, классическая заправка, чесночные крутоны\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	41 г.\r\nЖиры	25 г.\r\nУглеводы	52 г.\r\nКалории	600  ккал.\r\nВес: 185 грамм', 490, 0, 0, 59),
(501, 'СТЕЙК ИЗ ЛОСОСЯ', '/uploads/images/food/steyk_iz_lososya/1_1492600096.jpg', 'в шпинатно-сливочном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	64 г.\r\nЖиры	56 г.\r\nУглеводы	24 г.\r\nКалории	852  ккал.\r\nВес: 240 грамм', 490, 0, 0, 60),
(502, 'СУДАК ЗАПЕЧЕННЫЙ', '/uploads/images/food/sudak_zapechennyy/1_1492600129.jpg', 'Отварной картофель, красный лук, томаты черри, чеснок, розмарин, лимон, цедра апельсина, паста из вяленых томатов, оливковое масло и итальянские специи\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	42 г.\r\nЖиры	11 г.\r\nУглеводы	41 г.\r\nКалории	434  ккал.\r\nВес: 265 грамм', 370, 0, 0, 60),
(503, 'НАТУРАЛЬНЫЙ БИФШТЕКС ИЗ РЫБЫ', '/uploads/images/food/naturalnyy_bifshteks_iz_ryby/1_1492600153.jpg', 'с овощным жульеном и соусом Вьерж\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	34 г.\r\nЖиры	25 г.\r\nУглеводы	38 г.\r\nКалории	512  ккал.\r\nВес: 184 грамм', 240, 0, 0, 60),
(504, 'МОРСКОЙ ОКУНЬ', '/uploads/images/food/morskoy_okun/1_1492600191.jpg', 'запечённый с зернами горчицы, стручками молодого горошка, моркови, брюссельской капусты со сливочно-чесночным маслом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	43 г.\r\nЖиры	43 г.\r\nУглеводы	31 г.\r\nКалории	687  ккал.\r\nВес: 315 грамм', 380, 0, 0, 60),
(505, 'ФИЛЕ СУДАКА', '/uploads/images/food/file_sudaka/1_1492600222.jpg', 'с картофельным пюре васаби, лук порей, сливочный соус с яйцом, эстрагоном и чесноком с итальянскими травами\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	49 г.\r\nЖиры	28 г.\r\nУглеводы	56 г.\r\nКалории	574  ккал.\r\nВес: 320 грамм', 350, 0, 0, 60),
(506, 'КАРТОФЕЛЬНЫЕ ДОЛЬКИ', '/uploads/images/food/kartofelnye_dolki/1_1492600309.jpg', 'обжаренные в оливковом масле с розмарином и чесноком\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	4 г.\r\nЖиры	1 г.\r\nУглеводы	43 г.\r\nКалории	196  ккал.\r\nВес: 160 грамм', 130, 0, 0, 61),
(507, 'КАРТОФЕЛЬНОЕ ПЮРЕ', '/uploads/images/food/kartofelnoe_pyure/1_1492600344.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	18 г.\r\nУглеводы	28 г.\r\nКалории	289  ккал.\r\nВес: 150 грамм', 120, 0, 0, 61),
(508, 'ОВОЩНАЯ КАПОНАТА', '/uploads/images/food/ovoshchnaya_kaponata/1_1492600367.jpg', 'Баклажан, цуккини, томат и болгарский перец с итальянскими травами и томатным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	 г.\r\nУглеводы	21 г.\r\nКалории	101  ккал.\r\nВес: 140 грамм', 140, 0, 0, 61),
(509, 'РИС С ОВОЩАМИ', '/uploads/images/food/ris_s_ovoshchami/1_1492600390.jpg', 'болгарский перец, морковь, цуккини,соевый соус и кунжут\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	8 г.\r\nУглеводы	52 г.\r\nКалории	297  ккал.\r\nВес: 190 грамм', 120, 0, 0, 61),
(510, 'КУРИНОЕ ФИЛЕ В БЕКОНЕ', '/uploads/images/food/kurinoe_file_v_bekone/1_1492601753.jpg', 'фаршированное сливочным сыром и шпинатом, с соево-сливочным соусом и картофельным пюре\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	35 г.\r\nЖиры	36 г.\r\nУглеводы	52 г.\r\nКалории	673  ккал.\r\nВес: 290 грамм', 300, 0, 0, 62),
(511, 'ФИЛЕ КУРИНОЙ ГРУДКИ', '/uploads/images/food/file_kurinoy_grudki/1_1492601966.jpg', 'запеченное с итальянскими травами микс листьев салата, дольки апельсина и грейпфрута в имбирном соусе\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	56 г.\r\nЖиры	7 г.\r\nУглеводы	63 г.\r\nКалории	540  ккал.\r\nВес: 275 грамм', 280, 0, 0, 62),
(512, 'СВИНАЯ КОРЕЙКА', '/uploads/images/food/svinaya_koreyka/1_1492601992.jpg', 'на гриле с горчицей и картофельными крокетами\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	38 г.\r\nЖиры	92 г.\r\nУглеводы	34 г.\r\nКалории	1119  ккал.\r\nВес: 250 грамм', 350, 0, 0, 62),
(513, 'A-LA BESTROGANOFF', '/uploads/images/food/a-la_bestroganoff/1_1492602038.jpg', 'кусочки говяжей вырезки с грибами, красной паприкой в сливках и картофельным пюре\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	30 г.\r\nЖиры	51 г.\r\nУглеводы	39 г.\r\nКалории	730  ккал.\r\nВес: 320 грамм', 440, 0, 0, 62),
(514, 'ШНИЦЕЛЬ VIENNA', '/uploads/images/food/shnicel_vienna/1_1492602063.jpg', 'из свиной шеи с соусом тар-тар\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	40 г.\r\nЖиры	98 г.\r\nУглеводы	129 г.\r\nКалории	558  ккал.\r\nВес: 250 грамм', 330, 0, 0, 62),
(515, 'БИФШТЕКС', '/uploads/images/food/bifshteks/1_1492602087.jpg', 'из свинины и говядины с беконом свиное сало со сливочной начинкой и соусом из красного перца со специями\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	11 г.\r\nЖиры	12 г.\r\nУглеводы	24 г.\r\nКалории	244  ккал.\r\nВес: 200 грамм', 330, 0, 0, 62),
(516, 'МАРИНОВАННЫЕ В КОНЬЯКЕ КУСОЧКИ КУРИНОГО ФИЛЕ', '/uploads/images/food/marinovannye_v_konyake_kusochki_kurinogo_file/1_1492602129.jpg', 'обжаренные на оливковом масле в сливочно-сметанном соусе с картофелем пай\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	49 г.\r\nЖиры	48 г.\r\nУглеводы	55 г.\r\nКалории	847  ккал.\r\nВес: 260 грамм', 320, 0, 0, 62),
(517, 'ГОВЯЖЬИ ЩЕКИ, ТОМЛЕНЫЕ В КРАСНОМ ВИНЕ', '/uploads/images/food/govyaji_shcheki_tomlenye_v_krasnom_vine/1_1492602154.jpg', 'с розмарином, картофельным пюре и жареным чесноком\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	41 г.\r\nЖиры	27 г.\r\nУглеводы	53 г.\r\nКалории	621  ккал.\r\nВес: 320 грамм', 370, 0, 0, 62),
(518, 'НАПОЛЕОН', '/uploads/images/food/napoleon/1_1492602782.jpg', 'Слоеный торт с заварным кремом со вкусом ванили\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	16 г.\r\nЖиры	40 г.\r\nУглеводы	77 г.\r\nКалории	732  ккал.\r\nВес: 210 грамм', 190, 0, 0, 63),
(519, 'ШОКОЛАДНЫЙ ФЛАН', '/uploads/images/food/shokoladnyy_flan/1_1492602870.jpg', 'Шоколадный кекс с теплым шоколадом внутри\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	11 г.\r\nЖиры	37 г.\r\nУглеводы	61 г.\r\nКалории	621  ккал.\r\nВес: 75 грамм', 250, 0, 0, 63),
(520, 'ТИРАМИСУ', '/uploads/images/food/tiramisu/1_1492602902.jpg', 'сыр Маскарпоне, кофе, какао, портвейн, лимонный сок\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	11 г.\r\nЖиры	47 г.\r\nУглеводы	44 г.\r\nКалории	641  ккал.\r\nВес: 155 грамм', 210, 0, 0, 63),
(521, 'ГРЕЧНЕВЫЙ CREME BRULEE', '/uploads/images/food/grechnevyy_creme_brulee/1_1492602942.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	3 г.\r\nЖиры	38 г.\r\nУглеводы	39 г.\r\nКалории	513  ккал.\r\nВес: 135 грамм', 220, 0, 0, 63),
(522, 'ТВОРОЖНЫЙ ТОРТ', '/uploads/images/food/tvorojnyy_tort/1_1492602970.jpg', 'творог, печенье, сахар, сметана, ваниль\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	10 г.\r\nЖиры	39 г.\r\nУглеводы	60 г.\r\nКалории	631  ккал.\r\nВес: 145 грамм', 210, 0, 0, 63),
(523, 'ИТАЛЬЯНСКИЕ ПИРОЖКИ', '/uploads/images/food/italyanskie_pirojki/1_1492602996.jpg', 'из слоеного теста с черной смородиной\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	9 г.\r\nЖиры	25 г.\r\nУглеводы	59 г.\r\nКалории	498  ккал.\r\nВес: 100 грамм', 140, 0, 0, 63),
(524, 'ЯБЛОЧНЫЙ ШТРУДЕЛЬ', '/uploads/images/food/yablochnyy_shtrudel/1_1492603050.jpg', 'с изюмом и ванильным соусом\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	12 г.\r\nЖиры	39 г.\r\nУглеводы	93 г.\r\nКалории	772  ккал.\r\nВес: 185 грамм', 210, 0, 0, 63),
(525, 'ФРУКТОВЫЙ ЗЕФИР', '/uploads/images/food/fruktovyy_zefir/1_1492603075.jpg', 'Пищевая ценность порции.:\r\n\r\nБелки	5 г.\r\nЖиры	0 г.\r\nУглеводы	73 г.\r\nКалории	316  ккал.\r\nВес: 100 грамм', 160, 0, 0, 63),
(526, 'КОНФЕТА ТРЮФЕЛЬ', '/uploads/images/food/konfeta_tryufel/1_1492603154.jpg', 'Конфета из черного шоколада с коньяком 1шт.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	2 г.\r\nЖиры	8 г.\r\nУглеводы	8 г.\r\nКалории	110  ккал.', 50, 0, 0, 63),
(527, 'КОНФЕТА ИЗ МОЛОЧНОГО ШОКОЛАДА C ПЕЧЕНЬЕМ', '/uploads/images/food/konfeta_iz_molochnogo_shokolada_c_pechenem/1_1492603201.jpg', 'пралине и фундука с печеньем 1 шт.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	1 г.\r\nЖиры	9 г.\r\nУглеводы	12 г.\r\nКалории	130  ккал.', 50, 0, 0, 63),
(528, 'КОНФЕТА ИЗ МОЛОЧНОГО ШОКОЛАДА', '/uploads/images/food/konfeta_iz_molochnogo_shokolada/1_1492603226.jpg', 'пралине и фундука с воздушным рисом 1 шт\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	1 г.\r\nЖиры	7 г.\r\nУглеводы	13 г.\r\nКалории	119  ккал.', 50, 0, 0, 63),
(529, 'КОНФЕТА РАФАЕЛЛО', '/uploads/images/food/konfeta_rafaello/1_1492603256.jpg', 'Конфета из белого шоколада с миндалем 1 шт\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	2 г.\r\nЖиры	11 г.\r\nУглеводы	12 г.\r\nКалории	156  ккал.', 60, 0, 0, 63),
(530, 'ИМБИРНО-ШОКОЛАДНАЯ КОНФЕТА', '/uploads/images/food/imbirno-shokoladnaya_konfeta/1_1492603288.jpg', '1 шт.\r\n\r\nПищевая ценность порции.:\r\n\r\nБелки	1 г.\r\nЖиры	9 г.\r\nУглеводы	14 г.\r\nКалории	136  ккал.', 60, 0, 0, 63),
(531, 'ЛИМОННО-АПЕЛЬСИНОВЫЙ ЛИМОНАД', '/uploads/images/food/limonno-apelsinovyy_limonad/1_1492603553.jpg', 'со свежей мятой и минеральной водой\r\n\r\nПищевая ценность порции.:\r\nВес: 1000 грамм', 200, 0, 0, 64),
(532, 'КОКА-КОЛА / КОКА-КОЛА ЛАЙТ', '/uploads/images/food/koka-kola__koka-kola_layt/1_1492605275.jpg', '250 мл', 80, 0, 0, 64),
(533, 'РИЧ', '/uploads/images/food/rich/1_1492605339.jpg', 'Апельсин, Грейпфрут, Яблоко, Вишня, Персик, Ананас, Томат\r\nОбъем: 1000 грамм', 120, 0, 0, 64),
(534, 'ФРЕШ АПЕЛЬСИНОВЫЙ', '/uploads/images/food/fresh_apelsinovyy/1_1492605387.png', '500мл', 250, 0, 0, 64),
(535, 'НАРЗАН', '/uploads/images/food/narzan/1_1492605415.png', '500 мл', 100, 0, 0, 64),
(536, 'ФАНТА', '/uploads/images/food/fanta/1_1492605452.jpg', '250 мл', 80, 0, 0, 64),
(537, 'СПРАЙТ', '/uploads/images/food/sprayt/1_1492605505.jpg', '', 80, 0, 0, 64),
(538, 'ФРЕШ ГРЕЙПФРУТОВЫЙ', '/uploads/images/food/fresh_greypfrutovyy/1_1492605529.png', '500 мл', 250, 0, 0, 64),
(539, 'ФРЕШ АПЕЛЬСИНОВЫЙ', '/uploads/images/food/fresh_apelsinovyy/1_1492605562.png', '500мл', 450, 0, 0, 64),
(540, 'ФРЕШ ГРЕЙПФРУТОВЫЙ', '/uploads/images/food/fresh_greypfrutovyy/1_1492605649.png', '500 мл.\r\n\r\n', 450, 0, 0, 64),
(541, 'ШВЕПС БИТТЕР ЛИМОН', '/uploads/images/food/shveps_bitter_limon/1_1492605684.jpg', '250 г.', 80, 0, 0, 64),
(542, 'БОН АКВА / ГАЗИРОВАННАЯ И БЕЗ ГАЗА', '/uploads/images/food/bon_akva__gazirovannaya_i_bez_gaza/1_1492605712.jpg', '250 мл', 80, 0, 0, 64),
(543, 'ВАЛЬСЕР ГАЗИРОВАННАЯ, НЕГАЗИРОВАННАЯ', '/uploads/images/food/valser_gazirovannaya_negazirovannaya/1_1492605738.jpg', '330 мл.', 110, 0, 0, 64),
(544, 'ЗЕЛЕНЫЙ ЧАЙ С ЖАСМИНОМ', '/uploads/images/food/zelenyy_chay_s_jasminom/1_1492605808.jpg', 'упаковке для заваривания Зеленый чай с жасмином Тинг Юань (Жасминовый Сад) производится в китайской провинции Гуангси', 40, 0, 0, 65),
(545, 'КРАСНОПОЛЯНСКИЙ СБОР', '/uploads/images/food/krasnopolyanskiy_sbor/1_1492605833.jpg', 'в индивид.упаковке для заваривания Полезный напиток на основе целебных горных трав. Чай с душистым и пряным букетом подарит заряд бодрости на целый день.', 40, 0, 0, 65),
(546, 'ЧАЙ АССАМ', '/uploads/images/food/chay_assam/1_1492605852.jpg', 'индивид.упаковке для заваривания Индийский чай из провинции Ассам - крепкий, пряный, с сильным ароматом', 40, 0, 0, 65),
(547, 'ЧАЙ ЗЕЛЕНЫЙ СЕНЧА', '/uploads/images/food/chay_zelenyy_sencha/1_1492605903.jpg', 'в индивид.упаковке для заваривания Китайский зеленый чай с тонкими и длинными листьями, необыкновенным ароматом и свежим и сильным вкусом.', 40, 0, 0, 65),
(548, 'ЧАЙ МОЛОЧНЫЙ УЛУН', '/uploads/images/food/chay_molochnyy_ulun/1_1492605923.jpg', 'в индивид.упаковке Необычный полуферментированный чай с долгим сливочным послевкусием и многогранным, глубоким медово-цветочным букетом', 40, 0, 0, 65),
(549, 'ЧАЙ РОЙБУШ КЛУБНИКА СО СЛИВКАМИ', '/uploads/images/food/chay_roybush_klubnika_so_slivkami/1_1492605943.jpg', 'в индивид.упаковке для заваривания Сочетание вкуса клубники со сливками с нежным ароматом ройбуша создает уникальный фруктовый букет', 40, 0, 0, 65),
(550, 'ЧАЙ ЭРЛ ГРЕЙ', '/uploads/images/food/chay_erl_grey/1_1492605960.jpg', 'в индивид.упаковке для заваривания Комбинация лучших черных чаев из Цейлона и Китая, ароматизированных бергамотовым маслом', 40, 0, 0, 65),
(552, 'КЛАССИЧЕСКИЙ', '/uploads/images/food/klassicheskiy/1_1492683645.png', 'мясная котлета, огурец малосольный, помидор, красный лук, лист салата, соус барбекю', 330, 0, 0, 68),
(553, 'ЧИЗБУРГЕР ', '/uploads/images/food/chizburger/1_1492684722.png', 'мясная котлета, огурец малосольный, помидор, красный лук, лист салата, сыр Чеддер, соус барбекю', 370, 0, 0, 68),
(554, 'ПУХЛЯК', '/uploads/images/food/puhlyak/1_1492684758.png', 'мясная котлета, помидор, сыр Чеддер обжаренный бекон, лист салата, соус барбекю, сладкая горчица', 410, 0, 0, 68),
(555, 'КАРЛОС ', '/uploads/images/food/karlos/1_1492684788.png', 'мясная котлета, малосольный огурец, лук-фри, сыр Чеддер, красная фасоль, лист салата, соус Цезарь', 390, 0, 0, 68),
(556, 'ВЕСЕЛЫЙ ', '/uploads/images/food/veselyy/1_1492684851.png', 'мясная котлета, малосольный огурец, сыр Чеддер, латук, лук-карамель, соус барбекю', 400, 0, 0, 68),
(557, 'КИТАЕЦ ', '/uploads/images/food/kitaec/1_1492684917.png', 'мясная котлета, малосольный огурец, помидор, капуста кимчи, латук, соус Терияки\r\n', 390, 0, 0, 68),
(558, 'ГУРМАН ', '/uploads/images/food/gurman/1_1492684941.png', 'мясная котлета (2 шт.) малосольный огурец, свежий огурец, помидор, лук-карамель, сыр Чеддер, соус блю чиз, соус Цезарь', 600, 0, 0, 68),
(559, 'ЛЕСНИК ', '/uploads/images/food/lesnik/1_1492685006.png', 'мясная котлета, малосольный огурец, грибное рагу, латук, сыр Чеддер, соус барбекю\r\n', 490, 0, 0, 68),
(560, 'ПО-АССИРИЙСКИ', '/uploads/images/food/po-assiriyski/1_1492685153.png', 'мясная котлета с приправой гарам масала, малосольный огурец, помидор, латук, сыр плавленный, соус Бринджал\r\n', 380, 0, 0, 68),
(561, 'ВЕГЕТАРИАНЕЦ ', '/uploads/images/food/vegetarianec/1_1492685198.png', 'вегетарианская котлета из нута, свежий огурец, лук-фри, кабачок, соус тар-тар\r\n', 360, 0, 0, 68),
(562, 'МИНИ БУРГЕР', '/uploads/images/food/mini_burger/1_1492685296.png', 'Классический, можно с сыром. Мясная котлета, огурец малосольный, помидор, красный лук, лист салата, соус барбекю\r\n', 200, 0, 0, 68),
(563, 'ИНДЮК ', '/uploads/images/food/indyuk/1_1492685434.png', 'котлета из индейки, огурец малосольный, помидор,сыр Чеддер, красный лук, лист салата, соус чесночный\r\n', 390, 0, 0, 68),
(564, 'ЧУМОВАЯ КРЕВЕТКА ', '/uploads/images/food/chumovaya_krevetka/1_1492685463.png', 'котлета из тигровых креветок , огурец малосольный, помидор, красный лук, лист салата, соус Крими Спайси, соус Тар-тар\r\n', 490, 0, 0, 68),
(565, 'КРАБСБУРГЕР ', '/uploads/images/food/krabsburger/1_1492685498.png', 'котлета из мяса камчатского краба, огурец малосольный, помидор, латук, лук красный, руккола, соус Кимчи спайси, Блэк Пепер\r\n', 690, 0, 0, 68),
(566, 'ФИТНЕС ', '/uploads/images/food/fitnes/1_1492685588.png', 'мясная котлета, листья салата латук или айсберг, на выбор вместо булочки, огурец малосольный, помидор, красный лук, лист салата, соус барбекю\r\n', 370, 0, 0, 68),
(567, 'САЛАТ "ДЕРЕВЕНСКИЙ"', '/uploads/images/food/salat_derevenskiy/1_1492686473.png', 'Сочные томаты\r\nСвежие, хрустящие огурчики\r\nСладкий болгарский перчик\r\nКрасный лук\r\nСпеции\r\nМасло жареных семечек подсолнечника\r\nСочная зелень', 220, 0, 0, 69),
(568, 'САЛАТ "ЦЕЗАРЬ С КУРИЦЕЙ"', '/uploads/images/food/salat_cezar_s_kuricey/1_1492686546.png', 'Сочные Томаты Черри\r\nАппетитное куриное филе\r\nСыр\r\nХрустящие слайсы\r\nСпеции\r\nСоус\r\nСочная зелень', 250, 0, 0, 69),
(569, 'САЛАТ "ЦЕЗАРЬ С КРЕВЕТКАМИ"', '/uploads/images/food/salat_cezar_s_krevetkami/1_1492686709.png', 'Сочные Томаты Черри\r\nТигровые креветки\r\nХрустящие слайсы\r\nСыр\r\nСпеции\r\nСоус\r\nСочная зелень', 380, 0, 0, 69),
(570, 'САЛАТ "COLE SLOW"', '/uploads/images/food/salat_cole_slow/1_1492686893.png', 'Свежая капуста\r\nСладкая морковь\r\nБолгарский перчик\r\nКунжут\r\nСпеции\r\nСоус\r\nСочная зелень', 180, 0, 0, 69),
(571, '"КИМЧИ С ДАЙКОНОМ"', '/uploads/images/food/kimchi_s_daykonom/1_1492686917.png', 'Пекинская капуста\r\nДайкон\r\nПерец Чили\r\nЛук\r\nСпеции\r\nКунжут\r\nСоус\r\nСочная зелень', 250, 0, 0, 69),
(572, 'КУРИНЫЕ КРЫЛЫШКИ', '/uploads/images/food/kurinye_krylyshki/1_1492686950.png', 'Куриные крылышки с хрустящей корочкой\r\nСладкая морковь\r\nСвежий огурчик\r\nСпеции\r\nСоус\r\nСочная зелень', 480, 0, 0, 69),
(573, 'КАРТОФЕЛЬ ФРИ', '/uploads/images/food/kartofel_fri/1_1492686975.png', 'Катофель, обжаренный во фритюре\r\nСочный\r\nХрустящая корочка\r\nОтличный гарнир', 150, 0, 0, 69),
(574, 'КАРТОФЕЛЬ ПО-ДЕРЕВЕНСКИ', '/uploads/images/food/kartofel_po-derevenski/1_1492686996.png', 'Картофель\r\nСочная зелень\r\nСпеции\r\nСочный\r\nОтличный гарнир', 150, 0, 0, 69),
(575, 'ПАШТЕТ ИЗ ПЕЧЕНИ КРОЛИКА', '/uploads/images/food/pashtet_iz_pecheni_krolika/1_1492687023.png', 'Паштет\r\nОгурчики\r\nТоматы\r\nХрустящие слайсы\r\nСочная зелень', 200, 0, 0, 69),
(576, 'КУРИНЫЕ НАГГЕТСЫ', '/uploads/images/food/kurinye_naggetsy/1_1492687045.png', 'Сочное куриное филе в хрустящей панировке\r\nСоус\r\nСочная зелень', 180, 0, 0, 69),
(577, 'Стейк из фермерской говядины', '/uploads/images/food/steyk_iz_fermerskoy_govyadiny/1_1492687262.jpg', '200гр', 600, 0, 0, 70),
(578, 'Стейк Рибай', '/uploads/images/food/steyk_ribay/1_1492687338.jpg', '100гр', 900, 0, 0, 70),
(579, 'Шашлык из свиной шеи', '/uploads/images/food/shashlyk_iz_svinoy_shei/1_1492687452.jpg', '200гр', 450, 0, 0, 70),
(580, 'Шашлык из куриного бедра, маринованного в соусе Ким-чи', '/uploads/images/food/shashlyk_iz_kurinogo_bedra_marinovannogo_v_souse_kim-chi/1_1492687613.jpg', '200гр', 380, 0, 0, 70),
(581, 'Цыпленок корнишон', '/uploads/images/food/cyplenok_kornishon/1_1492688073.jpg', '', 550, 0, 0, 70),
(582, 'Свиные ребра', '/uploads/images/food/svinye_rebra/1_1492688212.jpg', '', 480, 0, 0, 70),
(583, 'Овощи гриль', '/uploads/images/food/ovoshchi_gril/1_1492688271.jpg', '', 250, 0, 0, 70),
(584, 'Пшеничная лепешка с сыром сулугуни', '/uploads/images/food/pshenichnaya_lepeshka_s_syrom_suluguni/1_1492688312.jpg', '', 180, 0, 0, 70),
(585, 'КУРИНЫЙ БУЛЬОН С ЛАПШОЙ', '/uploads/images/food/kurinyy_bulon_s_lapshoy/1_1492688788.png', 'Куриный бульон\r\nВермишель\r\nСладкая морковь\r\nКуриное яйцо\r\nСочная зелень', 180, 0, 0, 71),
(586, 'ОКРОШКА С ВЕТЧИНОЙ', '/uploads/images/food/okroshka_s_vetchinoy/1_1492688816.png', 'Ветчина\r\nКартофель\r\nСвежий огурчик\r\nРедис\r\nКуриное яйцо\r\nЗеленый лук\r\nЗелень\r\nКвас или кефир на выбор', 180, 0, 0, 71),
(587, 'Наполеон ', '/uploads/images/food/napoleon/1_1492689295.jpg', '', 240, 0, 0, 72),
(588, 'Чизкейк ', '/uploads/images/food/chizkeyk/1_1492689352.jpg', '', 240, 0, 0, 72),
(589, 'Панна-Котта', '/uploads/images/food/panna-kotta/1_1492689397.jpg', '', 220, 0, 0, 72),
(590, 'Мороженое', '/uploads/images/food/morojenoe/1_1492689661.jpg', '', 100, 0, 0, 72),
(591, 'Сорбет', '/uploads/images/food/sorbet/1_1492690343.jpg', '60гр', 100, 0, 0, 72),
(592, 'Медовик', '/uploads/images/food/medovik/1_1492690389.jpg', '', 220, 0, 0, 72),
(593, 'Эспрессо ', '/uploads/images/food/espresso/1_1492692055.jpg', '30мл', 110, 0, 0, 73),
(594, 'Американо ', '/uploads/images/food/amerikano/1_1492692127.jpg', '120мл', 110, 0, 0, 73),
(595, 'Капучино', '/uploads/images/food/kapuchino/1_1492756221.jpg', '150мл', 150, 0, 0, 73),
(596, 'Латте ', '/uploads/images/food/latte/1_1492756457.jpg', '170мл', 170, 0, 0, 73),
(597, 'Раф ', '/uploads/images/food/raf/1_1492756923.jpg', '170', 180, 0, 0, 73),
(598, 'Айс кофе', '/uploads/images/food/ays_kofe/1_1492757496.jpg', '', 210, 0, 0, 73),
(599, 'Чай', '/uploads/images/food/chay/1_1492770309.jpg', 'В ассортименте (200мл)', 90, 0, 0, 73),
(600, 'ФИЛАДЕЛЬФИЯ ОРАНЖ', '/uploads/images/food/filadelfiya_oranj/1_1492772198.png', 'Копченый лосось, сливочный сыр, апельсин, кунжут\r\n190г.', 249, 0, 0, 74),
(601, 'ВОСТОЧНЫЙ', '/uploads/images/food/vostochnyy/1_1492772598.png', 'Курица терияки, лаваш, огурец, китайская капуста, томат, майонез, чеснок\r\n145г.', 169, 0, 0, 74),
(602, 'ВОЗДУШНЫЙ', '/uploads/images/food/vozdushnyy/1_1492772832.png', 'Сливочный сыр, омлет Тамаго, огурец, угорь, кунжут, соус Унаги\r\n230г.', 199, 0, 0, 74),
(603, 'ИСКРА', '/uploads/images/food/iskra/1_1492772896.png', 'Масляная рыба, икра масаго, омлет Тамаго, огурец, китайская капуста, соус Спайси', 230, 0, 0, 74),
(604, 'БЕЛАЯ ФИЛАДЕЛЬФИЯ', '/uploads/images/food/belaya_filadelfiya/1_1492772969.png', 'Сливочный сыр, масляная рыба, огурец, икра масаго, соус розовый, зеленый лук\r\n270г', 329, 0, 0, 74),
(605, 'ОРИГАМИ', '/uploads/images/food/origami/1_1492779513.png', 'Лосось в устричном соусе, зелёная спаржа в темпуре, соус Розовый, икра масаго, салат латук', 190, 0, 0, 74),
(606, 'СПРИНГ РОЛЛ ОВОЩНОЙ', '/uploads/images/food/spring_roll_ovoshchnoy/1_1492780062.png', 'Болгарский перец, огурец, морковь, зеленая спаржа, салат латук, рисовая бумага, соус дрессинг\r\n110г', 149, 0, 0, 74),
(607, 'СПРИНГ С ЛОСОСЕМ', '/uploads/images/food/spring_s_lososem/1_1492780112.png', 'Копченый лосось, морковь, болгарский перец, огурец, зеленая спаржа, салат латук, соус дрессинг\r\n111г', 199, 0, 0, 74),
(608, 'ЦЕЗАРЬ', '/uploads/images/food/cezar/1_1492780193.png', 'Курица жареная, китайская капуста, соус Розовый, сухари, укроп.\r\n190г', 149, 0, 0, 74),
(609, 'МИНИ С ОМЛЕТОМ', '/uploads/images/food/mini_s_omletom/1_1492780502.png', 'Омлет Тамаго, соус Сырный\r\n120г', 99, 0, 0, 74),
(610, 'КОРОЛЕВСКАЯ КРЕВЕТКА', '/uploads/images/food/korolevskaya_krevetka/1_1492780557.png', 'Тигровая креветка, сливочный сыр, авокадо, омлет Тамаго, снежный краб\r\n165г', 299, 0, 0, 74),
(611, 'КАЛИФОРНИЯ', '/uploads/images/food/kaliforniya/1_1492780600.png', 'Снежный краб, икра масаго, сливочный сыр, огурец, кунжут.\r\n175г', 159, 0, 0, 74),
(612, 'ЧИКЕН СПАЙС', '/uploads/images/food/chiken_spays/1_1492781279.png', 'Курица Терияки, сливочный сыр, соус Спайси, болгарский перец, китайская капуста, зеленый лук\r\n205г', 199, 0, 0, 74),
(613, 'СЛИВОЧНАЯ КРЕВЕТКА', '/uploads/images/food/slivochnaya_krevetka/1_1492781312.png', 'Сливочный сыр, снежный краб, икра масаго, огурец, креветка.\r\n205', 199, 0, 0, 74),
(614, 'ФИЛАДЕЛЬФИЯ', '/uploads/images/food/filadelfiya/1_1492781376.png', 'Лосось, сливочный сыр, огурец.\r\nКлассика, которая не нуждается в представлении. \r\n200 г.', 199, 0, 0, 74),
(615, 'СПРИНГ РОЛЛ С КОПЧЕНЫМ ЛОСОСЕМ', '/uploads/images/food/spring_roll_s_kopchenym_lososem/1_1492781523.png', 'Копченый лосось, сливочный сыр, омлет, огурец, спринг тесто\r\nАппетитная закуска с нежнейшей начинкой из копченого лосося, сливочного сыра и хрустящего огурчика. \r\n115 г.', 219, 0, 0, 74),
(616, 'ФИЛАДЕЛЬФИЯ С КОПЧЕНЫМ ЛОСОСЕМ', '/uploads/images/food/filadelfiya_s_kopchenym_lososem/1_1492781589.png', 'Копченый лосось, сливочный сыр, огурец, соус Розовый, соус Ширачи.\r\nПривычная Филадельфия с терпким вкусом копченого лосося.\r\n208 г.', 259, 0, 0, 74),
(617, 'ЧИКЕН ЭНД ЧИЗ', '/uploads/images/food/chiken_end_chiz/1_1492781626.png', 'Курица жареная, пассерованные овощи, сливочный сыр, сыр мраморный, кунжут\r\nСытный ролл с курицей и сыром в духе кухни по-деревенски. \r\n198 г.', 199, 0, 0, 74),
(618, 'ВИТАМИН', '/uploads/images/food/vitamin/1_1492781688.png', 'Томат, сливочный сыр, китайская капуста, болгарский перец, лук-порей, кунжут.\r\nМягкий, чуть хрустящий ролл с болгарским перцем, томатом и китайской капустой обеспечит витаминами уже к третьему кусочку.\r\n175 г.', 99, 0, 0, 74),
(619, 'РОЛЛ НЬЮ-ЙОРК', '/uploads/images/food/roll_nyu-york/1_1492781739.png', 'Копченый лосось, сливочный сыр, огурец, крошка чипсов, соус Розовый.\r\nКопченый лосось с огурцом и сливочным сыром в панировке из крошки чипсов в традиционном американском духе.\r\n180 г.', 179, 0, 0, 74),
(620, 'ФИЛАДЕЛЬФИЯ ДАБЛ', '/uploads/images/food/filadelfiya_dabl/1_1492781808.png', 'Лосось, снежный краб, сливочный сыр, огурец, икра масаго.\r\nКраб, сливочный сыр, огурец и внушительная порция лосося. \r\n260 гр.', 379, 0, 0, 74),
(621, 'СНЭК РОЛЛ', '/uploads/images/food/snek_roll/1_1492782081.png', 'Курица жареная, огурец, соус Сырный, крошка чипсов.\r\nХрустящий сытный ролл с жареной курицей и огурцом в панировке из чипсов - лучший способ быстро и питательно подкрепиться. \r\n180 г.', 169, 0, 0, 74),
(622, 'ОСТРЫЙ ТУНЕЦ', '/uploads/images/food/ostryy_tunec/1_1492782175.png', 'Тунец, огурец, сливочный сыр, соус Спайси, зеленый лук.\r\n225 г.', 259, 0, 0, 74),
(623, 'ОСТРЫЙ ЛОСОСЬ', '/uploads/images/food/ostryy_losos/1_1492782237.png', 'Лосось, огурец, сливочный сыр, соус Спайси, зеленый лук\r\nПылающий лосось под соусом Спайси, сливочный сыр и свежий огурец. \r\n225 г.', 259, 0, 0, 74),
(624, 'ФИЛАДЕЛЬФИЯ В УГРЕ', '/uploads/images/food/filadelfiya_v_ugre/1_1492782384.png', 'Угорь, сливочный сыр, огурец, соус Унаги, кунжут\r\nВкуснейшая разновидность Филадельфии с соусом Унаги, угрем и кунжутом. \r\n205 гр.', 329, 0, 0, 74),
(625, 'ФИЛАДЕЛЬФИЯ РОЯЛ', '/uploads/images/food/filadelfiya_royal/1_1492783426.png', 'Лосось, сливочный сыр, снежный краб, огурец\r\nЩедрая порция краба и огурца под лососем и сливочным сыром утолит самый могучий аппетит. \r\n265 гр.', 379, 0, 0, 74),
(626, 'ФИЛАДЕЛЬФИЯ МИКС', '/uploads/images/food/filadelfiya_miks/1_1492783470.png', 'Лосось, угорь, сливочный сыр, огурец, соус Унаги, кунжут.\r\nУгорь и лосось - лучшие вкусы в одном ролле. \r\n205 гр.', 299, 0, 0, 74),
(627, 'ВЕГЕТАРИАНСКИЙ', '/uploads/images/food/vegetarianskiy/1_1492783775.png', 'Пассеровка из овощей, грибы шиитаке, тофу, авокадо, соус Терияки, мисо паста, кунжут\r\nИдеальное сочетание лучших продуктов вегетарианской кухни. При изготовлении этого ролла не пострадало ни одно живое существо.\r\n210 гр.', 179, 0, 0, 74),
(628, 'МИНИ РОЛЛ СО СЛИВОЧНЫМ СЫРОМ', '/uploads/images/food/mini_roll_so_slivochnym_syrom/1_1492783856.png', '100 г.', 99, 0, 0, 74),
(629, 'МИНИ ЧИКЕН СПАЙС', '/uploads/images/food/mini_chiken_spays/1_1492783982.png', 'Курица Терияки, зеленый лук, соус Спайси\r\nМини ролл с курицей в остром соусе.\r\n105 г.', 99, 0, 0, 74),
(630, 'ФИШКЕЙК', '/uploads/images/food/fishkeyk/1_1492784056.png', 'Сливочный сыр, лосось, соус Розовый.\r\nМини ролл с лососем под шапкой из сливочного сыра.\r\n110 г.', 79, 0, 0, 74),
(631, 'МИНИ РОЛЛ С ГРИБАМИ', '/uploads/images/food/mini_roll_s_gribami/1_1492784150.png', 'Грибы шиитаке, сливочный сыр.\r\nРолл с грибами шиитаке в сливочном сыре.\r\n100 гр.', 79, 0, 0, 74),
(632, 'СЛИВОЧНЫЙ СЫР И ЗЕЛЕНЫЙ ЛУК', '/uploads/images/food/slivochnyy_syr_i_zelenyy_luk/1_1492784351.png', 'Сливочный сыр, зеленый лук\r\nПряный зеленый лук в нежном сливочном сыре.\r\n105 гр.', 79, 0, 0, 74),
(633, 'МИНИ РОЛЛ С ЧУКОЙ', '/uploads/images/food/mini_roll_s_chukoy/1_1492785202.png', 'Чука, соус Ореховый.\r\n100 г.', 69, 0, 0, 74),
(634, 'МИНИ РОЛЛ С МИДИЯМИ', '/uploads/images/food/mini_roll_s_midiyami/1_1492785244.png', 'Мидии, соус Спайси, чеснок\r\nОстрый ролл с мидиями, обжаренными с чесноком и лимонным соком под соусом Спайси. \r\n110 гр.', 99, 0, 0, 74),
(635, 'МИНИ РОЛЛ СО СЛИВОЧНЫМ СЫРОМ И ЧЕСНОКОМ', '/uploads/images/food/mini_roll_so_slivochnym_syrom_i_chesnokom/1_1492785279.png', 'Сливочный сыр, чеснок, кетчуп.\r\n95 г.', 69, 0, 0, 74),
(636, 'МИНИ РОЛЛ С ОГУРЦОМ', '/uploads/images/food/mini_roll_s_ogurcom/1_1492785338.png', 'Огурец, кунжут\r\nНеизменная классика. Прост, как все гениальное.\r\n93 г.', 69, 0, 0, 74),
(637, 'МИНИ РОЛЛ С АВОКАДО', '/uploads/images/food/mini_roll_s_avokado/1_1492785371.png', 'Вкусный ролл с начинкой из нежного авокадо\r\n95 г.', 79, 0, 0, 74),
(638, 'МИНИ РОЛЛ С УГРЕМ', '/uploads/images/food/mini_roll_s_ugrem/1_1492785613.png', 'Угорь, соус Унаги, кунжут.\r\nТрадиционный ролл с угрем и соусом Унаги – жемчужина Японской кухни.\r\n98 г.', 179, 0, 0, 74),
(639, 'МИНИ РОЛЛ С ЛОСОСЕМ', '/uploads/images/food/mini_roll_s_lososem/1_1492785648.png', 'Рис с лососем, и ничего лишнего. \r\n\r\n100 г.', 159, 0, 0, 74),
(640, 'МИНИ РОЛЛ С ТУНЦОМ', '/uploads/images/food/mini_roll_s_tuncom/1_1492785691.png', 'Благородный тунец в традиционном оформлении.\r\n95 г.', 179, 0, 0, 74),
(641, 'ЛОСОСЬ ТЕРИЯКИ', '/uploads/images/food/losos_teriyaki/1_1492846317.png', 'Лосось в терияки, сливочный сыр, китайская капуста.\r\nДеликатный лосось в соусе Терияки и сливочный сыр со свежим салатом – любимая закуска занятых покупателей.\r\n160 г.', 149, 0, 0, 75),
(642, 'НЕЖНЫЙ КРАБ', '/uploads/images/food/nejnyy_krab/1_1492846756.png', 'Снежный краб, огурец\r\nОПИСАНИЕ\r\nХрустящие кусочки огурца, утопающие в нежном сочетании краба и отборного риса.\r\n155 гр', 199, 0, 0, 75),
(643, 'КРЕВЕТКИ ТЕРИЯКИ', '/uploads/images/food/krevetki_teriyaki/1_1492846791.png', 'Огурец, грибы шиитаке, креветки, соус Терияки, болгарский перец.\r\nОПИСАНИЕ\r\nКреветки и грибы шиитаке в привычной для фаст-роллов компании огурца и риса.\r\n175 г.', 129, 0, 0, 75),
(644, 'ЛОСОСЬ', '/uploads/images/food/losos/1_1492846841.png', 'Лосось,сливочный сыр, икра масаго.\r\nОПИСАНИЕ\r\nСытный и нежный ролл из лосося со сливочным сыром и икрой масаго избавит от голода на многие часы.\r\n175 гр.', 199, 0, 0, 75),
(645, 'ФИТНЕС РОЛЛ', '/uploads/images/food/fitnes_roll/1_1492846873.png', 'Огурец, китайская капуста, болгарский перец, соус Розовый, кунжут.\r\nМощный заряд энергии для всех, кто ведет активный образ жизни.\r\n147 г.', 69, 0, 0, 75),
(646, 'ФРЕШ РОЛЛ', '/uploads/images/food/fresh_roll/1_1492846914.png', 'Лосось,огурец, китайская капуста, ореховый соус.\r\nОПИСАНИЕ\r\nОсвежающий ролл с лососем, огурцом и листьями салата.\r\n160 г.', 139, 0, 0, 75),
(647, 'ФИЛАДЕЛЬФИЯ ФАСТ', '/uploads/images/food/filadelfiya_fast/1_1492847339.png', 'Сливочный сыр, лосось, огурец.Любимый ролл теперь можно съесть на ходу.\r\n160 гр', 139, 0, 0, 75),
(648, 'ЛОСОСЬ И КРЕВЕТКИ', '/uploads/images/food/losos_i_krevetki/1_1492847382.png', 'Копченый лосось, креветки, соус Розовый, кунжут. Копченый лосось и креветки в розовом соусе насытят, порадуют и помогут быть в тонусе.\r\n150 г.', 199, 0, 0, 75),
(649, 'ЧИКЕН СПАЙС', '/uploads/images/food/chiken_spays/1_1492847419.png', 'Курица Терияки, сливочный сыр, болгарский перец, китайская капуста, соус Спайси, зеленый лук. Острая курица со сливочным сыром и щепоткой зеленого лука.\r\n170 г.', 119, 0, 0, 75),
(650, 'ЗАПЕЧЕННЫЕ СУШИ С ТИГРОВОЙ КРЕВЕТКОЙ', '/uploads/images/food/zapechennye_sushi_s_tigrovoy_krevetkoy/1_1492848115.png', '35 г.\r\n', 79, 0, 0, 76),
(651, 'ОСТРЫЕ СУШИ С ТИГРОВОЙ КРЕВЕТКОЙ', '/uploads/images/food/ostrye_sushi_s_tigrovoy_krevetkoy/1_1492848149.png', 'ОПИСАНИЕ\r\n35 г.', 79, 0, 0, 76),
(652, 'СУШИ С ТИГРОВОЙ КРЕВЕТКОЙ', '/uploads/images/food/sushi_s_tigrovoy_krevetkoy/1_1492848167.png', '30 г.\r\n', 79, 0, 0, 76),
(653, 'С ГРЕБЕШКОМ', '/uploads/images/food/s_grebeshkom/1_1492848214.png', 'Гребешок, соус Унаги, кунжут.\r\n37 г.\r\n', 69, 0, 0, 76),
(654, 'СУШИ ТАМАГО', '/uploads/images/food/sushi_tamago/1_1492848252.png', 'Омлет Тамаго, соус Унаги, кунжут\r\n35 г.\r\n', 39, 0, 0, 76),
(655, 'СУШИ С МИДИЯМИ И ОРЕХОВЫМ СОУСОМ', '/uploads/images/food/sushi_s_midiyami_i_orehovym_sousom/1_1492848283.png', 'Мидии, ореховый соус\r\n34 г.\r\n', 39, 0, 0, 76),
(656, 'СУШИ С КРАБОМСУШИ С КРАБОМ', '/uploads/images/food/sushi_s_krabomsushi_s_krabom/1_1492848833.png', '32 г.', 35, 0, 0, 76),
(657, 'СУШИ С КОПЧЕНЫМ ЛОСОСЕМ И СЛИВОЧНЫМ СЫРОМ', '/uploads/images/food/sushi_s_kopchenym_lososem_i_slivochnym_syrom/1_1492849460.png', 'Копченый лосось, сливочный сыр\r\n37 г.\r\n', 65, 0, 0, 76),
(658, 'ЗАПЕЧЕННЫЕ СУШИ С ГРЕБЕШКОМ', '/uploads/images/food/zapechennye_sushi_s_grebeshkom/1_1492849566.png', 'Гребешок, соус Розовый.\r\n37 г.\r\n', 69, 0, 0, 76),
(659, 'С КРЕВЕТКОЙ И СЛИВОЧНЫМ СЫРОМ', '/uploads/images/food/s_krevetkoy_i_slivochnym_syrom/1_1492849687.png', 'Сливочный сыр, креветка.\r\n37 г.\r\n', 35, 0, 0, 76),
(660, 'СУШИ С КОПЧЕНЫМ ЛОСОСЕМ', '/uploads/images/food/sushi_s_kopchenym_lososem/1_1492849846.png', '35 г.\r\n', 65, 0, 0, 76),
(661, 'СУШИ С ТУНЦОМ', '/uploads/images/food/sushi_s_tuncom/1_1492849938.png', '35 г.\r\n', 69, 0, 0, 76),
(662, 'СУШИ С ЧУКОЙ', '/uploads/images/food/sushi_s_chukoy/1_1492850139.png', '32 г.\r\n', 29, 0, 0, 76),
(663, 'СУШИ С МИДИЯМИ', '/uploads/images/food/sushi_s_midiyami/1_1492850217.png', '32 г.\r\n', 35, 0, 0, 76),
(664, 'СУШИ С УГРЕМ', '/uploads/images/food/sushi_s_ugrem/1_1492850287.png', 'Угорь, соус Унаги, кунжут.\r\n37 г.\r\n', 89, 0, 0, 76),
(665, 'СУШИ ЧИКЕН СПАЙС', '/uploads/images/food/sushi_chiken_spays/1_1492850356.png', 'Курица Терияки, зеленый лук, соус Спайси.\r\n32 г.\r\n', 35, 0, 0, 76),
(666, 'ЗАПЕЧЕННЫЕ СУШИ С МИДИЯМИ', '/uploads/images/food/zapechennye_sushi_s_midiyami/1_1492850386.png', 'Мидии салатные, соус Розовый.\r\n37 г.\r\n', 69, 0, 0, 76),
(667, 'ЗАПЕЧЕННЫЕ СУШИ С ЛОСОСЕМ', '/uploads/images/food/zapechennye_sushi_s_lososem/1_1492851346.png', 'Угорь, соус Розовый.\r\n37г', 69, 0, 0, 76),
(668, 'ЗАПЕЧЕННЫЕ СУШИ С УГРЕМ', '/uploads/images/food/zapechennye_sushi_s_ugrem/1_1492851523.png', 'Угорь, соус Розовый.\r\n37г', 69, 0, 0, 76),
(669, 'ЗАПЕЧЕННЫЕ СУШИ С ОКУНЕМ', '/uploads/images/food/zapechennye_sushi_s_okunem/1_1492851551.png', 'Окунь, соус Розовый.\r\n37г', 69, 0, 0, 76),
(670, 'ЗАПЕЧЕННЫЕ СУШИ С КРАБОМ', '/uploads/images/food/zapechennye_sushi_s_krabom/1_1492851598.png', 'Снежный краб, соус Розовый.\r\n37г', 69, 0, 0, 76),
(671, 'ЗАПЕЧЕННЫЕ СУШИ С ТУНЦОМ', '/uploads/images/food/zapechennye_sushi_s_tuncom/1_1492851624.png', 'Тунец, соус Розовый.\r\n37г', 69, 0, 0, 76),
(672, 'ЗАПЕЧЕННЫЕ СУШИ С КРЕВЕТКОЙ', '/uploads/images/food/zapechennye_sushi_s_krevetkoy/1_1492851644.png', 'Креветки, соус Розовый.\r\n37г', 69, 0, 0, 76),
(673, 'ОСТРЫЕ СУШИ С ЛОСОСЕМ', '/uploads/images/food/ostrye_sushi_s_lososem/1_1492852410.png', 'Лосось, соус Спайси.\r\n37г\r\n', 69, 0, 0, 76),
(674, 'ОСТРЫЕ СУШИ С УГРЕМ', '/uploads/images/food/ostrye_sushi_s_ugrem/1_1492852432.png', 'Угорь, соус Спайси.\r\n37г', 69, 0, 0, 76),
(675, 'ОСТРЫЕ СУШИ С ТУНЦОМ', '/uploads/images/food/ostrye_sushi_s_tuncom/1_1492852462.png', 'Тунец, соус Спайси.\r\n37г', 69, 0, 0, 76),
(676, 'ОСТРЫЕ СУШИ С КРЕВЕТКОЙ', '/uploads/images/food/ostrye_sushi_s_krevetkoy/1_1492852492.png', 'Креветка салатная, соус Спайси.\r\n37г', 69, 0, 0, 76),
(677, 'ОСТРЫЕ СУШИ С МИДИЯМИ', '/uploads/images/food/ostrye_sushi_s_midiyami/1_1492852526.png', 'Мидии салатные, соус Спайси.\r\n37г', 69, 0, 0, 76),
(678, 'ОСТРЫЕ СУШИ С КРАБОМ', '/uploads/images/food/ostrye_sushi_s_krabom/1_1492852551.png', 'Краб, соус Спайси.\r\n37г', 69, 0, 0, 76),
(679, 'ОСТРЫЕ СУШИ С ОКУНЕМ', '/uploads/images/food/ostrye_sushi_s_okunem/1_1492852571.png', '37 г.\r\n', 69, 0, 0, 76),
(680, 'ФИЛАДЕЛЬФИЯ ГРИЛЬ', '/uploads/images/food/filadelfiya_gril/1_1492859159.png', 'Лосось, сливочный сыр, омлет Тамаго, соус унаги, кунжут.\r\n215г', 299, 0, 0, 77),
(681, 'КРЕВЕТКА В ТЕМПУРЕ', '/uploads/images/food/krevetka_v_tempure/1_1492859223.png', 'Креветки, лосось, авокадо, сливочный сыр, темпура.\r\nПрекрасное сочетание креветок, лосося и темпуры порадует ярким неповторимым вкусом.\r\n200 г.', 240, 0, 0, 77),
(682, 'ЛОСОСЬ В ТЕМПУРЕ', '/uploads/images/food/losos_v_tempure/1_1492859285.png', 'Лосось, авокадо, сливочный сыр, икра масаго, темпура.\r\nГорячий ролл из лосося, авокадо и сливочного сыра, обрамленный хрустящей темпурой.\r\n\r\n200 г.', 230, 0, 0, 77),
(683, 'УГОРЬ В ТЕМПУРЕ', '/uploads/images/food/ugor_v_tempure/1_1492859313.png', 'Угорь, авокадо, сливочный сыр, темпура.\r\nАроматный, яркий и необычайно вкусный ролл - удачное сочетание угря и темпуры.\r\n\r\n200 г', 230, 0, 0, 77),
(684, 'ЗАПЕЧЕННЫЙ ДУЭТ', '/uploads/images/food/zapechennyy_duet/1_1492859346.png', 'Лосось, угорь, сливочный сыр, огурец, соус Розовый, соус Унаги, кунжут, зеленый лук.\r\n190 г.\r\n', 259, 0, 0, 77),
(685, 'ЗАПЕЧЕННЫЙ С БЕКОНОМ И ТАМАГО', '/uploads/images/food/zapechennyy_s_bekonom_i_tamago/1_1492859380.png', 'Соус Розовый, бекон, омлет Тамаго, сливочный сыр, икра масаго, зеленый лук\r\n200г', 169, 0, 0, 77),
(686, 'С КУРИЦЕЙ', '/uploads/images/food/s_kuricey/1_1492862730.png', 'Курица копченая, соус Розовый, сливочный сыр, омлет, соус Унаги.\r\nСытный горячий ролл с курицей и японским омлетом.\r\n\r\n205 г.', 169, 0, 0, 77),
(687, 'С ГРИБАМИ', '/uploads/images/food/s_gribami/1_1492862758.png', 'Грибы шиитаке, сливочный сыр, соус Розовый, огурец.\r\n200г', 189, 0, 0, 77),
(688, 'С ГРЕБЕШКОМ', '/uploads/images/food/s_grebeshkom/1_1492862795.png', 'Гребешок, лосось, сливочный сыр, омлет, китайская капуста, соус Спайси, соус Унаги, кунжут.\r\nБогатое сочетание вкусов лосося и гребешка, запеченных под Спайси соусом.\r\n\r\n205 г.', 279, 0, 0, 77),
(689, 'С БЕКОНОМ', '/uploads/images/food/s_bekonom/1_1492862838.png', 'Бекон, сливочный сыр, огурец.\r\n205 г.\r\n', 219, 0, 0, 77),
(690, 'С ОКУНЕМ', '/uploads/images/food/s_okunem/1_1492862968.png', 'Окунь, соус Розовый, сливочный сыр, огурец, икра масаго.\r\n235 г.\r\n', 239, 0, 0, 77),
(691, 'С ОКУНЕМ И КРЕВЕТКОЙ', '/uploads/images/food/s_okunem_i_krevetkoy/1_1492862914.png', 'Креветки, окунь, соус Розовый, соус Спайси, огурец, соус Унаги, кунжут.\r\n210 г.\r\n', 249, 0, 0, 77),
(692, 'С МИДИЯМИ', '/uploads/images/food/s_midiyami/1_1492863102.png', 'Мидии, соус Розовый, сливочный сыр, огурец, икра масаго.\r\n245 г.\r\n', 199, 0, 0, 77),
(693, 'ЗАПЕЧЕННЫЙ С ЛОСОСЕМ', '/uploads/images/food/zapechennyy_s_lososem/1_1492863146.png', 'Лосось, сливочный сыр, соус Розовый, икра масаго, огурец.\r\n230 г.\r\n', 259, 0, 0, 77),
(694, 'ЗАПЕЧЕННЫЙ С СЫРОМ', '/uploads/images/food/zapechennyy_s_syrom/1_1492863174.png', 'Краб, сыр Моцарелла, угорь, икра масаго, авокадо, сливочный сыр.\r\n240 г.\r\n', 299, 0, 0, 77),
(695, 'УГОРЬ С ЛОСОСЕМ', '/uploads/images/food/ugor_s_lososem/1_1492863214.png', 'Лосось, угорь, соус Розовый, авокадо, огурец, сливочный сыр, соус Унаги, кунжут.\r\n230 г.\r\n', 319, 0, 0, 77),
(696, 'ФЕНИКС', '/uploads/images/food/feniks/1_1492863243.png', 'Краб, сыр Моцарелла, грибы шиитаке, огурец, авокадо, сливочный сыр, креветка, соус Унаги, кунжут.\r\n205г', 199, 0, 0, 77),
(697, 'ЗАПЕЧЕННАЯ КАЛИФОРНИЯ', '/uploads/images/food/zapechennaya_kaliforniya/1_1492863265.png', 'Краб, икра масаго, сыр Моцарелла, авокадо, огурец, сливочный сыр.\r\n195г', 189, 0, 0, 77),
(698, 'ЗАПЕЧЕННАЯ ФИЛАДЕЛЬФИЯ', '/uploads/images/food/zapechennaya_filadelfiya/1_1492863295.png', 'Лосось, сливочный сыр, икра масаго, соус Розовый, огурец, соус Унаги.\r\n210г', 279, 0, 0, 77),
(699, 'ЛАПША ХАРУСАМЕ', '/uploads/images/food/lapsha_harusame/1_1493017084.png', 'Лапша Харусаме, соус Терияки, морковь, масло растительное, лук-порей, болгарский перец, кунжут.\r\n350г', 119, 0, 0, 78),
(700, 'ЛАПША ХАРУСАМЕ XXL', '/uploads/images/food/lapsha_harusame_xxl/1_1493017141.png', 'Лапша Харусаме, соус Терияки, морковь, масло растительное, лук-порей, болгарский перец, кунжут.\r\n550г', 209, 0, 0, 78),
(701, 'ЛАПША ГРЕЧНЕВАЯ', '/uploads/images/food/lapsha_grechnevaya/1_1493017201.png', 'Лапша гречневая, соус Терияки, пассерованные овощи, масло растительное, кунжут.\r\nСытная лапша с характерным вкусом прекрасно сочетается с сочной свининой и говядиной.\r\n350 г.\r\n', 119, 0, 0, 78),
(702, 'ЛАПША ХРУСТАЛЬНАЯ С ОВОЩАМИ', '/uploads/images/food/lapsha_hrustalnaya_s_ovoshchami/1_1493017425.png', 'Лапша Хрустальная, соус Терияки, пассерованные овощи, масло растительное, кунжут.\r\n350 г.\r\n', 119, 0, 0, 78),
(703, 'ЛАПША УДОН С ОВОЩАМИ', '/uploads/images/food/lapsha_udon_s_ovoshchami/1_1493017457.png', 'Лапша Удон, соус Терияки, морковь, масло растительное, лук-порей, болгарский перец, кунжут.\r\n350 г.\r\n', 119, 0, 0, 78),
(704, 'ЛАПША ГРЕЧНЕВАЯ XXL', '/uploads/images/food/lapsha_grechnevaya_xxl/1_1493017507.png', 'Лапша гречневая, соус Терияки, пассерованные овощи, масло растительное, кунжут.\r\nЭта сытная лапша с характерным вкусом прекрасно сочетается с сочной свининой и говядиной.\r\n\r\n550 г.', 209, 0, 0, 78),
(705, 'ЛАПША ХРУСТАЛЬНАЯ С ОВОЩАМИ XXL', '/uploads/images/food/lapsha_hrustalnaya_s_ovoshchami_xxl/1_1493017543.png', 'Лапша Хрустальная, соус Терияки, пассерованные овощи, масло растительное, кунжут.\r\n550 г.\r\n', 209, 0, 0, 78),
(706, 'ЛАПША УДОН XXL С ОВОЩАМИ', '/uploads/images/food/lapsha_udon_xxl_s_ovoshchami/1_1493017574.png', 'Лапша Удон, соус Терияки, морковь, масло растительное, лук-порей, болгарский перец, кунжут.\r\n550г', 209, 0, 0, 78),
(707, 'РИС С ОВОЩАМИ', '/uploads/images/food/ris_s_ovoshchami/1_1493017606.png', 'Рис, соус Терияки, морковь, масло растительное, лук-порей, болгарский перец, кунжут.\r\n350 г.\r\n', 119, 0, 0, 78),
(708, 'ЗАПЕЧЕННЫЕ МИДИИ', '/uploads/images/food/zapechennye_midii/1_1493021981.png', 'Мидии гигант, соус Сырный, лимон, зелень.\r\n160/10 г.\r\n', 349, 0, 0, 79),
(709, 'ТЁПЛЫЙ САЛАТ С ТОФУ', '/uploads/images/food/teplyy_salat_s_tofu/1_1493022022.png', 'Тофу, китайская капуста, болгарский перец, устричный соус, зелёная спаржа в темпуре, тигровая креветка, соус унаги, кунжут\r\n205 г.\r\n', 289, 0, 0, 79),
(710, 'СВИНИНА В УСТРИЧНОМ СОУСЕ', '/uploads/images/food/svinina_v_ustrichnom_souse/1_1493022045.png', 'Свинина, устричный соус, шампиньоны, грибы шиитаке, болгарский перец, зеленая спаржа, лук, кунжут\r\n270 г.\r\n', 319, 0, 0, 79),
(711, 'ЦЕЗАРЬ С КУРИЦЕЙ', '/uploads/images/food/cezar_s_kuricey/1_1493022145.png', 'Жареная курица, соус Цезарь, салат айсберг, томат, гренки, перепелиное яйцо, сыр моцарелла, укроп\r\n160 г.\r\n', 149, 0, 0, 79),
(712, 'ЦЕЗАРЬ С ТИГРОВЫМИ КРЕВЕТКАМИ', '/uploads/images/food/cezar_s_tigrovymi_krevetkami/1_1493022176.png', 'Соус Цезарь, тигровые креветки, салат айсберг, томат, гренки, перепелиное яйцо, сыр моцарелла, укроп\r\n170 г.\r\n', 299, 0, 0, 79),
(713, 'КУРИЦА ПО-КИТАЙСКИ', '/uploads/images/food/kurica_po-kitayski/1_1493022215.png', 'Жареная в кляре курица, соус кисло-сладкий, болгарский перец, укроп\r\n225 г.\r\n', 319, 0, 0, 79),
(714, 'ГЁДЗЕ ГОВЯДИНА', '/uploads/images/food/gedze_govyadina/1_1493022246.png', 'Говядина, соус Гёдзе, томат, укроп\r\n75/20/21 г.\r\n', 149, 0, 0, 79),
(715, 'ГЁДЗЕ КРЕВЕТКА', '/uploads/images/food/gedze_krevetka/1_1493022282.png', 'Креветки, соус Гёдзе, томат, укроп\r\n75/20/21 г.\r\n', 219, 0, 0, 79),
(716, 'САЛАТ С ЛОСОСЕМ И КРЕВЕТКАМИ', '/uploads/images/food/salat_s_lososem_i_krevetkami/1_1493022306.png', 'Лосось копченый, хрустальная лапша, соус Дрессинг, огурец, китайская капуста, болгарский перец, креветки, кунжут.\r\nСвежий, полезный и аппетитный выбор для тех, кто заботится о своем здоровье.\r\n\r\n125/30 г.', 199, 0, 0, 79),
(717, 'САЛАТ С ЧУКОЙ', '/uploads/images/food/salat_s_chukoy/1_1493022507.png', 'Чука, вакаме, соус Ореховый, лимон.\r\n100/30 г.\r\n', 139, 0, 0, 79),
(718, 'КАРТОФЕЛЬ ЖАРЕНЫЙ', '/uploads/images/food/kartofel_jarenyy/1_1493022533.png', 'Картофель, болгарский перец, лук-порей, масло растительное, зеленый лук, соль.\r\nТрадиционный жареный картофель с овощами и зеленым луком.\r\n\r\n350 г.', 159, 0, 0, 79),
(719, 'ГОРЯЧАЯ ПАРОЧКА', '/uploads/images/food/goryachaya_parochka/1_1493024490.png', 'Комбо: набор «Филадельфия мания» + набор «Горячие штучки»\r\n1170 г.\r\n', 899, 0, 0, 80),
(720, 'КРАСНОЕ МОРЕ', '/uploads/images/food/krasnoe_more/1_1493024523.png', 'Ролл с масляной рыбой, омлетом Тамаго и спаржей, ролл с лососем, мини ролл со спаржей\r\n', 489, 0, 0, 80),
(721, 'ЯРКИЙ', '/uploads/images/food/yarkiy/1_1493024550.png', 'Ролл с масляной рыбой, мини ролл с крабом, 4 суши с омлетом Тамаго\r\n544 г.\r\n', 429, 0, 0, 80),
(722, 'ХРИЗАНТЕМА', '/uploads/images/food/hrizantema/1_1493024595.png', 'Запечёные роллы с лососем и авокадо, с омлетом Тамаго и китайской капустой, с беконом и томатом\r\n625 г.\r\n', 399, 0, 0, 80),
(723, 'СУШИ ТОРТ «ФИЛАДЕЛЬФИЯ»', '/uploads/images/food/sushi_tort_filadelfiya/1_1493024654.png', 'Два ролла Филадельфия, Калифорния, Калифорния в красной масаго, Калифорния в зеленой масаго, Калифорния в кунжуте, Мини ролл с огурцом, ролл Филадельфия в масаго, ролл Филадельфия Мини\r\n1640 г.\r\n', 1499, 0, 0, 80),
(724, 'ГОРЯЧИЙ ХИТ', '/uploads/images/food/goryachiy_hit/1_1493025325.png', 'Запеченный ролл с беконом и омлетом Тамаго, Запеченный мини ролл с омлетом Тамаго, 2 запеченные суши с мидиями, 2 запеченные суши с нежным крабом\r\n524 г.\r\n', 399, 0, 0, 80),
(725, 'НЕЖНЫЙ КРАБ', '/uploads/images/food/nejnyy_krab/1_1493032372.png', 'Ролл со снежным крабом, омлетом Тамаго и огурцом, мини ролл со снежным крабом, 3 суши со снежным крабом и огурцом\r\n466 г.\r\n', 279, 0, 0, 80),
(726, 'ГОРЯЧИЕ ШТУЧКИ', '/uploads/images/food/goryachie_shtuchki/1_1493032397.png', 'Запеченный ролл с лососем и сырным соусом, запеченный ролл с лососем, огурцом и омлетом Тамаго, запеченные суши: с лососем, с омлетом Тамаго\r\n455 г.\r\n', 379, 0, 0, 80),
(727, 'БОЛЬШАЯ КОМПАНИЯ', '/uploads/images/food/bolshaya_kompaniya/1_1493032803.png', 'Филадельфия Микс, Филадельфия Лайт Микс, Калифорния, Витамин, Чикен Спайс, Ролл с копченой курицей, Орешек, Фишкейк, суши с угрем, суши с авокадо.\r\n1465 г.\r\n', 1299, 0, 0, 80),
(728, 'ЗАПЕЧЕННЫЙ МИКС', '/uploads/images/food/zapechennyy_miks/1_1493034293.png', 'Гребешок гриль, Мини ролл с кальмаром, 2 запеченные суши с крабом, 2 запеченные суши с мидиями.\r\n483 г.\r\n', 399, 0, 0, 80),
(729, 'НАБОР СТУДЕНЧЕСКИЙ', '/uploads/images/food/nabor_studencheskiy/1_1493034325.png', 'Цезарь, Калифорния, Мини ролл с мидиями, Мини ролл с огурцом.\r\n573 г.\r\n', 349, 0, 0, 80),
(730, 'НАБОР "ДЕВЧАТА"', '/uploads/images/food/nabor_devchata/1_1493034370.png', 'Мидии терияки, Сливочная креветка, Филадельфия, Калифорния, Витамин, 3 суши с креветкой и сливочным сыром\r\n1081 г.\r\n', 899, 0, 0, 80),
(731, 'ФИРМЕННЫЙ', '/uploads/images/food/firmennyy/1_1493034398.png', 'Филадельфия Люкс, Калифорния, Мини с омлетом\r\n505 г.\r\n', 429, 0, 0, 80),
(732, 'АДРИАТИКА', '/uploads/images/food/adriatika/1_1493034423.png', 'Запеченные роллы с омлетом Тамаго и лососем, мидиями, креветкой, снежным крабом.\r\n770 г.\r\n', 649, 0, 0, 80),
(733, 'СРЕДИЗЕМНОМОРСКИЙ', '/uploads/images/food/sredizemnomorskiy/1_1493034492.png', 'Калифорния, Витамин, Суши с мидиями и ореховым соусом, Суши с крабом, Суши с чукой\r\n448 г.\r\n', 299, 0, 0, 80),
(734, 'ЗАПЕЧЕННЫЙ КАЛИФОРНИКЕЙШН', '/uploads/images/food/zapechennyy_kalifornikeyshn/1_1493034547.png', '4 запеченных ролла Калифорния под соусами: розовым, сырным, спайси и моцареллой.\r\n833 г.\r\n', 499, 0, 0, 80),
(735, 'НАБОР ТЕМПУРА', '/uploads/images/food/nabor_tempura/1_1493034611.png', 'Креветка в темпуре, Лосось в темпуре, Угорь в темпуре.\r\nГастрономический праздник для ценителей настоящей японской кухни.\r\n\r\n600 г.', 589, 0, 0, 80),
(736, 'БОЛЬШОЙ ЗАПЕЧЕННЫЙ', '/uploads/images/food/bolshoy_zapechennyy/1_1493034646.png', 'Запеченные роллы: с окунем, с лососем, с мидиями, 2 запеченные суши с мидиями, 2 запеченные суши с крабом, 2 запеченные суши с окунем.\r\n932 г.\r\n', 799, 0, 0, 80),
(737, 'ДЖЕНТЛЬМЕНСКИЙ НАБОР', '/uploads/images/food/djentlmenskiy_nabor/1_1493034696.png', 'Калифорния, Снэк ролл, Сливочный тунец, Карри ролл, Витамин, Чикен спайс.\r\nИдеальный выбор для праздника! \r\nНабор из 6 разных роллов: от нежного «Сливочный тунец» до острого «Чикен Спайс». \r\n\r\n1125 г.', 699, 0, 0, 80),
(738, 'КАЛИФОРНИКЕЙШН', '/uploads/images/food/kalifornikeyshn/1_1493034724.png', 'Четыре ролла Калифорния в масаго и кунжуте.\r\n728 г.\r\n', 439, 0, 0, 80),
(739, 'ЧЕТЫРЕ СЕЗОНА', '/uploads/images/food/chetyre_sezona/1_1493034750.png', 'Запеченные роллы: с лососем, с крабом, с окунем, с креветкой.\r\nОбилие рыбы и морепродуктов порадует любителей даров океана. \r\n\r\n884 г', 579, 0, 0, 80),
(740, 'СУШИ ШОК КЛАССИК', '/uploads/images/food/sushi_shok_klassik/1_1493034878.png', 'Филадельфия, Калифорния, Сливочный лосось, Мини ролл с огурцом.\r\nВаш любимый Суши Шок, только еще вкуснее.\r\n\r\n648 г.', 499, 0, 0, 80),
(741, 'СУШИ ШОК ПРЕМИУМ', '/uploads/images/food/sushi_shok_premium/1_1493034923.png', 'Филадельфия, Ролл с копченой курицей, Калифорния, Мини ролл Чикен Спайс.\r\n643 г.\r\n', 499, 0, 0, 80),
(742, 'ПОДАРОЧНЫЙ НАБОР', '/uploads/images/food/podarochnyy_nabor/1_1493034959.png', 'Мини роллы запеченные: с лососем, с мидиями, с окунем, с грибами шиитаке, с курицей.\r\nНабор из пяти мини роллов под розовым соусом для горячих поклонников запекания.\r\n\r\n645 г.', 449, 0, 0, 80),
(743, 'МИНИ НАБОР', '/uploads/images/food/mini_nabor/1_1493034985.png', 'Мини ролл с огурцом, с авокадо, с лососем, со сливочным сыром.\r\n388 г.\r\n', 299, 0, 0, 80);
INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `bonus`, `rating`, `category_id`) VALUES
(744, 'КИНГ САЙЗ С УГРЕМ', '/uploads/images/food/king_sayz_s_ugrem/1_1493035017.png', 'Филадельфия Роял Микс, Филадельфия Лайт Микс, Филадельфия Микс, Мини Филадельфия Микс, Филадельфия в масаго, Фишкейк, 2 суши со сливочным сыром и креветкой.\r\nСамый аппетитный набор из роллов всех форм и размеров с лососем, угрём и сливочным сыром.\r\n\r\n1114 г.', 999, 0, 0, 80),
(745, 'НАБОР XXL', '/uploads/images/food/nabor_xxl/1_1493035060.png', 'Филадельфия, Калифорния, Сливочный лосось, Чикен Спайс, Чикен энд Чиз.\r\n958 г.\r\n', 699, 0, 0, 80),
(746, 'ФИЛАДЕЛЬФИЯ МАНИЯ В УГРЕ', '/uploads/images/food/filadelfiya_maniya_v_ugre/1_1493035120.png', 'Филадельфия Роял в Угре, Филадельфия Лайт с угрем, Филадельфия в масаго, Мини Филадельфия с угрем.\r\nЛюбимый набор, только еще изысканнее, красивее и вкуснее.\r\n\r\n734 г.', 739, 0, 0, 80),
(747, 'ФИЛАДЕЛЬФИЯ МАНИЯ', '/uploads/images/food/filadelfiya_maniya/1_1493035144.png', 'Филадельфия в масаго, Филадельфия Лайт, Филадельфия Роял, Мини Филадельфия.\r\n715 г.\r\n', 599, 0, 0, 80),
(748, 'СУШИ ШОК', '/uploads/images/food/sushi_shok/1_1493035170.png', 'Сливочный лосось, Калифорния, Чикен энд Чиз, Мини ролл с огурцом.\r\n646 г.\r\n', 399, 0, 0, 80),
(749, 'ФИЛАДЕЛЬФИЯ КИНГ САЙЗ', '/uploads/images/food/filadelfiya_king_sayz/1_1493035216.png', 'Филадельфия Роял, Филадельфия, Филадельфия Лайт, Филадельфия в масаго, Мини Филадельфия, Фишкейк, 2 суши с креветкой и сливочным сыром.\r\nКилограмм Филадельфии всех форм и размеров – рай для любителей самого популярного ролла в мире.\r\n\r\n1104 г.', 859, 0, 0, 80),
(750, 'ВЕГЕТАРИАНСКИЙ НАБОР', '/uploads/images/food/vegetarianskiy_nabor/1_1493035243.png', 'Витамин, Вегетарианский ролл, Мини ролл с огурцом.\r\n478 г.\r\n', 259, 0, 0, 80),
(751, 'ЗАПЕЧЕННЫЙ НАБОР', '/uploads/images/food/zapechennyy_nabor/1_1493035285.png', 'Запеченные: ролл с окунем, 2 суши с мидиями, 2 суши с крабом.\r\n358 г.\r\n', 299, 0, 0, 80),
(752, 'ДАРЫ МОРЯ', '/uploads/images/food/dary_morya/1_1493035320.png', 'Филадельфия, Сливочный тунец, Кальмаро, Мини ролл с кальмаром.\r\n705 г.\r\n', 569, 0, 0, 80),
(753, 'СЫТЫЙ РЕБЕНОК', '/uploads/images/food/sytyy_rebenok/1_1493035442.png', 'Картофель фри, куриные наггетсы, морс.\r\n100 г/85г/250 мл\r\n', 199, 0, 0, 81),
(754, 'ХРАБРЫЙ ИНДЕЕЦ', '/uploads/images/food/hrabryy_indeec/1_1493035465.png', 'Картофельные шарики, куриное филе на шпажках, морс.\r\n125 г/85 г/250 мл\r\n', 199, 0, 0, 81),
(755, 'ХЭППИ КРАБ', '/uploads/images/food/heppi_krab/1_1493035484.png', 'Картофельные рожицы, крабовые наггетсы, морс.\r\n100 г/80 г/250 мл\r\n', 199, 0, 0, 81);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_03_22_074348_init_migration', 1),
(2, '2017_03_27_074508_admin_fixes', 1),
(3, '2017_03_30_064110_fix_categories_unique', 1),
(4, '2017_04_07_072111_RebuildUserEntities', 1),
(5, '2017_04_12_135436_fix_profile', 2),
(9, '2017_04_13_071644_FixOrder', 3),
(10, '2017_04_19_133409_FixOrder_Profile_UserAddress', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `order_status_id` smallint(5) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_address_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `number`, `creation_date`, `delivery_date`, `description`, `order_status_id`, `profile_id`, `user_address_id`) VALUES
(1, '7_1492700475', '2017-04-20 15:01:15', '2017-04-20 15:01:15', '', 1, 3, NULL),
(2, '2_1493101761', '2017-04-25 06:29:21', '2017-04-25 06:29:21', NULL, 1, 1, NULL),
(3, '2_1493103242', '2017-04-25 06:54:02', '2017-04-25 06:54:02', NULL, 1, 1, NULL),
(4, '2_1493104179', '2017-04-25 07:09:39', '2017-04-25 07:09:39', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_has_food`
--

CREATE TABLE `order_has_food` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `actual_price` double UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_has_food`
--

INSERT INTO `order_has_food` (`order_id`, `food_id`, `actual_price`, `quantity`) VALUES
(1, 108, 50, 1),
(1, 109, 91, 1),
(2, 107, 50, 2),
(3, 107, 50, 1),
(3, 108, 50, 1),
(4, 107, 50, 1),
(4, 108, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Новый'),
(2, 'Обработан');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `second_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus_score` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `second_name`, `birth_date`, `registration_date`, `last_login_date`, `phone_1`, `phone_2`, `bonus_score`, `image`) VALUES
(1, 'andrey', 'Got', '2017-04-01', '2017-04-12 00:00:00', NULL, '911', NULL, 0, '/uploads/images/user/andrey/2_1493101734.jpg'),
(2, 'Alexandr', 'Фамилия', '2017-04-12', '2017-04-12 00:00:00', NULL, '911', NULL, 0, ''),
(3, 'Order', 'testuser', NULL, '2017-04-20 14:38:44', NULL, '112', NULL, 0, '/uploads/images/user/Order/7_1492699124.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_has_payment_method`
--

CREATE TABLE `profile_has_payment_method` (
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `working_hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `image`, `description`, `alias`, `working_hours`, `rating`) VALUES
(4, 'Макдональдс', '/uploads/images/restaurants/makdonalds/1_1492501002.png', 'Доставка Макдональдс на дом в Москве и за МКАД без наценки. Вы платите по чеку из Макдональдс + Доставка. Мы привозим заказ в течении 90 минут, с соблюдением теплового режима. В отличии от доставок, где цена вроде бы меньше, вы не получите бургер за 220 который стоит 130р, купленный вчера и разогретый в микроволновке рачительными хозяевами такой доставки, где в результате вы заплатите только за доставку порядка 700 рублей. Мы привезем вам свежий заказ с чеком, подтверждающим время и место покупки.', 'makdonalds', 'С 10:00 ДО 03:00', 0.00),
(5, 'KFC', '/uploads/images/restaurants/kfc/1_1492242048.jpg', 'KFC — международная сеть ресторанов общественного питания, специализирующаяся на блюдах из курицы.', 'kfc', 'С 10:00 ДО 03:00', 0.00),
(6, 'Burger King', '/uploads/images/restaurants/burger_king/1_1492504058.png', 'Ежедневно в рестораны БУРГЕР КИНГ во всем мире приходит более одиннадцати миллионов посетителей. И неудивительно: ведь наши рестораны известны вкусом фирменных блюд и отличным соотношением цены и качества. Основанный в 1954 году, БУРГЕР КИНГ занимает второе по величине место в мире среди сетей ресторанов быстрого питания, специализирующихся на гамбургерах. Оригинальный бургер «Воппер», ставка на ингредиенты высшего качества, фирменные рецепты и комфорт для посещения всей семьей — вот то, что уже пятьдесят с лишним лет успешной работы является отличительной чертой нашего бренда.', 'burger_king', 'С 10:00 ДО 03:00', 0.00),
(7, 'Nippon house', '/uploads/images/restaurants/nippon_house/1_1492518052.jpg', 'Откройте для себя безупречный образец обслуживания и бескомпромиссный уровень комфорта в самом сердце морского побережья. Позвольте себе прикоснуться к кулинарным тайнам Востока и насладиться изысканными блюдами основателей Европейской цивилизации.\r\n\r\nПрямо сейчас присоединяйтесь к тем, чья страсть к японской и итальянской кухне воплотилась в создании самых уникальных тематических мест на карте Сочи, а именно ресторанов «Nippon House» и «Rukkola»', 'nippon_house', 'С 10:00 до 00:00', 0.00),
(8, 'Карефана', '/uploads/images/restaurants/karefana/1_1492608592.jpg', 'Кафе «Карефана» открылось в центре Сочи в феврале 2016 года. И это первое в своем роде кафе в Сочи, радующее жителей и гостей города блюдами неповторимой китайской кухни. Меню нашего заведения насчитывает более 150 блюд! Наш шеф-повар из Китая имеет 40-летний опыт работы в китайской кухне!', 'karefana', 'с 10 до 23', 0.00),
(9, 'BURGMAN', '/uploads/images/restaurants/burgman/1_1492683488.jpg', 'Постоянные гости бургерной не могут не заметить наших достоинств: прямые поставки фермерской говядины от Компании «Заречное», нежные булочки с хрустящей корочкой по авторскому рецепту, маринованные огурцы собственного приготовления, изобилие соусов, созданных из исключительно «здоровых» ингредиентов и, конечно, высокое качество бургеров и блюд.\r\n\r\nСделав заказ, Вы можете понаблюдать за процессом приготовления бургера - У НАС ОТКРЫТАЯ КУХНЯ.', 'burgman', '12:00 - 00:00', 0.00),
(10, 'СушиВесла', '/uploads/images/restaurants/sushivesla/1_1492771252.png', '', 'sushivesla', 'С 10:00 до 00:00', 0.00),
(11, 'Суши Шоп', '/uploads/images/restaurants/sushi_shop/1_1492771769.jpg', 'Еще в 2011 году суши были дорогим удовольствием, но мы изменили это, сделав японскую еду доступной каждому. Формат "takeaway" или "суши с собой", в котором работает наша компания, это новая концепция заведений быстрого питания. Мы готовим японскую и китайскую еду на вынос, что позволяет сократить ненужные издержки и обеспечить высокое качество при разумной цене. Благодаря этой стратегии мы стали не только важным игроком на российском рынке, но и неотделимой частью жизни людей.', 'sushi_shop', '10:00 - 19:00', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_contacts`
--

CREATE TABLE `restaurant_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `bonus_rate` int(11) NOT NULL,
  `discount` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `name`, `description`, `start_date`, `end_date`, `image`, `status`, `bonus_rate`, `discount`) VALUES
(1, 'Бесплатная доставка', 'Бесплатная доставка - если сумма заказа выше 1500 р', '2017-04-12', NULL, '/uploads/images/restaurants/mcdonalds/1_1491986753.jpg', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `special_has_category`
--

CREATE TABLE `special_has_category` (
  `special_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_has_food`
--

CREATE TABLE `special_has_food` (
  `special_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_has_restaurant`
--

CREATE TABLE `special_has_restaurant` (
  `special_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_status_id` smallint(5) UNSIGNED NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `user_status_id`, `remember_token`, `nickname`, `profile_id`) VALUES
(1, 'admin@gmail.com', '$2y$10$h7mzAGLyu0i2p5kAxLHbBeJnFTYhHlMPXYM3FkB98M8ztObMROs96', 1, 'WePIqdyMWnxUi5K7gWX9f4mcvBZOfVCRo1bEUDN3JtfeC9TWH3sq2zZ5HWX2', 'ADMIN', 1),
(2, 'andreygot88@gmail.com', '$2y$10$2OIxmqQlAIe9hHr5px45eeCSS/OFG3ARzeUnOzoQNN4uBd7rUKDbS', 2, 'Hx7iO4Hve8WWKrDtUQJpwJ57FYzXblnSWwOQObbj0eKUawwWdpMs3FIwR3Kx', 'andrey', 1),
(3, 'Dostavka-plys@yandex.ru', '$2y$10$h7mzAGLyu0i2p5kAxLHbBeJnFTYhHlMPXYM3FkB98M8ztObMROs96', 2, 'XwpZE3nei3mQ9PYicsmmfJ6Pkv348ir1IJYT7euTYaN32ocABe7lkR4BShVE', 'Alexandr', 2),
(4, 'ivan@ivan.ivan', '$2y$10$zw3bJiYik.9eTYRvwnHOC.YiC1KAJCsNGnBA4f2VpqEAas7RAtfAa', 2, 'yuADPFVv22tzJuTVL52NooeOfLztwnbdU3fCXsRTwiash4a6xUhBhIUkObOk', 'Ivan', NULL),
(5, 'logout@gmail.com', '$2y$10$gLaTGm19TPmBpeVgREz2yePUe3vQ4BzfO27rhU409A1W8ZDpKYTve', 2, '0yz8Ksaocgs9IM01WecTQrlysQJ8vyhnF9phDLl3U9lHOihBHFZqvMAcFWEO', 'проверка_лог_аут', NULL),
(6, 'k.pshenychnyy@gmail.com', '$2y$10$hkIvyndXlumeFbf9nPPBGeylVLzd/NqvKb8VXZs4YlfVnIZkH1/GG', 2, NULL, 'pshenOk', NULL),
(7, 'testOrder@gmail.com', '$2y$10$ayR4b9Se7TtSQ7R48CPCT./Ds6lmlJXeJ8nWSUgmpNQc3chORmJY.', 2, NULL, 'Order', 3),
(8, 'ivan@ivan.iv', '$2y$10$RO2dkwpjTlmPjGygCruL1e549vf9K0HKrDPD4LKvWpOiRSAucayaS', 2, NULL, 'Иван', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `region`, `city`, `street`, `house`, `flat`, `description`, `profile_id`) VALUES
(1, 'Kiev', 'Kiev', 'maidan', '12', '1', '123', 1),
(2, NULL, 'Сочи', 'qwe', '12', '12', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `name`) VALUES
(1, 'SUPER_ADMIN'),
(2, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `cart_has_food`
--
ALTER TABLE `cart_has_food`
  ADD PRIMARY KEY (`cart_id`,`food_id`),
  ADD KEY `cart_has_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_restairantid_alias` (`restaurant_id`,`alias`);

--
-- Indexes for table `fast_order`
--
ALTER TABLE `fast_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_number` (`number`),
  ADD KEY `fast_order_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `fast_order_order_status_id_foreign` (`order_status_id`);

--
-- Indexes for table `fast_order_has_food`
--
ALTER TABLE `fast_order_has_food`
  ADD KEY `fast_order_has_food_fast_order_id_foreign` (`fast_order_id`),
  ADD KEY `fast_order_has_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_number` (`number`),
  ADD KEY `order_order_status_id_foreign` (`order_status_id`),
  ADD KEY `order_profile_id_foreign` (`profile_id`),
  ADD KEY `order_user_address_id_foreign` (`user_address_id`);

--
-- Indexes for table `order_has_food`
--
ALTER TABLE `order_has_food`
  ADD PRIMARY KEY (`order_id`,`food_id`),
  ADD KEY `order_has_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_has_payment_method`
--
ALTER TABLE `profile_has_payment_method`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD KEY `profile_has_payment_method_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_alias` (`alias`);

--
-- Indexes for table `restaurant_contacts`
--
ALTER TABLE `restaurant_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_contacts_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_has_category`
--
ALTER TABLE `special_has_category`
  ADD PRIMARY KEY (`special_id`,`category_id`),
  ADD KEY `special_has_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `special_has_food`
--
ALTER TABLE `special_has_food`
  ADD PRIMARY KEY (`special_id`,`food_id`),
  ADD KEY `special_has_food_food_id_foreign` (`food_id`);

--
-- Indexes for table `special_has_restaurant`
--
ALTER TABLE `special_has_restaurant`
  ADD PRIMARY KEY (`special_id`,`restaurant_id`),
  ADD KEY `special_has_restaurant_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_status_id_foreign` (`user_status_id`),
  ADD KEY `user_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `fast_order`
--
ALTER TABLE `fast_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=756;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `restaurant_contacts`
--
ALTER TABLE `restaurant_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `cart_has_food`
--
ALTER TABLE `cart_has_food`
  ADD CONSTRAINT `cart_has_food_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_has_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `fast_order`
--
ALTER TABLE `fast_order`
  ADD CONSTRAINT `fast_order_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `fast_order_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`);

--
-- Constraints for table `fast_order_has_food`
--
ALTER TABLE `fast_order_has_food`
  ADD CONSTRAINT `fast_order_has_food_fast_order_id_foreign` FOREIGN KEY (`fast_order_id`) REFERENCES `fast_order` (`id`),
  ADD CONSTRAINT `fast_order_has_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `order_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `order_user_address_id_foreign` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`id`);

--
-- Constraints for table `order_has_food`
--
ALTER TABLE `order_has_food`
  ADD CONSTRAINT `order_has_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `order_has_food_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Constraints for table `profile_has_payment_method`
--
ALTER TABLE `profile_has_payment_method`
  ADD CONSTRAINT `profile_has_payment_method_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `user_has_payment_method_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`);

--
-- Constraints for table `restaurant_contacts`
--
ALTER TABLE `restaurant_contacts`
  ADD CONSTRAINT `restaurant_contacts_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `special_has_category`
--
ALTER TABLE `special_has_category`
  ADD CONSTRAINT `special_has_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `special_has_category_special_id_foreign` FOREIGN KEY (`special_id`) REFERENCES `special` (`id`);

--
-- Constraints for table `special_has_food`
--
ALTER TABLE `special_has_food`
  ADD CONSTRAINT `special_has_food_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  ADD CONSTRAINT `special_has_food_special_id_foreign` FOREIGN KEY (`special_id`) REFERENCES `special` (`id`);

--
-- Constraints for table `special_has_restaurant`
--
ALTER TABLE `special_has_restaurant`
  ADD CONSTRAINT `special_has_restaurant_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `special_has_restaurant_special_id_foreign` FOREIGN KEY (`special_id`) REFERENCES `special` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `user_user_status_id_foreign` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
