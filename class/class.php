<?php
include 'controller.php';
class db extends Controller {


    // Insert Administrator & Professor
    public function insertusers($lastname,$firstname,$middlename,$email,$contact,$gender,$username,$password,$type) {
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $security_code = rand(111111,999999);
        $photo = '../../assets/images/admin.png';
        $check = $this->db->query("SELECT * FROM accounts_tbl WHERE email = '$email'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO accounts_tbl 
            (photo,lastname,firstname,middlename,email,contact,
            gender,username,password,security_code,status,role) 
            VALUES 
            ('$photo','$lastname','$firstname','$middlename','$email',
            '$contact','$gender','$username','$hash','$security_code',1,'$type')");
            $query ? $this->success() : false;
        }
    }

    // Insert Student
    public function insertstudents($lastname,$firstname,$middlename,$email,$contact,$gender,$branch,$type,$course,$section,$professor_id) {
        $password = password_hash(12345123,PASSWORD_DEFAULT);
        $username = $firstname.$lastname.$middlename;
        $security_code = rand(111111,999999);
        $photo = $gender == 'Male' ? '../../assets/images/student_male.png' : '../../assets/images/student_female.png';
        $check = $this->db->query("SELECT * FROM accounts_tbl WHERE email = '$email'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO accounts_tbl 
            (photo,lastname,firstname,middlename,email,contact,
            gender,username,password,security_code,status,role) 
            VALUES 
            ('$photo','$lastname','$firstname','$middlename','$email',
            '$contact','$gender','$username','$password','$security_code',1,'$type')");
            $query ? $this->insertstudentinfo($professor_id,$section,$course,$username,$branch) : false;
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
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO professor_courses_tbl (professor_id,courses) VALUES ('$professor_id','$professor_course')");
            $query ? $this->success() : null;
        }
    }

    public function updateprofessorcourses($update_id,$professor_course) {
        $check = $this->db->query("SELECT * FROM professor_courses_tbl WHERE courses = '$professor_course'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $this->duplicated();
        } else {
            $query= $this->db->query("UPDATE professor_courses_tbl SET courses = '$professor_course' WHERE id = '$update_id'");
            return $query ? $this->updated() : null;
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
            $this->duplicated();
        } else {
            $query = $this->db->query("INSERT INTO professor_sections_tbl (professor_id,professor_section) VALUES ('$professor_id','$professor_section')");
            $query ? $this->success() : null;
        }
    }

    public function updateprofessorsection($hiddenid,$prof_section) {
        $check = $this->db->query("SELECT * FROM professor_sections_tbl WHERE professor_section = '$prof_section'");
        $checkrow = $check->num_rows;
        if($checkrow > 0) {
            $this->duplicated();
        } else {
            $query = $this->db->query("UPDATE professor_sections_tbl SET professor_section = '$prof_section' WHERE id = $hiddenid");
            return $query ? $this->updated() : null;
        }
    } 

    public function deleteprofessorsection($hiddenid) {
        $query = $this->db->query("DELETE FROM professor_sections_tbl WHERE id = '$hiddenid'");
        return $query ? $this->deleted() : null;
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

    public function insertstudentinfo($professor_id,$section,$course,$username,$branch) {
        $query = $this->db->query("INSERT INTO students_tbl 
        (professor_id,section,course,branch,username) VALUES ('$professor_id','$section','$course','$branch','$username')");
        return $query ? $this->success() : false;
    }

    //Show Admin Record
    public function showadmin() {
        $query = $this->db->query("SELECT * FROM accounts_tbl WHERE role = 1");
        return $query;
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
            echo json_encode(array('success' => true, 'location' => '../pages/student/profile.php.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid username or password.'));
        }
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid username or password.'));
            
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

    public function duplicated() {
      echo json_encode(array('success'=> false, 'message' => 'duplicated'));
    }

    public function updated() {
      echo json_encode(array('success'=> true, 'message' => 'updated'));
    }

    public function success() {
      echo json_encode(array('success'=> true, 'message' => 'success'));
    }

    public function deleted() {
        echo json_encode(array('success'=> true, 'message' => 'Successfully Deleted'));
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
