<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 25/04/15
 * Time: 05:54 PM
 */
$action = (isset($_GET['action'])) ? $_GET['action'] : 'index';
switch ($action) {
    case 'index':
        $subjects = SubjectModel::getAll();
        require_once BASE_VIEWS . 'subject/index.php';
        break;
    case 'findbyid':
        $subjectData = SubjectModel::findbyid($_POST['id']);
        echo json_encode($subjectData);
        break;
    case 'insert':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-type: application/json');
            $dataSubject = array(
                'code' => $_POST['code'],
                'name' => $_POST['name'],
                'credits' => $_POST['credits'],
                'cycle' => $_POST['cycle'],
                'room' => $_POST['room'],
                'description' => $_POST['description'],
                'hours' => $_POST['hours'],
                'place' => $_POST['place']
            );

            $subjectId = SubjectModel::insert($dataSubject);
            if ($subjectId) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        } else {
            header('location: /subject/index');
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-type: application/json');
           $dataSubject = array(
                'name' => $_POST['name'],
                'credits' => $_POST['credits'],
                'cycle' => $_POST['cycle'],
                'room' => $_POST['room'],
                'description' => $_POST['description'],
                'hours' => $_POST['hours'],
                'place' => $_POST['place'],
               'id_subject' => $_POST['id']
            );

            $subjectId = SubjectModel::update($dataSubject);
            if ($subjectId) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        } else {
            header('location: /subject/index');
        }
        break;
        ;
    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-type: application/json');
            $dataSubject = array(
                'id_subject' => $_POST['id']
            );
            $subjectId = SubjectModel::delete($dataSubject);
            if ($subjectId) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        } else {
            header('location: /subject/index');
        }
        break;
}