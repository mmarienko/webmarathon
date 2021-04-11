<?php

namespace model;

use DatabaseConnection;

abstract class Model {

	protected $database;

    public function __construct()
    {
        $this->setConnection();
        $this->setTable();
    }
    protected function setTable()
    {
        $table = "
        CREATE TABLE IF NOT EXISTS users (
            `id` int NOT NULL primary key AUTO_INCREMENT,
            `login` varchar(12) UNIQUE NOT NULL,
            `password` varchar(30) NOT NULL,
            `fullname` varchar(30) NOT NULL,
            `email` varchar(30) NOT NULL,
            `status` ENUM('admin', 'user') NOT NULL DEFAULT 'user'
        );
        INSERT INTO users(login, password, fullname, email, status) VALUES ('admin', 'admin', 'admin', 'zmaryenko@gmail.com', 'admin');";
        $this->database->connection->query($table);
    }
    function setConnection()
    {
        $this->database = new DatabaseConnection("127.0.0.1", "3306", "mmarienko", "securepass", "sword");
    }
}