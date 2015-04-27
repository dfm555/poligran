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
		if(isset($_SESSION['userdata'])){
			require_once BASE_VIEWS.'index/dashboard.php';
		}else{
			header('location: /index/login');
		}
		break;
	case 'login':
		if(isset($_SESSION['userdata'])){
			header('location: /index/index');
		}else{
			if(count($_POST)>0){
				$login = PersonModel::login($_POST['username'],$_POST['password']);
				AdminModel::dataAdmin($login);
				StudentModel::studentData($login);
				TeacherModel::teacherData($login);
				if($login){
					header('location: /index/index');
				}else{
					$error = true;
				}
			}
			require_once BASE_VIEWS.'index/login.php';
		}
		break;
	case 'logout':
		unset($_SESSION['userdata']);
		session_destroy();
		header('location: /index/login');
		break;
}
