CREATE DATABASE 'sword';
CREATE USER 'mmarienko' @'localhost' IDENTIFIED BY 'securepass';
GRANT ALL PRIVILEGES ON *.* TO 'mmarienko' @'localhost';
FLUSH PRIVILEGES;
/* база данных создается сама */