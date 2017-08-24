<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('url');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view('view_login');
    }

    // Check for user login process
    public function user_login_process() {
        // print_r($_POST);die();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $result = $this->login_model->login($data);
        // print_r($result);die();
        if ($result == TRUE) {
            $session_data = array(
                'username' => $result[0]->username,
                'email' => $result[0]->emailId,
                'id' => $result[0]->id,
            );
// Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            // print_r($session_data);

            echo json_encode(array('Message' => 'Success','session_data' => $session_data));
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('view_login', $data);
        }
    }

    public function admin_home() {
        $data=$_SESSION;
       
        if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])){
        $this->load->view('includes/outermenu.php',$data);
        $this->load->view('includes/menu.php');
        $this->load->view('home',$data);
        $this->load->view('includes/footer.php');
        }else{
           $this->load->view('view_login', $data); 
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
         echo json_encode(array('Message' => 'Success'));
       // $this->load->view('view_login', $data);
    }

}
