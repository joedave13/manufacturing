<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Menu extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Menu');
            check_login();
        }
        
        public function index()
        {
            $this->form_validation->set_rules('menu', 'Menu', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Menu Management';
                $data['user'] = $this->M_Menu->getUserData();
                $data['menu'] = $this->M_Menu->getMenu();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/index', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'menu' => $this->input->post('menu')
                ];
                $this->M_Menu->insertMenuData($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Menu Added!</div>');
                redirect('menu');
            }   
        }

        public function subMenu()
        {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('menu_id', 'Menu', 'trim|required');
            $this->form_validation->set_rules('url', 'URL', 'trim|required');
            $this->form_validation->set_rules('icon', 'Icon', 'trim|required');
            
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Sub Menu Management';
                $data['user'] = $this->M_Menu->getUserData();
                $data['menu'] = $this->M_Menu->getMenu();
                $data['subMenu'] = $this->M_Menu->getSubMenu();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/submenu', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active')
                ];
                $this->M_Menu->insertSubMenuData($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Menu Sub Added!</div>');
                redirect('menu/subMenu');
            }
            

        }
    
    }
    
    /* End of file Menu.php */
    
?>
