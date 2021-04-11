<?php

namespace controller;

use controller\Controller;

class MainController extends Controller {

	public function indexAction() {
		$this->view->render();
	}
}