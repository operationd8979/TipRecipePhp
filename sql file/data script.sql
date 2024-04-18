-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 18, 2024 lúc 12:58 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tiprecipe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishingredients`
--

CREATE TABLE `dishingredients` (
  `dishID` varchar(40) NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT 'gram'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dishingredients`
--

INSERT INTO `dishingredients` (`dishID`, `ingredientID`, `amount`, `unit`) VALUES
('32df3g4df6df3gdf34', 4, 30, 'ml'),
('32df3g4df6df3gdf34', 6, 10, 'gram'),
('32df3g4df6df3gdf34', 12, 20, 'ml'),
('32df3g4df6df3gdf34', 59, 150, 'gram'),
('32df3g4df6df3gdf34', 60, 100, 'gram'),
('32df3g4df6df3gdf34', 134, 300, 'gram'),
('3f45s3fd5g4sdf643df', 1, 500, 'gram'),
('3f45s3fd5g4sdf643df', 4, 30, 'ml'),
('3f45s3fd5g4sdf643df', 5, 20, 'gram'),
('3f45s3fd5g4sdf643df', 6, 5, 'gram'),
('3f45s3fd5g4sdf643df', 12, 20, 'ml'),
('3fd5g4sdf643df54s3df', 4, 50, 'ml'),
('3fd5g4sdf643df54s3df', 6, 10, 'gram'),
('3fd5g4sdf643df54s3df', 9, 200, 'gram'),
('3fd5g4sdf643df54s3df', 12, 20, 'ml'),
('3fd5g4sdf643df54s3df', 134, 300, 'gram'),
('3fsdfdf45s3fd5g4sdf', 5, 5, 'gram'),
('3fsdfdf45s3fd5g4sdf', 6, 10, 'gram'),
('3fsdfdf45s3fd5g4sdf', 12, 30, 'ml'),
('3fsdfdf45s3fd5g4sdf', 127, 1, 'quả'),
('3fsdfdf45s3fd5g4sdf', 133, 300, 'gram'),
('df3sdf4d6f3d54f6d4', 12, 10, 'ml'),
('df3sdf4d6f3d54f6d4', 14, 2, 'lát'),
('df3sdf4d6f3d54f6d4', 17, 50, 'gram'),
('df3sdf4d6f3d54f6d4', 56, 100, 'gram'),
('df3sdf4d6f3d54f6d4', 57, 1, 'cái'),
('df3sdf4d6f3d54f6d4', 58, 1, 'cái'),
('df3sdf4d6f3d54f6d4', 132, 200, 'gram'),
('df546df325dfg6d5g97', 4, 50, 'ml'),
('df546df325dfg6d5g97', 6, 10, 'gram'),
('df546df325dfg6d5g97', 12, 20, 'ml'),
('df546df325dfg6d5g97', 32, 500, 'gram'),
('df546df325dfg6d5g97', 131, 200, 'gram'),
('df546df345dfg6d5g46', 4, 50, 'ml'),
('df546df345dfg6d5g46', 6, 10, 'gram'),
('df546df345dfg6d5g46', 9, 200, 'gram'),
('df546df345dfg6d5g46', 12, 20, 'ml'),
('df546df345dfg6d5g46', 16, 300, 'gram'),
('ds4f6d3sf4d6f34d6f3', 5, 5, 'gram'),
('ds4f6d3sf4d6f34d6f3', 6, 10, 'gram'),
('ds4f6d3sf4d6f34d6f3', 12, 30, 'ml'),
('ds4f6d3sf4d6f34d6f3', 14, 2, 'lát'),
('ds4f6d3sf4d6f34d6f3', 132, 500, 'gram'),
('fd45s3fd5g4sdf543', 2, 4, 'quả'),
('fd45s3fd5g4sdf543', 4, 50, 'ml'),
('fd45s3fd5g4sdf543', 6, 10, 'gram'),
('fd45s3fd5g4sdf543', 9, 200, 'gram'),
('fd45s3fd5g4sdf543', 10, 500, 'gram'),
('fd45s3fd5g4sdf543', 132, 300, 'gram'),
('fd45s3fd5g4sdf544', 11, 10, 'gram'),
('fd45s3fd5g4sdf544', 12, 10, 'ml'),
('fd45s3fd5g4sdf544', 57, 1, 'cái'),
('fd45s3fd5g4sdf544', 58, 1, 'cái'),
('fd45s3fd5g4sdf544', 61, 100, 'gram'),
('fd45s3fd5g4sdf544', 62, 50, 'gram'),
('fd45s3fd5g4sdf544', 132, 200, 'gram'),
('fdf45s3fd5g4sdf546', 3, 2, 'quả'),
('fdf45s3fd5g4sdf546', 6, 10, 'gram'),
('fdf45s3fd5g4sdf546', 10, 300, 'gram'),
('fdf45s3fd5g4sdf546', 12, 20, 'ml'),
('fdf45s3fd5g4sdf546', 132, 200, 'gram'),
('fds34f6d34sdf63df4s6', 6, 5, 'gram'),
('fds34f6d34sdf63df4s6', 7, 5, 'gram'),
('fds34f6d34sdf63df4s6', 12, 20, 'ml'),
('fds34f6d34sdf63df4s6', 14, 100, 'gram'),
('fds34f6d34sdf63df4s6', 54, 50, 'ml'),
('fds34f6d34sdf63df4s6', 57, 200, 'gram'),
('fds4f3d45g63dfg4s6d3', 6, 5, 'gram'),
('fds4f3d45g63dfg4s6d3', 12, 20, 'ml'),
('fds4f3d45g63dfg4s6d3', 53, 200, 'gram'),
('fds4f3d45g63dfg4s6d3', 54, 30, 'ml'),
('fds4f3df45g6df345g3d', 12, 20, 'ml'),
('fds4f3df45g6df345g3d', 16, 100, 'gram'),
('fds4f3df45g6df345g3d', 17, 50, 'gram'),
('fds4f3df45g6df345g3d', 21, 200, 'gram'),
('fds4f3df45g6df345g3d', 132, 300, 'gram'),
('fds4f3df45g6df345g3f', 12, 20, 'ml'),
('fds4f3df45g6df345g3f', 31, 50, 'gram'),
('fds4f3df45g6df345g3f', 37, 100, 'gram'),
('fds4f3df45g6df345g3f', 121, 200, 'gram'),
('fds4f3df45g6df345g3f', 127, 1, 'quả'),
('fds4f3df45g6df345g3f', 133, 300, 'gram'),
('ffd4546sdf3s4f6d34', 4, 50, 'ml'),
('ffd4546sdf3s4f6d34', 6, 10, 'gram'),
('ffd4546sdf3s4f6d34', 9, 300, 'gram'),
('ffd4546sdf3s4f6d34', 49, 10, 'gram'),
('ffd4546sdf3s4f6d34', 133, 200, 'gram'),
('ffd4sdf54sdf634df3', 21, 50, 'gram'),
('ffd4sdf54sdf634df3', 22, 50, 'gram'),
('ffd4sdf54sdf634df3', 41, 100, 'gram'),
('ffd4sdf54sdf634df3', 56, 200, 'gram'),
('ffd4sdf54sdf634df3', 59, 4, 'tấm'),
('g4df6g3df45g34dfg63d', 2, 500, 'gram'),
('g4df6g3df45g34dfg63d', 4, 50, 'ml'),
('g4df6g3df45g34dfg63d', 5, 30, 'gram'),
('g4df6g3df45g34dfg63d', 6, 5, 'gram'),
('g4df6g3df45g34dfg63d', 14, 2, 'quả'),
('g4df6g3df45g34dfg63d', 127, 1, 'quả'),
('g4df6g3df45g34dfg6d', 5, 100, 'gram'),
('g4df6g3df45g34dfg6d', 6, 5, 'gram'),
('g4df6g3df45g34dfg6d', 12, 100, 'ml'),
('g4df6g3df45g34dfg6d', 14, 200, 'gram'),
('g4df6g3df45g34dfg6d', 50, 200, 'gram'),
('g4df6g3df45g34dfg6d', 60, 300, 'gram'),
('gdf4sdf34sdf63sd4f6s', 5, 20, 'ml'),
('gdf4sdf34sdf63sd4f6s', 6, 5, 'gram'),
('gdf4sdf34sdf63sd4f6s', 7, 5, 'gram'),
('gdf4sdf34sdf63sd4f6s', 12, 20, 'ml'),
('gdf4sdf34sdf63sd4f6s', 23, 100, 'gram'),
('gf4d6g3df45g63df45g6', 5, 30, 'gram'),
('gf4d6g3df45g63df45g6', 6, 5, 'gram'),
('gf4d6g3df45g63df45g6', 12, 20, 'ml'),
('gf4d6g3df45g63df45g6', 15, 300, 'gram'),
('gf4d6g3df45g63df45g6', 37, 50, 'gram'),
('gf4d6g3df45g63df45g6', 123, 200, 'gram'),
('gf4d6g3df45g63df4g6d', 5, 30, 'gram'),
('gf4d6g3df45g63df4g6d', 6, 5, 'gram'),
('gf4d6g3df45g63df4g6d', 12, 20, 'ml'),
('gf4d6g3df45g63df4g6d', 51, 200, 'gram'),
('gf4d6g3df45g63df4g6d', 132, 300, 'gram'),
('gf4d6g3df45g63df4g7d', 6, 5, 'gram'),
('gf4d6g3df45g63df4g7d', 12, 20, 'ml'),
('gf4d6g3df45g63df4g7d', 51, 200, 'gram'),
('gf4d6g3df45g63df4g7d', 52, 100, 'gram'),
('gf4d6g3df45g63df4g7d', 123, 100, 'gram'),
('gf4d6g3df45g63df4g7d', 131, 200, 'gram'),
('gfd4g3d45g63df4g6d3f', 1, 500, 'gram'),
('gfd4g3d45g63df4g6d3f', 4, 50, 'ml'),
('gfd4g3d45g63df4g6d3f', 5, 30, 'gram'),
('gfd4g3d45g63df4g6d3f', 6, 5, 'gram'),
('gfd4g3d45g63df4g6d3f', 12, 20, 'ml'),
('gfd4g3d45g63df4g6d3f', 50, 300, 'gram');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishs`
--

CREATE TABLE `dishs` (
  `dishID` varchar(40) NOT NULL,
  `dishName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avgRating` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dishs`
