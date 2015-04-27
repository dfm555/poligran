<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class PersonModel {

	static function login($username, $password){
		$db = new DbTables();
		$user = $db->cleanSQL($username);
		$pass = $db->cleanSQL($password);

		$db->query('SELECT * FROM tbl_person WHERE user_name = "'.$username.'" AND password = "'.$password.'"');
		$result = $db->query_result()[0];
		if(is_array($result)){
			$_SESSION['userdata'] = array(
				'id'=> $result['id_person'],
				'identification'=> $result['identification'],
				'name'=> $result['full_name'],
				'date'=> $result['date_of_birth'],
				'email'=> $result['email'],
				'username'=> $result['user_name']
			);
			return  $result['id_person'];
		}else{
			return false;
		}
	}

	static function insert($data){
		$db = new DbTables();
		$db->query('INSERT INTO tbl_person(
						identification, full_name, date_of_birth, email, user_name, password
						) VALUES (
						"'.$data['identification'].'",
						"'.$data['full_name'].'",
						"'.$data['date_of_birth'].'",
						"'.$data['email'].'",
						"'.$data['user_name'].'",
						"'.$data['password'].'"
						)');
		return $db->query_insert_id();
	}
}