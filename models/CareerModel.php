<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:26 PM
 */
class CareerModel extends DbTables {
	static function getAll(){
		$db = new DbTables();
		$db->query('SELECT * FROM tbl_career');
		return $db->query_result();
	}

	static function findbyid($id){
		$db = new DbTables();
		$db->query('SELECT *
 						FROM tbl_career
 						WHERE id_career ='.(int)$id);
		return $db->query_result();
	}

	static function insert($data){
		$db = new DbTables();
		$db->query('INSERT INTO tbl_career (code,
						name,
						quantity_credits,
						amount,
						quantity_semester)
			VALUES (
				"'.$data['code'].'",
				"'.$data['name'].'",
				"'.$data['credits'].'",
				"'.$data['amount'].'",
				"'.$data['semester'].'")');
		return $db->query_insert_id();
	}
	static function update($data){
		$db = new DbTables();
		$db->query('UPDATE tbl_career SET name ="'.$data['name'].'",
		quantity_credits ="'.$data['credits'].'",
		amount ="'.$data['amount'].'",
		quantity_semester ="'.$data['semester'].'"
			WHERE id_career = "'.$data['id_career'].'"');
		return true;
	}
	static function delete($data){
		$db = new DbTables();
		$db->query('DELETE FROM tbl_career WHERE id_career = "'.$data['id_career'].'"');
		return true;
	}
}
