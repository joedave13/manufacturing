<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Auth extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Auth');
        }
        
        public function index()
        {
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Manufacture Module - Login';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        }

        private function _login()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->M_Auth->checkUser($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('administrator');
                    }
                    else {
                        redirect('manager');
                    }
                }
                else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password!</div>');
                    redirect('auth');
                }
            }
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered!</div>');
                redirect('auth');
            }
        }
        
        public function registration()
        {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');
               
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Manufacture Module - Registration';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/registration');
                $this->load->view('templates/auth_footer');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'date_created' => time()
                ];
                $this->M_Auth->insertUserData($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Succesfully Registered! Please Login.</div>');
                redirect('auth');
            }
            
        }

        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');

            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            You have been logout.</div>');
            redirect('auth');
        }

        public function blocked()
        {
            $this->load->view('auth/blocked');
        }
    }
    
    /* End of file Auth.php */
    
?>
