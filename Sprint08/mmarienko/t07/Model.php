<?php
    include('DatabaseConnection.php');

    abstract class Model {
        protected $connection;
        protected $database;

        public function __construct() {
            $this->setConnection();
            $this->setTable();
        }
        protected function setTable()
        {
            $table='USE ucode_web;
            SELECT * FROM heroes;';
            $create=$this->database->connection->prepare($table);
            $create->execute();
        }
        protected function setConnection() {
            $this->database = new DatabaseConnection("127.0.0.1", "3306", "iyakhnov", "securepass", "ucode_web");
        }
        abstract protected function find($id);
        abstract protected function delete();
        abstract protected function save();
    }
?>