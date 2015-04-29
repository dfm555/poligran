<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class TeacherModel extends DbTables {

	static function getAll(){
		$db = new DbTables();
		$db->query('SELECT p.*,
			t.id_teacher,
			t.office,
			t.phone_number,
			t.category,
			t.amount_hour FROM tbl_teacher t, tbl_person p
			WHERE t.id_person = p.id_person');
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
						t.office,
						t.phone_number,
						t.category,
						t.amount_hour
 						FROM tbl_teacher t, tbl_person p
 						WHERE t.id_person = p.id_person
 						AND p.id_person = '.(int)$id);
		return $db->query_result();
	}
	static function teacherData($id_person){
		$db = new DbTables();
		$db->query('SELECT * FROM tbl_teacher WHERE id_teacher ='.(int)$id_person);
		$result = $db->query_result()[0];
		if(is_array($result)){
			array_push($_SESSION['userdata'],array(
				'rol'=> 'teacher',
				'type'=> 'teacher',
				'office'=> $result['office'],
				'phone_number'=> $result['phone_number'],
				'category'=> $result['category'],
				'amount_hour'=> $result['amount_hour'],
			));
			return true;
		}else{
			return false;
		}
	}

	static function insert($data){
		$db = new DbTables();
		$db->query('INSERT INTO tbl_teacher (office,
			phone_number,
			category,
			amount_hour,
			id_person) VALUES ("'.$data['office'].'",
			"'.$data['phone_number'].'",
			"'.$data['category'].'",
			"'.$data['amount_hour'].'",
			"'.$data['id_person'].'")');
		return $db->query_insert_id();
	}
	static function update($data){
		$db = new DbTables();
		$db->query('UPDATE tbl_teacher SET office ="'.$data['office'].'",
			phone_number = "'.$data['phone_number'].'",
			category = "'.$data['category'].'",
			amount_hour = "'.$data['amount_hour'].'"
			WHERE id_teacher = "'.$data['id_teacher'].'"');
		return true;
	}
	static function delete($data){
		$db = new DbTables();
		$db->query('DELETE FROM tbl_teacher WHERE id_teacher = "'.$data['id_teacher'].'"');
		return true;
	}
}