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
        $message='fail';
        // print_r($_POST);die();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')

        );

        $result = $this->login_model->login($data);
        //print_r($result);die();
        if ($result != 0) {
            $message='Success';
            $session_data = array(
                'username' => $result[0]->username,
                'email' => $result[0]->emailId,
                'id' => $result[0]->id,
            );
// Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            //print_r($message);
            //die();

            echo json_encode(array('Message' => 'Success', 'session_data' => $session_data));
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
           echo json_encode(array('Message' => 'Failed'));
        }
    }

    public function admin_home() {
        $data = $_SESSION;

        if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
            $this->load->view('includes/outermenu.php', $data);
            $this->load->view('includes/menu.php');
            $this->load->view('home', $data);
            $this->load->view('includes/footer.php');
        } else {
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

    public function forgot() {

        if (!isset($_SESSION['logged_in']) && empty($_SESSION['logged_in'])) {
            $res = $this->login_model->checkmail($_POST['useremail']);
            if ($res != 0) {
                $this->emailfun($res);
            }
        }
    }

    public function emailfun($res) {
       $config = Array(
                            'protocol' => 'smtp',
                            'smtp_auth' => TRUE,
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'gaustinv88@gmail.com', 
                            'smtp_pass' => 'austinsbisbtsbhgeorge', 
                            'mailtype' => 'html',
                            'charset' => 'iso-8859-1',
                            'smtp_crypto' => 'ssl',
                            'wordwrap' => TRUE
                        );
                        
        $this->load->library('email',$config); 
        $this->email->initialize($config);
        $from_email = "srutheesh0@gmail.com";
        $to_email = $res[0]['emailId'];

        //Load email library 
       
        
        $this->email->from($from_email, 'Your Name');
        $this->email->to($to_email);
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        
        //Send mail 
        if ($this->email->send()){
              echo $this->email->print_debugger();
             echo"send";
            $this->session->set_flashdata("email_sent", "Email sent successfully.");
        }
        else{
            echo $this->email->print_debugger();
            
            echo"not send";
            $this->session->set_flashdata("email_sent", "Error in sending Email.");
        //$this->load->view('email_form');
        }
    }

}
