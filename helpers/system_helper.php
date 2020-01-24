<?php
 //redirect to page
 function redirect ($page=false,$message=null,$message_type=null){
	 if (is_string($page)){
		 $location=$page;
	 }else{
		 $location=$_SERVER['SCRIPT_NAME'];
	 }

	 //Check for message
	 if (!is_null($message)){
		 $_SESSION['message']=$message;
	 }

	 //Check for message type
	 if (!is_null($message_type)){
		 $_SESSION['message_type']=$message_type;
	 }

	 //Redirect
	 header("location: $location");
	 exit();
 }

 function displayMessage(){
	 if (!empty($_SESSION['message'])){
		 $message=$_SESSION['message'];

		 if (!empty($_SESSION['message_type'])){
			 $message_type=$_SESSION['message_type'];

			 //Create
			 if ($message_type=='error'){
				echo "<div class='d-block  p-2 bg-danger text-white'>$message</div><br>";
			 }else{
				echo "<div class='d-block  p-2 bg-success text-white'>$message</div><br>";
			 }
		}

		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
	 }else{
		echo '';
	 }
 }
?>