<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class StudentModel extends MasterModel {
	static $table = 'tbl_student';
	static function getAll(){
		static::query('SELECT p.*,
			s.id_student,
			s.nickname FROM tbl_student s, tbl_person p
			WHERE s.id_person = p.id_person');
		return static::query_result();
	}

	static function findbyidMultiple($id){
		static::query('SELECT p.id_person,
						p.identification,
						p.full_name,
						p.date_of_birth,
						p.email,
						p.user_name,
						s.nickname
 						FROM tbl_student s, tbl_person p
 						WHERE s.id_person = p.id_person
 						AND p.id_person = '.(int)$id);
		return static::query_result();
	}
	static function studentData($id_person){
		static::query('SELECT * FROM tbl_student WHERE id_student ='.(int)$id_person);
		$result = static::query_result()[0];
		if(is_array($result)){
			array_push($_SESSION['userdata'],array(
				'rol'=> 'student',
				'type'=> 'student',
				'nickname'=> $result['nickname']
			));
			return true;
		}else{
			return false;
		}
	}

	static function insert($data){
		static::query('INSERT INTO '.static::$table.' (
				nickname, id_person) VALUES (
				"'.$data['nickname'].'",
				"'.$data['id_person'].'")');
		return static::query_insert_id();
	}
	static function update($data){
		static::query('UPDATE '.static::$table.' SET nickname ="'.$data['nickname'].'"
			WHERE id_student = "'.$data['id_student'].'"');
		return true;
	}
	static function delete($data){
		static::query('DELETE FROM '.static::$table.' WHERE id_student = "'.$data['id_student'].'"');
		return true;
	}
}