-- Use of the BETWEEN logical operator:
-- EX 
SELECT
*
FROM
TOY
WHERE
DATEADDEDTOCOLLECTION BETWEEN '2022-01-01'
AND '2022-12-31';

-- An example of DISTINCT within your query:
-- EX
SELECT
DISTINCT CATEGORYNAME
FROM
CATEGORY;

-- TO_CHAR function:
-- (note: TO_CHAR is not a function in MySQL, using DATE_FORMAT instead)

SELECT
DATE_FORMAT(DATEADDEDTOCOLLECTION, '%d/%m/%Y') AS FORMATTEDDATE
FROM
TOY;

-- An aggregate function in the SELECT list in the ToyBrand table


SELECT ToyBrandName, COUNT(*) AS TotalToys
FROM ToyBrand
LEFT JOIN Toy ON ToyBrand.ToyBrandID = Toy.ToyBrandID
GROUP BY ToyBrandName;


-- A GROUP BY command:
-- GROUP BY command to get the count of toys in each category
SELECT c.CATEGORYNAME, COUNT(*) AS TotalToys
FROM Toy t
INNER JOIN CATEGORY c ON t.CategoryID = c.CategoryID
GROUP BY c.CATEGORYNAME;

-- A SUBQUERY:
SELECT
FIRSTNAME,
LASTNAME
FROM
USER
WHERE
MOBILENUMBER IN (
SELECT
MOBILENUMBER
FROM
TOY
WHERE
TOYNAME LIKE '%lego%'
);

-- OR (subquery between the Toy and User tables, where select all toys that belong to users with a specific email)

SELECT ToyName, Description, Email
FROM Toy
WHERE Email IN (
    SELECT Email
    FROM User
    WHERE Email = 'john.doe@example.com'
);

-- Demonstrating the use of an OUTER JOIN:
SELECT
TOY.TOYNAME,
CATEGORY.CATEGORYNAME
FROM
TOY
LEFT OUTER JOIN CATEGORY
ON TOY.CATEGORYID = CATEGORY.CATEGORYID;


-- Sample insert data for testing:

-- Inserting a new toy:
INSERT INTO Toy (ToyName, ToyImage, CategoryID, Description, Email, AgeRangeID, Status, DateAddedToCollection, ToyConditionID, ToyBrandID)
VALUES
('Lego City Fire Station', LOAD_FILE('/path/to/lego_city_fire_station.png'), 4, 'Lego set featuring a fire station and fire trucks', 'john.doe@example.com', 3, 'Available', '2023-03-26', 1, 1);

-- Updating the status of a toy:
UPDATE Toy SET Status = 'Unavailable' WHERE ToyName = 'Barbie Doll';

-- Deleting a toy:
DELETE FROM Toy WHERE ToyName = 'Remote Control Car';

-- Update the category of toy ToyID 3 from "Dolls" to "Arts and Crafts", the SQL statement would be:

UPDATE Toy
SET CategoryID = (SELECT CategoryID FROM Category WHERE CategoryName = 'Arts and Crafts')
WHERE ToyID = 3;

-- Inserting a new category:
INSERT INTO CATEGORY (CATEGORYNAME)
VALUES ('Electronic Toys');

-- Inserting a new user:

INSERT INTO User (Email, FirstName, LastName, DateOfBirth, HouseNumberOrName, StreetName, City, Country, MobileNumber, PasswordHash, Salt)
VALUES ('jim.smith@example.com', 'Jim', 'Smith', '1990-05-15', '321 Oak Ave', 'Somewhere', 'USA', 'United States', '555-2468', 'c3f3dcf8a88ce0d71d18709b6b46f0911c75a9d9d11fc9826e011058a1b2c83e', 'abcd1234');





