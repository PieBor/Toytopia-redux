-- Table: Category
CREATE TABLE Category (
    CategoryID INT NOT NULL AUTO_INCREMENT,
    CategoryName VARCHAR(50) NOT NULL,
    PRIMARY KEY (CategoryID)
);

-- Table: User
CREATE TABLE User (
    Email VARCHAR(50) NOT NULL PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    DateOfBirth DATE,
    HouseNumberOrName VARCHAR(50),
    StreetName VARCHAR(50),
    City VARCHAR(50),
    Country VARCHAR(50),
    MobileNumber VARCHAR(15) NOT NULL,
    PasswordHash VARCHAR(100) NOT NULL,
    Salt VARCHAR(100) NOT NULL,
    Status VARCHAR(50),
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- Trigger: hash_password
CREATE TRIGGER hash_password BEFORE INSERT ON User
FOR EACH ROW 
    SET NEW.Salt = SUBSTRING(MD5(RAND()),1,8);
    SET NEW.PasswordHash = SHA2(CONCAT(NEW.Password, NEW.Salt), 256);

-- Index: IDX_User_Email
CREATE UNIQUE INDEX IDX_User_Email ON User (Email);

-- Table: AgeRange
CREATE TABLE AgeRange (
    AgeRangeID INT NOT NULL AUTO_INCREMENT,
    AgeRangeName VARCHAR(50) NOT NULL,
    PRIMARY KEY (AgeRangeID)
);

-- Table: ToyCondition
CREATE TABLE ToyCondition (
    ToyConditionID INT NOT NULL AUTO_INCREMENT,
    ToyConditionName VARCHAR(50) NOT NULL,
    PRIMARY KEY (ToyConditionID)
);

-- Table: ToyBrand
CREATE TABLE ToyBrand (
    ToyBrandID INT NOT NULL AUTO_INCREMENT,
    ToyBrandName VARCHAR(50) NOT NULL,
    PRIMARY KEY (ToyBrandID)
);

-- Table: Toy
CREATE TABLE Toy (
    ToyID INT NOT NULL AUTO_INCREMENT,
    ToyName VARCHAR(50) NOT NULL,
    ToyImage LONGBLOB,
    CategoryID INT NOT NULL,
    Description VARCHAR(500),
    Email VARCHAR(50) NOT NULL,
    AgeRangeID INT NOT NULL,
    Status VARCHAR(50),
    DateAddedToCollection DATE,
    ToyConditionID INT NOT NULL,
    ToyBrandID INT NOT NULL,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (ToyID),
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID),
    FOREIGN KEY (Email) REFERENCES User(Email),
    FOREIGN KEY (AgeRangeID) REFERENCES AgeRange(AgeRangeID),
    FOREIGN KEY (ToyConditionID) REFERENCES ToyCondition(ToyConditionID),
    FOREIGN KEY (ToyBrandID) REFERENCES ToyBrand(ToyBrandID)
);

-- Index: IDX_Toy_CategoryID
CREATE INDEX IDX_Toy_CategoryID ON Toy (CategoryID);

-- Index: IDX_Toy_Email
CREATE INDEX IDX_Toy_Email ON Toy (Email);

-- Index: IDX_Toy_ToyName
CREATE INDEX IDX_Toy_ToyName ON Toy (ToyName);

-- Index: IDX_Toy_ConditionOfToy
CREATE INDEX IDX_Toy_ToyConditionID ON Toy (ToyConditionID);

-- Index: IDX_Toy_ToyBrandID
CREATE INDEX IDX_Toy_ToyBrandID ON Toy (ToyBrandID);


