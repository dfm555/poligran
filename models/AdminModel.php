<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class AdminModel extends DbTables {
	
	public static function getAll(){
		$db = new DbTables();
		$db->query('SELECT p.*, a.id_admin, a.type FROM tbl_admin a, tbl_person p WHERE a.id_person = p.id_person');
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
}
