<?php

//Enable error reporting (debugging)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

//Common PHP directories or paths
define("HTML_ROOT", "/home/cabox/workspace");
define("INCLUDES", HTML_ROOT . "/include");

//Common HTML directories or paths
define("STYLES", "/dist/css");
define("SCRIPTS", "/dist/js");
define("IMAGES", "/dist/images");

//Common fragments
define("FRAGMENT_HEADER", INCLUDES . "/header.php");
define("FRAGMENT_FOOTER", INCLUDES . "/footer.php");

//Static Page Title
define("PAGE_TITLE", "&ensp;|&ensp;UnaviaMedia");
//Dynamic Page Title
$PAGE_TITLE = "";

//Common HTML Links
define("HOME_URL", "/index.php");
define("ABOUT_URL", "/about.php");

define("API_BASE", "/home/cabox/workspace/api/api_base.php");
define("API_V1", "/home/cabox/workspace/api/v1/");