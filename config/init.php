<?php
//Start Session
session_start();

//Config file
require_once(__DIR__ ."/config.php");

//Config file
require_once(__DIR__ . "/../helpers/system_helper.php");

#Class Auto Loader
function __autoload($class_name){
	require_once(__DIR__ . "/../libs/$class_name.php");
}
?>