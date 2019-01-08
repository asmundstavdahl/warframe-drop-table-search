<?php

use \Rapd\Environment;

# Set some environment variables used by the header template
# For JS, CSS, images etc.: (ASSET_BASE)/css/app.css
Environment::set("ASSET_BASE", "");
# Page meta for html/head
Environment::set("TITLE", "warframe-drop-table-search");
Environment::set("AUTHOR", "Åsmund Stavdahl");
Environment::set("DESCRIPTION", "Conveniently search JSON formatted Warframe drop tables");


use \Rapd\Router;

Router::setBasePath(Environment::get("ASSET_BASE"));


use \Rapd\View;

# Configure a function to be used by View::render()
View::setRenderer(function(string $template, array $data = []){
	require_once "../src/template-preparations.php";
	extract(Environment::getAll());
	extract($data);
	ob_start();
	include "../templates/{$template}.php";
	return ob_get_clean();
});
