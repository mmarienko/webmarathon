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
            `status` varchar(30) NOT NULL
        );
        INSERT INTO users(login, password, fullname, email, status) VALUES ('admin', 'admin', 'admin', 'zmaryenko@gmail.com', '0');
        INSERT INTO users(login, password, fullname, email, status) VALUES ('user', 'user', 'user', 'zmaryenko@gmail.com', '0');
        CREATE TABLE IF NOT EXISTS games (
            `id` int NOT NULL primary key AUTO_INCREMENT,
            `login1` text,
            `cards1` text,
            `lifes1` int,
            `stones1` int,
            `active_card1` int,
            `login2` text,
            `cards2` text,
            `lifes2` int,
            `stones2` int,
            `round` int,
            `active_card2` int,
            `active` text
        );";
        $this->database->connection->query($table);
    }
    function setConnection()
    {
        $this->database = new DatabaseConnection("127.0.0.1", "3306", "mmarienko", "securepass", "sword");
    }
}