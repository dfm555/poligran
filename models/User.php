<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/04/15
 * Time: 06:01 PM
 */

class User{
	private $_extradata = array();
	public function __get($propertyName){
		if (array_key_exists($propertyName, $this->_extradata)){
			return $this->_extradata[$propertyName];
		}else{
			return null;
		}
	}

	public function __set($propertyName, $propertyValue){
		$this->_extradata[$propertyName] = $propertyValue;
	}
}