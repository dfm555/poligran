<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class PersonModel extends MasterModel {
	static $table = 'tbl_person';

	static function login($username, $password){
		$user = static::cleanSQL($username);
		$pass = static::cleanSQL($password);
		static::query('SELECT * FROM '.static::$table.' WHERE user_name = "'.$user.'" AND password = "'.$pass.'"');
		$result = static::query_result()[0];
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
		static::query('INSERT INTO '.static::$table.'(
						identification, full_name, date_of_birth, email, user_name, password
						) VALUES (
						"'.$data['identification'].'",
						"'.$data['full_name'].'",
						"'.$data['date_of_birth'].'",
						"'.$data['email'].'",
						"'.$data['user_name'].'",
						"'.$data['password'].'"
						)');
		return static::query_insert_id();
	}

	static function update($data){
		static::query('UPDATE '.static::$table.' SET
						full_name = "'.$data['fullname'].'",
						date_of_birth = "'.$data['datebirth'].'",
						email = "'.$data['email'].'"
						WHERE id_person = "'.$data['id_person'].'"');
		return true;
	}

	static function updatePassword($data){
		static::query('UPDATE '.static::$table.' SET
						password = "'.$data['password'].'"
						WHERE id_person = "'.$data['id_person'].'"');
		return true;
	}

	static function delete($data) {
		static::query('DELETE FROM '.static::$table.' WHERE id_person = "' . $data['id_person'] . '"');
		return true;
	}
}
