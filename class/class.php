<?php
include 'controller.php';
class db extends Controller {


    // Insert 
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
