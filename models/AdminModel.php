<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class AdminModel extends DbTables {
	
	static function getAll(){
		$db = new DbTables();
		$db->query('SELECT p.*, a.id_admin, a.type FROM tbl_admin a, tbl_person p WHERE a.id_person = p.id_person');
		return $db->query_result();
	}

	static function findbyid($id){
		$db = new DbTables();
		$db->query('SELECT p.id_person,
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
		return $db->query_result();
	}
			
	static function dataAdmin($id_person){
		$db = new DbTables();
		$db->query('SELECT * FROM tbl_admin WHERE id_admin ='.(int)$id_person);
		$result = $db->query_result()[0];
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
		$db = new DbTables();
		$db->query('INSERT INTO tbl_admin (type, id_person) VALUES ("'.$data['type'].'", '.$data['id_person'].')');
		return $db->query_insert_id();
	}
	static function delete($data){
		$db = new DbTables();
		$db->query('DELETE FROM tbl_admin WHERE id_admin = "'.$data['id_admin'].'"');
		return true;
	}
}
