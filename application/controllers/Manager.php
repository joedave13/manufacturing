<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Manager extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Manager');
            check_login();
        }
        
    
        public function index()
        {
            $data['title'] = 'My Profile';
            $data['user'] = $this->M_Manager->getUserData();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manager/index', $data);
            $this->load->view('templates/footer');
        }
    
    }
    
    /* End of file Manager.php */
    
?>
