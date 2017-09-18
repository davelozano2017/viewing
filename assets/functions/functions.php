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
        $username     = $data->post($_POST['username']);
        $subject      = $data->post($_POST['subject']);
        $section      = $data->post($_POST['section']);
        $course       = $data->post($_POST['course']);
        $sy           = $data->post($_POST['sy']);
        $query        = $data->insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$branch,$type,$username,$subject,$course,$section,$sy);
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
        $courses_id     = $data->post($_POST['courses_id']);
        $courses_update = $data->post($_POST['courses_update']);
        $options_update = $data->post($_POST['options_update']);
        $query          = $data->updatecourses($courses_update,$options_update,$courses_id);
    break;

    case 'Delete Courses':
        $course_id  = $data->post($_POST['course_id']);
        $query      = $data->deletecourses($course_id);
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

    case 'Show All Students':
        include 'function_show_all_students.php';
    break;

    case 'Show Grades':
        include 'function_show_grades.php';
    break;

    case 'Show School Year':
        include 'function_show_school_year.php';
    break;
    
    case 'Show Subjects':
        include 'function_show_subjects.php';
    break;

    case 'Show Branches':
        include 'function_show_branches.php';
    break;
    
    case 'Show Courses':
        include 'function_show_courses.php';
    break;
    
    case 'Add School Year':
        $sy = $data->post($_POST['sy']);
        $query = $data->addschoolyear($sy);
    break;
    
    case 'Show Student Grades':
        include 'function_show_students_grades.php';
    break;

    case 'Students':
        include 'function_students.php';
    break;

// professor add students begin
    case 'Add Professor Student':
    $student_id   = $data->post($_POST['student_id']);
    $professor_id = $data->post($_POST['professor_id']);
    $query        = $data->add_professor_students($student_id,$professor_id);
    break;
// professor add student end 

// admin add subjects begin 
    case 'Add Subjects': 
        $sub_course   = $data->post($_POST['sub_course']);
        $sub_subject  = $data->post($_POST['sub_subject']);
        $sub_section  = $data->post($_POST['sub_section']);
        $query        = $data->addsubjects($sub_course,$sub_subject,$sub_section);
        break;
    
    case 'Delete Subjects':
        $update_sub_id = $data->post($_POST['update_sub_id']);
        $query         = $data->deletesubjects($update_sub_id);
    break;

    case 'Update Subjects':
        $update_sub_id         = $data->post($_POST['update_sub_id']);
        $update_sub_course     = $data->post($_POST['update_sub_course']);
        $update_sub_subject    = $data->post($_POST['update_sub_subject']);
        $update_sub_section    = $data->post($_POST['update_sub_section']);
        $query                 = $data->updatesubjects($update_sub_id,$update_sub_course,$update_sub_subject,$update_sub_section);
    break;
// admin add subjects end 

    case 'Update Student':
        $accountid  = $data->post($_POST['accountid']);
        $studentid  = $data->post($_POST['studentid']);
        $lastname   = $data->post($_POST['lastname']);
        $firstname  = $data->post($_POST['firstname']);
        $middlename = $data->post($_POST['middlename']);
        $email      = $data->post($_POST['email']);
        $contact    = $data->post($_POST['contact']);
        $gender     = $data->post($_POST['gender']);
        $username   = $data->post($_POST['username']);
        $subject    = $data->post($_POST['subject']);
        $branch     = $data->post($_POST['branch']);
        $section    = $data->post($_POST['section']);
        $course     = $data->post($_POST['course']);
        $esy        = $data->post($_POST['esy']);
        $query      = $data->updatestudents($accountid,$studentid,$lastname,$firstname,$middlename,$email,$contact,$gender,$username,$subject,$branch,$section,$course,$esy);
    break;

    case 'Delete Student':
        $accountid  = $data->post($_POST['accountid']);
        $studentid  = $data->post($_POST['studentid']);
        $query      = $data->deletestudents($accountid,$studentid);
    break;

    case 'Delete Uploaded Grades':
        $code  = $data->post($_POST['code']);
        $query = $data->removeuploadedgrades($code);
    break;

    case 'Approve Uploaded Grades':
        $code  = $data->post($_POST['code']);
        $query = $data->approveuploadedgrades($code);
    break;

    case 'Show Students Report':
        include 'function_show_students_reports.php';
    break;

    case 'Show Upload Grades': 
        include 'function_show_upload_grades.php';
    break;

#############################################################################

#############################################################################
    case 'Show Sections':
        include 'function_show_sections.php';
    break;

    case 'Add Sections':
        $sections     = $data->post($_POST['section']);
        $query        = $data->add_sections($sections);
    break;

    case 'Update Sections':
        $section_id     = $data->post($_POST['section_id']);
        $section_update = $data->post($_POST['section_update']);
        $query          = $data->update_sections($section_id,$section_update);
    break;

    case 'Delete Sections':
        $section_id = $data->post($_POST['section_id']);
        $query      = $data->delete_sections($section_id);
    break;
#############################################################################

#############################################################################
    case 'Professor Profile':
        $update_id = $data->post($_POST['update_id']);
        $password  = $data->post($_POST['password']);
        $query     = $data->professorprofile($update_id,$password);
    break;
#############################################################################

#############################################################################
    case 'Request':
        $email = $data->post($_POST['email']);
        $query = $data->request($email);
    break;

    case 'Execute Request':
        $id    = $data->post($_POST['id']);
        $query = $data->executerequest($id);
    break;
#############################################################################

}