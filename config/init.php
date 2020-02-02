<?php
//Start Session
session_start();

//Config file
require_once(__DIR__ ."/config.php");

//Config file
require_once(__DIR__ . "/../helpers/system_helper.php");

#Class Auto Loader function
function my_autoloader($class_name){
	$class_path=__DIR__ . "/../classes/$class_name.php";

	if (!is_file($class_path)){
		return false;
	}

	require_once($class_path);
}

spl_autoload_register("my_autoloader");
?>