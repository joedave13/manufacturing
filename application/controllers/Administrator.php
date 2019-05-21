<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

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
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
                Access Changed!</div>');
    }

    public function addUser()
    {
        $data['title'] = 'Add User';
        $data['user'] = $this->M_Administrator->getUserData();
        $data['listUser'] = $this->M_Administrator->getAllUser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('administrator/users', $data);
        $this->load->view('templates/footer');
    }

    public function formUser()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Form Add User';
            $data['user'] = $this->M_Administrator->getUserData();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('administrator/addUserForm', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'date_created' => time()
            ];
            $this->M_Administrator->addUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New User Added.</div>');
            redirect('administrator/addUser');
        }
        
    }
}
    
    /* End of file Administrator.php */
