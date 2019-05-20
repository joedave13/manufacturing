<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Administrator extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->model('M_Administrator');
            check_login();
        }
        
    
        public function index()
        {
            $data['title'] = 'Dashboard';
            $data['user'] = $this->M_Administrator->getUserData();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrator/index', $data);
            $this->load->view('templates/footer');
        }

        public function roleManagement()
        {
            $data['title'] = 'Role Management';
            $data['user'] = $this->M_Administrator->getUserData();

            $data['role'] = $this->M_Administrator->getRoleData();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrator/role', $data);
            $this->load->view('templates/footer');
        }

        public function roleAccess($role_id)
        {
            $data['title'] = 'Role Management';
            $data['user'] = $this->M_Administrator->getUserData();

            $data['role'] = $this->M_Administrator->getRoleAccess($role_id);
            $data['menu'] = $this->M_Administrator->getRoleMenu();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrator/role-access', $data);
            $this->load->view('templates/footer');
        }

        public function changeAccess()
        {
            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');

            $data = [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ];

            $result = $this->db->get_where('user_access_menu', $data);

            if ($result->num_rows() < 1) {
                $this->db->insert('user_access_menu', $data);
            }
            else {
                $this->db->delete('user_access_menu', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Access Changed!</div>');
        }
    
    }
    
    /* End of file Administrator.php */
    
?>
