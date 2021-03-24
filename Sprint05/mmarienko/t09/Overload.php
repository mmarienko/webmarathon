<?php

/*
   Task 08 (Overload.php)
   Task name: Overload
*/

class Overload
{
   public function __set($key, $value)
   {
      $this->{$key} = $value;
   }

   public function __get($key)
   {
      if ($this->{$key}) {
         return $this->{$key};
      }
      return "NO DATA";
   }

   public function __isset($key)
   {
      if (!$this->{$key}) {
         return isset($this->{$key});
      } else {
         return $this->{$key} = "NO SET";
      }
   }

   public function __unset($key)
   {
      unset($this->$key);
      $this->$key = NULL;
   }
}
