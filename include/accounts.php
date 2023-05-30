<?php
require_once('database.php');	
class User {
     static $tbl_name = 'tbluseraccount';










    static function userAuthentication($u_username, $h_pass){
		global $db;
		$db->setQuery("SELECT * FROM `tbluseraccount` WHERE `u_username` = '$u_username' and `u_pass` = '$h_pass'");
		$cur = $db->executeQuery();
		// print_r($cur);
		if($cur==false){
			die(mysql_error());
		}
		$row_count = $db->num_rows($cur);//get the number of count
		// print_r($row_count); exit;
		 if ($row_count == 1){
		 $user_found = $db->loadSingleResult();
		 
		 	$_SESSION['USERID']   		= $user_found->id;
		 	$_SESSION['U_NAME']      	= $user_found->u_name;
		 	$_SESSION['U_USERNAME'] 	= $user_found->u_username;
		 	$_SESSION['U_PASS'] 		= $user_found->u_pass;
		 	$_SESSION['U_ROLE'] 		= $user_found->u_role;
		   return true;
		 }else{
		 	return false;
		 }
	}

	function single_user($id = ''){
		ECHO $id;
		global $db;
		$db->setQuery("SELECT * FROM `tbluseraccount` where id = {$id} limit 1");
		$cur = $db->loadSingleResult();
		return $cur;
	}




}

