<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"home",
	"/",
	function(){
		return View::render("home");
	}
));
Router::add(new Route(
	"browse_by_item",
	"/browse/items",
	function(){
		return View::render("browse_by_item");
	}
));
