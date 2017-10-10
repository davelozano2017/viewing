<?php
include 'controller.php';
include 'SmsGateway.php';
include 'PHPExcel/IOFactory.php';
class db extends Controller {

    // Insert Administrator & Professor
    public function insertusers($lastname,$firstname,$middlename,$email,$contact,$gender,$username,$type,$branch) {
        $password = password_hash(12345,PASSWORD_DEFAULT);
        $security_code = rand(111111,999999);
        $photo = '../../assets/images/admin.png';
        $check = $this->db->query("SELECT * FROM accounts_tbl WHERE username = '$username'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'Already exist.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO accounts_tbl 
            (photo,lastname,firstname,middlename,email,contact,
            gender,username,password,security_code,status,role) 
            VALUES 
            ('$photo','$lastname','$firstname','$middlename','$email',
            '$contact','$gender','$username','$password','$security_code',1,'$type')");
            
            return $query ? $this->accounts_extension_tbl($username,$branch,$type) : false;
        }
    }

    public function accounts_extension_tbl($username,$branch,$type) {
        $query = $this->db->query("INSERT INTO accounts_extension_tbl (username,branch) VALUES ('$username','$branch')");
        if($type == 1) {
            $message = 'New administrator has been added';
        } elseif($type == 2) {
            $message = 'New professor has been added';
        }
        return $query ? $this->success($message) : null;
    }
 
    public function request($email) {
        $check   = $this->db->query("SELECT * FROM accounts_tbl WHERE email = '$email'");
        $checkr  = $check->num_rows;
        if($checkr > 0) {
        $row     = $check->fetch_object();
        $role    = $row->role;
        $id      = $row->id;
        $name    = $row->firstname. ' '.$row->lastname;
        $contact = $row->contact;
        $checks  = $this->db->query("SELECT * FROM requests_tbl WHERE account_id = '$id'");
        $checksr = $checks->num_rows;
        if($checksr > 0) {
            $message = 'Your request has already sent.';
            $this->error($message);
        } else {
            $query   = $this->db->query("INSERT INTO requests_tbl (account_id,name,contact,role) VALUES ('$id','$name','$contact','$role')");
            $message = 'Your request for a temporary password has been sent.';
            return   $query ? $this->success($message) : null;
          }
        } else {
            $message = $email.' '. ' is not in our database.';
            $this->error($message);
        }

    }

    function executerequest($id) {
        $hash     = rand(111111,999999);
        $password = password_hash($hash,PASSWORD_DEFAULT);
        $check    = $this->db->query("SELECT * FROM requests_tbl WHERE id = '$id'");
        $row      = $check->fetch_object();
        $acc_id   = $row->account_id;
        $contact  = $row->contact;
        $message  = 'Your new password is '.$hash;
        $query    = $this->db->query("UPDATE accounts_tbl SET password = '$password' WHERE id = '$acc_id'");
        if($query) {
            $result = $this->db->query("DELETE FROM requests_tbl WHERE id = '$id'");
            if($result) {
                $smsGateway = new SmsGateway('romanomaryclaire@gmail.com', 'sept282k12');
                $number     = '+63'.$contact;
                $message    = $message;
                $deviceID   = 62305;
                $smsGateway->sendMessageToNumber($number, $message, $deviceID);
                if($smsGateway) {
                    $message = 'Temporary password has been sent to '.$number;
                    $this->success($message);
                }
            }
        }

    }

