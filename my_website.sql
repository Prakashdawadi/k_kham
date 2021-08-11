-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 11:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin',' customer','vendor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'prakash ', 'prakash.dawadi2@gmail.com', '$2y$10$RCPYuqEkJvniEgkbuooOhOAJmYUzDK2NUg7ypCgi2DHwBQUIQml5O', 'admin', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bannners`
--

DROP TABLE IF EXISTS `bannners`;
CREATE TABLE `bannners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bans_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bans_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bans_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bans_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `added_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bannners`
--

INSERT INTO `bannners` (`id`, `bans_name`, `bans_link`, `bans_image`, `bans_status`, `added_by`, `created_at`, `updated_at`) VALUES
(9, 'first', 'firdt', 'img-06-04-21-06-43-05.jpg', 'active', '', '2021-04-21 00:58:05', '2021-04-21 00:58:05'),
(10, 'second', 'second', 'img-06-04-21-06-43-25.jpg', 'active', '', '2021-04-21 00:58:25', '2021-04-21 00:58:25'),
(11, 'third', 'third', 'img-06-04-21-06-43-43.jpg', 'active', '', '2021-04-21 00:58:43', '2021-04-21 00:58:43'),
(12, '4th', '4th', 'img-06-04-21-06-43-58.jpg', 'active', '', '2021-04-21 00:58:59', '2021-04-21 00:58:59'),
(13, '6th', '6th', 'img-06-04-21-06-44-23.jpg', 'active', '', '2021-04-21 00:59:23', '2021-04-21 00:59:23'),
(14, '7th', '7th', 'img-06-04-21-06-44-37.jpg', 'active', '', '2021-04-21 00:59:37', '2021-04-21 00:59:37'),
(15, '8th', '8th', 'img-06-04-21-06-44-52.jpg', 'active', '', '2021-04-21 00:59:52', '2021-04-21 00:59:52'),
(16, '9th', '9th', 'img-06-04-21-06-45-08.jpg', 'active', '', '2021-04-21 01:00:08', '2021-04-21 01:00:08'),
(17, '10th', '10th', 'img-06-04-21-06-45-22.jpg', 'active', '', '2021-04-21 01:00:22', '2021-04-21 01:00:22'),
(18, '11th', '11th', 'img-06-04-21-06-45-38.jpg', 'active', '', '2021-04-21 01:00:38', '2021-04-21 01:00:38'),
(19, '12th', '12th', 'img-06-04-21-06-45-53.jpg', 'active', '', '2021-04-21 01:00:53', '2021-04-21 01:00:53'),
(20, 'cheese', NULL, 'img-16-04-22-04-21-16.jpg', 'inactive', 'prakash.dawadi2@gmail.com', '2021-04-22 10:36:16', '2021-04-22 10:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `food_price` int(11) NOT NULL,
  `total_price` int(255) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_id` int(255) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `food_id`, `food_name`, `res_name`, `quantity`, `food_price`, `total_price`, `session_id`, `user_id`, `user_email`, `rest_id`, `status`, `created_at`, `updated_at`) VALUES
(750, 14, 'chickenmomo', 'Bothamomo', 1, 200, 200, 'AA1yDRAQXcI7n43uxbuCwqLGQ6m0c8WEDQq485s1', 32, 'aliza.dawadi2@gmail.com', 23, 'active', '2021-04-20 21:13:32', '2021-04-20 21:13:32'),
(751, 15, 'Muttonmomo', 'Bothamomo', 4, 310, 1240, 'AA1yDRAQXcI7n43uxbuCwqLGQ6m0c8WEDQq485s1', 32, 'aliza.dawadi2@gmail.com', 23, 'active', '2021-04-20 21:13:33', '2021-04-20 21:13:33'),
(752, 16, 'pannermomo', 'Bothamomo', 3, 280, 840, 'AA1yDRAQXcI7n43uxbuCwqLGQ6m0c8WEDQq485s1', 32, 'aliza.dawadi2@gmail.com', 23, 'active', '2021-04-20 21:13:35', '2021-04-20 21:13:35'),
(811, 29, 'Mango-orange Juice', 'Burgurhouse', 5, 130, 650, 'hqdvDyed5bJ00AAsBuKzue3mbsyRUIsdCeqvVcbU', 42, 'leezan.dawadi2@gmail.com', 14, 'active', '2021-05-28 09:28:23', '2021-05-28 09:28:23'),
(812, 30, 'Burgur', 'Burgurhouse', 5, 360, 1800, 'hqdvDyed5bJ00AAsBuKzue3mbsyRUIsdCeqvVcbU', 42, 'leezan.dawadi2@gmail.com', 14, 'active', '2021-05-28 09:28:24', '2021-05-28 09:28:24'),
(813, 31, 'Chicken Briyani', 'Burgurhouse', 3, 300, 900, 'hqdvDyed5bJ00AAsBuKzue3mbsyRUIsdCeqvVcbU', 42, 'leezan.dawadi2@gmail.com', 14, 'active', '2021-05-28 09:28:24', '2021-05-28 09:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupons_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupons_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupons_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Table structure for table `forgot_passwords`
--

DROP TABLE IF EXISTS `forgot_passwords`;
CREATE TABLE `forgot_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rememberToken` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fronends`
--

DROP TABLE IF EXISTS `fronends`;
CREATE TABLE `fronends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grand_totals`
--

DROP TABLE IF EXISTS `grand_totals`;
CREATE TABLE `grand_totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grand_totals`
--

INSERT INTO `grand_totals` (`id`, `user_id`, `email`, `all_total`, `created_at`, `updated_at`) VALUES
(42, 32, 'aliza.dawadi2@gmail.com', 2380, '2021-04-20 21:13:32', '2021-04-20 21:13:32'),
(48, 42, 'leezan.dawadi2@gmail.com', 3450, '2021-05-28 09:28:23', '2021-05-28 09:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_price` int(11) NOT NULL,
  `rests_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `menu_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_name`, `menu_price`, `rests_id`, `menu_status`, `menu_image`, `ingredients`, `direction`, `added_by`, `created_at`, `updated_at`) VALUES
(13, 'GRILLEDCHEESEROLLS', 300, 18, 'active', 'img-15-04-20-03-59-12.jpg', 'Bread\r\nCheese', '1 - Cut the Crust off the Bread\r\n2 - Flatten Bread with a rolling pin then top with a slice of cheese\r\n3 - Roll the cheese up in the bread then cook in a pan with melted butter over medium heat, until cheese is melted', '', '2021-04-20 10:14:12', '2021-04-20 10:14:12'),
(14, 'chickenmomo', 200, 23, 'active', 'img-16-04-20-04-17-00.jpg', '1 pound extra-lean ground chicken\r\n1 small onion, chopped\r\n8 ounces spinach, rinsed and chopped\r\n1 clove garlic, minced\r\n1 teaspoon grated fresh ginger root\r\n2 green onions, chopped\r\n2 tablespoons chopped fresh cilantro\r\nsalt to taste\r\n12 wonton wrappers\r\n1 tablespoon soy sauce\r\n1 tablespoon rice vinegar\r\n1 tablespoon chili oil\r\n1 (1/2 inch) piece fresh ginger root, grated', 'Step 1\r\nBring 3 inches of water in a large pot of water to a boil. You may also do this with a wok and steamer baskets.\r\n\r\nStep 2\r\nIn a large bowl, mix together the ground beef, onion, spinach, garlic, 1 teaspoon ginger, green onion, cilantro and salt. Place a spoonful of the filling onto a wonton wrapper; fold and crimp to seal. If necessary, wet the edges with water. Repeat with remaining filling and wrappers.\r\n\r\nStep 3\r\nSet a steamer tray in the pot, and place the momos on the steamer. Steam over rapidly boiling water for 30 minutes. Serve with the dipping sauce.\r\n\r\nStep 4\r\nTo make the dipping sauce, mix together the soy sauce, rice vinegar, chili oil and grated ginger in a small bowl.', '', '2021-04-20 10:32:00', '2021-04-20 10:32:00'),
(15, 'Muttonmomo', 310, 23, 'active', 'img-16-04-20-04-21-29.jpg', '1 pound extra-lean ground Mutton\r\n1 small onion, chopped\r\n8 ounces spinach, rinsed and chopped\r\n1 clove garlic, minced\r\n1 teaspoon grated fresh ginger root\r\n2 green onions, chopped\r\n2 tablespoons chopped fresh cilantro\r\nsalt to taste\r\n12 wonton wrappers\r\n1 tablespoon soy sauce\r\n1 tablespoon rice vinegar\r\n1 tablespoon chili oil\r\n1 (1/2 inch) piece fresh ginger root, grated', 'Step 1\r\nBring 3 inches of water in a large pot of water to a boil. You may also do this with a wok and steamer baskets.\r\n\r\nStep 2\r\nIn a large bowl, mix together the ground beef, onion, spinach, garlic, 1 teaspoon ginger, green onion, cilantro and salt. Place a spoonful of the filling onto a wonton wrapper; fold and crimp to seal. If necessary, wet the edges with water. Repeat with remaining filling and wrappers.\r\n\r\nStep 3\r\nSet a steamer tray in the pot, and place the momos on the steamer. Steam over rapidly boiling water for 30 minutes. Serve with the dipping sauce.\r\n\r\nStep 4\r\nTo make the dipping sauce, mix together the soy sauce, rice vinegar, chili oil and grated ginger in a small bowl.', '', '2021-04-20 10:36:29', '2021-04-20 10:36:29'),
(16, 'pannermomo', 280, 23, 'active', 'img-16-04-20-04-22-36.jpg', '1 pound  panner\r\n1 small onion, chopped\r\n8 ounces spinach, rinsed and chopped\r\n1 clove garlic, minced\r\n1 teaspoon grated fresh ginger root\r\n2 green onions, chopped\r\n2 tablespoons chopped fresh cilantro\r\nsalt to taste\r\n12 wonton wrappers\r\n1 tablespoon soy sauce\r\n1 tablespoon rice vinegar\r\n1 tablespoon chili oil\r\n1 (1/2 inch) piece fresh ginger root, grated', 'Step 1\r\nBring 3 inches of water in a large pot of water to a boil. You may also do this with a wok and steamer baskets.\r\n\r\nStep 2\r\nIn a large bowl, mix together the ground beef, onion, spinach, garlic, 1 teaspoon ginger, green onion, cilantro and salt. Place a spoonful of the filling onto a wonton wrapper; fold and crimp to seal. If necessary, wet the edges with water. Repeat with remaining filling and wrappers.\r\n\r\nStep 3\r\nSet a steamer tray in the pot, and place the momos on the steamer. Steam over rapidly boiling water for 30 minutes. Serve with the dipping sauce.\r\n\r\nStep 4\r\nTo make the dipping sauce, mix together the soy sauce, rice vinegar, chili oil and grated ginger in a small bowl.', '', '2021-04-20 10:37:36', '2021-04-20 10:37:36'),
(17, 'French Fries', 280, 21, 'active', 'img-03-04-21-03-15-10.jpg', '5 pounds russet potatoes,\r\nVegetable or peanut oil, for frying,\r\nSea salt', '1.Peel and rinse the potatoes. Then cut them into sticks by cutting the potato in 4 or 5 vertical pieces, and then cutting each piece into sticks. \r\n2.Place them in a large bowl and cover with cold water. Allow them to soak, 2 to 3 hours. (You can also stick them in the fridge and let them soak overnight.) \r\n3.When you\'re ready to make the fries, drain off the water and lay the potatoes on 2 baking sheets lined with paper towels. Blot with paper towels to dry them. \r\n4.Heat a few inches of oil in a heavy pot to 300 degrees F. In 3 or 4 batches, cook the potatoes until soft, 4 to 5 minutes per batch. They should not be brown at this point! You just want to start the cooking process. Remove each batch and drain on new/dry paper towels. \r\n5.Once all the potatoes have been fried at 300 degrees F, turn up the heat until the oil reaches 400 degrees F. When the oil\'s hot, start frying the potatoes in batches again, cooking until the fries are golden and crisp. Remove the potatoes from the oil and drain on paper towels. \r\n6..Sprinkle with sea salt and dive in!', '', '2021-04-20 21:30:10', '2021-04-20 21:30:10'),
(18, 'schezwan chicken', 460, 21, 'active', 'img-03-04-21-03-28-41.jpg', '½ onion,\r\n1 red pepper,\r\n400g boneless chicken thighs,\r\n3 garlic cloves,\r\n1 bird’s-eye chilli,\r\n1 spring onion,\r\n2 teaspoons Sichuan peppercorns,\r\n10 dried red chillies,\r\n200g cashew nuts,\r\n1½ tablespoons vegetable oil,\r\nThe Marinade,\r\n\r\n1 teaspoon sesame oil,\r\n2 teaspoons granulated sugar,\r\na large pinch of Chinese five-spice,\r\n3 tablespoons light soy sauce,\r\n1½ tablespoons cornflour,\r\nThe Sauce,\r\n\r\n2 teaspoons chilli paste or chilli bean paste,\r\n2 tablespoons light soy sauce,\r\n2 tablespoons hoisin sauce,\r\n3 tablespoons rice wine,', 'PREPARATION\r\n1. Slice the onion and red pepper into fine matchsticks and the chicken into 3cm-wide strips. Put the chicken into a small mixing bowl, add the marinade ingredients and, using your hands, massage the pieces until they are evenly coated.\r\n\r\n2. Finely chop the garlic and bird’s-eye chillies, and finely slice your spring onion. Crush the Sichuan peppercorns with a mortar and pestle. Mix all the sauce ingredients together in a small bowl or ramekin.\r\n\r\n3. BUILD YOUR WOK CLOCK: place your sliced onion at 12 o’clock, then arrange the peppers, dried chillies, chicken bowl, crushed peppercorns, garlic, bird’s-eye chillies, sauce bowl, cashew nuts and spring onions clockwise around your plate.\r\n\r\nCOOKING\r\n4. Heat 1 tablespoon of vegetable oil in a wok over a high heat until smoking-hot. Add the onions, red peppers and dried red chillies and stir-fry for 1–2 minutes, until the onions are lightly browned and slightly softened.\r\n\r\n5. Reduce the heat to medium (so as not to burn the onions), push the veg to the side of the wok and add ½ tablespoon of vegetable oil to the centre.\r\n\r\n6. Bring the wok back to smoking point, add the chicken and stir-fry 3–5 minutes until golden brown on all sides.\r\n\r\n7. Reduce the heat to medium, add the crushed peppercorns and garlic to the wok and stir-fry for a further 2 minutes, then add the bird’s-eye chillies and sauce and continue to stir-fry over a medium-high heat for another 2 minutes, or until the sauce has thickened and reduced and is sticking to the chicken.\r\n\r\n8. Add the cashew nuts and cook for a final 30–60 seconds, tossing the wok to combine all the ingredients well. Tip onto a large plate and scatter over the spring onion to finish. Serve.', '', '2021-04-20 21:43:41', '2021-04-20 21:43:41'),
(19, 'Chicken Fried Momo', 180, 21, 'active', 'img-03-04-21-03-48-23.jpg', '2 cup all purpose flour,\r\n1/2 tablespoon baking powder,\r\nsalt as required,\r\n2 cup refined oil,\r\nFor Filling-\r\n1 cup chicken\r\n1 tablespoon garlic,\r\n1/4 tablespoon vinegar,\r\n1/2 cup onion,\r\n1/2 tablespoon light soya sauce,\r\n1/4 tablespoon black pepper,', 'Step 1 Prepare the dough for momos\r\nTo prepare this delicious chicken momos recipe, mix all-purpose flour, salt and baking powder in a dough kneading plate and knead to a stiff dough using a little water. Keep it aside to rest for at least 30 minutes before you make balls out of it.\r\nstep 2 Prepare the chicken filling\r\nPut a saucepan over medium flame and heat 1 tbsp oil in it. When the oil is hot enough, add finely chopped onion and garlic in it. Once they are cooked until soft, add the chicken. Turn the heat high and take it off the heat until the chicken is almost cooked. Do not cook it completely. Mix in the soya sauce, salt, vinegar and black pepper.\r\nStep 3 Add in the filling and shape the pooris\r\nRoll the dough thin (translucent) and cut into 4\"-5\" rounds. Take a wrapper, wet the edges and place some filling in the centre, bring edges together to cover the filling, twist to seal and fill the rest in the same way.\r\n\r\nStep 4 Deep fry and serve\r\nPut a steamer over medium flame and steam these chicken momos for about 10 minutes, and leave them to cool. Meanwhile, heat some oil in a wok and once the oil is hot enough, carefully slip these steamed momos in it and deep-fry them. Remove on a kitchen napkin to soak the extra oil. Serve hot with spicy chutney!', '', '2021-04-20 22:03:23', '2021-04-20 22:03:23'),
(20, 'Pan Cakes', 270, 18, 'active', 'img-04-04-21-04-06-46.jpg', '100g plain flour,\r\n2 large eggs,\r\n300ml milk,\r\n1 tbsp sunflower or vegetable oil, plus a little extra for ,frying,', 'STEP 1\r\nPut 100g plain flour, 2 large eggs, 300ml milk, 1 tbsp sunflower or vegetable oil and a pinch of salt into a bowl or large jug, then whisk to a smooth batter.\r\n\r\nSTEP 2\r\nSet aside for 30 mins to rest if you have time, or start cooking straight away.\r\n\r\nSTEP 3\r\nSet a medium frying pan or crêpe pan over a medium heat and carefully wipe it with some oiled kitchen paper.\r\n\r\nSTEP 4\r\nWhen hot, cook your pancakes for 1 min on each side until golden, keeping them warm in a low oven as you go.\r\n\r\nSTEP 5\r\nServe with lemon wedges and caster sugar, or your favourite filling. Once cold, you can layer the pancakes between baking parchment, then wrap in cling film and freeze for up to 2 months.', '', '2021-04-20 22:21:46', '2021-04-20 22:21:46'),
(21, 'Gulab Jamun(per piece)', 20, 18, 'active', 'img-04-04-21-04-12-25.jpg', 'for jamun:\r\n¾ cup (100 grams) milk powder, unsweetened,\r\n½ cup (60 grams) maida / plain flour,\r\n½ tsp baking powder,\r\n2 tbsp ghee / clarified butter,\r\nmilk (for kneading),\r\nghee or oil (for frying),\r\nfor sugar syrup:,\r\n2 cup sugar,\r\n2 cup water,\r\n2 cardamom,\r\n¼ tsp saffron / kesar,\r\n1 tsp lemon juice,\r\n1 tsp rose water,', 'firstly, in a large bowl take ¾ cup milk powder, ½ cup maida and ½ tsp baking powder.\r\nmix well, homemade gulab jamun mix is ready.\r\nnow add 2 tbsp ghee and mix well making the flour moist.\r\nfurther, add milk as required start to combine.\r\ncombine well forming a soft dough. do not knead the dough.\r\ncover and rest for 10 minutes.\r\nmeanwhile, prepare the sugar syrup by taking 2 cup sugar, 2 cup water, 2 cardamom and ¼ tsp saffron.\r\nmix well and boil for 5 minutes or until the sugar syrup turns sticky. do not attain any string consistency.\r\nturn off the flame and add 1 tsp lemon juice and 1 tsp rose water. lemon juice is added to prevent sugar syrup from crystallizing.\r\ncover and keep the sugar syrup aside.\r\nafter 10 minutes or resting the dough, start to prepare small ball sized jamuns.\r\nmake sure there are no cracks in the jamun. if there are cracks then there are high chances for jamuns to break while frying.\r\ndeep fry in medium hot oil or ghee. frying in ghee gives good flavour to jamuns.\r\nstir continuously and fry on low flame.\r\nfry until the jamuns turn golden brown.\r\ndrain off and transfer the jamun into a hot sugar syrup.\r\ncover and rest for 2 hours or until jamuns absorb the sugar syrup and doubles in size.\r\nfinally, enjoy gulab jamun with ice cream or as it i', '', '2021-04-20 22:27:25', '2021-04-20 22:27:25'),
(22, 'Mutton Sekuwa', 300, 15, 'active', 'img-04-04-21-04-21-24.jpg', 'Boneless lamb or goat meat - 1and half pound,\r\nPlain yogurt – 2 table spoon,\r\nFinely chopped onions -1/2 cup,\r\nFinely chopped green onions    1/4 cup,\r\nLemon -1,\r\nGarlic, minced - 1 teaspoon,\r\nGinger, minced- 1 teaspoon,\r\nGinger, finely chopped and dipped in vinegar- 2 table spoon,\r\nRed chilies powder- 1 tablespoon,\r\nTurmeric-1/2 teaspoon,\r\nTimur-1/2 teaspoon,\r\nSalt to taste,\r\nBamboo sticks (pre-soaked in cold water for 30 min.),\r\nMelted butter for basting,', 'Cut the boneless meat into desire pieces (don’t make it too big or small either) \r\n\r\nMix all the ingredients together and let it marinate in freeze for about an hour\r\n\r\nIn a bamboo or metal stick pierce pieces of lamb, there should be at least ½ inch distance in between two pieces of meat (make chain of meat onto the stick, you can insert capsicum, onion also in the stick together with meat.)\r\nLit the grill\r\nWhen the fire is good put the stick in the grill, keep the meat stick rolling on\r\n \r\nLet the meat cook properly, check if red (blood) is completely drained from the meat, don’t eat till you see red liquid coming out of the meat\r\nKeep on increasing the heat if needed\r\n\r\nMeanwhile cut the lemon in small pieces\r\nWhen the sekuwa is ready serve it in a plate garnishing with finely chopped onion, ginger and coriander and sprinkle lemon juice as desired.  Puffed rice would be great combination to eat with Sekuwa.', '', '2021-04-20 22:36:24', '2021-04-20 22:36:24'),
(23, 'Chicken Tandoori', 390, 15, 'active', 'img-04-04-21-04-23-46.jpg', 'Chicken drum sticks or thighs 12 pieces of\r\nTandoori chicken powder (you get them in Indian Grocery stores)  ½ cup,\r\nPlain yogurt  ½ cup,\r\nlemon2,\r\nOnion 1,\r\nGreen onion1,\r\nMustard Oil 2 table spoon,\r\nRed bell-pepper (optional) 1,\r\nAluminum tray or foil,\r\nSalt to taste,', 'ake Chicken pieces one by one and make 3-4 deep cuts.    \r\n\r\nMix yogurt, tandoori powder, mustard oil and salt as required.\r\n\r\nMix the paste with chicken pieces and let it stand for at least 6 hours.\r\n\r\nAfter Six hours arrange pieces in tray, cover with aluminum foil\r\n\r\nBake at 350 F for 20 minutes.\r\n\r\nReduce heat to 250 F, and then bake and broil alternately in 30 min in a cycles for 2 hrs. \r\n\r\nOccasionally, take the tray, out, and rearrange the chicken pieces before putting them back in.\r\n\r\nIf there is too much water drain it.\r\n\r\nIf the chicken pieces look too dry, sprinkle some water mixed with lime juice on them\r\n\r\nAfter baking is done, take the pieces out and brush off the excess tandoori paste from them.\r\n\r\nPut the pieces in an open tray in the oven for 2-3 minutes( just to get them look crisp and dry.)\r\n\r\nYou can add a garnishing of stir-fried onions and bell-peppers and lime juice on the chicken before serving.\r\n\r\nServe hot...!!!', '', '2021-04-20 22:38:46', '2021-04-20 22:38:46'),
(24, 'Mutton Sukuti', 320, 15, 'active', 'img-04-04-21-04-26-57.jpg', 'Utensils-\r\n\r\nBig bowl,\r\nKnife,\r\nDry Cloth or metal wire,\r\n\r\nIngredients\r\n\r\nMeat loaf – 2 lbs,\r\nCumin powder,\r\nCoriander powder,\r\nChili powder,,\r\nTurmeric powder,\r\nGarlic and ginger paste,\r\nSalt, pepper, ,\r\nOil – Very less,', 'Cut the meat carefully into long thin strips \r\n\r\nRemove all the fat one by one\r\n\r\nPut the strips into a big bowl\r\n\r\nMarinate it with salt, cumin, coriander, pepper, chili powder and turmeric, ginger and garlic pastes\r\n\r\nKeep the marinated meat in Fridge for 24 hours to suck in all the ingredients\r\n\r\nSpread it out on a clean cloth and put in under the sun or hang on metal wire above the cooking stove in the kitchen (it is better to put in sun for a while before you keep it in kitchen) \r\n\r\n[You can use oven for quick dehydration or you can use real dehydrator machine if you have one – generally in Nepal these things are not used while making food at home]\r\n\r\nOnce the meat becomes dry store it and eat it as you want.', '', '2021-04-20 22:41:57', '2021-04-20 22:41:57'),
(25, 'Bhatmas Sadeko', 80, 15, 'active', 'img-04-04-21-04-30-54.JPG', 'Dried Soya beans (bhatmas)- ½ lb (full or broken into halves),\r\nGreen chili pepper – 1 finely cut into pieces,\r\nOnion -1 finely chopped,\r\nGinger – about 1 tablespoon finely chopped,\r\nGarlic – about 1 tablespoon finely chopped,\r\nGreen topped onion- 2 finely chopped,\r\nCoriander leaves- 1 table spoon finely chopped,\r\nLemon juice-1 teaspoon,\r\nRed chili powder-1 teaspoon,\r\nSalt as per taste,\r\nOil – 1 teaspoon ,\r\nThyme seed -1/2 teaspoon,', 'Fry soybeans (with oil or without oil) in a pan\r\n\r\nSpread fried soybeans in a big plate and roll the motor over it (to break soybeans into two halves and peels soybean covers out)\r\n\r\nFilter the broken soybean covers out from the plate \r\n\r\nPour the broken soybeans in the bowl and add all finely chopped ginger, garlic, onion, green topped onion\r\n\r\nAdd salt, red chili powder and lemon juice and coriander leaves to it\r\n\r\nStir and mix it well and add green chili pepper on it\r\n\r\nHeat a pan, pour oil, heat oil and add thyme seed into hot oil\r\n\r\nWhen thyme turns golden brown put the heat off and add turmeric powder \r\n\r\nPour this oil and thyme mixture to the soybean mixture you made before\r\n\r\nYour bhatmas sadeko is ready to serve. \r\n\r\nIt tastes best with beaten rice.', '', '2021-04-20 22:45:54', '2021-04-20 22:45:54'),
(26, 'selroti(per piece)', 40, 20, 'active', 'img-04-04-21-04-34-24.png', 'Rice - 2.5 Pound (or you can buy instant rice flour from market),\r\n\r\nWater or milk – Half liter (500 ml),\r\n\r\nGhee – 2 cups,\r\n\r\nSugar – 2 cups,\r\n\r\nCooking Oil – 1 liter,\r\nYou may add these for your taste-\r\n\r\n \r\n\r\nWheat flour – one cup,\r\n\r\nBacking soda to make it big (if you would like to )- Half table spoon,\r\n\r\nCardamom, cashew nuts,', 'Wash and soak rice overnight, drain excess water.\r\n\r\nMix ghee and sugar and grind into fine paste. The paste should be fine and greasy (lesilo).\r\n\r\nContinuously stir the mixture.\r\n\r\nCover it and leave at the room temperature for 1-2 hours to melt and mix all the ingredients\r\n\r\nHeat pan with cooking oil. The pan should be deep enough to float sel and the base should be flat.\r\n\r\nWatch for vapor/smoke from the oil or see the picking stick float on the oil.\r\n\r\nPour the not too thick batter as continuous ring into hot oil till they become brown/golden.\r\n\r\nConfirm both sides are brown.\r\n\r\n \r\n\r\nTake those sels out and serve as breakfast, tiffin or anytime.', '', '2021-04-20 22:49:24', '2021-04-20 22:49:24'),
(27, 'veg momo', 120, 20, 'active', 'img-04-04-21-04-39-53.jpg', 'Dough for wrappers\r\nAll-purpose flour,\r\nEdible oil – 1.5 tablespoon,\r\nWater\r\nSalt\r\nYou may need to add flavor on it,\r\nCumin Powder,\r\nCoriander Powder,\r\nTimmur (Szechwan pepper),\r\nTurmeric powder,\r\nGround black pepper,\r\nFresh red chilies, minced,\r\nMomo Masala, if available,\r\nFilling-\r\n \r\nGround vegetable – 2lbs (1 kg Approx),\r\nOne middle sized onion, very nicely chopped,\r\nTwo leaves of green onion, nicely chopped,\r\nCilantro, chopped,\r\nGarlic, minced/chopped – 1.5 teaspoon,\r\nGinger, minced/chopped – 1.5 teaspoon,\r\n2 tablespoon clarified butter,\r\nSalt to taste,', 'Combine flour, oil, salt and water in a bowl. Mix and knead till the dough becomes homogeneous in texture, it may take about 10-12 minutes. It is better to cover dough and wait for 30 min before you make wrappers. Don’t forget to knead well before start making wrappers.\r\n \r\nFilling\r\n \r\nIn a large bowl combine all filling ingredients. Stir well, adjust for seasoning with salt and pepper. Cover and allow at least half an hour to mix and impart their unique flavors completely.\r\n \r\nMaking/Wrapping\r\n \r\nGive the dough a final knead. Prepare 1-in. dough balls. Take a ball, roll between your palms to spherical shape. Dust working board with dry flour. On the board gently flatten the ball with your palm to about 2-in circle. Make a few semi-flattened circles, cover with a bowl. Use a rolling pin to roll out each flattened circle into a wrapper.\r\n \r\nTo make momo-cha better, it is important that the middle portion of the wrapper be slightly thicker than the edges to ensure the structural integrity of dumplings during packing and steaming. Hold the edges of the semi-flattened dough with one hand and with the other hand begin rolling the edges of the dough out, swirling a bit at a time. Continue until the wrapper attains 3-in diameter circular shape. Repeat with the remaining semi-flattened dough circles.', '', '2021-04-20 22:54:54', '2021-04-20 22:54:54'),
(28, 'Chatamari', 100, 23, 'active', 'img-04-04-21-04-58-53.JPG', 'Rice Flour-1 cup,\r\nLentil paste-1/3 cup,\r\nSalt-1/6 teaspoon,\r\n \r\nFor topping\r\n \r\nGround chicken/turkey or any other ground meat-150 gram,\r\nChopped onion¼ cup,\r\nGreen peas-¼ cup,\r\nDiced tomato-1 tablespoon,\r\nDiced hot green pepper1 teaspoon,\r\nGarlic-1 teaspoon,\r\nGinger-½ teaspoon,\r\nOil-1 tablespoon,\r\nSalt to taste,\r\n \r\nAlternative Toppings-\r\n \r\nEgg,\r\nRicotta cheese,', 'Pre-cooking\r\n \r\nSoak black lentil in water overnight or until the black coating is easily removed.\r\n\r\nRemove black coating by rinsing with water.\r\n\r\nMix lentil paste with rice flour to make a thin paste. (thinner then cake paste)\r\n\r\nFor topping mix everything well.\r\n \r\nCooking Part\r\n \r\nHeat the flat pan on medium heat\r\n\r\nPut the paste on the hot pan in rolling action making as thin of sheet as possible\r\n\r\nPut all topping on the paste.\r\n\r\nCover the paste and cook in medium heat (chatamari is cooked from only one side)\r\n\r\nCook until the paste is done and serve hot.\r\n\r\nUse the damp cloth to wipe out any burnt left behind\r\n \r\nChatamari Ready !!!', '', '2021-04-20 23:13:53', '2021-04-20 23:13:53'),
(29, 'Mango-orange Juice', 130, 14, 'active', 'img-05-04-21-05-07-40.jpg', '2 cup orange juice,\r\n2 tablespoon lemon juice,\r\nsalt as required,\r\n2 teaspoon sugar,\r\n4 ripe mangoes,\r\n1 cup water,\r\nblack pepper as required,\r\n1 orange,', 'Step 1 Mix sugar in water and blend mangoes to make a puree\r\nTo start with, take water in a bowl and add sugar to it. Mix it well till it dissolves. On the other hand, blend the mangoes in the blender until you get a smooth paste.\r\n\r\nStep 2 Mix orange juice with mango puree\r\nAdd orange juice, mango puree, lemon juice, salt and pepper to the already prepared sugary water and stir well. Serve chilled with ice cubes.', '', '2021-04-20 23:22:41', '2021-04-20 23:22:41'),
(30, 'Burgur', 360, 14, 'active', 'img-05-04-21-05-11-06.jpg', '1 pound ground lean (7% fat) chicken,\r\n\r\n1 large egg,\r\n\r\n½ cup minced onion,\r\n\r\n¼ cup fine dried bread crumbs,\r\n\r\n1 tablespoon Worcestershire,\r\n\r\n1 or 2 cloves garlic, peeled and minced\r\n\r\nAbout 1/2 teaspoon salt,\r\n\r\nAbout 1/4 teaspoon pepper,\r\n\r\n4 hamburger buns (4 in. wide), split,\r\n\r\nAbout 1/4 cup mayonnaise,\r\n\r\nAbout 1/4 cup ketchup,\r\n\r\n4 iceberg lettuce leaves, rinsed and crisped,\r\n\r\n1 firm-ripe tomato, cored and thinly sliced,\r\n\r\n4 thin slices red onion,', 'Step 1\r\nIn a bowl, mix ground beef, egg, onion, bread crumbs, Worcestershire, garlic, 1/2 teaspoon salt, and 1/4 teaspoon pepper until well blended. Divide mixture into four equal portions and shape each into a patty about 4 inches wide.\r\n\r\nStep 2\r\nLay burgers on an oiled barbecue grill over a solid bed of hot coals or high heat on a gas grill (you can hold your hand at grill level only 2 to 3 seconds); close lid on gas grill. Cook burgers, turning once, until browned on both sides and no longer pink inside (cut to test), 7 to 8 minutes total. Remove from grill.\r\n\r\nStep 3\r\nLay buns, cut side down, on grill and cook until lightly toasted, 30 seconds to 1 minute.\r\n\r\nStep 4\r\nSpread mayonnaise and ketchup on bun bottoms. Add lettuce, tomato, burger, onion, and salt and pepper to taste. Set bun tops in place.', '', '2021-04-20 23:26:06', '2021-04-20 23:26:06'),
(31, 'Chicken Briyani', 300, 14, 'active', 'img-05-04-21-05-16-48.jpg', '1 cup boiled basmati rice,\r\n1/2 teaspoon mint leaves,\r\nsalt as required,\r\n2 tablespoon refined oil,\r\n3 green cardamom,\r\n2 clove,\r\n2 onion,\r\n1 teaspoon turmeric,\r\n1 tablespoon garlic paste,\r\n1 cup hung curd,\r\n2 tablespoon coriander leaves,\r\nwater as required,\r\n1 tablespoon ghee,\r\n600 gm chicken\r\n1 tablespoon garam masala powder,\r\n1 teaspoon saffron,\r\n1 tablespoon bay leaf,\r\n1 black cardamom,\r\n1 teaspoon cumin seeds,\r\n4 green chillies,\r\n1 tablespoon ginger paste,\r\n1 teaspoon red chilli powder,\r\n1/2 tablespoon ginger,\r\n2 drops kewra,\r\n1 tablespoon rose water,', 'Step 1 Prepare saffron and kewra water\r\nTo make this delightful biryani, soak saffron in water to prepare saffron water. Next, mix kewra drops in water and mix well to make kewra water.\r\nStep 2 Saute onions and tomatoes for 2-3 minutes\r\nIn the meanwhile, heat refined oil in a deep bottomed pan. Once the oil is hot enough. Add cumin seeds, bay leaf, green cardamom, black cardamom, cloves in it, and saute for about a minute. Then, add chopped onion in it and saute until pink. Now, add chicken into it with slit green chillies, turmeric, salt to taste, ginger garlic paste, red chilli powder, and green chilli paste. Mix well all the spices and cook for 2-3 minutes. Then, add hung curd into it.\r\nStep 3 Cook on low heat for 5-6 minutes\r\nTurn the flame to medium again and add garam masala in it along with ginger julienned, coriander and mint leaves. Add kewra water, rose water and saffron water in it. Cook till the chicken is tender.\r\nStep 4 Serve hot with your favourite chutney or raita\r\nThen add 1 cup cooked rice and spread evenly. Then add saffron water and pour ghee over it. Cook for 15-20 minutes with closed lid and garnish with 1 tbsp fried onions and coriander leaves. Serve hot.', '', '2021-04-20 23:31:49', '2021-04-20 23:33:18'),
(32, 'Samosa with coke', 90, 20, 'active', 'img-05-04-21-05-24-10.jpg', '2 cup all purpose flour,\r\n1 teaspoon cumin seeds,\r\n1 teaspoon crushed ginger,\r\n1 teaspoon raisins,\r\n5 boiled potato,\r\n1 teaspoon coriander powder,\r\n1 teaspoon red chilli powder,\r\n1 teaspoon kasoori methi leaves,\r\n1 teaspoon carom seeds,\r\n1/4 cup water\r\n2 cup refined oil\r\n1/2 teaspoon coriander seeds\r\n1 teaspoon green chilli,\r\n1 teaspoon cashews,\r\n1 teaspoon cumin powder,\r\n1/2 teaspoon garam masala powder,\r\nsalt as required,\r\n1 teaspoon coriander leaves,,\r\n2 tablespoon ghee,\r\n1 handful raw peanuts,', 'Step 1 Sauté cumin seeds for potato filling\r\nTo make delicious samosas at home, first, make the filling. Put a pan on medium flame and add 2 tsp oil in it. Once the oil is hot enough, add cumin seeds and allow them to crackle.\r\nStep 2 Add spices and boiled potatoes and cook for a while\r\nNow, add whole coriander seeds, ginger and green chilli. Saute for a minute and then add chopped cashews and raisins, peanuts if you like them, boiled and mashed potatoes, cumin powder, coriander powder, garam masala powder, red chilli powder, salt to taste, kasoori methi leaves, coriander leaves. Mix well and saute for 2 minutes. Your stuffing is ready!\r\nStep 3 Prepare the dough for the Samosa\r\nNow, to prepare the dough, take a mixing bowl and combine all-purpose flour along with carom seeds and salt. Mix and then add ghee and start kneading by adding a little water at a time. Ensure that you add water gradually and make a firm dough. A soft dough will not make your samosas crispy. Cover the dough with a damp muslin cloth and keep aside for about half an hour.\r\n\r\nStep 4 Roll the dough in small puris and cut into half\r\nOnce done, roll out few small-sized balls from the dough. Flatten them further with the help of your palms and then with a rolling pin. Give them a round shape and cut in half. Now dip your hands in water, fold the edges of the semi-circle in order to give it a cone shape.\r\n\r\nStep 5 Fill the semi-circle with potato filling and deep fry\r\nTake the filling with the help of a spoon and stuff it in the cone. Seal the ends properly by pressing the edges lightly with your fingers. Then, heat oil in a pan and deep fry the samosas on low heat until they turn golden brown and crispy. Serve with tomato ketchup and green chutney. Enjoy it as a tea-time snack!', '', '2021-04-20 23:39:10', '2021-04-20 23:39:10'),
(33, 'Pizza', 360, 16, 'active', 'img-05-04-21-05-54-08.jpg', '2 ½ cups warm water (600 mL)\r\n1 teaspoon sugar\r\n2 teaspoons active dry yeast\r\n7 cups all-purpose flour (875 g), plus more for dusting\r\n6 tablespoons extra virgin olive oil, plus more for greasing\r\n1 ½ teaspoons kosher salt\r\n¼ cup semolina flour (30 g)', '“Bloom” the yeast by sprinkling the sugar and yeast in the warm water. Let sit for 10 minutes, until bubbles form on the surface.\r\nIn a large bowl, combine the flour and salt. Make a well in the middle and add the olive oil and bloomed yeast mixture. Using a spoon, mix until a shaggy dough begins to form.\r\nOnce the flour is mostly hydrated, turn the dough out onto a clean work surface and knead for 10-15 minutes. The dough should be soft, smooth, and bouncy. Form the dough into a taut round.\r\nGrease a clean, large bowl with olive oil and place the dough inside, turning to coat with the oil. Cover with plastic wrap. Let rise for at least an hour, or up to 24 hours.\r\nPunch down the dough and turn it out onto a lightly floured work surface. Knead for another minute or so, then cut into 4 equal portions and shape into rounds.\r\nLightly flour the dough, then cover with a kitchen towel and let rest for another 30 minutes to an hour while you prepare the sauce and any other ingredients.\r\nPreheat the oven as high as your oven will allow, between 450-500˚F (230-260˚C). Place a pizza stone, heavy baking sheet (turn upside down so the surface is flat), or cast iron skillet in the oven.\r\nMeanwhile, make the tomato sauce: Add the salt to the can of tomatoes and puree with an immersion blender, or transfer to a blender or food processor, and puree until smooth.\r\nOnce the dough has rested, take a portion and start by poking the surface with your fingertips, until bubbles form and do not deflate.\r\nThen, stretch and press the dough into a thin round. Make it thinner than you think it should be, as it will slightly shrink and puff up during baking.\r\nSprinkle semolina onto an upside down baking sheet and place the stretched crust onto it. Add the sauce and ingredients of your choice.\r\nSlide the pizza onto the preheated pizza stone or pan. Bake for 15 minutes, or until the crust and cheese are golden brown.\r\nAdd any garnish of your preference.\r\nNutrition Calories: 1691 Fat: 65 grams Carbs: 211 grams Fiber: 12 grams Sugars: 60 grams Protein: 65 grams\r\nEnjoy!', '', '2021-04-21 00:09:08', '2021-04-21 00:09:08'),
(34, 'Fresh Spring Rolls', 345, 16, 'active', 'img-06-04-21-06-00-32.jpg', '2 ounces rice vermicelli,\r\n8 rice wrappers (8.5 inch diameter),\r\n8 large cooked shrimp - peeled, deveined and cut in half,\r\n1 ⅓ tablespoons chopped fresh Thai basil,\r\n3 tablespoons chopped fresh mint leaves,\r\n3 tablespoons chopped fresh cilantro,\r\n2 leaves lettuce, chopped,\r\n4 teaspoons fish sauce,\r\n¼ cup water,\r\n2 tablespoons fresh lime juice\r\n1 clove garlic, minced,\r\n2 tablespoons white sugar,\r\n½ teaspoon garlic chili sauce,\r\n3 tablespoons hoisin sauce,\r\n1 teaspoon finely chopped peanuts,', 'Step 1\r\nBring a medium saucepan of water to boil. Boil rice vermicelli 3 to 5 minutes, or until al dente, and drain.\r\n\r\nStep 2\r\nFill a large bowl with warm water. Dip one wrapper into the hot water for 1 second to soften. Lay wrapper flat. In a row across the center, place 2 shrimp halves, a handful of vermicelli, basil, mint, cilantro and lettuce, leaving about 2 inches uncovered on each side. Fold uncovered sides inward, then tightly roll the wrapper, beginning at the end with the lettuce. Repeat with remaining ingredients.\r\n\r\nStep 3\r\nIn a small bowl, mix the fish sauce, water, lime juice, garlic, sugar and chili sauce.\r\n\r\nStep 4\r\nIn another small bowl, mix the hoisin sauce and peanuts.\r\n\r\nStep 5\r\nServe rolled spring rolls with the fish sauce and hoisin sauce mixtures.', '', '2021-04-21 00:15:33', '2021-04-21 00:15:33'),
(35, 'Grilled Chicken Tikka', 470, 17, 'active', 'img-06-04-21-06-06-19.jpg', '3large boneless skinless chicken breasts,\r\n2tablespoons fresh lemon juice,\r\n1cup plain yogurt,\r\n1tablespoon pressed garlic,\r\n1tablespoon freshly grated ginger,\r\n1⁄2teaspoon ground cumin,\r\n1⁄2teaspoon ground turmeric,\r\n2 1⁄2tablespoons cayenne pepper,\r\n1⁄3teaspoon salt,\r\n1⁄3teaspoon fresh ground black pepper,\r\nmelted butter or olive oil, for brushing,\r\nlime, for serving', 'Clean your chicken, and cut it into cubes for threading on skewers.\r\nTake a fork and prick the chicken many times.\r\nPut lemon juice in bowl with chicken, stir well, and set it aside.\r\nIn a large bowl, mix yogurt, garlic, ginger, cumin, turmeric, cayenne, salt and pepper.\r\nPlace the chicken in the bowl with the marinade, and marinate for at least 2 hours, preferably 4-6 hours.\r\nThread chicken onto skewers.\r\nHeat your grill with a nice flame and place chicken skewers on the grill.\r\nBrush with butter or olive oil, and grill approximately 6 minutes on each side, or until done, having nice grill/char markiings.\r\nOnce you have grilled one side for 6 minutes, turn them over and brush with butter or olive oil, and grill 6 more minutes or until done.\r\nServe with lime wedges on the side for squirting on chicken pieces; YUM!', '', '2021-04-21 00:21:19', '2021-04-21 00:21:19'),
(36, 'Mocha coffee', 310, 17, 'active', 'img-06-04-21-06-11-24.jpg', '1 cup hot brewed coffee,\r\n1 tablespoon unsweetened cocoa powder,\r\n1 tablespoon white sugar,\r\n2 tablespoons milk,', 'Pour hot coffee into a mug. Stir in cocoa, sugar and milk.', '', '2021-04-21 00:26:24', '2021-04-21 00:28:01'),
(37, 'chicken chowmin', 160, 17, 'active', 'img-06-04-21-06-18-34.jpg', '225g dried or fresh egg noodles,\r\n1 tbsp sesame oil, plus 1 tsp,\r\n100g boneless, skinless chicken breasts, cut into fine shreds,\r\n2½ tbsp groundnut oil,\r\n2 garlic cloves, finely chopped,\r\n50g mangetout, finely shredded,\r\n50g prosciutto or cooked ham, finely shredded,\r\n2 tsp light soy sauce,\r\n2 tsp dark soy sauce,\r\n1 tbsp Shaohsing rice wine or dry sherry,\r\n½ tsp freshly ground white pepper,\r\n½ tsp golden caster sugar,\r\n2 spring onions, finely chopped,\r\nFor the marinade,\r\n2 tsp light soy sauce,\r\n2 tsp Shaoxing rice wine or dry Sherry,\r\n1 tsp sesame oil,\r\n½ tsp freshly ground white pepper,', 'STEP 1\r\nCook 225g egg noodles in a large pan of boiling water for 3-5 mins, then drain and put them in cold water. Drain thoroughly, toss them with 1 tbsp sesame oil and set aside.\r\n\r\nSTEP 2\r\nCombine 100g chicken breasts, cut into fine shreds, with 2 tsp light soy sauce, 2 tsp Shaohsing rice wine or dry sherry, 1 tsp sesame oil, ½ tsp white pepper and ½ tsp salt for the marinade, mix well and then leave to marinate for about 10 mins.\r\n\r\nSTEP 3\r\nHeat a wok over a high heat. Add 1 tbsp groundnut oil and, when it is very hot and slightly smoking, add the chicken shreds.\r\n\r\nSTEP 4\r\nStir-fry for about 2 mins and then transfer to a plate.\r\n\r\nSTEP 5\r\nWipe the wok clean, reheat until it is very hot then add 1½ tbsp groundnut oil.\r\n\r\nSTEP 6\r\nWhen the oil is slightly smoking, add the 2 finely chopped garlic cloves and stir-fry for 10 seconds.\r\n\r\nSTEP 7\r\nAdd 50g finely shredded mangetout and 50g finely shredded prosciutto, and stir-fry for about 1 min.\r\n\r\nSTEP 8\r\nAdd the noodles, 2 tsp light soy sauce, 2 tsp dark soy sauce,1 tbsp Shaohsing rice wine or dry sherry, ½ tsp white pepper, ½ tsp golden caster sugar, 2 finely chopped spring onions and 1 tsp salt.\r\n\r\nSTEP 9\r\nStir-fry for 2 mins. Return the chicken and any juices to the noodle mixture. Stir-fry for about 3-4 mins or until the chicken is cooked.\r\n\r\nSTEP 10\r\nAdd 1 tsp sesame oil and give the mixture a few final stirs. Put on a warm platter and serve immediately.', '', '2021-04-21 00:33:34', '2021-04-21 00:33:34'),
(38, 'chicken momo', 160, 19, 'active', 'img-06-04-21-06-24-43.jpg', '4 cups all-purpose flour,\r\n\r\n2 1/2 pounds ground chicken thighs ,\r\n\r\n1 cup chopped fresh cilantro ,\r\n\r\n1 cup chopped onions ,\r\n\r\n4 tablespoons minced garlic ,\r\n\r\n4 tablespoons minced peeled ginger ,\r\n\r\n2 tablespoons ground cumin, \r\n\r\n1 teaspoon ground cinnamon ,\r\n\r\nSalt and black pepper ,\r\n\r\nNonstick cooking spray', 'Mix together the flour and 1 1/2 cups room temperature water in a bowl. Knead the dough well until it is medium-firm and flexible. Cover and let rest for 1 hour.\r\nMeanwhile, mix together the chicken, cilantro, onions, garlic, ginger, cumin, cinnamon, 2 tablespoons salt and 1/2 teaspoon pepper in a bowl.\r\nTo make the wrappers: Break off 1/2 ounce of dough and forming it into a ball. Place the ball on a flat surface and roll it into a 4-inch round with a rolling pin. Repeat with the remaining dough.\r\nSpray a steamer pan with cooking spray.\r\nPlace a tablespoon of the chicken filling in the middle of a wrapper. Holding the wrapper in your left hand. Use your right thumb and index finger to start pinching the edges of the wrapper together. Pinch and fold until the edges of the circle close up like a little satchel. Place the momo in the prepared steamer pan. Repeat with remaining wrappers and filling.\r\nFill the steamer pot halfway with water and bring to a boil. Set the steamer pan with the momos on top of the pot and cover with a tight lid. Steam the momos until cooked, 8 to 9 minutes.', '', '2021-04-21 00:39:43', '2021-04-21 00:39:43'),
(39, 'Black coffee', 80, 19, 'active', 'img-06-04-21-06-28-00.jpg', 'Instant Coffee powder - 1 tsp (or more as per choice),\r\n1 cup of water (or as per the size of your mug),\r\n1 tsp Sugar or as per taste,', 'Method 1\r\nBoil the water.\r\nAdd coffee powder and sugar in a mug.\r\nPour the boiling water and stir. Your black coffee is ready.\r\nMethod 2\r\nAdd water, coffee powder and sugar in a microwave safe mug and micro it for 1 minute.\r\nYou can microwave it for longer but keep a check as to prevent it from boiling over. Stir and enjoy.', '', '2021-04-21 00:43:00', '2021-04-21 00:43:00'),
(40, 'Chicken Roast', 550, 19, 'active', 'img-06-04-21-06-32-02.jpg', '1 onion, roughly chopped\r\n2 carrots, roughly chopped\r\n1 free range chicken, about 1.5kg/3lb 5oz\r\n1 lemon, halved\r\nsmall bunch thyme (optional)\r\n25g butter, softened\r\nFor the gravy\r\n1 tbsp plain flour\r\n250ml chicken stock (a cube is fine', 'STEP 1\r\nHeat oven to 190C/fan 170C/gas 5. Have a shelf ready in the middle of the oven without any shelves above it.\r\n\r\nSTEP 2\r\nScatter 1 roughly chopped onion and 2 roughly chopped carrots over the base of a roasting tin that fits the whole 1 ½ kg chicken, but doesn’t swamp it.\r\n\r\nSTEP 3\r\nSeason the cavity of the chicken liberally with salt and pepper, then stuff with 2 lemon halves and a small bunch of thyme, if using.\r\n\r\nSTEP 4\r\nSit the chicken on the vegetables, smother the breast and legs all over with 25g softened butter, then season the outside with salt and pepper.\r\n\r\nSTEP 5\r\nPlace in the oven and leave, undisturbed, for 1 hr 20 mins – this will give you a perfectly roasted chicken. To check, pierce the thigh with a skewer and the juices should run clear.\r\n\r\nSTEP 6\r\nCarefully remove the tin from the oven and, using a pair of tongs, lift the chicken to a dish or board to rest for 15-20 mins. As you lift the dish, let any juices from the chicken pour out of the cavity into the roasting tin.\r\n\r\nSTEP 7\r\nWhile the chicken is resting, make the gravy. Place the roasting tin over a low flame, then stir in 1 tbsp flour and sizzle until you have a light brown, sandy paste.\r\n\r\nSTEP 8\r\nGradually pour in 250ml chicken stock, stirring all the time, until you have a thickened sauce.\r\n\r\nSTEP 9\r\nSimmer for 2 mins, using a wooden spoon to stir, scraping any sticky bits from the tin.\r\n\r\nSTEP 10\r\nStrain the gravy into a small saucepan, then simmer and season to taste. When you carve the bird, add any extra juices to the gravy.', '', '2021-04-21 00:47:02', '2021-04-21 00:47:02'),
(41, 'veg momo', 555, 16, 'inactive', 'img-16-04-22-04-26-05.jpg', 'fgnghhgmhkjykuktukm', 'jhkjhkkhgnfnfgnggnhngh', 'prakash.dawadi2@gmail.com', '2021-04-22 10:41:05', '2021-04-22 10:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_19_062044_create_admins_table', 1),
(5, '2021_01_20_144747_create_categories_table', 1),
(6, '2021_01_22_125052_create_coupons_table', 1),
(7, '2021_01_23_050139_create_bannners_table', 1),
(8, '2021_01_24_160758_create_fronends_table', 1),
(9, '2021_01_26_071024_create_resturants_table', 1),
(10, '2021_01_26_082250_create_menus_table', 1),
(11, '2021_01_30_053139_create_carts_table', 1),
(12, '2021_02_01_175215_create_admins_table', 2),
(13, '2021_02_02_050431_create_customers_table', 3),
(14, '2021_04_04_124413_create_grand_totals_table', 4),
(15, '2021_04_05_041311_create_orders_table', 5),
(16, '2021_04_07_165602_create_orders_table', 6),
(17, '2021_04_07_171936_create_my_orders_table', 6),
(18, '2021_04_08_132815_create_vendors_table', 7),
(19, '2021_04_09_032652_create_forgot_passwords_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `rest_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_items`)),
  `quantity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quantity`)),
  `sub_total` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sub_total`)),
  `user_id` int(20) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all_total` int(11) NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('preparing','Ontheway','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'preparing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `rest_id`, `rest_name`, `order_items`, `quantity`, `sub_total`, `user_id`, `user_name`, `email`, `phone`, `user_address`, `all_total`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES
(136, 8865077, 15, 'Kanchanhotel', '[\"Mutton Sekuwa\",\"Chicken Tandoori\",\"Mutton Sukuti\",\"Bhatmas Sadeko\"]', '[2,2,2,2]', '[300,390,320,80]', 23, 'prakash dawadi', 'prakash.dawadi2@gmail.com', 9848700076, 'Bhemdatta-18', 2280, 'cash on delivery', 'delivered', '2021-04-21 01:24:54', '2021-04-21 01:24:54'),
(137, 323942, 17, 'Hotelchetan', '[\"Grilled Chicken Tikka\",\"Mocha coffee\"]', '[2,1]', '[470,310]', 33, 'BP Joshi', 'bpjoshi2051@gmail.com', 9848700076, 'hostel siddhnth science campus 18', 1350, 'cash on delivery', 'delivered', '2021-04-22 00:54:55', '2021-04-22 00:54:55'),
(138, 8665966, 23, 'Bothamomo', '[\"chickenmomo\"]', '[3]', '[200]', 34, 'Prabeen Airee', 'Prabeen.airee@gmail.com', 9848576822, 'hostel siddhnth science campus 18', 700, 'cash on delivery', 'preparing', '2021-04-23 01:10:58', '2021-04-23 01:10:58'),
(139, 7637764, 15, 'Kanchanhotel', '[\"Mutton Sekuwa\",\"Chicken Tandoori\",\"Bhatmas Sadeko\",\"Mutton Sukuti\"]', '[1,1,1,1]', '[300,390,80,320]', 23, 'prakash dawadi', 'prakash.dawadi2@gmail.com', 9848700076, 'Bhemdatta-18', 1190, 'cash on delivery', 'preparing', '2021-04-26 07:11:54', '2021-04-26 07:11:54'),
(140, 6107401, 14, 'Burgurhouse', '[\"Mango-orange Juice\",\"Burgur\",\"Chicken Briyani\"]', '[1,1,2]', '[130,360,300]', 37, 'prakash dawadi', 'pd@gmail.com', 9848700076, 'Bhemdatta-18', 1190, 'cash on delivery', 'preparing', '2021-05-28 05:54:11', '2021-05-28 05:54:11'),
(141, 5385080, 15, 'Kanchanhotel', '[\"Mutton Sekuwa\",\"Chicken Tandoori\",\"Mutton Sukuti\",\"Bhatmas Sadeko\"]', '[2,1,1,1]', '[300,390,320,80]', 43, 'prakash dawadi', 'pd12@gmail.com', 9848700076, 'Bhemdatta-18', 1490, 'cash on delivery', 'Ontheway', '2021-05-28 23:20:13', '2021-05-28 23:20:13'),
(142, 6098777, 15, 'Kanchanhotel', '[\"Mutton Sekuwa\",\"Chicken Tandoori\"]', '[2,2]', '[300,390]', 44, 'prakash dawadi', 'pd123@gmail.com', 9848700076, 'Bhemdatta-18', 1480, 'cash on delivery', 'delivered', '2021-05-29 00:11:01', '2021-05-29 00:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resturants`
--

