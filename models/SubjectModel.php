<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class SubjectModel extends DbTables {
	static function getAll(){
		$db = new DbTables();
		$db->query('SELECT p.*,
			s.id_student,
			s.nickname FROM tbl_student s, tbl_person p
			WHERE s.id_person = p.id_person');
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
						s.nickname
 						FROM tbl_student s, tbl_person p
 						WHERE s.id_person = p.id_person
 						AND p.id_person = '.(int)$id);
		return $db->query_result();
	}
	static function studentData($id_person){
		$db = new DbTables();
		$db->query('SELECT * FROM tbl_student WHERE id_student ='.(int)$id_person);
		$result = $db->query_result()[0];
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
		$db = new DbTables();
		$db->query('INSERT INTO tbl_student (
				nickname, id_person) VALUES (
				"'.$data['nickname'].'",
				"'.$data['id_person'].'")');
		return $db->query_insert_id();
	}
	static function update($data){
		$db = new DbTables();
		$db->query('UPDATE tbl_student SET nickname ="'.$data['nickname'].'"
			WHERE id_student = "'.$data['id_student'].'"');
		return true;
	}
	static function delete($data){
		$db = new DbTables();
		$db->query('DELETE FROM tbl_student WHERE id_student = "'.$data['id_student'].'"');
		return true;
	}
}