    public function addbranches($branch) {
        $check = $this->db->query("SELECT * FROM branches_tbl WHERE branches = '$branch'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This branch is already exist.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO branches_tbl (branches) VALUES ('$branch')");
            $message = 'New branch has been added.';
            return $query ? $this->success($message) : null;
        }
    }

    public function showsections() {
        $query = $this->db->query("SELECT * FROM professor_sections_tbl");
        return $query;
    }
    public function showbranches() {
        $query = $this->db->query("SELECT * FROM branches_tbl");
        return $query;
    }

    public function show_branches_by_student($id){
        $query = $this->db->query("SELECT * FROM students_tbl as st INNER JOIN accounts_tbl as at ON st.username = at.username WHERE at.id = $id GROUP BY st.branch");
        return $query;
    }

    public function updatebranches($id,$branch) {
        $query = $this->db->query("UPDATE branches_tbl SET branches = '$branch' WHERE id = '$id'");
        $message = 'Branch has been updated.';
        $query ? $this->updated($message) : null;
    }

    public function deletebranches($id) {
        $query = $this->db->query("DELETE FROM branches_tbl WHERE id = '$id'");
        $query ? $this->deleted() : null;
    }

    function show_sections() {
        $query = $this->db->query("SELECT * FROM sections_tbl");
        return $query;
    }

    public function showcourse() {
        $query = $this->db->query("SELECT * FROM courses_tbl");
        return $query;
    }

    public function showprofessorcourse($id) {
        $query = $this->db->query("SELECT * FROM professor_courses_tbl WHERE professor_id = '$id'");
        return $query;
    }

    public function showprofessorsubject($id) {
        $query = $this->db->query("SELECT * FROM professor_subjects_tbl WHERE professor_id = '$id'");
        return $query;
    }
    

    public function showprofessorsection($id) {
        $query = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_id = '$id'");
        return $query;
    }

