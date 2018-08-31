<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('config/db.php');

$db = new DB;
var_dump('To aqui cara', $db);