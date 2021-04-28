<?php

class DatabaseConnection
{
    public $connection;
    function __construct($host, $port, $username, $password, $database)
    {
        try {
            $this->connection = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            print "Error!: " . $error->getMessage();
            die();
        }
    }
    function __destruct()
    {
        $this->connection = NULL;
    }
    function getConnectionStatus()
    {
        return (bool)$this->connection;
    }
}