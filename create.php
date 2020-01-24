<?php
require_once("config/init.php");

$job = new Job;

if (isset($_POST['submit'])){
	//Create Data Array
	$data = array();
	$data['job_title']=$_POST['job_title'];
	$data['category_id']=$_POST['category'];
	$data['company']=$_POST['company'];
	$data['description']=$_POST['description'];
	$data['location']=$_POST['location'];
	$data['salary']=$_POST['salary'];
	$data['contact_user']=$_POST['contact_user'];
	$data['contact_email']=$_POST['contact_email'];

	//Helper class to redirect
	if ($job->create($data)){
		redirect("index.php","Your job has been listed","success");
	}else{
		redirect("index.php","Your job has been listed","error");
	}
}

$template = new Template("templates/job-create.php");

$template->categories=$job->getCategories();

echo $template;
?>