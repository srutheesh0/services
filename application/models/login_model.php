<?php

Class Login_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
    }

// Insert registration data in database
    public function registration_insert($data) {

// Query to check whether username already exist or not
        $condition = "user_name =" . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

// Query to insert data in database
            $this->db->insert('user_login', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($data) {
        //print_r($data);die();
        //print_r(MD5($data['password']));
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . MD5($data['password']) . "'";

        $this->db->select('*');
        $this->db->from('registration_tab');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
//echo $this->db->last_query(); die();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {

            return 0;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
public function checkmail($data){
    $res=0;
        $condition = "emailId =" . "'" . $data . "'";
        $this->db->select('emailId');
        $this->db->from('registration_tab');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
       
        if ($query->num_rows() == 1) {
             $res=$query->result_array();
             return $res;
        } else {
            return $res;
        }
}
}

?>
