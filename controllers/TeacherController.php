<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */
class TeacherController extends MasterController{
	public function getIndex() {
		$teachers['teachers'] = TeacherModel::getAll();
		View::load('teacher/index',$teachers);
	}
	public function postfindbyid() {
		$adminData = TeacherModel::findByIdMultiple($_POST['id']);
		echo json_encode($adminData);
	}
	public function postInsert() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataPerson = array('identification' => $_POST['identification'], 'full_name' => $_POST['fullname'], 'date_of_birth' => $_POST['datebirth'], 'email' => $_POST['email'], 'user_name' => $_POST['username'], 'password' => $_POST['password']);
			$personId = PersonModel::insert($dataPerson);

			$dataTeacher = array('office' => $_POST['office'], 'phone_number' => $_POST['phone'], 'category' => $_POST['category'], 'amount_hour' => $_POST['amounthour'], 'id_person' => $personId);
			$teacherId = TeacherModel::insert($dataTeacher);
			if($teacherId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			header('location: /teacher/index');
		}
	}
	public function postUpdate() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataPerson = array('identification' => $_POST['identification'], 'fullname' => $_POST['fullname'], 'datebirth' => $_POST['datebirth'], 'email' => $_POST['email'], 'id_person' => $_POST['id']);
			$personId = PersonModel::update($dataPerson);

			if(isset($_POST['password']) && $_POST['password'] != '') {
				$dataPerson = array('password' => $_POST['password'], 'id_person' => $_POST['id']);
				$personId = PersonModel::updatePassword($dataPerson);
			}
			$dataTeacher = array('office' => $_POST['office'], 'phone_number' => $_POST['phone'], 'category' => $_POST['category'], 'amount_hour' => $_POST['amounthour'], 'id_teacher' => $_POST['user']);
			$teacherId = TeacherModel::update($dataTeacher);
			if($personId || $teacherId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			header('location: /teacher/index');
		}
	}
	public function postDelete() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataPerson = array('id_person' => $_POST['id'], 'id_teacher' => $_POST['user']);
			$teacherId = TeacherModel::delete($dataPerson);
			$personId = PersonModel::delete($dataPerson);
			if($personId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			header('location: /teacher/index');
		}
	}
	public function postList() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$listTeacher = TeacherModel::getAllList();
			echo json_encode($listTeacher);
		}else {
			Redirect::to('/teacher/index');
		}
	}
}