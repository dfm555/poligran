<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 05:20 PM
 */
class DbTables {
	private $conexion;
	private $result;

	public function __construct() {

	}

	public function dbConnect() {
		if(!isset($this->conexion)) {
			$this->conexion = (mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD));
			if($this->conexion) {
				mysqli_select_db($this->conexion, DB_DBASE) or die(mysqli_error($this->conexion));
				mysqli_set_charset($this->conexion, 'utf8');
				mysqli_query($this->conexion, 'SET NAMES "utf8"');
			}else {
				echo mysqli_error($this->conexion);
				die();
			}
		}
	}

	public function query($query) {
		$this->dbConnect();
		unset ($this->result); // ensure clean results

		$this->result = mysqli_query($this->conexion, $query) or die(mysqli_error($this->conexion));
		if(!$this->result) {
			return false;
		}else {
			return true;
		}
	}

	public function query_result() {
		$result = array();
		$count = mysqli_num_rows($this->result);
		if(!$count) {
			$result = false;
		}else {
			while($row = mysqli_fetch_array($this->result, MYSQLI_ASSOC))
				$result[] = $row;
		}
		return $result;
	}

	public function query_insert_id() {
		$this->dbConnect();
		return mysqli_insert_id($this->conexion);
	}

	function cleanSQL($data, $encrypt = false) {

		if(get_magic_quotes_gpc()) {
			if(is_array($data)) {
				return array_map(array($this, 'cleanSQL'), $data);
			}else {
				$data = stripslashes($data);
			}
		}
		if(!is_numeric($data)) {
			if(function_exists('mysqli_real_escape_string')) {
				$data = mysqli_real_escape_string($this->conexion, $data);
			}else {
				$data = addslashes($data);
			}
		}

		if($encrypt) {
			$data = md5($data);
		}

		return $data;
	}
}