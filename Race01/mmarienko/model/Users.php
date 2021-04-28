<?php

namespace model;

use model\Model, PDOException, PDO;

class Users extends Model
{
    public $id, $name, $description, $race, $class_role;

    public function login($login, $password)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT login, password FROM users WHERE login = :login AND password = :password");
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->bindValue(':password', $password, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetch();
                if (!$result) {
                    throw new PDOException("Select null", 1);
                }
                return 1;
            } catch (PDOException $exception) {
                if ($exception->getCode() == 1) {
                    print_r("User not found");
                } else {
                    print_r($exception->getMessage());
                };
                return 0;
            }
        }
    }

    public function create($login, $password, $fullname, $email)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("INSERT INTO users(login, password, fullname, email, status)
                VALUES (:login, :password, :fullname, :email, '0')");
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->bindValue(':password', $password, PDO::PARAM_STR);
                $sth->bindValue(':fullname', $fullname, PDO::PARAM_STR);
                $sth->bindValue(':email', $email, PDO::PARAM_STR);
                $sth->execute();
                return 1;
            } catch (PDOException $exception) {
                if ($exception->getCode() == '01000') {
                    print_r("Wrong status. Use: admin or user");
                } else if ($exception->getCode() == '23000') {
                    print_r("Login already exist");
                } else {
                    print_r($exception->getMessage());
                };
                return 0;
            }
        }
    }

    public function find($login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM users WHERE login = :login");
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetch();
                if (!$result) {
                    throw new PDOException("Select null", 1);
                }
                return $result;
            } catch (PDOException $exception) {
                if ($exception->getCode() == 1) {
                    print_r("User not found");
                } else {
                    print_r($exception->getMessage());
                };
                return 0;
            }
        }
    }

    public function getAll()
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM users");
                $sth->execute();
                $result = $sth->fetch();
                if (!$result) {
                    throw new PDOException("Select null", 1);
                }
                return $result;
            } catch (PDOException $exception) {
                if ($exception->getCode() == 1) {
                    print_r("Users not found");
                } else {
                    print_r($exception->getMessage());
                };
                return 0;
            }
        }
    }
}