// admin course execution begin
    public function addcourses($course,$option) {
        $check = $this->db->query("SELECT * FROM courses_tbl WHERE courses = '$course'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This course '.$course.' is already exist.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO courses_tbl (courses,options) VALUES ('$course','$option')");
            $message = 'New course has been added.';
            return $query ? $this->success($message) : null;
        }
    }

    public function updatecourses($courses_update,$options_update,$courses_id) {
        
            $query = $this->db->query("UPDATE courses_tbl SET 
            courses = '$courses_update', options = '$options_update' WHERE id = '$courses_id'");
            $message = 'Course has been updated.';
            return $query ? $this->updated($message) : null;
    }

    public function deletecourses($courses_id) {
        $query = $this->db->query("DELETE FROM courses_tbl WHERE id = '$courses_id'");
        $query ? $this->deleted() : null;
    }
// delete course execution end 

    public function deleteprofessorcourses($update_id) {
        $query = $this->db->query("DELETE FROM professor_courses_tbl WHERE id = '$update_id'");
        return $query ? $this->deleted() : null;
    }

    // admin section execution begin 
    public function add_sections($sections) {
        $check = $this->db->query("SELECT * FROM sections_tbl WHERE sections = '$sections'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This section '.$sections.' is already exist.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO sections_tbl (sections) VALUES ('$sections')");
            $message = 'Section '.$sections.' has been added to your list';
            $query ? $this->success($message) : null;
        }
    }

    public function update_sections($section_id,$section_update) {
        $check = $this->db->query("SELECT * FROM sections_tbl WHERE sections = '$section_update'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This section '.$section_update.' is already exist.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("UPDATE sections_tbl SET sections = '$section_update' WHERE id = $section_id");
            $message = 'Section has been updated.';
            return $query ? $this->updated($message) : null;
        }
    } 

    public function delete_sections($section_id) {
        $query = $this->db->query("DELETE FROM sections_tbl WHERE id = '$section_id'");
        $message = 'Section has been deleted.';
        return $query ? $this->deleted($message) : null;
    }

    // admin section execution end

    // Insert Student
    public function insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$branch,$type,$username,$subject,$course,$section,$sy) {
        if(empty($lastname) || empty($firstname) || empty($middlename) || empty($email) || empty($contact) || empty($gender) || empty($username)) {
            $message = 'Fill up all fields';
            $this->error($message);
        } else {
            $password = password_hash(12345,PASSWORD_DEFAULT);
            $security_code = rand(111111,999999);
            $photo = $gender == 'Male' ? '../../assets/images/student_male.png' : '../../assets/images/student_female.png';
            $check = $this->db->query("SELECT * FROM accounts_tbl WHERE username = '$username'");
            $checkrow = $check->num_rows;
            if($checkrow > 0) {
                $checking = $this->db->query("SELECT * FROM students_tbl WHERE subject = '$subject' AND username = '$username'");
                $checkingrow = $checking->num_rows;
                if($checkingrow > 0) {
                    $message = 'This student is already exist in your list.';
                    $this->duplicated($message);
                } else {
                    $this->insertstudentinfo($subject,$section,$course,$username,$branch,$sy);
                }
            } else { 
                $query = $this->db->query("INSERT INTO accounts_tbl 
                (photo,lastname,firstname,middlename,email,contact,
                gender,username,password,security_code,role) 
                VALUES 
                ('$photo','$lastname','$firstname','$middlename','$email',
                '$contact','$gender','$username','$password','$security_code','$type')");
                $query ? $this->insertstudentinfo($subject,$section,$course,$username,$branch,$sy) : false;
            }
        }
    }

// add professor student execution begin 
    public function add_professor_students($student_id,$professor_id){
        $query = $this->db->query("SELECT * FROM professor_students_tbl WHERE student_id = $student_id AND professor_id = $professor_id");
        $check = $query->num_rows;
        if($check > 0) {
            $query = $this->db->query("DELETE FROM professor_students_tbl WHERE student_id = $student_id AND professor_id = $professor_id");
            $message = 'Successfully Removed.';
            $query ? $this->success($message) : null;
            
        } else {
            $query = $this->db->query("INSERT INTO professor_students_tbl (student_id,professor_id) VALUES ('$student_id','$professor_id')");
            $message = 'Successfully added.';
            $query ? $this->success($message) : null;
        }
    }
// add professor student execution end 

    public function insertstudentinfo($subject,$section,$course,$username,$branch,$sy) {
        $query = $this->db->query("INSERT INTO students_tbl 
        (subject,section,course,branch,username,sy) VALUES ('$subject','$section','$course','$branch','$username','$sy')");
        $message = 'New student has been added.';
        return $query ? $this->success($message) : false;
    }

    public function updatestudents($accountid,$studentid,$lastname,$firstname,$middlename,$email,$contact,$gender,$username,$subject,$branch,$section,$course,$esy) {
        if(empty($lastname) || empty($firstname) || empty($middlename) || empty($email) || empty($contact) || empty($gender) || empty($username) || empty($branch) || empty($section) || empty($course) || empty($subject)) {
            echo json_encode(array(
                'bgcolor' => '#ff0000',
                'color'   => '#fff',
                'message' => 'Please fill up all fields'
            ));
        } else {
            $query = $this->db->query("UPDATE accounts_tbl SET 
                lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', 
                email = '$email', contact = '$contact', gender = '$gender', 
                username = '$username', username = '$username' WHERE id = '$accountid'");
            return $query ? $this->updatestudentinfo($studentid,$subject,$section,$course,$username,$branch,$esy) : null;
        }

    }

    public function updatestudentinfo($studentid,$subject,$section,$course,$username,$branch,$esy) {
        $query = $this->db->query("UPDATE students_tbl SET subject = '$subject', section = '$section', 
        course = '$course', username = '$username', branch = '$branch', sy = '$esy' WHERE student_id = '$studentid'");
        $message = 'Student information has been updated';
        return $query ? $this->updated($message) : false;
    }

    public function deletestudents($accountid,$studentid) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = '$accountid'");
        $row = $query->fetch_object();
        $username = $row->username;
        $squery = $this->db->query("SELECT * FROM students_tbl WHERE username = '$username'");
        $check = $squery->num_rows;
        if($check == 1) {
            $query = $this->db->query("DELETE FROM accounts_tbl WHERE id = '$accountid'");
            if($query) {
                $this->db->query("DELETE FROM students_tbl WHERE student_id = '$studentid'");
                echo json_encode(array('success'=>true));
            }
        } else {
            $success = $this->db->query("DELETE FROM students_tbl WHERE student_id = '$studentid'");
            echo json_encode(array('success'=>true));
        }
            
    }

    //Show Admin Record
    public function showadmin() {
        $query = $this->db->query("SELECT * FROM accounts_tbl INNER JOIN accounts_extension_tbl ON accounts_tbl.username = accounts_extension_tbl.username WHERE role = 1");
        return $query;
    }
      //Show Professor Record
    public function showprofessor() {
        $query = $this->db->query("SELECT * FROM accounts_tbl INNER JOIN accounts_extension_tbl ON accounts_tbl.username = accounts_extension_tbl.username WHERE role = 2");
        return $query;
    }

    public function count_professor_students($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl WHERE professor_id = $id");
        $check = $query->num_rows;
        return $check;
    }

    public function count_professor_branches($id) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = $id");
        $row   = $query->fetch_object();
        $username = $row->username;
        $query = $this->db->query("SELECT * FROM accounts_extension_tbl WHERE username = '$username'");
        $check = $query->num_rows;
        return $check;
    }

    public function count_professor_courses($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY st.course");
        foreach($query as $row) {
            $count[] = $row;
        }
        return @count($count);
    }

    public function count_professor_subjects($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY st.subject");
        foreach($query as $row) {
            $count[] = $row;
        }
        return @count($count);
    }

    public function countprofessorstudent($id) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE professor_id = $id");
        return $check = $query->num_rows;
    }

  
    //Get Admin Data by id
    public function getuserinfobyid($id) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = $id");
        return $query;
    }

    // count all administrators
    public function countadministrators() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 1");
        $check = $query->num_rows;
        return $check;
    }

    // search student
    public function search_student_by_username() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role =3");
        return $query;
    }

    // count all professors
    public function countprofessors() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 2");
        $check = $query->num_rows;
        return $check;
    }

    // count all students
    public function countstudents() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 3");
        $check = $query->num_rows;
        return $check;
    }

    // count all users
    public function countall() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role != 0");
        $check = $query->num_rows;
        return $check;
    }

    public function modifystatusbyid($id) {
        $check  = $this->db->query("SELECT status FROM accounts_tbl WHERE id = $id");
        $row    = $check->fetch_object();
        $status = $row->status;
        $stats  = $status == 1 ? 0 : 1;
        $query  = $this->db->query("UPDATE accounts_tbl SET status = $stats WHERE id = $id");
        if($query) {
            if($stats == 0) {
                $this->activate();
            } else {
                $this->deactivate();
            }
        }
    }

    public function show_request_administrators() {
        $query = $this->db->query("SELECT * FROM requests_tbl WHERE role = 1");
        return $query;
    }

    public function show_request_professors() {
        $query = $this->db->query("SELECT * FROM requests_tbl WHERE role = 2");
        return $query;
    }

    public function show_request_students() {
        $query = $this->db->query("SELECT * FROM requests_tbl WHERE role = 3");
        return $query;
    }
    
    public function show_branches() {
        $query = $this->db->query("SELECT * FROM branches_tbl");
        return $query;
    }

    public function show_courses() {
        $query = $this->db->query("SELECT * FROM courses_tbl");
        return $query;
    }

    public function show_students() {
        $query = $this->db->query("SELECT * FROM accounts_tbl INNER JOIN students_tbl
        ON accounts_tbl.username = students_tbl.username
        WHERE accounts_tbl.role = 3");
        return $query;
    }

    public function show_students_by_professor($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st
        ON pst.student_id = st.student_id INNER JOIN accounts_tbl as at ON st.username = at.username WHERE pst.professor_id = $id");
        return $query;
    }

    public function search_student($branch,$course,$subject,$section) {
        $query = $this->db->query("SELECT * FROM accounts_tbl INNER JOIN students_tbl
        ON accounts_tbl.username = students_tbl.username
        WHERE accounts_tbl.role = 3 AND branch = '$branch' AND course = '$course' AND subject = '$subject' AND section = '$section'");
        return $query;
    }

    public function search_student_by_professor($branch,$course,$subject,$section,$id,$sy) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st
        ON pst.student_id = st.student_id INNER JOIN accounts_tbl as at ON st.username = at.username WHERE pst.professor_id = $id AND st.branch = '$branch' AND st.course = '$course' AND st.section = '$section' AND st.subject = '$subject' AND st.sy = '$sy'");
        return $query;
    }

    public function show_professor_by_admin() {
        $query = $this->db->query("SELECT * FROM accounts_tbl as at INNER JOIN accounts_extension_tbl as aet
        ON at.username = aet.username WHERE at.role = 2");
        return $query;
    }

    public function show_admin_by_super_admin() {
        $query = $this->db->query("SELECT * FROM accounts_tbl as at INNER JOIN accounts_extension_tbl as aet
        ON at.username = aet.username WHERE at.role = 1");
        return $query;
    }


    public function students($id) {
        $query = $this->db->query("SELECT * FROM  professor_students_tbl WHERE professor_id = $id");
        return $query;
    }

    public function show_grades() {
        $query = $this->db->query("SELECT * FROM professor_grades_tbl GROUP BY code");
        return $query;
    }

    public function show_grades_by_branch($username) {
        $query = $this->db->query("SELECT * FROM accounts_extension_tbl WHERE username = '$username'");
        $row = $query->fetch_object();
        $branch = $row->branch;
        $query = $this->db->query("SELECT * FROM professor_grades_tbl WHERE branch = '$branch' GROUP BY code");
        return $query;
    }

    public function count_student_section($username) {
        $query = $this->db->query("SELECT * FROM accounts_tbl as at INNER JOIN students_tbl as st ON at.username = st.username WHERE st.username = '$username' GROUP BY st.section");
        $count = $query->num_rows;
        return $count;
    }

    public function count_student_subject($username) {
        $query = $this->db->query("SELECT * FROM accounts_tbl as at INNER JOIN students_tbl as st ON at.username = st.username WHERE st.username = '$username' GROUP BY st.subject");
        $count = $query->num_rows;
        return $count;
    }

    public function count_student_branch($username) {
        $query = $this->db->query("SELECT * FROM accounts_tbl as at INNER JOIN students_tbl as st ON at.username = st.username WHERE st.username = '$username' GROUP BY st.branch");
        $count = $query->num_rows;
        return $count;
    }

    public function force_download($file,$path) {
        $file = urldecode($file);
        $filepath = $path.$file;
        if(file_exists($path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit;
        }
    }

    public function filter_professor($id) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = $id");
        return $query;
    }

    public function addschoolyear($sy) {
        $query = $this->db->query("SELECT * FROM school_year_tbl WHERE schoolyear = '$sy'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'School year '.$sy.' is already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO school_year_tbl (schoolyear) VALUES ('$sy')");
            $message = 'School year '.$sy.' has been added.';
            $query ? $this->success($message) : null;
        }
    }

    public function updateschoolyear($update_schoolyear,$update_id) {
        $query = $this->db->query("SELECT * FROM school_year_tbl WHERE schoolyear = '$update_schoolyear'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'School year '.$update_schoolyear.' is already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("UPDATE school_year_tbl SET schoolyear = '$update_schoolyear' WHERE id = '$update_id'");
            $message = 'School year '.$update_schoolyear.' has been updated.';
            $query ? $this->updated($message) : null;
        }
    }

    public function deleteschoolyear($update_id){
        $query = $this->db->query("DELETE FROM school_year_tbl WHERE id = '$update_id'");
        return $query ? $this->deleted() : null;
    }

    public function use_school_year($id,$sy) {
        $query = $this->db->query("UPDATE school_year_tbl SET status = 0");
        if($query) {
            $q = $this->db->query("UPDATE school_year_tbl SET status = 1 WHERE id = '$id'");
            $message = 'School year '.$sy.' '. 'has been used';
            return $q ? $this->success($message) : null;
        }

    }    

    public function show_all_school_year() {
        $query = $this->db->query("SELECT * FROM school_year_tbl");
        return $query;
    }

    public function show_school_year() {
        $query = $this->db->query("SELECT * FROM school_year_tbl WHERE status = 1");
        return $query;
    }



    public function show_section() {
        $query = $this->db->query("SELECT * FROM students_tbl GROUP BY section");
        return $query;
    }

    public function show_subjects() {
        $query = $this->db->query("SELECT * FROM subjects_tbl");
        return $query;
    }

    public function show_professor_courses($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY course");
        return $query;
    }

    public function show_professor_subjects($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY subject");
        return $query;
    }

    public function show_professor_sections($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY section");
        return $query;
    }

    public function show_professor_branch($id) {
        $query = $this->db->query("SELECT * FROM professor_students_tbl as pst INNER JOIN students_tbl as st ON pst.student_id = st.student_id WHERE pst.professor_id = $id GROUP BY branch");
        return $query;
    }

    public function student_search($username) {
        $query = $this->db->query("SELECT * FROM accounts_tbl  INNER JOIN students_tbl ON accounts_tbl.username = students_tbl.username WHERE accounts_tbl.username = '$username' GROUP BY accounts_tbl.username");
        return $query;
    }

    public function show_validate_student($branch,$section,$course,$subject,$sy) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE 
        branch = '$branch' AND section = '$section' AND course = '$course' AND subject = '$subject' AND sy = '$sy'");
        $check = $query->num_rows;
        if($check > 0) {
            return $query;
        } 
    }

    

    public function uploadgrades($file,$professor_id,$branch,$course,$subject,$section,$sy) {
        $file		 = $_FILES['files']['tmp_name'];
        if(empty($file)) {
            $errormsg = 'Please upload .xlxs | .xls | .csv files.';
            $this->error($errormsg);
        } else {
        $date        = date('Y-m-d');
        $code        = rand(111111,999999);
        $excel_name	 = $_FILES['files']['name'];
        $excel_path  = '../../assets/uploads/'.$code.'/';
        $objPHPExcel = PHPExcel_IOFactory::load($file); 
        foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
          $highestRow = $worksheet->getHighestRow();
             $semester   = $this->post($worksheet->getCellByColumnAndRow(22,3)->getValue());
          for($row = 7; $row <= $highestRow; $row++) {
              $username   = $this->post($worksheet->getCellByColumnAndRow(1,$row)->getValue());
              $name       = $this->post($worksheet->getCellByColumnAndRow(2,$row)->getValue());
              $q_pl       = $this->post($worksheet->getCellByColumnAndRow(4,$row)->getValue());
              $q_mt       = $this->post($worksheet->getCellByColumnAndRow(5,$row)->getValue());
              $q_pf       = $this->post($worksheet->getCellByColumnAndRow(6,$row)->getValue());
              $q_fn       = $this->post($worksheet->getCellByColumnAndRow(7,$row)->getValue());
              $q_ave      = $this->post($worksheet->getCellByColumnAndRow(8,$row)->getCalculatedValue());
              $q_result   = $this->post($worksheet->getCellByColumnAndRow(9,$row)->getCalculatedValue());
        
              $e_pl       = $this->post($worksheet->getCellByColumnAndRow(11,$row)->getValue());
              $e_mt       = $this->post($worksheet->getCellByColumnAndRow(12,$row)->getValue());
              $e_pf       = $this->post($worksheet->getCellByColumnAndRow(13,$row)->getValue());
              $e_fn       = $this->post($worksheet->getCellByColumnAndRow(14,$row)->getValue());
              $e_ave      = $this->post($worksheet->getCellByColumnAndRow(15,$row)->getCalculatedValue());
              $e_result   = $this->post($worksheet->getCellByColumnAndRow(16,$row)->getCalculatedValue());
              
              $s_sio      = $this->post($worksheet->getCellByColumnAndRow(18,$row)->getValue());
              $s_result   = $this->post($worksheet->getCellByColumnAndRow(19,$row)->getCalculatedValue());
              $grades     = $this->post($worksheet->getCellByColumnAndRow(21,$row)->getCalculatedValue());
              $g_add      = $this->post($worksheet->getCellByColumnAndRow(22,$row)->getValue());
              $final      = $this->post($worksheet->getCellByColumnAndRow(23,$row)->getCalculatedValue());
              $remarks    = $this->post($worksheet->getCellByColumnAndRow(24,$row)->getCalculatedValue());

              
              if(ltrim($username) == '' || ltrim($username) == 'Prepared By:' 
                 || ltrim($username) == 'Instructor:' && ltrim($name) == '' 
                 && ltrim($q_pl) == '' && ltrim($q_mt) == '' 
                 && ltrim($q_pf) == '' && ltrim($q_fn) == ''
                 && ltrim($q_ave) == 0 && ltrim($q_result) == 0) 
              continue;
           
              $query  = $this->db->query("INSERT INTO professor_grades_tbl 
              (excel_path,excel_name,username,name,q_pl,q_mt,q_pf,q_fn,q_ave,q_result,e_pl,e_mt,e_pf,e_fn,e_ave,e_result,s_sio,s_result,grades,g_add,final,remarks,semester,professor_id,status,branch,course,subject,section,sy,code,date) 
              VALUES 
              ('$excel_path','$excel_name','$username','$name','$q_pl','$q_mt','$q_pf','$q_fn','$q_ave','$q_result','$e_pl','$e_mt','$e_pf','$e_fn','$e_ave','$e_result','$s_sio','$s_result','$grades','$g_add','$final','$remarks','$semester','$professor_id',1,'$branch','$course','$subject','$section','$sy','$code','$date')");        
          }
         
        }   
            $query ? $this->movefile($file,$code) : null;
        }
    }

    public function movefile($file,$code) {
        $message = 'Excel file has been uploaded successfully.';
        mkdir('../../assets/uploads/'.$code, 0777, true);
        move_uploaded_file($_FILES['files']['tmp_name'],'../../assets/uploads/'.$code.'/'.$_FILES['files']['name']);
        $this->success($message);
    }

// admin subject begin
    public function addsubjects($sub_course,$sub_subject,$sub_section) {
        $query = $this->db->query("SELECT * FROM subjects_tbl WHERE subject = '$sub_subject' AND section = '$sub_section'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'This subject '.$sub_subject.' is already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO subjects_tbl (course,subject,section) VALUES ('$sub_course','$sub_subject','$sub_section')");
            $message = 'New subject has been added.';
            $query ? $this->success($message) : null;
        }

    }

    public function deletesubjects($update_sub_id) {
        $query = $this->db->query("DELETE FROM subjects_tbl WHERE id = $update_sub_id");
        return $query ? $this->deleted() : null;
    }

    public function updatesubjects($update_sub_id,$update_sub_course,$update_sub_subject,$update_sub_section) {
        $query = $this->db->query("SELECT * FROM subjects_tbl WHERE subject = '$update_sub_subject' AND section = '$update_sub_section'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'This subject '.$update_sub_subject.' is already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("UPDATE subjects_tbl SET course = '$update_sub_course', subject = '$update_sub_subject', section = '$update_sub_section' WHERE id = $update_sub_id");
            $message = 'Successfully updated.';
            $query ? $this->updated($message) : null;
        }
    }
