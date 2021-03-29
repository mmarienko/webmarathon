<?php

/*
   Task 04 (test.php)
   Task name: Try, catch
*/

require_once("EatException.php");
require_once("Ingestion.php");
require_once("Product.php");

$namesProducts = ['Nutella', 'Chicken', 'Coca-Cola', 'Biscuit', 'Brocolli', 'Tomatoes', 'Apple', 'Potato', 'Pizza', 'Beer'];

$stock = new Ingestion('breakfast', 1);

foreach ($namesProducts as $name) {
   $stock->setProduct(new Product($name, rand(40, 500)));
}

$allProducts = $stock->getProducts();
foreach ($namesProducts as $product) {
   $count = rand(1, 5);
   try {
      echo "***\nGetting " . $allProducts[$product]->getName() . " that has ";
      echo $allProducts[$product]->getKcal() . " calories.\n";
      $stock->get_from_fridge($product);
      echo "You're doing great, " . $product . " is good!\n";
   } catch (EatException $e) {
      echo "Caught exception: " . $e->getMessage() . "! ";
      echo "Throw " . $product . " away!\n";
   }
}
