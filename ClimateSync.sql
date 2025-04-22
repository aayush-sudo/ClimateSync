-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 07, 2025 at 04:01 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ClimateSync`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Aayush', 'aayush@gmail.com', 'Checking if the entry gets added in the database.', '2025-04-07 15:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `contribution` text NOT NULL,
  `volunteer` enum('Yes','No') NOT NULL,
  `participationMode` enum('Online','In-person','Both') NOT NULL,
  `skills` text NOT NULL,
  `rating` int NOT NULL,
  `actions` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `fullName`, `email`, `phone`, `city`, `contribution`, `volunteer`, `participationMode`, `skills`, `rating`, `actions`, `submitted_at`) VALUES
(2, 'Aayush', 'aayush@gmail.com', '123456789', 'Mumbai', 'Contribution', 'Yes', 'Online', 'All', 5, 'All', '2025-04-07 15:21:38'),
(3, 'Aayush', 'aayush@gmail.com', '1234567890', 'Mumbai', 'Contribute', 'Yes', 'Online', 'All', 5, 'All', '2025-04-07 15:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `sustainable_practices`
--

CREATE TABLE `sustainable_practices` (
  `id` int NOT NULL,
  `city` varchar(100) NOT NULL,
  `category` enum('urban','rural') NOT NULL,
  `practice1_title` varchar(255) NOT NULL,
  `practice1_description` text NOT NULL,
  `practice2_title` varchar(255) NOT NULL,
  `practice2_description` text NOT NULL,
  `practice3_title` varchar(255) NOT NULL,
  `practice3_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sustainable_practices`
--

INSERT INTO `sustainable_practices` (`id`, `city`, `category`, `practice1_title`, `practice1_description`, `practice2_title`, `practice2_description`, `practice3_title`, `practice3_description`) VALUES
(1, 'Mumbai', 'urban', 'Air Pollution', 'Control Air Pollution', 'Noise Pollution', 'Less Honking', 'Water Wastage', 'Efficient Water Usage'),
(2, 'Pune', 'urban', 'Waste Management', 'Promote household-level waste segregation', 'Public Transport', 'Encourage use of e-buses and bicycles', 'Green Cover', 'Increase urban tree plantations'),
(3, 'Bangalore', 'urban', 'Water Conservation', 'Implement rainwater harvesting systems', 'Traffic Emissions', 'Promote carpooling and EVs', 'Plastic Waste', 'Ban single-use plastics in public places'),
(4, 'Delhi', 'urban', 'Air Pollution', 'Introduce more green buffers and smog towers', 'Energy Usage', 'Promote rooftop solar panels', 'Noise Pollution', 'Strict time limits for construction work'),
(5, 'Rampur', 'rural', 'Water Usage', 'Use of drip irrigation techniques', 'Organic Farming', 'Avoid chemical fertilizers', 'Renewable Energy', 'Promote use of solar water pumps'),
(6, 'Baramati', 'rural', 'Soil Conservation', 'Use of contour ploughing and bunds', 'Animal Waste', 'Use of gobar gas for cooking fuel', 'Afforestation', 'Plant native trees to prevent erosion'),
(7, 'Chhindwara', 'rural', 'Water Conservation', 'Build check dams and recharge wells', 'Fuel Usage', 'Replace firewood with improved chulhas', 'Community Awareness', 'Conduct Gram Sabha workshops'),
(8, 'Kolkata', 'urban', 'Flood Management', 'Upgrade drainage and embankments', 'Urban Gardens', 'Promote rooftop and vertical gardens', 'Sustainable Transport', 'Improve pedestrian and cycle lanes'),
(9, 'Sundarpur', 'rural', 'Forest Conservation', 'Prevent illegal logging and promote community forests', 'Water Pollution', 'Prevent dumping near water bodies', 'Sustainable Livelihoods', 'Train villagers in eco-friendly crafts'),
(10, 'Ahmedabad', 'urban', 'Heat Management', 'Promote cool roofs and reflective paints', 'Water Recycling', 'Use greywater for gardening', 'Urban Forests', 'Plant trees in public areas'),
(11, 'Latur', 'rural', 'Water Scarcity', 'Promote community wells and tanks', 'Education', 'Train farmers in sustainable methods', 'Waste to Energy', 'Use agricultural waste in biogas'),
(12, 'Nagpur', 'urban', 'Smart Energy', 'Install solar panels on public buildings', 'Tree Plantation', 'Mandatory green belts near highways', 'Traffic', 'Promote e-rickshaws'),
(13, 'Thiruvananthapuram', 'urban', 'Waste Segregation', 'Door-to-door garbage segregation campaigns', 'Rainwater Harvesting', 'Enforce rules for buildings', 'Beach Cleanliness', 'Local community-led beach cleanups'),
(14, 'Rewa', 'rural', 'Solar Energy', 'Solar streetlights for villages', 'Water Management', 'Canal lining to prevent seepage', 'Crop Rotation', 'Encourage diversified cropping'),
(15, 'Varanasi', 'urban', 'River Pollution', 'Install sewage treatment near Ganga', 'Cultural Awareness', 'Clean Ganga campaigns', 'Plastic Ban', 'Ban single-use plastics in ghats'),
(16, 'Gadchiroli', 'rural', 'Wildlife Conservation', 'Protect forest habitats', 'Livelihood', 'Eco-tourism based income', 'Clean Cooking', 'Distribute LPG under Ujjwala Yojana'),
(17, 'Indore', 'urban', 'Solid Waste', 'Door-to-door collection and segregation', 'Clean Markets', 'Weekly sanitation drives', 'Air Quality', 'Restrict old diesel vehicles'),
(18, 'Palakkad', 'rural', 'Agroforestry', 'Grow trees with crops', 'Water Efficiency', 'Pond desilting and conservation', 'Soil Testing', 'Promote use of soil health cards'),
(19, 'Jaipur', 'urban', 'Water Management', 'Check illegal borewells', 'Traffic Emissions', 'Promote metro and CNG autos', 'Green Buildings', 'Energy efficient building codes'),
(20, 'Sironj', 'rural', 'Livestock Waste', 'Biogas from dung pits', 'Drinking Water', 'Fluoride filtration systems', 'Plastic Disposal', 'Awareness about waste segregation'),
(21, 'Chennai', 'urban', 'Rainwater', 'Mandatory rooftop harvesting', 'Coastal Management', 'Mangrove plantation near coast', 'Heat', 'Urban cooling strategies'),
(22, 'Almora', 'rural', 'Hill Farming', 'Terrace farming support', 'Water Harvesting', 'Rain tanks for hilly areas', 'Forest Fires', 'Community fire watch programs'),
(23, 'Lucknow', 'urban', 'Energy', 'Use solar for public lighting', 'Traffic Congestion', 'Widen roads and promote cycling', 'Awareness', 'Posters and campaigns in schools'),
(24, 'Amravati', 'rural', 'Rainfall Dependency', 'Farm ponds and water storage', 'Tree Planting', 'Organize van mahotsav', 'Renewables', 'Solar fencing for fields'),
(25, 'Surat', 'urban', 'Waste to Wealth', 'Incentivize plastic recycling units', 'Air Quality', 'Ban burning of textile waste', 'Climate Adaptation', 'Improve drainage against floods'),
(26, 'Dharwad', 'rural', 'Organic Practices', 'Vermicompost and manure usage', 'Water Sharing', 'Village-level cooperative systems', 'Traditional Knowledge', 'Promote native farming practices'),
(27, 'Hyderabad', 'urban', 'Water Use', 'Smart metering for buildings', 'Waste Management', 'Centralised waste processing plant', 'Noise', 'Silent zones near hospitals'),
(28, 'Bikaner', 'rural', 'Desert Farming', 'Use of khadin system', 'Wind Energy', 'Install micro wind turbines', 'Soil Health', 'Prevent overgrazing'),
(29, 'Bhopal', 'urban', 'Green Transport', 'Expand public bus system', 'Air Quality', 'Real-time pollution display boards', 'Urban Farming', 'Promote kitchen gardens'),
(30, 'Kalahandi', 'rural', 'Food Security', 'Promote millet cultivation', 'Water Safety', 'Check dams for safe drinking', 'Tribal Rights', 'Involve tribes in forest planning'),
(31, 'City1', 'urban', 'Practice1', 'PracticeDescription1', 'Practice2', 'PracticeDescription2', 'Practice3', 'PracticeDescription3'),
(32, 'City2', 'rural', 'CityPractice1', 'CityDescription1', 'CityPractice2', 'CityDescription2', 'CityPractice3', 'CityDescription3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Aayush Hardas', 'aayush@gmail.com', '$2y$10$moDAC/c13a6Wawlq2ufYSeOCpUcl85rERuvhXj06xLubT8sJcbo5i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sustainable_practices`
--
ALTER TABLE `sustainable_practices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sustainable_practices`
--
ALTER TABLE `sustainable_practices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
