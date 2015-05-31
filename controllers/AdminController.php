<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */
class AdminController extends MasterController{
	public function getIndex (){

		if(isset($_SESSION['userdata'])){
			$admins['admins'] = AdminModel::getAll();
			View::load('admin/index', $admins);
		}else{
			Redirect::to('/index/login');
		}
	}
	public function postFindByid (){
		$adminData = AdminModel::findbyidMultiple($_POST['id']);
		echo json_encode($adminData);

	}
	public function postInsert (){
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
			Redirect::to('/admin/index');
		}
	}
	public function postUpdate (){
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
			if($personId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			Redirect::to('/admin/index');
		}
	}
	public function postDelete (){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-type: application/json');
			$dataPerson = array(
				'id_person'=>$_POST['id'],
				'id_admin'=>$_POST['user']
			);
			$adminId = AdminModel::delete($dataPerson);
			$personId = PersonModel::delete($dataPerson);
			if($personId){
				echo  json_encode('success');
			}else{
				echo json_encode('error');
			}
		}else{
			Redirect::to('/admin/index');
		}
	}
}
