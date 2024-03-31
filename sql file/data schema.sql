CREATE TABLE users (
  userID VARCHAR(20) PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role ENUM('ADMIN', 'USER') DEFAULT 'USER'
);

CREATE TABLE typeDisks (
  typeID INT PRIMARY KEY AUTO_INCREMENT,
  typeName NVARCHAR(255) UNIQUE
);

CREATE TABLE ingredients (
  ingredientID INT PRIMARY KEY AUTO_INCREMENT,
  ingredientName NVARCHAR(255) UNIQUE
);

CREATE TABLE disks (
  diskID VARCHAR(20) PRIMARY KEY,
  diskName NVARCHAR(255),
  summary NVARCHAR(255),
  url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipes (
  recipeID VARCHAR(20) PRIMARY KEY,
  diskID VARCHAR(20),
  content VARCHAR(500),
  FOREIGN KEY (diskID) REFERENCES disks(diskID)
);

CREATE TABLE diskIngredients (
  diskID VARCHAR(20),
  ingredientID INT,
  amount INT,
  unit VARCHAR(255),
  PRIMARY KEY (diskID, ingredientID),
  FOREIGN KEY (diskID) REFERENCES disks(diskID),
  FOREIGN KEY (ingredientID) REFERENCES ingredients(ingredientID)
);

CREATE TABLE diskTypes (
  diskID VARCHAR(20),
  typeID INT,
  PRIMARY KEY (diskID, typeID),
  FOREIGN KEY (diskID) REFERENCES disks(diskID),
  FOREIGN KEY (typeID) REFERENCES typeDisks(typeID)
);

CREATE TABLE ratings (
  userID VARCHAR(20),
  diskID VARCHAR(20),
  rating INT,
  PRIMARY KEY (userID, diskID),
  FOREIGN KEY (userID) REFERENCES users(userID),
  FOREIGN KEY (diskID) REFERENCES disks(diskID)
);

