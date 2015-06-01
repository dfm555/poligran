<?php

class MasterModel {

	protected static $table;
	static $link;
	static $result;
	static $insertId;

	public static function connect() {
		static::$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASS, DB_DBASE);
	}

	public static function query($sql) {
		static::connect();
		static::$result= '';
		static::$result = mysqli_query(static::$link, $sql) or die('Error executing : ' . $sql . " err:" . mysqli_errno(static::$link));
		static::$insertId = mysqli_insert_id(static::$link);
		if(!static::$result) {
			return mysqli_errno(static::$link);
		}else {
			return true;
		}
	}

	public static function close() {
		mysqli_close(static::$link);
	}

	public static function sanitize($sql) {
		return addslashes($sql);
	}

	//CRUD FUNCTIONS

	public static function all() {
		return static::query("SELECT * FROM " . static::$table);
	}


	public static function deleteById($id){
		return static::query("DELETE FROM "  . static::$table . " WHERE id = $id");
	}

	static function query_insert_id() {
		return static::$insertId;
	}

	static function query_result() {
		$result = array();
		$count = mysqli_num_rows(static::$result);
		if(!$count) {
			$result = false;
		}else {
			while($row = mysqli_fetch_array(static::$result, MYSQLI_ASSOC))
				$result[] = $row;
		}
		return $result;
	}

	static function cleanSQL($data, $encrypt = false) {
		static::connect();
		if(get_magic_quotes_gpc()) {
			if(is_array($data)) {
				return array_map(array(static::$link, 'cleanSQL'), $data);
			}else {
				$data = stripslashes($data);
			}
		}
		if(!is_numeric($data)) {
			if(function_exists('mysqli_real_escape_string')) {
				$data = mysqli_real_escape_string(static::$link, $data);
			}else {
				$data = addslashes($data);
			}
		}

		if($encrypt) {
			$data = md5($data);
		}

		return $data;
	}

	static  function counRows(){
		static::query('SELECT COUNT(*) FROM '.static::$table.'');
		return static::query_result()[0]['COUNT(*)'];
	}
}
