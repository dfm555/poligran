<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/06/15
 * Time: 01:23 PM
 */
class InscriptionModel extends MasterModel {
	static $table = 'tbl_incription';

	static function listById($data){
		static::query('SELECT c.name, s.code, s.name as subject FROM tbl_student st, tbl_career c, tbl_subject s, tbl_incription i, tbl_career_tbl_subject cs
							WHERE i.id_student = st.id_student
							AND i.id_subject = s.id_subject
							AND cs.tbl_subject_id_subject = s.id_subject
							AND cs.tbl_career_id_career = c.id_career
							AND st.id_student ="'.$data['student'].'"');
		return static::query_result();
	}

	static function insert($data){
		static::query('INSERT INTO '.static::$table.' (
				id_student, id_subject) VALUES (
				"'.$data['student'].'",
				"'.$data['subject'].'")');
		return static::query_insert_id();
	}
	static function update($data){
		static::query('UPDATE '.static::$table.' SET nickname ="'.$data['nickname'].'"
			WHERE id_student = "'.$data['id_student'].'"');
		return true;
	}
	static function delete($data){
		static::query('DELETE FROM '.static::$table.' WHERE id_inscription = "'.$data['id_student'].'"');
		return true;
	}
}