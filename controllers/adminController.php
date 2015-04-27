<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */

$action = (isset($_GET['action']))?$_GET['action']:'index';
switch($action){
	case 'index':
		require_once BASE_VIEWS.'admin/index.php';
		break;
	case 'findBy':
		break;
	case 'insert':
		$dataPerson = array(
			'identification'=>$_POST['identification'],
			'full_name'=>$_POST['full_name'],
			'date_of_birth'=>$_POST['date_of_birth'],
			'email'=>$_POST['email'],
			'user_name'=>$_POST['user_name'],
			'password'=>$_POST['password']
		);
		PersonModel::insert($dataPerson);
		$dataAdmin = array(
			'type'=>$_POST['type'],
			'id_person'=>PersonModel::insert_id()
		);
		AdminModel::insert($dataAdmin);
		break;
	case 'update':

		break;;
}