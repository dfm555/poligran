<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class TeacherModel extends MasterModel {

	static $table = 'tbl_teacher';

	static function getAll(){
		static::query('SELECT p.*,
			t.id_teacher,
			t.office,
			t.phone_number,
			t.category,
			t.amount_hour FROM tbl_teacher t, tbl_person p
			WHERE t.id_person = p.id_person');
		return static::query_result();
	}

	static function getAllList(){
		static::query('SELECT p.full_name,
			t.id_teacher,
			t.office,
			t.phone_number,
			t.category,
			t.amount_hour FROM tbl_teacher t, tbl_person p
			WHERE t.id_person = p.id_person');
		return static::query_result();
	}

	static function findByIdMultiple($id){
		static::query('SELECT p.id_person,
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
		return static::query_result();
	}
	static function teacherData($id_person){
		static::query('SELECT * FROM tbl_teacher WHERE id_teacher ='.(int)$id_person);
		$result = static::query_result()[0];
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
		static::query('INSERT INTO tbl_teacher (office,
			phone_number,
			category,
			amount_hour,
			id_person) VALUES ("'.$data['office'].'",
			"'.$data['phone_number'].'",
			"'.$data['category'].'",
			"'.$data['amount_hour'].'",
			"'.$data['id_person'].'")');
		return static::query_insert_id();
	}
	static function update($data){
		static::query('UPDATE tbl_teacher SET office ="'.$data['office'].'",
			phone_number = "'.$data['phone_number'].'",
			category = "'.$data['category'].'",
			amount_hour = "'.$data['amount_hour'].'"
			WHERE id_teacher = "'.$data['id_teacher'].'"');
		return true;
	}
	static function delete($data){
		static::query('DELETE FROM tbl_teacher WHERE id_teacher = "'.$data['id_teacher'].'"');
		return true;
	}
}