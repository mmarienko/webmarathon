<?php

/*
   Task 01 (Avenger.php)
   Task name: Object to string
*/

class Avenger
{
   public $name;
   public $alias;
   public $gender;
   public $age;
   public $power = [];

   public function __construct($name, $alias, $gender, $age, $power)
   {
      $this->name = $name;
      $this->alias = strtoupper($alias);
      $this->gender = $gender;
      $this->age = $age;
      $this->power = $power;
   }

   public function __toString()
   {
      return "name: $this->name\ngender: $this->gender\nage: $this->age\n";
   }

   public function __invoke()
   {
      echo "$this->alias\n";
      foreach ($this->power as $p) {
         echo "$p\n";
      }
      echo "\n";
   }
}
