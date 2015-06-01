<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */

class StudentController extends MasterController{
	public function getIndex (){
		if(isset($_SESSION['userdata'])){
			$students['students'] = StudentModel::getAll();
			View::load('student/index', $students);
		}else{
			Redirect::to('/index/login');
		}
	}

	public function postfindbyid(){
		$studentsData = StudentModel::findbyidMultiple($_POST['id']);
		echo json_encode($studentsData);
	}

	public function postInsert(){
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
			Redirect::to('/student/index');
		}
	}

	public function postupdate(){
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
			Redirect::to('/student/index');
		}
	}

	public function postdelete(){
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
			Redirect::to('/student/index');
		}
	}

	public function postManage() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$data = array(
				'student' => $_POST['student'],
				'subject' => $_POST['subject']
			);

			$validate = InscriptionModel::insert($data);

			if($validate) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/student/index');
		}
	}

	public function postSubjects() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$data = array(
				'student' => $_POST['student']
			);
			$validate = InscriptionModel::listById($data);
			echo json_encode($validate);
		}else {
			Redirect::to('/student/index');
		}
	}
}