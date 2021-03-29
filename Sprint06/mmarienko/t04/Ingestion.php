<?php

/*
   Task 04 (Ingestion.php)
   Task name: Try, catch
*/

class Ingestion
{
    public $id;
    public $meal_type = [];
    public $day_of_diet;
    public $products = [];

    public function get_from_fridge($product) : void
    {
        if ($this->products[$product]->getKcal() > 200)
            throw new EatException("junk");
    }

    public function setProduct($product) {
        $this->products[$product->getName()] = $product;
    }

    public function getProducts() {
        return $this->products;
    }
}