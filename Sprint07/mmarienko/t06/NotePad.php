<?php

class NotePad
{
   private $notes;

   public function __construct($notes)
   {
      $this->notes = $notes;
   }

   public function __toString()
   {
      $str = '';

      if ($this->notes) {
         $str = '<ul>';
         foreach ($this->notes as $note) {
            $str .= '<li><a href="?note=' .
               $note->getName() . '">' .
               $note->getDate() . ' > ' .
               $note->getName() . '</a> <a href="?delete=' .
               $note->getName() . '">DELETE</a></li>';
         }
         $str .= '</ul>';
      }

      return $str;
   }

   public function __serialize(): array
   {
      $serializeArr = [];
      foreach ($this->notes as $note) {
         array_push($serializeArr, serialize($note));
      }
      return $serializeArr;
   }

   public function __unserialize(array $data): void
   {
      $this->notes = [];
      if ($data) {
         foreach ($data as $note) {
            array_push($this->notes, unserialize($note));
         }
         $this->nodes = $data["nodes"];
      }
   }

   public function getNoteWithName($name)
   {
      foreach ($this->notes as $note) {
         if ($name == $note->getName()) {
            return $note;
         }
      }
      return null;
   }
}
