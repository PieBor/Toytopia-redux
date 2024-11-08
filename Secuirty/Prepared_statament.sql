-- Prepare the statement
PREPARE stmt FROM '
INSERT INTO User (Email, FirstName, LastName, DateOfBirth, HouseNumberOrName, StreetName, City, Country, MobileNumber, PasswordHash, Salt, Status)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
';

-- Execute the statement for each row of data
SET @Email1 = 'john.doe@example.com';
SET @FirstName1 = 'John';
SET @LastName1 = 'Doe';
SET @DateOfBirth1 = '1980-01-01';
SET @HouseNumberOrName1 = '123 Main St';
SET @StreetName1 = 'Anytown';
SET @City1 = 'USA';
SET @Country1 = 'United States';
SET @MobileNumber1 = '555-1234';
SET @PasswordHash1 = '4ec32c0e04d96d7e95a8e1f0ca1a0d2c9ed8f139dc41b3547f1a962dbd16540b';
SET @Salt1 = '12345678';
SET @Status1 = 'active';
EXECUTE stmt USING @Email1, @FirstName1, @LastName1, @DateOfBirth1, @HouseNumberOrName1, @StreetName1, @City1, @Country1, @MobileNumber1, @PasswordHash1, @Salt1, @Status1;

SET @Email2 = 'jane.doe@example.com';
SET @FirstName2 = 'Jane';
SET @LastName2 = 'Doe';
SET @DateOfBirth2 = '1985-01-01';
SET @HouseNumberOrName2 = '456 Elm St';
SET @StreetName2 = 'Othertown';
SET @City2 = 'USA';
SET @Country2 = 'United States';
SET @MobileNumber2 = '555-5678';
SET @PasswordHash2 = 'a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08';
SET @Salt2 = '87654321';
SET @Status2 = 'active';
EXECUTE stmt USING @Email2, @FirstName2, @LastName2, @DateOfBirth2, @HouseNumberOrName2, @StreetName2, @City2, @Country2, @MobileNumber2, @PasswordHash2, @Salt2, @Status2;

SET @Email3 = 'bob@example.com';
SET @FirstName3 = 'Bob';
SET @LastName3 = 'Smith';
SET @DateOfBirth3 = '1985-07-08';
SET @HouseNumberOrName3 = '789 Elm St';
SET @StreetName3 = 'Othertown';
SET @City3 = 'USA';
SET @Country3 = 'United States';
SET @MobileNumber3 = '555-5678';
SET @PasswordHash3 = 'a0a45af5dbd87df831f251e99eb97d6f9e56c8ee8145c5e5d9636dce0d624a08';
SET @Salt3 = '87654321';
SET @Status3 = 'inactive';

--  bind the variables to the placeholders in the prepared statement

EXECUTE stmt USING @Email, @FirstName, @LastName, @DateOfBirth, @HouseNumberOrName, @StreetName, @City, @Country, @MobileNumber, @PasswordHash, @Salt, @Status;

-- Deallocate the statement
DEALLOCATE PREPARE stmt;



-- Another sample user data
/*

-- define variables for the new user's data
SET @Email = 'user@example.com';
SET @FirstName = 'John';
SET @LastName = 'Doe';
SET @DateOfBirth = '1990-01-01';
SET @HouseNumberOrName = '123 Main St';
SET @StreetName = 'Anytown';
SET @City = 'Any City';
SET @Country = 'Any Country';
SET @MobileNumber = '555-1234';
SET @PasswordHash = 'hashed_password';
SET @Salt = 'random_salt';

-- prepare the SQL statement with placeholders for the variables
PREPARE stmt FROM 'INSERT INTO User (Email, FirstName, LastName, DateOfBirth, HouseNumberOrName, StreetName, City, Country, MobileNumber, PasswordHash, Salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

-- bind the variables to the placeholders in the prepared statement
EXECUTE stmt USING @Email, @FirstName, @LastName, @DateOfBirth, @HouseNumberOrName, @StreetName, @City, @Country, @MobileNumber, @PasswordHash, @Salt;

-- deallocate the prepared statement
DEALLOCATE PREPARE stmt;
*/