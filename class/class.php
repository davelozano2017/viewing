<?php
include 'controller.php';
include 'SmsGateway.php';
include 'PHPExcel/IOFactory.php';
class db extends Controller {

    // Insert Administrator & Professor
    public function insertusers($lastname,$firstname,$middlename,$email,$contact,$gender,$username,$password,$type) {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $security_code = rand(111111,999999);
        $photo = '../../assets/images/admin.png';
        $check = $this->db->query("SELECT * FROM accounts_tbl WHERE email = '$email'");
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
            '$contact','$gender','$username','$hash','$security_code',1,'$type')");
            if($type == 1) {
                $message = 'New administrator has been added';
            } elseif($type == 2) {
                $message = 'New professor has been added';
            }
            $query ? $this->success($message) : false;
        }
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
        $hash     = 12345;
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
                $smsGateway = new SmsGateway('lozanojohndavid@gmail.com', '12345123');
                $number     = '+63'.$contact;
                $message    = $message;
                $deviceID   = 54501;
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
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO branches_tbl (branches) VALUES ('$branch')");
            return $query ? $this->success() : null;
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

    public function updatebranches($id,$branch) {
        $query = $this->db->query("UPDATE branches_tbl SET branches = '$branch' WHERE id = '$id'");
        $query ? $this->updated() : null;
    }

    public function deletebranches($id) {
        $query = $this->db->query("DELETE FROM branches_tbl WHERE id = '$id'");
        $query ? $this->deleted() : null;
    }

    function show_professor_courses($id) {
        $query = $this->db->query("SELECT * FROM professor_courses_tbl WHERE professor_id = '$id'");
        return $query;
    }

    function show_professor_section($id) {
        $query = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_id = '$id'");
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

    public function addcourses($course,$option) {
        $check = $this->db->query("SELECT * FROM courses_tbl WHERE courses = '$course'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO courses_tbl (courses,options) VALUES ('$course','$option')");
            return $query ? $this->success() : null;
        }
    }

    public function addprofessorcourse($professor_id,$professor_course) {
        $check = $this->db->query("SELECT * FROM professor_courses_tbl WHERE courses = '$professor_course' AND professor_id = '$professor_id'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This course has already in your list.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO professor_courses_tbl (professor_id,courses) VALUES ('$professor_id','$professor_course')");
            $message = $professor_course.' '.'has been added to your list';
            $query ? $this->success($message) : null;
        }
    }

    public function updateprofessorcourses($update_id,$professor_course) {
        $check = $this->db->query("SELECT * FROM professor_courses_tbl WHERE courses = '$professor_course'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This course is already exist.';
            $this->duplicated($message);
        } else {
            $query= $this->db->query("UPDATE professor_courses_tbl SET courses = '$professor_course' WHERE id = '$update_id'");
            $message = 'Course has been updated';
            return $query ? $this->updated($message) : null;
        }
    } 

    public function deleteprofessorcourses($update_id) {
        $query = $this->db->query("DELETE FROM professor_courses_tbl WHERE id = '$update_id'");
        return $query ? $this->deleted() : null;
    }

    public function addprofessorsection($professor_id,$professor_section) {
        $check = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_section = '$professor_section' AND professor_id = '$professor_id'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This course has already in your list.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO professor_sections_tbl (professor_id,professor_section) VALUES ('$professor_id','$professor_section')");
            $message = $professor_section.' '.'has been added to your list';
            $query ? $this->success($message) : null;
        }
    }

    public function updateprofessorsection($hiddenid,$prof_section) {
        $check = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_section = '$prof_section'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $message = 'This section has already in your list.';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("UPDATE professor_sections_tbl SET professor_section = '$prof_section' WHERE id = $hiddenid");
            $message = 'Section has been updated.';
            return $query ? $this->updated($message) : null;
        }
    } 

    public function deleteprofessorsection($hiddenid) {
        $query = $this->db->query("DELETE FROM professor_sections_tbl WHERE id = '$hiddenid'");
            $message = 'Section has been deleted.';
            return $query ? $this->deleted($message) : null;
    }

    public function updatecourses($id,$course,$option) {
        $query = $this->db->query("UPDATE courses_tbl SET 
        courses = '$course', options = '$option' WHERE id = '$id'");
        return $query ? $this->updated() : null;
    }

    public function deletecourses($id) {
        $query = $this->db->query("DELETE FROM courses_tbl WHERE id = '$id'");
        $query ? $this->deleted() : null;
    }

    // Insert Student
    public function insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$branch,$type,$username,$subject,$course,$section,$professor_id,$sy) {
        $password = password_hash(12345123,PASSWORD_DEFAULT);
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
                $this->insertstudentinfo($professor_id,$subject,$section,$course,$username,$branch,$sy);
            }
        } else { 
            $query = $this->db->query("INSERT INTO accounts_tbl 
            (photo,lastname,firstname,middlename,email,contact,
            gender,username,password,security_code,role) 
            VALUES 
            ('$photo','$lastname','$firstname','$middlename','$email',
            '$contact','$gender','$username','$password','$security_code','$type')");
            $query ? $this->insertstudentinfo($professor_id,$subject,$section,$course,$username,$branch,$sy) : false;
        }
    }

    public function insertstudentinfo($professor_id,$subject,$section,$course,$username,$branch,$sy) {
        $query = $this->db->query("INSERT INTO students_tbl 
        (professor_id,subject,section,course,branch,username,sy) VALUES ('$professor_id','$subject','$section','$course','$branch','$username','$sy')");
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
        course = '$course', username = '$username', branch = '$branch', sy = '$esy' WHERE studentid = '$studentid'");
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
                $this->db->query("DELETE FROM students_tbl WHERE studentid = '$studentid'");
                echo json_encode(array('success'=>true));
            }
        } else {
            $success = $this->db->query("DELETE FROM students_tbl WHERE studentid = '$studentid'");
            echo json_encode(array('success'=>true));
        }
            
    }

    //Show Admin Record
    public function showadmin() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 1");
        return $query;
    }

    public function countprofessorsection($id) {
        $query = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_id = $id");
        return $check = $query->num_rows;
    }

    public function countprofessorstudent($id) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE professor_id = $id");
        return $check = $query->num_rows;
    }

    public function countprofessorcourse($id) {
        $query = $this->db->query("SELECT * FROM professor_courses_tbl WHERE professor_id = $id");
        return $check = $query->num_rows;
    }

    //Show Professor Record
    public function showprofessor() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 2");
        return $query;
    }

    //Get Admin Data by id
    public function getadmininfobyid($id) {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE id = $id");
        return $query;
    }

    // count all administrators
    public function countadministrators() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 1");
        $check = $query->num_rows;
        return $check;
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

    public function show_grades() {
        $query = $this->db->query("SELECT * FROM professor_grades_tbl GROUP BY code");
        return $query;
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

    public function show_school_year() {
        $query = $this->db->query("SELECT * FROM school_year_tbl");
        return $query;
    }

    public function show_students_reports($branch,$course,$section) {
        $query = $this->db->query("SELECT * FROM accounts_tbl INNER JOIN students_tbl
        ON accounts_tbl.username = students_tbl.username
        WHERE accounts_tbl.role = 3 AND students_tbl.branch = '$branch' AND students_tbl.course = '$course' AND students_tbl.section = '$section'");
        return $query;
    }

    public function show_subjects($professor_id) {
        $query = $this->db->query("SELECT * FROM professor_subjects_tbl WHERE professor_id = $professor_id");
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

    public function addsubjects($professor_id,$course,$subject,$section) {
        $query = $this->db->query("SELECT * FROM professor_subjects_tbl WHERE subject = '$subject' AND section = '$section'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'Already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("INSERT INTO professor_subjects_tbl (professor_id,course,subject,section) VALUES ('$professor_id','$course','$subject','$section')");
            $message = 'New subject has been added.';
            $query ? $this->success($message) : null;
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
        $objPHPExcel = PHPExcel_IOFactory::load($file); 
        foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
          $highestRow = $worksheet->getHighestRow();
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
              (username,name,q_pl,q_mt,q_pf,q_fn,q_ave,q_result,e_pl,e_mt,e_pf,e_fn,e_ave,e_result,s_sio,s_result,grades,g_add,final,remarks,professor_id,status,branch,course,subject,section,sy,code,date) 
              VALUES 
              ('$username','$name','$q_pl','$q_mt','$q_pf','$q_fn','$q_ave','$q_result','$e_pl','$e_mt','$e_pf','$e_fn','$e_ave','$e_result','$s_sio','$s_result','$grades','$g_add','$final','$remarks','$professor_id',1,'$branch','$course','$subject','$section','$sy','$code','$date')");        
          }
         
        }   
            $message = 'Excel file has been uploaded successfully.';
            $query ? $this->success($message) : null;
        }
    }

    public function deletesubjects($id) {
        $query = $this->db->query("DELETE FROM professor_subjects_tbl WHERE id = $id");
        return $query ? $this->deleted() : null;
    }

    public function updatesubjects($id,$course,$subject,$section) {
        $query = $this->db->query("SELECT * FROM professor_subjects_tbl WHERE subject = '$subject' AND section = '$section'");
        $check = $query->num_rows;
        if($check > 0) {
            $message = 'Already exist';
            $this->duplicated($message);
        } else {
            $query = $this->db->query("UPDATE professor_subjects_tbl SET course = '$course', subject = '$subject', section = '$section' WHERE id = $id");
            $message = 'Successfully updated.';
            $query ? $this->updated($message) : null;
        }
    }



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
            echo json_encode(array('success' => true, 'location' => '../pages/super/dashboard.php.'));
        } elseif(password_verify($password,$hash) AND $role == 1) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            echo json_encode(array('success' => true, 'location' => '../pages/admin/dashboard.php.'));
        } elseif(password_verify($password,$hash) AND $role == 2) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            echo json_encode(array('success' => true, 'location' => '../pages/professor/profile.php.'));
        }  elseif(password_verify($password,$hash) AND $role == 3) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            $_SESSION['photo'] = $photo;
            $_SESSION['username'] = $uname;
            echo json_encode(array('success' => true, 'location' => '../pages/student/view_grades.php.'));
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

    public function showstudentinfo($username) {
        $query = $this->db->query("SELECT * FROM students_tbl WHERE username = '$username' GROUP BY subject");
        return $query;
    }

    public function showstudentgrades($username,$branch,$subject,$section,$sy){
        $query = $this->db->query("SELECT * FROM professor_grades_tbl WHERE username = '$username' AND branch = '$branch' AND subject = '$subject' AND section = '$section' AND sy = '$sy' AND status = 0");
        $check = $query->num_rows;
        if($check > 0) {
            return $query;
        } 
    }

    //redirect users to pages after login depends on their role
    public function redirecttopagesafterlogin() {
        if(isset($_SESSION['role']) !="" AND $_SESSION['role'] == 0 || $_SESSION['role'] == 1){
        header('location: admin/dashboard.php');
        } if(isset($_SESSION['role']) !="" AND $_SESSION['role'] == 2){
        header('location: professor/profile.php');
        } if(isset($_SESSION['role']) !="" AND $_SESSION['role'] == 3){
        header('location: student/profile.php');
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
                case 0:
                    header('location: super/dashboard.php');
                break;
                case 1:
                    header('location: admin/dashboard.php');
                break;
                case 2:
                    header('location: professor/view_students.php');
                break;
                case 3:
                    header('location: student/dashboard.php');
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
        $query = $this->db->query("UPDATE professor_grades_tbl SET status = 0 WHERE code = '$code'");
        return $query ? $this->notifystudents() : null;
    }

    public function notifystudents() {
        $query = $this->db->query("SELECT professor_grades_tbl.username,accounts_tbl.username,accounts_tbl.contact FROM accounts_tbl INNER JOIN professor_grades_tbl ON professor_grades_tbl.username = accounts_tbl.username");
        foreach($query as $row) {
            $contact[] = $row['contact'];
        }
        $message = 'Your grades are now available. (this is test mode, please do not reply.)';
        $smsGateway = new SmsGateway('lozanojohndavid@gmail.com', '12345123');
        $message    = $message;
        $deviceID   = 54501;
        $smsGateway->sendMessageToNumber($contact, $message, $deviceID);
        $message = 'Uploaded grades has been approved';
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
