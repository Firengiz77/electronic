-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3307
-- Üretim Zamanı: 16 Eyl 2022, 13:49:32
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `furniture`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `name`, `title`, `desc`, `slug`, `author`, `created_at`, `updated_at`) VALUES
(2, '2022081908272.jpg', '{\"az\":\"Blog 2 az\",\"en\":\"Blog 2 en\"}', '{\"az\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  az\",\"en\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  en\"}', '{\"az\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum \",\"en\":\"Blog 2 en az\"}', 'blog_1', '{\"az\":\"Firengiz az\",\"en\":\"Firengiz en\"}', '2022-08-19 04:27:41', '2022-08-30 08:07:21'),
(3, '2022081908282.jpg', '{\"az\":\"What is Lorem Ipsum? az\",\"en\":\"Why do we use it? en\"}', '{\"az\":\"What is Lorem Ipsum? az\",\"en\":\"What is Lorem Ipsum? en\"}', '{\"az\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.\",\"en\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.\"}', 'blog_3', '{\"az\":\"Joseff B.\",\"en\":\"Joseff B.\"}', '2022-08-19 04:28:33', '2022-08-30 07:01:09'),
(4, '2022081908304.jpg', '{\"az\":\"Why do we use it? az\",\"en\":\"Why do we use it? en\"}', '{\"az\":\"Why do we use it?az\",\"en\":\"Why do we use it? en\"}', '{\"az\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.\",\"en\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.\"}', 'blog_4', '{\"az\":\"Jeff\",\"en\":\"Jeff\"}', '2022-08-19 04:30:14', '2022-08-30 07:00:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `cat_id`, `slug`, `created_at`, `updated_at`) VALUES
(15, '{\"az\":\"Meyvələr\",\"en\":\"Fruits\"}', '0', 'fruit', '2022-09-07 03:05:03', '2022-09-07 03:05:03'),
(16, '{\"az\":\"Tərəvəzlər\",\"en\":\"Vegetables\"}', '0', 'vegetables', '2022-09-07 03:05:17', '2022-09-07 03:05:17'),
(17, '{\"az\":\"Salatlar\",\"en\":\"Salads\"}', '0', 'salads', '2022-09-07 03:06:18', '2022-09-07 03:06:18'),
(18, '{\"az\":\"Dəniz Yeməkləri\",\"en\":\"Ocean Foods\"}', '0', 'ocean_foods', '2022-09-07 03:06:49', '2022-09-07 03:06:49'),
(20, '{\"az\":\"İçkilər\",\"en\":\"Drink\"}', '0', 'drink', '2022-09-07 03:08:32', '2022-09-07 03:08:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `open_time`, `address`, `email`, `fb_link`, `wp_link`, `insta_link`, `created_at`, `updated_at`) VALUES
(4, '994 070 888 4581', '10.00 - 19.00', 'Azerbaijan, Baku', 'firengizsariyeva77@gmail.com', 'google.com', 'google.com', 'google.com', '2022-08-18 06:10:54', '2022-08-18 06:16:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'test2', 'dev@gmail.com', 'test2', '2022-08-19 03:54:16', '2022-08-19 03:54:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_18_053707_create_sliders_table', 2),
(6, '2022_08_18_065543_create_contacts_table', 3),
(7, '2022_08_18_102350_create_blogs_table', 4),
(8, '2022_08_18_131912_create_messages_table', 5),
(9, '2022_09_05_054048_create_categories_table', 6),
(10, '2022_09_05_080715_create_product_sizes_table', 7),
(11, '2022_09_05_080933_create_product__colors_table', 7),
(12, '2022_09_05_105126_create_products_table', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(15) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `thumbnail`, `images`, `on_stock`, `desc`, `cat_id`, `size_id`, `color_id`, `slug`, `created_at`, `updated_at`) VALUES
(5, '{\"az\":\"Alma\",\"en\":\"Apple\"}', 12, '1340258954.jpg', '[\"739425365.jpg\",\"629665348.jpg\",\"978981745.jpg\"]', '1', '{\"az\":\"<p><strong>Apple</strong>&nbsp;&mdash;&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/1976\\\">1976</a>-cı il aprel ayının 1-də&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Stiv_Cobs\\\">Stiv Cobs</a>,&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Stiv_Voznyak\\\">Stiv Voznyak</a>&nbsp;və&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=Ronald_Uayn&amp;action=edit&amp;redlink=1\\\">Ronald Uayn</a>&nbsp;tərəfindən yaradılan, hazırda d&uuml;nyanın ən b&ouml;y&uuml;k&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Proqram\\\">proqram</a>&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=T%C9%99minat%C3%A7%C4%B1&amp;action=edit&amp;redlink=1\\\">təminat&ccedil;ılarından</a>&nbsp;biri olan&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Komp%C3%BCter\\\">komp&uuml;ter firması</a>.</p>\\n\\n<p><a href=\\\"https://az.wikipedia.org/wiki/%C5%9Eirk%C9%99t\\\">Şirkətin</a>&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=M%C9%99rk%C9%99zi_ofis&amp;action=edit&amp;redlink=1\\\">mərkəzi ofisi</a>&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Amerika_Birl%C9%99%C5%9Fmi%C5%9F_%C5%9Etatlar%C4%B1\\\">ABŞ</a>-ın&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Kaliforniya\\\">Kaliforniya</a>&nbsp;ştatının&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=Kupertino&amp;action=edit&amp;redlink=1\\\">Kupertino</a>&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/%C5%9E%C9%99h%C9%99r\\\">şəhərində</a>&nbsp;yerləşir.&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/2005\\\">2005</a>-ci ildən etibarən&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/%C5%9Eirk%C9%99t\\\">şirkətə</a>&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/Stiv_Cobs\\\">Stiv Cobs</a>&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/R%C9%99hb%C9%99rlik\\\">rəhbərlik</a>&nbsp;etmişdir.&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=Apple_Macintosh&amp;action=edit&amp;redlink=1\\\">Apple Macintosh</a>,&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/%C4%B0Phone\\\">iPhone</a>,&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=Mac_Book&amp;action=edit&amp;redlink=1\\\">Macbook</a>,&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/%C4%B0Pod\\\">iPod</a>&nbsp;və&nbsp;<a href=\\\"https://az.wikipedia.org/w/index.php?title=%C4%B0Pad&amp;action=edit&amp;redlink=1\\\">iPad</a>&nbsp;<a href=\\\"https://az.wikipedia.org/wiki/%C5%9Eirk%C9%99t\\\">şirkətin</a>&nbsp;ən tanınan məhsullarıdır.</p>\\n\",\"en\":\"<p>An&nbsp;<strong>apple</strong>&nbsp;is an edible&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Fruit\\\">fruit</a>&nbsp;produced by an&nbsp;<strong>apple tree</strong>&nbsp;(<em><strong>Malus domestica</strong></em>). Apple&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Fruit_tree\\\">trees</a>&nbsp;are&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Agriculture\\\">cultivated</a>&nbsp;worldwide and are the most widely grown species in the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Genus\\\">genus</a>&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Malus\\\">Malus</a></em>. The&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Tree\\\">tree</a>&nbsp;originated in&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Central_Asia\\\">Central Asia</a>, where its wild ancestor,&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Malus_sieversii\\\">Malus sieversii</a></em>, is still found today. Apples have been grown for thousands of years in Asia and Europe and were brought to North America by&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/European_colonization_of_the_Americas\\\">European colonists</a>. Apples have&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Religion\\\">religious</a>&nbsp;and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Mythology\\\">mythological</a>&nbsp;significance in many cultures, including&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Norse_mythology\\\">Norse</a>,&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Greek_mythology\\\">Greek</a>, and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Christianity_in_Europe\\\">European Christian</a>&nbsp;tradition.</p>\\n\"}', '15', '1', '6', 'apple', '2022-09-07 03:17:37', '2022-09-07 03:43:51'),
(6, '{\"az\":\"SəkkizAyaq\",\"en\":\"Octopus\"}', 23, '1201223100.jpg', '[\"509540747.jpg\",\"2020867291.jpg\"]', '1', '{\"az\":\"<p><strong>Ahtapot</strong>; yumuşak g&ouml;vdeli, sekiz&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kafadan_bacakl%C4%B1_kolu\\\">kollu</a>,&nbsp;<strong>Octopoda</strong>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Tak%C4%B1m_(biyoloji)\\\">takımında</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Bilimsel_s%C4%B1n%C4%B1fland%C4%B1rma\\\">sınıflandırılan</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Yumu%C5%9Fak%C3%A7alar\\\">yumuşak&ccedil;aların</a>&nbsp;genel adı. Kabul g&ouml;rm&uuml;ş 300 civarında&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/T%C3%BCr\\\">t&uuml;r&uuml;</a>&nbsp;bulunan ahtapotlar&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kalamar\\\">kalamarlar</a>,&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/M%C3%BCrekkep_bal%C4%B1%C4%9F%C4%B1\\\">m&uuml;rekkep balıkları</a>&nbsp;ve&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Nautiloid\\\">nautiloidler</a>&nbsp;ile birlikte&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kafadan_bacakl%C4%B1lar\\\">kafadan bacaklılar</a>&nbsp;(Cephalopoda)&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/S%C4%B1n%C4%B1f_(biyoloji)\\\">sınıfında</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Bilimsel_s%C4%B1n%C4%B1fland%C4%B1rma\\\">gruplandırılırlar</a>.</p>\\n\",\"en\":\"<p><strong>Ahtapot</strong>; yumuşak g&ouml;vdeli, sekiz&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kafadan_bacakl%C4%B1_kolu\\\">kollu</a>,&nbsp;<strong>Octopoda</strong>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Tak%C4%B1m_(biyoloji)\\\">takımında</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Bilimsel_s%C4%B1n%C4%B1fland%C4%B1rma\\\">sınıflandırılan</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Yumu%C5%9Fak%C3%A7alar\\\">yumuşak&ccedil;aların</a>&nbsp;genel adı. Kabul g&ouml;rm&uuml;ş 300 civarında&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/T%C3%BCr\\\">t&uuml;r&uuml;</a>&nbsp;bulunan ahtapotlar&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kalamar\\\">kalamarlar</a>,&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/M%C3%BCrekkep_bal%C4%B1%C4%9F%C4%B1\\\">m&uuml;rekkep balıkları</a>&nbsp;ve&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Nautiloid\\\">nautiloidler</a>&nbsp;ile birlikte&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Kafadan_bacakl%C4%B1lar\\\">kafadan bacaklılar</a>&nbsp;(Cephalopoda)&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/S%C4%B1n%C4%B1f_(biyoloji)\\\">sınıfında</a>&nbsp;<a href=\\\"https://tr.wikipedia.org/wiki/Bilimsel_s%C4%B1n%C4%B1fland%C4%B1rma\\\">gruplandırılırlar</a>. en</p>\\n\"}', '18', '2', '6', 'octopus', '2022-09-07 03:19:01', '2022-09-07 03:19:01'),
(7, '{\"az\":\"Xiyar\",\"en\":\"Cucumber\"}', 43, '1854623729.jpg', '[\"851395371.jpg\",\"2056174882.jpg\"]', '1', '{\"az\":\"<p><strong>Cucumber</strong>&nbsp;(<em>Cucumis sativus</em>) is a widely-cultivated&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vine#Horticultural_climbing_plants\\\">creeping vine</a>&nbsp;plant in the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cucurbitaceae\\\">Cucurbitaceae</a>&nbsp;family that bears usually cylindrical&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Fruit\\\">fruits</a>, which are used as&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Culinary_vegetable\\\">culinary vegetables</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-:0-1\\\">[1]</a>&nbsp;Considered an annual plant,<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-2\\\">[2]</a>&nbsp;there are three main varieties of cucumber&mdash;slicing,&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pickled_cucumber\\\">pickling</a>, and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Seedless_fruit\\\">seedless</a>&nbsp;az</p>\\n\",\"en\":\"<p><strong>Cucumber</strong>&nbsp;(<em>Cucumis sativus</em>) is a widely-cultivated&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vine#Horticultural_climbing_plants\\\">creeping vine</a>&nbsp;plant in the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cucurbitaceae\\\">Cucurbitaceae</a>&nbsp;family that bears usually cylindrical&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Fruit\\\">fruits</a>, which are used as&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Culinary_vegetable\\\">culinary vegetables</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-:0-1\\\">[1]</a>&nbsp;Considered an annual plant,<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-2\\\">[2]</a>&nbsp;there are three main varieties of cucumber&mdash;slicing,&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pickled_cucumber\\\">pickling</a>, and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Seedless_fruit\\\">seedless</a></p>\\n\"}', '16', '2', '4', 'cucumber', '2022-09-07 03:19:51', '2022-09-07 03:45:44'),
(8, '{\"az\":\"Kartof\",\"en\":\"Potato\"}', 54, '108526590.jpg', '[\"1071125148.jpg\",\"235148580.jpg\"]', '1', '{\"az\":\"<p>within which several&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cultivar\\\">cultivars</a>&nbsp;have been created. The cucumber originates from&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/South_Asia\\\">South Asia</a>, but now grows on most&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Continent\\\">continents</a>, as many different types of cucumber are traded on the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Global_market\\\">global market</a>. In&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/North_America\\\">North America</a>, the term&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Wild_cucumber\\\">wild cucumber</a></em>&nbsp;refers to plants in the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Genus\\\">genera</a>&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Echinocystis\\\">Echinocystis</a></em>&nbsp;and&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Marah_(plant)\\\">Marah</a></em>, though the two are not closely related. az</p>\\n\",\"en\":\"<p>Vithin which several&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cultivar\\\">cultivars</a>&nbsp;have been created. The cucumber originates from&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/South_Asia\\\">South Asia</a>, but now grows on most&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Continent\\\">continents</a>, as many different types of cucumber are traded on the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Global_market\\\">global market</a>. In&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/North_America\\\">North America</a>, the term&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Wild_cucumber\\\">wild cucumber</a></em>&nbsp;refers to plants in the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Genus\\\">genera</a>&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Echinocystis\\\">Echinocystis</a></em>&nbsp;and&nbsp;<em><a href=\\\"https://en.wikipedia.org/wiki/Marah_(plant)\\\">Marah</a></em>, though the two are not closely related. en&nbsp;</p>\\n\"}', '16', '3', '5', 'potato', '2022-09-07 03:20:52', '2022-09-07 03:20:52'),
(9, '{\"az\":\"\",\"en\":\"Tomato\"}', 32, '1043988454.jpg', '[\"2119508764.jpg\",\"270257044.jpg\"]', '1', '{\"az\":\"<p>The cucumber is a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vine#Horticultural_climbing_plants\\\">creeping vine</a>&nbsp;that roots in the ground and grows up&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Trellis_(agriculture)\\\">trellises</a>&nbsp;or other supporting frames, wrapping around supports with thin, spiraling&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Tendrils\\\">tendrils</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-3\\\">[3]</a>&nbsp;The plant may also root in a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Soilless_gardening\\\">soilless medium</a>, whereby it will sprawl along the ground in lieu of a supporting structure. The vine has large leaves that form a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Canopy_(biology)\\\">canopy</a>&nbsp;over the fruits.[<em><a href=\\\"https://en.wikipedia.org/wiki/Wikipedia:Citation_needed\\\">citation needed</a></em>] az</p>\\n\",\"en\":\"<p>The cucumber is a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vine#Horticultural_climbing_plants\\\">creeping vine</a>&nbsp;that roots in the ground and grows up&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Trellis_(agriculture)\\\">trellises</a>&nbsp;or other supporting frames, wrapping around supports with thin, spiraling&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Tendrils\\\">tendrils</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-3\\\">[3]</a>&nbsp;The plant may also root in a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Soilless_gardening\\\">soilless medium</a>, whereby it will sprawl along the ground in lieu of a supporting structure. The vine has large leaves that form a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Canopy_(biology)\\\">canopy</a>&nbsp;over the fruits.[<em><a href=\\\"https://en.wikipedia.org/wiki/Wikipedia:Citation_needed\\\">citation needed</a></em>] en</p>\\n\"}', '16', '2', '6', 'tomato', '2022-09-07 03:21:31', '2022-09-07 03:21:31'),
(10, '{\"az\":\"Salat\",\"en\":\"Salad\"}', 76, '400388336.jpg', '[\"1782656247.jpg\",\"1187270881.jpg\"]', '1', '{\"az\":\"<p>Cucumber fruits consist of 95% water (see nutrition table). In&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Botany\\\">botanical</a>&nbsp;terms, the cucumber is classified as a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pepo_(botany)\\\"><em>pepo</em></a>, a type of&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Berry_(botany)\\\">botanical berry</a>&nbsp;with a hard outer rind and no internal divisions. However, much like&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Tomato\\\">tomatoes</a>&nbsp;and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cucurbita\\\">squashes</a>, it is often perceived, prepared, and eaten as a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vegetable\\\">vegetable</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-5\\\">[5]</a>&nbsp;az</p>\\n\",\"en\":\"<p>Cucumber fruits consist of 95% water (see nutrition table). In&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Botany\\\">botanical</a>&nbsp;terms, the cucumber is classified as a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pepo_(botany)\\\"><em>pepo</em></a>, a type of&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Berry_(botany)\\\">botanical berry</a>&nbsp;with a hard outer rind and no internal divisions. However, much like&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Tomato\\\">tomatoes</a>&nbsp;and&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Cucurbita\\\">squashes</a>, it is often perceived, prepared, and eaten as a&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Vegetable\\\">vegetable</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-5\\\">[5]</a>&nbsp;en</p>\\n\"}', '17', '3', '4', 'salad', '2022-09-07 03:23:09', '2022-09-07 03:23:09'),
(11, '{\"az\":\"Qara İçki\",\"en\":\"Black Drink\"}', 120, '1084804988.jpg', '[\"29522506.jpg\",\"854893144.jpg\"]', '1', '{\"az\":\"<p>Most cucumber cultivars are seeded and require pollination. For this purpose, thousands of&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Honey_bee\\\">honey</a>&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Beehive\\\">beehives</a>&nbsp;are annually carried to cucumber fields just before bloom. Cucumbers may also be pollinated via&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Bumblebee\\\">bumblebees</a>&nbsp;and several other bee species. Most cucumbers that require pollination are&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Self_incompatibility_in_plants\\\">self-incompatible</a>, thus requiring the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pollen\\\">pollen</a>&nbsp;of another plant in order to form&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Seed\\\">seeds</a>&nbsp;and fruit.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-Nonnecke-6\\\">[6]</a>&nbsp;Some self-compatible cultivars exist that are related to the &#39;<a href=\\\"https://en.wikipedia.org/wiki/Lemon\\\">Lemon</a>&#39; cultivar.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-Nonnecke-6\\\">[6]</a>&nbsp;az</p>\\n\",\"en\":\"<p>Most cucumber cultivars are seeded and require pollination. For this purpose, thousands of&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Honey_bee\\\">honey</a>&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Beehive\\\">beehives</a>&nbsp;are annually carried to cucumber fields just before bloom. Cucumbers may also be pollinated via&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Bumblebee\\\">bumblebees</a>&nbsp;and several other bee species. Most cucumbers that require pollination are&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Self_incompatibility_in_plants\\\">self-incompatible</a>, thus requiring the&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Pollen\\\">pollen</a>&nbsp;of another plant in order to form&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Seed\\\">seeds</a>&nbsp;and fruit.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-Nonnecke-6\\\">[6]</a>&nbsp;Some self-compatible cultivars exist that are related to the &#39;<a href=\\\"https://en.wikipedia.org/wiki/Lemon\\\">Lemon</a>&#39; cultivar.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-Nonnecke-6\\\">[6]</a>&nbsp;en</p>\\n\"}', '20', '2', '4', 'black_drink', '2022-09-07 03:24:58', '2022-09-07 03:24:58'),
(12, '{\"az\":\"Alma Şirəsi\",\"en\":\"Apple Juice\"}', 130, '1677011897.jpg', '[\"421393698.jpg\",\"1039137826.jpg\",\"1575851824.jpg\"]', '1', '{\"az\":\"<p>Slicers grown commercially for the North American market are generally longer, smoother, more uniform in color, and have much tougher skin. In contrast, those in other countries, often called&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/European_cucumber\\\"><strong>European cucumbers</strong></a>, are smaller and have thinner, more delicate skin, often with fewer seeds, thus are often being sold in plastic skin for protection. This variety may also be called a&nbsp;<strong>telegraph cucumber</strong>, particularly in&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Australasia\\\">Australasia</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-11\\\">[11]</a>&nbsp;az</p>\\n\",\"en\":\"<p>Slicers grown commercially for the North American market are generally longer, smoother, more uniform in color, and have much tougher skin. In contrast, those in other countries, often called&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/European_cucumber\\\"><strong>European cucumbers</strong></a>, are smaller and have thinner, more delicate skin, often with fewer seeds, thus are often being sold in plastic skin for protection. This variety may also be called a&nbsp;<strong>telegraph cucumber</strong>, particularly in&nbsp;<a href=\\\"https://en.wikipedia.org/wiki/Australasia\\\">Australasia</a>.<a href=\\\"https://en.wikipedia.org/wiki/Cucumber#cite_note-11\\\">[11]</a>&nbsp;en</p>\\n\"}', '20', '2', '7', 'apple_juice', '2022-09-07 03:25:42', '2022-09-07 03:25:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '{\"az\":\"Balaca\",\"en\":\"Small\"}', '2022-09-05 05:48:07', '2022-09-07 03:10:54'),
(2, '{\"az\":\"Orta\",\"en\":\"Medium\"}', '2022-09-05 05:48:55', '2022-09-05 05:48:55'),
(3, '{\"az\":\"Böyük\",\"en\":\"Large\"}', '2022-09-07 03:11:34', '2022-09-07 03:11:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product__colors`
--

CREATE TABLE `product__colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product__colors`
--

INSERT INTO `product__colors` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(4, '{\"az\":\"Ağ\",\"en\":\"White\"}', 'ffff', '2022-09-07 03:09:19', '2022-09-07 03:09:19'),
(5, '{\"az\":\"Qara\",\"en\":\"Black\"}', '0000', '2022-09-07 03:09:31', '2022-09-07 03:09:31'),
(6, '{\"az\":\"Qirmizi\",\"en\":\"Red\"}', 'ff0000', '2022-09-07 03:10:02', '2022-09-07 03:10:02'),
(7, '{\"az\":\"Mavi\",\"en\":\"Blue\"}', '0001fe', '2022-09-07 03:10:29', '2022-09-07 03:10:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `alt`, `created_at`, `updated_at`) VALUES
(4, '20220818073518.jpg', 'Alt Attribute 2', '2022-08-18 02:53:37', '2022-08-18 03:35:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_status` int(10) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `superadmin` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `admin_status`, `image`, `superadmin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firengiz', 'firengizsariyeva77@gmail.com', 1, '2022081711206.png', '1', NULL, '$2y$10$zaqRZO3V4T2fDDE7PRASh.pWWvPhJKDmMr3CwXVa3mJIrHolxw//K', NULL, '2022-08-17 04:53:45', '2022-08-17 08:51:56'),
(2, 'Firengiz2', 'firengizsariyeva772@gmail.com', 1, NULL, '1', NULL, '$2y$10$MRSOThO2QDKWKoCyh3gOtOqAcuiphMDM9xDxHvowBS.YtX2GbG5lK', NULL, '2022-08-17 04:55:03', '2022-08-17 04:55:03'),
(3, 'firengiz79', 'firengizsariyeva79@gmail.com', 1, NULL, '2', NULL, '$2y$10$5dr6ESMJWbIKcGFy0dECFeLyTpRzECVTOP3WIn85YP0bcYShFNoq6', NULL, '2022-08-19 04:13:40', '2022-08-19 04:13:40');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product__colors`
--
ALTER TABLE `product__colors`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `product__colors`
--
ALTER TABLE `product__colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
