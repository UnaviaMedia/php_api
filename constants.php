<?php

//Enable error reporting (debugging)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

//Common PHP directories or paths
define("HTML_ROOT", "/home/cabox/workspace");
define("INCLUDES", HTML_ROOT . "/include");
define("FRAGMENTS", HTML_ROOT . "/fragments");

//Common fragments
define("FRAGMENT_HEADER", FRAGMENTS . "/header.php");
define("FRAGMENT_FOOTER", FRAGMENTS . "/footer.php");

//Common includes
define("UTILITIES", INCLUDES . "/utilities.php");
define("RESPONSE_CLASSES", INCLUDES . "/responses.php");

//Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;PHP API Test");
//Dynamic Page Title (set before including FRAGMENT_HEADER)
$PAGE_TITLE = "";

//MVC Constants
define("ROUTES", INCLUDES . "/routes.php");
define("CONTROLLERS", HTML_ROOT . "/controllers");
define("MODELS", HTML_ROOT . "/models");
define("VIEWS", HTML_ROOT . "/views");

//Database files
define("DATABASE_CONSTANTS", HTML_ROOT . "/database_constants.php");
define("DATABASE", HTML_ROOT . "/database.php");

//API Constants
define("API_PATH", "/home/cabox/workspace/api");
