-- Sample data for CATEGORY table

INSERT INTO CATEGORY (
CATEGORYNAME
) VALUES (
'Dolls'
),
(
'Cars'
),
(
'Educational Games'
),
(
'Pretend Play'
),
(
'Puzzles & Board Games'
),
(
'Remote Control'
),
(
'Others'
);

-- Sample data with the 'Status' column included
INSERT INTO User (Email, FirstName, LastName, DateOfBirth, HouseNumberOrName, StreetName, City, Country, MobileNumber, PasswordHash, Salt, Status) VALUES
    ('john.doe@example.com', 'John', 'Doe', '1980-01-01', '123 Main St', 'Anytown', 'USA', 'United States', '555-1234', '4ec32c0e04d96d7e95a8e1f0ca1a0d2c9ed8f139dc41b3547f1a962dbd16540b', '12345678', 'active'),
    ('jane.doe@example.com', 'Jane', 'Doe', '1985-01-01', '456 Elm St', 'Othertown', 'USA', 'United States', '555-5678', 'a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08', '87654321', 'active'),
    ('bob@example.com', 'Bob', 'Smith', '1985-07-08', '789 Elm St', 'Othertown', 'USA', 'United States', '555-5678', 'a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08', '87654321', 'inactive'),
    ('lisa@example.com', 'Lisa', 'Johnson', '1990-03-15', '789 Oak Ave', 'Sometown', 'USA', 'United States', '555-9876', 'c6a139a105ae12a8d6f3d6e29e9d89a62c57ef519d0dbfce526f6e9c4c731237', '98765432', 'active'),
    ('alex@example.com', 'Alex', 'Wilson', '1992-09-20', '321 Elm St', 'Othertown', 'USA', 'United States', '555-2468', '8f139dc41b3547f1a962dbd16540b4ec32c0e04d96d7e95a8e1f0ca1a0d2c9ed', '65432187', 'active');

-- Sample data for AgeRange table
INSERT INTO AgeRange (AgeRangeName) VALUES

    ('0-18 Months'),

    ('18-36 Months'),

    ('3-5 Years'),

    ('6-8 Years'),

    ('9+ Years');

-- Sample data for ToyCondition table
INSERT INTO ToyCondition (ToyConditionName) VALUES
    ('New'),
    ('Like New'),
    ('Good'),
    ('Fair'),
    ('Poor');
    
-- Sample data for ToyBrand table
INSERT INTO ToyBrand (ToyBrandName) VALUES
    ('LEGO'),
    ('Barbie'),
    ('Hasbro'),
    ('Fisher-Price'),
    ('Melissa & Doug');


    
    -- Sample data for Toy table
INSERT INTO Toy (ToyName, ToyImage, CategoryID, Description, Email, AgeRangeID, Status, DateAddedToCollection, ToyConditionID, ToyBrandID)
VALUES
    ('Stuffed Bear', 'images/eight.png', 1, 'Soft and cuddly stuffed bear', 'john.doe@example.com', 2, 'Available', '2022-01-01', 1, 2),
    ('Plastic Doll', 'images/dolls.png', 1, 'Plastic doll with movable joints', 'jane.doe@example.com', 1, 'Available', '2022-02-01', 1, 3),
    ('Barbie Doll', 'images/dolls.png', 1, 'Fashion doll with various accessories', 'john.doe@example.com', 1, 'Unavailable', '2022-03-01', 1, 3),

    ('Toy Car', 'images/car.png', 2, 'Toy car with remote control', 'jane.doe@example.com', 3, 'Available', '2022-04-01', 2, 4),
    ('Building Blocks', 'images/lego.png', 2, 'Building blocks set for creative construction', 'bob@example.com', 3, 'Available', '2022-05-01', 2, 1),
    ('Legos', 'images/lego.png', 2, 'Lego bricks set for building various structures', 'john.doe@example.com', 3, 'Available', '2022-06-01', 2, 1),

    ('Educational Game', 'images/educational.png', 3, 'Interactive educational game for learning', 'jane.doe@example.com', 4, 'Available', '2022-07-01', 3, 2),
    ('Puzzle', 'images/puzzle.png', 3, 'Jigsaw puzzle with 100 pieces', 'john.doe@example.com', 2, 'Available', '2022-08-01', 1, 5),
    ('Board Game', 'images/board-game.png', 3, 'Classic board game for family entertainment', 'jane.doe@example.com', 4, 'Unavailable', '2022-09-01', 2, 3),

    ('Play Kitchen Set', 'images/kitchen.png', 4, 'Pretend play kitchen set with utensils', 'bob@example.com', 3, 'Available', '2022-10-01', 1, 4),
    ('Doctor Kit', 'images/doctor.png', 4, 'Pretend play doctor kit with medical tools', 'jane.doe@example.com', 2, 'Available', '2022-11-01', 2, 5),
    ('Superhero Cape', 'images/superhero.png', 4, 'Pretend play superhero cape for imaginative play', 'john.doe@example.com', 1, 'Available', '2022-12-01', 3, 1),

    ('Chess Set', 'images/chess.png', 5, 'Classic chess set for strategic gameplay', 'john.doe@example.com', 4, 'Available', '2023-01-01', 1, 3),
    ('Jigsaw Puzzle', 'images/puzzle.png', 5, 'Jigsaw puzzle with 500 pieces', 'bob@example.com', 4, 'Available', '2023-02-01', 2, 5),
    ('Scrabble', 'images/scrabble.png', 5, 'Word-building board game for language skills', 'jane.doe@example.com', 4, 'Unavailable', '2023-03-01', 3, 4),

    ('Remote Control Car 2', 'images/car.png', 6, 'Toy car operated by remote control', 'john.doe@example.com', 3, 'Available', '2023-04-01', 2, 4),
    ('Drone 2', 'images/drone.png', 6, 'Remote control drone for aerial exploration', 'bob@example.com', 4, 'Available', '2023-05-01', 1, 5),
    ('Robot', 'images/robot.png', 6, 'Interactive robot toy with various functions', 'jane.doe@example.com', 3, 'Available', '2023-06-01', 3, 2),

    ('Other Toy 1', 'images/other.png', 7, 'Description of other toy 1', 'john.doe@example.com', 2, 'Available', '2023-07-01', 1, 2),
    ('Other Toy 2', 'images/other.png', 7, 'Description of other toy 2', 'bob@example.com', 3, 'Available', '2023-08-01', 2, 3),
    ('Other Toy 3', 'images/other.png', 7, 'Description of other toy 3', 'jane.doe@example.com', 1, 'Available', '2023-09-01', 3, 1);
