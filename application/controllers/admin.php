<?php




defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct(){ 
        parent::__construct();
        $this->load->model('adminModel');
         $this->load->helper(array('form', 'url', 'string'));
        $this->load->library('form_validation');
        
        

    }
    
        public function index(){
            $data['users'] = $this->adminModel->getAllUsers();
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('users/userdashboard', $data);
            $this->load->view('includes/footer');
                
        }
        public function admindashboard(){
            $this->load->view('includes/header');
            $this->load->view('includes/nav');
            $this->load->view('users/admindashboard');
            $this->load->view('includes/footer');
                
        }
        public function usermanagement(){
            $data['users'] = $this->adminModel->getAllUsers();
            $this->load->view('includes/header');
            $this->load->view('includes/mainnavbar');
            $this->load->view('admin/index', $data);
            $this->load->view('includes/footer');
                
        }
        public function adminAccess(){
                $data['users'] = $this->adminModel->getAdmin();
                $my_values= array('value');

                     

                $this->form_validation->set_rules('name', 'Name', 'required|callback_name_available');
                $this->form_validation->set_rules('password', 'Password', 'required|callback_password_available');

                 if ($this->form_validation->run() == FALSE)
                {
                 if (validation_errors()){ 
                echo '<div class="alert alert-danger">'.validation_errors().'</div>';
           
                }
                }
                else {
                redirect('admin/admindashboard');
                }
                
        
        }
        public function name_available($str){
    $this->load->model('adminModel');
    // You can access $_POST variable
    $result =   $this->adminModel->nameAvailability($_POST['name']);
    if ($result)
    {
       
        return TRUE;
    }else{
         $this->form_validation->set_message('name_available', 'Name Incorrect');
        return FALSE;
    }
}

 public function password_available($str){
    $this->load->model('adminModel');
    // You can access $_POST variable
    $result =   $this->adminModel->passwordAvailability($_POST['password']);
    if ($result)
    {
       
        return TRUE;
    }else{
         $this->form_validation->set_message('password_available', 'Password Incorrect');
        return FALSE;
    }
}


        public function deleteUser(){
            $id = $this->uri->segment(3);
            $this->adminModel->deleteUser($id);

            redirect('admin/index');
        }
        public function viewUser(){

            $id = $this->uri->segment(3);
            
            $data['users'] = $this->adminModel->viewUser($id);

            $this->load->view('includes/header');
            $this->load->view('includes/usernavbar');
            $this->load->view('admin/viewUser', $data);
            $this->load->view('includes/footer');
           
        }

        public function updateUser(){
            $id = $this->uri->segment(3);
            


            $data['u'] = $this->adminModel->getUser($id);
            
            $this->load->view('includes/header');
            $this->load->view('includes/usernavbar');
            $this->load->view('users/edit', $data);
            $this->load->view('includes/footer');
           }


        public function do_edit(){
             $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                $this->form_validation->set_rules('email', 'Email', 'required');

                
                 if ($this->form_validation->run() == FALSE)
                {
                        echo '<div class="alert alert-danger">'.validation_errors().'</div>';
                }
                else{

            $id = $this->input->post('id');
            $user = array(
                'name'=> $this->input->post('name'),
                'password'=> sha1($this->input->post('password')),
                'email'=> $this->input->post('email')   
                );
            $this->adminModel->updateUser($id, $user);
            redirect('admin/usermanagement');
               
        }
        }
    }

    ?>