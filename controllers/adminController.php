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
		$admins = AdminModel::getAll();
		require_once BASE_VIEWS.'admin/index.php';
		break;
	case 'findBy':
		break;
	case 'insert':
		if(count($_POST) > 0){
			header('Content-type: application/json');
			$dataPerson = array(
				'identification'=>$_POST['identification'],
				'full_name'=>$_POST['fullname'],
				'date_of_birth'=>$_POST['datebirth'],
				'email'=>$_POST['email'],
				'user_name'=>$_POST['username'],
				'password'=>$_POST['password']
			);
			$personId = PersonModel::insert($dataPerson);

			$dataAdmin = array(
				'type'=>'ADMIN',
				'id_person'=>$personId
			);
			$adminId = AdminModel::insert($dataAdmin);
			if($adminId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /admin/index');
		}
		break;
	case 'update':

		break;;
}
