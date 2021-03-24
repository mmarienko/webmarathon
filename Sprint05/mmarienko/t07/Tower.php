<?php

/*
   Task 07 (Tower.php)
   Task name: Tower
*/

class Tower extends Building
{
   private $elevator;
   private $arc_capacity;
   private $height;

   public function setElevator(bool $elevator)
   {
      $this->elevator = $elevator;
      return true;
   }

   public function setArcCapacity(int $arc_capacity)
   {
      $this->arc_capacity = $arc_capacity;
      return true;
   }

   public function setHeight(float $height)
   {
      $this->height = $height;
      return true;
   }

   public function getElevator(): bool
   {
      return $this->elevator;
   }

   public function getArcCapacity(): int
   {
      return $this->arc_capacity;
   }

   public function getHeight(): float
   {
      return $this->height;
   }

   public function getFloorHeight(): float
   {
      return $this->getHeight() / $this->getFloors();
   }

   public function toString(): string
   {
      $props = [
         "Floors : " . $this->floors,
         "Material : " . $this->material,
         "Address : " . $this->address,
         "Elevator : " . $this->getElevator(),
         "Arc reactor capacity : " . $this->getArcCapacity(),
         "Height : " . $this->getHeight(),
         "Floor height : " . $this->getFloorHeight(),
      ];

      $str = "";

      foreach ($props as $p)
         $str = $str . $p . "\n";
      return $str;
   }
}
