CREATE TABLE users (
  userID VARCHAR(20) PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role ENUM('ADMIN', 'USER') DEFAULT 'USER'
);

CREATE TABLE typeDishs (
  typeID INT PRIMARY KEY AUTO_INCREMENT,
  typeName VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci UNIQUE
);

CREATE TABLE ingredients (
  ingredientID INT PRIMARY KEY AUTO_INCREMENT,
  ingredientName VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci UNIQUE
);

CREATE TABLE dishs (
  dishID VARCHAR(20) PRIMARY KEY,
  dishName VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  summary VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipes (
  dishID VARCHAR(20) PRIMARY KEY,
  content VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  FOREIGN KEY (dishID) REFERENCES dishs(dishID) 
);

CREATE TABLE dishIngredients (
  dishID VARCHAR(20),
  ingredientID INT,
  amount INT,
  unit VARCHAR(255) DEFAULT 'gram',
  PRIMARY KEY (dishID, ingredientID),
  FOREIGN KEY (dishID) REFERENCES dishs(dishID),
  FOREIGN KEY (ingredientID) REFERENCES ingredients(ingredientID)
);

CREATE TABLE dishTypes (
  dishID VARCHAR(20),
  typeID INT,
  PRIMARY KEY (dishID, typeID),
  FOREIGN KEY (dishID) REFERENCES dishs(dishID),
  FOREIGN KEY (typeID) REFERENCES typeDishs(typeID)
);

CREATE TABLE ratings (
  userID VARCHAR(20),
  dishID VARCHAR(20),
  rating INT,
  PRIMARY KEY (userID, dishID),
  FOREIGN KEY (userID) REFERENCES users(userID),
  FOREIGN KEY (dishID) REFERENCES dishs(dishID)
);

