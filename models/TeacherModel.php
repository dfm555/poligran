<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:23 PM
 */
class TeacherModel extends DbTables {

	static function teacherData($id_person){
		$db = new DbTables();
		$db->dbConnect();

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
}