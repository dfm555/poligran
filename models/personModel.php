<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class personModel {

	static function login($username, $password){
		$db = new DbTables();
		$db->dbConnect();

		$user = $db->cleanSQL($username);
		$pass = $db->cleanSQL($password);

		$db->query('SELECT * FROM tbl_person WHERE user_name = "'.$username.'" AND password = "'.$password.'"');
		$result = $db->query_result()[0];
		if(is_array($result)){
			$User = new User();
			$User->id = $result['id_person'];
			$User->name = ucwords(mb_strtolower(trim($result['full_name']), 'UTF-8'));
			$User->mail = $result['email'];
			$_SESSION['userdata'] = serialize($User);
			return true;
		}else{
			return false;
		}
	}
}