<?php
class Validation{

	//Validate integer input
	public function isInteger($id){
		if (!ctype_digit($id) || $id < 1){
			header("location: permission_denied.php");
			exit();
		}
	}

	//This function will clean phone # to 10 digits.
	public function cleanPhone($phone){
		$phone = preg_replace("/\D/","",$phone);
		$phone=trim($phone);
		$is_leading_one=substr($phone,0,1);

		if ($is_leading_one=='1'){
			$phone=substr($phone,1,10);
		}

		return $phone;
	}

	//Validate a Dominican Republic Cedula
	public function validateCedula($ced){
		//only numbers
		preg_match_all('!\d+!', $ced, $matches);
		$c= implode("",$matches[0]);

		//must be 11, otherwise return false
		if(strlen($c) <> 11){
			return false;
		}

		$cedula = substr($c,0, strlen($c) - 1);

		$verify = substr($c,strlen($c) - 1, 1);
		$sum = 0;

		for ($i=0; $i < strlen($cedula); $i++){
			$mod = "";
			if(($i % 2) == 0){
				$mod = 1;
			}else{
				$mod = 2;
			}
			$rest = substr($cedula,$i,1) * $mod;

			if ($rest > 9){
				$one = substr($rest,0,1);
				$two = substr($rest,1,1);
				$rest = $one + $two;
			}
			$sum += $rest;
		}

		$the_number = (10 - ($sum % 10)) % 10;

		if ($the_number == $verify && substr($cedula,0,3) != "000"){
			return true;
		}else{
			return false;
		}
	}

	//un Accent accented character
	public function unAccent($string){
		if (strpos($string = htmlentities($string, ENT_QUOTES, 'UTF-8'), '&') !== false){
			$string = html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|tilde|uml);~i', '$1',
			$string), ENT_QUOTES, 'UTF-8');
		}
		return $string;
	}

}
?>