DROP TABLE IF EXISTS `resturants`;
CREATE TABLE `resturants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_phone` bigint(255) NOT NULL,
  `rest_otime` time NOT NULL,
  `rest_ctime` time NOT NULL,
  `rest_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_cimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `added_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturants`
--

INSERT INTO `resturants` (`id`, `rest_name`, `rest_address`, `rest_email`, `rest_phone`, `rest_otime`, `rest_ctime`, `rest_image`, `rest_cimage`, `rest_status`, `added_by`, `created_at`, `updated_at`) VALUES
(14, 'Burgurhouse', 'Galli  no-5', 'umangkafle1@gmail.com', 91550972, '10:00:00', '19:00:00', 'img-15-04-20-03-10-35.jpg', 'img-15-04-20-03-10-35.jpg', 'active', '', '2021-04-20 09:25:35', '2021-04-20 09:50:03'),
(15, 'Kanchanhotel', 'Galli no-1, MNR', 'ramkhatri1@gmail.com', 9822345667, '12:00:00', '23:00:00', 'img-15-04-20-03-15-14.jpg', 'img-15-04-20-03-15-14.jpg', 'active', '', '2021-04-20 09:30:14', '2021-04-20 09:50:41'),
(16, 'OperaHotel', 'Bazar,MNR', 'aliza1@gmail.com', 9868729180, '10:00:00', '21:00:00', 'img-15-04-20-03-16-22.jpg', 'img-15-04-20-03-16-22.jpg', 'active', '', '2021-04-20 09:31:22', '2021-04-20 09:31:22'),
(17, 'Hotelchetan', 'Bhansi-18,MNR', 'prayan1@gmail.com', 9848449447, '09:00:00', '22:00:00', 'img-15-04-20-03-17-43.jpg', 'img-15-04-20-03-17-43.jpg', 'active', '', '2021-04-20 09:32:43', '2021-04-20 09:32:43'),
(18, 'gangotriHotel', 'Near Buspark,MNR', 'riwaj1@gmail.com', 9865554321, '08:00:00', '19:00:00', 'img-15-04-20-03-19-03.jpg', 'img-15-04-20-03-19-03.jpg', 'active', '', '2021-04-20 09:34:03', '2021-04-20 09:34:03'),
(19, 'BrotherCafe', 'Bhansi-18,MNR', 'nirmala1@gmail.com', 9876556743, '10:00:00', '12:00:00', 'img-15-04-20-03-21-14.jpg', 'img-15-04-20-03-21-14.jpg', 'active', '', '2021-04-20 09:36:14', '2021-04-20 09:36:14'),
(20, 'sweetdream', 'Near,Traffic Office,MNR', 'padam1@gmail.com', 9848975215, '09:30:00', '19:45:00', 'img-15-04-20-03-22-32.jpg', 'img-15-04-20-03-22-32.jpg', 'active', '', '2021-04-20 09:37:32', '2021-04-20 09:37:32'),
(21, '9-11hotel', 'Galli no-4 MNR', 'subham1@gmail.com', 9868461266, '10:30:00', '22:04:00', 'img-15-04-20-03-24-13.jpg', 'img-15-04-20-03-24-13.jpg', 'active', '', '2021-04-20 09:39:13', '2021-04-20 21:31:30'),
(22, 'GrandPacific', 'Galli no-4 MNR', 'Raghav1@gmail.com', 9812345676, '10:45:00', '20:10:00', 'img-15-04-20-03-25-27.jpg', 'img-15-04-20-03-25-27.jpg', 'inactive', '', '2021-04-20 09:40:27', '2021-04-21 00:48:02'),
(23, 'Bothamomo', 'Bazar,MNR', 'rakesh1@gmail.com', 9867543189, '10:00:00', '23:00:00', 'img-15-04-20-03-26-37.png', 'img-15-04-20-03-26-37.png', 'active', '', '2021-04-20 09:41:37', '2021-04-20 09:49:17'),
(24, 'bphotel', 'Bhemdatta-18', 'bpjoshi1@gmail.com', 9848700076, '11:11:00', '12:11:00', 'img-07-04-22-07-01-04.jpg', 'img-07-04-22-07-01-04.jpg', 'inactive', 'prakash.dawadi2@gmail.com', '2021-04-22 01:16:04', '2021-04-23 01:03:06'),
(26, 'Melissa Alston', 'Tenetur dolores eos', 'LEEZAN.DAWADI2@GMAIL.COM', 59, '11:38:00', '00:05:00', 'img-12-05-28-12-25-25.jpg', 'img-12-05-28-12-25-25.jpg', 'inactive', 'prakash.dawadi2@gmail.com', '2021-05-28 06:40:25', '2021-05-28 06:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(255) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer','vendor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `status`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(23, 'prakash', 'prakash.dawadi2@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$NHOpNRHz4l/SkoFJoSRqHumVenJU0YltGHH1qv4uqtmlQUIBN0dx6', NULL, '2021-02-02 08:56:47', '2021-04-22 09:51:47'),
(26, 'babu', 'babu@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$rzP2K9ky8jv9HEgqNRiId.5M59tJnPlvpC5pY0UrUUGwe6y7sMY..', NULL, '2021-04-12 10:08:22', '2021-04-12 10:08:22'),
(27, 'Christen Malone', 'cixepeb@mailinator.com', 6, 'active', 'customer', NULL, '$2y$10$3KE1EdWWzcv4U/31r2LTHu7upkfo2RCVGts/VbGz9Vu6BT//szpve', NULL, '2021-04-12 10:12:07', '2021-04-12 10:12:07'),
(28, 'Colette Moran', 'gajujafige@mailinator.com', 8, 'active', 'customer', NULL, '$2y$10$dzSC4TzwpmiKO1QrEhXwbuIDqJ0FmGYnzPzD/TJuX1XNQZL0g3koW', NULL, '2021-04-12 10:13:09', '2021-04-12 10:13:09'),
(29, 'Jemima Baldwin', 'futupepa@mailinator.com', 93, 'active', 'customer', NULL, '$2y$10$4h/1aG7Qv3CZEFPjIigRF.bEzkURCFHtrZaG5KinrEA0fQBxg7VLS', NULL, '2021-04-12 10:14:06', '2021-04-12 10:14:06'),
(31, 'riwaj joshi', 'rjoshi123@gmail.com', 9865574506, 'active', 'customer', NULL, '$2y$10$v3sXitp8T6hpusYkIS3d/.4iVW6rtGfX90bS73O51ZkpaxEfp4lvu', NULL, '2021-04-20 00:10:37', '2021-04-20 00:10:37'),
(32, 'aliza', 'aliza.dawadi2@gmail.com', 9868729180, 'active', 'customer', NULL, '$2y$10$jMxUOpNFPDludYwu68kaRe.stod8AJmC0eNuodlea1HoRXbFvH1He', NULL, '2021-04-20 21:13:25', '2021-04-20 21:13:25'),
(33, 'BP Joshi', 'bpjoshi2051@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$VoLa9NtkX53Xug2O9GUPQejC/qMhNk/ohZBeK2wupL7aQ7LbBCMMq', NULL, '2021-04-22 00:52:20', '2021-04-22 00:52:20'),
(34, 'Prabeen Airee', 'Prabeen.airee@gmail.com', 9848576822, 'active', 'customer', NULL, '$2y$10$k8886uuQNy0V4ra3WO30oOa9d9fiWtX274lkF/loA6xxjaL3TtzyK', NULL, '2021-04-23 01:08:17', '2021-04-23 01:08:17'),
(35, 'Kavita', 'kavita@gmail.com', 9876665432, 'active', 'customer', NULL, '$2y$10$xTE0JFhKl01e1MJUOaH4AuG8eanXMN329FT.WfzxI7QZOta5xd5ny', NULL, '2021-05-01 01:27:16', '2021-05-01 01:27:16'),
(36, 'prakash dawadi', 'user111@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$XoFNb/l2M94d4cy10RXzbOWUBypE1UP1uX15Ok.7ct5KCT7KQf2Ae', NULL, '2021-05-23 08:46:26', '2021-05-23 08:46:26'),
(37, 'prakash dawadi', 'pd@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$ULsvGDBMCu4P.ncNJdW9zOJ9EzKs2UBP6RgMCwSEnBuGkH6Nr51iy', NULL, '2021-05-28 05:52:59', '2021-05-28 05:52:59'),
(38, 'prakash dawadi', 'PRAKASHDAWADI@GMAIL.COM', 9848700076, 'active', 'customer', NULL, '$2y$10$F1ha6CbI4kyI2RdiM972UOWfdTwI9ufezlPi8pFiU1DWcbvHUBVgS', NULL, '2021-05-28 06:07:32', '2021-05-28 06:07:32'),
(42, 'prakash dawadi', 'leezan.dawadi2@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$g7SStmf/NcDJqlUOtoLRAO4UARL1wxMmcdrynhofNzSzIqkLeyrFK', NULL, '2021-05-28 06:22:12', '2021-05-28 06:22:12'),
(43, 'prakash dawadi', 'pd12@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$rZCoenSRHlNLkTI5KKKF9uCXOiDz23jlQc8dbmvoF4pt7HkT4il/.', NULL, '2021-05-28 23:19:16', '2021-05-28 23:19:16'),
(44, 'prakash dawadi', 'pd123@gmail.com', 9848700076, 'active', 'customer', NULL, '$2y$10$dHeEYGlBqt4etU.t4uOyieNuzy5I2VTE5F9EI3u4yaO5CgKzt6LV2', NULL, '2021-05-29 00:08:32', '2021-05-29 00:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `ven_id` bigint(20) UNSIGNED NOT NULL,
  `resturant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ven_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ven_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resturant_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ven_id`, `resturant_id`, `name`, `ven_email`, `password`, `phone`, `address`, `ven_status`, `role`, `resturant_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 14, 'umang', 'umangkafle1@gmail.com', '$2y$10$rN76vOJrCPrqdC5fKZ/0IO821gBteDfaotcC1PZSTf7EQy5sLzgXm', 91550972, 'Main Road mahendranagar', 'active', 'vendor', 'The burgur House', NULL, '2021-04-20 08:01:07', '2021-04-20 08:01:07'),
