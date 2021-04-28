<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'index.php' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'authorization' => [
		'controller' => 'account',
		'action' => 'login',
	],

	'registration' => [
		'controller' => 'account',
		'action' => 'register',
	],

	'remind-password' => [
		'controller' => 'account',
		'action' => 'reminder',
	],

	'profile' => [
		'controller' => 'account',
		'action' => 'profile',
	],

	'search-game' => [
		'controller' => 'game',
		'action' => 'search',
	],

	'wait' => [
		'controller' => 'game',
		'action' => 'wait',
	],

	'battle' => [
		'controller' => 'game',
		'action' => 'battle',
	],
];