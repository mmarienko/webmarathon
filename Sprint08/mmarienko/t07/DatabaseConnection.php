<?php
    class DatabaseConnection {
        public $connection;
        function __construct($host, $port, $username, $password, $database) {
            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            } catch (PDOException $error) {
                print "Error!: ".$error->getMessage();
                die();
            }
        }
        function __destruct() {
            $this->connection = NULL;
        }
        function getConnectionStatus() {
            if ($this->connection != NULL)
                return true;
            return false;
        }
    }
?>