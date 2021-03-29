<?php

/*
   Task 02 (Team.php)
   Task name: Clone the Avengers
*/

class Team
{
    public $id;
    public $avengers = [];

    public function __construct($id, $avengers)
    {
        $this->id = $id;
        $this->avengers = $avengers;
    }

    public function battle($damage) : void
    {
        foreach($this->avengers as $key => $item)
        {
            $item->hp -= $damage;
            if ($item->hp <= 0)
                unset($this->avengers[$key]);
        }
    }

    public function calculate_losses($cloned_team) : void
    {
        $temp = count($cloned_team->avengers) - count($this->avengers);
        if ($temp == 0)
            echo "We haven't lost anyone in this battle!\n";
        else
            echo "In this battle we lost " . $temp . " Avenger(s)\n";
    }

    public function __clone () {
        return new Team($this->id, $this->avengers);
    }

}