<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */
$action = (isset($_GET['action']))?$_GET['action']:'dashboard';
switch($action){
	case 'dashboard':
		require_once BASE_VIEWS.'index/dashboard.php';
		break;
}