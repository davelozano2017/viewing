<?php 
include '../../class/config.php';
switch($_POST['action']) {

#############################################################################
    case 'login':
        $username = $data->post($_POST['username']);
        $password = $data->post($_POST['password']);
        $query    = $data->login($username,$password);
    break;
#############################################################################
  
#############################################################################
    case 'Modify Status':
        $id     = $data->post($_POST['id']);    
        $query  = $data->modifystatusbyid($id);
    break;
#############################################################################
    
#############################################################################
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
#############################################################################

#############################################################################
    case 'Insert Students':
        $lastname   = $data->post($_POST['lastname']);
        $firstname  = $data->post($_POST['firstname']);
        $middlename = $data->post($_POST['middlename']);
        $email      = $data->post($_POST['email']);
        $contact    = $data->post($_POST['contact']);
        $gender     = $data->post($_POST['gender']);
        $username   = $data->post($_POST['username']);
        $type       = $data->post($_POST['type']);
        $section    = $data->post($_POST['section']);
        $course     = $data->post($_POST['course']);
        $query      = $data->insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$username,$type,$course,$section);
    break;
#############################################################################
    
#############################################################################
    case 'Add Branches':
        $branch     = $data->post($_POST['branch']);
        $query      = $data->addbranches($branch);
    break;

    case 'Update Branches':
        $id         = $data->post($_POST['id']);
        $branch     = $data->post($_POST['branch']);
        $query      = $data->updatebranches($id,$branch);
    break;

    case 'Delete Branches':
    $id         = $data->post($_POST['id']);
    $query      = $data->deletebranches($id);
    break;
#############################################################################

#############################################################################
    case 'Add Courses':
        $course     = $data->post($_POST['course']);
        $option     = $data->post($_POST['option']);
        $query      = $data->addcourses($course,$option);
    break;

    case 'Update Courses':
        $id         = $data->post($_POST['id']);
        $course     = $data->post($_POST['course']);
        $option     = $data->post($_POST['option']);
        $query      = $data->updatecourses($id,$course,$option);
    break;

    case 'Delete Courses':
        $id         = $data->post($_POST['id']);
        $query      = $data->deletecourses($id);
    break;
#############################################################################

#############################################################################
    case 'Show Admin Table':
        include 'function_showadmin.php';
    break;

    case 'Show Professor Table':
        include 'function_showprofessor.php';
    break;
#############################################################################

#############################################################################
    case 'Show Request Administrators':
        include 'function_show_request_administrators.php';
    break;

    case 'Show Request Professors':
        include 'function_show_request_professors.php';
    break;

    case 'Show Request Students':
        include 'function_show_request_students.php';
    break;

    case 'Show Students':
        include 'function_show_students.php';
    break;

    case 'Show Branches':
        include 'function_show_branches.php';
    break;
    
    case 'Show Courses':
        include 'function_show_courses.php';
    break;
#############################################################################


}