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

//Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;PHP API Test");
//Dynamic Page Title
$PAGE_TITLE = "";

//MVC Constants
define("MODELS", HTML_ROOT . "/model");
define("CONTROLLERS", HTML_ROOT . "/controller");
define("DAL", HTML_ROOT . "/dal");
define("DATABASE", HTML_ROOT . "/database.php");

//API Constants
define("API_BASE", "/home/cabox/workspace/api/api_base.php");
define("API_V1", "/home/cabox/workspace/api/v1/");