--

INSERT INTO `dishs` (`dishID`, `dishName`, `summary`, `url`, `isDelete`, `created_at`, `updated_at`, `avgRating`) VALUES
('32df3g4df6df3gdf34', 'Bánh canh cua', 'Món ăn truyền thống với bánh canh và cua tươi.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F32df3g4df6df3gdf34.png?alt=media&token=a6a4e1fc-3c0e-412c-bf82-55e76522865d', 0, '2024-04-06 03:32:38', '2024-04-18 09:59:50', 0.67),
('3f45s3fd5g4sdf643df', 'Cá kho tộ', 'Món ăn truyền thống của Việt Nam, cá kho tộ thơm ngon và béo ngậy.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3f45s3fd5g4sdf643df.png?alt=media&token=b5fbc43f-4094-4c33-b99c-f9363eb7219e', 0, '2024-04-06 03:32:38', '2024-04-18 09:54:40', 0.73),
('3fd5g4sdf643df54s3df', 'Bún riêu cua', 'Món ăn ngon và bổ dưỡng với bún và riêu cua thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf546df345dfg6d5g46.png?alt=media&token=05ddbdc3-7ec6-4619-96d5-1973736141cd', 0, '2024-04-06 03:32:38', '2024-04-18 09:54:58', 0.55),
('3fsdfdf45s3fd5g4sdf', 'Bò bít tết', 'Món ăn phổ biến với thịt bò tươi ngon và sốt bơ đặc trưng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3fsdfdf45s3fd5g4sdf.png?alt=media&token=1a5069b3-8d66-497d-b071-7184c6cd13f4', 0, '2024-04-06 03:32:38', '2024-04-18 09:55:21', 0.50),
('df3sdf4d6f3d54f6d4', 'Bánh mỳ sandwich', 'Món ăn tiện lợi và ngon miệng với bánh mỳ và nhân đa dạng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf3sdf4d6f3d54f6d4.png?alt=media&token=4dc7503d-4777-4ef6-8643-63a6c37f0f53', 0, '2024-04-06 03:32:38', '2024-04-18 09:55:39', 0.75),
('df546df325dfg6d5g97', 'Thịt kho dưa cải', 'Cải muối chua kho với thịt siêu ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf546df325dfg6d5g97.png?alt=media&token=7492d1df-80ed-45af-aca7-b717e947e1d8', 0, '2024-04-06 03:36:13', '2024-04-18 09:55:59', 0.60),
('df546df345dfg6d5g46', 'Bún ốc', 'Món ăn đặc trưng với bún và ốc tươi ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3fd5g4sdf643df54s3df.png?alt=media&token=5f1e8f57-3b1b-4c99-930a-eff2a6757023', 0, '2024-04-06 03:32:38', '2024-04-18 09:56:19', 0.47),
('ds4f6d3sf4d6f34d6f3', 'Gà chiên giòn', 'Món ăn ngon và bổ dưỡng với gà được chiên giòn vàng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fds4f6d3sf4d6f34d6f3.png?alt=media&token=b37bffb9-e84a-45c5-998d-df119130f38b', 0, '2024-04-06 03:32:38', '2024-04-18 09:56:33', 0.47),
('fd45s3fd5g4sdf543', 'Phở gà', 'Món ăn truyền thống của Việt Nam, phở gà được làm từ nước dùng phở thơm ngon và thịt gà thái mỏng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffd45s3fd5g4sdf543.png?alt=media&token=d1a1162d-3ddd-4af5-85ab-b57c4a87c9c5', 0, '2024-04-06 03:32:38', '2024-04-18 09:56:55', 0.40),
('fd45s3fd5g4sdf544', 'Bánh mì pate', 'Món ăn phổ biến với hương vị thơm ngon của bánh mì và pate.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffd45s3fd5g4sdf544.png?alt=media&token=e4ecf09f-cdac-4d42-be5c-1e4c3503045e', 0, '2024-04-06 03:32:38', '2024-04-18 09:57:19', 0.73),
('fdf45s3fd5g4sdf546', 'Cơm chiên', 'Món ăn dễ làm từ cơm và các loại gia vị.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffdf45s3fd5g4sdf546.png?alt=media&token=1fad61d8-15f0-4127-9ec5-1dee6f840b9d', 0, '2024-04-06 03:32:38', '2024-04-18 09:57:38', 0.67),
('fds34f6d34sdf63df4s6', 'Bánh tráng trộn', 'Món ăn đường phố với sự kết hợp của bánh tráng và gia vị đặc trưng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffds34f6d34sdf63df4s6.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:39:52', '2024-04-18 10:46:11', 0.00),
('fds4f3d45g63dfg4s6d3', 'Nem rán', 'Món ăn truyền thống với nhân nem thơm ngon và giòn.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffds4f3d45g63dfg4s6d3.jpeg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:44:21', '2024-04-18 10:48:22', 0.00),
('fds4f3df45g6df345g3d', 'Dĩa rau trộn với gà nướng', 'Món ăn thanh mát với sự kết hợp của rau trộn và gà nướng thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffds4f3df45g6df345g3d.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:08:11', '2024-04-18 10:49:31', 0.00),
('fds4f3df45g6df345g3f', 'Cơm rang dưa cải với thịt bò', 'Món ăn giàu dinh dưỡng với cơm rang và thịt bò thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffds4f3df45g6df345g3f.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:28:41', '2024-04-18 10:50:21', 0.00),
('ffd4546sdf3s4f6d34', 'Bún bò Huế', 'Món ăn nổi tiếng với nước dùng thơm ngon và thịt bò thái mỏng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fffd4546sdf3s4f6d34.png?alt=media&token=f916ea66-60d1-4b64-acb5-c95dcc05d59c', 0, '2024-04-06 03:32:38', '2024-04-18 09:58:00', 0.55),
('ffd4sdf54sdf634df3', 'Gỏi cuốn', 'Món ăn ngon và dễ làm từ các nguyên liệu tươi.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fffd4sdf54sdf634df3.png?alt=media&token=cd41cfd1-21ff-4748-84d6-beb95302779b', 0, '2024-04-06 03:32:38', '2024-04-18 09:58:22', 0.83),
('g4df6g3df45g34dfg63d', 'Canh chua cá lóc', 'Món canh chua truyền thống với cá lóc thơm ngon và hương vị đậm đà.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fg4df6g3df45g34dfg63d.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:38:53', '2024-04-18 10:51:01', 0.00),
('g4df6g3df45g34dfg6d', 'Bánh trung thu nhân dừa', 'Bánh trung thu truyền thống với nhân dừa thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fg4df6g3df45g34dfg6d.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:39:26', '2024-04-18 10:51:53', 0.00),
('gdf4sdf34sdf63sd4f6s', 'Gỏi ngó sen', 'Món ăn truyền thống với ngó sen và các nguyên liệu khác tạo nên hương vị đặc biệt.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fgdf4sdf34sdf63sd4f6s.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:29:56', '2024-04-18 10:52:34', 0.00),
('gf4d6g3df45g63df45g6', 'Canh bí đỏ', 'Món canh truyền thống với bí đỏ thơm ngon và màu sắc đẹp mắt.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fgf4d6g3df45g63df45g6.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:40:15', '2024-04-18 10:53:17', 0.00),
('gf4d6g3df45g63df4g6d', 'Cơm chiên cá mòi', 'Món cơm chiên thơm ngon với cá mòi và các nguyên liệu khác.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fgf4d6g3df45g63df4g6d.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:40:59', '2024-04-18 10:54:30', 0.00),
('gf4d6g3df45g63df4g7d', 'Cơm tấm sườn bì', 'Món ăn phổ biến với cơm tấm, sườn và bì thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fgf4d6g3df45g63df4g7d.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:43:51', '2024-04-18 10:55:20', 0.00),
('gfd4g3d45g63df4g6d3f', 'Bún ốc len', 'Món ăn đặc trưng với bún và ốc len tươi ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fgfd4g3d45g63df4g6d3f.jpg?alt=media&token=8501af01-75bf-420f-a7ee-4bd5ef5f4bba', 0, '2024-04-18 10:40:36', '2024-04-18 10:57:39', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishtypes`
--

CREATE TABLE `dishtypes` (
  `dishID` varchar(40) NOT NULL,
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dishtypes`
--

INSERT INTO `dishtypes` (`dishID`, `typeID`) VALUES
('32df3g4df6df3gdf34', 2),
('32df3g4df6df3gdf34', 13),
('32df3g4df6df3gdf34', 15),
('32df3g4df6df3gdf34', 17),
('32df3g4df6df3gdf34', 21),
('3f45s3fd5g4sdf643df', 2),
('3f45s3fd5g4sdf643df', 15),
('3f45s3fd5g4sdf643df', 17),
('3f45s3fd5g4sdf643df', 21),
('3fd5g4sdf643df54s3df', 2),
('3fd5g4sdf643df54s3df', 13),
('3fd5g4sdf643df54s3df', 15),
('3fd5g4sdf643df54s3df', 17),
('3fd5g4sdf643df54s3df', 21),
('3fsdfdf45s3fd5g4sdf', 15),
('3fsdfdf45s3fd5g4sdf', 21),
('3fsdfdf45s3fd5g4sdf', 22),
('df3sdf4d6f3d54f6d4', 15),
('df3sdf4d6f3d54f6d4', 19),
('df3sdf4d6f3d54f6d4', 22),
('df546df325dfg6d5g97', 2),
('df546df325dfg6d5g97', 21),
('df546df345dfg6d5g46', 2),
('df546df345dfg6d5g46', 13),
('df546df345dfg6d5g46', 15),
('df546df345dfg6d5g46', 17),
('df546df345dfg6d5g46', 21),
('ds4f6d3sf4d6f34d6f3', 15),
('ds4f6d3sf4d6f34d6f3', 21),
('ds4f6d3sf4d6f34d6f3', 22),
('fd45s3fd5g4sdf543', 2),
('fd45s3fd5g4sdf543', 13),
('fd45s3fd5g4sdf543', 15),
('fd45s3fd5g4sdf543', 17),
('fd45s3fd5g4sdf543', 21),
('fd45s3fd5g4sdf544', 15),
('fd45s3fd5g4sdf544', 18),
('fd45s3fd5g4sdf544', 22),
('fdf45s3fd5g4sdf546', 15),
('fdf45s3fd5g4sdf546', 18),
('fdf45s3fd5g4sdf546', 21),
('fds34f6d34sdf63df4s6', 19),
('fds34f6d34sdf63df4s6', 22),
('fds4f3d45g63dfg4s6d3', 19),
('fds4f3d45g63dfg4s6d3', 22),
('fds4f3df45g6df345g3d', 15),
('fds4f3df45g6df345g3d', 19),
('fds4f3df45g6df345g3d', 21),
('fds4f3df45g6df345g3d', 22),
('fds4f3df45g6df345g3f', 15),
('fds4f3df45g6df345g3f', 21),
('fds4f3df45g6df345g3f', 22),
('ffd4546sdf3s4f6d34', 2),
('ffd4546sdf3s4f6d34', 13),
('ffd4546sdf3s4f6d34', 15),
('ffd4546sdf3s4f6d34', 17),
('ffd4546sdf3s4f6d34', 21),
('ffd4sdf54sdf634df3', 2),
('ffd4sdf54sdf634df3', 19),
('ffd4sdf54sdf634df3', 20),
('ffd4sdf54sdf634df3', 21),
('g4df6g3df45g34dfg63d', 13),
('g4df6g3df45g34dfg63d', 15),
('g4df6g3df45g34dfg63d', 17),
('g4df6g3df45g34dfg63d', 21),
('g4df6g3df45g34dfg63d', 22),
('g4df6g3df45g34dfg6d', 19),
('g4df6g3df45g34dfg6d', 20),
('gdf4sdf34sdf63sd4f6s', 15),
('gdf4sdf34sdf63sd4f6s', 17),
('gdf4sdf34sdf63sd4f6s', 19),
('gdf4sdf34sdf63sd4f6s', 21),
('gdf4sdf34sdf63sd4f6s', 22),
('gf4d6g3df45g63df45g6', 13),
('gf4d6g3df45g63df45g6', 15),
('gf4d6g3df45g63df45g6', 17),
('gf4d6g3df45g63df45g6', 21),
('gf4d6g3df45g63df45g6', 22),
('gf4d6g3df45g63df4g6d', 15),
('gf4d6g3df45g63df4g6d', 18),
('gf4d6g3df45g63df4g6d', 21),
('gf4d6g3df45g63df4g6d', 22),
('gf4d6g3df45g63df4g7d', 15),
('gf4d6g3df45g63df4g7d', 18),
('gf4d6g3df45g63df4g7d', 21),
('gf4d6g3df45g63df4g7d', 22),
('gfd4g3d45g63df4g6d3f', 13),
('gfd4g3d45g63df4g6d3f', 15),
('gfd4g3d45g63df4g6d3f', 21),
('gfd4g3d45g63df4g6d3f', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `ingredientName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ingredients`
--

INSERT INTO `ingredients` (`ingredientID`, `ingredientName`) VALUES
(58, 'Bánh mì'),
(57, 'Bánh tráng'),
(13, 'Bắp cải'),
(15, 'Bí đỏ'),
(61, 'Bột bắp'),
(59, 'Bột gạo'),
(60, 'Bột mì'),
(62, 'Bột nếp'),
(8, 'Bột ngọt'),
(9, 'Bún'),
(14, 'Cà chua'),
(16, 'Cà rốt'),
(12, 'Dầu ăn'),
(52, 'Dầu ăn ăn mì'),
(129, 'Dứa'),
(63, 'Đậu hủ'),
(56, 'Đậu phụ'),
(5, 'Đường'),
(10, 'Gạo lất'),
(1, 'Hành lá'),
(125, 'Kem'),
(121, 'Mảng cầu'),
(51, 'Mì sợi'),
(11, 'Mỡ'),
(6, 'Muối'),
(65, 'Mỳ gói'),
(66, 'Mỳ trứng'),
(64, 'Mỳ ý'),
(17, 'Nấm'),
(53, 'Nếp'),
(4, 'Nước mắm'),
(123, 'Ổi'),
(3, 'Ớt'),
(7, 'Ớt bột'),
(22, 'Rau bina'),
(42, 'Rau bina lớn'),
(41, 'Rau bina nhỏ'),
(18, 'Rau cải'),
(34, 'Rau cải bó xôi'),
(23, 'Rau cải thảo'),
(37, 'Rau cải xoăn'),
(26, 'Rau cần tàu'),
(29, 'Rau dền'),
(44, 'Rau dền bào'),
(32, 'Rau dền đỏ'),
(39, 'Rau dền lá đỏ'),
(40, 'Rau dền lá xanh'),
(43, 'Rau dền mảnh'),
(38, 'Rau dền mảy'),
(33, 'Rau dền trắng'),
(45, 'Rau dền tươi'),
(27, 'Rau diếp'),
(30, 'Rau đay'),
(31, 'Rau húng'),
(20, 'Rau mùi'),
(36, 'Rau mùi tàu'),
(28, 'Rau mùng'),
(46, 'Rau mùng bìa'),
(48, 'Rau mùng ống'),
(47, 'Rau mùng tươi'),
(19, 'Rau muống'),
(25, 'Rau ngổ'),
(24, 'Rau răm'),
(21, 'Rau xà lách'),
(35, 'Rau xôi'),
(68, 'Rong biển'),
(124, 'Sầu riêng'),
(54, 'Sốt cà chua'),
(55, 'Sốt ớt'),
(122, 'Táo'),
(133, 'Thịt bò'),
(132, 'Thịt gà'),
(131, 'Thịt heo'),
(134, 'Thịt thỏ'),
(49, 'Tinh bột nghệ'),
(50, 'Tinh bột sắn dây'),
(2, 'Tỏi'),
(126, 'Trứng cút'),
(127, 'Trứng gà'),
(128, 'Trứng vịt'),
(120, 'Xoài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `userID` varchar(40) NOT NULL,
  `dishID` varchar(40) NOT NULL,
  `rating` float DEFAULT NULL,
  `predictedRating` float NOT NULL,
  `predictionTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`userID`, `dishID`, `rating`, `predictedRating`, `predictionTime`) VALUES
('6610e716d9cfd144092', '32df3g4df6df3gdf34', 0.96, 0, NULL),
('6610e716d9cfd144092', '3f45s3fd5g4sdf643df', 1, 0, NULL),
('6610e716d9cfd144092', '3fd5g4sdf643df54s3df', 0.8, 0, NULL),
('6610e716d9cfd144092', '3fsdfdf45s3fd5g4sdf', 0.4, 0, NULL),
('6610e716d9cfd144092', 'df3sdf4d6f3d54f6d4', 0.5, 0, NULL),
('6610e716d9cfd144092', 'df546df325dfg6d5g97', 0.6, 0, NULL),
('6610e716d9cfd144092', 'df546df345dfg6d5g46', 0.2, 0, NULL),
('6610e716d9cfd144092', 'ds4f6d3sf4d6f34d6f3', 0.45, 0, NULL),
('6610e716d9cfd144092', 'fd45s3fd5g4sdf543', 0.3, 0, NULL),
('6610e716d9cfd144092', 'fd45s3fd5g4sdf544', 0.9, 0, NULL),
('6610e716d9cfd144092', 'fdf45s3fd5g4sdf546', 1, 0, NULL),
('6610e716d9cfd144092', 'ffd4546sdf3s4f6d34', 0.8, 0, NULL),
('6610e716d9cfd144092', 'ffd4sdf54sdf634df3', 0.9, 0, NULL),
('66115ed000ae1258259', '32df3g4df6df3gdf34', 0.4, 0, NULL),
('66115ed000ae1258259', '3f45s3fd5g4sdf643df', 0.2, 0, NULL),
('66115ed000ae1258259', '3fd5g4sdf643df54s3df', 0.3, 0, NULL),
('66115ed000ae1258259', '3fsdfdf45s3fd5g4sdf', 0.5, 0, NULL),
('66115ed000ae1258259', 'df3sdf4d6f3d54f6d4', 1, 0, NULL),
('66115ed000ae1258259', 'df546df325dfg6d5g97', 0.9, 0, NULL),
('66115ed000ae1258259', 'df546df345dfg6d5g46', 0.8, 0, NULL),
('66115ed000ae1258259', 'ds4f6d3sf4d6f34d6f3', 0.8, 0, NULL),
('66115ed000ae1258259', 'fd45s3fd5g4sdf543', 0.7, 0, NULL),
('66115ed000ae1258259', 'fd45s3fd5g4sdf544', 1, 0, NULL),
('66115ed000ae1258259', 'fdf45s3fd5g4sdf546', 0.2, 0, NULL),
('66115ed000ae1258259', 'ffd4546sdf3s4f6d34', 0.3, 0, NULL),
('66115ed000ae1258259', 'ffd4sdf54sdf634df3', 0.6, 0, NULL),
('66115ee270603588242', '32df3g4df6df3gdf34', 0.8, 0, NULL),
('66115ee270603588242', '3f45s3fd5g4sdf643df', 1, 0, NULL),
('66115ee270603588242', '3fd5g4sdf643df54s3df', NULL, 0, '2024-04-09 03:33:34'),
('66115ee270603588242', '3fsdfdf45s3fd5g4sdf', 0.5, 0, NULL),
('66115ee270603588242', 'df3sdf4d6f3d54f6d4', NULL, 0, '2024-04-09 03:33:31'),
('66115ee270603588242', 'df546df325dfg6d5g97', 0.5, 0, NULL),
('66115ee270603588242', 'df546df345dfg6d5g46', 0.3, 0, NULL),
('66115ee270603588242', 'ds4f6d3sf4d6f34d6f3', 0.5, 0, NULL),
('66115ee270603588242', 'fd45s3fd5g4sdf543', 0.2, 0, NULL),
('66115ee270603588242', 'fd45s3fd5g4sdf544', 1, 0, NULL),
('66115ee270603588242', 'fdf45s3fd5g4sdf546', 0.8, 0, NULL),
('66115ee270603588242', 'ffd4546sdf3s4f6d34', NULL, 0, '2024-04-09 03:33:27'),
('66115ee270603588242', 'ffd4sdf54sdf634df3', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recipes`
--

CREATE TABLE `recipes` (
  `dishID` varchar(40) NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `recipes`
--

INSERT INTO `recipes` (`dishID`, `content`) VALUES
('32df3g4df6df3gdf34', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Nấu nước dùng bánh canh.</p><p>Bước 2: Chuẩn bị cua và các nguyên liệu khác.</p><p><strong>*Chế biến </strong></p><p>Bước 1: Làm sạch cua.</p><p>Bước 2: Làm sạch các loại rau cải.</p><p>Bước 3: Nấu bánh canh.</p><p>Bước 4: Thêm cua vào nồi nước dùng và nấu chín.</p><p>Bước 5: Dọn ra bát và thêm rau sống.</p><p>Bước 6: Thưởng thức.</p>'),
('3f45s3fd5g4sdf643df', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch cá. </p><p>Bước 2: Chuẩn bị các gia vị. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Xào tỏi và ớt.&nbsp;</p><p>Bước 2: Cho cá vào xào chín. </p><p>Bước 3: Thêm nước mắm, đường và nước. </p><p>Bước 4: Nấu cho cá mềm và nước<span style=\"text-decoration: underline;\" data-mce-style=\"text-decoration: underline;\"> thấm đều vào thịt cá. </span></p><p>Bước 5: Dọn ra đĩa và thưởng thức.</p>'),
('3fd5g4sdf643df54s3df', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm nước dùng riêu cua. </p><p>Bước 2: Làm sạch cua và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước dùng.&nbsp;</p><p>Bước 2: Nấu bún. </p><p>Bước 3: Cho cua vào nồi nước dùng và nấu chín. </p><p>Bước 4: Dọn ra bát và thêm rau sống. </p><p>Bước 5: Thưởng thức.</p>'),
('3fsdfdf45s3fd5g4sdf', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị thịt bò và các nguyên liệu khác. </p><p><strong>*Chế biến</strong></p><p>Bước 1: Chiên thịt bò và trứng. </p><p>Bước 2: Làm sốt bơ. </p><p>Bước 3: Dọn thịt bò và trứng lên đĩa. </p><p>Bước 4: Đổ sốt bơ lên mặt. </p><p>Bước 5: Thêm rau sống và khoai tây chiên. </p><p>Bước 6: Thưởng thức.</p>'),
('df3sdf4d6f3d54f6d4', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị bánh mỳ và các nguyên liệu nhân. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Chuẩn bị nhân sandwich. </p><p>Bước 2: Làm bánh mỳ sandwich. </p><p>Bước 3: Thoa nhân lên bánh mỳ. </p><p>Bước 4: Thêm rau sống và các loại sốt. </p><p>Bước 5: Thưởng thức.</p>'),
('df546df325dfg6d5g97', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch rau. </p><p>Bước 2: Cắt thịt và luộc sơ. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Xào rau trong 15 phút. </p><p>Bước 2: Xào thịt trong 20 phút. </p><p>Bước 3: Thêm gia vị và xào đến khi hết nước. </p><p>Bước 4: Dọn ra bát và thêm rau sống. </p><p>Bước 5: Thưởng thức.</p>'),
('df546df345dfg6d5g46', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm nước dùng ốc. </p><p>Bước 2: Làm sạch ốc và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước dùng. </p><p>Bước 2: Nấu bún. </p><p>Bước 3: Cho ốc vào nồi nước dùng và nấu chín. </p><p>Bước 4: Dọn ra bát và thêm rau sống. </p><p>Bước 5: Thưởng thức.</p>'),
('ds4f6d3sf4d6f34d6f3', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch gà. </p><p>Bước 2: Ướp gia vị cho gà. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Chiên gà. </p><p>Bước 2: Thêm gia vị và chiên thêm. </p><p>Bước 3: Dọn ra đĩa và thưởng thức.</p>'),
('fd45s3fd5g4sdf543', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Nấu nước dùng phở. </p><p>Bước 2: Chuẩn bị thịt gà và các nguyên liệu khác.</p><p><strong>*Chế biến </strong></p><p>Bước 1: Luộc phở. </p><p>Bước 2: Mắc phở. </p><p>Bước 3: Thêm thịt gà. </p><p>Bước 4: Cho các gia vị vào tô phở. </p><p>Bước 5: Thêm rau sống và ớt cắt nhỏ. </p><p>Bước 6: Thưởng thức.</p>'),
('fd45s3fd5g4sdf544', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị bánh mì và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Pha chế pate.&nbsp;</p><p>Bước 2: Làm mỡ hành. </p><p>Bước 3: Ướp gia vị cho thịt pate. </p><p>Bước 4: Làm bánh mì. </p><p>Bước 5: Thoa pate lên bánh mì và thêm rau sống. </p><p>Bước 6: Thưởng thức.</p>'),
('fdf45s3fd5g4sdf546', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị cơm đã nấu. </p><p>Bước 2: Cắt thịt và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Chiên thịt và tỏi. </p><p>Bước 2: Thêm cơm vào chảo và xào đều với các gia vị. </p><p>Bước 3: Thêm ớt và nấm vào và xào thêm một lát. </p><p>Bước 4: Cho trứng vào và xào đều. </p><p>Bước 5: Dọn ra đĩa và thưởng thức.</p>'),
('fds34f6d34sdf63df4s6', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch bánh tráng và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Cắt bánh tráng thành những miếng nhỏ. </p><p>Bước 2: Trộn bánh tráng với gia vị và nước mắm. </p><p>Bước 3: Dọn ra đĩa và thưởng thức.</p>'),
('fds4f3d45g63dfg4s6d3', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch thịt và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Làm nhân nem. </p><p>Bước 2: Cuốn nem và chiên giòn. </p><p>Bước 3: Dọn ra đĩa và thưởng thức.</p>'),
('fds4f3df45g6df345g3d', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị rau và gà. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nướng gà. </p><p>Bước 2: Trộn rau với gia vị. </p><p>Bước 3: Dọn gà nướng lên đĩa và thêm rau trộn. </p><p>Bước 4: Thưởng thức.</p>'),
('fds4f3df45g6df345g3f', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị cơm và nguyên liệu. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Xào thịt bò với dưa cải. </p><p>Bước 2: Rang cơm và thêm gia vị. </p><p>Bước 3: Trộn thịt bò và dưa cải với cơm rang. </p><p>Bước 4: Dọn ra đĩa và thưởng thức.</p>'),
('ffd4546sdf3s4f6d34', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Nấu nước dùng bún bò Huế. </p><p>Bước 2: Chuẩn bị thịt bò và các nguyên liệu khác. </p><p><strong>*Chế biến</strong></p><p>Bước 1: Luộc bún.&nbsp;</p><p>Bước 2: Mắc bún. </p><p>Bước 3: Thêm thịt bò. </p><p>Bước 4: Cho các gia vị vào tô bún. </p><p>Bước 5: Thêm rau sống và ớt cắt nhỏ. </p><p>Bước 6: Thưởng thức.</p>'),
('ffd4sdf54sdf634df3', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị các nguyên liệu. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Ướp gia vị cho thịt. </p><p>Bước 2: Chế biến các nguyên liệu khác. </p><p>Bước 3: Làm ướt bánh tráng và xếp thịt và các nguyên liệu lên. </p><p>Bước 4: Gói chặt và thưởng thức.</p>'),
('g4df6g3df45g34dfg63d', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch cá lóc và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước dùng canh chua. </p><p>Bước 2: Cho cá lóc vào nồi nước dùng và nấu chín. </p><p>Bước 3: Thêm cà chua và gia vị vào nồi. </p><p>Bước 4: Dọn ra đĩa và thưởng thức.</p>'),
('g4df6g3df45g34dfg6d', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Chuẩn bị nguyên liệu làm bánh và nhân dừa. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Trộn bột và nước vào nhân dừa. </p><p>Bước 2: Làm nhân bánh và làm bánh. </p><p>Bước 3: Nướng bánh đến khi chín. </p><p>Bước 4: Dọn ra đĩa và thưởng thức.</p>'),
('gdf4sdf34sdf63sd4f6s', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch ngó sen và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước mắm chấm.&nbsp;</p><p>Bước 2: Trộn ngó sen với gia vị và nước mắm chấm. </p><p>Bước 3: Dọn ra đĩa và thưởng thức.</p>'),
('gf4d6g3df45g63df45g6', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch bí đỏ và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước dùng canh.&nbsp;</p><p>Bước 2: Cho bí đỏ vào nồi nước dùng và nấu chín. </p><p>Bước 3: Thêm gia vị và nấu thêm chút nữa. </p><p>Bước 4: Dọn ra đĩa và thưởng thức.</p>'),
('gf4d6g3df45g63df4g6d', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch cá mòi và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Xào cá mòi với cơm. </p><p>Bước 2: Thêm gia vị và chiên cho đến khi vàng đều. </p><p>Bước 3: Dọn ra đĩa và thưởng thức.</p>'),
('gf4d6g3df45g63df4g7d', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch sườn, bì và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nướng sườn và thái thành lát. </p><p>Bước 2: Xào bì với gia vị. </p><p>Bước 3: Làm cơm và dọn ra đĩa cùng với sườn và bì. </p><p>Bước 4: Thêm nước mắm và thưởng thức.</p>'),
('gfd4g3d45g63df4g6d3f', '<p><strong>*Sơ chế </strong></p><p>Bước 1: Làm sạch ốc len và các nguyên liệu khác. </p><p><strong>*Chế biến </strong></p><p>Bước 1: Nấu nước dùng ốc.&nbsp;</p><p>Bước 2: Nấu bún. </p><p>Bước 3: Cho ốc len vào nồi nước dùng và nấu chín. </p><p>Bước 4: Dọn ra đĩa và thưởng thức.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typedishs`
--

CREATE TABLE `typedishs` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `typedishs`
--

INSERT INTO `typedishs` (`typeID`, `typeName`) VALUES
(11, 'ăn chay'),
(10, 'ăn kiêng'),
(22, 'ăn nhẹ'),
(21, 'chính'),
(14, 'hấp'),
(20, 'khai vị'),
(12, 'lạnh'),
(17, 'luộc'),
(8, 'món Ấn'),
(1, 'món Hàn'),
(18, 'món nhanh'),
(4, 'món Nhật'),
(6, 'món Pháp'),
(7, 'món Thái'),
(3, 'món Trung'),
(2, 'món Việt'),
(5, 'món Ý'),
(13, 'nước dùng'),
(15, 'nướng'),
(9, 'siêu cay'),
(19, 'tráng miệng'),
(16, 'xào');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userID` varchar(40) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('ADMIN','USER') DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `created_at`, `updated_at`, `role`) VALUES
('6610e716d9cfd144092', 'operationddd', '$2y$10$wQ/5ry8jD5YQeOazC3lakewmQNOS6JJFfY0PuAtMk3XickkF4UdRS', 'operationddd@gmail.com', '2024-04-05 23:09:26', '2024-04-05 23:09:26', 'USER'),
('6610e8741fcb2844367', 'operationddd', '$2y$10$kh9v1ORsRKbWRTk0kyUxVO9D4M7cE3TmibrkfmPzI53UbfB.b04SS', 'admin@gmail.com', '2024-04-05 23:15:16', '2024-04-05 23:15:16', 'ADMIN'),
('66115ed000ae1258259', 'operationddd', '$2y$10$cLxZPVimCEtb5m3w/vm3HumFU3EdwRaAKj9SU3siVjmcJrzeMGHRK', 'hoangdung@gmail.com', '2024-04-06 07:40:16', '2024-04-06 07:40:16', 'USER'),
('66115ee270603588242', 'operationddd', '$2y$10$bpoamdM.iWfs771JAShFvOeen5sfCSE4Hhs378iAFzx1OMAXR1S66', 'hangnguyen@gmail.com', '2024-04-06 07:40:34', '2024-04-07 08:43:28', 'USER');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dishingredients`
--
ALTER TABLE `dishingredients`
  ADD PRIMARY KEY (`dishID`,`ingredientID`),
  ADD KEY `ingredientID` (`ingredientID`);

--
-- Chỉ mục cho bảng `dishs`
--
ALTER TABLE `dishs`
  ADD PRIMARY KEY (`dishID`);

--
-- Chỉ mục cho bảng `dishtypes`
--
ALTER TABLE `dishtypes`
  ADD PRIMARY KEY (`dishID`,`typeID`),
  ADD KEY `typeID` (`typeID`);

--
-- Chỉ mục cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientID`),
  ADD UNIQUE KEY `ingredientName` (`ingredientName`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`userID`,`dishID`),
  ADD KEY `dishID` (`dishID`);

--
-- Chỉ mục cho bảng `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`dishID`);

--
-- Chỉ mục cho bảng `typedishs`
--
ALTER TABLE `typedishs`
  ADD PRIMARY KEY (`typeID`),
  ADD UNIQUE KEY `typeName` (`typeName`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `typedishs`
--
ALTER TABLE `typedishs`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dishingredients`
--
ALTER TABLE `dishingredients`
  ADD CONSTRAINT `dishingredients_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dishs` (`dishID`),
  ADD CONSTRAINT `dishingredients_ibfk_2` FOREIGN KEY (`ingredientID`) REFERENCES `ingredients` (`ingredientID`);

--
-- Các ràng buộc cho bảng `dishtypes`
--
ALTER TABLE `dishtypes`
  ADD CONSTRAINT `dishtypes_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dishs` (`dishID`),
  ADD CONSTRAINT `dishtypes_ibfk_2` FOREIGN KEY (`typeID`) REFERENCES `typedishs` (`typeID`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`dishID`) REFERENCES `dishs` (`dishID`);

--
-- Các ràng buộc cho bảng `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dishs` (`dishID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
