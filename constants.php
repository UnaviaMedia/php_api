<?php

//Enable error reporting (debugging)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

//Common PHP directories or paths
define("HTML_ROOT", "/home/cabox/workspace");
define("INCLUDES", HTML_ROOT . "/include");

//Common fragments
define("FRAGMENT_HEADER", INCLUDES . "/header.php");
define("FRAGMENT_FOOTER", INCLUDES . "/footer.php");
define("UTILITIES", INCLUDES . "/utilities.php");
define("RESPONSE_CLASSES", INCLUDES . "/responses.php");

//Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;PHP API Test");
//Dynamic Page Title (set before including FRAGMENT_HEADER)
$PAGE_TITLE = "";

//MVC Constants
define("MODELS", HTML_ROOT . "/model");
define("CONTROLLERS", HTML_ROOT . "/controller");
define("DATABASE", HTML_ROOT . "/database.php");

define("DATABASE_CONSTANTS", HTML_ROOT . "/database_constants.php");

//API Constants
define("API_PATH", "/home/cabox/workspace/api");
