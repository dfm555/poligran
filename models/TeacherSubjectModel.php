<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 01/06/2015
 * Time: 11:32 AM
 */
class TeacherSubjectModel extends MasterModel{
	static $table = 'tbl_teacher_tbl_subject';

	static function insert($data){
		$validate = static::query('INSERT INTO '.static::$table.'(
						tbl_teacher_id_teacher, tbl_subject_id_subject
						) VALUES (
						"'.$data['teacher'].'",
						"'.$data['subject'].'"
						)');
		return $validate;
	}
}