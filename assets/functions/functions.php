<?php 
include '../../class/config.php';
switch($_POST['action']) {

    case 'login':
    $username = $data->post($_POST['username']);
    $password = $data->post($_POST['password']);
    $query    = $data->login($username,$password);
    break;

    case 'Insert Users':
    $lastname   = $data->post($_POST['lastname']);
    $firstname  = $data->post($_POST['firstname']);
    $middlename = $data->post($_POST['middlename']);
    $email      = $data->post($_POST['email']);
    $contact    = $data->post($_POST['contact']);
    $gender     = $data->post($_POST['gender']);
    $username   = $data->post($_POST['username']);
    $password   = $data->post($_POST['password']);
    $type       = $data->post($_POST['type']);
    $query      = $data->insertusers($lastname,$firstname,$middlename,$email,$contact,$gender,$username,$password,$type);
    break;

    case 'Show Admin Table':
        include 'function_showadmin.php';
    break;

    case 'Show Professor Table':
        include 'function_showprofessor.php';
    break;

    case 'Show Request Administrators':
        include 'function_show_request_administrators.php';
    break;

    case 'Show Request Professors':
        include 'function_show_request_professors.php';
    break;

    case 'Show Request Students':
        include 'function_show_request_students.php';
    break;

    case 'Modify Status':
    $id     = $data->post($_POST['id']);    
    $query  = $data->modifystatusbyid($id);
    break;

}