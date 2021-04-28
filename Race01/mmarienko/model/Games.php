<?php

namespace model;

use model\Model, PDOException, PDO;

class Games extends Model
{
    public $id, $name, $description, $race, $class_role;

    public function create($login1, $login2 = null)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("INSERT INTO games(login1, cards1, lifes1, stones1, login2, cards2, lifes2, stones2, round, active)
                VALUES (:id1, :card1, '5', '6', :id2, :card2, '5', '6', '1', '1')");
                $sth->bindValue(':id1', $login1, PDO::PARAM_STR);
                $sth->bindValue(':id2', $login2, PDO::PARAM_STR);
                $str1 = rand(1,30) .','. rand(1,30)  .','. rand(1,30)  .','. rand(1,30)  .','. rand(1,30)  .','. rand(1,30);
                $str2 = rand(1,30) .','. rand(1,30)  .','.rand(1,30)  .','. rand(1,30)  .','. rand(1,30)  .','. rand(1,30);
                $sth->bindValue(':card1', $str1, PDO::PARAM_STR);
                $sth->bindValue(':card2', $str2, PDO::PARAM_STR);
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

    public function getAll()
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM games");
                $sth->execute();
                $result = $sth->fetchAll();
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

    public function find($login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM games WHERE login1 = :login1 AND login2 IS NOT NULL");
                $sth->bindValue(':login1', $login, PDO::PARAM_STR);
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

    public function update($login1, $login2)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("UPDATE games SET login2 = :login2 WHERE login1 = :login1");
                $sth->bindValue(':login2', $login2, PDO::PARAM_STR);
                $sth->bindValue(':login1', $login1, PDO::PARAM_STR);
                $sth->execute();
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

    public function updateRound($round, $login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("UPDATE games SET round = :round WHERE login1 = :login OR login2 = :login");
                $sth->bindValue(':round', $round, PDO::PARAM_STR);
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->execute();
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

    public function updateLife($life, $login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("UPDATE games SET lifes1 = :life WHERE login1 = :login OR login2 = :login");
                $sth->bindValue(':life', $life, PDO::PARAM_STR);
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->execute();
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

    public function updateActiveCard($value, $login, $num)
    {
        if ($this->database->getConnectionStatus()) {
            if ($num == 1) {
                try {
                    $sth = $this->database->connection->prepare("UPDATE games SET active_card1 = :value WHERE login1 = :login OR login2 = :login");
                    $sth->bindValue(':value', $value, PDO::PARAM_STR);
                    $sth->bindValue(':login', $login, PDO::PARAM_STR);
                    $sth->execute();
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
            if ($num == 2) {
                try {
                    $sth = $this->database->connection->prepare("UPDATE games SET active_card2 = :value WHERE login1 = :login OR login2 = :login");
                    $sth->bindValue(':value', $value, PDO::PARAM_STR);
                    $sth->bindValue(':login', $login, PDO::PARAM_STR);
                    $sth->execute();
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
    }

    public function delete($login1)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("DELETE FROM games WHERE login1 = :login1");
                $sth->bindValue(':login1', $login1, PDO::PARAM_STR);
                $sth->execute();
                echo "<script>window.location.replace('http://localhost:3000/');</script>";
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

    public function getGame($login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM games WHERE login1 = :login1 AND login2 IS NOT NULL");
                $sth->bindValue(':login1', $login, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetch();
                if (!$result) {
                    $sth = $this->database->connection->prepare("SELECT * FROM games WHERE login2 = :login1 AND login2 IS NOT NULL");
                    $sth->bindValue(':login1', $login, PDO::PARAM_STR);
                    $sth->execute();
                    $result = $sth->fetch();
                    if (!$result) {
                        throw new PDOException("Select null", 1);
                    }
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

    public function getNum($login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("SELECT * FROM games WHERE login1 = :login AND login2 IS NOT NULL");
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->execute();
                $result = $sth->fetch();
                if (!$result) {
                    $sth = $this->database->connection->prepare("SELECT * FROM games WHERE login2 = :login");
                    $sth->bindValue(':login', $login, PDO::PARAM_STR);
                    $sth->execute();
                    $result = $sth->fetch();
                    if (!$result) {
                        throw new PDOException("Select null", 1);
                    }
                    return 2;
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

    public function updateActive($value, $login)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("UPDATE games SET active = :value WHERE login1 = :login OR login2 = :login");
                $sth->bindValue(':value', $value, PDO::PARAM_STR);
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->execute();
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
}
