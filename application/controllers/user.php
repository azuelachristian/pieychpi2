<?php




defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

    public function __construct(){ 
    parent::__construct();
    $this->load->model('userModel');
        $this->load->helper(array('form', 'url', 'string'));
        $this->load->library('form_validation');
    
    // $this->load->helper('url'); //user controller level
    }
    

    public function index(){
            // $this->load->helper('url');  method level   
        $this->load->view('includes/header');
        $this->load->view('includes/nav');
        $this->load->view('users/index');
        $this->load->view('includes/footer');                
    }
    public function adminindex(){
            // $this->load->helper('url');  method level   
             $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('users/adminindex');
             $this->load->view('includes/footer');
                
    }
     public function addUser(){
                // $data['name'] = $this->input->post('name');
                // $data['password'] = $this->input->post('password');
                // $data['email'] = $this->input->post('email');

                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                $this->form_validation->set_rules('email', 'Email', 'required');

                
                 if ($this->form_validation->run() == FALSE)
                {
                        echo '<div class="alert alert-danger">'.validation_errors().'</div>';
                }
                else{
                $user = array(
                'name'=> $this->input->post('name'),
                'password'=> $this->input->post('password'),
                'email'=> $this->input->post('email')   
                );
                        $this->userModel->insertUser($user);
                        redirect('admin/index');
                }
        }


        public function reg(){
                $this->load->view('includes/header');
                $this->load->view('includes/nav');
                $this->load->view('users/register');
                $this->load->view('includes/footer');
    }

     public function display(){

            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');


            $this->load->view('includes/header');
            $this->load->view('includes/usernavbar');
            $this->load->view('users/display', $data);
            $this->load->view('includes/footer');
    }

              
        public function userAccess(){                
                $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|callback_name_available');
                $this->form_validation->set_rules('password', 'Password', 'required|callback_password_available');
                 if ($this->form_validation->run() == FALSE)
                {                 
                echo '<div class="alert alert-danger">'.validation_errors().'</div>';                
                }
                else
                {
                redirect('admin/index');
                }
        }

        public function name_available($str){
        $this->load->model('userModel');
        // You can access $_POST variable
        $result =   $this->userModel->nameAvailability($_POST['name']);
        if ($result)
        {
        
                return TRUE;
        }else{
                $this->form_validation->set_message('name_available', 'Name Incorrect');
                return FALSE;
        }
        }



        public function password_available($str){
        $this->load->model('userModel');
        // You can access $_POST variable
        $result =   $this->userModel->passwordAvailability($_POST['password']);
        if ($result)
        {
        
                return TRUE;
        }else{
                $this->form_validation->set_message('password_available', 'Password Incorrect');
                return FALSE;
        }
        }


                

        public function register(){
                // $data['name'] = $this->input->post('name');
                // $data['password'] = $this->input->post('password');
                // $data['email'] = $this->input->post('email');             

                $user = array(
                'user_fname' => $this->input->post('user_fname'),
                'user_mname' => $this->input->post('user_mname'),
                'user_lname' => $this->input->post('user_lname'),
                'user_password' => sha1($this->input->post('user_password')),
                'user_email' => $this->input->post('user_email'),
                'user_activation_code' => random_string('alnum', 8),
                'user_status' => 'inactive'

        );

        $this->form_validation->set_rules('user_fname', 'First Name', 'required');
        $this->form_validation->set_rules('user_mname', 'Middle Name', 'min_length[1]');
        $this->form_validation->set_rules('user_lname', 'Last Name', 'required');
        $this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[tblusers.user_email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('user_repass', 'Re-enter Password', 'required|matches[user_password]');        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() == FALSE)
        {
                $this->reg();
        }
        else
        {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => "465",
                'smtp_user' => '@gmail.com',
                'smtp_pass' => '',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            // Set to, from, message, etc.
            $this->email->from($config['smtp_user'], 'Hosting Email');
            $this->email->to($this->input->post('email')); 

            $this->email->subject('Email Confirmation');
            $this->email->message(base_url().'user/activate/'.$user['activation_code']); 
            $result = $this->email->send();

            $this->userModel->insertUser($user);
            redirect('user/index');
        }
    }

    public function activate(){
		$cond = array(
			'activation_code' => $this->uri->segment(3)
			);
		
		if(!($this->userModel->checkAccount($cond)==null)){
			echo 'successfully registered email';
		}else{
			echo 'invalid';
		}
	}


        public function MySavings(){
                $this->load->view('includes/header');
                $this->load->view('includes/nav');
                $this->load->view('cardSavings/index');
                $this->load->view('includes/footer');  
        }

        
}


?>