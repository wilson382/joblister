<?php
//Start Session
session_start();

//Config file
require_once("config.php");

//Config file
require_once("helpers/system_helper.php");

#Class Auto Loader
function __autoload($class_name){
	require_once("libs/$class_name.php");
}
?>