<?php
include __DIR__ . '/../view/View.php';

interface ControllerInterface
{

    public function __construct();
    public function execute();
}

class Main implements ControllerInterface
{

    private $view;

    public function __construct()
    {

        $this->view = new View(__DIR__ . '/../view/templates/main.html');
    }

    public function execute()
    {

        $this->view->render();
    }
}


$test = new Main();
$test->execute();
