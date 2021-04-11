<?php
include('Model.php');
class Heroes extends Model{
    public $id, $name, $description, $race, $class_role;

    public function find() {

    }

    public function delete() {

    }

    public function save() {
        if($this->connection->connect_error) {
            $sql = "SELECT * FROM heroes WHERE id =" . $this->id . ';';
            $request = $this->database->connection->prepare($sql);
            $request->execute();
            $answer = $request->fetchAll();
            if($answer){
                $sql = 'UPDATE heroes SET description = "update" WHERE id = ' . $this->id . ';';
                $request = $this->database->connection->prepare($sql);
                $request->execute();
                $this->description = 'update';
            }
            else {
                $sql = "INSERT INTO heroes ('name','description','race','class_role') VALUES('".$this->name."','".$this->description."','".$this->race."','".$this->class_role."')";
                $request = $this->database->connection->prepare($sql);
                $request->execute();
            }
        }
    }
}
?>
