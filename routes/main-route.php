<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"browse_by_item",
	"/",
	function(){
		return View::render("browse_by_item");
	}
));
