<?php
class Logger{
	global $execution_time;
	/*
	Log type
	1=added debtor logs
	2= given loans logs
	3= payments made logs
	4= login
	5= one-click payment
	6= deleted loans
	7 = deleted payments
	8= deleted debtor
	9= new username
	10= new username from admin_addCreditor.php
	11= new route
	12= route deleted
	13 = restored loan
	14 = restored debtor
	15=payment_edited
	*/

	$log='logs/';
	$year=date("Y");
	$year_month=date("Y-m");

	public newDebtor($name,$debtor_id,$route_id,$added_by){
		$folder='new_debtor/'.$year.'-new_debtor/';
		$filename=$year_month.'-new_debtor.log';
        $string =$execution_time ." New Debtor: $name ($debtor_id) for route: $route_id by User ID: $added_by \n";

		$this->save();
	}

	switch ($type){
    case 1:
#TESTED AND WORKING.
		$folder='new_debtor/'.$year.'-new_debtor/';
		$filename=$year_month.'-new_debtor.log';
        $string =$execution_time ." New Debtor: $name ($debtor_id) for route: $route_id by User ID: $user_id \n";
        break;
    case 2:
#TESTED AND WORKING.
		$folder='new_loan/'.$year.'-new_loan/';
		$filename=$year_month.'-new_loan.log';
        $string =$execution_time ." $name ($debtor_id) Money ID: P$money_id by User ID: $logged_user_id\n";
        break;
    case 3:
#TESTED AND WORKING.
		$folder='new_payment/'.$year.'-new_payment/'.$year_month.'-new_payment/';
		$filename=date("Y-m-d").'-new_payment.log';
        $string =$execution_time ." $name Payment ID: $payment_id Money ID: P$money_id Amount: $logged_user_id by User ID: $user_id\n";
        break;
    case 4:
			//Login logs
        break;
    case 5:
#TESTED AND WORKING.
		$log='../logs/';
		$folder='new_payment/'.$year.'-oneclick_payment/'.$year_month.'-oneclick_payment/';
		$filename=date("Y-m-d").'-oneclick_payment.log';
        $string =$execution_time ." $name Payment ID: $payment_id Money ID: P$money_id Amount: $logged_user_id by User ID: $user_id\n";
        break;
    case 6:
#TESTED AND WORKING.
		$folder='deleted_loan/'.$year.'-deleted_loan/';
		$filename=$year_month.'-deleted_loan.log';
        $string =$execution_time ." Deleted Loan $name ID: $money_id by User ID: $user_id\n";
		break;
    case 7:
#TESTED AND WORKING.
		$folder='deleted_payment/'.$year.'-deleted_payment/';
		$filename=$year_month.'-deleted_payment.log';
        $string =$execution_time ." Deleted Payment $name ID: $payment_id from Money ID: P$money_id by User ID: $user_id\n";
        break;
    case 8:
#TESTED AND WORKING.
		$folder='deleted_debtor/'.$year.'-deleted_debtor/';
		$filename=$year_month.'-deleted_debtor.log';
        $string =$execution_time ." Deleted Debtor: $name ($debtor_id) by User ID: $user_id\n";
        break;
    case 9:
#TESTED AND WORKING.
		$folder='new_user/'.$year.'-new_user/';
		$filename=$year_month.'-new_user.log';
        $string =$execution_time ." New username: $name ($user_id) by Admin.\n";
        break;
    case 10:
#TESTED AND WORKING.
		$log='../logs/';
		$folder='new_user/'.$year.'-new_user/';
		$filename=$year_month.'-new_user.log';
        $string =$execution_time ." New username: $name ($user_id) by Admin (#$logged_user_id)\n";
        break;
    case 11:
#TESTED AND WORKING.
		$folder='creditor_expenses/'.$year.'-activity/';
		$filename=$year_month.'-activity.log';
        $string =$execution_time ." $name (#$money_id) \$$debtor_id by #$logged_user_id for route #$user_id\n";
        break;
    case 12:
#TESTED AND WORKING.
		$folder='creditor_recurring/'.$year.'-activity/';
		$filename=$year_month.'-activity.log';
        $string =$execution_time ." $name (#$money_id) \$$debtor_id x $payment_id by #$logged_user_id for route #$user_id\n";
        break;
    case 13:
		$folder='deleted_user/'.$year_month.'-edited_payment/';
		$filename=$year_month.'-edited_payment'.$money_id.'log';
        $string =$execution_time ." Deleted username: $name ($user_id) y Admin (#$logged_user_id)\n";
        break;
    case 14:
#TESTED AND WORKING.
		$log='../logs/';
		$folder='new_payment/'.$year.'-multi_payment/'.$year_month.'-multi_payment/';
		$filename=date("Y-m-d").'-multi_payment.log';
        $string =$execution_time ." $name Multi Payment ID: $payment_id Money ID: P$money_id Amount: $logged_user_id by User ID: $user_id\n";
        break;
	}


	public function save(){
		$path = $log.$folder;
		$file = $path.$filename;
		if (!is_dir($path)){
			$old = umask(0);
			mkdir($path, 0755, true);
			chmod($path, 0755);
			umask($old);
		}
		file_put_contents($file,$string,FILE_APPEND | LOCK_EX);
	}
}
?>