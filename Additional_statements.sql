-- Additional requirement statements base on the project manager feedback:

-- Update the password for a specific user with Email in the User table:
UPDATE User
SET PasswordHash = 'new_password_hash', Salt = 'new_salt'
WHERE Email = 'john.doe@example.com';


-- To update the details for a specific user in the User table:



UPDATE USER
SET MOBILENUMBER = '555-123-4567', CITY = 'New City'
WHERE EMAIL = 'john.doe@example.com';



-- Delete a specific user from the User table with the email address, two steps.
DELETE FROM Toy 
WHERE Email = 'john.doe@example.com';
DELETE FROM USER
WHERE EMAIL = 'john.doe@example.com';

-- Delete a specific toy from the Toy table with the email address:

DELETE FROM TOY
WHERE
    TOYID = 4
    AND EMAIL = 'john.doe@example.com'; -- in case the email into toy table -- not correct

-- Delete a specific toy from the Toy table with the specific toy name:

-- OR
DELETE FROM TOY
WHERE TOYNAME = 'Barbie Dreamhouse'; 


-- Update the status of a specific toy in the Toy table base on age, name.

UPDATE Toy t
SET t.Status = 'Unavailable'
WHERE t.AgeRangeID = (
    SELECT ar.AgeRangeID
    FROM AgeRange ar
    WHERE ar.AgeRangeName = '3-5 Years'
)
AND t.ToyName = 'Stuffed Bear';

SELECT * FROM Toy;

-- Get all toys with a specific category:

SELECT *
FROM TOY
WHERE CATEGORYID = 3;

-- Get all toys with a specific age:

SELECT ToyName, ToyImage, Description, Status, DateAddedToCollection, ToyConditionName, ToyBrandName
FROM Toy
INNER JOIN AgeRange ON Toy.AgeRangeID = AgeRange.AgeRangeID
INNER JOIN ToyCondition ON Toy.ToyConditionID = ToyCondition.ToyConditionID
INNER JOIN ToyBrand ON Toy.ToyBrandID = ToyBrand.ToyBrandID
WHERE AgeRangeName = '6-8 Years';


-- Validate an email address and password against the database to ensure that the user has entered valid credentials

SELECT * FROM User
WHERE Email = 'jane.doe@example.com'
AND PasswordHash = SHA2(CONCAT('a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08', Salt), 256);

-- UPDATE Toy table

UPDATE Toy
SET ToyImage = 'images/eight.png',
CategoryID = 1,
Description = 'Soft and cuddly stuffed bear',
Email = 'john.doe@example.com',
AgeRangeID = 2,
Status = 'Available',
DateAddedToCollection = '2022-01-01',
ToyConditionID = 1,
ToyBrandID = 2
WHERE ToyName = 'Stuffed Bear';
