CREATE DATABASE 'sword';
CREATE USER 'mmarienko' @'localhost' IDENTIFIED BY 'securepass';
GRANT ALL PRIVILEGES ON *.* TO 'mmarienko' @'localhost';
FLUSH PRIVILEGES;
USE sword;

CREATE TABLE users (
    id int NOT NULL primary key AUTO_INCREMENT,
    login VARCHAR(12) NOT NULL UNIQUE,
    password text NOT NULL,
    fullname NVARCHAR(30),
    email NVARCHAR(30)
) default charset utf8;