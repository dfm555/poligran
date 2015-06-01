<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */
class SubjectController extends MasterController {
	public function getIndex() {
		if(isset($_SESSION['userdata'])){
			SubjectModel::all();
			$subjects['subjects'] = SubjectModel::query_result();
			View::load('subject/index', $subjects);
		}else{
			Redirect::to('/index/login');
		}
	}

	public function postfindbyid() {
		$subjectData = SubjectModel::findbyid($_POST['id']);
		echo json_encode($subjectData);
	}

	public function postInsert() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataSubject = array(
				'code' => $_POST['code'],
				'name' => $_POST['name'],
				'credits' => $_POST['credits'],
				'cycle' => $_POST['cycle'],
				'room' => $_POST['room'],
				'description' => $_POST['description'],
				'hours' => $_POST['hours'],
				'place' => $_POST['place']);

			$subjectId = SubjectModel::insert($dataSubject);
			if($subjectId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/subject/index');
		}
	}

	public function postUpdate() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataSubject = array('name' => $_POST['name'], 'credits' => $_POST['credits'], 'cycle' => $_POST['cycle'], 'room' => $_POST['room'], 'description' => $_POST['description'], 'hours' => $_POST['hours'], 'place' => $_POST['place'], 'id_subject' => $_POST['id']);

			$subjectId = SubjectModel::update($dataSubject);
			if($subjectId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/subject/index');
		}
	}

	public function postDelete() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$dataSubject = array('id_subject' => $_POST['id']);
			$subjectId = SubjectModel::delete($dataSubject);
			if($subjectId) {
				echo json_encode('success');
			}else {
				echo json_encode('error');
			}
		}else {
			Redirect::to('/subject/index');
		}
	}

	public function postList() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			SubjectModel::all();
			$listSubjects = SubjectModel::query_result();
				echo json_encode($listSubjects);
		}else {
			Redirect::to('/subject/index');
		}
	}

	public function postListByIdCareer() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			header('Content-type: application/json');
			$listSubjects = CareerSubjectModel::listById(array('career'=>$_POST['career']));
			echo json_encode($listSubjects);
		}else {
			Redirect::to('/subject/index');
		}
	}
}