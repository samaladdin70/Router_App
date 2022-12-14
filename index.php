<?php

// This is a simple and powerful Router App like frameworks
// first build your page as you want and need inside components directory .. like home.php or login.php or any you want
// i just biuld home.php, about.php and contact.php for example
// then make a new instance for Router Class
// then use get($route, $pathToFile); for get method
// or use post($route, $pathToFile); for post method
// then run();
// as like bellow

// note: any route doesn't installed as like bellow .. it will response and render a 404 not found page 

include_once('./Router/Router.php');

$pages = new Router();
$pages->get('/', './components/home.php');
$pages->get('/about', './components/about.php');
$pages->get('/contact', './components/contact.php');

$pages->run();