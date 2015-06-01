<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 01/06/2015
 * Time: 11:32 AM
 */
class TeacherCareerModel extends MasterModel{
	static $table = 'tbl_teacher_tbl_career';

	static function insert($data){
		$validate = static::query('INSERT INTO '.static::$table.'(
						tbl_teacher_id_teacher, tbl_career_id_career
						) VALUES (
						"'.$data['teacher'].'",
						"'.$data['career'].'"
						)');
		return $validate;
	}
}