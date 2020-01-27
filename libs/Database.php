<?php
class Database{
	private $host=DB_HOST;
	private $user=DB_USER;
	private $pass=DB_PASS;
	private $dbname=DB_NAME;

	private $dbh;
	private $error;
	private $stm;

	public function __construct(){
		//Set DSN
		$dsn= 'mysql:host='.$this->host.';dbname='.$this->dbname;

		//Set Options
		$options =array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
		);

		//PDO Instance
		try{
			$this->dbh=new pdo($dsn,$this->user,$this->pass,$options);
		}catch (PDOException $e){
			$this->error=$e->getMessage();
		}
	}

	public function query($query){
		$this->stmt=$this->dbh->prepare($query);
	}

	public function bind($param,$value,$type=NULL){
		if (is_null($type)){
			 switch(true){
				 case is_int($value);
					 $type=PDO::PARAM_INT;
					 break;
				 case is_bool($value);
					 $type=PDO::PARAM_BOOL;
					 break;
				 case is_null($value);
					 $type=PDO::PARAM_NULL;
					 break;
				default:
					 $type=PDO::PARAM_STR;
			 }
		}
		$this->stmt->bindValue($param,$value,$type);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	function resultSet(){
		 $this->execute();
		 return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	function single(){
		 $this->execute();
		 return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
}
?>