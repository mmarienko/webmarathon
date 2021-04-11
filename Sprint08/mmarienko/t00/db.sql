CREATE DATABASE 'ucode_web';
CREATE USER 'mmarienko' @'localhost' IDENTIFIED BY 'securepass';
GRANT ALL PRIVILEGES ON *.* TO 'mmarienko' @'localhost';
FLUSH PRIVILEGES;

/*
 quit
 mysql -u 'mmarienko' -p
 securepass
 */