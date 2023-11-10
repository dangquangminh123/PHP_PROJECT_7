-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 04:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `profile`) VALUES
('', 'bienthephp', 'bienthephp@gmail.com', '412fb857e109339696a3c725cad83ff42fc4b72c', 'bienthephp.jpg'),
('WqWawWweGEW49lEEaqF2', 'bienthenodejs', 'bienthenodejs@gmail.com', '412fb857e109339696a3c725cad83ff42fc4b72c', 'bienthenode_nest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('qEWc4GqWmqGmv4qvwEGi', '151Wm9MEooqeaE4Ew19l', '2mkGE3WoW7cqW6wqwiG8', '4', '3'),
('wEqG76oMlGFWmeqkW71e', '151Wm9MEooqeaE4Ew19l', '6MGkEiWakWEW3eWWmoqW', '8', '2');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
('ocWWJEw5vovW3vElGeFl', '151Wm9MEooqeaE4Ew19l', 'userphp', 'userphp@gmail.com', 'How do I book a table?', '                    How to reserve a table before coming to your restaurant? Because I need to book a table with work!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_type` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'confirm',
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`, `payment_status`) VALUES
('We06wWeia7we4WEGwiJe', '151Wm9MEooqeaE4Ew19l', 'người dùng php', '089394294819', 'userphp@gmail.com', '34 đường B phú thạnh  tân phú, 98 dương khuê phú thạnh tân phú, bienthe, VietNam, 4135123', 'home', 'cash on delivery', '1wWqwFFm0E4E4q4o3MwE', '5', '3', '2023-11-06', 'confirm', 'pending'),
('We06wWeia7we4WEGwiJe', '151Wm9MEooqeaE4Ew19l', 'người dùng php', '089394294819', 'userphp@gmail.com', '34 đường B phú thạnh  tân phú, 98 dương khuê phú thạnh tân phú, bienthe, VietNam, 4135123', 'home', 'cash on delivery', '1JJ2w06EWwa5WWEwa7kG', '5', '3', '2023-11-06', 'confirm', 'pending'),
('We06wWeia7we4WEGwiJe', '151Wm9MEooqeaE4Ew19l', 'người dùng php', '089394294819', 'userphp@gmail.com', '34 đường B phú thạnh  tân phú, 98 dương khuê phú thạnh tân phú, bienthe, VietNam, 4135123', 'home', 'cash on delivery', '5cEGwoEGvGcv3olkwiM8', '4', '3', '2023-11-06', 'confirm', 'pending'),
('qi7oE8aGqawE1mi5Ww6F', '151Wm9MEooqeaE4Ew19l', 'người dùng php', '904020984213', 'userphp@gmail.com', '34 đường B phú thạnh  tân phú, 98 dương khuê phú thạnh tân phú, hochiminh, VietNam, 423657', 'home', 'cash on delivery', '2mkGE3WoW7cqW6wqwiG8', '4', '3', '2023-11-08', 'confirm', 'pending'),
('qi7oE8aGqawE1mi5Ww6F', '151Wm9MEooqeaE4Ew19l', 'người dùng php', '904020984213', 'userphp@gmail.com', '34 đường B phú thạnh  tân phú, 98 dương khuê phú thạnh tân phú, hochiminh, VietNam, 423657', 'home', 'cash on delivery', '6MGkEiWakWEW3eWWmoqW', '8', '2', '2023-11-08', 'confirm', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `product_detail`, `status`) VALUES
('1JJ2w06EWwa5WWEwa7kG', 'desserts 2', '5', 'food-14.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'deactive'),
('1wWqwFFm0E4E4q4o3MwE', 'dinner 3', '5', 'food-21.png', 'family dinner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'deactive'),
('2mkGE3WoW7cqW6wqwiG8', 'Fried patties with french fries', '4', 'food-29.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'active'),
('37EGwoEvWkGakwEo6vww', 'breakfast 2', '2', 'cart-2.png', 'breakfast', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('38wo4M9laEEGwKG3wewq', 'Purple strawberry steamed pizza', '4', 'food-28.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'active'),
('4F7kKqwJoM61MmqoFFG1', 'burgers 7', '8', 'food-12.png', 'burgers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'deactive'),
('5cEGwoEGvGcv3olkwiM8', 'pizza with strawberries', '4', 'food-26.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('5cmie6lw32w0mKq3Woeo', 'fish dessert', '3', '4.jpg', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('5oFG88oaGvWmWwGi85E0', 'desserts 1', '4', 'food-13.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('5qFGiGWwWowq2owoG6wq', 'dinner 2', '4', 'food-20.png', 'family dinner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('5qkwqemwaiMq5Wwkim1k', 'fried chicken 4', '5', 'food-35.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('6MGkEiWakWEW3eWWmoqW', 'chocolate 2', '8', 'food-39.png', 'tacos, fries and sides', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'active'),
('amWaMwwwE4iwEJwwGWl4', 'desserts 4', '6', 'food-16.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('colcemWwKaMqGqEwwWe8', 'smoothie 1', '7', 'food-37.png', 'tacos, fries and sides', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by ac', 'active'),
('eameqo4iW8eJ2omW0W9q', 'Burgers 5', '6', 'food-10.png', 'burgers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('eJEWG7W11E5W4o5aqE8W', 'pizza mixed with chocolate and strawberries', '5', 'food-27.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('EwWleEGE8eowm3wwWiv5', 'desserts 6', '4', 'food-18.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('F3Mi48WwWweweaEEec52', 'fried chicken', '3', 'food-2.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('FJoW5m6FM8a0waE0J2wq', 'Chicken combo 3', '8', 'food-34.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('GWakwwGMw2wWoWqi6G6e', 'Chicken combo 2', '7', 'food-33.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('GwwJlEiqoWooiawcEqG8', 'chocolate ice-cream', '4', 'food-42.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'active'),
('J8MaqW4oGl2W0alWwaWa', 'burger 4', '6', 'food-9.png', 'burgers', 'undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &#34;de Finibus Bonorum et Malorum&#34; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renais', 'deactive'),
('JloqlEoowqc0aW4EW4Eo', 'Burgers 6', '4', 'food-11.png', 'burgers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('Jww4F7KGq0EWWomq4Gk1', 'Fried cake with fresh milk', '4', 'food-24.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('low3Kecq7q0wFomiwo0W', 'burger 3', '4', 'food-8.png', 'burgers', ' It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active'),
('macG0oewcFewF1GaJaim', 'Stir-fried noodles with beef', '4', '2.jpg', 'shakes and desserts', 'Sợi bún xào kèm cà chua và tỏi, ớt đỏ, khoai tây, hành lá! Làm vị ăn thơm ngon', 'active'),
('MkWmWWawlEEGoeEwwWWw', 'raisin bread', '4', 'food-41.png', 'breakfast', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'active'),
('mqWwWe62Mw5wJ2GJoJ7F', 'breakfast 1', '2', 'cart-1.png', 'breakfast', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here', 'active'),
('mwEMWJGWlqFmEEc2JFoE', 'desserts 3', '5', 'food-15.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'deactive'),
('mwlWmiGwEawq0w3qlEGe', 'soup', '4', 'food-38.png', 'family dinner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'active'),
('oc8iEMaWaWwaWeWo9vo9', 'Dinner 1', '4', 'food-19.png', 'family dinner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('oEww6lKaKEk6o2e6kGWE', 'roast chicken', '6', 'food-31.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('oMvW6kEqkGGkW6W1ll3J', 'chicken potato', '5', 'food-6.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('q9q1qWEw8q5aGaaevE7a', 'Strawberry scones', '3', 'food-25.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('qEWaEEWw5EMEF79owql9', 'fresh milk cream', '4', 'food-40.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'deactive'),
('qqqmoFEW5qkEe3671qoM', 'vegetarian pizza', '4', 'food-4.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('vaaE24ocK5c7ooWGi7K4', 'pizza mixed with chocolate', '4', 'food-30.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s', 'deactive'),
('vMkKlEwaeEclwwloFiww', 'Stir-fried meat with onions and herbs', '5', '3.jpg', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('W1qEMMlwaEWJWqikweoq', 'Roasted chicken with chili salt', '7', 'food-36.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('w5E2waG1WJEwww1KqMe0', 'Burger 2', '8', 'food-7.png', 'burgers', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', 'deactive'),
('wFevFm1k7wwJ33W3Wcq6', 'bánh taco', '3', 'food-3.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('wGq82GecWw5W36WowoqG', 'Chicken combo 1', '6', 'food-32.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('WJmeWq5wwoioe5eE2qkE', 'French fries', '5', 'food-5.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('Wqo8o095m1emm6936wJ2', 'desserts 5', '6', 'food-17.png', 'shakes and desserts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('wWeG6oeGwe4Gw9wG0kve', 'fried chicken with potatoes', '5', 'food-22.png', 'chiken and salads', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('wWklE4k4wE58e4caqiE0', 'Sausage and cove bean pizza', '7', 'food-4.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active'),
('WWwEmwoWqowGJ4c0Eoq0', 'burger 1', '4', 'food-1.png', 'burgers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha', 'active'),
('wwwkWmWmvE2qqEaEc96w', 'Spicy pizza with chili sauce', '5', 'pizza.png', 'tacos, fries and sides', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `select_one` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `confirmation` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `name`, `email`, `number`, `select_one`, `date`, `time`, `comment`, `confirmation`) VALUES
('ovWllew1qW4GeqWwGqEG', '151Wm9MEooqeaE4Ew19l', 'biến thể php', 'admin@gmail.com', '32523412', 'select four', '2023-11-10', '7 AM', '                    ', 'pending'),
('1E8a1qwa5wGqGeEMeeGF', '151Wm9MEooqeaE4Ew19l', 'biến thể ', 'admin@gmail.com', '39203123124', 'select three', '2023-11-10', '9 AM', '                    đặt bàn', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` varchar(255) NOT NULL,
  `post_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `post_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
('eWW0w7wweFEqWG8EeKew', 'J8MaqW4oGl2W0alWwaWa', '151Wm9MEooqeaE4Ew19l', '5', 'taste', 'Vị của sản phẩm này rất ngon và đậm đà', '2023-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`) VALUES
('151Wm9MEooqeaE4Ew19l', 'người dùng PHP', 'userphp@gmail.com', 'c8e0b6dfb48033a1da80501bf7f675d6bf41b117', 'bienthephp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `price`) VALUES
('qmGeEoo0o7wW9av0Jo47', '151Wm9MEooqeaE4Ew19l', 'colcemWwKaMqGqEwwWe8', '7'),
('WMGkJoEkeJJEWwJGeoGe', '151Wm9MEooqeaE4Ew19l', 'J8MaqW4oGl2W0alWwaWa', '6'),
('EEWGE223MeElEWwWkvcW', '151Wm9MEooqeaE4Ew19l', '6MGkEiWakWEW3eWWmoqW', '8'),
('wq309o1GlEqq8oWGvWWK', '151Wm9MEooqeaE4Ew19l', '1JJ2w06EWwa5WWEwa7kG', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
