<?php


use \Rapd\Database;

$dbFile = __DIR__."/app.sqlite3";
Database::$pdo = new PDO("sqlite:{$dbFile}");


use \Rapd\Environment;

# Set some environment variables used by the header template
# For JS, CSS, images etc.: (ASSET_BASE)/css/app.css
Environment::set("ASSET_BASE", "");
# Page meta for html/head
Environment::set("TITLE", "rapd/skeleton");
Environment::set("AUTHOR", "Åsmund Stavdahl");
Environment::set("DESCRIPTION", "Default description of the rapd/skeleton");


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
