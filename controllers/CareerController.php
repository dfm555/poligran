<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */

class CareerController extends MasterController{
	public function getIndex() {

		if(isset($_SESSION['userdata'])){
			CareerModel::all();
			$careers['careers'] = CareerModel::query_result();
			View::load('career/index', $careers);
		}else{
			Redirect::to('/index/login');
		}
	}
	public function postfindbyid() {
		$carrerData = CareerModel::findbyid($_POST['id']);
		echo json_encode($carrerData);
	}
	public function postInsert() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataCareer = array('code' => $_POST['code'], 'name' => $_POST['name'], 'credits' => $_POST['credits'], 'amount' => $_POST['amount'], 'semester' => $_POST['semester']);

			$careerId = CareerModel::insert($dataCareer);
			if($careerId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/career/index');
		}
	}
	public function postUpdate() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataCareer = array('code' => $_POST['code'], 'name' => $_POST['name'], 'credits' => $_POST['credits'], 'amount' => $_POST['amount'], 'semester' => $_POST['semester'], 'id_career' => $_POST['id']);

			$careerId = CareerModel::update($dataCareer);
			if($careerId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/career/index');
		}
	}
	public function postDelete(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataCareer = array(
				'id_career'=>$_POST['id']
			);
			$careerId = CareerModel::delete($dataCareer);
			if($careerId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			Redirect::to('/career/index');
		}
	}

	public function postManage() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$data = array(
				'career' => $_POST['career'],
				'subject' => $_POST['subject'],
				'teacher' => $_POST['teacher'],
			);

			$validate = CareerSubjectModel::insert($data);
			$validate = TeacherCareerModel::insert($data);
			$validate = TeacherSubjectModel::insert($data);

			if($validate) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/career/index');
		}
	}

	public function postList() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			CareerModel::all();
			$listCareer = CareerModel::query_result();
			echo json_encode($listCareer);
		}else {
			Redirect::to('/teacher/index');
		}
	}
}