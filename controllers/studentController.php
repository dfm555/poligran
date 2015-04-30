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
		$students = StudentModel::getAll();
		require_once BASE_VIEWS.'student/index.php';
		break;
	case 'findbyid':
		$studentsData = StudentModel::findbyid($_POST['id']);
		echo json_encode($studentsData);
		break;
	case 'insert':
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

			$dataStudent = array(
				'nickname'=>$_POST['nickname'],
				'id_person'=>$personId
			);
			$studentId = StudentModel::insert($dataStudent);
			if($studentId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /student/index');
		}
		break;
	case 'update':
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataPerson = array(
				'identification'=>$_POST['identification'],
				'fullname'=>$_POST['fullname'],
				'datebirth'=>$_POST['datebirth'],
				'email'=>$_POST['email'],
				'id_person'=>$_POST['id']
			);
			$personId = PersonModel::update($dataPerson);

			if(isset($_POST['password']) && $_POST['password']!=''){
				$dataPerson = array(
					'password'=>$_POST['password'],
					'id_person'=>$_POST['id']
				);
				$personId = PersonModel::updatePassword($dataPerson);
			}
			$dataStudent = array(
				'nickname'=>$_POST['nickname'],
				'id_student'=>$_POST['user']
			);
			$studentId = StudentModel::update($dataStudent);
			if($personId || $studentId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /student/index');
		}
		break;;
	case 'delete':
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataPerson = array(
				'id_person'=>$_POST['id'],
				'id_student'=>$_POST['user']
			);
			$studentId = StudentModel::delete($dataPerson);
			$personId = PersonModel::delete($dataPerson);
			if($personId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /student/index');
		}
	break;
}