// admin subject end

    // Login Codes
    public function login($username,$password) {
        $query  = $this->db->query("SELECT * FROM accounts_tbl WHERE username = '$username' AND status = 0");
        $check  = $query->num_rows;
        if($check > 0) {
            $row    = $query->fetch_object();
            $id     = $row->id;
            $role   = $row->role;
            $hash   = $row->password;
            $name   = $row->firstname;
            $photo  = $row->photo;
            $uname  = $row->username;
        if(password_verify($password,$hash) AND $role == 0) {
            $_SESSION['id'] = $id;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name;
            $_SESSION['photo'] = $photo;
            $_SESSION['username'] = $uname;
            echo json_encode(array('success' => true, 'location' => '../pages/super/dashboard.php'));
        } elseif(password_verify($password,$hash) AND $role == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            $_SESSION['username'] = $uname;
            echo json_encode(array('success' => true, 'location' => '../pages/admin/dashboard.php'));
        } elseif(password_verify($password,$hash) AND $role == 2) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            $_SESSION['username'] = $uname;
            echo json_encode(array('success' => true, 'location' => '../pages/professor/dashboard.php'));
        }  elseif(password_verify($password,$hash) AND $role == 3) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            $_SESSION['username'] = $uname;
            echo json_encode(array('success' => true, 'location' => '../pages/student/view_grades.php'));
        } else {
            echo json_encode(array('success' => false, 'bgcolor' => '#ff0000','color'   => '#fff',
                'message' => 'Invalid username or password.'));
        }
        } else {
            echo json_encode(array('success' => false, 'bgcolor' => '#ff0000','color'   => '#fff',
            'message' => 'Invalid username or password.'));
        }
    }

    public function professorprofile($update_id,$password) {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $query = $this->db->query("UPDATE accounts_tbl SET password = '$hash' WHERE id = '$update_id'");
        if($query) {
            $message = 'Password has been changed';
            $this->updated($message);
        }
    }

    public function showstudentinfobysection($username) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE username = '$username' GROUP BY section");
        return $query;
    }

    public function showstudentinfobysubject($username) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE username = '$username' GROUP BY subject");
        return $query;
    }

    public function showstudentgrades($username,$branch,$subject,$section,$sy){
        if(empty($subject)){
            $query = $this->db->query("SELECT * FROM professor_grades_tbl as pgt INNER JOIN accounts_tbl as at ON pgt.professor_id = at.id WHERE pgt.username = '$username' AND pgt.branch = '$branch' AND pgt.section = '$section' AND pgt.sy = '$sy' AND pgt.status = 0");
        } else {
            $query = $this->db->query("SELECT * FROM professor_grades_tbl as pgt INNER JOIN accounts_tbl as at ON pgt.professor_id = at.id WHERE  pgt.username = '$username' AND pgt.branch = '$branch' AND pgt.subject = '$subject' AND pgt.section = '$section' AND pgt.sy = '$sy' AND pgt.status = 0");
        }
            $check = $query->num_rows;
            if($check > 0) {
                return $query;
            } 
    }
    //redirect to login if ever they're not logged in
    public function redirecttologin() {
        if(!isset($_SESSION['role'])) {
            header('location: ../login.php');
        }
    }

    public function redirecttopageafterlogin() {
        if(isset($_SESSION['role'])) {
            switch($_SESSION['role']) {
                // super admin
                case 0:
                    header('location: super/dashboard.php');
                break;
                // admin
                case 1:
                    header('location: admin/dashboard.php');
                break;
                // professor
                case 2:
                    header('location: professor/dashboard.php');
                break;
                // student
                case 3:
                    header('location: student/view_grades.php');
                break;
            };
        } 
    }

    public function removeuploadedgrades($code) {
        $query = $this->db->query("DELETE FROM professor_grades_tbl WHERE code = '$code'");
        $message = 'Uploaded grades has been deleted.';
        return $query ? $this->success($message) : null;
    }

    public function approveuploadedgrades($code) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = ".$_SESSION['id']);
        $row = $query->fetch_object();
        $name = $row->firstname. ' '.$row->lastname;
        $query = $this->db->query("UPDATE professor_grades_tbl SET status = 0, approve_by = '$name' WHERE code = '$code'");
        return $query ? $this->notifystudents($code) : null;
    }

    public function notifystudents($code) {
        $query = $this->db->query("SELECT professor_grades_tbl.username,professor_grades_tbl.code,professor_grades_tbl.subject,accounts_tbl.username,accounts_tbl.contact FROM accounts_tbl INNER JOIN professor_grades_tbl ON professor_grades_tbl.username = accounts_tbl.username 
        WHERE professor_grades_tbl.code = $code");
        foreach($query as $row) {
            $contact[] = '+63'.$row['contact'];
            $subject = $row['subject'];
        }
        $message = 'your grade in '.$subject.' is now available -- AccessOGIS. Please visit this link: https://access-ogis.tk';
        $smsGateway = new SmsGateway('romanomaryclaire@gmail.com', 'sept282k12');
        $message    = $message;
        $deviceID   = 62305;
        $smsGateway->sendMessageToNumber($contact, $message, $deviceID);
        $message = 'Uploaded grades has been approved.';
        return $smsGateway ? $this->success($message) : null;
    }

    public function logout() {
        session_destroy();
        header('location: login.php');
    }


    // costum method for $_POST[] with validation
    public function post($data) {
        return $this->validate($data);
    }

    // costum method for $_GET[] with validation
    public function get($data) {
        return $this->validate($data);
    }

    //  convert all characters / symbols to string
    public function validate($data) {
        return $this->db->real_escape_string(htmlentities($data));
    }

    public function duplicated($message) {
      echo json_encode(array('success' => false,'bgcolor' => '#ff0000','color'   => '#fff', 'message' => $message));
    }

    public function updated($message) {
      echo json_encode(array('success' => true, 'bgcolor' => '#336699','color'   => '#fff','message' => $message));
    }

    public function success($message) {
      echo json_encode(array('success' => true, 'bgcolor' => '#336699','color'   => '#fff','message' => $message));
    }

    public function error($message) {
        echo json_encode(array('success' => false, 'bgcolor' => '#ff0000','color'   => '#fff',
        'message' => $message));
    }

    public function deleted() {
        echo json_encode(array('success' => false));
    }

    public function activate() {
        echo json_encode(array(
            'success'=> true, 
            'message' => '<label class="label label-success">Activated</label>'
        ));
    }

      public function deactivate() {
        echo json_encode(array(
            'success'=> true, 
            'message' => '<label class="label label-danger">Deactivated</label>'
        ));
    }

}
