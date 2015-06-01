<?php

/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 01/06/2015
 * Time: 11:32 AM
 */
class CareerSubjectModel extends MasterModel{
	static $table = 'tbl_career_tbl_subject';

	static function insert($data){
		$validate = static::query('INSERT INTO '.static::$table.'(
						tbl_career_id_career, tbl_subject_id_subject
						) VALUES (
						"'.$data['career'].'",
						"'.$data['subject'].'"
						)');
		return $validate;
	}

	static function listById($data){
		static::query('SELECT s.* FROM tbl_subject s, tbl_career_tbl_subject cs  WHERE s.id_subject = cs.tbl_subject_id_subject AND cs.tbl_career_id_career ="'.$data['career'].'"');
		return static::query_result();
	}


}