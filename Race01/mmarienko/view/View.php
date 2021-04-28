<?php

namespace view;

class View {

	public $path;
	public $route;

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route['action'];
	}

	public function render() {
		require 'view/'.$this->path.'.php';
	}
}