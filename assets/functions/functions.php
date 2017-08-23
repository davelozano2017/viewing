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
        $lastname     = $data->post($_POST['lastname']);
        $firstname    = $data->post($_POST['firstname']);
        $middlename   = $data->post($_POST['middlename']);
        $email        = $data->post($_POST['email']);
        $contact      = $data->post($_POST['contact']);
        $gender       = $data->post($_POST['gender']);
        $branch       = $data->post($_POST['branch']);
        $type         = $data->post($_POST['type']);
        $section      = $data->post($_POST['section']);
        $course       = $data->post($_POST['course']);
        $professor_id = $data->post($_POST['professor_id']);
        $query        = $data->insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$branch,$type,$course,$section,$professor_id);
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

#############################################################################
    case 'Show Professor Courses':
        include 'function_show_professor_courses.php';
    break;

    case 'Add Professor Courses':
        $professor_id     = $data->post($_POST['professor_id']);
        $professor_course = $data->post($_POST['professor_course']);
        $query            = $data->addprofessorcourse($professor_id,$professor_course);
    break;
    case 'Update Professor Courses':
        $update_id        = $data->post($_POST['update_id']);
        $professor_course = $data->post($_POST['professor_course']);
        $query            = $data->updateprofessorcourses($update_id,$professor_course);
    break;

    case 'Delete Professor Courses':
        $update_id        = $data->post($_POST['update_id']);
        $query            = $data->deleteprofessorcourses($update_id);
    break;
#############################################################################

#############################################################################
    case 'Show Professor Section':
        include 'function_show_professor_section.php';
    break;

    case 'Add Professor Section':
        $professor_id = $data->post($_POST['professor_id']);
        $section      = $data->post($_POST['section']);
        $query        = $data->addprofessorsection($professor_id,$section);
    break;

    case 'Update Professor Section':
        $hiddenid    = $data->post($_POST['hiddenid']);
        $prof_section = $data->post($_POST['prof_section']);
        $query        = $data->updateprofessorsection($hiddenid,$prof_section);
    break;

    case 'Delete Professor Section':
        $hiddenid = $data->post($_POST['hiddenid']);
        $query    = $data->deleteprofessorsection($hiddenid);
    break;
#############################################################################

}