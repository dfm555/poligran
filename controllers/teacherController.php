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
		require_once BASE_VIEWS.'teacher/index.php';
		break;
	case 'edit':
		require_once BASE_VIEWS.'teacher/edit.php';
		break;
}