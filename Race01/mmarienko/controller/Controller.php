<?php

namespace controller;

use view\View;

abstract class Controller
{

	public $route;
	public $view;
	public $acl;

	public function __construct($route)
	{
		$this->route = $route;
		if (!$this->checkAcl()) {
			header('Location: /');
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name = 'main')
	{
		$path = 'model\\' . ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl()
	{
		$this->acl = require 'access.php';
		if (!isset($_SESSION['user']) && $this->isAcl('all')) {
			return true;
		} elseif (isset($_SESSION['user']) && $this->isAcl('authorize')) {
			return true;
		}
		return false;
	}

	public function isAcl($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}
}
