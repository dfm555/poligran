<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class StudentModel extends DbTables {

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
}