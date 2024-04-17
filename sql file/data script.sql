--
-- Cấu trúc bảng cho bảng `dishingredients`
--

CREATE TABLE `dishingredients` (
  `dishID` varchar(20) NOT NULL,
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
('ffd4546sdf3s4f6d34', 4, 50, 'ml'),
('ffd4546sdf3s4f6d34', 6, 10, 'gram'),
('ffd4546sdf3s4f6d34', 9, 300, 'gram'),
('ffd4546sdf3s4f6d34', 49, 10, 'gram'),
('ffd4546sdf3s4f6d34', 133, 200, 'gram'),
('ffd4sdf54sdf634df3', 21, 50, 'gram'),
('ffd4sdf54sdf634df3', 22, 50, 'gram'),
('ffd4sdf54sdf634df3', 41, 100, 'gram'),
('ffd4sdf54sdf634df3', 56, 200, 'gram'),
('ffd4sdf54sdf634df3', 59, 4, 'tấm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishs`
--

CREATE TABLE `dishs` (
  `dishID` varchar(20) NOT NULL,
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
('32df3g4df6df3gdf34', 'Bánh canh cua', 'Món ăn truyền thống với bánh canh và cua tươi.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F32df3g4df6df3gdf34.png?alt=media&token=a6a4e1fc-3c0e-412c-bf82-55e76522865d', 0, '2024-04-06 10:32:38', '2024-04-08 02:00:57', 0.67),
('3f45s3fd5g4sdf643df', 'Cá kho tộ', 'Món ăn truyền thống của Việt Nam, cá kho tộ thơm ngon và béo ngậy.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3f45s3fd5g4sdf643df.png?alt=media&token=b5fbc43f-4094-4c33-b99c-f9363eb7219e', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.73),
('3fd5g4sdf643df54s3df', 'Bún riêu cua', 'Món ăn ngon và bổ dưỡng với bún và riêu cua thơm ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf546df345dfg6d5g46.png?alt=media&token=05ddbdc3-7ec6-4619-96d5-1973736141cd', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.55),
('3fsdfdf45s3fd5g4sdf', 'Bò bít tết', 'Món ăn phổ biến với thịt bò tươi ngon và sốt bơ đặc trưng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3fsdfdf45s3fd5g4sdf.png?alt=media&token=1a5069b3-8d66-497d-b071-7184c6cd13f4', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.50),
('df3sdf4d6f3d54f6d4', 'Bánh mỳ sandwich', 'Món ăn tiện lợi và ngon miệng với bánh mỳ và nhân đa dạng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf3sdf4d6f3d54f6d4.png?alt=media&token=4dc7503d-4777-4ef6-8643-63a6c37f0f53', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.75),
('df546df325dfg6d5g97', 'Thịt kho dưa cải', 'Cải muối chua kho với thịt siêu ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdf546df325dfg6d5g97.png?alt=media&token=7492d1df-80ed-45af-aca7-b717e947e1d8', 0, '2024-04-06 10:36:13', '2024-04-07 11:10:51', 0.60),
('df546df345dfg6d5g46', 'Bún ốc', 'Món ăn đặc trưng với bún và ốc tươi ngon.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2F3fd5g4sdf643df54s3df.png?alt=media&token=5f1e8f57-3b1b-4c99-930a-eff2a6757023', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.47),
('ds4f6d3sf4d6f34d6f3', 'Gà chiên giòn', 'Món ăn ngon và bổ dưỡng với gà được chiên giòn vàng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fds4f6d3sf4d6f34d6f3.png?alt=media&token=b37bffb9-e84a-45c5-998d-df119130f38b', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.47),
('fd45s3fd5g4sdf543', 'Phở gà', 'Món ăn truyền thống của Việt Nam, phở gà được làm từ nước dùng phở thơm ngon và thịt gà thái mỏng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffd45s3fd5g4sdf543.png?alt=media&token=d1a1162d-3ddd-4af5-85ab-b57c4a87c9c5', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.40),
('fd45s3fd5g4sdf544', 'Bánh mì pate', 'Món ăn phổ biến với hương vị thơm ngon của bánh mì và pate.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffd45s3fd5g4sdf544.png?alt=media&token=e4ecf09f-cdac-4d42-be5c-1e4c3503045e', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.73),
('fdf45s3fd5g4sdf546', 'Cơm chiên', 'Món ăn dễ làm từ cơm và các loại gia vị.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Ffdf45s3fd5g4sdf546.png?alt=media&token=1fad61d8-15f0-4127-9ec5-1dee6f840b9d', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.67),
('ffd4546sdf3s4f6d34', 'Bún bò Huế', 'Món ăn nổi tiếng với nước dùng thơm ngon và thịt bò thái mỏng.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fffd4546sdf3s4f6d34.png?alt=media&token=f916ea66-60d1-4b64-acb5-c95dcc05d59c', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.55),
('ffd4sdf54sdf634df3', 'Gỏi cuốn', 'Món ăn ngon và dễ làm từ các nguyên liệu tươi.', 'https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fffd4sdf54sdf634df3.png?alt=media&token=cd41cfd1-21ff-4748-84d6-beb95302779b', 0, '2024-04-06 10:32:38', '2024-04-07 11:10:51', 0.83);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dishtypes`
--

CREATE TABLE `dishtypes` (
  `dishID` varchar(20) NOT NULL,
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
('ffd4546sdf3s4f6d34', 2),
('ffd4546sdf3s4f6d34', 13),
('ffd4546sdf3s4f6d34', 15),
('ffd4546sdf3s4f6d34', 17),
('ffd4546sdf3s4f6d34', 21),
('ffd4sdf54sdf634df3', 2),
('ffd4sdf54sdf634df3', 19),
('ffd4sdf54sdf634df3', 20),
('ffd4sdf54sdf634df3', 21);

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
(10, 'Gạo'),
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
  `userID` varchar(20) NOT NULL,
  `dishID` varchar(20) NOT NULL,
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
('66115ee270603588242', '3fd5g4sdf643df54s3df', NULL, 0, '2024-04-09 10:33:34'),
('66115ee270603588242', '3fsdfdf45s3fd5g4sdf', 0.5, 0, NULL),
('66115ee270603588242', 'df3sdf4d6f3d54f6d4', NULL, 0, '2024-04-09 10:33:31'),
('66115ee270603588242', 'df546df325dfg6d5g97', 0.5, 0, NULL),
('66115ee270603588242', 'df546df345dfg6d5g46', 0.3, 0, NULL),
('66115ee270603588242', 'ds4f6d3sf4d6f34d6f3', 0.5, 0, NULL),
('66115ee270603588242', 'fd45s3fd5g4sdf543', 0.2, 0, NULL),
('66115ee270603588242', 'fd45s3fd5g4sdf544', 1, 0, NULL),
('66115ee270603588242', 'fdf45s3fd5g4sdf546', 0.8, 0, NULL),
('66115ee270603588242', 'ffd4546sdf3s4f6d34', NULL, 0, '2024-04-09 10:33:27'),
('66115ee270603588242', 'ffd4sdf54sdf634df3', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recipes`
--

CREATE TABLE `recipes` (
  `dishID` varchar(20) NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `recipes`
--

INSERT INTO `recipes` (`dishID`, `content`) VALUES
('32df3g4df6df3gdf34', '<p><strong>*<span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_90778922431712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_90778922431712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Sơ\" data-mce-lingo=\"en_us\">Sơ</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_89641138341712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_89641138341712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"chế\" data-mce-lingo=\"en_us\">chế</span> </strong></p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_41039042351712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_41039042351712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 1: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_56276370461712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_56276370461712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Nấu\" data-mce-lingo=\"en_us\">Nấu</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_53597670071712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_53597670071712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"nước\" data-mce-lingo=\"en_us\">nước</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_96566270981712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_96566270981712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"dùng\" data-mce-lingo=\"en_us\">dùng</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_46328580791712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_46328580791712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"bánh\" data-mce-lingo=\"en_us\">bánh</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_405627119101712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_405627119101712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"canh\" data-mce-lingo=\"en_us\">canh</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_482203056111712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_482203056111712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 2: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_156114605121712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_156114605121712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Chuẩn\" data-mce-lingo=\"en_us\">Chuẩn</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_421821143131712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_421821143131712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"bị\" data-mce-lingo=\"en_us\">bị</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_973324144141712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_973324144141712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"cua\" data-mce-lingo=\"en_us\">cua</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_225025018151712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_225025018151712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"và\" data-mce-lingo=\"en_us\">và</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_295026247161712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_295026247161712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"các\" data-mce-lingo=\"en_us\">các</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_59186516171712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_59186516171712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"nguyên\" data-mce-lingo=\"en_us\">nguyên</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_585526506181712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_585526506181712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"liệu\" data-mce-lingo=\"en_us\">liệu</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_161743436191712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_161743436191712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"khác\" data-mce-lingo=\"en_us\">khác</span>. </p><p><strong>*<span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_741264939201712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_741264939201712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Chế\" data-mce-lingo=\"en_us\">Chế</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_303449016211712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_303449016211712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"biến\" data-mce-lingo=\"en_us\">biến</span> </strong></p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_344467718221712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_344467718221712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 1: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_845524168231712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_845524168231712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"Làm\" data-mce-lingo=\"en_us\">Làm</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_102185082241712541623155\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_102185082241712541623155\" data-mce-bogus=\"1\" data-mce-annotation=\"sạch\" data-mce-lingo=\"en_us\">sạch</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_36773895251712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_36773895251712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"cua\" data-mce-lingo=\"en_us\">cua</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_399679953261712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_399679953261712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 2: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_183365494271712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_183365494271712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Làm\" data-mce-lingo=\"en_us\">Làm</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_454625515281712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_454625515281712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"sạch\" data-mce-lingo=\"en_us\">sạch</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_142285763291712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_142285763291712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"các\" data-mce-lingo=\"en_us\">các</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_688402399301712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_688402399301712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"loại\" data-mce-lingo=\"en_us\">loại</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_442786800311712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_442786800311712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"rau\" data-mce-lingo=\"en_us\">rau</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_19394966321712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_19394966321712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"cải\" data-mce-lingo=\"en_us\">cải</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_112311889331712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_112311889331712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 3: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_178718234341712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_178718234341712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Nấu\" data-mce-lingo=\"en_us\">Nấu</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_448336394351712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_448336394351712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"bánh\" data-mce-lingo=\"en_us\">bánh</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_620281786361712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_620281786361712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"canh\" data-mce-lingo=\"en_us\">canh</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_476044009371712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_476044009371712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 4: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_836671256381712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_836671256381712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Thêm\" data-mce-lingo=\"en_us\">Thêm</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_297471748391712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_297471748391712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"cua\" data-mce-lingo=\"en_us\">cua</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_874499949401712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_874499949401712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"vào\" data-mce-lingo=\"en_us\">vào</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_240238866411712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_240238866411712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"nồi\" data-mce-lingo=\"en_us\">nồi</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_166544769421712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_166544769421712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"nước\" data-mce-lingo=\"en_us\">nước</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_880148167431712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_880148167431712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"dùng\" data-mce-lingo=\"en_us\">dùng</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_339596463441712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_339596463441712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"và\" data-mce-lingo=\"en_us\">và</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_93446925451712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_93446925451712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"nấu\" data-mce-lingo=\"en_us\">nấu</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_714916463461712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_714916463461712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"chín\" data-mce-lingo=\"en_us\">chín</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_898262890471712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_898262890471712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 5: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_937611178481712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_937611178481712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Dọn\" data-mce-lingo=\"en_us\">Dọn</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_798179012491712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_798179012491712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"ra\" data-mce-lingo=\"en_us\">ra</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_406751791501712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_406751791501712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"bát\" data-mce-lingo=\"en_us\">bát</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_21719888511712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_21719888511712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"và\" data-mce-lingo=\"en_us\">và</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_675528735521712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_675528735521712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"thêm\" data-mce-lingo=\"en_us\">thêm</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_573598055531712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_573598055531712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"rau\" data-mce-lingo=\"en_us\">rau</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_618586853541712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_618586853541712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"sống\" data-mce-lingo=\"en_us\">sống</span>. </p><p><span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_914185750551712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_914185750551712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Bước\" data-mce-lingo=\"en_us\">Bước</span> 6: <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_363143939561712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_363143939561712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"Thưởng\" data-mce-lingo=\"en_us\">Thưởng</span> <span class=\"mce-spellchecker-annotation mce-spellchecker-word mce-cram_472369886571712541623156\" aria-invalid=\"spelling\" data-mce-highlight-id=\"mce-cram_472369886571712541623156\" data-mce-bogus=\"1\" data-mce-annotation=\"thức\" data-mce-lingo=\"en_us\">thức</span>.</p>'),
('3f45s3fd5g4sdf643df', '*Sơ chế\r\nBước 1: Làm sạch cá.\r\nBước 2: Chuẩn bị các gia vị.\r\n*Chế biến\r\nBước 1: Xào tỏi và ớt.\r\nBước 2: Cho cá vào xào chín.\r\nBước 3: Thêm nước mắm, đường và nước.\r\nBước 4: Nấu cho cá mềm và nước thấm đều vào thịt cá.\r\nBước 5: Dọn ra đĩa và thưởng thức.'),
('3fd5g4sdf643df54s3df', '*Sơ chế\r\nBước 1: Làm nước dùng riêu cua.\r\nBước 2: Làm sạch cua và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Nấu nước dùng.\r\nBước 2: Nấu bún.\r\nBước 3: Cho cua vào nồi nước dùng và nấu chín.\r\nBước 4: Dọn ra bát và thêm rau sống.\r\nBước 5: Thưởng thức.'),
('3fsdfdf45s3fd5g4sdf', '*Sơ chế\r\nBước 1: Chuẩn bị thịt bò và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Chiên thịt bò và trứng.\r\nBước 2: Làm sốt bơ.\r\nBước 3: Dọn thịt bò và trứng lên đĩa.\r\nBước 4: Đổ sốt bơ lên mặt.\r\nBước 5: Thêm rau sống và khoai tây chiên.\r\nBước 6: Thưởng thức.'),
('df3sdf4d6f3d54f6d4', '*Sơ chế\r\nBước 1: Chuẩn bị bánh mỳ và các nguyên liệu nhân.\r\n*Chế biến\r\nBước 1: Chuẩn bị nhân sandwich.\r\nBước 2: Làm bánh mỳ sandwich.\r\nBước 3: Thoa nhân lên bánh mỳ.\r\nBước 4: Thêm rau sống và các loại sốt.\r\nBước 5: Thưởng thức.'),
('df546df325dfg6d5g97', '*Sơ chế\r\nBước 1: Làm sạch rau.\r\nBước 2: Cắt thịt và luộc sơ.\r\n*Chế biến\r\nBước 1: Xào rau trong 15 phút.\r\nBước 2: Xào thịt trong 20 phút.\r\nBước 3: Thêm gia vị và xào đến khi hết nước.\r\nBước 4: Dọn ra bát và thêm rau sống.\r\nBước 5: Thưởng thức.'),
('df546df345dfg6d5g46', '*Sơ chế\r\nBước 1: Làm nước dùng ốc.\r\nBước 2: Làm sạch ốc và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Nấu nước dùng.\r\nBước 2: Nấu bún.\r\nBước 3: Cho ốc vào nồi nước dùng và nấu chín.\r\nBước 4: Dọn ra bát và thêm rau sống.\r\nBước 5: Thưởng thức.'),
('ds4f6d3sf4d6f34d6f3', '*Sơ chế\r\nBước 1: Làm sạch gà.\r\nBước 2: Ướp gia vị cho gà.\r\n*Chế biến\r\nBước 1: Chiên gà.\r\nBước 2: Thêm gia vị và chiên thêm.\r\nBước 3: Dọn ra đĩa và thưởng thức.'),
('fd45s3fd5g4sdf543', '*Sơ chế\r\nBước 1: Nấu nước dùng phở.\r\nBước 2: Chuẩn bị thịt gà và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Luộc phở.\r\nBước 2: Mắc phở.\r\nBước 3: Thêm thịt gà.\r\nBước 4: Cho các gia vị vào tô phở.\r\nBước 5: Thêm rau sống và ớt cắt nhỏ.\r\nBước 6: Thưởng thức.'),
('fd45s3fd5g4sdf544', '*Sơ chế\r\nBước 1: Chuẩn bị bánh mì và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Pha chế pate.\r\nBước 2: Làm mỡ hành.\r\nBước 3: Ướp gia vị cho thịt pate.\r\nBước 4: Làm bánh mì.\r\nBước 5: Thoa pate lên bánh mì và thêm rau sống.\r\nBước 6: Thưởng thức.'),
('fdf45s3fd5g4sdf546', '*Sơ chế\r\nBước 1: Chuẩn bị cơm đã nấu.\r\nBước 2: Cắt thịt và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Chiên thịt và tỏi.\r\nBước 2: Thêm cơm vào chảo và xào đều với các gia vị.\r\nBước 3: Thêm ớt và nấm vào và xào thêm một lát.\r\nBước 4: Cho trứng vào và xào đều.\r\nBước 5: Dọn ra đĩa và thưởng thức.'),
('ffd4546sdf3s4f6d34', '*Sơ chế\r\nBước 1: Nấu nước dùng bún bò Huế.\r\nBước 2: Chuẩn bị thịt bò và các nguyên liệu khác.\r\n*Chế biến\r\nBước 1: Luộc bún.\r\nBước 2: Mắc bún.\r\nBước 3: Thêm thịt bò.\r\nBước 4: Cho các gia vị vào tô bún.\r\nBước 5: Thêm rau sống và ớt cắt nhỏ.\r\nBước 6: Thưởng thức.'),
('ffd4sdf54sdf634df3', '*Sơ chế\r\nBước 1: Chuẩn bị các nguyên liệu.\r\n*Chế biến\r\nBước 1: Ướp gia vị cho thịt.\r\nBước 2: Chế biến các nguyên liệu khác.\r\nBước 3: Làm ướt bánh tráng và xếp thịt và các nguyên liệu lên.\r\nBước 4: Gói chặt và thưởng thức.');

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
  `userID` varchar(20) NOT NULL,
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
('6610e716d9cfd144092', 'operationddd', '$2y$10$wQ/5ry8jD5YQeOazC3lakewmQNOS6JJFfY0PuAtMk3XickkF4UdRS', 'operationddd@gmail.com', '2024-04-06 06:09:26', '2024-04-06 06:09:26', 'USER'),
('6610e8741fcb2844367', 'operationddd', '$2y$10$kh9v1ORsRKbWRTk0kyUxVO9D4M7cE3TmibrkfmPzI53UbfB.b04SS', 'admin@gmail.com', '2024-04-06 06:15:16', '2024-04-06 06:15:16', 'ADMIN'),
('66115ed000ae1258259', 'operationddd', '$2y$10$cLxZPVimCEtb5m3w/vm3HumFU3EdwRaAKj9SU3siVjmcJrzeMGHRK', 'hoangdung@gmail.com', '2024-04-06 14:40:16', '2024-04-06 14:40:16', 'USER'),
('66115ee270603588242', 'operationddd', '$2y$10$bpoamdM.iWfs771JAShFvOeen5sfCSE4Hhs378iAFzx1OMAXR1S66', 'hangnguyen@gmail.com', '2024-04-06 14:40:34', '2024-04-07 15:43:28', 'USER');

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