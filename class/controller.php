<?php 
class Controller {

    // public $host    = 'localhost';
    // public $user    = 'accessog';
    // public $pass    = '37NdeY5nb9';
    // public $dbname  = 'accessog_viewing';
    public $host    = 'localhost';
    public $user    = 'root';
    public $pass    = '';
    public $dbname  = 'viewing';
    public $db;

    function __construct(){
        $this->connection();
    }

    private function connection(){
        $this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if($this->db->connect_error){
            echo 'Could not connect to database.';
        }
    }      
}