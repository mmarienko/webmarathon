<?php
class Users extends Model
{
    public $id, $name, $description, $race, $class_role;

    public function create($login, $password, $fullname, $email)
    {
        if ($this->database->getConnectionStatus()) {
            try {
                $sth = $this->database->connection->prepare("INSERT INTO users(login, password, fullname, email, status)
                VALUES (:login, :password, :fullname, :email, 'user')");
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->bindValue(':password', $password, PDO::PARAM_STR);
                $sth->bindValue(':fullname', $fullname, PDO::PARAM_STR);
                $sth->bindValue(':email', $email, PDO::PARAM_STR);
                $sth->execute();
                return 1;
            } catch (PDOException $exception) {
                if ($exception->getCode() == '23000') {
                    print_r("Login already exist");
                } else {
                    print_r($exception->getMessage());
                };
                return 0;
            }
        }
    }
}
