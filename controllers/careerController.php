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
		$careers = CareerModel::getAll();
		require_once BASE_VIEWS.'career/index.php';
		break;
	case 'findbyid':
		$carrerData = CareerModel::findbyid($_POST['id']);
		echo json_encode($carrerData);
		break;
	case 'insert':
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataCareer = array(
				'code'=>$_POST['code'],
				'name'=>$_POST['name'],
				'credits'=>$_POST['credits'],
				'amount'=>$_POST['amount'],
				'semester'=>$_POST['semester']
			);

			$careerId = CareerModel::insert($dataCareer);
			if($careerId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /career/index');
		}
		break;
	case 'update':
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataCareer = array(
				'code'=>$_POST['code'],
				'name'=>$_POST['name'],
				'credits'=>$_POST['credits'],
				'amount'=>$_POST['amount'],
				'semester'=>$_POST['semester'],
				'id_career'=>$_POST['id']
			);

			$careerId = CareerModel::update($dataCareer);
			if($careerId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			header('location: /career/index');
		}
		break;;
	case 'delete':
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
			header('location: /career/index');
		}
		break;
}