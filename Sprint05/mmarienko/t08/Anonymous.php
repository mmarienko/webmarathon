<?php

/*
   Task 08 (Anonymous.php)
   Task name: Anonymous
*/

function get_anonymous($name, $alias, $affiliation)
{
   return new class($name, $alias, $affiliation)
   {
      private $name;
      private $alias;
      private $affiliation;

      public function __construct($name, $alias, $affiliation)
      {
         $this->name = $name;
         $this->alias = $alias;
         $this->affiliation = $affiliation;
      }

      public function getName()
      {
         return $this->name;
      }

      public function getAlias()
      {
         return $this->alias;
      }

      public function getAffiliation()
      {
         return $this->affiliation;
      }
   };
}
