<?php
require_once(__DIR__ ."/../config/init.php");
class Api{
	private $job;

	public function __construct(){
		$this->job= new Job();
	}

	public function validateToken(string $token_id, string $token_password){
		$db= new Database();

		$db->query("SELECT * FROM `api_tokens`WHERE `token_id`=:token_id AND `token_password`=:token_password;");
		$db->bind(":token_id",$token_id);
		$db->bind(":token_password",$token_password);
		$row=$db->single();
		return $row;
	}

	public function getAllJobs(){
		$jobs=$this->job->getAllJobs();
		return json_encode($jobs);
	}

	public function getCategories(){
		$categories=$this->job->getCategories();
		return json_encode($categories);
	}
}

if (isset($_GET['id']) && isset($_GET['pw'])){
	$token_id=$_GET['id'];
	$token_password=$_GET['pw'];
	$api = new Api;
	if ($api->validateToken($token_id,$token_password)){
		header("Content-Type: application/json");
		echo $api->getAllJobs();
	}else{
		echo "Invalid token credential";
	}
}else{
	echo "no token credential provided";
}
?>