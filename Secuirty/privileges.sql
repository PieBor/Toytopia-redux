-- User with read-only privileges
CREATE USER 'user_read'@'localhost' IDENTIFIED BY 'read_password';
GRANT SELECT ON toytopia.* TO 'user_read'@'localhost';

-- User with create and read privileges
CREATE USER 'user_create_read'@'localhost' IDENTIFIED BY 'create_read_password';
GRANT SELECT, INSERT ON toytopia.* TO 'user_create_read'@'localhost';

-- User with read and update privileges
CREATE USER 'user_read_update'@'localhost' IDENTIFIED BY 'read_update_password';
GRANT SELECT, UPDATE ON toytopia.* TO 'user_read_update'@'localhost';

-- User with all privileges access
CREATE USER 'user1'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON toytopia.* TO 'user1'@'localhost';
