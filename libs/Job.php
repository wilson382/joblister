<?php
class Job{
	private $db;
	private $validation;

	public function __construct(){
		$this->db= new Database;
		$this->validation= new Validation;
	}

	//Get All Jobs
	public function getAllJobs(){
		$this->db->query("SELECT `jobs`.*,`categories`.`name` AS cname FROM `jobs` INNER JOIN `categories`
		ON `jobs`.`category_id`=`categories`.`id`
		ORDER BY `jobs`.`post_date` DESC;");
		$results=$this->db->resultSet();
		return $results;
	}

	//Get only 1 Job
	public function getJob($job_id){
		$this->validation->isInteger($job_id);
		$this->db->query("SELECT * FROM `jobs`WHERE `id`=:job_id;");
		$this->db->bind(":job_id",$job_id);
		$row=$this->db->single();
		return $row;
	}

	//Get All Categories
	public function getCategories(){
		$this->db->query("SELECT * FROM `categories`;");
		$results=$this->db->resultSet();
		return $results;
	}

	//Get only 1 category
	public function getCategory($category){
		$this->validation->isInteger($category);
		$this->db->query("SELECT * FROM `categories` WHERE `id`=:category_id;");
		$this->db->bind(":category_id",$category);
		$row=$this->db->single();
		return $row;
	}

	//Get Categories by Filter
	public function getByCategory($category){
		$this->validation->isInteger($category);
		$this->db->query("SELECT `jobs`.*,`categories`.`name` AS cname FROM `jobs` INNER JOIN `categories`
		ON `jobs`.`category_id`=`categories`.`id` WHERE `jobs`.`category_id`=:category_id
		ORDER BY `jobs`.`post_date` DESC;");
		$this->db->bind(":category_id",$category);
		$results=$this->db->resultSet();
		return $results;
	}

	//Create new job
	public function create($data){
		//Insert query
		$this->db->query("INSERT INTO `jobs` (`category_id`,`job_title`,`company`,`description`,`location`,`salary`,`contact_user`,`contact_email`)
		VALUES (:category_id,:job_title,:company,:description,:location,:salary,:contact_user,:contact_email);");

		//Bind data (Bind method can be slightly modified to accept 2 arrays instead)
		$this->db->bind("category_id",$data["category_id"]);
		$this->db->bind("job_title",$data["job_title"]);
		$this->db->bind("company",$data["company"]);
		$this->db->bind("description",$data["description"]);
		$this->db->bind("location",$data["location"]);
		$this->db->bind("salary",$data["salary"]);
		$this->db->bind("contact_user",$data["contact_user"]);
		$this->db->bind("contact_email",$data["contact_email"]);

		//Execute
		if ($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Delete a job listing
	public function delete($id){
		$this->validation->isInteger($id);
		$this->db->query("DELETE FROM `jobs` WHERE `id`=:id;");
		$this->db->bind(":id",$id);

		//Execute
		if ($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}

	//Delete a job listing
	public function update($job_id,$data){
		$this->validation->isInteger($job_id);
		$this->db->query("UPDATE `jobs`
		SET `category_id`=:category_id,
		`job_title`=:job_title,
		`company`=:company,
		`description`=:description,
		`location`=:location,
		`salary`=:salary,
		`contact_user`=:contact_user,
		`contact_email`=:contact_email
		WHERE `id`=:job_id;");

		$this->db->bind("category_id",$data["category_id"]);
		$this->db->bind("job_title",$data["job_title"]);
		$this->db->bind("company",$data["company"]);
		$this->db->bind("description",$data["description"]);
		$this->db->bind("location",$data["location"]);
		$this->db->bind("salary",$data["salary"]);
		$this->db->bind("contact_user",$data["contact_user"]);
		$this->db->bind("contact_email",$data["contact_email"]);
		$this->db->bind(":job_id",$job_id);

		//Execute
		if ($this->db->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>