(17, 15, 'Ram', 'prakash.dawadi2@gmail.com', '$2y$10$AqNRKsuF/OZvUTtgKv41T.PUvD820C.pIQQ38tgpONgC30c49LUje', 9848774412, 'Galli no 1 Mahendrangar', 'active', 'vendor', 'Kanchan hotel', NULL, '2021-04-20 08:01:57', '2021-05-28 23:27:35'),
(18, 16, 'aliza', 'aliza1@gmail.com', '$2y$10$l3jMzy0kRxaTL9ejeAkzkORwVdt2.E8Jxg9CrRo7RJc62e4QRYOpa', 9868729180, 'Bazar', 'active', 'vendor', 'OperaHotel', NULL, '2021-04-20 08:02:53', '2021-04-22 10:02:01'),
(19, 17, 'prayan', 'prayan1@gmail.com', '$2y$10$vbd1g49fa5i/7gbb5FRSeOKa7FsfvtAQNRlcxmf8K28hyRhVJJH2C', 9848449447, 'Bhagatpur-04, Mahendranagar', 'active', 'vendor', 'Hotel chetan', NULL, '2021-04-20 08:03:52', '2021-04-20 08:03:52'),
(20, 18, 'Riwaj', 'riwaj1@gmail.com', '$2y$10$Rw5O9LuVvu/U4c8Xe8lGT.w.KF5xyxbITORQFFVtPHaeHQlALLpFW', 9848765423, 'Near buspark', 'active', 'vendor', 'gangotri Hotel', NULL, '2021-04-20 08:04:47', '2021-04-20 08:04:47'),
(21, 19, 'Nirmal', 'nirmala1@gmail.com', '$2y$10$9HYeRQ2osFAldinPJNSBT.hHSqN7J/X9VzGUgT.prpNNzypCBM6nm', 9856768891, 'Bhansi-18', 'active', 'vendor', 'Brother Cafe', NULL, '2021-04-20 08:05:35', '2021-04-20 08:05:35'),
(22, 20, 'padam', 'padam1@gmail.com', '$2y$10$C.5qS.oY3m2EprcfQeEE9ePc.SwCNWaLmzKbS2C93hT51oO0R.qpW', 9848975215, 'near traffic police mahendranagar', 'active', 'vendor', 'sweetdreams', NULL, '2021-04-20 08:06:47', '2021-04-20 08:06:47'),
(23, 21, 'subham', 'subham1@gmail.com', '$2y$10$po5zO3oA0AGdEgNMjyuFoOscum1O5HCC8GpsSyiY1EfaYQ/VhdPN.', 9868461266, 'galli no 4 freeline', 'active', 'vendor', '9/11 hotel', NULL, '2021-04-20 08:07:59', '2021-04-20 08:07:59'),
(24, 22, 'raghav', 'raghav1@gmail.com', '$2y$10$iH8.UNucEHNTdiDjWTzaKuHuG7uFDRz7BdrNvJu0GG6V2ZmCnT0z2', 9812345421, 'galli no 4 , Mahendranagar', 'inactive', 'vendor', 'Grand Pacific', NULL, '2021-04-20 08:09:16', '2021-04-20 08:09:16'),
(25, 23, 'rakesh', 'rakesh1@gmail.com', '$2y$10$ZmlQzXO07Micv.oNxEcjHuh/Zm8nEkiZ/6xQz9gbWthR9JJMA4bNG', 9865432356, 'galli  no- 5', 'active', 'vendor', 'Botha momo', NULL, '2021-04-20 08:10:05', '2021-04-20 08:10:05'),
(26, 24, 'bpjoshi', 'bpjoshi1@gmail.com', '$2y$10$EMkaCsZ2yMdrwfTjcZsrLuRqkq3qEqlUAW97DPn8vz3rbpmsXrqtG', 9848700076, 'Bhemdatta-18', 'active', 'vendor', 'bphotel', NULL, '2021-04-22 01:11:47', '2021-04-22 01:11:47'),
(29, NULL, 'rowaxege', 'nekilekek@mailinator.com', '$2y$10$lghL5fGHhF4QV5gkZ/lQR.T9rDHq/g3AqXT2G01suxYvzopWgUThC', 237, 'Reprehenderit cumque', 'inactive', 'vendor', 'jael fisher', NULL, '2021-05-28 06:27:35', '2021-05-28 06:27:35'),
(31, 26, 'prakash dawadi', 'leezan.dawadi2@gmail.com', '$2y$10$AbvwBDkc2Oon7rDBpwaLI.I/bwW37T/jJIPHFuNLNyYJBqiVv4sma', 9848700076, 'Bhemdatta-18', 'active', 'vendor', 'kiayada steele', NULL, '2021-05-28 06:37:07', '2021-05-28 06:37:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bannners`
--
ALTER TABLE `bannners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupons_code_unique` (`coupons_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forgot_passwords`
--
ALTER TABLE `forgot_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fronends`
--
ALTER TABLE `fronends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grand_totals`
--
ALTER TABLE `grand_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menus_rests_id_foreign` (`rests_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `resturants`
--
ALTER TABLE `resturants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resturants_rest_email_unique` (`rest_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ven_id`),
  ADD UNIQUE KEY `vendors_email_unique` (`ven_email`),
  ADD KEY `resturant_id` (`resturant_id`),
  ADD KEY `resturant_id_2` (`resturant_id`),
  ADD KEY `resturant_id_3` (`resturant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bannners`
--
ALTER TABLE `bannners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=826;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgot_passwords`
--
ALTER TABLE `forgot_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `fronends`
--
ALTER TABLE `fronends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grand_totals`
--
ALTER TABLE `grand_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `resturants`
--
ALTER TABLE `resturants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ven_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_rests_id_foreign` FOREIGN KEY (`rests_id`) REFERENCES `resturants` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`resturant_id`) REFERENCES `resturants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
