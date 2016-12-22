<?php
require_once("/home/cabox/workspace/constants.php");
require_once(DAL . "/dal_continents.php");

function readCountries() {
    Continent::readAll();
}