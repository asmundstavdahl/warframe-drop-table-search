<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"items_json",
	"/resources/items-js",
	function(){
		return View::render("resources/items.js");
	}
));

Router::add(new Route(
	"sources_json",
	"/resources/sources-js",
	function(){
		return View::render("resources/sources.js");
	}
));
