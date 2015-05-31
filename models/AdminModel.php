<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class AdminModel extends MasterModel {

	static $table = 'tbl_admin';
	
	static function getAll(){
		static::query('SELECT p.*, a.id_admin, a.type FROM tbl_admin a, tbl_person p WHERE a.type <> "SUPER ADMIN" AND a.id_person = p.id_person');
		return static::query_result();
	}

	static function findbyidMultiple($id){
		static::query('SELECT p.id_person,
						p.identification,
						p.full_name,
						p.date_of_birth,
						p.email,
						p.user_name,
 						a.id_admin,
 						a.type
 						FROM tbl_admin a, tbl_person p
 						WHERE a.id_person = p.id_person
 						AND p.id_person = '.(int)$id);
		return static::query_result();
	}

	static function dataAdmin($id_person){
		static::query('SELECT * FROM tbl_admin WHERE id_admin ='.(int)$id_person);
		$result = static::query_result()[0];
		if(is_array($result)){
			array_push($_SESSION['userdata'], array(
				'rol'=> 'admin',
				'type'=> $result['type']
			));
			return true;
		}else{
			return false;
		}
	}
	static function insert($data){
		static::query('INSERT INTO '.static::$table.' (type, id_person) VALUES ("'.$data['type'].'", '.$data['id_person'].')');
		return true;
	}

	static function delete($data){
		static::query('DELETE FROM '.static::$table.' WHERE id_admin = "'.$data['id_admin'].'"');
		return true;
	}
}
