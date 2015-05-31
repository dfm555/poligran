<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */

class IndexController extends MasterController{
	public function getIndex(){
		if(isset($_SESSION['userdata'])){
			View::load('index/dashboard');
		}else{
			Redirect::to('/index/login');
		}
	}

	public function getLogin(){
		if(isset($_SESSION['userdata'])){
			Redirect::to('/index/index');
		}else{
			View::load('index/login');
		}
	}

	public function postLogin(){
		$login = PersonModel::login($_POST['username'],$_POST['password']);
		AdminModel::dataAdmin($login);
		StudentModel::studentData($login);
		TeacherModel::teacherData($login);
		if($login){
			Redirect::to('/index/index');
		}else{
			$error = array('error'=>true);
			View::load('index/login',$error);
		}

	}



	public function getLogout(){
		unset($_SESSION['userdata']);
		session_destroy();
		Redirect::to('/index/login');
	}
}