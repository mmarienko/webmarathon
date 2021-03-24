<?php

/*
   Task 06 (HardWorker.php)
   Task name: HardWorker
*/

class HardWorker
{
   private $name;
   private $age;
   private $salary;

   public function setName($name)
   {
      $this->name = $name;
      return true;
   }

   public function setSalary($salary)
   {
      if ($salary >= 100 && $salary <= 10000) {
         $this->salary = $salary;
         return true;
      } else {
         return false;
      }
   }

   public function setAge($age)
   {
      if ($age >= 1 && $age <= 100) {
         $this->age = $age;
         return true;
      } else {
         return false;
      }
   }

   public function getName()
   {
      return $this->name;
   }

   public function getSalary()
   {
      return $this->salary;
   }

   public function getAge()
   {
      return $this->age;
   }

   public function toArray()
   {
      return [
         "name" => $this->getName(),
         "age" => $this->getAge(),
         "salary" => $this->getSalary(),
      ];
   }
}
